<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Klass extends Model
{
    use SoftDeletes;

    public function level(){
        return $this->belongsTo('App\Models\Level')->withDefault();
    }

    public function subjects(){
        return $this->hasMany('App\Models\Subject');
    }
}
