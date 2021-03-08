<!DOCTYPE html>
<html>
<head>
	<title>portfolio</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
</head>
<style type="text/css">
	
	/*.col-md-1,
	.col-md-2,
	.col-md-3,
	.col-md-4,
	.col-md-5,
	.col-md-6,
	.col-md-7,
	.col-md-8,
	.col-md-9,
	.col-md-10,
	.col-md-11,
	.col-md-12{
		display:inline-block;
		vertical-align: bottom;
		margin:0;
		line-height:1;
		padding:0 15px;
	}
	.col-md-1{
		width: 8.333333%;
	}
	.col-md-2{
		width:16.6666666667%;
	}
	.col-md-3{
		width:25%;
	}
	.col-md-4{
		width:33.333333%;
	}
	.col-md-5{
		width:41.666667%;
	}
	.col-md-6{
		width:50%;
	}
	.col-md-7{
		width:58.333333%;
	}
	.col-md-8{
		width: 66.666667%;
	}
	.col-md-9{
		width: 75%;
	}
	.col-md-10{
		width:83.3333333333%;
	}
	.col-md-11{
		width: 91.666667%;
	}
	.col-md-12{
		width:100%;
	}
	ul{
		padding:0;
	}
	.table {
		width: 100%;
		color: #212529;
		page-break-inside: avoid !important;
		border-collapse:collapse;
	}
	.table-bordered {
		border: 1px solid #dee2e6;
	}

	.table-bordered th,
	.table-bordered td {
	    padding:5px;
		border: 1px solid #dee2e6;
		
	}

	.table-bordered thead th,
	.table-bordered thead td {
		border-bottom-width: 2px;
	}
	
	* {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		margin:0;
		padding:0;
	}
	.m-0{
		margin:0;
	}
	.row{
		white-space: nowrap;
		width:100%;
		margin:0 -15px;
		padding:0;
		}*/
		html{
			margin:30px;
		}
	</style>
	<body>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<div>
						<div class="photo" style="width:130px;border-radius:65px;display:block;height:130px;overflow: hidden;background-image: url(<?php echo asset(Storage::disk('public')->url($portfolio->image))?>);background-size: cover;background-position: center;margin:0">
						</div>
					</div>
					<div>
						<?php for($i=1;$i<=2;$i++): ?>
							<div>
								<?php
								$col_email = "EMAIL_".$i;
								?> 
								{{$karyawan->$col_email}}  
							</div>
						<?php endfor; ?>
						<?php for($i=1;$i<=3;$i++): ?>
							<div>
								@php
								$col_kontak = "KONTAK_".$i;
								@endphp 
								{{$karyawan->$col_kontak}}  
							</div>
						<?php endfor; ?>
					</div>
				</div>
				<div class="col-md-9">
					<div style="background:#404d69;color:white;padding:15px;margin-top:16.5px">
						<h2><?php echo $karyawan->NAMA; ?></h2>
						<div><h4 class="m-0"><?php echo $karyawan->REF_JABATAN ?></h4></div>
					</div>
				</div>
			</div>
			<div class="my-3">
				<div>
					<div>
						<h3 style="margin-bottom:20px;"><strong>Latar Belakang Pendidikan</strong></h3>
						<hr>
					</div>
					<div class="col-md-12">
						<?php foreach($edu as $edubackground) : ?>
							<div class="row" style="border-bottom:1px solid #bebebe;margin-bottom: 15px">
								<div class="col-md-2 text-center"><strong class="m-0"><?php echo $edubackground->tahun_masuk; ?></strong></div>
								<div class="col-md-10">
									<?php if($edubackground->jurusan != "") :?>
										<div class="row">
											<div class="col-md-2">
												Jurusan 
											</div>
											<div class="col-md-10">
												<span class="colon">:</span> <?php echo $edubackground->jurusan; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if($edubackground->gelar != "") :?>
										<div class="row">
											<div class="col-md-2">
												Gelar 
											</div>
											<div class="col-md-10">
												<span class="colon">:</span> <?php echo $edubackground->gelar; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if($edubackground->tempat != "") :?>
										<div class="row">
											<div class="col-md-2">
												Tempat 
											</div>
											<div class="col-md-10">
												<span class="colon">:</span> <?php echo $edubackground->tempat; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if($edubackground->status != "") :?>
										<div class="row">
											<div class="col-md-2">
												Status 
											</div>
											<div class="col-md-10">
												<span class="colon">:</span> <?php echo $edubackground->status; ?>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div>
				<?php if(count($certifications)) :?>
					<div class="portfolio-content">
						<div>
							<h3 style="margin-bottom:20px;"><strong>Sertifikasi</strong></h3>
							<hr>
						</div>
						<div class="col-md-12">
						<?php foreach($certifications as $certification) : ?>
							<div class="row" style="padding:15px 0;margin-bottom:15px;border-bottom:1px solid #bebebe">
								<div class="col-md-7">
									<?php if($certification->year != "") : ?>
										<div class="row mb-3">
											<div class="col-md-3">
												Tahun 
											</div>
											<div class="col-md-9">
												<span class="colon">:</span> <?php echo $certification->year; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if($certification->name != "") : ?>
										<div class="row mb-3">
											<div class="col-md-3">
												Nama Sertifikasi 
											</div>
											<div class="col-md-9">
												 <span class="colon">:</span> <?php echo $certification->name; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if($certification->duration != "") : ?>
										<div class="row mb-4">
											<div class="col-md-3">
												Masa Berlaku 
											</div>
											<div class="col-md-9">
												<span class="colon">:</span> 
												<?php echo $certification->duration; ?>
												<?php if($certification->periode != "") : ?>
													<?php
													switch($certification->periode){
														case "week":
														echo "minggu";
														break;
														case "month":
														echo "bulan";
														break;
														case "year":
														echo "tahun";
														break;

													}
													?>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if($certification->keterangan != "") : ?>
										<div class="row mb-3">
											<div class="col-md-3">
												Keterangan 
											</div>
											<div class="col-md-9">
												<span class="colon">:</span>
												<?php echo $certification->keterangan; ?>
											</div>
										</div>
									<?php endif; ?>

								</div>
								<div class="col-md-5">
									<?php if($certification->nilai != "[]") : ?>
										<table class="table table-bordered" style="background:white;width: 350px;max-width:100%">
											<tr>
												<td class="bg-primary text-light text-center" style="background-color:#2196f3 !important;" colspan="2"><?php echo $certification->name; ?></td>
											</tr>
											<?php foreach(json_decode($certification->nilai) as $result) : ?>
												<tr>
													<td><?php echo $result->kriteria; ?></td><td><?php echo $result->nilai; ?></td>
												</tr>
											<?php endforeach; ?>
										</table>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div>
				<div>
					<h3 style="margin-bottom:20px;"><strong>Pengalaman Bekerja</strong></h3>
					<hr>
				</div>
				<div class="col-md-12">
				<?php foreach($exp as $experience) : ?>
					<div class="row">
						<div class="col-md-12" style="border-bottom:1px solid #bebebe;margin-bottom: 15px;">
							<?php if($experience->nama_pekerjaan != "") : ?>
								<div class="row mb-3">
									<div class="col-md-2">
										Pekerjaan <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										<?php echo $experience->nama_pekerjaan; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if($experience->tempat_bekerja != "") : ?>
								<div class="row mb-3">
									<div class="col-md-2">
										Tempat Bekerja <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										<?php echo $experience->tempat_bekerja; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if($experience->tgl_mulai != "") : ?>
								<div class="row mb-3">
									<div class="col-md-2">
										Tempat <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										<?php echo $experience->tgl_mulai; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if($experience->tgl_selesai != "") : ?>
								<div class="row mb-4">
									<div class="col-md-2">
										Status <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										<?php echo $experience->tgl_selesai; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
			<?php foreach($other as $other_experience) : ?>
				<div>
					<div>
					<h3 style="margin-bottom:20px;"><strong><?php echo $other_experience['jenis_pengalaman']; ?></strong></h3>
					<hr>
					</div>
					<ul style="padding: 0 25px;">
						<?php foreach($other_experience['detail'] as $detail) : ?>
							<li style="padding-bottom:15px;">
								<div class="col-md-12"><?php echo urldecode($detail->pengalaman); ?></div>
							</li>

						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>