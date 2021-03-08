<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\City;
use App\Region;
use App\Country;
use App\SchoolProgram;
use App\SchoolDivision;
use App\SchoolContact;
use App\SchoolGallery;
use App\SchoolOtherFees;
use App\SchoolRefund;
use App\SchoolIntake;
use App\SchoolTerm;
use App\SchoolTimeTableType;
use App\SchoolTimeTable;
use App\SchoolPromo;
use App\SchoolStudentInformation;
use App\SchoolBankAccount;
use App\SchoolHasCourse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $dashboard = 'sekolah';
    public function index()
    {
      $school_divisions = SchoolDivision::orderBy('name','ASC')->get();

      $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name')->get();
      return view('sekolah.admin.schools.index',['schools' => $schools,'dashboard' => $this->dashboard,'school_divisions' => $school_divisions]);
    }

    public function school_division(SchoolDivision $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $divisions = $model::orderBy('name','ASC')->get();
      return view("sekolah.admin.schools.school_division",["school_divisions" => $divisions]);
    }

    public function contact_division(SchoolDivision $model,Request $request){
      $divisions = $model::orderBy('name','ASC')->get();
      return view("sekolah.admin.schools.contact_division",["contact_division" => $divisions]);
    }

    public function school_contact(SchoolContact $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $school_contacts = $model::selectRaw('school_contacts.*, school_divisions.name as division_name')->join('school_divisions','school_contacts.division_id','=','school_divisions.id')->where('school_contacts.school_id',$request->school_id)->get();
      
      return view("sekolah.admin.schools.school_contact",["school_contacts" => $school_contacts]);
    }

    public function school_other_fees(SchoolOtherFees $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $school_other_fees = $model::where('school_id',$request->school_id)->get();
    
      return view("sekolah.admin.schools.school_other_fees",["school_other_fees" => $school_other_fees]);
    }
     public function school_term(SchoolTerm $model,Request $request){
       if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $school_term = $model::where('school_id',$request->school_id)->orderBy('term_start_date','ASC')->orderBy('term','ASC')->get();
  
      return view("sekolah.admin.schools.school_term",["school_term" => $school_term]);
    }
    
    public function school_refund(SchoolRefund $model,Request $request){
      if($request->cek_refund){
        $request->merge(['jlh_refund_persen' => $request->total_refund]);
        $request->merge(['jlh_refund_total' => null]);
        
      }else{
        $request->merge(['jlh_refund_total' => $request->total_refund]);
        $request->merge(['jlh_refund_persen' => null]);
        
        
      }

       if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $school_refund = $model::where('school_id',$request->school_id)->get();
      return view("sekolah.admin.schools.school_refund",["school_refund" => $school_refund]);
    }
    

    public function school_intake(SchoolIntake $model,Request $request){
      //dd($request->all());
      if($request->cmd == "add"){
        $programs = $request->program_id;
        $insertData = array();
        if($programs != ""){
        foreach($programs as $program){
          $request->merge(['program_id' => $program]);
          $request->merge(['created_at' => Carbon::now()]);
          $request->merge(['updated_at' => Carbon::now()]);
          $request->merge(['note' => htmlspecialchars($request->note)]);
          array_push($insertData,$request->except('_token','cmd'));
        }
        $model->insert($insertData);
        }else{
          $model->create($request->all());
        }
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $programs = $request->intake_programs;
        foreach($programs as $program){
        $model->find($program['id'])->delete();
        }
      }
     
      $school_intake_course = $model::selectRaw('count(intake_date),count(term_id),school_intakes.intake_date,school_intakes.term_id,school_intakes.school_id,school_intakes.orientation_date,school_terms.term,school_intakes.note')->join('school_terms','school_terms.id','school_intakes.term_id')->groupBy('intake_date','term_id','school_id','orientation_date','term','note')->where('school_intakes.school_id',$request->school_id)->orderBy('school_terms.term')->orderBy('school_intakes.intake_date')->get();
      /*->with(['intake_programs' => function($query){
        return $query->selectRaw('school_intakes.id,school_intakes.program_id,school_programs.name as program_name')->leftJoin('school_programs','school_intakes.program_id','school_programs.id')->toSql();
        //with(['programs' => function($query2){
        //  return $query2->selectRaw('school_programs.*,school_courses.name as course_name')->join('school_courses','school_courses.id','school_programs.course_id');
      //  }]
      //); 
      }])->get();*/
      foreach($school_intake_course as $school_intakes){
        $school_programs = $model::selectRaw('school_intakes.id,school_intakes.program_id,school_programs.name as program_name')->leftJoin('school_programs','school_intakes.program_id','school_programs.id')->where('term_id',$school_intakes->term_id)->where('school_intakes.school_id',$request->school_id)->where('intake_date',$school_intakes->intake_date)->get();
        $school_intakes->school_programs = $school_programs;  
      }
      

      //$school_intake = $model::selectRaw('school_intakes.*,school_terms.term,school_terms.id as term_id')->where('school_intakes.school_id',$request->school_id)->leftJoin('school_terms','school_terms.id','=','school_intakes.term_id')->with(['programs.courses' => function($query){
      //  $query->selectRaw('school_courses.name as course_name,school_courses.id');
      //}])->get();
      return view("sekolah.admin.schools.school_intake",["school_intake" => $school_intake_course]);
    }
    public function school_has_course(Request $request){
       $school_courses = SchoolHasCourse::selectRaw('course_id as id,school_courses.name')->join('school_courses','school_courses.id','school_has_courses.course_id')->where('school_id',$request->school_id)->get();

       return $school_courses->toJson();
    }
    public function school_has_program(Request $request){
      $school_programs = SchoolProgram::selectRaw('id,name')->where('school_id',$request->school_id)->get();
       return $school_programs->toJson();
    }
    public function school_course_has_program(Request $request){

 $school_courses = SchoolHasCourse::selectRaw('course_id as id,school_courses.name')->join('school_courses','school_courses.id','school_has_courses.course_id')->with(['programs' => function($query) use ($request){
  return $query->selectRaw('school_programs.*')->where('school_id',$request->school_id);
 }])->where('school_id',$request->school_id);
 if($request->course_id != "null"){
$school_courses = $school_courses->where('course_id',$request->course_id);
 }
$school_courses = $school_courses->get();
//$school_programs = SchoolProgram::selectRaw('school_programs.*,school_courses.name as school_name')->join('school_courses','school_courses.id','school_programs.course_id')->where('school_id',$request->school_id)->where('course_id',$request->course_id)->get();
       return view("sekolah.admin.schools.school_intake_course-ajax",["school_courses" => $school_courses]);
    }


    
    public function school_time_table_type(SchoolTimeTableType $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $school_time_table_type = $model::orderBy('name','ASC')->get();
      return view("sekolah.admin.schools.school_time_table_type",["school_time_table_type" => $school_time_table_type]);
    }

    public function school_time_table(SchoolTimeTable $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
     $school_time_table = $model::selectRaw('school_time_tables.*,school_time_table_types.name as type')->leftJoin('school_time_table_types','school_time_table_types.id','=','school_time_tables.type_id')->with('program')->where('school_time_tables.school_id',$request->school_id)->get();
      return view("sekolah.admin.schools.school_time_table",["school_time_table" => $school_time_table]);
    }

    
    public function student_rights(SchoolStudentInformation $model, Request $request){
       $rights =$model::where('school_id',$request->school_id);
      if($request->cmd == "add"){
       
        $cek_exist = $rights->count();

        if(!$cek_exist){
          $model->create(['school_id' => $request->school_id,'rights' => $request->rights]);
        }else{
          if($rights->value('rights')){
          
            $rights->update(['rights' => DB::raw('CONCAT(rights,"|'.$request->rights.'")')]);
          }else{
            $rights->update(['rights' => $request->rights]);
          }
        }
      }else if($request->cmd == "update"){
        $arr_rights = explode('|',$rights->value('rights'));
        $arr_rights[$request->index] = $request->rights;
        $new_rights = implode('|',$arr_rights);
        $rights->update(['rights' => $new_rights]);
      }else if($request->cmd == "delete"){

        $model->find($request->id)->update($request->all());
       // $model->find($request->id)->delete();
      }
      $student_informations = $model::where('school_student_informations.school_id',$request->school_id)->first();
      return view("sekolah.admin.schools.school_student_informations",["student_informations" => $student_informations]);
    }

    public function student_obligations(SchoolStudentInformation $model, Request $request){
       $obligations =$model::where('school_id',$request->school_id);
      if($request->cmd == "add"){
       
        $cek_exist = $obligations->count();

        if(!$cek_exist){
          $model->create(['school_id' => $request->school_id,'obligations' => $request->obligations]);
        }else{
          if($obligations->value('obligations')){
          
            $obligations->update(['obligations' => DB::raw('CONCAT(obligations,"|'.$request->obligations.'")')]);
          }else{
            $obligations->update(['obligations' => $request->obligations]);
          }
        }
      }else if($request->cmd == "update"){
        $arr_obligations = explode('|',$obligations->value('obligations'));
        $arr_obligations[$request->index] = $request->obligations;
        $new_obligations = implode('|',$arr_obligations);
        $obligations->update(['obligations' => $new_obligations]);
      }else if($request->cmd == "delete"){

        $model->find($request->id)->update($request->all());
       // $model->find($request->id)->delete();
      }
      $student_informations = $model::where('school_student_informations.school_id',$request->school_id)->first();
      return view("sekolah.admin.schools.school_student_obligations",["student_informations" => $student_informations]);
    }

     public function school_bank_accounts(SchoolBankAccount $model,Request $request){
      if($request->cmd == "add"){
        $request->merge(['note' => htmlspecialchars($request->note)]);
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $request->merge(['note' => htmlspecialchars($request->note)]);
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
     $school_bank_accounts = $model::where('school_id',$request->school_id)->get();
      return view("sekolah.admin.schools.school_bank_accounts",["school_bank_accounts" => $school_bank_accounts]);
    }

    public function school_promo(SchoolPromo $model,Request $request){
      if($request->cmd == "add"){
        $term_and_conditions = urldecode($request->term_and_conditions);
        $request->merge(['term_and_conditions' => $term_and_conditions]);
        $model->create($request->all());
      }else if($request->cmd == "update"){
         $term_and_conditions = urldecode($request->term_and_conditions);
        $request->merge(['term_and_conditions' => $term_and_conditions]); 
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
     $school_promo = $model::selectRaw('school_promos.*,school_programs.name as program_name')->leftJoin('school_programs','school_programs.id','school_promos.program_id')->where('school_promos.school_id',$request->school_id)->get();

      return view("sekolah.admin.schools.school_promo",["school_promo" => $school_promo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cities = City::selectRaw('countries.name as country_name,regions.name as region_name,cities.*')->join('countries','cities.country_id','=','countries.id')->join('regions','cities.region_id','=','regions.id')->orderBy('name','ASC')->get();
      return view('sekolah.admin.schools.create',['cities' => $cities,'dashboard' => $this->dashboard]);  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $school = new School;
      $body=$request->description;
      $path = "img/schools/logo_sekolah";
      $nama_sekolah = $request->name;
      $abbv = "";
      if(preg_match_all('/\b(\w)/',strtoupper($nama_sekolah),$m)) {
        $abbv = implode('',$m[1]); // $v is now SOQTU
      }else{
        $abbv = "undefined";
      }
      $id = School::orderBy('id','DESC')->limit(1)->value('id');
      $id = $id+1;
      $path2 = "img/schools/".$id;
      if($body != ""){
      $dom = new \domdocument();
      $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR | LIBXML_NOWARNING);
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
               $img->setattribute('class','school-desc-img');
             }
           }
           $body = $dom->savehtml();
          $request->merge(['description' => $body]);
         }
           $places = City::select('region_id','country_id')->find($request->city_id);
           $request->merge(['region_id' => $places->region_id]);
           $request->merge(['country_id' => $places->country_id]);
           $gambar =$request->file('gambar');
           if(!empty($gambar)){
            $ext_gambar = $gambar->getClientOriginalExtension();
      //  $nama_gambar = $gambar->getClientOriginalName();
            $logo = time().$abbv.'.'.$ext_gambar;
            $path_gambar = $gambar->storeAs($path, $logo,'public');
            $request->merge(['logo' => $logo]);
          }
          if($request->abbreviation == ""){
          $request->merge(['abbreviation' => $abbv]);
          }
          $school = $school->create($request->all());
          return redirect()->route('school.index')->withStatus(__('School successfully created.'));
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
      $school = School::find($id);
    $cities = City::selectRaw('countries.name as country_name,regions.name as region_name,cities.*')->join('countries','cities.country_id','=','countries.id')->join('regions','cities.region_id','=','regions.id')->orderBy('name','ASC')->get();
      return view('sekolah.admin.schools.edit',['school' => $school,'cities' => $cities,'dashboard' => $this->dashboard]);
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
      $school = School::find($id);

      $body = $request->description;
      $path = "img/schools/logo_sekolah";
      $nama_sekolah = $request->name;
      $abbv = "";
      if(preg_match_all('/\b(\w)/',strtoupper($nama_sekolah),$m)) {
        $abbv = implode('',$m[1]); // $v is now SOQTU
      }else{
        $abbv = "undefined";
      }
      $path2 = "img/schools/".$id;
      if($body != ""){
      $dom = new \domdocument();
      $dom->loadHtml($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR | LIBXML_NOWARNING);
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
               $img->setattribute('class','school-desc-img');
             }
           }
           $body = $dom->savehtml();
$request->merge(['description' => $body]);
          
         }
           $places = City::select('region_id','country_id')->find($request->city_id);
           $request->merge(['region_id' => $places->region_id]);
           $request->merge(['country_id' => $places->country_id]);
           $gambar =$request->file('gambar');
           if(!empty($gambar)){
            $ext_gambar = $gambar->getClientOriginalExtension();
      //  $nama_gambar = $gambar->getClientOriginalName();
            $logo = time().$abbv.'.'.$ext_gambar;
            $path_gambar = $gambar->storeAs($path, $logo,'public');
            $request->merge(['logo' => $logo]);
          } 
          if($request->abbreviation == ""){
          $request->merge(['abbreviation' => $abbv]);
        }
          SchoolProgram::where('school_id',$id)->update(['enrollment_fee' => $request->enrollment_fee]);
          $school = $school->update($request->all());
          return redirect()->route('school.index')->withStatus(__('School successfully updated !'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function school_gallery(Request $request){
     if($request->cmd == "add"){
       $gambar = $request->file('gambar');
       if(!empty($gambar)){
         $ext_gambar = $gambar->getClientOriginalExtension();
         $nama_gambar = $gambar->getClientOriginalName();
         $path = "img/schools/".$request->school_id;
         $path_gambar = $gambar->storeAs($path, $nama_gambar,'public');
         $request->merge(['image' => $nama_gambar]);
       }
       SchoolGallery::create($request->all());
     }else if($request->cmd == "update"){
       SchoolGallery::find($request->id)->update($request->all());
     }else if($request->cmd == "delete"){
       SchoolGallery::find($request->id)->delete();
     }
     $school_galleries = SchoolGallery::where('school_id',$request->school_id)->get();
     return $school_galleries->toJson();
   }

   public function destroy($id)
   {
      $school = School::find($id)->delete();  //
      return redirect()->route('school.index')->withStatus(__('School successfully deleted.'));
    }

    public function programs($id){
      $schoolName = School::find($id)->value('name');

    $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','schools.country_id','countries.id')->join('regions','schools.region_id','regions.id')->join('cities','schools.city_id','cities.id')->orderBy('schools.name','ASC')->get();
      return view('sekolah.admin.school-programs.index',['schools' => $schools,'schoolId' => $id,'schoolName' => $schoolName]);
    }


    
  }
