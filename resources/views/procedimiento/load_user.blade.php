@forelse($usuarios as $u)
<option value="{{$u->id}}">{{$u->primer_nombre}} {{$u->primer_apellido}}</option>
@empty
@endforelse