<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'versiones';
    protected $primaryKey = 'id_version';
    protected $fillable = ['version', 'comentarios', 'url_documento'];
}
