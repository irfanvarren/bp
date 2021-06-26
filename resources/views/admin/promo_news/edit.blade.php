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
 @php
        /*  if($news->body != ""){
 $dom = new \domdocument();
      $dom->loadHtml($news->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
      LIBXML_NOWARNING  );
      $images = $dom->getelementsbytagname('img');
      if($images){
        foreach($images as $k => $img){
          $data = $img->getattribute('src');
        $img->removeattribute('src');
          $img->setattribute('src', "data:image/png;base64,".base64_encode(file_get_contents($data)));
          }
          }
          $news_body = $dom->savehtml();
          }*/
          $news_body = $news->body;
      @endphp
        <form method="post" action="{{ route($param['route'].'.update',$id)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <input type="hidden" name="slug" value="{{$news->slug}}">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit '.ucwords($param['type'])) }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{ route($param['route'].'.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
               <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
               <div class="col-sm-7 col-form-label text-left">
                <div class="togglebutton" >
                  <label id="status-ajax">
                    <input type="checkbox" id="status" class="status_input" @if($news->status) checked  @else @endif  name="status">
                    <span class="toggle"></span>
                  </label>

                  <span id="status-label" class="status-label" for="status">
                    @if($news->status) Active @else Non Active @endif</span>
                  </div>
                </div>
              </div>
                <div class="row">
              <label for="" class="col-sm-2 col-form-label">{{__('Jenis Promo')}}</label>
              <div class="col-sm-7">
                <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="type_id" name="type_id">
                  <option value="">- Pilih Jenis Promo -</option>

                  @foreach($promo_types as $key => $value)
                  <option value="{{$value->id}}" {{$news->type_id == $value->id ? "selected" : ""}}> {{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
              <div class="row" id="jenjang-beasiswa-wrapper" style="display: @if($news->type_id == '2') flex @else none @endif;">
              <label for="" class="col-sm-2 col-form-label">{{__('Jenjang Beasiswa')}}</label>
              <div class="col-sm-7 col-form-label text-left pl-3">
                @foreach($jenjang_beasiswa as $beasiswa)
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="jenjang[]" value="{{$beasiswa->name}}" {{$beasiswa->tagged == "true" ? "checked" : "" }}> {{$beasiswa->name}}
                    </label>   
                </div>
                @endforeach
              </div>
            </div>
            
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Durasi') }}</label>
                <div class="col-sm-7">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                        <div class="row">
                          <div class="col-sm-6">
                            <input class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="input-start_date" type="date" value="{{ old('start_date',date('Y-m-d',strtotime($news->start_date)))}}" />
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control timepicker" name="start_time" id="start_time" value="{{ old('start_time',date('H:i',strtotime($news->start_date))) }}" placeholder="H:mm">
                          </div>
                        </div>



                        <div style="font-size:12px">Tanggal Mulai / Open Registration</div>
                        @if ($errors->has('title'))
                        <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                      </div>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                        <div class="row">
                          <div class="col-sm-6">
                            <input class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="input-end_date" type="date" value="{{ old('end_date',date('Y-m-d',strtotime($news->end_date))) }}" />

                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control timepicker" name="end_time" id="end_time" value="{{ old('end_time',date('H:i',strtotime($news->end_date))) }}" placeholder="H:mm">
                          </div>
                        </div>



                        <div style="font-size:12px">Tanggal Selesai / Deadline</div>
                        @if ($errors->has('title'))
                        <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('nama_produk',$news->title) }}" required="true" aria-required="true"/>
                    @if ($errors->has('title'))
                    <span id="name-error" class="error text-danger" for="input-title">{{ $errors->first('title ') }}</span>
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
                <label class="col-sm-2 col-form-label">{{ __('Deskripsi Gambar') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('image_desc') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('image_desc') ? ' is-invalid' : '' }}" name="image_desc" id="input-image_desc" type="text" placeholder="{{ __('Deskripsi Gambar') }}" value="{{ old('image_desc',$news->image_desc) }}" />
                    @if ($errors->has('image_desc'))
                    <span id="harga-error" class="error text-danger" for="input-image_desc">{{ $errors->first('image_desc') }}</span>
                    @endif
                  </div>
                </div>
              </div>
                <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"  name="tags" id="tags" data-selectize-value='[{"AuthorId":1,"AuthorName":"Test"},{"AuthorId":2,"AuthorName":"Test2"}]' type="text"  />
                  @if ($errors->has('tags'))
                  <span id="tags-error" class="error text-danger" for="tags">{{ $errors->first('tags') }}</span>
                  @endif
                </div>
              </div>
            </div>.
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Body') }}</label>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                        <textarea class="form-control tinymce-editor{{ $errors->has('body') ? ' is-invalid' : '' }}" name="news_body" id="input-body" type="text" placeholder="{{ __('News...') }}" row="3">{{$news_body}}</textarea>
                        @if ($errors->has('body'))
                        <span id="harga-error" class="error text-danger" for="input-body">{{ $errors->first('body') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div style="float:left;">
                        <input class="form-control{{ $errors->has('version_date') ? ' is-invalid' : '' }}" name="version_date" id="input-version_date" type="date" placeholder="{{ __('Version Date') }}" value="{{ old('version_date',$news->version_date) }}" />
                     </div>
                     <div style="float:right;">
                       <input class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" name="version" id="input-version" type="text" placeholder="{{ __('Version') }}" value="{{ old('version',$news->version) }}" />
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           


          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
@push('js')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">

   $('#type_id').on('change',function(){
     if($(this).val() == 2){
        $('#jenjang-beasiswa-wrapper').show();
       }else{
        var elements = document.getElementsByName("jenjang[]");
        $.each(elements,function(k,v){
          v.checked = false;
        });
        $('#jenjang-beasiswa-wrapper').hide();
      }

    });

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

  {tag : "{{$tag}}" },
  @endforeach
  ];
  $( document ).ready(function() {
    $('#tags').selectize({
      delimiter: ',',
      persist: false,
      valueField: 'tag',
      labelField: 'tag',
      searchField: 'tag',
      items:{!!json_encode($this_tags)!!},
      options: tags,
      create: function(input) {
       return {
        tag: input
      }
    },



  });
  });
  $(document).ready(function(){
    $('.fileinput-preview').append("<img src='{{Storage::disk('news')->url($news->image)}}'></img>");
  });


/*   $(document).ready(function() {
       $('.summernote-wrapper').summernote({
          height: 500,
          toolbar:[
            ['height':['height']]
          ]
     });
   });*/
   $('.summernote-wrapper').summernote({
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
  });
   var content = {!! json_encode($news->body) !!};
          //set the content to summernote using `code` attribute.
          $('.summernote-wrapper').summernote('code', content);
        </script>
        @endpush
