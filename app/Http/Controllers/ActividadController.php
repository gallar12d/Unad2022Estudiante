<?php

namespace App\Http\Controllers;

use App\PersonalActividad;
use App\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\InsumoActividad as Insumo;
use App\Procedimiento;
use App\ProductoActividad as Producto;
use App\Repositorio;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('permission:menu_actividades');
    }
    public function index()
    {
        // $actividades;

        $actividades = PersonalActividad::where('id_usuario', Auth::user()->id)->get();
        return view('actividad.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::find($id);
        $actividades = Actividad::where('id_procedimiento', $actividad->procedimiento->id_procedimiento)->orderBy('orden', 'asc')->get();


        $insumos = [];
        $productos = [];


        return view('actividad.show', compact('actividad', 'actividades', 'insumos', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function insumos($id)
    {
        $recursos = Insumo::where('id_actividad', $id)->get();
        $tipo = 'Insumo';
        $actividad = Actividad::findOrFail($id);
        $permite = false;

        if (in_array(Auth::user()->id, $actividad->responsables->pluck('id_usuario')->toArray()))
            $permite = true;

        return view('actividad.resources', compact('recursos', 'tipo', 'permite'));
    }
    public function productos($id)
    {
        $recursos = Producto::where('id_actividad', $id)->get();

        $tipo = 'Producto';
        $actividad = Actividad::findOrFail($id);
        $permite = false;

        if (in_array(Auth::user()->id, $actividad->responsables->pluck('id_usuario')->toArray()))
            $permite = true;
        return view('actividad.resources', compact('recursos', 'tipo', 'permite'));
    }

    public function add_route(Request $request, $id_recurso, $tipo)
    {

        $newObj = new Repositorio();
        if ($tipo == 'Insumo') {
            $recurso  = Insumo::findOrFail($id_recurso);
            $newObj->id_insumo = $id_recurso;
        } else {
            $recurso  = Producto::findOrFail($id_recurso);
            $newObj->id_producto = $id_recurso;
        }
        $actividad = Actividad::findOrFail($recurso->id_actividad);
        $newObj->id_procedimiento = $actividad->procedimiento->id_procedimiento;
        $newObj->id_actividad = $actividad->id_actividad;
        $newObj->id_tipo_recurso = $recurso->id_tipo_recurso;
        $newObj->fecha_registro = $request->fecha_registro;
        $newObj->ruta_recurso = $request->ruta_recurso;
        $newObj->tipo = $tipo;
        $newObj->id_usuario_registro = Auth::user()->id;
        $newObj->save();
    }
    public function update_route(Request $request, $id_repositorio, $tipo)
    {
        Repositorio::findOrFail($id_repositorio)->update($request->all());
    }

    public function finish($id_actividad)
    {
        $actividad = Actividad::findOrfail($id_actividad);
        $procedimientoModificar = Procedimiento::findOrFail($actividad->procedimiento->id_procedimiento);

        if($actividad->estado == 'Abierta'){
            $actividad->estado = 'Finalizada';
            $actividad->save();
            //poner el procedimiento en posicion nueva
            $procedimientoModificar->posicion  = $actividad->orden ;
            $procedimientoModificar->save();
        }
        else{
            $actividad->estado = 'Abierta';
            $actividad->save();
            $procedimientoModificar->posicion  = $actividad->orden - 1;
            $procedimientoModificar->save();

        }


    }
    public function finishdecision(Request $request, $id_actividad){
        $actividad = Actividad::findOrFail($id_actividad);

        if($request->val == 0){            
            $actividad->estado = 'Pendiente';
        }
        else if ($request->val == 2){
            $actividad->estado = 'Pendiente';
            //todas las anteriores ponerlas en pendientes 
            $actividad_anterior = Actividad::find($actividad->id_actividad_anterior);
            if($actividad_anterior){
                $actividades  = Actividad::where('orden', '>=', $actividad_anterior->orden)
                ->where('id_procedimiento', $actividad->id_procedimiento)
                ->pluck('id_actividad');
                if(is_iterable($actividades)){                   
                    
                    foreach($actividades as $a){
                        $actividadModificar = Actividad::find($a);
                        if($actividadModificar->tipo == 'actividad'){

                            $actividadModificar->estado = 'Abierta';
                        }
                        else{

                            $actividadModificar->estado = 'Pendiente';
                        }
                        $actividadModificar->save();


                    }
                }
            }

            $procedimientoModificar = Procedimiento::findOrFail($actividad->id_procedimiento);

            $procedimientoModificar->posicion = $actividad_anterior->orden -1;
            $procedimientoModificar->save();
        }
        else{
            $actividad->estado = 'Finalizada';
            $procedimientoModificar = Procedimiento::findOrFail($actividad->id_procedimiento);

            $procedimientoModificar->posicion = $actividad->orden;
            $procedimientoModificar->save();

        }
        $actividad->save();
    }
}
