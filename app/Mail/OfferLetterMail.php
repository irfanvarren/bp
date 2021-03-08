<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use PDF;

class OfferLetterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $offer_letter;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$offer_letter,$subject = "Offer Letter")
    {
        $this->email = $request;
        $this->offer_letter = $offer_letter;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->subject)
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to($this->email->email)
        ->cc('info@bestpartnereducation.com')
        ->view('email.offer-letter')
        ->attachData($this->offer_letter,'offer-letter.pdf');

        return $mail;
    }
}
