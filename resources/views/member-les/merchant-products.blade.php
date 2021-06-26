<div class="row">

    @foreach($merchant_product as $data)
    <div class="col-md-6 merchant_product">
      <div class="row">


            <div class="col-md-3 merchant_product_image">
              <img src="{{$data->lokasi_gambar}}" alt="">
            </div>
            <div class="col-md-9 merchant_product_desc">
                <h4><strong>{{ucwords($data->nama_produk)}}</strong></h4>
                <div>{{ucfirst($data->deskripsi)}}</div>
                <div>Harga : {{$data->harga}}</div>
            </div>

                  </div>
    </div>
    @endforeach


</div>
