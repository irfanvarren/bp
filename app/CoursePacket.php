<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePacket extends Model
{
  protected $table = 'tb_paket_bimbel';
  protected $primaryKey = 'KD';
  public $incrementing = false;
  protected $appends = array('slug');

  public function businessRelation(){
    return $this->hasOne('App\Business','KD');
  }
  public function course()
  {
    return $this->belongsTo('App\Form\RegisPaketDtl', 'REF_PAKET');
  }

  public function prices(){
    return $this->hasMany('App\PacketPriceDetails','REF_PAKET','KD');
  }

  public function getSlugAttribute(){
    return \App\CoursePacketSetting::where('KD',$this->value)->value('slug');
  }
  public function levels(){
    return $this->hasManyThrough('App\Level','App\PacketPriceDetails','REF_PAKET','KD','KD','REF_LEVEL');
  }

    //
}
