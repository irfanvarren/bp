<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MerchantPromoHistory;
use App\MerchantPromoModel;
use App\MemberBalanceOut;
use Auth;

class MerchantController extends Controller
{
    protected function guard(){
      return Auth::guard('merchant');
    }
    protected function user(){
      return $this->guard()->user();
    }
    public function index(){
      $title = "Member Les";
      $route = "member-les";
      $dashboard = "";
      $idMerchant = Auth::guard('merchant')->user()->id;
      $jlhUser = MemberBalanceOut::select("user_id")->where('merchant_id','=',$idMerchant)->groupBy('user_id')->get();

      $promoHistory = MemberBalanceOut::selectRaw('count(member_balance_out.id) as jlh, tb_merchantpromo.nama_promo, tb_merchantpromo.kode_promo, tb_merchantpromo.jlh as jlh_promo')->join('tb_merchantpromo','tb_merchantpromo.id','member_balance_out.promo_id')->where('member_balance_out.merchant_id','=',$idMerchant)->groupBy('member_balance_out.promo_id','tb_merchantpromo.nama_promo','tb_merchantpromo.kode_promo','tb_merchantpromo.jlh')->paginate(8);
      $point_merchant = MemberBalanceOut::selectRaw('sum(member_balance_out.amount) as point')->where('member_balance_out.merchant_id','=',$idMerchant)->value('point');
      $merchant = $this->user();
      return view('merchant-dashboard',['default_route' => $route,'title' => $title,'dashboard' => $dashboard,'jlh_user' => $jlhUser,'promoHistory' => $promoHistory,'point_merchant' => $point_merchant]);
    }

    public function detail_promo($kode_promo){
      $promo = MerchantPromoModel::where('kode_promo',$kode_promo)->first();
      if(!$promo){
        abort(404,"Promo Tidak Ditemukan");
      }
      $promo_id = $promo->id;
            $idMerchant = Auth::guard('merchant')->user()->id;
      $promoHistory = MemberBalanceOut::selectRaw('member_balance_out.*,users.name as user_name,users.email,tb_merchantpromo.nama_promo,tb_merchantpromo.kode_promo,tb_merchantpromo.potongan_harga,tb_merchantpromo.potongan_persen,tb_merchantproduct.harga as harga_produk')->join('users','users.id','member_balance_out.user_id')->join('tb_merchantpromo','member_balance_out.promo_id','tb_merchantpromo.id')->join('tb_merchantproduct','tb_merchantproduct.id','tb_merchantpromo.id_produk')->where('member_balance_out.promo_id',$promo_id)->where('member_balance_out.merchant_id',$idMerchant)->get();

      return view('merchant.admin.detail-promo',compact('promoHistory'));
    }

    public function member_admin_login(){
      return view('auth.login');
    }//

}
