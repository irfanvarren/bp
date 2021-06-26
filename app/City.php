<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
      'name','region_id','country_id','latitude','longitude'
    ];  //
}
