@extends('layouts.app-auth', ['activePage' => 'pages', 'titlePage' => __('pages'),'activeMenu' => 'data-management'])
<style media="screen">
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('pages') }}</h4>
                <p class="card-category"> {{ __('Here you can manage pages') }}</p>
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
              <div class="col-md-12">
                <a class="btn {{$divisi == 'all' ? 'btn-primary' : 'btn-warning'}} event-btn" href="{{url('admin/cms/pages/')}}">All Promos</a>
               @foreach($divisi as $key => $data)
                <a class="btn {{'test' == $key ? 'btn-primary' : 'btn-warning'}} event-btn" href="{{url('admin/cmd/pages/'.$key)}}">{{ucwords($key)}}</a>
                @endforeach
              </div>
            </div>
              <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary">{{ __('Add pages') }}</a>
                  </div>
                </div>
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
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Title') }}
                      </th>
                      <th>{{__('Divisi')}}</th>

                      <th>{{__('Category')}}</th>
                      <th>{{__('Type')}}</th>
                      <th>Preview Link</th>
                        <th>
                        {{__('Status')}}

                      </th>
                      <th class="text-center">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($pages as $page)
                        <tr>
                          <td>
                            {{ $page->name }}
                          </td>
                          <td>
                            {{ ucwords($page->title) }}
                          </td>
                         <td>{{$page->divisi}}</td>
                          <td>{{$page->category}}</td>
                          <td>{{$page->type}}</td>
                          <td> <a href="{{url($page->slug)}}" target="_blank">{{url($page->slug)}}</a> </td>
                           <td>
                            {{ $page->status  == 1 ? 'active' : 'non active'}}
                          </td>
                          <td class="text-center">
                            <form action="{{ route('pages.destroy', $page) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('pages.edit', $page) }}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this page?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $pages->links() }}
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
