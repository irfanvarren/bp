<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolStudentInformation extends Model
{
	protected $table = "school_student_informations";
   protected $fillable = [
   	'school_id','rights','obligations'
   ];
}
