<?php

namespace App\Http\Controllers\Admin\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseEvent;
use App\EventsType;
use App\CoursePacket;
use App\Business;
use App\PacketPriceDetails;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;  

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = EventsType::with(['course_events' => function($query){
           return $query->selectRaw('course_events.*,tb_paket_bimbel.NAMA as course,tb_level.NAMA as level,tb_event_types.name as event_type')->join('tb_event_types','tb_event_types.id','course_events.REF_EVENT_TYPE')->join('tb_paket_bimbel','tb_paket_bimbel.KD','course_events.REF_PAKET')->join('tb_level','tb_level.KD','course_events.REF_LEVEL');
       }])->paginate(10);
        
        return view('admin.products.events.index',compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $courses = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD, REF_PAKET,REF_LEVEL, tb_paket_bimbel.NAMA as PAKET, tb_level.NAMA as LEVEL')->groupBy('KD','REF_PAKET','tb_paket_bimbel.NAMA','tb_level.NAMA','REF_LEVEL')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->where('pricelists.status',1)->get();
     $event_types = EventsType::whereIn('id',[2,3,4,5])->get();
     return view('admin.products.events.create',compact('courses','event_types'));
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = explode("###",$request->courses);
        $input_data = array();
        foreach($courses as $course){
            $data_arr = explode("|",$course);
            $REF_PAKET = $data_arr[0];
            $REF_LEVEL = $data_arr[1];
            array_push($input_data,['REF_EVENT_TYPE' => $request->event_type, 'REF_PAKET' => $REF_PAKET,'REF_LEVEL' => $REF_LEVEL,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
        $insert_course_event = CourseEvent::insertOnDuplicateKey($input_data);
        return redirect()->route('admin.course-events.index')->withStatus('Course Event has been successfully created !');
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
        $course_event = CourseEvent::where('REF_EVENT_TYPE',$id)->first();
        $courses = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD, REF_PAKET,REF_LEVEL, tb_paket_bimbel.NAMA as PAKET, tb_level.NAMA as LEVEL')->groupBy('KD','REF_PAKET','tb_paket_bimbel.NAMA','tb_level.NAMA','REF_LEVEL')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->where('pricelists.status',1)->get();
        $event_types = EventsType::whereIn('id',[2,3,4,5])->get();
        return view('admin.products.events.edit',compact('course_event','event_types','courses'));
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
        $course_event = CourseEvent::find($id)->update($request->all());
        return redirect()->route('admin.course-events.index')->withStatus('Course Event has been successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_course_event = CourseEvent::find($id)->delete();
        return redirect()->route('admin.course-events.index')->withStatus('Course Event has been successfully deleted !');
    }
}
