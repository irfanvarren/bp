<?php

namespace App\Http\Controllers\Admin\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cms\PageContent;
use App\Models\Admin\Cms\PageContentType;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageContents = PageContent::selectRaw('page_contents.*,page_content_types.name as type')->join('page_content_types','page_contents.content_type','=','page_content_types.id')->paginate(5);
        return view('admin.cms.page-contents.index',['pageContents' => $pageContents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageContentTypes = PageContentType::get();
        return view('admin.cms.page-contents.create',['pageContentTypes' => $pageContentTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = '/img/page-contents';
        $pageContent = new PageContent;
        $pageContent->content_type = $request->content_type;
        $content=$request->content;

        $dom = new \domdocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |LIBXML_NOWARNING  );
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
               $image_name= Carbon::now()->timestamp.$k.'.'.$mimetype;
         
               $path = $path.'/'.$image_name;
               Storage::disk('public')->put($path, $data);
   
               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('public')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','page-content-img');
           }
        }



    $content = $dom->savehtml();

    $pageContent->content = $content;
    $pageContent->save();
    return redirect()->route('admin-page-content.index')->withStatus(__('Page content successfully created.'));
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
         $pageContent = PageContent::find($id);
         $pageContentTypes = PageContentType::get();
        return view('admin.cms.page-contents.edit',['pageContent' => $pageContent,'pageContentTypes' => $pageContentTypes]);
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
        $path = '/img/page-contents';
        $pageContent = PageContent::find($id);
        $pageContent->content_type = $request->content_type;
        $content=$request->content;

        $dom = new \domdocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |LIBXML_NOWARNING  );
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
               $image_name= Carbon::now()->timestamp.$k.'.'.$mimetype;
         
               $path = $path.'/'.$image_name;
               Storage::disk('public')->put($path, $data);
   
               $img->removeattribute('src');
               $img->setattribute('src', Storage::disk('public')->url($path));
               $img->removeAttribute('class');
               $img->setattribute('class','page-content-img');
           }
        }



    $content = $dom->savehtml();

    $pageContent->content = $content;
    $pageContent->save();
    return redirect()->route('admin-page-content.index')->withStatus(__('Page content successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PageContent::find($id)->delete();
     return redirect()->route('admin-page-content.index')->withStatus(__('Page content successfully deleted.'));
    }
}
