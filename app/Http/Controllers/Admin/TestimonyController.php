<?php

namespace App\Http\Controllers\Admin;

use App\Testimony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Testimony $model)
    {
    return view('admin.testimony.index',['testimonies' => $model->orderBy('id','desc')->paginate(8)]);   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.testimony.create');//    return view('admin.news.create',['tags' => $tags]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $path = "img/testimony";
    $gambar =$request->file('gambar');

  if(!empty($gambar)){

    $ext_gambar = $gambar->getClientOriginalExtension();
    $nama_gambar = $gambar->getClientOriginalName();
    $path_gambar = $gambar->storeAs($path, $request->name.'.'.$ext_gambar,'public');
      $request->merge(['image' => $path_gambar]);
  }
        $testimony = Testimony::create($request->all());
        return redirect()->route('admin-testimony.index')->withStatus('Testimony Has Been Successfully Created');//
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
        $testimony = Testimony::find($id);
        return view('admin.testimony.edit',['testimony' => $testimony]);
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
    $path = "img/testimony";
    $gambar =$request->file('gambar');

  if(!empty($gambar)){

    $ext_gambar = $gambar->getClientOriginalExtension();
    $nama_gambar = $gambar->getClientOriginalName();
    $path_gambar = $gambar->storeAs($path, $id.'-'.time().'-'.$request->name.'.'.$ext_gambar,'public');
      $request->merge(['image' => $path_gambar]);
  }
        $testimony = Testimony::find($id)->update($request->all());
        return redirect()->route('admin-testimony.index')->withStatus('Testimony Has Been Successfully Updated');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimony = Testimony::find($id)->delete();  //
        return redirect()->route('admin-testimony.index');
    }
}
