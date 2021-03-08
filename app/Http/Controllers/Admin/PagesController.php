<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Pages;
use App\PageType;
use App\PageSubType;
use App\Models\Admin\Cms\PageContent;
use App\Jabatan;
use App\Divisi;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $dashboard = 'admin';
    public $grup_divisi = ['admission' => ['J2','J4','J5'],'marketing' => ['J6','J3'],'academic' => ['J5']];

    public function index(){
        $divisions = Divisi::paginate(10);
        return view('admin.pages.index',['divisions' => $divisions]);
    }

    public function old_index($divisi = null)
    {
      $pages = Pages::paginate(8);
      $jabatan = Jabatan::get();
      //array_keys
        return view('admin.pages.index',['pages' => $pages,'dashboard' => $this->dashboard,'divisi' => $this->grup_divisi]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $division = $request->division;

        $types = PageType::where('division_id',$division)->get();
        return view('admin.pages.create',['dashboard' => $this->dashboard,'division' => $division,'types' => $types]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$slug = Str::slug($request->slug, '-');
      $request->merge(['slug' => $request->slug]);
/*    $dom = new \domdocument();
    $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
LIBXML_NOWARNING  );
    $images = $dom->getelementsbytagname('img');
    $path = "img/pages/".$request->slug;
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
        $request->session()->put('imageURL', $path);
        Storage::disk('public')->put(  $request->session()->get('imageURL'), $data);

        $img->removeattribute('src');
        $img->setattribute('src',Storage::disk('public')->url($request->session()->get('imageURL')));
      }
      }
    $content = $dom->savehtml();
    $request->merge(['content' => $content]);
    */
    $pages = Pages::create($request->all());  
    return redirect()->route('pages.show',$request->division_id)->withStatus('Page Successfully Created');
    }


    public function page_types_ajax(Request $request){
        $sub_types = PageSubType::where('type_id',$request->type_id)->get();
        return $sub_types->toJson();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_types = PageType::where('division_id',$id)->join('tb_divisi','tb_divisi.KD','page_types.division_id')->whereNull('deleted_at')->paginate(5);
        $page_sub_types = PageSubType::selectRaw('page_sub_types.*,page_types.name as type,tb_divisi.NAMA as division')->join('tb_divisi','tb_divisi.KD','page_sub_types.division_id')->join('page_types','page_types.id','page_sub_types.type_id')->where('page_sub_types.division_id',$id)->whereNull('page_types.deleted_at')->paginate(5);
        $pages = Pages::selectRaw('pages.*,page_types.name as type_name,page_sub_types.name as subtype_name,tb_divisi.NAMA as division_name')->join('page_types','page_types.id','pages.type_id')->join('page_sub_types','page_sub_types.id','pages.sub_type_id')->join('tb_divisi','tb_divisi.KD','pages.division_id')->whereNull('page_types.deleted_at')->whereNull('page_sub_types.deleted_at')->where('pages.division_id',$id)->paginate(10);
        return view('admin.pages.page-types',['page_types' => $page_types,'division' => $id,'page_sub_types' => $page_sub_types,'pages' => $pages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$division)
    {
        $page = Pages::find($id);
        $types = PageType::where('division_id',$division)->get();
        $subtypes = PageSubType::where('division_id',$division)->where('type_id',$page->type_id)->get();
      return view('admin.pages.edit',['page' => $page,'division' => $division,'types' => $types,'subtypes' => $subtypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$division,$id)
    {
     // $slug = Str::slug($request->slug, '-');
      $request->merge(['slug' => $request->slug]);
   /* $dom = new \domdocument();
    $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
LIBXML_NOWARNING  );
    $images = $dom->getelementsbytagname('img');
    $path = "img/pages/".$request->slug;
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
        $request->session()->put('imageURL', $path);
        Storage::disk('public')->put(  $request->session()->get('imageURL'), $data);

        $img->removeattribute('src');
        $img->setattribute('src',Storage::disk('public')->url($request->session()->get('imageURL')));
      }
      }
    $content = $dom->savehtml();
    $request->merge(['content' => $content]);
    */
    $pages = Pages::find($id)->update($request->all());  //
    return redirect()->route('pages.show',$division)->withStatus('Page Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$division)
    {
    $page = Pages::find($id)->delete();
    return redirect()->route('pages.show',$division)->withStatus('Page Successfully Deleted');
    }

    public function page_builder($id){
        $page = Pages::with('contents')->find($id);
        if(!$page){
            abort(404);
        }
        if(!$page->contents->id){
         $path = 'cms/pages/';
         $json_page = Storage::disk('local')->exists($path.'page.json') ? json_decode(Storage::disk('local')->get($path.'page.json')) : [];
         $page_id = hash('SHA256',$id);

         if($json_page){

            $page = Pages::find($id);
            $page_contents = collect($json_page->$page_id);
            $page->page_contents = $page_contents;
         }else{
           
         }
        }

        return view('admin.pages.page-builder',['page' => $page,'id' => $id]);
    }

    public function store_page($id,Request $request){
        //dd($request->all());
         $path = 'cms/pages/';

            $page = Storage::disk('local')->exists($path.'page.json') ? json_decode(Storage::disk('local')->get($path.'page.json')) : [];
            if(!empty($page)){
                //dd(htmlspecialchars_decode(stripslashes($page)));
                $page = collect($page)->toArray();     
                $data = array_filter($page);
                $page_id = hash('SHA256',$id);
                $update = collect($data)[$page_id];
                $new_data = collect();
                foreach($update as $key => $value){

                    $new_data->put($key,$value);
                }
                $page['$page_id'] = $new_data;
                Storage::disk('local')->put($path.'page.json',json_encode($page));
                return $request->all();
               // return $data;
                //$data = collect($data)->where('page_id',$id)->all();    
            }else{
            $page_id = hash('SHA256',$id);
            $data =collect([$page_id => [ 
                "gjs_assets" => $request->gjs_assets,
                "gjs_styles" => $request->gjs_styles,
                "gjs_css" => $request->gjs_css,
                "gjs_html" => $request->gjs_html,
                "gjs_components" => $request->gjs_components
            ]])->toArray();
            $page = $data;
            Storage::disk('local')->put($path.'page.json', json_encode($page));
            $update_data_page = ['json_id' => $page_id];
            $page = Pages::find($id);
            $page->json_id = $page_id;
            $page->save();
            }
            /*
        $content_id = $request->content_id;
        $page_content = PageContent::find($id);

        if($content_id != "" && $page_content){
        $page_content->gjs_assets = $request->gjs_assets;
        $page_content->gjs_styles = $request->gjs_styles;
        $page_content->gjs_css = $request->gjs_css;
        $page_content->gjs_html = htmlspecialchars($request->gjs_html);
        $page_content->gjs_components = json_encode($request->gjs_components);
        $page_content->page_id = $id;
        $page_content->save();
        }else{
        $page_content = new PageContent;
        $page_content->gjs_assets = $request->gjs_assets;
        $page_content->gjs_styles = $request->gjs_styles;
        $page_content->gjs_css = $request->gjs_css;
        $page_content->gjs_html = htmlspecialchars($request->gjs_html);
        $page_content->gjs_components = json_encode($request->gjs_components);
        $page_content->page_id = $id;
        $page_content->save();

        $content_id = $page_content->id;
        $page = Pages::find($id);
        $page->content_id = $content_id;
        $page->save();
        }*/

       // return $data;   
    }

    public function asset_manager(Request $request){

        $images =$request->file('files');
        if(!empty($images)){
            $page = Pages::find($request->page_id);
            $path = 'assets/'.$page->slug.'/'.$request->type;
            $data = array();
            foreach($images as $image){
            $ext_gambar = $image->getClientOriginalExtension();
            $nama_gambar = $image->getClientOriginalName();
            $path_gambar = url("")."/".$image->storeAs($path, time().$nama_gambar,'public');
            list($width, $height, $type, $attr) = getimagesize($image);
            array_push($data,['src' => $path_gambar,'type' => 'image','height' => $height, 'width' => $width]);
            }
            return $data;   
        }
    }

    public function load_page($id){

    }
}
