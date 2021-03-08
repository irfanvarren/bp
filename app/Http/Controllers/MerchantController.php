<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MerchantPromoHistory;
use App\MerchantPromoModel;
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
      $jlhUser = MerchantPromoHistory::select("id_user")->where('id_merchant','=',$idMerchant)->groupBy('id_user')->get();

      $promoHistory = MerchantPromoHistory::selectRaw('count(*) as jlh,id_promo')->selectRaw('students.name as nama_student,tb_merchantpromo.nama_promo as nama_promo,tb_merchantpromo.kode_promo as kode_promo,tb_merchantpromo.jlh_peruser as jlh_peruser')->join('students','students.id','=','tb_merchantpromohistory.id_user')->join('tb_merchantpromo','tb_merchantpromo.id','=','tb_merchantpromohistory.id_promo')->where('tb_merchantpromohistory.id_merchant','=',$idMerchant)->groupBy('id_user','id_promo','students.name','tb_merchantpromo.nama_promo','tb_merchantpromo.kode_promo','tb_merchantpromo.jlh_peruser')->paginate(8);

      $merchant = $this->user();
      return view('merchant-dashboard',['default_route' => $route,'title' => $title,'dashboard' => $dashboard,'jlh_user' => $jlhUser,'promoHistory' => $promoHistory]);
    }

    public function member_admin_login(){
      return view('auth.login');
    }//

}
