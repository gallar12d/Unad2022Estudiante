<div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Seleccione un procedimiento</label>
        <select wire:model="id_procedimiento" wire:change="$emit('change_procedimiento')" class="form-control" id="procedimiento">
            <option value="">Seleccione...</option>
            @forelse($procedimientos as $p)
            <option value="{{$p->id_procedimiento}}">{{$p->nombre}}</option>
            @empty
            @endif

        </select>
    </div>
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table id="escuelaTable" class="table myDatatables2 table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Orden</th>

                            <th scope="col">Actividad</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Cierre</th>
                            <th scope="col">Procedimiento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mis_actividades as $a)
                        <tr>
                        <td>{{$a->actividad->orden}}</td>

                            <td>{{$a->actividad->actividad}}</td>
                            <td>{{$a->actividad->fecha_inicio}}</td>
                            <td>{{$a->actividad->fecha_cierre}}
                                <br>
                                @php
                                $diff = 0;
                                $perc = 30;
                                $f1 = new DateTime(date('Y-m-d'));
                                $f2 = new DateTime($a->actividad->fecha_cierre);
                                $diff = $f1->diff($f2);
                                $diff = $diff->format('%R%a');
                                $color = "";
                                switch (true) {
                                case ($diff > 5):
                                $color = "bg-success";
                                $perc = 50;
                                break;
                                case ($diff > 3 && $diff <= 5): $color="bg-warning" ; $perc=70; break; case ($diff <=3): $color="bg-danger" ; $perc=90; break; case ($diff < 0): $color="bg-danger" ; $perc=100; break; } @endphp <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated {{($a->actividad->estado == 'Finalizada')? 'bg-info': $color}} " role="progressbar" aria-valuenow="{{($a->actividad->estado == 'Finalizada')? '100': $perc}}" aria-valuemin="0" aria-valuemax="100" style="width: {{($a->actividad->estado == 'Finalizada')? '100': $perc}}%"> {{($a->actividad->estado == 'Finalizada')? 'Finalizada': $diff.' días'}} </div>
            </div>

            </td>
            <td>{{$a->actividad->procedimiento->nombre}}</td>
            <td>{{$a->actividad->estado}} </td>
            <td><a href="{{route('actividades.show', $a->actividad->id_actividad)}}">Ver</a></td>


            </tr>
            @empty
            @endforelse

            </tbody>

            </table>
        </div>
    </div>


   
</div>
@push('scripts')
<script>
    $(document).ready(function() {

    })
   
</script>
@endpush