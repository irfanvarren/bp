<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    protected $table = "student_payment_schedules";
    protected $fillable = [
    'student_id','course_detail_id','school_id','program_id','tuition_fee','discount_percents','discount_amounts','material_fee','coe_fee','start_date','end_date','due_date'
    ];
}
