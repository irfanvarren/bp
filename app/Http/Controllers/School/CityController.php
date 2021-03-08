<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
Use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */protected $dashboard = 'sekolah';

    public function index()
    {
      $cities = City::select('cities.id','cities.name','cities.latitude','cities.longitude')->selectRaw('countries.name as country_name, regions.name as region_name')->join('countries','cities.country_id','=','countries.id')->join('regions','cities.region_id','=','regions.id')->orderBy('cities.id','DESC')->get();
      return view('sekolah.admin.cities.index',['cities' => $cities,'dashboard' => $this->dashboard]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      $regions = Region::get();
      return view('sekolah.admin.cities.create',['regions' => $regions,'dashboard' => $this->dashboard]);//
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = City::where('cities.name','=',$request->name)->where('cities.region_id','=',$request->region_id)->count();
        if($count){
            dd("Data Udah Pernah Ada Jangan Tekan Banyak Banyak Woi Laptop Kentang Nih");
            echo "<script>";
            echo "alert('hello');";
            echo "</script>";
        }else{
      $country_id = Region::where('id',$request->get('region_id'))->value('country_id');
      $request->merge(['country_id' => $country_id]);
      $city = City::create($request->all());   //
        return redirect()->route('school-city.index')->withStatus('City Successfully Created');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $city = City::find($id);
      $regions = Region::get();
      return view('sekolah.admin.cities.edit',['city' => $city,'regions' => $regions,'dashboard' => $this->dashboard]);
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
        $city = City::find($id)->update($request->all());
    
        return redirect()->route('school-city.index')->withStatus('City Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = City::find($id)->delete();  //
      return redirect()->route('school-city.index')->withStatus('City Successfully Deleted');  

    }
}
