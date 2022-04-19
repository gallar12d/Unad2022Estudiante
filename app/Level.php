<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class level extends Model

{
    use SoftDeletes;
    protected $table = 'level';
    protected $primaryKey = 'id_level';
    protected $fillable = ['name', 'code'];

    public function teacher()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

}
