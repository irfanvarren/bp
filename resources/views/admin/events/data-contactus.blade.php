@extends('layouts.app-auth', ['activePage' => 'event','activeMenu' => 'data-management', 'titlePage' => __('Events')])
<style media="screen">
    .loading-wrapper {
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999999;
        display: none;
        background: rgba(255, 255, 255, 1);
    }

    .loading-wrapper img {
        display: block;
        margin: 0 auto;
        width: 500px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    .form-group input[type=file] {
        position: relative !important;
        opacity: 1 !important;
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
                        <h4 class="card-title ">{{ __('Data Contact Us') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage events') }}</p>
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
                                <a href="{{ route('admin-events.index') }}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
                            </div>
                        </div>
                        @csrf
                        <div class="table-responsive">
                          <h3>{{$events != "" ? $events->title : ''}}</h3>
                          @if($events != "")
                          <a href="{{url('admin/events/data-guestbook/'.$events->id.'/export')}}" class="btn btn-primary my-3" target="_blank">EXPORT EXCEL</a>
                          @endif
                          <table class="table">
                            <colgroup>
                              <col>
                              <col>
                          </colgroup>
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
                            <th>Pesan</th>
                            <th class="text-center">
                                {{ __('Actions') }}
                            </th>
                        </thead>
                        <tbody>
                            @if($events != "")
                            @foreach($events->contactus as $data)
                            <tr>
                                <td>
                                    {{$data->nama}}
                                </td>
                                <td>
                                    {{$data->email}}
                                </td>
                                
                                <td>
                                    {{$data->no_telepon}}
                                </td>
                                <td>{{$data->pesan}}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin-events.destroy', $data) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-events.edit', $data) }}" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this events?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">close</i>
                                            <div class="ripple-container"></div>
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
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this events?") }}') ? this.parentElement.submit() : ''">
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
                      @endif
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