<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reseller;
use App\Models\ResellerQuota;
use App\Form\RegisPaket;
use App\Form\RegisPaketDtl;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resellers = Reseller::with('products')->with('registration_data')->get();
        return view('admin.reseller.index',compact('resellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $reseller = Reseller::find($id);
        return view('admin.reseller.edit',compact('reseller'));
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
        if($request->status == "on"){
            $request->merge(['status' => 1]);
        }else{
            $request->merge(['status' => 0]);
        }
        $update = Reseller::find($id)->update($request->all());
        return redirect()->route('admin-reseller.index')->withStatus('Reseller data has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Reseller::find($id)->delete();
        return redirect()->route('admin-reseller.index')->withStatus('Reseller data has been successfully deleted');
    }


    public function change_status(Request $request){
        if($request->status === "true"){
            $reseller = Reseller::find($request->id);
            $reseller->status = 1;
            $reseller->save();
            return "true";
        }else{
            $reseller = Reseller::find($request->id);
            $reseller->status = 0;
            $reseller->save();
            return "false";
        }
    }
}
