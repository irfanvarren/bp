@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'dashboard','activeMenu' => '', 'titlePage' => __('Dashboard')])
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
 toolbar: 'undo redo formatselect fontselect fontsizeselect bold italic underline forecolor backcolor | permanentpen link image media pageembed alignleft aligncenter alignright alignjustify numlist bullist outdent indent removeformat',
 //toolbar: 'undo redo restoredraft | formatselect |  fontselect fontsizeselect bold italic underline forecolor backcolor |' +
 //'alignleft aligncenter alignright alignjustify | bullist numlist | link image media table | outdent indent | removeformat pagebreak | help',
 powerpaste_word_import: "clean",
 powerpaste_html_import: "merge",
 paste_data_images: true,
 min_height:350
});
</script>
<style>
  .question-type{
    display:none;
    padding:15px;
  }
  .custom-file-input:lang(en)~.custom-file-label::after {
    border-left:1px solid #d6d6d6;
  }
  .custom-file-label {
    border: 1px solid #d6d6d6 !important;
    border-radius: 30px !important;
  }
  .back-to-top{
    position: fixed;
    bottom:30px;
    right:30px;
    z-index: 15;

  }
  .back-to-top:hover{
    cursor: pointer;
  }
  .loading-wrapper{
    width:100vw;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    z-index:9999999;
    background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
    display:block;
    margin:0 auto;
    width:500px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
  }
  .colon{
    float:right;
  }

  /*checkbox*/
  /* The container */
  .checkbox-container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin: 12px 0;
    cursor: pointer;
    color:#333;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default checkbox */
  .checkbox-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
  }

  /* On mouse-over, add a grey background color */
  .checkbox-container:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the checkbox is checked, add a blue background */
  .checkbox-container input:checked ~ .checkmark {
    background-color: #2196F3;
  }

  /* Create the checkmark/indicator (hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the checkmark when checked */
  .checkbox-container input:checked ~ .checkmark:after {
    display: block;
  }

  /* Style the checkmark/indicator */
  .checkbox-container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }
  .multiple_questions-lists:first-child{
    border-top:1px solid black;
    margin-top:15px;
  }
  .multiple_questions-lists{
    border-bottom:1px solid black;padding:8px;
  }
  .save-answer-btn{
    display:none;position:fixed;left:50%;bottom:40px;margin-left:-100px;width:200px;text-align:center;padding:12px 0;
  }
</style>

@endpush

@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>


<div class="modal fade" id="multipleQuestionsModal" tabindex="-1" role="dialog" aria-labelledby="multipleQuestionsModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="margin-top:0px;max-width:1200px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Questions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <input type="hidden" name="answer_question_id" id="answer_question_id">
      </div>
      <div class="modal-body">
        <div class="row" style="border-top:1px solid black;margin-top:15px;padding-top:15px;" id="multiple_question-output">
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label text-left">{{__('Number')}}</label>
          <div class="col-sm-7">
            <input class="form-control{{ $errors->has('multiple-number') ? ' is-invalid' : '' }}" name="multiple-number" id="multiple-number" type="text"  />
            @if ($errors->has('multiple-number'))
            <span id="multiple-number-error" class="error text-danger" for="multiple-number"> {{ $errors->first('multiple-number') }}</span>
            @endif
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label text-left">{{ __('Question') }}</label>
          <div class="col-sm-7" >
           <div class="form-group">
            <input type="checkbox" name="empty_multiple_question" id="empty_multiple_question"> Empty Question ?
          </div>
          <div class="form-group{{ $errors->has('multiple-question') ? ' has-danger' : '' }}" id="multiple-questions-input-wrapper">
            <textarea class="form-control multiple-tinymce-editor{{ $errors->has('multiple-question') ? ' is-invalid' : '' }}" name="multiple-question" id="multiple-question" type="text" placeholder="{{ __('Question') }}" value="{{ old('multiple-question') }}" row="3" required></textarea>
          </div>
          <input type="hidden" name="temp_multiple_question_id" id="temp_multiple_question_id">
        </div>
      </div>

      <div class="row mb-3">
       <label class="col-sm-2 col-form-label text-left">{{ __('Option Type') }}</label>
       <div class="col-sm-4">
         <select class="form-control" name="multiple_option_type" id="multiple_option_type" required>
          <option value="">- Select Option Type - </option>
          <option value="options">Options</option>
          <option value="text">Text</option>
        </select>
      </div>

    </div>
    <div class="row" id="multiple-option-type-options" style="display: none;">
     <label class="col-sm-2 col-form-label text-left">{{ __('Options') }}</label>
     <div class="col-sm-7">
      <div class=" form-group">
       <input  class="form-control{{ $errors->has('multiple_options') ? ' is-invalid' : '' }}" name="multiple_options" id="multiple_options" type="text"  />
       @if ($errors->has('multiple_options'))
       <span id="multiple_options-error" class="error text-danger" for="multiple_options">{{ $errors->first('multiple_options') }}</span>
       @endif  
     </div>
   </div>


 </div>
 <div class="row" id="multiple-option-type-text" style="display: none;">
  <label class="col-sm-2 col-form-label text-left">{{ __('Answers') }}</label>
  <div class="col-sm-7">
    <div class="form-group">
      <input class="form-control{{ $errors->has('multiple_answer') ? ' is-invalid' : '' }}" name="multiple_answer" id="multiple_answers" type="text"  />
      @if ($errors->has('multiple_answers'))
      <span id="multiple_answers-error" class="error text-danger" for="multiple_answers">{{ $errors->first('multiple_answers') }}</span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label text-left">{{ __('Explanation') }}</label>
  <div class="col-sm-7" >
    <div class="form-group{{ $errors->has('multiple-explanation') ? ' has-danger' : '' }}" id="multiple-explanation">
      <textarea class="form-control multiple-tinymce-editor{{ $errors->has('multiple-explanation') ? ' is-invalid' : '' }}" name="multiple-explanation" id="multiple-explanation" type="text" placeholder="{{ __('Explanation') }}" value="{{ old('multiple-explanation') }}" row="3" required></textarea>
    </div>
  </div>
