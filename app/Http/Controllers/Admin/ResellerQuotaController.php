<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reseller;
use App\Models\ResellerQuota;
use App\Form\RegisPaket;
use App\Form\RegisPaketDtl;
use App\CoursePacket;
use App\PacketPriceDetails;
use App\ProductPriceList;


class ResellerQuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $reseller_id;

    public function __construct(Request $request){
        $this->reseller_id = $request->reseller_id;
     }

    public function index()
    {
        $reseller_id = $this->reseller_id;
        $reseller = Reseller::find($reseller_id);
        $reseller_quotas = ResellerQuota::selectRaw('reseller_quotas.*,tb_paket_bimbel.NAMA as NAMA_PAKET')->with(['registration_data' => function($query){
            return $query->distinct()->get();
        }])->where('reseller_id',$reseller_id)->join('tb_paket_bimbel','tb_paket_bimbel.KD','reseller_quotas.REF_PAKET')->get();
        return view('admin.reseller.quota.index',compact('reseller','reseller_quotas','reseller_id'));
    }
    public function registration_data($slug){
        $reseller_quota = ResellerQuota::where('slug',$slug)->first();
        $reseller_id = $reseller_quota->reseller_id;
        $reseller_quota_id = $reseller_quota->id;
        $registration_data = RegisPaket::selectRaw('tb_calonsiswa.*')->join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','tb_calonsiswa.KD')->join('reseller_quotas','reseller_quotas.id','tb_calonsiswa_dtlpaket.reseller_quota_id')->where('tb_calonsiswa_dtlpaket.reseller_quota_id',$reseller_quota_id)->distinct()->get();
        return view('admin.reseller.quota.registration_data',compact('registration_data','reseller_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricelists = ProductPriceList::where('status',1)->get();
        $reseller_id = $this->reseller_id;
        return view('admin.reseller.quota.create',compact('pricelists','reseller_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $kode = Reseller::find($this->reseller_id)->kode;
        $nama_paket = CoursePacket::find($request->REF_PAKET)->NAMA;
        $nama_pricelist = ProductPriceList::find($request->REF_PRICELIST)->name;
        $slug = str_slug(date("dmY")." form pendaftaran ".$nama_paket." ".$nama_pricelist);
        $request->merge(['slug' => $slug]);
        $create = ResellerQuota::create($request->all());
        return redirect()->route('admin-reseller-quota.index',$this->reseller_id)->withStatus("Data successfully inputed !");
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
    public function edit($id,$quota_id)
    {
        $reseller_id = $this->reseller_id;
        $reseller_quota = ResellerQuota::find($quota_id);
        $pricelists = ProductPriceList::where('status',1)->get();
        return view('admin.reseller.quota.edit',compact('reseller_quota','reseller_id','pricelists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$quota_id)
    {
        $update = ResellerQuota::find($quota_id)->update($request->all());
        return redirect()->route('admin-reseller-quota.index',$this->reseller_id)->withStatus("Data successfully updated !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$quota_id)
    {
        ResellerQuota::find($quota_id)->delete();
         return redirect()->route('admin-reseller-quota.index',$this->reseller_id)->withStatus("Data successfully deleted !");
    }
}
