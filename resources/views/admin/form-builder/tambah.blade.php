@extends('layouts.app-auth',['dashboard' => 'admin','activePage' => 'form','activeMenu' => 'content-management', 'titlePage' => __('form')])

@push('head-js')
<style>
	body {font-family: Arial, Helvetica, sans-serif;}
	* {box-sizing: border-box;}

	/* Button used to open the contact form - fixed at the bottom of the page */
	.open-button {
		background-color: #555;
		color: white;
		padding: 16px 20px;
		border: none;
		cursor: pointer;
		opacity: 0.8;
		width: 500px;
		margin:10px 0;
	}
	.open-button1 {
		background-color: #555;
		color: white;
		padding: 16px 20px;
		border: none;
		cursor: pointer;
		opacity: 0.8;
		margin-right:5px;
		width: 250px;
	}

	/* The popup form - hidden by default */
	.form-popup {
		display: none;
		border: 3px solid #f1f1f1;
		z-index: 9;
	}

	/* Add styles to the form container */
	.form-container {
		max-width: 100%;
		padding: 10px;
		background-color: white;
	}

	/* Full-width input fields */
	.form-container input[type=text], .form-container select {
		width: 100%;
		padding: 15px;
		margin: 5px 0 22px 0;
		border: none;
		background: #f1f1f1;
	}

	/* When the inputs get focus, do something */
	.form-container input[type=text]:focus, .form-container select:focus {
		background-color: #ddd;
		outline: none;
	}

	/* Set a style for the submit/login button */
	.form-container .btn {
		background-color: #4CAF50;
		color: white;
		padding: 16px 20px;
		border: none;
		cursor: pointer;
		width: 100%;
		margin-bottom:10px;
		opacity: 0.8;
	}

	/* Add a red background color to the cancel button */
	.form-container .cancel {
		background-color: red;
	}

	/* Add some hover effects to buttons */
	.form-container .btn:hover, .open-button:hover {
		opacity: 1;
	}
	.hidden{display: none;}
</style>
<script>
	function openForm() {
		$('#myForm').toggle();
	}

	function closeForm() {
		$('#myForm').toggle();
	}
	function openForm2() {
		$('#myForm3').toggle();
	}

	function closeForm2() {
		$('#myForm3').toggle();
	}
	function openForm7() {
		$('#myForm7').toggle();
	}

	function closeForm7() {
		$('#myForm7').toggle();
	}
	function openForm1(id,idk,isi,ans,options) {
	options = JSON.parse(options);
	var $select = $('#edit-options').selectize(); 
	var selectize = $select[0].selectize;
	selectize.clear();
	selectize.clearOptions(); 


	$.each(options,function(k,v){
	selectize.addOption({tag:v.option});
	selectize.addItem(v.option);
	});
	document.getElementById("myForm1").style.display = "block";
	document.getElementById("id10").value=id;
	document.getElementById("kategori2").value=idk;
	document.getElementById("pertanyaan1").value=isi;
	document.getElementById("jawaban1").value=ans;
}

function closeForm1() {
	document.getElementById("myForm1").style.display = "none";
}
function openForm4(id,isi) {
	//alert(id+" "+isi);
	document.getElementById("myForm4").style.display = "block";
	document.getElementById("id20").value=id;
	document.getElementById("kategori10").value=isi;
}

function closeForm4() {
	document.getElementById("myForm4").style.display = "none";
}

function openForm8() {
	//alert(id+" "+isi);
	document.getElementById("myForm8").style.display = "block";

}

function closeForm8() {
	document.getElementById("myForm8").style.display = "none";
}

