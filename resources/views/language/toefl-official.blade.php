@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.multidatespicker.css')}}">

<style media="screen">
  .form-check-inline {
    margin-left: .75rem;
  }

  .portfolio-background{
    height:300px;
    background:url('{{asset('img/registration-background.png')}}');
    background-position: center;
    background-size: cover;
    background-repeat:no-repeat;
  }

  .inline-wrapper.{
    white-space: nowrap;position:absolute;top:0;left:0;width: 100%;z-index: 2;height:65px;
  }

  .inline {
    display: inline-block;
    width: 20%;

    background:#f2f2f2;

  }
  .inline:hover{
    cursor: pointer;
  }
  .inline.active{
    background:#00B4D8;
    color:white;
  }

  .wrap {
    display: table;
    table-layout: fixed;
    word-wrap: break-word;
    height:  66px;
    width:   100%;
    padding: 10px;
  }
  .wrap p {
    font-size: 1em;
    display:        table-cell;
    vertical-align: middle;
    text-align: center;
  }


  .tab-wrapper{
    display: none;
  }
  .tab-wrapper.show{
    display: block;
  }

  .parsley-errors-list{
    padding:0 15px;
    color:red;
    margin: 0;
  }

  input[type="date"]:before {

    content: attr(placeholder) !important;
    width: 100%;
  }

  input[type="date"]:focus:before,
  input[type="date"]:not([value=""]):before {
    width: 0;
    display: none;
  }

  .alert {
    position: fixed !important;
    top: 50%;
    left: 50%;
    width: 450px;
    padding: 15px;
    transform: translate(-50%, -50%);
    background-color: #f2eee1;
    z-index: 99999;
  }

  .alert button {
    float: right;
  }

  .btn-primary.disabled,
  .btn-primary:disabled {
    cursor: not-allowed;
  }

  .colon {
    float: right;
  }


  .calendar-code-wrapper{
    margin-right:25px;
  }
  .calendar-code-color{
    padding:0px 8px;
    border:1px solid #dedede;
  }
  .calendar-code-color.selected{
    background: #2480bd;
  }
  .calendar-code-color.available{
    background: #e6e6e6;
  }
  #ui-datepicker-div{
    width:300px !important;
  }
  .ui-datepicker{
    width:100% !important;
    border:none !important;
    line-height: 1.2em;
    height:300px;
    padding:0 !important;
  }

  .ui-datepicker-calendar thead tr th{
    color:black;
    font-family: arial;
  }
  .ui-datepicker-group{
    background:white !important;
    border-radius:0;
    width:49% !important;
    border:1px solid #bebebe;
    min-height: 280px;
    overflow: hidden;
  }
  .ui-datepicker-group-first{
    margin-right:1%;

  }
  .ui-datepicker-group-last{
    margin-left:1%;
  }

  .ui-datepicker-header{
    background:#454f52;
    color:white;  
    border-radius:0;
    padding:10px 0 !important;
    border:none;
    font-family: arial;
  }
  .ui-datepicker-prev{
   background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAMCAYAAACulacQAAAAUklEQVQYlXWPwQnAMAwDj9IBOlpH8CjdJLNksuujFIJjC/w6WUioFBcqJ7sGEAD5Y/hpqLRghRv4YQlUjqXI3Kql2MixraGbEhVcDXcFUR/1egEHNuTBpFW0NgAAAABJRU5ErkJggg==') !important;
   height: 12px !important;
   width: 7px !important;
   top:2px !important;
   left: 0px !important;
   background-color: transparent !important;
 }
 .ui-datepicker-next{
   background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAMCAYAAABfnvydAAAAVUlEQVQYlXWQ0Q3AIAhEL07gKI7kKN2kI3Wk1w9to3KQEELucQEECOizhhTQGHFnwOdgobWx0GkZILfYBhXl0STVbPoBarbkL7ozN/F8VBBXh8uJgF5r2hrI4GHUkAAAAABJRU5ErkJggg==') !important;
   height: 12px !important;
   width: 8px !important;
   top:2px !important;
   right: 0 !important;
   background-color: transparent !important;
 }
 .ui-datepicker-prev,.ui-datepicker-next{
  border:none !important;
  margin: 16px 10px;
}
.ui-corner-all{
  border:none !important;
}
.ui-datepicker-next:hover,.ui-datepicker-prev:hover{
  cursor: pointer;
}
.ui-datepicker-next span,.ui-datepicker-prev span {
  display: none !important;
}


