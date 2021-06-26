<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;
use Awobaz\Compoships\Compoships;
class CourseEvent extends Model
{
	use Compoships;
	use InsertOnDuplicateKey;
	protected $fillable = [
		'REF_EVENT_TYPE','REF_PAKET','REF_LEVEL'
	];
}
