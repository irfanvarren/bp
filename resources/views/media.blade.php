@extends('layouts.bp_wo_sidenav')
@section('title', 'Media')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header">
  <div class="col-md-12" style="padding:15px 0;">
    <div class="col-md-12">

      <h1>Recent Events</h1>
    </div>


  </div>
    <div class="slick-slider3 col-md-12" style="padding:0;">
        <div class="slick-slide">
          <div class="col-md-12 recent-" style="height:350px;background-image:url('{{asset('/img/events/events1.JPG')}}');background-size:contain;background-repeat:no-repeat;">

          </div>

        </div>
        <div class="slick-slide">
          <div class="col-md-12" style="height:350px;background-image:url('{{asset('/img/events/events1.JPG')}}');background-size:cover;">

          </div>

        </div>
      </div>

</div>

<div class="col-md-12 content-wrapper">

</div>
<script type="text/javascript">
$('.slick-slider3').slick({
  infinite: true,
slidesToScroll: 1,
slidesToShow:1,
lazyLoad: 'ondemand',
rows:1,
prevArrow: '<a class="myslick-prev"> <i class="ion-ios-arrow-back"></i></a>',
nextArrow: '<a class="myslick-next"> <i class="ion-ios-arrow-forward"> </i> </a>',
autoplay:true,
autoplaySpeed:2500,

  responsive: [
  {
    breakpoint: 600,
    settings: {
        adaptiveHeight: true,
    }
  }
]
});
</script>

@stop
