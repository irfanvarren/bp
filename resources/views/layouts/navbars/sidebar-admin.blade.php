@php
if(!isset($activePage)){
$activePage = "";
}

if(!isset($activeMenu)){
$activeMenu = "";
}


@endphp
<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">

  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an imag e using data-image tag
    -->
    <div class="logo">
      <a href="{{route('admin-dashboard')}}" class="simple-text logo-normal text-center">
        {{ __("Admin") }}
      </a>
    </div>
    <div class="sidebar-wrapper">
     @if(isset($_menu_template))
     {{menu(Str::slug($_menu_template, '-'))}}
     @else
     {{ menu('Admin') }}
    @endif
   </div>
</div>

