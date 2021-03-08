<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacketModule extends Model
{
    protected $table = "tb_module";
    protected $fillable = [
    	"REF_PAKET","NAMA"
    ];
}
