@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">
                    <h3 class="my-3">Actividad</h3>
                    <p>{{$actividad->actividad}}</p>
                    <p>{{$actividad->descripcion}}</p>
                    <h3 class="my-3">Detalles</h3>
                    <ul>
                        <li><strong>Procedimiento:</strong> {{$actividad->procedimiento->nombre}}</li>

                        <li><strong>Fecha inicio:</strong> {{$actividad->fecha_inicio}}</li>
                        <li><strong>Fecha cierre:</strong> {{$actividad->fecha_cierre}}</li>
                        <li><strong>Estado:</strong> {{$actividad->estado}}</li>

                    </ul>
                </div>

            </div>
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="escuelaTable" class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Fecha cierre</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Insumos</th>
                                    <th scope="col">Productos</th>
                                    <th scope="col">Responsables</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($actividades as $a)

                                @if($a->orden <= $actividad->orden)
                                    <tr class="{{($a->id_actividad == $actividad->id_actividad)? 'myActivity' : ''}}">
                                        <td class="mytooltip" data-toggle="tooltip" data-placement="top" title="{{$actividad->descripcion}}">{{$a->actividad}}</td>
                                        <td style="width: 150px;">{{$a->fecha_cierre}}</td>
                                        <td>{{$a->estado}}</td>
                                        <td>{{ucfirst($a->tipo)}}</td>

                                        <td>
                                            <a onclick="getResources(this, event)" href="{{route('actividades.insumos', $a->id_actividad)}}"><i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a onclick="getResources(this, event)" href="{{route('actividades.productos', $a->id_actividad)}}"><i class="fas fa-eye"></i></a>


                                        </td>
                                        <td>
                                            <ul>
                                                @forelse($a->responsables as $r)
                                                <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}}  - {{$r->usuario->perfil->perfil}}</li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </td>


                                    </tr>
                                    @endif

                                    @empty
                                    @endforelse
                                    <!-- <tr style="background-color: #bdded5;">

                                    <td>{{$actividad->descripcion}}</td>

                                    <td>{{$actividad->fecha_cierre}}</td>
                                    <td>{{$actividad->estado}}</td>
                                    <td><a onclick="getResources(this, event)" href="{{route('actividades.insumos', $actividad->id_actividad)}}"><i class="fas fa-plus-circle"></i></a></td>
                                    <td><a onclick="getResources(this, event)" href="{{route('actividades.productos', $actividad->id_actividad)}}"><i class="fas fa-plus-circle"></i></a></td>
                                    <td>
                                        <ul>

                                            @forelse($actividad->responsables as $r)
                                            <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </td>


                                </tr> -->

                            </tbody>

                        </table>
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

@endsection
@push('scripts')
<script>
    let contexto = '';

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
        $('.mytooltip').tooltip()

    }

    $(document).ready(function() {
        $('.mytooltip').tooltip();
        var $target = $('html,body');
        $target.animate({
            scrollTop: $target.height()
        }, 1000);

    })
</script>
@endpush