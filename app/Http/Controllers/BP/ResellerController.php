<?php

namespace App\Http\Controllers\BP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;
use App\PaketBimbel;
use App\Models\Reseller;
use App\Models\ResellerQuota;
use App\Models\OnlineTest\OtRegistration;
use App\Form\RegisPaket;
use DB;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Mail\ResellerRegisterMail;

class ResellerController extends Controller
{

	public function index(){
		$languages = Language::orderBy('KD')->get();
		$products = PaketBimbel::where('REF_BAHASA',$languages->first()->KD)->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel.KD')->join(DB::raw('(select tb_paket_bimbel_dtlharga.REF_PAKET from tb_paket_bimbel_dtlharga left join pricelists on pricelists.KD = tb_paket_bimbel_dtlharga.KD where pricelists.status = 1 group by tb_paket_bimbel_dtlharga.REF_PAKET) as pricelist'),'tb_paket_bimbel.KD','pricelist.REF_PAKET')->where('course_packet_settings.status','!=',"0")->get();
		$reseller = Reseller::where('user_id',auth()->user()->id)->first();
		$online_test_registrations = OtRegistration::selectRaw('ot_registrations.*,ot_tests.name as test_name,ot_modules.name as module_name')->orderBy('ot_registrations.id','DESC')->join('ot_tests','ot_registrations.test_id','ot_tests.id')->leftJoin('ot_modules','ot_modules.id','ot_registrations.module_id')->where('reseller_id',$reseller->id)->get();
		if(!$reseller){
			return redirect('reseller/register');
		}
		$message = "";
		if($reseller->status == 0){
			$message = 'Akun reseller telah dinonaktifkan / masih belum diaktifkan oleh admin !';
		}
		$quotas = ResellerQuota::selectRaw('reseller_quotas.*,tb_paket_bimbel.NAMA')->with(['registration_data' => function($query){
			return $query->distinct()->get();
		}])->where('reseller_quotas.reseller_id',$reseller->id)->join('tb_paket_bimbel','tb_paket_bimbel.KD','reseller_quotas.REF_PAKET')->paginate(10);
		
		return view('reseller.index',compact('languages','products','quotas','reseller','message','online_test_registrations'));
	}

	public function registration_data($slug){
		$reseller_quota_id = ResellerQuota::where('slug',$slug)->first()->id;
		$registration_data = RegisPaket::selectRaw('tb_calonsiswa.*')->join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','tb_calonsiswa.KD')->join('reseller_quotas','reseller_quotas.id','tb_calonsiswa_dtlpaket.reseller_quota_id')->where('tb_calonsiswa_dtlpaket.reseller_quota_id',$reseller_quota_id)->distinct()->get();
		return view('reseller.registration_data',compact('registration_data'));
	}

	public function register(){
		$cek_exist = Reseller::where('user_id',auth()->user()->id)->first();
		if($cek_exist){
			return redirect('reseller')->withStatus('Anda telah terdaftar sebagai reseller');
		}
		return view('reseller.register');
	}

	public function post_register(Request $request){
		$tanggal_lahir = $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tgl_lahir;
		if(!checkdate($request->bulan_lahir,$request->tgl_lahir,$request->tahun_lahir)){
			return redirect('reseller/register')->withError('Tanggal lahir tidak valid');
		}
		$code = $this->generate_code($request->nama);
		$request->merge(['tanggal_lahir' => $tanggal_lahir]);
		$request->merge(['user_id' => auth()->user()->id]);
		$request->merge(['kode' => $code]);
		$cek_exist = Reseller::where('user_id',auth()->user()->id)->first();
		if($cek_exist){
			$reseller = $cek_exist;
		}else{
			$reseller = Reseller::create($request->all());
		}
		$path = "BP/reseller/".$reseller->id;
		if($request->hasFile('file_ktp')){
			$file_ktp = $request->file('file_ktp');
			$ext_ktp = $file_ktp->getClientOriginalExtension();
			$path_ktp = $file_ktp->storeAs($path, 'ktp-'.time().'.'.$ext_ktp,'local');
			$reseller->file_ktp = $path_ktp;
			$reseller->save();
		}
		$send_reseller_mail = Mail::send(new ResellerRegisterMail($request));
		Session::flash('status', 'Data berhasil diinput anda telah terdaftar sebagai reseller');
		return redirect('reseller');

	}

	public function generate_code($name){
		$code = mt_rand(pow(10, 4-1), pow(10, 4)-1);
		$initial = $this->generate_initial($name);
		$code = "R-".$initial.$code;
		$cek_code_exists = Reseller::where('kode',$code)->exists();
		if($cek_code_exists){
			return $this->generate_code();
		}
		return $code;
	}

	public function generate_initial(string $name) : string
	{
		$words = explode(' ', $name);
		if (count($words) >= 2) {
			return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
		}
		return $this->makeInitialsFromSingleWord($name);
	}

	protected function makeInitialsFromSingleWord(string $name) : string
	{
		preg_match_all('#([A-Z]+)#', $name, $capitals);
		if (count($capitals[1]) >= 2) {
			return substr(implode('', $capitals[1]), 0, 2);
		}
		return strtoupper(substr($name, 0, 2));
	}
}
