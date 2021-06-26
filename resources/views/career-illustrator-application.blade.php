@extends('layouts.sunrisebiz')
<style media="screen">
	.add-skills{
		background:none;
		border-radius:50%;
		font-size:16px;
		width:25px;
		color:white;
		border:none;
		font-weight:lighter;
		height:25px;
		margin-right:30px;
		padding:5px;
		float:right;
		background-color:#1f62bf;
	}

	.language-list,.other-skills{
		list-style-position:inside;
	}
	.language-list input,.language-list textarea ,.other-skills-list input,.other-skills-list textarea{
		width:88%;
		margin-bottom:1rem;
	}

	.language-list li,  .other-skills-list li{
		float:left;
		padding:6px 0;
		height:calc(1.5em + .75rem + 2px);
		clear:both;
		margin-right:5px;
		word-break:break-all;
	}
	.content-wrapper{
		padding:20px 80px !important;
	}
	@media screen and (max-width:480px){
		.language-list input,.language-list textarea ,.other-skills-list input,.other-skills-list textarea{
			width:92% !important;
		}
		.add-skills{
			margin-right:5px;
		}
	}
</style>
@section('content')
<div class="col-sm-12 content-wrapper">
	@if (session('status'))
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<i class="material-icons">close</i>
				</button>
				<span>{{ session('status') }}</span>
			</div>
		</div>
	</div>
	@endif
	@php
	if(isset($id_perusahaan)){
	$url = url('careers/'.$id_perusahaan.'/illustrator/application');
}else{
$url = url('careers/illustrator/application');
}

@endphp
<form enctype="multipart/form-data" class="" action="{{$url}}" method="post">
	@csrf
	<input type="hidden" name="id_perusahaan" value="{{isset($id_perusahaan) ? $id_perusahaan : ''}}">
	<div class="col-sm-12">

		<div class="row">

			<div class="col-sm-12">
				<h2>Curriculum Vitae</h2>
			</div>

		</div>
		<div class="form-group row">
			<label class="col-md-3 col-form-label">Name</label>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" required value="">

					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" value="">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-3 col-form-label"> Tempat Kelahiran </label>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="kota" placeholder="Kota" required value="">
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required value="">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-form-label col-md-3">Tanggal Lahir</label>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3">
						<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" onfocus="(this.type='date')" placeholder="Tanggal Lahir (yyyy-mm-dd)" >
					</div>
						<!--
						<div class="col-md-3">
							<input type="number" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" max="31" required>
						</div>
						<div class="col-md-3">
							<select class="form-control" id="bulan_lahir" name="bulan_lahir" required>
								<option value="">Bulan (mm)</option>
								<option value="01" {{ session('ielts_form.bulan_lahir')=="01" ? 'selected' : '' }}>Januari</option>
								<option value="02" {{ session('ielts_form.bulan_lahir')=="02" ? 'selected' : '' }}>Februari</option>
								<option value="03" {{ session('ielts_form.bulan_lahir')=="03" ? 'selected' : '' }}>Maret</option>
								<option value="04" {{ session('ielts_form.bulan_lahir')=="04" ? 'selected' : '' }}>April</option>
								<option value="05" {{ session('ielts_form.bulan_lahir')=="05" ? 'selected' : '' }}>Mei</option>
								<option value="06" {{ session('ielts_form.bulan_lahir')=="06" ? 'selected' : '' }}>Juni</option>
								<option value="07" {{ session('ielts_form.bulan_lahir')=="07" ? 'selected' : '' }}>Juli</option>
								<option value="08" {{ session('ielts_form.bulan_lahir')=="08" ? 'selected' : '' }}>Agustus</option>
								<option value="09" {{ session('ielts_form.bulan_lahir')=="09" ? 'selected' : '' }}>September</option>
								<option value="10" {{ session('ielts_form.bulan_lahir')=="10" ? 'selected' : '' }}>Oktober</option>
								<option value="11" {{ session('ielts_form.bulan_lahir')=="11" ? 'selected' : '' }}>November</option>
								<option value="12" {{ session('ielts_form.bulan_lahir')=="12" ? 'selected' : '' }}>Desember</option>
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required></p>

						</div>
					-->
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-3 col-form-group">Agama</label>
			<div class="col-md-9">
				<select class="form-control" name="agama">
					<option value=""> - Pilih Agama -</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen Protestan</option>
					<option value="Katholik">Katholik</option>
					<option value="Hindu">Hindu</option>
					<option value="Buddha">Buddha</option>
					<option value="Kong Hu Cu">Kong Hu Cu</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-md-3 col-form-label">Alamat</label>
			<div class="col-md-9">
				<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-md-3 col-form-label">Kewarganegaraan</label>
			<div class="col-md-9">
				<input type="text" class="form-control"  name="kewarganegaraan" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-3 col-form-label"> No Telepon / WA</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="no_telepon" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-3 col-form-label">Email</label>
			<div class="col-md-9">
				<input type="email" name="email" class="form-control" required value="">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4">

				<p>      <h3>Pendidikan</h3></p>
				<p>SD :</p>
				<p><input type="text" name="sd" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
				<p>SMP :</p>
				<p> <input type="text" name="smp" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
				<p>SMA / Sederajat :</p>
				<p> <input type="text" name="sma" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
				<p>Universitas :</p>
				<p> <input type="text" name="universitas" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
			</div>
			<div class="col-sm-4">

				<div class="language-skills col-md-12">
					<p>
						<h3>Keahlian</h3></p>
						<div class="col-md-12">
							<div class="col-md-12">
								<input type="checkbox" class="form-check-input" name="keahlian_illustrator[]" value="Illustrator"> <label class="form-check-label">Illustrator</label>
							</div>
							<div class="col-md-12">
								<input type="checkbox" class="form-check-input" name="keahlian_illustrator[]" value="Desain Grafis"> <label class="form-check-label">Desain Grafis</label>
							</div>
							<div class="col-md-12">
								<input type="checkbox" class="form-check-input" name="keahlian_illustrator[]" value="Foto / Video Grapher"> <label class="form-check-label">Foto / Video Grapher</label>
							</div>
							<div class="col-md-12">
								<input type="checkbox" class="form-check-input" name="keahlian_illustrator[]" value="Content Writer"> <label class="form-check-label">Content Writer</label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<p style="margin-top:30px;"><span style="font-size:24px;">Keahlian Lainnya</span>  <button type="button" class="add-skills" onclick="add_other_skills()" name="button"><i class="fa fa-plus"></i></button>
						</p>
						<div class="other-skills">
							<ol class="other-skills-list p-0" >
								<li></li><textarea class="form-control" rows="2" name="keahlian_lainnya[]" value=""></textarea>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<p><h3>Penghargaan</h3></p>

					<p> <textarea name="penghargaan" placeholder="Penghargaan...." rows="8" class="form-control"></textarea> </p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p><h3>Pengalaman Kerja</h3> </p>
					<p>
						<textarea name="pengalaman_sejenis" placeholder="Pengalaman 1
