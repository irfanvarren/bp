<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventExhibitor extends Model
{
    protected $table = "tb_events_exhibitors";
    protected $fillable = [
    	"event_id","school_id","country_id","name","about","logo","course","booth"
    ];
}
