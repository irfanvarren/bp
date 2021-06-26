<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaRequirement extends Model
{
   protected $fillable = [
   	'name','content','country_id','type'
   ];
}
