@extends('layouts.minimal')
@push('head-script')
<style type="text/css">
	ul,ol{
		list-style-position: inside;
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
	}
	.hide{
		display:none;
	}
	label.options input {display:none;}
	label.options span {color:#cecece;display: table-cell; vertical-align:middle; border-radius:50%;}
	label.options input:checked + span {background: #4d81a8;}
	label.options input:selected + span {background: #4d81a8;}
	.ot-question-img{
		width:100%;
	}
	table{
		width:100% !important;
	}
	.explanation img{
		max-width:100%;
	}
</style>
<style>
	.finish-test-message{
		position: relative;
		align-items: center;
		display: flex;
		justify-content: center;
		min-height: 450px;
	}
	.score-result{
		font-size:18px;
		padding:30px 0;

	}

</style>
@endpush
@section('content')
<div class="col-md-12 py-4">
	<div class="row justify-content-center finish-test-message">
		<div class="col-md-7 card text-center" style="margin-top:-25px;padding:30px">
			<div class="row">


				@if($result['test_id'] == 2)

				<div class="col-md-12" ><strong><h4>Nama : {{$registration_data->NAMA}}</h4></strong></div>

				<div class="col-md-12 score-result">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr> <th>Section</th> <th>Correct Answer</th> </tr>
								@foreach($result['score_result'] as $key => $value)

								<tr>    
									<th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}} ({{$value['score']}})</td>
								</tr>
								@endforeach
							</table> 
						</div>
						<div class="col-md-12" style="text-decoration: underline;"> <h1> TOEFL Score : {{round($result['total_score']*10/3,0)}} </h1> </div>
					</div>
				</div>
				<div class="col-md-12 text-left" style="font-size:18px;">
					Alasan Mengikuti Test : {{$registration_data->ALASAN}}
				</div>
				@elseif($result['test_id'] == 1)
				<div class="col-md-12" ><strong><h4>Nama : {{$registration_data->NAMA}}</h4></strong></div>

				<div class="col-md-12 score-result">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<colgroup>
									<col>
									<col>
									<col>
								</colgroup>
								<thead>
									<tr> <th>Section</th> <th>Correct Answer</th> <th class="text-center">Band Score</th> </tr>
								</thead>
								<tbody>
									@foreach($result['score_result'] as $key => $value)
									<tr>    
										<th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}}</td><td class="text-center">@if($value['name']=='Writing' || $value['name'] == 'Speaking') Not Yet Graded @else @if($value['score'] != 0) {{number_format($value['score'],1)}}	 @else  0 @endif @endif</td>
									</tr>
									@endforeach
								</tbody>
							</table> 
						</div>
            <!-- 
            > 0.25 bulatkan ke atas < 0.25 bulatkan kebawah 
            bagi 0.5 kalau ada sisa hasil bagi, bulatkan seperti diatas
        -->
        <div class="col-md-12" style="text-decoration: underline;"> 
        	<h1> 
        		IELTS Score : @if(fmod($result['total_score'],0.5 ) == 0) {{number_format(($result['total_score']-2)/2,1)}} @else {{number_format(round(($result['total_score'] - 2)/2,0	),1)}}  @endif 
        	</h1> 
        </div>
    </div>
</div>
<div class="col-md-12 text-left" style="font-size:18px;">
	Alasan Mengikuti Test : {{$registration_data->ALASAN}}
</div>
@else
<div class="col-md-12" > <h3> <strong>The Test Has Been Finished </strong></h3></div>
<div class="col-md-12 score-result">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<colgroup>
					<col>
					<col>
					<col>
				</colgroup>
				<thead>
					<tr> <th>Section</th> <th>Correct Answer</th> <th class="text-center">Total</th> </tr>
				</thead>
				<tbody>
					@foreach($result['score_result'] as $key => $value)
					<tr>    
						<th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}}</td><td class="text-center">@if($value['score'] != 0) {{number_format($value['score'],1)}} @else @if($value['name']=='Writing') Not Yet Graded  @else 0 @endif @endif</td>
					</tr>
					@endforeach
				</tbody>
			</table> 
		</div>
            <!-- > 0.25 bulatkan ke atas < 0.25 bulatkan kebawah 
            bagi 0.5 kalau ada sisa hasil bagi, bulatkan seperti diatas
        -->
        <div class="col-md-12" style="text-decoration: underline;"> <h1>  Score : {{    $result['total_score']}}</h1> </div>
    </div>
</div>
@endif
</div>


