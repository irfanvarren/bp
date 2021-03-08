<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
  protected $fillable=[
    'image','name','testimony','video'
  ];
    protected $table = "testimony";//
}
