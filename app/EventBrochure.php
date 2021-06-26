<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBrochure extends Model
{
    protected $table = "tb_events_brochures";
    protected $fillable = [
    	'exhibitor_id','event_id','name','mime_type','path'
    ];
}
