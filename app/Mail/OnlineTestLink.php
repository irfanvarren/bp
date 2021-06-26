<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OnlineTestLink extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $email;
    public $test_name;
    public $test_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$email,$test_name,$test_id)
    {
        $this->token = $token;
        $this->email = $email;
        $this->test_name = $test_name;
        $this->test_id = $test_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Link Test Simulasi '.$this->test_name.' Online')
        ->to($this->email)
        ->view('email.online-test-link');
    }
}
