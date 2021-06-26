<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;
use App\Country;
use App\Region;
use App\City;
use App\SchoolCourse;
use App\SchoolProgram;
use App\SchoolQualification;
use App\SchoolIntake;
use App\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as Pagination;

class WebController extends Controller
{
  public $schoolId;
  public function __construct(){
    $this->ex_rate_usd = "";
    $this->ex_rate_idr = "";
  }

  public function index(){
    $keyword = SchoolCourse::orderBy('name','ASC')->get();
    $keywordSekolah = School::orderBy('name','ASC')->get();
    $qualification = SchoolQualification::get();
    $country = Country::orderBy('name','ASC')->get();
   
    return view('sekolah.index',['country' => $country,'keyword' => $keyword,'keywordSekolah' => $keywordSekolah,'qualification' => $qualification]);
   }
  public function new_index(){
    return view('sekolah.new.index');
  }

  function show(){
    return view('sekolah.search');
  }

  function new_search(Request $request){
  

    $countries = Country::orderBy('name')->get();
    $qualifications = SchoolQualification::orderBy('name','ASC')->get();
    $result = "programs";
    $programs = School::selectRaw('schools.id,schools.name,schools.logo,schools.address,countries.name as country_name,regions.name as region_name,cities.name as city_name,countries.currency_code as curr_code,countries.currency_symbol as curr_symbol')->join('school_programs','school_programs.school_id','=','schools.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->join('countries','schools.country_id','=','countries.id')->groupBy('schools.id','schools.name','schools.logo','schools.address','country_name','region_name','city_name','curr_code','curr_symbol')->orderBy('schools.name')->with(['programs' => function($query) use ($request){
      $query = $query->selectRaw('school_programs.id,school_programs.name,school_programs.fee,school_programs.enrollment_fee,school_programs.course_id,school_courses.name as course_name');

      return $query->join('school_courses','school_courses.id','=','school_programs.course_id')->orderBy('course_id','ASC')->groupBy('school_programs.school_id','name','id','fee','enrollment_fee','course_id','course_name');
    }]);
    $programs = $programs->get();
    $courses = SchoolCourse::get();
    $page = $request->page ?? 1;
    $perPage = 15;
    $offset = ($page - 1 ) * $perPage;
    $programs = new LengthAwarePaginator(array_slice($programs->toArray(), $offset, $perPage), count($programs), $perPage, $page);
    return view('sekolah.new.search',['qualifications' => $qualifications,'country' => $countries,'courses' => $courses,'result' => $result,'searchResult' => $programs,'ex_rate_usd' => $this->ex_rate_usd,'ex_rate_idr' => $this->ex_rate_idr]);
  }

  function new_search_school(Request $request){
    $countries = Country::orderBy('name')->get();
    $qualifications = SchoolQualification::orderBy('name','ASC')->get();
    $result = "schools";
    $courses = SchoolCourse::get();
    $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','countries.id','schools.country_id')->join('regions','regions.id','schools.region_id')->join('cities','cities.id','schools.city_id')->orderBy('schools.name')->paginate(30);
    return view('sekolah.new.search',['qualifications' => $qualifications,'country' => $countries,'result' => $result,'searchResult' => $schools,'courses'=> $courses]);
  }

  function search(Request $request){
    if($request->search_type == "course"){
      $request->session()->put('searchData',$request->all());
      return redirect('cari-sekolah/search/course/'.$request->keyword);
    }elseif($request->search_type == "school"){

      $request->session()->put('searchData',$request->all());
      return redirect('cari-sekolah/search/school/'.$request->keywordSekolah);
    }
  }

  function school_course_ajax(Request $request){
    $course = SchoolCourse::orderBy('name','ASC')->where('name','like','%'.$request->keyword.'%')->get();
  //    return $course->toJson();
    return view('sekolah.course-ajax',['course' => $course]);
  }

  function search_course_ajax(Request $request){

    $course = SchoolProgram::selectRaw('school_programs.*,schools.logo as logo,countries.name as country_name,countries.currency_code as curr_code,regions.name as region_name,cities.name as city_name,schools.name as school_name,school_courses.name as course_name')->join('school_courses','school_courses.id','=','school_programs.course_id')->join('schools','school_programs.school_id','=','schools.id')->join('regions','school_programs.region_id','=','regions.id')->join('cities','school_programs.city_id','=','cities.id')->join('countries','school_programs.country_id','=','countries.id')->where('school_programs.name','like','%'.$request->keyword.'%')->orderBy('school_programs.name');
    $course = $course->get()->toJson();
    return $course;
  }

  function school_school_ajax(Request $request){
    $keyword = $request->keyword;
    $school = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->join('countries','schools.country_id','=','countries.id')->where(function($query) use ($keyword){
      $query->orWhere(DB::raw('replace(schools.name,"-","")'),'like','%'.$keyword.'%')->orWhere('schools.name','like','%'.$keyword.'%')->orWhere(DB::raw('abbreviation'),'like','%'.$keyword.'%');
    })->orderBy('schools.name')->get();
    return view('sekolah.school-ajax',['keywordSekolah' => $school]);
  }

  /*function course_filter(Request $request){
      $request->session()->put('searchData',$request->all());
      return redirect('cari-sekolah/search/course/'.$request->keyword);
    }*/

    function course_filter(Request $request){
      $searchData = $request->all();
      //$searchData = $request->session()->get('searchData');

      if($searchData != ""){

      }else{
        $searchData = array(['id_jurusan' => ""]);
       // $searchData['id_jurusan'] = "";
        //$searchData['qualification_id'] = "";
        //$searchData['country_id'] = "";
        //$searchData['min_fee'] = "";
        //$searchData['max_fee'] = "";

      }
      $result = $request->result;

      if($result == "schools"){
        $schools = School::selectRaw('schools.id, schools.name,schools.logo, countries.name as country_name,regions.name as region_name,cities.name as city_name,school_programs.school_id')->join('countries','countries.id','schools.country_id')->join('regions','regions.id','schools.region_id')->join('cities','cities.id','schools.city_id')->join('school_programs','school_programs.school_id','schools.id')->groupBy('schools.id','schools.name','countries.name','regions.name','cities.name','school_programs.school_id','schools.logo')->orderBy('schools.name','ASC');
        if($request->keyword != ""){
          $schools = $schools->where('schools.name','like','%'.$request->keyword.'%');
        }
        if($request->country_id != ""){
          $schools = $schools->where('schools.country_id',$request->country_id);
        }
        if($request->region_id != ""){
          $schools = $schools->where('schools.region_id',$request->region_id);
        }
        if($request->city_id != ""){
          $schools = $schools->where('schools.city_id',$request->city_id);
        }
        if($request->qualification_id != ""){
          $schools = $schools->where('school_programs.qualification_id',$request->qualification_id);
        }
        if($request->min_fee != ""){
          $schools = $schools->where('school_programs.fee','>=',$request->min_fee);
        }
        if($request->max_fee != ""){

          $schools = $schools->where('school_programs.fee','<=',$request->max_fee);
        }
        $schools = $schools->paginate(30);

        return view('sekolah.search-course-filter',['schools' => $schools,'ex_rate_usd' => $this->ex_rate_usd,'ex_rate_idr' => $this->ex_rate_idr]);
      }else if($result == "programs"){

        $keyword = $request->keyword;
        $schoolPrograms = School::selectRaw('schools.id,schools.name,schools.logo,schools.address,countries.name as country_name,regions.name as region_name,cities.name as city_name,countries.currency_code as curr_code,countries.currency_symbol as curr_symbol')->join('school_programs','school_programs.school_id','=','schools.id')->where('school_programs.name','like','%'.$keyword.'%')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->join('countries','schools.country_id','=','countries.id')->groupBy('schools.id','schools.name','schools.logo','schools.address','country_name','region_name','city_name','curr_code','curr_symbol')->orderBy('schools.name','ASC')->with(['programs' => function($query) use ($request){
          $query = $query->selectRaw('school_programs.id,school_programs.name,school_programs.fee,school_programs.enrollment_fee,school_programs.course_id,school_courses.name as course_name');
          if($request->id_jurusan != ""){
            $query = $query->where('school_programs.course_id',$request->id_jurusan);
          }else{
            if($request->keyword != ""){
              $query = $query->where('school_programs.name','like','%'.$request->keyword.'%');
            }
          }
          if($request->qualification_id != ""){
            $query = $query->where('school_programs.qualification_id',$request->qualification_id);
          }
          if($request->country_id != ""){
            $query = $query->where('school_programs.country_id',$request->country_id);
          }

          if($request->min_fee != ""){
            $query = $query->where('school_programs.fee','>=',$request->min_fee);
          }
          if($request->max_fee != ""){

            $query = $query->where('school_programs.fee','<=',$request->max_fee);
          }
          if($request->region_id != ""){
            $query = $query->where('school_programs.region_id',$request->region_id);
          }
          if($request->city_id != ""){
            $query = $query->where('school_programs.city_id',$request->city_id);
          }
          return $query->join('school_courses','school_courses.id','=','school_programs.course_id')->orderBy('course_id','ASC')->groupBy('school_programs.school_id','name','id','fee','enrollment_fee','course_id','course_name');
        }]);
        if($request->id_jurusan != ""){
          $schoolPrograms = $schoolPrograms->where('schools.course_id',$request->id_jurusan);
        }
    /*  if($request->qualification_id != ""){
        $schoolPrograms = $schoolPrograms->where('school_programs.qualification_id',$request->qualification_id);
      }*/
      if($request->country_id != ""){
        $schoolPrograms = $schoolPrograms->where('schools.country_id',$request->country_id);
      }
      if($request->region_id != ""){
        $schoolPrograms = $schoolPrograms->where('schools.region_id',$request->region_id);
      }
      if($request->city_id != ""){
        $schoolPrograms = $schoolPrograms->where('schools.city_id',$request->city_id);
      }

      $schoolPrograms = $schoolPrograms->get();

      $page = $request->page ?? 1;
      $perPage = 15;
      $offset = ($page - 1 ) * $perPage;
      $schoolPrograms = new LengthAwarePaginator(array_slice($schoolPrograms->toArray(), $offset, $perPage), count($schoolPrograms), $perPage, $page);

      return view('sekolah.search-course-filter',['schoolPrograms' => $schoolPrograms,'ex_rate_usd' => $this->ex_rate_usd,'ex_rate_idr' => $this->ex_rate_idr,'result' => $result]);
    //return $schoolPrograms->toJson();
    }
  }
  function school_filter(Request $request){
    $request->session()->put('searchData',$request->all());
    return redirect('cari-sekolah/search/school/'.$request->keyword);
  }

  function search_result($keyword = NULL, Request $request){
    abort(404);
    $searchData = $request->session()->get('searchData');
    $search_type = $searchData['search_type'];


    if(empty($searchData)){
      return redirect('cari-sekolah');
    }

    if($search_type == "course"){
     $schoolPrograms = new SchoolProgram;
     $id_jurusan = $searchData['id_jurusan'];
     $qualification_id = $searchData['qualification_id'];
     $min_fee = $searchData['min_fee'];
     $max_fee = $searchData['max_fee'];
     $country_id = $searchData['country_id'];

     $schoolPrograms = $schoolPrograms->selectRaw('school_programs.id,school_programs.course_id,school_programs.name,school_programs.fee,school_programs.fee_installment,school_programs.material_fee,school_programs.enrollment_fee,schools.logo as logo,countries.name as country_name,countries.currency_code as curr_code,countries.currency_symbol as curr_symbol,regions.name as region_name,cities.name as city_name,schools.name as school_name,school_courses.name as course_name')->join('school_courses','school_courses.id','=','school_programs.course_id')->join('schools','school_programs.school_id','=','schools.id')->join('regions','school_programs.region_id','=','regions.id')->join('cities','school_programs.city_id','=','cities.id')->join('countries','school_programs.country_id','=','countries.id');
     if(isset($id_jurusan)){
      $schoolPrograms = $schoolPrograms->where('school_programs.course_id',$id_jurusan);
    }else{
      if(isset($keyword)){
        $schoolPrograms = $schoolPrograms->where('school_courses.name','like','%'.$keyword.'%');
      }
    }
    if(isset($qualification_id)){
      $schoolPrograms = $schoolPrograms->where('qualification_id',$qualification_id);
    }
    if(isset($country_id)){
      $schoolPrograms = $schoolPrograms->where('school_programs.country_id',$country_id);
    }
    if(isset($min_fee)){
      $schoolPrograms = $schoolPrograms->where('school_programs.fee','>=',$min_fee);
    }
    if(isset($max_fee)){
      $schoolPrograms = $schoolPrograms->where('school_programs.fee','<=',$max_fee);
    }
    $count = $schoolPrograms->count();
    $schoolPrograms = $schoolPrograms->get();
    //$schoolPrograms = $schoolPrograms->paginate(12);
    $page = $request->page ?? 1;
    $perPage = 15;
    $offset = ($page - 1 ) * $perPage;
    //$schoolPrograms = new Pagination($schoolPrograms,$perPage,$page);
    $schoolPrograms = new LengthAwarePaginator(array_slice($schoolPrograms->toArray(), $offset, $perPage), count($schoolPrograms), $perPage, $page);

    $country = Country::orderBy('name','ASC')->get();
    $qualifications = SchoolQualification::orderBy('name','ASC')->get();
    if($keyword == null){
      $keyword = "";
    }

    $result = "programs";
    return view('sekolah.search-course',['country' => $country,'country_id' => $country_id,'qualifications' => $qualifications,'searchResult' => $schoolPrograms,'count'=> $count,'keyword' => $keyword,'result' => $result]);
  }elseif($search_type == "school"){
    $school = new School;
    $id_sekolah = $searchData['id_sekolah'];
    $country_id = $searchData['country_id'];

    $school = $school->selectRaw('schools.*,countries.name as country_name,countries.currency_code as curr_code,regions.name as region_name,cities.name as city_name')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->join('countries','schools.country_id','=','countries.id');
    if(isset($id_sekolah) && $id_sekolah != "" && $id_sekolah != NULL){
      $school = $school->where('schools.id',$id_sekolah);
    }elseif(isset($keyword)){
      $school = $school->where('schools.name','like','%'.$keyword.'%');
    }
    if(isset($country_id) && $country_id != ""){

      $school = $school->where('schools.country_id',$country_id);
    }
    $count = $school->count();
    $school = $school->paginate(12);
    return view('sekolah.search-school',['searchResult' => $school,'count'=> $count]);
  }



}

