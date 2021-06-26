@extends('layouts.app-auth', ['activePage' => 'visa-requirements','activeMenu' => 'data-management', 'titlePage' => __('visa-requirements')])
@push('head-js')
  <script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
  <script>
  tinymce.init({
    selector: '#content',
    menubar: 'file edit insert view format table tools help',
     plugins: "image autosave code media hr image imagetools link lists pagebreak paste table",
     mediaembed_service_url: "{{asset('img')}}",
    menu: {
   file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
   edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
   view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
   insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
   format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
   tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
   table: { title: 'Table', items: 'inserttable tableprops deletetable row column cell' },
   help: { title: 'Help', items: 'help' }
 },
 toolbar: 'undo redo restoredraft | formatselect |  fontselect fontsizeselect bold italic underline forecolor backcolor |' +
   'alignleft aligncenter alignright alignjustify | bullist numlist | link image media table | outdent indent | removeformat pagebreak | help',
   powerpaste_word_import: "clean",
 powerpaste_html_import: "merge",
 paste_data_images: true,
 min_height:500
  });
  </script>
@endpush
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('visa-requirements.update',$visaRequirements->id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            <input type="hidden" name="type" value="{{$type}}">
            @csrf
            @method('put')
               <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Update Visa Requirement') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('visa-requirements.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-title" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$visaRequirements->name) }}" required />
                    @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                <div class="col-md-7">
                 <div class="form-group{{ $errors->has('country_id') ? ' has-danger' : '' }}">

                  <select required class="selectize form-control" id="country_id" name="country_id">
                    <option value="">- Select Country -</option>

                    @foreach($countries as $key => $value)
                    <option value="{{$value->id}}" {{$visaRequirements->country_id == $value->id ? "selected" : ""}}> {{$value->name}}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('country_id'))
                  <span id="harga-error" class="error text-danger" for="input-country_id">{{ $errors->first('country_id') }}</span>
                  @endif
                </div>
              </div>
            </div>


            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('content') }}</label>
              <div class="col-sm-9">
                <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                  <textarea class="{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="content" type="text"value="{{ old('content') }}" row="3" required>{!!$visaRequirements->content!!}</textarea>
                  @if ($errors->has('content'))
                  <span id="harga-error" class="error text-danger" for="input-content">{{ $errors->first('content') }}</span>
                  @endif
                </div>
              </div>
            </div>

          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">{{ __('Update Visa Requirements') }}</button>
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
