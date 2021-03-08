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
                      @foreach($divisions as $division)
                        <tr>
                          <td>
                            {{ $division->NAMA }}
                          </td>
                         
                          <td class="text-right">
                                @method('delete')
                                <a rel="tooltip" class="btn btn-info" href="{{ route('pages.show', $division) }}" data-original-title="" title="">
                                  <i class="material-icons" style="margin:0;">menu</i>
                                  <span>Types</span>

                                </a>
                            
                        </td>

                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
                <div class="row">
                    {{ $divisions->links() }}
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
