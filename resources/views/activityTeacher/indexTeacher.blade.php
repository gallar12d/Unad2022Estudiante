@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Actividades {{($type == 'make')? "pendientes" : "realizadas"}} de <strong>{{Auth::user()->primer_nombre}} {{Auth::user()->primer_apellido}}</strong></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                </div>

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12  ">
                            <form autocomplete="off"  method="get" action="{{route('activities_teacher.activitiesTeacher', $type)}}" class="form-inline float-right d-flex justify-content-center md-form form-sm  ">
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
                                    <th scope="col">Coordinador</th>
                                    <th scope="col">Fechas</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activities as $key => $activity)
                                @if($activity->respuesta && $type == 'made')
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$activity->title}} </td>
                                    <td>{{$activity->coordinator->primer_nombre}} {{$activity->coordinator->primer_apellido}}</td>
                                    <td>{{$activity->start_date}} / {{$activity->end_date}} </td>
                                    <td>{{($activity->state == 1)? 'Abierta': 'Cerrada'}} </td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <a href="{{route('activities_teacher.solutionTeacher', [$activity->id_activity, $type])}}" class="btn  btn-outline-success">Ver solución</a>
                                        </div>
                                    </td>

                                </tr>
                                @elseif(!$activity->respuesta && $type == 'make')
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$activity->title}} </td>

                                    <td>{{$activity->coordinator->primer_nombre}} {{$activity->coordinator->primer_apellido}}</td>
                                    <td>{{$activity->start_date}} / {{$activity->end_date}} </td>
                                    <td>{{($activity->state == 1)? 'Abierta': 'Cerrada'}} </td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <a href="{{route('activities_teacher.solutionTeacher', [$activity->id_activity, $type])}}" class="btn  btn-outline-success">Solucionar</a>

                                        </div>
                                    </td>

                                </tr>
                                @endif

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