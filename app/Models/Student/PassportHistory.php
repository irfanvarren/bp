<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class PassportHistory extends Model
{
    protected $table = "student_passport_histories";

    protected $fillable = [
    	'student_id','name','passport_number','expired_date'
    ];
}
