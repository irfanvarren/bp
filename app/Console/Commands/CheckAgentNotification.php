<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\SchoolContract;
use App\Models\School\SchoolAgentNotification;

class CheckAgentNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:agent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Check agent contract's date";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $school_contracts = SchoolContract::whereRaw('DATE_SUB(end_date,INTERVAL 14 DAY) = CURDATE()')->get();
        $school_agent_mail_sent  = array();
        foreach($school_contracts as $school_contract){
            $cek_has_been_sent = SchoolAgentNotification::where('model_id',$school_contract->id)->get();
            if(count($cek_has_been_sent)){
                $failed_notifications = SchoolAgentNotification::where('model_id',$school_contract->id)->where('status',0)->get();
                foreach($failed_notifications as $failed_notification){
                  $email = SchoolAgent::find($failed_notification->agent_id)->email;
                  $data_update_failed_notification = [
                    'model_id' => $school_contract->id,
                    'agent_id' => $school_contract->student_id,
                    'email' => $email,
                    'status' => 1
                ];
                try {
                    Mail::send(new SchoolAgentNotificationMail($school_contract));
                    $failed_notification->update($data_update_failed_notification);
                    array_push($course_payment_mail_sent,$email);
                } catch (Exception $e) {


                   $this->error("error");
               }
           }
       }else{
        $email = Student::find($school_contract->agent_id)->email;
          $data_insert_notification = [
            'model_id' => $school_contract->id,
            'agent_id' => $school_contract->agent_id,
            'email' => $email,
            'status' => 1
        ];
        try {
            Mail::send(new SchoolAgentNotificationMail($school_contract));
            $insert_notification = new SchoolAgentNotification();
            $insert_notification->create($data_insert_notification);
            array_push($course_payment_mail_sent,$email);
        } catch (Exception $e) {
            if (count(Mail::failures()) > 0) {
              $data_insert_notification['status'] = 0;
              $new_failed_notifications = new SchoolAgentNotification();
              $new_failed_notifications->create($data_insert_notification);
              $this->error("error");
          }
      }
  }
}
}
}
