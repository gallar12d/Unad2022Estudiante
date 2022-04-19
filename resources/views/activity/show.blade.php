@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detalles de actividad para {{$level->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('levels.activities', $level->id_level)}}" class="btn btn-primary float-right">Actividades</a>
                </div>


            </div><!-- /.row -->
            @csrf
            <input type="hidden" name="id_level" id="id_level" value="{{$level->id_level}}">
            <div class="card">
                <div class="card-header">
                    <h5>Datos iniciales</h5>
                    <hr>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="title">Título de la actividad*</label>
                            <input disabled value="{{$activity->title}}" required name="title" type="text" class="form-control" id="title" placeholder="Título">
                        </div>
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="detail">Descripción de la actividad</label>
                            <textarea disabled placeholder="Descripción" class="form-control" id="detail" name="detail" rows="3">{{$activity->detail}}</textarea>
                        </div>
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="links">Links o urls de apoyo</label>
                            <textarea disabled placeholder="Liks o urls" class="form-control" id="links" name="links" rows="3">{{$activity->links}}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="start_date">Fecha de inicio*</label>
                            <input disabled value="{{$activity->start_date}}" name="start_date" type="date" class="form-control" id="start_date" placeholder="Fecha inicio">
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="end_date">Fecha de finalización*</label>
                            <input disabled value="{{$activity->end_date}}" name="end_date" type="date" class="form-control" id="end_date" placeholder="Fecha fin">
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="state">Estado*</label>
                            <div class="custom-control custom-switch">
                                <input disabled value="{{$activity->state}}" name="state" {{($activity->state == 1)? "checked" : "" }} value="1" type="checkbox" class="custom-control-input" id="state">
                                <label class="custom-control-label" for="state">Inactiva/Activa</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if(count($files))

            <div class="card">
                <div class="card-header">
                    <h5>Archivos adjuntos agregados</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($files as $key => $file)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td><a target="_blanck" href="{{asset('/adjuntos/'.$file->file)}}">{{$file->file}}<a></td>
                                        <td>{{$file->description}}</td>

                                    </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

            @endif

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