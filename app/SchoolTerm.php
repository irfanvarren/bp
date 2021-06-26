<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolTerm extends Model
{
    protected $fillable = [
    	'term','term_start_date','term_end_date','school_id','duration'
    ];
}
