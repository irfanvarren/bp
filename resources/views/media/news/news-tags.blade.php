@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .news-tag-desc{
    padding:15px;
    font-family:"calibri";
    color:#313131;
  }
  .news-tag-desc p{
    line-height:18px;
    font-size:16px;
  }
  .news-tag-title{
    line-height:25px;
  }
  .news-tag-wrapper .news-bg-img{
    margin-bottom:0;
  }
  .news-tag-wrapper{
    border-radius:8px;
    margin-bottom:20px;
    background:white;

    box-shadow:0px 0px 2px #bcbcbc;
  }
  .news-bg-img{
    height:170px !important;
    background-position: top left !important;
  }

  @media screen and (max-width:480px){
    .news-tag.content-wrapper{
      padding:30px;
    }
    .news-tag-center{
      padding:15px;
    }
  }
</style>
@section('title','#'.$tag.' | Best Partner')
@section('content')
<div class="col-md-12 content-wrapper news-tag">
  <div class="row justify-content-center">
    <div class="col-md-10 news-tag-center">

      <div class="row">

        <div class="col-md-8">
          <div class="row">


            @foreach($news as $data_news)
              <a href="{{url("media/news/".$data_news->created_at->format("Y/m/").$data_news->slug)}}">
            <div class="col-md-12 news-tag-wrapper">
              <div class="row">
                <div class="col-md-4 news-tag-img">
                  <div class="row">


                  <div class="col-md-12 news-bg-img" style="background-image:url(' {{ Storage::disk('news')->url($data_news->image) }}');">
                  </div>
                </div>

                </div>

                <div class="col-md-8 news-tag-desc">
                  <span style="font-family:">{{$data_news->created_at->format("l, d M Y H:i")}}</span>
                    <h3 class="news-tag-title">{{ucwords($data_news->title)}}</h3>
                    <p class="">
                  {!!	str_limit(strip_tags($data_news->body),180,$end = "...")!!}
                </p>
                </div>
                </div>
            </div>
            </a>
            @endforeach
          </div>
        </div>
    @include('includes.news-sidenav')


      </div>
    </div>
  </div>
</div>
@endsection
