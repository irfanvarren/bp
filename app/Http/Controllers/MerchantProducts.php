<?php

namespace App\Http\Controllers;

use Auth;
use Storage;

use App\PaketBimbel;
use App\MerchantProductsModel;
use App\ProductCategory;
use App\Http\Requests\MerchantRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MerchantProducts extends Controller
{
  private $route = 'merchant';
  private $title = 'merchant';
  private $dashboard = 'admin';

  public function index(MerchantProductsModel $model){
   $id_merchant = Auth::guard('merchant')->user()->id;
   $model = $model::where('id_merchant',$id_merchant);
   return view('merchant.admin.products.index',['dashboard' => $this->dashboard,'default_route' => $this->route,'title' => $this->title,'products' => $model->paginate(10)]);
      }//
      public function create(){
        $product_categories = ProductCategory::get();
        return view('merchant.admin.products.create',['default_route' => $this->route,'title' => $this->title,'product_categories' => $product_categories]);
      }

      public function edit($id,MerchantProductsModel $model){

        $products = $model::where('id',$id)->first();
        return view('merchant.admin.products.edit',['default_route' => $this->route,'title' => $this->title,'products' => $products,'id' => $id]);
      }
      public function update($id,MerchantProductsModel $products,Request $request)
      {   if($request->status == "on"){
        $request->merge(['status' => 1]);
      }else{

        $request->merge(['status' => 0]);
      }
      $products::find($id)->update($request->all());
      return redirect()->route('mp.index')->withStatus(__('Products successfully updated.'));
    }
    public function store(Request $request,MerchantProductsModel $model){
     $id_merchant = Auth::guard('merchant')->user()->id;
     $gambar = $request->file('gambar');
     if($request->status == "on"){
      $request->merge(['status' => 1]);
    }else{

      $request->merge(['status' => 0]);
    }
    if($request->kategori_produk_lainnya != ""){
      $request->merge(['kategori_produk' => $request->kategori_produk_lainnya]);
    }
    $harga = str_replace(",",".",str_replace(".","",substr($request->harga,4)));
    $request->merge(['harga' => $harga]);
    if(!empty($gambar)){
      $ext_gambar = $gambar->getClientOriginalExtension();
      $nama_gambar = $gambar->getClientOriginalName();
      $file_gambar = Storage::disk('member-les')->put($id_merchant,$gambar);
      $path_gambar = asset('img/member-les/uploads/'.$file_gambar);
      $request->request->add(['lokasi_gambar' => $path_gambar]);
    }
    $model->create($request->all());

    return redirect()->route('mp.index')->withStatus(__('Products successfully created.'));
  } 
  public function destroy($id,MerchantProductsModel $model)
  {
    $model->destroy($id);
    return redirect()->route('mp.index')->withStatus(__('Products successfully deleted.'));
  }
}
