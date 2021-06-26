  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Best Partner | IELTS Test Center') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.ico')}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
    
    <style type="text/css">
      .collapse .collapse{
        padding-left:15px;
      }
      html,body{
        font-family: Verdana,sans-serif;
      }
      body.modal-open .main-panel{
        height:auto !important;
        max-height: none !important;
      }
      .sidebar .sidebar-wrapper .nav .nav-item .nav-link .sidebar-normal{
        overflow: hidden;
        text-overflow: ellipsis;
      }
    </style>
    @stack('head-js')
  </head>
  <body class="{{ $class ?? '' }}">
    @yield('modal')
    @include('layouts.page_templates.auth')



    <!--   Core JS Files   -->
    <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('material') }}/js/core/popper.min.js"></script>


    <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
           <!--  <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard 
          <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        -->
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        
          <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar  
            <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>  -->

            <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
            <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
            <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
            <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
            <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
            <!-- Library for adding dinamically elements -->
            <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
            <!--  Google Maps Plugin    -->
            <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>-->
            <!-- Chartist JS -->
            <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
            <!--  Notifications Plugin    -->
            <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
            <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
          <!-- Material Dashboard DEMO methods, don't include it in your project! 
            <script src="{{ asset('material') }}/demo/demo.js"></script>-->

            <script type="text/javascript" src="{{asset('js/fileinput.js')}}">

            </script>
            <script src="{{ asset('material') }}/js/settings.js"></script>
            @stack('js')
            @yield('more-script')
            <script type="text/javascript">
            </script>
          </body>
          </html>
