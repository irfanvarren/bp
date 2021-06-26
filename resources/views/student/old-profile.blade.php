@extends('layouts.search-school')
@push('head-script')

<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
	.student-data{
		background:white;border-radius:5px;width:100%;min-height:35px;border:1px solid #dedede;padding:5px 10px;
	}
	.selectize-input.disabled.locked{
		background-color:#e9ecef;
		opacity: 1;
	}


	/* progress bar */
	.text-hed{
		text-align: center;
		margin-top: 100px;
		font-size: 100px;
		text-transform: capitalize;
		color: black;
		text-shadow: 0px 0px 3px white;
		cursor: pointer;
		animation: text_ani 8s infinite linear;
	}
	.radio-hide{
		display: none;
	}
	.label-text{
		width: 25%;
		padding: 15px 20px;
		color: black;
		font-size: 16px;
		float:left;
		text-align:center;
		font-weight: 500;
		cursor: pointer;
		transition: all 0.8s;
		padding:5px;
		margin:0;
	}
	.label-text > div{
border:1px solid #bbbbbb;
padding:10px 15px;
	}
	.radio-hide:checked + .label-text div {
		background: #227dc7;
		color:white;
	}
	.radio-hide:checked + .label-text{
		transition: all 0.2s;
		font-weight: bold;
		color: #0c68a6;
		/*	background-color: rgba(0,0,0,0.25);*/
	}
	.progress{
		width: 100%;
		margin: 50px auto;
		height: 16px;
		background-color: rgba(0,0,0,0.25);
		border-radius: 30px;
		/*box-shadow: 0px 1px 2px rgba(0,0,0,0.25), 0px 1px rgba(255,255,255,0.08);*/
	}
	.progress-bar{
		height: 100%;
		border-radius: 4px;
		transition: all 0.5s linear;
		background-image: linear-gradient(to bottom, rgba(255,255,255,0.3),rgba(255,255,255,0.05));
		transition-property: width, background-color;
		/*box-shadow: 0px 0px 1px 1px rgba(0,0,0,0.25), inset 0px 1px rgba(255,255,255,0.1);*/
	}



	@keyframes text_ani{
		0%{
			text-shadow: 0px 0px 3px white;	
		}
		20%{
			text-shadow: 0px 0px 3px #FB0036;	
		}
		40%{
			text-shadow: 0px 0px 3px #FF5F00;	
		}
		60%{
			text-shadow: 0px 0px 3px #F8FF00;	
		}
		80%{
			text-shadow: 0px 0px 3px #00FF05;	
		}
		100%{
			text-shadow: 0px 0px 3px #0084FF;	
		}

	}
	.temp-table th,.temp-table td{
		border:1px solid black;
		background: white;
	}
	.btn-link{
		background:none;
	}

	.register-btn{
		float:right;
	}

	@media screen and (max-width:992px){
		.label-text{
			width:50%;
			text-align:center;
		}
	}

	@media screen and (max-width:576px){
		.register-btn{
			float:left;

		}
		.label-text{
			width:100%;
			border:1px solid #dedede;
		}
	}
</style>
@endpush
@section('sidebar-content')
<div class="col-md-12" style="padding:30px 15px;">
	<div class="row">
		<div class="col-md-12 mb-3">
			<div><h3>Student Application</h3> <a href="{{route('student-register')}}" class="btn btn-primary register-btn">Register</a></div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered temp-table">
			<tr> <th>No</th><th> Client Id</th> <th>Visa Number / Country</th> <th>Registered At</th><th>Actions</th></tr>
			@foreach($registration_histories as $key => $registration_history)

			<tr> <td>{{$key +=1}}</td><td>{{$registration_history->client_id}}</td> <td> {{$registration_history->country_name}} </td> <td>{{date("d F Y",strtotime($registration_history->created_at))}}</td><td><button class="btn btn-primary" onclick="open_detail_profile({{$registration_history->id}})"> Details </button></td></tr>
			@endforeach
		</table>
	</div>
</div>
@csrf
<div class="col-md-12" id="detail-profile-output" style="padding:30px 15px;">
	
</div>
@endsection
@push('more-script')

