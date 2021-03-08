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
                  <button type="button" style="padding:8px 12px !important" class="btn btn-primary btn-link" data-toggle="modal" data-target="#exampleModalCenter" onclick="edit_answer('{{$questions->id}}')">  <i class="material-icons">close</i>
                    <div class="ripple-container"></div>  
                  Answers</button>
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
