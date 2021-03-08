@extends('layouts.app-auth', ['activePage' => 'briefings', 'titlePage' => __('briefing'),'activeMenu' => 'company-data'])
@push('head-js')
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvbriefinghx1/tinymce/5/tinymce.min.js"></script>
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
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
        <form method="post" action="{{route('admin-briefing.store')}}" enctype="multipart/form-data" autocomplete="on" class="form-horizontal" onsubmit="event.preventDefault();return validateMyForm(this);">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Briefing') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-briefing.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{__('Subject')}}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject">
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Attendees') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" id="attendees" name="attendees" class="form-control">
                    <div>
                      <input type="checkbox" id="all-attendees" name="all-attendees" onclick="check_all_employees(this)"> All Employees
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Tanggal / Waktu') }}</label>
                <div class="col-sm-7">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} " name="date" id="input-date" type="date" value="{{ old('date') }}" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group{{ $errors->has('time') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }} timepicker" name="time" id="input-time" value='{{date("H:i")}}' type="text" />
                      @if ($errors->has('time'))
                      <span id="time-error" class="error text-danger" for="input-time">{{ $errors->first('time') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group">
              <label for="" class="col-sm-2 col-form-label">{{__('Type')}}</label>
              <div class="col-sm-7">
                <div class="form-group">
                  <input type="text" name="type" id="type" class="form-control" placeholder="Type">
                </div>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-2 col-form-label">{{ __('announcement') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('announcement') ? ' has-danger' : '' }}">
                  <textarea name="announcement" id="announcement" class="form-control tinymce-editor"  rows="5"></textarea>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-2 col-form-label">{{ __('discussion') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('discussion') ? ' has-danger' : '' }}">
                 <textarea name="discussion" id="discussion" class="form-control tinymce-editor"  rows="5"></textarea>
               </div>
             </div>
           </div>
           <div class="row form-group">
            <label class="col-sm-2 col-form-label">{{ __('conclusion') }}</label>
            <div class="col-sm-7">
              <div class="form-group{{ $errors->has('conclusion') ? ' has-danger' : '' }}">
               <textarea name="conclusion" id="conclusion" class="form-control tinymce-editor"  rows="5"></textarea>
             </div>
           </div>
         </div>
         <div class="row form-group">
          <label for="" class="col-sm-2 col-form-label">{{__('Note Taker')}}</label>
          <div class="col-sm-7">
            <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="note_taker" name="note_taker">
              <option value="">- Pilih Karyawan -</option>
              @foreach($employees as $employee)
              <option value="{{$employee->ID_KARYAWAN}}">{{$employee->NAMA}}</option>
              @endforeach
            </select>
           </div>
        </div>


      </div>

      <div class="card-footer ml-auto mr-auto">
        <button type="submit" class="btn btn-primary">{{ __('Add briefing') }}</button>
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
function validateMyForm(el)
{
  el.submit();
  alert('This process takes time about 5 - 10 minutes to send and check if email has been sent to user one by one');
}

 var employees =  {!! json_encode($employees)!!};
 function check_all_employees(el){
  var $select = $('#attendees').selectize();
  var selectize = $select[0].selectize;
  if(el.checked == true){

    selectize.setValue(Object.keys(selectize.options));
  }else{
    selectize.clear();
  }
}
$('#attendees').selectize({
  delimiter: '|',
  persist: false,
  valueField: 'ID_KARYAWAN',
  labelField: 'NAMA',
  searchField: 'NAMA',
  options:employees,
  create: false,
});
$(function () {
  $('#input-time').datetimepicker({
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
