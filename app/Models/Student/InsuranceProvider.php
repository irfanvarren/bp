<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class InsuranceProvider extends Model
{
       protected $table = "student_insurance_providers";
    protected $fillable = [
    	'student_id','policy_number','name','start_date','end_date','agent'
    ];
}
