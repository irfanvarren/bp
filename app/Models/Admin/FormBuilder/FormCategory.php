<?php

namespace App\Models\Admin\FormBuilder;

use Illuminate\Database\Eloquent\Model;

class FormCategory extends Model
{
	protected $primaryKey = "idkategori";
    protected $fillable = [
    	'idsoal','idkategori','kategori'
    ];

    public function questions(){
    	return $this->hasMany('App\Models\Admin\FormBuilder\FormQuestion','idkategori','idkategori');
    }
}
