<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use App\PortfolioDetail;
use App\PortfolioGallery;
use App\Karyawan;
use App\Sales;
use App\Executive;
use App\Edubackground;
use App\Experience;
use App\Certification;
use App\OtherExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Config;

class PortfolioController extends Controller
{
  public $dashboard = "admin";
  protected $table_karyawan = 'tb_karyawan';
  protected $column_id = "ID_KARYAWAN";
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Karyawan $karyawan,Executive $executive,Sales $sales,Portfolio $model)
    {
      $portfolio = $model->selectRaw('tb_portfolio.*,tb_karyawan.*,tb_jabatan.NAMA as NAMA_JABATAN')->join("tb_karyawan","tb_portfolio.id_karyawan","=","tb_karyawan.ID_KARYAWAN")->join("tb_jabatan","tb_jabatan.KD","tb_karyawan.REF_JABATAN");
      $portfolio2 = $model->join("tb_executive","tb_portfolio.id_karyawan","=","tb_executive.ID_KARYAWAN");
      $portfolioFma = $model->join("tb_sales","tb_portfolio.id_karyawan","=","tb_sales.KD");
      $karyawan = $karyawan->whereNotExists(function($query)
      {
        $query->select("id_karyawan")
        ->from("tb_portfolio")
        ->whereRaw("tb_karyawan.id_karyawan = tb_portfolio.id_karyawan");
      })->get();
      $executive = $executive->whereNotExists(function($query)
      {
        $query->select("id_karyawan")
        ->from("tb_portfolio")

        ->whereRaw("tb_executive.id_karyawan = tb_portfolio.id_karyawan");
      })->get();
      $sales = $sales->whereNotExists(function($query)
      {
        $query->select("id_karyawan")
        ->from("tb_portfolio")
        ->whereRaw("tb_sales.KD = tb_portfolio.id_karyawan");
      })->orderBy('NAMA','ASC')->get();

      return view("admin.portfolio.index",["data_portfolio" => $portfolio->paginate(15),"data_portfolio2" => $portfolio2->paginate(15),"data_portfolio_fma" => $portfolioFma->paginate(15),"karyawan" => $karyawan,"executive" => $executive,"sales" => $sales]);  //
    }
    public function create(Edubackground $edubackground,Request $request){
     if($request->role == "executive"){
      $this->table_karyawan = "tb_executive";
      $column_id = "ID_KARYAWAN";
    }else if ($request->role == "sales"){
      $this->table_karyawan = "tb_sales";
      $column_id = "KD";
    }else{
      $column_id = $this->column_id;
    }

    $id_karyawan = $request->karyawan;
    $data_karyawan = Karyawan::find($id_karyawan);

    if(!isset($request->role)){
      $edubackground2 = $edubackground::select("tb_portfolio_edubackground.*","$this->table_karyawan.NAMA as nama_karyawan")->join("$this->table_karyawan","tb_portfolio_edubackground.id_karyawan","=","$this->table_karyawan.ID_KARYAWAN")->where("tb_portfolio_edubackground.id_karyawan","=",$id_karyawan)->get();
    }else{
      $edubackground2 = $edubackground::select("tb_portfolio_edubackground.*",$this->table_karyawan.".NAMA as nama_karyawan")->join($this->table_karyawan,"tb_portfolio_edubackground.id_karyawan","=",$this->table_karyawan.".".$column_id)->where("tb_portfolio_edubackground.id_karyawan","=",$id_karyawan)->get();
    }
    return view("admin.portfolio.create",["id_karyawan" => $id_karyawan,"edubackground" => $edubackground2,"role" => $request->role,'data_karyawan' => $data_karyawan]);
  }
  public function edit($id,Request $request){
    $edubackground = New Edubackground;
    $portfolio = New Portfolio;
    $portfolio = $portfolio->where("id",$id)->first();
    $id_karyawan = $portfolio->id_karyawan;

    $data_karyawan = Karyawan::find($id_karyawan);
    if($request->role == "executive"){
      $this->table_karyawan_karyawan = "tb_executive";
      $data_karyawan = Executive::find($id_karyawan);
    }

    if(!isset($request->role)){
      $edubackground2 = $edubackground::select("tb_portfolio_edubackground.*","$this->table_karyawan.NAMA as nama_karyawan")->join("$this->table_karyawan","tb_portfolio_edubackground.id_karyawan","=","$this->table_karyawan.ID_KARYAWAN")->where("tb_portfolio_edubackground.id_karyawan","=",$id_karyawan)->get();
    }else{
      $edubackground2 = $edubackground::select("tb_portfolio_edubackground.*","tb_executive.NAMA as nama_karyawan")->join("tb_executive","tb_portfolio_edubackground.id_karyawan","=","tb_executive.ID_KARYAWAN")->where("tb_portfolio_edubackground.id_karyawan","=",$id_karyawan)->get();
    }
    return view("admin.portfolio.create",["role" => $request->role,"id"=>$id,"id_karyawan" => $id_karyawan,"edubackground" => $edubackground2,'data_karyawan' => $data_karyawan,'portfolio' => $portfolio]);
  }

  public function store(Portfolio $portfolio,Request $request){
    $id = $request->id_karyawan;
    $cek_portfolio = $portfolio->where('id_karyawan',$id)->get();
    if($cek_portfolio){

      $portfolio->id_karyawan = $request->id_karyawan;
      $portfolio->save();

      return redirect()->route("portfolio.index")->withStatus('Portofolio successfully created');
    }else{
      return redirect()->route('portfolio.index')->withStatus('Portfolio Exists !');
    }
  }

  public function edubackground_ajax(Edubackground $edubackground,Request $request){
    if($request->role == "executive"){
      $this->table_karyawan = "tb_executive";
      $column_id = "ID_KARYAWAN";
    }else if ($request->role == "sales"){
      $this->table_karyawan = "tb_sales";
      $column_id = "KD";
    }else{
      $column_id = $this->column_id;
    }


    if($request->cmd == "add"){
      $edubackground->create($request->except(["_token"]));
    }else if($request->cmd == "update"){
      $edubackground->find($request->id)->update($request->except(["_token"]));
    }else if($request->cmd == "delete"){
      $edubackground->find($request->id)->delete();
    }

    $edubackground2 = $edubackground::select("tb_portfolio_edubackground.*",$this->table_karyawan.".NAMA as nama_karyawan")->join($this->table_karyawan,"tb_portfolio_edubackground.id_karyawan","=",$this->table_karyawan.".".$column_id)->where("tb_portfolio_edubackground.id_karyawan","=",$request->id_karyawan)->get();

    return view("admin.portfolio.edubackground-table",["edubackground" => $edubackground2]);
  }

  public function certification_ajax(Certification $certification,Request $request){

    if($request->cmd == "add"){
      $certification->create($request->all());
    }else if($request->cmd == "update"){
      $certification->find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
      $certification->find($request->id)->delete();
    }
    $certifications = $certification->where('id_karyawan',$request->id_karyawan)->get();
    return view("admin.portfolio.certification",["certifications" => $certifications]);
  }

  public function experience_ajax(Experience $experience,Request $request){
//    dd(config('constants.portfolio.table_karyawan'));
    if($request->role == "executive"){
      $this->table_karyawan = "tb_executive";
      $column_id = "ID_KARYAWAN";
    }else if ($request->role == "sales"){
      $this->table_karyawan = "tb_sales";
      $column_id = "KD";
    }else{
      $column_id = $this->column_id;
    }

    if($request->deskripsi != ""){
      $request->merge(['deskripsi' => htmlspecialchars($request->deskripsi)]);
    }

    if($request->cmd == "add"){
      $experience->create($request->except(["_token"]));
    }else if($request->cmd == "update"){
      $experience->find($request->id)->update($request->except(["_token"]));
    }else if($request->cmd == "delete"){
      $experience->find($request->id)->delete();
    }
    $experience2 = $experience::select("tb_portfolio_experience.*",$this->table_karyawan.".NAMA as nama_karyawan")->join($this->table_karyawan,"tb_portfolio_experience.id_karyawan","=",$this->table_karyawan.".".$column_id)->where("tb_portfolio_experience.id_karyawan","=",$request->id_karyawan)->get();

    return view("admin.portfolio.experience-table",["experience" => $experience2]);
  }

  public function other_exp_ajax(OtherExperience $other_experience,Request $request){
    if($request->role == "executive"){
      $this->table_karyawan = "tb_executive";
      $column_id = "ID_KARYAWAN";
    }else if ($request->role == "sales"){
      $this->table_karyawan = "tb_sales";
      $column_id = "KD";
    }else{
      $column_id = $this->column_id;
    }

    if($request->cmd == "add"){
      $other_experience->create($request->except(["_token"]));
    }else if($request->cmd == "update"){
      $other_experience->find($request->id)->update($request->except(["_token"]));
    }else if($request->cmd == "delete"){
      $other_experience->find($request->id)->delete();
    }
    $other_experience2 = $other_experience::select("tb_portfolio_other_experience.*",$this->table_karyawan.".NAMA as nama_karyawan")->join($this->table_karyawan,"tb_portfolio_other_experience.id_karyawan","=",$this->table_karyawan.".".$column_id)->where("tb_portfolio_other_experience.id_karyawan","=",$request->id_karyawan)->get();
    return view("admin.portfolio.otherexperience-table",["otherexperience" => $other_experience2]);
  }
  public function destroy($id){
    $portfolio = new Portfolio;
    $portfolio::find($id)->delete();
    return redirect()->back()->withStatus(__("Portfolio successfully deleted."));
  }

  public function upload_foto($id,Request $request){
    $path = "BP/data-perusahaan/portfolio/".$id;
    $myfile = $request->file('foto_portfolio');
    $ext = $myfile->getClientOriginalExtension();
    $upload_foto = $myfile->storeAs($path, $id.'.'.$ext);
    $upload_foto = Storage::disk('public')->putFileAs($path, $myfile, $id.'.'.$ext);
    $update_portfolio = Portfolio::where('id_karyawan',$id)->update(['image' => $upload_foto]);
    if($request->role != ""){
      return redirect('admin/portfolio/'.Portfolio::where('id_karyawan',$id)->first()->id.'/edit?role='.$request->role);
    }else{
      return redirect('admin/portfolio/'.Portfolio::where('id_karyawan',$id)->first()->id.'/edit');        
    }

  }

  public function portfolio_ajax(Request $request){

    if($request->cmd == "add"){
     $insert_details = PortfolioDetail::create($request->all());
     $detail_id = $insert_details->id;
     $id = $request->id_karyawan;
     $path = "BP/data-perusahaan/portfolio/".$id.'/'.$detail_id;
     $input_gallery = array();
     if(count($request->file_paths)){
      foreach($request->file_paths as $key => $gambar){
        $ext = $gambar->getClientOriginalExtension();
        $upload_foto = Storage::disk('public')->putFileAs($path, $gambar, $key.'-'.time().'.'.$ext);
        array_push($input_gallery,['detail_id' => $detail_id,'image' => $upload_foto,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
      }
    }
    $insert_gallery = PortfolioGallery::insert($input_gallery);
  }else if($request->cmd == "update"){

    $update_detail = PortfolioDetail::find($request->id)->update($request->all());
     $id = $request->id_karyawan;
     $path = "BP/data-perusahaan/portfolio/".$id.'/'.$request->id;
     $input_gallery = array();
    
    // Storage::disk('public')->delete(PortfolioGallery::where('detail_id',$request->id)->pluck('image')->toArray());
     $old_path = PortfolioGallery::where('detail_id',$request->id)->pluck('image')->toArray();
     $old_gallery = PortfolioGallery::where('detail_id',$request->id)->pluck('id')->toArray();
     if(count($request->file_paths)){

      foreach($request->file_paths as $key => $gambar){
        if(is_string($gambar)){
          $content = file_get_contents($gambar);
          $ext = pathinfo($gambar)['extension'];
          Storage::disk('public')->put($path.'/'.$key.'-'.time().'.'.$ext,$content);
          $gambar = $path.'/'.$key.'-'.time().'.'.$ext;
          array_push($input_gallery,['detail_id' => $request->id,'image' => $gambar,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        }else{                   
        $ext = $gambar->getClientOriginalExtension();
        $upload_foto = Storage::disk('public')->putFileAs($path, $gambar, $key.'-'.time().'.'.$ext);
        array_push($input_gallery,['detail_id' => $request->id,'image' => $upload_foto,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        }
      }
    }

  Storage::disk('public')->delete($old_path);
    $delete_old_gallery = PortfolioGallery::whereIn('id',$old_gallery)->delete();
    $insert_gallery = PortfolioGallery::insert($input_gallery);
  }else if($request->cmd == "delete"){
    Storage::disk('public')->deleteDirectory("BP/data-perusahaan/portfolio/".$request->id_karyawan.'/'.$request->id);
    $delete_gallery  = PortfolioGallery::where('detail_id',$request->id)->delete();
    $delete_detail = PortfolioDetail::find($request->id)->delete();
  }
  $portfolio = PortfolioDetail::with('galleries')->where('id_karyawan',$request->id_karyawan)->get();
  $galleries = "";
  if($request->cmd == "gallery"){
    $galleries = PortfolioGallery::where('detail_id',$request->id)->get()->toJson();
  
  }
  return view('admin.portfolio.details',['portfolios' => $portfolio,'galleries' =>$galleries]);
}



}
