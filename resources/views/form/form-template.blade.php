@extends('layouts.form.default')
<?php
$ds = isset($_GET['ds'])? $_GET['ds']:'';
$jsoal = $form->soal;
?>


@section('content')
	<div class="flex-center position-ref full-height form-bg">
		<div class="container-fluid h-100" >
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-11 col-md-10 col-lg-7 card-wrapper" >
					<div class="row">
						<div class="card card-center">
							<div class="card-body">

								<div class="form-example">

									<div class="text-center">
										<?php
										if($page==1){
											echo "<h1>".$jsoal."</h1>"; 

											?>
											@if($description != '' && $description->deskripsi != "")
											<p class="description">
												{{ $description != '' ? $description->deskripsi : ''}}
											</p>
											<br>
											@endif
											<?php
										}
										?>
									</div>

									<form action="{{url('/form/'.$slug)}}" method = "POST" style="">
										@csrf
										@foreach($categories_limit as $ii => $r)
										<?php
										$ids = $r->idsoal;
										$idk = $r->idkategori;
										$kategori = $r->kategori;

										echo "<div class='form-row form-group'><div class='col-md-12 text-center'>".$kategori."</div></div>";
										?>
										@foreach($r->questions as $r1)
										<?php
										$ii = $ii +1;
										$id = $r1->idsoal;
										$idp = $r1->idpertanyaan;
										$isi = $r1->quesioner;
										$ans = $r1->jawaban;

										echo "<div class='form-row form-group justify-content-center'><label class='col-md-12 text-center' style='margin-bottom:30px;'><h3>".$isi."</h3></label> ";
										?>
										<?php
										if($ans == 1){
											?>
											<div class="col-md-9">
												<select class="form-control my-input" name="{{$ii}}">
													<option value=""> Select One Option</option>
													@if($r1->options != "")
													@foreach($r1->options as $option)
													<option>{{$option->option}}</option>
													@endforeach
													@endif
												</select><br>
											</div>
											<?php
										}
										if($ans == 2){
											?>
											<div class="col-md-9"><input type="text" class="form-control my-input" required name="<?php echo $ii; ?>"><br></div>
											<?php
										}if($ans == 3){
											?>
											<div class="col-md-9"><textarea required style="width:100%;height:200px;margin-bottom:15px;padding:15px;" class="form-control my-input" name="<?php echo $ii; ?>"></textarea><br></div>
											<?php
										}if($ans == 4){
											?>
											<div class="col-md-9"><input type="email" class="form-control my-input" required name="<?php echo $ii; ?>"><br></div>
											<?php
										}if($ans == 5){
											?>
											<div class="col-md-9"><input type="text" class="form-control my-input" required name="<?php echo $ii; ?>"><br></div>
											<?php
										}if($ans == 6){
											?>
											<div class="col-md-9">
												<div class="row">
													<div class="rating-wrapper" style="display: block;margin:0 auto;">
														<input type="radio" id="1" required name="<?php echo $ii; ?>" value = "1"> <label for="1">1</label>
														<input type="radio" id="2" name="<?php echo $ii; ?>" value = "2"> <label for="2">2</label>
														<input type="radio" id="3" name="<?php echo $ii; ?>" value = "3"> <label for="3">3</label>
														<input type="radio" id="4" name="<?php echo $ii; ?>" value = "4"> <label for="4">4</label>
														<input type="radio" id="5" name="<?php echo $ii; ?>" value = "5"> <label for="5">5</label>
													</div>
												</div>
											</div>
											<?php
										}if($ans == 7){
											?>
											<div class="col-md-9 text-center">
												<div class="form-check-inline">
													<input type="radio" class="form-check-input my-input" required name="<?php echo $ii; ?>" id="ya" value = "ya">
													<label for="ya" class="form-check-label">ya</label>
												</div>
												<div class="form-check-inline">
													<input type="radio" class="form-check-input" required name="<?php echo $ii; ?>" id="tidak" value = "tidak"> 
													<label for="tidak" class="form-check-label">tidak</label>
												</div>
												<br>
											</div>
											<?php
										}if($ans == 8){
											?>
											<div class="col-md-9 text-center"><input required type="date" class="form-control my-input" name="<?php echo $ii; ?>"><br></div>
											<?php
										}if($ans == 9){
											?>
											<div class="col-md-9 text-center">
												<div class="form-inline row justify-content-center">
													<div>
														@foreach($r1->options as $key=> $option)

														<div style="float:left;margin-right:20px;">
															<input type="checkbox" name="{{ $ii}}[]" class="form-check-input form-control my-input" value="{{$option->option}}" style="display: inline">
															<label class="form-check-label" style="display: inline">{{$option->option}}</label>
														</div>

														@endforeach
													</div>
												</div>
												<br>
											</div>
											<?php
										}if($ans == 0){
											?>

											<input type="text" hidden value="" name="<?php echo $ii; ?>">

											<br>
											<?php

										}
										?>
									</div>
									@endforeach
									@endforeach 
									<input type="text" hidden name="page" value=<?php echo $page; ?>>
									<input type="hidden" name="ds" value="{{$ds}}">
									<input type="text" hidden name="idsoal" value=<?php echo $idsoal; ?>>
									<?php
									if($page< $pages){?>
										<div class="text-center">
											<button type="submit" class="btn btn-primary" name = "tombol" value="berikutnya" style="border:1px solid black;color:black;background:none;font-weight: bold;width:120px;">Next</button>
										</div>
										<?php 
									}else{
										?>
										<div class="text-center">
											<button type="submit" class="btn my-input" name = "tombol" value="selesai" style="border:1px solid black;color:black;background:none;font-weight: bold;width:120px;">Finish</button>
										</div>
										<?php 
									}
									?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('more-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	@if(session('status'))
	swal("{{session('status')}}");
	@endif	
</script>
@endpush