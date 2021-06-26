<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')

        <!-- Fonts -->

        <!-- Styles -->
        @yield('style')
    </head>
    <body>

        <div class="container">
            <header class="row clearfix">
                @yield('portfolio-header')
            </header>

    <div id="main" class="row">
            @yield('content')
    </div>


</body></html>
