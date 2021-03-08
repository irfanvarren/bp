@extends('layouts.app-auth', ['activePage' => 'rules', 'titlePage' => __('Rule'),'activeMenu' => 'company-data'])
@push('head-js')
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: '#rule_preview',
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
  min_height:275
});


tinymce.init({
  selector: '#rule',
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
        <form method="post" action="{{route('admin-rule.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Rule') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-rule.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                <div class="col-sm-7">
                  <select class="selectpicker" required data-style="select-with-transition" id="category_id" name="category_id">
                    <option value="">- Pilih -</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Rule Preview') }}</label>
                <div class="col-sm-7">
                  <textarea class="tinymce-editor" id="rule_preview" name="rule_preview"></textarea>
                </div>
              </div>
              
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('rule') }}</label>
                <div class="col-sm-7">
                     <textarea class="tinymce-editor" id="rule" name="rule"></textarea>
                </div>
              </div>
              
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Rule') }}</button>
         
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
