@extends('layouts.bp_wo_footer')
@push('head-script')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style media="screen">
  .member-menu{
    box-shadow: 0 0 15px #dedede;
    background:white;
  }
  .member-menu .member-btn{
    background:none;
    border:none;
    padding:8px 0;
    font-size:1.2em;
  }
  .member-menu .member-btn:nth-child(2){
    border-right:1px solid #dedede;
    border-left:1px solid #dedede;
  }

  .merchant-content-wrapper {
    min-height: 300px;
  }

  .merchant-not-found {
    text-align: center;
    padding: 100px;
  }

  .member-dropdown-content {
    display: none;
    position: absolute;
    width: 80%;
    margin-top: 5px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .member-dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .member-dropdown-content a:hover {
    background-color: #f1f1f1
  }

  .dropdown:hover .member-dropdown-content {
    display: block;
  }
  .loading-wrapper{
    width:100vw;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    z-index:9999999;
    display:none;
    background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
    display:block;
    margin:0 auto;
    width:500px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);

  }

  .role-desc-wrapper{
    position: absolute;top: 0;left: 0;
    width: 100%;height: 100%;
    color:white;
  }

  .role-desc-wrapper > .role-desc{
    display: flex;align-items: center;height:100%;position: relative;padding:0 30px;justify-content: space-between;
  }

  .slick-slide{
    height:auto !important;
  }


  .swiper-container {
    width: 100%;
    height: 100%;
    position: relative; 
  }
  .swiper-pagination{
    margin-bottom:-15px;
  }
  .swiper-button-next,.swiper-button-prev{
    width:38px;
    height: 38px;
    color:black;
    border-radius:50%;
    box-shadow:0 0 7px #cecece;
    text-align: center;
    background: white;

  }
  .swiper-button-next::after,.swiper-button-prev::after{
    line-height: 38px;
    font-size:22px;
    font-weight: bolder;
  }
  .swiper-button-prev{
    margin-left:-8px;
  }
  .swiper-button-next{
    margin-right:-8px;
  }
  .swiper-wrapper{
    height:180px;
  }
  .swiper-slide{
    display: flex;
    align-items: center;
    max-width:80%;
  }

  .swiper-slide > img{
    height: 87.5%;
    max-width: 100%;
    transition: 0.25s all linear;
  }
  .swiper-slide > img.desktop{
    display: block;
  }
  .swiper-slide > img.mobile{
    display: none;
  }
  .swiper-slide-active > img{
    height: 100%;
  }
  .swiper-slide-prev .role-desc .right{
    margin-right:60px;
  }
  .swiper-slide-next .role-desc .left{
    padding-left:60px;
  }

  .role-desc .locked{
    background:rgba(0,0,0,0.4); width: 360px;padding:8px 15px;border-radius:15px;display: flex;-webkit-box-align: center;align-items: center;-webkit-box-pack: justify;justify-content: space-between;
  }
  .role-desc .locked button{
    margin-left:15px;
  }
  @media screen and (max-width:576px){
    .swiper-wrapper{
      height: auto;
    }
    .swiper-slide > img {
      width: 100%;
      height: auto !important;
    }
    .role-desc-wrapper > .role-desc{
      flex-direction: column;
      justify-content: center;
      padding:15px;text-align: center;
    }
    .swiper-slide > img.desktop{
      display: none;
    }
    .swiper-slide > img.mobile{
      display: block;
    }
    .role-desc .locked{
      width: 100%;
    }
    .member-menu .member-btn{
      font-size:1em;
    }
  }
</style>
@endpush

@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>

