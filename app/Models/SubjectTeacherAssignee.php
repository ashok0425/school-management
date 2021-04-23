<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacherAssignee extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    protected $table = 'subject_teacher_assignee';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

   
}
