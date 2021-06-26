<!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('includes.head')

    <style type="text/css">
    .loading{
      position: fixed;
      top:0;
      width: 100%;
      height: 100%;
      left: 0;
      font-size:28px;
      text-align: center;
      background: rgba(255,255,255,0.8);
      z-index: 20;
      display: table;
      visibility: hidden;
    }
    .loading > div {
      display: table-cell;
      vertical-align: middle;
    }
    #main{
      padding-top: 0 !important;
    }
    .dashboard-student{
      height: 100vh;
    }
    .dashboard-student main{
      -webkit-box-flex: 0;
      flex:1;
      padding:15px 45px;
    }
    .dashboard-student .sidebar-wrapper{
      background: #2A3F54;
      -webkit-box-flex: 0;
      flex: 0 0 20%;
      max-width: 250px;
      padding:0 15px;
      height: 100%;

    }
    .dashboard-student .sidebar-menu li{
      color: white !important;
    }
    .dashboard-student .sidebar-menu li a{
      color: white !important;
    }
  </style>


  @stack('head-script')
  <!-- Fonts -->
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('material') }}/css/chartist.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar-menu/sidebar-menu.css')}}">

</head>
<body>
  @yield('modal')
  <div class="col-sm-12">


   <div id="main" class="row">
    <div class="popup-overlay"></div>


    <div class="loading">
      <div>
        Loading...
      </div>
    </div>

    <div class="col-md-12 dashboard-student">
      <div class="row h-100">
        <div class="col-md-12 h-100">
          <div class="row h-100">
           <section class="sidebar-wrapper p-3">
            <div class="row" style="height: 100%;">
              <ul class="col-sm-12 sidebar-menu myMenu" style="height:100%;">
                <li class="sidebar-header">
                 <i class="fa fa-user-circle-o" style="font-size:30px;vertical-align: middle" aria-hidden="true"></i> 
                 <span class="username"><strong>{{ auth()->check() ? auth()->user()->name : 'Guest'}}</strong></span>
               </li>
               <li class="sidebar-header">
                 <h3 style="text-transform: uppercase;letter-spacing: .5px;font-weight: 700;font-size: 11px;">Murid</h3>
               </li>
               <li>
                <a href="{{url('student')}}">
                  <i class="fa fa-line-chart"></i> <span>Dashboard</span> 
                </a>
              </li>

              <li>
                <a href="{{url('student/profile')}}">
                  <i class="fa fa-user"></i> <span>Profil</span> 
                </a>
              </li>

              <li>
                <a href="{{url('student/courses')}}">
                  <i class="fas fa-book"></i> <span>Kursus</span> 
                </a>
              </li>
              <li>
                <a href="{{url('student/tests')}}">
                  <i class="fas fa-file-alt"></i> <span>Online Test</span> 
                </a>
              </li>
              <li>
                <a href="https://moodle.bestpartnereducation.com">
                  <i class="fa fa-leanpub"></i> <span>E-Learning</span> 
                </a>
              </li>
              <li>
                <a href="{{url('/enquiry')}}">
                  <i class="fa fa-comment"></i> <span>Bimbingan</span> 
                </a>
              </li>

              <li>
                <a href="{{url('student/payments')}}">
                  <i class="fas fa-money-check-alt"></i> <span>History Pembayaran</span> 
                </a>
              </li>
              <li>
                <a href="{{url('student/print-card')}}">
                  <i class="fa fa-print"></i> <span>Cetak Kartu Murid</span> 
                </a>
              </li>
              <li>
                <a href="{{url('enquiry')}}">
                  <i class="fa fa-bed"></i> <span>Cuti Kuliah</span> 
                </a>
              </li>



              <li>
                <a href="{{route('logout')}}">
                  <i class="fa fa-sign-out "></i> <span>Keluar</span>
                </a>
              </li>
            </ul>
          </div>
        </section>
        <main style="max-height: 100vh;overflow-y:auto">
          @yield('student-content')

        </main>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('js/mega-menu/megamenu.js')}}"></script>

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
<script src="{{asset('/js/slick.js')}}"></script>
<!--<script src="{{asset('/js/toggle-nav.js')}}" type="text/javascript"></script>-->
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>
<script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
@stack('more-script')
<script type="text/javascript" src="{{asset('js/sidebar-menu/sidebar-menu.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149158649-1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
  window.Modernizr || document.write('<script src="js/vendor/modernizr-2.8.3.min.js"><\/script>')
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149158649-1');
</script>
<script type="text/javascript">
//document.addEventListener('contextmenu',event => event.preventDefault());
function mobile_menu(x){
  x.classList.toggle("change");
}
</script>

