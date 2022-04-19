@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Creación de procedimiento</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->

            <div class="card ">
                <ul class="nav nav-tabs m-1" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class=" nav-link active" id="home-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">Datos iniciales</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="selectPlantilla(this, event)" class="nav-link" id="profile-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Responsables</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <form autocomplete="off" id="formProcedimiento" action="">
                            <div class="row m-2">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="nombre">Nombre procedimiento*</label>
                                    <input required name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre">
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="fecha_inicio">Fecha inicio*</label>
                                    <input required name="fecha_inicio" type="date" class="form-control" id="fecha_inicio" placeholder="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="anotacion">Anotación </label>
                                    <textarea class="form-control" id="anotacion" name="anotacion" rows="2"></textarea>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="tipo">Tipo* </label>
                                    <select name="tipo" required class="form-control" id="tipo">
                                        <option value="Nuevo registro calificado">Nuevo registro calificado</option>
                                        <option value="Renovación">Renovación</option>
                                        <option value="Alta calidad">Alta calidad</option>
                                        <option value="Autoevaluación">Autoevaluación</option>
                                        <option value="Acreditación internacional">Acreditación internacional</option>



                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="id_programa">Escuela* </label>
                                    <select onchange="programas(this, event)" required class="form-control" id="id_escuela">
                                        @forelse ($escuelas as $escuela)
                                        <option data_url="{{route('programas.escuela', $escuela->id_escuela)}}" value="{{$escuela->id_escuela}}">{{$escuela->escuela}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>


                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="id_programa">Programa* </label>
                                    <select name="id_programa" required class="form-control" id="id_programa">


                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="id_programa">Plantilla procedimiento* </label>
                                    <select name="id_plantilla_procedimiento" required class="form-control" id="id_plantilla">
                                        @forelse ($plantillas as $plantilla)
                                        <option value="{{$plantilla->id_plantilla_procedimiento}}">{{$plantilla->nombre}}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="url_documento">Ruta de documento general*</label>
                                    <input required name="url_documento" type="text" class="form-control" id="url_documento" placeholder="Ruta ">
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="ruta_raiz">Ruta de carpeta raíz*</label>
                                    <input required name="ruta_raiz" type="text" class="form-control" id="ruta_raiz" placeholder="Ruta raiz">
                                </div>

                            </div>

                        </form>
                    </div>

                    <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                        <div class="contenido row m-2">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button onclick="save()" type="submit" id="btnSubmit" class="btn btn-primary float-right m-1">Crear procedimiento</button>

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
    async function programas(me, e) {
        let url = $(me).find(":selected").attr('data_url');
        console.log($(me))
        let res = await $.get(url);
        $('#id_programa').empty();
        if (res.length) {

            $.each(res, function(k, v) {
                $('#id_programa').append(new Option(v.programa, v.id_programa))
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
        let url = "{{route('procedimientos.store')}}";



        if (allResponsables.length) {
            let response = await $.post(url, {
                "_token": "{{ csrf_token() }}",
                "responsables": allResponsables,
                "procedimiento": dataForm
            })

            if (response.code == 201) {


                window.location.href = response.url;


            }

        }



    }



    async function loadUsers(me, e) {

        let id_perfil = $(me).val();
        let url = "{{url('procedimientos/load_user/')}}";
        let result = await $.get(url + '/' + id_perfil);
        //result = "<option>algo</option>";
        //console.log($(me).closest('.row').find('select:nth-child(2)'))
        $(me).closest('.row').find('select.user').empty();
        $(me).closest('.row').find('select.user').append(result)


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

        let plantilla = $('#id_plantilla').val();
        if (id_plantilla != plantilla) {

            let url = "{{url('procedimientos/activities/')}}";
            let response = await $.get(url + '/' + plantilla);
            $('#two .contenido').html(response);
            id_plantilla = plantilla;
            $(".js-data-example-ajax").select2();
            //$('select#id_plantilla').prop('disabled', 'disabled');
        }


    }
    $(document).ready(function() {

        $('nav.main-header a.nav-link').click();
        $('#id_escuela').trigger('change');

    })
</script>
@endpush