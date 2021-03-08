<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormDesignPromoMail extends Mailable
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
        $mail = $this->subject('Data Form Design Promo')
        ->from('it@bestpartnereducation.com','Best Partner')
      ->to('counselor2@bestpartnereducation.com')
      ->cc('director@bestpartnereducation.com')
      ->view('email.form-design-promo');


    return $mail;
    }
}
