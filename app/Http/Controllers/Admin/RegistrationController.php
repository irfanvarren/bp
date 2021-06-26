<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration\Registration;
use App\Models\Registration\RegistrationDetail;
use App\Models\Registration\RegistrationStudentDetail;
use App\Models\Registration\RegistrationTempStudentDetail;
use App\Models\Registration\RegistrationTempDetail;
use App\Models\Admin\Accounting\Account;
use App\Models\Admin\Accounting\SubAccount;
use App\PacketPriceDetails;
use App\Perusahaan;
use App\Country;
use App\Sales;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::get();
        $companies = Perusahaan::get(); 
        $countries = Country::get();
        $temp_student_detail = RegistrationTempStudentDetail::get();
        
        $temp_student_packet_detail = RegistrationDetail::get();
        $student_detail = RegistrationStudentDetail::get();
        $kd_perusahaan = $companies[0]->INISIAL;
        $tahun = date('Y');
        $bulan = date('m');
        
        $no = $this->get_no($kd_perusahaan,$tahun,$bulan);
        $sales = Sales::where('AKTIF',1)->get();
        $pricelists = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD as REF_PRICELIST,pricelists.name')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->groupBy('tb_paket_bimbel_dtlharga.KD','pricelists.name')->where('status',1)->get();
        
        $accounts = SubAccount::get();
        return view('admin.registration.index',compact('registrations','companies','countries','temp_student_detail','temp_student_packet_detail','no','pricelists','student_detail','sales','accounts'));
    }

    public function get_no($kd_perusahaan,$tahun,$bulan){
        $no = "0001";
        $current_no = Registration::where('KD_1',$kd_perusahaan)->where('KD_2',$tahun)->where('KD_3',$bulan)->orderBy('KD_4','DESC')->value('KD_4');
        if($current_no != null){
            $no =  str_pad((string) $current_no + 1, 4, "0", STR_PAD_LEFT);
        }
        return $no;
    }

    public function post_data(Request $request){
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
        Registration::create($request->all());
        RegistrationTempStudentDetail::where('KD_GABUNG',$KD_GABUNG)->delete();
        return redirect('admin/registration')->withStatus('Data pendaftaran telah disimpan');
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
        //
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
        //
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
