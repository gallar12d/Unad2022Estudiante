@extends('layouts.app_admin_lte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de boletín </h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('reports.index', $level->id_level)}}" class="btn btn-primary float-right">boletines</a>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <form autocomplete="off"  autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('reports.update', $report->id_report)}}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>Datos iniciales</h5>
                        <hr>
                        <h6>Campos con un asterisco(*) son oblicatorios!</h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="title">Título</label>
                                <input value="{{$report->title}}" required name="title" type="text" class="form-control" id="titulo" placeholder="Título boletín">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description">Descripción</label>
                                <textarea name="description" class="form-control" id="description" rows="3">{{$report->description}}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="id_user">Seleccionar estudiante </label>
                                <select name="id_user" required class="form-control" id="levels">
                                    @forelse($students as $student)
                                    <option {{($report->id_user == $student->id)? 'selected':''}} value="{{$student->id}}">{{$student->primer_nombre}} {{$student->primer_apellido}} - {{$student->numero_identificacion}}</option>
                                    @empty
                                    @endforelse

                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="date_report">Fecha de boletin</label>
                                <input value="{{$report->date_report}}" name="date_report" type="date" class="form-control" id="date_report">
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="archivo">Boletin pdf</label>
                                <input name="archivo" type="file" class="form-control" id="archivo" placeholder="Fecha de nacimiento">

                                @if ($errors->has('archivo'))
                                <span class="text-danger">El tipo de archivo que intentas subir no es soportado, recuerda que sólo puedes subir archivos con extensiones: .jpg, .gif, .png, .pdf</span>
                                @endif

                                <p>
                                    <a  target="_blank" href="{{asset('reports_pdf/'.$report->file->file)}}">
                                        Ver archivo
                                    </a>

                                </p>

                            </div>



                        </div>
                        <input type="hidden" value="{{$level->id_level}}" name="id_level">
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Modificar boletín</button>




                    </div>
                </div>



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