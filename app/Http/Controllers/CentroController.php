<?php

namespace App\Http\Controllers;

use App\Centro;
use App\Zona;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centros = \App\Centro::all();
        return view('centro.index', ['centros' => $centros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $zonas = Zona::all();
        return view('centro.create', compact('zonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\App\centro::create($request->all())){
            return redirect()->route('centros.index');

        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(Centro $centro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zonas = Zona::all();
        $centro = Centro::findOrFail($id);
        
        return view('centro.edit', compact('zonas', 'centro'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\App\Centro::find($id)->update($request->all())){
            return redirect()->route('centros.index');
        }
        else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        

        \App\Centro::findOrFail($id)->delete();
        return redirect()->back();
    }
}
