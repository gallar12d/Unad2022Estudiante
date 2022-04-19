<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoActividadPlantilla extends Model
{
        
    protected $table = 'producto_actividad_plantillas';
    protected $primaryKey = 'id_producto_actividad_plantilla';
    protected $fillable = ['id_tipo_recurso', 'id_item', 'observacion', 'privacidad'];
    public function recurso()
    {
        return $this->hasOne('App\TipoRecurso', 'id_tipo_recurso', 'id_tipo_recurso');
    }
}
