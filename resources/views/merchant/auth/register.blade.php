@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Daftar Merchant')])

@section('content')
@if($errors->any())
<div class="row collapse">
  <ul class="alert-box warning radius">
    @foreach($errors->all() as $error)
    <li> {{ $error }} </li>
    @endforeach
  </ul>
</div>
@endif

<div class="container" style="height: auto;">

  <div class="row align-items-center">

    <div class="col-lg-6 col-md-8 col-sm-10 ml-auto mr-auto">

      <form class="form" method="POST" id="merchant-register-form" action="{{route('merchant-post-register')}}" onsubmit="merchant_register(event)">
        @csrf

        <div class="card card-login mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Daftar Merchant') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" onclick="not_ready()" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" onclick="not_ready()" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" onclick="not_ready()" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            @if(session()->has('message'))
            <div class="col-md-12 alert alert-success">
              {!! session()->get('message') !!}
            </div>
            @endif
            <p class="card-description text-center">{{ __('Basic Information') }}</p>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">store</i>
                  </span>
                </div>
                <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Nama Usaha...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
              <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                <strong>{{ $errors->first('name') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">language</i>
                  </span>
                </div>
                <span style="padding:0.4375rem 0;padding-bottom: 10px;margin: 17px 10px 0 0;">{{url('merchant/')}}/</span>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="{{ __('Nama Domain...') }}" value="{{ old('slug') }}" required>
              </div>
              <div id="slug-error" class="error text-danger pl-3" for="slug" style="display: none;">
                <strong id="slug-error-text">{{ $errors->first('slug') }}</strong>
              </div>
            </div>
            <div class="bmd-form-group{{ $errors->has('alamat') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">map </i>
                  </span>
                </div>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="{{ __('Alamat...') }}" required>
              </div>
              @if ($errors->has('alamat'))
              <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                <strong>{{ $errors->first('alamat') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="text" name="no_telepon" class="form-control" placeholder="{{ __('Telephone...') }}" value="{{ old('no_telepon') }}" required>
              </div>
              @if ($errors->has('no_telepon'))
              <div id="email-error" class="error text-danger pl-3" for="no_telepon" style="display: block;">
                <strong>{{ $errors->first('no_telepon') }}</strong>
              </div>
              @endif
            </div>
            
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
              <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
              <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                <strong>{{ $errors->first('password') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Konfirmasi Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
              <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">


  function not_ready(){
    alert('Maaf Anda Belum Dapat Menggunakan Fitur Ini Sekarang !');
  }

  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };

  var slug_validation = false;
  var merchantSlug = debounce(function() {
    var slug = document.getElementById('slug').value;
    $.ajax({
      url: "{{route('merchant.check-slug')}}",
      method: 'GET',
      dataType: "json",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {
        slug : slug
      },
      success: function(data) {
        if(data.error !== undefined){
          document.getElementById('slug-error').style.display = 'block';
          document.getElementById('slug-error-text').innerHTML = data.error;
          slug_validation = false;
       }else{
          document.getElementById('slug-error').style.display = 'none';
          slug_validation = true;

       }
     },
     error: function() {
      alert('Error ! Please try to refresh the page');
    },complete: function(){

    }
  });

  }, 350);

  document.getElementById('slug').addEventListener('keyup', merchantSlug);

  function merchant_register(e){
    e.preventDefault();
    if(slug_validation){
    document.getElementById('merchant-register-form').submit();
    }
  }
</script>
@endsection
