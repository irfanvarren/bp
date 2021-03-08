<?php

namespace App\Models\Admin\FormBuilder;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
	protected $primaryKey  = "idsoal";
    protected $fillable = [
    	'soal','slug'
    ];
}
