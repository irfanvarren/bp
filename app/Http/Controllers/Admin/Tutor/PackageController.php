<?php

namespace App\Http\Controllers\Admin\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlineTest\OtPackage;
use App\Models\OnlineTest\OtTest;
use App\Models\OnlineTest\OtModule;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = OtPackage::selectRaw('ot_packages.*,ot_tests.name as test_name')->join('ot_tests','ot_tests.id','=','ot_packages.test_id')->paginate(10);
        return view('admin.tutor.packages.index',['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $test = OtTest::get();
        return view('admin.tutor.packages.create',['test' => $test]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = OtPackage::create($request->all());
        return redirect()->route('ot-package.index')->withStatus('Package successfully created');
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
    $packages = OtPackage::find($id);
    return view('admin.tutor.packages.edit',['packages' => $packages]);
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
        $packages = OtPackage::find($id)->update($request->all());
        return redirect()->route('ot-package.index')->withStatus('Package successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packages = OtPackage::find($id)->delete();
        return redirect()->route('ot-package.index')->withStatus('Package successfully deleted'); 
    
    }

    public function select_module(Request $request){
        $modules = OtModule::where('test_id',$request->test_id)->get();
        return view('admin.tutor.packages.select-module',['modules' => $modules]);
    }


}
