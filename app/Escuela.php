<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';
    protected $primaryKey = 'id_escuela';
    protected $fillable = ['escuela', 'sigla'];
   
}
