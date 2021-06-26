<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisToeflSimulation extends Mailable
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
      $mail =  $this->subject('Pendaftaran Toefl Simulation - '.$this->email->NAMA)
                  //->to('irfanvarren7@gmail.com')
                  ->to('info@bestpartnereducation.com')
                  ->cc('counselor2@bestpartnereducation.com')
                  ->view('email.toeflsimulation');

    if($this->email->file('UPLOAD_KTP')){
            $mail->attach($this->email->file('UPLOAD_KTP')->getRealPath(),[
                'as' =>time().'-KTP.'.$this->email->file('UPLOAD_KTP')->getClientOriginalExtension(),
              'mime' => $this->email->file('UPLOAD_KTP')->getMimeType()
          ]);
        
        }

    }
}
