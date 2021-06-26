<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\SKType;

class SKTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->admin == "berdayakan"){
 $types = SKType::where('ref_perusahaan','B')->get();
        return view('admin.berdayakan.company-data.sk-type.index',['types' => $types]);
        }else{
             $types = SKType::where('ref_perusahaan','BPE')->get();
        return view('admin.company-data.sk-type.index',['types' => $types]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if($this->admin == "berdayakan"){
              return view('admin.berdayakan.company-data.sk-type.create');
         }else{
              return view('admin.company-data.sk-type.create');
         }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tb_jenis_sk'
        ]);
        if($this->admin == "berdayakan"){
$request->merge(['ref_perusahaan' => 'B']);
$add_data = SKType::create($request->all());
        return redirect()->route('admin-berdayakan-sk-type.index')->withStatus('Jenis SK has been created successfully');
        }else{
        $add_data = SKType::create($request->all());
        return redirect()->route('admin-sk-type.index')->withStatus('Jenis SK has been created successfully');
        }
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
          if($this->admin == "berdayakan"){
              $type = SKType::find($id);
        return view('admin.berdayakan.company-data.sk-type.edit',['type' => $type]);
          }else{
              $type = SKType::find($id);
        return view('admin.company-data.sk-type.edit',['type' => $type]);
          }
      
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
        if($this->admin == "berdayakan"){
$type = SKType::find($id)->update($request->all());
        return redirect()->route('admin-berdayakan-sk-type.index')->withStatus('Jenis SK has been updated successfully');
        
        }else{
        $type = SKType::find($id)->update($request->all());
        return redirect()->route('admin-sk-type.index')->withStatus('Jenis SK has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if($this->admin == "berdayakan"){
            $delete = SKType::find($id)->delete();
        return redirect()->route('admin-berdayakan-sk-type.index')->withStatus('Jenis SK has been deleted successfully');
          }else{
        $delete = SKType::find($id)->delete();
        return redirect()->route('admin-sk-type.index')->withStatus('Jenis SK has been deleted successfully');    
          }
        
    }
}
