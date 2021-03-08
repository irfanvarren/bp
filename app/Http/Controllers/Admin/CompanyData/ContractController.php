<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contract;
use App\Karyawan;

class ContractController extends Controller
{
  public function index()
  {
    $contract = Contract::orderByRaw('SUBSTRING_INDEX(no,"/",-1) DESC')->get();
    return view('admin.company-data.contract.index',['contract' => $contract]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Karyawan::get();
        return view('admin.company-data.contract.create',['employees' => $employees]);
    }


    public function store(Request $request)
    {
        if($request->status == "on"){
            $request->merge(['status' => 1]);
        }else{
            $request->merge(['status' => 0]);
        }
        $contract = Contract::orderByRaw('SUBSTRING_INDEX(no,"/",-1) DESC')->orderByRaw('SUBSTRING_INDEX(SUBSTRING_INDEX(no,".",-1),"/",1) DESC')->first();
        if($contract != ""){
            $no = $contract->no;
            $tahun_no = explode("/",$no)[2];
            if(date("Y") > $tahun_no){
                $no = "001";
            }else{

             $no = str_pad((string)intval(explode('-',$no)[0]) + 1,3,"0",STR_PAD_LEFT);
     
         }
     }else{
        $no = "001";
    }
    $no =$no.'-KK/BP/'.date('Y');
    $request->merge(['no' => $no]);

    if ($request->hasfile('upload_file')){
        $file = $request->file('upload_file');
        $path = 'BP/data-perusahaan/kontrak';
        $ext_file = $file->getClientOriginalExtension();
        $path_file = $file->storeAs($path, str_replace(array(' ', '<', '>', '&', '{', '}', '*','\\','/'),'-', $no).'.'.$ext_file,'local');
        $request->merge(['file' => $path_file]);
    }


    $create = Contract::create($request->all());
    return redirect()->route('admin-contract.index')->withStatus('Contract has been successfully created');
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
        $contract = Contract::find($id);
           $karyawan = Karyawan::get();
        return view('admin.company-data.contract.edit',['contract' => $contract,'karyawan' => $karyawan]);
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
        $contract =  Contract::find($id);
        if($request->status == "on"){
            $request->merge(['status' => 1]);
        }else{
            $request->merge(['status' => 0]);
        }
        if($request->no != ""){
            $no = $request->no;
        }else{
            $no = $contract->no;
        }
        if ($request->hasfile('upload_file')){
            $file = $request->file('upload_file');
            $path = 'BP/data-perusahaan/Contract';
            $ext_file = $file->getClientOriginalExtension();
            $path_file = $file->storeAs($path, str_replace(array(' ', '<', '>', '&', '{', '}', '*','\\','/'),'-', $no).'.'.$ext_file,'local');
            $request->merge(['file' => $path_file]);
        }


        $update =$contract->update($request->all());
        return redirect()->route('admin-contract.index')->withStatus('Contract has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Contract::find($id)->delete();
        return redirect()->route('admin-contract.index')->withStatus('Contract has been successfully deleted');
    }
}
