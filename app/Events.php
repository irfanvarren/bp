<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
  protected  $fillable = [
    'kd','nama','event_type_id','tgl_mulai','tgl_selesai','jam_mulai','jam_selesai','status','data_kelas','guest_book','full_day_event','test_module'
  ];
  protected $table = "tb_events";  //

  public function articles(){
    return $this->hasOne('App\EventsArticle','event_id','id');
  }
}
