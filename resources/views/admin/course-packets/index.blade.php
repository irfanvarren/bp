@extends('layouts.app-auth', ['activePage' => 'products','activeMenu' => 'data-management', 'titlePage' => __('Course Packets')])
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
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{'course-packets.create' }}" class="btn btn-sm btn-primary">{{ __('Add course packet')}}</a>
              </div>
            </div>
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
                    {{ __('Kode Paket Bimbel') }}
                  </th>
                  <th>
                    {{__('Nama Paket')}}
                  </th>
                  <th>{{__('Slug')}}</th>
                  <th>
                    {{__('Status')}}
                  </th>
                  <th>
                    {{__('Created At')}}
                  </th>


                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @php
                  $pricelists = array();
                  @endphp
                  @foreach($course_packets as $key => $data)
                  <tr>
                    <td>
                      {{ $data->KD }}
                    </td>
                    <td>{{$data->NAMA}}</td>
                    <td>{{$data->slug}}</td>
                    <td>
                     <div class="togglebutton">
                      <label id="status-ajax">
                        <input type="checkbox" id="status" class="status_input" name="status" onchange="change_status('#status-label-{{$key}}','{{$data->KD}}',this)" @if($data->status == 1) checked  @else @endif>
                        <span class="toggle"></span>
                      </label>

                      <span id="status-label-{{$key}}" class="status-label" for="status">
                        @if($data->status) Active @else Non Active @endif 
                      </span>
                    </div>
                  </td>
                  <td>{{$data->TGL_BUAT}}</td>
                  <td class="text-right">
                   <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('admin.products.pricelist.details', urlencode(urlencode($data->KD))) }}" data-original-title="" title="">
                                details
                                    <i class="material-icons"></i>
                                    <div class="ripple-container"></div>
                                  </a>
                  </td>
                            <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $data) }}" method="post">
                                 @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $data) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this news?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                         <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            </td>-->
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                    <div class="row">
                      {{$course_packets->links()}}
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
