<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public $fillable = [
    	'name','email','phone_number','complaint_about','complaint_detail','complaint_date','suggestion'
    ];
}
