@extends('layouts.minimal')
@push('head-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.3/howler.min.js"></script>
<style type="text/css">

	.online-test-wrapper ol,.online-test-wrapper ul{
		list-style-position:inside;
	}
	.options-wrapper{
		padding:0 13px !important;
		margin-bottom:8px;
	}
	label.options {
		width:31px;
		height:27px;
		margin-right: 8px;
		border-radius:50%;
		border:1px solid #cecece;
		margin:2px;
		display:table;
		line-height:30px;
		text-align:center;

		font-weight:bold;
		font-size:18px;
	}

	.options-text{
		padding-left:15px;
		line-height: 34px;
		max-width:85%;
		word-break:break-word;
	}
	.hide{
		display:none;
	}
	label.options input {display:none;}
	label.options span {color:#cecece;display: table-cell; vertical-align:middle; border-radius:50%;}
	label.options span.checked {background: #4d81a8;}
	label.options input:checked + span {background: #4d81a8;}
	label.options input:selected + span {background: #4d81a8;}
	.questions-list.active div{
		background:#4d81a8;color:white;font-weight: bold;
	}
	.questions-list.done div{
		background:#383535;color:white;font-weight: bold;
	}
	.questions-list.bept{
		width:12.5% !important;
		font-size:12px;
	}
	.questions-list:hover{
		cursor:pointer;
	}
	.question-wrapper{
		padding:0 30px;
	}
	.question-wrapper .card{
		margin-bottom:30px;
	}
	.loading-wrapper{
		width:100%;
		height:100%;
		background:rgba(255, 255, 255, 0.7);
		position: fixed;
		top:0;
		left:0;
		z-index: 1000	;
		display: none;
	}
	.loading-dots {
		text-align: center;
		position: absolute;
		top:50%; 
		left:50%;
		z-index: 2000;
		transform: translate(-40%,-40%);
	}

	.question-title{
		font-size:18px;font-weight: bold;
	}
	.questions-list{
		display:block;text-align:center;padding:7.5px ;float:left;
		white-space: nowrap;

	}
	.questions-list.ielts{
		width:100% !important;
	}
	.questions-list div{
		width:100%;background:black;color:white;height:45px;line-height: 45px;
		overflow-x:hidden;text-overflow: ellipsis;
	}
	#word-counter-wrapper{
		position:absolute;bottom:10px;left:0px;
	}
	#option-output{
		padding:0 10px;
	}
	.dot {
		display: inline;
		margin:0 0.4em !important;
		position: relative;
		top: -1em;
		width:25px !important;
		height:25px !important;
		font-size: 3.5em;
		opacity: 0;
		background-color: #656565 !important;
		animation: showHideDot 2.5s ease-in-out infinite;

	}
	.dot:hover{
		background-color:initial;
	}
	.dot.one { animation-delay: 0.2s; }
	.dot.two { animation-delay: 0.5s; }
	.dot.three { animation-delay: 0.8s; }


	@keyframes showHideDot {
		0% { opacity: 0; }
		50% { opacity: 1; }
		60% { opacity: 1; }
		100% { opacity: 0; }
	}
	

	#text-output table{
		width:100%;
	}
	#multiple_questions-output img{
		width:100% !important;
	}
	.ot-text-img{
		width:100% !important;
	}
	@media screen and (max-width:768px){
		.show-type.introduction > div{
			padding:0 30px;
		}
		.questions-list{
			width:10%;
		}
		.question-title{
			margin-top:15px;
		}
		.questions-list.bept{
			width:50% !important;
		}
	}	
	@media screen and (max-width:480px){
		.online-test-wrapper{
			padding-top:15px;
		}
		.question-wrapper{
		padding:0 15px;
	}
	.question-wrapper .card{
		margin-bottom:15px;
	}
		.show-type.introduction > div{
			padding:0 30px;
		}
		.questions-list{
			width:20% !important;
			font-size:12px;
		}
		.question-title{
			margin-top:15px;
		}


		.questions-list.bept{
			width:50% !important;
		}
	}
	
	#recorder-button {
		border: none;
		cursor: pointer;
		display:block;margin:0 auto;
	}

	#recorder-button-div {
		background-color: red;
		border: 3px solid rgba(0,0,0,.5);
		display:block;margin:0 auto;
		border-radius: 50%;
		height: 80px;
		transition: .3s;
		line-height:70px;
		color:white;
		font-weight:bold;
		text-align:center;
		width: 80px;
	}

	#recorder-button-div:hover {
		opacity: .9;
		transition: .3s;
	}
	input[type="text"]{
		width:83%;
		padding:8px;
		border-radius:5px;
		box-shadow: none;
		border:1px solid #bebebe;
	}
</style>
@endpush
@section('content')
@php
$section = $test_section->get('section');
$structure = $test_section->get('section')->get('structure');
$question = "";
$audio = array();
@endphp
@if($test_section->get('section')->get('type') == "introduction")
@php
$show_type = "introduction";
@endphp
@elseif($test_section->get('section')->get('type') == "question"  || $test_section->get('section')->get('type') == "")
@php
$show_type = "question"
@endphp

@else
@php
$show_type = "question"
@endphp
@endif
<div class="loading-wrapper">
	<div class="loading-dots">

		<h1 class="dot one"></h1><h1 class="dot two"></h1><h1 class="dot three"></h1>
	</div>
