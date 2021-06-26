<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\CompanyRuleCategory;

class RuleCategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->admin == "berdayakan"){
            $categories = CompanyRuleCategory::where('company_id','B')->get();
         return view('admin.berdayakan.company-data.rule-category.index',['categories' => $categories]);
        }else{
        $categories = CompanyRuleCategory::where('company_id','BPE')->get();
         return view('admin.company-data.rule-category.index',['categories' => $categories]);
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
             return view('admin.berdayakan.company-data.rule-category.create');
         }else{
 return view('admin.company-data.rule-category.create');
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
          if($this->admin == "berdayakan"){
              $request->merge(['company_id' => 'B']);
               $insert = CompanyRuleCategory::create($request->all());
        return redirect()->route('admin-berdayakan-rule-category.index')->withStatus('Category has been successfully created');
         }else{
             $insert = CompanyRuleCategory::create($request->all());
        return redirect()->route('admin-rule-category.index')->withStatus('Category has been successfully created');
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
        $category = CompanyRuleCategory::find($id);
  if($this->admin == "berdayakan"){
           return view('admin.berdayakan.company-data.rule-category.edit',['category' => $category]);
         }else{
              return view('admin.company-data.rule-category.edit',['category' => $category]);
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
        $update = CompanyRuleCategory::find($id)->update($request->all());
          if($this->admin == "berdayakan"){
             return redirect()->route('admin-berdayakan-rule-category.index')->withStatus('Category has been successfully updated');
         }else{
             return redirect()->route('admin-rule-category.index')->withStatus('Category has been successfully updated');
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
         $destroy = CompanyRuleCategory::find($id)->delete();
           if($this->admin == "berdayakan"){
             return redirect()->route('admin-berdayakan-rule-category.index')->withStatus('Category has been successfully deleted');
         }else{
             return redirect()->route('admin-rule-category.index')->withStatus('Category has been successfully deleted');
         }
       
    }
}
