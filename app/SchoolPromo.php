<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolPromo extends Model
{
    protected $fillable = [
    	"school_id",'course_id','program_id','type','name','special_offer','total_offer','term_and_conditions','intake','date_terminated'
    ];
}
