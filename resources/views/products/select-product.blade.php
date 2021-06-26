@extends('products.registration-payment')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
@section('registration-payment-content')
@if(!$data_reseller['cek_exist'])
<div class="container">
	<div class="row">
		<div class="col-md-12 pb-5">
			<div class="card">
				<div class="card-body">


					<form action="{{route('reseller-regis-detail-product')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="kode_reseller" value="{{$data_reseller['kode_reseller']}}">
						<input type="hidden" name="slug" value="{{$data_reseller['slug']}}">
						<input type="hidden" name="REF_PRICELIST" value="{{$data_reseller['REF_PRICELIST']}}">
						<input type="hidden" name="REF_PAKET" value="{{$data_reseller['REF_PAKET']}}">
						<div class="col-md-12 text-center mb-3">
							<h3><strong>Detail Produk</strong></h3>
							<div>Masukkan informasi paket yang ingin diambil</div>
						</div>
						<div class="col-md-12">
							<div class="row form-group">
								<div class="col-md-3">
									Jenis Produk
								</div>
								<div class="col-md-9">
									{{$data_reseller["NAMA_PRICELIST"]}}
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-3">
									Produk
								</div>
								<div class="col-md-9">
									{{$data_reseller["NAMA_PAKET"]}}
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-3 col-form-label">
									Pilih Level
								</div>
								<div class="col-md-9">
									<select class="selectize form-control" name="REF_LEVEL" id="REF_LEVEL" onchange="check_modules(this);" required>
										<option value="">- Pilih Level -</option>
										@foreach($data_reseller["levels"] as $level)
										<option value="{{$level->REF_LEVEL}}">{{$level->NAMA_LEVEL}}</option>
										@endforeach
									</select>

								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-3 col-form-label">
									Pilih Kategori
								</div>
								<div class="col-md-9">
									<select class="selectize form-control" name="REF_KATEGORI" id="REF_KATEGORI" required>
										<option value="">- Pilih Kategori -</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-3 col-form-label">
									Pilih Durasi
								</div>
								<div class="col-md-9">
									<select class="selectize form-control" name="DURATION" id="DURATION" required>
										<option value="">- Pilih Durasi -</option>
									</select>
								</div>
							</div>

							@foreach($data_reseller["levels"] as $level)
							@if($level->settings)
							@if(count($level->settings->online_test_modules) > 1)
							<div class="row form-group online-test-modules" id="{{$level->KD}}-modules" style="display: none;">
								<div class="col-md-3 col-form-label">Online Test Module</div>
								<div class="col-md-9">
									<select class="selectize form-control" id="{{$level->KD}}-modules-input" name="{{$level->KD}}_ONLINE_TEST_MODULE">
										<option value="">- Pilih Module -</option>
										@foreach($level->settings->online_test_modules as $module)
										<option value="{{$module->id}}|{{$module->name}}">{{$module->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							@else
							<input type="hidden" name="ONLINE_TEST_MODULE" value="{{ $level->settings->online_test_modules->first() != '' ? $level->settings->online_test_modules->first()->id.'|'.$level->settings->online_test_modules->first()->name : ''}}">
							@endif
							@endif
							@endforeach
							<div class="row">
								<div class="col-md-12 text-center"> 
									<button class="btn btn-primary">
										Submit
									</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@else
<div class="col-md-12 text-center" style="padding:200px 15px">
	<h3><strong>Peringatan</strong></h3>
	<div><h5>Anda telah terdaftar pada program ini pada tanggal {{date("d/m/Y",strtotime($data_reseller['cek_exist']->created_at))}}. Form pendaftaran hanya dapat di isi 1 kali per user !</h5></div>
</div>
@endif

@endsection
@push('more-script')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
	$('.selectize').selectize({
		width : 'resolve'
	});

	$('#REF_LEVEL').on('change',function(){
		var course_id = "{{$data_reseller['REF_PAKET']}}";
		var pricelist_id = "{{$data_reseller['REF_PRICELIST']}}";
		$('.loading-wrapper').show();
		$.ajax({
			url: "{{route('select-level')}}",
			method: "POST",
			data: {
				_token: token,
				course_id : course_id,
				pricelist_id : pricelist_id,
				level_id : $(this).val()
			},
			success: function(data) {

				var data = JSON.parse(data);
				var $select = $('#REF_KATEGORI').selectize();
				var selectize = $select[0].selectize;
				selectize.clearOptions();
				$.each(data,function(k,v){
					selectize.addOption({value : v.REF_KATEGORI,text : v.NAMA});
				});

				selectize.refreshOptions();
			},
			error: function(request, status, error) {
				alert(request.responseText);
			},complete:function(){
				$('.loading-wrapper').hide();
			}
		});
	});

	$('#REF_KATEGORI').on('change',function(){
		var course_id = "{{$data_reseller['REF_PAKET']}}";
		var pricelist_id = "{{$data_reseller['REF_PRICELIST']}}";
		var level_id = $('#REF_LEVEL').val();
		$('.loading-wrapper').show();
		$.ajax({
			url: "{{route('select-category')}}",
			method: "POST",
			data: {
				_token: token,
				course_id : course_id,
				pricelist_id : pricelist_id,
				level_id : level_id,
				category_id : $(this).val()
			},
			success: function(data) {
				var data = JSON.parse(data);
				console.log(data);
				var $select = $('#DURATION').selectize();
				var selectize = $select[0].selectize;
				selectize.clearOptions();
				$.each(data,function(k,v){
					selectize.addOption({value : v.JUMLAH_PERTEMUAN+"###"+v.JUMLAH_JAM,text : v.JUMLAH_PERTEMUAN+'x Pertemuan ('+v.JUMLAH_JAM+' jam)'});
				});

				selectize.refreshOptions();
			},
			error: function(request, status, error) {
				alert(request.responseText);
			},complete:function(){
				$('.loading-wrapper').hide();
			}
		});
	});
	var last_module_id = "";
	function check_modules(e){
		var level_id = e.value;
		$('.online-test-modules').hide();
		if(last_module_id != ""){
			$(last_module_id).prop('required',false);
		}
		$('#'+level_id+'-modules').show();
		last_module_id = '#'+level_id+'-modules-input';
		if($(last_module_id).length){
			$(last_module_id).prop('required',true);
			$(last_module_id).selectize()[0].selectize.destroy();
			var $select = $(last_module_id).selectize();
			var control = $select[0].selectize;
			control.clear();
		}
	}
</script>
@endpush