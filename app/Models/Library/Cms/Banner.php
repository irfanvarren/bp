<?php

namespace App\Models\Library\Cms;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  protected $fillable = [
    'banner_id','banner_type','mobile_image','image','text','link' ];
  protected $table = "library_banner";  //
}
