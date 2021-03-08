<div class="row">

@foreach($merchant as $data_merchant)

<div class="col-md-4 market">
  <a href="{{url('member-les/merchant/'.$data_merchant->id)}}">
      <div class="col-md-12 market-content">
          <div class="market-img">

              <img src="{{asset('img/ielts.jpg')}}" style="width:100%;" alt="">

                  </div>
                  <div class="market-name">
{{ucwords($data_merchant->name)}}
            </div>
      <div class="market-desc">
        <div>
        Alamat : {{$data_merchant->alamat}}
        </div>
        <div>
        Email : {{$data_merchant->email}}
        </div>
        <div>
        No Telepon : {{$data_merchant->no_telepon}}
        </div>
      </div>
    </div>
        </a>
  </div>

  @endforeach

</div>
