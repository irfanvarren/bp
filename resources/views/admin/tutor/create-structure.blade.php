@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'dashboard','activeMenu' => '', 'titlePage' => __('Dashboard')])
<style>
    .section-list{
        padding:10px;border-bottom:1px solid black;
    }
    .section-list:first-child{
        border-top:1px solid black;
    }
</style>
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">{{ __('Create Test Structure') }}</h4>
                    @php
                    $test = $test_name;
                    if($module_name != "-" && $module_name != ""){
                    $test.=' - '.$module_name;
                }
                if($package_name != "-" && $package_name  != ""){
                $test.=' - '.$package_name;
                }
            @endphp
            <span>{{$test}}</span>
        </div>
        <div class="card-body">
            @csrf
            @if (session('status'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" value-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <label for="" class="col-md-2">Choose Section Type</label>
                <div class="col-md-7">
                    <select class="form-control" name="test_section_types" id="test_section_types">
                        <option value="">Choose Section Types</option>
                        @foreach($section_types as $section_type)
                        <option value="{{$section_type->id}}">{{$section_type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2">{{ __('Duration') }}</label>
                <div class="col-sm-7">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group{{ $errors->has('hours_duration') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('hours_duration') ? ' is-invalid' : '' }}" name="hours_duration" id="input-hours_duration" type="number" placeholder="{{ __('Hours') }}" value="{{ old('hours_duration') }}"  aria-required="true"/>
                        @if ($errors->has('duration'))
                        <span id="duration-error" class="error text-danger" for="input_duration">
                            {{ $errors->first('duration') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('minutes_duration') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('minutes_duration') ? ' is-invalid' : '' }}" name="minutes_duration" id="input-minutes_duration" type="number" placeholder="{{ __('Minutes') }}" value="{{ old('minutes_duration')}}"  aria-required="true"/>
                    @if ($errors->has('minutes_duration'))
                    <span id="minutes_duration-error" class="error text-danger" for="input-minutes_duration">{{ $errors->first('minutes_duration') }}
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('Seconds') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('seconds_duration') ? ' is-invalid' : '' }}" name="seconds_duration" id="input-seconds_duration" type="number" placeholder="{{ __('Seconds') }}" value="{{ old('seconds_duration') }}"  aria-required="true"/>
                @if ($errors->has('seconds_duration'))
                <span id="seconds_duration-error" class="error text-danger" for="input-seconds_duration">{{ $errors->first('seconds_duration') }}</span>
                @endif
            </div>
        </div>
    </div>

</div>
</div>
<div class="row">
    <div class="col-md-3">
        <button onclick="add_section_type()" id="section-type-btn" class="btn btn-primary">add</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" style="margin-top:15px;table-layout:auto;">
            <colgroup>
                <col width="20" style="width:20%">
                <col width="55" style="width:55%">
                <col>
                <col>
            </colgroup>
            <thead>

                <tr>
                    <th style="vertical-align:middle;text-align:center;font-size:18px;">
                        <strong>Section Type</strong>
                    </th>
                    <th  style="vertical-align:middle;font-size:18px;text-align:center;">
                        <strong>Section</strong>
                    </th>
                    <th>Duration</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="section-output"> 
                @if(isset($test_sections))
                @foreach($test_sections as $key => $value)

                <tr>                                   
                    <td style="vertical-align:middle;text-align:center;font-size:18px;">
                        @if($value->section_type != null)
                        {{$value->section_type->name}}
                        @endif
                    </td>
                    <td style="vertical-align:middle;">
                       <div class="col-md-12">
                           <div class="row">
                               <div class="col-md-12" style="border-bottom:2px solid rgba(0,0,0,0.1);margin-bottom:10px;padding:10px;" id="section-{{$key}}-output">
                                @if($value->sections->isEmpty())
                                No Section
                                @else
                                @foreach($value->sections as $key2 => $section)
                                @php
                                $key2 += 1;
                                @endphp
                                <div class="col-md-12 section-list">
                                    <div class="col-md-12">

                                     {{$key2}}. {{$section->name}} <br>

                                     @php
                                     $count = 0;
                                     @endphp
                                     @foreach($section->structures as $structures)
                                     @foreach($structures->questions as $questions)
                                     @php $count ++; @endphp
                                     @endforeach
                                     @endforeach
                                     @if($section->type == "introduction")
                                     Introduction : {{$section->structures->count()}}
                                     @else
                                     Total Question : {{$count}}
                                     @endif
                                     ,Type : {{ucwords($section->type)}}

                                 </div>
                                 <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4"> 
                                            <input type="button" class="col-md-12 btn-primary btn" onclick="add_question('{{$test_id}}','{{$module_id}}','{{$package_id}}','{{$section->id}}','{{$value->id}}')" value="Questions">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="button" class="col-md-12 btn-info btn" value="Details">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="button" class="col-md-12 btn-danger btn" onclick="delete_section('{{$value->id}}','{{$section->id}}','{{$key}}')" value="Delete">                                                        
                                        </div>

                                    </div>
                                </div>
                            </div>


                            @endforeach
                            @endif                                                
                        </div>
                        <div class="col-md-12"><input type="text" name="section-{{$key}}" placeholder="Section Name" class="form-control">
                            <select class="form-control" name="section_type" id="section_type-{{$key}}">
                                <option value="">- Section Type -</option>
                                <option value="introduction">Introduction</option>
                                <option value="question">Question</option>
                            </select>
                        </div>
                        <div class="col-md-3"> 
                            <input type="button" class="btn" onclick="add_section('{{$key}}','{{$value->id}}','{{$value->id}}')" style="width:100%;" value="Add">
                        </div>
                    </div>
                </div>
            </td>     
            <td>
               @php
               $hours = floor($value->duration / 3600);
               $minutes = floor(($value->duration % 3600) / 60);
               $seconds = $value->duration - ($hours*3600) - ($minutes*60);   
               @endphp
               @if($hours != 0)
               {{$hours}} @if($hours > 1 ) {{'hours'}} @else {{'hour'}} @endif
               @endif
               @if($minutes != 0)
               {{$minutes}} @if($minutes > 1 ) {{'minutes'}} @else {{'minute'}} @endif
               @endif
               @if($seconds != 0)
               {{$seconds}} @if($seconds > 1 ) {{'seconds'}} @else {{'second'}} @endif
               @endif
           </td> 
           <td>
            <button type="button" class="btn btn-success btn-link" value-original-title="" title="" onclick="edit_section_type('{{$value->section_type_id}}','{{$hours}}','{{$minutes}}','{{$seconds}}')">
                <i class="material-icons">close</i>
                <div class="ripple-container"></div>
                edit
            </button>
            <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="delete_section_type('{{$value->id}}')">
                <i class="material-icons">close</i>
                <div class="ripple-container"></div>
                delete
            </button>
        </td>
    </tr>
    @endforeach
    @endif
</tbody>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{url('tutor-admin')}}">Back</a>
    </div>
</div>

</div>
</div>
@endsection

@push('js')
<script>
    var index;
    var token = $("input[name='_token']").val();
    var test_id = '{{$test_id}}';
    var module_id = '{{$module_id}}';
    var package_id = '{{$package_id}}';

    function add_section(index,test_section_id,test_section_id){
        var section = $("input[name='section-"+index+"']").val();
        var cmd = "add";
        var section_type = $("#section_type-"+index).val();
        $.ajax({
            url: "{{route('section-ajax')}}",
            method : "POST",
            data : {
                _token : token,
                name : section,
                module_id : module_id,
                package_id : package_id,
                section_index : index,
                test_id : test_id,
                type : section_type,
                test_section_id : test_section_id, 
                cmd : cmd
            },
            success : function (data){

               var output = "#section-"+index+"-output";
               $(output).html(data);
               $("input[name='section-"+index+"']").val("");
           },
           error: function(){

           }
       });
    }
    function delete_section(test_section_id,section_id,index){
        confirm('{{ __("Are you sure you want to delete this?") }}') ? 
        $.ajax({
            url: "{{route('section-ajax')}}",
            method : "POST",
            data : {
                _token : token,
                test_section_id : test_section_id,
                section_id: section_id,
                section_index: index,
                cmd : "delete"
            },
            success : function (data){
                console.log(data);
                console.log(index);
                var output = "#section-"+index+"-output";
                console.log(output);
                $(output).html(data);
                $("input[name='section-"+index+"']").val("");
            },
            error: function(){


            }
        }) : '';
    }
    function edit_section_type(id,hours,minutes,seconds){
     $('#test_section_types').val(id);
     $('#input-hours_duration').val(hours);
     $('#input-minutes_duration').val(minutes);
     $('#input-seconds_duration').val(seconds);
     $('#section-type-btn').html("edit");

 }
 function delete_section_type(test_section_id){
    confirm('{{ __("Are you sure you want to delete this test?") }}') ? 
    $.ajax({
        url: "{{route('section-type-ajax')}}",
        method : "POST",
        data : {
            _token : token,
            module_id : module_id,
            package_id : package_id,
            test_id : test_id,
            test_section_id : test_section_id,
            cmd : "delete"
        },
        success : function (data){
           $('#section-output').html(data);
       },
       error: function(xhr, status, error){
        alert(xhr.responseText);
        console.log(xhr);
        console.log(status);
        console.log(error);
    }
}) : '';
}

function add_section_type(){
    var section_type = $('#test_section_types').val();
    var hours_duration = $('#input-hours_duration').val();
    var minutes_duration = $('#input-minutes_duration').val();
    var seconds_duration = $('#input-seconds_duration').val();
    $.ajax({
        url: "{{route('section-type-ajax')}}",
        method : "POST",
        data : {
            section_type : section_type,
            _token : token,
            module_id : module_id,
            package_id : package_id,
            test_id : test_id,
            hours_duration : hours_duration,
            minutes_duration : minutes_duration,
            seconds_duration : seconds_duration,
            cmd : "add"
        },
        success : function (data){
            console.log(data);
            $('#section-output').html(data);
            $('#test_section_types').val("");
            $('#input-hours_duration').val("");
            $('#input-minutes_duration').val("");
            $('#input-seconds_duration').val("");
        },
        error: function(){

        }
    });
}
function add_question(test_id,module_id,package_id,section_id,test_section_id){
    var url = '{{url("tutor-admin/add-question?test_id=")}}'+test_id+"&module_id="+module_id+"&package_id="+package_id+"&section_id="+section_id+"&test_section_id="+test_section_id;
    location.href = url;
}
</script>
@endpush