.ui-datepicker-unselectable.ui-state-disabled .ui-state-default{
  background:white !important;
}
.ui-state-default{
  background:#e6e6e6 !important;
}
.ui-state-active, .ui-widget-content .ui-state-active{
  background: #2480bd !important;
  color:white;
}
@media screen and (min-width:1366px){
  .portfolio-background{
    height: 350px;
  }

  .ui-datepicker{
    width:800px !important;
  }
}
@media screen and (max-width:860px){
  .portfolio-background{
    height:200px;
  }
}
@media screen and (max-width:576px){
  .portfolio-background{
    height:200px;
    background-size: cover;

  }
  .inline{
    width:50% !important;
    border:1px solid #dadada;
  }
  .inline:last-child{
    width: 100% !important;
  }
  .wrap p {
    font-size: 0.9em;
  }
  .ui-datepicker-group{
    width:100% !important;
    margin:0 0 15px 0 !important;
  }
  .ielts-official-form{
    padding:0;
  }

  .calendar-code-wrapper{
   display: block;
   margin:0;
   width:100%;
 }
}

@media screen and (max-width: 990px){
  .inline{
    display: block;
    width:33.333333%;
    float:left;
  }
  .inline-wrapper{
    display: block;
    position:relative;
  }
}
@media screen and (min-width: 990px){
  .inline-wrapper{
    height: 65px;
    margin-top:-65px;
  }

}
</style>
@endpush
@section('content')
@if(session()->has('message'))
<div class="alert alert-success" style="text-align:center">
  {!! session()->get('message') !!} <br>

  <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
