<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentProblemQna extends Model
{
    protected $table = 'student_problem_qnas';

    protected $fillable = [
    	'date','discussion','solution','progress','student_id'
    ];
}
