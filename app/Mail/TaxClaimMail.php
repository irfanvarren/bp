<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaxClaimMail extends Mailable
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
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $mail = $this->subject('Data Tax Claim')
      ->from('it@bestpartnereducation.com','Best Partner')
      ->to('info@bestpartnereducation.com')
      ->view('email.taxclaim')
      ;
      $mail->attach($this->email->bukti_pembayaran->getRealPath(),[     
        'as' => 'bukti_pembayaran.'.$this->email->bukti_pembayaran->getClientOriginalExtension(),
        'mime' => $this->email->bukti_pembayaran->getMimeType()
      ]);
      $mail->attach($this->email->slip_pajak->getRealPath(),[
        'as' => 'slip_pajak.'.$this->email->slip_pajak->getClientOriginalExtension(),
        'mime' => $this->email->slip_pajak->getMimeType()

      ]);

      $no = 1;

      if(!empty($this->email->file_lainnya)){
      foreach($this->email->file_lainnya as $file_lain){
        $mail->attach($file_lain->getRealPath(),[
          'as' => 'file_lainnya'.$no.'.'.$file_lain->getClientOriginalExtension(),
          'mime' => $file_lain->getMimeType()
        ]);
        $no++;
      }
      }
      return $mail;
    }
}
