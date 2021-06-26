<?php

namespace App\Http\Controllers\Admin;

use App\Events;
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
class EventsController extends Controller
{
  public $dashboard = "admin";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Events $events,EventsGuestBook $events_guestbook)
    {
    //  $events = DB::select(DB::raw("select tb_events.*,count(tbg.kd) from tb_events left join tb_events_guestbook tbg on tb_events.kd = tbg.REF_EVENT group by tb_events.kd"));
      $events_types = EventsType::get();
      $events = $events->selectRaw('t.jlh,tb_events.*,tb_event_types.name as nama_jenis_event')->leftJoin(DB::raw('(SELECT REF_EVENT,COUNT(REF_EVENT) as jlh FROM tb_events_guestbook GROUP BY REF_EVENT) AS t'),'t.REF_EVENT','=','tb_events.kd')->leftJoin('tb_event_types','tb_events.event_type_id','=','tb_event_types.id')->orderBy('tb_events.updated_at','DESC')->orderBy('tb_events.id','DESC');
      $exhibitors = EventExhibitor::get();
      $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name,schools.address as address')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name','ASC')->get();
      $countries = Country::orderBy('name')->get();
      return view('admin.events.index',['events_types' => $events_types,'events' => $events->paginate(10),'type_id' => 'all','schools'=>$schools,'exhibitors' => $exhibitors,'countries' => $countries]); 
    //  $events = $events->select('*')->groupBy('REF_EVENT','KD','NAMA','EMAIL','NO_TELEPON','KELAS','created_at','updated_at');

    }

    public function event_types($id,Events $events,EventsGuestBook $events_guestbook){
      $events_types = EventsType::get();

      $events = $events->selectRaw('t.jlh,tb_events.*,tb_event_types.name as nama_jenis_event')->leftJoin(DB::raw('(SELECT REF_EVENT,COUNT(REF_EVENT) as jlh FROM tb_events_guestbook GROUP BY REF_EVENT) AS t'),'t.REF_EVENT','=','tb_events.kd')->leftJoin('tb_event_types','tb_events.event_type_id','=','tb_event_types.id')->where('event_type_id',$id)->orderBy('created_at','DESC');
      $exhibitors = EventExhibitor::get();
      $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name,schools.address as address')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name','ASC')->get();
      $countries = Country::orderBy('name')->get();
      return view('admin.events.index',['events_types' => $events_types,'events' => $events->paginate(10),'type_id' => $id,'schools' => $schools,'exhibitors' => $exhibitors,'countries' => $countries]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exhibitors_list(Request $request){
      $exhibitors = EventExhibitor::where('event_id',$request->event_id)->get();
      $lobby = EventLobby::find($request->event_id);
      return view('admin.events.expo.exhibitors-list',['exhibitors' => $exhibitors,'lobby' => $lobby]);
    }
    public function select_school_ajax(Request $request){
      if($request->school_id != ""){
        $school = School::find($request->school_id);
        $course =SchoolProgram::select('school_courses.name as course_name')->where('school_id',$request->school_id)->groupBy('course_id','school_courses.name')->join('school_courses','school_courses.id','school_programs.course_id')->pluck('course_name')->implode("|");
        $school->course = $course;
        return $school->toJson();
      }else{
        return "";
      }
    }

    public function save_exhibitors(Request $request){
      if($request->cmd == "save"){
        if($request->type == "school"){
          $school = School::find($request->school_id);

          if($request->name == ""){
            $request->merge(['name' => $school->name]);
          }
          if($request->country_id == ""){

            $request->merge(['country_id' => $school->country_id]);
          }
          if($request->course == ""){
           $course =SchoolProgram::select('school_courses.name as course_name')->where('school_id',$request->school_id)->groupBy('course_id','school_courses.name')->join('school_courses','school_courses.id','school_programs.course_id')->pluck('course_name')->implode("|");
           $request->merge(['course' => $course]);
         }
         if($request->file_logo == ""){
           $request->merge(['logo' => $school->logo]);
         }
       }
       $kode = Events::find($request->event_id)->kd;
       $path = date('Y').'/'.date('m').'/'.$kode.'/'.'exhibitors';
       $gambar =$request->file('file_logo');
       if(!empty($gambar)){
        $ext_gambar = $gambar->getClientOriginalExtension();
        $path_gambar = $gambar->storeAs($path, str_slug($request->name).'-'.uniqid().'.'.$ext_gambar,'events');
        $request->merge(['logo' => $path_gambar]);
      }
      $request->merge(['about' => str_replace(array("\r\n", "\r", "\n"), " ",$request->about)]); 

      $save_exhibitors = EventExhibitor::create($request->all());
    }else if($request->cmd == "update"){
      if($request->type == "school"){
        $school = School::find($request->school_id);
        if($request->name == ""){
          $request->merge(['name' => $school->name]);
        }
        if($request->country_id == ""){
          $request->merge(['country_id' => $school->country_id]);
        }
        if($request->course == ""){
         $course =SchoolProgram::select('school_courses.name as course_name')->where('school_id',$request->school_id)->groupBy('course_id','school_courses.name')->join('school_courses','school_courses.id','school_programs.course_id')->pluck('course_name')->implode("|");
         $request->merge(['course' => $course]);
       }
       if($request->file_logo == ""){
         $request->merge(['logo' => $school->logo]);
       }
     }
     $kode = Events::find($request->event_id)->kd;
     $path = date('Y').'/'.date('m').'/'.$kode.'/'.'exhibitors';
     $gambar =$request->file('file_logo');
     if(!empty($gambar)){
      $ext_gambar = $gambar->getClientOriginalExtension();
      $path_gambar = $gambar->storeAs($path, str_slug($request->name).'-'.uniqid().'.'.$ext_gambar,'events');
      $request->merge(['logo' => $path_gambar]);
    }
    $request->merge(['about' =>  str_replace(array("\r\n", "\r", "\n"), " ",$request->about)]);
   
    $edit_exhibitors = EventExhibitor::find($request->id)->update($request->all());
  }
  else if($request->cmd == "delete"){
    $delete_exhibitors = EventExhibitor::find($request->id)->delete();
  }
  $exhibitors = EventExhibitor::where('event_id',$request->event_id)->get();

  return view("admin.events.expo.exhibitors",['exhibitors' => $exhibitors]);
}

public function save_lobby(Request $request){
  $cmd = $request->cmd;
  if($cmd == "save"){
    $gambar = $request->file('lobby_gambar');
    $kode = Events::find($request->event_id)->kd;

    $path = date('Y').'/'.date('m').'/'.$kode.'/images';

    if(!empty($gambar)){
      $ext_gambar = $gambar->getClientOriginalExtension();
      $path_gambar = $gambar->storeAs($path, 'background'.'.'.$ext_gambar,'events');
      $request->merge(['background' => $path_gambar]);
    }
    $cek_exist = EventLobby::find($request->event_id);
    if($cek_exist){
      $lobby = $cek_exist->update($request->all());
    }else{
      $lobby = EventLobby::create($request->all());
    }
  }
}

public function create()
{
  $event_types = EventsType::get();
        return view('admin.events.create',['event_types' => $event_types]);  //
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

      $events = new Events;
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


       return redirect()->route('admin-events.index')->withStatus("Events Has Been Successfully Created");
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
      return view('admin.events.events',['events'=> $events]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $events = new Events;
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
    return view('admin.events.edit',$param);

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
        $events = new Events;//
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
     return redirect()->route('admin-events.index')->withStatus("Events Has Been Successfully Updated");
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $events = new Events;
      $events = $events->find($id)->delete();
      return redirect()->route('admin-events.index')->withStatus("Events Has Been Successfully Deleted");
        //
    }
    public function data_guestbook($id){

      $events = new Events;
      $nama_events = $events->where('kd','=',$id)->value('nama');
    //  $events = $events->select('tb_events_guestbook.nama','tb_events_guestbook.EMAIL','tb_events_guestbook.no_telepon','tb_events_guestbook.kelas')->where('tb_events_guestbook.ref_event','=',$id);
      $events = $events->selectRaw('tg.NAMA,tg.EMAIL,tg.NO_TELEPON,tg.KELAS,tg.sosmed_ig,tg.minat_jurusan')->Join(DB::raw('(select * from tb_events_guestbook) as tg' ),'tg.REF_EVENT','=','tb_events.kd')->where('tg.REF_EVENT','=',$id)->groupBy('tg.EMAIL')->get();
      //SELECT tg.nama,tg.EMAIL,tg.no_telepon,tg.kelas,tg.created_at,te.`NAMA` AS nama_acara FROM tb_events_guestbook tg INNER JOIN tb_events te ON te.kd = tg.ref_event WHERE tg.created_at > "2019-11-04 23:59:59"  GROUP BY email

      return view('admin.events.data-guestbook',['id'=> $id, 'events' => $events,'nama_events' => $nama_events]);
    }
    public function data_contactus($id, Events $model){
      $events = $model::with('articles.contactus')->find($id);
      return view('admin.events.data-contactus',['events' => $events->articles]);
    }

    public function events_guestbook_export($id){
      $events = new Events;
      $nama_events = $events->where('id','=',$id)->value('nama');
  /*  Excel::create('Contacto', function($excel) use ($events) {

  })->export('xlsx', ['Access-Control-Allow-Origin'=>'*']);*/
/*return Excel::create('Filename', function($excel) {

})->export('xls');*/
return (new EventsGuestBookExport)->byEvent($id)->download($nama_events.'.xlsx');
}

public function setSlug($title){
  $model = new EventsArticle;
  $slug = str_slug($title);
  if($model::whereSlug($slug)->exists()){
    $slug = $this->incrementSlug($title);
  }
  return $slug;
}

public function incrementSlug($title){
  $model = new EventsArticle;
  $slug = str_slug($title);
  $max = $model::whereTitle($title)->latest('id')->value('slug');
  if (is_numeric($max[-1])) {
   return preg_replace_callback('/(\d+)$/', function ($mathces) {
     return $mathces[1] + 1;
   }, $max);
 }

 return "{$slug}-2";
}


public function change_status(Request $request){
  if($request->status === "true"){
    $events = Events::find($request->id);
    $events->status = 1;
    $events->save();
    return "true";
  }else{
    $events = Events::find($request->id);
    $events->status = 0;
    $events->save();
    return "false";
  }
}

public function expo_brochure_ajax(Request $request){
  if($request->cmd == "add"){
    $brochure = $request->file('brochure');
    if(!empty($brochure)){
      $kode = Events::find($request->event_id)->kd;
      $path = date('Y').'/'.date('m').'/'.$kode.'/'.'brochures';
      $ext_brochure = $brochure->getClientOriginalExtension();
      $path_brochure = $brochure->storeAs($path, str_slug($request->name,"-").'-'.uniqid().'.'.$ext_brochure,'events');
      $request->merge(['path' => $path_brochure]);
      $finfo = new \finfo(FILEINFO_MIME_TYPE);
      $request->merge(['mime_type' => $finfo->file($request->file('brochure'))]);
    }
    $add_brochure =  EventBrochure::create($request->all());
  }else if($request->cmd == "update"){
    $brochureModel = EventBrochure::find($request->id);

    $brochure = $request->file('brochure');
    if(!empty($brochure)){
      Storage::disk('events')->delete($brochureModel->path);
      $kode = Events::find($request->event_id)->kd;
      $path = date('Y').'/'.date('m').'/'.$kode.'/'.'brochures';
      $ext_brochure = $brochure->getClientOriginalExtension();
        // $nama_brochure = $brochure->getClientOriginalName();
      $path_brochure = $brochure->storeAs($path, str_slug($request->name,"-").'-'.uniqid().'.'.$ext_brochure,'events');
      $request->merge(['path' => $path_brochure]);
      $finfo = new \finfo(FILEINFO_MIME_TYPE);
      $request->merge(['mime_type' => $finfo->file($request->file('brochure'))]);

    }else{
      if($request->name != $brochureModel->name){
        $new_path = explode("/",$brochureModel->path);
        $ext_brochure = pathinfo(public_path($brochureModel->path),PATHINFO_EXTENSION);
        $new_name = str_slug($request->name,"-").'-'.uniqid();
        if($ext_brochure != ""){
          $new_name.=".".$ext_brochure;
        }
        $new_path[count($new_path)-1] = $new_name;
        $new_path = implode("/", $new_path);

        Storage::disk('events')->move($brochureModel->path,$new_path);
        $request->merge(['path' => $new_path]);
      }
    }
    $update_brochure =  $brochureModel->update($request->all());
  }else if($request->cmd == "delete"){
    $delete_brochure = EventBrochure::find($request->id)->delete();
  }
  $brochures = EventBrochure::where('exhibitor_id',$request->exhibitor_id)->where('event_id',$request->event_id)->get();
  //return response()->file(public_path()."/events/".$brochures[0]->path);
  return view("admin.events.expo.brochure",["brochures" => $brochures]);
}
public function expo_video_ajax(Request $request){
  if($request->cmd == "add"){
    $add_video =  EventVideo::create($request->all());
  }else if($request->cmd == "update"){
    $update_video = EventVideo::find($request->id)->update($request->all());
  }else if($request->cmd == "delete"){
    $delete_video = EventVideo::find($request->id)->delete();
  }
  $videos = EventVideo::where('exhibitor_id',$request->exhibitor_id)->where('event_id',$request->event_id)->get();
  return view("admin.events.expo.video",["videos" => $videos]);
}
public function expo_about_ajax(Request $request){
  if($request->cmd == "update"){

  }
}
public function expo_photo_ajax(Request $request){

  if($request->cmd == "add"){
    $photo = $request->file('file');
    if(!empty($photo)){
      $kode = Events::find($request->event_id)->kd;
      $path = date('Y').'/'.date('m').'/'.$kode.'/'.'photos';
      $ext_photo = $photo->getClientOriginalExtension();
      $path_photo = $photo->storeAs($path, "photo".'-'.uniqid().'.'.$ext_photo,'events');

      $finfo = new \finfo(FILEINFO_MIME_TYPE);
      $request->merge(['mime_type' => $finfo->file($request->file('file'))]);
      $request->merge(["path" => $path_photo]);

    }
    $upload_photo = EventPhoto::create($request->all());


  }else if($request->cmd == "delete"){
    $delete_photo = EventPhoto::find($request->id)->delete();
  }
  $photo_output = EventPhoto::where('exhibitor_id',$request->exhibitor_id)->where('event_id',$request->event_id)->get()->toJson();
  return $photo_output;
}
}