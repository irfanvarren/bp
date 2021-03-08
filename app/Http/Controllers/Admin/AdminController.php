<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\RegisIeltsOfficial;
use App\Form\IeltsSimulationModel;
use App\ContactUs;
use App\Form\RegisPaket;
use App\Form\RegisPaketDtl;
use App\Business;
use App\Language;
use App\Level;
use App\CoursePacket;
use App\CoursePacketGroup;
use App\CoursePacketSetting;
use App\PacketPriceDetails;
use App\CourseLevelSetting;

use App\Models\OnlineTest\OtTest;
use App\Category;
use App\Student;
use App\Enquiry;
use App\EnquiryDetail;
use App\Models\OnlineTest\OtRegistration;
use App\Mail\EnquiryResponseMail;
use App\CompanyStructure;
use App\PacketModule;
use App\Events;
use App\Perusahaan;

use DataTables;
use DB;
use App\DemoPendaftaranMahasiswa;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Models\OnlineTest\OtPackage;
use App\Models\OnlineTest\OtCurrentTest;
use App\Models\OnlineTest\OtSectionType;
use Illuminate\Support\Facades\Mail;
use App\Mail\OnlineTestLink;
use App\FisherYatesShuffle;
use App\ProductPriceList;
use Carbon\Carbon;  
use Illuminate\Support\Str;

use App\Models\Admin\FormBuilder\Form;
use App\Models\Admin\FormBuilder\FormCategory;
use App\Models\Admin\FormBuilder\FormContent;
use App\Models\Admin\FormBuilder\FormDescription;
use App\Models\Admin\FormBuilder\FormQuestion;
use App\Models\Admin\FormBuilder\FormOption;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  public function registration_data(){

    $course = CoursePacket::get();
    $pricelists = ProductPriceList::where('status',1)->get();
    return view('admin.registration',['course' => $course,'pricelists' => $pricelists]);
  }
  public function registration_ajax(Request $request){
  $regisData = RegisPaket::selectRaw('tb_calonsiswa.KD,tb_calonsiswa_dtlpaket.REF_PRICELIST,tb_perusahaan.NAMA as NAMA_PERUSAHAAN,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,tb_calonsiswa.NAMA,tb_calonsiswa.EMAIL,tb_calonsiswa.KONTAK,tb_calonsiswa.REF_KTP,tb_calonsiswa.PATH_KTP,tb_calonsiswa.created_at')->leftJoin('tb_perusahaan','tb_perusahaan.KD','tb_calonsiswa.REF_PERUSAHAAN')->leftJoin('tb_calonsiswa_dtlpaket','tb_calonsiswa.KD','tb_calonsiswa_dtlpaket.KD')->leftJoin('tb_paket_bimbel','tb_calonsiswa_dtlpaket.REF_PAKET','tb_paket_bimbel.KD')->leftJoin('tb_level','tb_level.KD','tb_calonsiswa_dtlpaket.REF_LEVEL')->leftJoin('tb_kategori','tb_kategori.KD','tb_calonsiswa_dtlpaket.REF_KATEGORI')->get();
  return DataTables::of($regisData)->make();
}

public function detail_registration($kd){
  $regisData = RegisPaket::selectRaw('tb_calonsiswa.*,tb_calonsiswa_dtlpaket.*,tb_perusahaan.NAMA as NAMA_PERUSAHAAN,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI')->leftJoin('tb_perusahaan','tb_perusahaan.KD','tb_calonsiswa.REF_PERUSAHAAN')->leftJoin('tb_calonsiswa_dtlpaket','tb_calonsiswa.KD','tb_calonsiswa_dtlpaket.KD')->leftJoin('tb_paket_bimbel','tb_calonsiswa_dtlpaket.REF_PAKET','tb_paket_bimbel.KD')->leftJoin('tb_level','tb_level.KD','tb_calonsiswa_dtlpaket.REF_LEVEL')->leftJoin('tb_kategori','tb_kategori.KD','tb_calonsiswa_dtlpaket.REF_KATEGORI')->where('tb_calonsiswa.KD',$kd)->first();
  return view('admin.registration-detail',compact('regisData'));
}

public function students(){
  $students = Student::paginate(10);
  return view('admin.students.index',['students' => $students]);
}
public function ielts_registration(RegisIeltsOfficial $regisIelts){
  return view('admin.ielts_registration',['ielts_registration' => $regisIelts->orderBy('id','desc')->get()]);
}
public function teofl_registration(RegisPaket $regisToefl){
  return view('admin.toefl_registration',['toefl_registration' => $regisToefl->orderBy('id','desc')->get()]);
}
public function english_preview($id){
  $regisPaket = RegisPaket::select('tb_calonsiswa.*','tb_calonsiswa_dtlpaket.JUMLAH_PERTEMUAN','tb_calonsiswa_dtlpaket.JUMLAH_JAM','tb_paket_bimbel.NAMA as nama_course','tb_level.NAMA as nama_level','tb_kategori.NAMA as nama_kategori')->join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','=','tb_calonsiswa.KD')->join('tb_paket_bimbel','tb_calonsiswa_dtlpaket.REF_PAKET','tb_paket_bimbel.KD')->join('tb_level','tb_calonsiswa_dtlpaket.REF_LEVEL','=','tb_level.KD')->join('tb_kategori','tb_calonsiswa_dtlpaket.REF_KATEGORI','=','tb_kategori.KD')->where('tb_calonsiswa_dtlpaket.REF_PAKET','P/09/IC.OT.ST');

  return view('admin.english_registration-preview',['englishregis' => $regisPaket->find($id)]);
}
public function ielts_regis_preview($id){
  $regisIelts = new RegisIeltsOfficial;
  return view('admin.ielts_registration-preview',['ielts_registration' => $regisIelts->find($id)]);
}
public function english_registration(RegisPaket $regisenglish){
//      $regisenglish = $regisenglish->select('tb_calonsiswa.*','tb_paket_bimbel.NAMA as nama_course','tb_level.NAMA as nama_level','tb_kategori.NAMA as kelompok_kelas')->join('tb_paket_bimbel','tb_paket_bimbel.KD','=','tb_calonsiswa.id_course')->join('tb_level','tb_calonsiswa.id_level','=','tb_level.KD')->join('tb_kategori','tb_calonsiswa.id_kelompok_kelas','=','tb_kategori.KD');
  $regisenglish = $regisenglish->select('tb_calonsiswa.*','tb_paket_bimbel.NAMA as nama_course','tb_level.NAMA as nama_level','tb_kategori.NAMA as kelompok_kelas')->join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','=','tb_calonsiswa.KD')->join('tb_paket_bimbel','tb_calonsiswa_dtlpaket.REF_PAKET','tb_paket_bimbel.KD')->join('tb_level','tb_calonsiswa_dtlpaket.REF_LEVEL','=','tb_level.KD')->join('tb_kategori','tb_calonsiswa_dtlpaket.REF_KATEGORI','=','tb_kategori.KD')->where('tb_calonsiswa_dtlpaket.REF_PAKET','P/09/IC.OT.ST');
  return view('admin.english_registration',['english_registration' => $regisenglish->orderBy('tb_calonsiswa.id','desc')->get()]);
}
public function ielts_simulation(){
  $ielts_simulation = RegisPaket::select('tb_calonsiswa.*','tb_paket_bimbel.NAMA as nama_course','tb_level.NAMA as nama_level','tb_kategori.NAMA as kelompok_kelas')->join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','=','tb_calonsiswa.KD')->join('tb_paket_bimbel','tb_calonsiswa_dtlpaket.REF_PAKET','tb_paket_bimbel.KD')->join('tb_level','tb_calonsiswa_dtlpaket.REF_LEVEL','=','tb_level.KD')->join('tb_kategori','tb_calonsiswa_dtlpaket.REF_KATEGORI','=','tb_kategori.KD')->where('tb_calonsiswa_dtlpaket.REF_PAKET','P/10/IMT');
  return view('admin.ielts_simulation',['ielts_simulation' => $ielts_simulation->orderBy('id','desc')->get()]);
}
public function toefl_simulation(RegisPaket $regisenglish){
  $regisenglish = $regisenglish->select('tb_calonsiswa.*','tb_paket_bimbel.NAMA as nama_course','tb_level.NAMA as nama_level','tb_kategori.NAMA as kelompok_kelas')->join('tb_paket_bimbel','tb_paket_bimbel.KD','=','tb_calonsiswa.id_course')->join('tb_level','tb_calonsiswa.id_level','=','tb_level.KD')->join('tb_kategori','tb_calonsiswa.id_kelompok_kelas','=','tb_kategori.KD');
  return view('admin.english_registration',['english_registration' => $regisenglish->orderBy('tb_calonsiswa.id','desc')->get()]);
}
public function contact_us(ContactUs $contactUs){
  return view('admin.contact-us',['contacts' => $contactUs->orderBy('id','desc')->get()]);
}
public function delete_contact_us($id,ContactUs $contactUs){
  $contactUs = $contactUs::find($id)->delete();
  return redirect('/admin/contact-us')->with('message','Contact Us Successfully deleted');
}
public function data_pendaftaran_mahasiswa(DemoPendaftaranMahasiswa $model){
  $data = $model::get();
  return view('admin.demo.data-pendaftaran-mahasiswa',['data_pendaftaran' => $data]);
}
public function detail_data_pendaftaran_mahasiswa(DemoPendaftaranMahasiswa $model,$id){
  $data = $model::find($id);
  return view('admin.demo.detail-data-pendaftaran-mahasiswa',['data_pendaftaran' => $data]);
}

public function online_test_registration(){
  $ot_registration = OtRegistration::selectRaw('ot_registrations.*,ot_tests.name as test_name,ot_modules.name as module_name')->orderBy('ot_registrations.id','DESC')->join('ot_tests','ot_registrations.test_id','ot_tests.id')->leftJoin('ot_modules','ot_modules.id','ot_registrations.module_id')->get();
  $types = OtSectionType::get();
  return view('admin.online_test_registration',['ot_registration' => $ot_registration,'section_types' => $types]);
}

public function online_test_registration_details($id){
  return 'test';
}

public function approve_online_test_registration(Request $request){
  if($request->status === "true"){
    $request->merge(['status' => "approved"]);
    $find_registration = OtRegistration::selectRaw('ot_registrations.*,ot_tests.name as test_name')->join('ot_tests','ot_tests.id','ot_registrations.test_id')->find($request->id);
    $find_registration->update($request->all());

    $email = $find_registration->EMAIL;
    $test_id = $find_registration->test_id;
    $module_id = $find_registration->module_id;
    $test_name = $find_registration->test_name;

    $cek_current_test = OtCurrentTest::where('registration_id',$request->id)->first();
    $request->merge(['test_id' => $test_id]);
    $request->merge(['module_id' => $module_id]);
    $request->merge(['registration_id' => $request->id]);
    $now = Carbon::now();
    $token_arr = explode("-",$find_registration->token);
    $package_seed = $token_arr[1];
    $token = $token_arr[0];
    $token = $request->_token.'-'.$now->timestamp;
    $request->merge(['package_seed' => $package_seed]);
    $request->merge(['link_token' => $token]);
    $request->merge(['approved_date' => $now]);

    if(!$cek_current_test){
      $create_current_test = OtCurrentTest::create($request->all());
    }else{
      $create_current_test = OtCurrentTest::where('registration_id',$request->id)->update($request->except('_token','status'));
    }

    Mail::send(new OnlineTestLink($token,$email,$test_name,$test_id));
        //$email = $find_registration->email;
        /*$cek_email_exist = Student::where('email',$email)->first();
        if($cek_email_exist->count()){
          $student_id = $cek_email_exist->id;
        }else{
          Student::create();
        }*/
        //$current_test = OtCurrentTest::create();
        //Mail::send(new OnlineTestLink());
      }else{
        $request->merge(['status' => "not approved"]);
        $update_status = OtRegistration::find($request->id)->update($request->all());
      }
      $ot_registration = OtRegistration::get();
      return view('admin.online_test_registration-approve',['ot_registration' => $ot_registration]);
    }

    public function delete_online_test_registration($id){
      OtRegistration::find($id)->delete();
      return redirect()->route("admin.ot_registration")->with("Status","Registration data successfully deleted");
    }



    public function change_status_pricelists(Request $request){
      $pricelists = ProductPriceList::find($request->kd);
      $request->merge(['KD' => $request->kd]);
      if(!$pricelists){
        if($request->status == "true"){
          $request->merge(['status' => 1]);     
        }else{
          $request->merge(['status' => 0]);
        }
        $create_pricelists = ProductPriceList::create($request->all());
      }else{
        if($request->status == "true"){
          $request->merge(['status' => 1]);     
        }else{
          $request->merge(['status' => 0]);
        }
        $update_pricelists = $pricelists->update($request->all());

      }
      return $request->status;  



    }

    public function pricelist(Request $request){
     $pricelists = ProductPriceList::selectRaw('tb_paket_bimbel_dtlharga.KD,priority,status,name,type')->rightJoin('tb_paket_bimbel_dtlharga','tb_paket_bimbel_dtlharga.KD','pricelists.KD')->groupBy('tb_paket_bimbel_dtlharga.KD','status','priority','name','type')->paginate(10);
     return view('admin.products.pricelists.index',['pricelists' => $pricelists]);
   }

   public function pricelist_details(Request $request){
    $kd = urldecode($request->id);


    $details = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.REF_PAKET,tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.JUMLAH_JAM,tb_paket_bimbel.NAMA as PAKET, tb_level.NAMA as LEVEL')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->groupBy('REF_PAKET','REF_LEVEL','JUMLAH_JAM','PAKET','LEVEL')->where('tb_paket_bimbel_dtlharga.KD', $kd)->get();
    foreach($details as $key => $detail){
      $pricelist_detail = PacketPriceDetails::select('REF_KATEGORI','HARGA_PAKET','JUMLAH_JAM')->where('REF_PAKET',$detail->REF_PAKET)->where('REF_LEVEL',$detail->REF_LEVEL)->where('JUMLAH_JAM',$detail->JUMLAH_JAM)->where('tb_paket_bimbel_dtlharga.KD',$kd)->get();
      $details[$key]->detail_harga = $pricelist_detail;
    }

    return view('admin.products.pricelists.details',['details' => $details]);

  }

  public function pricelist_edit(Request $request,$kd){
   $kd = urldecode($request->id);
   $pricelist = ProductPriceList::find($kd);
   return view('admin.products.pricelists.edit',['pricelist' => $pricelist,'kd' => $kd]);
 }

 public function pricelist_update(Request $request,$kd){
   $kd = urldecode($request->id);
   if($request->status == "on"){
    $request->merge(['status' => 1]);
  }else{
    $request->merge(['status' => 0]);
  }
  $pricelist = ProductPriceList::find($kd)->update($request->all());
  return redirect()->route('admin.products.pricelist.index')->withStatus('pricelist successfully updated !');
}