</div>
<div class="col-md-12 content-wrapper online-test-wrapper" id="app">
	@csrf
	<div class="row justify-content-center show-type introduction" @if($show_type != 'introduction') @if($structure->question_type == 'instruction')  @else style="display:none" @endif @endif id="introduction-instruction-wrapper">

		<div class="col-md-7"  @if($structure->question_type =="instruction")  @else style="display:none" @endif id="instruction-wrapper">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h2 style="margin-bottom:0"><em id="instruction-section-name">{{$section['name']}}</em></h2> 
							<hr style="margin:5px 0;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="instruction-title">
							{{$structure->title}}
						</div>
						<div class="col-md-12">
							<div style="display: block;margin:auto;" id="instruction-text">
								{!!$structure->text!!}
							</div>
						</div>
						
						<div class="col-md-12 text-center" @if($structure->audio != "") style="display:none" @endif id="instruction-audio-wrapper">

							<button class="btn btn-primary {{$structure->audio != '' ? '' : 'hide'}}" onclick="play_audio_onload(this,'#instruction-audio')" >Play Audio</button> 
							<audio id="instruction-audio" class="instruction-audio" src="{{$structure->audio != '' ? 'https://bestpartnereducation.com/public/'.$structure->audio : ''}}" controls="false" style="display:none;">
									Your browser does not support the audio element.
								</audio> 
							</div>

						</div>
					</div>
					<div class="card-footer">
						<div class="row justify-content-center" id="introduction-btn">
							<button onclick="next_question(this)" class="col-md-2 btn btn-primary"> Start </button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9" @if($structure->question_type =="instruction") style="display:none" @endif id="introduction-wrapper">
				<div class="card">

					<div class="card-header text-center"><h3 id="section-name">{{$test_section->get('section_type_name')}}</h3></div>
					<div class="card-body" style="min-height:300px;">
						<div class="form-group row">
							<div class="col-md-12">
								<strong id="introduction-title"> {{$structure->title}} </strong>	<br>
								<div id="introduction-description">
									{!!$structure->description!!}
								</div>
							</div>
							<div class="col-md-12 text-center"  @if($structure->audio != "") style="display:none" @endif>
								<button class="btn btn-primary" onclick="play_audio_onload(this,'#introduction-audio')">Play Audio</button> 
								<audio id="introduction-audio" class="introduction-audio" src="{{$structure->audio != '' ? 'https://bestpartnereducation.com/public/'.$structure->audio : ''}}" controls="false"  style="display:none;">
										Your browser does not support the audio element.
									</audio> 
								</div>
							</div>

						</div>
						<div class="card-footer">
							<div class="row justify-content-center" id="introduction-btn">
								<button onclick="start_test({{$structure->id}})" class="col-md-2 btn btn-primary start-btn"> Start </button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row show-type question" @if($show_type == 'introduction') style="display:none;" @elseif($structure->question_type == 'instruction') style="display:none;" @endif>
				<div class="col-md-12 question-wrapper">
					<div class="card">
						<div class="card-body" style="max-height: 180px;overflow: auto;">
							<div class="row">
								<div class="col-md-12 text-center">
									<h4>  <span class="section-type-name">{{$test_section->get('section_type_name')}}</span> - Questions List</h4>
								</div>
							</div>
							<div class="row" id="questions-list-output">

								@php
								$alt_number = 1;
								@endphp
								@foreach($structure_list as $keySection => $section)
								<div @if($test_section['test_id'] == '1') style="width:{{ 100 / $structure_list->count()}}%;float:left;padding:0 15px;" @else class="col-md-12" @endif >
									<h5 style="margin-top:0.5rem">{{$section->name}}</h5>
									<div class="row" style="padding:0 7.5px">
										@foreach($section->structures as $key => $value)
										<div class="questions-list {{$test_section['test_id'] == '1' ? 'ielts' : ''}} {{$value->id == $current_structure ? 'active' : ''}} @if($section->structures->count() < 15) bept @else normal @endif" style="width:@if($test_section['test_id'] == '1') 100% @else @if($section->structures->count() < 15 && $section->structures->count() > 3) {{100 / $section->structures->count()}}% @elseif($section->structures->count() <= 3) 33.33333333% @else 6.666666667% @endif @endif">
											<div>
												@if($value->number != "")
												@if($value->question_type == "multiple" || $value->option_type == "essay") @if(is_numeric($value->number)) {{$value->number}} @else
												@php
												$number = str_replace(' ', '',$value->number);
												$number_arr = explode("-",$number);

												@endphp
												Questions 	{{$number_arr[0] != "NaN" || $number_arr[0] == "" ? $number_arr[0] : "" }} {{$number_arr[1] != "NaN" || $number_arr[1] == "" ? " - ".$number_arr[1] : ""}}
												@endif @elseif($value->question_type == "instruction") Instruction @else {{$value->number}}  @endif 
												@else
												{{$value->question_type != "" ? ucwords($value->question_type) : $alt_number}}
												@endif
												@php
												$alt_number += 1;
												@endphp
												

											</div>

										</div>
										@endforeach
									</div>
								</div>


								@endforeach


							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body" style="padding:1.25rem 1rem !important;">
							<div class="row">
								<div class="col-md-12 mb-3">
									<div style="padding:4px 0px;float:left;">
										<h5 style="margin-bottom:0;"><strong> 
											<span id="question_num">
												@if(str_replace(['NaN','-',' '],'',$structure->number))
												No.
												@if(is_numeric($structure->number))
												{{$structure->number}}
												@else
												@php
												$number = str_replace(' ', '',$structure->number);
												$number_arr = explode("-",$number);
												@endphp
												{{$number_arr[0] != "NaN" || $number_arr[0] == "" ? $number_arr[0] : "" }} {{$number_arr[1] != "NaN" || $number_arr[1] == "" ? " - ".$number_arr[1] : ""}}
												@endif
												@endif
											</span></strong></h5>

										</div>

										@if($test_section["duration"] != "" ||  $test_section["duration"] != 0)

										<div style="float:right;">
											<div style="background:#5c6369;color:white;padding:5px 12px;float:left;">
												Sisa Waktu
											</div>
											<div style="background:#4d81a8;color:white;padding:5px 12px;width:120px;text-align:center;float:left;" id="timer">&emsp;</div>

										</div>

										@endif
									</div>
									<div class="col-md-12" style="min-height:350px;border-top:1px solid #ddd;border-bottom:1px solid #ddd;margin-bottom:15px;">

										<div class="row @if($structure->question_type == 'single') @else {{'hide'}} @endif" id="single_question-wrapper">
											<div class="col-md-12   @if($structure->option_type != 'record-audio' || $test_section['section_type_id'] == 1) {{'hide'}} @endif" style="min-height: 300px;padding:80px 15px;" id="record-audio-wrapper">
												<div class="row justify-content-center">
													<div style="display: block;margin:auto;text-align:center;">
														<div><strong id="record-audio-title">{{$structure->title}}</strong></div>
														<div id="record-audio-text">{!!$structure->text!!}</div>
														<div>
															<img @if($structure->image == "") class="hide" @endif src="{{$structure->image != '' ? 'https://bestpartnereducation.com/public/'.$structure->image : ''}}" id="record-audio-image" style="max-width:50%; ">
														</div>
														<div id="speaking-audio-output">
															<button class="btn btn-primary mb-3" onclick="play_audio_onload(this,'#speaking-audio-output #speaking-audio')">Play Audio</button> 
															<audio id="speaking-audio" class="speaking-audio" src="{{$structure->audio != '' ? 'https://bestpartnereducation.com/public/'.$structure->audio : ''}}" controls="false" style="display:none;">
															
																	Your browser does not support the audio element.
																</audio> 
																<br>
																<button id="recorder-button">
																	<div id="recorder-button-div">Record</div>
																</button>
																<div style="margin:15px;"> 
																	<audio id="recorder-audio" src="{{$structure->answers != '' ? 'https://bestpartnereducation.com/public/'.$structure->answers : ''}}" @if($structure->answers != "") {{'controls'}}@endif>
																			Your browser does not support the audio element.
																		
																		</audio>
																	</div>
																</div>
															</div>
															<div class="col-md-12"></div>
														</div>

													</div>

													<div class="col-md-12 @if($structure->option_type == 'record-audio' && $test_section['section_type_id'] != 1) hide @endif" id="no-record-wrapper"> <!--Jangan pakek padding disini-->

														<div class="row" id="single-question1" @if(($test_section['section_type_id'] == 1 || $structure->text == "") && $test_section['test_id'] == 2)  @else style='display:none' @endif >

															<div class="col-md-12" style="padding:15px;">

																<div id="single-audio-output" class="audio-output">
																	
																	@php
																	array_push($audio,array('file' => 'https://bestpartnereducation.com/public/'.$structure->audio,'howl' => null));
																	@endphp


																	<button class="btn btn-primary mb-3" onclick="play_audio_onload(this,'#single-audio-output #question-audio')">Play Audio</button>

																	<audio id="question-audio" class="question-audio" src="{{$structure->audio != '' ? 'https://bestpartnereducation.com/public/'.$structure->audio : ''}}" onended="next_question()" controls="controls" style="display:none">
																			Your browser does not support the audio element.
																		</audio> 
												<!--<div id="audio_timer">0:00</div>
												<div class="controlsOuter">
													<div class="controlsInner">
														<div id="loading"></div>
														<div class="btn btn-primary" id="playBtn" > Play Audio</div>
														<div class="btn btn-primary" id="pauseBtn" >Pause Audio</div>
													</div>
													<div class="btn" id="playlistBtn"></div>
													<div class="btn" id="volumeBtn"></div>
												</div>-->
											</div>
											<div class="question-title">
												<div id="question-output"> 
													@if($structure->question_type == "single")
													@php 
													$question = $structure->questions->first();
													@endphp
													@endif
													@if($question != "")
													@if($question->question != "" && $question->question != null) 
													<span style="float:left;margin-right:10px;"> Q : </span> {!!$question->question!!} @endif 
													@endif
												</div>
											</div>
											<div id="option-output">

												@if($question != "") 
												@if(!$question->options->isEmpty())
												@foreach($question->options as $key => $value)
												
												<div class="row options-wrapper">
													<label class="options">
														<input type="radio" name="answer" class="answer" value="{{$value->id}}" {{ $structure->answer_id == $value->id ? 'checked' : '' }}>
														<span class="{{ $structure->answer_id == $value->id ? 'checked' : '' }}"> {{chr(65+$key)}} </span>
													</label>

													<div class="options-text" >{{$value->option}} </div>
												</div>
												@endforeach
												@endif


												@endif
											</div>
										</div>
									</div>
									<div class="row" @if($test_section['section_type_id'] != 1 && ($structure->text != "" || $structure->option_type == "essay")) @else style='display:none' @endif id="single-question2">

										<div class="col-md-6" style="max-height:400px;overflow:auto;border-right:1px solid #dedede;min-height: 400px;padding:15px;">

											<div id="single-audio-output2" class="audio-output">
												@php
												array_push($audio,array('file' => 'https://bestpartnereducation.com/public/'.$structure->audio,'howl' => null));
												@endphp

												<audio id="question-audio" class="question-audio" src="{{$structure->audio != '' ? 'https://bestpartnereducation.com/public/'.$structure->audio : ''}}" onended="next_question()" controls="false" style="display:none">
														Your browser does not support the audio element.
													</audio> 
												</div>



												<div class="question-title left-section essay" @if($structure->option_type != 'essay') style="display:none"@endif>
													<div id="question-output"> 
														@if($structure->question_type == "single")
														@php 
														$question = $structure->questions->first();
														@endphp
														@endif
														@if($question != "")
														@if($question->question != "" && $question->question != null) 
														<span style="float:left;margin-right:10px;"> Q : </span> {!!$question->question!!} @endif 
														@endif
													</div>
												</div>


												<div id="text-output" class="left-section" @if($structure->option_type == 'essay') style="display:none" @endif>
													@if($structure->text)
													<br>
													{!! $structure->text !!}
													@endif
												</div>


											</div>

											<div class="col-md-6 right-section essay" style="padding:0 !important;@if($structure->option_type != 'essay') display:none; @endif">

												<textarea class="form-control" id="essay_answer" name="essay_answer" style="border-radius:0;border:none;width:100%;height:100%;resize: none" placeholder="Write your answer here...">{{$structure->answers}}</textarea>
												<div class="col-md-12" id="word-counter-wrapper"><span id="word-counter"></span> Words</div>
											</div>

											<div class="col-md-6 right-section" style="padding:0 30px;@if($structure->option_type == 'essay') display:none; @endif">
												<div class="question-title">
													<div id="question-output"> 
														@if($structure->question_type == "single")
														@php 
														$question = $structure->questions->first();
														@endphp
														@endif
														@if($question != "")
														@if($question->question != "" && $question->question != null) 
														<span style="float:left;margin-right:10px;"> Q : </span> {!!$question->question!!} @endif 
													@endif</div>
												</div>
												<div id="option-output">

													@if($question != "") 
													@if(!$question->options->isEmpty())
													@foreach($question->options as $key => $value)
													<div class="row options-wrapper">
														<label class="options">

															<input type="radio" name="answer" class="answer" value="{{$value->id}}" {{ $structure->answer_id == $value->id ? 'checked' : '' }}>
															<span class="{{ $structure->answer_id == $value->id ? 'checked' : '' }}"> {{chr(65+$key)}} </span>
														</label>

														<div class="options-text" >{{$value->option}} </div>
													</div>
													@endforeach
													@endif


													@endif
												</div>
											</div>

										</div>
									</div>

								</div>


								<div class="row @if($structure->question_type == 'multiple') @else {{'hide'}} @endif" id="multiple_questions-wrapper">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6" style="padding:15px;max-height:400px;overflow:auto;border-right:1px solid #dddddd;">
												<div class="form-group" id="multiple-audio-output" class="audio-output">
													@php
													//array_push($audio,array('file' => 'https://bestpartnereducation.com/public/'.$structure->audio,'howl' => null));
													@endphp
													<button class="btn btn-primary" onclick="play_audio_onload(this,'#multiple-audio-output #question-audio')">Play Audio</button>
													<audio id="question-audio" class="question-audio"  src="{{$structure->audio != '' ? 'https://bestpartnereducation.com/public/'.$structure->audio : ''}}"  autostart="true" onended="next_question()" controls="false" style="display:none;">
														
															Your browser does not support the audio element.
														</audio> 
													</div>
													<div id="text-output">
														@if($structure->text)
														{!! $structure->text !!}												
														<br>
														@endif
													</div>

												</div>
												<div class="col-md-6" style="padding:15px 30px;max-height:400px;overflow:auto;">
													<div id="multiple_questions-output"> {!!$structure->multiple_questions!!}</div>
													<div id="question-output">

														@foreach($structure->questions as $question)
														@if($question->option_type == "text" || $question->option_type == "" || $structure->question_type == "multiple")
														<p> 
															@if($question->number != "")
															<span style="margin-right:15px;">{{$question->number}}</span> 
															@endif
															@if($question->question != "")
															<div style="margin-right:15px;">{!!$question->question!!}</div> 
															@endif
															<input type="text"  autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-question-id="{{$question->id}}" name="multiple-answers[]" class="multiple_answers" style="text-transform: uppercase;" value="{{$question->answer}}">  
														</p>
														@endif
														@endforeach
													</div>

													<div id="option-output">

														@if($question != "") 
														@if(!$question->options->isEmpty())
														@foreach($question->options as $key => $value)
														<div class="row options-wrapper">
															<label class="options">

																<input type="radio" name="answer" class="answer" value="{{$value->id}}" {{ $structure->answer_id == $value->id ? 'checked' : '' }}>
																<span> {{chr(65+$key)}} </span>
															</label>

															<div class="options-text" >{{$value->option}} </div>
														</div>
														@endforeach
														@endif


														@endif
													</div>
												</div>
											</div>


										</div>

									</div>
								</div>

								<div class="col-md-12 button-wrapper">
									<button type="button" id="prev-btn" class="btn btn-secondary" style="display:	@if(($structure->audio == '' || $structure->option_type='record-audio' ) && (($current_index == 0 && $current_section_index > 1) || ($current_index != 0 && $current_section_index == 0))) inline-block @else none  @endif" onclick="prev_question(this)"> Soal Sebelumnya</button>

									<div id="button-wrapper" style="float:right">

										<!--<button type="button" class="btn btn-success" onclick="finish_test()">Selesai</button> -->

										<button type="button" class="btn btn-primary" id="next-btn" onclick="next_question(this)">Soal Selanjutnya</button>

									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div id="test"></div>
		@push('more-script')
		<script src="{{'https://bestpartnereducation.com/public/js/web_audio_recorder_js/WebAudioRecorder.js'}}"></script>
		<script>

			var audioFile = "";
			@if($structure->answers != "")
			var xhr = new XMLHttpRequest();
			xhr.open('GET', '{{asset($structure->answers)}}', true);
			xhr.responseType = 'blob';
			xhr.onload = function(e) {
				if (this.status == 200) {
					audioFile = this.response;
				}
			};
			xhr.send();
			@endif
    let recorderButton = document.getElementById('recorder-button'); // the button to start and stop the recording
