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
        <form method="post" action="{{route('admin-berdayakan-sk.update',['sk' => urlencode(urlencode($sk[0]->no))])}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit SK') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-berdayakan-sk.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Jenis') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('kode_jenis') ? ' has-danger' : '' }}">
                    <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="kode_jenis" name="kode_jenis">
                      <option value="" selected>- Pilih Jenis -</option>

                      @foreach($sk_types as $key => $value)
                      <option value="{{$value->kode}}" {{$value->kode == $sk[0]->kode_jenis ? 'selected' : ''}}> {{$value->jenis}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('No. SK') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('no') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="no" value="{{$sk[0]->no}}">
                    @if ($errors->has('no'))
                    <span id="harga-error" class="error no-danger" for="input-no">{{ $errors->first('no') }}</span>
                    @endif
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
                    <input type="text" class="form-control" name="judul" value="{{$sk[0]->judul}}">
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
                   <textarea name="isi" id="isi" class="form-control tinymce-editor"  rows="5">{{$sk[0]->isi}}</textarea>
                 </div>
               </div>
             </div>

             <div class="row" style="padding-bottom: 10px;position: relative;margin: 8px 0 0;">
              <label class="col-sm-2 col-form-label">{{ __('file') }}</label>
              <div class="col-sm-7">
                <input type="file" class="form-control d-none" name="upload_file[]" id="upload_file" placeholder="Multiple Files" multiple> <div style="width:250px;border: 1px solid #d8d8d8;float:left;margin:0.3125rem 0;padding:0.03rem 0.5rem;line-height: 27px;white-space: nowrap;font-size:13px;overflow: hidden;text-overflow: ellipsis;" id="file-value">{!!$sk[0]->file != "" ? count(explode("|",$sk[0]->file))." File Selected" : "&emsp;"!!}</div> <button class="btn btn-sm btn-primary float-left" type="button" id="file-button">Select File</button>
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
                      <input class="form-control{{ $errors->has('tgl_mulai') ? ' is-invalid' : '' }}" name="tgl_mulai" id="input-tgl_mulai" type="date" value="{{ old('tgl_mulai',$sk[0]->tgl_mulai) }}"  />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('tgl_berakhir') ? ' has-danger' : '' }}">
                     <input class="form-control{{ $errors->has('tgl_berakhir') ? ' is-invalid' : '' }}" name="tgl_berakhir" id="input-tgl_berakhir" type="date" value="{{ old('tgl_berakhir',$sk[0]->tgl_berakhir) }}" />
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
                  <input type="checkbox" id="status" class="status_input" name="status"  @if($sk[0]->status) checked  @else @endif>
                  <span class="toggle"></span>
                </label>

                <span id="status-label" class="status-label" for="status">
                  @if($sk[0]->status) Active @else Non Active @endif
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer ml-auto mr-auto">
          <button type="submit" class="btn btn-primary">{{ __('Edit SK') }}</button>
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
 var karyawan = {!!json_encode($karyawan)!!};
 $('#file-button').click(function () {
  $("#upload_file").trigger('click');
});
 $("#upload_file").change(function () {
  $('#file-value').text(this.files.length+" File Selected")
});
 $('#id_karyawan').selectize({
  delimiter: '|',
  persist: false,
  valueField: 'ID_KARYAWAN',
  labelField: 'NAMA',
  searchField: 'NAMA',
  options:karyawan,
  items:{!!json_encode($selected_employees)!!},
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
previous_index = "";
function select_icon(el,index,value){
  if(previous_index != ""){
    var previousElement = $('.icon-preview')[previous_index];
    $(previousElement).removeClass('active');
  }
  var thisElement = $('.icon-preview')[index];
  $(thisElement).addClass('active');
  previous_index = index;
  $('#icons').val(value);
}


$(document).ready(function(){
  /*var select = document.createElement("SELECT");
  select.setAttribute("id", "icons");
  select.setAttribute("name", "icons");*/


  
  //var option = document.createElement("option");
  //option.text = '<i class="material-icons">'+item.key+'</i>' ;
  //select.add(option);
  
  //$('#select-icons').html(select);
});
</script>
@endpush