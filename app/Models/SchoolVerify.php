<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolVerify extends Model
{
    protected $fillable = [
        'school_id','token',
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }
}
