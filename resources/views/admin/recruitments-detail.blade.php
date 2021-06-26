@extends('layouts.app-auth')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						@foreach($recruitment->toArray() as $key => $value)

						<div class="my-3">{{$key}} : 
							@if($key == "ktp" || $key == "kk" || $key == "ijazah" || $key == "transkrip_nilai" || $key == "gambar_portofolio")
							<a href="{{Storage::disk('public')->url($value)}}">{{Storage::disk('public')->url($value)}}</a>
							@else
						{{$value}}
						@endif
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection