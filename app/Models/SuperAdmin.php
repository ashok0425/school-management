<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SuperAdmin extends Model
{
    use Notifiable;
    protected $guard = 'superadmin';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
