@extends('student.student-dashboard')
@section('student-content')
<div class="row">
    <div class="col-md-12">
        <form action="{{url('student/select-modules')}}" method="POST">
            @csrf
            <input type="hidden" name="test_id" value="{{$test_id}}">
            <div class="col-md-12 sidebar-nav navbar-collapse">
                <ul class="nav col-md-12" id="side-menu" style="display: inline;">
                    @foreach($modules as $key => $value)
                    <li class="col-md-12">
                        <button name="module_id" type="submit" style="background: none;border:none;width:100%;padding:8px;text-align:left;" value="{{$value->id}}"><i class="fa fa-table fa-fw"></i> {{$value->name}} </button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </form>
    </div>
</div>   
@endsection