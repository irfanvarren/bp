<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtCurrentTest extends Model
{
    protected $fillable = [
        'test_id','module_id','package_id','student_id','start_time','identification','answers','score','final_score','registration_id','approved_date','package_seed','link_token'
    ];
}
