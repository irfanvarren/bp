<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Models\Library\Buku;
use App\Models\Library\Cms\Banner;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getHome() {
        $buku = Buku::orderBy('tahun_terbit','DESC')->limit(5)->get();
    	$banner = Banner::all();
        return view('e-library.home',['buku' => $buku,'banner' => $banner]);
    }

    public function getcatalog() {
    	return view('e-library.catalog');
    }
    
	public function getContact() {
    	return view('e-library.contact');
    }
    public function getDetail($id) {
        $buku = Buku::find($id);
    	if(!$buku){
            return redirect()->back();
        }
        return view('e-library.detail',['buku' => $buku]);
    }
    public function getsearch(Request $request) {
        $keyword = $request->keyword;
        return view('e-library.search',['keyword' =>$keyword ]);
    }
    public function searchajax(Request $request){
        $keyword = $request->keyword;
        $buku = Buku::where('judul','like','%'.$keyword.'%')->get();
        return view('e-library.fetch',['buku' => $buku]);
    }
}
