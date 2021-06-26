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

  .promo-content-wrapper .promo-img-wrapper img{
    max-width: 200px;display: block;margin:auto;

  }
  .promo-history-date{
      float:right;
  }
  @media screen and (max-width:576px){
    .promo-content-wrapper{
      flex-wrap: wrap;
    }
    .promo-content-wrapper .promo-img-wrapper{
      flex: 0 0 100%;
    }
    .promo-content-wrapper .promo-img-wrapper img{
      width: 70%;
      max-width: 100% !important;
      display:block;
      margin:0 auto;
    }
     .promo-history-date{
      float:none;
      display:block;
      font-size:15px;
      color:#888888;
  }
    .promo-btn{
      margin-top:15px;
    }
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

    .point-usage-table{
      font-size:14px;
    }
    #myModal .modal-body{
      padding: 0 8px;
    }
  }
  #qrcode-scanner{
    width: 100% !important;
  }
  .qrcode-stream-background{
    background:#424242;
  }
  #qrcode-scanner .qrcode-stream-wrapper{
    max-width: 500px;
    display: block;margin:0 auto;
  }
  #myModal.show{
    padding-right:0 !important;
  }
  .promo-btn{
    background-color:#e84a3f;color:white;font-size:20px;font-weight: bold;font-family:Calibri;padding:12px 24px;letter-spacing: 1px;
  }
  .promo-btn.disabled{
    background-color:#969696;
  }
  .promo-btn.disabled:hover{
    cursor:not-allowed;
    color:white;
  }
  .promo-title{
    color:black;font-family: roboto,sans-serif;
  }
  .point-usage-table{
    table-layout: auto;
    margin:0;
  }
  .point-usage-table tr th,.point-usage-table tr td{
    border:none;
    padding:0px 0;
  }

</style>
@endpush

@section('content')
<div class="loading-wrapper" id="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>

