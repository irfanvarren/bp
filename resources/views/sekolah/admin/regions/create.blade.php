@extends('layouts.app-auth', ['activePage' => 'regions', 'titlePage' => __('regions'),'activeMenu' => __('places-management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('school-region.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Region') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('school-region.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" autocomplete="off" placeholder="{{ __('Region Name (ISO_3166-2)') }}" value="{{ old('name') }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Region Code') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="input-code" type="text" autocomplete="off" placeholder="{{ __('Region Code (ISO_3166-2:country_code)') }}" value="{{ old('code') }}" aria-required="true"/>
                          @if ($errors->has('code'))
                            <span id="code-error" class="error text-danger" for="input-code">{{ $errors->first('code ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('currency_code') ? ' has-danger' : '' }}">
                      <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">

                        <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="country_id" required name="country_id">
                          <option value="">- Select Country -</option>

                          @foreach($countries as $key => $value)
                          <option value="{{$value->id}}"> {{$value->name}}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add region') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('more-script')
  <script type="text/javascript">

    $('#status').change(function(){

      if(this.checked){
      $('#status-label').html('Active');
    }else{
        $('#status-label').html('Non Active');
    }
    });
  </script>
@endsection
