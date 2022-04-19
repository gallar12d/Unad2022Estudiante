<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $primaryKey = 'id_actividad';
    protected $fillable = ['nombre', 'anotacion', 'fecha_inicio', 'id_programa', 'tipo'];
    public function responsables()
    {
        return $this->hasMany('App\PersonalActividad', 'id_actividad', 'id_actividad');
    }
    public function procedimiento(){
        return $this->hasOne('App\Procedimiento', 'id_procedimiento', 'id_procedimiento');
    }
}
