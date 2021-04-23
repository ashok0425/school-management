<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
	protected $table = 'routine_details';

      protected $fillable= ['day_name', 'period', 'section_id', 'class_id', 'teacher_id', 'subject_id'];


      public function teacher()
      {
      	return $this->hasMany('App\Models\Teacher');
      }

      public function subject()
      {
      	return $this->hasMany('App\Models\Subject', 'subject_id');
      }

   

    
}
