<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use App\Country;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $dashboard = 'sekolah';
    public function index()
    {
      $regions = Region::select('regions.id','regions.name','regions.code')->selectRaw('countries.name as country_name')->join('countries','regions.country_id','=','countries.id')->orderBy('regions.id','DESC')->get();
        return view('sekolah.admin.regions.index',['regions' => $regions,'dashboard' => $this->dashboard]);//
//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $countries = Country::get();
      return view('sekolah.admin.regions.create',['countries' => $countries,'dashboard' => $this->dashboard]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $count = Region::where('regions.code','=',$request->code)->count();
       if($request->code == "" || empty($request->code)){
                      $cca2 = Country::where('id','=',$request->country_id)->value('cca2');
                     $code = Region::select('code')->where('regions.code','like','%||%')->orderBy('code','DESC')->first()->toArray();
                    
                     $count2 = count($code);
            
            $count2++;
            $code = $cca2.'||'.$count2;
           $request->merge(['code' => $code]);
            $region = Region::create($request->all());
                  return redirect()->route('school-region.index')->withStatus('Region Successfully Created');  //
        }else{            
        if($count){

                dd('data sudah pernah ada');
        }else{
      $region = Region::create($request->all());
      return redirect()->route('school-region.index')->withStatus('Region Successfully Created');  //
        }
        }
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
      $region = Region::find($id);
      $country = Country::get();
      return view('sekolah.admin.regions.edit',['region' => $region,'countries' => $country,'dashboard' => $this->dashboard]);
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
         $count = Region::where('regions.code','=',$request->code)->count();

        if($request->code == "" || empty($request->code)){
                      $cca2 = Country::where('id','=',$request->country_id)->value('cca2');
                     $code = Region::select('code')->where('regions.code','like','%||%')->orderBy('code','DESC')->first()->toArray();
                    
                     $count2 = count($code);
            
            $count2++;
            $code = $cca2.'||'.$count2;
      
           $request->merge(['code' => $code]);
            $region = Region::find($id)->update($request->all());
                  return redirect()->route('school-region.index')->withStatus('Region Successfully Updated');  //
        }else{            
    
            
      $region = Region::find($id)->update($request->all());
      return redirect()->route('school-region.index')->withStatus('Region Successfully Updated');  //
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $region = Region::find($id)->delete();
      return redirect()->route('school-region.index')->withStatus('Region Successfully Deleted');
  //
    }
}