Pengalaman 2
Pengalaman 3
....
						" class="form-control"  rows="8" ></textarea>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p> <h3>Konferensi & Seminar</h3> </p>
					<p> <textarea name="konferensi_dan_seminar" rows="8" class="form-control" placeholder="Konferensi & Seminar 1 
Konferensi & Seminar 2 
Konferensi & Seminar 3
...">
</textarea>
</p>
					</div>
					<div class="col-sm-6">
						<p> <h3>Pengalaman Organisasi</h3> </p>
						<p> <textarea name="pengalaman_organisasi" rows="8" class="form-control" placeholder="Pengalaman 1 
Pengalaman 2 
Pengalaman 3
..."></textarea> 
</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p> <h3>Pelatihan & Workshop</h3> </p>
							<p>
								<textarea name="pelatihan_dan_workshop" rows="8" class="form-control" placeholder="Pelatihan 1 
Pelatihan 2 
Pelatihan 3
..."></textarea>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<p> <h3>Hasil Pekerjaan / Proyek</h3> </p>
						<p>
							<textarea name="link_portofolio" rows="8" class="form-control" placeholder="Link 1 
Link 2 
Link 3
..."></textarea>
						</p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						File Hasil Pekerjaan / Proyek <br>
						(Bisa Upload lebih dari satu)
					</div>
					<div class="col-md-9">
						<input type="file" name="file_gambar_portofolio[]" multiple value="">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						Upload KTP :
					</div>
					<div class="col-md-9">
						<input type="file" name="file_ktp" required value="">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						Upload Ijazah :
					</div>
					<div class="col-md-9">
						<input type="file" name="file_ijazah" required value="">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						Upload Transkrip Nilai : <br>
						(Bisa upload lebih dari satu)
					</div>
					<div class="col-md-9">
						<input type="file" name="file_transkrip_nilai[]" multiple required value="">
					</div>
				</div>
				<input type="submit" name="" class="btn btn-primary" value="Submit">
			</div>

		</form>
	</div>
	<script type="text/javascript">
		function add_skills(){
			$('.language-list').append(
				"<li> </li><input type='text' class='form-control' name='langguage_skills[]' value=''>"
				);
		}
		function add_other_skills(){
			$('.other-skills-list').append(
				'<li></li><textarea class="form-control" rows="2" name="keahlian_lainnya[]" value=""></textarea>'
				);
		}

		setInterval(refreshToken, 5*60*1000);  

		function refreshToken(){
			$.get('{{url("refresh-csrf")}}').done(function(data){
				$('[name="_token"]').val(data);
			});
		}

	</script>
	@stop

