<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IeltsSimulationEventsMail extends Mailable
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
     $this->email = $request;//
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->subject('Pendaftaran IELTS Simulation di '.$this->email->nama_sekolah)
                ->from('it@bestpartnereducation.com','Best Partner')
                ->to('info@bestpartnereducation.com')
                ->view('email.ieltssimulationschool');
  }
}
