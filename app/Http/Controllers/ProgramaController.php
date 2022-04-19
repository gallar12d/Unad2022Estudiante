<?php

namespace App\Http\Controllers;

use App\Nivel;
use App\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('permission:menu_programas')->except('programaPorEscuela');
    }
    public function index()

    {
        $programas = \App\Programa::all();
        return view('programa.index', ['programas' => $programas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $escuelas = \App\Escuela::all();
        $niveles = Nivel::all();
        return view('programa.create', compact('escuelas', 'niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\App\Programa::create($request->all())){
            return redirect()->route('programas.index');

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
        
        $programa = \App\Programa::findOrfail($id);
        $escuelas = \App\Escuela::all();
        $niveles = Nivel::all();


        return view('programa.edit', ['programa'=>$programa, 'escuelas'=>$escuelas, 'niveles' => $niveles]);
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
        if(\App\Programa::find($id)->update($request->all())){
            return redirect()->route('programas.index');
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
       
        \App\Programa::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function programaPorEscuela($id_escuela){
        return Programa::where('id_escuela', $id_escuela)->get();
    }
}
