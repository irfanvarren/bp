<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\CompanyRule;
use App\CompanyRuleCategory;

class RuleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if($this->admin == "berdayakan"){
          $rules = CompanyRule::selectRaw('company_rule_categories.name as category_name, company_rules.*')->join('company_rule_categories','company_rule_categories.id','company_rules.category_id')->where('company_rules.company_id','B')->get();        
        return view('admin.berdayakan.company-data.rule.index',['rules' => $rules]);
        }else{
         $rules = CompanyRule::selectRaw('company_rule_categories.name as category_name, company_rules.*')->join('company_rule_categories','company_rule_categories.id','company_rules.category_id')->where('company_rules.company_id','BPE')->get();        
        return view('admin.company-data.rule.index',['rules' => $rules]);
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
   $categories = CompanyRuleCategory::where('company_id','B')->get();
        return view('admin.berdayakan.company-data.rule.create',['categories' => $categories]);
        }else{
   $categories = CompanyRuleCategory::get();
        return view('admin.company-data.rule.create',['categories' => $categories]);
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
   $create = CompanyRule::create($request->all());
        return redirect()->route('admin-berdayakan-rule.index')->withStatus('Rule has been created successfully');
        }else{
            $create = CompanyRule::create($request->all());
        return redirect()->route('admin-rule.index')->withStatus('Rule has been created successfully');   
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
        $rule = CompanyRule::find($id);
        $categories = CompanyRuleCategory::where('company_id','B')->get();
        return view('admin.berdayakan.company-data.rule.edit',['rule' => $rule,'categories' => $categories]);
        }else{
                 $rule = CompanyRule::find($id);
        $categories = CompanyRuleCategory::get();
        return view('admin.company-data.rule.edit',['rule' => $rule,'categories' => $categories]);
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
 $rule = CompanyRule::find($id)->update($request->all());
               return redirect()->route('admin-berdayakan-rule.index')->withStatus('Rule has been updated successfully');
        }else{
             $rule = CompanyRule::find($id)->update($request->all());
               return redirect()->route('admin-rule.index')->withStatus('Rule has been updated successfully');
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
 $rule = CompanyRule::find($id)->delete();
        return redirect()->route('admin-berdayakan-rule.index')->withStatus('Rule has been deleted successfully');
        }else{
            $rule = CompanyRule::find($id)->delete();
        return redirect()->route('admin-rule.index')->withStatus('Rule has been deleted successfully'); 
        }
       
    }
}
