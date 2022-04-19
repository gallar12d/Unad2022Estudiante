@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de cead</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('centros.update', $centro->id_cead)}}">
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
                                <label for="primer_nombre">Centro*</label>
                                <input value="{{$centro->cead}}" required name="cead" type="text" class="form-control" id="cead">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="nivel">Zona* </label>
                                <select name="id_zona" required class="form-control" id="id_zona">
                                    @forelse($zonas as $n)
                                    <option {{ $centro->id_zona == $n->id_zona ? "selected" : "" }} value="{{$n->id_zona}}">{{$n->zona}}</option>

                                    @empty
                                    @endforelse


                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="primer_nombre">Código</label>
                                <input value="{{$centro->codigo}}" name="codigo" type="text" class="form-control" id="codigo" placeholder="Código">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="segundo_nombre">Sigla</label>
                                <input value="{{$centro->sigla}}" name="sigla" type="text" class="form-control" id="segundo_nombre" placeholder="Sigla">
                            </div>

                        </div>
                    </div>
                </div>


                <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar zona</button>






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