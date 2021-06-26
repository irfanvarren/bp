@extends('layouts.app-auth', ['activePage' => 'enquiry','activeMenu' => 'data-management', 'titlePage' => __('Enquiry')])
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
<style type="text/css">
  .myTable{
    margin-bottom:15px;
  }
  .myTable tr td{
    padding:8px 30px 8px 0;
  }
</style>
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <form method="post" action="{{url('admin/enquiry/'.$enquiry_details->id.'/details')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <input type="hidden" name="complaint_code" value="{{$enquiry_details->complaint_code}}">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add ') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
                 <div class="row mb-4">
                <div class="col-md-12 text-right">
                  <a href="{{url('admin/enquiry')}}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div><strong>Detail Question</strong></div>
                  <table class="myTable">
                     <tr>
                     <td>Name : </td> <td>{{$enquiry_details->name}}</td> <td>Branch : </td> <td>{{$enquiry_details->branch_id}}</td>  <td>Type : </td> <td>{{$enquiry_details->type}}</td> 
                    </tr>
                    <tr>
                      <td>Occupation : </td> <td>{{$enquiry_details->occupation}}</td>  <td>File</td> 
                      <td>
                        @php
                        $arr_files = explode('|',$enquiry_details->files);

                        @endphp
                        @foreach($arr_files as $key => $file)
                        {{$key != 0 ? '|' : ''}} <a href="{{asset($file)}}" target="_blank" download> <strong>File-{{$key+=1}}</strong></a>
                        @endforeach
                      </td> <td>Subject : </td> <td>{{$enquiry_details->subject}}</td>
                    </tr>
                    <tr>
                      <td>Email :</td> <td>{{$enquiry_details->email}}</td><td>Status</td> <td>{{$enquiry_details->status == 1? "Solved" : "Unsolved"}}</td><td>Question : </td> <td>{{$enquiry_details->question}}</td>
                    </tr>
                    <tr>
                      <td>No. Telepon</td> <td>{{$enquiry_details->no_telepon}}</td>
                      
                    </tr>

                  </table>
                  <table class="table table-bordered">
                      <tr>
                        <th>No.</th><th>Solution</th><th>Status</th>
                      </tr>
                      @if($enquiry_details->details->count())
                      @php
                      $no = 1;
                      @endphp
                      @foreach($enquiry_details->details as $detail)
                      <tr>
                        <td>{{$no}}</td><td>{!!$detail->solution!!}</td><td>{{$detail->status == 1? "Accepted" : "Not Accepted"}}</td>
                      </tr>
                      @php
                      $no++;
                      @endphp
                      @endforeach

                      @else
                      <tr>
                        <td colspan="5">No Response Yet...</td>
                      </tr>
                      @endif
                  </table>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label text-center">{{ __('Solution') }}</label>
                <div class="col-sm-9">
                  <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                    <textarea class="form-control tinymce-editor {{ $errors->has('body') ? ' is-invalid' : '' }}" name="solution" id="input-body" type="text" placeholder="{{ __('Content...') }}" value="{{ old('body') }}" row="3"></textarea>
                    @if ($errors->has('body'))
                    <span id="harga-error" class="error text-danger" for="input-body">{{ $errors->first('body') }}</span>
                    @endif
                  </div>
                </div>
              </div>

              <!-- tgl versi promo diinput manual --> <!-- versi promo -->

            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Submit Response') }}</button>
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
  $(document).on("change","#status-ajax input",function(){
    var status = this.checked;

    var id = $(this).val();

    if(status == true){
      $('.status-label').html("Active");
    }else if(status == false){
      $('.status-label').html("Non Active");
    }
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
