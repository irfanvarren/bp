<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsGuestBook extends Model
{
	protected $fillable =[
		'KD','REF_EVENT','NAMA','EMAIL','NO_TELEPON','KELAS','minat_jurusan','sosmed_ig','prev_toefl_score'
	];
    protected $table = 'tb_events_guestbook';
    protected $primaryKey = 'KD';//
}
