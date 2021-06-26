<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SchoolQualification;
use App\SchoolCourse;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $qualifications = SchoolQualification::get();
      return view('sekolah.admin.qualifications.index',['qualifications' => $qualifications]);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('sekolah.admin.qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $course = SchoolQualification::create($request->all());
      return redirect()->route('school-qualification.index')->withStatus('Qualification successfully created');
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
        $qualification = SchoolQualification::find($id);
        return view('sekolah.admin.qualifications.edit',['qualification' => $qualification]);
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
      $qualification = SchoolQualification::find($id)->update($request->all());//
      return redirect()->route('school-qualification.index')->withStatus('Qualification successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualification = SchoolQualification::find($id)->delete();
        return redirect()->route('school-qualification.index')->withStatus('Qualification successfully deleted');
    }
}
