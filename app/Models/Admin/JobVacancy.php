<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = ['category_id','name','image'];
}
