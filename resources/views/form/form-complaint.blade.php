@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
  .left-complaint-img-wrapper{
    max-width: 75%;
  }
  .complaint-img-wrapper{
    position: fixed;top:0;left:0;
    background:rgba(0,0,0,0.8);z-index:9999;
    width:100%;
    height:100%;
    padding:3%;
  }
  .complaint-img-wrapper img{
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin:0 auto;
  }
  .complaint-close-btn{
    font-size:28px;
    color:white;
    position: absolute;top:15px;
    right: 15px;
  }
  .checkbox-container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin:0;
    font-size: 18px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default checkbox */
  .checkbox-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
  }

  /* On mouse-over, add a grey background color */
  .checkbox-container:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the checkbox is checked, add a blue background */
  .checkbox-container input:checked ~ .checkmark {
    background-color: #2196F3;
  }

  /* Create the checkmark/indicator (hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the checkmark when checked */
  .checkbox-container input:checked ~ .checkmark:after {
    display: block;
  }

  /* Style the checkmark/indicator */
  .checkbox-container .checkmark:after {
    left: 9px;
    top: 7px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }
    .tab-wrapper{
    display: none;
  }
  .tab-wrapper.show{
    display: block;
  }
  .parsley-errors-list{
    padding:0 18px;
    color:red;
  }
  .selectize-control .parsley-errors-list{
    display: none;
  }
  @media screen and (max-width:576px){
    .left-complaint-img-wrapper{
    max-width: 65%;
  }
  }
</style>
@endpush
@section('content')
<div class="complaint-img-wrapper" id="complaint-img-wrapper" style="display:none;">
  <span class="complaint-close-btn"><i class="fa fa-close"></i></span>
  <div class="d-flex h-100 align-items-center">
    <img id="complaint-img" src="{{asset('img/saran-dan-keluhan.png?v=2')}}">
  </div>
