<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormStudyTourMail extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf,$request)
    {
         $this->pdf = $pdf;
         $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    $mail = $this->subject('Data Surat Pernyataan Study Tour - Kuching')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to('admission1@bestpartnereducation.com')
        ->view('email.form-study-tour')
        ->attachData($this->pdf->output(),'surat-pernyataan-study-tour.pdf');
        return $mail;
    }
}
