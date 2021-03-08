@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/salvattore.css')}}">
<style media="screen">
  .news{
    margin-bottom:30px;
  }
  .news-tags::before{
    content:'# ';
  }

  .media-news ol, .media-news ul{
    list-style-position: inside;
  }
  .media-news .img-wrap{
    width: 100%;
    background:white;
    height: 150px;
    margin-bottom: 15px;
    padding: 0;
    overflow: hidden;
    display:flex;
    flex-direction:column;
    justify-content:center;
  }
  .media-news .img-wrap img{
    margin:auto;
  }
  #fh5co-board .item {
    margin: 10px 10px 20px 10px;
    background: #fff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    border-radius: 4px;
    overflow: hidden;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  }
  #fh5co-board .item a {
    display: block;
  }
  #fh5co-board .item .fh5co-desc {
    float: left;
    line-height: 24px;
    width: 100%;
    padding:0px 15px 15px 15px;
  }
  #fh5co-board .item .fh5co-item-title {
    font-family: "Montserrat", arial, sans-ser
    font-size: 17px;
    line-height: 24px;
    margin: 0;
    padding: 0;
  }
  #fh5co-board .item img {
    max-width: 100%;
    width: 100%;
    -webkit-transition: 0.2s;
    -o-transition: 0.2s;
    transition: 0.2s;
  }
  #fh5co-board .item .fh5co-board-img {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    overflow: hidden;
  }
  #fh5co-board .item .image-popup:hover img {
    opacity: .5;
  }

  .animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }


  .animated.bounceIn,
  .animated.bounceOut {
    -webkit-animation-duration: .75s;
    animation-duration: .75s;
  }

  @-webkit-keyframes bounceIn {
    from, 20%, 40%, 60%, 80%, to {
      -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      -webkit-transform: scale3d(.3, .3, .3);
      transform: scale3d(.3, .3, .3);
    }

    20% {
      -webkit-transform: scale3d(1.1, 1.1, 1.1);
      transform: scale3d(1.1, 1.1, 1.1);
    }

    40% {
      -webkit-transform: scale3d(.9, .9, .9);
      transform: scale3d(.9, .9, .9);
    }

    60% {
      opacity: 1;
      -webkit-transform: scale3d(1.03, 1.03, 1.03);
      transform: scale3d(1.03, 1.03, 1.03);
    }

    80% {
      -webkit-transform: scale3d(.97, .97, .97);
      transform: scale3d(.97, .97, .97);
    }

    to {
      opacity: 1;
      -webkit-transform: scale3d(1, 1, 1);
      transform: scale3d(1, 1, 1);
    }
  }

  @keyframes bounceIn {
    from, 20%, 40%, 60%, 80%, to {
      -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      -webkit-transform: scale3d(.3, .3, .3);
      transform: scale3d(.3, .3, .3);
    }

    20% {
      -webkit-transform: scale3d(1.1, 1.1, 1.1);
      transform: scale3d(1.1, 1.1, 1.1);
    }

    40% {
      -webkit-transform: scale3d(.9, .9, .9);
      transform: scale3d(.9, .9, .9);
    }

    60% {
      opacity: 1;
      -webkit-transform: scale3d(1.03, 1.03, 1.03);
      transform: scale3d(1.03, 1.03, 1.03);
    }

    80% {
      -webkit-transform: scale3d(.97, .97, .97);
      transform: scale3d(.97, .97, .97);
    }

    to {
      opacity: 1;
      -webkit-transform: scale3d(1, 1, 1);
      transform: scale3d(1, 1, 1);
    }
  }

  .bounceIn {
    -webkit-animation-name: bounceIn;
    animation-name: bounceIn;
  }
</style>
@endpush
@section('title', $type)
@section('content')

<div class="content-wrapper col-md-12" style="padding:30px;">
  <div id="fh5co-board" data-columns>
    @php
    $timer_list = array();
    @endphp
    @foreach($news as $key => $data_news)
    {{$data_news}}
    @if(strtotime($data_news->start_date) <= \Carbon\Carbon::now()->timestamp)
    <a href="{{url("media/".$type."/".date("Y/m",strtotime($data_news->created_at)).'/'.$data_news->slug)}}" style="color:black">
      <div class="item">
        <div class="animate-box">
          <div class="image-popup fh5co-board-img" title="{{$data_news->title}}"><img src="{{ Storage::disk('news')->url($data_news->image) }}" alt="{{$data_news->title}}"></div>
        </div>
        <div class="fh5co-desc">
          <div style="padding: 15px 0">{{$data_news->title}}</div>
          <div style="background:#2E62A6;color:white;width:100%;padding:7px;text-align:center;width: 100%;">
            <div id="timer{{$key}}" style="font-size:18px;"> 00 d 00 h 00 m 00 s</div>
          </div>
        </div>


      </div>
    </a>
    @endif
    @php
    array_push($timer_list,strtotime($data_news->end_date));
    @endphp
    @endforeach
  </div>
  <div class="col-md-12">
    {{$news->links()}}
  </div>