<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
<script type="application/ld+json">
  [ {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "Immigration",
    "image" : "https://bestpartnereducation.com/public/img/logo%20lama.png",
    "telephone" : "(0561) 8172583",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi,",
      "addressLocality" : "Kota Pontianak",
      "addressRegion" : "Kalimantan Barat",
      "addressCountry" : "Indonesia",
      "postalCode" : "78115"
    },
    "openingHoursSpecification" : {
      "@type" : "OpeningHoursSpecification",
      "opens" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30",
      "closes" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30"
    },
    "review" : [ {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Vianey Priscilla"
      },
      "reviewBody" : "Sangat direkomendasi kan jika ingin test IELTS. Harga terjangkau, free simulasi, ruangan memadai, guru terlatih. Menyedikan kelas persiapan IELTS &amp; test IELTS setiap bulan ! Sukses trus buat Best Partner Pontianak 👍�🏻�"
    }, {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Endy Vandrea"
      },
      "reviewBody" : "Sir Egi orang nya friendly ketika diajarin dia ,ketika kita tidak mengerti dia tetap membantu kita. Walaupun tidak di jam les kita tanya sesuatu dia membantu kita , But when he have a time he will respond it and they’re said to me about my English speaking  be better. When we’re tired or down he wil help and motivated  us."
    } ]
  }, {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "IELTS Preparation & Test",
    "image" : "https://bestpartnereducation.com/public/img/logo%20lama.png",
    "telephone" : "(0561) 8172583",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi,",
      "addressLocality" : "Kota Pontianak",
      "addressRegion" : "Kalimantan Barat",
      "addressCountry" : "Indonesia",
      "postalCode" : "78115"
    },
    "openingHoursSpecification" : {
      "@type" : "OpeningHoursSpecification",
      "opens" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30",
      "closes" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30"
    },
    "review" : [ {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Vianey Priscilla"
      },
      "reviewBody" : "Sangat direkomendasi kan jika ingin test IELTS. Harga terjangkau, free simulasi, ruangan memadai, guru terlatih. Menyedikan kelas persiapan IELTS &amp; test IELTS setiap bulan ! Sukses trus buat Best Partner Pontianak 👍�🏻�"
    }, {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Endy Vandrea"
      },
      "reviewBody" : "Sir Egi orang nya friendly ketika diajarin dia ,ketika kita tidak mengerti dia tetap membantu kita. Walaupun tidak di jam les kita tanya sesuatu dia membantu kita , But when he have a time he will respond it and they’re said to me about my English speaking  be better. When we’re tired or down he wil help and motivated  us."
    } ]
  }, {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "Consultation",
    "image" : "https://bestpartnereducation.com/public/img/logo%20lama.png",
    "telephone" : "(0561) 8172583",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi,",
      "addressLocality" : "Kota Pontianak",
      "addressRegion" : "Kalimantan Barat",
      "addressCountry" : "Indonesia",
      "postalCode" : "78115"
    },
    "openingHoursSpecification" : {
      "@type" : "OpeningHoursSpecification",
      "opens" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30",
      "closes" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30"
    },
    "review" : [ {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Vianey Priscilla"
      },
      "reviewBody" : "Sangat direkomendasi kan jika ingin test IELTS. Harga terjangkau, free simulasi, ruangan memadai, guru terlatih. Menyedikan kelas persiapan IELTS &amp; test IELTS setiap bulan ! Sukses trus buat Best Partner Pontianak 👍�🏻�"
    }, {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Endy Vandrea"
      },
      "reviewBody" : "Sir Egi orang nya friendly ketika diajarin dia ,ketika kita tidak mengerti dia tetap membantu kita. Walaupun tidak di jam les kita tanya sesuatu dia membantu kita , But when he have a time he will respond it and they’re said to me about my English speaking  be better. When we’re tired or down he wil help and motivated  us."
    } ]
  }, {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "TOEFL Preparation & Test",
    "image" : "https://bestpartnereducation.com/public/img/logo%20lama.png",
    "telephone" : "(0561) 8172583",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi,",
      "addressLocality" : "Kota Pontianak",
      "addressRegion" : "Kalimantan Barat",
      "addressCountry" : "Indonesia",
      "postalCode" : "78115"
    },
    "openingHoursSpecification" : {
      "@type" : "OpeningHoursSpecification",
      "opens" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30",
      "closes" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30"
    },
    "review" : [ {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Vianey Priscilla"
      },
      "reviewBody" : "Sangat direkomendasi kan jika ingin test IELTS. Harga terjangkau, free simulasi, ruangan memadai, guru terlatih. Menyedikan kelas persiapan IELTS &amp; test IELTS setiap bulan ! Sukses trus buat Best Partner Pontianak 👍�🏻�"
    }, {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Endy Vandrea"
      },
      "reviewBody" : "Sir Egi orang nya friendly ketika diajarin dia ,ketika kita tidak mengerti dia tetap membantu kita. Walaupun tidak di jam les kita tanya sesuatu dia membantu kita , But when he have a time he will respond it and they’re said to me about my English speaking  be better. When we’re tired or down he wil help and motivated  us."
    } ]
  }, {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "Accommodation & Transportation",
    "image" : "https://bestpartnereducation.com/public/img/logo%20lama.png",
    "telephone" : "(0561) 8172583",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi,",
      "addressLocality" : "Kota Pontianak",
      "addressRegion" : "Kalimantan Barat",
      "addressCountry" : "Indonesia",
      "postalCode" : "78115"
    },
    "openingHoursSpecification" : {
      "@type" : "OpeningHoursSpecification",
      "opens" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30",
      "closes" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30"
    },
    "review" : [ {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Vianey Priscilla"
      },
      "reviewBody" : "Sangat direkomendasi kan jika ingin test IELTS. Harga terjangkau, free simulasi, ruangan memadai, guru terlatih. Menyedikan kelas persiapan IELTS &amp; test IELTS setiap bulan ! Sukses trus buat Best Partner Pontianak 👍�🏻�"
    }, {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Endy Vandrea"
      },
      "reviewBody" : "Sir Egi orang nya friendly ketika diajarin dia ,ketika kita tidak mengerti dia tetap membantu kita. Walaupun tidak di jam les kita tanya sesuatu dia membantu kita , But when he have a time he will respond it and they’re said to me about my English speaking  be better. When we’re tired or down he wil help and motivated  us."
    } ]
  }, {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "Study Tour",
    "image" : "https://bestpartnereducation.com/public/img/logo%20lama.png",
    "telephone" : "(0561) 8172583",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi,",
      "addressLocality" : "Kota Pontianak",
      "addressRegion" : "Kalimantan Barat",
      "addressCountry" : "Indonesia",
      "postalCode" : "78115"
    },
    "openingHoursSpecification" : {
      "@type" : "OpeningHoursSpecification",
      "opens" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30",
      "closes" : "Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30"
    },
    "review" : [ {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Vianey Priscilla"
      },
      "reviewBody" : "Sangat direkomendasi kan jika ingin test IELTS. Harga terjangkau, free simulasi, ruangan memadai, guru terlatih. Menyedikan kelas persiapan IELTS &amp; test IELTS setiap bulan ! Sukses trus buat Best Partner Pontianak 👍�🏻�"
    }, {
      "@type" : "Review",
      "author" : {
        "@type" : "Person",
        "name" : "Endy Vandrea"
      },
      "reviewBody" : "Sir Egi orang nya friendly ketika diajarin dia ,ketika kita tidak mengerti dia tetap membantu kita. Walaupun tidak di jam les kita tanya sesuatu dia membantu kita , But when he have a time he will respond it and they’re said to me about my English speaking  be better. When we’re tired or down he wil help and motivated  us."
    } ]
  } ]
</script>


<!-- Production version -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e7da78635bcbb0c9aaae552/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>

<!--End of Tawk.to Script-->
<!-- </body></html> -->
</body>
</html>



