@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">

                    <h3 class="my-3">Detalles</h3>
                    <ul>
                        <li><strong>Procedimiento:</strong> {{$procedimiento->nombre}}</li>


                        <li><strong>Fecha inicio:</strong> {{$procedimiento->fecha_inicio}}</li>
                        <li><strong>Lider de procedimiento:</strong> {{$procedimiento->lider->primer_nombre}} {{$procedimiento->lider->primer_apellido}} - {{$procedimiento->lider->perfil->perfil}}</li>
                        <li><strong>Estudiante:</strong> {{($procedimiento->estudiante) ? $procedimiento->estudiante->primer_nombre.' '.$procedimiento->lider->primer_apellido : 'N/A'}} </li>
                       
                        <li><strong>Escuela:</strong> {{$procedimiento->programa->escuela->escuela}}</li>

                        <li><strong>Programa:</strong> {{$procedimiento->programa->programa}}</li>
                        <li><strong>Tipo:</strong> {{$procedimiento->tipo}}</li>
                        <li><strong>Estado:</strong> {{$procedimiento->estado}}</li>
                        <!-- <li><strong>Version Actual:</strong> {{$version}}</li> -->

                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="my-3">Operaciones</h3>
                    <ul>
                        <!-- @if($type == 'url')
                        <li><strong>Documento general:</strong> <a target="_blank" href="{{$url_version}}">{{$url_version}}</a> </li>

                        @else
                        <li><strong>Documento general:</strong> <a target="_blank" href="{{asset('/public/archivos/versiones/'.$url_version)}}">Ver</a> </li>

                        @endif -->
                        <!-- <li><strong>Ruta repositorio raíz:</strong> <a target="_blank" href="{{$procedimiento->ruta_raiz}}">{{$procedimiento->ruta_raiz}}</a></li> -->
                        <li><strong>Ruta pública anexos:</strong> <a target="_blank" href="{{route('procedimientos.anexos_publicos', $procedimiento->id_procedimiento)}}">Listado anexos</a></li>

                        <!-- <li><a onclick="modalVersionar(this, event)" href="#">Versionar</a></li> -->
                        <li><a onclick="modalAnexos(this, event)" href="#">Anexos</a></li>

                        <li><a onclick="modalAnotacion(this, event)" href="#">Anotaciones</a></li>
                        <li><a target="_blank"  href="{{route('procedimientos.reporte_seguimiento', $procedimiento->id_procedimiento)}}">Reporte de seguimiento</a></li>


                    </ul>

                </div>




            </div>
            <hr>



            <div class="row">
                <div class="col-md-3">
                    <canvas id="myChart" width="300" height="300"></canvas>
                </div>
            </div>
            <hr>
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="escuelaTable" class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>

                                    <th scope="col">Actividad</th>
                                    <th scope="col">Fecha inicio</th>

                                    <th scope="col">Fecha cierre</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Insumos</th>
                                    <th scope="col">Productos</th>
                                    <th scope="col">Responsables</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($actividades as $a)

                                <!-- <tr class="{{($a->orden <= $procedimiento->posicion)? 'fillPosition': ''}}">
                                 -->
                                <tr class="{{($a->estado == 'Finalizada')? 'fillPosition': ''}}">
                                    <td>{{$a->orden}}</td>

                                    <!-- <td class="mytooltip" data-toggle="tooltip" data-placement="top" title="{{$a->descripcion}}">{{$a->actividad}}</td> -->
                                    <td><strong>
                                            <h6>{{$a->actividad}}</h6>
                                        </strong>
                                        <small>{{$a->descripcion}}</small>
                                    </td>

                                    <td style="width: 15%;">{{$a->fecha_inicio}}</td>
                                    <td style="width: 15%;">
                                        {{$a->fecha_cierre}}
                                        <br>
                                        @php
                                        $diff = 0;
                                        $perc = 30;
                                        $f1 = new DateTime(date('Y-m-d'));
                                        $f2 = new DateTime($a->fecha_cierre);
                                        $diff = $f1->diff($f2);
                                        $diff = $diff->format('%R%a');
                                        $color = "";
                                        switch (true) {
                                            case ($diff > 5):
                                                $color = "bg-success";
                                                $perc = 50;
                                            break;
                                            case ($diff >= 3 && $diff <= 5): $color="bg-warning";
                                                $perc=70;
                                            break;
                                            case ($diff < 3): $color="bg-danger" ;
                                                $perc=90; 
                                            break; 
                                            case ($diff < 0): $color="bg-danger" ;
                                             $perc=100; break;
                                        }
                                        @endphp
                                        @if($a->estado != 'Finalizada')
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated {{($a->estado == 'Finalizada')? 'bg-info': $color}} " role="progressbar" aria-valuenow="{{($a->estado == 'Finalizada')? '100': $perc}}" aria-valuemin="0" aria-valuemax="100" style="width: {{($a->estado == 'Finalizada')? '100': $perc}}%"> {{($a->estado == 'Finalizada')? 'Finalizada': $diff.' días'}} </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{$a->estado}}</td>
                                    <td>
                                        <a onclick="getResources(this, event)" href="{{route('actividades.insumos', $a->id_actividad)}}"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a onclick="getResources(this, event)" href="{{route('actividades.productos', $a->id_actividad)}}"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td style="width: 150px;">
                                        <ul>
                                            @forelse($a->responsables as $r)
                                            <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td>
                                        @if($a->tipo == 'actividad')
                                        <div class="custom-control custom-switch">
                                            <input data_tipo="{{$a->tipo}}" {{($a->estado == 'Finalizada')? 'checked': ''}} onchange="finish(this, event)" data_url="{{route('actividades.finish', $a->id_actividad)}}" type="checkbox" class="custom-control-input" id="switch{{$a->id_actividad}}">
                                            <label class="custom-control-label" for="switch{{$a->id_actividad}}">{{($a->estado == 'Finalizada')? 'Habilitar': 'Finalizar'}}</label>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Decisión</label>
                                            <select data_url="{{route('actividades.finishdecision', $a->id_actividad)}}" onchange="decision(this, event, {{$a->id_actividad}})" class="form-control">
                                                <option value="0" selected>Pendiente</option>
                                                <option {{($a->estado == 'Finalizada')? 'selected': ''}} value="1">Sí</option>
                                                <option value="2">No</option>

                                            </select>
                                        </div>

                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse


                            </tbody>

                        </table>
                    </div>
                    <div class="row float-right">
                        <button onclick="finishProcedure(this, event)" data_url="{{route('procedimientos.finish', $procedimiento->id_procedimiento)}}" type="submit" id="finishProcedimiento" class="btn btn-primary float-right">Finalizar procedimiento</button>
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
<div id="modalResources" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>
<div id="modalVersion" class="modal" tabindex="-1" role="dialog">
    <div style="max-width: 85% " class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Versiones del procedimiento </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="{{route('procedimientos.versionar', $procedimiento->id_procedimiento)}}">
                    @csrf
                    <div class="form-group">
                        <label for="version">Versión</label>
                        <input readonly name="version" type="text" class="form-control" id="version" value="{{$version + 1}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Archivo</label>
                        <input type="file" required name="archivo" class="form-control" id="archivo"></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ruta/Url</label>
                        <textarea name="url_documento" class="form-control" id="url_documento" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentarios</label>
                        <textarea name="comentarios" class="form-control" id="comentarios" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Versionar</button>
                </form>
                <hr>
                <div class="table-responsive">
                    <table id="escuelaTable" class="table  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Versión</th>
                                <th scope="col">Ruta/Url</th>
                                <th scope="col">Archivo</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($versiones as $key => $a)
                            <tr class="">
                                <td>{{$a->version}}</td>
                                <td>
                                    @if($a->url_documento)
                                    <a target="_blank" href="{{$a->url_documento}}">Ver</a>

                                    @else
                                    <h6>N/A</h6>
                                    @endif
                                </td>
                                <td>
                                    <a target="_blank" href="{{asset('/public/archivos/versiones/'.$a->file)}}">{{$a->file}}</a>
                                </td>
                                <td>{{$a->comentarios}}</td>
                                <td>{{$a->created_at}}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalAnexos" class="modal" tabindex="-1" role="dialog">
    <livewire:anexos :id="$procedimiento->id_procedimiento" />
