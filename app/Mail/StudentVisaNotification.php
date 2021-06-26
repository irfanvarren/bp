<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentVisaNotification extends Mailable
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
        $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =  $this->subject('Visa Expired')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to($this->email->email) // email murid
        ->bcc('director@bestpartnereducation.com')
        ->bcc('admission1@bestpartnereducation.com')
        ->bcc('admission2@bestpartnereducation.com')
        ->view('email.student-visa-notification');
        return $mail;
    }
}
