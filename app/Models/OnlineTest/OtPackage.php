<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtPackage extends Model
{
    protected $fillable = [
        'module_id','name','test_id'
    ];
}
