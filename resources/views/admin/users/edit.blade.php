@extends('layouts.app-auth', ['activePage' => 'users','activeMenu' => 'users-management', 'titlePage' => __('User Management')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
	#kd_student + .selectize{
		margin-top: 8px;
		display: none;
	}
</style>
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="{{ route('admin-users.update', $user) }}" autocomplete="off" class="form-horizontal">
					@csrf
					@method('put')

					<div class="card ">
						<div class="card-header card-header-primary">
							<h4 class="card-title">{{ __('Edit User') }}</h4>
							<p class="card-category"></p>
						</div>
						<div class="card-body ">
							@if (session('status'))
							<div class="row">
								<div class="col-sm-12">
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<i class="material-icons">close</i>
										</button>
										<span>{!! session('status') !!}</span>
									</div>
								</div>
							</div>
							@endif
							<div class="row">
								<div class="col-md-12 text-right">
									<a href="{{ route('admin-users.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Employee ?') }}</label>
								<div class="col-sm-7">
									<div class="text-left">
										<div style="display: flex;">
										<div class="col-form-label">
										<input type="checkbox" name="check_employee" id="check_employee" onclick="$('#employee_id').val('');$('#employee_id').toggle()" {{$user->employee_id ? 'checked' : ''}}>
										</div>
										<select name="employee_id" id="employee_id" class="form-control" style="flex-grow:1;margin-left:15px;width:95%;float:left;display: {{$user->employee_id ? 'block' : 'none'}};">
											<option value="">- Select Employee -</option>
											@foreach($employees as $employee)
											<option value="{{$employee->ID_KARYAWAN}}" {{$user->employee_id == $employee->ID_KARYAWAN ? 'selected' : ''}}>{{$employee->ID_KARYAWAN}} ({{$employee->NAMA}})</option>
											@endforeach
										</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Student ?') }}</label>
								<div class="col-sm-7">
									<div class="text-left">
										<div style="display: flex;">
										<div class="col-form-label">
										<input type="checkbox" name="check_employee" id="check_employee" onclick="$('#kd_student').val('');$('#kd_student + .selectize').toggle()" {{$user->kd_student ? 'checked' : ''}}>
										</div>
										<select name="kd_student" id="kd_student" class="form-control selectize" style="flex-grow:1;margin-left:15px;width:95%;float:left;display: {{$user->kd_student ? 'block' : 'none'}};">
											<option value="">- Select Student -</option>
											@foreach($students as $student)
											<option value="{{$student->KD}}">{{$student->KD}} - {{$student->NAMA}}</option>
											@endforeach
										</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required="true" aria-required="true"/>
										@if ($errors->has('name'))
										<span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
										@if ($errors->has('email'))
										<span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2 col-form-label">{{__('No Telepon')}}</div>
								<div class="col-sm-7">
									<input type="text" name="no_telepon" class="form-control" placeholder="{{ __('No Telepon...') }}" value="{{ old('no_telepon',$user->no_telepon) }}" required>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label" for="input-password">{{ __('Old Password') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-old_password" placeholder="{{ __('Old Password') }}" {{auth()->user()->id != $user->id ? 'disabled' : 'required'}}/>
										@if ($errors->has('old_password'))
										<span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" {{auth()->user()->id != $user->id ? 'disabled' : 'required'}} />
										@if ($errors->has('password'))
										<span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
								<div class="col-sm-7">
									<div class="form-group">
										<input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" {{auth()->user()->id != $user->id ? 'disabled' : 'required'}}/>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Roles') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('roles') ? ' has-danger' : '' }}">
										<input type="text" name="roles" id="roles"  class="selectize form-control" value="">
										
										@if ($errors->has('roles'))
										<span id="roles-error" class="error text-danger" for="input-roles">{{ $errors->first('roles') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer ml-auto mr-auto">
							<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-12">
				Permissions
			</div>
		</div>
	</div>
</div>

@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
	$('#kd_student').selectize();
	$roles = $('#roles').selectize({
		delimiter: '|',
		persist: false,
		valueField: 'name',
		labelField: 'name',
		searchField: 'name',
		options : {!!$roles->toJson()!!},
		items: {!!$user->roles->pluck('name')!!}
	});
</script>
@endpush