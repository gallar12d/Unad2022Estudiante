@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de procedimiento</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->

            <div class="card ">
                <ul class="nav nav-tabs m-1" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class=" nav-link active" id="home-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">Datos iniciales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Responsables</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <form autocomplete="off" id="formProcedimiento" method="post" action="{{route('procedimientos.update', $procedimiento->id_procedimiento)}}">
                            @csrf
                            @method('PUT')
                            <div class="row m-2">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="nombre">Nombre procedimiento*</label>
                                    <input value="{{$procedimiento->nombre}}" required name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre">
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="fecha_inicio">Fecha inicio*</label>
                                    <input value="{{$procedimiento->fecha_inicio}}" required name="fecha_inicio" type="date" class="form-control" id="fecha_inicio" placeholder="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="anotacion">Anotación </label>
                                    <textarea class="form-control" id="anotacion" name="anotacion" rows="2">{{$procedimiento->anotacion}}</textarea>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="tipo">Tipo* </label>
                                    <select name="tipo" required class="form-control" id="tipo">
                                        <option {{ $procedimiento->tipo == "Nuevo registro calificado" ? "selected" : "" }} value="Nuevo registro calificado">Nuevo registro calificado</option>
                                        <option {{ $procedimiento->tipo == "Renovación" ? "selected" : "" }} value="Renovación">Renovación</option>
                                        <option {{ $procedimiento->tipo == "Alta calidad" ? "selected" : "" }} value="Alta calidad">Alta calidad</option>
                                        <option {{ $procedimiento->tipo == "Autoevaluación" ? "selected" : "" }} value="Autoevaluación">Autoevaluación</option>
                                        <option {{ $procedimiento->tipo == "Acreditación internacional" ? "selected" : "" }} value="Acreditación internacional">Acreditación internacional</option>



                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="id_programa">Escuela* </label>
                                    <select onchange="programas(this, event)" name="id_escuela" required class="form-control" id="id_escuela">
                                        @forelse ($escuelas as $escuela)
                                        <option {{$escuela->id_escuela == $programa->escuela->id_escuela? "selected": '' }} data_url="{{route('programas.escuela', $escuela->id_escuela)}}" value="{{$escuela->id_escuela}}">{{$escuela->escuela}}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                </div>


                                <div class="form-group col-md-12 col-lg-12">
                                    <label for="id_programa">Programa* </label>
                                    <select name="id_programa" required class="form-control" id="id_programa">



                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Perfil:</label>
                                    <select disabled id="" data_id_user="{{$procedimiento->estudiante->id}}" onchange="loadUsers(this, event)" class="form-control select_perfil">
                                        <option disabled selected>Seleccione...</option>
                                        @forelse($perfiles as $perfil)

                                        <option {{($procedimiento->estudiante->perfil->id_perfil == $perfil->id_perfil)? 'selected': ''}} value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="sel1">Estudiante:</label>
                                        <select style="width: 100%" name ='id_estudiante' class="js-data-example-ajax user form-control">


                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="id_programa">Plantilla procedimiento* </label>
                                    <select disabled name="id_plantilla_procedimiento" required class="form-control" id="id_plantilla">
                                        @forelse ($plantillas as $plantilla)
                                        <option value="{{$plantilla->id_plantilla_procedimiento}}">{{$plantilla->nombre}}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                </div>

                            </div>


                        </form>
                    </div>

                    <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                        <div class="contenido row m-2">
                            <div class="table-responsive">
                                <table id="tableActivities" class="  table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Actividad</th>
                                            <th>Tiempo</th>
                                            <th>Tipo</th>
                                            <th>Actividad paralela</th>
                                            <th>Responsables</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($actividades as $actividad)
                                        <tr id="{{$actividad->id_actividad}}">
                                            <td style="width:30%"><strong>
                                                    <h6>{{$actividad->actividad}}</h6>
                                                </strong>
                                                <small>{{$actividad->descripcion}}</small>
                                            </td>
                                            <td>{{$actividad->tiempo}} días</td>
                                            <td>{{$actividad->tipo}} </td>
                                            <td>{{$actividad->paralela}} </td>
                                            <td style="width:40%" id="perfil{{$actividad->id_actividad}}" data_id="{{$actividad->id_actividad}}">
                                                @forelse($actividad->responsables as $r)
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="sel1">Perfil:</label>
                                                            <select id="" data_id_user="{{$r->usuario->id}}" onchange="loadUsers(this, event)" class="form-control select_perfil">
                                                                <option disabled selected>Seleccione...</option>
                                                                @forelse($perfiles as $perfil)

                                                                <option {{($r->usuario->perfil->id_perfil == $perfil->id_perfil)? 'selected': ''}} value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                                                @empty
                                                                @endforelse

                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="sel1">Usuario:</label>
                                                            <select  style="width: 150%" class="js-data-example-ajax user form-control">


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="deleteRed align-bottom" onclick="delete_user(this, event)" href="#"><i class="fas fa-user-minus"></i></a>


                                                    </div>

                                                </div>

                                                @empty

                                                @endforelse
                                                <div class="row">
                                                    <a onclick="add_user(this, event)" href="{{route('procedimientos.add_user')}}"><i class="fas fa-user-plus"></i></a>

                                                </div>



                                            </td>
                                            <!-- <td id="perfil{{$actividad->id_actividad}}" data_id="{{$actividad->id_actividad}}">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul>
                                                            @forelse($actividad->responsables as $r)
                                                            <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    </div>



                                                </div>
                                                <div class="row">

                                                </div>

                                            </td> -->

                                        </tr>
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button onclick="save()" type="submit" id="btnSubmit" class="btn btn-primary float-right m-1">Modificar procedimiento</button>

                            </div>


                        </div>


                    </div>
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
    let id_plantilla;

    function change_perfiles() {
        let elements = $('.select_perfil');
        if (elements) {
            $.each(elements, function(k, v) {
                loadUsers(v, $(v).attr('data_id_user'));

            })
        }
    }

    async function programas(me, e) {

        let url = $(me).find(":selected").attr('data_url');

        let res = await $.get(url);
        $('#id_programa').empty();
        if (res.length) {
            $.each(res, function(k, v) {

                if (v.id_programa == "@json($programa->id_programa)") {

                    let text = "<option selected value='" + v.id_programa + "'>" + v.programa + "</option>"

                    $('#id_programa').append(text)
                } else {
                    let text = "<option  value='" + v.id_programa + "'>" + v.programa + "</option>"

                    $('#id_programa').append(text)
                }
            })

        }
    }

    function responsables() {
        let elementos = $('table#tableActivities tbody tr');
        let arreglo = [];

        if (elementos.length) {
            let faltan = false;
            $.each(elementos, function(k, v) {
                console.log($(v).attr('id'));
                let users = $(v).find('select.user');
                console.log(users);
                console.log(faltan);


                if (users.length) {
                    let arrayUsersTr = [];
                    $.each(users, function(key, val) {
                        if ($(val).val()) {
                            let usuario = {
                                id: $(val).val()
                            }
                            arrayUsersTr.push(usuario)
                        } else {
                            faltan = true;
                            return 0;
                        }


                    })
                    let objetoPadre = {
                        id_actividad: $(v).attr('id'),
                        usuarios: arrayUsersTr
                    }
                    arreglo.push(objetoPadre);
                } else {
                    faltan = true;

                }

            })
            if (faltan) {
                alert('Hay actividades sin relacionar al menos un responsable!! por favor verifique')
                return 0;
            }
        }
        return arreglo;


    }

    async function save() {

        let allResponsables = await responsables();
        let dataForm = $('#formProcedimiento').serializeArray();
        
        var form_data = new FormData($('#formProcedimiento')[0])
        let url = $('#formProcedimiento').attr('action');


        if (allResponsables.length) {
            // let response = await $.post(url, {
            //     "_token": "{{ csrf_token() }}",
            //     "responsables": allResponsables,
            //     "procedimiento": dataForm
            // })
            let response = await $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "responsables": allResponsables,
                    "procedimiento": dataForm
                }
            });

            if (response.status == 202) {
                window.location.href = response.url;

            }



        }



    }



    async function loadUsers(me, id_user) {

        let id_perfil = $(me).val();
        let url = "{{url('procedimientos/load_user/')}}";
        let result = await $.get(url + '/' + id_perfil);
        //result = "<option>algo</option>";
        //console.log($(me).closest('.row').find('select:nth-child(2)'))
        $(me).closest('.row').find('select.user').empty();
        $(me).closest('.row').find('select.user').append(result)
        $(me).closest('.row').find('select.user').val(id_user);






    }
    async function delete_user(me, e) {
        e.preventDefault();
        $(me).parent().parent().remove();

    }
    async function add_user(me, e) {
        e.preventDefault();
        let url = $(me).attr('href');
        let response = await $.get(url);
        $(me).parent().before(response);


    }
    async function selectPlantilla(me, e) {
        if (!$('#formProcedimiento')[0].checkValidity()) {

            e.stopPropagation()

            $('#two').removeClass('active show')
            $('#one').addClass('active show')
            $('#home-tab').click();

            setTimeout(function() {
                $('#formProcedimiento')[0].reportValidity();
            }, 500);

            return 0;

        }

        return 0

        let plantilla = $('#id_plantilla').val();
        if (id_plantilla != plantilla) {

            let url = "{{url('procedimientos/activities/')}}";
            let response = await $.get(url + '/' + plantilla);
            $('#two .contenido').html(response);
            id_plantilla = plantilla;
            //$('select#id_plantilla').prop('disabled', 'disabled');
        }


    }
    $(document).ready(function() {

        $(".js-data-example-ajax").select2();
        $('nav.main-header a.nav-link').click();
        $('#id_escuela').trigger('change');
        change_perfiles()


    })
</script>
@endpush