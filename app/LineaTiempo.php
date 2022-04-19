<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaTiempo extends Model
{
    protected $table = 'linea_tiempos';
    protected $primaryKey = 'id_item';
    protected $fillable = ['id_actividad', 'id_actividad_anterior', 'id_actividad_posterior', 'orden', 'id_plantilla_procedimiento', 'json_insumos', 'json_productos'];
    public function actividad()
    {
        return $this->hasOne('App\ActividadPlantilla', 'id_actividad', 'id_actividad');
    }
    public function insumos()
    {
        return $this->hasMany('App\InsumoActividadPlantilla', 'id_item', 'id_item');
    }
    public function productos()
    {
        return $this->hasMany('App\ProductoActividadPlantilla', 'id_item', 'id_item');
    }

}
