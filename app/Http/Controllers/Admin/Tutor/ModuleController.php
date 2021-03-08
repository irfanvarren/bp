<?php

namespace App\Http\Controllers\Admin\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlineTest\OtModule;
use App\Models\OnlineTest\OtTest;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = OtModule::selectRaw('ot_modules.*,ot_tests.name as test_name')->join('ot_tests','ot_tests.id','=','ot_modules.test_id')->paginate(10);
        return view('admin.tutor.modules.index',['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = OtTest::get();
        return view('admin.tutor.modules.create',['test' => $test]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = OtModule::create($request->all());
        return redirect()->route('ot-module.index')->withStatus('Module successfully created');
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
    $modules = OtModule::find($id);

        $test = OtTest::get();
    return view('admin.tutor.modules.edit',['modules' => $modules,'test' => $test]);
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
        $modules = OtModule::find($id)->update($request->all());
        return redirect()->route('ot-module.index')->withStatus('Module successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modules = OtModule::find($id)->delete();
        return redirect()->route('ot-module.index')->withStatus('Module successfully deleted'); 
    
    }
}
