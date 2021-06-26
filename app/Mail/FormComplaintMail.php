<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;    

class FormComplaintMail extends Mailable
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
        if($this->email->email != ""){
            $email = $this->email->email;
        }else{
            $email = "admission1@bestpartnereducation.com";
        }
        Session::flash('message', 'Data sudah berhasil diinput !');
        $mail = $this->subject('Data Form Complaint')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to($email)
        ->cc(['admission1@bestpartnereducation.com','info@bestpartnereducation.com'])
        ->view('email.form-complaint');
        return $mail;
    }
}
