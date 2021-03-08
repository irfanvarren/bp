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
                   
                    </thead>
                    <tbody>
                      @foreach($pages as $page)
                        <tr>
                          <td>
                            {{ $page->NAMA }}
                          </td>
                         
                          <td class="text-right">
                            <form action="{{ route('pages.destroy', $page) }}" method="post">
                                @csrf
                                @method('delete')
                                {{$page}}
                                <a rel="tooltip" class="btn btn-info" href="{{ route('pages.show', $page) }}" data-original-title="" title="">
                                  <i class="material-icons" style="margin:0;">menu</i>
                                  <span>  Link Builder</span>

                                </a>
                                <a rel="tooltip" class="btn btn-success" href="{{ route('pages.edit', $page) }}" data-original-title="" title="">
                                  <i class="material-icons" style="margin:0;">edit</i>
                                  <span>  Edit</span>

                                </a>
                                <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this page?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons" style="margin:0;">close</i>
                                    <span>Delete</span>
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