<div class="col-md-12 content-wrapper" style="padding:0 0 60px; 0;">
  @csrf
  <div class="position-fixed fixed-bottom w-100 member-menu">
    <div class="d-flex">
      <button class="w-100 member-btn">
        <i class="fas fa-tags"></i> Promo
      </button>
      <button class="w-100 member-btn">
        <i class="fas fa-store"></i> Merchant
      </button>

      <button class="w-100 member-btn">
        <i class="fas fa-user"></i> Profile
      </button>
    </div>
  </div>
  <div class="col-md-12 slider-img" style="background-image:url('{{asset('/img/ielts.jpg')}}');height:300px;background-size:100%;">

  </div>

  <div class="container" style="max-width: 1366px;">
    <div class="row">
      <div class="col-md-12 py-4">
        <div class="swiper-container"  id="member-roles-slider">
          <div class="swiper-wrapper">
           @foreach($roles as $key => $role)
           <div class="swiper-slide">
            <img class="mx-auto desktop" src="{{asset('img/member-les').'/'.strtolower($role->roles).'.jpg'}}">
            <img class="mx-auto mobile" src="{{asset('img/member-les').'/'.strtolower($role->roles).'-mobile.png'}}">
            <div class="role-desc-wrapper">
              @if(auth()->user()->member_role_id == $role->id)
              <div class="role-desc">
                <div class="left">
                  <h1 class="m-0"><strong>{{$role->roles}}</strong></h1>
                  <h5><strong>Membership saat ini</strong></h5>
                </div>
                <div class="right">
                  <div>Transaksi x lagi</div>
                  <div>Transaksi Rp.0,00 lagi</div>
                </div>
              </div>
              @else
              <div class="role-desc">
                <div class="left">
                  <h1 class="m-0"><strong>{{$role->roles}}</strong></h1>
                  <h5><strong>Masih terkunci</strong></h5>
                </div>
                <div class="right">
                  <div class="locked">
                    <span><i class="fas fa-lock"></i> Masih terkunci</span> <button class="btn btn-primary">Eksplor</button>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
          @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-md-12 merchant-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <hr class="m-0">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <hr class="m-0">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 market-wrapper"  id="output-merchant">

          @if(empty($merchant->all()))

          <div class="row merchant-not-found">
            <h2 class="col-md-12">Merchant Tidak Ditemukan !</h2>
          </div>

          @else
          <div class="row">
            <div class="col-md-12 pt-4 pb-3">
              <h2 style="color: #296ec2"><strong>Promo Bulan Ini</strong></h2>
              <div>Berikut adalah beberapa rekomendasi promo terbaru bulan ini</div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 px-4">
              <div class="row">
                @foreach($monthly_promos as $promo)
                <div class="col-sm-4 mt-4 text-center">
                  <div style="box-shadow: 0 0 15px #dedede;border-radius: 15px;">
                    <div style="overflow: hidden;max-height: 180px;"> 

                      <img src="{{$promo->lokasi_gambar}}" style="width: 100%;min-height:100px;display: block;margin:auto">


                    </div> 
                    <div class="py-2">
                     <h5>{{$promo->nama_promo}}</h5>   
                   </div>
                 </div>           
               </div>
               @endforeach
             </div>
           </div>
         </div>

         @endif
       </div>

       {{$merchant->links()}}
     </div>
   </div>
 </div>
</div>
</div>
@endsection
@push('more-script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script type="text/javascript">
  var swiper = new Swiper('#member-roles-slider', {
    slidesPerView:'auto',
    centeredSlides: true,
    spaceBetween: 0,
    loop:false,
    pagination:false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints:{
      0:{
        spaceBetween:30
      }
    }
  });


  

  function open_promo() {
    var token = $("input[name='_token']").val();
    $('.loading-wrapper').show();
    //  alert(token);
    $.ajax({
      url: "<?php echo route('member-promo-ajax') ?>",
      method: 'POST',
      data: {
        _token: token
      },
      success: function(data) {
        $('#output-merchant').html(data);
      },
      error: function() {
        //handle errors
        alert('error...');
      },complete:function(){
       $('.loading-wrapper').hide();
     }
   });

  }
  function merchant_qrcode(kode_promo){
    alert('test');
  }
  function open_service() {
    var token = $("input[name='_token']").val();
    $('.loading-wrapper').show();
    //  alert(token);
    $.ajax({
      url: "<?php echo route('member-service-ajax') ?>",
      method: 'POST',
      data: {
        _token: token
      },
      success: function(data) {
        $('#output-merchant').html(data);
      },
      error: function() {
        //handle errors
        alert('error...');
      },
      complete:function(){
       $('.loading-wrapper').hide();
     }
   });

  }
  $('#course').change(function() {

    $("#level .select-ajax").remove();


  });


</script>
@endpush