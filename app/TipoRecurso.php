<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRecurso extends Model
{
    protected $table = 'tipo_recursos';
    protected $primaryKey = 'id_tipo_recurso';
    protected $fillable = ['tipo_recurso'];
    
    
}
