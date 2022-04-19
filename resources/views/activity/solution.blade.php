@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper solution">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Solucion de actividad para <strong>{{$level->name}}</strong></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">

                    <a role="button" href="{{route('activities.activitiesMakeStudent', $type)}}" class="btn btn-primary float-right">Actividades</a>
                </div>


            </div><!-- /.row -->
            @csrf
            <input type="hidden" name="id_level" id="id_level" value="{{$level->id_level}}">
            <div class="card">
                <div class="card-header">
                    <h5>Información de la actividad</h5>
                    <hr>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="title">Título de la actividad</label>
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
                            <label for="start_date">Fecha de inicio</label>
                            <input disabled value="{{$activity->start_date}}" name="start_date" type="date" class="form-control" id="start_date" placeholder="Fecha inicio">
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="end_date">Fecha de finalización</label>
                            <input disabled value="{{$activity->end_date}}" name="end_date" type="date" class="form-control" id="end_date" placeholder="Fecha fin">
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="state">Estado</label>
                            <div class="custom-control custom-switch">
                                <input disabled value="{{$activity->state}}" name="state" {{($activity->state == 1)? "checked" : "" }} value="1" type="checkbox" class="custom-control-input" id="state">
                                <label class="custom-control-label" for="state">{{($activity->state == 1)? "Abierta" : "Cerrada" }}</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if(count($files))

            <div class="card">
                <div class="card-header">
                    <h5>Archivos adjuntos agregados por el docente</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Archivo</th>
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
            @if(count($upFiles))

            <div class="card">
                <div class="card-header">
                    <h5>Archivos adjuntos agregados por el estudiante</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Archivo</th>
                                        <th scope="col">Descripción</th>
                                        @if($activity->state == 1)
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($upFiles as $key => $file)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td><a target="_blanck" href="{{asset('/adjuntos/'.$file->file)}}">{{$file->file}}<a></td>
                                        <td>{{$file->description}}</td>
                                        @if($activity->state == 1)
                                        <td> <a onclick="return confirm('Está seguro que desea eliminar este registro?')" href="{{route('files.destroyResponse', $file->id_file)}}" class="btn  btn-outline-danger">Eliminar</a>
                                        </td>
                                        @endif


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

            @if($activity->respuesta)
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Notas/observaciones</h4>
                <p><strong>{{$activity->respuesta->observations}}</strong></p>
                <hr>
                <h6 class="mb-0">Notas/observaciones de la solución/respuesta dejadas por el/la docente: <strong>{{$level->teacher->primer_nombre}} {{$level->teacher->primer_apellido}}</strong></h6>
            </div>

            @endif
            @if($activity->state == 1 )

            @if(!$activity->end_date)
            <div class="card">
                <div class="card-header">
                    <h5>Archivos adjuntos</h5>
                    <hr>
                    <h6>Agrege aquí sus archivos (imágenes o pdf) para <strong>responder esta actividad</strong></h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('activities.StoreSolutionStudent')}}">
                        @csrf
                        <input type="hidden" name="id_activity" id="id_activity" value="{{$activity->id_activity}}">
                        <input value="{{$type}}" type="hidden" name="type">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="start_date">Archivo</label>
                                <input required accept=".gif, .jpg, .png, .pdf" name="archivo" type="file" class="form-control" id="archivo">
                                @if ($errors->has('archivo'))
                                <span class="text-danger">El tipo de archivo que intentas subir no es soportado, recuerda que sólo puedes subir archivos con extensiones: .jpg, .gif, .png, .pdf</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="descripcion">Descripción del archivo</label>
                                <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción">
                            </div>
                        </div>
                        <button type="submit" id="btnSubmit" class="btn btn-outline-primary float-left">Cargar archivo</button>
                        <br>
                        <hr>
                        <a class="btn btn-primary float-right" href="{{route('activities.activitiesMakeStudent', $type)}}">{{($activity->response)? "Modificar solución": "Finalizar solución"}}</a>
                    </form>
                </div>
            </div>
            @elseif ($activity->end_date && (date('Y-m-d') <= $activity->end_date) )
                <div class="card">
                    <div class="card-header">
                        <h5>Archivos adjuntos</h5>
                        <hr>
                        <h6>Agrege aquí sus archivos (imágenes o pdf) para <strong>responder esta actividad</strong></h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('activities.StoreSolutionStudent')}}">
                            @csrf
                            <input type="hidden" name="id_activity" id="id_activity" value="{{$activity->id_activity}}">
                            <input value="{{$type}}" type="hidden" name="type">
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="start_date">Archivo</label>
                                    <input required accept=".gif, .jpg, .png, .pdf" name="archivo" type="file" class="form-control" id="archivo">
                                    @if ($errors->has('archivo'))
                                    <span class="text-danger">El tipo de archivo que intentas subir no es soportado, recuerda que sólo puedes subir archivos con extensiones: .jpg, .gif, .png, .pdf</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 col-lg-12">
                                    <label for="descripcion">Descripción del archivo</label>
                                    <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción">
                                </div>
                            </div>
                            <button type="submit" id="btnSubmit" class="btn btn-outline-primary float-left">Cargar archivo</button>
                            <br>
                            <hr>
                            <a class="btn btn-primary float-right" href="{{route('activities.activitiesMakeStudent', $type)}}">{{($activity->respuesta)? "Modificar solución": "Finalizar solución"}}</a>
                        </form>
                    </div>
                </div>
                @elseif ($activity->end_date && (date('Y-m-d') > $activity->end_date) )
                <div class="alert alert-danger" role="alert">
                    No se puede dar solución a esta actividad porque su fecha final era: {{$activity->end_date}}
                </div>
                @endif


                @else
                <div class="alert alert-danger" role="alert">
                    No se puede dar solución a esta actividad porque el docente ha cerrado el plazo de entrega.
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