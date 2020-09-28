<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'configuracion.users';
    protected $fillable = ['usuario', 'password', 'acceso', 'rol', 'perfil'];
    protected $hidden = ['password'];
}
