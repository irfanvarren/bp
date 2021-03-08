<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPhoto extends Model
{
    protected $table = "tb_events_photos";
    //protected $appends = ['image_size'];
    protected $fillable = [
    	'path','exhibitor_id','event_id','mime_type'
    ];

    /*public function getImageSizeAttribute()
    {
    	$size = getimagesize(asset('events').'/'. $this->attributes['path']);
    	list($width,$height) = $size;
        return $size;
    }*/
}
