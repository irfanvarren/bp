<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SchoolProgram;
use App\School;
use App\SchoolCourse;
use App\SchoolQualification;
use App\SchoolEducationSector;
use App\SchoolHasCourse;
use App\Country;
use App\Region;
use App\SchoolCoursePeriod;
use App\SchoolCourseUnit;
use App\SchoolProgramRequirement;
use Carbon\Carbon;
use DataTables;

class SchoolProgramController extends Controller
{
  protected $dashboard = 'sekolah';
  function index($schoolId = null){
    $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','schools.country_id','countries.id')->join('regions','schools.region_id','regions.id')->join('cities','schools.city_id','cities.id')->orderBy('schools.name','ASC')->get();
    return view('sekolah.admin.school-programs.index',['schools' => $schools,'schoolId' => $schoolId]);
  }
  function program_data(Request $request){

    $schoolPrograms =SchoolProgram::selectRaw('school_programs.id,school_programs.name,school_programs.material_fee,school_programs.fee as course_fee, schools.name as school_name,schools.id as school_id,schools.enrollment_fee as enrollment_fee, (schools.enrollment_fee + school_programs.material_fee + school_programs.fee) as total,schools.address as school_address,cities.name as city_name')->join('cities','cities.id','=','school_programs.city_id')->join('schools','school_programs.school_id' ,'=','schools.id')->join('school_courses','school_programs.course_id','=','school_courses.id');
    if($request->search_school_id != ""){
      $schoolPrograms->where('school_programs.school_id',$request->search_school_id);
    }else{
      if($request->school_id != ""){
        $schoolPrograms->where('school_programs.school_id',$request->school_id);
      }
    }
    if($request->searchSchoolName != ""){
      $schoolPrograms->where('schools.name','like','%'.$request->searchSchoolName.'%');
    }

    $schoolPrograms = $schoolPrograms->orderBy('school_name')->get();
    $data =  DataTables::of($schoolPrograms)->make(true);
//  $schoolPrograms = SchoolProgram::select('school_programs.id','school_programs.name','school_programs.material_fee','school_programs.fee as course_fee','schools.id as school_id')->selectRaw('schools.enrollment_fee as enrollment_fee,schools.name as school_name')->join('schools','school_programs.school_id','=','schools.id')->join('school_courses','school_programs.course_id','=','school_courses.id')->join('school_qualifications','school_programs.qualification_id','=','school_qualifications.id')->get();
    return $data;
  }

