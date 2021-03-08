<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolBankAccount extends Model
{
    protected $fillable = [
    	'school_id','account_name','account_number','bsb','swift_code','bank_name','bank_address','note'
    ];
}
