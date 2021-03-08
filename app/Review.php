<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "tb_review";
    protected $fillable = [
    	'user_id','review','rating'
    ];
}
