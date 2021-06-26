<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
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
        $subject = "Contact Us";
        if($this->email->subject != ""){
            $subject = "Contact Us - ".$this->email->subject;
        }
        return $this->subject($subject)
                    ->from('it@bestpartnereducation.com','Best Partner')
                    ->to('counselor2@bestpartnereducation.com') 
                    ->cc('director@bestpartnereducation.com')
                    //->to('irfanvarren7@gmail.com')
                    ->view('email.contactus');
    }
}