</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" id="multiple_question_input-btn" onclick="add_temp_multiple_question()">Save Answers</button>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="margin-top:0px;max-width:1000px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <input type="hidden" name="answer_question_id" id="answer_question_id">
      </div>
      <div class="modal-body">
        <div class="edit-answers-wrapper options">
          <div class="row">
            <div class="col-md-6">
              <h4>Options</h4>
              <div id="answer-output">

              </div>
            </div>
            <div class="col-md-6">
              <h4>Explanation</h4>
              <textarea class="form-control tinymce-editor explanation-editor" name="explanation" id="explanation" type="text" placeholder="{{ __('Explanation') }}" row="3"></textarea>
            </div>
          </div>
        </div>
        <div class="edit-answers-wrapper record-audio">
          <div class="row">
            <div class="col-md-12">
              <h4>Explanation</h4>
              <input type="file" name="">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="save_answer()">Save Answers</button>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="back-to-top">
    <i class="material-icons" onclick="gototop()" style="font-size:50px;background: linear-gradient(60deg, #ab47bc, #8e24aa); border-radius: 50%;color:white;">arrow_drop_up</i>
  </div>
  <div class="container-fluid">
    <div>
      <div class="row">
        <div class="card">
          <div class="card-body">
            @php
            $url = url("tutor-admin/create-structure?test_id=").$test_id."&module_id=".$module_id."&package_id=".$package_id 
            @endphp
            <a href="{{url($url)}}">Back</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <h3> <strong> {{$name}} </strong></h3>
      </div>
    </div>
    <div class="row">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">{{ __('Add Question') }}</h4>   
        </div>
        <div class="card-body">

          @csrf
          <div class="row">
            <div class="col-md-4" style="padding:15px;">
              <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" name="question_type" id="question_type">
                <option value="">Choose Question Types</option>
                <option value="single">Single Question (1 Question, 1 Answer)</option>
                <option value="multiple">Multiple Questions (2 or More Questions with 1 or Many Answers)</option>
                <option value="other">Other (Introduction / Outro / Explanation)</option>
              </select>
            </div>
          </div>

          <div class="row">

            <div class="col-md-12 single-question-wrapper question-type">
              <form action="" class="col-md-12" id="single-form">
                <input type="hidden" id="input-question_id" name="question_id">
                <input type="hidden" id="input-test-structure_id" name="input-test-structure_id">
                <div class="row">
                  <h4>Single Question</h4>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label text-left">{{ __('Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Number') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" id="input-number" type="text" placeholder="{{ __('Number') }}" value="{{ old('number') }}" />
                      @if ($errors->has('number'))
                      <span id="harga-error" class="error text-danger" for="input-number">{{ $errors->first('number') }}</span>
                      @endif
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <label class="col-sm-2 col-form-label text-left">{{ __('Instruction') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('instruction') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('instruction') ? ' is-invalid' : '' }}" name="instruction" id="input-instruction" type="text" placeholder="{{ __('Instruction') }}" value="{{ old('instruction') }}" />
                      @if ($errors->has('instruction'))
                      <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('instruction') }}</span>
                      @endif
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <label class="col-sm-2 col-form-label text-left">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Description') }}" value="{{ old('description') }}" />
                      @if ($errors->has('description'))
                      <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <label class="col-sm-2 col-form-label text-left">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" />
                      @if ($errors->has('title'))
                      <span id="harga-error" class="error text-title" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <label class="col-sm-2 col-form-label text-left">{{ __('Question') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('question') ? ' has-danger' : '' }}">
                      <textarea class="form-control tinymce-editor{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" id="question" type="text" placeholder="{{ __('Question') }}" value="{{ old('question') }}" row="3" required></textarea>
                      @if ($errors->has('question'))
                      <span id="question-error" class="error question-danger" for="input-question">{{ $errors->first('question') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                 <label class="col-sm-2 col-form-label text-left">{{ __('Option Type') }}</label>
                 <div class="col-sm-4">
                   <select class="form-control" name="single_option_type" id="single_option_type" required>
                    <option value="">- Select Option Type - </option>
                    <option value="options">Options</option>
                    <option value="text">Text</option>
                    <option value="essay">Essay</option>
                    <option value="record-audio">Record Audio</option>
                  </select>
                </div>
              </div>
              <div class="row single_option_types options" id="single-option-type-options" style="display:none;">
                <label class="col-sm-2 col-form-label text-left">{{ __('Options') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('options') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('options') ? ' is-invalid' : '' }}" name="options" id="options" type="text"  />
                    @if ($errors->has('options'))
                    <span id="options-error" class="error text-danger" for="options">{{ $errors->first('options') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Image') }}</label>
                <div class="col-sm-7">
                  <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="file_gambar" id="file_gambar">
                        </span> 
                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Audio') }}</label>
                <div class="col-sm-7">
                  <input type="file" id="file_audio" name="file_audio">

                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Text') }}</label>
                <div class="col-sm-9">
                  <div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }}">
                    <textarea class="form-control tinymce-editor{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" id="text" type="text" placeholder="{{ __('Text') }}" value="{{ old('text') }}" row="3" required></textarea>
                    @if ($errors->has('text'))
                    <span id="text-error" class="error text-danger" for="input-text">{{ $errors->first('text') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <button type="button" id="question-btn" onclick="add_question()" class="btn btn-primary">{{ __('Save Question') }}</button>
              </div>
            </form>
          </div>



          <div class="col-md-12 multiple-question-wrapper question-type">
            <form action="" class="col-md-12" id="multiple-form">
              <input type="hidden" id="input_multiple_question_id" name="input_multiple_question_id">
              <input type="hidden" id="input_multiple_structure_id" name="input_multiple_structure_id">
              <div class="row">
                <h4>Multiple Questions</h4>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Number') }}</label>
                <div class="col-sm-7">
                  <div class="row">

                    <div class="col-sm-5">
                      <div class="form-group{{ $errors->has('multiple-start-number') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('multiple-start-number') ? ' is-invalid' : '' }}" name="multiple-start-number" id="multiple-start-number" type="number" placeholder="{{ __('Start Number') }}" value="{{ old('multiple-start-number') }}" />
                        @if ($errors->has('multiple-start-number'))
                        <span id="harga-error" class="error text-danger" for="input-start-number">{{ $errors->first('multiple-start-number') }}</span>
                        @endif
                      </div>
                    </div>
                    <label class="col-sm-2 col-form-label text-center"> - </label>
                    <div class="col-sm-5">
                      <div class="form-group{{ $errors->has('multiple-end-number') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('multiple-end-number') ? ' is-invalid' : '' }}" name="multiple-end-number" id="multiple-end-number" type="number" placeholder="{{ __('End Number') }}" value="{{ old('multiple-end-number') }}" />
                        @if ($errors->has('multiple-end-number'))
                        <span id="harga-error" class="error text-danger" for="input-end-number">{{ $errors->first('multiple-end-number') }}</span>
                        @endif
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Instruction') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('multiple-instruction') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('multiple-instruction') ? ' is-invalid' : '' }}" name="multiple-instruction" id="input-multiple-instruction" type="text" placeholder="{{ __('Instruction') }}" value="{{ old('multiple-instruction') }}" />
                    @if ($errors->has('multiple-instruction'))
                    <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('multiple-instruction') }}</span>
                    @endif
                  </div>
                </div>
              </div> 
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Description') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('multiple-description') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('multiple-description') ? ' is-invalid' : '' }}" name="multiple-description" id="input-multiple-description" type="text" placeholder="{{ __('Description') }}" value="{{ old('multiple-description') }}" />
                    @if ($errors->has('multiple-description'))
                    <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('multiple-description') }}</span>
                    @endif
                  </div>
                </div>
              </div> 
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Title') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('multiple-title') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('multiple-title') ? ' is-invalid' : '' }}" name="title" id="input-multiple-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('multiple-title') }}" />
                    @if ($errors->has('multiple-title'))
                    <span id="harga-error" class="error text-title" for="input-multiple-title">{{ $errors->first('multiple-title') }}</span>
                    @endif
                  </div>
                </div>
              </div> 
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Image') }}</label>
                <div class="col-sm-7">
                  <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="multiple_file_gambar" id="multiple_file_gambar">
                        </span> 
                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="row">
                <label class="col-sm-2 col-form-label text-left">{{ __('Audio') }}</label>
                <div class="col-sm-7">
                  <input type="file" id="multiple_file_audio" name="multiple_file_audio">

                </div>
              </div>
              <div class="row" style="margin:0 -30px;">
               <div class="col-md-6">
                <div class="row">
                 <label class="col-sm-12 col-form-label text-center">{{ __('Left Content') }}</label>
                 <div class="col-sm-12">
                  <div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }}">
                    <textarea class="form-control tinymce-editor{{ $errors->has('text') ? ' is-invalid' : '' }}" name="multiple_text" id="multiple_text" type="text" placeholder="{{ __('Left Content') }}" value="{{ old('text') }}" row="3" required></textarea>
                    @if ($errors->has('text'))
                    <span id="text-error" class="error text-danger" for="input-text">{{ $errors->first('text') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6" style="border-right:1px solid #ccc;">
              <div class="row">
                <label class="col-sm-12 col-form-label text-center">{{ __('Right Content') }}</label>
                <div class="col-sm-12">
                  <div class="form-group{{ $errors->has('questions') ? ' has-danger' : '' }}">
                    <textarea class="form-control tinymce-editor{{ $errors->has('multiple-questions') ? ' is-invalid' : '' }}" name="multiple_questions" id="multiple_questions" type="text" placeholder="{{ __('Right Content') }}" value="{{ old('multiple_questions') }}" row="3" required></textarea>
                    @if ($errors->has('multiple_question'))
                    <span id="text-error" class="error multiple_questions-danger" for="input-text">{{ $errors->first('multiple_questions') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="row">
            <button type="button" id="multiple-question-btn" onclick="add_multiple_question()" class="btn btn-primary">{{ __('Save Multiple Question') }}</button>

          </div>
        </form>
      </div>
      <div class="col-md-12 other-wrapper question-type">
       <form action="" class="col-md-12" id="other-form">
         <input type="hidden" name="test_structure_id" id="input-other_id">
         <div class="row">
          <h4>Other Introduction / Outro / Explanation</h4>
        </div> 
        <div class="row">
          <label class="col-sm-2 col-form-label text-left">{{ __('Type') }}</label>
          <div class="col-sm-7">
           <select class="form-control" name="other_type" id="other_type" required>
            <option value="">- Select Option Type - </option>
            <option value="introduction">Introduction</option>
            <option value="outro">Outro</option>
            <option value="instruction">Instruction</option>
          </select>
        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label text-left">{{ __('Title') }}</label>
        <div class="col-sm-7">
          <div class="form-group{{ $errors->has('Title') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-other_title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" />
            @if ($errors->has('title'))
            <span id="harga-error" class="error text-title" for="input-title">{{ $errors->first('title') }}</span>
            @endif
          </div>
        </div>
      </div> 
      <div class="row">
        <label class="col-sm-2 col-form-label text-left">{{ __('Description') }}</label>
        <div class="col-sm-7">
          <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-other_description" type="text" placeholder="{{ __('Description') }}" value="{{ old('description') }}" />
            @if ($errors->has('description'))
            <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('description') }}</span>
            @endif
          </div>
        </div>
      </div> 
      <div class="row">
        <label class="col-sm-2 col-form-label text-left">{{ __('Text') }}</label>
        <div class="col-sm-9">
          <div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }}">
            <textarea class="form-control tinymce-editor{{ $errors->has('text') ? ' is-invalid' : '' }}" name="other_text" id="other_text" type="text" placeholder="{{ __('Text') }}" value="{{ old('text') }}" row="3" required></textarea>
            @if ($errors->has('text'))
            <span id="text-error" class="error text-danger" for="input-text">{{ $errors->first('text') }}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <button type="button" id="other-btn" onclick="add_other()" class="btn btn-primary">{{ __('Save') }}</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
