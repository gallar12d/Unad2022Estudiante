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
            <select class=" user form-control">


            </select>
        </div>
    </div>
    <div class="col-md-2">
        <a class=" deleteRed align-bottom" onclick="delete_user(this, event)" href="#"><i class="fas fa-user-minus"></i></a>


    </div>

</div>