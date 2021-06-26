@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'dashboard','activeMenu' => '', 'titlePage' => __('Dashboard')])
@push('head-js')
<style type="text/css">
  .package-list div:hover{
    cursor:pointer;
  }
</style>
@endpush
@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Create New Package') }}</h4>
             
            </div>
            <div class="card-body">
            <form action="{{url('tutor-admin/create-structure')}}" id="myform" method="GET">
                <input type="hidden" name="test_id" id="test_id">
                <input type="hidden" name="module_id" id="module_id">
                <input type="hidden" name="package_id" id="package_id">
                </form>
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
                <div class="col-6">
                <a href="{{URL::previous()}}">Back</a>
                </div>
                <div class="col-6 text-right">
                  <a href="{{ route('ot-package.create') }}" class="btn btn-sm btn-primary">{{ __('Add packages') }}</a>
                </div>
              </div>
              @csrf
              <div class="row">
                    @if(isset($packages))
                    @foreach($packages as $value)
                      <div class="col-md-3 package-list" style="margin:15px 0;">
                      <div class="col-md-12" onclick="select_package('{{$test_id}}','{{$module_id}}','{{$value->id}}')" style="position: relative;height:150px;color:white;font-size:20px;font-weight:bold;padding:0 10px;background: linear-gradient(60deg, #ef5350, #e53935);">
                        <div style="text-align:center;line-height:150px;">
                           {{ $value->name }}
                        </div>
                      </div>
                      </div>


                      <!--   <td class="text-center">
                          <form action="{{ route('ot-test.destroy', $value) }}" method="post">
                              @csrf
                              @method('delete')

                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('ot-test.edit', $value) }}" value-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this test?") }}') ? this.parentElement.submit() : ''">
                                  <i class="material-icons">close</i>
                                  <div class="ripple-container"></div>
                              </button>
                          </form>
                      </td>
                           <td class="td-actions text-right">
                            <form action="{{ route('mp.destroy', $value) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $value) }}" value-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this test?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                       <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" value-original-title="" title="">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                        </td>-->
                    @endforeach
                    @endif

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
@endsection

@push('js')
  <script>
      function select_package(test_id,module_id,package_id){
        $('#test_id').val(test_id);
        $('#module_id').val(module_id);
        $('#package_id').val(package_id);
        $('#myform').submit();
      }
  </script>
@endpush
