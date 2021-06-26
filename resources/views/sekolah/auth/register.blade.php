@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register','activeMenu' =>'' ,'title' => __('Student Login')])
@section('navbar')
<!-- Navbar -->
@php
$activePage = 'register';
if(!isset($titlePage)){
$titlePage = "Login";
}
@endphp
@push('head-js')
<style type="text/css">
 .form-tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block !important;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

.step.finish {
  background-color: #4CAF50;
}
.input-group{
  margin-bottom:15px;
}
.col-form-label{
  padding:17px 15px 0 15px !important;
  text-align:left !important;
}
.login-page .card-login .card-body .input-group .form-control{
  margin-top:5px !important;
}
#btn-submit{
  display: none;|}
</style>
@endpush
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}">{{ $titlePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="{{ route('student-register') }}" class="nav-link">
            <i class="material-icons">person_add</i> {{ __('Register') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('student-login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
@endsection
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

      <form class="form" method="POST" action="{{route('school-register')}}">
        @csrf

        <div class="card card-login mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
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

            <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
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
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
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
                {{ __('I agree with the ') }} <a href="{{url('register/term-and-condition')}}">{{ __('Privacy Policy') }}</a>
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


</script>
@endsection

@push('js')
    @endpush
