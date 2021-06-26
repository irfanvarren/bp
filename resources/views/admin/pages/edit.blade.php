@extends('layouts.app-auth', ['activePage' => 'pages','activeMenu' => 'data-management', 'titlePage' => __('Pages')])
@push('head-js')
  <script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
  <script>
  tinymce.init({
    selector: '#content',
    menubar: 'file edit insert view format table tools help',
     plugins: "image autosave code media mediaembed hr image imagetools link lists pagebreak paste powerpaste table",
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
          <form method="post" action="{{route('pages.update',[$page->id,'division' => $division])}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Page') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('pages.show',$division) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-title" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$page->name) }}" required />
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>  
                  <div class="row mb-3">
                <label class="col-md-2 col-form-label">{{__('Type')}}</label>
                <div class="col-sm-7">
                 <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                    <select class="form-control col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="type_id" name="type_id">
                    <option value="" disabled="" selected="">- Select Type -</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}" {{$type->id == $page->type_id ? 'selected' : ''}}>{{$type->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-md-2 col-form-label">{{__('Sub Type')}}</label>
              <div class="col-sm-7">
               <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                  <select class="form-control col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="sub_type_id" name="sub_type_id">
                    <option value="" disabled="" selected="">- Select Sub Type -</option>
                      @foreach($subtypes as $subtype)
                    <option value="{{$subtype->id}}" {{$subtype->id == $page->sub_type_id ? 'selected' : ''}}>{{$subtype->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Link / Slug') }}</label>
                  <div class="col-sm-2 col-form-label">https://bestpartnereducation.com/</div>
                  <div class="col-sm-7">
                    
                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Slug') }}" value="{{ old('slug',$page->slug) }}" required />
                      @if ($errors->has('slug'))
                        <span id="slug-error" class="error text-danger" for="input-slug">{{ $errors->first('slug') }}</span>
                      @endif
                    </div>
                  </div>
                </div>



                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Content') }}</label>
                  <div class="col-sm-9 col-form-label text-left">
                    <div class="col-sm-12">
                    <a href="{{url('admin/cms/pages/'.$page->id.'/page-builder')}}">Page Builder</a>
                    </div>
                    <!--
                    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                      <textarea class="{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="content" type="text"value="{{ old('content') }}" row="3" required>{{$page->content}}</textarea>
                      @if ($errors->has('content'))
                        <span id="harga-error" class="error text-danger" for="input-content">{{ $errors->first('content') }}</span>
                      @endif
                    </div>-->
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Edit Page') }}</button>
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

 var token = $("input[name='_token']").val();
  $('#type_id').on('change',function(){
    var type_id = $(this).val();
   $.ajax({
    url: '{{route("page-type-ajax")}}',
    method: 'POST',
    data: {
      _token: token,
      type_id:type_id
    },
    success: function(data) {
      data = JSON.parse(data);
      let dropdown = $('#sub_type_id');

      dropdown.empty();

    dropdown.append('<option selected="true" disabled>Select Sub Type</option>');
    dropdown.prop('selectedIndex', 0);
    // Populate dropdown with list of provinces
      $.each(data, function (key, value) {
        dropdown.append($('<option></option>').attr('value', value.id).text(value.name));
      })
    },
    error: function() {
      alert('error...');
    },complete: function(){
      $('.loading-wrapper').hide();
    }
  });
 });
  /*const target = document.getElementById('input-slug');
target.addEventListener('paste', (e) => {
 e.preventDefault();
                    var text;
                    var clp = (e.originalEvent || e).clipboardData;
                    if (clp === undefined || clp === null) {
                        text = window.clipboardData.getData("text") || "";
                        if (text !== "") {
                            text = text.replace(/<[^>]*>/g, "");
                            if (window.getSelection) {
                                var newNode = document.createElement("span");
                                newNode.innerHTML = text;
                                window.getSelection().getRangeAt(0).insertNode(newNode);
                            } else {
                                document.selection.createRange().pasteHTML(text);
                            }
                        }
                    } else {
                        text = clp.getData('text/plain') || "";
                        alert(text);
                        if (text !== "") {
                          // text = text.replace(/https?:\/\/bestpartnereducation.com\/+/, "");
                            document.execCommand('insertText', false, text);

                        }
                    }
});*/
</script>
@endpush