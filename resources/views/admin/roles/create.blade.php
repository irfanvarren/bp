@extends('layouts.app-auth', ['activePage' => 'roles','activeMenu' => 'users-management', 'titlePage' => __('User Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('admin-roles.store') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Roles') }}</h4>
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
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
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
                      <option value="web" selected>web</option>
                        <option value="api">api</option>
                          <option value="merchant">merchant</option>
                    
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Role') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
