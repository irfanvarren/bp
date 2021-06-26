@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style>
    .colon {
        float: right;
    }

    ul,
    ol {
        padding: 0 15px;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

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

    input.invalid,
    select.invalid {
        border-color: red;
    }

    input.form-check-input.invalid+label {
        color: red;
    }

    .loading-wrapper {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999999;
    display: none;
    background: rgba(255, 255, 255, 1);
}

.loading-wrapper img {
    display: block;
    margin: 0 auto;
    width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

}

</style>
@endpush
@section('content')
<div class="loading-wrapper">
    <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="col-md-12 content-wrapper">
    @if(session()->has('message'))
    <div class="alert alert-success" style="text-align:center">
        {!! session()->get('message') !!} <br>

        <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="col-md-12 card">
                    <div class=" card-body">
                        <form class="" id="myform" name="myform" action="{{url('form-pindah-sekolah-dan-agency')}}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12 text-center">

                                <h2>STUDENT CHANGE OF SCHOOL & AGENCY</h2>


                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-3 col-form-label">
                                Register for Branch*
                            </div>
                            <div class="col-md-9">
                                <select name="register_branch" id="register_branch" class="form-control" required onchange="select_company(this)">
                                    <option value="">- Select Company -</option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->KD}}">{{ucwords(strtolower($company->NAMA))}}</option>
                                    @endforeach

                                    <option value="BEST PARTNER SANGGAU">Best Partner Sanggau</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3 col-form-label">
                                Marketing Code*
                            </div>
                            <div class="col-md-9">
                                <select name="marketing" id="marketing" class="form-control selectize" required>
                                    <option value="">- Select Marketing -</option>
                                </select>
                                <br>
                            </div>
                        </div>
                        <div class="form-tab">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4>Personal Information</h4> <br>
                                </div>
                            </div>
                            <div class="row">

                                <label for="" class="col-md-3 ">Title*</label>
                                <div class="col-md-9" style="padding:0 30px;">
                                    <div class="row">
                                        <div class="form-check form-check-inline"
                                        style="margin-right:10px;margin-left">
                                        <input type="radio" class="form-check-input" name="title" required
                                        value="Mr.">
                                        <label for="" class="form-check-label">Mr.</label>
                                    </div>
                                    <div class="form-check from-check-inline" style="margin-right:10px;">
                                        <input type="radio" class="form-check-input" name="title" value="Mrs."
                                        required>
                                        <label for="" class="form-check-label">Mrs.</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-right:10px;">
                                        <input type="radio" class="form-check-input" name="title" value="Ms."
                                        required>
                                        <label for="" class="form-check-label">Ms.</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Full Name*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="full_name" required placeholder=""
                                value="">


                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Date Of Birth*</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="tanggal_lahir"
                                        pattern="[0-9]{2}" placeholder="Date (dd)"
                                        value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif"
                                        required>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" id="bulan_lahir" name="bulan_lahir"
                                        required>
                                        <option value="">Month (mm)</option>
                                        <option value="01"
                                        {{ session('ielts_form.bulan_lahir')=="01" ? 'selected' : '' }}>
                                    Januari</option>
                                    <option value="02"
                                    {{ session('ielts_form.bulan_lahir')=="02" ? 'selected' : '' }}>
                                Februari</option>
                                <option value="03"
                                {{ session('ielts_form.bulan_lahir')=="03" ? 'selected' : '' }}>
                            Maret</option>
                            <option value="04"
                            {{ session('ielts_form.bulan_lahir')=="04" ? 'selected' : '' }}>
                        April</option>
                        <option value="05"
                        {{ session('ielts_form.bulan_lahir')=="05" ? 'selected' : '' }}>
                        Mei
                    </option>
                    <option value="06"
                    {{ session('ielts_form.bulan_lahir')=="06" ? 'selected' : '' }}>
                    Juni
                </option>
                <option value="07"
                {{ session('ielts_form.bulan_lahir')=="07" ? 'selected' : '' }}>
                Juli
            </option>
            <option value="08"
            {{ session('ielts_form.bulan_lahir')=="08" ? 'selected' : '' }}>
        Agustus</option>
        <option value="09"
        {{ session('ielts_form.bulan_lahir')=="09" ? 'selected' : '' }}>
    September</option>
    <option value="10"
    {{ session('ielts_form.bulan_lahir')=="10" ? 'selected' : '' }}>
