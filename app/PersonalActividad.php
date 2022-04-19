<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalActividad extends Model
{
    protected $table = 'personal_actividades';
    protected $primaryKey = 'id_personal_actividad';

    public function usuario()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario');
    }

    public function actividad()
    {
        return $this->hasOne('App\Actividad', 'id_actividad', 'id_actividad');
    }


}
