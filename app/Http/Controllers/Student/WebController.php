<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Student;
use App\Models\OnlineTest\OtQuestion;
use Auth;
use DateTime;
use App\Country;

use App\Models\Reseller;

use App\Models\OnlineTest\OtRegistration;
use App\Models\OnlineTest\OtTest;
use App\Models\OnlineTest\OtPackage;
use App\Models\OnlineTest\OtModule;
use App\Models\OnlineTest\OtCurrentTest;
use App\Models\OnlineTest\OtCurrentTestQna;
use App\Models\OnlineTest\OtTestStructure;
use App\Models\OnlineTest\OtTestSection;
use App\Models\OnlineTest\OtTestAnswer;
use App\Models\OnlineTest\OtCurrentAnswer;
use App\Models\OnlineTest\OtSection;
use App\Models\OnlineTest\OtScoreConversionTable;

use App\Models\Student\PersonalInformation;
use App\Models\Student\BankAccountDetail;
use App\Models\Student\EnglishQualification;
use App\Models\Student\VisaHistory;
use App\Models\Student\PassportHistory;
use App\Models\Student\InsuranceProvider;
use App\Models\Student\SchoolApplication;
use App\Models\Student\PaymentSchedule;
use App\School;

use Illuminate\Support\Facades\Mail;

use App\Mail\OnlineTestResultMail;

use Carbon\Carbon;
use App\FisherYatesShuffle;
use DB;

class WebController extends Controller
{

    protected $current_test_id,$current_question_id,$shuffledQuestions,$question,$question_num,$start_time,$timeout,$section_timeout,$section_duration,$student_id,$test_id,$module_id,$package_id,$total_question,$test_structure,$current_structure,$user_id;


    public function __construct(){
        // $this->middleware(['student-auth','student.verified']);
        $this->middleware(function ($request, $next){
            $this->current_test_id = session('online_test.current_test_id');
            $this->current_question_id = session('online_test.current_question_id');
            $this->test_id = session('online_test.test_id');
            $this->module_id = session('online_test.module_id');
            $this->start_time = session('online_test.start_time');
            $this->package_seed = session('online_test.package_seed');
            $this->student_id = session('online_test.student_id');
            $this->package_id = session('online_test.package_id');
            $this->shuffledQuestions = session('online_test.shuffledQuestions');
            $this->question_num = session('online_test.question_num');
            $this->questions = session('online_test.questions');
            $this->test_structure = session('online_test.test_structure');
            $this->total_question = session('online_test.total_question');
            $this->section_timeout = session('online_test.section_timeout');
            $this->section_duration = session('online_test.section_duration');    
            $this->start_section_time = session('online_test.start_section_time');
            $this->current_structure = session('online_test.current_structure');
            $this->skills =  session('online_test.skills'); 
            
            if(Auth::check()){
                $this->user_id = Auth::user()->id;
                $this->student_id = Student::where('user_id',$this->user_id)->orderBy('created_at','DESC')->limit(1)->value('id');
            }else{
                $this->user_id = "";
            }
            return $next($request);
        });
        
    }
    public function index(){
        $test = OtTest::all();
        if(Auth::guard()->check()){
            $student_id = Auth::guard()->user()->id;
            $user_id = Auth::guard()->user()->id;
        }else{
            $student_id = "";
        }
        return view('online-test.dashboard2',['test' => $test,'student_id' => $student_id]);
    }
    public function profile(){
     $registration_histories = Student::selectRaw('students.*,countries.name as country_name')->where('user_id',$this->user_id)->join('countries','countries.id','students.country')->get();
     return view('student.profile',['registration_histories' => $registration_histories]);
 }

 public function student_detail_profile_ajax(Request $request){
     $countries = Country::orderBy('name','ASC')->get();
     $student = Student::selectRaw('students.*,countries.name as country_name')->join('countries','countries.id','students.country')->find($request->student_id);
     $visa_registrations = PersonalInformation::selectRaw('student_personal_informations.*,visa_countries.name as visa_country_name,students.client_id')->leftJoin('countries as visa_countries','visa_countries.id','student_personal_informations.visa_country')->join('students','students.id','student_personal_informations.student_id')->where('student_personal_informations.student_id',$request->student_id)->with('student')->get();
     $personal_information = PersonalInformation::where('student_personal_informations.student_id',$request->student_id)->with('student')->orderBy('student_personal_informations.created_at','DESC')->limit(1)->get() ;
     if(count($personal_information)){
        $personal_information = $personal_information[0];
     }else{
        $personal_information = "";
     }
     $bank_account_detail = BankAccountDetail::where('student_id',$request->student_id)->first();
     $passport_histories = PassportHistory::where('student_id',$request->student_id)->get();
     $english_qualifications = EnglishQualification::where('student_id',$request->student_id)->get();
     $visa_histories=  VisaHistory::selectRaw('student_visa_histories.*,countries.name as country_name')->where('student_id',$request->student_id)->join('countries','student_visa_histories.country','countries.id')->get();
     $bank_accounts = BankAccountDetail::where('student_id',$request->student_id)->get();
     $insurance_providers = InsuranceProvider::where('student_id',$request->student_id)->get();
     $school_applications = SchoolApplication::selectRaw('schools.name as school_name,school_programs.name as program_name,countries.name as school_country,schools.country_id as school_countries,student_school_applications.*')->join('schools','schools.id','student_school_applications.school_id')->join('school_programs','school_programs.id','student_school_applications.program_id')->join('countries','countries.id','schools.country_id')->where('student_id',$request->student_id)->get(); 
      $course_detail_schools = School::select('schools.id','schools.name')->join('student_course_details','student_course_details.school_id','schools.id')->where('student_course_details.student_id',$request->student_id)->groupBy('schools.id','schools.name')->orderBy('schools.name','ASC')->get();
      $payment_schedules = PaymentSchedule::selectRaw('student_payment_schedules.*,school_programs.name as program_name,schools.name as school_name')->join('school_programs','school_programs.id','student_payment_schedules.program_id')->join('schools','schools.id','student_payment_schedules.school_id')->orderBy('schools.name','ASC')->orderBy('school_programs.name','ASC')->where('student_id',$request->student_id)->get();
     return view('student.detail-profile-ajax',['student' => $student,'visa_registrations' => $visa_registrations,'personal_information' => $personal_information,'countries' => $countries,'bank_account_detail' => $bank_account_detail,'passport_histories' => $passport_histories,'english_qualifications' => $english_qualifications ,'visa_histories' => $visa_histories,'bank_accounts' => $bank_accounts,'insurance_providers' => $insurance_providers,'school_applications' => $school_applications,'course_detail_schools' => $course_detail_schools,'payment_schedules' => $payment_schedules]);
 }

