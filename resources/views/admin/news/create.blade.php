@extends('layouts.app-auth', $param)
@push('head-js')
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '.tinymce-editor',
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
   min_height:500,
   relative_urls : false,
   remove_script_host : false,
   convert_urls : true
 });
</script>
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route($param['route'].'.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add ').ucwords($param['type']) }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route($param['route'].'.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
               <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
               <div class="col-sm-7 col-form-label text-left">
                <div class="togglebutton" >
                  <label id="status-ajax">
                    <input type="checkbox" id="status" class="status_input" name="status">
                    <span class="toggle"></span>
                  </label>

                  <span id="status-label" class="status-label" for="status">
                    Non Active
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <label for="" class="col-sm-2 col-form-label">{{__('Jenis News')}}</label>
              <div class="col-sm-7">
                <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="type_id" name="type_id">
                  <option value="">- Pilih Jenis Event -</option>

                  @foreach($news_types as $key => $value)
                  <option value="{{$value->id}}"> {{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div> 
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required />
                  @if ($errors->has('title'))
                  <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('harga') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Author') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('author_name') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('author_name') ? ' is-invalid' : '' }}" name="author_name" id="input-author_name" type="text" placeholder="{{ __('Author Name') }}" value="{{ old('author_name') }}" />
                  @if ($errors->has('author_name'))
                  <span id="harga-error" class="error text-danger" for="input-author_name">{{ $errors->first('harga') }}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Gambar') }}</label>
              <div class="col-sm-7">
                <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
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
              <label class="col-sm-2 col-form-label">{{ __('Image Desc') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('image_desc') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('image_desc') ? ' is-invalid' : '' }}" name="image_desc" id="input-image_desc" type="text" placeholder="{{ __('Image Desc') }}" value="{{ old('image_desc') }}"  />
                  @if ($errors->has('image_desc'))
                  <span id="harga-error" class="error text-danger" for="input-image_desc">{{ $errors->first('harga') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!-- created by-->

            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" id="tags" type="text"  />
                  @if ($errors->has('tags'))
                  <span id="tags-error" class="error text-danger" for="tags">{{ $errors->first('tags') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-12 col-form-label text-center">{{ __('Body') }}</label>
              <div class="col-sm-12">
                <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                  <textarea class="form-control tinymce-editor {{ $errors->has('body') ? ' is-invalid' : '' }}" name="news_body" id="input-body" type="text" placeholder="{{ __('Content...') }}" value="{{ old('body') }}" row="3"></textarea>
                  @if ($errors->has('body'))
                  <span id="harga-error" class="error text-danger" for="input-body">{{ $errors->first('body') }}</span>
                  @endif
                </div>
              </div>
            </div>

            <!-- tgl versi promo diinput manual --> <!-- versi promo -->

          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">{{ __('Add ').ucwords($param['type']) }}</button>
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
<script type="text/javascript">
  $(document).on("change","#status-ajax input",function(){
    var status = this.checked;
    
    var id = $(this).val();
    
    if(status == true){
      $('.status-label').html("Active");
    }else if(status == false){
      $('.status-label').html("Non Active");
    }
  });
  var tags = [
  @foreach ($tags as $tag)
  {tag: "{{$tag}}" },
  @endforeach
  ];
  $( document ).ready(function() {
    $('#tags').selectize({
      delimiter: ',',
      persist: false,
      valueField: 'tag',
      labelField: 'tag',
      searchField: 'tag',
      options: tags,
      create: function(input) {
        return {
          tag: input
        }
      }
    });
  });


/*   $(document).ready(function() {
       $('.summernote-wrapper').summernote({
          height: 500,
          toolbar:[
            ['height':['height']]
          ]
     });
  });
  $('.summernote-wrapper').summernote({
    height:500,
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear','style']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['fontname',['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['insert', ['link', 'picture', 'video']],
    ['table', ['table']],
    ['height', ['height']]
  ],
  lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0']
});*/
</script>
@endpush
