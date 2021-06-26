@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
<style type="text/css">
.table-result{
	margin-top:15px;
	max-width:480px;
}
.table-result tr td{
	border-color:black !important;
}	
</style>
@endpush
@section('content')
<div class="col-md-12 content-wrapper">
	<div>
	<div class="p-3"> <a href="{{isset($redirect_back) ? $redirect_back ?: url('certificate-tracking') : url('certificate-tracking')}}" class="btn-link">Back</a></div>
	<div class="px-3">
		<p style="display:inline-block;" class="w3-left" >
			@if(isset($cn)) Kode Sertifikat : {{ $dec }} @endif
			@if(isset($cnik)) NIK : {{$cnik}} @endif
		</p>
		<p style="display:inline-block;"  class="w3-right">
			{{ isset($certificate) ? $certificate->TGL_BUAT : ''}}
		</p>
	</div>
</div>
	<div class="w3-container">
		@if(isset($certificate))
		<table>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td>{{ isset($certificate) ? $certificate->SISWA_NAMA : ''}}</td>
			</tr>
			<tr>
				<td>Program</td>
				<td>:</td>
				<td>{{ isset($certificate) ? $certificate->KD_2 : ''}}</td>
			</tr>
			<tr>
				<td>Institution and as venue</td>
				<td>:</td>
				<td>{{ isset($certificate) ? $certificate->REF_PERUSAHAAN : ''}}</td>
			</tr>
		</table>
		@endif

		@if(isset($certificates))
		<table class="table table-bordered">
			<tr>
				<th>Cabang</th><th>Kode Sertifikat</th><th>Paket</th><th>Level</th><th>Action</th>
			</tr>
		@foreach($certificates as $certificate)
		<tr>
			<td>{{$certificate->REF_PERUSAHAAN}}</td><td>{{str_replace("//","/",$certificate->KD_GABUNG)}}</td><td>{{$certificate->REF_PAKET}}</td><td>{{$certificate->REF_LEVEL}}</td><td>
				<a href="{{url('certificate-tracking/cn?aasdawcn='.base64_encode(str_replace('//','/',$certificate->KD_GABUNG)).'&redirect_back='.url()->full())}}" class="btn btn-primary">Lihat Detail</a></td>
				
		</tr>
		@endforeach
		</table>
		@endif

		@if(isset($certificate_images))
		@foreach($certificate_images as $certificate_image)
		<img src="{{$certificate_image->img}}">
		@endforeach
		@endif

		@if(isset($certificate_details))
		<table class="table table-bordered table-result">
			<tr><td>Test Module</td> <td>{{$certificate_details->first()->TEST_MODULE}}</td></tr>
		@foreach($certificate_details as $certificate_detail)
		<tr><td>{{$certificate_detail->REF_KRITERIA}}</td><td>{{$certificate_detail->NILAI}}</td></tr>
		@endforeach
		</table>


		<div>
			Feedback : {{$certificate_details->first()->FEEDBACK}}
		</div>
		@endif
	</div>
</div>
@endsection