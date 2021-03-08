<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Requests\Library\BukuRequest;
use App\Models\Library\Buku;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{

    public function getBuku() {
        $buku = Buku::all();
        return view('e-library.isiformbuku', ['buku' => $buku]);
    }

    public function submit(BukuRequest $request) {
    $buku = new Buku();
    $path = "img/library/cover";
    $buku->judul = $request->input('judul');
    $buku->ISSN = $request->input('ISSN');
    $buku->ISBN = $request->input('ISBN');
    $buku->penerbit = $request->input('penerbit');
    $buku->penulis = $request->input('penulis');
    $buku->kategori_buku = $request->input('kategori_buku');
    $buku->bahasa = $request->input('bahasa');
    $buku->tahun_terbit = $request->input('tahun_terbit');
    $buku->format = $request->input('format');
    $buku->link_download = $request->input('link_download');
   
    $buku->deskripsi = $request->input('deskripsi');
    $buku->cek_video = $request->input('cek_video');
    $buku->cek_audio = $request->input('cek_audio');
    $buku->cek_ebook = $request->input('cek_ebook');
    $buku->link_audiovideo = $request->input('link_audiovideo');
    $buku->save();


    $id = $buku->id;
    if($request->hasFile('gambar')){
    $file_gambar = $request->file('gambar');
    $ext_gambar = $file_gambar->getClientOriginalExtension();
    $link_gambar = $file_gambar->storeAs($path,$id.".".$ext_gambar,'public');
    $request->merge(['link_gambar' => $link_gambar]);
    }

    $buku->link_gambar = $request->link_gambar;

    $buku->save();

    return redirect()->route('get-buku');
    }

    public function edit($id){
        $buku = Buku::find($id);
        return view('e-library.edit',['buku' => $buku]);
    }
    public function update(BukuRequest $request,$id) {
    $buku = Buku::find($id);
     $path = "img/library/cover";
       if($request->hasFile('gambar')){
    $file_gambar = $request->file('gambar');
    $ext_gambar = $file_gambar->getClientOriginalExtension();
    $link_gambar = $file_gambar->storeAs($path,$id.".".$ext_gambar,'public');
    $request->merge(['link_gambar' => $link_gambar]);
    }
    $buku->judul = $request->input('judul');
    $buku->ISSN = $request->input('ISSN');
    $buku->ISBN = $request->input('ISBN');
    $buku->penerbit = $request->input('penerbit');
    $buku->penulis = $request->input('penulis');
    $buku->kategori_buku = $request->input('kategori_buku');
    $buku->bahasa = $request->input('bahasa');
    $buku->tahun_terbit = $request->input('tahun_terbit');
    $buku->format = $request->input('format');
    $buku->link_download = $request->input('link_download');
    $buku->link_gambar = $request->link_gambar;
    $buku->deskripsi = $request->input('deskripsi');
    $buku->cek_video = $request->input('cek_video');
    $buku->cek_audio = $request->input('cek_audio');
    $buku->cek_ebook = $request->input('cek_ebook');
    $buku->link_audiovideo = $request->input('link_audiovideo');
    $buku->save();


    return redirect()->route('get-buku');
    }
    public function delete($id){
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('get-buku');
    }
}