</div>
@endif
<div class="col-md-12 myform">
  <div class="row">
   <div class="col-md-12 portfolio-background">

   </div>

 </div>
 <!--  <div class="col-md-12">
    <h2>Ingin Kuliah di Luar Negeri ? Mulainya Dari Sini</h2>
    <p>Isi Formulir Registrasi di bawah ini, Staf kami akan segera menghubungi anda kembali</p>
  </div> -->
  <div class="row justify-content-center">
    <div class="col-md-10">
     <div class="row">     
       <div class="col-md-12" style="padding:0;">
         <div class="inline-wrapper">
           <div class="inline active">
            <div class="wrap">
              <p>Select Test Date</p>
            </div>
          </div><div class="inline" onclic="openTab('')">
            <div class="wrap">
              <p>Candidate Detail</p>
            </div>
          </div><div class="inline">
            <div class="wrap">
              <p>Postal Address</p>
            </div>
          </div><div class="inline">
            <div class="wrap">
              <p>Occupation & Education</p>
            </div>
          </div><div class="inline">
            <div class="wrap">
              <p>Documents Upload</p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">     
     <div class="col-md-12 card ielts-official-form" >
      <div class="card-body">
        <form name="myForm" id="myForm" action="/products/toefl-test/official" enctype="multipart/form-data" method="post">
          @csrf
          <div class="tab-wrapper office-wrapper show">
            <div class="form-group row">
               <div class="col-md-12 pb-3">
                  <strong> Please select your preferred test date </strong> / Silahkan pilih tanggal tes yang anda inginkan 


                </div>
             <div class="col-md-12">
              <input type="hidden" name="TGL_TEST" id="TGL_TEST">
              <div id="datepicker"></div>
            </div>

            <div class="col-md-12 mt-2 mb-2">
              <span class="calendar-code-wrapper"><span class="calendar-code-color available">&emsp;</span> Test Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color">&emsp;</span> Test Not Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color selected">&emsp;</span> Selected Date</span>
            </div>

          </div>
          <div class="form-group row">
            <div class="col-md-12">
            <p class="form-check-inline m-0">

              <input type="checkbox" name="agree" id="agree" class="form-check-input" value="">  <label class="form-check-label" for=""> Setuju dengan <a href="{{url('/products/toefl-test/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>
              </p>
              </div>
            </div>
          </div>
          <div class="tab-wrapper office-wrapper">
              <div class=" row">

                <div class="col-md-12">
                  <div class="form-group row">

                    <div class="col-md-12">
                      <strong> Salutation*</strong> / Gelar 
                    </div>
                    <div class="col-md-12">
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="TITLE" value="Dr" {{ session('ielts_form.title')=="Dr" ? 'checked' : '' }} required> <label class="form-check-label" for="">Dr</label>
                      </div>
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="TITLE" value="Mr" {{ session('ielts_form.title')=="Mr" ? 'checked' : '' }} required> <label class="form-check-label" for="">Mr</label>
                      </div>
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="TITLE" value="Mrs" {{ session('ielts_form.title')=="Mrs" ? 'checked' : '' }} required> <label class="form-check-label" for="">Mrs</label>
                      </div>
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="TITLE" value="Miss" {{ session('ielts_form.title')=="Miss" ? 'checked' : '' }} required> <label class="form-check-label" for="">Miss</label>
                      </div>
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="TITLE" value="Ms" {{ session('ielts_form.title')=="Ms" ? 'checked' : '' }} required> <label class="form-check-label" for="">Ms</label>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">

                    <div class="col-md-12">
                      <strong> Gender </strong> / Jenis Kelamin
                    </div>
                    <div class="col-md-12">
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="JK" id="male" value="Male" {{ session('ielts_form.gender')=="Male" ? 'checked' : '' }} required>
                        <label class="form-check-label" for="">Male</label>
                      </div>
                      <div class="form-check-inline">
                        <input type="radio" name="JK" id="female" value="Female" class="form-check-input" {{ session('ielts_form.gender')=="Female" ? 'checked' : '' }} required>
                        <label class="form-check-label" for="">Female</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <p class="col-md-12">
                  <strong>Given Name*</strong> / Nama Depan </p>
                  <p class="col-md-12">
                    <input type="text" class="form-control" placeholder="Given Name / Nama Depan" name="nama_depan" value="@if(Session::has('ielts_form')){{session('ielts_form.nama_depan')}}@endif" required>
                  </p>
                </div>
                <div class="form-group row">
                  <p class="col-md-12"> <strong>Middle Name (if any) </strong> / Nama Tengah (Jika Ada) </p>
                  <p class="col-md-12">
                    <input type="text" class="form-control" name="nama_tengah" value="@if(Session::has('ielts_form')){{session('ielts_form.nama_tengah')}}@endif" placeholder="Middel Name / Nama Tengah" value="">
                  </p>
                </div>
                <div class="form-group row">

                  <p class="col-md-12"><strong>Family Name*</strong> / Nama Belakang  </p>
                  <p class="col-md-12">
                    <input type="text" class="form-control" placeholder="Family Name / Nama Belakang" name="nama_belakang" value="@if(Session::has('ielts_form')){{session('ielts_form.nama_belakang')}}@endif">

                  </p>

                </div>
                <div class="form-group row">

                  <p class="col-md-12">
                    <strong> Date of Birth* </strong> / Tanggal Lahir
                  </p>
                  <div class="col-md-12">

                    <input type="text" class="form-control" name="TGL_LAHIR" id="TGL_LAHIR" placeholder="(dd/mm/yyyy)" required="">
                  </div>



                </div>


                <div class="form-group row">
                  <p class="col-md-12"> <strong>Religion</strong> / Agama </p>
                  <p class="col-md-12">
                    <select class="form-control" id="agama" name="AGAMA" required>
                      <option value="">Agama</option>
                      <option value="Budha" {{ session('ielts_form.agama')=="Budha" ? 'selected' : '' }}>Budha</option>
                      <option value="Katholik" {{ session('ielts_form.agama')=="Katholik" ? 'selected' : '' }}>Katolik</option>
                      <option value="Kristen" {{ session('ielts_form.agama')=="Kristen" ? 'selected' : '' }}>Kristen</option>
                      <option value="Kong Hu Cu" {{ session('ielts_form.agama')=="Kong Hu Cu" ? 'selected' : '' }}>Kong Hu Cu</option>
                      <option value="Hindu" {{ session('ielts_form.agama')=="Hindu" ? 'selected' : '' }}>Hindu</option>
                      <option value="Islam" {{ session('ielts_form.agama')=="Islam" ? 'selected' : '' }}>Islam</option>
                    </select>

                  </p>
                </div>
                <div class="form-group row">
                  <p class="col-md-12"> <strong>Phone Number*</strong> / No. HP / WA </p>
                  <p class="col-md-12">
                    <input type="text" class="form-control" placeholder="No Telp" pattern="(\+62 ((\d{3}([ -]\d{3,})([- ]\d{4,})?)|(\d+)))|(\(\d+\) \d+)|\d{3}( \d+)+|(\d+[ -]\d+)|\d+" name="KONTAK" value="@if(Session::has('ielts_form')){{session('ielts_form.no_telepon')}}@endif" required>
                  </p>

                </div>
                <div class="form-group row">
                  <p class="col-md-12"><strong>Email Address</strong> / Alamat Surel  </p>
                  <p class="col-md-12">
                    <input type="email" class="form-control" placeholder="Email" name="EMAIL" value="@if(Session::has('ielts_form')){{session('ielts_form.email')}}@endif" required>
                  </p>


                </div>


                <div class="form-group row">

                  <div class="col-md-12 " style="padding-top:8px;">
                    <div class="row">


                      <div class="col-md-3 mb-2">
                        <strong> Identification Number </strong> /  Tanda Pengenal
                      </div>
                      <div class="col-md-9">

                        <p class="form-check-inline">


                          <input type="radio" class="form-check-input" name="tipe_id" value="Paspor" {{ session('ielts_form.tipe_id')=="Paspor" ? 'checked' : 'checked' }} required>
                          <label for="" class="form-check-label">Paspor</label>
                        </p>
                        <p class="form-check-inline">


                          <input type="radio" class="form-check-input" name="tipe_id" value="KTP" {{ session('ielts_form.tipe_id')=="KTP" ? 'checked' : '' }} required>
                          <label for="" class="form-check-label">KTP</label>
                        </p>
                        <!--
                         <p class="form-check-inline">


                          <input type="radio" class="form-check-input" name="tipe_id" value="KTP" {{ session('ielts_form.tipe_id')=="KTP" ? 'checked' : '' }} required>
                          <label for="" class="form-check-label">KK</label>
                        </p>-->
                      </div>
                    </div>


                  </div>
                  <div class="col-md-12">
                    <div class="row">

                      <p class="col-md-12">

                        <input type="text" class="form-control" id="no_ktp" placeholder="No Ktp" @if(!Session::has('ielts_form.no_ktp'))  @else {{'required'}} @endif name="REF_KTP" style="display:none" value="@if(Session::has('ielts_form')){{session('ielts_form.no_ktp')}}@endif" pattern="[0-9]{16}">
                        <input type="text" class="form-control" id="no_paspor" placeholder="No Paspor" @if(!Session::has('ielts_form.no_paspor')) @else {{'required'}} @endif required name="REF_PASPOR"
                        value="@if(Session::has('ielts_form')){{session('ielts_form.no_paspor')}}@endif">

                      </p>

                    </div>
                    <div class="row form-group" id="TGL_BERLAKU_PASPOR-wrapper">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Masa Berlaku Paspor (Tanggal Berakhir)</p>
                  </div>
                  <div class="row">
                    <p class="col-md-12">
                      <input type="text" name="TGL_BERLAKU_PASPOR" id="TGL_BERLAKU_PASPOR" class="form-control" value="">
                    </p>
                  </div>
                </div>
              </div>
                  </div>
                </div>


              </div>
              <div class="tab-wrapper">
                <div class="form-group row">
                  <p class="col-md-12"> <strong>Country*</strong> / Negara </p>
                  <p class="col-md-12">
                    <input type="text" class="form-control" name="NEGARA" placeholder="Country / negara">
                  </p>
                </div>
                <div class="form-group row">
                  <p class="col-md-12"><strong>Address*</strong> Alamat </p>
                  <p class="col-md-12">
                    <textarea class="form-control" style="height:92px;resize:none;" placeholder="Alamat" name="ALAMAT" rows="2" required>@if(Session::has('ielts_form')){{session('ielts_form.alamat')}}@endif</textarea>

                  </p>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <p class="col-md-12"> <strong>City*</strong> / Kota</p>
                      <p class="col-md-12">
                        <input type="text" class="form-control" placeholder="Kota" name="KOTA" value="@if(Session::has('ielts_form')){{session('ielts_form.kota')}}@endif"
                        required>

                      </p>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <div class="row">

                          <p class="col-md-12"> <strong>Postal Code *</strong> / Kode Pos</p>
                          <p class="col-md-12">
                            <input type="text" class="form-control" placeholder="Kode Pos" name="POSTAL_CODE" pattern="^[0-9]*$" value="@if(Session::has('ielts_form')){{session('ielts_form.kode_pos')}}@endif" required>
                          </p>

                        </div>
                      </div>
                    </div>

                  </div>



                </div>

              </div>
              <div class="tab-wrapper">
               <div class="row">
                 <div class="col-md-12"><h4><strong>Education Background</strong> / Latar Belakang Pendidikan</h4></div>
               </div>
               <div class="form-group row">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Tingkat Pendidikan</p>
                  </div>
                  <div class="row">
                    <p class="col-md-12">
                      <select class="form-control" id="tingkat_pendidikan" name="TINGKAT_PENDIDIKAN" required>
                        <option value="">- Pilih Tingkat Pendidikan -</option>
                        <option value="SMP">SMP / Sederajat</option>
                        <option value="SMA">SMA / Sederajat</option>
                        <option value="Diploma">Diploma</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </p>
                    <div class="col-md-12">
                      <input type="text" class="form-control" id="tingkat_pendidikan_lainnya" name="TINGKAT_PENDIDIKAN_LAINNYA" placeholder="Lainnya" style="display:none" value="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Jurusan Yang Diambil</p>
                  </div>
                  <div class="row">
                    <p class="col-md-12">
                      <input type="text" name="JURUSAN" class="form-control" placeholder="Jurusan" value="" required>
                    </p>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Lamanya Belajar Bahasa Inggris</p>
                  </div>
                  <div class="row">
                    <p class="col-md-12">
                      <select class="form-control" name="LAMA_BELAJAR_INGGRIS">
                        <option value="">- Pilih -</option>
                        <option value="1 tahun">1 tahun</option>
                        <option value="2 tahun">2 tahun</option>
                        <option value="3 tahun">3 tahun</option>
                        <option value="4 tahun">4 tahun</option>
                        <option value="5 tahun">5 tahun</option>
                        <option value="6 tahun">6 tahun</option>
                        <option value="7 tahun">7 tahun</option>
                        <option value="8 tahun">8 tahun</option>
                        <option value="9 tahun">9 tahun</option>
                        <option value="Lebih dari 9 tahun">Lebih dari 9 tahun</option>
                      </select>

                    </p>

                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Negara Mana Yang Dituju</p>
                  </div>
                  <div class="row">
                    <p class="col-md-12">
                      <select name="NEGARA_TUJUAN" id="negara_tujuan" class="form-control">
                        <option value="">- Negara Tujuan -</option>
                        <option value="Australia">Australia</option>
                        <option value="Inggris">Inggris</option>
                        <option value="Irlandia">Irlandia</option>
                        <option value="Singapura">Singapura</option>
                        <option value="Kanada">Kanada</option>
                        <option value="Selandia Baru">Selandia Baru</option>
                        <option value="Amerika">Amerika</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </p>
                    <p class="col-md-12">
                      <input type="text" class="form-control" id="negara_tujuan_lainnya" name="NEGARA_TUJUAN_LAINNYA" placeholder="Lainnya" style="display:none" value="">
                    </p>
                  </div>

                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Alasan Mengambil Tes TOEFL</p>

                  </div>
                  <div class="row">
                    <p class="col-md-12">
                      <select class="form-control" id="alasan_ielts" name="ALASAN" required>
                        <option value="">- Alasan Mengambil TOEFL -</option>
                        <option value="Sekolah">Sekolah</option>
                        <option value="Beasiswa">Beasiswa</option>
                        <option value="Aplikasi WHV">Aplikasi WHV</option>
                        <option value="Bekerja">Bekerja</option>
                        <option value="Urusan Pribadi">Urusan Pribadi</option>
                      </select>
                    </p>
                  </div>
                </div>
              </div>
              
              <div class="row" id="school-info" style="display:none">
                <div class="col-md-12">
                  <h4><strong>If choose to study</strong>Jika memilih untuk melanjutkan sekolah</h4>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">
                      Gelar Yang Akan Diambil
                    </p>
                  </div>
                  <div class="row form-group">
                    <p class="col-md-12">
                      <select class="form-control" name="AMBIL_GELAR">
                        <option value="">- Pilih Gelar -</option>
                        <option value="Certificate 1">Certificate 1</option>
                        <option value="Certificate 2">Certificate 2</option>
                        <option value="Certificate 3">Certificate 3</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Advance Diploma">Advance Diploma</option>
                        <option value="Bachelor Degree">Bachelor Degree</option>
                        <option value="">Other</option>
                      </select>
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <p class="col-md-12">
                      Jurusan Yang Akan Diambil
                    </p>
                  </div>
                  <div class="row form-group">
                    <p class="col-md-12">
                      <input type="text" name="AMBIL_JURUSAN" class="form-control" placeholder="Jurusan Yang Diambil.." value="">
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <p class="col-md-12">
                      Referensi nama Universitas yang akan dituju (Jika Ada)
                    </p>
                  </div>
                  <div class="form-group row">
                    <p class="col-md-12"><input type="text" name="REF_UNIVERSITAS" class="form-control" placeholder="Nama Universitas" value=""> </p>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4> <strong> Employment Background </strong> / Latar Belakang Pekerjaan</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <p class="col-md-12">Tingkat Pekerjaan</p>
                  </div>
                  <div class="row form-group">
                    <p class="col-md-12"> <select class="form-control" id="tingkat_pekerjaan" name="TINGKAT_PEKERJAAN" required>
                      <option value="">- Tingkat Pekerjaan -</option>
                      <option value="Pemilik Usaha">Pemilik Usaha</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Karyawan">Karyawan</option>
                      <option value="Pelajar">Pelajar</option>
                      <option value="Tidak Bekerja">Tidak Bekerja</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </p>
                  <p class="col-md-12">
                   <input type="text" class="form-control" id="tingkat_pekerjaan_lainnya" name="TINGKAT_PEKERJAAN_LAINNYA" placeholder="Lainnya" value="" style="display:none;">
                 </p>
               </div>
             </div>
             <div class="col-md-12">
              <div class="row">
                <p class="col-md-12"> Sektor Pekerjaan </p>
              </div>
              <div class="row form-group">
                <p class="col-md-12">
                  <select class="form-control" id="sektor_pekerjaan" name="SEKTOR_PEKERJAAN" required>
                    <option value="">- Pilih Sektor -</option>
                    <option value="Petugas Administrasi">Petugas Administrasi</option>
                    <option value="Pertanian, Perikanan, Perhutanan, Pertambangan">Pertanian, Perikanan, Perhutanan, Pertambangan</option>
                    <option value="Hiburan dan Seni">Hiburan dan Seni</option>
                    <option value="Perbankan & Asuransi">Perbankan & Asuransi</option>
                    <option value="Katering & Rekreasi">Katering & Rekreasi</option>
                    <option value="Industri Konstruksi">Industri Konstruksi</option>
                    <option value="Kerajinan Tangan & Design">Kerajinan Tangan & Design</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Pelayanan Sosial & Kesehatan">Pelayanan Sosial & Kesehatan</option>
                    <option value="Jasa Pemasangan, Pemeliharaan dan Perbaikan">Jasa Pemasangan, Pemeliharaan dan Perbaikan </option>
                    <option value="Hukum & Jasa Hukum">Hukum & Jasa Hukum</option>
                    <option value="Pabrik & Perakitan">Pabrik & Perakitan</option>
                    <option value="Layanan Personal">Layanan Personal</option>
                    <option value="Perdagangan Eceran">Perdagangan Eceran</option>
                    <option value="Mesin & Ilmu Ilmiah">Mesin & Ilmu Ilmiah</option>
                    <option value="Media & Telekomnuikasi">Media & Telekomnuikasi</option>
                    <option value="Transportasi">Transportasi</option>
                    <option value="Utilitas (gas,listrik,air,dll)">Utilitas (gas,listrik,air,dll)</option>
                    <option value="Perdagangan Grosir">Perdagangan Grosir</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </p>
                <div class="col-md-12"><input type="text" class="form-control" name="SEKTOR_PEKERJAAN_LAINNYA" id="sektor_pekerjaan_lainnya" placeholder="Lainnya" style="display:none" value=""> </div>
              </div>
            </div>
          </div>

      <!--<fieldset>
      <legend>Pekerjaan & Pendidikan</legend>
      <p>
