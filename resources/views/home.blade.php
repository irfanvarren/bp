@extends('layouts.bp_wo_sidenav')

@push('head-script')
<style media="screen">
  .home-title-wrapper {
    height: inherit !important;
  }

  .home-news-wrapper .news:last-child{
    padding-right: 0 !important;
  }

  /*carousel testimony*/
  .indentity {
    margin: 0!important
  }
  figure.testimonial {
    position: relative;
    float: left;
    overflow: hidden;
    margin: 10px 1%;
    padding: 20px 20px;
    text-align: left;
    box-shadow: none !important;
  }
  figure.testimonial * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
    transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
  }
  figure.testimonial img {
    max-width: 100%;
    vertical-align: middle;
    height: 90px;
    width: 90px;
    border-radius: 50%;
    margin: 40px 0 0 0px;
  }
  figure.testimonial blockquote{
    padding-bottom:15px;
    height:275px;
    background-color:white;
    display: block;
    background-color: #fff;
    box-shadow: 7px -3px 7px rgba(0,0,0,0.1);
    border:1px solid #eee;
    border-left:5px solid #eee;
  }

  figure.testimonial blockquote div {


   display: -webkit-box;
   -webkit-line-clamp: 9;
   -webkit-box-orient: vertical;
   font-size: 16px;
   font-weight: 400;
   line-height: 1.5em;
   margin: 0;
   height:250px;
   overflow: hidden;
   padding: 30px 50px 30px;
   position: relative;

 }
 figure.testimonial blockquote div:before, figure.testimonial blockquote div:after {
  content: "\201C";
  position: absolute;
  color: #ff5057;
  font-size: 50px;
  font-style: normal;
}
figure.testimonial blockquote div:before {
  top: 25px;
  left: 20px;
}
figure.testimonial blockquote div:after {
  content: "\201D";
  right: 20px;
  bottom: 0;
}
figure.testimonial .btn {
  top: 100%;
  width: 0;
  height: 0;
  border-left: 0 solid transparent;
  border-right: 25px solid transparent;
  border-top: 25px solid #fff;
  margin: 0;
  position: absolute;
}
figure.testimonial .peopl {
  position: absolute;
  bottom: 65px;
  padding: 0 10px 0 120px;
  margin: 0;
  color: #ffffff;
  -webkit-transform: translateY(50%);
  transform: translateY(50%);
}
figure.testimonial .peopl h3 {
  opacity: 0.9;
  margin: 0;
}
.slick-slider {
  position: relative;
  display: block;
  box-sizing: border-box;
  user-select: none;
  -webkit-touch-callout: none;
  -khtml-user-select: none;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  -webkit-tap-highlight-color: transparent;
}
.slick-list {
  position: relative;
  display: block;
  overflow: hidden;
  margin: 0;
  padding: 0;
}
.slick-list:focus {
  outline: none;
}
.slick-list.dragging {
  cursor: pointer;
  cursor: hand;
}
.slick-slider .slick-track, .slick-slider .slick-list {
  transform: translate3d(0, 0, 0);
  height: 100 %;
}
.slick-track {
  position: relative;
  top: 0;
  left: 0;
  display: block;
}
.slick-track:before, .slick-track:after {
  display: table;
  content: '';
}
.slick-track:after {
  clear: both;
}
.slick-loading .slick-track {
  visibility: hidden;
}
.slick-slide {
  display: none;
  float: left;
  height: 100%;
  min-height: 1px;
}
.slick-slide img {
  display: block;
}
.slick-slide.slick-loading img {
  display: none;
}
.slick-slide.dragging img {
  pointer-events: none;
}
.slick-initialized .slick-slide {
  display: block;
}
.slick-loading .slick-slide {
  visibility: hidden;
}
.slick-vertical .slick-slide {
  display: block;
  height: auto;
  border: 1px solid transparent;
}
.slick-btn.slick-hidden {
  display: none;
}

