<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public $incrementing = false;
    protected $table = "tb_jabatan";
    protected $primaryKey = "KD";
}
