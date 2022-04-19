<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $table = 'anexos';
    protected $primaryKey = 'id_anexo';
    protected $fillable = ['descripcion', 'file'];
}
