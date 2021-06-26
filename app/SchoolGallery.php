<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolGallery extends Model
{
    protected $fillable = [
      'school_id','image'
    ];
  protected $table = "school_galleries";  //
  public function school(){
  	return $this->belongsTo('App\School');
  }
}
