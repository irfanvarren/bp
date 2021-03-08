@extends('layouts.app-auth', ['activePage' => 'enquiry','activeMenu' => 'data-management', 'titlePage' => __('Enquiry')])
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
                <h4 class="card-title ">{{ __('Merchant') }}</h4>
                <p class="card-category"> {{ __('Here you can manage enquiries') }}</p>
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
              <!--  <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('mp.create') }}" class="btn btn-sm btn-primary">{{ __('Add merchant') }}</a>
                  </div>-->
                </div>
                @csrf
                <div class="table-responsive col-md-12">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('User') }}
                      </th>
                      <th>
                        {{ __('Complaint Code') }}
                      </th>
                      <th>{{__('Type')}}</th>
                      <th>
                        {{ __('Subject') }}
                      </th>
                      <th>{{__('Question')}}</th>
                              <th>Created At</th>
                      <th>
                        {{__('Status')}}
                      </th>
                      <th class="text-center">Action</th>

                      <!--<th class="text-right">
                        {{ __('Actions') }}
                      </th>-->
                    </thead>
                    <tbody>
                      @php
                        $no = 1;

                      @endphp
                      @foreach($enquiries as $enquiry)

                        <tr>
                          <td>
                            Nama : {{ $enquiry->name }}
                            <br>
                            Email :  {{ $enquiry->email }}
                            <br>
                            No. Telepon : {{$enquiry->no_telepon}}
                          </td>
                          <td>
                           {{$enquiry->complaint_code}}
                          </td>
                          <td>
                            {{$enquiry->type}}
                            </td>

                          <td>
                            {{$enquiry->subject}}         
                          </td>
                          <td>
                            {{str_limit($enquiry->question,50)}}
                          </td>
                          <td> {{ $enquiry->created_at->format('d/m/Y') }}</td>
                          <td>
                              @if (empty($enquiry->status))
                                <div class="togglebutton" >
                                  <label id="status-ajax">
                              <input type="checkbox" id="status" class="status_input" onchange="change_status('#status-label-{{$no}}','{{$enquiry->complaint_code}}_{{$enquiry->id}}',this)"  name="status">
                              <span class="toggle"></span>
                                </label>

                                <span id="status-label-{{$no}}" class="status-label" for="status">Unsolved</span>
                              </div>
                                @else
                                  @if($enquiry->status != 1)
                                    <div class="togglebutton" >
                                      <label id="status-ajax">
                                  <input type="checkbox" id="status" class="status_input" value="{{$enquiry->id}}"  onchange="change_status('#status-label-{{$no}}','{{$enquiry->complaint_code}}_{{$enquiry->id}}',this)" name="status">
                                  <span class="toggle"></span>
                                    </label>

                                    <span id="status-label-{{$no}}" class="status-label" for="status">Unsolved</span>
                                  </div>
                                  @else
                                    <div class="togglebutton" >
                                      <label id="status-ajax">
                                  <input type="checkbox" class="status_input" id="status" value="{{$enquiry->id}}"  onchange="change_status('#status-label-{{$no}}','{{$enquiry->complaint_code}}_{{$enquiry->id}}',this)" name="status" checked>
                                  <span class="toggle"></span>
                                    </label>

                                    <span id="status-label-{{$no}}" class="status-label" for="status">Solved</span>
                                  </div>
                                  @endif
                              @endif

                          </td>
                          <td>
                            <a class="btn btn-success btn-link" href="{{url('admin/enquiry/'.$enquiry->id.'/details')}}">Details</a>
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
                    {{ $enquiries->links() }}
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
               $(label).html("Solved");
               $.ajax({
                url: "{{url('enquiry/reference')}}/"+id+"/confirm",
                method: 'POST',
                data: {
                  _token: token,
                  id:id,
                  status: status,
                  cmd : "admin-approve"
                },
                success: function(data) {
                  alert("Enquiry Solved");
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
             $(label).html("Unsolved");
             $.ajax({
              url:  "{{url('enquiry/reference')}}/"+id+"/confirm",
              method: 'POST',
              data: {
                _token: token,
                id:id,
                status: status,
                cmd : "admin-approve"
              },
              success: function(data) {
                alert("Enquiry unsolved");
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
