<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;
class InternshipApplicationMail extends Mailable
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

        Session::flash('message', 'Data sudah terkirim !');
        $mail = $this->subject('Data Form Internship')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to('director@bestpartnereducation.com')
        ->cc('info@bestpartnereducation.com')
        ->view('email.internshipapplication');
        $mail->attach($this->email->file->getRealPath(),[
            'as' => 'foto',
            'mime' => $this->email->file->getMimeType()
        ]);
        $mail->attach($this->email->file1->getRealPath(),[
            'as' => 'surat',
            'mime' => $this->email->file1->getMimeType()
        ]);

        return $mail;
    }
}
