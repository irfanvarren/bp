<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolRefund extends Model
{
    protected $fillable = [
    	'school_id','name','jlh_refund_total','jlh_refund_persen','details'
    ];
}
