<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = "email";
    protected $primaryKey = "kd_email";
    public $timestamps = false;
}
