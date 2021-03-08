@extends('layouts.app-auth', ['activePage' => 'roles','activeMenu' => 'users-management', 'titlePage' => __('User Management')])
@push('head-js')
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
</style>
@endpush
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('admin-roles.update',$role) }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Roles') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{ route('admin-roles.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$role->name) }}" required="true" aria-required="true"/>
                    @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Guard (web/api/merchant)') }}</label>
                <div class="col-sm-7 ">
                  <div class="form-group{{ $errors->has('guard_name') ? ' has-danger' : '' }}" title="disabled">
                    <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="guard_name" name="guard_name" disabled >
                      <option value="">- Select Guard -</option>
                      <option value="web" {{$role->guard_name == "web" ? 'selected' : ''}}>web</option>
                      <option value="api" {{$role->guard_name == "api" ? 'selected' : ''}}>api</option>
                      <option value="merchant" {{$role->guard_name == "merchant" ? 'selected' : ''}}>merchant</option>

                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Role Permissions') }}</label>
                <div class="col-sm-7 ">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="table-responsive" id="permission-output">
                        <table class="table table-bordered">
                          <tr>
                            <th>Role</th> <th>Permissions</th> <th>Action</th>
                          </tr>

                          @foreach($role->permissions as $permission)
                          <tr>
                            <td>{{$role->name}}</td> <td>{{$permission->name}}</td> <td>
                              <button rel="tooltip" class="btn btn-success btn-link" type="button" data-original-title="" onclick="edit_permission('{{$role->id}}','{{$permission->name}}')" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                                edit
                              </button>
                              <button type="button" class="btn btn-danger btn-link" type="button" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this role?") }}') ? delete_permission('{{$permission->name}}') : ''">
                                <i class="material-icons">close</i>
                                <div class="ripple-container"></div>
                                delete
                              </button>
                            </td>

                          </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-3 col-form-label text-center">Permissions</div> 
                        <div class="col-sm-6">
                          <div class="row form-group">
                            <input type="text" class="selectize form-control" name="permission" id="permission">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-primary w-100" type="button" onclick="add_permission()">Add Permission</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Edit Role') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script>
  $( document ).ready(function() {
    $('#permission').selectize({
      delimiter: ',',
      persist: false,
      valueField: 'name',
      labelField: 'name',
      searchField: 'name',
      maxItems: 1,
      options: {!!$permissions->toJson()!!},
      create: function(input) {
        return {
          name: input
        };
      }
    });
  });

  var token = $("input[name='_token']").val();

  function add_permission(){
    var permission = $('#permission').val();
    $.ajax({
      url: "{{route('admin-permissions.store')}}",
      method: 'POST',
      data: {
        _token: token,
        role_id: "{{$role->id}}",
        permission:permission
      },
      success: function(data) {
        $('#permission-output').html(data);
      },
      error: function() {
        alert('error...');
      },complete: function(){
        $('.loading-wrapper').hide();
      }
    });
  }
  function edit_permission(role_id,permission){
    alert(role_id);
    alert(permission);
  }
  function delete_permission(permission){
    alert(permission);
  }
</script>
@endpush
