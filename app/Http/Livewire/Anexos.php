<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;

use App\Anexo;
use Livewire\Component;

class Anexos extends Component
{

    use WithFileUploads;
    public $id_procedimiento;
    public $descripcion = "";

    public $archivo;
    public $counter = 1;



    public function mount($id)
    {
        $this->id_procedimiento = $id;
    }
    public function render()

    {

        $anexos = Anexo::where('id_procedimiento', $this->id_procedimiento)->orderBy('id_anexo', 'desc')->get();

        return view('livewire.anexos', compact('anexos'));
    }

    public function save()
    {

        $this->validate([
            'archivo' => 'required|mimes:pdf,docx,zip,jpg,jpeg,png|max:10000', 
            'descripcion' => 'required',
        ]);
        try {

            $name = $this->archivo->getClientOriginalName();

            
            $path = $this->archivo->storeAs(
                'archivos/anexos', $name, ['disk' => 'public_uploads']);
            $new_anexo = new Anexo();
            $new_anexo->descripcion = $this->descripcion;
            $new_anexo->id_procedimiento = $this->id_procedimiento;
            $new_anexo->file = $name;
            $new_anexo->save();
            $this->reset(['descripcion', 'archivo']);
            $this->counter++;
        } catch (\Illuminate\Validation\ValidationException $e) {
            return \response($e->errors(), 400);
        }
    }
}
