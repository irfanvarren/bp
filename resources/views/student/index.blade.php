@extends('layouts.student-dashboard')
@push('head-script')
<style type="text/css">
.ct-chart .ct-bar {
    stroke-width: 50px
}
</style>
@endpush
@section('student-content')
<div>
	<h2><strong>Selamat Datang</strong></h2>
</div>
<div class="card mb-2">
	<div class="card-header">Data Mahasiswa</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xs-5 col-md-2">
				<img src="{{asset($student->PIC_PATH)}}" alt="Foto sedang bermasalah">
			</div>
			<div class="col-xs-7 col-md-3">
				<h4><strong>{{$student->NAMA}}</strong></h4>
				<div>{{$student->KD}}</div>
				<div>
					<div>Kursus saat ini: -</div>
					<div>Nilai Simulasi IELTS :</div>
					<div>Nilai Simulasi TOEFL :</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-7">
				<div class="chart">
					<div class="ct-chart" style="height:200px">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">Ubah Password</div>
	<div class="card-body">
		<form action="{{ route('profile.update') }}" method="POST">
			<div class="row form-group">
				<div class="col-md-3 col-form-label text-right">
					Password Lama : 
				</div>
				<div class="col-md-9">
					<input type="password" name="old_password" id="old_password" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-3 col-form-label text-right">
					Password Baru : 
				</div>
				<div class="col-md-9">
					<input type="password" name="password" id="password" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-3 col-form-label text-right">
					Konfirmasi Password : 
				</div>
				<div class="col-md-9">
					<input type="password" name="confirm_password" id="confirm_password" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button class="btn btn-success">Ubah Password</button>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection
@push('more-script')
<script type="text/javascript">
	new Chartist.Bar('.ct-chart', {
		labels: ['IELTS - AC','IELTS - GT', 'TOEFL', 'BEP'],
		series: [100,40, 30, 120]
	}, {
		distributeSeries: true,

	});
</script>
@endpush