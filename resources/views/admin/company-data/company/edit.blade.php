@extends('layouts.app-auth', ['activePage' => 'cms.banner', 'titlePage' => __('Banner'),'activeMenu' => 'home-management'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('cms-banner.update',$id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Banner') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('cms-banner.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Banner Type') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                    <select class="selectpicker" required data-style="select-with-transition" id="banner_type" name="banner_type" id="banner_type">
                      <option value="" >- Pilih -</option>
                      <option value="image" @if($data_banner->banner_type =="image"){{"selected"}} @endif>image</option>
                      <option value="text" @if($data_banner->banner_type =="text"){{"selected"}} @endif>text</option>
                    </select>
                    @if ($errors->has('title'))
                    <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('harga') }}</span>
                    @endif
                  </div>
                </div>
              </div>

                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Link') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="link" value="{{$data_banner->link}}">
                    @if ($errors->has('link'))
                    <span id="harga-error" class="error link-danger" for="input-link">{{ $errors->first('link') }}</span>
                    @endif
                  </div>
                </div>
              </div>

              <div id="hide-content" >

              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Image') }}</label>
                <div class="col-sm-7">
                  <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                        <img src="{{asset($data_banner->image)}}">
                      </div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="image1">
                        </span>
                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="hide-image">
                <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Moblie Image') }}</label>
                <div class="col-sm-7">
                  <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                        <img src="{{asset($data_banner->mobile_image)}}">
                      </div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="image2">
                        </span>
                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="hide-text">
                <label class="col-sm-2 col-form-label">{{ __('Text') }}</label>
                <div class="col-sm-9">
                  <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="text" id="input-body" type="text" placeholder="{{ __('Text...') }}" value="{{ old('body') }}" row="3"></textarea>
                    @if ($errors->has('body'))
                    <span id="harga-error" class="error text-danger" for="input-body">{{ $errors->first('body') }}</span>
                    @endif
                  </div>
                </div>
              </div>

                            </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Edit Banner') }}</button>
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
$('document').ready(function(){
  if($('#banner_type').children("option:selected").val() == "image"){
    $('#hide-text').hide();
      $('#hide-image').show();
  }else{
    $('#hide-image').hide();
    $('#hide-text').show();
  }
});
$("#banner_type").on('change',function(){
  $('#hide-content').show();
if($(this).val() == "image") {
$('#hide-text').hide();
  $('#hide-image').show();
}else{
  $('#hide-image').hide();
  $('#hide-text').show();
}
});

</script>
@endpush
