@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Creación de perfil</h1>
                </div><!-- /.col -->
                

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form autocomplete="off"  method="post" action="{{route('perfiles')}}">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Perfil</label>
                            <input required name = "perfil" type="text" class="form-control" id="nombre" placeholder="Nombre perfil">
                        </div>
                        
                      
                        <button type="submit" class="btn btn-primary float-right">Crear</button>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
</div>

@endsection