<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormJanjiTemuMail extends Mailable
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

      $arr_email= explode('#',$this->email->staff);
        $email_counselor = $arr_email[1];
      $mail = $this->subject('Form Reservasi Janji Temu')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to($email_counselor)
      ->cc('info@bestpartnereducation.com')
      ->view('email.form-janji-temu');
        return $mail;
    }
}
