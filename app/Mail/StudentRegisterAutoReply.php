<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentRegisterAutoReply extends Mailable
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
    $mail = $this->subject('Data Surat Pernyataan Visa')
    ->from('it@bestpartnereducation.com','Best Partner')
    ->to($this->email->email)
    ->cc('admission1@bestpartnereducation.com')
    ->cc('info@bestpartnereducation.com')
    ->view('email.visastatementletter-reply');
    return $mail;
       // return $this->view('view.name');
    }
}
