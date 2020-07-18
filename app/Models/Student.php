<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Student extends Model
{
    

    public function klass(){
        return $this->belongsTo('App\Models\Klass','class_id')->withDefault();
    }
    public function section(){
        return $this->belongsTo('App\Models\Section','section_id')->withDefault();
    }

    public function getImageAttribute($value){
        return $value?Storage::url($value):null;
    }

}
