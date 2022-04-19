<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantillaProcedimiento as Plantilla;
use App\LineaTiempo;
use App\InsumoActividadPlantilla as Insumo;
use App\ProductoActividadPlantilla as Producto;
use Illuminate\Support\Facades\DB;


class PlantillaProcedimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('permission:menu_plantillas');
    }
    public function index()
    {
        $plantillas = Plantilla::all();
        return view('plantilla_procedimiento.index', compact('plantillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantilla_procedimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Plantilla::create($request->all())) {
            return redirect()->route('plantillas_procedimientos.index');
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $plantilla = Plantilla::findOrfail($id);
        return view('plantilla_procedimiento.edit', compact('plantilla'));
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
        if (Plantilla::find($id)->update($request->all())) {
            return redirect()->route('plantillas_procedimientos.index');
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Plantilla::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function activities($id_plantilla)
    {
        $plantilla = Plantilla::findOrFail($id_plantilla);
        $lineaTiempo = LineaTiempo::where('id_plantilla_procedimiento', $id_plantilla)->orderBy('orden')->get();
        return view('plantilla_procedimiento.activities', compact('plantilla', 'lineaTiempo'));
    }
    public function save_activities(Request $request, $id_plantilla)
    {

        DB::transaction(function () use ($request, $id_plantilla) {
            if (is_iterable($request->data)) {
                $lineas = LineaTiempo::where('id_plantilla_procedimiento', $id_plantilla)->get();
                if (is_iterable($lineas)) {
                    foreach ($lineas as $linea) {
                        Insumo::where('id_item', $linea->id_item)->delete();
                        Producto::where('id_item', $linea->id_item)->delete();
                    }
                }
                LineaTiempo::where('id_plantilla_procedimiento', $id_plantilla)->delete();
                foreach ($request->data as $activity) {
                    
                    $item = LineaTiempo::create($activity);
                    $insumos = json_decode($activity['json_insumos']);
                    $productos = json_decode($activity['json_productos']);

                    if (is_iterable($insumos)) {

                        foreach ($insumos as $insumo) {
                            if ($insumo->tipo_recurso) {
                                $insumonuevo = new Insumo();
                                $insumonuevo->id_tipo_recurso = $insumo->id_tipo_recurso;
                                $insumonuevo->id_item = $item->id_item;
                                $insumonuevo->observacion = $insumo->observacion;
                                $insumonuevo->privacidad = $insumo->privacidad;
                                $insumonuevo->save();
                            }
                        }
                    }
                    if (is_iterable($productos)) {
                        foreach ($productos as $insumo) {
                            if ($insumo->tipo_recurso) {
                                $insumonuevo = new Producto();
                                $insumonuevo->id_tipo_recurso = $insumo->id_tipo_recurso;
                                $insumonuevo->id_item = $item->id_item;
                                $insumonuevo->observacion = $insumo->observacion;
                                $insumonuevo->privacidad = $insumo->privacidad;
                                $insumonuevo->save();
                            }
                        }
                    }
                }
                
            }
        });
        return \Response::json(array('status' => 'updated', 'code' => 201));

    }
}
