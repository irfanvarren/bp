<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnglishRegistration extends Mailable
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
      $mail = $this->subject('Data Pendaftaran - '.$this->email->nama_depan.' '.$this->email->nama_belakang)
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to('info@bestpartnereducation.com');
      if($this->email->cabang == "BEST PARTNER SINGKAWANG"){
        $mail = $mail->cc('counselor1-skw@bestpartnereducation.com ');
      }
      $mail = $mail->view('email.englishregistration')
      ;

      if(!empty($this->email->ktp)){
        $mail->attach($this->email->ktp->getRealPath(),[
          'as' => 'ktp-'.$this->email->ktp->getClientOriginalName(),
          'mime' => $this->email->ktp->getMimeType()
        ]);
      }

      if(!empty($this->email->kk)){
        $mail->attach($this->email->kk->getRealPath(),[
          'as' => 'kk-'.$this->email->kk->getClientOriginalName(),
          'mime' => $this->email->kk->getMimeType()
        ]);
      }

      if(!empty($this->email->kks)){
        $mail->attach($this->email->kks->getRealPath(),[
          'as' => 'kks-'.$this->email->kks->getClientOriginalName(),
          'mime' => $this->email->kks->getMimeType()
        ]);
      }

      if(!empty($this->email->paspor)){
        $mail->attach($this->email->paspor->getRealPath(),[
          'as' => 'paspor'.$this->email->paspor->getClientOriginalName(),
          'mime' => $this->email->paspor->getMimeType()
        ]);
      }

      if($this->email->izajah != ""){
        $x = 1;
        foreach($this->email->izajah as $key => $file){
          $mail->attach($file->getRealPath(),[
            'as' => 'ijazah-'.$x.'.'.$file->getClientOriginalExtension(),
            'mime' => $file->getMimeType()
          ]);

          $x++;
        }
      }

      return $mail;
    }
  }
