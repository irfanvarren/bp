<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DocTranslateMail extends Mailable
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
      $mail = $this->subject('Translate Dokumen - '.$this->email->nama)
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to('info@bestpartnereducation.com')
      ->view('email.documenttranslate');
      if(!empty($this->email['myfiles'])){
        foreach($this->email['myfiles'] as $filePath){
          $mail->attach($filePath->getRealPath(),

            [
              'as' => $filePath->getClientOriginalName(),
              'mime' => $filePath->getMimeType()
            ]

          );
        }
      }
      return $mail;
    }
  }
