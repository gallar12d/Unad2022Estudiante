@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de actividad para docentes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('activities_administrator.index')}}" class="btn btn-primary float-right">Actividades</a>
                </div>


            </div><!-- /.row -->
            <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('activities_administrator.update', $activity->id_activity)}}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>Datos iniciales</h5>
                        <hr>
                        <h6>Campos con un asterisco(*) son oblicatorios!</h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="title">Título de la actividad*</label>
                                <input value="{{$activity->title}}" required name="title" type="text" class="form-control" id="title" placeholder="Título">
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="detail">Descripción de la actividad</label>
                                <textarea placeholder="Descripción" class="form-control" id="detail" name="detail" rows="3">{{$activity->detail}}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="links">Links o urls de apoyo</label>
                                <textarea placeholder="Liks o urls" class="form-control" id="links" name="links" rows="3">{{$activity->links}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="start_date">Fecha de inicio*</label>
                                <input value="{{$activity->start_date}}" name="start_date" type="date" class="form-control" id="start_date" placeholder="Fecha inicio">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="end_date">Fecha de finalización*</label>
                                <input value="{{$activity->end_date}}" name="end_date" type="date" class="form-control" id="end_date" placeholder="Fecha fin">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="state">Estado*</label>
                                <div class="custom-control custom-switch">
                                    <input name="state" {{($activity->state == 1)? "checked" : "" }} value="1" type="checkbox" class="custom-control-input" id="state">
                                    <label class="custom-control-label" for="state">Cerrada/Abierta</label>
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
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($files as $key => $file)
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td><a target="_blanck" href="{{asset('/adjuntos/'.$file->file)}}">{{$file->file}}<a></td>
                                            <td>{{$file->description}}</td>
                                            <td> <a onclick="return confirm('Está seguro que desea eliminar este registro?')" href="{{route('files.destroy_administrator', $file->id_file)}}" class="btn  btn-outline-danger">Eliminar</a>
                                            </td>
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
                <div class="card">
                    <div class="card-header">

                        <h6>Agrege aquí más archivos (imágenes o pdf) para esta actividad</h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="start_date">Archivo</label>
                                <input accept=".gif, .jpg, .png, .pdf" name="archivo" type="file" class="form-control" id="archivo">
                                @if ($errors->has('archivo'))
                                <span class="text-danger">El tipo de archivo que intentas subir no es soportado, recuerda que sólo puedes subir archivos con extensiones: .jpg, .gif, .png, .pdf</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="descripcion">Descripción del archivo</label>
                                <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción">
                            </div>


                        </div>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar actividad</button>

                    </div>
                </div>
            </form>
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