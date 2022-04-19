@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestión de boletines por nivel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
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
                                    <th scope="col">Código</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($levels as $key => $level)
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$level->name}}</td>
                                    <td>{{$level->code}}</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <a href="{{route('reports.index', $level->id_level)}}" class="btn  btn-outline-info">Boletines</a>

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