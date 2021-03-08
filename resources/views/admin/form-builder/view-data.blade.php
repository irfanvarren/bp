@extends('layouts.app-auth',['dashboard' => 'admin','activePage' => 'form','activeMenu' => 'content-management', 'titlePage' => __('form')])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form>

					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title ">View Data </h4>
							<p class="card-category"> {{ __('Here you view form data') }}</p>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<label class="col-md-3 col-form-label text-left" style="padding-left:30px;">{{ __('Tanggal Awal') }}</label>
										<div class="col-sm-7" style="padding-left:30px;">
											<div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
												<input type="date" class="form-control" id="tgl1">
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-md-3 col-form-label text-left" style="padding-left:30px;">{{ __('Tanggal Akhir') }}</label>
										<div class="col-sm-7" style="padding-left:30px;">
											<div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
												<input type="date" class="form-control" id="tgl2">
											</div>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-12">
											<button onclick="cari()" type="button" class="btn btn-primary">Cari</button>
										</div>
									</div>
								</div>
							</div>




							<table border=1 class="table table-bordered" >
								<?php
								if(!count($s2) || !count($s)){
									?>

									<tr>
										<td>Data Tidak Ditemukan !</td>
									</tr>
									<?php 
								}else{
									?>
									<tr>
										<td>Tanggal</td>
										@foreach($s2 as $ii => $r2)
										<td><?php echo $ii+=1; ?></td>
										@endforeach
									</tr>
									@foreach($s as $i => $r)
									<?php
									$isi = $r->survei;
									$tgl = $r->tanggal;
									$isi1 = explode('!',$isi);
									?> 
									<tr>
										<td><?php echo date("d F Y",strtotime($tgl)); ?></td>
										<?php
										foreach($isi1 as $a){
											?>
											<td>
												@if($r2->jawaban == 9)
													@php $options = explode("|",$a); @endphp
													@foreach($options as $option)
														<div>{{$option}}</div>
													@endforeach
												@else
												<?php echo $a; ?>
												@endif
											</td>
											<?php
										}?>
									</tr>
									@endforeach
									<?php
								}
								?>
							</table>

							<a class="btn" href="{{url('admin/form/add-question?id=').$idsoal}}">Kembali</a>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<script>

function cari(){
	var tgl1 = document.getElementById('tgl1').value;
	var tgl2 = document.getElementById('tgl2').value;
	location.href="{{url('admin/form/view-data')}}?idsoal={{$idsoal}}&tgl1="+tgl1+"&tgl2="+tgl2;
}
</script>

@endsection