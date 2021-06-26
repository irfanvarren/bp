<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\StudentVisaSchedule as PaymentScheduleMail;

use Carbon\Carbon;
use Mail;

class StudentVisaSchedule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    $date = new Carbon($this->details['due_date']);
    $date = $date->subWeeks(2);
    $email = new PaymentScheduleMail($this->details);
        Mail::later($date,$email);
    }
}
