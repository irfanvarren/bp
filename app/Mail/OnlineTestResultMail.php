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
    public $sent_to_student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$current_test_id,$regis_data,$test_name,$sent_to_student = false)
    {
        $this->email = $request;
        $this->test_id = $current_test_id;
        $this->regis_data = $regis_data;
        $this->test_name = $test_name;
        $this->section_types = OtSectionType::get();
        $this->sent_to_student = $sent_to_student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->sent_to_student){
            $to = $this->regis_data->EMAIL; 
         
        }else{
            $to = ['tutor1@bestpartnereducation.com'];
        if($this->email['email_to'] != ""){
            $to = array_merge($to,$this->email['email_to']);
        }
        }

        $mail = $this->from('it@bestpartnereducation.com','Best Partner')
        ->to($to);

        if(!$this->sent_to_student){
        $mail = $mail->cc('counselor2@bestpartnereducation.com');
        }
        $mail = $mail->subject($this->test_name.' Online Simulation Result')
        ->view('email.online-test');
        return $mail;
    }
}
