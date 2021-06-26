<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadPaymentsReceiptMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$data)
    {
        $this->email = $request;//
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "";
        if($this->email->subject != ""){
            $subject = $this->email->subject;
        }
        $mail =  $this->subject('Bukti Pembayaran '.$subject.' Official')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to('finance@bestpartnereducation.com')
        ->view('email.io_uploadpayments');
        $mail->attach($this->email->bukti_pembayaran->getRealPath(),[
          'as' => 'bukti_pembayaran.'.$this->email->bukti_pembayaran->getClientOriginalExtension(),
          'type' => $this->email->bukti_pembayaran->getMimeType()
        ]);
        return $mail;
    }
}
