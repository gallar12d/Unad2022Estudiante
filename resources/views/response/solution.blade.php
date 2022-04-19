@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Solucion/Respuesta de actividad </strong></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('responses.index', $response->id_activity)}}" class="btn btn-primary float-right">Soluciones</a>
                </div>



            </div><!-- /.row -->
            <div class="card card_info_student">
                <div class="card-header">
                    <h5>Información general</h5>
                    <hr>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Estudiante:</label>
                            <p>{{$response->student->primer_nombre}} {{$response->student->segundo_nombre}} {{$response->student->primer_apellido}} {{$response->student->segundo_apellido}}</p>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Nivel:</label>                            
                            <p>{{$response->student->level->name}}</p>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Actividad:</label>
                            <p>{{$activity->title}}</p>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Descripción actividad:</label>
                            <p>{{$activity->detail}}</p>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Fecha inicio:</label>
                            <p>{{$activity->start_date}}</p>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Fecha fin:</label>
                            <p>{{$activity->end_date}}</p>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="">Links o urls de apoyo:</label>
                            <p>{{$activity->links}}</p>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            <label for="state">Estado</label>
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

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($upFiles as $key => $file)
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
            <div class="card">
                <div class="card-header">
                    <h5>Observación o nota para solución de actividad</h5>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('responses.observation')}}">
                        @csrf
                        <input type="hidden" name="id_response" id="id_response" value="{{$response->id_response}}">
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="descripcion">Observación o nota</label>
                                <input value="{{$response->observations}}" name="observation" type="text" class="form-control" id="observation" placeholder="Observación o nota">
                            </div>
                        </div>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Actualizar respuesta</button>
                    </form>
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
@push('scripts')
<script>
    $(document).ready(function() {




    })
</script>
@endpush