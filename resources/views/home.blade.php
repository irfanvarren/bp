@extends('layouts.bp-new')

@push('head-script')
<style type="text/css">
  /* the slides */
  .slider-3 .slick-slide {
    margin-left:27px;
  }

  /* the parent */
  .slider-3 .slick-list {
    margin-left:-27px;
  }
</style>
@endpush
@section('title','Best Partner Education - IELTS, PTE dan Konsultan Pendidikan Luar Negeri')
@section('content')
<div class="container-fluid p-0">
  <div class="slider1">
    @foreach($banner as $data_banner)
    <img src="{{asset($data_banner->image)}}" style="width:100%;" alt="">
    
    @endforeach
  </div>
</div>
<div class="container-fluid martop5">
  <center><h1>Promo</h1></center>
  <div class="slider2 martop3">
    @foreach($promo_news as $data_promo_news)
    <div class="container" style="cursor:grab;">
      <div style="max-height:50vh;margin-bottom:5px;">
       <div style="width:100%;height:180px;background:url('{{$data_promo_news->image != '' ? Storage::disk('news')->url($data_promo_news->image) : ''}}');background-size:cover;background-position: center;background-repeat: no-repeat;border-radius: 15px"></div>
     </div>
     <div>
      <h3>{{$data_promo_news->title}}</h3>
      <p>
       {!! str_limit(strip_tags($data_promo_news->body),252,$end = "...") !!}
     </p>
     <a href="{{url("media/promo/".date("Y/m",strtotime($data_promo_news->created_at)).'/'.$data_promo_news->slug)}}">Learn More</a>
   </div>
 </div>
 @endforeach
</div>
</div>
<div class="container-fluit martop5 pt-2 row" style="background-color:#F2F6F9;">
  <div class="col-sm-12">
    <center>
      <h1>Apa yang Kami Lakukan</h1>
    </center>
  </div>
  <div class="col-sm-4">
    <div class="d-flex justify-content-center">
      <img src="{{asset('/img/main/World-rafiki 1.png')}}" >
    </div>
    <div>
      <center>
        <h2>Imigrasi</h2>
        <p>
          Best Partner Education memberikan layanan bantuan keimigrasian yang mudah dan terpercaya.
        </p>
      </center>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="d-flex justify-content-center">
      <img src="{{asset('/img/main/Exams-rafiki.png')}}" >
    </div>
    <div>
      <center>
        <h2>Persiapan dan Tes</h2>
        <p> 
          Best Partner Education menyediakan pelatihan IELTS/TOEFL/PTE & General English dengan kualitas yang terbaik untuk siswa yang mempersiapkan pendaftaran sekolah mereka yang akan diberikan bimbingan oleh tutor yang berkualitas dan bersertifikasi.
        </p>
      </center>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="d-flex justify-content-center">
      <img src="{{asset('/img/main/City driver-rafiki 2.png')}}" >
    </div>
    <div>
      <center>
        <h2>Akomodasi dan Transportasi</h2>
        <p>
          Best Partner Education memberikan kemudahan dengan menyediakan akomodasi & transportasi ketika tiba di destinasi tujuan.
        </p>
      </center>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="d-flex justify-content-center">
      <img src="{{asset('/img/main/Learning-amico 2.png')}}" style="height:192px;" >
    </div>
    <div>
      <center>
        <h2>Konsultasi</h2>
        <p>
          Menyediakan jasa konsultasi kepada para calon siswa yang hendak merencanakan studi ataupun ingin bekerja di luar negeri.
        </p>
      </center>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="d-flex justify-content-center">
      <img src="{{asset('/img/main/Trip-pana 2.png')}}" >
    </div>
    <div>
      <center>
        <h2>Widyawisata</h2>
        <p>
          Menjembatani sekolah atau instansi untuk melakukan kunjungan belajar ke sekolah mitra kami di dalam maupun luar negeri.
        </p>
      </center>
    </div>
  </div>
</div>
<div class="slider3 martop5"> 
  <div> 
    <img src="{{asset('/img/partnerships/Mudita Singkawang.jpg')}}" class="imggs" onclick="location.href='http://www.smkmudita.sch.id/umum/index.php'" style="cursor:pointer">
  </div>
  <div> 
    <img src="{{asset('/img/partnerships/Pratiwi Singkawang.jpg')}}" class="imggs" onclick="location.href='http://smkpratiwi-singkawang.sch.id/'" style="cursor:pointer">
  </div>
  <div> 
    <img src="{{asset('/img/partnerships/SMKN 7 Pontianak.jpg')}}" class="imggs" onclick="location.href='https://smkn7ptk.sch.id/'" style="cursor:pointer">
  </div>
  <div>
    <img src="{{asset('/img/partnerships/LOGO STBA.png')}}" class="imggs" onclick="location.href='http://www.stbapontianak.ac.id/'" style="cursor:pointer">
  </div>
  <div>
    <img src="{{asset('/img/partnerships/LOGO STIE.png')}}" class="imggs" onclick="location.href='http://www.stieip.ac.id/'" style="cursor:pointer">
  </div>
  <div>
    <img src="{{asset('/img/partnerships/LOGO ASMI.png')}}" class="imggs" onclick="location.href='http://www.stieip.ac.id/'" style="cursor:pointer">
  </div>
  <div>
    <img src="{{asset('/img/partnerships/WD.png')}}" class="imggs" onclick="location.href='https://widyadharmapnk.ac.id/'" style="cursor:pointer">
  </div>
  <div>
    <img src="{{asset('/img/partnerships/STBA Harapan Bersama.png')}}" class="imggs" onclick="location.href='http://www.stbharapanbersama.ac.id/'" style="cursor:pointer">
  </div>
