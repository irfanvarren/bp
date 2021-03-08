<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyRuleCategory;

class RuleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CompanyRuleCategory::get();
         return view('admin.company-data.rule-category.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.company-data.rule-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = CompanyRuleCategory::create($request->all());
        return redirect()->route('admin-rule-category.index')->withStatus('Category has been successfully created');
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
        $category = CompanyRuleCategory::find($id);

        return view('admin.company-data.rule-category.edit',['category' => $category]);
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
        $update = CompanyRuleCategory::find($id)->update($request->all());
        return redirect()->route('admin-rule-category.index')->withStatus('Category has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $destroy = CompanyRuleCategory::find($id)->delete();
        return redirect()->route('admin-rule-category.index')->withStatus('Category has been successfully deleted');
    }
}
