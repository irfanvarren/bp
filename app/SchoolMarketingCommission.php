<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolMarketingCommission extends Model
{
     protected $fillable = [
    	'school_id','agent_id','commission','commission_percent','note'
    ];
}
