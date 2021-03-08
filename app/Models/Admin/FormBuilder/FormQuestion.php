<?php

namespace App\Models\Admin\FormBuilder;

use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
{
	protected $primaryKey = "idpertanyaan";
    protected $fillable = [
    	'idsoal','idpertanyaan','idkategori','quesioner','jawaban'
   	];

   	public function options(){
   		return $this->hasMany('App\Models\Admin\FormBuilder\FormOption','idpertanyaan','idpertanyaan');
   	}
}
