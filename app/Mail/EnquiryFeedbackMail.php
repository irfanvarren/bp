<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnquiryFeedbackMail extends Mailable
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
        $mail = $this->subject($this->email->type.' - Enquiry')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to($this->email->email)
        ->view('email.enquiry-feedback');

        return $mail;
    }
}
