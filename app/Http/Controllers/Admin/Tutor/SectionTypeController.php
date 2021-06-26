<?php

namespace App\Http\Controllers\Admin\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlineTest\OtSectionType;

class sectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectionTypes = OtSectionType::selectRaw('ot_section_types.*,ot_tests.name as test_name,ot_modules.name as module_name,ot_packages.name as package_name')->leftJoin('ot_tests','ot_tests.id','=','ot_section_types.test_id')->leftJoin('ot_modules','ot_section_types.module_id','=','ot_modules.id')->leftJoin('ot_packages','ot_section_types.package_id','=','ot_packages.id')->paginate(6);
        dd($sectionTypes);
          return view('admin.tutor.section-types.index',['sectionTypes' => $sectionTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.tutor.section-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = OtSectionType::create($request->all());
        return redirect()->route('ot-section-type.index')->withStatus('Section type successfully created !');
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
        $sectionType = OtSectionType::find($id);
          return view('admin.tutor.section-types.edit',['sectionType' => $sectionType]);
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
        $sectionType = OtSectionType::find($id)->update($request->all());
       return redirect()->route('ot-section-type.index')->withStatus('Section type successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = OtSectionType::find($id)->delete();
        return redirect()->route('ot-section-type.index')->withStatus('Section type successfully deleted !');   
    }
}
