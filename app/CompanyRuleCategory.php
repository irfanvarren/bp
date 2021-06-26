<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyRuleCategory extends Model
{
    protected $fillable = [
    	'company_id','name','icons'
    ];
}
