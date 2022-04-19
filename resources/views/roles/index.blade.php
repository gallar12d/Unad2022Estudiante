@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-12" autocomplete="off" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('roles.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="programa">Nombre Rol*</label>
                            <input required name="name" type="text" class="form-control" id="name" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect2">Permisos</label>
                            <select required multiple class="js-example-basic-multiple form-control" id="permisos" name="permisos[]">

                                @forelse($permisos as $p)
                                <option>{{$p->name}}</option>

                                @empty
                                @endforelse

                            </select>
                        </div>
                    </div>

                    <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Crear</button>

                </form>

            </div><!-- /.row -->
            <hr>
            <div class="row">

                <div class="card col-md-12">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="programaTable" class="table myDatatables table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Permisos</th>
                                        <th scope="col">Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $rol)
                                    <tr>
                                        <td>{{$rol->name}}</td>
                                        <td>{{$rol->permissions->implode('name', ', ')}}</td>
                                        <td>
                                            <a class="btn  btn-outline-warning" href="{{route('roles.edit', $rol->id)}}">Editar</a>
                                            <form autocomplete="off" style="display: inline-block;" action="{{ route('roles.destroy', $rol->id) }}" method="post">
                                                <input onclick='return confirm("Está seguro que desea eliminar este registro?")' class="btn  btn-outline-danger" type="submit" value="Eliminar" />
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
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
    function confirm_delete() {
        return confirm('Está seguro que desea eliminar este registro? ');
    }
    $(document).ready(function() {
        $(".js-example-basic-multiple").select2({
            theme: "classic"
        })




    })
</script>
@endpush