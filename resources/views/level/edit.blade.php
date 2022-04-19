@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de nivel</h1>
                </div><!-- /.col -->
                

            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form autocomplete="off"  method="post" action="{{route('levels.update', ['id'=>$level->id_level])}}">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre del nivel</label>
                            <input value="{{$level->name}}" required name = "name" type="text" class="form-control" id="nombre" placeholder="Nombre nivel">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Código del nivel</label>
                            <input value="{{$level->code}}" name="code" type="text" class="form-control" id="codigo" placeholder="Código nivel">
                        </div>
                      
                        <button type="submit" class="btn btn-primary float-right">Modificar</button>
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