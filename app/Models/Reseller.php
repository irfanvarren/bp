<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $fillable = [
    	'user_id','kode','nama','email','no_telepon','tempat_lahir','tanggal_lahir','alamat','no_ktp','kota','provinsi','kode_pos','file_ktp','status'
    ];
    public function products(){
    	return $this->hasMany('App\Models\ResellerQuota','reseller_id','id');
    }

    public function registration_data(){
    	return $this->hasManyThrough('App\Form\RegisPaketDtl','App\Models\ResellerQuota','reseller_id','reseller_quota_id','id','id');
    }
}
