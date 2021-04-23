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

    public function sections(){
        return $this->hasMany('App\Models\Section','class_id');
    }

    public function classTeacherAssignee(){
    	return $this->hasMany('App\Models\classTeacherAssignee', 'class_id');
    }

    

    

    
}
