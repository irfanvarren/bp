<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Country;

class CountryController extends Controller
{
  protected $dashboard = 'sekolah';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = Schema::getColumnListing('countries');
        foreach($columns as $key => $value){
            $country = Country::whereNull($value)->value('name');

            if($country){
                
                if($value != "created_at" && $value != "updated_at"){

               $array[] = ['school' => $country, 'column' => $value];
                }else{
                    $array[] = ['school' => '', 'column' => ''];
                }
            }
            //$emptyCountry->put('column_name', $value);
            //$alerts[] = $emptyCountry;
        }
        $emptyCountry = collect($array);
            
      // dd($alerts);
      $countries = Country::paginate(8);
        return view('sekolah.admin.countries.index',['countries' => $countries,'dashboard' => $this->dashboard,'alerts' => $emptyCountry]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.admin.countries.create',['dashboard' => $this->dashboard]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = Country::create($request->all());
        return redirect()->route('school-country.index')->withStatus('Country Successfully Created');
        //
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
      $country = Country::find($id);

      return view('sekolah.admin.countries.edit',['country' => $country,'dashboard' => $this->dashboard]);
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
      $country = Country::find($id)->update($request->all());
      return redirect()->route('school-country.index')->withStatus('Country Successfully Updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $country = Country::find($id)->delete();
      return redirect()->route('school-country.index')->withStatus('Country Successfully Deleted');

    }
}
