<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anotacion extends Model
{
    protected $table = 'anotaciones';
    protected $primaryKey = 'id_anotacion';
    protected $fillable = ['anotacion'];
}
