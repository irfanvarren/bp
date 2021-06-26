<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\JobCategory;


class JobCategoryController extends Controller
{
    public function index(){
        $categories = JobCategory::paginate(10);
        return view('admin.job-category.index',compact('categories'));
    }

    public function create(){
        return view('admin.job-category.create');
    }

    public function store(Request $request){
        $store = JobCategory::create($request->all());
        return redirect()->route('admin.job-category.index');
    }

    public function edit($id){
        $category = JobCategory::find($id);
        return view('admin.job-category.edit',compact('category'));
    }

    public function update($id,Request $request){
            $update = JobCategory::find($id)->update($request->all());
            return redirect()->route('admin.job-category.index');
    }

    public function destroy($id){
        $delete = JobCategory::find($id)->delete();
        return redirect()->route('admin.job-category.index');
    }

}
