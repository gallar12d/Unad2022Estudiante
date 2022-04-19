<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadPlantilla extends Model
{
    protected $table = 'actividad_plantillas';
    protected $primaryKey = 'id_actividad';
    protected $fillable = ['actividad', 'descripcion', 'tipo', 'tiempo', 'paralela'];
}
