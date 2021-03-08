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
     <div class="col-md-12">
      <h3>Sumber data dari program BP. Apabila ada yang ingin diubah / ditambah harap mengubah di program terlebih dahulu !</h3>
    </div>
    <div class="col-12 text-right">
      <a href="#" onclick="Swal.fire('Fitur ini belum tersedia !')" class="btn btn-sm btn-primary">{{ __('Add Web Only Pricelist') }}</a>
    </div>
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
              <a href="" class="btn btn-sm btn-primary">{{ __('Add Pricelist') }}</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <colgroup>
                <col>
                <col>
                <col width="30%">
                <col>
                <col>
              </colgroup>
              <thead class=" text-primary">
                <th>
                  {{ __('Kode Price List') }}
                </th>
                <th>Pricelist Type</th>
                <th>Name</th>
                <th>Order</th>

                <th>
                  {{__('Status')}}
                </th>


                <th class="text-center">
                  {{ __('Actions') }}
                </th>
              </thead>
              <tbody>
                @foreach($pricelists as $key => $data)
                <tr>
                  <td>
                    {{ $data->KD }} 
                  </td>
                  <td>
                    @if($data->type == "online")
                    <div class="badge badge-primary">
                    {{$data->type}}  
                    </div>
                    @elseif($data->type == "offline")
                    <div class="badge badge-secondary">
                      {{$data->type}}
                    </div>
                    @endif
                  </td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->priority}}</td>
                  <td>
                   <div class="togglebutton">
                    <label id="status-ajax">
                      <input type="checkbox" autocomplete="off" id="status" class="status_input" name="status" onchange="change_status('#status-label-{{$key}}','{{$data->KD}}',this)" @if($data->status == 1) checked  @else @endif>
                      <span class="toggle"></span>
                    </label>

                    <span id="status-label-{{$key}}" class="status-label" for="status">
                      @if($data->status) Active @else Non Active @endif 
                    </span>
                  </div>
                </td>
                <td class="text-right">
                  <a rel="tooltip" class="btn btn-success" href="{{ route('admin.products.pricelist.edit', urlencode(urlencode($data->KD))) }}" data-original-title="" title="">
                    Edit
                    <i class="material-icons"></i>
                    <div class="ripple-container"></div>
                  </a>
                  <a rel="tooltip" class="btn btn-warning" href="{{ route('admin.products.pricelist.details', urlencode(urlencode($data->KD))) }}" data-original-title="" title="">
                    Price Details
                    <i class="material-icons"></i>
                    <div class="ripple-container"></div>
                  </a>
                  <a rel="tooltip" class="btn btn-danger" href="{{ route('admin.products.pricelist.courses', urlencode(urlencode($data->KD))) }}" data-original-title="" title="">
                    Manage Courses
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
          {{ $pricelists->links() }}
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
