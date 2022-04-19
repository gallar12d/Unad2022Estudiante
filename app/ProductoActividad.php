<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoActividad extends Model
{
    protected $table = 'producto_actividades';
    protected $primaryKey = 'id_producto';
    public function tipo_recurso()
    {
        return $this->hasOne('App\TipoRecurso', 'id_tipo_recurso', 'id_tipo_recurso');
    }
    public function repositorio()
    {
        return $this->hasOne('App\Repositorio', 'id_producto', 'id_producto');
    }
    public function actividad()
    {
        return $this->hasOne('App\Actividad', 'id_actividad', 'id_actividad');
    }
}
