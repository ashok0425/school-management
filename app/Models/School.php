<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class School extends Authenticatable
{
    use Notifiable;
    protected $guard = 'school';
    public function getLogoAttribute($value){
        return $value?Storage::url($value):null;
    }

    public function verifySchool()
    {
    return $this->hasOne('App\Models\SchoolVerify','school_id');
    }
}