Oktober</option>
<option value="11"
{{ session('ielts_form.bulan_lahir')=="11" ? 'selected' : '' }}>
November</option>
<option value="12"
{{ session('ielts_form.bulan_lahir')=="12" ? 'selected' : '' }}>
Desember</option>
</select>
</div>
<div class="col-md-4">
    <input type="text" class="form-control" name="tahun_lahir"
    placeholder="Year (yyyy)" pattern="[0-9]{4}"
    value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif"
    required>
</div>
</div>

</div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Phone Number*</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="phone_number" required>
    </div>
</div>
<div class="row form-group">
    <label for="" class="col-md-3 col-form-label">Email*</label>
    <div class="col-md-9">
        <input type="email" class="form-control" name="email" required placeholder=""
        value="">
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Addres Line 1*</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="address_line1" required>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Addres Line 2</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="address_line2">
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Country*</label>

    <div class="col-md-6">
        <input type="text" name="country" class="form-control" id="country" required>
        <!--<select name="country" id="ciybtrt" class="form-control selectize" onchange="select_country(this)" required>
            <option value="">Select</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>-->
    </div>

</div>

<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">State / Province*</label>
    <div class="col-md-6">
        <input type="text" name="state" class="form-control" id="state" required>
        <!--<select name="state" id="state" class="form-control selectize" required>
            <option value="">Select</option>
        </select>-->
    </div>

</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">City / Suburb*</label>
    <div class="col-md-9">
        <input type="text" id="city" class="form-control" name="city" required>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">ZIP / Postal Code*</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="postal_code" required>
    </div>
</div>



<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">USI (Unique Student
    Identifier)</label>

    <div class="col-md-9">
        <input type="text" class="form-control" name="usi" placeholder="" value="">
    </div>

</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">TFN (Tax File Number)</label>

    <div class="col-md-9">
        <input type="text" class="form-control" name="tfn" placeholder="" value="">
    </div>

</div>


</div>

<div class="form-tab">
    <div class="row form-group">
        <div class="col-md-12 text-center">
            <h4>CURRENT EDUCATION PROVIDER DETAILS</h4>
        </div>
    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Education Providers Name* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="education_providers_name"
            placeholder="" required value="">
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Campus Location* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="campus_location"
            placeholder="" required value="">
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Qualification* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="qualification"
            placeholder="" required value="">
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Course* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="course"
            placeholder="" required value="">
        </div>

    </div>

    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Completion Date* </label>

        <div class="col-md-9">
            <input type="date" class="form-control" name="completion_date"
            placeholder="" required value="">
        </div>

    </div>

    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Agent Name* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="agent_name"
            placeholder="" required value="">
        </div>

    </div>


    <div class="row form-group">
        <div class="col-md-12 text-center"><br><h4>CURRENT INSURANCE PROVIDER DETAILS</h4></div>

    </div>

    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Insurance Providers Name* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="insurance_providers_name"
            placeholder="" required value="">
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">End of Contract Date* </label>

        <div class="col-md-9">
            <input type="date" class="form-control" name="end_of_countract_date"
            placeholder="" required value="">
        </div>

    </div>

    <div class="row form-group">
        <div class="col-md-12 text-center">
            <h4>NEW EDUCATION PROVIDER DETAILS</h4>
        </div>
    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Education Providers Name* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="new_education_providers_name"
            placeholder="" value="" required>
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Campus Location* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="new_campus_location"
            placeholder="" value="" required>
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Qualification* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="new_qualification"
            placeholder="" value="" required>
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Course* </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="new_course"
            placeholder="" value="" required>
        </div>

    </div>

    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Intake* </label>

        <div class="col-md-9">
            <input type="date" class="form-control" name="new_intake"
            placeholder="" value="" required>
        </div>

    </div>

    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Class Shift </label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="new_class_shift"
            placeholder="" value="">
        </div>

    </div>


</div>

