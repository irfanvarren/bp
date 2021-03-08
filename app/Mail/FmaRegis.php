<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

class FmaRegis extends Mailable
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
$mail = $this->subject('Pendaftaran FMA')
                    ->from('it@bestpartnereducation.com','Best Partner')
                    ->to('info@bestpartnereducation.com')
                    ->cc('director@bestpartnereducation.com')
                    ->view('email.fmaregis');
                    foreach($this->email['myfiles'] as $file){
                        $mail->attach($file->getRealPath(),[
                          'as' => $file->getClientOriginalName(),
                          'mime' => $file->getMimeType()
                        ]);
                      }
                      return $mail;
        /*  $mail = $this->subject('Kuesioner')
                      ->from('it@bestpartnereducation.com')
                      ->to('info@bestpartnereducation.com')
                      ->attach($this->email->files  ,[
                        'as' => 'test.jpg',
                        'mime' => 'image/jpeg'
                      ])
                      ->view('email.fmaregis');
      /*  foreach($this->email->files as $file){
          $mail->attachData($file,[
            'as' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType()
          ]);
        }
        return $mail;*/
    }
}