<label>Pekerjaan : </label> <br>
<input type="radio" name="pekerjaan" value="">
      </p>
    </fieldset>-->


  </div>
  <div class="tab-wrapper">
    <div class="row form-group">
      <div class="col-md-12">
        <h4><strong>Upload Documents</strong> / Unggah Dokumen</h4>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-md-6">
        <div class="row">
          <p class="col-md-12">
            Upload KTP
          </p>
        </div>
        <div class="row">
          <p class="col-md-12">
            <input type="file" name="KTP" class="form-control" value="" required>
             <div class="col-md-12" style="color:red">
              *Dokumen dalam bentuk hasil scan
            </div>
          </p>
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-md-6">
        <div class="row">
          <p class="col-md-12">
            Upload Paspor
          </p>
        </div>
        <div class="row">
          <p class="col-md-12">
            <input type="file" name="PASPOR" class="form-control" value="" required>
             <div class="col-md-12" style="color:red">
              *Dokumen dalam bentuk hasil scan
            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-12 text-right">
     <input type="button" class="btn btn-secondary" name="btn-prev" id="btn-prev" value="Previous" onclick="prevTab()" style="display:none">
     <input type="button" class="btn btn-primary" name="btn-next" id="btn-next" value="Next" onclick="nextTab()" disabled>
     <input type="submit" id="submit" name="" class="btn btn-primary"  value="Submit" style="display:none">
   </div>
 </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('more-script')
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
<script type="text/javascript">
  var today = new Date();
  var availableDates = {!!json_encode($tgl_toefl)!!};
  var date_selected = false;
  function check_available_date(date){
     dmy = ('0'+date.getDate()).slice(-2) + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
    if ($.inArray(dmy, availableDates) != -1) {
      return [true, "","Available"];
    } else {
      return [false,"","unAvailable"];
    }
  }

  $(document).ready(function(){
    if(document.getElementById('agree').checked == true){
      document.getElementById('btn-next').disabled = false;
    }




    if(document.getElementById('alasan_ielts').value=="Sekolah"){
      $('#school-info').show();
    }else{
      $('#school-info').hide();
      $('#school-info input,#school-info select').val('');
    }

    if(document.getElementById('tingkat_pekerjaan').value == "Lainnya"){
      $('#tingkat_pekerjaan_lainnya').show();
      $('#tingkat_pekerjaan_lainnya').prop("required","true");
    }

    if(document.getElementById('sektor_pekerjaan').value == "Lainnya"){
      $('#sektor_pekerjaan_lainnya').show();
      $('#sektor_pekerjaan_lainnya').prop("required","true");
    }

    if(document.getElementById('tingkat_pendidikan').value == "Lainnya"){
      $('#tingkat_pendidikan_lainnya').show();
      $('#tingkat_pendidikan_lainnya').prop("required","true");
    }

    if(document.getElementById('negara_tujuan').value == "Lainnya"){
      $('#negara_tujuan_lainnya').show();
      $('#negara_tujuan_lainnya').prop("required","true");
    }

  });

  document.getElementById('agree').addEventListener('change', function() {
    if (this.checked) {
      document.getElementById('btn-next').disabled = false;
    } else {
      document.getElementById('btn-next').disabled = true;
    }
  });
  if($(document).width() <= 576){
    $('#datepicker').datepicker({
      numberOfMonths: 1,
      showButtonPanel : false,
      dateFormat: 'yy-mm-dd',
      minDate : "+0d",
      maxDate: "+1y",
      beforeShowDay:check_available_date,
      onSelect: function(date) {
        document.getElementById('TGL_TEST').value = date;
        date_selected = true;
      }
    });
    
  }else{
    $('#datepicker').datepicker({
      numberOfMonths: 2,
      showButtonPanel : false,
      dateFormat: 'yy-mm-dd',
      minDate : "+0d",
      maxDate: "+1y",
      beforeShowDay:check_available_date,
      onSelect: function(date) {
        document.getElementById('TGL_TEST').value = date;
        date_selected = true;
      }
    });
  }
  $('.ui-datepicker-current-day.ui-datepicker-today > a').removeClass('ui-state-active');
  $('.ui-datepicker-current-day.ui-datepicker-today > a').removeClass('ui-state-highlight');

  var x = window.matchMedia("(max-width: 576px)");
  x.addListener(function(x){
    if (x.matches) { // If media query matches
      $( "#datepicker" ).datepicker( "option", "numberOfMonths", 1 );
    } else {
      $( "#datepicker" ).datepicker( "option", "numberOfMonths", 2 );
    }
  });


  $('#TGL_LAHIR').datepicker({
    showButtonPanel : false,
    dateFormat: 'dd/mm/yy',
    maxDate: 0
  });

  $('#TGL_BERLAKU_PASPOR').datepicker({
    showButtonPanel : false,
    dateFormat: 'dd/mm/yy',
  });


  var currentTab = 0;
  var tabs = $('.tab-wrapper');
  var tab_indicator = $('.inline');
  tabs.each(function(index, section) {
    console.log(tabs[index]);
    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
  });
  function close_alert() {
    $('.alert').hide();
  }

  function prevTab(){
    if(currentTab> 0){
     currentTab -= 1;

     if(currentTab == 0){
      $('#btn-prev').hide();
    } 
    $(tabs).hide();
    $(tab_indicator).removeClass('active');
    $(tab_indicator[currentTab]).addClass('active');
    $(tabs[currentTab]).show();
  }

  if(currentTab < (tabs.length - 1)){
   $('#btn-next').show();
   $('#submit').hide();
 }
}
function nextTab(){

 $('#myForm').parsley().whenValidate({
  group: 'block-' + currentTab
}).done(function() {
  if(date_selected == false){
    alert('Tolong pilih tanggal terlebih dahulu !');
    return false;
  }else{
    if(currentTab < (tabs.length - 1)){
      currentTab += 1;
      if(currentTab > 0){
       $('#btn-prev').show();
     }
     $(tabs).hide();
     $(tab_indicator).removeClass('active');
     $(tab_indicator[currentTab]).addClass('active');
     $(tabs[currentTab]).show();
   }

   if(currentTab == (tabs.length - 1)){
    $('#submit').show();
    $('#btn-next').hide();
  }
}
});
}

