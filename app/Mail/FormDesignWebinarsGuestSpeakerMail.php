<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormDesignWebinarsGuestSpeakerMail extends Mailable
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
            $mail = $this->subject('Data Form Design Webinars Guest Speaker')
        ->from('it@bestpartnereducation.com','Best Partner')
      ->to('design@bestpartnereducation.com')
      ->cc('director@bestpartnereducation.com')
      //->cc('counselor2@bestpartnereducation.com')
      ->view('email.form-design-webinars-guest-speaker');

      $x = 1;
      foreach($this->email->file() as $key => $file){
        $mail->attach($file->getRealPath(),[
            'as' => $x.') '.$key.'-'.time(),
            'mime' => $file->getMimeType()
        ]);
        $x++;

    }

    return $mail;

    }
}
