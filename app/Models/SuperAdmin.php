<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
class SuperAdmin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'superadmin';

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getImageAttribute($value){
        return $value?Storage::url($value):null;
    }
}
