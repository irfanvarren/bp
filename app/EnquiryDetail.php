<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiryDetail extends Model
{
    protected $table = "tb_dtl_komplain";
    protected $fillable = [
    	'complaint_code','date','solution_num','solution','employee_user_id'
    ];
}
