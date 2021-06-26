@extends('layouts.app-auth', ['dashboard' => 'sekolah','activePage' => 'school-programs', 'titlePage' => __('school-programs'),'activeMenu' => __('school-management')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">


<style type="text/css">
  .selectize{
    width:100%;
  }

</style>
@endpush
@section('content')
<div class="content">

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Copy Programs') }}</h4>
            
          </div>
          <div class="card-body">
             <form action="{{url('cari-sekolah/admin/copy-programs')}}" enctype="multipart/form-data" method="post">
            @csrf
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('From') }}</label>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-2 col-form-label">
                    Schools
                  </div>
                  <div class="col-sm-7">


                    <div class="row form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                     <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">


                      <select id="from_school" class="selectize" name="from_school" onchange="select_program(this)" required style="width:100%;">
                        <option value="">- Select Schools -</option>
                        @foreach($schools as $school)
                        <option value="{{$school->id}}">{{$school->name}} ({{$school->abbreviation}}), {{$school->address}}, {{$school->city_name}}, {{$school->region_name}}, {{$school->country_name}}</option>
                        @endforeach
                      </select>

                    </div>
                  </div>

                </div>
                
              </div>
              <div class="row">
                <div class="col-sm-2 col-form-label">
                  Programs
                </div>
                <div class="col-sm-7">
                 <div class="row form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                   <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">
                    <input type="text" id="from_program" class="selectize-multiple" name="from_program" required disabled style="width:100%;">
                  </div>
                </div>
              </div>
                  <div class="col-sm-3">
            <div class="row form-group">
              <div>
              <input type="checkbox" name="all_from_programs" id="all_from_programs" class="form-check-input" checked=""> <label class="form-check-label">All Programs</label>
              </div>
              </div>
            </div>
            </div>
          </div>

        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">{{ __('To') }}</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-2 col-form-label">
                Schools
              </div>
              <div class="col-sm-7">


                <div class="row form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                 <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">


                  <select id="to_school" class="selectize" name="to_school" required style="width:100%;">
                    <option value="">- Select Schools -</option>
                    @foreach($schools as $school)
                    <option value="{{$school->id}}">{{$school->name}} ({{$school->abbreviation}}), {{$school->address}}, {{$school->city_name}}, {{$school->region_name}}, {{$school->country_name}}</option>
                    @endforeach
                  </select>

                </div>
              </div>

            </div>
           
          </div>
      </div>
    </div>
    <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('What do you want to copy ?') }}</label>
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-2 col-form-label">&emsp;</div>
          <div class="col-sm-10">
             <!--<div style="padding:0 20px;">
              <input type="checkbox" class="form-check-input" name="programs"> <label class="form-check-label">Programs</label>
            </div>-->
            <div style="padding:0 20px;">
              <input type="checkbox" class="form-check-input" name="course_units"> <label class="form-check-label">Course Units</label>
            </div>
            <div style="padding:0 20px;">
              <input type="checkbox" class="form-check-input" name="program_requirements" > <label class="form-check-label">Program Requirements</label>
            </div>
        </div>

      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-7 text-right">
      <button type="submit" class="btn btn-primary">Copy</button>
    </div>
  </div>



</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
  $('.selectize').selectize({
    width : 'resolve'
  });

$('.selectize-multiple').selectize({
    delimiter: '|',
    persist: false,
    create: function(input,callback) {
        return {
            value: input,
            text: input
        }
    }
});


  function select_program(e){
    var school_id = e.value;
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_has_program-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {

            //$('#school_intake_course').html(data);
            //$('#school_intake_course').refreshOptions();
            var data = JSON.parse(data);
            var $select = $('#from_program').selectize();
            var selectize = $select[0].selectize;
            selectize.clearOptions();
            $.each(data,function(k,v){
               selectize.addOption({value : v.id,text : v.name});
           });
            selectize.refreshOptions();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

  $('#all_from_programs').on('change',function(){

    if($(this).prop("checked") == true){
      $('#from_program')[0].selectize.setValue("");
      $('#from_program')[0].selectize.disable();
    }else{
      $('#from_program')[0].selectize.enable(); 
    }
  });

    $('#all_to_programs').on('change',function(){

    if($(this).prop("checked") == true){
      $('#from_program')[0].selectize.setValue("");
      $('#to_program')[0].selectize.disable();
    }else{
      $('#to_program')[0].selectize.enable(); 
    }
  });
</script>
@endpush