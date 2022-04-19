<?php

namespace App\Http\Controllers;

use App\Centro;
use App\User;
use App\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('permission:menu_usuarios');
    }
    public function index(Request $request)

    {

        //$data['users'] = \App\User::all();
        $data['type'] = 'system';
        $data['contextSingular'] = 'usuario';
        $data['contextPlural']  = 'usuarios';

        if ($request->ajax()) {
            return Datatables::of(\App\User::take(100)->get())

                ->addColumn('roles', function ($user) {
                    return $user->roles->implode('name', ', ');
                })

                ->addColumn('nombre', function ($user) {
                    return $user->primer_nombre . ' ' . $user->primer_apellido;
                })
                ->addColumn('estado', function ($user) {

                if($user->estado == 1)
                return 'Activo';
                else
                return 'Inactivo';
                })
                ->addColumn('perfil', function ($user) {
                    if ($user->perfil)
                        return $user->perfil->perfil;
                    return 'N/A';
                })
                ->addColumn('acciones', function ($user) {
                    $html = '';
                    if (!$user->superadmin) {
                        $html = $html . '<a href="' . route("users.show", [$user->id]) . '" class="btn  btn-outline-success">Ver</a>';
                        $html = $html . ' <a href="' . route('users.edit', [$user->id]) . '" class="btn  btn-outline-warning">Editar</a>';
                        $html = $html . ' <a onclick="return confirm_delete()" href="' . route('users.destroy', [$user->id]) . '" class="btn  btn-outline-danger">Eliminar</a>';
                    }
                    return $html;
                })

                ->rawColumns(['nombre', 'estado', 'perfil', 'acciones', 'roles'])
                ->make(true);
        }



        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        $data['type'] = '';
        $data['contextSingular'] = 'usuario';
        $data['contextPlural']  = 'usuarios';
        $data['perfiles'] = \App\Perfil::all();
        $data['roles'] = Role::all();
        $data['centros'] = Centro::all();

        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            try {
                $user = \App\User::create($request->all());
                $user->syncRoles($request->roles);
            } catch (\Throwable $th) {

                switch ($th->errorInfo[1]) {
                    case 1062:
                        echo 'El correo <strong>' . $request->email . '</strong> ingresado ya existe en el sistema, por favor intente con un correo diferente';

                        //return view('errors', $data);

                        break;
                }

                die();
            }
            $user->password =  Hash::make($request->password);
            if ($request->estado) {
                $user->estado = 1;
            }

            if ($request->hasFile('imagen')) {
                $image = $request->file('imagen');
                $destinationPath = public_path() . '/imgAvatar/';
                $ext = $image->getClientOriginalExtension();
                $filename = $user->id . '.' . $ext;
                $user->imagen = $filename;


                $image->move($destinationPath, $filename);
            }



            $user->save();
        });

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function shows($id)
    {
        $data['type'] = '';
        $data['contextSingular'] = 'usuario';
        $data['contextPlural']  = 'usuarios';
        $data['levels'] = [];
        $data['user'] = \App\User::find($id);
        $data['perfiles'] = \App\Perfil::all();
        $data['roles'] = Role::all();
        $data['centros'] = Centro::all();

        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['type'] = '';
        $data['contextSingular'] = 'estudiante';
        $data['contextPlural']  = 'esstudiantes';
        $data['perfiles'] = \App\Perfil::all();
        $data['roles'] = Role::all();
        $data['centros'] = Centro::all();

        $data['user'] = \App\User::find($id);

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user =  \App\User::find($id);
        $user->syncRoles($request->roles);
        $user->update($request->all());
        if ($request->password) {

            $user->password =  Hash::make($request->password);
        }
        if ($request->type == 'student')
            $user->rol = 'Estudiante';
        if ($request->type == 'teacher')
            $user->rol = 'Docente';
        if ($request->type == 'system')
            $user->rol = $request->rol;

        if ($request->hasFile('imagen')) {

            if (File::exists(public_path() . '/imgAvatar/' . $user->imagen)) {

                File::delete(public_path() . '/imgAvatar/' . $user->imagen);
            }

            $image = $request->file('imagen');
            $destinationPath = public_path() . '/imgAvatar/';
            $ext = $image->getClientOriginalExtension();
            $filename = $user->id . '.' . $ext;
            $user->imagen = $filename;


            $image->move($destinationPath, $filename);
        }

        if ($request->has('levels')) {

            if (count($request->levels)) {

                $oldLevels =  \App\Level::where('id_user', $id)->get();
                if (count($oldLevels)) {
                    foreach ($oldLevels as $level) {
                        $level->id_user = NULL;
                        $level->save();
                    }
                }

                foreach ($request->levels as $level) {
                    $level = \App\Level::find($level);

                    $level->id_user = $user->id;
                    $level->save();
                }
            }
        }
        if ($request->estado) {
            $user->estado = $request->estado;
        } else
            $user->estado = NULL;
        $user->save();
        return redirect()->route('users.index', $request->type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
