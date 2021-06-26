@extends('layouts.bp-new')
@section('title', 'Testimony')
@section('content')

<div class="a martop8">
  <div class="w3-container">
     @foreach($testimonies as $testimony)
    <div class="w3-third w3-padding">
      <div class="w3-round-large w3-center w3-padding" style="background-color:#48CAE4;">
        <img src="{{asset('/img/testimony/21.png')}}" style="position:absolute;top:-10px;">
        <div style="width: 90px; height: 90px;border-radius: 50%;overflow: hidden;display: block;margin:0 auto;">
          <img src="{{asset($testimony->image)}}" style="margin:0 auto; height: 90px;" >
        </div>
        <p style="max-height: 70px;overflow: hidden;">
          {{$testimony->testimony}}
        </p>
        <p><b>{{$testimony->name}}</b></p>
      </div>
    </div>
    @endforeach
  </div>

</div>

@stop
@push('more-script')
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.a').slick({
      infinite: false,
      slidesToScroll: 1,
      slidesToShow: 1,
      rows: 2,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: true,
      prevArrow: '<button class="slide-arrow prev-arrow"></button>',
      nextArrow: '<button class="slide-arrow next-arrow"></button>',

    });
  
  });
</script>
@endpush
