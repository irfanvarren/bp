<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\JobVacancy;
use App\Models\Admin\JobCategory;
use Illuminate\Support\Facades\Storage;


class JobVacancyController extends Controller
{
    public function index(){
        $job_vacancies = JobVacancy::selectRaw('job_vacancies.*,job_categories.name as category_name')->join('job_categories','job_categories.id','job_vacancies.category_id')->paginate(10);
        return view('admin.job-vacancy.index',compact('job_vacancies'));
    }

    public function create(){
        $categories = JobCategory::get();
        return view('admin.job-vacancy.create',compact('categories'));
    }

    public function edit($id){
        $job_vacancy = JobVacancy::find($id);
        $categories = JobCategory::get();
        return view('admin.job-vacancy.edit',compact('job_vacancy','categories'));
    }

    public function store(Request $request){
        $category = JobCategory::find($request->category_id);
        $path = "img/career/".str_slug($category->name);

        if($request->hasFile('file_image')){
            $image = $request->file_image;
            $path_image = Storage::disk('public')->putFileAs($path,$image,str_slug($request->name).'.'.$image->getClientOriginalExtension());
            $request->merge(['image' => $path_image]);
        }
        $store = JobVacancy::create($request->all());
        return redirect()->route('admin.job-vacancy.index');
    }

    public function update($id,Request $request){
        $category = JobCategory::find($request->category_id);
        $path = "img/career/".str_slug($category->name);

        if($request->hasFile('file_image')){

            $image = $request->file_image;
            if(Storage::disk('public')->exists($path.'/'.str_slug($request->name).'.'.$image->getClientOriginalExtension())){

                $delete = Storage::disk('public')->delete($path.'/'.str_slug($request->name).'.'.$image->getClientOriginalExtension());

            }
            $path_image = Storage::disk('public')->putFileAs($path,$image,str_slug($request->name).'.'.$image->getClientOriginalExtension());
            $request->merge(['image' => $path_image]);
        }
        $update = JobVacancy::find($id)->update($request->all());
        return redirect()->route('admin.job-vacancy.index');
    }

    public function destroy($id){
        $delete = JobVacancy::find($id)->delete();
        return redirect()->route('admin.job-vacancy.index');
    }




}
