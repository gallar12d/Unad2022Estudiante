<form autocomplete="off" id="formCreateActivity" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('actividades_plantillas.store')}}">
    @csrf

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
                    <input required name="actividad" type="text" class="form-control" id="actividad" placeholder="Actividad">
                </div>
                <div class="form-group col-md-12 col-lg-12">
                    <label for="descripcion">Descripción actividad</label>
                    <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción">
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="tipo">Tipo* </label>
                    <select name="tipo" required class="form-control" id="tipo">
                        <option value="actividad">Actividad</option>
                        <option value="desicion">Desición</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="paralela">Actividad paralela* </label>
                    <select name="paralela" required class="form-control" id="paralela">
                        <option value="no">No</option>
                        <option value="si">Sí</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="tiempo">Tiempo (días)*</label>
                    <input required name="tiempo" type="number" class="form-control" id="tiempo" placeholder="tiempo">
                </div>
                <div class="col-md-12">
                    <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Crear actividad</button>


                </div>

            </div>

        </div>
    </div>




</form>
@push('scripts')
<script>

</script>
@endpush