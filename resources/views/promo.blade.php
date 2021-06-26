@extends('layouts.bp-new')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/salvattore.css')}}">
<style media="screen">

</style>
@endpush
@section('title', $type)
@section('content')
<div class="slider1">
   @foreach($banner as $data_banner)
    <img src="{{asset($data_banner->image)}}" style="width:100%;" alt="">
    @endforeach
</div>


<div class="container row martop5" style="margin:auto;">
  @foreach($news as $key => $data_news)
  <div class="col-sm-4 martop3" >
    <div style="max-height:50vh;margin-bottom:5px;">
      <img src="{{ Storage::disk('news')->url($data_news->image) }}" style="border-radius:15px;width:100%;">
    </div>
    <div class="martop3">
      <h3>{{$data_news->title}}</h3>
      <p>
      {!! str_limit(strip_tags($data_news->body),252,$end = "...") !!}
      </p>
      <a href="{{url("media/".$type."/".date("Y/m",strtotime($data_news->created_at)).'/'.$data_news->slug)}}">Learn More</a>
    </div>
  </div>
  @endforeach
</div>
@push('more-script')
<script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.slider1').slick({
      infinite: false,
      slidesToScroll: 1,
      slidesToShow: 1,
      rows: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: true,
      prevArrow: '<button class="slide-arrow prev-arrow"></button>',
      nextArrow: '<button class="slide-arrow next-arrow"></button>',

    });
  });
</script>
@endpush
@stop
