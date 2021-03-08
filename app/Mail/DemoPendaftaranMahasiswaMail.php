<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoPendaftaranMahasiswaMail extends Mailable
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
        $mail = $this->subject('Data Pendaftaran Mahasiswa')
                    ->from('it@bestpartnereducation.com','Best Partner')
                    ->to('irfanvarren7@gmail.com')
                    ->view('email.demo-pendaftaran-mahasiswa');
           if($this->email->hasFile('foto')){
            $mail->attach($this->email->foto->getRealPath(),[
        'as' => 'pas foto',
        'mime' => $this->email->foto->getMimeType(),
      ]);
           }         
       return $mail; 
    }
}
