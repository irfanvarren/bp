<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestimonyMail extends Mailable
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
      $mail = $this->subject('Data Testimony')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to('counselor2@bestpartnereducation.com')
      ->cc('director@bestpartnereducation.com')
      ->view('email.testimony');
      
      if($this->email->hasFile('foto')){
      $mail->attach($this->email->foto->getRealPath(),[
        'as' => time().$this->email->foto->getClientOriginalName(),
        'mime' => $this->email->foto->getMimeType()
      ]);
      } 
      return $mail;
    }
}
