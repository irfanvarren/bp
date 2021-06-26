<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Models\Library\Cms\Banner;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function getBanner() {
        $banner = Banner::all();

        return view('e-library.bannerupdate', ['banner' => $banner]);
    }
        public function edit($id){
        $banner = Banner::find($id);
        return view('e-library.editbanner',['banner' => $banner]);
    }
    public function update(BannerRequest $request,$id) {
    $banner = Banner::find($id);
    $banner->link_banner1 = $request->input('link_banner1');
    $banner->link_banner2 = $request->input('link_banner2');
    $banner->link_banner3 = $request->input('link_banner3');
    $banner->save();


    return redirect()->route('get-banner');
    }
}
