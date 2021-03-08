@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .content-wrapper.news-tag{
    padding:0 15px !important;
  }
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
    background:white;

    box-shadow:0px 0px 2px #bcbcbc;
  }
  .news-bg-img{
    width:100%;
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
    <div class="col-md-11 news-tag-center">

      <div class="row">

        <div class="col-md-8" style="padding:15px;">



          @foreach($news as $data_news)
          <a class="col-md-12" style="margin:15px 0;" href="{{url("media/promo/".$data_news->created_at->format("Y/m/").$data_news->slug)}}">
            <div class="row">
              <div class="col-md-12 news-tag-wrapper">
                <div class="row">
                  <div class="col-md-4 news-tag-img">
                    <div class="row">

                      <div class="col-md-12 news-bg-img" style="background-image:url(' {{ Storage::disk('news')->url($data_news->image) }}');">
                      </div>
                    </div>

                  </div>

                  <div class="col-md-8 news-tag-desc">
                    <div class="row">
                    <span class="col-md-12" style="font-family:font-size:12px;color:#666;margin-bottom:7px;">{{$data_news->created_at->format("l, d M Y H:i")}}</span>
                    <h3 class="col-md-12 news-tag-title">{{ucwords($data_news->title)}}</h3>
                    <p class=" col-md-12">
                      {!!	str_limit(strip_tags($data_news->body),180,$end = "...")!!}
                    </p>
                  </div> 
                  </div>
                </div>
              </div>
            </div>
          </a>

          @endforeach
        </div>
        @include('includes.news-sidenav')


      </div>
    </div>
  </div>
</div>
@endsection
