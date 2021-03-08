<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Session;

class ResellerRegisterMail extends Mailable
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
        $mail = $this->from('it@bestpartnereducation.com','Best Partner')
        //->to($email_to)
        ->to('irfanvarren7@gmail.com')
        ->subject("Data Pendaftaran Reseller")
        ->view('email.reseller-regis');
        if($this->email->file('file_ktp')){
            $mail->attach($this->email->file('file_ktp')->getRealPath(),[
                'as' =>time().'-KTP.'.$this->email->file('file_ktp')->getClientOriginalExtension(),
                'mime' => $this->email->file('file_ktp')->getMimeType()
            ]);
        }
        Session::flash('status', 'Data berhasil diinput anda telah terdaftar sebagai reseller');
        return $mail;
    }
}
