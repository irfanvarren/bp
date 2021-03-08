<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MerchantPromoModel;
use App\MerchantProductsModel;
use Auth;
use Illuminate\Support\Facades\Hash;

class MerchantPromo extends Controller
{
  private $route = 'member-les';
  private $title = 'member les';
  private $dashboard = 'member-les';

      protected function id()
      {
      return Auth::guard('merchant')->user()->id;
      }
      public function index(MerchantPromoModel $model){

        return view('merchant.admin.promo.index',['dashboard' => $this->dashboard,'promo' => $model::where('id_merchant',$this->id())->paginate(15),'default_route' => $this->route,'title' => $this->title]);
      }//
      public function create(MerchantProductsModel $model){
        $model = $model::where('id_merchant',$this->id())->get();
        return view('merchant.admin.promo.create',['produk'=>$model,'default_route' => $this->route,'title' => $this->title]);
      }
      public function store(Request $request,MerchantPromoModel $model){

          $request->merge(['kode_promo' => str_random(10)]);
            $request->merge(['id_merchant' => Auth::guard('merchant')->user()->id]);
      if($request->on == "on"){
        $request->merge(['status' => 1]);
      }else{

          $request->merge(['status' => 0]);
      }

      if($request->jenis_potongan == "harga"){
        $request->merge(['potongan_harga' => $request->potongan]);
      }else{

          $request->merge(['potongan_persen' => $request->potongan]);
      }
     $model->create($request->all());
      return redirect()->route('promo.index');
      }
     public function edit($id,MerchantPromoModel $model){

      $promo = $model::where('id',$id)->first();
      $productModel = new MerchantProductsModel;
        $product = $productModel::where('id_merchant',$this->id())->get();
        return view('merchant.admin.promo.edit',['default_route' => $this->route,'title' => $this->title,'promo' => $promo,'produk' => $product,'id' => $id]);
      }
       public function destroy($id,MerchantPromoModel $model)
      
      {
          $model->destroy($id);
          return redirect()->route('promo.index')->withStatus(__('Promo successfully deleted.'));
      }
}