</div>
<center class="martop5"><h1>Dapatkan Berbagai Informasi & Artikel <br> Pendidikan Terbaru di sini!</h1></center>
<div class="w3-container martop3">
  <div class="w3-half w3-padding">
    @if(isset($news[0]))
    <div class="w3-round-xlarge w3-border w3-padding w3-margin-top">
      <div class="w3-container">
        <img src="{{Storage::disk('news')->url($news[0]->image)}}" style="width:100%;border-radius:10px;">
      </div>

      <h2>{{$news[0]->title}}</h2>
      <p style="font-size:12px;">
       {!! str_limit(strip_tags($news[0]->body),252,$end = "...") !!}
     </p>
     <a href="{{url("media/news/".date("Y/m",strtotime($news[0]->created_at)).'/'.$news[0]->slug)}}">Read More</a>
   </div>
   @endif
 </div>
 <div class="w3-half w3-padding">
  @if(isset($news[1]))
  <div class="w3-container w3-border w3-round-xlarge w3-padding w3-margin">
    <div class="w3-half w3-padding">
      <h3>{{$news[1]->title}}</h3>
      <p style="font-size:12px;">
       {!! str_limit(strip_tags($news[1]->body),252,$end = "...") !!}
     </p>
     <a href="{{url("media/news/".date("Y/m",strtotime($news[1]->created_at)).'/'.$news[1]->slug)}}">Read More</a>
   </div>
   <div class="w3-half">
    <img src="{{Storage::disk('news')->url($news[1]->image)}}" style="width:100%;border-radius:10px;">
  </div>
</div>
@endif
@if(isset($news[2]))
<div class="w3-container w3-border w3-round-xlarge w3-padding w3-margin">
  <div class="w3-half w3-padding">
    <h3>{{$news[2]->title}}</h3>
    <p style="font-size:12px;">
     {!! str_limit(strip_tags($news[2]->body),252,$end = "...") !!}
   </p>
   <a href="{{url("media/news/".date("Y/m",strtotime($news[2]->created_at)).'/'.$news[2]->slug)}}">Read More</a>
 </div>
 <div class="w3-half">
  <img src="{{Storage::disk('news')->url($news[2]->image)}}" style="width:100%;border-radius:10px;">
</div>
</div>
@endif
</div>

</div>
<center><a class="w3-button w3-indigo w3-round-xlarge" href="{{url('media/news')}}">Lihat Artikel Lainnya</a></center>
<div class="w3-container d martop5 grep">
  @foreach($testimony as $data_testimony)
  <div class="w3-third w3-center">
    <center>
      <img src="{{asset('/img/petik.png')}}"><br>
      <img src="{{asset('/img/bintang.png')}}">
    </center>
    <p>
     {{$data_testimony->testimony}} 
   </p>
   <h1>
    {{$data_testimony->name}}
  </h1>
</div>
@endforeach

</div>


@endsection
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
    $('.slider2').slick({
      infinite: false,
      slidesToScroll: 2,
      slidesToShow: 4,
      rows: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: false,
      prevArrow: '<button class="slide-arrow prev-arrow"></button>',
      nextArrow: '<button class="slide-arrow next-arrow"></button>',
      responsive: [{
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 1080,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
        }
      },
      {
        breakpoint: 745,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
        }
      }
      ]
    });
    $('.slider3').slick({
      infinite: false,
      slidesToScroll: 2,
      slidesToShow: 6,
      rows: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: false,
      prevArrow: '<button class="slide-arrow prev-arrow"></button>',
      nextArrow: '<button class="slide-arrow next-arrow"></button>',
      responsive: [{
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 1080,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
        }
      },
      {
        breakpoint: 745,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
        }
      }
      ]
    });
    $('.d').slick({
      infinite: false,
      slidesToScroll: 1,
      slidesToShow: 3,
      rows: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: false,
      prevArrow: '<button class="slide-arrow prev-arrow"></button>',
      nextArrow: '<button class="slide-arrow next-arrow"></button>',
      responsive: [{
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 1080,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
        }
      },
      {
        breakpoint: 745,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
        }
      }
      ]
    });

  });
</script>
@endpush