 public function application(){
    return view('student.application');
}


public function passport_history_ajax(Request $request){
    $student_id = $request->student_id;

    $request->merge(['student_id' => $student_id]);
    $output = "Data has been updated successfully";
    if($request->cmd == "add"){
        $passport_history = PassportHistory::create($request->all());
    }else if($request->cmd == "update"){
        $passport_history = PassportHistory::find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
        $passport_history = PassportHistory::find($request->id)->delete();
    }
    $passport_histories = PassportHistory::where('student_id',$request->student_id)->get();
    return view('student.passport-history-ajax',['passport_histories' => $passport_histories]);

}

public function english_qualification_ajax(Request $request){
    $student_id = $request->student_id;
    $request->merge(['student_id' => $student_id]);
    $output = "Data has been updated successfully";
    if($request->cmd == "add"){
        $english_qualification = EnglishQualification::create($request->all());
    }else if($request->cmd == "update"){
        $english_qualification = EnglishQualification::find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
        $english_qualification = EnglishQualification::find($request->id)->delete();
    }

    $english_qualifications = EnglishQualification::where('student_id',$request->student_id)->get();
    return view('student.english-qualification-ajax',['english_qualifications' => $english_qualifications]);

}

public function visa_history_ajax(Request $request){
   $student_id = $request->student_id;
   $request->merge(['student_id' => $student_id]);
   $output = "Data has been updated successfully";
   if($request->cmd == "add"){
    $visa_history = VisaHistory::create($request->all());
}else if($request->cmd == "update"){
    $visa_history = VisaHistory::find($request->id)->update($request->all());
}else if($request->cmd == "delete"){
    $visa_history = VisaHistory::find($request->id)->delete();
}

$visa_histories = VisaHistory::selectRaw('student_visa_histories.*,countries.name as country_name')->where('student_id',$request->student_id)->join('countries','student_visa_histories.country','countries.id')->get();
return view('student.visa-history-ajax',['visa_histories' => $visa_histories]);

}

public function personal_information_ajax(Request $request){
    $personal_information_id = $request->personal_information_id;
    if(!$personal_information_id){
        return "Unknown Error";
    }
    $student_id = $this->student_id;
    $request->merge(['student_id' => $student_id]);
    $personal_information = PersonalInformation::where('id',$personal_information_id)->first();
    $output = "Data has been updated successfully";
    if($personal_information != ""){
        $personal_information = $personal_information->update($request->all());
    }else{
        PersonalInformation::create($request->all());
    }
    // $update_student = collect();
    // $update_student = $update_student->merge(['name' => $request->name]);
    // $update_student = $update_student->merge(['country' => $request->visa_country]);
    // Student::find($student_id)->update($update_student->toArray());
    return $output;
}

public function bank_account_details_ajax(Request $request){
    $student_id = $request->student_id;
    $request->merge(['student_id' => $student_id]);
    $output = "Data has been updated successfully";
    if($request->cmd == "add"){
        $visa_history = BankAccountDetail::create($request->all());
    }else if($request->cmd == "update"){
        $visa_history = BankAccountDetail::find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
        $visa_history = BankAccountDetail::find($request->id)->delete();
    }

    $bank_accounts = BankAccountDetail::where('student_id',$request->student_id)->get();
    return view('student.bank-account-details-ajax',['bank_accounts' => $bank_accounts]);
}

public function insurance_provider_ajax(Request $request){
    $student_id = $request->student_id;
    $request->merge(['student_id' => $student_id]);
    $output = "Data has been updated successfully";
    if($request->cmd == "add"){
        $insurance_provider = InsuranceProvider::create($request->all());
    }else if($request->cmd == "update"){
        $insurance_provider = InsuranceProvider::find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
        $insurance_provider = InsuranceProvider::find($request->id)->delete();
    }

    $insurance_providers = InsuranceProvider::where('student_id',$request->student_id)->get();
    return view('student.insurance-provider-ajax',['insurance_providers' => $insurance_providers]);
}

public function show_test(){
    abort(403);
    $test = OtTest::all();
    return view('online-test.show-test',['test' => $test]);
}
public function select_test(Request $request){

    if($request->test_id != 1){
        return $this->verify_identification($request->test_id);
    }else{
        $modules = OtModule::where('test_id',$request->test_id)->where('name','!=','-')->get();
        return view('online-test.modules',['modules' => $modules,'test_id' => $request->test_id]);
    }
        /*session()->forget('online_test');

        $test_id = $request->test_id;

        $modules = OtModule::where('test_id',$test_id)->get()->first();
        $module_id = $modules->id;
        $start_time = Carbon::now()->timestamp;
        return $this->new_start_test($test_id,$module_id,$start_time);
       */


        /*if($modules->count()){
            return view('online-test.modules',['modules' => $modules,'test_id' => $test_id]);
        }else{
            $start_time = Carbon::now()->timestamp;
            $module = OtModule::where('test_id',$test_id)->where('name','-')->first();
            $module_id = $module->id;
            return $this->start_test($test_id,$module_id,$start_time);
            //return $this->select_section($test_id,$module_id);
        }*/
    }
    public function verify_identification($test_id = null, $module_id = null,$current_test_id = null){
         $current_test = OtCurrentTest::where('ot_current_tests.id',$current_test_id)->first();
        if($current_test){
        if($current_test->answers != ""){
        abort(403,"Test Finished !");
        }
    }
        return view('online-test.verify-identification',['test_id' => $test_id,'module_id' => $module_id,'current_test_id' => $current_test_id]);
    }
    public function show_modules(Request $request){
        abort(403);
        if(null !== session('test_id'))
        {
            $test_id = session('test_id');
        }else{
            $test_id = $request->test_id;
        }
        $modules = OtModule::where('test_id',$test_id)->get();
        
        if($modules->count()){

            return view('online-test.modules',['modules' => $modules,'test_id' => $test_id]);
        }
    }
    public function select_modules(Request $request){

        abort(403);
        // return $this->start_test2($test_id,$module_id,$start_time);
        // return redirect()->action("Student\WebController@test", ['test_id' => $test_id,'module_id' => $module_id,'start_time' => $start_time]);

        return $this->verify_identification($request->test_id,$request->module_id);
        //$packages = OtPackage::where('test_id',$test_id)->where('module_id',$module_id)->get();    
        
    }   
    public function select_section($test_id ,$module_id = Null){
        $student_id = Auth::guard('student')->user()->id;
        $packages = OtPackage::where('test_id',$test_id)->where('module_id',$module_id)->get();
        $package_seed = Carbon::now()->timestamp;
        session()->put("online_test.package_seed",$package_seed);        
        $packages = new FisherYatesShuffle($packages,$this->package_seed);
        $package_id = $packages->shuffle()->first()->id;
        //echo '<br>'.$test_id.'-'.$module_id.'-'.$package_id;
        /*baru*/
        $test_sections = OtTestSection::selectRaw('ot_test_sections.*,ot_section_types.name as section_name')->join('ot_section_types','ot_section_types.id','=','ot_test_sections.section_type_id')->where('ot_test_sections.package_id',$package_id)->where('ot_test_sections.test_id','=',$test_id)->where('ot_test_sections.module_id',$module_id)->with('sections')->get();
        return view('online-test.select-sections',['test_id' => $test_id,'module_id' => $module_id,'package_id' => $package_id,'test_sections' => $test_sections]);
         //  return redirect()->action("Student\WebController@test", ['package_id' =>$package_id]);
    }

