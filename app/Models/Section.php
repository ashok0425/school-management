<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function klass(){
        return $this->belongsTo('App\Models\Klass','class_id')->withDefault();
    }

}
