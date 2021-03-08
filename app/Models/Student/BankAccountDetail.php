<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class BankAccountDetail extends Model
{
    protected $table = "student_bank_account_details";

    protected $fillable = [
    	'student_id','account_location_type','bank_name','branch','account_name','account_number','bsb','swift_code','address',
    ];
}