</div>
<div id="modalAnotacion" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anotaciones del procedimiento </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('procedimientos.anotacion', $procedimiento->id_procedimiento)}}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Anotación nueva</label>
                        <textarea name="anotacion" class="form-control" id="anotacion" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear anotación</button>
                </form>
                <hr>
                <table id="escuelaTable" class="table  table-striped">
                    <thead>
                        <tr>

                            <th scope="col">No</th>
                            <th scope="col">Anotacion</th>
                            <th scope="col">Fecha</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anotaciones as $key => $a)

                        <tr class="">
                            <td>{{$key + 1}}</td>
                            <td>{{$a->anotacion}}</td>
                            <td>{{$a->created_at}}</td>

                        </tr>
                        @empty
                        @endforelse


                    </tbody>

                </table>


            </div>

        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    let contexto = '';

    function decision(me, e, id_actividad) {
        e.preventDefault()
        if (confirm('Realmente desea cambiar el estado de esta decisión?')) {
            let url = $(me).attr('data_url');
            let val = $(me).val();
            $.post(url, {
                val,
                "_token": "{{ csrf_token() }}"
            }).done(function() {
                location.reload();
            })
        }
    }

    function modalAnotacion(me, e) {
        e.preventDefault();
        $('#modalAnotacion').modal('show')
    }

    function modalVersionar(me, e) {
        e.preventDefault();
        $('#modalVersion').modal('show')

    }

    function modalAnexos(me, e) {
        e.preventDefault();
        $('#modalAnexos').modal('show')
    }
    async function finish(me, event) {
        event.preventDefault();
        tipo = $(me).attr('data_tipo');
        text = 'HABITAR';
        if ($(me).is(":checked"))
            if (tipo == 'actividad')
                text = 'FINALIZAR'
        else
            text = ''
        if (confirm('Realmente deseas ' + text + ' esta actividad?')) {
            $(me).prop('disabled', true);
            let url = $(me).attr('data_url');
            let response = await $.get(url);
            location.reload();
        } else {
            if ($(me).is(":checked"))
                $(me).prop('checked', false);
            else
                $(me).prop('checked', true);
        }


    }
    async function finishProcedure(me, event) {
        event.preventDefault();
        if (confirm('Realmente deseas finalizar este procedimiento?')) {
            let url = $(me).attr('data_url');
            let response = await $.get(url);
            location.reload();
        }

    }



    function openForm(me, event) {
        event.preventDefault();
        $(me).closest('td').find('.addRoute').removeAttr('hidden');
        $(me).parent().hide();


    }
    async function sendRoute(me, event) {
        event.preventDefault();

        if (!$(me).closest('form')[0].checkValidity()) {
            $(me).closest('form')[0].reportValidity();
            return 0
        }

        let url = $(me).closest('form').attr('action');
        let data = $(me).closest('form').serialize();
        let resultado = await $.post(url, data);
        contexto.click();


    }


    async function getResources(me, event) {
        event.preventDefault();
        let url = $(me).attr('href');
        contexto = $(me);

        let response = await $.get(url);
        $('#modalResources .modal-body').html(response);
        $('#modalResources').modal('show')
        $('.mytooltip').tooltip();

    }
    $(document).ready(function() {
        $('.main-header .nav-link').click();
        $('.mytooltip').tooltip();

        var canvas = document.getElementById('myChart');
        let actividades_realizadas = "{{$actividades_realizadas}}";
        let total = "{{$total_actividades}}";
        let faltantes = total - actividades_realizadas
        let porcentaje = (actividades_realizadas * 100) / total



        Chart.pluginService.register({
            beforeDraw: function(chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;

                ctx.restore();
                var fontSize = (height / 300).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";

                var text = "Progreso:" + porcentaje.toFixed(2) + "%",
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;

                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        });





        actividades_realizadas
        new Chart(canvas, {
            type: 'pie',
            data: {
                labels: ['Por realizar', 'Realizadas'],
                datasets: [{
                    data: [faltantes, actividades_realizadas],
                    backgroundColor: ['#007bff5e', '#5daf86bd']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 70,
                // tooltips: {
                //     callbacks: {
                //         label: function(tooltipItem, data) {
                //             return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                //         }
                //     }
                // }
            }
        });




    })
</script>
@endpush