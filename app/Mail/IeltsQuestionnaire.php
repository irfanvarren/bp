<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IeltsQuestionnaire extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->email = $request;//
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('IELTS Kuesioner')
                  ->from('it@bestpartnereducation.com','Best Partner')
                  ->to('finance@bestpartnereducation.com')
                  ->cc('counselor2@bestpartnereducation.com')
                  ->cc('director@bestpartnereducation.com')
                  ->view('email.ielts-questionnaire');
    }
}
