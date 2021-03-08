@extends('layouts.app-auth', ['activePage' => 'cms.banner', 'titlePage' => __('Banner'),'activeMenu' => 'home-management'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('cms-banner.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Model Type') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('cms.menu-types.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="name">
                    @if ($errors->has('name'))
                    <span id="name-error" class="error name-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="slug">
                    @if ($errors->has('slug'))
                    <span id="slug-error" class="error slug-danger" for="input-slug">{{ $errors->first('slug') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Model Type') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('mode_type') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="mode_type">
                    @if ($errors->has('mode_type'))
                    <span id="model_type-error" class="error mode_type-danger" for="input-mode_type">{{ $errors->first('mode_type') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Label') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('label') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="label">
                    @if ($errors->has('label'))
                    <span id="label-error" class="error label-danger" for="input-label">{{ $errors->first('label') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Value') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="value">
                    @if ($errors->has('value'))
                    <span id="value-error" class="error value-danger" for="input-value">{{ $errors->first('value') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Relationship Settings') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('relationship_settings') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="relationship_settings">
                    @if ($errors->has('relationship_settings'))
                    <span id="relationship_settings-error" class="error relationship_settings-danger" for="input-relationship_settings">{{ $errors->first('relationship_settings') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Model Type') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @endsection
  @push('js')
  <script type="text/javascript">
  </script>
  @endpush
