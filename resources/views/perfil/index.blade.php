@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestión de perfiles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('createPerfil')}}" class="btn btn-primary float-right">Crear perfil</a>
                </div>

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table myDatatables table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                   
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($perfiles as $key => $perfil)
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$perfil->perfil}}</td>                                   
                                    <td>
                                        <div class="btn-group-sm">
                                            <a href="{{route('editPerfil', ['id_perfil' => $perfil->id_perfil])}}" class="btn  btn-outline-warning">Editar</a>
                                            <a onclick="return confirm('Está seguro que desea eliminar este registro?')" href="{{route('perfiles.destroy', $perfil->id_perfil)}}" class="btn  btn-outline-danger">Eliminar</a>

                                        </div>
                                    </td>

                                </tr>

                                @empty
                                <p>No existe información</p>
                                @endforelse


                            </tbody>
                        </table>

                    </div>
                </div>

                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
</div>

@endsection