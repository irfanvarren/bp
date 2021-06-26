<?php

namespace App\Http\Controllers\Admin\Cms;


use App\PageType;
use App\PageSubType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageSubTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($division)
    {
        $types = PageType::where('division_id',$division)->get();
        return view('admin.page-subtypes.create',['division' => $division,'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$division)
    {
        $request->merge(['division_id' => $division]);
       $insert_sub_type = PageSubType::create($request->all());
       return redirect()->route('pages.show',$division)->withStatus('Sub type successfully created');
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
     public function edit($id,$division)
    {
        $subtype = PageSubType::find($id);
        $types = PageType::get();
        return view('admin.page-subtypes.edit',['division' => $division,'types' => $types,'subtype' => $subtype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $division,$id)
    {
        $update = PageSubType::find($id)->update($request->all());
        return redirect()->route('pages.show',$division)->withStatus('Page sub type successfully created');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$division)
    {
            $subtype = PageSubType::find($id)->delete();
    return redirect()->route('pages.show',$division)->withStatus('Page sub type Successfully Deleted');
    }
}
