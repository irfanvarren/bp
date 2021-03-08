@extends('layouts.app-auth', ['activePage' => 'commpany-structure','activeMenu' => 'data-management', 'namePage' => __('commpany-structure')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('admin-company-structure.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-name">{{ __('Add Company Structure') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
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
                  <div class="col-md-12 text-right">
                      <a href="{{route('admin-testimony.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Struktur Perusahaan') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                 @if($structure)
                <img src="{{asset($structure->image)}}">
                @endif
              </div>
              <div>
              <span class="btn btn-rose btn-round btn-file">
              <span class="fileinput-new">Select image</span>
              <span class="fileinput-exists">Change</span>
              <input type="file" name="gambar">
              </span>
              <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
              </div>
              </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add testimony') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('js')
@endpush
