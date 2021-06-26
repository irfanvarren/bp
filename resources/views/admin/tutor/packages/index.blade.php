@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'packages', 'titlePage' => __('package'),'activeMenu' => 'content-management'])
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
                <h4 class="card-title ">{{ __('package') }}</h4>
                <p class="card-category"> {{ __('Here you can manage package') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" value-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
              <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('ot-package.create') }}" class="btn btn-sm btn-primary">{{ __('Add package') }}</a>
                  </div>
                </div>
                @csrf
                <div class="table-responsive">
                  <table class="table">
                    <colgroup>
                      <col>
                      <col width="40%">
                      <col>
                      <col>
                      <col>
                    </colgroup>
                    <thead class=" text-primary">
                      <th>{{__('Test Name')}}</th>
                      <th>
                        {{ __('Package Name') }}
                      </th>


                      <th class="text-center">
                        {{__('Action')}}
                      </th>
                    </thead>
                    <tbody>
                      @if(isset($packages))
                      @foreach($packages as $value)
                        <tr>
                          <td>{{$value->test_name}}</td>
                          <td>
                            {{ $value->name }}
                          </td>
                        


                          <td class="text-center">
                            <form action="{{ route('ot-package.destroy', $value) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('ot-package.edit', $value) }}" value-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this package?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                        </td>
                            <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $value) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $value) }}" value-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this package?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                         <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" value-original-title="" title="">
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
                  @if(isset($packages))
                    {{ $packages->links() }}
                    @endif
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
