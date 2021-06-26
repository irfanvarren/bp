<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Models\Admin\Cms\PgProductsModel;
use App\Models\Admin\Cms\PgProductDescModel;
use App\Models\Admin\Cms\PgProductBenefitModel;
use App\Models\Admin\Cms\PgProductTargetModel;
use App\PaketBimbel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PgProductsModel $products,PgProductDescModel $products_desc)
    {
      return  view("admin.cms.products.index",['products' => $products->paginate(15),'productdesc' => $products_desc->paginate(8)]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $paketbimbel = PaketBimbel::get();
      return view('admin.cms.products.create',['paket_bimbel' => $paketbimbel]);  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $products = PgProductsModel::create($request->all());
      return redirect()->route('cms-products.index')->withStatus("Products Has Been Successfully Created");  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $products = PgProductsModel::find($id);
      $paketbimbel = PaketBimbel::get();
      return view('admin.cms.products.edit',['products' => $products,'paket_bimbel' => $paketbimbel,'id' => $id]);  //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $products = PgProductsModel::find($id)->update($request->all());

      return redirect()->route('cms-products.index')->withStatus('Producst Has Been Successfully Updated !');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $products = PgProductsModel::find($id)->delete();
      $productsDesc = PgProductDescModel::find($product_id)->delete();
      $productsBenefit = PgProductBenefitModel::find($product_id)->delete();
      $productsTarget = PgProductTargetModel::find($product_id)->delete();
      return redirect()->route('cms-products.index')->withStatus('Products Has Been Successfully Deleted !');
    }

    public function productdesc_ajax(PgProductDescModel $product_desc,Request $request){

      if($request->cmd == "add"){
        $product_desc->create($request->except(["_token"]));
      }else if($request->cmd == "update"){
        $product_desc->find($request->id)->update($request->except(["_token"]));
      }else if($request->cmd == "delete"){
        $product_desc->find($request->id)->delete();
      }
      return view("admin.cms.products.productdesc_ajax",["productdesc" => $product_desc->paginate(8)]);
    }

    public function productbenefit_ajax(PgProductBenefitModel $product_benefit,Request $request){
      if($request->hasFile('benefit_img')){
        $path = "img/cms/products";
        $gambar =$request->file('benefit_img');

        if(!empty($gambar)){

          $ext_gambar = $gambar->getClientOriginalExtension();
          $nama_gambar = $gambar->getClientOriginalName();
          $path_gambar = $gambar->storeAs($path, $nama_gambar,'public');
          $request->merge(['image' => $path_gambar]);
        }
      }
      if($request->cmd == "add"){
        $product_benefit->create($request->except(["_token"]));
      }else if($request->cmd == "update"){
        $product_benefit->find($request->id)->update($request->except(["_token"]));
      }else if($request->cmd == "delete"){
        $product_benefit->find($request->id)->delete();
      }


      return view("admin.cms.products.productbenefit_ajax",["productbenefit" => $product_benefit->paginate(8)]);    }

      public function producttarget_ajax(PgProductTargetModel $product_target,Request $request){
        if($request->hasFile('target_img')){
          $path = "img/cms/products";
          $gambar =$request->file('target_img');

          if(!empty($gambar)){

            $ext_gambar = $gambar->getClientOriginalExtension();
            $nama_gambar = $gambar->getClientOriginalName();
            $path_gambar = $gambar->storeAs($path, $nama_gambar,'public');
            $request->merge(['image' => $path_gambar]);
          }
        }
        if($request->cmd == "add"){
          $product_target->create($request->except(["_token"]));
        }else if($request->cmd == "update"){
          $product_target->find($request->id)->update($request->except(["_token"]));
        }else if($request->cmd == "delete"){
          $product_target->find($request->id)->delete();
        }


        return view("admin.cms.products.producttarget_ajax",["producttarget" => $product_target->paginate(8)]);
      }
    }
