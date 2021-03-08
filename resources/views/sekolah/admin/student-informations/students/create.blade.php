@extends('layouts.app-auth', ['activePage' => 'countries', 'titlePage' => __('countries'),'activeMenu' => __('places-management')])
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
.selectize-input input{
  width:80% !important;
  pediting:0 5px;
  border:none;
}
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('school-students.store')}}" enctype="multipart/form-data" autocoschool-countrylete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Students') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('school-students.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Client Id') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('client_id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('client_id') ? ' is-invalid' : '' }}" name="client_id" id="input-client_id" type="text" placeholder="{{ __('Client Id') }}" value="{{ old('client_id') }}"  aria-required="true"/>
                      @if ($errors->has('client_id'))
                        <span id="client_id-error" class="error text-danger" for="input-client_id">{{ $errors->first('client_id ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dest. Country') }}</label>
                  <div class="col-sm-7">
                      <select name="country" id="country" class="selectize">
                        <option value="">Select Country</option>
                        @foreach($countries as $country)  
                          <option value="{{$country->id}}">{{$country->name}}</option>    
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value=""  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('Email') }}" value="" aria-required="true"/>
                          @if ($errors->has('email'))
                            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('country_code ') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Currency Name (Dollar, Rupiah, Australian Dollar, etc..)') }}" value=""  aria-required="true"/>
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Konfirmasi Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('confirm_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" id="input-confirm_password" type="password" placeholder="{{ __('Konfirmasi Password') }}" value="{{ old('confirm_password') }}"  aria-required="true"/>
                      @if ($errors->has('confirm_password'))
                        <span id="confirm_password-error" class="error text-danger" for="input-confirm_password">{{ $errors->first('confirm_password ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>-->
               
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Marketing Id') }}</label>
                  <div class="col-sm-7">
                      <select name="marketing_id" id="marketing_id" class="selectize">
                        <option value="">Select Marketing</option>
                        @foreach($marketings as $marketing)
                          <option value="{{$marketing->KD}}">{{$marketing->NAMA}}</option>                     
                        @endforeach
                      </select>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Visa Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('marketing_id') ? ' has-danger' : '' }}">
                      <select name="visa_status" id="visa_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="Approved">Approved</option>
                        <option value="Cancelled">Cancelled</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Students') }}</button>
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


$('#input-password').val();
    $('#status').change(function(){

      if(this.checked){
      $('#status-label').html('Active');
    }else{
        $('#status-label').html('Non Active');
    }
    });
  </script>
@endsection
