<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisIeltsOfficialMail extends Mailable
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
          $this->email = $request;//  //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $mail = $this->subject('Pendaftaran IELTS Official - '.$this->email['NAMA'])
                  ->from('it@bestpartnereducation.com','Best Partner')
                  ->to('info@bestpartnereducation.com')
                  ->view('email.ieltsofficial');
                
                  $ktp = $this->email['KTP'];
                      $mail->attach($ktp->getRealPath(),[
                        'as' => $ktp->getClientOriginalName(),
                        'mime' => $ktp->getMimeType()
                      ]);
                      $paspor = $this->email['PASPOR'];
                          $mail->attach($paspor->getRealPath(),[
                            'as' => $paspor->getClientOriginalName(),
                            'mime' => $paspor->getMimeType()
                          ]);


        return $mail;
    }
}
