<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Activity extends Model
{
    //
    use SoftDeletes;
    protected $table = 'activity';
    protected $primaryKey = 'id_activity';
    protected $fillable = [
        'title', 'detail', 'links', 'start_date', 'end_date',
        'state', 'id_level'
    ];

    public function response()
    {
        return $this->hasOne('App\Response', 'id_activity', 'id_activity');
    }
    public function responses()
    {
        return $this->hasMany('App\Response', 'id_activity', 'id_activity');
    }
    public function coordinator()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function respuesta(){
        return $this->hasOne('App\Response', 'id_activity', 'id_activity')->where('id_user', Auth::user()->id);
    }
}
