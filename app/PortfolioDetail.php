<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioDetail extends Model
{
    protected $table = "tb_portfolio_details";
    protected $fillable = ['id_karyawan','name','description'];
    public function galleries(){
    	return $this->hasMany('App\PortfolioGallery','detail_id');
    }
}
