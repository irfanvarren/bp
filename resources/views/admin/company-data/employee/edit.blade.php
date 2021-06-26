@extends('layouts.app-auth', ['activePage' => 'employees', 'titlePage' => __('Karyawan'),'activeMenu' => 'company-data'])
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
  min_height:500
});
</script>
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin-employee.update',$employee)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Employee') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row"> 
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-employee.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('ID Karyawan') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('id_karyawan') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="link" value="{{$employee->ID_KARYAWAN}}" disabled="">
                    @if ($errors->has('id_karyawan'))
                    <span id="harga-error" class="error text-danger" for="input-id_karyawan">{{ $errors->first('id_karyawan') }}</span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nama') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="nama" value="{{$employee->NAMA}}" disabled>
                    @if ($errors->has('nama'))
                    <span id="harga-error" class="error link-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                    @endif
                  </div>
                </div>
              </div>

                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Preview Deskripsi Pekerjaan') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('preview') ? ' has-danger' : '' }}">
                    <textarea name="preview" class="tinymce-editor form-control" id="preview" rows="10">{!!$employee->preview!!}</textarea>
                    @if ($errors->has('preview'))
                    <span id="harga-error" class="error link-danger" for="input-preview">{{ $errors->first('preview') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Deskripsi Pekerjaan') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                    <textarea name="deskripsi" class="tinymce-editor form-control" id="deskripsi" rows="10">{!!$employee->deskripsi!!}</textarea>
                    @if ($errors->has('deskripsi'))
                    <span id="harga-error" class="error link-danger" for="input-deskripsi">{{ $errors->first('deskripsi') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Edit Employee') }}</button>
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
