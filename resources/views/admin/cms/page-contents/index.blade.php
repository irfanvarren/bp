@extends('layouts.app-auth', ['activePage' => 'page-contents', 'titlePage' => __('Page Contents'),'activeMenu' => 'content-management'])
@push('head-script')

@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Page Contents') }}</h4>
            <p class="card-category"> {{ __('Here you can manage pageContents') }}</p>
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
                <a href="{{ route('admin-page-content.create') }}" class="btn btn-sm btn-primary">{{ __('Add Page Contents') }}</a>
              </div>
            </div>
            @csrf
            <div class="table-responsive">
              <table class="table">
                <colgroup>
                  <col>

                  <col style="width:45%;">
                  <col>

                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Type') }}
                  </th>
                  <th>
                    {{ __('Content') }}
                  </th>
                  <th class="text-center">
                    {{__('Action')}}
                  </th>
                </thead>
                <tbody>
                  @foreach($pageContents as $data)
                  <tr>

                    <td>{{$data->type}}</td>
                    <td>{!! $data->content !!}</td>
                    <td class="text-center">
                      <form action="{{ route('admin-page-content.destroy', $data) }}" enctype="multipart/form-data" id="myform" method="post">
                        @csrf
                        @method('delete')
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-page-content.edit', $data) }}" data-original-title="" title="">
                          <i class="material-icons">edit</i> Edit
                          <div class="ripple-container"></div>
                        </a>
                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this pageContents?") }}') ? this.parentElement.submit() : ''">
                          <i class="material-icons">close</i> Delete
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
              {{ $pageContents->links() }}
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
