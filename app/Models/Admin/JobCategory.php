<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    public function job_vacancies(){
        return $this->hasMany('App\Models\Admin\JobVacancy','category_id','id');
    }
}
