@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Creación de plantilla para procedimiento</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('plantillas_procedimientos.store')}}">
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
                                <label for="primer_nombre">Nombre*</label>
                                <input required name="nombre" type="text" class="form-control" id="primer_nombre" placeholder="nombre">
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="segundo_nombre">Anotación</label>
                                <input name="anotacion" type="text" class="form-control" id="segundo_nombre" placeholder="anotacion">
                            </div>

                        </div>
                    </div>
                </div>


                <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Crear plantilla</button>






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