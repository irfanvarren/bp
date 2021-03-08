<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\TbDetProperti;

class SearchController extends Controller
{
    //
    public function index(){
      $status  = Input::get('status') ;
      $keyword = Input::get('keyword') ;
      $residen = Input::get('residen');
      $lokasi = Input::get('lokasi');
      $minprice = Input::get('minprice');
      $maxprice = Input::get('maxprice');//
      $formData = (object) array('statusForm'=>$status,'keywordForm' => $keyword,'residenForm'=>$residen,'lokasi'=>$lokasi,'minprice' => $minprice,'maxprice'=> $maxprice);
      $where = "";
      if($keyword != ""){
        $where .=",'keyword',$keyword";
      }else if($residen != ""){
        $where .=",'residen',$residen";
      }else if($lokasi !=""){
        $where .=",'lokasi',$lokasi";
      }else if($minprice !=""){
        $where .=",'minprice',$minprice";
      }
      $tempat_tinggal = DB::table('tb_jenis')->where('pengelompokan_jenis', 'Tempat Tinggal')->orderBy('nama_jenis')->get();
      $komersial = DB::table('tb_jenis')->where('pengelompokan_jenis', 'Komersial')->orderBy('nama_jenis')->get();
      $lainnya = DB::table('tb_jenis')->where('pengelompokan_jenis', 'Lainnya')->orderBy('nama_jenis')->get();
      $properti = DB::table('tb_properti')->join('regencies','tb_properti.id_kota','=','regencies.id_kota')->where('status',$status)->paginate(15);
      return view('search',['status' => $status,'keyword' => $keyword,'tempat_tinggal' => $tempat_tinggal,'komersial' => $komersial,'lainnya' => $lainnya,'properti' => $properti,'formData'=>$formData]);
    }

    public function detail(){
      $id_properti = Input::get('id_properti');
      $det_properti = DB::table('tb_properti')
      ->join('regencies','tb_properti.id_kota','=','regencies.id_kota')
      ->join('provinces','regencies.id_provinsi','=','provinces.id_provinsi')
      ->join('tb_jenis','tb_properti.id_jenis','=','tb_jenis.id_jenis')
      ->join('tb_det_properti','tb_properti.id_properti','=','tb_det_properti.id_properti')
      ->join('tb_hak_milik','tb_det_properti.id_hak_milik','=','tb_hak_milik.id_hak_milik')
      ->select('tb_det_properti.*','tb_properti.*','tb_hak_milik.nama_hak','regencies.name as nama_kota','provinces.name as nama_provinsi','tb_jenis.nama_jenis')
      ->where('tb_properti.id_properti',$id_properti)
      ->get();
      return view('detail',['det_properti' => $det_properti]);
    }
}
