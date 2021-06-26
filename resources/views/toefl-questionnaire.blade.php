@extends('layouts.bp_wo_sidenav')
<style media="screen">
.rating-wrapper{
  direction:rtl;
  unicode-bidi:bidi-override;
}
.rating-wrapper input:checked ~ label {
  color:#f7dc28;
}
.rating-wrapper input{
display:none;
}
.footer-bottom{
  height:auto !important;
}
.copyright-right{
  height:inherit;
}
.questionnaire-table{
  border:1px solid #ccc;
}
.questionnaire-table td, .questionnaire-table th{
  vertical-align: middle !important;
}
  .questionnaire-table td:nth-child(2),.questionnaire-table td:first-child{
    border-right:1px solid #ccc;

  }
  .questionnaire-table td:nth-child(2){
    width:70%;
  }
    .questionnaire-table tr td:nth-child(3){
      padding-left:15px;
      padding-right:15px;
    }
@media screen and (max-width: 480px) {
  .questionnaire-table td:first-child{
    width:10%;
    height:inherit;
  }
    .questionnaire-table td:nth-child(2){
      width:90%;
      border-right:none;
    }
  .questionnaire-table td{
    float:left;
  }
  .questionnaire-table tr{
    display:flex;
    flex-wrap: wrap;
  }
  .questionnaire-table tr td:nth-child(3){
    width:100%;
  }
}
</style>
@section('content')
<div class="col-md-12 content-wrapper">


  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          @if(session()->has('message'))
          <div class="alert alert-success" style="text-align:center">
            {!! session()->get('message') !!} <br>

            <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
          </div>
          @endif

      <div class="col-md-12">
      <h2>Kuesioner</h2>
      <p>Peserta diharapkan mengisi daftar pertanyaan dan diharapkan untuk memberikan jawaban dengan
      jujur. Berikan penilaian terhadap staff dan fasilitas dengan kategori dibawah ini. Penilaian anda akan
      sangat membantu untuk meningkatkan kualitas kinerja dan pelayanan kami.</p>
      </div>

    <form class="" action="{{ url('/toefl-questionnaire')}}" method="post">
      {{ csrf_field() }}
  <div class="col-md-12">
<div class="row">
  <label class="col-md-3">Nama</label>
  <p class="col-md-9">
<input type="text" name="nama" placeholder="Nama" class="form-control" value="" required>
  </p>
  <label class="col-md-3">Tanggal Test</label>
  <p class="col-md-9">
<input type="date" name="tgl_test" class="form-control" required>
  </p>
  <label class="col-md-3">Email</label>
  <p class="col-md-9">
<input type="text" name="email" placeholder="Email" class="form-control" value="" required>
  </p>
</div>
<div class="row form-group">
  <label class="col-form-label col-md-12">Bagaimana Ruangan Test TOEFL BEST PARTNER EDUCATION?</label>
  <input type="hidden" name="q1" value="Bagaimana Ruangan Test TOEFL BEST PARTNER EDUCATION?">
  <div class="col-md-12">
    <textarea name="a1" rows="5" class="form-control"></textarea>
  </div>
</div>
<div class="row form-group">
  <label class="col-form-label col-md-12">Bagaimana Pelayanan staff BEST PARTNER EDUCATION?</label>
  <input type="hidden" name="q2" value="Bagaimana Pelayanan staff BEST PARTNER EDUCATION?">
  <div class="col-md-12">
    <textarea name="a2" rows="5" class="form-control"></textarea>
  </div>
</div>
<div class="row form-group">
  <label class="col-form-label col-md-12">Kritik &amp; Saran untuk staff - staff kami dan kantor BEST PARTNER EDUCATION?</label>
  <input type="hidden" name="q3" value="Kritik &amp; Saran untuk staff - staff kami dan kantor BEST PARTNER EDUCATION?">
  <div class="col-md-12">
    <textarea name="a3" rows="5" class="form-control"></textarea>
  </div>
</div>
<div class="row form-group" style="padding:0 15px;">

  <span>Worst</span>
  <div class="rating-wrapper" style="margin:0 10px;">


<input type="radio" id="r4" name="rating" class="rating"  value="4">
<label for="r4"> <i class="fa fa-star"></i> </label>
<input type="radio" id="r3" name="rating" class="rating" value="3">
<label for="r3"> <i class="fa fa-star"></i> </label>
<input type="radio" id="r2" name="rating" class="rating" value="2">
<label for="r2"> <i class="fa fa-star"></i> </label>
<input type="radio" id="r1" name="rating" class="rating" value="1">
  <label for="r1"> <i class="fa fa-star"></i> </label>
          </div>
  <span>Best</span>
</div>
<div class="row">

  <div class="col-md-12">
    <input type="submit" name=""  value="Submit" class="btn btn-primary" style="padding:7px 28px">
  </div>
</div>


  </div>

      </form>

              </div>
            </div>
          </div>
        </div>
</div>
<script type="text/javascript">
function close_alert(){
  $('.alert').hide();
}
function check_rating(){
  var rating = document.getElementsByClassName('rating');
  var length = rating.length;
  var cek = "false";
  for(var x=0;x<length;x++){
//    alert(rating);
    if(rating[x].checked){
      cek="true";
      x==length;
      break;
    }
  }
  if(cek=="true"){
    return true;
  }else{
    alert('Anda belum memberikan rating untuk tutor');
    return false;
  }
}
</script>
@stop
