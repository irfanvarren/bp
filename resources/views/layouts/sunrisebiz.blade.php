<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')
  @stack('head-script')

</head>
<body style="background: #F0F2E7">
  <div class="container">

<div id="main" class="row">

  @yield('content')
</div>

</div>
<script src="{{asset('/js/app.js')}}"></script>
@stack('more-script')


</body>
</html>
