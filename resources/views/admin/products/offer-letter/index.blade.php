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
        <a href="#" onclick="Swal.fire('Fitur ini belum tersedia !')" class="btn btn-sm btn-primary">{{ __('Add Web Only Pricelist') }}</a>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Offer Letter</h4>
            <p class="card-category"> {{ __('Here you can manage offer letter')}}</p>
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
                  <col>
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Kode Bidang Usaha') }}
                  </th>
                  <th>Bidang Usaha</th>
                  <th>Paket Bimbel</th>
                  <th>
                    {{__('Status')}}
                  </th>


                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($bidang_usaha as $key => $data)
                  <tr>
                    <td>
                      {{ $data->KD }} 
                    </td>
                    <td>{{$data->NAMA}}</td>
                    <td></td>
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

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="row">
            {{$bidang_usaha->links()}}
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
  function change_status(label,id,evt){
    var status = evt.checked;
    var token = $("input[name='_token']").val();
    if(evt.checked == true){

      if(confirm("Are you sure want to change this status ?")){
       $('.loading-wrapper').show();
       $(label).html("Active");
       $.ajax({
        url: "{{route('admin.offer-letter.change-status')}}",
        method: 'POST',
        data: {
          _token: token,
          id:id,
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
      url: "{{route('admin.offer-letter.change-status')}}",
      method: 'POST',
      data: {
        _token: token,
        id:id,
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
