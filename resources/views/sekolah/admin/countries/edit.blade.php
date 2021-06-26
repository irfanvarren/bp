@extends('layouts.app-auth', ['activePage' => 'countries', 'titlePage' => __('countries'),'activeMenu' => __('places-management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('school-country.update',$country)}}" enctype="multipart/form-data" autocoschool-countrylete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Country') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('school-country.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Country Name (Common Name, ISO 3166-1)') }}" value="{{ old('name',$country->name) }}" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Country Code') }}</label>

                  <div class="col-sm-7">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('country_code') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('country_code') ? ' is-invalid' : '' }}" name="cca2" id="input-country_code" type="text" placeholder="{{ __('Country Code (ISO 3166-1 alpha-2)') }}" value="{{ old('country_code',$country->cca2) }}" aria-required="true"/>
                          @if ($errors->has('country_code'))
                            <span id="country_code-error" class="error text-danger" for="input-country_code">{{ $errors->first('country_code ') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('country_code') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('country_code') ? ' is-invalid' : '' }}" name="cca3" id="input-country_code" type="text" placeholder="{{ __('Country Code (ISO 3166-1 alpha-3)') }}" value="{{ old('country_code',$country->cca3) }}" aria-required="true"/>
                          @if ($errors->has('country_code'))
                            <span id="country_code-error" class="error text-danger" for="input-country_code">{{ $errors->first('country_code ') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Currency Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('currency_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('currency_name') ? ' is-invalid' : '' }}" name="currency_name" id="input-currency_name" type="text" placeholder="{{ __('Currency Name (Dollar, Rupiah, Australian Dollar, etc..)') }}" value="{{ old('currency_name',$country->currency_name) }}" aria-required="true"/>
                      @if ($errors->has('currency_name'))
                        <span id="currency_name-error" class="error text-danger" for="input-currency_name">{{ $errors->first('currency_name ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Currency Code') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('currency_code') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('currency_code') ? ' is-invalid' : '' }}" name="currency_code" id="input-currency_code" type="text" placeholder="{{ __('Currency Code (ISO 4217)') }}" value="{{ old('currency_code',$country->currency_code) }}" aria-required="true"/>
                      @if ($errors->has('currency_code'))
                        <span id="currency_code-error" class="error text-danger" for="input-currency_code">{{ $errors->first('currency_code ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Currency Symbol') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('currency_symbol') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('currency_symbol') ? ' is-invalid' : '' }}" name="currency_symbol" id="input-currency_symbol" type="text" placeholder="{{ __('Currency Symbol ($, Rp., etc..)') }}" value="{{ old('currency_symbol',$country->currency_symbol) }}" aria-required="true"/>
                      @if ($errors->has('currency_symbol'))
                        <span id="currency_symbol-error" class="error text-danger" for="input-currency_symbol">{{ $errors->first('currency_symbol ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Edit Country') }}</button>
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
