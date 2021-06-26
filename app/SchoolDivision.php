<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolDivision extends Model
{
    protected $fillable = ['name','school_id'];
    protected $table = "school_divisions";
    //
}