function hapus(id){
	location.href="{{url('admin/form/delete-question')}}?id="+id+"&idsoal=<?php echo$idsoal ?>&cmd=delete";
}
function hapusk(id){
	location.href="{{url('admin/form/delete-category')}}?id="+id+"&idsoal={{$idsoal}}&cmd=delete";
}
function naik(id){
	location.href="ubah.php?id="+id+"&idsoal=<?php echo$idsoal ?>";
}
function naikk(id){
	location.href="ubahk.php?id="+id+"&idsoal=<?php echo$idsoal ?>";
}
function lihat(idsoal){
	location.href="{{url('admin/form/view-data')}}?idsoal="+idsoal;
}
function soal(idsoal){
	location.href="{{url('form')}}/"+idsoal;
}
function back(){
	location.href="bsoal.php";
}
</script>
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Form Builder </h4>
						<p class="card-category"> {{ __('Here you can manage forms') }}</p>
					</div>
					<div class="card-body">

						<div>
							<button class="open-button1" onclick="lihat('<?php echo $idsoal; ?>')">Lihat Data</button>
							<button class="open-button1" onclick="soal('<?php echo $slug; ?>')">Ke Halaman Soal</button>
							<button class="open-button1" onclick="location.href='{{url('admin/form/')}}'">Kembali</button>
						</div>
						<!-- DESKRIPSI -->
						<button class="open-button" onclick="openForm7()">Ubah Deskripsi</button>

						<div class="form-popup" id="myForm7">
							<form action="{{url('admin/form/change-description')}}" method = "POST" class="form-container">
								@csrf
								<h3>Deskripsi</h3>
								<input type="text" hidden name = "id" id="id1">
								<input type="text" hidden name = "idsoal" value="<?php echo $idsoal;?>">
								<label for="kategori"><b>Deskripsi</b></label>

								<input type="text" name = "deskripsi">

								<button type="submit" class="btn"name="button" value="add">Ubah</button>
								<button type="button" class="btn cancel" onclick="closeForm7()">Tutup</button>
							</form>
						</div>



						<div style="width:100%;height: 150px;border: 1px black solid;padding : 20px;">
							{{$form_description != "" ? $form_description->deskripsi : ''}}
						</div>



						<!-- KATEGORI -->
						<button class="open-button" onclick="openForm2()">Tambah Kategori</button>


						<!-- TAMBAH KATEGORI -->


						<div class="form-popup" id="myForm3">
							<form action="{{url('admin/form/add-category')}}" method = "POST" class="form-container">
								<h3>Kategori baru</h3>
								@csrf
								<input type="text" hidden name = "id" id="id1">
								<input type="hidden" name="cmd" value="add">
								<input type="hidden" name="idsoal" value="{{$idsoal}}">
								<label for="kategori"><b>Kategori</b></label>
								<input type="text" name = "kategori" id="kategori" required>
								<button type="submit" class="btn"name="button" value="add">Tambah</button>
								<button type="button" class="btn cancel" onclick="closeForm2()">Tutup</button>
							</form>
						</div>


						<!-- EDIT KATEGORI -->


						<div>
							<div class="form-popup" id="myForm4">
								<form action="{{url('admin/form/edit-category')}}" method = "POST" class="form-container">
									@csrf
									<h3>Edit Kategori</h3>
									<input type="text" hidden name = "id" id="id20">
									<input type="hidden" name="cmd" value="edit">
									<input type="text" hidden name = "idsoal" value="<?php echo $idsoal;?>">
									<label for="kategori"><b>Kategori</b></label>
									<input type="text" name = "kategori" id="kategori10" required>
									<button type="submit" class="btn" name="button" value="ubah">Ubah</button>
									<button type="button" class="btn cancel" onclick="closeForm4()">Tutup</button>
								</form>
							</div>



							<table class="table table-bordered" border = 1 style="width:100%;">
								<tr>
									<td>Nomor</td>
									<td>ID</td>
									<td>Kategori</td>
									<td>Action</td>
								</tr>
								@foreach($form_categories as $i => $r)
								<?php
								$id = $r->idkategori;
								$isi = $r->kategori;
								?>

								<tr>
									<td><?php echo $i+1;?></td>
									<td><?php echo $id;?></td>

									<td><?php echo $isi;?></td>

									<td>
										<button type="button" class="btn" onclick="openForm4('<?php echo $id;?>','<?php echo $isi;?>')">Edit</button>
										<button type="button" class="btn" onclick="hapusk('<?php echo $id;?>')">Hapus</button>
										<button type="button" class="btn" onclick="naikk('<?php echo $id;?>')">Pindah Posisi</button>
									</td>
									@endforeach
								</tr>
							</table>

						</div>





						<!-- PERTANYAAN-->



						<button class="open-button" onclick="openForm()">Tambah Pertanyaan</button>

						<div class="form-popup" id="myForm">
							<form action="{{url('admin/form/add-question')}}" method = "POST" class="form-container">
								@csrf
								<h3>Pertanyaan baru</h3>
								<input type="text" hidden name = "id" id="id">
								<input type="text" hidden name = "idsoal" value="<?php echo $idsoal;?>">
								<input type="hidden" name="cmd" value="add">
								<label for="pertanyaan"><b>Pertanyaan</b></label>

								<input type="text" name = "quesioner" id="pertanyaan" required>
								<label for="kategori"><b>Kategori</b></label>
								<select name="idkategori" id="kategori">
									@foreach($form_categories as $i => $r)
									<?php
									$idk = $r->idkategori;
									$kt = $r->kategori;
									?>
									<option value="<?php echo $idk; ?>"><?php echo $kt; ?></option>
									@endforeach
								</select>
								<label for="jawaban"><b>Jawaban</b></label>
								<select name="jawaban" id="jawaban">
									<option value="0">Kosong</option>
									<option value="1">Pilihan</option>
									<option value="2">Text pendek</option>
									<option value="3">Text panjang</option>
									<option value="4">E-Mail</option>
									<option value="5">Nomor HP</option>
									<option value="6">Score</option>
									<option value="7">Ya/Tidak</option>
									<option value="8">Tanggal</option>
									<option value="9">Centang / Checkbox</option>
									<option value="10">Upload File</option>
								</select>
								<div id="option-wrapper" style="display:none;">
									<label>Options</label>
									<input type="text" class="selectize" name="options" id="options">
								</div>
								<button type="submit" class="btn" name="button" value="add">Buat</button>
								<button type="button" class="btn cancel" onclick="closeForm()">Tutup</button>
							</form>
						</div>

						<!-- EDIT PERTANYAAN-->

						<div>
							<div class="form-popup" id="myForm1">
								<form action="{{url('admin/form/add-question')}}" method = "POST" class="form-container">
									<h3>Edit Pertanyaan</h3>
									@csrf
									<input type="text" hidden name = "id" id="id10">
									<input type="hidden" name="cmd" value="edit">
									<input type="text" hidden name = "idsoal" value="<?php echo $idsoal;?>">
									<label for="pertanyaan1"><b>Pertanyaan</b></label>
									<input type="text" name = "quesioner" id="pertanyaan1" value="" required>

									<label for="jawaban"><b>Jawaban</b></label>
									<select name ="jawaban" id="jawaban1">
										<option value="0">Kosong</option>
										<option value="1">Pilihan</option>
										<option value="2">Text pendek</option>
										<option value="3">Text panjang</option>
										<option value="4">E-Mail</option>
										<option value="5">Nomor HP</option>
										<option value="6">Score</option>
										<option value="7">Ya/Tidak</option>
										<option value="8">Tanggal</option>
										<option value="9">Centang / Checkbox</option>
										<option value="10">Upload File</option>
									</select>
									<label for="kategori"><b>Kategori</b></label>
									<select name="idkategori" id="kategori2">
										@foreach($form_categories as $i => $r)
										<?php
										$idk= $r->idkategori;
										$kt = $r->kategori;
										?>
										<option value="<?php echo $idk; ?>"><?php echo $kt; ?></option>
										@endforeach
									</select>
									<div id="edit-option-wrapper" style="display:none;">
									<label>Options</label>
									<input type="text" class="selectize" name="options" id="edit-options">
								</div>
									<button type="submit" class="btn" name="button" value="ubah">Ubah</button>
									<button type="button" class="btn cancel" onclick="closeForm1()">Tutup</button>
								</form>
							</div>




							<table class="table table-bordered" border = 1 style="width:100%;">
								<tr>
									<td>Nomor</td>
									<td>ID</td>
									<td>ID Kategori</td>
									<td>Pertanyaan</td>
									<td>Jenis Jawaban</td>
									<td>Action</td>
								</tr>
								@foreach($form_questions as $i => $r)
								<?php
								$id = $r->idpertanyaan;
								$idk = $r->idkategori;
								$isi = $r->quesioner;
								$ans = $r->jawaban;
								$options = $r->options; 
								?>

								<tr>
									<td><?php echo $i+1;?></td>
									<td><?php echo $id;?></td>
									<td><?php echo $idk;?></td>
									<td><?php echo $isi;?></td>
									<td>
										<?php
										if($ans == 0){
											?>
											Kosong
											<?php
										}
										if($ans == 1){
											?>
											Pilihan 
											@if(count($r->options))
											<div>Options :</div>
											@foreach($r->options as $option)
											<div>
												{{$option->option}}
											</div>
											@endforeach
											@endif
											<?php
										}if($ans == 2){
											?>
											Text pendek
											<?php
										}if($ans == 3){
											?>
											Text panjang
											<?php
										}if($ans == 4){
											?>
											E-Mail
											<?php
										}if($ans == 5){
											?>
											Nomor HP
											<?php
										}if($ans == 6){
											?>
											Score
											<?php
										}if($ans == 7){
											?>
											Ya/Tidak
											<?php
										}if($ans == 8){
											?>
											Tanggal
											<?php
										}if($ans == 9){
											?>
											Centang / Checkbox
											@if(count($r->options))
											<div>Options :</div>
											@foreach($r->options as $option)
											<div>
												{{$option->option}}
											</div>
											@endforeach
											@endif
											<?php
										}?>
									</td>
									<td>

										<button class="btn" type="button" onclick="openForm1(`<?php echo $id;?>`,`<?php echo $idk;?>`,`<?php echo $isi;?>`,`<?php echo $ans;?>`,`{{json_encode($options)}}`)">Edit</button>

										<button class="btn" type="button" onclick="hapus('<?php echo $id;?>')">Hapus</button>
										<button class="btn" type="button" onclick="naik('<?php echo $id;?>')">Pindah Posisi</button>
									</td>
									@endforeach
								</tr>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
	$( document ).ready(function() {
      $('.selectize').selectize({
          delimiter: '|',
          persist: false,
          valueField: 'tag',
          labelField: 'tag',
          searchField: 'tag',
          create: function(input) {
              return {
                  tag: input
              }
          }
      });
  });
	$('#jawaban').on('change',function(){
		if($(this).val() == 1 || $(this).val() == 9){
			$('#option-wrapper').show();
		}else{
			$('#option-wrapper').hide();
		}
	});
	$('#jawaban1').on('change',function(){
		if($(this).val() == 1 || $(this).val() == 9){
			$('#edit-option-wrapper').show();
		}else{
			$('#edit-option-wrapper').hide();
		}
	});
</script>
@endpush