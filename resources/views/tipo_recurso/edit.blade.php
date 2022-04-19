@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de tipo recurso</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('tipo_recursos.update', $recurso->id_tipo_recurso)}}">
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
                                <label for="tipo_recurso">Tipo recurso*</label>
                                <input value = "{{$recurso->tipo_recurso}}" required name="tipo_recurso" type="text" class="form-control" id="tipo_recurso" placeholder="Tipo Recurso">
                            </div>

                        </div>
                    </div>
                </div>


                <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar tipo recurso</button>






            </form>

            <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<!-- /.content -->
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush