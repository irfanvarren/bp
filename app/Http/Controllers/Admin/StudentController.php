<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\StudentData\Student;
use App\Models\Admin\StudentData\StudentCandidate;
use App\Models\Admin\StudentData\StudentCandidatePacket;
use App\Models\Admin\StudentData\StudentCandidateGuardian;
use App\Models\Admin\StudentData\StudentRegistrationDetail;
use App\Models\Admin\StudentData\StudentRegistrationPacket;
use App\Models\Admin\StudentData\StudentGuardian;
use App\Models\Registration\RegistrationTempStudentDetail;
use App\Models\Registration\RegistrationTempDetail;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Country;
use App\Models\Master\RegionalData\IDN\Island;
use App\Models\Master\RegionalData\IDN\Province;
use App\Models\Master\RegionalData\IDN\City;
use App\Models\Master\RegionalData\IDN\District;
use App\Models\Master\RegionalData\IDN\SubDistrict;
use Illuminate\Pagination\Paginator as Pagination;
use DB;
use App\User;


class StudentController extends Controller
{
 public function student_lists(Request $request){
   $students = new Student();
   $type = $request->type;
   if($type == "student-candidate"){
    $students = new StudentCandidate();
  }
  if($type == "student-candidate"){
    $students = $students->selectRaw('tb_calonsiswa.*,users.email as user_email,tb_calonsiswa_dtlpaket.*');
    if($request->keyword != ""){
      $students = $students->whereNull('tb_calonsiswa.REF_SISWA');
      $students = $students->where('tb_calonsiswa.NAMA','like','%'.$request->keyword.'%')->orWhere('tb_calonsiswa.KD','like','%'.$request->keyword.'%')->orWhere('tb_calonsiswa.REF_KTP','like','%'.$request->keyword.'%');
    }
    $students = $students->join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','tb_calonsiswa.KD')->leftJoin('users','tb_calonsiswa.users_id','users.id');
  }else{
   if($request->keyword != ""){
    $students = $students->where('tb_siswa.NAMA','like','%'.$request->keyword.'%')->orWhere('tb_siswa.KD','like','%'.$request->keyword.'%')->orWhere('tb_siswa.REF_NIK','like','%'.$request->keyword.'%');
  }
}

$students = $students->get();

$page = $request->page ?? 1;
$perPage = 20;
$offset = ($page - 1 ) * $perPage;
$students = new LengthAwarePaginator(collect($students)->slice($offset,$perPage)->all(), count($students), $perPage, $page);

return view('admin.registration.student-lists',compact('students','type'));
}

public function show_temp_student(Request $request){
  $cmd = $request->cmd;
  $parent = $request->parent;
  $temp_student_detail = RegistrationTempStudentDetail::get();
  return view('admin.registration.temp-student-table',compact('temp_student_detail','cmd','parent'));
}

public function add_temp_student(Request $request){
  $cmd = $request->cmd;
  $ARR_TAHUN_BULAN = explode(" ",$request->TAHUN_BULAN);
  $KD_1 = $request->KD_PERUSAHAAN;
  $KD_2 = $ARR_TAHUN_BULAN[0];
  $KD_3 = $ARR_TAHUN_BULAN[1];
  $KD_4 = $request->NO;
  $KD_GABUNG = $KD_1.'/'.$KD_2.'/'.$KD_3.'/'.$KD_4;
  $request->merge(['KD_GABUNG' => $KD_GABUNG]);
  $request->merge(['KD_1' => $KD_1]);
  $request->merge(['KD_2' => $KD_2]);
  $request->merge(['KD_3' => $KD_3]);
  $request->merge(['KD_4' => $KD_4]);
  $confirm = "false";
  if($request->confirm != ""){
    $confirm = $request->confirm;
  }
  if(substr($request->REF_SISWA,0,2) == "CS"){

    $cek_exist = RegistrationTempStudentDetail::where('NAMA','like','%'.$request->NAMA.'%')->orWhere('NIK','like','%'.$request->NIK.'%')->get();

    if(!count($cek_exist)){ 
      $add = RegistrationTempStudentDetail::create($request->all());
    }else{
      if($confirm == "false"){
        return json_encode(['status' => 'confirm','message' => 'Terdapat data calon murid dengan nama yang serupa, apakah anda yakin ingin menambah murid ini ?']);
      }
    }


    return json_encode(['status' => 'change-to-student','message' => 'Tolong ubah data calon murid menjadi murid terlebih dahulu !']);

  }else{

    $cek_exist = RegistrationTempStudentDetail::where('REF_SISWA',$request->REF_SISWA)->where('KD_1',$KD_1)->where('KD_2',$KD_2)->where('KD_3',$KD_3)->where('KD_4',$KD_4)->get();

    if(!count($cek_exist)){ 
      $add = RegistrationTempStudentDetail::create($request->all());
    }else{
     return json_encode(['status' => 'exist','message' => 'Murid yang ingin dimasukkan sudah ada !']);
   } 

 }




 $temp_student_detail = RegistrationTempStudentDetail::get();
 return view('admin.registration.temp-student-table',compact('temp_student_detail','cmd'));
}

public function delete_temp_student(Request $request){
  $cmd = $request->cmd;
  $delete = RegistrationTempStudentDetail::where('KD_GABUNG',$request->KD_GABUNG)->where('REF_SISWA',$request->REF_SISWA)->delete();
  $temp_student_detail = RegistrationTempStudentDetail::get();
  return view('admin.registration.temp-student-table',compact('temp_student_detail','cmd')); 
}

public function check_student_exist(Request $request){

  $cek_exist_in_student = Student::where('NAMA','like','%'.$request->NAMA.'%')->orWhere('REF_NIK','like','%'.$request->NIK.'%')->orWhere('EMAIL','like','%'.$request->EMAIL.'%')->get();
  //dd($request->NAMA);
  if(COUNT($cek_exist_in_student)){
    $return = [
      'code' => 500,
      'status' => "ERROR",
      'message' => "Terdapat murid dengan nama yang serupa (".$request->NAMA."), Apakah anda yakin ingin menambahkan murid ini ? ",
      'exist' => true
    ];
    return response()->json($return,200);
  }else{
    $return = [
      'code' => 200,
      'status' => "OK",
      'message' => "",
      'exist' => false
    ];
    return response()->json($return,200);
  }

}

public function index(){
  $students = Student::get();
  return view('admin.students.index',compact('students'));
}


public function create(){
  $countries = Country::get();
  $islands = Island::where('REF_NEGARA','INDONESIA')->get();

  $current_no = Student::whereRaw('SUBSTRING(KD,3,2)',date('y'))->whereRaw('SUBSTRING(KD,5,2)',date('m'))->orderBy('KD','DESC')->value('KD');
  if($current_no){
    $padded_no = str_pad((string) substr($current_no,-4)+1, 4, "0", STR_PAD_LEFT);
    $KD = substr($current_no,0,6).$padded_no;
  }else{
    $KD = "BP".date('y').date('m')."0001";
  }
  return view('admin.students.create',compact('countries','islands','KD'));
}

public function store(Request $request){
  $path = $request->KD;

  $request->merge(['NAMA' => strtoupper($request->NAMA)]);
  $request->merge(['JK' => strtoupper(str_replace(' ','',$request->JK))]);
  $request->merge(['AGAMA' => strtoupper($request->AGAMA) ]);
  if($request->hasFile('FILE_PIC')){
    $file_pic = $request->file('FILE_PIC');
    $ext = $file_pic->getClientOriginalExtension();
    $PATH_PIC = $file_pic->storeAs($path, $request->KD.'_thumb.'.$ext);
    $request->merge(['PATH_PIC',$PATH_PIC]);
  }

  
  $user_id = $request->user_id;

  if($user_id == ""){
    $user_id = User::where('email',$request->email)->value('id');
  }

  if($user_id != ""){
    $user_student_candidates = StudentCandidate::selectRaw('"'.$request->KD.'" as KD,JENIS_TINGGAL,ALAT_TRANSPORTASI,KEWARGANEGARAAN,TITLE,TINGKAT_PEKERJAAN,SEKTOR_PEKERJAAN,TINGKAT_PENDIDIKAN,UNIVERSITAS_TERAKHIR,JURUSAN,LAMA_BELAJAR_INGGRIS,TGL_BERLAKU_PASPOR,BAHASA_SEHARI_HARI,KEBUTUHAN_KHUSUS,PENERIMA_KPS,LAYAK_PIP,PENERIMA_KIP,PATH_KTP,PATH_PASPOR,PATH_PAYMENT,PATH_KK,PATH_IJAZAH,PATH_AKTA_LAHIR,PATH_KKS,created_at,updated_at')->where('tb_calonsiswa.users_id',$user_id);

    $bindings = $user_student_candidates->getBindings();
    $insertQuery = 'INSERT into tb_siswa_dtlregis (KD,JENIS_TINGGAL,ALAT_TRANSPORTASI,KEWARGANEGARAAN,TITLE,TINGKAT_PEKERJAAN,SEKTOR_PEKERJAAN,TINGKAT_PENDIDIKAN,UNIVERSITAS_TERAKHIR,JURUSAN,LAMA_BELAJAR_INGGRIS,TGL_BERLAKU_PASPOR,BAHASA_SEHARI_HARI,KEBUTUHAN_KHUSUS,PENERIMA_KPS,LAYAK_PIP,PENERIMA_KIP,PATH_KTP,PATH_PASPOR,PATH_PAYMENT,PATH_KK,PATH_IJAZAH,PATH_AKTA_LAHIR,PATH_KKS,created_at,updated_at) '
    . $user_student_candidates->toSql();

    DB::insert($insertQuery, $bindings);

    $user_student_candidates_packets = StudentCandidatePacket::selectRaw('"'.$request->KD.'" as KD,tb_calonsiswa.reseller_id,reseller_quota_id,REF_PRICELIST,REF_PAKET,REF_LEVEL,REF_KATEGORI,JUMLAH_JAM,JUMLAH_PERTEMUAN,TIPE_KELAS,IELTS_MODULE,tb_calonsiswa.TGL_TEST,USER_BUAT,USER_EDIT,USER_SETUJU,TGL_BUAT,TGL_EDIT')->join('tb_calonsiswa','tb_calonsiswa.KD','tb_calonsiswa_dtlpaket.KD')->where('tb_calonsiswa.users_id',$user_id);

    $bindings1 = $user_student_candidates_packets->getBindings();
    $insertQuery1 = 'INSERT into tb_siswa_dtlpaket (KD,reseller_id,reseller_quota_id,REF_PRICELIST,REF_PAKET,REF_LEVEL,REF_KATEGORI,JUMLAH_JAM,JUMLAH_PERTEMUAN,TIPE_KELAS,IELTS_MODULE,TGL_TEST,USER_BUAT,USER_EDIT,USER_SETUJU,TGL_BUAT,TGL_EDIT) '
    . $user_student_candidates_packets->toSql();

    DB::insert($insertQuery1, $bindings1);


    $user_student_candidates_guardians = StudentCandidateGuardian::selectRaw('"'.$request->KD.'" as KD,nama_wali,hubungan,no_hp_wali,email_wali,alamat_wali,pekerjaan,penghasilan,tb_calonsiswa_datawali.kebutuhan_khusus,tb_calonsiswa_datawali.created_at,tb_calonsiswa_datawali.updated_at')->join('tb_calonsiswa','tb_calonsiswa.KD','tb_calonsiswa_datawali.KD')->where('tb_calonsiswa.users_id',$user_id);

    $bindings2 = $user_student_candidates_guardians->getBindings();
    $insertQuery2 = 'INSERT into tb_siswa_datawali (KD,nama_wali,hubungan,no_hp_wali,email_wali,alamat_wali,pekerjaan,penghasilan,kebutuhan_khusus,created_at,updated_at) '
    . $user_student_candidates_guardians->toSql();

    DB::insert($insertQuery2, $bindings2);


  }
  Student::create($request->all());

  if($request->REF_SISWA != ""){
  $student_candidate = StudentCandidate::where('KD',$request->REF_SISWA)->first();
  $student_candidate->REF_SISWA = $request->KD;
  $student_candidate->save();
  }
  $user = User::where('id',$user_id)->update(['kd_student' => $request->KD]);
  

  return redirect()->route('admin-student.index')->withStatus('Data student berhasil diinput !');
}

public function edit($kd){
  $student = Student::find($kd);
  $packet_details = StudentRegistrationPacket::selectRaw('tb_siswa_dtlpaket.*,pricelists.name as NAMA_PRICELIST,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL, tb_kategori.NAMA as NAMA_KATEGORI')->where('tb_siswa_dtlpaket.KD',$kd)->leftJoin('pricelists','pricelists.KD','tb_siswa_dtlpaket.REF_PRICELIST')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_siswa_dtlpaket.REF_PAKET')->join('tb_level','tb_level.KD','tb_siswa_dtlpaket.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_siswa_dtlpaket.REF_KATEGORI')->orderBy('tb_siswa_dtlpaket.TGL_BUAT','DESC')->get();
  $guardian_data = StudentGuardian::join(DB::raw('(select tb_siswa_datawali.hubungan, tb_siswa_datawali.KD,max(tb_siswa_datawali.updated_at) as max_updated_at from tb_siswa_datawali group by tb_siswa_datawali.hubungan,tb_siswa_datawali.KD) as temp'),function($join){
    $join->on('temp.KD','=','tb_siswa_datawali.KD')->on('temp.max_updated_at','=','tb_siswa_datawali.updated_at')->on('temp.hubungan','=','tb_siswa_datawali.hubungan');
  })->where('tb_siswa_datawali.KD',$kd)->where('tb_siswa_datawali.hubungan','!=',null)->get();
  
  $registration_details = StudentRegistrationDetail::where('KD',$kd)->orderBy('created_at','DESC')->get();
  $countries = Country::get();
  $islands = Island::where('REF_NEGARA','INDONESIA')->get();
  return view('admin.students.edit',compact('student','countries','islands','packet_details','guardian_data','registration_details'));
}

public function update($kd,Request $request){
 $request->merge(['NAMA' => strtoupper($request->NAMA)]);
 $request->merge(['JK' => strtoupper(str_replace(' ','',$request->JK))]);
 $request->merge(['AGAMA' => strtoupper($request->AGAMA) ]);
 if($request->hasFile('FILE_PIC')){
  $file_pic = $request->file('FILE_PIC');
  $ext = $file_pic->getClientOriginalExtension();
  $PATH_PIC = $file_pic->storeAs($path, '.'.$ext);
  $request->merge(['PATH_PIC',$PATH_PIC]);
}

Student::find($kd)->update($request->all());
return redirect()->route('admin-student.index')->withStatus('Data student berhasil diupdate !');
}

public function destroy($kd){
  $delete = Student::find($kd)->delete();
  return redirect()->route('admin-student.index')->withStatus('Data student berhasil dihapus !'); 
}

public function save_regis_detail($kd,Request $request){
  $path = 'public/files/registration/'.$kd;
  if($request->hasFile('FILE_KTP')){
    $file = $request->file('FILE_KTP');
    $ext = $file->getClientOriginalExtension();
    $PATH_KTP = $file->storeAs($path, 'KTP.'.$ext);
    $request->merge(['PATH_KTP' => $PATH_KTP]);
  }
  if($request->hasFile('FILE_PASPOR')){
    $file = $request->file('FILE_PASPOR');
    $ext = $file->getClientOriginalExtension();
    $PATH_PASPOR = $file->storeAs($path, 'PASPOR.'.$ext);
    $request->merge(['PATH_PASPOR' => $PATH_PASPOR]);
  }
  if($request->hasFile('FILE_PAYMENT')){
    $file = $request->file('FILE_PAYMENT');
    $ext = $file->getClientOriginalExtension();
    $PATH_PAYMENT = $file->storeAs($path, 'PAYMENT.'.$ext);
    $request->merge(['PATH_PAYMENT' => $PATH_PAYMENT]);
  }
  if($request->hasFile('FILE_KK')){
    $file = $request->file('FILE_KK');
    $ext = $file->getClientOriginalExtension();
    $PATH_KK = $file->storeAs($path, 'KK.'.$ext);
    $request->merge(['PATH_KK' => $PATH_KK]);
  }
  if($request->hasFile('FILE_IJAZAH')){
    $file = $request->file('FILE_IJAZAH');
    $ext = $file->getClientOriginalExtension();
    $PATH_IJAZAH = $file->storeAs($path, 'IJAZAH.'.$ext);
    $request->merge(['PATH_IJAZAH' => $PATH_IJAZAH]);
  }
  if($request->hasFile('FILE_AKTA_LAHIR')){
    $file = $request->file('FILE_AKTA_LAHIR');
    $ext = $file->getClientOriginalExtension();
    $PATH_AKTA_LAHIR = $file->storeAs($path, 'AKTA_LAHIR.'.$ext);
    $request->merge(['PATH_AKTA_LAHIR' => $PATH_AKTA_LAHIR]);
  }
  if($request->hasFile('FILE_KKS')){
    $file = $request->file('FILE_KKS');
    $ext = $file->getClientOriginalExtension();
    $PATH_KKS = $file->storeAs($path, 'KKS.'.$ext);
    $request->merge(['PATH_KKS' => $PATH_KKS]);
  }
  StudentRegistrationDetail::find($request->id)->update($request->all());
  return redirect()->route('admin-student.edit',$kd)->withStatus('Data detail regis berhasil diupdate !');
}

public function add_guardian_data($kd,Request $request){

  StudentGuardian::create($request->all());
  return redirect()->route('admin-student.edit',$kd)->withStatus('Data wali berhasil ditambah !');
}
public function edit_guardian_data($kd,Request $request){
  StudentGuardian::find($request->id)->update($request->all());
  return redirect()->route('admin-student.edit',$kd)->withStatus('Data wali berhasil diupdate !');
}
public function delete_guardian_data($kd,Request $request){
  StudentGuardian::find($request->id)->delete();
  return redirect()->route('admin-student.edit',$kd)->withStatus('Data wali berhasil dihapus !');
}

public function show_temp_student_packet(Request $request){
  $ARR_TAHUN_BULAN = explode(" ",$request->TAHUN_BULAN);
  $KD_1 = $request->KD_PERUSAHAAN;
  $KD_2 = $ARR_TAHUN_BULAN[0];
  $KD_3 = $ARR_TAHUN_BULAN[1];
  $KD_4 = $request->NO;
  $KD_GABUNG = $KD_1.'/'.$KD_2.'/'.$KD_3.'/'.$KD_4;
  $request->merge(['KD_GABUNG' => $KD_GABUNG]);
  $temp_student_packet_detail = RegistrationTempDetail::where('KD_GABUNG',$KD_GABUNG)->get();
  return view('admin.registration.student-packets',compact('temp_student_packet_detail'));
}

public function add_temp_student_packet(Request $request){
  $cmd = $request->cmd;
  $ARR_TAHUN_BULAN = explode(" ",$request->TAHUN_BULAN);
  $KD_1 = $request->KD_PERUSAHAAN;
  $KD_2 = $ARR_TAHUN_BULAN[0];
  $KD_3 = $ARR_TAHUN_BULAN[1];
  $KD_4 = $request->NO;
  $KD_GABUNG = $KD_1.'/'.$KD_2.'/'.$KD_3.'/'.$KD_4;
  $duration = $request->JUMLAH_JAM_PERTEMUAN;
  $arr_duration = explode('|',$duration);
  $JUMLAH_JAM = $arr_duration[0];
  $JUMLAH_PERTEMUAN = $arr_duration[1];
  $request->merge(['JUMLAH_JAM' => $JUMLAH_JAM]);
  $request->merge(['JUMLAH_PERTEMUAN' => $JUMLAH_PERTEMUAN]);
  $request->merge(['KD_GABUNG' => $KD_GABUNG]);
  $request->merge(['KD_1' => $KD_1]);
  $request->merge(['KD_2' => $KD_2]);
  $request->merge(['KD_3' => $KD_3]);
  $request->merge(['KD_4' => $KD_4]);
  $request->merge(['REF_AKUN_PENDAPATAN' => '4.1.1']);
  $request->merge(['REF_AKUN_PPN' => '2.1.3']);
  $request->merge(['REF_AKUN_PPH' => '2.1.4']);
  $request->merge(['JUMLAH_PAKET' => 1]);
  $cek_exist = RegistrationTempDetail::where('KD_GABUNG',$KD_GABUNG)->where('REF_PAKET',$request->REF_PAKET)->where('REF_LEVEL',$request->REF_LEVEL)->where('REF_KAT',$request->REF_KAT)->where('REF_SISWA',$request->REF_SISWA)->exists();
  if($cek_exist){
    return "error:exists";
  }
  RegistrationTempDetail::create($request->all());
  $temp_student_packet_detail = RegistrationTempDetail::where('KD_GABUNG',$KD_GABUNG)->get();
  return view('admin.registration.student-packets',compact('temp_student_packet_detail'));
}
}