public function pricelist_courses(Request $request){
  $pricelist_kd = urldecode($request->id);

  if($request->search != ""){

    $kd = $request->kd;
    $search = $request->search;
    $url_paramater = ['search' => $search];
    if($kd != ""){
      $url_paramater['kd'] = $kd;
    }
    $packets =  PacketPriceDetails::selectRaw('tb_paket_bimbel.KD,tb_paket_bimbel.NAMA as NAMA_PAKET,course_packet_settings.status,course_packet_settings.slug,course_packet_settings.image,course_packet_settings.short_description,course_packet_settings.description')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->groupBy('tb_paket_bimbel_dtlharga.REF_PAKET','tb_paket_bimbel.KD','tb_paket_bimbel.NAMA','course_packet_settings.status','course_packet_settings.slug','course_packet_settings.image','course_packet_settings.short_description','course_packet_settings.description');
    $pricelist = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.REF_PAKET,tb_paket_bimbel.KD,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_paket_bimbel_dtlharga.HARGA_PAKET,tb_paket_bimbel_dtlharga.JUMLAH_JAM,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_level','tb_paket_bimbel_dtlharga.REF_LEVEL','tb_level.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->groupBy('tb_paket_bimbel_dtlharga.REF_PAKET','tb_paket_bimbel.KD','tb_paket_bimbel.NAMA','tb_level.NAMA','tb_paket_bimbel_dtlharga.JUMLAH_JAM','tb_paket_bimbel_dtlharga.HARGA_PAKET','tb_paket_bimbel_dtlharga.REF_KATEGORI','tb_paket_bimbel_dtlharga.REF_LEVEL');
    if($search != "all"){
      if($search == "groups"){
        $packets = $packets->where('REF_KELOMPOK',$request->kd);
      }
    }
    $pricelists = $pricelist->get();
    $packets = $packets->paginate(10)->withPath(url()->current().'?'.http_build_query($url_paramater));

    return view('admin.products.pricelists.course-list',compact('packets','pricelist_kd','kd','search','pricelists'));
  }else{
    $groups = CoursePacketGroup::selectRaw('tb_kelompokpaket.KD,tb_kelompokpaket.NAMA')->join('tb_paket_bimbel','tb_paket_bimbel.REF_KELOMPOK','tb_kelompokpaket.KD')->join('tb_paket_bimbel_dtlharga','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->groupBy('tb_kelompokpaket.KD','tb_kelompokpaket.NAMA')->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->withCount(['courses' => function($query) use ($pricelist_kd) {
      
      return $query;
    }])->paginate(10);
    $languages = Language::selectRaw('tb_bahasa.KD,tb_bahasa.NAMA')->join('tb_paket_bimbel','tb_paket_bimbel.REF_BAHASA','tb_bahasa.KD')->join('tb_paket_bimbel_dtlharga','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->groupBy('tb_bahasa.KD','tb_bahasa.NAMA')->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->paginate(10);

    $business = Business::selectRaw('tb_bidangusaha.KD,tb_bidangusaha.NAMA')->join('tb_paket_bimbel','tb_paket_bimbel.REF_BIDANGUSAHA','tb_bidangusaha.KD')->join('tb_paket_bimbel_dtlharga','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->groupBy('tb_bidangusaha.KD','tb_bidangusaha.NAMA')->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->paginate(10);

    return view('admin.products.pricelists.courses',compact('groups','languages','business','pricelist_kd'));
  }
}

