<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtCurrentTestQna extends Model
{
    protected $table = "ot_current_test_qna";
    protected $fillable = [
        'current_test_id','question_id','answer_id','answer','num'
    ];
    public $timestamps = false;
}
