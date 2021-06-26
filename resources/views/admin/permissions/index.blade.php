@extends('layouts.app-auth', ['activePage' => 'permissions', 'titlePage' => __('Permissions'),'activeMenu' => 'users-management'])
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
                <h4 class="card-title ">{{ __('permissions') }}</h4>
                <p class="card-category"> {{ __('Here you can manage permissions') }}</p>
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
                    <a href="{{ route('admin-permissions.create') }}" class="btn btn-sm btn-primary">{{ __('Add Permissions') }}</a>
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
                      <th>{{__('Guards')}}</th>
                      <th>{{__('Created At')}}</th>
                      <th>{{__('Updated At')}}</th>
                      <th class="text-center">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($permissions as $permission)
                        <tr>
                          <td>
                            {{ $permission->name }}
                          </td>
                          <td>{{$permission->guard_name}}</td>
                          <td>{{$permission->created_at}}</td>
                          <td>{{$permission->updated_at}}</td>
                          <td class="text-center">
                            <form action="{{ route('admin-permissions.destroy', $permission) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-permissions.edit', $permission) }}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this permissions?") }}') ? this.parentElement.submit() : ''">
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
                  
                  {{$permissions->links()}}
                  
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
