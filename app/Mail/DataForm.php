<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DataForm extends Mailable
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
        $mail = $this->subject("Data Form")
                    ->from('it@bestpartnereducation.com','Best Partner');
                    if(count($this->email->to)){
                        $mail->to($this->email->to);
                    }else{  
                        $mail->to('director@bestpartnereducation.com');
                    }

                    if(count($this->email->cc)){
                        $mail->cc($this->email->cc);
                    }else{
                       $mail->cc('info@bestpartnereducation.com');
                    }

                    $mail->view('email.data-form');
    }
}