function country_ajax(Request $request){
  $regions = Region::where('country_id',$request->country_id)->orderBy('name','ASC')->get();
  return $regions->toJson();
}

function region_ajax(Request $request){
  $cities = new City;
  if($request->country_id != ""){
    $cities = $cities->where('country_id',$request->country_id);
  }
  if($request->region_id != ""){
    $cities = $cities->where('region_id',$request->region_id);
  }

  $cities = $cities->orderBy('name','ASC')->get();

  return $cities->toJson();
}

function program_detail($programId){
 $program = SchoolProgram::selectRaw('school_programs.id,schools.name as school_name,school_programs.school_id,school_programs.country_id,countries.name as country_name,regions.name as region_name,cities.name as city_name,school_programs.region_id,school_programs.city_id,school_programs.course_id,school_programs.qualification_id,school_qualifications.name as qualification_name,school_programs.name,school_programs.material_fee,school_programs.fee,school_programs.fee_installment,school_programs.duration,school_programs.details,school_programs.course_information,schools.enrollment_fee,schools.logo,countries.currency_code,(fee + material_fee + schools.enrollment_fee) as total_fee')->join('schools','school_programs.school_id','=','schools.id')->leftJoin('countries','school_programs.country_id','=','countries.id')->leftJoin('regions','school_programs.region_id','=','regions.id')->leftJoin('cities','cities.id','school_programs.city_id')->leftJoin('school_qualifications','school_qualifications.id','school_programs.qualification_id')->with('requirements')->with(['course_units' => function($query){
  return $query->selectRaw('school_course_units.*,school_course_periods.name as period_name')->join('school_course_periods','school_course_periods.id','school_course_units.period_id');
}])->with('other_fees')->with('intakes')->with('galleries')->find($programId);
 if($program->intakes->count() == 0){
  $intakes = SchoolIntake::where('school_id',$program->school_id)->get();
}
$program = collect($program)->merge(['intakes' => $intakes])->all();
return view('sekolah.program-detail',['program' => $program,'ex_rate_usd' => $this->ex_rate_usd,'ex_rate_idr' => $this->ex_rate_idr]);
}

