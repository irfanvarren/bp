<?php
$banner = App\Models\Library\Cms\Banner::all(); 
?>
@if(count($banner))
<div id="carousel-example-generic"  class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox"> 
    @foreach($banner as $banner)
    <div class="item active">
      <img src="{{$banner->link_banner1}}" width="100%" alt="">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="{{$banner->link_banner2}}" width="100%" alt="">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="{{$banner->link_banner3}}" width="100%" alt="">
      <div class="carousel-caption">
        ...
      </div>

    </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endif