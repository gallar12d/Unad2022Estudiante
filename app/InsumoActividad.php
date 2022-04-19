<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumoActividad extends Model
{
    protected $table = 'insumo_actividades';
    protected $primaryKey = 'id_insumo';
    public function tipo_recurso()
    {
        return $this->hasOne('App\TipoRecurso', 'id_tipo_recurso', 'id_tipo_recurso');
    }
    public function repositorio()
    {
        return $this->hasOne('App\Repositorio', 'id_insumo', 'id_insumo');
    }
    public function actividad()
    {
        return $this->hasOne('App\Actividad', 'id_actividad', 'id_actividad');
    }

}
