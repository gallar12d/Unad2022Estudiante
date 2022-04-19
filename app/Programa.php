<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';
    protected $primaryKey = 'id_programa';
    protected $fillable = ['programa', 'nivel', 'id_escuela'];
    public function escuela()
    {
        return $this->hasOne('App\Escuela', 'id_escuela', 'id_escuela');
    }

    public function level()
    {
        return $this->hasOne('App\Nivel', 'id_nivel', 'nivel');
    }
}
