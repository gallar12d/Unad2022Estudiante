@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ (Auth::user()->imagen)? asset('imgAvatar/'.Auth::user()->imagen) :  asset('imgAvatar/user.png') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{Auth::user()->primer_nombre}} {{Auth::user()->primer_apellido}} - {{ Auth::user()->numero_identificacion }}</h3>

                            <p class="text-muted text-center">{{ Auth::user()->rol }}</p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                    <!-- /.card -->
                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header" >
                            <h3 class="card-title">Mi información</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(Auth::user()->rol == 'Docente')
                            <strong><i class="fas fa-book mr-1"></i> Niveles</strong>
                            <p class="text-muted">
                                <ul>
                                    @forelse(Auth::user()->levels as $level)
                                    <li>{{$level->name}}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </p>
                            @elseif (Auth::user()->rol == 'Estudiante')
                            <strong><i class="fas fa-book mr-1"></i> Nivel matriculado</strong>
                            <p>
                                @if(Auth::user()->level)
                                    {{Auth::user()->level->name}}
                                @endif
                            </p>
                            <hr>
                            <strong><i class="fas fa-user-tie mr-1"></i> Docente</strong>
                            <p>
                                @if(Auth::user()->level)
                                    @if(Auth::user()->level->teacher)
                                        {{Auth::user()->level->teacher->primer_nombre}} {{Auth::user()->level->teacher->primer_apellido}}
                                    @endif

                                @endif
                            </p>
                            <hr>
                            <strong><i class="far fa-check-square mr-1"></i> Estado</strong>
                                @if(Auth::user()->estado == 1)
                                <p class="text-muted">Activo</p>
                                @else
                                <p class="text-muted">No activo</p>
                                @endif
                            
                            @endif
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
                            <p class="text-muted">

                            <span class="text-muted"> {{Auth::user()->direccion}}</span>
                            
                            @if(Auth::user()->ciudad)
                            <span class="text-muted"> - {{Auth::user()->ciudad}}</span>
                            @endif
                            @if(Auth::user()->departamento)
                            <span class="text-muted"> - {{Auth::user()->departamento}}</span>
                            @endif
                            </p>
                            <hr>
                            <strong><i class="fas fa-phone-alt mr-1"></i> Celular</strong>
                            <p class="text-muted">
                                <span class="tag tag-danger">{{Auth::user()->celular1}}</span>
                                
                            </p>
                            <hr>

                            <strong><i class="far fa-envelope mr-1"></i> Correo</strong>

                            <p class="text-muted">{{Auth::user()->email}}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>


            </div><!-- /.row -->


            <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->
</div>
@endsection