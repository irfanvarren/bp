@extends('layouts.app-auth', $param)
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
            <h4 class="card-title ">{{ ucwords($param['type']) }}</h4>
            <p class="card-category"> {{ __('Here you can manage '.ucwords($param['type'])) }}</p>
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
                <a href="{{ route($param['route'].'.create') }}" class="btn btn-sm btn-primary">{{ __('Add ').ucwords($param['type']) }}</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a class="btn {{$type_id == 'all' ? 'btn-primary' : 'btn-warning'}} event-btn" href="{{url('admin/news/')}}">All news</a>
                @foreach($news_types as $news_type)
                <a class="btn {{$type_id == $news_type->id ? 'btn-primary' : 'btn-warning'}} event-btn" href="{{url('admin/news/news-type/'.$news_type->id)}}">{{$news_type->name}}</a>
                <!--   <button class="btn btn-warning event-btn" onclick="event_type('{{$news_type->id}}',this)">{{$news_type->name}}</button>-->
                @endforeach
              </div>
            </div>
            @csrf
            <div class="table-responsive">
              <table class="table">
                <colgroup>
                  <col>
                  <col>
                  <col width="40%">
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Author') }}
                  </th>
                  <th>{{__('Type')}}</th>
                  <th>
                    {{ __('Title') }}
                  </th>
                  <th>
                    {{ __('Preview Link') }}
                  </th>
                  <th>
                    {{__('Views')}}
                  </th>
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
                  $no = 1;
                  @endphp
                  @foreach($data_news as $news)
                  <tr>
                    <td>
                      {{ $news->nama_author }}
                    </td>
                    <td>{{$news->type_name}}</td>
                    <td>
                      {{ ucwords($news->title) }}
                    </td>
                    <td>
                      <a href="{{url("media/".$param['type']."/".$news->created_at->format('y/m').'/'.$news->slug)}}" target="_blank">Link</a> | 
                      <a href="{{url('admin/news/data-contactus/'.$news->id)}}">Contact Us</a> 
                    </td>
                    <td></td>
                    <td>
                     <div class="togglebutton" >
                      <label id="status-ajax">
                        <input type="checkbox" id="status-{{$no}}" onchange="change_status('#status-label-{{$no}}','{{$news->id}}',this)" class="status_input" name="status" {{$news->status == 1 ? "checked" : ""}}>
                        <span class="toggle"></span>
                      </label><br>
                      <span class="status-label" id="status-label-{{$no}}" for="status">{{$news->status == "1" ? "Active" : "Inactive"}}</span>
                    </div>
                  </td>
                  <td>
                    {{ $news->created_at->format('d-m-Y') }}
                  </td>

                  <td class="text-center">
                    <form action="{{ route($param['route'].'.destroy', $news) }}" method="post">
                      @csrf
                      @method('delete')

                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route($param['route'].'.edit', $news) }}" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                      </a>
                      <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this news?") }}') ? this.parentElement.submit() : ''">
                        <i class="material-icons">close</i>
                        <div class="ripple-container"></div>
                      </button>
                    </form>
                  </td>
                            <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $news) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $news) }}" data-original-title="" title="">
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
                          @php
                          $no++;
                          @endphp
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                    <div class="row">
                      {{ $data_news->links() }}
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
              url: "{{route('admin-news.change_status')}}",
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
         if(confirm("Are you sure want to change this status ?")){
           $('.loading-wrapper').show();
           $(label).html("Inactive");
           $.ajax({
            url: "{{route('admin-news.change_status')}}",
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
