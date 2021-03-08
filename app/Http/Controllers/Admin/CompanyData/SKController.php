<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Http\Controllers\Controller;
use App\SK;
use App\SKType;
use App\Karyawan;

class SKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sk = SK::select('no','judul','tgl_mulai','tgl_berakhir','isi','file','status')->groupBy('no','judul','tgl_mulai','tgl_berakhir','isi','file','status')->orderByRaw('SUBSTRING_INDEX(no,"/",-1) DESC')->get();
        foreach($sk as $data){
            $data->employees = SK::select('id_karyawan')->where('no',$data->no)->pluck('id_karyawan')->toArray();
        }
        return view('admin.company-data.sk.index',['sk' => $sk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sk_types = SKType::get();
        $karyawan = Karyawan::select('ID_KARYAWAN','NAMA')->get();
        return view('admin.company-data.sk.create',['sk_types' => $sk_types,'karyawan' => $karyawan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRomawi($bln){
        switch ($bln){
            case 1: 
            return "I";
            break;
            case 2:
            return "II";
            break;
            case 3:
            return "III";
            break;
            case 4:
            return "IV";
            break;
            case 5:
            return "V";
            break;
            case 6:
            return "VI";
            break;
            case 7:
            return "VII";
            break;
            case 8:
            return "VIII";
            break;
            case 9:
            return "IX";
            break;
            case 10:
            return "X";
            break;
            case 11:
            return "XI";
            break;
            case 12:
            return "XII";
            break;
        }
    }

    public function store(Request $request)
    {
        if($request->status == "on"){
            $request->merge(['status' => 1]);
        }else{
            $request->merge(['status' => 0]);
        }
        // SUBSTRING_INDEX(SUBSTRING_INDEX(NO,'.',-1),'/',1)
        $sk = SK::orderByRaw('SUBSTRING_INDEX(no,"/",-1) DESC')->orderByRaw('SUBSTRING_INDEX(SUBSTRING_INDEX(no,".",-1),"/",1) DESC')->where('kode_jenis',$request->kode_jenis)->first();

        if($sk != ""){
         $no = $sk->no;
         $tahun_no = explode("/",$no)[3];
         if(date("Y") > $tahun_no){
            $no = "001";
        }else{
           $no = str_pad((string)intval(explode('/',explode('.',$no)[1])[0]) + 1,3,"0",STR_PAD_LEFT);
       }
   }else{
    $no = "001";
}
$no = $request->kode_jenis.'.'.$no.'/BP/'.$this->getRomawi(date('m')).'/'.date('Y');
$request->merge(['no' => $no]);

if ($request->hasfile('upload_file')){
    $upload_file = array();
    foreach($request->file('upload_file') as $key => $file){
        $path = 'BP/data-perusahaan/SK';
        $ext_file = $file->getClientOriginalExtension();
        $path_file = $file->storeAs($path, str_replace(array(' ', '<', '>', '&', '{', '}', '*','\\','/'),'-', $no).'-'.$key.'.'.$ext_file,'local');
        array_push($upload_file,$path_file);
    }
    $request->merge(['file' => implode("|",$upload_file)]);
}

$employees = explode("|",$request->id_karyawan);
$data_input = array();
foreach($employees as $employee){
    $data_temp = $request->except('_method','_token','all-attendees','upload_file');
    $data_temp['id_karyawan'] = $employee;
    $data_temp['updated_at'] = \Carbon\Carbon::now();
    $data_temp['created_at'] = \Carbon\Carbon::now();
    array_push($data_input,$data_temp);
}
$create = SK::insert($data_input);
return redirect()->route('admin-sk.index')->withStatus('SK has been successfully created');
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
        $id = urldecode($id);
        $sk = SK::where('no',$id)->get();
        $sk_types = SKType::get();
        $karyawan = Karyawan::select('ID_KARYAWAN','NAMA')->get();
        $selected_employees = SK::select('ID_KARYAWAN')->where('no',$id)->pluck('ID_KARYAWAN');
        return view('admin.company-data.sk.edit',['sk' => $sk,'sk_types' => $sk_types,'karyawan' => $karyawan,'selected_employees' => $selected_employees]);
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

        $id = urldecode($id);
        $sk =  SK::where('no',$id)->first();
        
        if($request->status == "on"){
            $request->merge(['status' => 1]);
        }else{
            $request->merge(['status' => 0]);
        }
        if($request->no != ""){
            $no = $request->no;
        }else{
            $no = $sk->no;
        }
        if ($request->hasfile('upload_file')){
         $upload_file = array();
         foreach($request->file('upload_file') as $key => $file){
            $path = 'BP/data-perusahaan/SK';
            $ext_file = $file->getClientOriginalExtension();
            $path_file = $file->storeAs($path, str_replace(array(' ', '<', '>', '&', '{', '}', '*','\\','/'),'-', $no).'-'.$key.'.'.$ext_file,'local');
            array_push($upload_file,$path_file);
        }
        $request->merge(['file' => implode("|",$upload_file)]);
    }
    $employees = explode("|",$request->id_karyawan);
    $data_input = array();
    foreach($employees as $employee){
        $data_temp = $request->except('_method','_token','all-attendees','upload_file');
        $data_temp['id_karyawan'] = $employee;
        $data_temp['updated_at'] = \Carbon\Carbon::now();
        $data_temp['created_at'] = \Carbon\Carbon::now();
        array_push($data_input,$data_temp);
    }
    $delete_previous =  SK::where('no',$id)->delete();
    $update =SK::insert($data_input);
    return redirect()->route('admin-sk.index')->withStatus('SK has been successfully updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SK::where('no',urldecode($id))->delete();
        return redirect()->route('admin-sk.index')->withStatus('SK has been successfully deleted');
    }

    function change_status(Request $request){
        if($request->status == "false"){
            $status = 0;
        }else{
            $status = 1;
        }
        $change_status = SK::where('no',$request->id)->update(['status' => $status]);
        return (string)$change_status;
    }
}
