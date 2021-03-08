<?php

namespace App\Http\Controllers\Admin\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\OfferLetterSetting;
class OfferLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidang_usaha = Business::leftJoin('offer_letter_settings','offer_letter_settings.REF_BIDANGUSAHA','tb_bidangusaha.KD')->paginate(10);
        return view('admin.products.offer-letter.index',compact('bidang_usaha'));
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

    public function change_status(Request $request){
        if($request->status === "true"){
            $offer_letter = OfferLetterSetting::where('REF_BIDANGUSAHA',$request->id)->first();
            if(!$offer_letter){
                $offer_letter = new OfferLetterSetting();
            }
            $offer_letter->REF_BIDANGUSAHA = $request->id;
            $offer_letter->status = 1;
            $offer_letter->save();
            return "true";
        }else{
            $offer_letter = OfferLetterSetting::where('REF_BIDANGUSAHA',$request->id)->first();
            if(!$offer_letter){
                $offer_Letter = new OfferLetterSetting();
            }
            $offer_letter->REF_BIDANGUSAHA = $request->id;
            $offer_letter->status = 0;
            $offer_letter->save();
            return "false";
        }
    }
}
