@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de escuela</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('escuelas.update', $escuela->id_escuela)}}">
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
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="primer_nombre">Nombre escuela*</label>
                                <input required value="{{$escuela->escuela}}" name="escuela" type="text" class="form-control" id="primer_nombre" placeholder="Primer nombre">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="segundo_nombre">Sigla</label>
                                <input value="{{$escuela->sigla}}" name="sigla" type="text" class="form-control" id="segundo_nombre" placeholder="Segundo nombre">
                            </div>

                        </div>
                    </div>
                </div>


                <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar escuela</button>






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