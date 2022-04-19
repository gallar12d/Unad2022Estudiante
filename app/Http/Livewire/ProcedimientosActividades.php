<?php

namespace App\Http\Livewire;

use App\Actividad;
use App\PersonalActividad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProcedimientosActividades extends Component
{
    public $id_procedimiento = '';
    protected $listeners = ['change_procedimiento'];

    public function change_procedimiento()
    {
        $this->emit('change_id', $this->id_procedimiento);
    }



    public function render()
    {

        $procedimientos = [];
        $mis_actividades = [];


        $actividades = PersonalActividad::where('id_usuario', Auth::user()->id)->get();
        if ($actividades) {

            foreach ($actividades as $a) {
                if (!in_array($a->actividad->procedimiento, $procedimientos)) {

                    $procedimientos[] = $a->actividad->procedimiento;
                }
            }
        }
        if ($actividades) {
            foreach ($actividades as $a) {
                if ($a->actividad->procedimiento->id_procedimiento == $this->id_procedimiento) {
                    $mis_actividades[] = $a;
                }
            }
        }

        return view('livewire.procedimientos-actividades',  compact('procedimientos', 'mis_actividades'));
    }
}
