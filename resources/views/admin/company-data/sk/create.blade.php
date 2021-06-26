@extends('layouts.app-auth', ['activePage' => 'sk', 'titlePage' => __('SK'),'activeMenu' => 'company-data'])
@push('head-js')
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
  .selectize-input input{
    width:80% !important;
    padding:0 5px;
    border:none;
  }
</style>
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
<style type="text/css">
  .icon-preview{
    display: block;float:left;width: 80px;text-align:center;margin: 12px;padding:8px;
  }
  .icon-preview:hover{
    cursor:pointer;
    background:#3f75cc;
    color:white;
  }
  .icon-preview.active{
    background:#3f75cc; 
    color:white;
  }
  .icon-preview i{
    font-size:38px;width: 38px;line-height:38px;
  }
  .icon-preview div{
    font-size:14px;
    white-space: nowrap;overflow: hidden;text-overflow: ellipsis;
  }
</style>
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin-sk.store')}}" enctype="multipart/form-data" autocomplete="ona" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add SK') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-sk.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Jenis') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('kode_jenis') ? ' has-danger' : '' }}">
                    <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="kode_jenis" name="kode_jenis">
                      <option value="" selected>- Pilih Jenis -</option>

                      @foreach($sk_types as $key => $value)
                      <option value="{{$value->kode}}"> {{$value->jenis}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Karyawan') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('id_karyawan') ? ' has-danger' : '' }}">
                    <input type="text" name="id_karyawan" id="id_karyawan" class="form-control">
                    <div>
                      <input type="checkbox" id="all-attendees" name="all-attendees" onclick="check_all_employees(this)"> All Employees
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Judul') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="judul">
                    @if ($errors->has('judul'))
                    <span id="harga-error" class="error judul-danger" for="input-judul">{{ $errors->first('judul') }}</span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('isi') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('isi') ? ' has-danger' : '' }}">
                   <textarea name="isi" id="isi" class="form-control tinymce-editor"  rows="5"></textarea>
                 </div>
               </div>
             </div>
             <div class="row" style="padding-bottom: 10px;position: relative;margin: 8px 0 0;">
              <label class="col-sm-2 col-form-label">{{ __('file') }}</label>
              <div class="col-sm-7">
                    <input type="file" class="form-control" name="upload_file[]" placeholder="Multiple Files" multiple>

                @if ($errors->has('upload_file'))
                <span id="harga-error" class="error upload_file-danger" for="input-upload_file">{{ $errors->first('upload_file') }}</span>
                @endif
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Durasi') }}</label>
              <div class="col-sm-7">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('tgl_mulai') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tgl_mulai') ? ' is-invalid' : '' }}" name="tgl_mulai" id="input-tgl_mulai" type="date" value="{{ old('tgl_mulai') }}" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('tgl_berakhir') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('tgl_berakhir') ? ' is-invalid' : '' }}" name="tgl_berakhir" id="input-tgl_berakhir" type="date" value="{{ old('tgl_berakhir') }}" />
                   </div>

                 </div>
               </div>
             </div>
           </div>

           <div class="row form-group">
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
        </div>

        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-primary">{{ __('Add SK') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>

@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>

<script type="text/javascript">
 $(document).ready(function(){
  var inputFiles  = document.getElementsByClassName('form-file-upload');
  for(var i = 0; i < inputFiles.length; i++){
    inputFiles[i].addEventListener('click',function(){
      $(this).find('.inputFileHidden')[0].click();

    });
  }
});
 var karyawan = {!!json_encode($karyawan)!!};
 $('#id_karyawan').selectize({
  delimiter: '|',
  persist: false,
  valueField: 'ID_KARYAWAN',
  labelField: 'NAMA',
  searchField: 'NAMA',
  options:karyawan,
  create: false,
});
 function check_all_employees(el){
  var $select = $('#id_karyawan').selectize();
  var selectize = $select[0].selectize;
  if(el.checked == true){
    selectize.setValue(Object.keys(selectize.options));
  }else{
    selectize.clear();
  }
}
$(function () {
  $('.timepicker').datetimepicker({
      //          format: 'H:mm',    // use this format if you want the 24hours timepicker
      format: 'H:mm', //use this format if you want the 12hours timpiecker with AM/PM toggle
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'

      },
     // defaultTime : '00:00'
   });
});
</script>
@endpush
