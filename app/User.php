<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'id_perfil',  'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'tipo_identificacion', 'numero_identificacion', 
        'celular1', 'celular2', 'telefono', 'direccion', 'ciudad', 'departamento', 'fecha_nacimiento', 
        'nombre_acudiente1', 'direccion_acudiente1', 'celular_acudiente1', 'nombre_acudiente2', 'direccion_acudiente2', 'celular_acudiente2', 
        'estado', 'id_cead',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        return $this->hasOne('App\Level', 'id_level', 'id_level');
    }

    public function levels()
    {
        return $this->hasMany('App\Level', 'id_user', 'id');
    }
    public function perfil()
    {
        return $this->hasOne('App\Perfil', 'id_perfil', 'id_perfil');
    }
}
