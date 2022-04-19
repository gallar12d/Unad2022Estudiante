@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-12" autocomplete="off" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('roles.update', $rol->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="programa">Nombre Rol*</label>
                            <input value="{{$rol->name}}" required name="name" type="text" class="form-control" id="name" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect2">Permisos</label>
                            <select required multiple class="js-example-basic-multiple form-control" id="permisos" name="permisos[]">

                                @forelse($permisos as $p)
                                <option {{($rol->hasPermissionTo($p->name))? 'selected': ''}}>{{$p->name}}</option>

                                @empty
                                @endforelse

                            </select>
                        </div>
                    </div>

                    <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar</button>

                </form>

            </div><!-- /.row -->
            <hr>

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