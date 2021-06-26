<?php

namespace App\Http\Controllers\Admin;

use App\PromoNews;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\PromoNewsType;
use App\JenjangBeasiswa;

class PromoController extends Controller
{
  public $dashboard = "admin";
  private $header_parameter = ['activePage' => 'promo', 'titlePage' =>'promo','activeMenu' => 'data-management','type' => 'promo','route' => 'admin-news-promo'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PromoNews $model)
    {
      $model = $model->selectRaw('promo_news.*,users.name as nama_author,promo_news_types.name as promo_type')->join("users","promo_news.author","=","users.id")->leftJoin('promo_news_types','promo_news_types.id','promo_news.type_id')->with('contact_us');
      $promo_types =PromoNewsType::get();
      return view('admin.promo_news.index',['dashboard'=> $this->dashboard,'data_news' => $model->orderBy('id','desc')->get(),'param' => $this->header_parameter,'local_param','promo_types' => $promo_types,'type_id' => 'all']); 
    }
    
    public function promo_types($id,PromoNews $model){
     $model = $model->select('promo_news.*','users.name as nama_author')->join("users","promo_news.author","=","users.id")->with('contact_us')->where('type_id',$id);
     $promo_types =PromoNewsType::get();
     return view('admin.promo_news.index',['dashboard'=> $this->dashboard,'data_news' => $model->orderBy('id','desc')->get(),'param' => $this->header_parameter,'local_param','promo_types' => $promo_types,'type_id' => $id]); 
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PromoNews $model)
    {
      $tags = $model::existingTags()->pluck('name');
      $promo_types =PromoNewsType::get();

      $jenjang_beasiswa = JenjangBeasiswa::get();
        return view('admin.promo_news.create',['tags' => $tags,'promo_types' => $promo_types,'param' => $this->header_parameter,'jenjang_beasiswa' => $jenjang_beasiswa]);//
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $news_body=$request->news_body;
      $title = $request->title;
      $slug = $this->setSlug($title);
      $root_path = date('Y').DIRECTORY_SEPARATOR .date('m').DIRECTORY_SEPARATOR .$slug;
      if($news_body != ""){
        $dom = new \domdocument();
      $dom->loadHtml('<?xml encoding="utf-8" ?>'.$news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
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

               $path = $root_path.'/'.$image_name;

               $upload_file = Storage::disk('news')->put($path, $data);

               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('news')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','news-img');
             }
           }



           $news_body = $dom->savehtml();
         }

         $gambar =$request->file('gambar');
         $news = new PromoNews;
         $news->title = $title;
         if($request->start_date != ""){
           $start_date =  new DateTime($request->start_date." ".$request->start_time);
           $start_date->format('Y-m-d H:i:s');
           $news->start_date = $start_date;
         }
         if($request->end_date != ""){
           $end_date =  new DateTime($request->end_date." ".$request->end_time);
           $end_date->format('Y-m-d H:i:s');
           $news->end_date = $end_date;
         }
         
         
         $news->image_desc = $request->image_desc;
         $news->version_date = $request->version_date;
         $news->version = $request->version;
         $news->type_id = $request->type_id;
         $news->slug = $slug;
         $news->author = auth()->user()->id;
         if(!empty($gambar)){
          $ext_gambar = $gambar->getClientOriginalExtension();
          $nama_gambar = $gambar->getClientOriginalName();
          $path_gambar = $gambar->storeAs($root_path, time().$nama_gambar,'news');
          $news->image = $path_gambar;
        }


        $news->body = $news_body;
        $status = $request->status;
        if($status == "on"){
          $news->status = 1;
        }else{
          $news->status = 0;
        }

        $news->save();
        $news->tag(explode(',', $request->tags));
        $news->tag($request->jenjang);

