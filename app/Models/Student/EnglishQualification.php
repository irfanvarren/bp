<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class EnglishQualification extends Model
{
    protected $table = "student_english_qualifications";
    protected $fillable = [
    	'student_id','products','qualification_name','qualification_score'
    ];
}
