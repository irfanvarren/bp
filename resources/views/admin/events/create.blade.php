@extends('layouts.app-auth', ['activePage' => 'events','activeMenu' => 'data-management', 'titlePage' => __('Events')])
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
<style>
    .form-control:disabled{
        color: #dedddc !important;
    }
    #test-module-wrapper{
        display:none;
    }
</style>    
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" id="myForm" action="{{route('admin-events.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Events') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('admin-events.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nama Events') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{ old('title') }}" required />
                                        @if ($errors->has('nama'))
                                        <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('nama') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="" class="col-sm-2 col-form-label">{{__('Jenis Event')}}</label>
                                <div class="col-sm-7">
                                    <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="event_type_id" name="event_type_id">
                                        <option value="">- Pilih Jenis Event -</option>

                                        @foreach($event_types as $key => $value)
                                        <option value="{{$value->id}}"> {{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tanggal Mulai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('tgl_mulai') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('tgl_mulai') ? ' is-invalid' : '' }}" name="tgl_mulai" id="input-tgl_mulai" type="date"/>
                                        @if ($errors->has('nama'))
                                        <span id="tgl_mulai-error" class="error text-danger" for="input-tgl_mulai">{{ $errors->first('tgl_mulai') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="full_day_event" id="full_day_event"> full day event ?
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="test-module-wrapper">
                                <div class="row">

                                    <label class="col-sm-2 col-form-label">{{ __('Test Module') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('test_module') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('test_module') ? ' is-invalid' : '' }}" name="test_module" placeholder="Test Module" id="input-test_module" type="text"/>
                                            @if ($errors->has('test_module'))
                                            <span id="test_module-error" class="error text-danger" for="input-test_module">{{ $errors->first('test_module') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tanggal Selesai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('tgl_selesai') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('tgl_selesai') ? ' is-invalid' : '' }}" name="tgl_selesai" id="input-tgl_selesai" type="date"/>
                                        @if ($errors->has('tgl_selesai'))
                                        <span id="tgl_selesai-error" class="error text-danger" for="input-tgl_selesai">{{ $errors->first('tgl_selesai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Jam Mulai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('jam_mulai') ? ' has-danger' : '' }}">
                                        <input class="form-control timepicker {{ $errors->has('jam_mulai') ? ' is-invalid' : '' }}" name="jam_mulai" id="input-jam_mulai" type="text" value="00:00" placeholder="H:mm"/>
                                        @if ($errors->has('jam_mulai'))
                                        <span id="jam_mulai-error" class="error text-danger" for="input-jam_mulai">{{ $errors->first('jam_mulai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Jam Selesai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('jam_selesai') ? ' has-danger' : '' }}">

                                        <input class="form-control timepicker {{ $errors->has('jam_selesai') ? ' is-invalid' : '' }}" name="jam_selesai" id="input-jam_selesai" type="text" value="00:00" placeholder="H:mm"/>
                                        @if ($errors->has('jam_selesai'))
                                        <span id="jam_selesai-error" class="error text-danger" for="input-jam_selesai">{{ $errors->first('jam_selesai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="webinars-wrapper" style="display:none;">
                                <div class="col-sm-12">
                                    <hr>
                                </div>
                                <div class="col-sm-12">
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
                  <input class="form-control{{ $errors->has('image_desc') ? ' is-invalid' : '' }}" name="image_desc" id="input-image_desc" type="text" placeholder="{{ __('Deskripsi Gambar') }}" value="{{ old('image_desc') }}" />
                  @if ($errors->has('image_desc'))
                  <span id="harga-error" class="error text-danger" for="input-image_desc">{{ $errors->first('image_desc') }}</span>
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
     <label class="col-sm-2 col-form-label">{{ __('Body') }}</label>
     <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
            <textarea class="form-control tinymce-editor {{ $errors->has('body') ? ' is-invalid' : '' }}" name="news_body" id="input-body" type="text" placeholder="{{ __('Content...') }}" value="{{ old('body') }}" row="3"></textarea>
            @if ($errors->has('body'))
            <span id="harga-error" class="error text-danger" for="input-body">{{ $errors->first('body') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-12">
      <div style="float:left;">
       <input class="form-control{{ $errors->has('version_date') ? ' is-invalid' : '' }}" name="version_date" id="input-version_date" type="date" placeholder="{{ __('Version Date') }}" value="{{ old('version_date') }}" />
   </div>
   <div style="float:right;">
       <input class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" name="version" id="input-version" type="text" placeholder="{{ __('Version') }}" value="{{ old('version') }}" />
   </div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
<div class="card-footer ml-auto mr-auto">
    <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Add Events') }}</button>
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
<script>
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

  document.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    $('#submit-btn').click();
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

  $('#event_type_id').on('change',function(){
    if($(this).val() == 2){
        $('#test-module-wrapper').show();    
    }else if($(this).val() == 6){
        $('#webinars-wrapper').show();
    }else{
        $('#test-module-wrapper').hide();    
        $('#webinars-wrapper').hide();
    }
});

  $('#full_day_event').on('change',function(){
    if($(this).prop("checked") == true){
        $('#input-tgl_selesai').prop("disabled",true);
        $('#input-jam_mulai').prop("disabled",true);
        $('#input-jam_selesai').prop("disabled",true);

    }else{
        $('#input-tgl_selesai').prop("disabled",false);
        $('#input-jam_mulai').prop("disabled",false);
        $('#input-jam_selesai').prop("disabled",false);
    }
});

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
</script>
@endpush
