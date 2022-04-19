<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ActividadPlantilla;
use Symfony\Component\HttpFoundation\Response;
use Yajra\Datatables\Datatables;

class ActividadPlantillaController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $activities = ActividadPlantilla::orderBy('id_actividad', 'desc')->get();

            return Datatables::of($activities)
                ->addColumn('tipo', function ($activity) {
                    if ($activity->tipo == 'actividad')
                        return  'Actividad';
                    return 'Decisión';
                })
                ->addColumn('acciones', function ($activity) {
                    return '<a class="addItem" data_id = ' . $activity->id_actividad . ' href="#"><i class="fas fa-plus"></i></a>
                <a class="editItem" data_id = ' . $activity->id_actividad . ' href="' . route('actividades_plantillas.edit', $activity->id_actividad) . '"><i class="fas fa-pencil-alt"></i></a>
                <a class="deleteItem" data_id = ' . $activity->id_actividad . ' href="' . route('actividades_plantillas.destroy', $activity->id_actividad) . '"><i class="fas fa-trash"></i></a>

                ';
                })
                ->rawColumns(['tipo', 'acciones'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividad_plantilla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (ActividadPlantilla::create($request->all())) {

            return \Response::json(array('status' => 'created', 'code' => 201));
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
        $activity = ActividadPlantilla::findOrFail($id);
        return view('actividad_plantilla.edit', compact('activity'));
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
        if (ActividadPlantilla::findOrFail($id)->update($request->all())) {

            return \Response::json(array('status' => 'updated', 'code' => 201));
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
        if (ActividadPlantilla::findOrFail($id)->delete()) {
            return \Response::json(array('status' => 'deleted', 'code' => 201));
        }
    }
}
