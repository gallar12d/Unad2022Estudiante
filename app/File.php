<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model

{
    
    protected $table = 'file';
    protected $primaryKey = 'id_file';
   // protected $fillable = ['name', 'code'];

   // public function teacher()
    //{
      //  return $this->hasOne('App\User', 'id', 'id_user');
   // }

}
