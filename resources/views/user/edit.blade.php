@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de usuario</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('users.update', $user->id)}}">
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
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="primer_nombre">Primer nombre*</label>
                                <input value="{{$user->primer_nombre}}" required name="primer_nombre" type="text" class="form-control" id="primer_nombre" placeholder="Primer nombre">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="segundo_nombre">Segundo nombre</label>
                                <input value="{{$user->segundo_nombre}}" name="segundo_nombre" type="text" class="form-control" id="segundo_nombre" placeholder="Segundo nombre">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="primer_apellido">Primer apellido*</label>
                                <input value="{{$user->primer_apellido}}" required name="primer_apellido" type="text" class="form-control" id="primer_apellido" placeholder="Primer apellido">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="segundo_apellido">Segundo apellido</label>
                                <input value="{{$user->segundo_apellido}}" name="segundo_apellido" type="text" class="form-control" id="segundo_apellido" placeholder="Segundo apellido">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="tipo_identificacion">Tipo de identificación* </label>
                                <select name="tipo_identificacion" required class="form-control" id="tipo_identificacion">
                                    <option {{($user->tipo_identificacion == "Cédula de ciudadanía")? "selected" : "" }}>Cédula de ciudadanía</option>
                                    <option {{($user->tipo_identificacion == "Tarjeta de identidad")? "selected" : "" }}>Tarjeta de identidad</option>
                                    <option {{($user->tipo_identificacion == "Registro civil")? "selected" : "" }}>Registro civil</option>
                                    <option {{($user->tipo_identificacion == "Cédula de extranjería")? "selected" : "" }}>Cédula de extranjería</option>
                                    <option {{($user->tipo_identificacion == "Otro")? "selected" : "" }}>Otro</option>

                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="numero_identificacion">Número de identificación*</label>
                                <input value="{{$user->numero_identificacion}}" required name="numero_identificacion" type="number" class="form-control" id="numero_identificacion" placeholder="Número identificación">
                            </div>


                            <div class="form-group col-md-6 col-lg-6">
                                <label for="tipo_identificacion">Perfil*</label>
                                <select name="id_perfil" class="form-control" id="rol">
                                    @forelse($perfiles as $perfil)
                                    @if($perfil->perfil == $user->perfil->perfil)
                                    <option selected value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                    @else
                                    <option value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                    @endif
                                    @empty

                                    @endforelse

                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="roles">Roles*</label>
                                <select required multiple name="roles[]" class="js-example-basic-multiple form-control" id="rol">
                                    @forelse($roles as $rol)
                                    <option {{($user->hasRole($rol->name))? 'selected': ''}}>{{$rol->name}}</option>

                                    @empty

                                    @endforelse

                                </select>
                            </div>



                            <div class="form-group col-md-6 col-lg-6">
                                <label for="celular1">Celular 1*</label>
                                <input value="{{$user->celular1}}" required name="celular1" type="number" class="form-control" id="celular1" placeholder="Celular 1">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="celular2">Celular 2</label>
                                <input value="{{$user->celular2}}" name="celular2" type="number" class="form-control" id="celular2" placeholder="Celular 2">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="telefono">Teléfono fijo</label>
                                <input value="{{$user->telefono}}" name="telefono" type="number" class="form-control" id="telefono" placeholder="Teléfono">
                            </div>


                            <div class="form-group col-md-6 col-lg-6">
                                <label for="imagen">Fotografía</label>
                                <input name="imagen" type="file" class="form-control" id="imagen" placeholder="Fecha de nacimiento">
                                <p>
                                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Ver imagen
                                    </a>

                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <img src="{{asset('imgAvatar/'.$user->imagen)}}" class="img-fluid" alt="Responsive image">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label for="departamento">Departamento</label>
                                <input value="{{$user->departamento}}" name="departamento" type="text" class="form-control" id="departamento" placeholder="Departamento">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="ciudad">Ciudad</label>
                                <input value="{{$user->ciudad}}" name="ciudad" type="text" class="form-control" id="ciudad" placeholder="Ciudad">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="direccion">Dirección</label>
                                <input value="{{$user->direccion}}" name="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="estado">Estado</label>
                                <div class="custom-control custom-switch">
                                    <input name="estado" {{($user->estado == 1)? "checked" : "" }} value="1" type="checkbox" class="custom-control-input" id="estado">
                                    <label class="custom-control-label" for="estado">Inactivo/Activo</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="id_cead">CEAD*</label>
                                <select name="id_cead" class="form-control" id="id_cead">
                                    @forelse($centros as $c)
                                    <option {{($c->id_cead == $user->id_cead)? "selected" : "" }} value="{{$c->id_cead}}">{{$c->cead}}</option>

                                    @empty

                                    @endforelse

                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Datos de acceso al sistema</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="email">Correo*</label>
                                <input value="{{$user->email}}" required name="email" type="email" class="form-control" id="email" placeholder="Correo">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="password">Contraseña </label>
                                <small>(Dejar en blanco si desea conservar la antigua) </small>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña">
                                <small id="msgPass" style="color: red;"></small>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="password2">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password2" placeholder="Repetir contraseña">
                                <small id="msgPass2" style="color: red;"></small>
                            </div>

                        </div>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar usuario</button>



                    </div>


            </form>

            <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->
</div>

@endsection
@push('scripts')
<script>
    function errors() {
        let pass1 = $('#password').val();
        let pass2 = $('#password2').val();

        let pasa = false;

        if (!pass2 && !pass1) {
            pasa = true;
            $('#msgPass').text('')
            $('#msgPass2').text('')
        } else {
            if (pass1.length < 8) {

                $('#msgPass').text('la contraseña debe tener al menos 8 caracteres')
                pasa = false;


            } else {
                $('#msgPass').text('')



            }

            if (pass1 !== pass2) {

                $('#msgPass2').text('las contraseñas no coinciden')
                pasa = false;

            } else {
                $('#msgPass2').text('')



            }

            if (pass1 == pass2 && pass1.length >= 8) {
                pasa = true
            }

        }


        if (pasa) {
            $('#btnSubmit').prop('disabled', false)
        } else {
            $('#btnSubmit').prop('disabled', true)

        }


    }
    $(document).ready(function() {
        $('#btnSubmit').prop('disabled', false)

        $('#password').on('blur', function() {

            errors();

        })
        $('#password2').on('blur', function() {

            errors();

        })
        $('#password').on('keypress', function() {

            errors();

        })
        $('#password2').on('keypress', function() {

            errors();

        })
        $('#password').on('blur', function() {

            errors();

        })
        $('#password2').on('keyup', function() {

            errors();

        })
        $('#password').on('keyup', function() {

            errors();

        })
        $(".js-example-basic-multiple").select2({
            theme: "classic"

        })




    })
</script>
@endpush