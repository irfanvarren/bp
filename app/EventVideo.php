<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventVideo extends Model
{
    protected $table = "tb_events_videos";
    protected $fillable = [
    	'exhibitor_id','event_id','title','description','provider','vid'
    ];
}
