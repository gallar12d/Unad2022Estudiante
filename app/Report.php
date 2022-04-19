<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model

{
    use SoftDeletes;
    protected $table = 'report';
    protected $primaryKey = 'id_report';
    protected $fillable = [
        'title', 'description', 'date_report', 'id_level', 'id_user', 
    ];

    public function student()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function file(){
        return $this->hasOne('App\File', 'id_report', 'id_report');
    }

    public function level(){
        return $this->hasOne('App\Level', 'id_level', 'id_level');
    }


    


}
