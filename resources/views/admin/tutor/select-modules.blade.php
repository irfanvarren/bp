@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'dashboard','activeMenu' => '', 'titlePage' => __('Dashboard')])
@push('head-js')
<style type="text/css">
  .modules-list{
    margin:15px 0;
  }
  .modules-list div:hover{
    cursor: pointer;
  }
</style>
@endpush
@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Create New Module') }}</h4>
             
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
                <div class="col-6">
                <a href="{{url('tutor-admin')}}">Back</a>
                </div>
                <div class="col-6 text-right">
                  <a href="{{ route('ot-module.create') }}" class="btn btn-sm btn-primary">{{ __('Add Modules') }}</a>
                </div>
              </div>
              @csrf
              <div class="row">
                    @if(isset($modules))
                    @foreach($modules as $value)
                      <div class="col-md-3 modules-list">
                      <div class="col-md-12" onclick="select_module('{{$test_id}}','{{$value->id}}')" style="position: relative;height:150px;color:white;font-size:20px;font-weight:bold;padding:0 10px;text-align:center;background: linear-gradient(60deg, #ef5350, #e53935);display: table;">
                        <span style="display: table-cell;vertical-align: middle;">
                          @if($value->name == '-')
                          Without Module
                          @else
                           {{ $value->name }}
                          @endif
                          </span>
                        </div>
                      </div>

                    @endforeach
                    @endif
              </div>
              <div class="row">
                @if(isset($modules))
                  {{ $modules->links() }}
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
    function select_module(test_id,module_id){
        var url = "{{url('tutor-admin/select-package')}}";
        if(test_id != ""){
            url += "?test_id="+test_id;
        }
        if(module_id != ""){
            url +="&module_id="+module_id;
        }
      location.href =url;
    }
  </script>
@endpush
