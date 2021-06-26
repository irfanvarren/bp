@extends('layouts.app-auth', ['activePage' => 'pricelists','activeMenu' => 'product-management', 'titlePage' => __('Price Lists')])
<style media="screen">
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
  .form-group input[type=file]{
    position:relative !important;
    opacity:1 !important;
  }
  .td-border-top{
  	padding:8px;border-top:1px solid #bebebe;
  }
  .td-border-top:first-child{
    border-top:none;
  }
  table tr td,table tr th{
  	border:1px solid #bebebe !important;
  }
</style>
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Price List </h4>
            <p class="card-category"> {{ __('Here you can manage price list')}}</p>
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
            @csrf
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{url('admin/products/pricelists')}}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered">
                <colgroup>
                  <col width="27.5%">
                  <col style="text-align:center;">
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Nama Produk') }}
                  </th>
                  <th>
                    {{__('Durasi')}}
                  </th>
                  <th>Category</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>

                	@foreach($details as $detail)
                 <tr>
                  <td>
                    <div>{{$detail->REF_PAKET.$detail->REF_LEVEL." ".$detail->PAKET." - ".$detail->LEVEL}}</div>
                  </td>
                  <td style="text-align:center;">
                    {{round($detail->JUMLAH_JAM,2)}} Jam  
                    <div> {{$detail->JUMLAH_PERTEMUAN != "" || $detail->JUMLAH_PERTEMUAN != 0 ? $detail->JUMLAH_PERTEMUAN.'x' : ''}}
                    </div>
                  </td>
                  <td style="padding:0">
                   @foreach($detail->detail_harga as $detail_harga)
                   <div class="td-border-top" >
                    {{$detail_harga->REF_KATEGORI}}
                  </div>
                  @endforeach	

                </td>
                <td style="padding:0">@foreach($detail->detail_harga as $detail_harga)
                 <div class="td-border-top" >
                  Rp.{{number_format($detail_harga->HARGA_PAKET,2,',','.')}}
                </div>
                @endforeach	
              </td>
              <td></td>
              <td>
               
                <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title="">
                  <i class="material-icons my-0">edit</i>
                  <div class="ripple-container"> </div>
                  <span>Edit</span>
                </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>
    <div class="row">
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
  var token = $("input[name='_token']").val();
  function change_status(label,kd,evt){
    $('.loading-wrapper').show();

    $.ajax({
      url: "{{route('admin.change_status_pricelists')}}",
      method: 'POST',
      data: {
        _token: token,
        kd:kd,
        status: evt.checked
      },
      success: function(data) {
        console.log(data);
        if(data.status){
          evt.checked= true;
          $(label).html("Active");
        }else{
          evt.checked=false;
          $(label).html("Non Active");   
        }
        $('#output').html(data);
      },
      error: function() {
          //handle errors
          alert('error...');
        },complete: function(){
          $('.loading-wrapper').hide();
        }
      });
  }
</script>
@endpush
