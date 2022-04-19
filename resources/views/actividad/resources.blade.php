<table id="escuelaTable" class="table myDatatables table-striped">
    <thead>
        <tr>
            <th scope="col">{{$tipo}}</th>

        </tr>
    </thead>
    <tbody>
        @forelse($recursos as $key => $a)
        <tr>

            <td>
                <div class="row mx-1 ">

                    <div class="col-md-12">
                        <h6>
                            <strong>
                                {{$key+1}}. {{$a->tipo_recurso->tipo_recurso}}
                            </strong>
                        </h6>
                    </div>
                </div>
                <hr>
                <div class="row mx-1">
                    <div class="col-md-12">
                        @if($a->repositorio)
                        <div class="acciones">
                            <a class="mytooltip" data-toggle="tooltip" data-placement="top" title="Fecha: {{$a->repositorio->fecha_registro}} - Autor: {{$a->repositorio->autor->primer_nombre}} {{$a->repositorio->autor->primer_apellido}} Ruta: {{$a->repositorio->ruta_recurso}}" target="_blank" href="{{$a->repositorio->ruta_recurso}}">Ver recurso</a>

                            @if($permite && $a->actividad->estado != 'Finalizada')
                            <br>
                            <a onclick="openForm(this, event)" href="#">Modificar recurso</a>
                            <br>
                        </div>

                        <div hidden class=" addRoute">
                            @if($tipo == 'Insumo')
                            <form autocomplete="off" action="{{route('actividades.update_route', [$a->repositorio->id_repositorio, $tipo])}}" method="post">
                            @else
                            <form autocomplete="off" action="{{route('actividades.update_route', [$a->repositorio->id_repositorio, $tipo])}}" method="post">

                            @endif
                            @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="exampleInputEmail1">Ruta de acceso</label>
                                            <input value="{{$a->repositorio->ruta_recurso}}" required type="text" class="form-control" name="ruta_recurso" id="ruta_recurso" aria-describedby="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fecha de registro</label>
                                            <input value="{{$a->repositorio->fecha_registro}}" type="date" name="fecha_registro" class="form-control" id="fecha_registro" aria-describedby="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <button style="margin-top: 32px;" onclick="sendRoute(this, event)" type="submit" class=" btn btn-primary">
                                                <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                            </form>

                        </div>

                            @endif
                        @else
                            @if($permite && $a->actividad->estado != 'Finalizada')

                            <div class=" addRoute">
                                @if($tipo == 'Insumo')
                                <form autocomplete="off" action="{{route('actividades.add_route', [$a->id_insumo, $tipo])}}" method="post">
                                @else
                                <form autocomplete="off" action="{{route('actividades.add_route', [$a->id_producto, $tipo])}}" method="post">

                                @endif
                                @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="exampleInputEmail1">Ruta de acceso</label>
                                                <input required type="text" class="form-control" name="ruta_recurso" id="ruta_recurso" aria-describedby="" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha de registro</label>
                                                <input type="date" name="fecha_registro" class="form-control" id="fecha_registro" aria-describedby="" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <button style="margin-top: 32px;" onclick="sendRoute(this, event)" type="submit" class="  btn btn-primary">
                                                    <i class="fas fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                </form>

                            </div>
                            @else
                            No se ha cargado información
                            @endif
                        @endif

                    </div>

                </div>

            </td>



        </tr>

        @empty
        @endforelse

    </tbody>

</table>