    public function link_test($test,$token){
        $current_test = OtCurrentTest::where('link_token',$token)->first();
        if(!$current_test){
            abort(403,'Your registration data is not approved | Please contat');
        }
        $approved_date = $current_test->approved_date;
        $now = Carbon::now();
        $datetime1 = new DateTime($approved_date);
        $datetime2 = new DateTime($now);
        $diff = $datetime2->diff($datetime1);
       // if($diff->h <= 24 && $diff->d <= 1){
        $test_id = $current_test->test_id;
        $module_id = $current_test->module_id;
        $current_test_id = $current_test->id;
        return  $this->verify_identification($test_id,$module_id,$current_test_id);
    //  }else{
     //   abort(403, 'Link Expired ! ');
    //}
    }

/*public function link_ielts_test($token){
        $current_test = OtCurrentTest::where('link_token',$token)->first();
        $approved_date = $current_test->approved_date;
        
        $now = Carbon::now();
        $datetime1 = new DateTime($approved_date);
        $datetime2 = new DateTime($now);
        $diff = $datetime2->diff($datetime1);
        if($diff->h <= 24 && $diff->d <= 1){
          $test_id = $current_test->test_id;
          $module_id = $current_test->module_id;
          $current_test_id = $current_test->id;
          return  $this->verify_identification($test_id,$module_id,$current_test_id);
      }else{
        abort(403, 'Link Expire ! ');
    }
}*/

public function get_start_test(){
    return redirect()->route('student-test');
}

public function start_test(Request $request){
    session()->forget('online_test');
    $image = $request->verify_identification;
    $test_id = $request->test_id;
    if($request->module_id == ""){
        $modules = OtModule::where('test_id',$test_id)->where('name','!=','-')->get()->first();
        $module_id = $modules->id;  
    }else{
        $module_id = $request->module_id;
    }
    $start_time = Carbon::now()->timestamp;

    $current_test_id = $request->current_test_id;
    if(Auth::guard('student')->check()){
        $student_id = Auth::guard('student')->user()->id;
    }else{
        $student_id = "";
    }
    $package_seed = $start_time.$current_test_id;
    $path = 'new-online-test/'.date("Y").'/'.date("m").'/'.date("d").'/'.$current_test_id;
    $path_image = "";
    if(!empty($image)){
        $ext_image = $image->getClientOriginalExtension();
        $nama_image = $image->getClientOriginalName();
        $path_image = $image->storeAs($path."/image", time().$nama_image,'public');
    }
    $packages = OtPackage::where('test_id',$test_id)->where('module_id',$module_id)->get();
    if($packages->count()){
        $packages = new FisherYatesShuffle($packages,$package_seed);
        $package_id = $packages->shuffle()->first()->id;
        if($test_id == 1 && $module_id == 11){
            $package_id = 27;
        }
     //   $package_id = 27;
    }else{$package_id = "";}
    
    //$data = session(["online_test" => ['test_id' => $test_id , 'module_id' => $module_id,'start_time' => $start_time,'student_id' => $student_id,'package_id' => $package_id,'package_seed' => $package_seed]]);
    $data = session(["online_test" => ['test_id' => $test_id , 'module_id' => $module_id,'start_time' => $start_time,'package_id' => $package_id,'package_seed' => $package_seed]]);

    $this->test_id = session('online_test.test_id');
    $this->module_id = session('online_test.module_id');
    $this->start_time = session('online_test.start_time');
    //$this->student_id = session('online_test.student_id');
    $this->package_seed = session('online_test.package_seed');
    $this->package_id = session('online_test.package_id');
    if($current_test_id == ""){
     //$current_test = OtCurrentTest::create(['test_id' => $this->test_id,'module_id' => $this->module_id,'package_id' => $this->package_id,'student_id' => $this->student_id,'start_time' => $this->start_time,'identification' => $path_image]);
        $current_test = OtCurrentTest::create(['test_id' => $this->test_id,'module_id' => $this->module_id,'package_id' => $this->package_id,'start_time' => $this->start_time,'identification' => $path_image]);
        $current_test_id = $current_test->id;
    }else{
    //$current_test = OtCurrentTest::find($current_test_id)->update(['identification' => $path_image,'start_time' => $this->start_time,'package_id' => $this->package_id,'student_id' => $this->student_id]);
        $current_test = OtCurrentTest::find($current_test_id)->update(['identification' => $path_image,'start_time' => $this->start_time,'package_id' => $this->package_id]);
    }
    $registration_id = OtCurrentTest::find($current_test_id)->registration_id;
    
    $skills =OtRegistration::find($registration_id)->skills;
    if($skills != ""){
        $skills = explode(',',$skills);
        session()->put("online_test.skills",collect($skills));
    }
    session()->put("online_test.current_test_id",$current_test_id);

    $test_sections = OtTestSection::selectRaw('ot_test_sections.*,ot_section_types.name as section_type_name')->where('ot_test_sections.test_id',$this->test_id)->where('ot_test_sections.module_id',$this->module_id)->where('ot_test_sections.package_id',$this->package_id)->orderBy('id','ASC')->join('ot_section_types','ot_test_sections.section_type_id','=','ot_section_types.id')->with('sections.structures.questions.options');
    if($skills != ""){
        $test_sections = $test_sections->whereIn('section_type_id',collect($skills))->where('section_type_id','!=',3)->where('section_type_id','!=',4);
    }
    $test_sections = $test_sections->get();

    $create_answers_data = OtTestSection::where('ot_test_sections.test_id',$this->test_id)->where('ot_test_sections.module_id',$this->module_id)->where('ot_test_sections.package_id',$this->package_id)->orderBy('id','ASC')->with(['sections'=>function($query){
        $query->where('ot_sections.type','!=','introduction');
    }])->get();
    $this->create_answers_json($test_sections);
    if($test_sections->count() != 0){

         // $questions2 = OtQuestion::with('options')->get();

      //  $shuffledQuestions = new FisherYatesShuffle($questions2,$this->start_time);
      // $shuffledQuestions = $shuffledQuestions->shuffleQuestionsOptions();

        session()->put("online_test.test_structure",collect($test_sections));
        $current_structure = (object) array(
            'test_section' => 0,
            'section' =>  0,
            'structure' => 0,
        );   


        session()->put("online_test.current_structure",$current_structure);
        $section_type = $test_sections[0]->sections[0]->type;
        if($section_type == "introduction"){    
            session()->put("online_test.section_timeout","");
        }else if(($section_type == "question" || $section_type == null) && ($test_sections[0]->sections[0]->structures->count() != 0)){
            if($test_sections[0]->sections[0]->structures[0]->question_type == "multiple" || $test_sections[0]->sections[0]->timer == "on"){

                session()->put("online_test.section_timeout",0);
            }else{
                $start_section_time = Carbon::now()->timestamp;
                $duration = $test_sections[0]->duration;
                $section_timeout = $start_section_time + $duration;

                session()->put("online_test.current_section",$test_sections[0]->sections[0]->id);
                session()->put("online_test.start_section_time",$start_section_time);
                session()->put("online_test.section_timeout",$section_timeout);
            }

        }
       // $current_question_id = $test_sections->first()->sections->first()->structures()->first()->questions()->first()->id;
       // session()->put("online_test.current_question_id",$current_question_id);
       // session()->put("online_test.question_num",1);

        return redirect()->route('student-test');
    }else{
        return "No Question Yet";
    }
}

public function create_answers_json($test_sections){
    foreach($test_sections as $test_section){
        foreach($test_section->sections as $section){
            foreach($section->structures as $structure){
               // dd($structure);
            }
        }
    }
}

public function old_start_test($test_id ,$module_id = Null,$start_time){

    $student_id = Auth::guard('student')->user()->id;
    $data = session(["online_test" => ['test_id' => $test_id , 'module_id' => $module_id,'start_time' => $start_time,'student_id' => $student_id]]);

    $this->test_id = session('online_test.test_id');
    $this->module_id = session('online_test.module_id');
    $this->start_time = session('online_test.start_time');
    $this->student_id = session('online_test.student_id');
    $packages = OtPackage::where('test_id',$this->test_id)->where('module_id',$this->module_id)->get();
    if(!$packages->isEmpty()){
        $packages = new FisherYatesShuffle($packages,$this->start_time);
        $package_id = $packages->shuffle()->first()->id;
        session()->put("online_test.package_id",$package_id);
        $this->package_id = session('online_test.package_id');

        $current_test = OtCurrentTest::create(['test_id' => $this->test_id,'module_id' => $this->module_id,'package_id' => $this->package_id,'student_id' => $this->student_id,'start_time' => $this->start_time]);
        $current_test_id = $current_test->id;
        session()->put("online_test.current_test_id",$current_test_id);
        /*baru*/



        $questions = OtQuestion::with('test_structure')->with('options')->where('package_id',$this->package_id)->get();
        $questions2 = OtQuestion::with('test_structure')->with('options')->where('package_id',$this->package_id)->get();
        // $questions2 = OtQuestion::with('options')->get();

      //  $shuffledQuestions = new FisherYatesShuffle($questions2,$this->start_time);
      // $shuffledQuestions = $shuffledQuestions->shuffleQuestionsOptions();
        $shuffledQuestions = $questions2;
        session()->put("online_test.shuffledQuestions",$shuffledQuestions);
        session()->put("online_test.current_question_id",$shuffledQuestions->first()->id);
        session()->put("online_test.question_num",1);

        return redirect()->route('student-test');
    }else{
        session()->put("messages","No Question !");
        return redirect('student/error');
    }
        //  return redirect()->action("Student\WebController@test", ['package_id' =>$package_id]);
}
public function error(){
    return view('online-test.error');
}
public function add_current_structure($test_section,$section,$structure){

    $current_structure = $this->current_structure;

    if($current_structure->structure < ($this->show_current_section()->structures->count()) - 1 && !$test_section && !$section){
        $current_structure->structure ++;
        session()->put("online_test.current_structure",$current_structure);
    }else{  

        if($current_structure->section < ($this->show_current_test_section()->sections->count()) - 1 && !$test_section){
            $current_structure->structure = 0;
            $current_structure->section ++;
            session()->put("online_test.current_structure",$current_structure);
        }else{
          if($current_structure->test_section < ($this->test_structure->count() - 1 )){

            $current_structure->test_section ++;
            $current_structure->section = 0;
            $current_structure->structure = 0;
            if($this->show_current_section()->structures->count()){
                session()->put("online_test.current_structure",$current_structure);
            }else{
                return $this->add_current_structure(0,0,1);
            }
        }else{
            return false;
        }
    }
}
return true;
}

public function minus_current_structure($test_section,$section,$structure){
    $current_structure = $this->current_structure;

    if($current_structure->structure > 0){
     $current_structure->structure --;

     session()->put("online_test.current_structure",$current_structure);
 }else{
     if($current_structure->section > 0){
        $current_structure->section --;
        session()->put("online_test.current_structure",$current_structure);
        $current_structure->structure = $this->show_current_section()->structures->count() -1; 
        session()->put("online_test.current_structure",$current_structure);
    }else{
      if($current_structure->test_section > 0 ){
        $current_structure->test_section --;
        session()->put("online_test.current_structure",$current_structure);
        $current_structure->section = $this->show_current_test_section()->sections->count() -1;
        session()->put("online_test.current_structure",$current_structure);
        $current_structure->structure = $this->show_current_section()->structures->count() -1; 
        session()->put("online_test.current_structure",$current_structure);

    }
}
}
}
public function show_current_structure(){

    $current_structure = $this->current_structure;

    if($this->test_structure[$current_structure->test_section]->sections->count() != 0){
        if($this->test_structure[$current_structure->test_section]->sections[$current_structure->section]->structures->count() != 0){

            return $this->test_structure[$current_structure->test_section]->sections[$current_structure->section]->structures[$current_structure->structure];        
        }else{
            return false;
        }
    }else{
        return false;
    }

}
public function show_current_section(){
    $current_structure = $this->current_structure;
    return $this->test_structure[$current_structure->test_section]->sections[$current_structure->section];
}
public function show_current_test_section(){
    $current_structure = $this->current_structure;
    if($this->test_structure && $this->test_structure != null){
        return $this->test_structure[$current_structure->test_section];
    }else{
        return false;
    }
}
public function test(){
    if(!$this->show_current_test_section()){
        abort(403);
    }

     $current_test = OtCurrentTest::where('ot_current_tests.id',$this->current_test_id)->first();

     if($current_test->answers != ""){
        abort(403,"Test Finished !");
     }


    if(!$this->section_timeout && !($this->show_current_test_section()->test_id == 1 && $this->show_current_test_section()->section_type_id == 1)){

        $start_section_time = Carbon::now()->timestamp;
        $duration = $this->show_current_test_section()->duration;
        $section_timeout = $start_section_time + $duration;

        session()->put("online_test.current_section",$this->show_current_section()->id);
        session()->put("online_test.start_section_time",$start_section_time);
        session()->put("online_test.section_timeout",$section_timeout);

    }
    $current_structure = $this->current_structure;
    $structure = $this->show_current_structure();
    if($structure){
        $section = $this->show_current_section();
        $test_section = $this->show_current_test_section();
        $return = collect($test_section)->except('sections')->merge(['section' => collect($section)->except('structures')->merge(['structure' => $structure])]);
        $section_duration = $test_section->duration;

        session()->put('online_test.section_duration',$section_duration);
        $structure_list = OtSection::select('id','name')->where('test_section_id',$test_section->id)->where('type','!=','introduction')->with('structures')->get();


        return view('online-test.test',['test_section' => $return,'current_structure' => $current_structure,'structure_list' => $structure_list,'section_timeout' => session("online_test.section_timeout"),'section_duration' => $this->section_duration,'current_structure' => $structure->id,'current_index' => $this->current_structure->structure,'current_section_index' => $this->current_structure->section]);
    }else{
        $request = new Request();
        $this->next_question($request);
        return $this->test();
    }
}

public function start_section_test(Request $request){
    $start_section_time = Carbon::now()->timestamp;
    $duration = $this->show_current_test_section()->duration;
    $section_timeout = $start_section_time + $duration;

    session()->put("online_test.current_section",$this->show_current_section()->id);
    session()->put("online_test.start_section_time",$start_section_time);
    session()->put("online_test.section_timeout",$section_timeout);
    $this->add_current_structure($test_section = 0,$section = 0,$structure = 1);   
    session()->put("online_test.current_structure",$this->current_structure);
    $structure = $this->show_current_structure();
    $section = $this->show_current_section();
    $test_section = $this->show_current_test_section();
    $structure_list = OtSection::select('id','name')->where('test_section_id',$test_section->id)->where('type','!=','introduction')->with('structures')->get();
    $return = collect($test_section)->except('sections')->merge(['section' => collect($section)->except('structures')->merge(['structure' => $structure]),'start_section_time' => $start_section_time,'section_timeout' => $section_timeout,'structure_list' => $structure_list,'current_structure' => $structure->id,'current_index' => $this->current_structure->structure]);

    return $return->toJson();
}
public function section_timeout(){
 if($this->add_current_structure($test_section = 1,$section = 0,$structure = 0)){
  $start_section_time = Carbon::now()->timestamp;
  $duration = $this->show_current_test_section()->duration;
  $section_timeout = $start_section_time + $duration;

  session()->put("online_test.current_section",$this->show_current_section()->id);
  session()->put("online_test.start_section_time",$start_section_time);
  session()->put("online_test.section_timeout",$section_timeout);
  $structure = $this->show_current_structure();
  $section = $this->show_current_section();
  $test_section = $this->show_current_test_section();
  $structure_list = OtSection::select('id','name')->where('test_section_id',$test_section->id)->where('type','!=','introduction')->with('structures:id,section_id,number')->get();
  $return = collect($test_section)->except('sections')->merge(['section' => collect($section)->except('structures')->merge(['structure' => $structure]),'start_section_time' => $start_section_time,'section_timeout' => $section_timeout,'structure_list' => $structure_list,'current_structure' => $structure->id,'current_index' => $this->current_structure->structure]);
  return $return->toJson();
}else{
    return "finish";
}
}

public function next_question(Request $request){
    if($request->question_type == "single"){
        $answer_id = "";
        $answers = "";
        if($request->answers != ""){
            if($this->show_current_structure()->option_type != "essay"){
                if($this->show_current_structure()->option_type == "record-audio"){

                  $path = 'new-online-test/'.date("Y").'/'.date("m").'/'.date("d").'/'.$this->current_test_id.'/audio/';
                  if($request->answers != ""){
                    //$request->answers->move('public/'.$path,time().'.mp3');

                    $audio_path = $path.time().'.mp3';
                }else{
                    $audio_path = "";
                }    
                $this->show_current_structure()->answers = $audio_path;

                session()->put("online_test.current_structure",$this->test_structure);
            }else{
                $this->show_current_structure()->answer_id = $request->answers;
                session()->put("online_test.current_structure",$this->test_structure);
            }
        }else{
                //$answers = htmlspecialchars($request->answers);


            $this->show_current_structure()->answers = htmlspecialchars($request->answers);
            session()->put("online_test.current_structure",$this->test_structure);
        }

    }

}else if($request->question_type == "multiple"){

    $answers = collect(json_decode($request->answers))->toArray();

    foreach($this->show_current_structure()->questions as $key => $questions){

        if($questions->id == $answers[$key]->question_id){
            $questions->answer = strtoupper($answers[$key]->answers);
        }
    }
    session()->put("online_test.test_structure",$this->test_structure);

}

$previous_test_section = $this->show_current_test_section()->id;

if($this->add_current_structure($test_section = 0,$section = 0,$structure = 1)){

    $current_test_section = $this->show_current_test_section()->id;

    session()->put("online_test.current_structure",$this->current_structure);
    $structure = $this->show_current_structure();
    if($structure){
        $current_structure = $structure->id;

        $section = $this->show_current_section();
        $test_section = $this->show_current_test_section();
        $structure_list = OtSection::select('id','name')->where('test_section_id',$test_section->id)->where('type','!=','introduction')->with('structures')->get();

        $return = collect($test_section)->except('sections')->merge(['section' => collect($section)->except('structures')->merge(['structure' => $structure]),'structure_list' => $structure_list,'current_structure' => $current_structure,'current_index' =>  $this->current_structure->structure,'current_section_index' => $this->current_structure->section]);

        if(($previous_test_section != $current_test_section) && ($this->show_current_section()->type != "introduction")){


          $start_section_time = Carbon::now()->timestamp;
          $duration = $this->show_current_test_section()->duration;
          $section_timeout = $start_section_time + $duration;

          $return->put('current_index',$this->current_structure->structure);

          session()->put("online_test.current_section",$this->show_current_section()->id);

          if($this->show_current_test_section()->duration > 0 && $this->show_current_test_section()->duration != "" ){
            session()->put("online_test.start_section_time",$start_section_time);
            session()->put("online_test.section_timeout",$section_timeout);

            $return->put('section_timeout',$section_timeout);
            $return->put('start_section_time', $start_section_time);
        }else{

        }

    }
    

 $json_file_data = json_encode($this->test_structure,JSON_PRETTY_PRINT);
    Storage::disk('public')->put('new-online-test/'.date("Y/m/d",$this->start_time).'/'.$this->current_test_id.'/current-test-data.json',$json_file_data);
    return json_encode($return);





}else{
    return $this->next_question($request);
}
}else{
    return "finish";
}
        //no 27 & 28 audio sama
}

public function prev_question(Request $request){
 if($request->question_type == "single"){
    if($request->answers != ""){
        if($this->show_current_structure()->option_type != "essay"){
           if($this->show_current_structure()->option_type == "record-audio"){
              $path = 'new-online-test/'.date("Y").'/'.date("m").'/'.date("d").'/'.$this->current_test_id.'/audio/';
              if($request->answers != ""){
                $request->answers->move('public/'.$path,time().'.mp3');
                $audio_path = $path.time().'.mp3';
            }else{
                $audio_path = "";
            }    
            $this->show_current_structure()->answers = $audio_path;
            session()->put("online_test.current_structure",$this->test_structure);
        }else{
            $this->show_current_structure()->answer_id = $request->answers;
            session()->put("online_test.current_structure",$this->test_structure);
        }
    }else{
        $this->show_current_structure()->answers = nl2br(htmlspecialchars($request->answers));
        session()->put("online_test.current_structure",$this->test_structure);
    }
}

}else if($request->question_type == "multiple"){
   $answers = collect(json_decode($request->answers))->toArray();
   foreach($this->show_current_structure()->questions as $key => $questions){
    if($questions->id == $answers[$key]->question_id){
        $questions->answer = strtoupper($answers[$key]->answers);

    }
}
session()->put("online_test.test_structure",$this->test_structure);

}


$this->minus_current_structure($test_section = 0,$section = 0,$structure = 1);
if($this->show_current_structure()->question_type == "instruction"){
   $this->minus_current_structure($test_section = 0,$section = 0,$structure = 1);
}
session()->put("online_test.current_structure",$this->current_structure);
$structure = $this->show_current_structure();
$section = $this->show_current_section();
$test_section = $this->show_current_test_section();
$structure_list = OtSection::select('id','name')->where('test_section_id',$test_section->id)->where('type','!=','introduction')->with('structures')->get();

$return = collect($test_section)->except('sections')->merge(['section' => collect($section)->except('structures')->merge(['structure' => $structure]),'structure_list' => $structure_list,'current_structure' => $structure->id,'current_index' =>  $this->current_structure->structure,'current_section_index' => $this->current_structure->section]);

$json_file_data = json_encode($this->test_structure,JSON_PRETTY_PRINT);
Storage::disk('public')->put('new-online-test/'.date("Y/m/d",$this->start_time).'/'.$this->current_test_id.'/current-test-data.json',$json_file_data);
return json_encode($return);
}

public function last_question(Request $request){
    $question_num = $request->question_num;
    $answer = $request->answers;
    $answer_type = $request->answer_type;
    $question_id = $request->question_id;
    $current_test_qna = OtCurrentTestQna::where('current_test_id',$this->current_test_id)->where('question_id',$question_id);

    if($current_test_qna->first() !== null){
        if($answer_type == "options"){
            $current_test_qna->update(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => $answer,'answer' => null]);
        }else{
            $current_test_qna->update(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => null , 'answer' => $answer]);
        }
    }else{
        $current_test_answer = new OtCurrentTestQna;
        if($answer_type == "options"){
            $current_test_answer::create(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => $answer, 'answer' => null]);
        }else{
            $current_test_answer::create(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => null, 'answer' => $answer]);
        }
    }

    return $current_test_qna->first()->toJson();
}
public function old_next_question(Request $request){


    $question_num = $request->question_num;
    $answer = $request->answers;
    $answer_type = $request->answer_type;
    $question_id = $request->question_id;
    $answer_text = "";
    $answer_id = "";
    $current_test_qna = OtCurrentTestQna::where('current_test_id',$this->current_test_id)->where('question_id',$question_id);
    if($current_test_qna->first() !== null){
        if($answer_type == "options"){
            $current_test_qna->update(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => $answer,'answer' => null]);
        }else{
            $current_test_qna->update(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => null , 'answer' => $answer]);
        }
    }else{
        $current_test_answer = new OtCurrentTestQna;
        if($answer_type == "options"){
            $current_test_answer::create(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => $answer, 'answer' => null]);
        }else{
            $current_test_answer::create(['current_test_id' => $this->current_test_id,'num' => $question_num,'question_id' => $question_id, 'answer_id' => null, 'answer' => $answer]);
        }
    }
    $question_num ++;
    session()->put('online_test.question_num',$question_num);
    $shuffledQuestions = collect($this->shuffledQuestions->slice($question_num - 1,1)->first());

    $shuffledQuestions->put('question_num',$question_num);
    if($shuffledQuestions->first() !== null){
        $next_question_id = $shuffledQuestions->get('id');
        session()->put('online_test.current_question_id',$next_question_id);
        $next_test_qna = OtCurrentTestQna::where('current_test_id',$this->current_test_id)->where('question_id',$next_question_id);
        if($next_test_qna->first() !== null){
            $answer_text =  $next_test_qna->first()->answer;
            $answer_id =  $next_test_qna->first()->answer_id;
        }
    }

    $shuffledQuestions->put('current_answer_text',$answer_text);
    $shuffledQuestions->put('current_answer_id',$answer_id);
    return $shuffledQuestions->toJson();

}
public function old_prev_question(Request $request){
    $question_num = $request->question_num;
    $answer = $request->answer;
    $answer_text = "";
    $answer_id = "";
    $question_num--;

    session()->put('online_test.question_num',$question_num);
    $shuffledQuestions = collect($this->shuffledQuestions->slice($question_num - 1,1)->first());
    $shuffledQuestions->put('question_num',$question_num);
    $question_id = $shuffledQuestions->get('id');
    session()->put('online_test.current_question_id',$question_id);
    $current_test_qna = OtCurrentTestQna::where('current_test_id',$this->current_test_id)->where('question_id',$question_id);
    if($current_test_qna->first() !== null){
        $answer_text =  $current_test_qna->first()->answer;
        $answer_id =  $current_test_qna->first()->answer_id;
    }

    $shuffledQuestions->put('current_answer_text',$answer_text);
    $shuffledQuestions->put('current_answer_id',$answer_id);
    return $shuffledQuestions->toJson();
}
public function select_question(Request $request){
    $num = $request->num;
    $answer_text = "";
    $answer_id = "";
    session()->put('online_test.question_num',$num);
    $shuffledQuestions = collect($this->shuffledQuestions->slice($num - 1,1)->first());
    $shuffledQuestions->put('question_num',$num);
    $question_id = $shuffledQuestions->get('id');
    session()->put('online_test.current_question_id',$question_id);
    $current_test_qna = OtCurrentTestQna::where('current_test_id',$this->current_test_id)->where('question_id',$question_id);
    if($current_test_qna->first() !== null){
        $answer_text =  $current_test_qna->first()->answer;
        $answer_id =  $current_test_qna->first()->answer_id;
    }

    $shuffledQuestions->put('current_answer_text',$answer_text);
    $shuffledQuestions->put('current_answer_id',$answer_id);
    return $shuffledQuestions->toJson();
}
public function finish_test(){

    $count = 0;
    $correct_answer = collect(['test_id' => $this->test_structure[0]->test_id,'module_id' => $this->test_structure[0]->module_id,'package_id' => $this->test_structure[0]->package_id,'test_section_id' => $this->test_structure[0]->id]);
    $temp_correct_answer = collect();
    $nilai = collect();
    $total_score = 0;
    $count_question = 0;
    $current_test_id = $this->current_test_id;
    $current_test = OtCurrentTest::selectRaw('ot_current_tests.*,ot_registrations.NAMA,ot_registrations.KOTA_KELAHIRAN,ot_registrations.TGL_LAHIR,ot_registrations.REF_KTP,ot_registrations.ALAMAT,ot_registrations.EMAIL,ot_registrations.KONTAK,ot_registrations.ALASAN,ot_registrations.reseller_id')->leftJoin('ot_registrations','ot_registrations.id','ot_current_tests.registration_id')->where('ot_current_tests.id',$current_test_id)->first();

    $nama = $current_test->nama;
    $myAnswer = collect();
    $test_name = OtTest::where('id',$this->test_id)->value('name');
    foreach($this->test_structure as $keyTestSection => $test_section){ 
        foreach($test_section->sections->where('type','!=','introduction') as $keySection => $section){
            foreach($section->structures as $keyStructure => $structure){

                $count_question += $structure->questions->count();


                foreach($structure->questions as $keyQuestion => $question){
                    if($test_section->test_id == "2"){
                      if($structure->answer_id != "" && $question->id != ""){ 
                        $check_answer = OtTestAnswer::where('question_id',$question->id)->where('option_answer_id',$structure->answer_id)->count();
                        if($check_answer){
                            $count ++ ;

                        }


                    }
                    $answers = "";

                    
                }else{
                    if($structure->option_type != "essay"){

                        $multiple_answer = OtTestAnswer::where('question_id',$question->id)->first();
                        if($multiple_answer != ""){
                            $multiple_answer = $multiple_answer->answers;
                        }
                        $multiple_answer_arr = explode('|',$multiple_answer);
                        foreach($multiple_answer_arr as $answer){  
                            if($question->answer == $answer){
                                $count++;
                            }
                            $answers = $question->answer;
                        }
                    }else{
                        $answers = $structure->answers;

                    }

                }

                $myAnswer->push(['current_test_id'=> $current_test_id,'test_id' => $test_section->test_id,'module_id' => $test_section->module_id,'package_id' => $test_section->package_id,'test_section_id' => $test_section->id,'section_id' => $section->id,'question_id' => $question->id,'answer_id' => $structure->answer_id,'answers' => $answers,'option_type' => $question->option_type]);
            }

        }
    }
    if($test_section->test_id == "1"){
       // SELECT * FROM ot_score_conversion_tables WHERE (CASE WHEN  (score > 30) AND (section_type_id = 1) THEN score > 30 ELSE  score > 40 AND score <  50  END)  
        $score = OtScoreConversionTable::where('test_id',$test_section->test_id)->where('module_id',$test_section->module_id)->where('section_type_id',$test_section->section_type_id)->whereRaw('
            (CASE WHEN start_correct IS NOT NULL AND end_correct IS NOT NULL THEN '.$count.' between start_correct AND end_correct WHEN start_correct IS NOT NULL AND end_correct IS NULL THEN start_correct = '.$count.' ELSE id = "" END)')->value('score');  
        if(!$score){
            $score = 2;
        }
        $temp_correct_answer->push(['name' => $test_section->section_type_name,'correct_answer' => $count,'total_questions' => $count_question,'score' => $score]); 
        $total_score += $score;
        $count = 0;
        $count_question = 0;  
    }elseif($test_section->test_id == "2"){
        $score = OtScoreConversionTable::where('test_id', $test_section->test_id)->where('correct_answer',$count)->where('section_type_id',$test_section->section_type_id)->value('score');
        $temp_correct_answer->push(['name' => $test_section->section_type_name,'correct_answer' => $count,'total_questions' => $count_question,'score' => $score]);       
        $total_score += $score;
        $count = 0;
        $count_question = 0;  
        
    }else{
        $temp_correct_answer->push(['name' => $test_section->section_type_name,'correct_answer' => $count,'total_questions' => $count_question,'score' => $count]);
        $total_score += $count;
        $count = 0;
        $count_question = 0;
    }
}   


$correct_answer->put('email_to',"");
$correct_answer->put('score_result',$temp_correct_answer);
$correct_answer->put('total_score',$total_score);

$score = array();
$score['results'] = $temp_correct_answer;
$score['total_score'] = $total_score;
if($test_section->test_id == "2"){
   $final_score = round($total_score*10/3,0);
}else if($test_section->test_id == "1"){
    if( fmod($result['total_score'],0.5 ) == 0){
        $final_score = number_format(($result['total_score'] - 2)/2,1);
    }else{
        $final_score = number_format(round(($result['total_score'] - 2)/2,0),1);
    }
}else{
    $final_score = $total_score;
}
$score['final_score'] = $final_score;

$insertMyAnswer = $current_test->update(['answers' => $myAnswer->toJson()]);
//$insertMyAnswer = OtCurrentAnswer::insert($myAnswer->toArray());

$current_test->score = json_encode($score);
$current_test->final_score = $final_score;
$current_test->save();
session()->put('test-result',$correct_answer);
if($current_test->reseller_id != ""){
    $email_reseller = Reseller::find($current_test->reseller_id)->value('email');
    $email_to = array();
    array_push($email_to,$email_reseller);
    $correct_answer->put('email_to',$email_to);
}
Mail::send(new OnlineTestResultMail($correct_answer,$current_test_id,$current_test,$test_name));
Mail::send(new OnlineTestResultMail($correct_answer,$current_test_id,$current_test,$test_name,true));
return redirect()->route('student-test-results');
    //session()->forget('online_test');  
    //session()->forget('test_id');
   //  return view('online-test.test-finished',['result'=>$correct_answer]);
}
public function test_result(){
    $result = session()->get('test-result');
    return view('online-test.test-finished',['result'=>$result]);
}

public function check_answer(){

    $current_test_id = $this->current_test_id;
    $test_id = $this->test_id;
    $module_id = $this->module_id;
    $package_id = $this->package_id;
    $skills = $this->skills;
    $testAnswer = OtTestSection::selectRaw('ot_test_sections.*,ot_section_types.name as section_type_name')->where('ot_test_sections.test_id',$this->test_id)->where('ot_test_sections.module_id',$this->module_id)->where('ot_test_sections.package_id',$this->package_id)->orderBy('id','ASC')->join('ot_section_types','ot_test_sections.section_type_id','=','ot_section_types.id')->with(['sections' => function($query){
        $query->where('ot_sections.type','=','question')->with('structures.questions.answers');
    }]);
    if($skills != ""){
        $testAnswer = $testAnswer->whereIn('section_type_id',$skills);
    }
    $testAnswer = $testAnswer->get();
    $current_test = OtCurrentTest::find($current_test_id);

    $myAnswer = collect(json_decode($current_test->answers));

    return view('online-test.check-answer',['myAnswer' => $myAnswer,'answer_structure' => $testAnswer,'test_id' => $test_id]);
}

public function old_check_answer(){
    $current_test_id = $this->current_test_id;
    $test_id = $this->test_id;
    //$testAnswer = OtTestSection::selectRaw('ot_test_sections.*,ot_section_types.name as section_type_name')->where('ot_test_sections.test_id',$this->test_id)->where('ot_test_sections.module_id',$this->module_id)->where('ot_test_sections.package_id',$this->package_id)->orderBy('id','ASC')->join('ot_section_types','ot_test_sections.section_type_id','=','ot_section_types.id')->with('sections.structures.questions.options')->with('sections.structures.questions.answers')->get();
    $testAnswer = OtTestAnswer::selectRaw('ot_test_answers.*,ot_test_sections.section_type_id,ot_section_types.name as section_type_name')->where('ot_test_answers.test_id',$this->test_id)->where('ot_test_answers.module_id',$this->module_id)->where('ot_test_answers.package_id',$this->package_id)->join('ot_test_structures','ot_test_answers.test_structure_id','=','ot_test_structures.id')->join('ot_test_sections','ot_test_answers.test_section_id','ot_test_sections.id')->join('ot_section_types','ot_test_sections.section_type_id','=','ot_section_types.id')->with('questions.options')->with('structures')->orderBy('test_section_id')->orderBy('test_structure_id')->get();
//    $myAnswer = OtCurrentAnswer::where('current_test_id',$current_test_id)->get();
    $current_test = OtCurrentTest::find($current_test_id);

    $myAnswer = collect(json_decode($current_test->answers));
    //dd($myAnswer);
    return view('online-test.check-answer2',['myAnswer' => $myAnswer,'answers' => $testAnswer,'test_id' => $test_id]);
}
}
