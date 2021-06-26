<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IeltsSimulationFeedback extends Mailable
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
      $mail = $this->subject('Konfirmasi Pendaftaran')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to($this->email->EMAIL)
      ->view('email.ieltssimulationfeedback');

    }
}
