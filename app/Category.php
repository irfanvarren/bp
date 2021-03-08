<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'tb_kategori';
  protected $primaryKey = 'KD';
  public $incrementing = false;
  
}
