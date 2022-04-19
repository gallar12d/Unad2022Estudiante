<?php

namespace App\Http\Livewire;

use App\PersonalActividad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActividadesProcedimiento extends Component
{
    public $id_procedimiento ;
    protected $listeners = ['change_id'];

    public function change_id( $id_procedimiento)
    {
        $this->id_procedimiento = $id_procedimiento;
   
    }
  
    public function render()
    {
        $mis_actividades = [];
        $actividades = PersonalActividad::where('id_usuario', Auth::user()->id)->get();
        if ($actividades) {
            foreach ($actividades as $a) {
                if ($a->actividad->procedimiento->id_procedimiento == $this->id_procedimiento) {
                    $mis_actividades[] = $a;
                }
            }
        }
        
        return view('livewire.actividades-procedimiento', compact('mis_actividades'));
    }
}
