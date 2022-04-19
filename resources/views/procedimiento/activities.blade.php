<div  class="table-responsive">

    <table id="tableActivities" class="table table-striped">
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
            @forelse($lineaTiempo as $actividad)
            <tr id="{{$actividad->actividad->id_actividad}}">
                <td >{{$actividad->actividad->actividad}}</td>
                <td>{{$actividad->actividad->tiempo}} días</td>
                <td>{{$actividad->actividad->tipo}} </td>
                <td>{{$actividad->actividad->paralela}} </td>
                <td id="perfil{{$actividad->actividad->id_actividad}}" data_id="{{$actividad->actividad->id_actividad}}">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="sel1">Perfil:</label>
                                <select onchange="loadUsers(this, event)" class="form-control">
                                    <option disabled selected >Seleccione...</option>
                                    @forelse($perfiles as $perfil)
                                    <option value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                    @empty
                                    @endforelse
    
                                </select>
                            </div>
    
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="sel1">Usuario:</label>
                                <select style="width: 150%" class="js-data-example-ajax user form-control">
    
    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a class="deleteRed align-bottom" onclick="delete_user(this, event)" href="#"><i class="fas fa-user-minus"></i></a>
    
    
                        </div>
    
                    </div>
                    <div class="row">
                        <a onclick="add_user(this, event)" href="{{route('procedimientos.add_user')}}"><i class="fas fa-user-plus"></i></a>
    
                    </div>
    
                </td>
    
            </tr>
            @empty
            @endforelse
    
        </tbody>
    </table>
</div>