<?php

namespace App\Http\Controllers\Admin\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cms\BannerModel;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BannerModel $banner)
    {
        return  view("admin.cms.banner.index",['data_banner' => $banner->paginate(15)]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("admin.cms.banner.create");  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $banner_id = "B";
      $banner_num = BannerModel::orderBy('id','desc')->value('banner_id');
      $num_arr = explode('B',$banner_num);

      if(isset($num_arr[1])){
      $no = $num_arr[1];
      $no++;
      }

      if($banner_num == null){
        $banner_id .= "001";
      }else{
$zerofill = 3;

$banner_id = $banner_id.str_pad($no, $zerofill, '0', STR_PAD_LEFT);

      }
        $path = "img/banner";
      $gambar =$request->file('image1');

    if(!empty($gambar)){

      $ext_gambar = $gambar->getClientOriginalExtension();
      $nama_gambar = $gambar->getClientOriginalName();
      $path_gambar = $gambar->storeAs($path, $nama_gambar,'public');
        $request->merge(['image' => $path_gambar]);
    }
    $gambar2 =$request->file('image2');

  if(!empty($gambar2)){

    $ext_gambar2 = $gambar2->getClientOriginalExtension();
    $nama_gambar2 = $gambar2->getClientOriginalName();
    $path_gambar2 = $gambar2->storeAs($path, $nama_gambar2,'public');
      $request->merge(['mobile_image' => $path_gambar2]);
  }

      $request->merge(['banner_id' => $banner_id]);

        $banner = BannerModel::create($request->all());
        return redirect()->route('cms-banner.index')->withStatus(__('Banner successfully Added.'));
        //
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
      $banner = BannerModel::find($id);
      return view('admin.cms.banner.edit',['data_banner'=> $banner,'id' => $id]);  //
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
        $path = "img/banner";
      $gambar =$request->file('image1');

    if(!empty($gambar)){

      $ext_gambar = $gambar->getClientOriginalExtension();
      $nama_gambar = $gambar->getClientOriginalName();
      $path_gambar = $gambar->storeAs($path, $nama_gambar,'public');
        $request->merge(['image' => $path_gambar]);
    }
    $gambar2 =$request->file('image2');

  if(!empty($gambar2)){

    $ext_gambar2 = $gambar2->getClientOriginalExtension();
    $nama_gambar2 = $gambar2->getClientOriginalName();
    $path_gambar2 = $gambar2->storeAs($path, $nama_gambar2,'public');
      $request->merge(['mobile_image' => $path_gambar2]);
  }


        $banner = BannerModel::find($id)->update($request->all());
        return redirect()->route('cms-banner.index')->withStatus(__('Banner successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $banner = BannerModel::find($id)->delete();
      return redirect()->route('cms-banner.index')->withStatus(__('Banner successfully deleted.'));

    }
}
