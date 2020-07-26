<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifySchoolMail extends Mailable
{
    use Queueable, SerializesModels;
    public $school;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($school)
    {
        $this->school = $school;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verifyschool');
    }
}
