@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Listado de boletines para <strong> {{$level->name}}</strong></h4>
                    <h5 class="m-0 text-dark">Docente: <strong> {{$level->teacher->primer_nombre}} {{$level->teacher->primer_apellido}}</strong></h5>

                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('reports.create', $level->id_level)}}" class="btn btn-primary float-right">Crear boletín</a>

                </div>

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <form autocomplete="off"  method="get" action="{{route('reports.index', $level->id_level)}}" class="form-inline d-flex justify-content-center md-form form-sm float-right">
                                <div class="input-group mb-3">

                                    <input value="{{ date('Y-m-d')}}" type="date" name="query_date" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-sm" type="submit">Filtrar</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-4">

                            <form autocomplete="off"  method="get" action="{{route('reports.index', $level->id_level)}}" class="form-inline d-flex justify-content-center md-form form-sm float-left ">
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
                                    <th scope="col">Título</th>
                                    <th scope="col">Estudiante</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reports as $key => $report)
                                <tr>
                                    <th scope="row">{{$key +1}}</th>
                                    <td><a target="_blank" href="{{asset('reports_pdf/'.$report->file->file)}}">{{$report->title}}</a></td>
                                    <td>{{$report->student->primer_nombre}} {{$report->student->primer_apellido}} - {{$report->student->numero_identificacion}}</td>
                                    <td>{{$report->date_report}}</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <a href="{{route('reports.show', $report->id_report)}}" class="btn  btn-outline-info">Ver</a>
                                            <a href="{{route('reports.edit', $report->id_report)}}" class="btn  btn-outline-warning">Editar</a>
                                            <a onclick="return confirm('Está seguro que desea eliminar este registro?')" href="{{route('reports.destroy', $report->id_report)}}" class="btn  btn-outline-danger">Eliminar</a>

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