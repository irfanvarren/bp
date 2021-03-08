<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class SchoolApplication extends Model
{
   protected $table = "student_school_applications";
   protected $fillable = [
   	'student_id','school_id','program_id','class_shift','agent'
   ];
}