public function pricelist_course_status(Request $request){

  $course_packets = CoursePacketSetting::find($request->KD);
  if($course_packets != ""){
    $course_packets->REF_PRICELIST = $request->REF_PRICELIST;
    if($request->status === "true"){
     $course_packets->status = 1;

     $course_packets->save();
     return "true";
   }else{
     $course_packets->status = 0;
     $course_packets->save();
     return "false";
   }
 }else{
   if($request->status === "true"){
    $request->merge(['status' => 1]);
  }else{
    $request->merge(['status' => 0]);
  }
  $create = CoursePacketSetting::create($request->all());
}
}

public function pricelist_course_edit(Request $request){
  $kd = $request->kd;
  $course_packet_settings = CoursePacket::selectRaw('course_packet_settings.*,tb_paket_bimbel.KD,tb_paket_bimbel.NAMA')->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel.KD')->find($request->kd);
  $pricelist_kd = urldecode($request->pricelist_kd);
  $search = $request->search;
  $search_kd = $request->search_kd;
  $events = Events::get();
  $companies = Perusahaan::get();
  $levels = PacketPriceDetails::selectRaw('REF_LEVEL,tb_level.NAMA as NAMA_LEVEL,course_level_settings.description,course_level_settings.online_test_id')->where('tb_paket_bimbel_dtlharga.KD',$pricelist_kd)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$request->kd)->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->leftJoin('course_level_settings','course_level_settings.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->groupBy('REF_LEVEL','tb_level.NAMA','course_level_settings.description','course_level_settings.online_test_id')->get();
  $online_tests = OtTest::get();
  return view('admin.products.pricelists.course-edit',compact('course_packet_settings','pricelist_kd','kd','search','search_kd','events','companies','levels','online_tests'));
}
public function pricelist_course_update(Request $request){

  if($request->status == "on"){
    $request->merge(['status' => 1]);
  }else{
    $request->merge(['status' => 0]);  
  }
  $request->merge(['slug' => Str::slug($request->slug)]);
  $course_packet_settings = CoursePacketSetting::find($request->KD);
  if($course_packet_settings){
    $update_course_packet_setting = $course_packet_settings->update($request->all());
  }else{
    $create_course_packet_setting = CoursePacketSetting::create($request->all());
  }
  return redirect()->route('admin.products.pricelist.course-edit',['pricelist_kd' => urlencode(urlencode($request->REF_PRICELIST)),'kd' => $request->KD,'search' => $request->search,'search_kd' => $request->search_kd])->withStatus('Course has been successfully updated !');
}

