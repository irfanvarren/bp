<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Student;
use Illuminate\Support\Facades\Mail;
use App\Models\Student\StudentPaymentNotification;
use App\Mail\StudentPaymentSchedule;
use App\Mail\StudentVisaNotification;
use App\Mail\StudentPassportNotification;
use App\Mail\StudentFinishedCourseNotification;
use App\Models\Student\CourseDetail;
use App\Models\Student\PaymentSchedule;
use App\Models\Student\VisaHistory;
use App\Models\Student\PassportHistory;

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
     $course_payment = PaymentSchedule::selectRaw('student_payment_schedules.*,students.name as name,students.email as email_student, schools.name as school_name,countries.currency_code,countries.currency_symbol')->whereRaw('DATE_SUB(due_date,INTERVAL 14 DAY) = CURDATE()')->where('students.status',1)->join('students','students.id','student_payment_schedules.student_id')->join('schools','schools.id','student_payment_schedules.school_id')->join('countries','countries.id','schools.country_id')->get();
     $course_payment_mail_sent  = array();
     foreach($course_payment as $detail){
      $cek_has_been_sent = StudentPaymentNotification::where('model_id',$detail->id)->where('model_type', 'App\Models\Student\PaymentSchedule')->get();
      if(count($cek_has_been_sent)){
        $failed_notifications = StudentPaymentNotification::where('model_id',$detail->id)->where('model_type', 'App\Models\Student\PaymentSchedule')->where('status',0)->get();
        foreach($failed_notifications as $failed_notification){
          $email = Student::find($failed_notification->student_id)->email;
          $data_update_failed_notification = [
            'model_type' => 'App\Models\Student\PaymentSchedule',
            'model_id' => $detail->id,
            'student_id' => $detail->student_id,
            'email' => $email,
            'status' => 1
          ];
          try {
            Mail::send(new StudentPaymentSchedule($detail));
            $failed_notification->update($data_update_failed_notification);
            array_push($course_payment_mail_sent,$email);
          } catch (Exception $e) {

                // if (count(Mail::failures()) > 0) {
                //    $new_failed_notifications = new StudentPaymentNotification();
                //    $new_failed_notifications->model_id = $detail->id;
                //    $new_failed_notifications->student_id = $detail->student_id;
                //    $new_failed_notifications->email = $email;
                //    $new_failed_notifications->status = 0;
                //    $new_failed_notifications->save();
           $this->error("error");
               //}
         }
       }
     }else{
      $email = Student::find($detail->student_id)->email;
      $data_insert_notification = [
        'model_type' => 'App\Models\Student\PaymentSchedule',
        'model_id' => $detail->id,
        'student_id' => $detail->student_id,
        'email' => $email,
        'status' => 1
      ];
      try {
        Mail::send(new StudentPaymentSchedule($detail));
        $insert_notification = new StudentPaymentNotification();
        $insert_notification->create($data_insert_notification);
        array_push($course_payment_mail_sent,$email);
      } catch (Exception $e) {
        if (count(Mail::failures()) > 0) {
          $data_insert_notification['status'] = 0;
          $new_failed_notifications = new StudentPaymentNotification();
          $new_failed_notifications->create($data_insert_notification);
          $this->error("error");
        }
      }
    }
  }

  $visa_history_mail_sent  = array();
  $visa_histories = VisaHistory::whereRaw('DATE_SUB(end_date,INTERVAL 3 MONTH) = CURDATE()')->where('students.status',1)->join('students','students.id','student_visa_histories.student_id')->get();
  foreach($visa_histories as $visa_history){
    $cek_has_been_sent = StudentPaymentNotification::where('model_id',$visa_history->id)->where('model_type', 'App\Models\Student\VisaHistory')->get();
    if(count($cek_has_been_sent)){
     $failed_notifications = StudentPaymentNotification::where('model_id',$visa_history->id)->where('model_type', 'App\Models\Student\VisaHistory')->where('status',0)->get();
     foreach($failed_notifications as $failed_notification){
       $email = Student::find($failed_notification->student_id)->email;
       $data_update_failed_notification = [
        'model_type' => 'App\Models\Student\VisaHistory',
        'model_id' => $visa_history->id,
        'student_id' => $visa_history->student_id,
        'email' => $email,
        'status' => 1
      ];
      try {
        Mail::send(new StudentVisaNotification($visa_history));
        $failed_notification->update($data_update_failed_notification);
        array_push($visa_history_mail_sent,$email);
      } catch (Exception $e) {

       $this->error("error");
     }
   }
 }else{
   $email = Student::find($visa_history->student_id)->email;
   $data_insert_notification = [
    'model_type' => 'App\Models\Student\VisaHistory',
    'model_id' => $visa_history->id,
    'student_id' => $visa_history->student_id,
    'email' => $email,
    'status' => 1
  ];
  try {
    Mail::send(new StudentVisaNotification($visa_history));
    $insert_notification = new StudentPaymentNotification();
    $insert_notification->create($data_insert_notification);
    array_push($visa_history_mail_sent,$email);
  } catch (Exception $e) {
    if (count(Mail::failures()) > 0) {
      $data_insert_notification['status'] = 0;
      $new_failed_notifications = new StudentPaymentNotification();
      $new_failed_notifications->create($data_insert_notification);
      $this->error("error");
    }
  }
}
}


