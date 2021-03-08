@extends('layouts.app-auth', ['activePage' => 'promo','activeMenu' => 'data-management', 'titlePage' => __('Promo')])
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
                        <h4 class="card-title ">{{ __('data contact us') }}</h4>
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
                                <a href="{{ route('admin-news-promo.index') }}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
                            </div>
                        </div>
                        @csrf
                        <div class="table-responsive">

                          <h3>{{$news->title}}</h3>
                          <a href="{{url('admin/promo/data-contactus/'.$news->id.'/export')}}" class="btn btn-primary my-3" target="_blank">EXPORT EXCEL</a>
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
                                </thead>
                                <tbody>
                                    @foreach($news->contact_us as $data)
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
