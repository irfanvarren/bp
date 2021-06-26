<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

class FmaRegisFeedback extends Mailable
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
      $this->email = $request;  //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $mail = $this->subject('Fma Registration Confirmation')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to($this->email->email)
      ->view('email.fmaregisfeedback');
    }
}
