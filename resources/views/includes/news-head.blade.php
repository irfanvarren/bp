<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-
  scalable=yes">

<!-- Primary Meta Tags -->
<meta name="title" content="@yield('title')">
<title>@yield('title')</title>
<link rel="icon" href="{{asset('img/favicon.ico')}}">
<meta name="description" content="Kami memberikan layanan dalam Persiapan IELTS ini sebagai solusi untuk pendidikan luar negeri.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="@yield('news-title')">
<meta property="og:description" content="@yield('news-desc')">
<meta property="og:image" content="@yield('news-image')">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="@yield('news-title')">
<meta property="twitter:description" content="@yield('news-desc')">
<meta property="twitter:image" content="@yield('news-image')">

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/bp110.css')}}">

	<link href="{{asset('/css/toggle-nav9.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style media="screen">
  .btn-primary.disabled, .btn-primary:disabled{
    cursor:not-allowed;
  }
</style>
<script src="{{asset('/js/jquery2.min.js')}}"></script>
<script src="{{asset('/js/slick.js')}}"></script>
	<!-- <script src="{{asset('/js/toggle-nav.js')}}" type="text/javascript"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149158649-1"></script>
<script src="{{asset('/js/jquery2.min.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('js/mega-menu/megamenu.js')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149158649-1');
</script>
<script type="text/javascript">
//document.addEventListener('contextmenu',event => event.preventDefault());
function mobile_menu(x){
  x.classList.toggle("change");
}
</script>
