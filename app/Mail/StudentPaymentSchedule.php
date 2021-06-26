<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\StudentPaymentSchedule as StudentPaymentScheduleJobs;


class StudentPaymentSchedule extends Mailable
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
        $mail =  $this->subject('Payment Schedule')
        ->from('it@bestpartnereducation.com','Best Partner')
        ->to($this->email->email_student)
        ->bcc('finance@bestpartnereducation.com')
        ->view('email.student-payment-schedule')
        ;
        return $mail;
    }
}