</div>
</div>
</div>
<div class="col-md-12 content-wrapper" style="padding:15px 60px;">



	<div class="row">
		@foreach($answer_structure as $key_test_section => $test_section)
		<div class="col-md-12">
			<button class="col-md-12 btn btn-primary" data-toggle="collapse" data-target="#collapse{{$key_test_section}}" aria-expanded="false" aria-controls="collapse{{$key_test_section}}" style="padding:8px 12px;font-size:22px;font-weight:bold;margin-top:15px;">{{$test_section->section_type_name}}</button>


		</div>


		<div class="col-md-12 collapse in" style="overflow:hidden" id="collapse{{$key_test_section}}">
			<div class="card" style="border-radius: 0;">

				@if($test_id == 1)
				@foreach($test_section->sections as $section)
				@foreach($section->structures as $structure)
				<div class="col-md-12" style="padding:15px;border-bottom:1px solid #ddd;">
					<div class="row">
						<div class="col-md-12 mb-3"> <h4 style="margin-bottom:0 !important"><strong class='row'> <div class="col-md-6"> {{$section->name}} </div> <div class="col-md-6 text-center"> Question {{$structure->number}} </div></strong></h4></div>
						<div class="col-md-12">
							<div class="row">
								@if($structure->option_type == "essay")

								<div class="col-md-6" style="max-height: 500px;overflow-y: auto;border-right:1px solid #cccccc">
									<p><h5>Question :</h5></p>
									{!!$structure->questions->first()->question!!}
								</div>
								<div class="col-md-6" style="max-height: 500px;overflow-y: auto">
									<p><h5>Answer :</h5></p>
									@if($myAnswer->where('question_id',$structure->questions->first()->id)->first())
									{!!$myAnswer->where('question_id',$structure->questions->first()->id)->first()->answers!!}
									@endif
								</div>
								@elseif($structure->option_type == "record-audio")
								<div class="col-md-12" style="max-height:500px;overflow-y:auto;text-align:center;padding:30px;">

									<h4><strong>{{$structure->title}}</strong></h4>
									<p>{{$structure->description}}</p>
									<div>{!! $structure->text !!}</div>
									<div class="row justify-content-center">
										<div>
											<div style="float:left;margin-right:15px;">
												Question Audio <br>
												<audio id="speaking-audio" class="speaking-audio" controls>
													<source src="{{asset($structure->audio)}}" type="audio/ogg">
														Your browser does not support the audio element.
													</audio> 
												</div>
												<div style="float:left;">
													Answer Audio <br>
													<audio id="speaking-audio" class="speaking-audio" controls>
														<source src="{{asset($myAnswer->where('question_id',$structure->questions->first()->id)->first()->answers)}}" type="audio/ogg">
															Your browser does not support the audio element.
														</audio> 
													</div></div>

												</div>

											</div>
											@else
											<div class="col-md-6" style="max-height:500px;overflow-y: auto;">
												{!!$structure->text!!}
											</div>
											<div class="col-md-6" style="max-height:500px;overflow-y:auto;">

												@foreach($structure->questions as $question)
												<div class="col-md-12" style="border:1px solid black;padding:15px;margin-bottom:15px;">
													<div> <h5> No. {{$question->number}} </h5> </div>
													@foreach($question->answers as $answer)

													<div>
														Your Answer :
														@php
														$answer_arr = explode('|',$answer->answers);
														$userAnswer = $myAnswer->where('question_id',$answer->questions->id)->first()->answers;
														print_r($userAnswer);
														$cek_correct = false;
														@endphp
														@foreach($answer_arr as $key => $value)
														@php   
														if($value == $userAnswer){
														$cek_correct = true;
													}
													@endphp
													@endforeach    
													@if($cek_correct)
													<span style="color:#3da654;font-weight:bold;">(Correct)</span>
													@else
													<span style="color:#eb4034;font-weight:bold;"> (Wrong) </span>
													@endif



												</div>
												<div>
													Correct Answers : 
													@foreach($answer_arr as $key => $value)
													@if($key != 0 )
													{{' or '.$value}}
													@else
													{{$value}}
													@endif
													@endforeach
												</div>
												<div>Explanation : 
													<div class="explanation">{!!$answer->explanation!!}</div>
												</div>
												@endforeach
											</div>
											@endforeach
										</div>
									</div>
									@endif


								</div>
							</div>	

						</div>
						@endforeach
						@endforeach

						@elseif($test_id == 2)
						@foreach($test_section->sections as $section)
						<div class="col-md-12" style="padding:30px;">
							<div class="row">
								<div class="col-md-12 mb-3 text-center"> <h4><strong> <div class="col-md-12"> {{$section->name}} </div> </strong></h4></div>
								<div class="col-md-12">





									@foreach($section->structures->chunk(2) as $structure_chunks)
									<div class="row">
										@foreach($structure_chunks as $structure)

										<div style="margin:15px 0;width:50%;float:left;padding:0 15px;">
											@foreach($structure->questions as $question)
											<div class="col-md-12" style="border:1px solid black;height:100%;">
												<div class="row">
													<div class="col-md-2" style="display:block;margin:auto;text-align:center;font-size:48px;">  {{$question->number}} </div>
													<div class="col-md-10" style="max-height:450px;overflow-y:auto;padding:15px;">
														@if($question->question != "")<div> <span style="float:left;margin-right: 8px;"> Q :  </span></div>@endif

														<p> <strong>Explanation : </strong>  <br>  <div class="explanation">@if($question->answers->count()) {!!$question->answers[0]->explanation!!}@endif</div></p>
														@if($question->options->count())
														<div> <strong>Options : </strong> <br>
															@foreach($question->options as $keyOption => $option)

															<div class="row options-wrapper">
																@php $selectAnswer = ""; @endphp

																@foreach($myAnswer->where('question_id',$question->id) as $cek_answer)

																@if($cek_answer->answer_id == $option->id)
																@php $selectAnswer = $cek_answer->answer_id @endphp
																@endif
																@endforeach
																<label class="options">
																	<input type="radio" name="answer" class="answer" disabled value="{{$option->id}}">
																	<span {!! $selectAnswer == $option->id ? 'style="background: #4d81a8;"': ''!!}
																		> {{chr(65+$keyOption)}} </span>

																	</label>

																	<div class="options-text" style="max-width:80%;" >

																		{{$option->option}} 
																		@if($question->answers->count())

																		@if($question->answers[0]->option_answer_id == $option->id)  <span style="color:#3da654;font-weight:bold;">(Correct)</span> @elseif($question->answers[0]->option_answer_id !== $selectAnswer  && $selectAnswer == $option->id)<span style="color:#eb4034;font-weight:bold;"> (False) </span> @endif

																		@endif
																	</div>

																</div>
																@endforeach

															</div>
															@endif
														</div>
													</div>
												</div>
												@endforeach
											</div>
											@endforeach
										</div>
										@endforeach
									</div>
								</div>	
							</div>

							@endforeach



							@else


							@foreach($test_section->sections as $section)

							@foreach($section->structures as $structure)
							<div class="col-md-12" style="padding:15px;border-bottom:1px solid #ddd;">
								<div class="row">
									<div class="col-md-12 mb-3" style="border-bottom:1px solid #cccccc"> <h4 style="margin-bottom:0 !important"><strong class="row"> <div class="col-md-6 form-group"> {{$section->name}} </div> <div class="col-md-6 form-group text-center"> Question {{$structure->number}} </div></strong></h4></div>
									<div class="col-md-12">
										<div class="row">
											@if($structure->option_type == "essay")

											<div class="col-md-6" style="max-height: 500px;overflow-y: auto;border-right:1px solid #cccccc">
												<p><h5>Question :</h5></p>
												{!!$structure->questions->first()->question!!}
											</div>
											<div class="col-md-6" style="max-height: 500px;overflow-y: auto">
												<p><h5>Answer :</h5></p>
												{!!$myAnswer->where('question_id',$structure->questions->first()->id)->first()->answers!!}
											</div>
											@else
											<div class="col-md-6" style="max-height:500px;overflow-y: auto;">
												{!!$structure->text!!}
											</div>
											<div class="col-md-6" style="max-height:500px;overflow-y:auto;">

												@foreach($structure->questions as $question)
												<div class="col-md-12" style="border:1px solid black;padding:15px;margin-bottom:15px;">

													<div> <h5> No. {{$question->number}} </h5> </div>
													@foreach($question->answers as $answer)

													<div>
														Your Answer :
														@php
														$answer_arr = explode('|',$answer->answers);
														$userAnswer = $myAnswer->where('question_id',$answer->questions->id)->first()->answers;
														print_r($userAnswer);
														$cek_correct = false;
														@endphp
														@foreach($answer_arr as $key => $value)
														@php   
														if($value == $userAnswer){
														$cek_correct = true;
													}
													@endphp
													@endforeach    
													@if($cek_correct)
													<span style="color:#3da654;font-weight:bold;">(Correct)</span>
													@else
													<span style="color:#eb4034;font-weight:bold;"> (Wrong) </span>
													@endif



												</div>
												<div>
													Correct Answers : 
													@foreach($answer_arr as $key => $value)
													@if($key != 0 )
													{{' or '.$value}}
													@else
													{{$value}}
													@endif
													@endforeach
												</div>
												<div>Explanation : 
													<div class="explanation">{!!$answer->explanation!!}</div>
												</div>
												@endforeach
											</div>
											@endforeach
										</div>

										@endif
									</div>
								</div>
							</div>	

						</div>
						@endforeach
						@endforeach


						@endif
					</div>

				</div>

				@endforeach
			</div>
		</div>


		@endsection
