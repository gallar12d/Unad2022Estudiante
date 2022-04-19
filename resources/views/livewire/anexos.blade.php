<div>
    <div style="max-width: 85% " class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anexos del procedimiento </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="save" method="post">

                    @csrf
                    <div class="form-group">
                        <label for="descripcion">Descripción anexo</label>
                        <input  wire:model="descripcion" name="descripcion" type="text" class="form-control" id="descripcion">
                        @error('descripcion') <span style="color:red" class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-group">
                        <label for="archivo">Archivo</label>
                        <input wire:model="archivo" type="file"  name="archivo" class="form-control" id="archivo{{$counter}}"></input>
                        @error('archivo') <span style="color:red" class="error">{{ $message }}</span> @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Subir anexo</button>
                </form>
                <hr>
                <div class="table-responsive">
                    <table id="anexos" class="table  table-striped">
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Ver</th>
                                <th scope="col">Fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($anexos as $key => $a)

                            <tr class="">
                                <td>{{$key + 1}}</td>
                                <td>{{$a->descripcion}}</td>

                                <td>
                                    @if($a->file)
                                    <a target="_blank" href="{{asset('/public/archivos/anexos/'.$a->file)}}">{{$a->file}}</a>

                                    @else
                                    <h6>N/A</h6>
                                    @endif
                                </td>

                                <td>{{$a->created_at}}</td>

                            </tr>
                            @empty
                            @endforelse


                        </tbody>

                    </table>
                </div>



            </div>

        </div>
    </div>
</div>