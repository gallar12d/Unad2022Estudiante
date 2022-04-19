<?php

namespace App\Http\Controllers;

use App\TipoRecurso;
use Illuminate\Http\Request;

class TipoRecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('permission:menu_recursos');
    }
    public function index()

    {
        $recursos = \App\TipoRecurso::all();
        return view('tipo_recurso.index', ['recursos' => $recursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo_recurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\App\TipoRecurso::create($request->all())){
            return redirect()->route('tipo_recursos.index');

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
        
        $recurso = \App\TipoRecurso::findOrfail($id);
        return view('tipo_recurso.edit', ['recurso'=>$recurso]);
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
        if(\App\TipoRecurso::find($id)->update($request->all())){
            return redirect()->route('tipo_recursos.index');
        }
        else{
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
       
        \App\TipoRecurso::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function search2(Request $request){
        echo 'entra';
        dd($request);
        $recursos = TipoRecurso::where('tipo_recurso', 'like' , '%'. $request->query.'%')->get();
        return $recursos;
    }
    public function buscar(Request $request){
        $recursos = TipoRecurso::where('tipo_recurso', 'like' , '%'. $request->q.'%')->get();
        return $recursos;
    }
}
