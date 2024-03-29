@extends('layouts.app-auth')
@push('head-js')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">

					<div class="card-body">
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
				
					<form class="w3-container w3-padding" action="{{url('admin/email-marketing/sendmail')}}" method="POST">
						@csrf
						<div class="w3-container w3-margin-bottom">
							Subjek Email : <input type="text" name="judul" style="width:50%;" value="<?php echo stripslashes($email[1]); ?>">
						</div>
						<div class="w3-container w3-margin-bottom">
							<textarea name="isi" style="min-height:500px;"><?php echo stripslashes($email[2]); ?></textarea>
						</div>
						<div class="w3-container w3-margin-bottom">
							<button class="w3-btn w3-input w3-blue">Kirim</button>
						</div>
					</form>
					<div class="w3-container">
						<h1 class="w3-center">MURID YANG BERULANG TAHUN HARI INI</h1>
						<table class="w3-table-all">
							<tr>
								<th>No.</th>
								<th>Nama </th>
								<th>Email </th>
							</tr>
							<?php
							foreach($r as $i => $r){
								$r = array_values($r);
								$i += 1;

								$nama = $r[1];
								$email = $r[2];
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $nama;?></td>
									<td><?php echo $email;?></td>
								</tr>
								<?php
							}
							?>
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
<script>
	function myimage_upload_handler (blobInfo, success, failure, progress) {
		var xhr, formData;

		xhr = new XMLHttpRequest();
		xhr.withCredentials = false;
		xhr.open('POST', '{{url("admin/email-marketing/upload-gambar")}}');

		xhr.upload.onprogress = function (e) {
			progress(e.loaded / e.total * 100);
		};

		xhr.onload = function() {
			var json;

			if (xhr.status === 403) {
				failure('HTTP Error: ' + xhr.status, { remove: true });
				return;
			}

			if (xhr.status < 200 || xhr.status >= 300) {
				failure('HTTP Error: ' + xhr.status);
				return;
			}

			json = JSON.parse(xhr.responseText);

			if (!json || typeof json.location != 'string') {
				failure('Invalid JSON: ' + xhr.responseText);
				return;
			}

			success(json.location);
		};

		xhr.onerror = function () {
			failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
		};

		formData = new FormData();
		formData.append('file', blobInfo.blob(), blobInfo.filename());
		formData.append('_token','{{csrf_token()}}');
		xhr.send(formData);
	};

	tinymce.init({
		selector: 'textarea',
		plugins: 'image code advlist autolink lists link charmap print preview hr anchor pagebreak table paste',
		toolbar: 'undo redo | link image | code', /* enable title field in the Image dialog*/
		table: { title: 'Table', items: 'inserttable tableprops deletetable row column cell' },
		powerpaste_word_import: "clean",
		powerpaste_html_import: "merge",
		paste_data_images: true,
		images_upload_handler: myimage_upload_handler
	});
</script>
@endpush