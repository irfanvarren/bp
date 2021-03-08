<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCommission extends Model
{
    protected $fillable = [
    	'school_id','agent_id','commission_for','commission','commission_percent','note'
    ];
    
}
