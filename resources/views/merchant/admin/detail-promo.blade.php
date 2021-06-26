@extends('layouts.app-auth', ['activePage' => 'detail-promo', 'titlePage' => __('promo')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a href="{{url('merchant')}}">Go Back To Dashboard</a>
      </div>
      <div class="col-md-12">
        <div class="card">
           <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Data User Yang Menggunakan Promo') }}</h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
          
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    {{ __('Nama Promo') }}
                  </th>
                  <th>
                    {{ __('Nama User') }}
                  </th>
                  <th>{{__('Harga Produk')}}</th>
                  <th>
                    {{ __('Total Promo') }}
                  </th>
                  <th>{{__('Jumlah Poin Yang Digunakan')}}</th>
                  <th>{{__('Sisa yang harus dibayarkan')}}</th>
                  <th>{{__('Tanggal / Waktu')}}</th>
                </thead>
                <tbody>
                  @if (empty($promoHistory))
                 
                  @else
                  @foreach($promoHistory as $history)
                  <tr>
                    <td>{{$history->nama_promo}}</td>
                    <td>{{$history->user_name}} ({{$history->email}})</td>
                    <td>{{number_format($history->harga_produk,0,",",".")}} Rupiah</td>
                    <td> 
                      @php
                      if($history->potongan_persen != "")
                      {
                        $potongan = ($history->potongan_persen / 100)* $history->harga_produk;
                      }else{
                      $potongan = $history->potongan_harga;
                    }
                      @endphp
                      {{number_format($potongan,0,",",".")." Rupiah"}}</td>
                    <td>{{number_format($history->amount,0,",",".")}} Rupiah</td>
                    <td>
                      @if($history->remaining_fee <= 0)
                      0 Rupiah <span class="badge badge-success">Lunas</span>
                      @else
                      {{number_format($history->remaining_fee,0,",",".")}} <span class="badge badge-danger">Belum Lunas</span>
                      @endif
                    </td>
                    <td>{{date("d/m/Y H:i:s",strtotime($history->created_at))}}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
