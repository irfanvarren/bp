<?php

namespace App\Http\Controllers\Admin\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageType;

class PageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($division)
    {
        return view('admin.page-types.create',['division' => $division]);
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
        $store_type = PageType::create($request->all());
        return redirect()->route('pages.show',$division)->withStatus('Page type successfully created');
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
        $type = PageType::find($id);

        return view('admin.page-types.edit',['division' => $division,'type' => $type]);
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
        $update = PageType::find($id)->update($request->all());
        return redirect()->route('pages.show',$division)->withStatus('Page type successfully created');
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
            $page = PageType::find($id)->delete();
    return redirect()->route('pages.show',$division)->withStatus('Page type Successfully Deleted');
    }
}