<div class="row" id="question-output">
  @if(isset($test_structure ))
  <div class="card">
    <div class="card-header card-header-rose">
      <h4 class="card-title ">{{ __('Questions') }}</h4>   
    </div>

    <div class="card-body">
      <div class="row ">
        <div class="col-md-12" style="background:white;">
          @foreach($test_structure as $key => $value)
          <div class="col-md-12" style="margin-bottom:15px;border:1px solid #dedede;padding:10px;">

            @if($value->question_type == "single")

            @foreach($value->single_questions as $questions)

            <div class="row">
              <div class="col-md-1" style="vertical-align:middle;text-align:center;align-items:center;justify-content:center;display:flex;">
                {{$value->number}}.
              </div>
              <div class="col-md-9">
               <div class="row form-group"> 
                <div class="col-md-2">   
                  Type <span class="colon">:</span> </div>
                  <div class="col-md-10">
                    <h4 style="margin-bottom:0;"> <strong>  {{$value->question_type}}</strong> </h4> 
                  </div>
                </div>
                <div class="row form-group"> 
                  <div class="col-md-2">   
                    Instruction <span class="colon">:</span> </div>
                    <div class="col-md-10">
                      <h4 style="margin-bottom:0;"> <strong>  {{$value->instruction}}</strong> </h4> 
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-2">Description <span class="colon">:</span> </div>
                    <div class="col-md-10">{{$value->description}}</div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-2">Title <span class="colon">:</span> </div>
                    <div class="col-md-10">{{$value->title}}</div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-2">Question <span class="colon">:</span> </div> 
                    <div class="col-md-10">  {!!$questions->question!!}</div> 
                  </div>
                  <div class="row form-group">
                    <div class="col-md-2">Option Type <span class="colon">:</span> </div> 
                    <div class="col-md-10">  {{$questions->option_type}}</div> 
                  </div>
                  @if($value->image != "")
                  <div class="row form-group">
                    <div class="col-md-2">Image <span class="colon">:</span> </div>
                    <div class="col-md-10"> <img src="{{asset($value->image)}}" style="max-width:150px;"> </div>
                  </div>
                  @endif
                  @if($value->audio != "")
                  <div class="row form-group">
                    <div class="col-md-2">Audio <span class="colon">:</span> </div>
                    <div class="col-md-10">
                      <audio controls>
                        <source src=" {{asset($value->audio)}}" type="audio/ogg">
                          Your browser does not support the audio element.
                        </audio>
                      </div>
                    </div>

                    @endif
                    @if($value->text != "")
                    <div class="row form-group">
                      <div class="col-md-2">Text <span class="colon">:</span> </div> 
                      <div class="col-md-10">  {!!$value->text!!}</div> 
                    </div>
                    @endif
                    @if(!$questions->options->isEmpty())
                    <div class="row form-group">
                      <div class="col-md-2">Option <span class="colon">:</span></div>
                      <div class="col-md-8">
                        <div class="row" id="question-{{$questions->id}}-options">
                         @foreach($questions->options as $key2 => $option)
                         <div class="col-md-12"> <span style="margin-right:10px;"> {{chr(65+$key2)}} )</span>{{$option->option}} 
                          @if($questions->answers->first())
                          @if($questions->answers->first()->option_answer_id == $option->id) <span style="color:#3da654;font-weight:bold;">(Correct)</span> 
                          @endif                                             
                          @endif
                        </label>


                      </div>
                      @endforeach

                    </div>
                  </div>

                </div>
                <div class="row form-group">
                  <div class="col-md-2">Answer Explanation <span class="colon">:</span></div>
                  <div class="col-md-8" id="explanation-{{$questions->id}}">@if($questions->answers->first()){!! $questions->answers->first()->explanation != "" ? $questions->answers->first()->explanation : "<span style='color:red'>No Explanation ! </span>" !!} @else <span style='color:red'>No Explanation ! </span> @endif </div>
                </div>

                @endif
              </div>
              @if($value->question_type == "single")

              <div class="col-md-2" style="display:flex;vertical-align: middle;align-items: center;">
                <div class="col-md-12">
                  @if($value->option_type != "record-audio")
                  <button type="button" style="padding:8px 12px !important" class="btn btn-primary btn-link" data-toggle="modal" data-target="#exampleModalCenter" onclick="edit_answer('{{$questions->id}}','{{$value->option_type}}')">  <i class="material-icons">close</i>
                    <div class="ripple-container"></div>  
                  Answers</button>
                  @endif
                  <button type="button" style="padding:8px 12px !important" class="btn btn-success btn-link" value-original-title="" title="" onclick='edit_question("{{$value->id}}","{{$value->single_questions->first()->id}}","{{$value->question_type}}","{{$value->number}}","{{$value->instruction}}","{{$value->title}}","{{$value->description}}","{{trim(preg_replace("/\s\s+/", "" ,addslashes($value->single_questions->first()->question)))}}","{{trim(preg_replace("/\s\s+/", "" ,addslashes(str_replace(array("\r", "\n"),"",$value->text))))}}","{{addslashes(json_encode($value->single_questions->first()->options))}}")'>
                    <i class="material-icons">close</i>
                    <div class="ripple-container"></div>
                    edit
                  </button>
                  <button type="button" style="padding:8px 12px !important" class="btn btn-danger btn-link" value-original-title="" title="" onclick="delete_question('{{$value->id}}')">
                    <i class="material-icons">close</i>
                    <div class="ripple-container"></div>
                    delete
                  </button>
                </div>
              </div>
              @endif
            </div>


            @endforeach
            @else


            <div class="row">
              <div class="col-md-1" style="vertical-align:middle;text-align:center;align-items:center;justify-content:center;display:flex;">
                {{$value->number}}.
              </div>
              <div class="col-md-9">
               <div class="row form-group"> 
                <div class="col-md-2">   
                  Type <span class="colon">:</span> </div>
                  <div class="col-md-10">
                    <h4 style="margin-bottom:0;"> <strong>  {{$value->question_type}}</strong> </h4> 
                  </div>
                </div>
                @if($value->question_type == "multiple")
                <div class="row form-group"> 
                  <div class="col-md-2">   
                    Instruction <span class="colon">:</span> </div>
                    <div class="col-md-10">
                      <h4 style="margin-bottom:0;"> <strong>  {{$value->instruction}}</strong> </h4> 
                    </div>
                  </div>
                  @endif
                  <div class="row form-group">
                    <div class="col-md-2">Description <span class="colon">:</span> </div>
                    <div class="col-md-10">{{$value->description}}</div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-2">Title <span class="colon">:</span> </div>
                    <div class="col-md-10">{{$value->title}}</div>
                  </div>
                  @if($value->question_type == "multiple")
                  <div class="row form-group">
                    <div class="col-md-2" >Questions <span class="colon">:</span> </div> 
                    <div class="col-md-10">  
                      {!! $value->multiple_questions !!}
                    </div> 
                  </div>
                  @endif
                  @if($value->image != "")
                  <div class="row form-group">
                    <div class="col-md-2">Image <span class="colon">:</span> </div>
                    <div class="col-md-10"> <img src="{{asset($value->image)}}" style="max-width:150px;"> </div>
                  </div>
                  @endif
                  @if($value->audio != "")
                  <div class="row form-group">
                    <div class="col-md-2">Audio <span class="colon">:</span> </div>
                    <div class="col-md-10">
                      <audio controls>
                        <source src=" {{asset($value->audio)}}" type="audio/ogg">
                          Your browser does not support the audio element.
                        </audio>
                      </div>
                    </div>

                    @endif
                    @if($value->text != "")
                    <div class="row form-group">
                      <div class="col-md-2">Text <span class="colon">:</span> </div> 

                      <div class="col-md-10">  {!!$value->text!!}</div> 
                    </div>
                    @endif

                  </div>
                  @if($value->question_type == "multiple")

                  <div class="col-md-2" style="display:flex;vertical-align: middle;align-items: center;">

                    <div class="col-md-12">
                     <button type="button" style="padding:8px 12px !important" class="btn btn-primary btn-link" data-toggle="modal" data-target="#multipleQuestionsModal" onclick="open_multiple_questions({{$value->id}})">  <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                    Answer Sheet</button>

                    <button type="button" style="padding:8px 12px !important" class="btn btn-success btn-link" value-original-title="" title="" onclick="edit_multiple_question('{{$value->id}}','{{$value->question_type}}','{{$value->number}}','{{$value->instruction}}','{{$value->description}}','{{$value->title}}','{{trim(preg_replace('/\s\s+/', ' ',addslashes($value->multiple_questions)))}}','{{trim(preg_replace('/\s\s+/', ' ',addslashes($value->text)))}}')">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                      edit
                    </button>
                    <button type="button" style="padding:8px 12px !important" class="btn btn-danger btn-link" value-original-title="" title="" onclick="delete_multiple_structure({{$value->id}})">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                      delete
                    </button>
                  </div>
                </div>
                @else
                <div class="col-md-2" style="display:flex;vertical-align: middle;align-items: center;">

                  <div class="col-md-12">


                    <button type="button" style="padding:8px 12px !important" class="btn btn-success btn-link" value-original-title="" title="" onclick="edit_other('{{$value->id}}','{{$value->question_type}}','{{$value->title}}','{{$value->description}}','{{trim(preg_replace('/\s\s+/', ' ',addslashes($value->text)))}}')">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                      edit
                    </button>
                    <button type="button" style="padding:8px 12px !important" class="btn btn-danger btn-link" value-original-title="" title="" onclick="delete_other({{$value->id}})">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                      delete
                    </button>
                  </div>
                </div>
                @endif
              </div>
              @endif



            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
