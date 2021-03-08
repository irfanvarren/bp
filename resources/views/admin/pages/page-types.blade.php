@extends('layouts.app-auth', ['activePage' => 'pages', 'titlePage' => __('pages'),'activeMenu' => 'data-management'])
<style media="screen">
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
       <div class="row form-group">
                  <div class="col-12 text-right">
                     <a href="{{ route('pages.index') }}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
                  </div>
                  <div class="col-12">
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
                  </div>
                </div>

      <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Types') }}</h4>
                <p class="card-category"> {{ __('Here you can manage types') }}</p>
              </div>
              <div class="card-body">
                
               
              <div class="row">
                  <div class="col-12 text-right">
                      
                
                    <a href="{{ route('admin-page-type.create',$division) }}" class="btn btn-sm btn-primary">{{ __('Add Type') }}</a>
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
                        {{__('Division')}}
                      </th>
                      <th>
                          {{ __('Type') }}
                      </th>
                     
                      <th>{{__('Actions')}}</th>
                    </thead>
                    <tbody>
                      @foreach($page_types as $page_type)
                        <tr>

                         <td>{{$page_type->NAMA}}</td>
                          <td>
                            {{ $page_type->name }}
                          </td>
                          <td class="text-right">
                            <form action="{{ route('admin-page-type.destroy', [$page_type,$division]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <a rel="tooltip" class="btn btn-success" href="{{ route('admin-page-type.edit', [$page_type,$division]) }}" data-original-title="" title="">
                                  <i class="material-icons" style="margin:0;">edit</i>
                                  <span>  Edit</span>

                                </a>
                                <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this type?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $page_types->links() }}
                </div>
              </div>
            </div>
        </div>

         <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Sub Types') }}</h4>
                <p class="card-category"> {{ __('Here you can manage sub types') }}</p>
              </div>
              <div class="card-body">
                
              <div class="row">
                  <div class="col-12 text-right">
                      
                
                    <a href="{{ route('admin-page-subtype.create',$division) }}" class="btn btn-sm btn-primary">{{ __('Add Sub Type') }}</a>
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
                        {{__('Division')}}
                      </th> 
                      <th>
                        {{__('Types')}}
                      </th>
                      <th>
                          {{ __('Sub Type') }}
                      </th>
                      <th>{{__('Actions')}}</th>
                    </thead>
                    <tbody>
                      @foreach($page_sub_types as $page_sub_type)
                        <tr>

                         <td>{{$page_sub_type->division}}</td>

                          <td>
                            {{$page_sub_type->type}}
                          </td>
                          <td>
                            {{ $page_sub_type->name }}
                          </td>
                          <td class="text-right">
                            <form action="{{ route('admin-page-subtype.destroy', [$page_sub_type,$division]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <a rel="tooltip" class="btn btn-success" href="{{ route('admin-page-subtype.edit', [$page_sub_type,$division]) }}" data-original-title="" title="">
                                  <i class="material-icons" style="margin:0;">edit</i>
                                  <span>  Edit</span>

                                </a>
                                <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this type?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $page_sub_types->links() }}
                </div>
              </div>
            </div>
        </div>


      </div>
      <div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Pages') }}</h4>
                <p class="card-category"> {{ __('Here you can manage pages') }}</p>
              </div>
              <div class="card-body">
                
              <div class="row">
                  <div class="col-12 text-right">
                      
                
                    <a href="{{ route('pages.create',['division' => $division]) }}" class="btn btn-sm btn-primary">{{ __('Add Page') }}</a>
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
                        {{__('Division')}}
                      </th>
                      <th>{{__('Type')}}</th>
                      <th>{{__('Sub Type')}}</th>
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>Link</th>
                     
                      <th class="text-right">{{__('Actions')}}</th>
                    </thead>
                    <tbody>
                      @foreach($pages as $page)
                        <tr>

                         <td>{{$page->division_name}}</td>
                          <td>
                            {{ $page->type_name }}
                          </td>
                          <td>{{$page->subtype_name}}</td>
                          <td>{{$page->name}}</td>
                          <td>
                            <div><a href="{{url($page->slug)}}">{{url($page->slug)}}</a></div>
                            {!! QrCode::size(150)->generate(url($page->slug)); !!}</td>
                          <td class="text-right">
                            <form action="{{ route('pages.destroy', [$page,$division]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <a rel="tooltip" class="btn btn-success" href="{{ route('pages.edit',[$page, $division]) }}" data-original-title="" title="">
                                  <i class="material-icons" style="margin:0;">edit</i>
                                  <span>  Edit</span>

                                </a>
                                <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this type?") }}') ? this.parentElement.submit() : ''">
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