let recorderButtonDiv = document.getElementById('recorder-button-div'); // the styled div that looks like a record button 
let audioElement = document.getElementById('recorder-audio'); // the audio element that we will feed our recording to
let webAudioRecorder; // our WebAudioRecorder.js recorder yet to be instantiated
let currentlyRecording = false; // a boolean to keep track of whether recording is taking place
let getUserMediaStream; // our stream from getUserMedia
console.log(recorderButton);

// listen for clicks on the record button to begin the stream and recording
recorderButton.addEventListener('click', () => {
  // the options object determining what media type(s) to capture
  let options = { 'audio': true, 'video': false };
  // only start the recording stream if there is not another recording in progress
  if (currentlyRecording === false) {
    // the built-in method for capturing audio/video from the user's device
    // pass in the media capture options object and ask for permission to access the microphone
    navigator.mediaDevices.getUserMedia(options)
    .then(stream => {

    	currentlyRecording = true;
      // if this is a subsequent recording, hide the HTML audio element
      audioElement.controls = false;
      // change the div inside the button so that it looks like a stop button
      recorderButtonDiv.style.backgroundColor = 'rgba(0,0,0,.3)';
      recorderButtonDiv.style.borderRadius = 0;
      recorderButtonDiv.innerHTML  = "Stop";
      // set this to stream so that we can access it outside the scope of the promise 
      // when we need to stop the stream created by getUserMedia 
      getUserMediaStream = stream;
      // the AudioContext that will handle our audio stream
      // if you're in Safari or an older Chrome, you can't use the regular audio context so provide this line to use webkitAudioContext
      let AudioContext = window.AudioContext ||  window.webkitAudioContext;
      let audioContext = new AudioContext();
      // an audio node that we can feed to a new WebAudioRecorder so we can record/encode the audio data
      let source = audioContext.createMediaStreamSource(stream);
      // the creation of the recorder with its settings:
      webAudioRecorder = new WebAudioRecorder(source, {
        // workerDir: the directory where the WebAudioRecorder.js file lives
        workerDir: '{{asset('js/web_audio_recorder_js/')}}',
        // encoding: type of encoding for our recording ('mp3', 'ogg', or 'wav')
        encoding: 'mp3',
        options: {
          // encodeAfterRecord: our recording won't be usable unless we set this to true
          encodeAfterRecord: true,
          // mp3: bitRate: '160 is default, 320 is max quality'
          mp3: { bitRate: '320' }
      }
  });
      // the method that fires when the recording finishes (triggered by webAudioRecorder.finishRecording() below)
      // the blob is the encoded audio file
      webAudioRecorder.onComplete = (webAudioRecorder, blob) => {

        // create a temporary URL that we can use as the src attribute for our audio element (audioElement)
        let audioElementSource = window.URL.createObjectURL(blob);
        // set this URL as the src attribute of our audio element
        audioFile = blob;
        audioElement.src = audioElementSource;
        // add controls so we can see the audio element on the page
        audioElement.controls = true;
        // reset the styles of the button's child div to look like a record button
        recorderButtonDiv.style.backgroundColor = 'red';
        recorderButtonDiv.style.borderRadius = '50%';
        recorderButtonDiv.innerHTML  = "Record";
        $('.loading-wrapper').hide();
    }
      // handles and logs any errors that occur during the encoding/recording process
      webAudioRecorder.onError = (webAudioRecorder, err) => {
      	console.error(err);
      }
      // method that initializes the recording
      webAudioRecorder.startRecording();
  })
    // catch and log any errors in getUserMedia's promise
    .catch(err => {
    	console.error(err);
    });
}
else {
	$('.loading-wrapper').show();
    // set this to the array of audio tracks in our getUserMedia stream. In this case we only have one.
    let audioTrack = getUserMediaStream.getAudioTracks()[0];

    // stop that track and end the stream
    // this is not absolutely necessary, but it stops the browser streaming audio inbetween recordings so you should probably do it
    audioTrack.stop();
    // this finishes things up and calls webAudioRecorder.onComplete
    webAudioRecorder.finishRecording();
    currentlyRecording = false;
}
});
</script>
<script type="text/javascript">

	var timeout = '{{$section_timeout }}';
	var now = '{{\Carbon\Carbon::now()->timestamp }}';
	var timerDisplay = $('#timer');	
	var timer_on = '{{$test_section["duration"]}}';
	var url = 'https://bestpartnereducation.com/public/';
	var audioSource = {!!json_encode($audio)!!};
	var audio_duration = document.getElementById('duration'); 
	var audio_timer = document.getElementById('audio_timer'); 
	var question_type = '{{$structure->question_type}}';
	var option_type = '{{$structure->option_type}}';
	var question_wrapper = "";
	var onloadTimer;
	document.addEventListener('contextmenu', event => event.preventDefault());
	$(window).keydown(function(e){
		if (e.keyCode === 114 || ((e.ctrlKey || e.metaKey) && e.keyCode === 70)) {
			e.preventDefault();
		}
	});