$passport_history_mail_sent   = array();
$passport_histories = PassportHistory::whereRaw('DATE_SUB(expired_date,INTERVAL 3 MONTH) = CURDATE()')->where('students.status',1)->join('students','students.id','student_passport_histories.student_id')->get();
foreach($passport_histories as $passport_history){
  $cek_has_been_sent = StudentPaymentNotification::where('model_id',$passport_history->id)->where('model_type', 'App\Models\Student\PassportHistory')->get();
  if(count($cek_has_been_sent)){
   $failed_notifications = StudentPaymentNotification::where('model_id',$passport_history->id)->where('model_type', 'App\Models\Student\PassportHistory')->where('status',0)->get();
   foreach($failed_notifications as $failed_notification){
     $email = Student::find($failed_notification->student_id)->email;
     $data_update_failed_notification = [
      'model_type' => 'App\Models\Student\PassportHistory',
      'model_id' => $passport_history->id,
      'student_id' => $passport_history->student_id,
      'email' => $email,
      'status' => 1
    ];
    try {
      Mail::send(new StudentPassportNotification($passport_history));
      $failed_notification->update($data_update_failed_notification);
      array_push($passport_history_mail_sent ,$email);
    } catch (Exception $e) {

     $this->error("error");
   }
 }
}else{
 $email = Student::find($passport_history->student_id)->email;
 $data_insert_notification = [
  'model_type' => 'App\Models\Student\PassportHistory',
  'model_id' => $passport_history->id,
  'student_id' => $passport_history->student_id,
  'email' => $email,
  'status' => 1
];
try {
  Mail::send(new StudentPassportNotification($passport_history));
  $insert_notification = new StudentPaymentNotification();
  $insert_notification->create($data_insert_notification);
  array_push($passport_history_mail_sent ,$email);
} catch (Exception $e) {
  if (count(Mail::failures()) > 0) {
    $data_insert_notification['status'] = 0;
    $new_failed_notifications = new StudentPaymentNotification();
    $new_failed_notifications->create($data_insert_notification);
    $this->error("error");
  }
}
}
}

$finished_course_sent   = array();

$end_dates = CourseDetail::selectRaw('program_id,max(end_date) as end_date')->groupBy('program_id')->get();

foreach($end_dates as $end_date){
$finished_courses = CourseDetail::selectRaw('student_course_details.id,student_course_details.end_date,students.id as student_id,students.name,students.client_id,students.email,school_programs.name as program_name,schools.name as school_name,DATE_SUB(end_date,INTERVAL 3 MONTH)')->where('students.status',1)->where('program_id',$end_date->program_id)->where('end_date',$end_date->end_date)->whereRaw('DATE_SUB(end_date,INTERVAL 3 MONTH) = CURDATE()')->join('students','students.id','student_course_details.student_id')->join('schools','schools.id','student_course_details.school_id')->join('school_programs','school_programs.id','student_course_details.program_id')->groupBy('student_course_details.id','student_course_details.end_date','student_course_details.school_id','students.id','students.name','students.client_id','school_programs.name','schools.name','students.email')->get();

foreach($finished_courses as $finished_course){
  $cek_has_been_sent = StudentPaymentNotification::where('model_id',$finished_course->id)->where('model_type', 'App\Models\Student\CourseDetail')->get();
  if(count($cek_has_been_sent)){
   $failed_notifications = StudentPaymentNotification::where('model_id',$finished_course->id)->where('model_type', 'App\Models\Student\CourseDetail')->where('status',0)->get();
   foreach($failed_notifications as $failed_notification){
     $email = Student::find($failed_notification->student_id)->email;
     $data_update_failed_notification = [
      'model_type' => 'App\Models\Student\CourseDetail',
      'model_id' => $finished_course->id,
      'student_id' => $finished_course->student_id,
      'email' => $email,
      'status' => 1
    ];
    try {
      Mail::send(new StudentFinishedCourseNotification($finished_course));
      $failed_notification->update($data_update_failed_notification);
      array_push($finished_course_sent ,$email);
    } catch (Exception $e) {

     $this->error("error");
   }
 }
}else{
 $email = Student::find($finished_course->student_id)->email;
 $data_insert_notification = [
  'model_type' => 'App\Models\Student\CourseDetail',
  'model_id' => $finished_course->id,
  'student_id' => $finished_course->student_id,
  'email' => $email,
  'status' => 1
];
try {
  Mail::send(new StudentFinishedCourseNotification($finished_course));
  $insert_notification = new StudentPaymentNotification();
  $insert_notification->create($data_insert_notification);
  array_push($finished_course_sent ,$email);
} catch (Exception $e) {
  if (count(Mail::failures()) > 0) {
    $data_insert_notification['status'] = 0;
    $new_failed_notifications = new StudentPaymentNotification();
    $new_failed_notifications->create($data_insert_notification);
    $this->error("error");
  }
}
}
}
}


if(count($course_payment_mail_sent)){
  $this->info("Course payment email notification has been sent to : ".implode(", ",$course_payment_mail_sent));
}else{
  $this->info("No course payment notification");
}

if(count($visa_history_mail_sent)){
  $this->info("Visa history email notification has been sent for : ".implode(", ",$visa_history_mail_sent));
}else{
  $this->info("No visa history notification");
}

if(count($passport_history_mail_sent)){
  $this->info("Passport history email notification has been sent for : ".implode(", ",$passport_history_mail_sent));
}else{
  $this->info("No passport history notification");
}

if(count($finished_course_sent)){
  $this->info("Finished course email notification has been sent for : ".implode(", ",$finished_course_sent));
}else{
  $this->info("No finished course notification");
}


}
}
