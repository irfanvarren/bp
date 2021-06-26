<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberRole;
use App\Merchant;
use App\MerchantProductsModel;
use App\MerchantPromoModel;
use App\MerchantPromoHistory;
use App\MemberBalanceOut;

class MemberController extends Controller
{
	public function index(){
		$merchants = Merchant::where('status',1);
		$merchant_acronyms = Merchant::selectRaw('UPPER(SUBSTRING(NAME,1,1)) as fl')->groupBy('fl')->get();
		$roles = MemberRole::get();
		$monthly_promos = MerchantPromoModel::selectRaw('tb_merchantpromo.*,(select count(*) from member_balance_out where member_balance_out.promo_id = tb_merchantpromo.id and member_balance_out.user_id = '.auth()->user()->id.') as used,tb_merchantproduct.harga as harga_produk')->join('tb_merchantproduct','tb_merchantpromo.id_produk','tb_merchantproduct.id')->orderBy('updated_at','DESC')->get();
		$promo_histories = MemberBalanceOut::selectRaw('member_balance_out.*,tb_merchantpromo.nama_promo as nama_promo')->join('tb_merchantpromo','tb_merchantpromo.id','member_balance_out.promo_id')->where('user_id',auth()->user()->id)->get();
		return view('merchant/index',['merchants' => $merchants->paginate(9),'merchant_acronyms'=>$merchant_acronyms,'roles' => $roles,'monthly_promos' => $monthly_promos,'promo_histories' => $promo_histories]);
	}
	public function promo_qrcode($kode_promo){
		return view('merchant/kode-promo',['kode_promo' => $kode_promo]);
	}
	public function promo_qrcode_scan(Request $request){
		$user_id = auth()->check() ? auth()->user()->id : null;
		$promoHistory = new MerchantPromoHistory;
		$promo = MerchantPromoModel::where('kode_promo',$request->kode_promo)->first();
		$merchant = Merchant::where('slug',$request->merchant_link)->first();
		$merchant_id = $merchant != "" ? $merchant->id : "";
		$promo_merchant_id = $promo != "" ? $promo->id_merchant : "";
		$amount = str_replace(".","", $request->amount);
		if($amount ==""){
			$amount = 0;
		}
		$product = MerchantProductsModel::find($promo->id_produk);
		$product_price = $product->harga;
		if($promo->potongan_harga != 0){
			$biaya = $promo->potongan_harga;
		}else if($promo->potongan_persen != 0){
			$biaya = ($promo->potongan_persen / 100) * $product_price;
		}

		// if(auth()->user()->member_balance() < $biaya){
		// 	$return = ['success' => false,'message' => 'Saldo tidak mencukupi'];
		// 	return response()->json($return);
		// }

		if($amount > $biaya || $amount < 0){
			$return = ['success' => false,'message' => 'Jumlah poin yang diinputkan salah !'];
			return response()->json($return);
		}
		
		$remaining_fee = $product_price - $amount;
		$total_promo = $product_price - $biaya;

		if($promo_merchant_id == $merchant_id){
			$merchant_promo_history = MemberBalanceOut::create(['user_id' => $user_id,'product_id' => $product->id,'promo_id' => $promo->id,'merchant_id' => $merchant_id,'product_price' => $product_price,'promo_price' => $promo->potongan_harga,'promo_price_percent' => $promo->potongan_persen,'total_promo' => $total_promo,'amount' => $amount,'remaining_fee' => $remaining_fee,'description' => 'Pemakaian promo "'.$promo->nama_promo.'" untuk produk "'.$product->nama_produk.'" pada merchant "'.$merchant->name.'" tanggal '.date('d/m/Y').'. Biaya Produk : '.$product_price.' Rupiah, Potongan : '.$biaya.' Rupiah, Jumlah Yang Dibayarkan : '.$amount.' Rupiah, Sisa yang harus dibayar : '.$remaining_fee.' Rupiah']);
			$return = ['success' => true,'message' => 'Promo berhasil digunakan'];
			return response()->json($return);
		}else{
			return response()->json(['success' => false,'message' => 'QR Code yang anda scan salah !']);
		}

		return resonse()->json(['success' => false,'message' => 'Unknown Error']);
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
