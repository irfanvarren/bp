@extends('layouts.search-school', ['title' => __('Student Register')])

@push('head-script')
<style type="text/css">
 .form-tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block !important;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

.step.finish {
  background-color: #4CAF50;
}
.input-group{
  margin-bottom:15px;
}
.col-form-label{
  padding:17px 15px 0 15px !important;
  text-align:left !important;
}
.login-page .card-login .card-body .input-group .form-control{
  margin-top:5px !important;
}
#btn-submit{
  display: none;
}
.form-control.invalid{
  border:1px solid red;
}
</style>
@endpush

@section('sidebar-content')
@if($errors->any())
<div class="row collapse">
  <ul class="alert-box warning radius">
    @foreach($errors->all() as $error)
    <li> {{ $error }} </li>
    @endforeach
  </ul>
</div>
@endif

<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-10 col-sm-10 ml-auto mr-auto">



      <div class="card card-login my-4">
        <div class="card-header card-header-primary text-center">
          <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
        </div>
        <div class="card-body" style="padding:0 30px;">




          <form class="form-horizontal" method="POST" name="myform" action="{{route('student-register')}}" enctype="multipart/form-data">
            @csrf


            <div class="form-tab" style="display:block;">

              <div class="row input-group">
               <label class="col-md-12 col-form-label">
                Marketing Id
              </label>
              <div class="col-md-12 col-form-label">
                <select name="marketing_id" class="form-control selectize" id="marketing_id">
                  <option value="">- Pilih Marketing - </option>
                  @foreach($sales as $sale)
                  <option value="{{$sale->KD}}">{{$sale->KD}} - {{$sale->NAMA}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row input-group">

              <label for="" class="col-md-12 col-form-label">Negara Tujuan*</label>

              <div class="col-md-12">

                <select class="selectize form-control" name="visa_country" id="visa_country" required>
                  <option value="">- Pilih Negara -</option>
                  @foreach($countries as $country)
                  <option value="{{$country->cca3}}">{{$country->name}}</option>
                  @endforeach
                </select>


              </div>

            </div>
            <div class="row input-group">

              <label for="" class="col-md-12 col-form-label">Nama*</label>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="full_name" required placeholder="Full Name" value="">
                  </div>
                </div>

              </div>
            </div>
            <div class="row input-group">

              <label for="" class="col-md-12 col-form-label">Tanggal Lahir*</label>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                   <input type="number" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" required>
                 </div>
                 <div class="col-md-4">
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
               <div class="col-md-4">
                <input type="number" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required>
              </div>
            </div>

          </div>
        </div>
        <div class="row input-group">

          <label for="" class="col-md-12 col-form-label">Jenis Kelamin*</label>
          <div class="col-md-4">
            <select class="form-control" required  name="gender">
              <option value="">- Jenis Kelamin -</option>
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
              <option value="N/A">N/A</option>
            </select>

          </div>
        </div>
        <div class="row input-group">

          <label for="" class="col-md-12 col-form-label">Alamat Saat ini</label>
          <div class="col-md-12">
            <textarea name="homecountry_address" rows="2"  class="form-control" placeholder="Alamat" required></textarea>
          </div>
        </div>

        <div class="row input-group">

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" name="homecountry_suburb" required placeholder="Kota" value="">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="homecountry_state" required placeholder="Provinsi" value="">
              </div>
            </div>

          </div>
        </div>
        <div class="row input-group">

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <input type="number" class="form-control" name="homecountry_postcode" required placeholder="Kode Pos" value="">
              </div>
              <div class="col-md-6">

                <select class="selectize form-control" name="homecountry_country>
                  <option value="">- Pilih Negara -</option>
                  @foreach($countries as $country)
                  <option value="{{$country->id}}">{{$country->name}}</option>
                  @endforeach
                </select>
                <!--<input type="text" class="form-control selectize" name="homecountry_country" required placeholder="Negara" value="">-->
              </div>
            </div>

          </div>
        </div>

        <div class="row input-group">

          <label for="" class="col-md-12 col-form-label">Nomor HP*</label>

          <div class="col-md-12">
            <input type="text" class="form-control" name="phone_number" required placeholder="No Telepon" value="">
          </div>

        </div>

      </div>
      <div class="form-tab">
    <!--
    <div class="row input-group">
      <label for="" class="col-md-12 col-form-label">Nama Rekening / Account Name</label>

      <div class="col-md-12">
        <input type="text" class="form-control" name="account_name" placeholder="Nama Rekening / Account Name" value="">
      </div>

    </div>
    <div class="row input-group">

      <label for="" class="col-md-12 col-form-label">Nama Bank / Bank Name</label>

      <div class="col-md-12">
        <input type="text" name="bank_name" class="form-control" placeholder="Nama Bank / Bank Name">
      </div>

    </div>
    <div class="row input-group">

      <label for="" class="col-md-12 col-form-label">Nomor Rekening / Account Number</label>

      <div class="col-md-12">
        <input type="text" class="form-control" name="account_number" placeholder="Nomor Rekening / Account Number" value="">
      </div>

    </div>
    <div class="row input-group">

      <label for="" class="col-md-12 col-form-label">Swift Code</label>

      <div class="col-md-12">
        <input type="text" class="form-control" name="swift_code" placeholder="Swift Code" value="">
      </div>

    </div>
    <div class="row input-group">

      <label for="" class="col-md-12 col-form-label">BSB</label>

      <div class="col-md-12">
        <input type="text" class="form-control" name="bsb" placeholder="BSB" value="">
      </div>

    </div>

    <div class="row input-group">

      <label for="" class="col-md-12 col-form-label">Cabang Bank / Bank Address</label>

      <div class="col-md-12">
        <input type="text" class="form-control" name="bank_addresss" placeholder="Cabang Bank / Bank Address" value="">
      </div>

    </div>
  -->
  <div class="row input-group">
    <div class="row input-group">
      <label for="" class="col-md-12 col-form-label">Signature
        <br>
        <span>*Mohon ttd disesuaikan dengan kartu identitas</span>
        <input type="button" name="" class="btn btn-warning" onclick="reset_signature()" style="float:right" value="Clear"> </label>
        <canvas id="canvas"  height="200" width="350" style="background:#ddd;margin:0 auto;margin-top:15px;"></canvas>

        <input type="hidden" name="signature" id="signature" required value="">
      </div>
      <div class="col-md-12">
        <input type="hidden" name="link_visa_statement_letter" id="link-visa-statement-letter" value="">
        <input type="checkbox"  name="agree" id="agree" value="" required checked="false"> &nbsp; Dengan ini menyatakan bahwa saya telah membaca dan menyetujui<a href="#" id="link-syarat-dan-ketentuan" target="_BLANK" onclick="open_term_and_condition()"> syarat dan ketentuan </a> yang berlaku di Best Partner Education. *
      </div>
      <div class="col-md-12">

        <input type="hidden" name="link_surat_pernyataan_testimony" value="{{url('student/visa-statement-letter/term-and-condition/testimony')}}">
        <input type="checkbox"  name="agree" id="agree2" value="" required checked="false"> &nbsp; <a href="{{url('student/visa-statement-letter/term-and-condition/testimony')}}" target="_BLANK">Surat Pernyataan Testimoni</a>
      </div>
      <div class="col-md-12">

        <input type="hidden" name="link_aturan_program" value="{{url('student/school-information/term-and-condition')}}">
        <input type="checkbox"  name="agree" id="agree3" value="" required checked="false"> &nbsp; <a href="{{url('student/school-information/term-and-condition')}}" target="_BLANK"> Syarat dan ketentuan </a>pertanggungan aturan pemakaian informasi program informasi sekolah
      </div>
    </div>



  </div>

</form>








            <!--
            <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
            <div class="bmd input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
              <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                <strong>{{ $errors->first('name') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd input-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
              <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd input-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="text" name="no_telepon" class="form-control" placeholder="{{ __('Telephone...') }}" value="{{ old('no_telepon') }}" required>
              </div>
              @if ($errors->has('no_telepon'))
              <div id="email-error" class="error text-danger pl-3" for="no_telepon" style="display: block;">
                <strong>{{ $errors->first('no_telepon') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd input-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
              <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                <strong>{{ $errors->first('password') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd input-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
              <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </div>
              @endif
            </div>
            <div class="bmd input-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">today</i>
                  </span>
                </div>
                <input type="date" name="tangal_lahir" class="form-control" placeholder="{{ __('Tanggal Lahir...') }}" value="{{ old('tanggal_lahir') }}" required>
              </div>
              @if ($errors->has('email'))
              <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy">
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="{{url('register/term-and-condition')}}">{{ __('Privacy Policy') }}</a>
              </label>
            </div>


          -->
        </div>
        <div class="card-footer">

          <!-- Circles which indicates the steps of the form: -->
          <div class="col-md-12 text-center" style="line-height: 37px;">
            <span class="step"></span>
            <span class="step"></span>
            <div style="float:right;">
              <button type="button" id="prevBtn" class="btn"
              onclick="nextPrev(-1)">Previous</button>
              <button type="button" id="nextBtn" class="btn btn-primary"
              onclick="nextPrev(1);">Next</button>
              <button type="button" class="btn btn-primary" id="btn-submit" onclick="submit_form(event)" disabled>{{ __('Register') }}</button>
            </div>
          </div>

        </div>


      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  function not_ready(){
    alert('Maaf Anda Belum Dapat Menggunakan Fitur Ini Sekarang !');
  }


</script>
@endsection

@push('more-script')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
  var country_code =  "";
  $('#visa_country').on('change',function(){

    if(this.checked == "true"){
      country_code = this.value;

    }
  });
  var canvas = document.querySelector("canvas");

  var signaturePad = new SignaturePad(canvas);

  function submit_form(e){

    e.preventDefault();
    
    
    if(signaturePad.points.length){
      var signature = signaturePad.toDataURL();
      $('#signature').val(signature);
      document.myform.submit();

    }else{
     alert('Tolong ttd terlebih dahulu !');
   }
 }

 function reset_signature(){
  signaturePad.clear();
}

function close_alert() {
  $('.alert').hide();
}

$(document).ready(function(){
  $('#agree').prop("checked",false);
  $('#agree2').prop("checked",false);
  $('#agree3').prop("checked",false);
});


$(document).ready(function(){
  $('#agree').change(function(){
    if(this.checked && $('#agree2').prop("checked") == true && $('#agree3').prop("checked") == true){

      $('#btn-submit').prop("disabled",false);
    }else{
      $('#btn-submit').prop("disabled",true);
    }  

  });

  $('#agree2').change(function(){
    if(this.checked && $('#agree').prop("checked") == true && $('#agree3').prop("checked") == true){

      $('#btn-submit').prop("disabled",false);
    }else{
      $('#btn-submit').prop("disabled",true);
    }  

  });

  $('#agree3').change(function(){
    if(this.checked && $('#agree2').prop("checked") == true && $('#agree').prop("checked") == true){

      $('#btn-submit').prop("disabled",false);
    }else{
      $('#btn-submit').prop("disabled",true);
    }  

  });
});

function submitForm(){
  var signature = signaturePad.toDataURL();
  $('#signature').val(signature);
  document.myform.submit();
}

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("form-tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
          document.getElementById("btn-submit").style.display = "none";
        } else {
          document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").style.display = "none";
          document.getElementById("btn-submit").style.display = "inline";

        } else {
          document.getElementById("nextBtn").innerHTML = "Next";
          document.getElementById("nextBtn").style.display = "inline";
          document.getElementById("btn-submit").style.display = "none";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
      }

      function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("form-tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
          }
        // Otherwise, display the correct tab:
        showTab(currentTab);
      }

      $(":input:radio[required]").on('change', function () {
        if ($(this).is(":checked")) {
          var radio_name = $(this).prop("name");
          $(':input[name="' + radio_name + '"]').removeClass("invalid");
        }
      });
      $(":input").on('change', function () {
        if($(this).val() != ""){
          $(this).removeClass("invalid");
        }else{
         $(this).addClass("invalid");
       }   
     });



      function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("form-tab");
        y = $(x[currentTab]).find(":input[required]");

        // A loop that checks every input field in the current tab:
        var radio_is_checked = false;
        $('input:radio').each(function () {
          if ($(this).is(':checked')) {
            radio_is_checked = true;
          }
        });

        if (!radio_is_checked) {
          $('input:radio').addClass("invalid");
        }


        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                
                //$(y[i]).parent(".selectize-input").addClass("invalid");
                valid = false;
              }
            }

            if($(':input.invalid').length > 0){
              $(':input.invalid')[0].focus();
            }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }

      function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
      }


      $('#visa_country').on('change',function(){
        country_code = $(this).val();
        var link = "{{url('student/visa-statement-letter/term-and-condition')}}/"+country_code;
        $('#link-syarat-dan-ketentuan').attr('href',link);
        $('#link-visa-statement-letter').val(link);
      });

      function open_term_and_condition(){
        window.open("{{url('student/visa-statement-letter/term-and-condition')}}/"+country_code);
      }

    </script>
    @endpush
