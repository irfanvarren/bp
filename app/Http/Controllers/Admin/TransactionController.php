<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\CartItem;
use App\CartDebitPayment;
use App\CartPayment;
use App\CartDebitResponse;
use App\CartDebitCancellation;

class TransactionController extends Controller
{
    public function index(){
    	$transactions = Cart::selectRaw('carts.*,users.email, users.name as user_name')->join('users','users.id','carts.user_id')->with(['items' => function($query){
    		return $query->selectRaw('cart_items.*,tb_paket_bimbel.NAMA as NAMA_PAKET')->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET');
    	}])->with('payments')->get();
    	return view('admin.transaction.index',compact('transactions'));
    }
}
