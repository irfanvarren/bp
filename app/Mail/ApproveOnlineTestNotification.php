<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ApproveOnlineTestNotification extends Mailable
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
        $email_to = User::role('marketing')->where('email','!=','meicheljosephine3@gmail.com')->where('email','!=','geraldagusdwiputra@gmail.com')->pluck('email')->toArray();
        array_push($email_to,"director@bestpartnereducation.com");
        if($this->email->email_reseller != ""){
            array_push($email_to,$this->email->email_reseller);
        }
        $mail = $this->from('it@bestpartnereducation.com','Best Partner')
        ->to($email_to)
        ->cc('info@bestpartnereducation.com')
        ->subject("Pendaftaran Online Test")
        ->view('email.approve-ot');
        if($this->email->file('UPLOAD_KTP')){
            $mail->attach($this->email->file('UPLOAD_KTP')->getRealPath(),[
                'as' =>time().'-KTP.'.$this->email->file('UPLOAD_KTP')->getClientOriginalExtension(),
                'mime' => $this->email->file('UPLOAD_KTP')->getMimeType()
            ]);
            
        }
        return $mail;
    }
}
