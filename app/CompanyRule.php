<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyRule extends Model
{
    protected $table = "company_rules";
    protected $fillable = [
    	'company_id','category_id','rule','rule_preview'
    ];
}