.slick-prev, .slick-next {
  font-size: 0;
  line-height: 0;
  position: absolute;
  top: 40%;
  display: block;
  width: 20px;
  height: 20px;
  padding: 0;
  transform: translate(0, -50%);
  cursor: pointer;
  color: transparent;
  border: none;
  outline: none;
  background: transparent;
}
.slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus {
  color: transparent;
  outline: none;
  background: transparent;
}
.slick-prev:hover:before, .slick-prev:focus:before, .slick-next:hover:before, .slick-next:focus:before {
  opacity: 1;
}
.slick-prev:before, .slick-next:before {
  font-family: "FontAwesome";
  font-size: 40px;
  line-height: 1;
  opacity: .75;
  color: black;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.slick-prev {
  left: -40px;
}
.slick-prev:before {
  content: "";
}
.slick-next {
  right: -40px;
}
.slick-next:before {
  content: "";
}
.testimony-photo{
  display: block;
  width:110px;
  height: 110px;
  border-radius:50%;
  margin:0 auto;
}
.close-btn{
  float:right;font-size:16px;font-weight:bolder;background:none;border:none;padding:3px 8px;
}
.close-btn:hover{
  cursor:pointer;
}
.promo-card{
  border-radius:8px;padding:15px;border:1px solid #eee;overflow:hidden;box-shadow:2px 2px 4px #cecece;background: white;
}

.promo-card:hover{
  box-shadow:2px 2px 20px #ddd;
}
.myslick-nav1{
  margin-top: -25px !important;
}
.myslick-nav1 *{

  color:black !important;
}
.myslick-nav2{
  margin-top: -110px !important;
}
.myslick-nav2 *{
  color:white !important;
}

.country-wrapper .slick-slide{
  border-radius:15px;
}



</style>
@endpush
@section('title','Best Partner Education - IELTS, PTE dan Konsultan Pendidikan Luar Negeri')
@section('content')


<div class="col-md-12">
  <div class="row">
    @if(session()->has('message'))
    <div class="alert alert-success" style="text-align:center;position:fixed;top:0;left:0;z-index: 999;width:100%;">
      {!! session()->get('message') !!} 
      <span class="close-btn" onclick="close_alert()" name="button">X</span>
    </div>
    @endif
    <div class="col-md-12 slick-slider3" id="slick-slider3" style="min-height:400px;">

      @foreach($banner as $data_banner)
      <div class="slick-slide">
        @if ($data_banner->banner_type == "image")

        <a href="{{$data_banner->link != '' ? $data_banner->link : '#'}}" class="col-md-12 banner-mobile" >
          <img src="{{asset($data_banner->mobile_image)}}" style="width:100%;" alt="">
        </a>
        <a href="{{$data_banner->link != '' ? $data_banner->link : '#'}}" class="banner" style="min-height: 480px;">


          <img src="{{asset($data_banner->image)}}" onload="$('#slick-slider3').css({'min-height' : 'auto'});" style="width:100%;" alt="">
        </a>
        @else
        <div class="col-md-12 home-title-wrapper">

          <div class="home-title">
            {!! $data_banner->text !!}
          </div>
          <div class="col-md-6 slider-img slider-img1" style="background-image:url('{{asset($data_banner->image)}}');"> </div>
        </div>

        @endif
      </div>
      @endforeach

    </div>
  </div>
</div>

<div class="col-md-12" style="/*background:url('{{asset('img/background.jpg')}}');background-repeat: no-repeat;background-size:cover;padding:30px 15px;*/">
  <div class="row">
    <div class="col-md-12 destination-wrapper" style="background:url('{{asset('img/background.jpg')}}');background-repeat:no-repeat;padding:15px;background-size:cover;padding:30px 0 90px 0px;">
      <h1 style="font-family:'TruenoBd';margin:20px 0;margin-bottom:50px;">DESTINATIONS</h1>
      <div class="col-md-12 slick-slider1 country-wrapper">
        @foreach($countries as $country)
        <div class="slick-slide" onclick="location.href='study-abroad/{{strtolower($country->name)}}'">
          <div class="col-md-12 country" style="background-image:url('{{asset('img/countries/lama/'.$country->name.'.jpg')}}')">
            <div class="country-overlay">
              <h1>{{$country->name}}</h1>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>

    <div class="col-md-12 what_we_do">
      <h1>WHAT WE DO ?</h1>
      <div class="col-md-12 what_we_do-content-wrapper">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="col-md-12" style="height: 100%;padding:30px 15px;">
              <div class=" what_we_do-content">
                <img class="lazy" src="{{asset('/img/IMMIGRATIONN.png')}}">
                <div class="what_we_do-desc">
                  <h3>Immigration</h3>
                  <p>Kami memberikan layanan bantuan keimigrasian yang prima dan terpercaya</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="col-md-12" style="height: 100%;padding:30px 15px;">
              <div class=" what_we_do-content">
                <img class="lazy" src="{{asset('/img/TESTING AND TRAINING.png')}}">
                <div class="what_we_do-desc">
                  <h3>IELTS Preparation & Test</h3>
                  <p>Dapatkan nilai IELTS yang anda inginkan dengan kelas IELTS Training kami. Kami juga melaksanakan Test IELTS Resmi Setiap bulannya</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="col-md-12" style="height:100%;padding:30px 15px;">
              <div class="col-md-12 what_we_do-content">   <img class="lazy" src="{{asset('/img/CONSULTATIONN.png')}}">
                <div class="what_we_do-desc">
                  <h3>Consultation</h3>
                  <p>Ingin belajar atau bekerja keluar negeri? Kami siap membantu</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="col-md-12" style="height:100%;padding:30px 15px;">
              <div class="col-md-12 what_we_do-content">
                <img class="lazy" src="{{asset('/img/toefl preparation.png')}}" alt="toefl preparation & test">
                <div class="what_we_do-desc">
                  <h3>TOEFL Preparation & Test </h3>
                  <p>Kelas Persiapan TOEFL dan Tes TOEFL resmi</p>
                </div>
              </div></div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="col-md-12" style="height:100%;padding:30px 15px;">
                <div class="col-md-12 what_we_do-content">
                  <img class="lazy" src="{{asset('/img/accomodation.png')}}" alt="accommodation & transportation">
                  <div class="what_we_do-desc">
                    <h3>Accommodation & Transportation</h3>
                    <p>Kami membantu mencarikan tempat tinggal dan transportasi</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="col-md-12" style="height:100%;padding:30px 15px;">
                <div class="col-md-12 what_we_do-content">
                  <img class="lazy" src="{{asset('/img/study tour.png')}}" alt="study tour">
                  <div class="what_we_do-desc">
                    <h3>Study Tour</h3>
                    <p>Membantu tur belajar</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-12 home-content2" style="background:url('{{asset('img/pattern.jpg')}}');background-size: cover;">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-3">
              <h3>Promo</h3>
              <hr>

            </div>
          </div>
          <div class="col-md-12">
            <div class="row" style="margin:0 -30px;">
              @foreach($promo_news as $data_promo_news)
              <a class="col-lg-4 col-md-6 home-card-wrapper" href="{{url("media/promo/".date("Y/m",strtotime($data_promo_news->created_at)).'/'.$data_promo_news->slug)}}" style="color:black;padding:0;">
                <div class="col-lg-12 " style="padding:0 45px;margin:15px 0;">
                  <div class="row">
                    <div class="col-md-12 promo-card">
                      <div style="width:100%;height:180px;background:url('{{$data_promo_news->image != '' ? Storage::disk('news')->url($data_promo_news->image) : ''}}');background-size:cover;background-position: center;background-repeat: no-repeat;"></div>
                      <div style="padding:15px 0;">
                        <h3 style="font-size:1.4em;text-align:left !important;">{{ucwords($data_promo_news->title)}}</h3>
                      </div>
                      <div>
                        {{date("l, d M Y",strtotime($data_promo_news->created_at))}}
                      </div>
                      <div style="padding:15px 0;text-align:justify;max-height:110px;overflow:hidden; text-overflow:ellipsis">
                       {!! str_limit(strip_tags($data_promo_news->body),252,$end = "...") !!}
                     </div>
                   </div>
                 </div>
               </div>
             </a>
             @endforeach
           </div>
         </div>


       </div>
     </div>
     <div class="col-md-12 home-content2" style="background:url('{{asset('img/pattern.jpg')}}');background-size: cover;">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-3">
            <h3>News</h3>
            <hr>

          </div>
        </div>
        <div class="col-md-12">
          <div class="row" style="margin:0 -30px;">
            @foreach($news as $data_promo_news)
            <a class="col-lg-4 col-md-6 home-card-wrapper" style="color:black;border-radius:30px;padding:0" target="_blank" class="news-link" href="{{url("media/news/".date("Y/m",strtotime($data_promo_news->created_at)).'/'.$data_promo_news->slug)}}">
              <div class="col-lg-12 " style="padding:0 45px;margin:15px 0;">
                <div class="row">
                  <div class="col-md-12 promo-card">
                    <div style="width:100%;height:210px;background:url('{{Storage::disk('news')->url($data_promo_news->image)}}');background-size:cover;background-position: center;background-repeat: no-repeat;"></div>
                    <div style="padding:15px 0;">
                      <h3 style="font-size:1.4em;text-align:left !important;">{{ucwords($data_promo_news->title)}}</h3>
                    </div>
                    <div>
                      {{date("l, d M Y",strtotime($data_promo_news->created_at))}}
                    </div>
                    <div style="padding:15px 0;text-align:justify;height:135px;max-height:135px;overflow:hidden; text-overflow:ellipsis;line-height: 1.48rem;">
                     {!! str_limit(strip_tags($data_promo_news->body),252,$end = "...") !!}
                   </div>
                 </div>
               </div>
             </div>
           </a>
           @endforeach
         </div>
       </div>
     </div>
   </div>
   <div class="col-md-12 institution-logo" style="overflow: hidden;">
    <div class="row">
      <div class="col-md-12 text-center" style="font-family: 'TruenoBd';margin-bottom:15px;"><h2>Partnerships</h2></div>
      <div class="col-md-12 slick-slider2">
        <div class="slick-slide"><a href="http://www.smkmudita.sch.id/umum/index.php" target="_blank"><img src="{{asset('/img/partnerships/Mudita Singkawang.jpg')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="http://smkpratiwi-singkawang.sch.id/" target="_blank"><img src="{{asset('/img/partnerships/Pratiwi Singkawang.jpg')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="https://smkn7ptk.sch.id/" target="_blank"><img src="{{asset('/img/partnerships/SMKN 7 Pontianak.jpg')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="http://www.stbapontianak.ac.id/" target="_blank"><img src="{{asset('/img/partnerships/LOGO STBA.png')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="http://www.stieip.ac.id/" target="_blank"><img src="{{asset('/img/partnerships/LOGO STIE.png')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="http://www.stieip.ac.id/" target="_blank"><img src="{{asset('/img/partnerships/LOGO ASMI.png')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="https://widyadharmapnk.ac.id/" target="_blank"><img src="{{asset('/img/partnerships/WD.png')}}" class="institution-logo-image"></a></div>
        <div class="slick-slide"><a href="http://www.stbharapanbersama.ac.id/" target="_blank"><img src="{{asset('/img/partnerships/STBA Harapan Bersama.png')}}" class="institution-logo-image"></a></div>
      </div>
    </div>
  </div>

  <div class="col-md-12 home-content1" style="background-image: url({{asset('img/gradient3.jpg)')}};height: 500px;background-repeat:no-repeat;background-size:cover;">
    <div class="container" style="max-width: 1140px;" id="testiSlider">

      @foreach($testimony as $data_testimony)
      <div class="testiSlide">
        <div>
          <figure class="testimonial">
            <blockquote>
              <div>{{$data_testimony->testimony}}</div>

              <div class="btn"></div>
            </blockquote>
            <img src="{{asset($data_testimony->image)}}" alt="Christin Andrea" />
            <div class="peopl">
              <h3>{{$data_testimony->name}}</h3>
            </div>
          </figure>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>


@endsection
@push('more-script')
<script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
<script>
  function close_alert() {
    $('.alert').hide();
  }
  $('#testiSlider').slick({
   infinite: true,
   slidesToScroll: 1,
   slidesToShow: 2,
   autoplay: true,
   autoplaySpeed: 2500,
   arrows:false,
   responsive: [
   {
    breakpoint: 1000,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      arrows:false
    }
  },
  {
    breakpoint: 745,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
    }
  }
  ]
});

  $('.slick-slider3').slick({
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    lazyLoad: 'ondemand',
    rows: 1,
    prevArrow: '<span class="myslick-prev myslick-nav myslick-nav1" onclick="console.log("previous")"><i class="fa fa-angle-left"></i></span>',
    nextArrow: '<span class="myslick-next myslick-nav myslick-nav1" onclick="console.log("next")"> <i class="fa fa-angle-right"></i> </span>',
    autoplay: true,
    autoplaySpeed: 4500,
    adaptiveHeight: true,
    responsive: [{
      breakpoint: 600,
      settings: {
        arrows: false,
        adaptiveHeight: true,
      }
    }]
  });
  $('.slick-slider1').slick({
    infinite: true,
    slidesToScroll: 2,
    slidesToShow: 4,
    rows: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    prevArrow: '<a class="myslick-prev myslick-nav myslick-nav2" ><i class="fa fa-angle-left"></i></a>',
    nextArrow: '<a class="myslick-next myslick-nav myslick-nav2"> <i class="fa fa-angle-right"></i> </a>',
    responsive: [{
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      }
    },
    {
      breakpoint: 745,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
      }
    }
    ]
  });
  $('.slick-slider2').slick({
    infinite: true,
    slidesToScroll: 4,
    slidesToShow: 6,
    autoplay: false,
    autoplaySpeed: 2500,
    arrows: false,
    dots:true,
    responsive: [
    {
      breakpoint: 990,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 3,
        arrows: false,
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 3,
        arrows: false,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
      }
    }
    ]
  });
  $(".bg-slider").hide();
  $(".bg-slider:first-child").show();
  $(".prev").click(function() {
    slidePrev();
  });

  $(".next").click(function() {
    slideNext();
  });

  $(".nav-dots div").click(function() {
    slideTo($(this).index());
  });

  function myFunction(x) {
    x.classList.toggle("change");
  }

  function slidePrev() {
    if ($("#slider .active").index() == 0) {
      slideTo($("#slider .bg-slider").length - 1);
    } else {
      slideTo($("#slider .active").index() - 1);
    }
  }

  function slideNext() {
    if ($("#slider .active").index() == $("#slider .bg-slider").length - 1) {
      slideTo(0);
    } else {
      slideTo($("#slider .active").index() + 1);
    }
  }

  function slideTo(slide) {
    $("#slider .active").fadeOut().removeClass("active");
    $("#slider .bg-slider").eq(slide).fadeIn().addClass("active");

    $(".nav-dots .current").removeClass("current");
    $(".nav-dots div").eq(slide).addClass("current");
  }
  $(window).scroll(function(event) {
    var scroll = $(window).scrollTop();
        // Do somethin
        if (scroll >= 400) {
            /*  $('header').css({'position': 'fixed', 'top': '0', 'left': '15px','background' : '#2E62A6','padding':'15px'});
      $('.nav>li>a').css({'color' : 'white','font-weight':'bold'});
      $('.nav>li>a.active').css({'border-bottom':'3px solid white'});
      $('.logo').attr('src','/img/logo_putih.png');
      $('.logo').css({'width':'150px'});
      $('.nav-wrapper').css({'padding':'0 15px'});
      */

    } else if (scroll < 400) {
            /*    $('header').css({'position': 'relative','background' : '#F8FAFE','padding':'24px 10px'});
                $('.nav>li>a').css({'color' : '#333'});
                $('.nav>li>a.active').css({'border-bottom':'3px solid #3a6ca5','color':'#3a6ca5'});
                $('.logo').attr('src','/img/logo.png');
                $('.logo').css({'width':'200px'});*/
              }
            });
          </script>

          @endpush
