<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class VisaHistory extends Model
{
    protected $table = "student_visa_histories";
    protected $fillable = [
    	'student_id','country','date_of_grant','length_of_stay','trn_number'
    ];
}
