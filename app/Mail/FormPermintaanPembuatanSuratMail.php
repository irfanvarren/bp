<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormPermintaanPembuatanSuratMail extends Mailable
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
      ->to('admission1@bestpartnereducation.com')
      ->cc('email-catch@bestpartnereducation.com')
      ->view('email.form-permintaan-pembuatan-surat-menyurat');


    return $mail;
    }
}
