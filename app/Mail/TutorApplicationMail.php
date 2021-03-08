<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TutorApplicationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
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
      $mail = $this->subject('Form Pendaftaran Tutor')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to('info@bestpartnereducation.com')
        ->view('email.tutorapplication');
        if($this->email->hasfile('myfiles')){
          foreach($this->email->myfiles as $files){
            $mail->attach($files->getRealPath(),[
              'as' => $files->getClientOriginalName(),
              'mime' => $files->getMimeType()
            ]);
          }
        }

        return $mail;
    }
}
