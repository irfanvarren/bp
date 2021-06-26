@extends('layouts.app-auth', ['dashboard' => 'sekolah','activePage' => 'school-programs', 'titlePage' => __('school-programs'),'activeMenu' => __('')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
  .selectize-input input{
    padding:0 5px;
    border:none;
  }
</style>
@endpush

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('school-program.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Program') }}</h4>
              <p class="card-qualifications"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('school-program.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('School') }}</label>
                <div class="col-md-7">
                 <div class="form-group{{ $errors->has('schools') ? ' has-danger' : '' }}">

                  <select required class="selectize form-control" id="schools" name="schools">
                    <option value="">- Select schools -</option>

                    @foreach($schools as $key => $value)
                    <option value="{{$value->id}}"> <strong> {{$value->name}}  </strong> ({{$value->address.', '.$value->city_name.', '.$value->region_name.', '.$value->country_name}})</option>
                    @endforeach
                  </select>

                  @if ($errors->has('schools'))
                  <span id="harga-error" class="error text-danger" for="input-schools">{{ $errors->first('schools') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Course') }}</label>
              <div class="col-md-7">
               <div class="form-group{{ $errors->has('courses') ? ' has-danger' : '' }}">

                <select required class="selectize form-control" id="courses" name="courses">
                  <option value="">- Select Courses -</option>

                  @foreach($courses as $key => $value)
                  <option value="{{$value->id}}"> {{$value->name}}</option>
                  @endforeach
                </select>

                @if ($errors->has('courses'))
                <span id="harga-error" class="error text-danger" for="input-courses">{{ $errors->first('courses') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Qualification') }}</label>
            <div class="col-md-7">
             <div class="form-group{{ $errors->has('Sub Courses') ? ' has-danger' : '' }}">

              <select required class="selectize form-control" id="qualifications" name="qualifications">
                <option value="">- Select Qualification -</option>

                @foreach($qualifications as $key => $value)
                <option value="{{$value->id}}"> {{$value->name}}</option>
                @endforeach
              </select>

              @if ($errors->has('qualifications'))
              <span id="harga-error" class="error text-danger" for="input-qualifications">{{ $errors->first('qualifications') }}</span>
              @endif
            </div>
          </div>
        </div>

        <div class="row">
          <label class="col-sm-2 col-form-label">{{ __('Education Sector') }}</label>
          <div class="col-md-7">
           <div class="form-group{{ $errors->has('Sub Courses') ? ' has-danger' : '' }}">

            <select required class="selectize form-control" id="sectors" name="sectors">
              <option value="">- Select Sector -</option>

              @foreach($sectors as $key => $value)
              <option value="{{$value->id}}"> {{$value->name}}</option>
              @endforeach
            </select>

            @if ($errors->has('sectors'))
            <span id="harga-error" class="error text-danger" for="input-sectors">{{ $errors->first('sectors') }}</span>
            @endif
          </div>
        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>

        <div class="col-sm-7">
          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" aria-required="true"/>
            @if ($errors->has('name'))
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
            @endif
          </div>
        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Material Fee') }}</label>

        <div class="col-sm-7">
          <div class="form-group{{ $errors->has('material_fee') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('material_fee') ? ' is-invalid' : '' }}" name="material_fee" id="input-material_fee" type="material_fee" placeholder="{{ __('Material Fee (Total)') }}" value="{{ old('material_fee') }}" aria-required="true"/>
            @if ($errors->has('material_fee'))
            <span id="material_fee-error" class="error text-danger" for="input-material_fee">{{ $errors->first('material_fee ') }}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Course Fee') }}</label>

        <div class="col-sm-7">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('fee') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('fee') ? ' is-invalid' : '' }}" name="fee" id="input-fee" type="text" placeholder="{{ __('Course Fee (Total)') }}" value="{{ old('fee') }}" aria-required="true"/>
                <div>Ex: 1000</div>
                @if ($errors->has('fee'))
                <span id="fee-error" class="error text-danger" for="input-fee">{{ $errors->first('fee ') }}</span>

                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('fee_installment') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('fee_installment') ? ' is-invalid' : '' }}" name="fee_installment" id="input-fee_installment" type="number" placeholder="{{ __('Course Fee installment') }}" value="{{ old('fee') }}" aria-required="true"/>
                <div>Ex: 10 </div>
                @if ($errors->has('fee_installment'))
                <span id="fee_installment-error" class="error text-danger" for="input-fee_installment">{{ $errors->first('fee_installment ') }}</span>
                @endif
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Duration') }}</label>

        <div class="col-sm-7">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group{{ $errors->has('duration') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" id="input-duration" type="text" placeholder="{{ __('Duration') }}" value="{{ old('duration') }}" aria-required="true"/> 
                @if ($errors->has('duration'))
                <span id="duration-error" class="error text-danger" for="input-duration">{{ $errors->first('duration ') }}</span>
                @endif
              </div>
            </div>
              <!--<div class="col-md-8">
                <div class="form-check form-check-inline" style="height:90%">
                 <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="duration_type" value="week" checked=""> week
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
                  <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="duration_type" value="month" checked=""> month
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="duration_type" value="year" checked=""> year
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            </div>-->

          </div>
        </div>
      </div>


      <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Course Information') }}</label>

        <div class="col-sm-7">
          <div class="form-group{{ $errors->has('course_information') ? ' has-danger' : '' }}">
           <textarea name="course_information" class="form-control" rows="4" id="course_information"></textarea>
           @if ($errors->has('course_information'))
           <span id="course_information-error" class="error text-danger" for="input-course_information">{{ $errors->first('course_information ') }}</span>
           @endif
         </div>
       </div>
     </div>
     
  </div>
  <div class="card-footer ml-auto mr-auto">
    <button type="submit" class="btn btn-primary">{{ __('Add Program') }}</button>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('more-script')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
  $('.selectize').selectize({
    width : 'resolve'
  });
function program_name(){
  var qualification = $("#qualifications").text();
    var course = $("#courses").text();
  if(qualification && course != ""){
  return qualification + " in" + course
  }
  return "";
}
$("#qualifications").on('change',function(){
 var name = program_name();
 $('#name').val(name);
});
$("#courses").on('change',function(){
var name = program_name();
 $('#name').val(name);
});

</script>
@endsection
