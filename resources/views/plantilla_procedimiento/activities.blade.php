@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="" style="display: flex;  flex-direction: row;  justify-content: space-between;">

                        <h1 class="m-0 text-dark">Personalizar plantilla</h1>
                        <a id="btnSaveActivities" role="button" href="{{route('plantillas_procedimientos.save_activities', $plantilla->id_plantilla_procedimiento)}}" class="btn btn-primary float-left">Guardar plantilla</a>


                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table table-striped " id="tablePlantilla">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Actividad</th>
                                    <th>Tiempo (días)</th>
                                    <th>Insumos</th>
                                    <th>Productos</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody id="simpleList">


                                <tr class="nosort">

                                    <td>
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </td>
                                    <td>
                                        Inicio
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>


                                    </li>
                                </tr>
                                @forelse($lineaTiempo as $actividad)
                                <tr data_anterior="{{$actividad->id_actividad_anterior}}" data_orden="{{$actividad->orden}}" id="{{$actividad->actividad->id_actividad}}" data_insumos='{{$actividad->json_insumos}}' data_productos='{{$actividad->json_productos}}' class="item" data_id="{{$actividad->actividad->id_actividad}}">
                                    <td>
                                        @if($actividad->actividad->tipo == 'actividad')
                                        <i class="fas fa-cogs"></i>
                                        @else
                                        <a onclick="conect(this, event, {{$actividad->actividad->id_actividad}})" href="#"> <i class="fas fa-question-circle"></i></a>

                                        @endif
                                    </td>
                                    <td>{{$actividad->actividad->actividad}}</td>
                                    <td>{{$actividad->actividad->tiempo}}</td>
                                    <td><a onclick="addResource(this, 1)" class="" href="#"><i class="fas fa-plus"></i></a></td>
                                    <td><a onclick="addResource(this, 2)" class="" href="#"><i class="fas fa-plus"></i></a></td>
                                    <td><a class="deleteItemPlantilla" href="javascript:void(0)">Eliminar</a></td>
                                </tr>
                                @empty
                                @endforelse

                                <tr class="nosort">

                                    <td>
                                        <i class="fa fa-flag-checkered" aria-hidden="true"></i>

                                    </td>
                                    <td>
                                        Fin
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>


                                    </li>
                                </tr>





                                </ul>


                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="contain">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Gestión de actividades</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6 ">
                                <a id="btnCreateActivity" role="button" href="#" class="btn btn-primary float-right">Crear Actividad</a>
                            </div>

                        </div><!-- /.row -->
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="activitiesTable" class="table  table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Actividad</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
</div>
<div id="modalCreateActivity" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">


            </div>

        </div>
    </div>
</div>
<div id="modalRecursos" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar insumos</h5>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12 col-lg-12">
                        <label for="tipo_identificacion">Tipo recurso* </label>
                        <select style="width: 100% !important;" name="tipo_recurso" required class="form-control js-data-example-ajax" id="tipo_recurso">

                        </select>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="observacion">Observación</label>
                        <input name="observacion" type="text" class="form-control" id="observacion" placeholder="observacion">
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="tipo_identificacion">Privacidad* </label>
                        <select name="privacidad" required class="form-control " id="privacidad">
                            <option value="Público">Público</option>
                            <option value="Privado">Privado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 col-lg-12">
                        <a id="addItemInsumo" role="button" href="#" onclick="addResourceTable()" class="btn btn-primary float-right">Agregar</a>

                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tableInsumosActividad" class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo Recurso</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Privacidad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<div id="modalConect" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Conectar actividad</h5>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="actividad_conect">Seleccione actividad</label>
                        <select data_id="" class="form-control" id="actividad_conect">
                            <option>Seleccione..</option>

                        </select>
                    </div>
                    <div class="form-group col-md-12 float-right">
                        <a onclick="saveConect(this, event)" id="btnSaveConect" role="button" href="" class="btn btn-primary float-right">Guardar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>