public function pricelist_course_level_update(Request $request){
  $levels = $request->kd_level;
  $descriptions = $request->description;
$online_test_id = $request->online_test_id;
  for($x = 0; $x < count($levels); $x++){

    $data = ['KD' => $levels[$x],'REF_PAKET' => $request->REF_PAKET, 'REF_PRICELIST' => $request->REF_PRICELIST,'description' => $descriptions[$x]];
    if($online_test_id[$x] != ""){
      $data['online_test_id'] = $online_test_id[$x];
    }
    $course_level_setting = CourseLevelSetting::find($levels[$x]);
    if($course_level_setting){
      $update_course_level_setting = $course_level_setting->update($data);
    }else{
      $create_course_level_setting = CourseLevelSetting::create($data);
    }
  }
   return redirect()->route('admin.products.pricelist.course-edit',['pricelist_kd' => urlencode(urlencode($request->REF_PRICELIST)),'kd' => $request->REF_PAKET,'search' => $request->search,'search_kd' => $request->search_kd])->withStatus('Level has been successfully updated !');
}

public function form_builder(){
  $forms = Form::get();
  return view('admin.form-builder.index',['forms' => $forms]);
}

public function fb_add_form(Request $request){
  if($request->slug != ""){
    $slug = $request->slug;
  }else{
    $slug = $request->soal;
  }
  $request->merge(['slug' => $this->setSlug($slug)]);
  $create_form = Form::create($request->all());
  return redirect('admin/form');
}

public function fb_edit_form(Request $request){
  if($request->slug != ""){
    $slug = $request->slug;
  }else{
    $slug = $request->soal;
  }
  $request->merge(['slug' => $this->setSlug($slug)]);
  $update_form = Form::find($request->id)->update($request->all());
  return redirect('admin/form');
}

public function fb_add_question(Request $request){
  $form = Form::find($request->id);
  $form_description = FormDescription::where('idsoal',$request->id)->first();
  $form_categories = FormCategory::where('idsoal',$request->id)->get();
  $form_questions = FormQuestion::where('idsoal',$request->id)->with('options')->get();

  return view('admin.form-builder.tambah',['idsoal' => $request->id,'form_description' => 
    $form_description,'form_categories' => $form_categories,'form_questions' => $form_questions,'slug' => $form->slug]);
}

