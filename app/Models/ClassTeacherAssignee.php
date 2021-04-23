<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassTeacherAssignee extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    protected $table = 'class_teacher_assignee';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo(Klass::class,'class_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

   
}
