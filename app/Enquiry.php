<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "tb_komplain";
    protected $fillable = [
    	'complaint_code','user_id','question','type','subject','occupation','branch_id','text','status','files'
    ];

    public function details(){
return $this->hasMany('App\EnquiryDetail','complaint_code','complaint_code');
    }
}
