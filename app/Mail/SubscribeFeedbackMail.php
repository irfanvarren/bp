<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SubscribeFeedbackMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          return $this->subject("Thanks For Subscribing to Our Newsletter !")
                    ->from('it@bestpartnereducation.com','Best Partner')
                    ->to($this->email)
                    ->view('email.subscribe-newsletter');
    }
}