<div class="form-tab">
    <div class="row form-group">
        <div class="col-md-12 text-center">
            <h4>BANK ACCOUNT DETAILS</h4>
        </div>
    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Bank Name*</label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="bank_name"
            placeholder="" value="" required>
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Account Name*</label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="account_name"
            placeholder="" value="" required>
        </div>

    </div>
    
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Account Number *</label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="account_number"
            placeholder="" value="" required>
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">BSB Number*</label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="bsb_number"
            placeholder="" value="" required>
        </div>

    </div>
    <div class="row form-group">

        <label for="" class="col-md-3 col-form-label">Swift Code</label>

        <div class="col-md-9">
            <input type="text" class="form-control" name="swift_code"
            placeholder="" value="">
        </div>

    </div>

    <div class="row form-group">
                <div class="col-md-12 text-center"><br>
                    <h4>REQUIRED DOCUMENTS TO UPLOAD</h4>
                </div>
            </div>
            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Visa*</label>

                <div class="col-md-9">
                    <input type="file" name="visa" value="" required>
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Passport*</label>

                <div class="col-md-9">
                    <input type="file" name="passport" value="" required>
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Offer Letter*</label>

                <div class="col-md-9">
                    <input type="file" name="offer_letter" value="" required>
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">OSHC*</label>

                <div class="col-md-9">
                    <input type="file" name="oshc" value="" required>
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">CoE*</label>

                <div class="col-md-9">
                    <input type="file" name="coe" value="" required>
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">ID Card*</label>

                <div class="col-md-9">
                    <input type="file" name="id_card" value="" required>
                </div>

            </div>


             <div class="row form-group">
                <div class="col-md-12 text-center"><br>
                    <h4> ADDITIONAL DOCUMENTS TO UPLOAD</h4>
                </div>
            </div>
            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Release Letter</label>

                <div class="col-md-9">
                    <input type="file" name="visa" value="">
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">IELTS / ELICOS Certificate</label>

                <div class="col-md-9">
                    <input type="file" name="ielts_elicos_certificate" value="">
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Course Completion Certificates</label>

                <div class="col-md-9">
                    <input type="file" name="course_completion_certificates[]" value="" multiple >
                    <div>
                    Can be more than one
                </div>
                </div>
                

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Photograph</label>

                <div class="col-md-9">
                    <input type="file" name="photograph" value="">
                </div>

            </div>

            <div class="row form-group justify-content-center">

                <label for="" class="col-md-3 col-form-label">Birth Certificate</label>

                <div class="col-md-9">
                    <input type="file" name="birth_certificate" value="">
                </div>

            </div>


</div>

<div class="col-md-12">
    <div style="float:right;">
        <button type="button" id="prevBtn" class="btn btn-primary"
        onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" class="btn btn-secondary"
        onclick="nextPrev(1)">Next</button>
        <button type="submit" name="" id="submit" value="Submit"
        class="btn btn-primary" formnovalidate>Submit</button>
    </div>
</div>
<!-- Circles which indicates the steps of the form: -->
<div class="col-md-12" style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
 $('.selectize').selectize({
    width : 'resolve'
});

 $("#myform").on("submit", function(){
   //Code: Action (like ajax...)
   $('.loading-wrapper').show();
 })

 function select_company(el){
  var company_id = el.value;
  var token = $("input[name='_token']").val();
  $.ajax({
    url: "{{route('select-sales-ajax')}}",
    method: "POST",
    data:{
        _token : token,
        company_id : company_id
    },
    success:function(data){
        var data = JSON.parse(data);

        var $select = $("#marketing").selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        selectize.addOption({value : "", text : "Select"});
        $.each(data,function(k,v){
           selectize.addOption({value : v.KD + "-" + v.NAMA,text : v.KD + " - " + v.NAMA.toLowerCase().replace(/^[\u00C0-\u1FFF\u2C00-\uD7FF\w]|\s[\u00C0-\u1FFF\u2C00-\uD7FF\w]/g, function(letter) {
            return letter.toUpperCase();
        })});
       });
        selectize.refreshOptions();
    },
    error:function(error){

    }
});
}

function select_country(el){
  var country_id = el.value;
  var token = $("input[name='_token']").val();
  $.ajax({
    url: "{{route('region-ajax')}}",
    method: "POST",
    data:{
        _token : token,
        country_id : country_id
    },
    success:function(data){
        var data = JSON.parse(data);
        var $select = $("#state").selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        selectize.addOption({value : "", text : "Select"});
        $.each(data,function(k,v){
           selectize.addOption({value : v.id,text : v.name});
       });
        selectize.refreshOptions();
    },
    error:function(error){

    }
});
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
            document.getElementById("submit").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";
            document.getElementById("submit").style.display = "inline";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
            document.getElementById("nextBtn").style.display = "inline";
            document.getElementById("submit").style.display = "none";
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

    document.getElementById('agree').addEventListener('change', function () {

        if (this.checked) {
            document.getElementById('submit').disabled = false;
        } else {

            document.getElementById('submit').disabled = true;
        }
    });

</script>
<script type="text/javascript">
/*    var canvas = document.querySelector("canvas");

    var signaturePad = new SignaturePad(canvas);

    function add_signature() {
        var signature = signaturePad.toDataURL();
        $('#signature').val(signature);
        document.myform.submit();
    }

    function reset_signature() {
        signaturePad.clear();
    }

    function close_alert() {
        $('.alert').hide();
    }

    document.getElementById('agree').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    });
*/
</script>
@stop
