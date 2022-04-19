@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- <div class="row">
                <form class="col-md-12" autocomplete="off" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('permisos.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="programa">Nombre permiso*</label>
                            <input required name="name" type="text" class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                    <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Crear</button>

                </form>

            </div> -->
            <hr>
            <div class="row">

                <div class="card col-md-12">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="programaTable" class="table myDatatables table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Permiso</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($permisos as $permiso)
                                    <tr>

                                        <td>{{$permiso->name}}</td>



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




    })
</script>
@endpush