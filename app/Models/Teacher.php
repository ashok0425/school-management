<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Model
{
    public function getImageAttribute($value){
        return $value?Storage::url($value):null;
    }

    public function school(){
        return $this->belongsTo('App\Models\School');
    }
}