<!--  <div class="btn btn-danger save-answer-btn" onclick="save_answer()">
    Save Answers
  </div>-->
  @endif 

</div>
</div>
</div>
@php 
/*$answer = $questions->answers->map(function ($item) {
return $item->only('test_id','package_id','module_id','section_id','question_id','option_answer_id','answers');
});*/
@endphp
@endsection

@push('js')
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script>
  $(document).ready(function(){
    $('.loading-wrapper').hide();
  });

  var token = $("input[name='_token']").val();
  var test_id = '{{$test_id}}';
  var module_id = '{{$module_id}}';
  var package_id = '{{$package_id}}';
  var section_id = '{{$section_id}}';
  var test_section_id = '{{$test_section_id}}';
  var section_type_id = '{{$section_type_id}}';
  var test_structure_id = '{{$test_structure_id}}';
  var temp_multiple_structure_id;
  var cmd_multiple = "add";
  var cmd = "add";
//  var answers = @if(isset($answers) && $answers->count() != 0) {!!$answer->toJson()!!} @else [] @endif ;
var question_answers = [];
function edit_answer(question_id,option_type){
  $('.edit-answers-wrapper').hide();
  if(option_type == "essay"){
   $('.edit-answers-wrapper.essay').show();
 }else if(option_type == "record-audio"){
  $('.edit-answers-wrapper.record-audio').show();
}else if(option_type == "options" || option_type == ""){
  $('.edit-answers-wrapper.options').show();
  question_answers = [];
  tinymce.get("explanation").setContent("");
  $('#answer_question_id').val(question_id);
  $.ajax({
    url: "{{route('question-answers-ajax')}}",
    method : "GET",
    data : {
      _token : token,
      test_id : test_id,
      module_id : module_id,
      package_id : package_id,
      section_id : section_id,
      question_id : question_id
    },
    success : function (data){
      var arr_data = data.split('##');
      question_answers = JSON.parse(arr_data[1]);
      console.log(question_answers.length);
      var options = JSON.parse(arr_data[0]);
      var optionsOutput = "";
      var answer_option_id = "";
      if (question_answers.length != 0)
      {
        answer_option_id =  question_answers[0].option_answer_id;

      }
      $.each(options,function(k,v){

        optionsOutput+= '<div class="col-md-12"> <span style="margin-right:10px;"> '+ String.fromCharCode(65 + k) + '</span>' + v.option  +
        '<label class="checkbox-container">set as correct answer' +
        '<input type="checkbox"  data="' + v.id + '" value="' + v.id + '" class="check-answers"';
        if(answer_option_id == v.id){
          optionsOutput += " checked";
        }
        optionsOutput += '>'+
        '<span class="checkmark"></span>'+ 
        '</label>'+
        '</div>';
      });
      console.log(optionsOutput);
      $('#answer-output').html(optionsOutput);
      tinymce.remove('#explanation');
      tinymce.init({
        selector: '#explanation',
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
       min_height:350
     });
      if (question_answers.length != 0)
      {
        tinymce.get("explanation").setContent(question_answers[0].explanation);
      }
    },
    error: function(){

    }

  });
}

}

