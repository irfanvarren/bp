
@extends('layouts.bp_wo_sidenav')
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
@endpush
@section('content')
<div class="col-md-12 content-wrapper" style="padding:15px 60px;">


	<div class="row">
		@php
		$index = 0;
		@endphp
		@if(isset($user_data))
		<div class="col-md-12 mb-4">
			<div class="row justify-content-center">
				<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">Data Peserta</h3>
				</div>
				<div class="card-body" style="font-size:16px">


					<p>Nama : {{$user_data->nama != "" ? $user_data->nama : $user_data->nama_lain}}</p>
					<p>Email : {{$user_data->email != "" ? $user_data->email : $user_data->email_lain}} </p>
					@if($user_data->no_hp != "")
					<p>No Telepon : {{$user_data->no_hp}} </p>
					@endif
					@if($user_data->tujuan != "")
					<p>Tujuan Mengikuti : {{$user_data->tujuan}}</p>
					@endif
					<p>Foto Identifikasi Diri : <img src="{{asset($user_data->identification)}}" style="display: block;margin:0 auto; max-width: 50%; max-height:300px;"></p>
				</div>
			</div>
			</div>
			</div>
		</div>
		@endif
		@foreach($answers->groupBy('section_type_name') as $keyTestSection => $testSections)
		<div class="col-md-12">
		<button class="col-md-12 btn btn-primary" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded="false" aria-controls="collapse{{$index}}" style="padding:8px 12px;font-size:22px;font-weight:bold;margin-top:15px;">{{$keyTestSection}} </button>
		</div>
		<div class="col-md-12 collapse in" style="overflow:hidden" id="collapse{{$index}}">
			<div class="row">
		@if($test_id == 1)
		@foreach($testSections->groupBy('test_structure_id') as $structure)

		<div class="col-md-12">
			{{dd($structure)}}
		</div>
		@endforeach
		@elseif($test_id == 2)


		@foreach($testSections as $answer)

		<div class="col-md-6" style="min-height:350px;margin:15px 0;">
			<div class="col-md-12" style="border:1px solid black;background:white;padding:15px;height:100%;overflow: auto;">
			<div class="row" style="height: 100%">
				<div class="col-md-2" style="display:block;margin:auto;text-align:center;font-size:64px;">{{$answer->structures->number}}</div>
				<div class="col-md-10" style="min-height:100px;">

					@if($answer->questions->question != "")<div> <span style="float:left;margin-right: 8px;"> Q :  </span>{!!$answer->questions->question!!}</div>@endif
					<p> <strong>Explanation : </strong>  <br> <div class="explanation">{!!$answer->explanation!!}</div></p>
					@if($answer->questions->options->count())
					<div> <strong>Options : </strong> <br>

						@foreach($answer->questions->options as $keyOption => $option)

						<div class="row options-wrapper">
							@php $selectAnswer = ""; @endphp

							@foreach($myAnswer->where('question_id',$answer->questions->id) as $cek_answer)

							@if($cek_answer->answer_id == $option->id)
							@php $selectAnswer = $cek_answer->answer_id @endphp
							@endif
							@endforeach
							<label class="options">
								<input type="radio" name="answer" class="answer" disabled value="{{$option->id}}">
								<span {!! $selectAnswer == $option->id ? 'style="background: #4d81a8;"' : ''!!}
									> {{chr(65+$keyOption)}} </span>

								</label>
								<div class="options-text" style="max-width:80%;" >{{$option->option}} @if($answer->option_answer_id == $option->id)  <span style="color:#3da654;font-weight:bold;">(Correct)</span> @elseif($answer->option_answer_id !== $selectAnswer  && $selectAnswer == $option->id)<span style="color:#eb4034;font-weight:bold;"> (False) </span> @endif</div>

							</div>
							@endforeach

						</div>
						@endif
					</div>
				</div>
				</div>
			</div>
			@endforeach
			@endif
			</div>
			</div>
			@php
			$index ++;
			@endphp
			@endforeach
		</div>

	</div>

@endsection