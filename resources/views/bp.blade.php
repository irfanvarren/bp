<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    @stack('head-script')
</head>
<body>
    <div class="container-fluid">
        <header class="row">
            @include('includes.header')
        </header>

        <div id="main" class="row">

            @yield('content')

        </div>

        <footer class="row">
            @include('includes.top-footer')
            @include('includes.footer')
        </footer>
    </div>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){

            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5e7da78635bcbb0c9aaae552/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