function save_answer(){
//console.log(question_answers);
console.log(question_answers);
/*if(question_answers.length > 1){
  alert('Multiple answers is not supported yet !');
  return false;
}else{*/
 question_id = $('#answer_question_id').val();
 explanation = tinymce.get('explanation').getContent();
 $.ajax({ 
  url: "{{route('question-answers-ajax')}}",
  method : "GET",
  data : {
    _token : token,
    test_id : test_id,
    module_id : module_id,
    package_id : package_id,
    section_id : section_id,
    question_id : question_id,
    test_structure_id : test_structure_id,
    input_answers : question_answers,
    explanation : explanation,
    cmd : "add"
  },
  success : function (data){

    var arr_data = data.split('##');  
    question_answers = []; 
    question_answers = JSON.parse(arr_data[1]);
    var options = JSON.parse(arr_data[0]);
    var optionsOutput = "";
    var answer_option_id = "";
    if (question_answers.length != 0)
    {
      answer_option_id =  question_answers[0].option_answer_id;
    }

    $.each(options,function(k,v){

      optionsOutput+= '<div class="col-md-12"> <span style="margin-right:10px;"> '+ String.fromCharCode(65 + k) + '</span>' + v.option;

      if(answer_option_id == v.id){

        optionsOutput += ' <span style="color:#3da654;font-weight:bold;">(Correct)</span>';
      }
      optionsOutput +=  
      '</label>'+
      '</div>';
    });
    var optionsSelector = "#question-"+question_id+"-options";
    $(optionsSelector).html(optionsOutput);
    var explanation = JSON.parse(arr_data[1]);
    var explanationSelector = "#explanation-"+question_id;
    if (question_answers.length != 0)
    {
      $(explanationSelector).html(explanation[0].explanation);
    }
    swal("Answers Saved !");
  },
  error: function(data){
    alert('error');
    console.log(data);
  }

});
//}
}
   /* function save_answer(){
    $('.loading-wrapper').show();
    var explanation = [];
    var explanation_input = $('.explanation-editor').val();
    alert(explanation_input);
    console.log(explanation_input);
    setTimeout(function(){ 
      $('.loading-wrapper').hide();
           $.ajax({
        url: "{{route('question-answers-ajax')}}",
        method : "GET",
        data : {
            _token : token,
            test_id : test_id,
            module_id : module_id,
            package_id : package_id,
            section_id : section_id,
            answers : answers
        },
        success : function (data){
            if(data){
            $('.save-answer-btn').hide();
            swal("Answers Saved !");
            }else{
                alert('error');
            }
        },
       error: function(){

       }

     });
   }, 1500);

 }*/
 $(document).ready(function(){
  $('#single_option_type').on('change',function(){
    if($(this).val() == "options"){
      $('.single_option_types').hide();
      $('.single_option_types.options').show();
    }else if($(this).val() == "text"){
      $('.single_option_types').hide();
      $('.single_option_types.text').show();
    }else if($(this).val() == "essay"){
      $('.single_option_types').hide();
      $('.single_option_types.essay').show();
    }
  });

  if($('#single_option_type').val() == "options"){
    $('.single_option_types').hide();
    $('.single_option_types.options').show();
  }else if($('#single_option_type').val() == "text"){
    $('.single_option_types').hide();
    $('.single_option_types.text').show();
  }else if($('#single_option_type').val() == "essay"){
    $('.single_option_types').hide();
    $('.single_option_types.essay').show();
  }

  $('#multiple_option_type').on('change',function(){
    if($(this).val() == "options"){
      $('#multiple-option-type-options').show();
      $('#multiple-option-type-text').hide();
    }else if($(this).val() == "text"){
     $('#multiple-option-type-text').show();
     $('#multiple-option-type-options').hide();
   }else{
    $('#multiple-option-type-options').hide();
    $('#multiple-option-type-text').hide();  
  }
});
  if($('#multiple_option_type').val() == "options"){
    $('#multiple-option-type-options').show();
    $('#multiple-option-type-text').hide();
  }else if($('#multiple_option_type').val() == "text"){
   $('#multiple-option-type-text').show();
   $('#multiple-option-type-options').hide();
 }else{
  $('#multiple-option-type-options').hide();
  $('#multiple-option-type-text').hide();  
}
});



 $(document).on('change','.check-answers',function(e){

  var option_answer_id = $(this).attr('data');
  var check_input = $(this).prop('checked');
  var question_id = $('#answer_question_id').val();
  var check_answer_exist = false;
  var check_delete_exist = false;
  var remove_index;
  console.log(question_answers);
  if(check_input){
    if(question_answers.length >= 0){
      for (index=0; index < question_answers.length; index++) {
            //$.map(answers, function(elem, index) {


              if (question_answers[index].question_id == question_id && question_answers[index].option_answer_id == option_answer_id){
                check_answer_exist = true;
              }else{
                check_answer_exist = false;
              }
            }
            if (!check_answer_exist) {
              question_answers.push({'test_id' : test_id,'package_id' : package_id, 'module_id' : module_id,'section_id' : section_id ,'question_id' : question_id,'option_answer_id' : option_answer_id,'answers' : ''});
            }
            else{
             question_answers.push({'test_id' : test_id,'package_id' : package_id, 'module_id' : module_id,'section_id' : section_id ,'question_id' : question_id,'option_answer_id' : option_answer_id, 'answers' : ''});
           }

         }

       }else{ 
        for (index=0; index < question_answers.length; index++) {
             // $.map(answers, function(elem, index) {
               if (question_answers[index].question_id == question_id && question_answers[index].option_answer_id == option_answer_id){
                remove_index = index;
                check_delete_exist = true;
                break;

              }else{
                check_delete_exist = false;
              }


            }
            if(check_delete_exist){
              question_answers.splice(remove_index,1);
            }
          }

        });
  /*$(document).on('change','.check-answers',function(){
    $('.save-answer-btn').show();
    var answer_input = $(this).attr('data');
    var check_input = $(this).prop('checked');
    var arr_answer = answer_input.split(',');
    var question_id = arr_answer[0];
    var option_answer_id = arr_answer[1];
    var check_answer_exist = false;
    var check_delete_exist = false;
    var remove_index;
    if(check_input){
      if(answers.length != 0)
        for (index=0; index < answers.length; index++) {
            //$.map(answers, function(elem, index) {


              if (answers[index].question_id == question_id && answers[index].option_answer_id == option_answer_id){
                check_answer_exist = true;
              }else{
                check_answer_exist = false;
              }
            }
            if (!check_answer_exist) {
              answers.push({'test_id' : test_id,'package_id' : package_id, 'module_id' : module_id,'section_id' : section_id ,'question_id' : question_id,'option_answer_id' : option_answer_id,'answers' : ''});
            }
            else
             answers.push({'test_id' : test_id,'package_id' : package_id, 'module_id' : module_id,'section_id' : section_id ,'question_id' : question_id,'option_answer_id' : option_answer_id, 'answers' : ''});

         }else{ 
           for (index=0; index < answers.length; index++) {
             // $.map(answers, function(elem, index) {
               if (answers[index].question_id == question_id && answers[index].option_answer_id == option_answer_id){
                remove_index = index;
                check_delete_exist = true;
                break;

              }else{
                check_delete_exist = false;
              }


            }
            if(check_delete_exist){
              answers.splice(remove_index,1);
            }
          }
        });
    /*$('.check-answers').on('change',function(){
        alert($(this).val());
        var option_answer_id = $(this).val();
        
        $.ajax({
        url: "{{route('question-answers-ajax')}}",
        method : "GET",
        data : {
            _token : token,
            option_answer_id : option_answer_id,

        },
        success : function (data){
            alert(data);
        },
       error: function(){

       }

        });
      });
      $('#empty_multiple_question').on('change',function(){
        if($(this).prop('checked') == true){
          tinymce.get('multiple-question').getBody().setAttribute('contenteditable', false);
        }else{
         tinymce.get('multiple-question').getBody().setAttribute('contenteditable', true);
       }
     });*/
     $( document ).ready(function() {
       $('#options').selectize({
        delimiter: '|', 
        persist: false,
        valueField: 'option',
        labelField: 'option',
        searchField: 'option',
        options: options,
        create: function(input) {
          return {
            option: input
          };
        }
      });
     });
     $( document ).ready(function() {  
       $('#multiple_options').selectize({
        delimiter: '|',
        persist: false,
        valueField: 'option',
        labelField: 'option',
        searchField: 'option',
        options: options,
        create: function(input) {
          return {
            option: input
          };
        }
      });
       $('#multiple_answers').selectize({
        delimiter: '|',
        persist: false,
        valueField: 'option',
        labelField: 'option',
        searchField: 'option',
        options: options,
        create: function(input) {
          return {
            option: input
          };
        }
      });
     });


     var multiple_question = [];


