<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\OnlineTest\OtSectionType;

class OnlineTestResultMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $test_id;
    public $regis_data;
    public $test_name;
    public $section_types;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$current_test_id,$regis_data,$test_name)
    {
        $this->email = $request;
        $this->test_id = $current_test_id;
        $this->regis_data = $regis_data;
        $this->test_name = $test_name;
        $this->section_types = OtSectionType::get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('it@bestpartnereducation.com','Best Partner')
       // ->to('irfanvarren7@gmail.com')
        ->to('tutor1@bestpartnereducation.com')
        ->cc('counselor2@bestpartnereducation.com')
        ->subject($this->test_name.' Online Simulation Result')
        ->view('email.online-test');
    }
}
