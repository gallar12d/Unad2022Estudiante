<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_cead';
    protected $fillable = ['cead', 'id_zona', 'codigo', 'sigla'];
    public function zona()
    {
        return $this->hasOne('App\Zona', 'id_zona', 'id_zona');
    }
}
