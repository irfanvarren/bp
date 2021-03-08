@extends('layouts.bp_wo_sidenav')
@push('head-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.3/howler.min.js"></script>
<style type="text/css">
	ol,ul{
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
		max-width:86%;
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
	.questions-list:hover{
		cursor:pointer;
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
	}
	.questions-list.ielts{
		width:100% !important;
	}
	.questions-list div{
		width:100%;background:black;color:white;height:45px;line-height: 45px;
		padding:0 15px;
	}
	#word-counter-wrapper{
		position:absolute;bottom:10px;left:0px;
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

	.multiple_questions-wrapper .image-wrapper{
		padding:15px;max-height:400px;overflow:auto;border-right:1px solid #dddddd;height:400px;
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
	@media screen and (max-width:1024px){
		.questions-list.normal{
			width:10% !important;
		}
	}

	@media screen and (max-width:768px){
		.show-type.introduction > div{
			padding:0 30px;
		}
		.questions-list.normal{
			width:14.25% !important;
		}
		.question-title{
			margin-top:15px;
		}
	}	
	@media screen and (max-width:558px){
		.show-type.introduction > div{
			padding:0 30px;
		}
		.questions-list.normal{
			width:20% !important;
		}
		.questions-list.bept{
			width:50% !important;
		}
		.question-title{
			margin-top:15px;
		}
		.multiple_questions-wrapper .image-wrapper{
			height:auto;
		}

		@media screen and (max-width:380px){
			.questions-list.normal{
				width:50% !important;
			}
			.questions-list.bept{
				width:100% !important;
			}
		}
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
<div class="col-md-12 content-wrapper">
	@csrf
	<div class="row justify-content-center show-type introduction {{ $show_type != 'introduction' ? 'hide' : ''}}" id="introduction-wrapper">

		@if($structure->question_type =="instruction")
		test
		<div class="col-md-7">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h2 style="margin-bottom:0"><em>{{$section['name']}}</em></h2> 
							<hr style="margin:5px 0;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div style="display: block;margin:auto;">
								{!!$structure->text!!}
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row justify-content-center" id="introduction-btn">
						<button onclick="start_test({{$structure->id}})" class="col-md-2 btn btn-primary"> Start </button>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="col-md-9">
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
					</div>

				</div>
				<div class="card-footer">
					<div class="row justify-content-center" id="introduction-btn">
						<button onclick="start_test({{$structure->id}})" class="col-md-2 btn btn-primary"> Start </button>
					</div>
				</div>
				
			</div>
		</div>
		@endif
	</div>
	<div class="row show-type question {{ $show_type != 'question' ? 'hide' : ''}}">
		<div class="col-md-12" style="padding:0 30px;">
			<div class="card" style="margin-bottom:30px;">
				<div class="card-body" style="max-height: 180px;overflow: auto;">
					<div class="row">
						<div class="col-md-12 text-center">
							<h4>  <span class="section-type-name">{{$test_section->get('section_type_name')}}</span> - Questions List</h4>
						</div>
					</div>
					<div class="row" id="questions-list-output">
						
						@foreach($structure_list as $keySection => $section)

						<div @if($test_section['test_id'] == '1') style="width:{{ 100 / $structure_list->count()}}%;float:left;padding:0 15px;" @else class="col-md-12" @endif >
							<h5 style="margin-top:0.5rem">{{$section->name}}</h5>
							<div class="row" style="padding:0 7.5px">
								@foreach($section->structures as $key => $value)
								<div class="questions-list {{$test_section['test_id'] == '1' ? 'ielts' : ''}} {{$value->id == $current_structure ? 'active' : ''}} @if($section->structures->count() < 15) bept @else normal @endif" style="width:@if($test_section['test_id'] == '1') 100% @else @if($section->structures->count() < 15 && $section->structures->count() > 3) {{100 / $section->structures->count()}}% @elseif($section->structures->count() <= 3) 33.33333333% @else 6.666666667% @endif @endif">
									<div>
										@if($value->question_type == "multiple" || $value->option_type == "essay") Questions @endif {{$value->number}}	
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
								<h5 style="margin-bottom:0;"><strong>No. <span id="question_num">

									{{$structure->number}}</span></strong></h5>

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
									@if($structure->option_type == "record-audio")
									<div class="col-md-12" style="height: 300px;padding:80px 15px;background:yellow;">

										<div class="row justify-content-center">
											<div style="display: block;margin:auto;text-align:center;">
												<div><strong>{{$structure->instruction}}</strong></div>
												<div>{!!$structure->questions->first()->question!!}</div>
												<div id="speaking-audio-output">
													<button class="btn btn-primary mb-3" onclick="play_audio_onload(this,'#speaking-audio-output #speaking-audio')">Play Audio</button> 
													{{asset($structure->audio)}}
													<audio id="speaking-audio" class="speaking-audio" onended="next_question()" controls="false" style="display:none;">
															<source src=" {{asset($structure->audio)}}" type="audio/ogg">
																Your browser does not support the audio element.
															</audio> 
													<br>

													<input type="file" accept="audio/*" capture id="record-file" name="record-file">
													<audio id="player" controls></audio>

													</div>
												</div>
												<div class="col-md-12"></div>
											</div>
											
										</div>
										@else
										<div class="col-md-12"> <!--Jangan pakek padding disini-->
											<div class="row" id="single-question1" @if(($test_section['section_type_id'] == 1 || $structure->text == "") && $test_section['test_id'] == 2)  @else style='display:none' @endif >

												<div class="col-md-12" style="padding:15px;">

													<div id="single-audio-output" class="audio-output">
														@if($structure->audio)
														@php
														array_push($audio,array('file' => asset($structure->audio),'howl' => null));
														@endphp


														<button class="btn btn-primary mb-3" onclick="play_audio_onload(this,'#single-audio-output #question-audio')">Play Audio</button>

														<audio id="question-audio" class="question-audio" onended="next_question()" controls="false" style="display:none">
															<source src=" {{asset($structure->audio)}}" type="audio/ogg">
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
												@endif
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
									<div class="row" @if($test_section['section_type_id'] != 1 && ($structure->text != "" || $structure->option_type == "essay")) @else style='display:none' @endif id="single-question2">

										<div class="col-md-6" style="max-height:400px;overflow:auto;border-right:1px solid #dedede;min-height: 400px;padding:15px;">

											<div id="single-audio-output2" class="audio-output">
												@if($structure->audio)
												@php
												array_push($audio,array('file' => asset($structure->audio),'howl' => null));
												@endphp

												<audio id="question-audio" class="question-audio" onended="next_question()" controls="false" style="display:none">
													<source src=" {{asset($structure->audio)}}" type="audio/ogg">
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
												@endif
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
												@endif</div>
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
								@endif
							</div>


							<div class="row @if($structure->question_type == 'multiple') @else {{'hide'}} @endif" id="multiple_questions-wrapper">
								<div class="col-md-12">

									<div class="row">
										<div class="col-md-6 image-wrapper" >
											<div class="form-group" id="multiple-audio-output" class="audio-output">
												@if($structure->audio)
												@php
												//array_push($audio,array('file' => asset($structure->audio),'howl' => null));
												@endphp
												<button class="btn btn-primary" onclick="play_audio_onload(this,'#multiple-audio-output #question-audio')">Play Audio</button>
												<audio id="question-audio" class="question-audio" autostart="true" onended="next_question()" controls="false" style="display:none;">
													<source src=" {{asset($structure->audio)}}" type="audio/ogg">
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
												@endif
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

												@if($question->option_type == "text")
												<p> <span style="width:30px;display: inline-block;">{{$question->number}}.</span> {{$question->question}} <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-question-id="{{$question->id}}" name="multiple-answers" class="multiple_answers" style="margin-left:15px;text-transform: uppercase;" value="{{$question->answer}}">  </p>
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
							<button type="button" id="prev-btn" class="btn btn-secondary" style="display:	@if($structure->audio == '' && (($current_index == 0 && $current_section_index > 1) || ($current_index != 0 && $current_section_index > 0))) inline-block @else none  @endif" onclick="prev_question()"> Soal Sebelumnya</button>




							<div id="button-wrapper" style="float:right">

								<!--<button type="button" class="btn btn-success" onclick="finish_test()">Selesai</button> -->

								<button type="button" class="btn btn-primary" id="next-btn" onclick="next_question()">Soal Selanjutnya</button>

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
<script>
 let shouldStop = false;
  let stopped = false;
  const downloadLink = document.getElementById('download');
  const stopButton = document.getElementById('stop');

  stopButton.addEventListener('click', function() {
    shouldStop = true;
  });

  const handleSuccess = function(stream) {
    const options = {mimeType: 'audio/webm'};
    const recordedChunks = [];
    const mediaRecorder = new MediaRecorder(stream, options);

    mediaRecorder.addEventListener('dataavailable', function(e) {
      if (e.data.size > 0) {
        recordedChunks.push(e.data);
      }

      if(shouldStop === true && stopped === false) {
        mediaRecorder.stop();
        stopped = true;
      }
    });

    mediaRecorder.addEventListener('stop', function() {
      downloadLink.href = URL.createObjectURL(new Blob(recordedChunks));
      downloadLink.download = 'acetest.wav';
    });

    mediaRecorder.start();
  };

  navigator.mediaDevices.getUserMedia({ audio: true, video: false })
      .then(handleSuccess);


</script>

<script type="text/javascript">

	var timeout = '{{$section_timeout }}';
	var now = '{{\Carbon\Carbon::now()->timestamp }}';
	var timerDisplay = $('#timer');	
	var timer_on = '{{$test_section["duration"]}}';
	var url = '{{asset('')}}';
	var audioSource = {!!json_encode($audio)!!};
	var audio_duration = document.getElementById('duration'); 
	var audio_timer = document.getElementById('audio_timer'); 
	var question_type = '{{$structure->question_type}}';
	var option_type = '{{$structure->option_type}}';
	var question_wrapper = "";

	document.addEventListener('contextmenu', event => event.preventDefault());
	$(window).keydown(function(e){
		if (e.keyCode === 114 || ((e.ctrlKey || e.metaKey) && e.keyCode === 70)) {
			e.preventDefault();
		}
	});


/*================================ Manual Play & Pause =======================
	var playBtn = document.getElementById('playBtn');
	//	var pauseBtn = document.getElementById('pauseBtn');
		var progress = document.getElementById('progress');


var audio = null;
var audioIsPlaying = false;
audio = new Howl({
				src : audioSource[0].file,
				autoplay:false,
				loop:false,
				onend: function(){
					next_question();
				},
				onplay:function(){
					var self = this;
					audioIsPlaying = true;
					requestAnimationFrame(step);
					
				}, onseek: function() {

          // Start upating the progress of the track.
          requestAnimationFrame(step);
      },onpause: function(){
      	audioIsPlaying = false;
      }
  });

    function play_audio(){
    	if(audioIsPlaying){
    		return false;

    
    }else{
    		audio.play();
    }
}

    function pause_audio(){


    	audio.pause();
    }

			function step(){
				var seek = audio.seek() || 0;
				audio_timer.innerHTML = formatTime(Math.round(audio.duration() - seek));
				if (audio.playing()) {
					requestAnimationFrame(step);
				}
			}

			audio.once('load', function(){
				var seek = audio.seek() || 0;
				audio_timer.innerHTML = formatTime(Math.round(audio.duration() - seek));
			});

			function formatTime (secs) {
				var minutes = Math.floor(secs / 60) || 0;
				var seconds = (secs - minutes * 60) || 0;

				return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
			}

			playBtn.addEventListener('click', function() {
	if(!audioIsPlaying){	
  audio.play();
}
});
	

================================== Manual Play Audio - Akhir ==================================
*/






			/* =============================== Automatic Play Audio =================================
				Tak Bise Pakek, Google Anak Haram Emang (https://developers.google.com/web/updates/2017/09/autoplay-policy-changes)

			

			var Player = function(playlist) {
				this.playlist = playlist;
				this.index = 0;
			};

			Player.prototype = {
   
   play: function(index) {
   	var self = this;
   	var sound;

   	index = typeof index === 'number' ? index : self.index;
   	var data = self.playlist[index];

    // If we already loaded this track, use the current one.
    // Otherwise, setup and load a new Howl.
    if (data.howl) {
    	sound = data.howl;
    	sound.play();
    } else {

    	sound = data.howl = new Howl({

    		src: data.file,
        html5: true, // Force to HTML5 so that the audio can stream in (best for large files).
        onplay: function() {
          // Display the duration.
          audio_timer.innerHTML = self.formatTime(Math.round(sound.duration()));
          // Start upating the progress of the track.
          requestAnimationFrame(self.step.bind(self));
      },
      onplayerror:function(){
      	sound.once('unlock', function() {
      		if(!sound.playing()){
      			sound.play();
      		}
      	});
      },
      onload: function() {
      },
      onend: function() {
      },
      onpause: function() {
      },
      onstop: function() {
      },
      onseek: function() {
      	requestAnimationFrame(self.step.bind(self));
      },
  });
    	if(!sound.playing()){
    		sound.play();
    	}
    }

    // Begin playing the sound.


    // Update the track display.
    //track.innerHTML = (index + 1) + '. ' + data.title;

    // Show the pause button.
    if (sound.state() === 'loaded') {
    } else {
    }

    // Keep track of the index we are currently playing.
    self.index = index;
},
onplayerror: function() {
	var self = this;
	var sound = self.playlist[self.index].howl;
	sound.once('unlock', function() {
		sound.play();
	});
},
   pause: function() {
   	var self = this;

    // Get the Howl we want to manipulate.
    var sound = self.playlist[self.index].howl;

    // Puase the sound.
    sound.pause();

    // Show the play button.
    playBtn.style.display = 'block';
    pauseBtn.style.display = 'none';
},

volume: function(val) {
	var self = this;

    // Update the global volume (affecting all Howls).
    Howler.volume(val);

    // Update the display on the slider.
    var barWidth = (val * 90) / 100;
    barFull.style.width = (barWidth * 100) + '%';
    sliderBtn.style.left = (window.innerWidth * barWidth + window.innerWidth * 0.05 - 25) + 'px';
},

   seek: function(per) {
   	var self = this;

    // Get the Howl we want to manipulate.
    var sound = self.playlist[self.index].howl;

    // Convert the percent into a seek position.
    if (sound.playing()) {
    	sound.seek(sound.duration() * per);
    }
},

   step: function() {
   	var self = this;

    // Get the Howl we want to manipulate.
    var sound = self.playlist[self.index].howl;

    // Determine our current seek position.
    var seek = sound.seek() || 0;
    timer.innerHTML = self.formatTime(Math.round(seek));
    progress.style.width = (((seek / sound.duration()) * 100) || 0) + '%';

    // If the sound is still playing, continue stepping.
    if (sound.playing()) {
    	requestAnimationFrame(self.step.bind(self));
    }
},

   
  togglePlaylist: function() {
    var self = this;
    var display = (playlist.style.display === 'block') ? 'none' : 'block';

    setTimeout(function() {
      playlist.style.display = display;
    }, (display === 'block') ? 0 : 500);
    playlist.className = (display === 'block') ? 'fadein' : 'fadeout';
  },
   toggleVolume: function() {
   	var self = this;
   	var display = (volume.style.display === 'block') ? 'none' : 'block';

   	setTimeout(function() {
   		volume.style.display = display;
   	}, (display === 'block') ? 0 : 500);
   	volume.className = (display === 'block') ? 'fadein' : 'fadeout';
   },

   formatTime: function(secs) {
   	var minutes = Math.floor(secs / 60) || 0;
   	var seconds = (secs - minutes * 60) || 0;

   	return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
   }
};


var audio = new Player(audioSource);
audio.play();
*/



$(".question-audio").bind('ended', function(){
    // done playing
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

    function play_audio_onload(evt,id){
    	$(id)[0].play();
    	$(evt).hide();
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

var onloadTimer;

function section_timeout(){
	timeout = 0;
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
$(document).ready(function(){
	if(timeout > 0 && timeout != null && timer_on > 0){
		var timer = (timeout - now);
		onloadTimer =  setInterval(function() {
			if(timer > 0){
				timer--; 
				var hours = makeInteger(timer,60 * 60,99),
				minutes = makeInteger(timer,60,60),
				seconds = makeInteger(timer,1,60);
				timerDisplay.html( hours + ":" + minutes + ":" + seconds);
			}else{
				clearInterval(onloadTimer);
				section_timeout();
				//location.href = "{{url('/student')}}";
			}	
		}, 1000);

	}});


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



function start_timer(start_section_time,section_timeout){
	clearInterval(onloadTimer);
	var timer = (section_timeout - start_section_time);
	onloadTimer =  setInterval(function() {	
		if(timer > 0 && timer_on > 0){
			timer--; 
			var hours = makeInteger(timer,60 * 60,99),
			minutes = makeInteger(timer,60,60),
			seconds = makeInteger(timer,1,60);
			timerDisplay.html( hours + ":" + minutes + ":" + seconds);
		}else{
			clearInterval(onloadTimer);
			section_timeout();

			//location.href = "{{url('/student')}}";
		}
	}, 1000); 
}




function start_test(structure_id){
	clearInterval(onloadTimer);
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
		console.log(test_section);
		console.log(test_section.section_timeout);
		if(test_section.section_timeout){
			timerDisplay.html("");
			start_timer(test_section.start_section_time,test_section.section_timeout);
		}

		if(structure_list.length != 0){
			$("#questions-list-output").html("");
			$('.section-type-name').html(test_section.section_type_name);
			var structure_list_output = "";
			$.each(structure_list,function(k,v){

							/*
							@foreach($structure_list as $keySection => $section)
						

						<div @if($test_section['test_id'] == '1') style="width:{{ 100 / $structure_list->count()}}%;float:left;padding:0 15px;" @else class="col-md-12" @endif>
							<h5 style="margin-top:0.5rem">{{$section->name}}</h5>
							<div class="row" style="padding:0 7.5px">
								@foreach($section->structures as $key => $value)
								<div class="questions-list {{$test_section['test_id'] == '1' ? 'ielts' : ''}} {{$value->id == $current_structure ? 'active' : ''}}" style="width:@if($test_section['test_id'] == '1') 100% @else @if($section->structures->count() < 15 && $section->structures->count() > 3) {{100 / $section->structures->count()}}% @elseif($section->structures->count() <= 3) 33.33333333% @else 6.666666667% @endif @endif">
									<div>
										@if($value->question_type == "multiple") Questions @endif {{$value->number}}	
									</div>

								</div>
								@endforeach
							</div>
						</div>


						@endforeach
						*/
						if(test_section.test_id == "1"){

							structure_list_output += '<div style="width:'+ (100/structure_list.length) +'%;float:left;padding:0 15px;">' +
							'<h5 style="margin-top:0.5rem">'+ v.name +'</h5>'+
							'<div class="row" style="padding:0 7.5px">';
							if(structure_list[k].structures.length != 0){

								$.each(structure_list[k].structures,function(k2,v2){
									var structures_len = structure_list[k].structures.length;

									structure_list_output += '<div class="questions-list multiple ';
									if(structures_len < 15){
										structure_list_output += 'style="width:'+ (100/structures_len) +'%"';
									}else{
										structure_list_output += 'style="width:666666667%';
									}
									if(data.current_structure == v2.id){
										structure_list_output += ' active';
									}
									structure_list_output +='"';
									if(structures_len < 15){
										structure_list_output += ' style="width:'+ (100/structures_len) +'%"';
									}else{
										structure_list_output += ' style="width:6.66666667%"';
									}
									structure_list_output +=' >' +
									'<div> Questions ' +
									v2.number +
									'</div>' +
									'</div>' 
								});
							}
							structure_list_output += '</div>' +
							'</div>';
						}else{
							//alert("Please Answer All Questions !");
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
									if(structure.question_type == "multiple"){
										structure_list_output += 'Questions ';
									}
									structure_list_output += v2.number +
									'</div>' +
									'</div>' 
								});
							}

							structure_list_output += '</div>' +
							'</div>';
						}
						$('#questions-list-output').html(structure_list_output);
					});
		}
		setTimeout(function(){$('.loading-wrapper').hide()}, 1000);
		if(section.type == "introduction"){
			var audio_stop = document.getElementsByClassName('question-audio');
			for(var i = 0, len = audio_stop.length; i < len;i++){
				audio_stop[i].pause();  
				audio_stop[i].currentTime = 0;
			}
			clearInterval(onloadTimer);
			$('#section-name').html(test_section.section_type_name);
			$('#introduction-title').html(structure.title);
			$('#introduction-description').html(structure.description);
			$('#introduction-btn').html("<button onclick='start_test("+structure.id+")' class='col-md-2 btn btn-primary'> Start </button>");
			$('.show-type').css({display : 'none'});
			$('.show-type.introduction').toggleClass('hide');
			$('.show-type.introduction').css({display : 'flex'});
		}
		else{
			$('#introduction-wrapper').hide();
			$('.show-type.question').show();

			question_type = structure.question_type;
			option_type = structure.option_type;

			if(structure.question_type == "multiple"){
				$('#multiple_questions-wrapper').show();
				$('#single_question-wrapper').hide();

			}else if(structure.question_type == "single"){
				$('#multiple_questions-wrapper').hide();
				$('#single_question-wrapper').show();
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

					}else{
						$('.left-section').show();
						$('.left-section.essay').hide();	
					}
				}
			}
			var audioOutput = "";
			if((structure.audio != "" && structure.audio != null) || test_section.section_type_id == 1){
				$('#prev-btn').css({display: 'none'});
				var audioOutput = "<audio controls id='question-audio' class='question-audio' onended='next_question()'>" +
				"<source src='"+ url + structure.audio +"' type='audio/ogg'>" + 
				"Your browser does not support the audio element." +
				"</audio>";

			}else{
				if(test_section.current_index !=0){

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
				$(question_wrapper + '#single-audio-output').html(audioOutput);	
				if(audioOutput != ""){
					$(question_wrapper + "#single-audio-output #question-audio")[0].play();
					$(question_wrapper + "#single-audio-output #question-audio").hide();
				}

				$(question_wrapper + '#text-output').html(structure.text);
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
					question_output += '<p>'+v.number +'<input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-question-id="'+v.id+'" name="multiple-answers" class="multiple_answers" style="margin-left:15px;text-transform: uppercase;" value="'+answer+'">  </p>';
				});
				$('#multiple_questions-wrapper #question-output').html(question_output);
				if(structure.text != ""){
					$('#multiple_questions-wrapper #text-output').html(structure.text);
				}
				$('#multiple-audio-output').html(audioOutput);	
				if(audioOutput != ""){
					$("#multiple-audio-output #question-audio")[0].play();
					$("#multiple-audio-output #question-audio").hide();
				}
			}
			if(structure.multiple_questions != null){
				$('#multiple_questions-output').html(structure.multiple_questions);
			}else{
				$('#multiple_questions-output').html("");
			}
			$('#question_num').html(structure.number);

		}
	}
}

function next_question(){
	//#ganti section tombol previous hilang 
	//kalo udh hapus soal pas finish tes langsung bikin tak bise masuk sama sekali 
	//ndk perlu dashboard user agik lenyap
	//$('.loading-wrapper').show();


	$('.loading-wrapper').show();
	var token = $("input[name='_token']").val();
	var	answer_type = "";


	//alert("Please Answer All Questions !");
	
	if(question_type == "single"){
		if(option_type == "essay"){
			//var div = document.createElement('div');
			//div.textContent = $(question_wrapper + ' #essay_answer').val();
    		//var answers = div.innerHTML;
    		
    		var answers = $(question_wrapper + ' #essay_answer').val();
    		answer_type = "essay";
    		if(answers == ""){
    			alert('Please answer the question first');
    			$('.loading-wrapper').hide();
    			return false;
    		}


    	}else{
    		var answer = $(question_wrapper + ' #option-output input[name=answer]');
    		var answers,answer_type;
    		var question_id = $(question_wrapper +' #question_id').val();

    		if(answer.length != 0){
    			answers = $(question_wrapper + ' #option-output input[name=answer]:checked');
    			if(answers.length > 0){
    				answers = answers.val();
    				answer_type = "options";
    			}else{
    				alert('Please answer the question first');
    				$('.loading-wrapper').hide();
    				return false;
    			}
    			
    		}

    	}
    }else if(question_type == "multiple"){
    	var answers = [];
    	var answer = document.getElementsByName('multiple-answers');
    	answer.forEach(function(item,index){
    		answers.push({ 
    			"answers" : item.value.replace(/\s\s+/g, ' ').trim(),
    			"question_id" : item.getAttribute("data-question-id")
    		});	
    	});

    }

    $.ajax({
    	url : "{{route('student-next-question')}}",
    	method : "GET",
    	data : {
    		_token : token,
    		answers: answers,
    		answer_type : answer_type,
    		question_type : question_type
    	},

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
    		$('.loading-wrapper').hide();
    	},
    	timeout: 12000

    });

}
function prev_question(){
	$('.loading-wrapper').show();
	/*var answer = $('input[name=answer]');
	var answers,answer_type;
	var token = $("input[name='_token']").val();
	var question_id = $('#question_id').val();
	if(answer.length != 0){
		answers = $('input[name=answer]:checked').val();
		answer_type = "options";
	}*/
	var token = $("input[name='_token']").val();
	var	answer_type = "";
	if(question_type == "single"){
		if(option_type == "essay"){
			//var div = document.createElement('div');
			//div.textContent = $(question_wrapper + ' #essay_answer').val();
    		//var answers = div.innerHTML;
    		var answers = $(question_wrapper + ' #essay_answer').val();
    		answer_type = "essay";
    	}else{
    		var answer = $(question_wrapper + ' #option-output input[name=answer]');
    		var answers,answer_type;
    		var question_id = $(question_wrapper +' #question_id').val();
    		if(answer.length != 0){
    			answers = $(question_wrapper + ' #option-output input[name=answer]:checked').val();
    			answer_type = "options";
    		}
    	}
    }else if(question_type == "multiple"){
    	var answers = [];
    	var answer = document.getElementsByName('multiple-answers');
    	answer.forEach(function(item,index){
    		answers.push({ 
    			"answers" : item.value.replace(/\s\s+/g, ' ').trim(),
    			"question_id" : item.getAttribute("data-question-id")
    		});	
    	});

    }


    $.ajax({
    	url : "{{route('student-prev-question')}}",
    	method : "GET",
    	data : {
    		_token : token,
    		answers: answers,
    		answer_type : answer_type,
    		question_type : question_type

    	},
    	success: function(data){
    		question_render(data);
    	},
    	error: function(jqXHR, textStatus, errorThrown){
    		if(textStatus==="timeout") {
    			alert('Please try again, if the problem still exist refresh / press F5');
    			location.reload();
    		} 
    	},complete: function(){
    		$('.loading-wrapper').hide();
    	},

    	timeout: 12000
    });
}
</script>
@endpush
@stop