        return redirect()->route($this->header_parameter['route'].'.index',$this->header_parameter['type'])->withStatus(__(ucwords($this->header_parameter['type']).' successfully created.'));
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // echo $id;//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request,PromoNews $model)
    {
      $news = $model::where('id',$id)->first();
      $tags = $news::existingTags()->pluck('name');
      $this_tags = $news::thisNewsTags($id)->pluck('name');
      $tagged_jenjang = $news::thisJenjangTags($id,1)->pluck('name');
      $jenjang_beasiswa = \Conner\Tagging\Model\Tag::inGroup('Jenjang')->get();

      foreach($tagged_jenjang as $tag_jenjang){

       $key_jenjang = key($jenjang_beasiswa->where('name',$tag_jenjang)->toArray());
       $jenjang_beasiswa[$key_jenjang]->tagged = "true";
     }
     $promo_types =PromoNewsType::get();
     return view('admin.promo_news.edit',['dashboard' => $this->dashboard,'param'=> $this->header_parameter,'id' => $id,'news' => $news,'tags'=>$tags,'this_tags' => $this_tags,'promo_types' => $promo_types,'jenjang_beasiswa' => $jenjang_beasiswa,'tagged_jenjang' => $tagged_jenjang]);
        //
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
      $news = PromoNews::find($id);
      $news_body=$request->news_body;

      $title = $request->title;
      $slug = $request->slug;
      $root_path = date('Y').'/'.date('m').'/'.$slug;
      if($news_body != ""){
        $dom = new \domdocument();
      $dom->loadHtml('<?xml encoding="utf-8" ?>'.$news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
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

               $path = $root_path.'/'.$image_name;

               Storage::disk('news')->put($path, $data);

               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('news')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','news-img');
             }
           }



           $news_body = $dom->savehtml();
           $news->body = $news_body;
         }
         $gambar =$request->file('gambar');


         $news->title = $title;
         if($request->start_date != ""){
           $start_date =  new DateTime($request->start_date." ".$request->start_time);
           $start_date->format('Y-m-d H:i:s');
           $news->start_date = $start_date;
         }

         if($request->end_date != ""){
           $end_date =  new DateTime($request->end_date." ".$request->end_time);
           $end_date->format('Y-m-d H:i:s');
           $news->end_date = $end_date;
         }
         

         $news->image_desc = $request->image_desc;
         $news->version_date = $request->version_date;
         $news->type_id = $request->type_id;
         $news->version = $request->version;
      //$news->slug = $slug;
         if(!empty($gambar)){
          $ext_gambar = $gambar->getClientOriginalExtension();
          $nama_gambar = $gambar->getClientOriginalName();
          $path_gambar = $gambar->storeAs($root_path, time().$nama_gambar,'news');
          $news->image = $path_gambar;
        }

        $status = $request->status;
        if($status == "on"){
          $news->status = 1;
        }else{
          $news->status = 0;
        }

        $news->save();
        $retag = explode(',', $request->tags);
        if($request->jenjang != ""){
          $retag = array_merge($retag,$request->jenjang);
          
        }
        $news->retag($retag);
        return redirect()->route('admin-news-promo.index')->withStatus('Promo successfully updated.');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PromoNews $model)
    {
      $model->destroy($id);
      return redirect()->route('admin-news-promo.index')->withStatus(__('Promo successfully deleted.'));
      
    }//
    public function setSlug($title){
      $model = new PromoNews;
      $slug = str_slug($title);

      if($model::whereSlug($slug)->exists()){
        $slug = $this->incrementSlug($title);
      }
      return $slug;
    }
    public function incrementSlug($title){
      $model = new PromoNews;
      $slug = str_slug($title);
      $max = $model::whereTitle($title)->latest('id')->value('slug');
      if (is_numeric($max[-1])) {
       return preg_replace_callback('/(\d+)$/', function ($mathces) {
         return $mathces[1] + 1;
       }, $max);
     }

     return "{$slug}-2";
   }
   public function contact_us($id, PromoNews $model){
    $news = $model::with('contact_us')->find($id);
    return view('admin.promo_news.data-contactus',['news' => $news]);
  }


  public function change_status(Request $request){
    if($request->status === "true"){
      $news = PromoNews::find($request->id);
      $news->status = 1;
      $news->save();
      return "true";
    }else{
      $news = PromoNews::find($request->id);
      $news->status = 0;
      $news->save();
      return "false";
    }
  }
}
