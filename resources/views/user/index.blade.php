@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestión de usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('users.create')}}" class="btn btn-primary float-right">Crear usuario</a>
                </div>

            </div><!-- /.row -->
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable" class="table  table-striped">
                            <thead>
                                <tr>

                                    <th scope="col">Nombre</th>
                                    <th scope="col">Identificación</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Perfil</th>
                                    <th scope="col">Roles</th>

                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>

                        </table>
                    </div>
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
@push('scripts')
<script>
    function confirm_delete() {
        return confirm('Está seguro que desea eliminar este registro? ');
    }
    $(document).ready(function() {

        $('#usersTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('users.index') }}",
            "columns": [{
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'numero_identificacion',
                    name: 'Identificación'
                },

                {
                    data: 'estado',
                    name: 'estado'
                },

                {
                    data: 'perfil',
                    name: 'perfil'
                },
                {
                    data: 'roles',
                    name: 'roles'
                },
                {
                    data: 'acciones',
                    name: 'acciones'
                },

            ]
        });


    })
</script>
@endpush