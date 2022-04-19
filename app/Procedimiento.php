<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = 'procedimientos';
    protected $primaryKey = 'id_procedimiento';
    protected $fillable = ['nombre', 'anotacion', 'estado', 'fecha_inicio', 'id_usuario_responsable', 'id_programa', 'id_plantilla_procedimiento', 'programa', 'tipo', 'id_estudiante' ];
   

    public function programa()
    {
        return $this->hasOne('App\Programa', 'id_programa', 'id_programa');
    }

    public function plantilla(){
        return $this->hasOne('App\PlantillaProcedimiento', 'id_plantilla_procedimiento', 'id_plantilla_procedimiento');

    }
    public function lider(){
        return $this->hasOne('App\User', 'id', 'id_usuario_responsable');

    }
    public function estudiante(){
        return $this->hasOne('App\User', 'id', 'id_estudiante');

    }
    public function versiones(){
        return $this->hasOne('App\Version', 'id_procedimiento', 'id_procedimiento');

    }
    public function anexos(){
        return $this->hasMany('App\Anexo', 'id_procedimiento', 'id_procedimiento');

    }

}