$(".question-audio").bind('ended', function(){

    next_question();
});



let input_essay = document.getElementById('essay_answer');
$("document").ready(function(){
	if(input_essay.value == ""){
		$('#word-counter').html(0);
	}else{
		$('#word-counter').html(input_essay.value.trim().split(/\s+/).length);
	}
});
// Init a timeout variable to be used below
let timeout_input_essay = null;

// Listen for keystroke events
input_essay.addEventListener('keyup', function (e) {
    // Clear the timeout if it has already been set.
    // This will prevent the previous task from executing
    // if it has been less than <MILLISECONDS>
    clearTimeout(timeout_input_essay);

    // Make a new timeout set to go off in 1000ms (1 second)
    timeout_input_essay = setTimeout(function () {
    	$('#word-counter').html(input_essay.value.trim().split(/\s+/).length);
    }, 1000);
});

function once(fn, context) {
	//fn tuh isinye function dpt dr fungsi sblmnye
	var result;

	return function() {
		if (fn) {
	        // kalau functionnya fn true
	        result = fn.apply(context || this, arguments);
	        fn = null;
	        //fnnye di ubah jd null maka dari itu niali fn diatas bkln selalu false karena null = false
	    }else{
	    	alert('You can only play audio once');
	    }
	    return result;
	};
}

    // function ini sendiri dimasukan ke once
    var audioOnce = once(function(evt,id) {
    	$(id)[0].play(); 
    	$(evt).hide(); 
    });

    function playSound(url) {
        return new Promise(function(resolve, reject) {
            var audio = new Audio();
            audio.prelopad = "auto";
            audio.autoplay = true;
            audio.addEventListener("error", reject);
            audio.addEventListener("ended", resolve);
            audio.src = url;
            audio.play();

        });
    }

    function play_audio_onload(evt,id){
    	// var playPromise = playSound($(id + " > source")[0].src);
    	var playPromise = $(id)[0].play(); 
	    console.log(playPromise);
	    if (playPromise !== undefined) {
	  playPromise.then(function() {
	    // Automatic playback started!
	        	$(evt).hide(); 
	  }).catch(function(error) {

	    // Automatic playback failed.
	    // Show a UI element to let the user manually start playback.
	  });
	}
    	//audioOnce(evt,id);
	
    }



    var token = $("input[name='_token']").val();
    function makeInteger(time,x,mod){
    	var time = Math.floor(time/x) % mod;
    	if(time < 10){
    		time = "0" + time;
    	}
    	return time;
    }




    $(document).ready(function(){
    	if(timeout > 0 && timeout != null && timer_on > 0 && !((onloadTimer != undefined && onloadTimer != null) && typeof onloadTimer === 'object')) {
    		start_timer(now,timeout);
    	}
    }
    );


    $(document).ready(function(){
    	$('input[name=answer]').on('change',function(){
    		$(".options span.checked").removeClass('checked');
    	});
    });
