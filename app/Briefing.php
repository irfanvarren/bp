<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Briefing extends Model
{
    protected $table = "tb_briefing";
    protected $fillable = [
    	'id','reference','subject','date','time','type','note_taker','announcement','discussion','conclusion','created_at','updated_at'
    ];

    public function attendees(){
    	return $this->hasMany('App\BriefingDetail','id_briefing','id');
    }
}