<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
	
	var index_form = 0;

	var progress_indicator = $('.progress-radio');
	var prev_progress = 0;
	var student_id;

	var token = $("input[name='_token']").val();
	$('.selectize').selectize({
		width : 'resolve'
	});

	$(document).ready(function(){

		$.each(progress_indicator,function(k,v){

			v.addEventListener('change',function(){
				prev_progress = k;
				form_save(k);

			});
		});
		$('.student-form-wrapper').hide();
		var current_form_wrapper = $('.student-form-wrapper');
		$(current_form_wrapper[index_form]).show();
	});

	function open_detail_profile(id){
		student_id = id;
		$('.loading').css({
			'visibility' : 'visible'
		});

		$.ajax({
			url: "{{route('student-detail-profile-ajax')}}",
			method: "POST",
			data:{
				'_token' : token,
				'student_id' : student_id
			},
			success:function(data){
				$('#detail-profile-output').html(data);
			}
			,error:function(){

			},complete:function(){
				$('.loading').css({
					'visibility' : 'hidden'
				});
			}

		});
	}

	function form_cancel(el){
		$(el).hide();
		$('#btn-submit').html("Edit");
		for(var i = 0; i < $('select.selectize').length; i++){
			$('select.selectize')[i].selectize.disable();
		}
		$('#personal_information_form :input').prop("disabled",true);

	}
	function change_form(progress_index = null){

	}
	function form_save(progress_index = null){
		
		var myForm = document.getElementById('student-profile-form'+index_form);
		if(myForm){
			var formData = new FormData(myForm);
			formData.append('_token', token);
			var url = $(myForm).attr('action');
			$('.loading').css({
				'visibility' : 'visible'
			});
			$.ajax({
				url: url,
				method: "POST",
				processData: false,
				contentType: false,
				data:formData,
				success:function(data){

					$('.toast').toast('show');



				}
				,error:function(){
				}
				,complete:function(){
					$('.loading').css({
						'visibility' : 'hidden'
					});
				}
			});
		}

		$('.student-form-wrapper').hide();

		if(progress_index != null){
			index_form = progress_index;
			
		}else{
			if(index_form < ($('.progress-radio').length -1)){
				index_form += 1;
				var current_progress = $('.progress-radio');
				$(current_progress[index_form]).attr('checked','checked').trigger('click');
			}
		}
		var current_form_wrapper = $('.student-form-wrapper');

		$(current_form_wrapper[index_form]).show();
		if(index_form >= 1){
			$('#btn-previous').show();
		}else{
			$('#btn-previous').hide();
		}

	}
	function open_tab(index){
		index_form = index;
		// var progress_width = (index+1)*12.5;
		// document.getElementById('progress-bar').style.width = progress_width;
		$('.student-form-wrapper').hide();
		var current_form_wrapper = $('.student-form-wrapper');
		$(current_form_wrapper[index_form]).show();
		if(index_form >= 1){
			$('#btn-previous').show();
		}else{
			$('#btn-previous').hide();
		}
	}
	function form_back(){
		index_form -= 1 ;
		if(index_form < 1){
			$('#btn-previous').hide();
		} 
		$('.student-form-wrapper').hide();
		var current_form_wrapper = $('.student-form-wrapper');
		$(current_form_wrapper[index_form]).show();
		var current_progress = $('.progress-radio');
		$(current_progress[index_form]).attr('checked','checked').trigger('click');
	}

	function form_edit(el){
		$('.loading').css({
			'visibility' : 'visible'
		});
		var myForm = document.getElementById('personal_information_form');
		var formData = new FormData(myForm);
		formData.append('_token', token);
		$.ajax({
			url: "{{route('student-pi-ajax')}}",
			method: "POST",
			processData: false,
			contentType: false,
			data:formData,
			success:function(data){
				$('.toast').toast('show');
			}
			,error:function(){

			},complete:function(){
				$('.loading').css({
					'visibility' : 'hidden'
				});
			}
		});
	}

	function add_passport(){
		var myForm = document.getElementById('student-profile-form1');
		var formData = new FormData(myForm);
		var cmd = myForm.querySelector('#cmd').value;
		formData.append('_token',token);
		formData.append('cmd',cmd);
		formData.append('student_id',student_id);
		$.ajax({
			url : "{{route('student-ph-ajax')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data: formData,
			success: function(data){

				$('#passport-output').html(data);
				myForm.reset();
				cmd.value = "add";
				cmd.innerHTML = "Add Passport";
			},error:function(){

			},complete:function(){

			}
		});
	}

	function edit_passport(array){
		var data = JSON.parse(array);
		var myform = document.querySelector('#student-profile-form1');
		myform.querySelector('#cmd').value = "update";
		myform.querySelector('#cmd').innerHTML = "Update passport";
		$.each(data,function(k,v){
			var input = myform.querySelector('[name="'+k+'"]');

			if(input != null){
				input.value = v;
			}
		});

	}
	function delete_passport(id){
		$.ajax({
			url : "{{route('student-ph-ajax')}}",
			method : "POST",
			data: {
				'_token': token,
				'student_id' : student_id,
				'id': id,
				'cmd':'delete'
			},
			success: function(data){

				$('#passport-output').html(data);
				myForm.reset();
			},error:function(){

			},complete:function(){

			}
		});
	}
	function add_qualification(){
		var myForm = document.getElementById('student-profile-form2');
		var formData = new FormData(myForm);
		var cmd = myForm.querySelector('#cmd').value;
		formData.append('_token',token);
		formData.append('cmd',cmd);
		formData.append('student_id',student_id);

		$.ajax({
			url : "{{route('student-eq-ajax')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data: formData,
			success: function(data){
				$('#english-qualification-output').html(data);
				myForm.reset();
				cmd.value = "add";
				cmd.innerHTML = "Add Qualification Score";
			},error:function(){

			},complete:function(){

			}
		});
	}


	function edit_qualification(array){
		

		var data = JSON.parse(array);
		var myform = document.querySelector('#student-profile-form2');
		myform.querySelector('#cmd').value = "update";
		myform.querySelector('#cmd').innerHTML = "Update Qualification Score";
		$.each(data,function(k,v){
			var input = myform.querySelector('[name="'+k+'"]');

			if(input != null){
				input.value = v;
			}
		});

	}
	function delete_qualification(id){
		$.ajax({
			url : "{{route('student-eq-ajax')}}",
			method : "POST",
			data: {
				'_token': token,
				'student_id' : student_id,
				'id': id,
				'cmd':'delete'
			},
			success: function(data){

				$('#english-qualification-output').html(data);
				myForm.reset();
			},error:function(){

			},complete:function(){

			}
		});
	}
	function add_visa_history(){
		var myForm = document.getElementById('student-profile-form3');
		var formData = new FormData(myForm);

		var cmd = myForm.querySelector('#cmd').value;
		formData.append('_token',token);
		formData.append('cmd',cmd);
		formData.append('student_id',student_id);

		$.ajax({
			url : "{{route('student-vh-ajax')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data: formData,
			success: function(data){
				console.log(data);
				$('#visa-history-output').html(data);
				myForm.reset();
				cmd.value = "add";
				cmd.innerHTML = "Add Visa History";
			},error:function(){

			},complete:function(){

			}
		});
	}
	function edit_visa_history(array){

		var data = JSON.parse(array);
		var myform = document.querySelector('#student-profile-form3');
		myform.querySelector('#cmd').value = "update";
		myform.querySelector('#cmd').innerHTML = "Update Visa History";
		$.each(data,function(k,v){
			var input = myform.querySelector('[name="'+k+'"]');

			if(input != null){
				input.value = v;
			}
		});

	}
	function delete_visa_history(id){
		$.ajax({
			url : "{{route('student-vh-ajax')}}",
			method : "POST",
			data: {
				'_token': token,
				'student_id' : student_id,
				'id': id,
				'cmd':'delete'
			},
			success: function(data){
				$('#visa-history-output').html(data);
				myForm.reset();
			},error:function(){

			},complete:function(){

			}
		});
	}



	function add_bank_account(){
		var myForm = document.getElementById('student-profile-form4');
		var formData = new FormData(myForm);
		var cmd = myForm.querySelector('#cmd').value;
		formData.append('_token',token);
		formData.append('cmd',cmd);
		formData.append('student_id',student_id);

		$.ajax({
			url : "{{route('student-bad-ajax')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data: formData,
			success: function(data){
				$('#bank-account-output').html(data);
				myForm.reset();
				cmd.value = "add";
				cmd.innerHTML = "Add Bank Account";
			},error:function(){

			},complete:function(){

			}
		});
	}

	function edit_bank_account(array){
		var data = JSON.parse(array);
		var myform = document.querySelector('#student-profile-form4');
		myform.querySelector('#cmd').value = "update";
		myform.querySelector('#cmd').innerHTML = "Update Bank Account";
		$.each(data,function(k,v){
			var input = myform.querySelector('[name="'+k+'"]');

			if(input != null){
				input.value = v;
			}
		});

	}

	function delete_bank_account(id){
		$.ajax({
			url : "{{route('student-bad-ajax')}}",
			method : "POST",
			data: {
				'_token': token,
				'student_id' : student_id,
				'id': id,
				'cmd':'delete'
			},
			success: function(data){
				$('#bank-account-output').html(data);
				myForm.reset();
			},error:function(){

			},complete:function(){

			}
		});
	}

	function add_insurance_provider(){
		var myForm = document.getElementById('student-profile-form5');
		var formData = new FormData(myForm);
		var cmd = myForm.querySelector('#cmd').value;

		formData.append('_token',token);
		formData.append('cmd',cmd);
		formData.append('student_id',student_id);
		$.ajax({
			url : "{{route('student-cipd-ajax')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data: formData,
			success: function(data){
				$('#insurance-provider-output').html(data);
				myForm.reset();
				cmd.value = "add";
				cmd.innerHTML = "Add Insurance Provider";
			},error:function(){

			},complete:function(){

			}
		});
	}

	function edit_insurance_provider(array){
		var data = JSON.parse(array);
		var myform = document.querySelector('#student-profile-form5');
		myform.querySelector('#cmd').value = "update";
		myform.querySelector('#cmd').innerHTML = "Update Insurance Provider";
		$.each(data,function(k,v){
			var input = myform.querySelector('[name="'+k+'"]');

			if(input != null){
				input.value = v;
			}
		});
	}

	function delete_insurance_provider(id){
		$.ajax({
			url : "{{route('student-cipd-ajax')}}",
			method : "POST",
			data: {
				'_token': token,
				'student_id' : student_id,
				'id': id,
				'cmd':'delete'
			},
			success: function(data){
				$('#insurance-provider-output').html(data);
				myForm.reset();
			},error:function(){

			},complete:function(){

			}
		});
	}


	$("#personal_information_form :input").focus(function() {
		if($(this).val() == "-"){
			$(this).val("");
		}  
	});


</script>
@endpush