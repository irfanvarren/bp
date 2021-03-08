@extends('layouts.app-auth', ['activePage' => 'briefing', 'titlePage' => __('Briefing'),'activeMenu' => 'company-data'])
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
            <h4 class="card-title ">{{ __('Briefing Minutes') }}</h4>
            <p class="card-category"> {{ __('Here you can manage briefing minutes') }}</p>
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
                <a href="{{ route('admin-briefing.create') }}" class="btn btn-sm btn-primary">{{ __('Add briefing') }}</a>
              </div>
            </div>
                <!--
              <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('admin-company.create') }}" class="btn btn-sm btn-primary">{{ __('Add Company') }}</a>
                  </div>
                </div>-->
                @csrf
                <div class="table-responsive">
                  <table class="table">
                    <colgroup>
                      <col>
                      <col>
                      <col>
                      <col>
                    </colgroup>
                    <thead class=" text-primary">
                    <th>{{__('Subject')}}</th>  
                    <th>{{__('Reference #')}}</th>
                    <th>{{__('Date Time')}}</th>
                    <th>{{__('Type')}}</th>

                    <th>{{__('Note Taker')}}</th>
                    <th>{{__('Date Created')}}</th>
                    <th>Status</th>
                    <th>Actions</th>

                  </thead>
                  <tbody>
                
                  @foreach($briefings as $data)
                  <tr>
                    <td>{{$data->subject}}</td>
                    <td>{{$data->reference}}</td>
                    <td>Date : {{$data->date}} <br>Time : {{$data->time}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->note_taker}}</td>

                <td>{{$data->created_at}}</td>
                <td>
                  <div>
                  Sent : {{count($data->attendees->where('status',1))}}
                  </div>
                  <div>
                    Failed : {{count($data->attendees->where('status',0))}}
                  </div>
                </td>
                <td>
                  <form method="POST" action="{{route('admin-briefing.destroy',$data)}}">
                    @csrf
                    @method('delete')
                    <a href="{{route('admin-briefing.edit',$data)}}" class="btn btn-success btn-link" data-original-title="" title="">
                      <i class="material-icons d-inline">edit</i>
                      <div class="ripple-container"></div>
                      edit
                    </a>
                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
                      <i class="material-icons d-inline">close</i>
                      <div class="ripple-container"></div>
                      delete
                    </button>

                  </form>
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

@endpush