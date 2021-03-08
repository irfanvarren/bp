<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\NewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;

use Spatie\Permission\Models\Permission;
use Auth;

class NewsController extends Controller
{
  public $dashboard = "admin";
  private $header_parameter = ['activePage' => 'news', 'titlePage' =>'news','activeMenu' => 'data-management','type' => 'news','route' => 'admin-news'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

    Admin sm murid
    buat blog
    admin : crud
    murid: cu(approve dulu),r. Ndk perlu delete

     */

    public function index(News $model)
    {

      if(\Auth::user()->can('admin.news.index')){
      $model = $model->select('news.*','users.name as nama_author','news_types.name as type_name')->join("users","news.author","=","users.id")->join('news_types','news_types.id','news.type_id');
      $news_types = NewsType::get(); 
      return view('admin.news.index',['dashboard'=> $this->dashboard,'data_news' => $model->orderBy('id','desc')->paginate(8),'param' => $this->header_parameter,'local_param','type_id' => 'all','news_types' => $news_types]); 
      }else{
        abort(401);
      }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $model)
    {
      $tags = $model::existingTags()->pluck('name');
      $news_types = NewsType::get();
        return view('admin.news.create',['tags' => $tags,'param' => $this->header_parameter,'news_types' => $news_types]);//
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
    //  $title = strtolower($request->title);
    $title = $request->title;

    //  dd($news_body);
      $dom = new \domdocument();
      $dom->loadHtml('<?xml encoding="utf-8" ?>'.$news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
LIBXML_NOWARNING  );
      $images = $dom->getelementsbytagname('img');
  $slug = $this->setSlug($title);

  //    $path =public_path() .'/News'.'/'. date('Y').'/'.date('m').'/';
$root_path = date('Y').'/'.date('m').'/'.$slug;

//if (!is_dir('public' .'/news'.'/'.$path)) {
// dir doesn't exist, make it
//mkdir("$path",0777,true);
//}
    //    dd($path);
      //loop over img elements, decode their base64 src and save them to public folder,
      //and then replace base64 src with stored image URL.
        $gambar =$request->file('gambar');
              $news = new News;
              $news->title = $title;
              $news->slug = $slug;
              $news->author = auth()->user()->id;


      if(!empty($gambar)){
        $ext_gambar = $gambar->getClientOriginalExtension();
        $nama_gambar = $gambar->getClientOriginalName();
        $path_gambar = $gambar->storeAs($root_path, $nama_gambar,'news');
        $news->image = $path_gambar;
      }

      foreach($images as $k => $img){
          $data = $img->getattribute('src');


          if(preg_match('/data:image/', $data)){ // check apa terdapat string data:image
              
               preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups); // pecah-pecah string
                $mimetype = $groups['mime']; // ambil mimetype

               list($type, $data) = explode(';', $data); //mengambil tipe data dan blob dengan memecahkan string menggunakan karakter ;
               list(, $data)      = explode(',', $data); //mengambil data blob dengan memecahkan string menggunakan karakter ,

               $data = base64_decode($data); //
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
      $news->body = $news_body;
      $news->type_id =  $request->type_id;
      $news->author_name = $request->author_name;
      $news->image_desc = $request->image_desc;
      $news->type = "news";
      $status = $request->status;
          if($status == "on"){
            $news->status = 1;
          }else{
            $news->status = 0;
          }

      $news->save();
      $news->tag(explode(',', $request->tags));
      
      return redirect()->route('admin-news.index')->withStatus(__('News successfully created.'));
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
      $model = new News;
      $news = $model::where('id',$id)->first();
            $tags = $news::existingTags()->pluck('name');
            $this_tags = $news::thisNewsTags($id)->pluck('name');
      $news_types = NewsType::get();
      return view('admin.news.edit',['dashboard' => $this->dashboard,'param'=> $this->header_parameter,'id' => $id,'news' => $news,'tags'=>$tags,'this_tags' => $this_tags,'news_types' => $news_types]);
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
      $news_body=$request->news_body;
    
    //  $title = strtolower($request->title);
      $title = $request->title;
    //  dd($news_body);
      $dom = new \domdocument();
      $dom->loadHtml('<?xml encoding="utf-8" ?>'.$news_body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
      LIBXML_NOWARNING  );
      $images = $dom->getelementsbytagname('img');


  $slug = $request->slug;
  $root_path = date('Y').DIRECTORY_SEPARATOR .date('m').DIRECTORY_SEPARATOR .$slug;
        $gambar =$request->file('gambar');
              $news = News::find($id);
              $news->title = $title;
        //      $news->slug = $slug;

      if(!empty($gambar)){
        $ext_gambar = $gambar->getClientOriginalExtension();
        $nama_gambar = $gambar->getClientOriginalName();
        $path_gambar = $gambar->storeAs($root_path, $nama_gambar,'news');
        $news->image = $path_gambar;
      }
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
          
        $path = $root_path.DIRECTORY_SEPARATOR .$image_name;
      
        $upload_file = Storage::disk('news')->put($path, $data);
        
          $img->removeattribute('src');
          
          $img->setattribute('src', Storage::disk('news')->url($path));
                  $img->removeAttribute('class');
              $img->setattribute('class','news-img');
        }
        }



      $news_body = $dom->savehtml();
      $news->body = $news_body;
      $news->type_id =  $request->type_id;
      $news->author_name = $request->author_name;
      $news->image_desc = $request->image_desc;
      $status = $request->status;
          if($status == "on"){
            $news->status = 1;
          }else{
            $news->status = 0;
          }

      $news->save();
          $news->retag($request->tags);
       
      return redirect()->route('admin-news.index')->withStatus(__('News successfully updated.'));
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, News $model)
    {
      $model->destroy($id);
     
      return redirect()->route('admin-news.index')->withStatus(__('News successfully deleted.'));
      
    }//

    public function contact_us($id, News $model){
      $news = $model::with('contact_us')->find($id);
      return view('admin.news.data-contactus',['news' => $news]);
    }

    public function setSlug($title){
      $model = new News;
      $slug = str_slug($title);

      if($model::whereSlug($slug)->exists()){
        $slug = $this->incrementSlug($title);
      }
      return $slug;
    }
    public function incrementSlug($title){
      $model = new News;
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
        $news = News::find($request->id);
         $news->status = 1;
        $news->save();
        return "true";
      }else{
        $news = News::find($request->id);
         $news->status = 0;
        $news->save();
        return "false";
      }
    }

     public function news_types($id,News $model){
      $news_types = NewsType::get();

     $news = $model->select('news.*','users.name as nama_author','news_types.name as type_name')->join("users","news.author","=","users.id")->join('news_types','news_types.id','news.type_id')->where('type_id',$id);

      return view('admin.news.index',['news_types' => $news_types,'data_news' => $news->paginate(10),'type_id' => $id,'param' => $this->header_parameter]); 
    }
}
