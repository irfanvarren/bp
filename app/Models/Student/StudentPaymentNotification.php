<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentPaymentNotification extends Model
{
 	public $incrementing = false;  

 	public $fillable = [
 		'model_type','model_id','student_id','email','status'
 	];
}
