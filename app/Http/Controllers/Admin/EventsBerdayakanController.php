<?php

namespace App\Http\Controllers\Admin;

use App\EventsBerdayakan;
use App\EventsGuestBook;
use DB;
use App\Exports\EventsGuestBookExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EventsType;
use App\EventsArticle;
use DateTime;
use App\EventBrochure;
use App\EventVideo;
use App\EventPhoto;
use Illuminate\Http\File;
use App\School;
use App\SchoolProgram;
use App\Country;
use App\EventExhibitor;
use App\EventLobby;
use Illuminate\Support\Facades\Storage;

class EventsBerdayakanController extends Controller
{
    public $dashboard = "admin";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventsBerdayakan $events,EventsGuestBook $events_guestbook)
    {

      $events_types = EventsType::select('tb_event_types.id','tb_event_types.name')->join('tb_events_berdayakan','tb_events_berdayakan.event_type_id','tb_event_types.id')->groupBy('tb_events_berdayakan.event_type_id','tb_event_types.id','tb_event_types.name')->get();
      $events = $events->selectRaw('t.jlh,tb_events_berdayakan.*,tb_event_types.name as nama_jenis_event')->leftJoin(DB::raw('(SELECT REF_EVENT,COUNT(REF_EVENT) as jlh FROM tb_events_guestbook GROUP BY REF_EVENT) AS t'),'t.REF_EVENT','=','tb_events_berdayakan.kd')->leftJoin('tb_event_types','tb_events_berdayakan.event_type_id','=','tb_event_types.id')->orderBy('tb_events_berdayakan.updated_at','DESC')->orderBy('tb_events_berdayakan.id','DESC');
      $exhibitors = EventExhibitor::get();
      $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name,schools.address as address')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name','ASC')->get();
      $countries = Country::orderBy('name')->get();
      return view('admin.events-berdayakan.index',['events_types' => $events_types,'events' => $events->paginate(10),'type_id' => 'all','schools'=>$schools,'exhibitors' => $exhibitors,'countries' => $countries]); 
    //  $events = $events->select('*')->groupBy('REF_EVENT','KD','NAMA','EMAIL','NO_TELEPON','KELAS','created_at','updated_at');

    }

    public function event_types($id,Events $events,EventsGuestBook $events_guestbook){
      $events_types = EventsType::get();

      $events = $events->selectRaw('t.jlh,tb_events_berdayakan.*,tb_event_types.name as nama_jenis_event')->leftJoin(DB::raw('(SELECT REF_EVENT,COUNT(REF_EVENT) as jlh FROM tb_events_guestbook GROUP BY REF_EVENT) AS t'),'t.REF_EVENT','=','tb_events_berdayakan.kd')->leftJoin('tb_event_types','tb_events_berdayakan.event_type_id','=','tb_event_types.id')->where('event_type_id',$id)->orderBy('created_at','DESC');
      $exhibitors = EventExhibitor::get();
      $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name,schools.address as address')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name','ASC')->get();
      $countries = Country::orderBy('name')->get();
      return view('admin.events-berdayakan.index',['events_types' => $events_types,'events' => $events->paginate(10),'type_id' => $id,'schools' => $schools,'exhibitors' => $exhibitors,'countries' => $countries]); 
    }

    public function create()
{
  $event_types = EventsType::get();
        return view('admin.events-berdayakan.create',['event_types' => $event_types]);  //
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $kode = str_random(16);
      $jam_mulai =  new DateTime($request->jam_mulai);
      $jam_mulai->format('H:i:s');
      $jam_selesai =  new DateTime($request->jam_selesai);
      $jam_selesai->format('H:i:s');
      $request->merge(['jam_mulai' => $jam_mulai]);
      $request->merge(['jam_selesai' => $jam_selesai]);
      $path = date('Y').'/'.date('m').'/'.$kode.'/images';

      $events = new EventsBerdayakan;
      $request->merge(['kd' => $kode]);
      $request->merge(['status' => 1]);
      if($request->full_day_event == "on"){
        $request->merge(['full_day_event' => 1]);
      }else{
        $request->merge(['full_day_event' => 0]);
      }
      $events = $events->create($request->except('_token','_method'));

      if($request->event_type_id == "6"){
        $articles = new EventsArticle;
        $event_id = $events->id;
        $articles->event_id = $event_id;
        $title = $request->nama;
        $articles->title = $title;
        $slug = $this->setSlug($title);
        $articles->slug = $slug;
        $articles->author = auth()->user()->id;
        $articles->image_desc = $request->image_desc;
        $articles->version = $request->version;
        $articles->version_date = $request->version_date;
        $gambar =$request->file('gambar');
        if(!empty($gambar)){
          $ext_gambar = $gambar->getClientOriginalExtension();
          $nama_gambar = $gambar->getClientOriginalName();
          $path_gambar = $gambar->storeAs($path, time().$nama_gambar,'events');
          $articles->image = $path_gambar;
        }
        $status = $request->status;
        if($request->full_day_event == "on"){
          $request->merge(['jam_mulai' => NULL]);
          $request->merge(['jam_selesai' => NULL]);
          $request->merge(['full_day_event' => 1]);
        }else{
          $request->merge(['full_day_event' => 0]);
        }
        $news_body=$request->news_body;
        if($news_body != ""){
          $dom = new \domdocument();
      $dom->loadHtml($news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
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
               $image_name= time().$k.'.'.$mimetype;

               $path = $path.'/'.$image_name;

               Storage::disk('events')->put($path, $data);

               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('events')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','news-img');
               $img->removeAttribute('style');
               $img->setattribute('style','width:100%;height:auto;');
             }
           }
           $news_body = $dom->savehtml();
         }
         $articles->body = $news_body;
         $articles->save();
         $articles->tag(explode(',', $request->tags));

       }


       return redirect()->route('admin-events-berdayakan.index')->withStatus("Events Has Been Successfully Created");
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      $event_type_id = $request->event_type_id;
      $events = Events::where('event_type_id',$event_type_id)->orderBy('created_at','DESC')->get();
      return view('admin.events-berdayakan.events',['events'=> $events]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $events = new EventsBerdayakan;
      $events = $events->find($id);
      $event_types = EventsType::get();
      if($events->event_type_id == 6){

        $articles = EventsArticle::where('event_id',$id)->first();
        if($articles){
          $tags = $articles::existingTags()->pluck('name');
          $this_tags = $articles::thisNewsTags($articles->id)->pluck('name');
        }else{
         $tags = [];
         $this_tags = [];
         $articles = new \stdClass();
         $articles->status = "";
         $articles->image = "";
         $articles->image_desc = "";
         $articles->body = "";
         $articles->version = "";
         $articles->version_date = "";

       }
     }else{
      $tags = [];
      $this_tags = [];
      $articles = new \stdClass();
      $articles->status = "";
      $articles->image = "";
      $articles->image_desc = "";
      $articles->body = "";
      $articles->version = "";
      $articles->version_date = "";
    }
    $param = ['id' => $id, 'events' => $events,'event_types' => $event_types,'tags' => $tags,'this_tags' => $this_tags,'articles' => $articles];
    return view('admin.events-berdayakan.edit',$param);

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
        $events = new EventsBerdayakan;//
        if($request->full_day_event == "on"){
          $request->merge(['jam_mulai' => NULL]);
          $request->merge(['jam_selesai' => NULL]);
          $request->merge(['full_day_event' => 1]);
        }else{
          $request->merge(['full_day_event' => 0]);
        }
        $kode = $events->kode;
        
        if($request->event_type_id == "6"){
          $articles = EventsArticle::where('event_id',$id)->first();
          if($articles){
            $event_id = $id;
            $articles->event_id = $event_id;
            $title = $request->nama;
            $articles->title = $title;
            $articles->author = auth()->user()->id;
            $articles->image_desc = $request->image_desc;
            $articles->version = $request->version;
            $articles->version_date = $request->version_date;

            $path = date('Y').'/'.date('m').'/'.$kode.'/images';

            $gambar =$request->file('gambar');
            if(!empty($gambar)){
              $ext_gambar = $gambar->getClientOriginalExtension();
              $nama_gambar = $gambar->getClientOriginalName();
              $path_gambar = $gambar->storeAs($path, time().$nama_gambar,'events');
              $articles->image = $path_gambar;
            }
            $status = $request->status;
            if($status == "on"){
              $articles->status = 1;
            }else{
              $articles->status = 0;
            }
            $news_body=$request->news_body;
            if($news_body != ""){
              $dom = new \domdocument();
      $dom->loadHtml($news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
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
               $image_name= time().$k.'.'.$mimetype;

               $path = $path.'/'.$image_name;

               Storage::disk('events')->put($path, $data);

               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('events')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','news-img');
               $img->removeAttribute('style');
               $img->setattribute('style','width:100%;height:auto;');
             }
           }
           $news_body = $dom->savehtml();
         }
         $articles->body = $news_body;
         $articles->save();
         $articles->retag($request->tags);
       }else{
        $articles = new EventsArticle;
        $event_id = $id;
        $articles->event_id = $event_id;
        $title = $request->nama;
        $articles->title = $title;
        $slug = $this->setSlug($title);
        $articles->slug = $slug;
        $articles->author = auth()->user()->id;
        $articles->image_desc = $request->image_desc;
        $articles->version = $request->version;
        $articles->version_date = $request->version_date;
        $gambar =$request->file('gambar');
        if(!empty($gambar)){
          $ext_gambar = $gambar->getClientOriginalExtension();
          $nama_gambar = $gambar->getClientOriginalName();
          $path_gambar = $gambar->storeAs($path, time().$nama_gambar,'events');
          $articles->image = $path_gambar;
        }
        $status = $request->status;
        if($status == "on"){
          $articles->status = 1;
        }else{
          $articles->status = 0;
        }
        $news_body=$request->news_body;
        if($news_body != ""){
          $dom = new \domdocument();
      $dom->loadHtml($news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
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
               $image_name= time().$k.'.'.$mimetype;

               $path = $path.'/'.$image_name;

               Storage::disk('events')->put($path, $data);

               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('events')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','news-img');
               $img->removeAttribute('style');
               $img->setattribute('style','width:100%;height:auto;');
             }
           }
           $news_body = $dom->savehtml();
         }
         $articles->body = $news_body;
         $articles->save();
         $articles->tag(explode(',', $request->tags));
       }

     }
     
     $events->find($id)->update($request->except('status'));
     return redirect()->route('admin-events-berdayakan.index')->withStatus("Events Has Been Successfully Updated");
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $events = new EventsBerdayakan;
      $events = $events->find($id)->delete();
      return redirect()->route('admin-events-berdayakan.index')->withStatus("Events Has Been Successfully Deleted");
        //
    }
}