 /* function program_data(Request $request){
    $search = $request->search;
    if(isset($search) || $search != "" || $search != null){
    $schoolPrograms = SchoolProgram::select('school_programs.id','school_programs.name','school_programs.material_fee','school_programs.fee as course_fee','schools.id as school_id')->selectRaw('schools.enrollment_fee as enrollment_fee,schools.name as school_name')->join('schools','school_programs.school_id','=','schools.id')->join('school_courses','school_programs.course_id','=','school_courses.id')->join('school_qualifications','school_programs.qualification_id','=','school_qualifications.id')->where('school_programs.name','like','%'.$search.'%')->get();
    }else{
      $schoolPrograms = SchoolProgram::select('school_programs.id','school_programs.name','school_programs.material_fee','school_programs.fee as course_fee','schools.id as school_id')->selectRaw('schools.enrollment_fee as enrollment_fee,schools.name as school_name')->join('schools','school_programs.school_id','=','schools.id')->join('school_courses','school_programs.course_id','=','school_courses.id')->join('school_qualifications','school_programs.qualification_id','=','school_qualifications.id')->get();
    }
    return $schoolPrograms->toJson();
  }*/
  function create(){
   $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name,schools.address as address')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name','ASC')->get();
   //$schools = 
   $courses = SchoolCourse::orderBy('name','ASC')->get();
   $qualifications = SchoolQualification::get();
   $sectors = SchoolEducationSector::orderBy('name','ASC')->get();
   return view('sekolah.admin.school-programs.create',['schools' => $schools,'courses' => $courses,'qualifications' => $qualifications,'sectors' => $sectors]);
 }
 function store(Request $request){

  if($request->details != "")
  {
   $dom = new \domdocument();

    $dom->loadHtml($request->details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
      LIBXML_NOWARNING  );
    $images = $dom->getelementsbytagname('img');
    $id = School::orderBy('id','DESC')->limit(1)->value('id');
    $id = $id+1;
    $path = "img/schools/".$id;
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

             $path = $path.'/'.$image_name;
             $request->session()->put('imageURL', $path);
             Storage::disk('public')->put(  $request->session()->get('imageURL'), $data);

             $img->removeattribute('src');
             $img->setattribute('src',Storage::disk('public')->url($request->session()->get('imageURL')));
           }
         }
         $details = $dom->savehtml();
         $request->merge(['details' => $details]);
       }
       $school_id = $request->schools;
       $course_id = $request->courses;

       $countSchoolCourse = SchoolHasCourse::where('school_id',$school_id)->where('course_id',$course_id)->count();
       if($countSchoolCourse == 0){
        $request2 = collect(['school_id' => $school_id,'course_id' => $course_id]);
        SchoolHasCourse::create($request2->all());        
      }

      $qualification_id = $request->qualifications;
      $sector_id = $request->sectors;
      $data_school = School::select('country_id','region_id','city_id','enrollment_fee')->find($school_id);
      $country_id = $data_school->country_id;
      $region_id = $data_school->region_id;
      $city_id = $data_school->city_id;
      $enrollment_fee = $data_school->enrollment_fee;
      $request->merge(['enrollment_fee' => $enrollment_fee]);
      $request->merge(['school_id' => $school_id]);
      $request->merge(['country_id' => $country_id]);
      $request->merge(['region_id' => $region_id]);
      $request->merge(['city_id' => $city_id]);
      $request->merge(['qualification_id' => $qualification_id]);
      $request->merge(['course_id' => $course_id]);
      $request->merge(['sector_id' => $sector_id]);

      $school_information = urlencode($request->school_information);
      $request->merge(['school_information' => $school_information]);
      $schoolPrograms = SchoolProgram::create($request->all());
      return redirect()->route('school-program.index')->withStatus(__('Program successfully created.'));
    }
    public function edit($id)
    {
      $schools = School::orderBy('name','ASC')->get();
      $courses = SchoolCourse::orderBy('name','ASC')->get();
      $qualifications = SchoolQualification::get();
      $sectors = SchoolEducationSector::orderBy('name','ASC')->get();
      $schoolProgram = SchoolProgram::find($id);
      return view('sekolah.admin.school-programs.edit',['schoolProgram' => $schoolProgram,'schools' => $schools,'courses' => $courses,'qualifications' => $qualifications,'sectors' => $sectors]);
    }
    public function update($id,Request $request){
     if($request->details != ""){
       $dom = new \domdocument();

    $dom->loadHtml($request->details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
      LIBXML_NOWARNING  );
    $images = $dom->getelementsbytagname('img');
    $path = "img/schools/".$id;
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

             $path = $path.'/'.$image_name;
             $request->session()->put('imageURL', $path);
             Storage::disk('public')->put(  $request->session()->get('imageURL'), $data);

             $img->removeattribute('src');
             $img->setattribute('src',Storage::disk('public')->url($request->session()->get('imageURL')));
           }
         }

         $details = $dom->savehtml();
         $request->merge(['details' => $details]);
       }
       $school_id = $request->schools;
       $course_id = $request->courses;
       $qualification_id = $request->qualifications;
       $sector_id = $request->sectors;
       $data_school = School::select('country_id','region_id','city_id','enrollment_fee')->find($school_id);

       $country_id = $data_school->country_id;
       $region_id = $data_school->region_id;
       $city_id = $data_school->city_id;
       $enrollment_fee = $data_school->enrollment_fee;

       $countSchoolCourse = SchoolHasCourse::where('school_id',$school_id)->where('course_id',$course_id)->count();
       if($countSchoolCourse == 0){
        $request2 = collect(['school_id' => $school_id,'course_id' => $course_id]);
        SchoolHasCourse::create($request2->all());        
      }

      $request->merge(['enrollment_fee' => $enrollment_fee]);
      $request->merge(['school_id' => $school_id]);
      $request->merge(['country_id' => $country_id]);
      $request->merge(['region_id' => $region_id]);
      $request->merge(['city_id' => $city_id]);
      $request->merge(['qualification_id' => $qualification_id]);
      $request->merge(['course_id' => $course_id]);  
      $request->merge(['sector_id' => $sector_id]);
      $school_information = urlencode($request->school_information);
      $request->merge(['school_information' => $school_information]);
      $schoolPrograms = SchoolProgram::find($id)->update($request->all());
      return redirect()->route('school-program.index')->withStatus(__('Program successfully updated.'));
    }
    public function destroy($id)
    {
      $schoolProgram = SchoolProgram::find($id)->delete();  //
       //$count = SchoolHasCourse::where('school_id','=',$school_id)->where('course_id','=',$course_id)->count();
      //if($count)
      return redirect()->route('school-program.index')->withStatus(__('Program successfully deleted.'));
    }
    public function course_period(SchoolCoursePeriod $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $coursePeriod = $model::get();
      return view("sekolah.admin.school-programs.course_period",["coursePeriod" => $coursePeriod]);
    }
    public function select_period(SchoolCoursePeriod $model,Request $request){
      $coursePeriod = $model::orderBy('name','ASC')->get();
      return view("sekolah.admin.school-programs.select_period",["coursePeriod" => $coursePeriod]);
    }
    public function course_unit(SchoolCourseUnit $model,Request $request){

      if($request->cmd == "add"){
        $data = [];
        if($request->multiple_course_unit != ""){
          foreach(explode('|',$request->multiple_course_unit) as $key => $course_unit){
            $data_temp = $request->except(['_token','cmd','multiple_course_unit','id']);
            $data_temp['name'] = $course_unit;
            $data_temp['created_at'] = Carbon::now();
            $data_temp['updated_at'] = Carbon::now();
            array_push($data,$data_temp);
          }
          $model->insert($data);
        }else{
          $model->create($request->all());
        }
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $courseUnit = $model::selectRaw('school_course_units.*, school_course_periods.name as period_name,school_course_periods.id as period_id')->join('school_course_periods','school_course_units.period_id','=','school_course_periods.id')->where('program_id',$request->program_id)->get();
      return view("sekolah.admin.school-programs.course_unit",["courseUnit" => $courseUnit]);
    }
    public function program_requirement(SchoolProgramRequirement $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $programRequirement = $model::where('program_id',$request->program_id)->get();
      return view("sekolah.admin.school-programs.program_requirement",["programRequirement" => $programRequirement]);
    }

    public function copy_programs(){

      $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','schools.country_id','countries.id')->join('regions','schools.region_id','regions.id')->join('cities','schools.city_id','cities.id')->orderBy('schools.name','ASC')->get();
      return view("sekolah.admin.school-programs.copy-programs",["schools" => $schools]);
    }

    public function post_copy_programs(Request $request){

      $school_programs = SchoolProgram::where('school_id',$request->from_school);
      if($request->course_units == "on"){
        $school_programs = $school_programs->with('course_units');
      }

      if($request->program_requirements == "on"){
        $school_programs = $school_programs->with('requirements');
      }

      $school_programs = $school_programs->get();
      $to_school = $request->to_school;

      $data_new_school = School::find($request->to_school);
      $new_city_id = $data_new_school->city_id;
      $new_region_id = $data_new_school->region_id;
      $new_country_id = $data_new_school->country_id;


      foreach($school_programs as $school_program){
        $school_program->school_id = $request->to_school;
        $school_program->city_id = $new_city_id;
        $school_program->region_id = $new_region_id;
        $school_program->country_id = $new_country_id;
        $insert = SchoolProgram::create(collect($school_program)->except(['id'])->toArray());
        $new_program_id = $insert->id;

        

        if($school_program->course_units->count() && $request->course_units == "on" ){
          foreach($school_program->course_units as $course_units){
            $course_units->program_id = $new_program_id;
            $course_units->school_id = $request->to_school;
            $insert_course_units = SchoolCourseUnit::create(collect($course_units)->except(['id'])->toArray());
          }
        }  


        if($school_program->requirements->count() && $request->program_requirements == "on" ){
          foreach($school_program->requirements as $program_requirement){
            $program_requirement->program_id = $new_program_id;
            $program_requirement->school_id = $request->to_school;
            $insert_program_requirements = SchoolProgramRequirement::create(collect($program_requirement)->except(['id'])->toArray());
          }
        }         
      }

      return redirect('cari-sekolah/admin/copy-programs')->withStatus(__('Program successfully copied.'));
    }
  }
