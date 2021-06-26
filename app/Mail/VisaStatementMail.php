<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisaStatementMail extends Mailable
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
      $data_uri = $this->email->signature;
      $encoded_image = explode(",",$data_uri)[1];
      $decoded_image = base64_decode($encoded_image);
    //  $signature = file_put_contents("signature.png",$decoded_image);
      $mail = $this->subject('Data Surat Pernyataan Visa')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to('admission1@bestpartnereducation.com')
      ->cc('irenealviraaa@gmail.com')
      ->cc('info@bestpartnereducation.com')
      ->view('email.visastatementletter');
      $mail->attachData($decoded_image,'signature.png',[
        'mime' => 'image/png',
      ]);
        return $mail;
    }
}
