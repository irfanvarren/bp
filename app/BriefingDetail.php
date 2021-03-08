<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BriefingDetail extends Model
{
    protected $table = "tb_detail_briefing";
    protected $fillable = [
    	'id_briefing','id_karyawan','date','status','note'
    ];
}
