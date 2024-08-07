@extends('layouts.app-auth', ['activePage' => 'permissions','activeMenu' => 'users-management', 'titlePage' => __('User Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('admin-permissions.update',$permission) }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit permissions') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{ route('admin-permissions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$permission->name) }}" required="true" aria-required="true"/>
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
                      <option value="web" {{$permission->guard_name == "web" ? 'selected' : ''}}>web</option>
                        <option value="api" {{$permission->guard_name == "api" ? 'selected' : ''}}>api</option>
                          <option value="merchant" {{$permission->guard_name == "merchant" ? 'selected' : ''}}>merchant</option>
                    
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Edit permission') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
