<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model

{
    use SoftDeletes;
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';
    protected $fillable = ['perfil' ];

    // public function teacher()
    // {
    //     return $this->hasOne('App\User', 'id', 'id_user');
    // }

}
