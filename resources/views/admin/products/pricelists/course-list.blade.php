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
</style>
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" style="background: white;">
            <li class="breadcrumb-item"><a href="{{url('admin/products/pricelist')}}">Pricelist</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/products/pricelist/'.urlencode(urlencode($pricelist_kd)).'/courses')}}">{{$pricelist_kd}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ucwords($search)}} {{$kd != "" ? '('.$kd.')' : ''}}</li>
          </ol>
        </nav>
      </div>
      <div class="col-12 text-right">
        <a href="{{url('admin/products/pricelist/'.urlencode(urlencode($pricelist_kd)).'/courses')}}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
      </div>
      <div class="col-md-12">
        <div>
          <h3>Sumber data dari program BP. Apabila ingin menambah atau mengubah harga paket bimbel tolong diubah di program terlebih dahulu !</h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Course Packets </h4>
            <p class="card-category"> {{ __('Here you can manage course packets')}}</p>
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
            <div class="table-responsive">
              <table class="table">
                <colgroup>
                  <col>
                  <col width="150px">
                  <col>
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Kode') }}
                  </th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Data</th>
                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($packets as $key => $data)
                  <tr>
                    <td>
                      {{ $data->KD }}
                    </td>
                    <td>{{$data->NAMA_PAKET}}</td>
                    <td>
                      <div style="max-height:500px; overflow: auto">
                        @if(count($pricelists))
                        @foreach($pricelists->where('REF_PAKET',$data->KD)->groupBy('REF_LEVEL') as $REF_LEVEL => $pricelist)

                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <tr>
                              <th colspan="2">
                                Level : {{$pricelist->first()->NAMA_LEVEL}}
                              </th>
                            </tr>
                            @foreach($pricelist->where('REF_LEVEL',$REF_LEVEL)->groupBy('REF_KATEGORI') as $REF_KATEGORI => $category)

                            <tr>
                              <td>  {{$REF_KATEGORI}}  </td> 
                              <td>
                                @foreach($category->where('REF_PAKET',$data->KD)->where('REF_LEVEL',$REF_LEVEL)->where('REF_KATEGORI',$REF_KATEGORI) as $price)

                                <div>
                                 Jumlah Jam ({{number_format($price->JUMLAH_JAM,0)}} Jam) : {{'Rp.'.number_format($price->HARGA_PAKET,2,',','.')}} 
                               </div>
                               @endforeach
                             </td>
                           </tr>
                           @endforeach
                         </table>
                       </div>
                       @endforeach
                       @endif
                     </div>
                   </td>
                   <td style="vertical-align: top;">
                    <div></div>
                    <div class="form-group">Slug : {{$data->slug}}</div>
                    <div class="form-group">Short Description : {{$data->short_description}}</div>
                    <div class="form-group">Description : {{$data->description}}</div>
                  </td>

                   <td  class="text-center">
                      <div class="togglebutton mb-3">
                      <label id="status-ajax">
                        <input type="checkbox" id="status-{{$no}}" onchange="change_status('#status-label-{{$no}}','{{$data->KD}}',this)" class="status_input" name="status" {{$data->status == 1 ? "checked" : ""}}>
                        <span class="toggle"></span>
                      </label><br>
                      <span class="status-label" id="status-label-{{$no}}" for="status">{{$data->status == "1" ? "Active" : "Inactive"}}</span>
                    </div>
                    <div>
                    <a rel="tooltip" class="btn btn-success" href="{{route('admin.products.pricelist.course-edit',['pricelist_kd' => urlencode(urlencode($pricelist_kd)),'id' => $data->KD,'search' => $search,'search_kd' => $kd])}}" data-original-title="" title="">
                      Edit 
                      <i class="material-icons"></i>
                      <div class="ripple-container"></div>
                    </a>
                    </div>
                  </td>

                </tr>
                @php
                $no++;
                @endphp
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="row">
            {{ $packets->links() }}
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
  function change_status(label,KD,evt){
    var status = evt.checked;
    var token = $("input[name='_token']").val();
    if(evt.checked == true){

      if(confirm("Are you sure want to change this status ?")){
       $('.loading-wrapper').show();
       $(label).html("Active");
       $.ajax({
        url: "{{route('admin.products.pricelist.course-status')}}",
        method: 'POST',
        data: {
          _token: token,
          REF_PRICELIST : '{{$pricelist_kd}}',
          KD:KD,
          status: status
        },
        success: function(data) {
          console.log(data);
          $('#output').html(data);
        },
        error: function() {
          //handle errors
          alert('error...');
        },complete: function(){
          $('.loading-wrapper').hide();
        }
      });
     }else{
      evt.checked = false;
    }
  }else{
   if(confirm("Are you sure want to change this status ?")){
     $('.loading-wrapper').show();
     $(label).html("Inactive");
     $.ajax({
      url: "{{route('admin.products.pricelist.course-status')}}",
      method: 'POST',
      data: {
        _token: token,
        REF_PRICELIST : '{{$pricelist_kd}}',
        KD:KD,
        status: status
      },
      success: function(data) {
        console.log(data);
        $('#output').html(data);
      },
      error: function() {
                  //handle errors
                  alert('error...');
                },complete: function(){
                  $('.loading-wrapper').hide();
                }
              });
   }else{
    evt.checked = true;
  }


}


}
</script>
@endpush
