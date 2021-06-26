<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberBalanceIn extends Model
{	
	protected $table = "member_balance_in";
    public $fillable = [
    	'user_id','transaction_id','REF_PRICELIST','REF_PAKET','REF_LEVEL','REF_KATEGORI','amount','description'
    ];
}
