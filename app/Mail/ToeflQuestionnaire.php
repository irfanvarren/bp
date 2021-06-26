<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ToeflQuestionnaire extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->subject('TOEFL Kuesioner')
                  ->from('it@bestpartnereducation.com','Best Partner')
                  ->to('finance@bestpartnereducation.com')
                  ->cc('director@bestpartnereducation.com')
                  ->cc('counselor2@bestpartnereducation.com')
                  ->view('email.toefl-questionnaire');

    }
}
