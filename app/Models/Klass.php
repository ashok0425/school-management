<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Klass extends Model
{
    private $guard = 'school';


    public function level(){
        return $this->belongsTo('App\Models\Level')->withDefault();
    }

    public function subjects(){
        return $this->hasMany('App\Models\Subject');
    }

    
}