<script>
    let id_actividad = '';
    let type = '';

    function saveConect(me, e) {
        e.preventDefault();
        let id_actividad = $('#actividad_conect').attr('data_id');
        let id_anterior = $('#actividad_conect').val();

        let element = $('#simpleList tr#' + id_actividad + '');
        if (element.length) {
            if (id_anterior == -1) {
                element.attr('data_anterior', '');
            }
            else{
                element.attr('data_anterior', id_anterior);

            }

        }
        $('#modalConect').modal('hide');

    }

    function conect(me, e, id_actividad) {
        $('#modalConect').modal('show');
        $('#actividad_conect').attr('data_id', id_actividad);
        $('#actividad_conect').empty();
        let id_anterior = $(me).closest('tr').attr('data_anterior');

        //actividad_conect
        let elements = $('#simpleList .item');
        if (elements.length) {
            $('#actividad_conect').append("<option value='-1' selected >No aplica</option>");
            $.each(elements, function(k, v) {
                let id = $(v).attr('data_id');
                let text = $(v).children('td').eq(1).text();
                let select = '';
                if (id_anterior == id) {
                    select = 'selected';
                }

                if (id_actividad != id) {
                    let option = `<option ${select} value="${id}">${text}</option>`;
                    $('#actividad_conect').append(option);

                }


            })
        }
    }

    function savePlantilla() {

        $(document).on('click', '#btnSaveActivities', async function(e) {
            e.preventDefault();
            let elementos = $('#tablePlantilla tbody tr:not(.nosort)');
            let url = $(this).attr('href');

            if (elementos.length) {
                let arreglo = [];
                $.each(elementos, function(k, v) {
                    let id_plantilla_procedimiento = "{{$plantilla->id_plantilla_procedimiento}}"
                    let id_actividad = $(v).attr('id');
                    let id_actividad_anterior = $(v).attr('data_anterior');

                    let json_insumos = $(v).attr('data_insumos');
                    let json_productos = $(v).attr('data_productos');
                    let orden = $(v).attr('data_orden');

                    let objeto = {
                        id_plantilla_procedimiento,
                        id_actividad,
                        json_insumos,
                        json_productos,
                        orden,
                        id_actividad_anterior
                    }

                    arreglo.push(objeto);



                })



                let result = await $.post(url, {
                    "data": arreglo,
                    "_token": "{{ csrf_token() }}"
                })

                if (result.code == 201)
                    location.reload();
                else {
                    alert('Ha ocurrido un error!! ')
                    location.reload();

                }

            }

        })



    }

    function order() {
        let elementos = $('#tablePlantilla tbody tr:not(.nosort)');
        let i = 1;
        if (elementos.length) {
            $.each(elementos, function(k, v) {
                $(v).attr('data_orden', i)
                i++;
            })
        }
    }

    function fill(id) {

        if (type == 'insumo') {
            $("#tableInsumosActividad tbody").empty();
            let arrayInsumos = $('tr#' + id + '').attr('data_insumos');
            var y = JSON.parse(arrayInsumos)
            if (y) {
                $.each(y, function(k, v) {
                    if (v.tipo_recurso) {
                        var markup = "<tr data_id='" + v.id_tipo_recurso + "'><td>" + v.tipo_recurso + "</td><td>" + v.observacion + "</td><td>" + v.privacidad + "</td><td><a onclick='deleteItemTable(this)' href='#'>Eliminar</a></td></tr>";
                        $("#tableInsumosActividad tbody").append(markup);

                    }

                })

            }

        } else {
            $("#tableInsumosActividad tbody").empty();
            let arrayInsumos = $('tr#' + id + '').attr('data_productos');
            var y = JSON.parse(arrayInsumos)
            if (y) {
                $.each(y, function(k, v) {
                    if (v.tipo_recurso) {
                        var markup = "<tr data_id='" + v.id_tipo_recurso + "'><td>" + v.tipo_recurso + "</td><td>" + v.observacion + "</td><td>" + v.privacidad + "</td><td><a onclick='deleteItemTable(this)' href='#'>Eliminar</a></td></tr>";
                        $("#tableInsumosActividad tbody").append(markup);

                    }

                })

            }

        }


    }

    function deleteItemTable(me) {
        let id = $(me).closest('tr').attr('data_id');
        let arrayInsumos;
        if (type == 'insumo')
            arrayInsumos = $('tr#' + id_actividad + '').attr('data_insumos');
        else
            arrayInsumos = $('tr#' + id_actividad + '').attr('data_productos');


        //var x = JSON.stringify(arrayInsumos)
        var y = JSON.parse(arrayInsumos)
        y = y.filter(function(el) {
            return el.id_tipo_recurso !== id;
        });
        y = JSON.stringify(y);
        if (type == 'insumo')
            $('tr#' + id_actividad + '').attr('data_insumos', y);
        else
            $('tr#' + id_actividad + '').attr('data_productos', y);


        fill(id_actividad);

    }

    function addResourceTable() {
        let id = id_actividad;
        // tipo_recurso = type;
        let recurso = $('#tipo_recurso').select2('data')[0].text;
        if (!recurso)
            return false
        let id_tipo_recurso = $('#tipo_recurso').select2('data')[0].id;
        let observacion = $('#observacion').val();
        let privacidad = $('#privacidad').val();

        let objeto = {
            tipo_recurso: recurso,
            id_tipo_recurso: id_tipo_recurso,
            observacion: observacion,
            privacidad: privacidad,
        }
        let arrayInsumos;
        if (type == 'insumo')
            arrayInsumos = $('tr#' + id + '').attr('data_insumos');
        else
            arrayInsumos = $('tr#' + id + '').attr('data_productos');

        //var x = JSON.stringify(arrayInsumos)
        var y = JSON.parse(arrayInsumos)

        const exist = y.some(data => data.id_tipo_recurso === id_tipo_recurso);
        if (!exist) {
            y.push(objeto)
            y = JSON.stringify(y);
            if (type == 'insumo')
                $('tr#' + id + '').attr('data_insumos', y);
            else
                $('tr#' + id + '').attr('data_productos', y);

            fill(id);
        }






    }

    function addResource(e, tipo) {
        id_actividad = $(e).closest('tr').attr('data_id');

        let textModal = "";

        if (tipo == 1) {
            type = 'insumo';
        } else {
            type = 'producto';

        }

        textModal = "Agregar " + type + "s";
        $('#modalRecursos h5#exampleModalLabel').text(textModal)

        fill(id_actividad)
        $(".js-data-example-ajax").empty();
        $('#modalRecursos').modal('show');
    }

    function select2() {
        $(".js-data-example-ajax").select2({
            ajax: {
                url: "{{route('tipo_recursos.buscar')}}",
                dataType: 'json',
                type: "GET",
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    console.log(data);
                    var res = data.map(function(item) {
                        console.log(item)
                        return {
                            id: item.id_tipo_recurso,
                            text: item.tipo_recurso
                        };
                    });
                    return {
                        results: res
                    };
                }
            },

        });
    }


    function edit() {
        $(document).on('click', '.editItem', async function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let res = await $.get(url);
            $('#modalCreateActivity .modal-body').html(res)
            $('#modalCreateActivity').modal('show')

        })
    }

    function validate(id) {
        let elements = $('#tablePlantilla tr');
        let flag = false;
        $.each(elements, function(k, v) {

            let myId = $(v).attr('data_id')

            if (myId == id) {
                flag = true;

            }

        })
        return flag;

    }

    function add() {
        $(document).on('click', '.addItem', async function(e) {
            e.preventDefault();
            let element = $(this);
            let id = element.attr('data_id')
            let validates = await validate(id);

            if (validates) {
                return false;
            }
            let description = element.closest('tr').find('td:first-child').text();
            let type = element.closest('tr').find('td:nth-child(2)').text();
            let time = element.closest('tr').find('td:nth-child(3)').text();
            let icon = 'fa-cogs';
            let html;
            if (type != 'Actividad') {
                icon = 'fa-question-circle';
                html = `<tr data_orden="" id="${id}" data_insumos='[{"tipo_recurso":"","id_tipo_recurso":"","observacion":"","privacidad":""}]' data_productos='[{"tipo_recurso":"","id_tipo_recurso":"","observacion":"","privacidad":""}]' class="item" data_id = "${id}">
                            <td><a href="#" onclick="conect(this, event, ${id})"><i class="fas ${icon}"></i></a></td>
                            <td>${description}</td>
                            <td>${time}</td>
                            <td><a onclick ="addResource(this, 1)" class=""  href="#"><i class="fas fa-plus"></i></a></td>
                            <td><a onclick = "addResource(this, 2)" class=""  href="#"><i class="fas fa-plus"></i></a></td>
                            <td><a class="deleteItemPlantilla" href="javascript:void(0)">Eliminar</a></td>
                        </tr>`;

            } else {
                html = `<tr data_orden="" id="${id}" data_insumos='[{"tipo_recurso":"","id_tipo_recurso":"","observacion":"","privacidad":""}]' data_productos='[{"tipo_recurso":"","id_tipo_recurso":"","observacion":"","privacidad":""}]' class="item" data_id = "${id}">
                            <td><i class="fas ${icon}"></i></td>
                            <td>${description}</td>
                            <td>${time}</td>
                            <td><a onclick ="addResource(this, 1)" class=""  href="#"><i class="fas fa-plus"></i></a></td>
                            <td><a onclick = "addResource(this, 2)" class=""  href="#"><i class="fas fa-plus"></i></a></td>
                            <td><a class="deleteItemPlantilla" href="javascript:void(0)">Eliminar</a></td>
                        </tr>`;

            }


            $('#tablePlantilla tbody').find('tr:last').prev().after(html);

            order();
        })
    }
    $(document).ready(function() {
        let type = '';
        add()
        edit()
        select2();
        savePlantilla();

        $('.main-header .nav-link').click();
        $('#activitiesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },

            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": "{{ route('actividades_plantillas.index') }}",
            "columns": [{
                    data: 'actividad',
                    name: 'actividad'
                },
                {
                    data: 'tipo',
                    name: 'tipo'
                },

                {
                    data: 'tiempo',
                    name: 'tiempo'
                },

                {
                    data: 'acciones',
                    name: 'acciones'
                },


            ]
        });
    })

    $(document).off('click', '#formCreateActivity #btnSubmit').on('click', '#formCreateActivity #btnSubmit', async function(e) {
        e.preventDefault();
        if (!$('#formCreateActivity')[0].checkValidity()) {
            $('#formCreateActivity')[0].reportValidity();
            return false;
        }
        $('#formCreateActivity #btnSubmit').prop('disabled', true);
        let myForm = $('#formCreateActivity').serializeArray()
        let url = "{{route('actividades_plantillas.store')}}"
        let result = await $.post(url, myForm);
        if (result) {
            if (result.code == 201) {
                $('#modalCreateActivity').modal('hide');

                $('#activitiesTable').DataTable().ajax.reload();

            }
        }

    });

    $(document).off('click', '#formUpdateActivity #btnSubmitEdit').on('click', '#formUpdateActivity #btnSubmitEdit', async function(e) {
        e.preventDefault();
        if (!$('#formUpdateActivity')[0].checkValidity()) {
            $('#formUpdateActivity')[0].reportValidity();
            return false;
        }
        $('#formUpdateActivity #btnSubmitEdit').prop('disabled', true);
        let myForm = $('#formUpdateActivity').serializeArray()
        let url = $('#formUpdateActivity').attr('action')
        let result = await $.ajax({
            url: url,
            data: myForm,
            type: 'PUT'
        });
        if (result) {
            if (result.code == 201) {
                $('#modalCreateActivity').modal('hide');
                $('#activitiesTable').DataTable().ajax.reload();
            }
        }

    })
    $(document).on('click', '.deleteItem', async function(e) {
        e.preventDefault();
        if (!confirm("Está seguro que desea eliminar este registro?")) {
            return false;
        }

        let url = $(this).attr('href')
        let result = await $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                '_token': "{{csrf_token()}}"
            }
        });
        if (result) {
            if (result.code == 201) {
                $('#modalCreateActivity').modal('hide');
                $('#activitiesTable').DataTable().ajax.reload();
            }
        }

    })
    $(document).on('click', '.deleteItemPlantilla', async function(e) {
        $(this).closest('tr').remove();
        order();
    })
    $('#btnCreateActivity').on('click', async function(e) {
        let url = "{{route('actividades_plantillas.create')}}";
        let res = await $.get(url);
        $('#modalCreateActivity .modal-body').html(res)
        $('#modalCreateActivity').modal('show')
    })
    $('#simpleList').sortable({

        filter: ".nosort",
        onMove: function(evt) {
            return evt.related.className.indexOf('nosort') === -1;
        },
        onUpdate: function( /**Event*/ evt) {

            order();
        },

    });
</script>
@endpush