/*	var promise = audio.play();
	if (promise !== undefined) {
		promise.then(_ => {
			audio.play();
		}).catch(error => {
    // Autoplay was prevented.
    // Show a "Play" button so that user can start playback.
});
}*/

function interval(duration, fn){
	var _this = this
	this.baseline = undefined

	this.run = function(){
		if(_this.baseline === undefined){
			_this.baseline = new Date().getTime()
		}
		fn()
		var end = new Date().getTime()
		_this.baseline += duration

		var nextTick = duration - (end - _this.baseline)
		if(nextTick<0){
			nextTick = 0
		}

		_this.timer = setTimeout(function(){
			_this.run(end)
		}, nextTick)
	}

	this.stop = function(){
		clearTimeout(_this.timer);
		onloadTimer = null;
	}
}

function section_timeout(){
	alert('Time Out');    	
	$.ajax({
		url : "{{route('section-timeout')}}",
		method : "GET",
		data : {
			_token : token,
		},
		success : function(data){
			question_render(data);
		},
		error :function(){
			alert('error');
		},complete: function(){
			$('.loading-wrapper').hide();
		}
	});
	
}

function start_timer(start_section_time,section_timeout_time){
	
	if((onloadTimer != undefined && onloadTimer != null) && typeof onloadTimer === 'object'){
		onloadTimer.stop();
	}
	var timer = (section_timeout_time - start_section_time);

	onloadTimer = new interval(1000, function(){
		
		if(timer >= 0 && timer_on >= 0){
			timer--; 
			var hours = makeInteger(timer,60 * 60,99),
			minutes = makeInteger(timer,60,60),
			seconds = makeInteger(timer,1,60);
			timerDisplay.html( hours + ":" + minutes + ":" + seconds);
		}else{
			timerDisplay.html("&nbsp;");
			onloadTimer.stop();
			onloadTimer = null;
			section_timeout();
		}
		
	});
	onloadTimer.run()
}




