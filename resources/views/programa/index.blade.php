@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestión de programas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a role="button" href="{{route('programas.create')}}" class="btn btn-primary float-right">Crear programa</a>
                </div>

            </div><!-- /.row -->
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="programaTable" class="table myDatatables table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Programa</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Escuela</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($programas as $programa)
                                <tr>

                                    <td>{{$programa->programa}}</td>
                                    <td>{{$programa->level->nivel}}</td>
                                    <td>{{$programa->escuela->escuela}}</td>

                                    <td>
                                        <a class="btn  btn-outline-warning" href="{{route('programas.edit', $programa->id_programa)}}">Editar</a>

                                        <form autocomplete="off"  style="display: inline-block;" action="{{ route('programas.destroy', $programa->id_programa) }}" method="post">
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
                    data: 'acciones',
                    name: 'acciones'
                },

            ]
        });


    })
</script>
@endpush