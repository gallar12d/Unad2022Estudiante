<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repositorio extends Model
{
    protected $table = 'repositorios';
    protected $primaryKey = 'id_repositorio';
    protected $fillable = ['ruta_recurso', 'fecha_registro'];
    public function autor()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario_registro');
    }
    // public function repositorios()
    // {
    //     return $this->hasMany('App\Repositorio', 'id_tipo_recurso', 'id_tipo_recurso');
    // }
}