/*
     function multiple_questions_input(){
      if(cmd_multiple == "add"){
       cek_empty_questions = document.getElementById('empty_multiple_question').checked;
       options = "";
       answers = "";
       if($('#question_type').val() == "options"){
        options = $('#multiple_options').val();
      }else{
        answers = $('#multiple_answers').val();
      }
      console.log(tinymce.get('multiple-explanation').getContent());
      if(!cek_empty_questions){

        multiple_question.push(
        {
          question : tinymce.get('multiple-question').getContent(),
          number : $('#multiple-number').val(),
          options : options,
          answers : answers,
          explanation : tinymce.get('multiple-explanation').getContent()
        });
      }else{
        multiple_question.push(
        {
          question : "",
          number : $('#multiple-number').val(),
          options : options,
          answers : answers,
          explanation : tinymce.get('multiple-explanation').getContent()
        });

      }
      tinymce.get("multiple-explanation").setContent("");
      tinymce.get("multiple-question").setContent("");

      $('#multiple_options')[0].selectize.clearOptions();
      $('#multiple_answers')[0].selectize.clearOptions();
    }else if (cmd_multiple == "update"){
      temp_multiple_question_id = $('#temp_multiple_question_id').val();
      multiple_question[temp_multiple_question_id].question = tinymce.get('multiple-question').getContent();
      multiple_question[temp_multiple_question_id].number = $('#multiple-number').val();
      multiple_question[temp_multiple_question_id].explanation = tinymce.get('multiple-explanation').getContent();

      if($('#multiple_options').val() != ""){
        multiple_question[temp_multiple_question_id].options = $('#multiple_options').val();
      }
      if($('#multiple_answers').val() != ""){

        multiple_question[temp_multiple_question_id].answers = $('#multiple_answers').val();
      }


      reset_multiple_question();
    }

    table = "<table class='table bordered-table'>" +
    "<tr> <th> No </th> <th> Question </th> <th> Options </th> <th> Answers </th> <th> Explanation </th> <th> Action </th></tr>";
    $.each(multiple_question,function(k,v){
      if(k <= length){
        table += "<tr> <td>" + v.number + "</td>" + "<td>"+ v.question +"</td>" + "<td>"+v.options+"</td> <td>"+v.answers+ "</td> <td>"+ v.explanation +"</td> <td>  <button type='button' onclick='edit_multiple_question_arr("+k+")'>edit</button> | <button type='button' onclick='delete_multiple_question_arr("+k+")'>delete</button></td></tr>"; 
      }else{
        alert('You have reached the maximum input !');
        return false;
      }
    });
    table += "</table>";
    $('#multiple_question-output').html(table);

    tinymce.get("multiple-question").setContent("");
    tinymce.get("multiple-explanation").setContent("");
    $('#multiple-number').val("");
    var select = $('#multiple_options');
    var control = select[0].selectize;
    control.clear();

  }
  */

  function reset_multiple_question(){
    cmd_multiple = "add";
    $('#temp_multiple_question_id').val('');
    $('#multiple_options')[0].selectize.clearOptions();
    $('#multiple_answers')[0].selectize.clearOptions();
    tinymce.get("multiple-explanation").setContent("");
    $('#multiple_question_input-btn').html('Add Questions');
  }
  function edit_multiple_question_arr(id){
    cmd_multiple = "update";
    tinymce.get("multiple-question").setContent(multiple_question[id].question);
    var select = $('#multiple_options');
    var control = select[0].selectize;

    if(multiple_question[id].options != ""){
     $('#multiple_option_type').val("options");
     var options = multiple_question[id].options.split(',');
     $.each(options,function(k,v){
      control.addOption({option:v, value:v});
      control.addItem(v);
      control.refreshItems();
    });
   }

   var select2 = $('#multiple_answers');
   var control2 = select2[0].selectize;
   if(multiple_question[id].answers != ""){
     $('#multiple_option_type').val("answers");
     var answers = multiple_question[id].answers.split('|');
     $.each(answers,function(k,v){
      control2.addOption({option:v, value:v});
      control2.addItem(v);
      control2.refreshItems();
    });
   }
   tinymce.get("multiple-explanation").setContent(multiple_question[id].explanation);
   $('#multiple-number').val(multiple_question[id].number);
   $('#temp_multiple_question_id').val(id);
   $('#multiple_question_input-btn').html('Update Questions');
 }

 function delete_multiple_question_arr(id){
  multiple_question.splice(id,1);
  var table;
  ttable = "<table class='table bordered-table'>" +
  "<tr> <th> No </th> <th> Question </th> <th> Options </th> <th> Answers </th> <th>Explanation</th> <th> Action </th></tr>";
  $.each(multiple_question,function(k,v){
    if(k <= length){
      table += "<tr> <td>" + v.number + "</td>" + "<td>"+ v.question +"</td>" + "<td>"+v.options+"</td> <td>"+v.answers+ "</td> <td>"+ v.explanation +"</td> <td>  <button type='button' onclick='edit_multiple_question_arr("+k+")'>edit</button> | <button type='button' onclick='delete_multiple_question_arr("+k+")'>delete</button></td></tr>"; 
    }else{
      alert('You have reached the maximum input !');
      return false;
    }
  });
  table += "</table>";
  $('#multiple_question-output').html(table);
  reset_multiple_question();
}


