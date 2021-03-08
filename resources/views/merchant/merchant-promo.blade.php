<div class="row">

  @if(count($merchant_promo))
  @foreach($merchant_promo as $data)
  
  <div class="col-md-6 merchant_product" onclick="merchant_qrcode('{{Crypt::encryptString($data->kode_promo.'###'.Auth::user()->id.'###'.\Carbon\Carbon::now())}}')">
    <div class="row">
      <div class="col-md-3 merchant_product_image">
        <img src="{{$data->lokasi_gambar}}" alt="">
      </div>
      <div class="col-md-9 merchant_product_desc">
        <h4><strong>{{ucwords($data->nama_promo)}}</strong></h4>
        <div>Potongan : 
          @if($data->potongan_harga != "")
          {{$data->potongan_harga}} Rupiah
          @elseif($data->potongan_persen  !="")
          {{$data->potongan_persen}} %
          @else
          -
          @endif
        </div>
      </div>

    </div>
  </div>
  @endforeach
  @else
  <div class="col-md-12 p-3 mt-3 text-center">
    <h2><strong>There are no promos from this merchant</strong></h2>
    <h5>Tidak ada promo dari merchant ini</h5>
  </div>
  @endif


</div>
