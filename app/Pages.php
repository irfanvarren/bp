<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
  protected $fillable = [
    'title','name','content','slug','status','division_id','type_id','sub_type_id'
  ];
  protected $table = "pages";

  public function contents(){
  	return $this->hasOne('App\Models\Admin\Cms\PageContent','page_id')->withDefault();
  }

}
