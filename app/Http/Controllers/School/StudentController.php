<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use App\Country;
use App\School;
use App\SchoolProgram;
use App\Sales;
use App\Models\Student\PersonalInformation;
use App\Models\Student\BankAccountDetail;
use App\Models\Student\EnglishQualification;
use App\Models\Student\VisaHistory;
use App\Models\Student\InsuranceProvider;
use App\Models\Student\SchoolApplication;
use App\Models\Student\PaymentSchedule;
use App\Models\Student\CourseDetail;
use App\Models\Student\StudentProblemQna;
use App\Models\Student\PassportHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Jobs\StudentPaymentSchedule as PaymentScheduleJobs;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    protected $dashboard = 'sekolah';
    public function index(Request $request)
    {

     $students = Student::selectRaw('students.*,visa_countries.name as visa_country_name,dest_countries.name dest_country_name')->leftJoin('student_personal_informations','students.id','student_personal_informations.student_id')->leftJoin('countries as visa_countries','student_personal_informations.visa_country','visa_countries.id')->leftJoin('countries as dest_countries','students.country','dest_countries.id')->orderBy('id','Desc')->whereNull('deleted_at')->groupBy('students.id','students.client_id','students.marketing_id','students.visa_status','students.country','students.status','students.name','students.email','students.email_verified_at','students.password','students.remember_token','students.created_at','students.updated_at','students.deleted_at','visa_countries.name','dest_countries.name','students.user_id');
     if($request->status != ""){

       if($request->status == "active"){
        $students = $students->where('students.status',1);
      }else{
       $students = $students->where('students.status',0)->orWhere('students.status',null);
     }

   }

   if($request->visa_status != ""){
    if($request->visa_status == "not-approved"){
      $students = $students->where('students.visa_status','!=','Approved')->Where('students.visa_status','!=','Cancelled');
    }else{
      $students = $students->where('students.visa_status',$request->visa_status);
    }
  }
  $students = $students->get();
  $countries = Country::orderBy('name','ASC')->get();
  $schools = School::orderBy('name','ASC')->get();
  $course_detail_programs = SchoolProgram::selectRaw('school_programs.*,schools.name as school_name')->join('student_school_applications','student_school_applications.program_id','school_programs.id')->join('schools','schools.id','school_programs.school_id')->orderBy('schools.name','ASC')->orderBy('school_programs.name','ASC')->get();
  return view('sekolah.admin.student-informations.students.index',['students' => $students,'dashboard' => $this->dashboard,'countries' => $countries,'schools' => $schools,'course_detail_programs' => $course_detail_programs]);

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $marketings = Sales::get();
      $countries = Country::orderBy('name','ASC')->get();
      return view('sekolah.admin.student-informations.students.create',['marketings' => $marketings,'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cek_client_id = Student::where('client_id',$request->client_id)->first();
      
      if(!$cek_client_id){
        //if($request->password != $request->confirm_password) {
        //  return redirect()->route('school-students.index')->withStatus('Wrong Password !');
        //}else{
         // $request->merge(['password' => Hash::make($request->password)]);

        Student::create($request->all());
        return redirect()->route('school-students.index')->withStatus('Student Successfully Created !');
        //}

      }else{
       return redirect()->route('school-students.index')->withStatus('Duplicated Client Id !');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      $countries = Country::orderBy('name','ASC')->get();
      $marketings = Sales::orderBy('KD','ASC')->get();
      return view('sekolah.admin.student-informations.students.edit',['student' => $student,'marketings' => $marketings,'countries' => $countries]);
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
      $student = Student::find($id);
     // $old_password = $student->password;

      //if (Hash::check($request->old_password, $old_password)) {
      //  $request->merge(['password' => Hash::make($request->new_password)]);
      $update_student = $student->update($request->all());
      return redirect()->route('school-students.index')->withStatus('Student Successfully Updated !');
      //}else{
      //  return redirect()->route('school-students.index')->withStatus('Wrong Password !');
      //}
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete = Student::find($id)->delete();
      //$delete = Student::find($id)->onlyTrashed();
      return redirect()->route('school-students.index')->withStatus('Student Successfully Deleted !');
    }


    public function personal_information_ajax(PersonalInformation $model,Request $request){

      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $personal_informations = $model::selectRaw('student_personal_informations.*,visa_countries.name as visa_country_name,home_countries.name as homecountry_country_name,current_countries.name as current_country_name')->leftJoin('countries as visa_countries','visa_countries.id','student_personal_informations.visa_country')->leftJoin('countries as home_countries','home_countries.id','student_personal_informations.homecountry_country')->leftJoin('countries as current_countries','current_countries.id','student_personal_informations.current_country')->where('student_id',$request->student_id)->get();
      return view("sekolah.admin.student-informations.students.personal-informations-ajax",["personal_informations" => $personal_informations]);
    }

    
    public function english_qualification_ajax(EnglishQualification $model,Request $request){
      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $english_qualifications = $model::where('student_id',$request->student_id)->get();
      return view("sekolah.admin.student-informations.students.english-qualification-ajax",["english_qualifications" => $english_qualifications]);
    }

    public function bank_account_details_ajax(BankAccountDetail $model, Request $request){

      if($request->cmd == "add"){
        $model->create($request->all());
      }else if($request->cmd == "update"){
        $model->find($request->id)->update($request->all());
      }else if($request->cmd == "delete"){
        $model->find($request->id)->delete();
      }
      $bank_account_details = $model::where('student_id',$request->student_id)->get();
      return view("sekolah.admin.student-informations.students.bank-account-details-ajax",["bank_account_details" => $bank_account_details]);
    }

    public function visa_history_ajax(VisaHistory $model, Request $request){
     if($request->cmd == "add"){
      $model->create($request->all());
    }else if($request->cmd == "update"){
      $model->find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
      $model->find($request->id)->delete();
    }
    $visa_histories = $model::selectRaw('student_visa_histories.*,countries.name as country_name')->where('student_id',$request->student_id)->leftJoin('countries','countries.id','student_visa_histories.country')->get();
    return view("sekolah.admin.student-informations.students.visa-histories-ajax",["visa_histories" => $visa_histories]);
  }


  public function sai_schools_ajax(Request $request){
    $country_id = $request->country_id;
    $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','countries.id','schools.country_id')->join('regions','regions.id','schools.region_id')->join('cities','cities.id','schools.city_id')->where('schools.country_id',$country_id)->orderBy('schools.name','ASC')->get();
    return $schools->toJson();
  }

  public function sai_programs_ajax(Request $request){
    $programs = SchoolProgram::where('school_id',$request->school_id)->orderBy('name','ASC')->get();
    return $programs->toJson();
  }
  public function cd_programs_ajax(Request $request){
    $programs = SchoolApplication::selectRaw('student_school_applications.program_id as id,school_programs.name')->where('student_id',$request->student_id)->join('school_programs','school_programs.id','student_school_applications.program_id')->get();
    return $programs->toJson();
  }

  public function school_application_informations_ajax(SchoolApplication $model, Request $request){
    if($request->cmd == "add"){
      $model->create($request->all());
    }else if($request->cmd == "update"){
      $model->find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
      $model->find($request->id)->delete();
    }
    $school_applications = $model::selectRaw('schools.name as school_name,school_programs.name as program_name,countries.name as school_country,schools.country_id as school_countries,student_school_applications.*')->join('schools','schools.id','student_school_applications.school_id')->join('school_programs','school_programs.id','student_school_applications.program_id')->join('countries','countries.id','schools.country_id')->where('student_id',$request->student_id)->get();
    return view("sekolah.admin.student-informations.students.school-applications-ajax",["school_applications" => $school_applications]);
  }
  public function course_detail_ajax(CourseDetail $model, Request $request){

       // dd($request->all());
    if($request->program_id != ""){
      $school_id = SchoolProgram::find($request->program_id)->school_id;
      $request->merge(['school_id' => $school_id]);

    }
    if($request->cmd == "add"){
      $model->create($request->all());
    }else if($request->cmd == "update"){
      $model->find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
      $model->find($request->id)->delete();
    }
    $course_details = $model::selectRaw('student_course_details.*,school_programs.name as program_name,school_programs.duration as program_duration,school_programs.fee as tuition_fee,schools.name as school_name,schools.id as school_id')->join('school_programs','school_programs.id','student_course_details.program_id')->join('schools','schools.id','school_programs.school_id')->where('student_id',$request->student_id)->get();

    return view("sekolah.admin.student-informations.students.course-details-ajax",["course_details" => $course_details]);
  }

  public function payment_schedule_ajax(PaymentSchedule $model,Request $request){
    if($request->program_id != ""){
      $school_id = SchoolProgram::find($request->program_id)->school_id;
      $request->merge(['school_id' => $school_id]);


      $course_detail_id = CourseDetail::where('student_id',$request->student_id)->where('program_id',$request->program_id)->where('school_id',$school_id)->value('id');
      $request->merge(['course_detail_id' => $course_detail_id]);
    }
    if($request->cmd == "add"){
      $name = Student::find($request->student_id)->name;
      $schools_data = SchoolProgram::selectRaw('schools.name,countries.currency_code')->join('schools','school_programs.school_id','schools.id')->join('countries','schools.country_id','countries.id')->find($request->program_id);
      $school_name = $schools_data->name;
      $currency_code = $schools_data->currency_code;
      $request->merge(['name' => $name]);
      $request->merge(['school_name' => $school_name]);
      $request->merge(['currency_code' => $currency_code]);
     
      $model->create($request->all());
    }else if($request->cmd == "update"){
      $model->find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
      $model->find($request->id)->delete();
    }
    $payment_schedules = $model::selectRaw('student_payment_schedules.*,school_programs.name as program_name,schools.name as school_name')->join('school_programs','school_programs.id','student_payment_schedules.program_id')->join('schools','schools.id','student_payment_schedules.school_id')->orderBy('schools.name','ASC')->orderBy('school_programs.name','ASC')->where('student_id',$request->student_id)->get();

    return view("sekolah.admin.student-informations.students.payment-schedules-ajax",["payment_schedules" => $payment_schedules]);
  }


public function insurance_provider_ajax(InsuranceProvider $model,Request $request){
 if($request->cmd == "add"){
  $model->create($request->all());
}else if($request->cmd == "update"){
  $model->find($request->id)->update($request->all());
}else if($request->cmd == "delete"){
  $model->find($request->id)->delete();
}
$insurance_providers = $model::where('student_id',$request->student_id)->get();
return view("sekolah.admin.student-informations.students.insurance-providers-ajax",["insurance_providers" => $insurance_providers]);
}

public function question_answers_ajax(StudentProblemQna $model,Request $request){
  $solution = preg_replace( "/\r|\n/", "", nl2br($request->solution));
  $progress = preg_replace( "/\r|\n/", "", nl2br($request->progress));
  $request->merge(['solution' => $solution]);
  $request->merge(['progress' => $progress]);
  if($request->cmd == "add"){
    $model->create($request->all());
  }else if($request->cmd == "update"){
    $model->find($request->id)->update($request->all());
  }else if($request->cmd == "delete"){
    $model->find($request->id)->delete();
  }
  $question_answers = $model::where('student_id',$request->student_id)->get();
  return view("sekolah.admin.student-informations.students.question-answers-ajax",["question_answers" => $question_answers]);
}

public function passport_history_ajax(PassportHistory $model,Request $request){

 if($request->cmd == "add"){
  $model->create($request->all());
}else if($request->cmd == "update"){
  $model->find($request->id)->update($request->all());
}else if($request->cmd == "delete"){
  $model->find($request->id)->delete();
}
$passport_histories = $model::where('student_id',$request->student_id)->get();
return view("sekolah.admin.student-informations.students.passport-history-ajax",["passport_histories" => $passport_histories]);
}

public function search_students(){
  $countries = Country::get();
  $students = Student::paginate(5);
  return view("sekolah.admin.student-informations.students.search-student",["countries" => $countries,"students" => $students]);
}

public function approve_student_ajax(Request $request){


  $student = Student::find($request->id);

  if($student->client_id == "-"){
    if($student->country != ""){
      $country = Country::find($student->country);
      $student_number = Student::where('country',$country->id)->where('client_id','!=','-')->get();
      $student_number = count($student_number) + 1;
      $numbering = str_pad($student_number,5,'0',STR_PAD_LEFT);
      $client_id = "BP-".$numbering.'/'.$country->cca3;
      $request->merge(['client_id' => $client_id]);
      $request->merge(['status' => 1]);
      $request->merge(['visa_status' => 'Approved']);
    }
  }
  $update_student =$student->update($request->all());
  return $student->toJson();
}
public function change_student_status_ajax(Request $request){


  $student = Student::find($request->id);

  if($request->status == "true"){
    $request->merge(['status' => 1]);
  }else{
    $request->merge(['status' => 0]);
  }
  $update_student =$student->update($request->all());
  return $request->status;
}

}
