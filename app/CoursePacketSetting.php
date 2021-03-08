<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePacketSetting extends Model
{
    protected $primaryKey = "KD";
    public $incrementing = false;
    public $fillable = ['KD','REF_PRICELIST','slug','image','short_description','description','status'];
}
