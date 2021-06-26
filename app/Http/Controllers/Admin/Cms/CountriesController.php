<?php

namespace App\Http\Controllers\Admin\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountriesController extends Controller
{
  public function index()
  {
      $countries = Country::paginate(10);
      return view('admin.cms.countries.index',compact('countries'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.countries.create');//
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
        return redirect()->route('admin-cms-countries.index')->withStatus('Country Successfully Created');
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

      return view('admin.cms.countries.edit',['country' => $country]);
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
      return redirect()->route('admin-cms-countries.index')->withStatus('Country Successfully Updated');
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
      return redirect()->route('admin-cms-countries.index')->withStatus('Country Successfully Deleted');

  }
}