<div class="col-md-12 content-wrapper" id="app" style="padding:0 15px 80px 15px;">
  <div class="row">
    @csrf
    <input type="hidden" id="selected_promo" name="">
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="col-md-12">
              <h4 class="my-3 promo-title">
              </h4>
            </div>

            <div class="col-md-12">
              <h5>
                <div class="card mb-4">
                  <div class="card-body">
                <table class="table point-usage-table">
                  <colgroup>
                    <col>
                    <col width="15%" style="text-align:right">
                    <col width="32.5%">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td><div class="col-form-label">Poin Saat Ini</div></td><td><div class="col-form-label text-right pr-3">Rp.</div></td><td class="text-right"><div class="col-form-label pr-2" id="poin-saat-ini">{{number_format(auth()->user()->member_balance(),0,",",".")}}</div></td>
                    </tr>
                    <tr>
                      <td><div class="col-form-label">Harga Produk</div></td><td><div class="col-form-label text-right pr-3">Rp.</div></td><td class="text-right"><div class="col-form-label pr-2" id="harga-produk"></div></td>
                    </tr>
                     <tr>
                      <td colspan="3">
                        <hr>
                      </td>
                    </tr>
                    <tr>
                      <td><div class="col-form-label">Biaya Promo</div></td><td><div class="col-form-label text-right pr-3">Rp.</div></td><td class="text-right"><div class="col-form-label pr-2" id="biaya-promo"></div></td>
                    </tr>
                    <tr>
                      <td><div class="col-form-label">Jumlah Poin Yang Ingin Digunakan</div></td><td><div class="col-form-label text-right pr-3">Rp.</div></td><td><input type="text" class="form-control pr-2 text-right" name="poin_yang_ingin_digunakan" id="poin-yang-ingin-digunakan" value="" style="font-size:inherit"></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <hr>
                      </td>
                    </tr>
                    <tr>
                      <td><div class="col-form-label">Poin Yang Kurang</div></td><td><div class="col-form-label text-right pr-3">Rp.</div></td><td class="text-right"><div class="col-form-label pr-2"  id="sisa"></div></td>
                    </tr>
                    <tr>
                      <td><div class="col-form-label">Total Yang Harus Dibayar</div></td><td><div class="col-form-label text-right pr-3">Rp.</div></td><td class="text-right"><div class="col-form-label pr-2"  id="total-dibayar"></div></td>
                    </tr>
                  </tbody>
                </table>
                </div>
                </div>
              </h5>
            </div>
            <div>
              <div class="col-md-12" id="qrcode-scanner-wrapper">
                <qrcode-scanner id="qrcode-scanner" prefix="{{url('')}}" style="width:500px;display: block;margin:0 auto;"></qrcode-scanner>
                <!-- <span style="color:#24ab5c;"><strong> Syarat Dan Ketentuan Berlaku <i class="fas fa-caret-down"></i></strong></span> -->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="position-fixed fixed-bottom w-100 member-menu">
      <div class="d-flex">
        <button class="w-100 member-btn" onclick="open_tab('promo')">
          <i class="fas fa-tags"></i> Promo
        </button>
        <button class="w-100 member-btn" onclick="open_tab('merchant')">
          <i class="fas fa-store"></i> Merchant
        </button>

        <button class="w-100 member-btn" onclick="open_tab('profile')">
        <i class="fas fa-history"></i> Riwayat 
        </button>
      </div>
    </div>
    <div class="col-md-12 slider-img" style="background-image:url('{{asset('/img/ielts.jpg')}}');height:300px;background-size:100%;">
      <h1 class="text-center" style="color:white;margin-top:100px"><strong>BP Merchant</strong></h1>
    </div>

    <div class="container" style="max-width: 1366px;">
      <div>
        <div class="col-md-12 text-right pt-4">
          <h3 class="d-block"><strong>Jumlah Poin Saat Ini : Rp.{{number_format(auth()->user()->member_balance(),0,",",".")}}</strong></h3>
        </div>
      </div>
      <div>
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
    <div>

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
          <div class="col-md-12"  id="output-merchant">



            <div class="row merchant-content" id="merchant" style="display: none;">
              @if(empty($merchants->all()))
              <h2 class="col-md-12">Merchant Tidak Ditemukan !</h2>
              @else
              @php
              $alphas = range('A', 'Z');
              @endphp
              @foreach($alphas as $alpha)

              @endforeach
              <div class="col-md-12 pt-4 mb-3">
                <h2 style="color: #296ec2"><strong>Merchant</strong></h2>
                <div>Berikut adalah partner kami</div>
              </div>
              <div class="col-md-12 mb-5">
                <div class="row">
                  @foreach($merchants as $merchant)
                  <div class="col-sm-4 mt-4 text-center">
                    <a href="{{url('member-les/merchant/'.$merchant->slug)}}" target="_blank" style="box-shadow: 0 0 15px #dedede;border-radius: 15px;display: block;color:black;">
                      <div style="overflow: hidden;max-height: 180px;"> 
                        <img src="{{asset($merchant->lokasi_logo ?: 'img/member-les/merchant-not-found.jpg')}}" style="width: 100%;min-height:100px;display: block;margin:auto">
                      </div> 
                      <div class="py-2">
                       <h5 class="my-2">{{$merchant->name}}</h5>   
                     </div>
                   </a>           
                 </div>
                 @endforeach
               </div>
             </div>
          <!--  <div class="col-md-12 text-center">
             <button class="btn" style="background-color:#e84a3f;color:white;font-size:20px;font-weight: bold;font-family:Calibri;padding:12px 24px;letter-spacing: 1px;">Lihat Semua Merchant</button>
           </div> -->
           @endif
         </div>

         <div class="row merchant-content" id="promo">
          <div class="col-md-12 pt-4 mb-3">
            <h2 style="color: #296ec2"><strong>Promo Bulan Ini</strong></h2>
            <div>Berikut adalah beberapa rekomendasi promo terbaru bulan ini</div>
          </div>

          <div class="col-lg-12">
            <div class="row">
              @foreach($monthly_promos as $promo)
              <div class="col-sm-12 mt-4 text-center" id="promo-{{$promo->kode_promo}}">
                <div style="border-radius: 7px;border:2px solid #dedede">
                  <div class="d-flex promo-content-wrapper">
                    <div class="p-3 promo-img-wrapper"> 
                      <img src="{{asset($promo->lokasi_gambar)}}">
                    </div> 
                    <div class="p-3 text-left" style="flex-grow: 8">
                      <div class="py-1">
                        <h4 class="m-0 promo-title">
                          <strong>
                            @if($promo->potongan_harga != "")
                            {{$promo->potongan_harga / 1000}}K Discount
                            @else 
                            {{$promo->potongan_persen}} % OFF
                            @endif
                          </strong> | {{$promo->nama_promo}}
                        </h4>

                      </div>
                      <div class="col-lg-12 mt-2">
                        <div class="row">
                          <div class="col-lg-8 p-0">
                            <div>
                              <p style="line-height: 1.75em;max-height: 3.5em;overflow: hidden; display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;">
                                {{$promo->keterangan}}  
                              </p><!-- 
                              <div>
                                <span style="color:#24ab5c;"><strong>Syarat dan Ketentuan Berlaku</strong></span>
                              </div> -->
                            </div>
                          </div>


                          <div class="col-lg-4 p-0">
                            @if($promo->used)
                            <button class="btn float-right promo-btn disabled">Telah Digunakan</button>
                            @else
                            @if(auth()->user()->member_balance() > 0)
                            <button class="btn float-right promo-btn" onclick="pakai_promo('{{$promo->kode_promo}}','{{$promo->harga_produk}}','{{$promo->potongan_harga}}','{{$promo->potongan_persen}}')">PAKAI PROMO</button>
                            @else
                              <button class="btn float-right promo-btn disabled">Tidak Ada Poin</button>
                            @endif
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>           
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row merchant-content" style="display: none;" id="profile">

          <div class="col-md-12 pt-4 mb-3">
            <h2 style="color: #296ec2"><strong>Riwayat Transaksi</strong></h2>
          </div>
          @if(!count($promo_histories))
          <div class="col-md-12">
            <h4 class="text-danger">Anda Belum Melakukan Transaksi Apapun <i class="far fa-times-circle"></i></h4>
            @else
            @foreach($promo_histories as $key => $promo_history)
            <div class="col-md-12 px-3 py-4" style="border-bottom:1px solid #dedede">
              <h4>{{$key + 1}}. {{$promo_history->nama_promo}} <span class="promo-history-date">{{date("d/m/Y", strtotime($promo_history->created_at))}}</span></h4>
            </div>
            @endforeach
            @endif
          <!-- <div class="col-md-12">
            <div class="row">
              <label class="col-form-label col-md-3">
                Nama
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="">
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('more-script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script type="text/javascript">
  var selected_promo;
  var amount;
  var sisa;
  var poin_saat_ini = parseInt("{{auth()->user()->member_balance()}}");
  var biaya = 0;
  var _harga_produk = 0;
  var _total_dibayar = 0;
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

  function open_tab(id){
    $('.merchant-content-wrapper .merchant-content').hide();
    $('#'+id).show();
  }

  function pakai_promo(kode_promo,harga_produk,potongan_harga,potongan_persen){
    selected_promo = kode_promo;
    $('#selected_promo').val(kode_promo);
    $('#myModal').modal('show');
    var promo_title = $('#promo-'+kode_promo+" .promo-title").html();
    if(potongan_harga != ""){
      biaya = potongan_harga;
    }else if(potongan_persen != ""){
      biaya = Math.round((potongan_persen /100) * harga_produk);
    }
    _harga_produk = harga_produk;

    $('#harga-produk').html(formatRupiah(harga_produk));
    amount = parseInt(biaya);
    var jumlah_yang_digunakan;
    if(poin_saat_ini >= biaya){
      jumlah_yang_digunakan = biaya;
    }else{
      jumlah_yang_digunakan = poin_saat_ini;
    }
    var sisa = jumlah_yang_digunakan - biaya;
    if(sisa < 0){
      sisa = sisa * -1;
       _total_dibayar = harga_produk - biaya + sisa;
      sisa = formatRupiah(sisa);
    }else{
       _total_dibayar = harga_produk - biaya + sisa;
      sisa = formatRupiah(sisa);
    }

   
    $('#total-dibayar').html(formatRupiah(_total_dibayar));
    $('#sisa').html(sisa);
    $('#biaya-promo').html(formatRupiah(biaya));
    $('#poin-yang-ingin-digunakan').val(formatRupiah(jumlah_yang_digunakan));
    $('#myModal .promo-title').html(promo_title);

  }
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



  function formatRupiah(angka, prefix) {

    //var number_string = angka.replace(/[^,\d]/g, '').toString();

    var number_string = angka.toString();
    var split = number_string.split('.');
    var sisa = split[0].length % 3;
    var rupiah = split[0].substr(0, sisa);
    var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }

  
  $("#poin-yang-ingin-digunakan").on("keyup", function(event ) {                   
    // When user select text in the document, also abort.
    var selection = window.getSelection().toString(); 
    if (selection !== '') {
      return; 
    }       
    // When the arrow keys are pressed, abort.
    if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
      return; 
    }       
    var $this = $(this);            
    // Get the value.
    var input = $this.val();            
    input = input.replace(/[\D\s\._\-]+/g, ""); 
    input = input?parseInt(input, 10):0;
    

    var sisa =  biaya - input;
    if(input > poin_saat_ini){
      sisa = biaya-poin_saat_ini;
    }

    if(sisa < 0){
      if(input > biaya){
        input = biaya;
        sisa = 0
        alert('Poin yang digunakan tidak dapat melebihi biaya promo !');
      }
    }
    $('#total-dibayar').html(formatRupiah(_total_dibayar + sisa));
    sisa = formatRupiah(sisa);
    
    $('#sisa').html(sisa);

    $this.val(function () {
      return (input === 0) ? "0" : formatRupiah(input); 
    }); 

  }); 


</script>
@endpush