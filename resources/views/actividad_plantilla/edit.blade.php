<form autocomplete="off"  id="formUpdateActivity" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('actividades_plantillas.update', $activity->id_actividad)}}">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-header">
            <h5>Datos iniciales</h5>
            <hr>
            <h6>Campos con un asterisco(*) son obligatorios!</h6>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
            <div class="form-group col-md-12 col-lg-12">
                    <label for="actividad">Actividad*</label>
                    <input value="{{$activity->actividad}}" required name="actividad" type="text" class="form-control" id="actividad" placeholder="Actividad">
                </div>
                <div class="form-group col-md-12 col-lg-12">
                    <label for="descripcion">Descripción actividad*</label>
                    <input  value="{{$activity->descripcion}}" name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion">
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="tipo">Tipo* </label>
                    <select name="tipo" required class="form-control" id="tipo">
                        <option {{($activity->tipo == "actividad")? "selected" : "" }} value="actividad">Actividad</option>
                        <option {{($activity->tipo == "desicion")? "selected" : "" }} value="desicion">Desición</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="paralela">Actividad paralela* </label>
                    <select name="paralela" required class="form-control" id="paralela">
                        <option {{($activity->paralela == "no")? "selected" : "" }} value="no">No</option>
                        <option {{($activity->paralela == "si")? "selected" : "" }} value="si">Sí</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="tiempo">Tiempo (días)*</label>
                    <input value="{{$activity->tiempo}}" required name="tiempo" type="number" class="form-control" id="tiempo" placeholder="tiempo">
                </div>
                <div class="col-md-12">
                    <button type="submit" id="btnSubmitEdit" class="btn btn-primary float-right">Editar actividad</button>
                </div>

            </div>

        </div>
    </div>




</form>
@push('scripts')
<script>

</script>
@endpush