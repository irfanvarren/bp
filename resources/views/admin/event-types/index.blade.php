@extends('layouts.app-auth', ['activePage' => 'event-types','activeMenu' => 'data-management', 'titlePage' => __('event-types')])
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
                        <h4 class="card-title ">{{ __('event-types') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage event-types') }}</p>
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
                                <a href="{{ route('admin-event-types.create') }}" class="btn btn-sm btn-primary">{{ __('Add event types') }}</a>
                            </div>
                        </div>
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    
                                    <th class="text-center">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($event_types as $data)
                                    <tr>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin-event-types.destroy', $data) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-event-types.edit', $data) }}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this event-types?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                          {{$event_types->links()}}
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
