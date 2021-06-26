@extends('student.student-dashboard')
@section('student-content')
<div class="row">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="col-lg-12 text-center" style="display: block;padding:15px;">
<img src="{{asset('img/user.png')}}" style="height: 150px; width: 150px;margin-top:80px;"><br> <br>
<h4>{{ $student_id != "" ? Auth::guard('student')->user()->name : ""}}</h4>
<br><hr>
<div style="display: inline;">
<div class="col-lg-3 col-md-6 mb-3">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">
                        {{$test->count()}}
                    </div>
                    <div>Available Test</div>
                </div>
            </div>
        </div>
    <a href="{{url('student/select-test')}}">
            <div class="panel-footer">
                <span class="pull-left">Choose Test</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6 mb-3">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-th-list fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">
                          0                                   
                    </div>
                    <div>History</div>
                </div>
            </div>
        </div>
        <a href="home_user.php?home=data_histori">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
</div>
</div>            </div>

@endsection