function muncul_ktp() {
  $('#no_id').hide();
  $('#no_paspor').hide();
  $('#no_ktp').show();
  $('#TGL_BERLAKU_PASPOR-wrapper').hide();
  $('#no_paspor').val('');
  $("#no_ktp").prop('required', true);
  $("#no_paspor").prop('required', false);
}

function muncul_paspor() {
  $('#no_id').hide();
  $('#no_ktp').hide();
  $('#no_paspor').show();
  $('#TGL_BERLAKU_PASPOR-wrapper').show();
  $('#no_ktp').val('');
  $("#no_paspor").prop('required', true);
  $("#no_ktp").prop('required', false);
}

function mySubmitFunction() {
  someBug()
  return false;
}
var rad = document.myForm.tipe_id;
var prev = null;
for (var i = 0; i < rad.length; i++) {
  if(rad.value == "KTP"){
   muncul_ktp(); 
 }else{
   muncul_paspor();
 }
 rad[i].addEventListener('change', function() {

  var cek = $(this).val();
  if (cek == "KTP") {
    muncul_ktp();
  } else {
    muncul_paspor();
  }
});
}


function close_alert() {
  $('.alert').hide();
}





document.getElementById('alasan_ielts').addEventListener('change',function(){

  if($(this).val()=="Sekolah"){
    $('#school-info').show();
//  $('#school-info input,#school-info select').prop('required',true);
}else{
  $('#school-info').hide();
  $('#school-info input,#school-info select').val('');
}
});
$(document).on("change","#tingkat_pekerjaan",function(){

  if($(this).val() == "Lainnya"){
    $('#tingkat_pekerjaan_lainnya').show();
    $('#tingkat_pekerjaan_lainnya').prop("required","true");
  }
});
$(document).on("change","#sektor_pekerjaan",function(){

  if($(this).val() == "Lainnya"){
    $('#sektor_pekerjaan_lainnya').show();
    $('#sektor_pekerjaan_lainnya').prop("required","true");
  }
});
$(document).on("change","#tingkat_pendidikan",function(){

  if($(this).val() == "Lainnya"){
    $('#tingkat_pendidikan_lainnya').show();
    $('#tingkat_pendidikan_lainnya').prop("required","true");
  }
});
$(document).on("change","#negara_tujuan",function(){

  if($(this).val() == "Lainnya"){
    $('#negara_tujuan_lainnya').show();
    $('#negara_tujuan_lainnya').prop("required","true");
  }
});
</script>
@endpush
