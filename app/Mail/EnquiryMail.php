<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnquiryMail extends Mailable
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
        $mail = $this->subject('Enquiry')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to($this->email->email_to)
        
        ->view('email.enquiry');

        if($this->email->myfiles != ""){
            $x = 1;
        foreach($this->email->myfiles as $key => $file){
            $mail->attach($file->getRealPath(),[
                'as' => $this->email->complaint_code.'-'.$x.'.'.$file->getClientOriginalExtension(),
                'mime' => $file->getMimeType()
            ]);

            $x++;
            }
        }
    return $mail;
    }
}