public function fb_post_add_question(Request $request){
 if($request->cmd == "add"){
  $form = FormQuestion::create($request->all());
  $idpertanyaan = $form->idpertanyaan;
  $arr_option = explode('|',$request->options);
  $option_data = [];
  foreach($arr_option as $option){
    array_push($option_data,['idsoal'=>$request->idsoal,'idpertanyaan' => $idpertanyaan,'jenis' => $request->jawaban,'option' => $option,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);        
  }
  $insert_options = FormOption::insert($option_data);


}else if($request->cmd == "edit"){
  $form = FormQuestion::find($request->id)->update($request->all());
  $idpertanyaan = $request->id;
  $delete_options = FormOption::where('idpertanyaan',$idpertanyaan)->where('idsoal',$request->idsoal)->delete();
  $arr_option = explode('|',$request->options);
  $option_data = [];
  foreach($arr_option as $option){
    array_push($option_data,['idsoal'=>$request->idsoal,'idpertanyaan' => $idpertanyaan,'jenis' => $request->jawaban,'option' => $option,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);        
  }
  $insert_options = FormOption::insert($option_data);
}else if($request->cmd == "delete"){
  $form = FormQuestion::find($request->id)->delete();
}
return redirect('admin/form/add-question?id='.$request->idsoal);
}

public function fb_view_data(Request $request){
  $idsoal = $request->idsoal;
  $date1 = isset($_GET['tgl1'])?$_GET['tgl1']:'';
  $date2 = isset($_GET['tgl2'])?$_GET['tgl2']:'';

  if($date1=="" or  $date2 ==""){ 
    $s = FormContent::where('idsoal',$idsoal)->get();
  }else{
    $s = FormContent::where('idsoal',$idsoal)->whereRaw('tanggal between CAST(? AS DATE) and CAST(? AS DATE)',[$date1,$date2])->get();

  }
  $s2 = FormQuestion::where('idsoal',$idsoal)->get();
  return view('admin.form-builder.view-data',['idsoal' => $idsoal,'s'=>$s,'s2'=>$s2]);
}

public function fb_change_description(Request $request){

  $desc_exist = FormDescription::where('idsoal',$request->idsoal)->first();
  if($desc_exist){
    $update_desc = FormDescription::where('idsoal',$request->idsoal)->update($request->except('_token','id','button'));
  }else{
    $create_desc = FormDescription::create($request->all());
  }
  return redirect('admin/form/add-question?id='.$request->idsoal);
}
public function fb_add_category(Request $request){
  if($request->cmd == "add"){
    $categories = FormCategory::create($request->except('_token','id'));
  }else if($request->cmd == "edit"){
    $categories = FormCategory::find($request->id)->update($request->except('_token','idsoal'));
  }else if($request->cmd ="delete"){
    $categories = FormCategory::find($request->id)->delete();
  }

  return redirect('admin/form/add-question?id='.$request->idsoal);
}

public function enquiry(){
  $enquiries = Enquiry::selectRaw('tb_komplain.*,users.name,users.no_telepon,users.email')->with('details')->join('users','users.id','tb_komplain.user_id')->orderBy('id','DESC')->paginate(10);

  return view('admin.enquiry.index',['enquiries' => $enquiries]);
}
public function enquiry_details($id){
 $enquiry_details = Enquiry::selectRaw('tb_komplain.*,users.name,users.no_telepon,users.email')->with('details')->join('users','users.id','tb_komplain.user_id')->find($id);
 return view('admin.enquiry.details',['enquiry_details' => $enquiry_details]);
}

public function post_enquiry_details($id, Request $request){
  $request->merge(['employee_user_id' => auth()->user()->id]);
  $enquiry_details = Enquiry::selectRaw('tb_komplain.*,client.name as client_name,client.email as client_email')->with('details')->join('users as client','client.id','tb_komplain.user_id')->find($id);
  $root_path = 'file/enquiry/'.$enquiry_details->complaint_code.'/response';

  $solution = $request->solution;
  $dom = new \domdocument();
      $dom->loadHtml($solution, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
        LIBXML_NOWARNING  );
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
               $image_name= uniqid().$k.'.'.$mimetype;

               $upload_file = Storage::disk('public')->put($root_path.'/'.$image_name, $data);
               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('public')->url($root_path.'/'.$image_name));
               $img->removeAttribute('class');
               $img->setattribute('class','enquiry-img');
               $img->removeAttribute('style');
               $img->setattribute('style','width:auto;max-width:100%;height:auto;');
             }
           }



           $solution = $dom->savehtml();
           $request->merge(['solution' => $solution]);


           $employee = User::selectRaw('users.name as employee_name')->find(auth()->user()->id);
           $request->merge($enquiry_details->toArray());
           $request->merge($employee->toArray());
           $submit_solution = EnquiryDetail::create($request->all());
           $request->merge(['detail_id' => $submit_solution->id]);



           $send_mail = Mail::send(new EnquiryResponseMail($request));
           return redirect()->back()->withStatus('Response Submitted !');
         }

         public function setSlug($title){
          $model = new Form;
          $slug = str_slug($title);

          if($model::whereSlug($slug)->exists()){
            $slug = $this->incrementSlug($title);
          }
          return $slug;
        }
        public function incrementSlug($title){
          $model = new Form;
          $slug = str_slug($title);
          $max = $model::whereSlug($title)->latest('idsoal')->value('slug');
          if (is_numeric($max[-1])) {
           return preg_replace_callback('/(\d+)$/', function ($mathces) {
             return $mathces[1] + 1;
           }, $max);
         }

         return "{$slug}-2";
       }

       public function company_structures(Request $request){
        $company_structures = CompanyStructure::orderBy('created_at','DESC')->first();
        return view('admin.company-structures.index',['structure' => $company_structures]);
      }

      public function store_company_structures(Request $request){
        $path = "img/company-structures";
        $gambar =$request->file('gambar');

        if(!empty($gambar)){

          $ext_gambar = $gambar->getClientOriginalExtension();
          $nama_gambar = $gambar->getClientOriginalName();
          $path_gambar = $gambar->storeAs($path, time().'.'.$ext_gambar,'public');
          $request->merge(['image' => $path_gambar]);
        }
        $insert_structure = CompanyStructure::create($request->all());
        return redirect('admin/company-structures')->withStatus('Company structure successfully created');
      }
    }