function start_test(structure_id){
	$(".start-btn").prop('disabled',true);
	$.ajax({
		url : "{{route('start-section-test')}}",
		method : "GET",
		data : {
			_token : token,
			structure_id : structure_id,
		},
		success : function(data){
			question_render(data);
		},
		error :function(){
			alert('error');
		},complete: function(){

			$('.loading-wrapper').hide();
			$(".start-btn").prop('disabled',false);
		}
	});
}

function question_render(data){

	if(data.trim() == "finish"){
		location.href = "{{route('student-finish-test')}}";
	}else{
		data = JSON.parse(data);
		var test_section = data;
		var section = test_section.section;
		var structure = section.structure;
		var structure_list = data.structure_list;
		var structure_list_output = "";
		if(test_section.section_timeout){
			timerDisplay.html("&nbsp;");
			if(test_section.test_id != 1){
				start_timer(test_section.start_section_time,test_section.section_timeout);
			}
		}
		if(structure_list.length != 0){
			$("#questions-list-output").html("");
			$('.section-type-name').html(test_section.section_type_name);
			var structure_list_output = "";
			var alt_number = 1;
			$.each(structure_list,function(k,v){
				if(test_section.test_id == "1"){

					structure_list_output += '<div style="width:'+ (100/structure_list.length) +'%;float:left;padding:0 15px;">' +
					'<h5 style="margin-top:0.5rem">'+ v.name +'</h5>'+
					'<div class="row" style="padding:0 7.5px">';
					if(structure_list[k].structures.length != 0){


						$.each(structure_list[k].structures,function(k2,v2){
							
							var structures_len = structure_list[k].structures.length;
							structure_list_output += '<div class="questions-list multiple ';
							if(data.current_structure == v2.id){
								structure_list_output += ' active';
							}
							structure_list_output+= '" ';
							if(structures_len < 15){
								structure_list_output += 'style="width:'+ (100/structures_len) +'%"';
							}else{
								structure_list_output += 'style="width:666666667%';
							}
							
							structure_list_output +='"';
							if(structures_len < 15){
								structure_list_output += ' style="width:'+ (100/structures_len) +'%"';
							}else{
								structure_list_output += ' style="width:6.66666667%"';
							}
							structure_list_output +=' >' +
							'<div> Questions ';
							
							if(v2.number != "" && typeof(v2.number) !== "undefined" && v2.number != "UNDEFINED" && v2.number != null){
								structure_list_output += v2.number;
							}else{
								structure_list_output += alt_number;
							}

							structure_list_output += '</div>' +
							'</div>';
							alt_number++;
						});
					}
					structure_list_output += '</div>' +
					'</div>';
				}else{
					structure_list_output += '<div class="col-md-12" >' +
					'<h5 style="margin-top:0.5rem">'+ v.name +'</h5>'+
					'<div class="row" style="padding:0 7.5px">';
					if(structure_list[k].structures.length != 0){

						$.each(structure_list[k].structures,function(k2,v2){

							var structures_len = structure_list[k].structures.length;
							structure_list_output += '<div class="questions-list ';					
							if(data.current_structure == v2.id){
								structure_list_output += 'active';
							}

							if(structure_list[k].structures.length < 15){
								structure_list_output += ' bept';
							}
							structure_list_output +='"';
							if(structures_len < 15 && structures_len > 3){
								structure_list_output += ' style="width:'+ (100/structures_len) +'%"';
							}else if(structures_len <= 3){
								structure_list_output += 'style="width:33.3333333%"';
							}else{
								structure_list_output += ' style="width:6.66666667%"';
							}
							structure_list_output +=' >' +
							'<div>';
							if(v2.question_type == "multiple" || v2.option_type == "essay")
							{
								var number = v2.number.trim().replace(/\s/g,'');
								number = number.split('-');
								var first_number = number[0];
								var last_number = number[1];
								structure_list_output += "Questions ";
								if(first_number != "NaN"){
									structure_list_output += first_number;
								}
								if(last_number != "NaN"){
									structure_list_output += " - "+last_number;
								}
							}else if(v2.question_type == "instruction"){
								structure_list_output += 'Instruction';
							}else{
								structure_list_output += v2.number;
							}

							structure_list_output+=
							'</div>' +
							'</div>' ;

						});
						
					}

					structure_list_output += '</div>' +
					'</div>';
				}
				$('#questions-list-output').html(structure_list_output);
			});
		}
		setTimeout(function(){$('.loading-wrapper').hide()}, 1000);
		if(section.type == "introduction" || structure.question_type == "instruction"){
			var audio_stop = document.getElementsByClassName('question-audio');
			for(var i = 0, len = audio_stop.length; i < len;i++){
				audio_stop[i].pause();  
				audio_stop[i].currentTime = 0;
			}
			clearInterval(onloadTimer);
			$('.show-type').hide();
			$('.show-type.introduction').show();
			
			if(structure.question_type == "instruction"){
				$('#introduction-wrapper').hide();
				$('#instruction-wrapper').show();
				$('#instruction-section-name').html(test_section.section_type_name);
				$('#instruction-title').html(structure.title);
				$('#instruction-text').html(structure.text);
				$('#instruction-audio-wrapper').show();
				$("#instruction-audio").attr("src",url+structure.audio);
			}else{
				$('#introduction-wrapper').show();
				$('#instruction-wrapper').hide();
				$('#section-name').html(test_section.section_type_name);
				$('#introduction-title').html(structure.title);
				$('#introduction-description').html(structure.description);
				$('#introduction-btn').html("<button onclick='start_test("+structure.id+")' class='col-md-2 btn btn-primary start-btn'> Start </button>");
			}


		}
		else{
			$('#introduction-instruction-wrapper').hide();
			$('.show-type.question').show();

			question_type = structure.question_type;
			option_type = structure.option_type;

			if(structure.question_type == "multiple"){
				$('#multiple_questions-wrapper').show();
				$('#single_question-wrapper').hide();

			}else if(structure.question_type == "single"){
				$('#multiple_questions-wrapper').hide();
				$('#single_question-wrapper').show();
				if(structure.option_type == "record-audio"){

					$('#record-audio-wrapper').show();
					$('#no-record-wrapper').hide();
					$('#record-audio-title').html(structure.title);
					$('#record-audio-text').html(structure.text);
					if(structure.image == "" || structure.image == null){
						$('#record-audio-image').addClass('hide');
					}else{
						$('#record-audio-image').removeClass('hide');
						$("#record-audio-image").attr("src",url+structure.image);
					}
					if(structure.answers != "" && typeof(structure.answers) !== "undefined" && structure.answers != "UNDEFINED"){
						audioElement.controls = true;
						audioElement.src = url+structure.answers;
					}else{
						audioElement.controls = false;
						audioElement.src = "";
					}
				}else{
					$('#record-audio-wrapper').hide();
					$('#no-record-wrapper').show();
					if(test_section.section_type_id == 1 || structure.text == "" || (structure.text == null && structure.option_type != "essay")){
						$('#single_question-wrapper #single-question1').show();
						$('#single_question-wrapper #single-question2').hide();
						question_wrapper = '#single_question-wrapper #single-question1 ';
					}else if(test_section.section_type_id != 1 && ((structure.text !=null  || structure.text != "") || structure.option_type == "essay")){
						$('#single_question-wrapper #single-question1').hide();
						$('#single_question-wrapper #single-question2').show();
						question_wrapper = '#single_question-wrapper #single-question2 ';

						if(structure.option_type == "essay"){

							$(question_wrapper + ' #essay_answer').val("");
							$('.left-section').hide();
							$('.left-section.essay').show();	
							$('.right-section').hide();
							$('.right-section.essay').show();	
							var txt = document.createElement('textarea');
							txt.innerHTML = structure.answers;
							if(typeof(structure.answers) === "undefined" || structure.answers == "UNDEFINED"){
								txt.value = "";
							}
							$(question_wrapper + ' #essay_answer').val(txt.value);
							if($(question_wrapper + ' #essay_answer').val() == ""){
								$('#word-counter').html(0);
							}else{
								$('#word-counter').html($(question_wrapper + ' #essay_answer').val().trim().split(/\s+/).length);
							}

						}
					}
				}
			}
			var audioOutput = "";

			if((structure.audio != "" && structure.audio != null && structure.option_type != 'record-audio') || test_section.section_type_id == 1){
				$('#prev-btn').css({display: 'none'});
				// var audioOutput = "<audio controls id='question-audio' class='question-audio' onended='next_question()'>" +
				// "<source src='"+ url + structure.audio +"' type='audio/ogg'>" + 
				// "Your browser does not support the audio element." +
				// "</audio>";
				var audioOutput = url+structure.audio;

			}else{
	    /*
	    ($current_index == 0 && $current_section_index > 1) || ($current_index != 0 && $current_section_index == 0))
	    */
	    if(test_section.current_index > 0 || (test_section.current_index == 0 && test_section.current_section_index > 1)){

	    	$('#prev-btn').css({display: 'inline-block'});
	    }else{
	    	$('#prev-btn').css({display: 'none'});
	    }
	    $('.audio-output').html("");
	}

	if(structure.question_type == "single"){


		var single_question = structure.questions[0];
		if(single_question.question != "" && single_question.question != null){
			$(question_wrapper + '#question-output').html("<span style='float:left;margin-right:10px;'> Q : </span>" + single_question.question);
		}else{
			$(question_wrapper + '#question-output').html("");
		}
		var options = single_question.options;
		if(options.length > 0){

			var option_output = "";
			$.each(options,function(k,v){ 

				option_output += '<div class="row options-wrapper">'+
				'<label class="options">' +

				'<input type="radio" name="answer" class="answer" value="'+v.id+'" ';
				if(structure.answer_id == v.id){
					option_output += 'checked';
				}
				option_output +='>' +
				'<span> '+ String.fromCharCode(65+k) +' </span>' +
				'</label>' +

				'<div class="options-text" >'+v.option+'</div>' +
				'</div>';

			});
			$(question_wrapper + '#option-output').html(option_output);
		}
		
		if(audioOutput != ""){
			$(question_wrapper + '#single-audio-output #question-audio').prop("src",audioOutput);	
			var playPromise = $(question_wrapper + "#single-audio-output #question-audio")[0].play();
			console.log(playPromise);

			if (playPromise instanceof Promise) {
  playPromise.catch(function(error) {
    console.log(error.message);
    // Check if it is the right error
    if (error.name === 'NotAllowedError') {
      autoPlayAllowed = false;
    } else {
      // Don't throw the error so that we get to the then
      // or throw it but set the autoPlayAllowed to true in here
    }
  }).then(function() {
    if (autoPlayAllowed) {
      // Autoplay is allowed - continue with initialization
      console.log('autoplay allowed');
        $(question_wrapper + "#single-audio-output #question-audio").hide();
    } else {
      // Autoplay is not allowed - wait for the user to trigger the play button manually
      console.log('autoplay NOT allowed')
    }
  });

} else {
  // Unknown if allowed
  // Note: you could fallback to simple event listeners in this case
  console.log('autoplay unknown')
}
			
			
		}
		$(question_wrapper+'#text-output').html(structure.text);
	}else if(structure.question_type == "multiple"){
		var multiple_questions = structure.questions;
		var question_output = "";
		var answer = "";
		$.each(multiple_questions,function(k,v){ 
			if(typeof(v.answer) === "undefined" || v.answer == "UNDEFINED"){
				answer = "";
			}else{
				answer = v.answer;
			}		
			question_output += '<p>';
			if(v.number != "" && v.number != null){
				question_output += '<span style="margin-right:15px">' + v.number+'</span>';
			}
			if(v.question != "" && v.question != null){
				question_output += v.question;
			}
			question_output +='<input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-question-id="'+v.id+'" name="multiple-answers[]" class="multiple_answers" style="text-transform: uppercase;" value="'+answer+'">  </p>';
		});
		$('#multiple_questions-wrapper #question-output').html(question_output);
		if(structure.text != ""){
			$('#multiple_questions-wrapper #text-output').html(structure.text);
		}
		if(audioOutput != ""){
			$(question_wrapper + '#multiple-audio-output #question-audio').prop("src",audioOutput);
			var playPromise = $("#multiple-audio-output #question-audio")[0].play();
			console.log(playPromise);
			if (playPromise !== undefined) {
				playPromise.then(function() {
			    // Automatic playback started!
			    $("#multiple-audio-output #question-audio").hide();
			}).catch(function(error) {
			    // Automatic playback failed.
			    // Show a UI element to let the user manually start playback.
			});
			}
		
		}
	}
	if(structure.multiple_questions != null){
		$('#multiple_questions-output').html(structure.multiple_questions);
	}else{
		$('#multiple_questions-output').html("");
	}
	
	var number_output = "";
	if(structure.number != null){
	if(isNaN(structure.number)){
		var number_output = structure.number;
	}

	var number = structure.number.trim().replace(/\s/g,'');
	var number_output = "";
	number = number.split('-');
	var first_number = number[0];
	var last_number = number[1];
	if(first_number != "NaN"){
		number_output += "No." + first_number;
	}
	if(last_number != "NaN" && last_number != undefined){
		number_output += " - "+last_number;
	}
	}
	$('#question_num').html(number_output);

}
}
}

