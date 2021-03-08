<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
      protected $table = "student_course_details";
    protected $fillable = [
    'student_id','school_id','program_id','application_fee','material_fee','coe_fee','start_date','end_date'
    ];
}