function open_multiple_questions(test_structure_id){
  temp_multiple_structure_id = test_structure_id;
  tinymce.init({
    selector: '.multiple-tinymce-editor',
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
   min_height:350
 });
  $('.loading-wrapper').show();
  $.ajax({
    url: "{{route('temp-multiple-question-ajax')}}",
    method : "POST",
    data : {
      _token : token,
      test_structure_id
    },
    success : function (data){
     reset_multiple_question();
     console.log(data);
     $('#multiple_question-output').html(data);

   },
   error: function(data){
    console.log(data);
    alert('test');
  },
  complete: function(){
    $('.loading-wrapper').hide();
  }
});
}

var cmd_temp_multi = "add";

function edit_temp_multiple_question(id,number,answers,explanation){
  $('#multiple-number').val(number);
  var select = $('#multiple_answers');
  var control = select[0].selectize;
  if(answers != ""){
   $('#multiple_option_type').val("answers");
   var answers = answers.split('|');
   $.each(answers,function(k,v){
    control.addOption({option:v, value:v});
    control.addItem(v);
    control.refreshItems();
  });
 }
 tinymce.get("multiple-explanation").setContent(explanation);
 $('#temp_multiple_question_id').val(id);
 cmd_temp_multi = "update";
 $('#multiple_question_input-btn').html('Update Questions');

}

function add_temp_multiple_question(){
  var cek_empty_questions = document.getElementById('empty_multiple_question').checked;
  var options = "";
  var answers = "";
  var question = "";
  var question_id = $('#temp_multiple_question_id').val();
  var number = $('#multiple-number').val();
  var explanation = tinymce.get('multiple-explanation').getContent();
  var multiple_option_type = $('#multiple_option_type').val();
  if(multiple_option_type == "options"){
    options = $('#multiple_options').val();
  }else{
    answers = $('#multiple_answers').val();
  }

  if(!cek_empty_questions){
    question = tinymce.get('multiple-question').getContent();
  }else{
    question = "";
  }
  $.ajax({
    url: "{{route('temp-multiple-question-ajax')}}",
    method : "POST",
    data : {
      _token : token,
      test_id : test_id,
      module_id : module_id,
      package_id : package_id,
      section_id : section_id,
      test_section_id : test_section_id,
      question_id : question_id,
      test_structure_id : temp_multiple_structure_id,
      number : number,
      question : question,
      multiple_option_type : multiple_option_type,
      answers : answers,
      explanation : explanation,
      cmd : cmd_temp_multi
    },
    success : function (data){

          //SQLSTATE[22007]: Invalid datetime format: 1366 Incorrect integer value: '{"id":713,"test_id":1,"package_id":27,"module_id":11,"section_id":124,"question_type":"multiple","number":"1 - 2","title":null,"' for column `u823503514_aqeda`.`ot_questions`.`test_structure_id` at row 1 (SQL: insert into `ot_questions` (`test_id`, `module_id`, `package_id`, `section_id`, `number`, `question`, `test_structure_id`, `updated_at`, `created_at`) values (1, 11, 27, 124, 2, ?, {"id":713,"test_id":1,"package_id":27,"module_id":11,"section_id":124,"question_type":"multiple","number":"1 - 2","title":null,"instruction":null,"description":null,"audio":null,"image":null,"text":null,"created_at":"2020-03-20 09:01:05","updated_at":"2020-03-20 09:01:05"}, 2020-03-20 13:53:44, 2020-03-20 13:53:44))
          reset_multiple_question();
          $('#multiple_question-output').html(data);

        },
        error: function(data){
          console.log(data);
          alert('test');
        },
        complete: function(){
          if(cmd_temp_multi == "update"){
            cmd_temp_multi = "add";
          }
          $('.loading-wrapper').hide();
        }
      });
}

function delete_temp_multiple_question(id){
  if(confirm("Are you sure want to delete this record ? ")){
    $.ajax({
      url: "{{route('temp-multiple-question-ajax')}}",
      method : "POST",
      data : {
        _token : token,
        question_id : id,
        test_structure_id : temp_multiple_structure_id,
        cmd : "delete"
      },
      success : function (data){
       reset_multiple_question();
       $('#multiple_question-output').html(data);

     },
     error: function(data){
      console.log(data);
      alert('test');
    },
    complete: function(){
    }
  });
  }
}

function edit_multiple_question(id,question_type,number,instruction,description,title,questions,text){
  console.log(questions);
  console.log(text);
  $('#question_type').val(question_type);

  if(question_type == "single"){
    $('.question-type').hide();
    $('.single-question-wrapper').show();
  }else if(question_type == "multiple"){
    $('.question-type').hide();
    $('.multiple-question-wrapper').show();
  }else{
    $('.question-type').hide();
    $('.other-wrapper').show();
  }
  var split_number = number.split(" - ");
  $('#multiple-start-number').val(split_number[0]);
  $('#multiple-end-number').val(split_number[1]);
  $('#input_multiple_structure_id').val(id);
  $('#input-multiple-instruction').val(instruction);
  $('#input-multiple-title').val(title);
  $('#input-multiple-description').val(description);

  if(questions != null){
    tinymce.get("multiple_questions").setContent(questions);
  }
  if(text != null){
    tinymce.get("multiple_text").setContent(text);
  }
  $('#multiple-question-btn').html("Update Question");
  cmd = "update";
  gototop();
}