function next_question(obj = null){
	//alert tidak bisa back
	if(obj != null){
		$(obj).prop('disabled',true);
	}
	var answers = "";
	$('.loading-wrapper').show();
	var token = $("input[name='_token']").val();
	var	answer_type = "";
	if(question_type == "single"){
		if(option_type == "essay"){
			//var div = document.createElement('div');
			//div.textContent = $(question_wrapper + ' #essay_answer').val();
    		//var answers = div.innerHTML;
    		answers = $(question_wrapper + ' #essay_answer').val();
    		answer_type = "essay";


    	}else if(option_type == "record-audio"){
    		if(currentlyRecording){
    			$('.loading-wrapper').show();

    			let audioTrack = getUserMediaStream.getAudioTracks()[0];

    			audioTrack.stop();
    			webAudioRecorder.finishRecording();
    			currentlyRecording = false;

    		}
    		answers = audioFile;
    		answer_type = "file";

    	}else{
    		answer = $(question_wrapper + ' #option-output input[name=answer]:checked');
    		var question_id = $(question_wrapper +' #question_id').val();
    		if(answer.length != 0){
    			answers = $(question_wrapper + ' #option-output input[name=answer]:checked').val();
    			answer_type = "options";
    		}
    	}
    }else if(question_type == "multiple"){
    	answers = [];
    	var answer = document.getElementsByName('multiple-answers[]');
    	answer.forEach(function(item,index){
    		answers.push({ 
    			"answers" : item.value.replace(/\s\s+/g, ' ').trim(),
    			"question_id" : item.getAttribute("data-question-id")
    		});	
    	});
    	answers = JSON.stringify(answers);

    }
    var formData = new FormData();
    formData.append('_token', token);
    if(audioFile != ""){
    	formData.append('answers', audioFile,"audio");
    }else{
    	formData.append('answers',answers)
    }
    formData.append('answer_type', answer_type);
    formData.append('question_type', question_type);

    $.ajax({
    	url : "{{route('student-next-question')}}",
    	method : "POST",
        processData: false,  // Important!
        contentType: false,
        data :formData,
        success: function(data){
        	question_render(data);

        },
        error: function(jqXHR, textStatus, errorThrown){

        	if(textStatus==="timeout") {
        		alert('Please try again, if the problem still exist refresh / press F5');
        		location.reload();
        	} 
        }
        ,complete: function(){
        	if(obj != null){
        		$(obj).prop('disabled',false);
        	}
        	$('.loading-wrapper').hide();
        },
        timeout: 12000

    });

}
function prev_question(obj = null){
	if(obj != null){
		$(obj).prop('disabled',true);
	}
	var answers = "";
	$('.loading-wrapper').show();
	var token = $("input[name='_token']").val();
	var	answer_type = "";
	if(question_type == "single"){
		if(option_type == "essay"){
			//var div = document.createElement('div');
			//div.textContent = $(question_wrapper + ' #essay_answer').val();
    		//var answers = div.innerHTML;
    		answers = $(question_wrapper + ' #essay_answer').val();
    		answer_type = "essay";


    	}else if(option_type == "record-audio"){
    		if(currentlyRecording){
    			$('.loading-wrapper').show();

    			let audioTrack = getUserMediaStream.getAudioTracks()[0];

    			audioTrack.stop();
    			webAudioRecorder.finishRecording();
    			currentlyRecording = false;

    		}
    		answers = audioFile;
    		answer_type = "file";

    	}else{
    		answer = $(question_wrapper + ' #option-output input[name=answer]:checked');
    		var question_id = $(question_wrapper +' #question_id').val();
    		if(answer.length != 0){
    			answers = $(question_wrapper + ' #option-output input[name=answer]:checked').val();
    			answer_type = "options";
    		}
    	}
    }else if(question_type == "multiple"){
    	answers = [];
    	var answer = document.getElementsByName('multiple-answers[]');
    	answer.forEach(function(item,index){
    		answers.push({ 
    			"answers" : item.value.replace(/\s\s+/g, ' ').trim(),
    			"question_id" : item.getAttribute("data-question-id")
    		});	
    	});
    	answers = JSON.stringify(answers);

    }
    var formData = new FormData();
    formData.append('_token', token);
    if(audioFile != ""){
    	formData.append('answers', audioFile,"audio");
    }else{
    	formData.append('answers',answers)
    }
    formData.append('answer_type', answer_type);
    formData.append('question_type', question_type);


    $.ajax({
    	url : "{{route('student-prev-question')}}",
    	method : "POST",
    	  processData: false,  // Important!
    	  contentType: false,
    	  data :formData,
    	  success: function(data){
    	  	question_render(data);
    	  },
    	  error: function(jqXHR, textStatus, errorThrown){
    	  	if(textStatus==="timeout") {
    	  		alert('Please try again, if the problem still exist refresh / press F5');
    	  		location.reload();
    	  	} 
    	  },complete: function(){
    	  	if(obj != null){
        		$(obj).prop('disabled',false);
        	}
    	  	$('.loading-wrapper').hide();
    	  },

    	  timeout: 12000
    	});
}
</script>
@endpush
@stop
