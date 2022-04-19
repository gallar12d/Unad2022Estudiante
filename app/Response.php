<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model

{
    use SoftDeletes;
    protected $table = 'response';
    protected $primaryKey = 'id_response';

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'id_activity', 'id_activity');
    }

    public function files()
    {
        return $this->hasMany('App\File', 'id_file', 'id_file');
    }

    public function student()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }


}
