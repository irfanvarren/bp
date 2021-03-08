<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLobby extends Model
{
	protected $table = "tb_events_lobbies";
    protected $primaryKey = "event_id";
    protected $fillable = [
    	'event_id','background','title','description'
    ];
}
