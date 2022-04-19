<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\ActividadPlantilla;
use App\Anexo;
use App\Anotacion;
use App\Escuela;
use App\InsumoActividad;
use App\LineaTiempo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Procedimiento;
use App\Perfil;
use App\PersonalActividad;
use App\PlantillaProcedimiento;
use App\ProductoActividad;
use App\Programa;
use App\Repositorio;
use App\User;
use App\Version;
use Facade\FlareClient\Http\Response;

class ProcedimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('anexos_publicos');
        $this->middleware('permission:menu_procedimientos')->except('anexos_publicos');
    }
    public function index()
    {
        $user = Auth::user();
        $procedimientos = Procedimiento::where('id_usuario_responsable', $user->id)->get();
        return view('procedimiento.index', compact('procedimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = \App\Programa::all();
        $escuelas = Escuela::all();
        $plantillas = \App\PlantillaProcedimiento::all();
        $perfiles = Perfil::all();


        return view('procedimiento.create', compact('programas', 'plantillas', 'escuelas', 'perfiles'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $procedimiento = new Procedimiento();
        
        $procedimiento->estado = 'Activo';
        $procedimiento->nombre = $request->procedimiento[0]['value'];
        $procedimiento->fecha_inicio = $request->procedimiento[1]['value'];
        $procedimiento->anotacion = $request->procedimiento[2]['value'];
        $procedimiento->tipo = $request->procedimiento[3]['value'];
        $procedimiento->id_programa = $request->procedimiento[4]['value'];
        $procedimiento->id_plantilla_procedimiento = $request->procedimiento[5]['value'];
        $procedimiento->id_estudiante = $request->procedimiento[6]['value'];
        // $procedimiento->ruta_raiz = $request->procedimiento[7]['value'];
        $procedimiento->id_usuario_responsable = Auth::user()->id;
        $procedimiento->posicion = 0;



        if ($procedimiento->save()) {
            //traer las actividades del procedimiento ordenadas asc por orden;
            $linea_tiempo = LineaTiempo::where('id_plantilla_procedimiento', $request->procedimiento[5]['value'])->orderBy('orden')->get();

            if (is_iterable($linea_tiempo)) {
                $fecha_inicio = $request->procedimiento[1]['value'];
                $fecha_fin = '';

                foreach ($linea_tiempo as $a) {
                    $actividad = new Actividad();
                    $actividad->descripcion = $a->actividad->descripcion;
                    $actividad->actividad = $a->actividad->actividad;
                    $actividad->tipo = $a->actividad->tipo;

                    $actividad->id_procedimiento =  $procedimiento->id_procedimiento;
                    if ($a->actividad->tipo == 'actividad')
                        $actividad->estado = 'Abierta';
                    else
                        $actividad->estado = 'Pendiente';
                    $actividad->orden = $a->orden;
                    $actividad->paralela = $a->actividad->paralela;
                    $actividad->tiempo = $a->actividad->tiempo;
                    $actividad->id_actividad_anterior = $a->id_actividad_anterior;

                    $actividad->fecha_inicio = $fecha_inicio;
                    $actividad->fecha_cierre = date('Y-m-d', strtotime($fecha_inicio . ' + ' . $a->actividad->tiempo . ' days'));
                    $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio . ' + ' . $a->actividad->tiempo . ' days'));
                    $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio . ' + 1 days'));

                    $actividad->save();

                    if (is_iterable($a->insumos)) {
                        foreach ($a->insumos as $insumo) {
                            $nuevo_insumo = new InsumoActividad();
                            $nuevo_insumo->id_actividad = $actividad->id_actividad;
                            $nuevo_insumo->id_tipo_recurso = $insumo->id_tipo_recurso;
                            $nuevo_insumo->observacion = $insumo->observacion;
                            $nuevo_insumo->privacidad = $insumo->privacidad;
                            $nuevo_insumo->save();
                        }
                    }
                    if (is_iterable($a->productos)) {
                        foreach ($a->productos as $producto) {
                            $nuevo_producto = new ProductoActividad();
                            $nuevo_producto->id_actividad = $actividad->id_actividad;
                            $nuevo_producto->id_tipo_recurso = $producto->id_tipo_recurso;
                            $nuevo_producto->observacion = $producto->observacion;
                            $nuevo_producto->privacidad = $producto->privacidad;
                            $nuevo_producto->save();
                        }
                    }

                    $indice = array_search($a->actividad->id_actividad, array_column($request->responsables, 'id_actividad'));
                    if (is_iterable($request->responsables[$indice]['usuarios'])) {

                        $unicos = [];
                        foreach ($request->responsables[$indice]['usuarios'] as $id) {

                            if (!in_array($id['id'], $unicos)) {
                                $personal_actividad = new PersonalActividad();
                                $personal_actividad->id_actividad =  $actividad->id_actividad;
                                $personal_actividad->id_usuario = $id['id'];
                                $personal_actividad->save();
                                $unicos[] = $id['id'];
                            }
                        }
                    }
                }
                foreach ($linea_tiempo as $anterior) {
                    if ($anterior->id_actividad_anterior) {
                        $orden_atras = $anterior->orden;
                        $id_actividad_atras = $anterior->id_actividad_anterior;
                        $linea_atras = LineaTiempo::where('id_actividad', $id_actividad_atras)->where('id_plantilla_procedimiento', $request->procedimiento[5]['value'])->first();
                        $orden_buscar = $linea_atras->orden;

                        $actividad_nueva = Actividad::where('id_actividad_anterior', $anterior->id_actividad_anterior)
                            ->where('id_procedimiento', $procedimiento->id_procedimiento)->first();

                        $actividad_conectada = Actividad::where('orden', $orden_buscar)
                            ->where('id_procedimiento', $procedimiento->id_procedimiento)->first();
                        $actividad_nueva  = Actividad::find($actividad_nueva->id_actividad);
                        $actividad_nueva->id_actividad_anterior = $actividad_conectada->id_actividad;
                        $actividad_nueva->save();
                    }
                }
            }

            return \Response::json(array('status' => 'created', 'code' => 201, 'url' => route('procedimientos.index')));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $version = Version::where('id_procedimiento', $id)->latest()->first();
        $procedimiento = Procedimiento::findOrFail($id);
        $type = 'url';

        if ($version) {
            if ($version->file) {
                $url_version = $version->file;
                $type = 'file';
            } else
                $url_version = $version->url_documento;


            $version = $version->version;
        } else {
            $version = 0;
            $url_version = $procedimiento->url_documento;
        }

        $versiones = Version::where('id_procedimiento', $id)->orderBy('id_version', 'desc')->get();
        $anotaciones = Anotacion::where('id_procedimiento', $id)->orderBy('id_anotacion', 'asc')->get();
        $anexos = Anexo::where('id_procedimiento', $id)->orderBy('id_anexo', 'desc')->get();

        $actividades = Actividad::where('id_procedimiento', $id)->orderBy('orden', 'asc')->get();
        $actividades_realizadas = Actividad::where('id_procedimiento', $id)
            ->where('estado', 'Finalizada')->orderBy('orden', 'asc')->count();

        $total_actividades = count($actividades);

        return view('procedimiento.show', compact('type', 'anexos', 'actividades_realizadas', 'total_actividades', 'url_version', 'anotaciones', 'versiones', 'procedimiento', 'actividades', 'version'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfiles = Perfil::all();
        $procedimiento = Procedimiento::find($id);
        $actividades = Actividad::where('id_procedimiento', $id)->orderBy('orden')->get();
        $programas = Programa::all();
        $plantillas = PlantillaProcedimiento::all();
        $escuelas = Escuela::all();
        $programa = Programa::find($procedimiento->id_programa);
        $escuela = $programa->escuela;

        return view('procedimiento.edit', compact('perfiles', 'programa', 'escuela', 'escuelas', 'procedimiento', 'actividades', 'programas', 'plantillas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (is_array($request->procedimiento)) {
            $procedimiento =  Procedimiento::find($id);
            foreach ($request->procedimiento as $data) {
                $attribute = $data['name'];
                if ($data['name'] !== '_token' && $data['name'] != '_method' && $data['name'] != 'id_escuela') {
                    $procedimiento->$attribute = $data['value'];
                }
            }
            $procedimiento->save();
        }



        $actividades = Actividad::where('id_procedimiento', $id)->get();
        if (is_iterable($actividades)) {
            $fecha_inicio = $procedimiento->fecha_inicio;
            $fecha_fin = '';
            foreach ($actividades as $a) {
                PersonalActividad::where('id_actividad', $a->id_actividad)->delete();
                $indice = array_search($a->id_actividad, array_column($request->responsables, 'id_actividad'));
                if (is_iterable($request->responsables[$indice]['usuarios'])) {

                    $unicos = [];
                    foreach ($request->responsables[$indice]['usuarios'] as $id) {

                        if (!in_array($id['id'], $unicos)) {
                            $personal_actividad = new PersonalActividad();
                            $personal_actividad->id_actividad =  $a->id_actividad;
                            $personal_actividad->id_usuario = $id['id'];
                            $personal_actividad->save();
                            $unicos[] = $id['id'];
                        }
                    }
                }
                // $actividad_editar = Actividad::find($a->id_actividad);
                $actividad_editar = $a;
                $actividad_editar->fecha_inicio = $fecha_inicio;
                $actividad_editar->fecha_cierre = date('Y-m-d', strtotime($fecha_inicio . ' + ' . $actividad_editar->tiempo . ' days'));
                $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio . ' + ' . $actividad_editar->tiempo . ' days'));
                $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio . ' + 1 days'));

                $actividad_editar->save();
            }
        }

        return response()->json([
            'status' => 202,
            'url' => route('procedimientos.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Repositorio::where('id_procedimiento', $id)->delete();
        $arrayActividades = Actividad::where('id_procedimiento', $id)->pluck('id_actividad');
        ProductoActividad::whereIn('id_actividad', $arrayActividades)->delete();
        InsumoActividad::whereIn('id_actividad', $arrayActividades)->delete();
        PersonalActividad::whereIn('id_actividad', $arrayActividades)->delete();
        Actividad::where('id_procedimiento', $id)->delete();
        Procedimiento::where('id_procedimiento', $id)->delete();
        Anotacion::where('id_procedimiento', $id)->delete();
        Version::where('id_procedimiento', $id)->delete();

        return redirect()->back();
    }

    public function activities($id_plantilla)
    {
        $lineaTiempo = LineaTiempo::where('id_plantilla_procedimiento', $id_plantilla)->orderBy('orden', 'asc')->get();
        $perfiles = Perfil::all();
        return view('procedimiento.activities', compact('lineaTiempo', 'perfiles'));
    }

    public function add_user()
    {
        $perfiles = Perfil::all();
        return view('procedimiento.add_user', compact('perfiles'));
    }
    public function load_user($id_perfil)
    {
        $usuarios = User::where('id_perfil', $id_perfil)->get();
        return view('procedimiento.load_user', compact('usuarios'));
    }

    public function finish($id)
    {
        $procedure = Procedimiento::findOrFail($id);
        $procedure->estado = 'Finalizado';
        $procedure->save();
    }
    public function versionar(Request $request, $id)
    {
        $version = new Version();
        $version->id_procedimiento = $id;
        $version->version = $request->version;
        $version->comentarios = $request->comentarios;
        $version->url_documento = $request->url_documento;
        $name = $request->file('archivo')->getClientOriginalName();
        $extension = $request->file('archivo')->extension();

        $path = $request->file('archivo')->storeAs(
            'archivos/versiones',
            $name,
            ['disk' => 'public_uploads']
        );
        $version->file = $name;


        $version->save();
        return redirect()->back();
    }
    public function anotacion(Request $request, $id)
    {
        $version = new Anotacion();
        $version->id_procedimiento = $id;
        $version->anotacion = $request->anotacion;

        $version->save();
        return redirect()->back();
    }

    public function anexos_publicos($id_procedimiento)
    {
        $procedimiento = Procedimiento::find($id_procedimiento);


        return view('procedimiento.anexos_public', compact('procedimiento'));
    }
    public function reporte_seguimiento($id_procedimiento)
    {
        $procedimiento = Procedimiento::find($id_procedimiento);
        $actividades = Actividad::where('id_procedimiento', $id_procedimiento)->orderBy('orden', 'asc')->get();
        $actividades_realizadas = Actividad::where('id_procedimiento', $id_procedimiento)
            ->where('estado', 'Finalizada')->orderBy('orden', 'asc')->count();

        $total_actividades = count($actividades);
        return view('procedimiento.reporte_seguimiento', compact('total_actividades','actividades_realizadas','actividades','procedimiento'));
    }
}
