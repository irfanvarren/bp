<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cms\PageContent;
use App\Models\Admin\Cms\PageContentType;
use App\Cart;
use App\CartPayment;

class DashboardController extends Controller
{
	public function profile(){
		$footer = "";
		$contentType = PageContentType::where('name','Footer')->value('id');
		if($contentType != ""){
			$footer = PageContent::where('content_type', $contentType )->orderBy('id','DESC')->first();
		}
		return view('user.dashboard',compact('footer'));
	}
	public function transaction_details(){
		$cart_lists = Cart::where('user_id',auth()->user()->id)->orderBy('updated_at','DESC')->with('payments')->with('items')->where('status',0)->paginate(10);
		return view('user.transaction-details',compact('cart_lists'));
	}

	public function transaction_details_ajax(Request $request){
		$type = $request->type;
		switch($type){
			case "incart":
			$cart_lists = Cart::where('user_id',auth()->user()->id)->orderBy('updated_at','DESC')->with(['payments' => function($query){
				return $query->orderBy('updated_at','DESC');
			}])->with('items')->where('status',0)->paginate(10);
			break;
			case "success":
			$cart_lists = Cart::where('user_id',auth()->user()->id)->orderBy('updated_at','DESC')->with(['payments' => function($query){
				return $query->where('status',2);
			}])->with('items')->where('status',1)->paginate(10);
			break;
			case "cancelled":
			$cart_lists = Cart::where('user_id',auth()->user()->id)->orderBy('updated_at','DESC')->with(['payments' => function($query){
				return $query->where('status','!=',2);
			}])->with('items')->where('status',1)->paginate(10);
			break;
		}
		return view('user.transaction-details-ajax',compact('cart_lists'));
	}
}
