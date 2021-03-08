@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'tests', 'titlePage' => __('test'),'activeMenu' => 'content-management'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('ot-test.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Test') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('ot-test.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-8">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}"  aria-required="true"/>
                    @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Duration') }}</label>
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-md-4">
                          <div class="form-group{{ $errors->has('hours_duration') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('hours_duration') ? ' is-invalid' : '' }}" name="hours_duration" id="input-hours_duration" type="number" placeholder="{{ __('Hours') }}" value="{{ old('hours_duration') }}"  aria-required="true"/>
                            @if ($errors->has('duration'))
                            <span id="duration-error" class="error text-danger" for="input_duration">{{ $errors->first('duration') }}</span>
                            @endif
                          </div>
                    
                    </div>
                    <div class="col-md-4">
                      <div class="form-group{{ $errors->has('minutes_duration') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('minutes_duration') ? ' is-invalid' : '' }}" name="minutes_duration" id="input-minutes_duration" type="number" placeholder="{{ __('Minutes') }}" value="{{ old('minutes_duration')}}"  aria-required="true"/>
                        @if ($errors->has('minutes_duration'))
                        <span id="minutes_duration-error" class="error text-danger" for="input-minutes_duration">{{ $errors->first('minutes_duration') }}</span>
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
              
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Test') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script type="name/javascript">
  
  $("#test_type").on('change',function(){
    $('#hide-content').show();
    if($(this).val() == "image") {
      $('#hide-name').hide();
      $('#hide-image').show();
    }else{
      $('#hide-image').hide();
      $('#hide-name').show();
    }
  });
  
</script>
@endpush
