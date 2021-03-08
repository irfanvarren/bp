<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Briefing;
use App\Karyawan;
use App\User;
use Carbon\Carbon;
use App\Mail\BriefingMail;
use App\BriefingDetail;
use Illuminate\Support\Facades\Mail;
class BriefingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $briefings = Briefing::with('attendees')->get();
        return view('admin.company-data.briefing.index',['briefings' => $briefings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employees = Karyawan::selectRaw('ID_KARYAWAN,CONCAT(NAMA," (",ID_KARYAWAN,")") as NAMA')->get();
        return view('admin.company-data.briefing.create',['employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $date = date("dmY",strtotime($request->date));
        $no = count(Briefing::whereDate('date', $request->date)->get()) + 1;
        $reference = "B-".$date."-".$no;
        $request->merge(['reference' => $reference]);

        $attendees = explode('|',$request->attendees);
        $mail_lists = Karyawan::selectRaw('IF(users.email != "",users.email,tb_karyawan.EMAIL_1 ) as email,tb_karyawan.ID_KARYAWAN,tb_karyawan.NAMA')->leftJoin('users','users.employee_id','=','tb_karyawan.ID_KARYAWAN')->whereIn('tb_karyawan.ID_KARYAWAN',$attendees)->get('email','tb_karyawan.ID_KARYAWAN','tb_karyawan.NAMA');
        
        $note_taker_name = Karyawan::find($request->note_taker)->NAMA;
        $request->merge(['note_taker_name' => $note_taker_name]);
        $request->merge(['mail_lists' => $mail_lists]);
        $create_briefing = Briefing::create($request->all());
        $request->merge(['id_briefing' => $create_briefing->id]);
        foreach($mail_lists as $mail_list){
             $request->merge(['id_karyawan' => $mail_list->ID_KARYAWAN]);
            if($mail_list->email != "" && filter_var($mail_list->email, FILTER_VALIDATE_EMAIL)){
                $request->merge(['mail_to' => $mail_list->email]);
               
                Mail::send(new BriefingMail($request));
                if(Mail::failures()){
                    $request->merge(['status' => 0]);
                    $request->merge(['note' => "Failed to send email"]);
                }else{
                    $request->merge(['status' => 1]);
                }
            }else{
                $request->merge(['status' => 0]);
                $request->merge(['note' => "Email not found !"]);
            }
            BriefingDetail::create($request->all());
        }
        

        return redirect()->route('admin-briefing.index')->withStatus('Briefing has been successfully created !');
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
        $briefing = Briefing::find($id);
        $briefing->attendees = BriefingDetail::where('id_briefing',$id)->pluck('id_karyawan');

         $employees = Karyawan::selectRaw('ID_KARYAWAN,CONCAT(NAMA," (",ID_KARYAWAN,")") as NAMA')->get();
        return view('admin.company-data.briefing.edit',compact('briefing','employees'));
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
        $attendees = explode('|',$request->attendees);
        $mail_lists = Karyawan::selectRaw('IF(users.email != "",users.email,tb_karyawan.EMAIL_1 ) as email,tb_karyawan.ID_KARYAWAN,tb_karyawan.NAMA')->leftJoin('users','users.employee_id','=','tb_karyawan.ID_KARYAWAN')->whereIn('tb_karyawan.ID_KARYAWAN',$attendees)->get('email','tb_karyawan.ID_KARYAWAN','tb_karyawan.NAMA');
        $note_taker_name = Karyawan::find($request->note_taker)->NAMA;
        $request->merge(['note_taker_name' => $note_taker_name]);
        $request->merge(['mail_lists' => $mail_lists]);
        $delete_previous = BriefingDetail::where('id_briefing',$id)->delete();
        $update = Briefing::find($id)->update($request->all());
        $request->merge(['id_briefing' => $id]);
        foreach($mail_lists as $mail_list){
             $request->merge(['id_karyawan' => $mail_list->ID_KARYAWAN]);
            if($mail_list->email != "" && filter_var($mail_list->email, FILTER_VALIDATE_EMAIL)){
                $request->merge(['mail_to' => $mail_list->email]);
               
                Mail::send(new BriefingMail($request));
                if(Mail::failures()){
                    $request->merge(['status' => 0]);
                    $request->merge(['note' => "Failed to send email"]);
                }else{
                    $request->merge(['status' => 1]);
                }
            }else{
                $request->merge(['status' => 0]);
                $request->merge(['note' => "Email not found !"]);
            }
            BriefingDetail::create($request->all());
        }
        

        return redirect()->route('admin-briefing.index')->withStatus('Briefing has been successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Briefing::find($id)->delete();
        return redirect()->route('admin-briefing.index')->withStatus('Briefing has been successfully deleted !');
    }
}
