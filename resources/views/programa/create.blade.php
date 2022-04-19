@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Creación de programa</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('programas.store')}}">
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
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="programa">Nombre programa*</label>
                                <input required name="programa" type="text" class="form-control" id="programa" placeholder="Programa">
                            </div>
                            
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="nivel">Nivel* </label>
                                <select name="nivel" required class="form-control" id="nivel">
                                    @forelse($niveles as $n)
                                    <option value="{{$n->id_nivel}}">{{$n->nivel}}</option>

                                    @empty
                                    @endforelse
                                    
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="nivel">Escuela* </label>
                                <select name="id_escuela" required class="form-control" id="nivel">
                                    @forelse ($escuelas as $escuela)
                                    <option value="{{$escuela->id_escuela}}">{{$escuela->escuela}}</option>
                                    @empty
                                    @endforelse                                   
                                    
                                </select>
                            </div>

                        </div>
                    </div>
                </div>


                <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Crear programa</button>






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