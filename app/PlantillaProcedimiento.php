<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantillaProcedimiento extends Model
{
    protected $table = 'plantilla_procedimientos';
    protected $primaryKey = 'id_plantilla_procedimiento';
    protected $fillable = ['nombre', 'anotacion'];

    public function linea_tiempo(){
        return $this->hasMany('App\LineaTiempo', 'id_plantilla_procedimiento', 'id_plantilla_procedimiento');

    }
}
