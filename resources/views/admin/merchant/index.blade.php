@extends('layouts.app-auth', ['activePage' => 'merchant','activeMenu' => 'data-management', 'titlePage' => __('Merchant')])
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
                <p class="card-category"> {{ __('Here you can manage merchants') }}</p>
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
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nama') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('No Telepon') }}
                      </th>
                      <th>
                        {{ __('Alamat') }}
                      </th>
                              <th>Created At</th>
                      <th>
                        {{__('Status')}}
                      </th>

                      <!--<th class="text-right">
                        {{ __('Actions') }}
                      </th>-->
                    </thead>
                    <tbody id="output">
                      @php
                        $x = 0;

                      @endphp
                      @foreach($merchants as $merchant)
                        <tr>
                          <td>
                            {{ $merchant->name }}
                          </td>
                          <td>
                            {{ $merchant->email }}
                          </td>
                          <td>
                            {{$merchant->no_telepon}}
                          </td>
                          <td>
                            {{$merchant->alamat}}
                            </td>

                          <td>
                            {{ $merchant->created_at->format('Y-m-d') }}
                          </td>
                          <td>
                              @if (empty($merchant->status))
                                <div class="togglebutton" >
                                  <label id="status-ajax">
                              <input type="checkbox" id="status" class="status_input" no="{{$x}}" disabled value="{{$merchant->id}}"  name="status">
                              <span class="toggle"></span>
                                </label>

                                <span id="status-label" class="status-label" for="status">Non Active</span>
                              </div>
                                @else
                                  @if($merchant->status != 1)
                                    <div class="togglebutton" >
                                      <label id="status-ajax">
                                  <input type="checkbox" id="status" class="status_input" no="{{$x}}" disabled value="{{$merchant->id}}" name="status">
                                  <span class="toggle"></span>
                                    </label>

                                    <span id="status-label" class="status-label" for="status">Non Active</span>
                                  </div>
                                  @else
                                    <div class="togglebutton" >
                                      <label id="status-ajax">
                                  <input type="checkbox" class="status_input" no="{{$x}}" id="status" disabled value="{{$merchant->id}}" name="status" checked>
                                  <span class="toggle"></span>
                                    </label>

                                    <span id="status-label" class="status-label" for="status">Active</span>
                                  </div>
                                  @endif
                              @endif

                          </td>
                            <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $merchant) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $merchant) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this merchant?") }}') ? this.parentElement.submit() : ''">
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
                        @php
                          $x++;
                        @endphp
                      @endforeach
                    </tbody>
                  </table>

                </div>
                <div class="row">
                    {{ $merchants->links() }}
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
  $(document).ready(function(){
    $("#status-ajax input").prop("disabled",false)
  });
    $(document).on("change","#status-ajax input",function(){
      var token = $("input[name='_token']").val();
      var status = this.checked;
      var id = $(this).val();
      var label = document.getElementsByClassName('status-label');
      var no = $(this).attr("no");
      alert(no);
      $('.loading-wrapper').show();

      if(status == true){
      label[no].innerHTML = "Active";
      //    $('.status-label').html("Active");
      }else if(status == false){
        label[no].innerHTML = "Non Active";
      //    $('.status-label').html("Non Active");
      }
      $.ajax({
        url: "<?php echo route('cek-merchant-ajax') ?>",
        method: 'POST',
        data: {
          _token: token,
          id:id,
          status: status
        },
        success: function(data) {
            $('.loading-wrapper').hide();
          $('#output').html(data);
        },
        error: function() {
          //handle errors
          alert('error...');
        }
      });
    });
  </script>
@endpush
