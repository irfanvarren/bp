@extends('layouts.app-auth', ['activePage' => 'online-test-registration','activeMenu' => 'data-management', 'titlePage' => __('Online Test Registration')])
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
  .table{
    font-size:14px;
  }
  .table th,.table td{
    padding:6px 8px;
  }
</style>
<!-- nama tgl lahir tempat lahir pekerjaan sektor pekerjaan modul toefl tgl toefl  -->
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
            <h4 class="card-title ">{{ __('Online Registration') }}</h4>
            <p class="card-category"> {{ __('Here you can manage toefl Registration') }}</p>
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
              <!--<div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('admin-news.create') }}" class="btn btn-sm btn-primary">{{ __('Add News') }}</a>
                  </div>
                </div>-->
                <div class="table-responsive">
                  <table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
                    <colgroup>
                      <col>
                      <col>
                      <col>
                      <col>
                      <col>
                      <col>
                      <col>
                      <col>
                      <col>
                      <col>
                    </colgroup>
                    <thead class=" text-primary">
                      <th>
                        {{__('No')}}
                      </th>
                      <th>
                        {{__('Test')}}
                      </th>
                      <th>
                        {{__('Nama')}}
                      </th>
                      <th>
                        {{ __('No Telepon') }}
                      </th>
                      <th>{{ __('Email') }}</th>
                      <th>Skills</th>

                      <th>{{__('Bukti Pembayaran')}}</th>

                      <th>{{__('Approved')}}</th>
                      <th>{{__('Registered At')}}</th>
                      <th>{{__('Actions')}}</th>
                    </thead>

                    <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($ot_registration as $data)
                      <tr>
                        <td> {{$no++}} </td>
                        <td> {{$data->test_name}} {{$data->module_name != "" ? "(".$data->module_name.")" : ""}} </td>
                        <td>  
                          {{ $data->NAMA }}
                        </td>
                        <td>{{$data->KONTAK}}</td>
                        <td>{{$data->EMAIL}}</td>
                        <td>
                          @if($data->skills != "")
                          @php
                            $array = explode(',',$data->skills);
                            foreach ($array as $key => $id){
                            $type = collect($section_types)->where('id',$id)->first();
                            @endphp
                            @if($key > 0)
                            , 
                            @endif
                            {{$type->name}}
                            @php
                          }
                          @endphp
                          
                          @endif
                        </td>
                        <td><img style="max-width:180px;" src="{{asset(Storage::disk('local')->url($data->bukti_pembayaran))}}"></td>
                        <td>
                          <div class="togglebutton" >
                            <label id="status-ajax">
                              <input type="checkbox" id="status-{{$no}}" onchange="approve('#status-label-{{$no}}','{{$data->id}}',this)" class="status_input" name="status" {{$data->status == "approved" ? "checked" : ""}}>
                              <span class="toggle"></span>
                            </label><br>
                            <span class="status-label" id="status-label-{{$no}}" for="status">{{$data->status == "approved" ? "Approved" : "Not Approved"}}</span>
                          </div>

                        </td>
                        <td>
                          {{date("d F Y",strtotime($data->created_at))}}
                        </td>
                          <td>
                            <form action="{{ route('admin.ot_registration.destroy', $data) }}" method="post">
                              @csrf
                              @method('delete')
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin.ot_registration.details', $data->id) }}" data-original-title="" title="">
                                <i class="material-icons">visibility</i> 
                                <div class="ripple-container"></div>
                                <div>Details</div>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
                                <i class="material-icons">close</i>
                                <div class="ripple-container"></div>
                                <div class="">
                                  Del
                                </div>
                              </button>
                            </form>
                          </td>
                            <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $data) }}" method="post">
                                  @csrf
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection
        @push('js')
        <script type="text/javascript">
          $(document).ready( function () {
            $('#myTable').DataTable();
          } );
          function approve(label,id,evt){
           
            var status = evt.checked;
            var token = $("input[name='_token']").val();
            if(evt.checked == true){
       
              if(confirm("Are you sure want to approve this ?")){
                 $('.loading-wrapper').show();
                      $(label).html("Approved");
                $.ajax({
                  url: "{{route('admin.approve_online_test_registration')}}",
                  method: 'POST',
                  data: {
                    _token: token,
                    id:id,
                    status: status
                  },
                  success: function(data) {
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
               if(confirm("Are you sure want to disapprove this ?")){
                 $('.loading-wrapper').show();
                 $(label).html("Not Approved");
                $.ajax({
                  url: "{{route('admin.approve_online_test_registration')}}",
                  method: 'POST',
                  data: {
                    _token: token,
                    id:id,
                    status: status
                  },
                  success: function(data) {
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
