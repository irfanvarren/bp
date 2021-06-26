<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormPindahSekolahAgencyMail extends Mailable
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
        $mail =  $this->subject('Data Form Pindah Sekolah & Agency')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to('admission1@bestpartnereducation.com')
        //->to('irfanvarren7@gmail.com')
        ->view('email.form-pindah-sekolah-agency');

        $x = 1;
        foreach($this->email->file() as $key => $file){
            if($key != "course_completion_certificates"){
            $mail->attach($file->getRealPath(),[
                'as' => $x.') '.$key.'-'.time().'.'.$file->getClientOriginalExtension(),
              'mime' => $file->getMimeType()
          ]);

            $x++;
            }
        }

        $x = 1;

        if($this->email->file('course_completion_certificates')){
        foreach($this->email->file('course_completion_certificates') as $key => $certificate){
            $mail->attach($certificate->getRealPath(),[
                'as' => $x.') '.$key.'-'.time().'.'.$certificate->getClientOriginalExtension(),
              'mime' => $certificate->getMimeType()
          ]);
            $x++;
        }
        }

        return $mail;
    }
}
