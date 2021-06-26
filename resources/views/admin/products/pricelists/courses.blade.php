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
      <div class="col-12 text-right">
        <a href="{{url('admin/products/pricelists')}}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
      </div>
      <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" style="background: white;">
            <li class="breadcrumb-item"><a href="{{url('admin/products/pricelists')}}">Pricelist</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$pricelist_kd}}</li>
          </ol>
        </nav>
      </div>

    </div>
    <div class="row">


     <div class="col-md-12">
      <div>
        <h3>Sumber data dari program BP. Apabila ada yang ingin diubah / ditambah harap mengubah di program terlebih dahulu !</h3>
      </div>
      <a href="#" onclick="Swal.fire('Fitur ini belum tersedia !')" class="btn btn-sm btn-primary float-right">{{ __('Add Web Only Course') }}</a>
    </div>
    <div class="col-12">

      <a href="{{url()->current().'?'.http_build_query(['search' => 'all'])}}" class="btn btn-md btn-rose col-sm-12">{{ __('Show All Courses') }}</a> 

    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Packet Groups </h4>
          <p class="card-category"> {{ __('Search courses by its groups')}}</p>
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
                <col width="40%">
                <col>
                <col>
                <col>
              </colgroup>
              <thead class=" text-primary">
                <th>
                  {{ __('Kode Kelompok Paket / Packet Group Code') }}
                </th>
                <th>Name</th>
                <th class="text-center">
                  {{ __('Actions') }}
                </th>
              </thead>
              <tbody>
                @foreach($groups as $key => $data)
                <tr>
                  <td>
                    {{ $data->KD }} 
                  </td>
                  <td>{{$data->NAMA}}</td>
                  <td class="text-right">
                    <a rel="tooltip" class="btn btn-info" href="{{url()->current().'?'.http_build_query(['search' => 'groups','kd' => $data->KD])}}" data-original-title="" title="">
                      Courses
                      <i class="material-icons"></i>
                      <div class="ripple-container"></div>
                    </a>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="row">
            {{ $groups->links() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title "> Languages </h4>
          <p class="card-category"> {{ __('Search courses by languages')}}</p>
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
              <colgroup>
                <col>
                <col width="40%">
                <col>
                <col>
                <col>
              </colgroup>
              <thead class=" text-primary">
                <th>
                  {{ __('Kode Bahasa / Language Code') }}
                </th>
                <th>Name</th>
                <th class="text-center">
                  {{ __('Actions') }}
                </th>
              </thead>
              <tbody>
                @foreach($languages as $key => $data)
                <tr>
                  <td>
                    {{ $data->KD }} 
                  </td>
                  <td>{{$data->NAMA}}</td>
                  <td class="text-right">
                    <a rel="tooltip" class="btn btn-info" href="#" data-original-title="" title="">
                      Courses
                      <i class="material-icons"></i>
                      <div class="ripple-container"></div>
                    </a>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="row">
            {{ $languages->links() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Business Fields </h4>
          <p class="card-category"> {{ __('Search courses by business fields')}}</p>
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
              <colgroup>
                <col>
                <col width="40%">
                <col>
                <col>
                <col>
              </colgroup>
              <thead class=" text-primary">
                <th>
                  {{ __('Kode Bidang Usaha / Business Fields Code') }}
                </th>
                <th>Name</th>
                <th class="text-center">
                  {{ __('Actions') }}
                </th>
              </thead>
              <tbody>
                @foreach($business as $key => $data)
                <tr>
                  <td>
                    {{ $data->KD }} 

                  </td>
                  <td>{{$data->NAMA}}</td>

                  <td class="text-right">

                    <a rel="tooltip" class="btn btn-info" href="#" data-original-title="" title="">
                      Courses
                      <i class="material-icons"></i>
                      <div class="ripple-container"></div>
                    </a>

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="row">
            {{ $business->links() }}
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
        if(data.trim() == "1"){
          evt.checked= true;
          $(label).html("Active");
        }else{
          evt.checked=false;
          $(label).html("Non Active");   
        }
        $('#output').html(data);
      },
      error: function() {
        alert('error...');
      },complete: function(){
        $('.loading-wrapper').hide();
      }
    });
  }
</script>
@endpush