</div>
<div class="col-md-12 py-5" style="background: #F5F9FF">
  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="row">
    <div class="col-md-6 col-lg-4  mb-5">
      <div class="d-flex h-100 align-middle">
        <div class="d-block h-auto m-auto left-complaint-img-wrapper">
          <img class="w-100" src="{{asset('img/form/complaints/form-complaint.png')}}">
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-8">
      <div class="row">
        <div class="col-lg-11">
          <form class="" id="myform" name="myform" action="{{url('form-complaint')}}"  enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="m-0" style='text-align:center;'><strong> Layanan Saran Dan Keluhan</strong></h2>
                <div>(Complaints and Suggestion Service)</div>
                <div>Ayuk baca dulu <sup class="text-info complaint-img-btn" onclick="open_complaint_img()"> <i class="fa fa-question"></i></sup> </div>

              </div>
            </div>
            <div class="tab-wrapper show">
              <div class="row mt-3 form-group">
                <div class="col-md-12">

                  <label class="checkbox-container"><strong>Tampilkan sebagai anonim</strong>
                    <input type="checkbox" name="tampilkan_sebagai_anonim" id="tampilkan_sebagai_anonim" onchange="check_anonim(this)">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="row mt-3 form-group">
                <label for="" class="col-md-12 col-form-label"><strong>Nama Lengkap</strong> / Full Name:</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap (Your full name)" required value="{{auth()->check() ? auth()->user()->name : ''}}"> 

                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-12 col-form-label"><strong>Alamat Email </strong> / Email Address :</label>
                <div class="col-md-12">
                  <input type="email" name="email" id="email" class="form-control" required placeholder="example@domain.com" value="{{auth()->check() ? auth()->user()->email : ''}}">
                </div>
              </div>
                        <!-- <div class="row form-group">

                            <label for="" class="col-md-12 col-form-label">Alamat Saat Ini (Current Address):</label>
                            <div class="col-md-12">
                                <input type="text" name="alamat" class="form-control" placeholder="Address.." value="">
                            </div>
                          </div> -->
                          <div class="row form-group">

                            <label for="" class="col-md-12 col-form-label"><strong>Nomor Telepon </strong> / Phone Number</label>
                            <div class="col-md-4">
                              <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="xxxx-xxxx-xxxx" required value="{{auth()->check() ? auth()->user()->no_telepon : ''}}">

                            </div>
                          </div>

                     <!--    <div class="row form-group">
                               <label for="" class="col-md-12 col-form-label">Negara Pemberi Visa Pelajar (Visa Country):</label>
                               <div class="col-md-12">
                                   <input type="text" name="negara_pemberi_visa" class="form-control" placeholder="Country Name..." value="">
                               </div>
                               <div class="col-md-12" style="font-size:14px;color:#888;">*Kosongkan jika tidak tahu (leave empty if you don't know)</div>
                        </div> 
                        <div class="row form-group">
                            <label for="" class="col-md-12 col-form-label">Nama Sekolah (School Name):</label>
                               <div class="col-md-12">
                                   <input type="text" name="nama_sekolah" class="form-control" placeholder="School Name..." value="">
                               </div>
                               <div class="col-md-12" style="font-size:14px;color:#888;">*Kosongkan jika tidak tahu (leave empty if you don't know)</div>
                        </div>
                      -->
                    </div>
                    <div class="tab-wrapper"> 
                      <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Perihal Keluhan (Complaint About): </label>
                        <div class="col-md-12">
                          <select type="text" name="complaint_about" class="form-control" value="">
                            <option value="">- Pilih -</option>
                            <option>Kebersihan</option>
                            <option>Pelayanan</option>
                            <option>Ketentraman</option>
                            <option>Informasi</option>
                            <option>Lainnya</option>
                          </select>
                        </div>
                      </div>

                      <div class="row form-group">
                        <label for="" class="col-md-12 col-form-label">Detail Keluhan (Complaint Detail)</label>
                        <div class="col-md-12">

                          <textarea name="complaint_detail" rows="4" class="form-control" placeholder="Tolong berikan penjelasan mengenai komplain dengan jelas (Please state the complaint clearly)"></textarea>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label for="" class="col-md-12 col-form-label">Tanggal Keluhan (Complaint Date): </label>
                        <div class="col-md-12">
                          <input type="date" name="complaint_date" class="form-control" value="">
                        </div>
                      </div>
                      <div class="row form-group">
                       <label for="" class="col-md-12 col-form-label"> Saran (Suggestion) </label>
                       <div class="col-md-12">
                         <textarea name="suggestion" id="suggestion" class="form-control" placeholder="Saran (Suggestion)"></textarea>
                       </div>
                     </div>
                   </div>
                      <!--  <div class="row form-group">
                          <div class="col-md-12">


                          <input type="checkbox"  name="agree" id="agree" value="" required> &nbsp; Dengan ini menyatakan bahwa saya telah membaca dan menyetujui syarat dan ketentuan yang berlaku di Best Partner Education. *
                              </div>
                            </div>-->


                            <div class="form-group row">
                              <div class="col-md-12">
                                <input type="button" class="btn btn-secondary float-left" id="btn-prev" style="display: none;" onclick="prevTab()" name="" value="Sebelumnya">
                                <input type="button" onclick="nextTab()" id="btn-next" name="" class="btn btn-primary float-right" value="Selanjutnya">
                                <input type="submit" style="display: none" name="" id="submit-btn" enabled class="btn btn-primary float-right" value="Submit">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endsection
                @push('more-script')
                <script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
                <script type="text/javascript">
                  var currentTab = 0;
                  var tabs = $('.tab-wrapper');
                  var tab_indicator = $('.inline');
                  tabs.each(function(index, section) {
                    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
                  });

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
                      $('#submit-btn').hide();
                    }
                  }
                  function nextTab(){
                    $('#myform').parsley().whenValidate({
                      group: 'block-' + currentTab
                    }).done(function() {
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
                        $('#submit-btn').show();
                        $('#btn-next').hide();
                      }
                    });
                  }
                  $(document).ready(function(){
                    if(document.getElementById('tampilkan_sebagai_anonim').checked){
                    anonim_checked();
                    }else{
                      anonim_unchecked();
                    }
                  });

                  function open_complaint_img(){
                   document.getElementById('complaint-img-wrapper').style.display = "block";
                 } 



                 document.getElementById('complaint-img-wrapper').addEventListener(
                  "click",
                  function(event) {
                    var complaint_img = document.getElementById('complaint-img');

                    if(event.target != complaint_img){
                      document.getElementById('complaint-img-wrapper').style.display = "none";
                    }  
                  },
                  false
                  );
                 function check_anonim(e){
                  if(e.checked){
                   anonim_checked();
                  }else{
                    anonim_unchecked();
                  }
                }

                function anonim_checked(){
                    document.getElementById('name').value = "Anonim";
                    document.getElementById('email').value = "";
                    document.getElementById('phone_number').value = "";
                    document.getElementById('name').disabled = true;
                    document.getElementById('email').disabled = true;
                    document.getElementById('phone_number').disabled = true;
                     document.getElementById('name').removeAttribute("required");
                    document.getElementById('email').removeAttribute("required");
                    document.getElementById('phone_number').removeAttribute("required");
                }

                function anonim_unchecked(){
                   document.getElementById('name').disabled = false;
                    document.getElementById('email').disabled = false;
                    document.getElementById('phone_number').disabled = false;
                      document.getElementById('name').setAttribute("required","required");
                    document.getElementById('email').setAttribute("required","required");
                    document.getElementById('phone_number').setAttribute("required","required");
                }

                function close_alert() {
                  $('.alert').hide();
                }
              </script>
              @endpush