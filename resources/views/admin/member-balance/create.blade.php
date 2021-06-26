@extends('layouts.app-auth', ['activePage' => 'balance', 'titlePage' => __('Member Balance'),'activeMenu' => 'user-management'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="{{route('admin-member-balance.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
					@csrf
					@method('post')
					<input type="hidden" name="user_id" value="{{$user_id}}">
					<div class="card ">
						<div class="card-header card-header-primary">
							<h4 class="card-title">{{ __('Add Balance') }}</h4>
							<p class="card-category"></p>
						</div>
						<div class="card-body ">
							<div class="row">
								<div class="col-md-12 text-right">
									<a href="{{route('admin-member-balance.index',['user_id' => $user_id]) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
								</div>
							</div>

							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
										<input type="text" class="form-control" id="amount" name="amount" required>
										<div class="form-check-inline">
											<input type="checkbox" class="form-check-input" name="get_amount_type" id="web-amount"> <label class="form-check-label">Get amount from web transaction</label>
										</div>
										<div class="form-check-inline">
											<input type="checkbox" class="form-check-input" name="get_amount_type" id="pricelist-amount"> <label class="form-check-label">Get amount from pricelist</label>
										</div>
										@if ($errors->has('amount'))
										<span id="harga-error" class="error amount-danger" for="input-amount">{{ $errors->first('amount') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
										<textarea class="form-control" name="description" id="description"></textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card-footer ml-auto mr-auto">
							<button type="submit" class="btn btn-primary">{{ __('Add Balance') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
@push('js')
<script type="text/javascript">

	$("#banner_type").on('change',function(){
		$('#hide-content').show();
		if($(this).val() == "image") {
			$('#hide-text').hide();
			$('#hide-image').show();
		}else{
			$('#hide-image').hide();
			$('#hide-text').show();
		}
	});

</script>
@endpush
