@extends('layouts.app-auth', ['activePage' => 'cities', 'titlePage' => __('cities'),'activeMenu' => __('places-management')])
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
.selectize-input input{
  width:80% !important;
  padding:0 5px;
  border:none;
}
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" id="myform" action="{{route('school-city.store')}}" enctype="multipart/form-data" autocoschool-citylete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add city') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('school-city.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('City Name') }}" value="{{ old('name') }}"  required aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Latitude') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('latitude') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" id="input-latitude" type="text" placeholder="{{ __('Latitude') }}" value="{{ old('latitude') }}" aria-required="true"/>
                          @if ($errors->has('latitude'))
                            <span id="latitude-error" class="error text-danger" for="input-latitude">{{ $errors->first('latitude ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Longitude') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('longitude') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" id="input-longitude" type="text" placeholder="{{ __('Longitude') }}" value="{{ old('longitude') }}" aria-required="true"/>
                          @if ($errors->has('longitude'))
                            <span id="longitude-error" class="error text-danger" for="input-longitude">{{ $errors->first('longitude ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Region') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('region_id') ? ' has-danger' : '' }}">
                      <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">


                        <select id="region_id" name="region_id" required style="width:100%;">

<!--                        <select class="selectpicker col-sm-12 pl-0 pr-0 " data-style="select-with-transition" id="region_id" name="region_id">-->
                          <option value="">- Select Region -</option>

                          @foreach($regions as $key => $value)
                          <option value="{{$value->id}}"> {{$value->name}}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" id="btn-submit" class="btn btn-primary">{{ __('Add city') }}</button>
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
  $('#region_id').selectize({
    width : 'resolve'
  });
$(document).keypress(function(event){
 if (event.which == 13 || event.keyCode == 13) {
    $('#btn-submit').click();
        return false;
    }
    return true;
});
  </script>
@endsection
