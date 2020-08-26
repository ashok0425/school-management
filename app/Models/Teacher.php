<?php

namespace App\Models;

use App\Mail\TeacherStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $casts = ['status' => 'boolean'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }


    /**
     * Mark the teacher as blocked
     */
    public function blocked()
    {
        $this->update(['status' => true]);

        $this->getSend();
    }

    /**
     * Mark the teacher as  unblocked
     */
    public function unblocked()
    {
        $this->update(['status' => false]);

        $this->getSend();
    }

    protected function getSend()
    {
        Mail::to($this->email)->send(new TeacherStatus($this));
    }
}