function school_detail($schoolId){
  $this->schoolId = $schoolId;

  $school = School::selectRaw('schools.*,countries.name as country_name,countries.currency_code as curr_code,countries.currency_symbol as curr_symbol,regions.name as region_name,cities.name as city_name')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->join('countries','schools.country_id','=','countries.id')->with(['has_courses' => function($query) use ($schoolId){
   return $query->where('school_id',$schoolId);
 }])->with(['has_courses.programs' => function($query) use ($schoolId){
  return $query->where('school_programs.school_id',$schoolId);
}])->with('galleries')->with(['time_tables' => function($query){
  return $query->selectRaw('school_time_tables.*,school_programs.name as program_name,school_time_table_types.name as type')->leftJoin('school_programs','school_programs.id','=','school_time_tables.program_id')->leftjoin('school_time_table_types','school_time_table_types.id','=','school_time_tables.type_id')->orderBy('school_programs.name');
}])->with(['intakes' => function($query){
  return $query->selectRaw('school_intakes.*,school_programs.name as program_name,school_terms.term as term, year(intake_date) as year')->leftJoin('school_programs','school_programs.id','=','school_intakes.program_id')->leftJoin('school_terms','school_terms.id','=','school_intakes.term_id')->orderBy('school_intakes.intake_date','ASC')->orderBy('school_terms.term','ASC')->orderBy('school_programs.name','ASC')->orderBy('school_intakes.orientation_date','ASC');
}])->with('other_fees')->with('refunds')->with('promos')->with('student_informations')->find($schoolId);
return view('sekolah.school-detail',['school' => $school,'ex_rate_usd' => $this->ex_rate_usd,'ex_rate_idr' => $this->ex_rate_idr]);
}
function temp_school_detail($schoolId){
  $this->schoolId = $schoolId;
  /*$school = School::with('contacts')->with(['programs' => function($query){
    return $query->where('school_programs.school_id','29');
  }])->find($schoolId);*/
  $school = School::selectRaw('schools.*,countries.name as country_name,countries.currency_code as curr_code,countries.currency_symbol as curr_symbol,regions.name as region_name,cities.name as city_name')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->join('countries','schools.country_id','=','countries.id')/*->with(['contacts' => function($query){
    return $query->orderBy('name','ASC');
  }])*/->with(['has_courses' => function($query) use ($schoolId){
   return $query->where('school_id',$schoolId);
 }])->with(['has_courses.programs' => function($query) use ($schoolId){
   //return  $query->where('school_programs.school_id',$schoolId)->with('timetables');
  return $query->where('school_programs.school_id',$schoolId);
}])->with('galleries')->with(['time_tables' => function($query){
  return $query->selectRaw('school_time_tables.*,school_programs.name as program_name,school_time_table_types.name as type')->leftJoin('school_programs','school_programs.id','=','school_time_tables.program_id')->leftjoin('school_time_table_types','school_time_table_types.id','=','school_time_tables.type_id')->orderBy('school_programs.name');
}])->with(['intakes' => function($query){
  return $query->selectRaw('school_intakes.*,school_programs.name as program_name,school_terms.term as term, year(intake_date) as year')->leftJoin('school_programs','school_programs.id','=','school_intakes.program_id')->leftJoin('school_terms','school_terms.id','=','school_intakes.term_id')->orderBy('school_intakes.intake_date','ASC')->orderBy('school_terms.term','ASC')->orderBy('school_programs.name','ASC')->orderBy('school_intakes.orientation_date','ASC');
}])->with('other_fees')->with('refunds')->with('promos')->with('student_informations')->find($schoolId);
dd($school);
return view('sekolah.school-detail',['school' => $school]);
}

function search_school($keyword, Request $request){

  $searchData = $request->session()->get('searchData');
  if(empty($searchData)){
    return redirect('cari-sekolah');
  }
  $id_jurusan = $searchData['id_jurusan'];
  $qualification_id = $searchData['qualification_id'];
  $kode_negara = $searchData['country_id'];
  $min_fee = $searchData['min_fee'];
  $max_fee = $searchData['max_fee'];
  $schoolPrograms = new SchoolProgram;
  if(isset($id_jurusan)){
    $schoolPrograms = $schoolPrograms->where('course_id',$id_jurusan);
  }
  if(isset($qualification_id)){
    $schoolPrograms = $schoolPrograms->where('qualification_id',$qualification_id);
  }
  $schoolPrograms->get();
  $count = $schoolPrograms->count();
  return view('sekolah.search2',['schoolPrograms' => $schoolPrograms,'count'=> $count]);
}

public function search_result_pagination(){
  $results = [];
  $results = new LengthAwarePaginator(array_slice($results->toArray(), ($page - 1) * 25, 25), count($results), 25, $page, ["path" => "search"]);
}
}
