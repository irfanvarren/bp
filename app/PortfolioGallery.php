<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioGallery extends Model
{
    protected $table = "tb_portfolio_gallery";

    public $fillable = ['image','detail_id'];
}
