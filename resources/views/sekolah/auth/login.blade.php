@extends('layouts.school-app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('BP')])
@push('head-js')
<style type="text/css">
  .register-btn{
    border:2px solid #26c6da;
    color:#1a9abd;
    background:none;
    padding:10px 18px;
    border-radius:30px;
    transition: 0.5s ease;
    font-weight: 500;
    width: 100%;
    display: block;
    margin: 0 auto;
    text-align: center;
    font-size:16px;
  }
  .register-btn:hover{
    background-color:#1a9abd;
    color:white;
    border:2px solid white;

    cursor:pointer;
  }
</style>
@endpush
@section('navbar')
<!-- Navbar -->
@php
$activePage = 'login';
  if(!isset($titlePage)){
    $titlePage = "Login";
  }
@endphp
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <!--
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>-->
  </div>
</nav>
<!-- End Navbar -->
@endsection
@section('content')

<div class="container" style="height: auto;">
  <div class="row">
    <div class="col-lg-7 col-md-5">
    @if (session('messages'))
                  <div class="row">
                    <div class="col-sm-12" style="margin-top:25px; padding: 0 60px;">
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('messages') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

    </div>

    <div class="col-lg-5 col-md-7">
       <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('Best Partner Education.') }} </h3>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('school-validate-login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-info text-center">
            <h4 class="card-title"><strong>{{ __('Login') }}</strong></h4>
            <div class="social-line">
              <a href="{{ url('/auth/facebook') }}" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="{{ url('/auth/twitter') }}" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="{{ url('/auth/google') }}" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body">

            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
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
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" value="{{ !$errors->has('password') ? "" : "" }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>

          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-info btn-link btn-lg">{{ __('Log In') }}</button>
          </div>
           <div class="bmd-form-group">
                <div class="col-md-12">
                <div class="text-center" style="margin:45px 0 30px 0;">
                  <h3>
                    <strong>
                      Don't Have an Acount?
                    </strong>
                  </h3>
                </div>
                <div>
                  <h4><strong>User</strong></h4>
                  <div>Are you a student looking for higher education abroad? Register today and let our team of experts guide you through your journey. </div>
                </div>
                <div style="margin:25px 0 15px 0;">
                  <a class="register-btn" href="{{url('register')}}">Register</a><br>
                </div>
                </div>
            </div>
            <div class="bmd-form-group">
               
                <div class="col-md-12">
                  <h4><strong>Sub Agent</strong></h4>
                  <div>Do you recruit prospective students wanting to study abroad? Register today and become an ApplyBoard Certified recruitment partner.  </div>
                    <div style="margin:25px 0 15px 0;">
                  <a class="register-btn" href="{{url('search-schools/sub-agent/register')}}">Register As Sub Agent</a>
                </div>
                </div>
            </div>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-light">
                    <small>{{ __('Forgot password?') }}</small>
                </a>
            @endif
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('student-register') }}" class="text-light">
                <small>{{ __('Create new account') }}</small>
            </a>
        </div>
      </div>

    </div>

  </div>

    </div>
  </div>
 
</div>
<script type="text/javascript">
  function not_ready(){
    alert('Maaf Anda Belum Dapat Menggunakan Fitur Ini Sekarang !');
  }
</script>
@endsection