</div>
@push('more-script')
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/salvattore.min.js')}}"></script>
<script type="text/javascript">
  var now = "{{\Carbon\Carbon::now()->timestamp }}";
  var onloadTimer = [];
  function makeInteger(time,x,mod){
    var time = Math.floor(time/x) % mod;
    if(time < 10){
      time = "0" + time;
    }
    return time;
  }

var timer_list = {!!json_encode($timer_list)!!};
console.log(timer_list);
$(document).ready(function(){
  $.each(timer_list,function(k,timeout){
    if(timeout > 0 && timeout != null){ 
      var timer = (timeout - now);
      onloadTimer[k] =  setInterval(function() {
        if(timer > 0){
          timer--; 
          var weeks = "00",
          days = makeInteger(timer,60 * 60 * 24 ,999),
          hours = makeInteger(timer,60 * 60,24),
          minutes = makeInteger(timer,60,60),
          seconds = makeInteger(timer,1,60);   
          if(weeks != "00"){
          var  output = weeks + " wk ";
          }else{
          var output = "";
          } 
          output += days + " d " + hours + " h " + minutes + " m " + seconds + " s ";
          $("#timer"+k).html(output);
        }else{
          clearInterval(onloadTimer[k]);
        } 
      }, 1000);
    }
  });

});



  ;(function () {

    'use strict';

    // iPad and iPod detection  
    var isiPad = function(){
      return (navigator.platform.indexOf("iPad") != -1);
    };

    var isiPhone = function(){
      return (
        (navigator.platform.indexOf("iPhone") != -1) || 
        (navigator.platform.indexOf("iPod") != -1)
        );
    };

    // OffCanvass
    var offCanvass = function() {
      $('body').on('click', '.js-fh5co-menu-btn, .js-fh5co-offcanvass-close', function(){
        $('#fh5co-offcanvass').toggleClass('fh5co-awake');
      });
    };

    // Click outside of offcanvass
    var mobileMenuOutsideClick = function() {
      $(document).click(function (e) {
        var container = $("#fh5co-offcanvass, .js-fh5co-menu-btn");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          if ( $('#fh5co-offcanvass').hasClass('fh5co-awake') ) {
            $('#fh5co-offcanvass').removeClass('fh5co-awake');
          }
        }
      });

      $(window).scroll(function(){
        if ( $(window).scrollTop() > 500 ) {
          if ( $('#fh5co-offcanvass').hasClass('fh5co-awake') ) {
            $('#fh5co-offcanvass').removeClass('fh5co-awake');
          }
        }
      });
    };




    var animateBoxWayPoint = function() {

      if ($('.animate-box').length > 0) {
        $('.animate-box').waypoint( function( direction ) {

          if( direction === 'down' && !$(this).hasClass('animated') ) {
            $(this.element).addClass('bounceIn animated');
          }

        } , { offset: '75%' } );
      }

    };

    

    
    $(function(){
      offCanvass();
      mobileMenuOutsideClick();
      animateBoxWayPoint();
    });


  }());
  (function() {
    function logElementEvent(eventName, element) {
      console.log(
        Date.now(),
        eventName,
        element.getAttribute("data-src")
        );
    }
    var callback_enter = function(element) {
      logElementEvent("🔑 ENTERED", element);
    };
    var callback_exit = function(element) {
      logElementEvent("🚪 EXITED", element);
    };
    var callback_reveal = function(element) {
      logElementEvent("👁️ REVEALED", element);
    };
    var callback_loaded = function(element) {
      logElementEvent("👍 LOADED", element);
    };
    var callback_error = function(element) {
      logElementEvent("💀 ERROR", element);
      element.src =
      "https://via.placeholder.com/440x560/?text=Error+Placeholder";
    };
    var callback_finish = function() {
      logElementEvent("✔️ FINISHED", document.documentElement);
    };
    var ll = new LazyLoad({
      elements_selector: ".lazy",
            // Assign the callbacks defined above
            callback_enter: callback_enter,
            callback_exit: callback_exit,
            callback_reveal: callback_reveal,
            callback_loaded: callback_loaded,
            callback_error: callback_error,
            callback_finish: callback_finish
          });
  })();
</script>
@endpush
@stop
