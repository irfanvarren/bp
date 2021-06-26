<?php

namespace App\Http\Controllers\Admin\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlineTest\OtTest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = new OtTest;
        $tests = $tests::paginate(10);

        return view('admin.tutor.tests.index',['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutor.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hours = $request->hours_duration;
        $minutes = $request->minutes_duration;
        $seconds = $request->seconds_duration;
        
        $duration = ($hours * 3600) + ($minutes * 60) + $seconds;
        $request->merge(['duration' => $duration]);
        $tests = new OtTest;
        $tests::create($request->all());
        return redirect()->route('ot-test.index')->withStatus('Test has successfully created !');
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
        $tests = OtTest::find($id);
        return view('admin.tutor.tests.edit',['tests' => $tests]);
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
        $hours = $request->hours_duration;
        $minutes = $request->minutes_duration;
        $seconds = $request->seconds_duration;
        
        $duration = ($hours * 3600) + ($minutes * 60) + $seconds;
        $request->merge(['duration' => $duration]);
        $tests = new OtTest;
        $tests::find($id)->update($request->all());
        return redirect()->route('ot-test.index')->withStatus('Test has successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tests = OtTest::find($id)->delete();
        return redirect()->route('ot-test.index')->withStatus('Test has successfully deleted !');
    }
}
