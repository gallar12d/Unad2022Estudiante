@extends('layouts.app_admin_lte')

@section('content')
@php
    if(Auth::user()->rol != "Administrador")
        $label = "Estudiante";
    else
        $label = "Docente";

    
@endphp
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">

                    <h1 class="m-0 text-dark">Listado de soluciones para actividad: <strong> {{$activity->title}}</strong></h1>

                </div><!-- /.col -->
                <div class="col-sm-6 ">
                </div>

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">


                        </div>
                        <div class="col-md-4">


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
                                    <th scope="col">{{$label}}</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($responses as $key => $response)
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td>{{$response->student->primer_nombre}} {{$response->student->primer_apellido}} </td>
                                    <td>{{$response->upload_date}}</td>
                                    <td>{{$response->activity->title}} </td>
                                    <td>
                                        <div class="btn-group-sm">
                                            @if(Auth::user()->rol == 'Administrador')
                                            <a href="{{route('responses_teacher.show', $response->id_response)}}" class="btn  btn-outline-success">Ver solución/respuesta</a>

                                            @else
                                            <a href="{{route('responses.show', $response->id_response)}}" class="btn  btn-outline-success">Ver solución/respuesta</a>

                                            @endif
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