function add_multiple_question(){
  var formElement = document.getElementById('multiple-form');
  var formData  = new FormData(formElement);
  var start_number = parseInt($('#multiple-start-number').val());
  var end_number = parseInt($('#multiple-end-number').val());
  var test_structure_id = $('#input_multiple_structure_id').val();
  if(start_number >= end_number){
    alert("Start number should be lower than end number");
    return false;
  }else if(end_number <= start_number){
    alert("End number should be higher than start number");
    return false;
  } 
  console.log(cmd);
  $('.loading-wrapper').show();
      /*if(question_id != ""){
        formData.append('multiple_question_id',question_id);
      }
      var mul_question_arr = multiple_question.length;
      if(mul_question_arr){
        var number = multiple_question[0].number + ' - ' + multiple_question[mul_question_arr-1].number;

        formData.append('number',number);
      }
      multiple_question = JSON.stringify(multiple_question);
      */
      formData.append('_token',token);
      formData.append('test_id',test_id);
      formData.append('module_id',module_id);
      formData.append('package_id',package_id);
      formData.append('section_id',section_id);
      formData.append('test_section_id',test_section_id);
      formData.append('test_structure_id',test_structure_id);
      formData.append('number',start_number+' - '+end_number);
      formData.append('section_type_id',section_type_id);
      formData.append('multiple_questions',tinymce.get('multiple_questions').getContent());
      formData.append('text',tinymce.get('multiple_text').getContent());
      formData.append('question_type',$('#question_type').val());
     // formData.append('multiple_question',multiple_question);
     formData.append('cmd',cmd);
     $.ajax({
      url: "{{route('add-multiple-question-ajax')}}",
      method : "POST",
      processData: false,
      contentType: false,
      data : formData,
      success : function (data){
       form_reset();
       multiple_question = null;
       $('#multiple_question-output').html("");
       $('#question-output').html(data);
       $('.loading-wrapper').hide();
     },
     error: function(){

     }
   });
   }
   var cek_tiny_mce = false;


   $(document).ready(function(){
     var question_types = $('#question_type').val();
     if(question_types == "single"){
      $('.question-type').hide();
      $('.single-question-wrapper').show();
    }else if(question_types == "multiple"){
      $('.question-type').hide();
      open_multiple_questions();
      $('.multiple-question-wrapper').show();
    }else if(question_types == "other"){
      $('.question-type').hide();
      $('.other-wrapper').show();
    }else{
      $('.question-type').hide();
    }
  });
   $(document).ready(function(){
    if(document.getElementById('empty_multiple_question').checked){
      tinymce.get("multiple-question").setContent("");
      tinymce.get('multiple-question').getBody().setAttribute('contenteditable', false);
    }else{
      tinymce.get('multiple-question').getBody().setAttribute('contenteditable', true);
    }
  });
   $('#empty_multiple_question').on('change',function(){
    if($(this).prop('checked') == true){
      tinymce.get("multiple-question").setContent("");
      tinymce.get('multiple-question').getBody().setAttribute('contenteditable', false);
    }else{
     tinymce.get('multiple-question').getBody().setAttribute('contenteditable', true);
   }
 });

   $('#question_type').on('change',function(){
    var question_types =this.value;

    if(question_types == "single"){
      $('.question-type').hide();
      $('.single-question-wrapper').show();
    }else if(question_types == "multiple"){
      $('.question-type').hide();
      open_multiple_questions();
      $('.multiple-question-wrapper').show();
    }else if(question_types == "other"){
      $('.question-type').hide();
      $('.other-wrapper').show();
    }else{
      $('.question-type').hide();
    }
  });
   function gototop(){
    $('.main-panel').scrollTop(0); 
    $(document).scrollTop(0);  
    $(window).scrollTop(0);
  }
  function add_other(){
    var formElement = document.getElementById('other-form');
    var formData  = new FormData(formElement);
    var test_structure_id = $('#input-other_id').val();
    var type = $('#other_type').val();
    if(type == ""){
      alert("Please Select Type !");
      return false;
    }

    if(test_structure_id != ""){
      formData.append('test_structure_id',test_structure_id);
    }
    formData.append('_token',token);
    formData.append('test_id',test_id);
    formData.append('module_id',module_id);
    formData.append('package_id',package_id);
    formData.append('section_id',section_id);
    formData.append('section_type_id',section_type_id);
    formData.append('text',tinymce.get('other_text').getContent());
    formData.append('question_type',type);
    formData.append('cmd',cmd);
    $.ajax({
      url: "{{route('add-question-ajax')}}",
      method : "POST",
      processData: false,
      contentType: false,
      data : formData,
      success : function (data){
        form_reset();
        $('#other-btn').html("Save");
        tinymce.get("other_text").setContent("");
        $('#question-output').html(data);
        $('.loading-wrapper').hide();
      },
      error: function(){

      }
    });
  }
  function edit_other(test_structure_id,type,title,description,text){
    if(question_type == "outro" || "introduction" || "instruction"){
      question_type = "other";
    }else{
      question_type = "type";
    }
    $('#question_type').val(question_type);
    $('#other_type').val(type);
    $('.selectpicker').selectpicker('refresh');
    if(question_type == "single"){
      $('.question-type').hide();
      $('.single-question-wrapper').show();
    }else if(question_type == "multiple"){
      $('.question-type').hide();
      $('.multiple-question-wrapper').show();
    }else{
      $('.question-type').hide();
      $('.other-wrapper').show();
    }
    $('#input-other_id').val(test_structure_id);
    $('#input-other_title').val(title);
    $('#input-other_description').val(description);
    if(text != null){
      tinymce.get("other_text").setContent(text);
    }
    $('#other-btn').html("Update Question");
    cmd = "update";
    gototop();
  }

  function delete_other(test_structure_id){
    $.ajax({
      url: "{{route('add-question-ajax')}}",
      method : "POST",
      data : {
        _token:token,
        test_id : test_id,
        module_id : module_id,
        package_id : package_id,
        section_id : section_id,
        test_structure_id: test_structure_id,
        cmd:"delete"
      },
      success : function (data){
        form_reset();
        $('#other-btn').html("Save");
        $('#question-output').html(data);
      },
      error: function(){

      }
    });
  }

  function add_question(){
    var formElement = document.getElementById('single-form');
    var formData  = new FormData(formElement);
    var question_id = $('#input-question_id').val();
    var test_structure_id = $('#input-test-structure_id').val();
    var option_type = $('#single_option_type').val();
    $('.loading-wrapper').show();
    if(question_id != ""){
      formData.append('question_id',question_id);
    }
    if(test_structure_id != ""){
      formData.append('test_structure_id',test_structure_id);
    }
    formData.append('_token',token);
    formData.append('test_id',test_id);
    formData.append('module_id',module_id);
    formData.append('package_id',package_id);
    formData.append('section_id',section_id);
    formData.append('section_type_id',section_type_id);
    formData.append('question',tinymce.get('question').getContent());
    formData.append('text',tinymce.get('text').getContent());
    formData.append('question_type',$('#question_type').val());
    formData.append('option_type',option_type);
    formData.append('cmd',cmd);
    $.ajax({
      url: "{{route('add-question-ajax')}}",
      method : "POST",
      processData: false,
      contentType: false,
      data : formData,
      success : function (data){
       form_reset();
       $('#question-output').html(data);
       $('.loading-wrapper').hide();
     },
     error: function(){

     }
   });
  }
  function edit_question(test_structure_id,question_id,question_type,number,instruction,title,description,question,text,options){
    console.log(options);
    if (options != ""){

      var options = JSON.parse(options);
      var select = $('#options');
      var control = select[0].selectize;
      control.clear();
      $.each(options,function(k,v){

        control.addOption({option:v.option, value:v.option});
        control.addItem(v.option);
        control.refreshItems();
      });
    }
    $('#question_type').val(question_type);

    $('.selectpicker').selectpicker('refresh');
    if(question_type == "single"){
      $('.question-type').hide();
      $('.single-question-wrapper').show();
    }else if(question_type == "multiple"){
      $('.question-type').hide();
      $('.multiple-question-wrapper').show();
    }else{
      $('.question-type').hide();
      $('.other-wrapper').show();
    }
    $('#input-number').val(number);
    $('#input-test-structure_id').val(test_structure_id);
    $('#input-question_id').val(question_id);
    $('#input-instruction').val(instruction);
    $('#input-title').val(title);
    $('#input-description').val(description);
    if(question != null){
      tinymce.get("question").setContent(question);
    }
    if(text != null){
      tinymce.get("text").setContent(text);
    }
    $('#question-btn').html("Update Question");
    cmd = "update";
    gototop();
  }
  function form_reset(){
   $('#single-form').trigger("reset");
   $('#other-form').trigger("reset");
   $('#question-btn').html("Add Question");
   cmd = "add";
 }
 function delete_question(test_structure_id){
   $.ajax({
    url: "{{route('add-question-ajax')}}",
    method : "POST",
    data : {
      _token:token,
      test_id : test_id,
      module_id : module_id,
      package_id : package_id,
      section_id : section_id,
      test_structure_id: test_structure_id,
      cmd:"delete"
    },
    success : function (data){
      form_reset();
      $('#question-output').html(data);
    },
    error: function(){

    }
  });
 }

 function delete_multiple_structure(test_structure_id){
   $.ajax({
    url: "{{route('add-multiple-question-ajax')}}",
    method : "POST",
    data : {
      _token:token,
      test_id : test_id,
      module_id : module_id,
      package_id : package_id,
      section_id : section_id,
      test_structure_id: test_structure_id,
      cmd:"delete"
    },
    success : function (data){
      form_reset();
      $('#question-output').html(data);
    },
    error: function(){

    }
  });
 }

</script>
@endpush
