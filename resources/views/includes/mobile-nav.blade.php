<span class="float-right menu-mobile-wrapper" style="padding:10px 30px 10px 0;position: absolute;top:0;right:0;text-align: right;width: 100%;line-height: 45px;">
     <!--<a class="nav-link user-menu pr-0">
      <i class="fa fa-user-circle-o" style="font-size:30px;vertical-align: middle" aria-hidden="true"></i> 
      <span class="username">{{ auth()->check() ? auth()->user()->name : 'Guest'}}</span>
      <div class="user-dropdown">
        <ul class="level_1 onHover bottom normal-sub">
          <li class="menu_item"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</li>
          <li class="menu_item"><i class="fa fa-cog" aria-hidden="true"></i> Profile</li>
          <li class="menu_item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</li>
        </ul>
      </div>
    </a>-->
    <a href="{{url('products/registration-and-payment')}}" class="nav-link" >
      <span class="position-relative">
        <i class="fa fa-shopping-cart" style="font-size:34px;vertical-align: middle" aria-hidden="true"></i>
        @php
        $cart_data = auth()->check() ? auth()->user()->cart_data(auth()->user()->id) : "";
          $cart_count = $cart_data != "" ? count($cart_data->items) : "0";
        @endphp
        <div id="cart-count" class="cart-count" @if(strlen($cart_count) > 1 ) style="font-size:10px" @else style="font-size:13px;" @endif>{{$cart_count > 99 ? '99+' : $cart_count}}</div>
      </span>
    </a>
    <a href="javascript:void(0)" class="nav-link">
     <i class="fa fa-bars" id="menu-mobile" style="font-size:34px;position: absolute;right: 0;margin-right: 15px;height: 45px;margin-top: 7px;"></i>
   </a>

 </span>