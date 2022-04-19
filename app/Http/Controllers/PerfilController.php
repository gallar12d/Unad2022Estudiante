<?php

namespace App\Http\Controllers;

use App\level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('permission:menu_perfiles');
    }

    public function index()
    {
        //
        $data['perfiles'] = \App\Perfil::all();
        return view('perfil.index', $data);
    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        \App\Perfil::create($request->all());
        return redirect()->route('perfiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(level $level)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id_perfil)
    {
        $data['perfil'] = \App\Perfil::find($id_perfil);
        return view('perfil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        \App\Perfil::find($id)->update($request->all());
        return redirect()->route('perfiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Perfil::find($id)->delete();
        return redirect()->route('perfiles');
    }
}
