@extends('student.student-dashboard')
@section('student-content')
<div class="row">
    <div class="col-md-12">
        <form action="{{url('student/select-sections')}}" method="POST">
            @csrf
            <input type="hidden" name="test_id" value="{{$test_id}}">
            <input type="hidden" name="module_id" value="{{$module_id}}">
            <input type="hidden" name="package_id" value="{{$package_id}}">
            <div class="col-md-12 sidebar-nav navbar-collapse">
                    @foreach($test_sections as $key => $value)
                  <div class="col-md-12">  {{$value->section_name}}</div>
                <ul class="nav col-md-12" id="side-menu" style="display: inline;">
                    @foreach($value->sections as $keySection => $section)
                    <li class="col-md-12">
                        <button name="module_id" type="submit" style="background: none;border:none;width:100%;padding:8px;text-align:left;" value="{{$value->id}}"><i class="fa fa-table fa-fw"></i> {{$section->name}} </button>
                    </li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            <!-- /.sidebar-collapse -->
        </form>
    </div>
</div>   
@endsection