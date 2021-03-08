<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResellerQuota extends Model
{
    protected $fillable = [
    	'reseller_id','slug','REF_PRICELIST','REF_PAKET','REF_LEVEL','REF_KATEGORI','quota','status'
    ];
    public function registration_data(){
    	return $this->hasMany('App\Form\RegisPaketDtl','reseller_quota_id','id');
    }
}
