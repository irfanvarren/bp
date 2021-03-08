<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student\CourseDetail;
use App\Models\Student\PaymentSchedule;
use App\Student;
use Illuminate\Support\Facades\Mail;
use App\Models\Student\StudentPaymentNotification;
use App\Mail\StudentPaymentSchedule;

class CheckStudentPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:student_payment_date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check student payment';

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
       $details = PaymentSchedule::selectRaw('student_payment_schedules.*,students.name as name,students.email as email_student, schools.name as school_name,countries.currency_code,countries.currency_symbol')->whereRaw('DATE_SUB(due_date,INTERVAL 14 DAY) = CURDATE()')->join('students','students.id','student_payment_schedules.student_id')->join('schools','schools.id','student_payment_schedules.school_id')->join('countries','countries.id','schools.country_id')->get();
       $mail_sent  = array();
       foreach($details as $detail){
          $cek_has_been_sent = StudentPaymentNotification::where('id',$detail->id)->get();
          if(count($cek_has_been_sent)){
            $failed_notifications = StudentPaymentNotification::where('id',$detail->id)->where('status',0)->get();
            foreach($failed_notifications as $failed_notification){
              $email = Student::find($failed_notification->student_id)->email;
              try {
                Mail::send(new StudentPaymentSchedule($detail));
                array_push($mail_sent,$email);
                $failed_notification->id = $detail->id;
                $failed_notification->student_id = $detail->student_id;
                $failed_notification->email = $email;
                $failed_notification->status = 1;
                $failed_notification->save();
            } catch (Exception $e) {

                if (count(Mail::failures()) > 0) {
                   $new_failed_notifications = new StudentPaymentNotification();
                   $new_failed_notifications->id = $detail->id;
                   $new_failed_notifications->student_id = $detail->student_id;
                   $new_failed_notifications->email = $email;
                   $new_failed_notifications->status = 0;
                   $new_failed_notifications->save();
                     $this->error("error");
               }
           }
       }
   }else{
      $email = Student::find($detail->student_id)->email;

      try {
        Mail::send(new StudentPaymentSchedule($detail));
        $insert_notification = new StudentPaymentNotification();
        $insert_notification->id = $detail->id;
        $insert_notification->student_id = $detail->student_id;
        $insert_notification->email = $email;
        $insert_notification->status = 1;
        $insert_notification->save();
        array_push($mail_sent,$email);
    } catch (Exception $e) {
        if (count(Mail::failures()) > 0) {
           $new_failed_notifications = new StudentPaymentNotification();
           $new_failed_notifications->id = $detail->id;
           $new_failed_notifications->student_id = $detail->student_id;
           $new_failed_notifications->email = $email;
           $new_failed_notifications->status = 0;
           $new_failed_notifications->save();
           $this->error("error");
       }
   }
}
}
if(count($mail_sent)){
$this->info("Email notification has been sent to : ".implode(", ",$mail_sent));
}else{
  $this->info("No notification");
}
}
}
