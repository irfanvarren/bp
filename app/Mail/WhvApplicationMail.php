<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WhvApplicationMail extends Mailable
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
      $mail = $this->subject('Data Form WHV')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to('info@bestpartnereducation.com')
      ->view('email.whvapplication');
      $mail->attach($this->email->pas_foto->getRealPath(),[
        'as' => 'pas foto',
        'mime' => $this->email->pas_foto->getMimeType(),
      ]);
      $mail->attach($this->email->paspor->getRealPath(),[
        'as' => 'paspor',
        'mime' => $this->email->paspor->getMimeType(),
      ]);
      $mail->attach($this->email->ktp->getRealPath(),[
        'as' => 'ktp',
        'mime' => $this->email->ktp->getMimeType(),
      ]);
      $mail->attach($this->email->file_ielts->getRealPath(),[
        'as' => 'file_ielts',
        'mime' => $this->email->file_ielts->getMimeType(),
      ]);

      $mail->attach($this->email->skck->getRealPath(),[
        'as' => 'skck',
        'mime' => $this->email->skck->getMimeType(),
      ]);
      $mail->attach($this->email->ijazah->getRealPath(),[
        'as' => 'ijazah',
        'mime' => $this->email->ijazah->getMimeType(),
      ]);
       $mail->attach($this->email->transkrip_nilai->getRealPath(),[
              'as' => 'transkrip_nilai',
              'mime' => $this->email->transkrip_nilai->getMimeType(),
            ]);
            $x=1;
            foreach($this->email->file_mahasiswa as $data_mahasiswa){
            $mail->attach($data_mahasiswa->getRealPath(),[
              'as' => 'file_mahasiswa'.$x,
              'mime' => $data_mahasiswa->getMimeType(),
            ]);
            $x++;
          }
          foreach($this->email->doc_sponsor as $data_sponsor){
            $mail->attach($data_sponsor->getRealPath(),[
              'as' => 'doc_sponsor'.$x,
              'mime' => $data_sponsor->getMimeType(),
            ]);
            $x++;
          }

            $mail->attach($this->email->referensi_bank->getRealPath(),[
              'as' => 'referensi_bank',
              'mime' => $this->email->referensi_bank->getMimeType(),
            ]);

            $mail->attach($this->email->bukti_pembayaran->getRealPath(),[
              'as' => 'bukti_pembayaran',
              'mime' => $this->email->bukti_pembayaran->getMimeType(),
            ]);
            $data_uri = $this->email->signature;
            $encoded_image = explode(",",$data_uri)[1];
            $decoded_image = base64_decode($encoded_image);
            $mail->attachData($decoded_image,'signature.png',[
              'mime' => 'image/png',
            ]);
            return $mail;
    }
}
