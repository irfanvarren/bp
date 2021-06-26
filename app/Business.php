<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
  protected $table = 'tb_bidangusaha';
  protected $primaryKey = 'KD';
  public $incrementing = false;
  public function courseRelation(){
    return $this->belongsTo('App\CoursePacket');
  }

 
    //
}
