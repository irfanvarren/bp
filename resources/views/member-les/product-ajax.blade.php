<div class="row">

@foreach($promo as $data_promo)

<div class="col-md-4 market">
  <a href="" onclick="merchant_qrcode('{{Crypt::encryptString($data_promo->kode_promo.'###'.Auth::user()->id.'###'.\Carbon\Carbon::now())}}')">
      <div class="col-md-12 market-content">
          <div class="market-img">

              <img src="{{asset('img/ielts.jpg')}}" style="width:100%;" alt="">
              <div class="market-name">
  
{{ucwords($data_promo->nama_promo)}}
              </div>
                  </div>
                  <div class="market-name">
                    {{$data_promo->nama_promo}}
                  </div>
      <div class="market-desc">

        <div class="text-center" style="height:60px">
            <h4 style="display:inline-block;vertical-align:middle;white-space: nowrap;line-height: 55px;height:60px;">
          @if($data_promo->potongan_harga != "")
            Discount : {{$data_promo->potongan_harga}} Rupiah
          @elseif($data_promo->potongan_persen != "")
            Discount : {{$data_promo->potongan_harga}} %
          @endif
        </h4>
        </div>


        <div style="border-top:1px solid black;font-size:12px;padding:5px 0">
          Tanggal Berlaku : {{$data_promo->tgl_berlaku}}
        </div>
      </div>
    </div>
        </a>
  </div>

  @endforeach

</div>
