<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SchoolHasCourse;
use App\School;
use App\SchoolCourse;

class SchoolHasCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolCourse = SchoolHasCourse::selectRaw('school_has_courses.*, schools.name as school_name,school_courses.name as course_name')->join('schools','school_has_courses.school_id','=','schools.id')->join('school_courses','school_has_courses.course_id','=','school_courses.id')->get();

        return view('sekolah.admin.school-has-courses.index',['schoolCourse' => $schoolCourse]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $arr_id = explode('-',$id);
        $school_id = $arr_id[0];
        $course_id = $arr_id[1];
        $details = SchoolHasCourse::where('school_id','=',$school_id)->where('course_id','=',$course_id)->value('details');
        return view('sekolah.admin.school-has-courses.edit',['school_id' => $school_id,'course_id' => $course_id,'details' => $details]);
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
          $arr_id = explode('-',$id);
        $school_id = $arr_id[0];
        $course_id = $arr_id[1];
        $request->merge(['school_id' => $school_id]);
                $request->merge(['course_id' => $course_id]);
         $path = "img/schools/detail-course/";
         $dom = new \domdocument();
      $dom->loadHtml($request->details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR | LIBXML_NOWARNING);
      $images = $dom->getelementsbytagname('img');
      foreach($images as $k => $img){
        $data = $img->getattribute('src');


          if(preg_match('/data:image/', $data)){ // check data apa bentuknya data:image
               // get the mimetype
               preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups); // pecah-pecah data
               $mimetype = $groups['mime'];

               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);

               $data = base64_decode($data);
               $image_name= time().$k.'.'.$mimetype;

               $pathbody = $path2.'/'.$image_name;

               Storage::disk('public')->put($pathbody, $data);

               $img->removeattribute('src');
               $img->setattribute('src', $image_name);
               $img->removeAttribute('class');
               $img->setattribute('class','course-details-img');
             }
           }
           $details = $dom->savehtml();
                $details = SchoolHasCourse::where('school_id','=',$school_id)->where('course_id','=',$course_id)->update($request->except('_token','_method'));
                return redirect()->route('school-has-course.index')->withStatus('School course details successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
