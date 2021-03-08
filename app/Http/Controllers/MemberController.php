<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberRole;
use App\Merchant;
use App\MerchantProductsModel;
use App\MerchantPromoModel;
use App\MerchantPromoHistory;
class MemberController extends Controller
{
	public function index(Merchant $model){
		$merchant = $model::where('status',1);
		$roles = MemberRole::get();
		$monthly_promos = MerchantPromoModel::orderBy('updated_at','DESC')->get();
		return view('merchant/index',['merchant' => $merchant->paginate(9),'roles' => $roles,'monthly_promos' => $monthly_promos]);
	}
	public function promo_qrcode($kode_promo){
		return view('merchant/kode-promo',['kode_promo' => $kode_promo]);
	}
	public function promo_qrcode_scan($kode_promo){
		if($kode_promo == "result"){
			return view('merchant/scan-qrcode');
		}else{
			$promoHistory = new MerchantPromoHistory;
			$kode_promo = Crypt::decryptString($kode_promo);
			$arr_kode = explode('###',$kode_promo);
			$kode_promo = $arr_kode[0];
			$id_user = $arr_kode[1];
			$Promo = MerchantPromoModel::where('kode_promo','=',$kode_promo)->first();
			$promoHistory->id_user = $id_user;
			$promoHistory->id_promo = $Promo->id;
			$promoHistory->id_merchant = $Promo->id_merchant;
			$promoHistory->save();

			return redirect('promo-scan/result');
		}
	}


	public function view_merchant($slug){
		$merchant = Merchant::where('slug',$slug)->first();

		if(!$merchant){
			return abort(404,"Merchant Tidak Ditemukan");
		}
		return view('merchant.merchant',['merchant' => $merchant,'id' => $merchant->id,'slug' => $slug]);
	}
	public function merchant_products_ajax(MerchantProductsModel $merchant_product,Request $request){
		$merchant_product = $merchant_product->where('id_merchant','=',$request->id_merchant)->get();
		return view('merchant.merchant-products',['merchant_product' => $merchant_product]);
	}
	public function merchant_promo_ajax(MerchantPromoModel $merchant_promo,Request $request){
		$merchant_promo = $merchant_promo->where('id_merchant','=',$request->id_merchant)->get();
		return view('merchant.merchant-promo',['merchant_promo' => $merchant_promo]);
	}
}
