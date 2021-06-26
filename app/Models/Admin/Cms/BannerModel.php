<?php

namespace App\Models\Admin\Cms;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
  protected $fillable = [
    'banner_id','banner_type','mobile_image','image','text','link' ];
  protected $table = "banner";  //
}
