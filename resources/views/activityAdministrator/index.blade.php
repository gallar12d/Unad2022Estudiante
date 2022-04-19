@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Gestión de actividades para docentes</h1>

                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('activities_administrator.create')}}" class="btn btn-primary float-right">Crear actividad</a>
                </div>

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <form autocomplete="off"  method="get" action="{{route('activities_administrator.index')}}" class="form-inline d-flex justify-content-center md-form form-sm float-right">
                                <div class="input-group mb-3">

                                    <input value="{{ date('Y-m-d')}}" type="date" name="query_date" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-sm" type="submit">Filtrar</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-4">

                            <form autocomplete="off"  method="get" action="{{route('activities_administrator.index')}}" class="form-inline d-flex justify-content-center md-form form-sm float-left ">
                                <div class="input-group mb-3">

                                    <input type="text" name="query" class="form-control form-control-sm" placeholder="Buscar por título">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-sm" type="submit">Buscar</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>



                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table myDatatables table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Título actividad</th>
                                    <th scope="col">Dueño</th>
                                    <th scope="col">Fechas</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activities as $key => $activity)
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$activity->title}} </td>
                                    <td>{{Auth::user()->primer_nombre}} {{Auth::user()->primer_apellido}}</td>
                                    <td>{{$activity->start_date}} / {{$activity->end_date}} </td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <a href="{{route('activities_administrator.show', $activity->id_activity)}}" class="btn  btn-outline-success">Ver</a>

                                            <a href="{{route('activities_administrator.edit', $activity->id_activity)}}" class="btn  btn-outline-warning">Editar</a>
                                            <a onclick="return confirm('Está seguro que desea eliminar este registro?')" href="{{route('activities.destroy', $activity->id_activity)}}" class="btn  btn-outline-danger">Eliminar</a>
                                            <a href="{{route('responses.index', $activity->id_activity)}}" class="btn  btn-outline-primary">Respuestas</a>

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
                <div class="card-footer text-muted">




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
@push('scripts')
<script>
    $(document).ready(function() {

    })
</script>
@endpush