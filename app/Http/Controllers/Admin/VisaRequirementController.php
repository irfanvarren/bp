<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VisaRequirement;
use App\Country;

class VisaRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->type != ""){
        $visaRequirements = VisaRequirement::selectRaw('visa_requirements.*,countries.name as country_name,countries.cca3 as country_code')->join('countries','countries.id' ,'=', 'visa_requirements.country_id')->where('type',$request->type)->orderBy('created_at','Desc')->paginate(10);
        return view('admin.visa-requirements.index',['visaRequirements' => $visaRequirements,'type' => $request->type]);      
        }
        return view('admin.visa-requirements.select-visa-type');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->type;
        $countries = Country::get();
        return view('admin.visa-requirements.create',['countries' => $countries,'type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->type;
           $dom = new \domdocument();
    $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
LIBXML_NOWARNING  );
    $images = $dom->getelementsbytagname('img');

    $path = "img/visa-requirements/".$request->country_id;
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
    $visaRequirements = VisaRequirement::create($request->all());
        return redirect()->route('visa-requirements.index',['type' => $type])->withStatus('Visa Requirements successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

        $type = $request->type;
        $countries = Country::get();
        $visaRequirements = VisaRequirement::find($id);
        return view('admin.visa-requirements.edit',['visaRequirements' => $visaRequirements,'countries' => $countries,'type' => $type]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = $request->type;
                $dom = new \domdocument();
    $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
LIBXML_NOWARNING  );
    $images = $dom->getelementsbytagname('img');

    $path = "img/visa-requirements/".$request->country_id;
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
    $visaRequirements = VisaRequirement::find($id)->update($request->all());
        return redirect()->route('visa-requirements.index',['type' => $type])->withStatus('Visa Requirements successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $type = $request->type;
         $visaRequirements = VisaRequirement::find($id)->delete();
         return redirect()->route('visa-requirements.index',['type' => $type])->withStatus('Visa Requirements successfully deleted');
    }
}
