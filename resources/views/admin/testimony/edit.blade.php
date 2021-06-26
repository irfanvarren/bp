@extends('layouts.app-auth', ['activePage' => 'news','activeMenu' => 'data-management', 'titlePage' => __('News')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
           <form method="post" action="{{route('admin-testimony.update',$testimony->id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-name">{{ __('Add testimony') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('admin-testimony.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('name') }}" value="{{ old('name',$testimony->name) }}" required />
                      @if ($errors->has('name'))
                        <span id="harga-error" class="error text-danger" for="input-name">{{ $errors->first('harga') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Gambar') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"><img src="{{asset($testimony->image)}}"></div>
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
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Video Id') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('video') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" id="input-name" type="text" placeholder="{{ __('video id') }}" value="{{ old('name',$testimony->video) }}" />
                      @if ($errors->has('name'))
                        <span id="harga-error" class="error text-danger" for="input-name">{{ $errors->first('harga') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('testimony') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('testimony') ? ' has-danger' : '' }}">
                      <textarea class="form-control {{ $errors->has('testimony') ? ' is-invalid' : '' }}" name="testimony" id="input-testimony" type="text" placeholder="{{ __('testimony...') }}" value="{{ old('testimony') }}" row="5" required>{!!$testimony->testimony!!}</textarea>
                      @if ($errors->has('testimony'))
                        <span id="harga-error" class="error text-danger" for="input-testimony">{{ $errors->first('testimony') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Testimony') }}</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">

</script>
@endpush
