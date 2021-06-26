@extends('layouts.app-auth', ['activePage' => 'students', 'titlePage' => __('students'),'activeMenu' => __('places-management')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
  .mymodal {
    max-width: 85% !important;
    margin-top: 30px !important;
  }

</style>
@endpush
@section('modal')
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mymodal" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Students Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" id="form-input">
          <div class="row">
            <div class="card">
              <div class="card-header card-header-tabs card-header-rose">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Select:</span>
                    <ul class="nav nav-tabs" data-tabs="tabs">

                      <li class="nav-item">
                        <a class="nav-link" href="#personal-informations" data-toggle="tab" onclick="open_personal_informations()" id="open-personal-informations">
                          <i class="material-icons">person</i> Visa Statement Letter
                          <div class="ripple-container"></div>
                          <div class="ripple-container"></div>
                        </a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#passport-history" data-toggle="tab" onclick="open_passport_history()" id="open-passport">
                          <i class="material-icons">person</i>  Passport History
                          <div class="ripple-container"></div>
                          <div class="ripple-container"></div>
                        </a>

                      </li>
                      <li class="nav-item">
                       <a class="nav-link" href="#english-qualifications" data-toggle="tab" onclick="open_english_qualifications()" id="open-english-qualifications">
                        <i class="material-icons">person</i> English Qualifications
                        <div class="ripple-container"></div>
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="#bank-account-details" data-toggle="tab" onclick="open_bank_account_details()" id="open-bank-account-details">
                      <i class="material-icons">person</i> Bank Account Details
                      <div class="ripple-container"></div>
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="#visa-history" data-toggle="tab" onclick="open_visa_history()" id="open-visa-history">
                    <i class="material-icons">person</i> Visa History
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="#school-application-informations" data-toggle="tab" onclick="open_school_applications()" id="open-school-application-informations">
                  <i class="material-icons">person</i> School Applications
                  <div class="ripple-container"></div>
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="#course-details" data-toggle="tab" onclick="open_course_details()" id="open-course-details">
                <i class="material-icons">person</i> Course Details
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#current-insurance-provider-details" data-toggle="tab" onclick="open_current_insurance_provider_details()" id="open-course-details">
              <i class="material-icons">person</i> Current Insurance Provider Details
              <div class="ripple-container"></div>
              <div class="ripple-container"></div>
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="#question-answers" data-toggle="tab" onclick="open_question_answers()" id="open-course-details">
            <i class="material-icons">person</i> Q & A
            <div class="ripple-container"></div>
            <div class="ripple-container"></div>
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>
<div class="card-body">
  <div class="tab-content">
    <div class="tab-pane active show" id="personal-informations">
      <div class="col-md-12" id="personal-informations-output">

      </div>
      <table class="table">
        <tbody>
          <tr>
            <td>Visa Country</td>
            <td>
              <select name="spi_visa_country" id="spi_visa_country" class="form-control selectize">
                <option value="">Select Country</option>

                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
              </select>
              <input type="hidden" name="spi_id" id="spi_id">
            </td>
            <td class="text-center"> <button type="button" rel="tooltip" title="" id="spi-btn" onclick="add_spi(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
              data-original-title="Tambah">
              <i class="material-icons">add</i> <span>Add</span>
            </button></td>
          </tr>
          <tr>
            <td>Title</td>
            <td>
              <div class="form-check-inline">
                <input type="radio" name="spi_title" value="Mr." class="form-check-input"> <label class="form-check-label">Mr.</label>
              </div>
              <div class="form-check-inline">
                <input type="radio" name="spi_title" value="Mrs." class="form-check-input"> <label class="form-check-label">Mrs.</label>
              </div>
              <div class="form-check-inline">
                <input type="radio" name="spi_title" value="Ms." class="form-check-input"> <label class="form-check-label">Ms.</label>
              </div>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><input type="date" name="spi_date_of_birth" id="spi_date_of_birth" class="form-control">
              </td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="spi_status" value="Single" class="form-check-input"> <label class="form-check-label">Single</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="spi_status" value="Married" class="form-check-input"> <label class="form-check-label">Married</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="spi_status" value="Divorce" class="form-check-input"> <label class="form-check-label">Divorce</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td>
                <input type="text" name="spi_phone_number" id="spi_phone_number" class="form-control">
              </td>
            </tr>
            <tr>
              <td>Home Country Address</td>
              <td>
                <div class="col-md-12">
                  <div class="row">
                   <label class="col-md-3 col-form-label">
                    Country
                  </label>
                  <div class="col-md-9">
                   <select name="spi_homecountry_country" id="spi_homecountry_country" class="selectize form-control">
                     <option value="">Select Country</option>
                     @foreach($countries as $country)
                     <option value="{{$country->id}}">{{$country->name}}</option>
                     @endforeach
                   </select>
                 </div>
               </div>
             </div>
             <div class="col-md-12">
              <div class="row">
               <label class="col-md-3 col-form-label">
                Address
              </label>
              <div class="col-md-9">
               <textarea class="form-control" name="spi_homecountry_address" id="spi_homecountry_address"></textarea>
             </div>
           </div>
         </div>
         <div class="col-md-12">
          <div class="row">
           <label class="col-md-3 col-form-label">
            Suburb
          </label>
          <div class="col-md-9">
           <input type="text" name="spi_homecountry_suburb" id="spi_homecountry_suburb" class="form-control">
         </div>
       </div>
     </div>
     <div class="col-md-12">
      <div class="row">
       <label class="col-md-3 col-form-label">
        State
      </label>
      <div class="col-md-9">
        <input type="text" name="spi_homecountry_state" id="spi_homecountry_state" class="form-control">
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
     <label class="col-md-3 col-form-label">
      Post Code
    </label>
    <div class="col-md-9">
      <input type="text" name="spi_homecountry_postcode" id="spi_homecountry_postcode" class="form-control">
    </div>
  </div>
</div>

</td>
</tr>
<tr>
 <td>Email</td>
 <td>
   <input type="text" name="spi_primary_email" id="spi_primary_email" class="form-control" placeholder="Primary Email">
   <input type="text" name="spi_secondary_email" id="spi_secondary_email" class="form-control" placeholder="Secondary Email">
 </td>
</tr>
<tr>
 <td>No KTP</td>
 <td>
   <input type="text" name="spi_ktp" id="spi_ktp" class="form-control" placeholder="No. KTP">
 </td>
</tr>
<tr>
 <td>USI (Uniques Student Identifier)</td>
 <td>
   <input type="text" name="spi_usi" id="spi_usi" class="form-control" placeholder="">

 </td>
</tr>
<tr>
 <td>TFN (Tax File Number)</td>
 <td>
   <input type="text" name="spi_tfn" id="spi_tfn" class="form-control" placeholder="">
 </td>
</tr>


<tr>
  <td>Destination Residence Address</td>
  <td>
    <div class="col-md-12">
      <div class="row">
       <label class="col-md-3 col-form-label">
        Country
      </label>
      <div class="col-md-9">
        <select name="spi_current_country" id="spi_current_country" class="selectize form-control">
         <option value="">Select Country</option>
         @foreach($countries as $country)
         <option value="{{$country->id}}">{{$country->name}}</option>
         @endforeach
       </select>
     </div>
   </div>
 </div>
 <div class="col-md-12">
  <div class="row">
   <label class="col-md-3 col-form-label">
    Address
  </label>
  <div class="col-md-9">
   <textarea class="form-control" name="spi_current_address" id="spi_current_address"></textarea>
 </div>
</div>
</div>
<div class="col-md-12">
  <div class="row">
   <label class="col-md-3 col-form-label">
    Suburb
  </label>
  <div class="col-md-9">
   <input type="text" name="spi_current_suburb" id="spi_current_suburb" class="form-control">
 </div>
</div>
</div>
<div class="col-md-12">
  <div class="row">
   <label class="col-md-3 col-form-label">
    Post Code
  </label>
  <div class="col-md-9">
    <input type="text" name="spi_current_postcode" id="spi_current_postcode" class="form-control">
  </div>
</div>
</div>

</td>
</tr>
</tbody>
</table>
</div>
<div class="tab-pane " id="passport-history">
 <div class="col-md-12" id="passport-history-output">

 </div>
 <table class="table">
  <tbody>
    <tr>
      <td>Passport Number</td>
      <td>
        <input type="text" name="ph_passport_number" id="ph_passport_number" class="form-control">
        <input type="hidden" name="ph_id" id="ph_id"></td>
        <td class="text-center"> <button type="button" rel="tooltip" title="" id="ph-btn" onclick="add_ph(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
          data-original-title="Tambah">
          <i class="material-icons">add</i> <span>Add</span>
        </button></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><input type="text" name="ph_name" id="ph_name" class="form-control"></td>
      </tr>
      <tr>
        <td>Expired Date</td>
        <td><input type="date" name="ph_expired_date" id="ph_expired_date" class="form-control"></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="tab-pane" id="english-qualifications">
  <div class="col-md-12" id="english-qualifications-output">

  </div>
  <table class="table">
    <tbody>
      <tr>
        <td>Select Product</td>
        <td>
          <select name="seq_products" id="seq_products" class="form-control">
            <option value="">Select Product</option>
            <option value="IELTS">IELTS</option>
            <option value="TOEFL">TOEFL</option>
            <option value="CAE">CAE</option>
            <option value="TOEIC">TOEIC</option>
            <option value="CPE">CPE</option>
            <option value="PTE Academic">PTE Academic</option>
          </select>
          <input type="hidden" name="seq_id" id="seq_id"></td>
          <td class="text-center"> <button type="button" rel="tooltip" title="" id="seq-btn" onclick="add_seq(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
            data-original-title="Tambah">
            <i class="material-icons">add</i> <span>Add</span>
          </button></td>
        </tr>
        <tr>
          <td>Qualification Name</td>
          <td><input type="text" name="seq_qualification_name" id="seq_qualification_name" class="form-control"></td>
        </tr>
        <tr>
          <td>Qualification Score</td>
          <td><input type="text" name="seq_qualification_score" id="seq_qualification_score" class="form-control"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="tab-pane" id="bank-account-details">
    <div class="col-md-12" id="bank-account-details-output">

    </div>
    <table class="table">
      <tbody>
        <tr>
          <td>Bank Name</td>
          <td>
           <input type="text" name="bad_bank_name" id="bad_bank_name" class="form-control"></td>
           <input type="hidden" name="bad_id" id="bad_id"></td>
           <td class="text-center"> <button type="button" rel="tooltip" title="" id="bad-btn" onclick="add_bad(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
            data-original-title="Tambah">
            <i class="material-icons">add</i> <span>Add</span>
          </button></td>
        </tr>
        <tr>
          <td>Account Name</td>
          <td><input type="text" name="bad_account_name" id="bad_account_name" class="form-control"></td>
        </tr>
        <tr>
          <td>Account Number</td>
          <td><input type="text" name="bad_account_number" id="bad_account_number" class="form-control"></td>
        </tr>
        <tr>
          <td>BSB (australian bank only)</td>
          <td><input type="text" name="bad_bsb" id="bad_bsb" class="form-control"></td>
        </tr>
        <tr>
          <td>Swift Code</td>
          <td><input type="text" name="bad_swift_code" id="bad_swift_code" class="form-control"></td>
        </tr>
        <tr>
          <td>Bank Address</td>
          <td><input type="text" name="bad_address" id="bad_address" class="form-control"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tab-pane" id="visa-history">
    <div class="col-md-12" id="visa-history-output">

    </div>
    <table class="table">
      <tbody>
        <tr>
          <td>Country</td>
          <td>
            <select name="vh_country" id="vh_country" class="form-control">
              <option value="">Select Country</option>
              @foreach($countries as $country)
              <option value="{{$country->id}}">{{$country->name}}</option>
              @endforeach
            </select>
            <input type="hidden" name="vh_id" id="vh_id"></td>
            <td class="text-center"> <button type="button" rel="tooltip" title="" id="vh-btn" onclick="add_vh(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
              data-original-title="Tambah">
              <i class="material-icons">add</i> <span>Add</span>
            </button></td>
          </tr>
          <tr>
            <td>Date of Grant</td>
            <td><input type="date" name="vh_date_of_grant" id="vh_date_of_grant" class="form-control"></td>
          </tr>
          <tr>
            <td>End Date / Expired Date</td>
            <td><input type="date" name="vh_end_date" id="vh_end_date" class="form-control"></td>
          </tr>
          <tr>
            <td>Length Of Stay</td>
            <td><input type="text" name="vh_length_of_stay" id="vh_length_of_stay" class="form-control"></td>
          </tr>

          <tr>
            <td>TRN / Number</td>
            <td><input type="text" name="vh_trn_number" id="vh_trn_number" class="form-control"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-pane" id="school-application-informations">
      <div class="col-md-12" id="school-application-informations-output">

      </div>
      <table class="table">
        <tbody>

          <tr>
            <td>School Location</td>
            <td>
              <select name="sai_school_countries" id="sai_school_countries" class="form-control selectize">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
              </select>
              <input type="hidden" name="sai_id" id="sai_id"></td>
              <td class="text-center"> <button type="button" rel="tooltip" title="" id="sai-btn" onclick="add_sai(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                data-original-title="Tambah">
                <i class="material-icons">add</i> <span>Add</span>
              </button></td>
            </tr>
            <tr>
              <td>Schools or College's Name</td>
              <td id="sai-schools-output">
                <select name="sai_school_id" id="sai_school_id" class="form-control selectize">
                  <option value="">Select School</option>

                </select></td>
              </tr>

              <tr>
                <td>Programs</td>
                <td>
                  <select type="text" name="sai_program_id" id="sai_program_id" class="form-control selectize">
                    <option value="">Select Programs</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Class Shift</td>
                <td><input type="text" name="sai_class_shift" id="sai_class_shift" class="form-control"></td>
              </tr>
              <tr>
                <td>Agent Name</td>
                <td><input type="text" name="sai_agent" id="sai_agent" class="form-control"></td>
              </tr>
            </tbody>
          </table>
        </div>


        <div class="tab-pane" id="course-details">
          <div class="col-md-12" id="course-details-output">

          </div>
          <table class="table">
            <tbody>

              <tr>
                <td>Programs</td>
                <td>
                 <select name="cd_program_id" id="cd_program_id" class="form-control selectize" required>
                  <option class="">Select Programs</option>
                </select>
                <input type="hidden" name="cd_id" id="cd_id"></td>
                <td class="text-center" rowspan="7"> <button type="button" rel="tooltip" title="" id="cd-btn" onclick="add_cd(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                  data-original-title="Tambah">
                  <i class="material-icons">add</i> <span>Add</span>
                </button></td>
              </tr>

              <tr>
               <td>Application Fee</td>
               <td>
                 <input type="text" name="cd_application_fee" id="cd_application_fee" class="form-control" pattern = "[0-9]" title="please enter number only">
               </td>
             </tr>
             <tr>
              <td>Material Fee</td>
              <td>   
                <input type="text" name="cd_material_fee" id="cd_material_fee" class="form-control" pattern = "[0-9]" title="please enter number only">
              </td>
            </tr>
            <tr>
              <td>CoE Fee</td>
              <td><input type="text" name="cd_coe_fee" id="cd_coe_fee" class="form-control" pattern = "[0-9]" title="please enter number only"></td>
            </tr>
            <tr>
              <td>Start Date</td>
              <td><input type="date" name="cd_start_date" id="cd_start_date" class="form-control"></td>
            </tr>
            <tr>
              <td>End Date</td>
              <td><input type="date" name="cd_end_date" id="cd_end_date" class="form-control"></td>
            </tr>
          </tbody>
        </table>

        <div class="card" id="payment-schedule-wrapper">
          <div class="card-header card-header-info">
            <h4 class="card-title"><strong>Payment Schedules</strong></h4>
          </div>
          <div class="card-body">
            <div class="col-md-12" id="payment-schedule-output">

            </div>
            <table class="table">
              <tbody>

                <tr>
                  <td>School Programs</td>
                  <td>
                   <select name="ps_program_id" id="ps_program_id" class="form-control selectize">
                    <option value=""> Select Programs</option>

                  </select>
                  <input type="hidden" name="ps_school_id" id="ps_school_id">
                  <input type="hidden" name="ps_course_detail_id" id="ps_course_detail_id">

                  <input type="hidden" name="ps_id" id="ps_id">
                </td>
                <td class="text-center" rowspan="7"> <button type="button" rel="tooltip" title="" id="ps-btn" onclick="add_ps(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                  data-original-title="Tambah">
                  <i class="material-icons">add</i> <span>Add</span>
                </button></td>
              </tr>
              <tr>
                <td>Discounts / Potongan (%)</td>
                <td> <input type="number" class="form-control" name="ps_discount_percents" id="ps_discount_percents"> </td>
              </tr>
              <tr>
                <td>Discounts / Potongan ($)</td>
                <td> <input type="text" class="form-control" name="ps_discount_amounts" id="ps_discount_amounts"> </td>
              </tr>
              <tr>
               <td>Tuition Fee</td>
               <td>
                <input type="text" name="ps_tuition_fee" class="form-control" id="ps_tuition_fee">
              </td>
            </tr>
            <tr>
             <td>Material Fee</td>
             <td>
               <input type="text" name="ps_material_fee" id="ps_material_fee" class="form-control">
             </td>
           </tr>
           <tr>
            <td>Due Date</td>
            <td><input type="date" name="ps_due_date" id="ps_due_date" class="form-control"></td>
          </tr>
        </tbody>
      </table>

    </div>

  </div>

</div>

<div class="tab-pane" id="current-insurance-provider-details">
  <div class="col-md-12" id="cipd-output">

  </div>
  <table class="table">
    <tbody>

      <tr>
        <td>Policy Number</td>
        <td>
         <input type="text" name="cipd_policy_number" id="cipd_policy_number" class="form-control">
         <input type="hidden" name="cipd_id" id="cipd_id"></td>
         <td class="text-center" rowspan="7"> <button type="button" rel="tooltip" title="" id="cipd-btn" onclick="add_cipd(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
          data-original-title="Tambah">
          <i class="material-icons">add</i> <span>Add</span>
        </button></td>
      </tr>
      <tr>
       <td>Insurance Providers Name</td>
       <td>

         <select class="form-control" name="cipd_name" id="cipd_name">
           <option>Nib Health</option>
           <option>Medibank</option>
           <option>Allianz Global Assistance</option>
           <option>Bupa Health Services</option>
           <option>IMAN Australian Health Plans</option>
           <option>Other</option>
         </select>
       </td>
     </tr>
     <tr>
      <td>Start Date</td>
      <td>   
        <input type="date" name="cipd_start_date" id="cipd_start_date" class="form-control">
      </td>
    </tr>
    <tr>
      <td>End of Contract Date</td>
      <td><input type="date" name="cipd_end_date" id="cipd_end_date" class="form-control"></td>
    </tr>
    <tr>
      <td>Agent</td>
      <td><input type="text" name="cipd_agent" id="cipd_agent" class="form-control"></td>
    </tr>

  </tbody>
</table>
</div>

<div class="tab-pane" id="question-answers">
  <div class="col-md-12" id="question-answers-output">

  </div>
  <table class="table">
    <tbody>

      <tr>
        <td>Date</td>
        <td>
         <input type="date" name="qna_date" id="qna_date" class="form-control">
         <input type="hidden" name="qna_id" id="qna_id"></td>
         <td class="text-center" rowspan="7"> <button type="button" rel="tooltip" title="" id="qna-btn" onclick="add_qna(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
          data-original-title="Tambah">
          <i class="material-icons">add</i> <span>Add</span>
        </button></td>
      </tr>
      <tr>
       <td>Discussion</td>
       <td>
         <input type="text" name="qna_discussion" id="qna_discussion" class="form-control">
       </td>
     </tr>
     <tr>
      <td>Solution</td>
      <td>   
        <textarea name="qna_solution" id="qna_solution" class="form-control" rows="10"></textarea>
      </td>
    </tr>
    <tr>
      <td>Progress</td>
      <td><textarea name="qna_progress" id="qna_progress" class="form-control" rows="10"></textarea>
      </td>
    </tr>

  </tbody>
</table>
</div>

</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
     <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">{{ __('Student Accounts') }}</h4>
          <p class="card-category"> {{ __('Here you can manage students') }}</p>
        </div>
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

          <div class="row">
            <div class="col-12 text-right">
              <a href="{{ route('school-students.create') }}" class="btn btn-sm btn-primary">{{ __('Add Student') }}</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
             <a href="{{route('school-students.index')}}" class="btn btn-warning">{{ __('All') }}</a><a href="{{route('school-students.index',[ 'status' => 'active'])}}" class="btn btn-warning">{{ __('Active') }}</a>  <a href="{{route('school-students.index',['status' =>'inactive'])}}" class="btn btn-warning">{{ __('In Active') }}</a>
             <a href="{{route('school-students.index',[ 'visa_status' => 'Approved'])}}" class="btn btn-warning">{{ __('Approved') }}</a>  <a href="{{route('school-students.index',['visa_status' => 'not-approved'])}}" class="btn btn-warning">{{ __('Not Approved') }}</a>
             <a href="{{route('school-students.index',[ 'visa_status' => 'Cancelled'])}}" class="btn btn-warning">{{ __('Cancelled') }}</a> 
           </div>
         </div>

         <div class="table-responsive">
          <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed">
            <thead class=" text-primary">
              <th>
                {{ __('Name') }}
              </th>
              <th>
                {{ __('Email') }}
              </th>
              <th>{{__('Client Id')}}</th>
              <th>{{__('Marketing Id / Code')}}</th>
              <th>
                {{__('Visa Country')}}
              </th>
              <th>{{__('Dest. Country')}} <br> <span style="font-size: 14px;">(For Client Id)</span> </th>
              <th>
                {{__('Status')}}
              </th>
              <th>
                {{__('Visa Status')}}
              </th>
              <th class="text-right">
                {{ __('Actions') }}
              </th>
            </thead>
            <tbody>
              @foreach($students as $no => $student)

              <tr>
                <td>
                  {{ $student->name }}
                </td>
                <td>
                  {{$student->email}}
                </td>
                <td><span id="client-id{{$no}}">{{$student->client_id}}</span></td>
                <td>{{$student->marketing_id}}</td>
                <td>
                  {{$student->visa_country_name}}
                </td>
                <td>{{$student->dest_country_name}}</td>
                <td>

                  <div class="togglebutton" >
                    <label id="status-ajax">
                      <input type="checkbox" id="status-{{$no}}" autocomplete="off" onchange="change_status('#status-label-{{$no}}','{{$student->id}}',this)" class="status_input" name="status" {{$student->status == 1 ? "checked" : ""}} style="display:none" {{$student->visa_status != "" && $student->visa_status != "0" ? '' : 'disabled'}}>
                      <span class="toggle"></span>
                    </label>
                    <span class="status-label" id="status-label-{{$no}}" for="status">{{$student->status == "1" ? "Active" : "In Active"}}</span>
                  </div>
                </td>
                <td>
                  <div id="visa-status{{$no}}">
                    @if($student->visa_status != "" && $student->visa_status != "0") 
                    {!!$student->visa_status == 'Approved' ? '<button class="btn btn-sm btn-success">Approved</button>' : ($student->visa_status == 'Cancelled' ? '<button class="btn btn-sm btn-danger">Cancelled</button>' : '')!!} 
                    @else
                    <button class="btn btn-sm btn-info" onclick="approve_student('{{$no}}','{{$student->id}}')">Approve</button>
                    @endif
                  </div>
                </td>
                <td class="td-actions text-right">
                  <form action="{{ route('school-students.destroy', $student) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-primary btn-link" onclick="open_modal('{{$student->id}}')">
                      <i class="material-icons">menu</i>
                      <div class="ripple-container"></div>
                      <div class="">
                        More
                      </div>
                    </button>
                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-students.edit', $student) }}" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                    </a>
                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                    </button>
                  </form>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        <div class="row">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
  var student_id;
  var token = $("input[name='_token']").val();

  setInterval(refreshToken, 15*60*1000);  

  function refreshToken(){
    $.get('{{url("refresh-csrf")}}').done(function(data){
      $('[name="_token"]').val(data);
    });
  }

  var table = $('.datatable').DataTable({
    responsive:false,
    stateSave: true,
    searching:true,
  });
  function approve_student(no,student_id){
    $.ajax({
      url: "{{route('approve-student-ajax')}}",
      method: 'POST',
      data: {
        _token: token,
        id:student_id
      },
      success: function(data) {
        data = JSON.parse(data);
        $('#client-id'+no).html(data.client_id);
        $('#status-'+no).attr('disabled',false);
        $('#visa-status'+no).html('<button class="btn btn-sm btn-success">Approved</button>');
        
      },
      error: function() {
          //handle errors
          alert('error...');
        },complete: function(){
          $('.loading-wrapper').hide();
        }
      });

  }
  function change_status(label,student_id,evt){
    var status = evt.checked;
    var token = $("input[name='_token']").val();

    if(confirm("Are you sure want to change this status ?")){
     $('.loading-wrapper').show();
     if(evt.checked == true){
       $(label).html("Active");
     }else{
      $(label).html("In Active");
    }
    $.ajax({
      url: "{{route('change-student-status-ajax')}}",
      method: 'POST',
      data: {
        _token: token,
        id:student_id,
        status: status
      },
      success: function(data) {
        if(data == 1){
         evt.checked = true;

       }else{
         evt.checked = false;
       }
     },
     error: function() {
          //handle errors
          alert('error...');
        },complete: function(){
          $('.loading-wrapper').hide();
        }
      });
  }else{
    if(evt.checked == true){
      evt.checked = false;
    }else{
      evt.checked = true;
    }

  }



}

function open_modal(id) {
  student_id = id;
  $('#open-personal-informations').click();
  open_personal_informations();
  $('#mymodal').modal('toggle');
  form_reset();
}

$('#sai_school_countries').on('change',function(){
  sai_school_countries_ajax($(this).val());
});

function sai_school_countries_ajax(country_id,school_id = null,program_id = null){

  $.ajax({
    url: "{{route('admin-student-sai-schools-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      country_id : country_id
    },
    success: function(data) {
      var data = JSON.parse(data);
      var $select = $('#sai_school_id').selectize();
      var selectize = $select[0].selectize;
      selectize.clearOptions();
      selectize.addOption({value : "", text : "Select School"});
      $.each(data,function(k,v){
       selectize.addOption({value : v.id,text : v.name + ", " + v.address + ", " + v.city_name + ", " + v.region_name + ", " + v.country_name});

     });
      selectize.refreshOptions();
      if(school_id != null){
        selectize.setValue(school_id);
      }
      if(program_id != null){
       sai_school_programs_ajax(school_id,program_id);
     }
     return true;
   },
   error: function(request, status, error) {
    alert(request.responseText);
    return false;
  }
});

}

$('#sai_school_id').on('change',function(){
  sai_school_programs_ajax($(this).val());
});

function sai_school_programs_ajax(school_id,program_id = null){
  $.ajax({
    url: "{{route('admin-student-sai-programs-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      school_id : school_id
    },
    success: function(data) {
      var data = JSON.parse(data);

      var $select = $('#sai_program_id').selectize();
      var selectize = $select[0].selectize;
      selectize.clearOptions();
      selectize.addOption({value : "", text : "Select Programs"});
      $.each(data,function(k,v){
       selectize.addOption({value : v.id,text : v.name});
     });

      selectize.refreshOptions();
      if(program_id != null){
        selectize.setValue(program_id);
      }
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function form_reset(){
  document.getElementById('form-input').reset();
  $('.btn-add').prop("value", "add");
  $('.btn-add > i,.btn-add > span').html("add");
}

function open_personal_informations(){
  $('.loading-wrapper').show();

  $.ajax({
    url: "{{route('admin-student-pi-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      student_id : student_id
    },
    success: function(data) {
      $('#personal-informations-output').html(data);
      $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function open_english_qualifications(){
 $('.loading-wrapper').show();

 $.ajax({
  url: "{{route('admin-student-eq-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id : student_id
  },
  success: function(data) {
    $('#english-qualifications-output').html(data);
    $('.loading-wrapper').hide();
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}

function open_bank_account_details(){
 $('.loading-wrapper').show();

 $.ajax({
  url: "{{route('admin-student-bad-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id : student_id
  },
  success: function(data) {
    $('#bank-account-details-output').html(data);
    $('.loading-wrapper').hide();
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}

function open_visa_history(){
 $('.loading-wrapper').show();

 $.ajax({
  url: "{{route('admin-student-vh-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id : student_id
  },
  success: function(data) {
    $('#visa-history-output').html(data);
    $('.loading-wrapper').hide();
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}
function open_school_applications(){
 $('.loading-wrapper').show();

 $.ajax({
  url: "{{route('admin-student-sai-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id : student_id
  },
  success: function(data) {
    $('#school-application-informations-output').html(data);
    $('.loading-wrapper').hide();
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}
function open_course_details(){
 $('.loading-wrapper').show();
 open_payment_schedules();
 course_detail_programs();
 $.ajax({
  url: "{{route('admin-student-cd-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id : student_id
  },
  success: function(data) {
    $('#course-details-output').html(data);
    $('.loading-wrapper').hide();

  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}

function course_detail_programs(){
 $.ajax({
  url: "{{route('admin-student-cd-programs-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id:student_id
  },
  success: function(data) {
    var data = JSON.parse(data);
    console.log(data);
    var $select = $('#cd_program_id').selectize();
    var selectize = $select[0].selectize;
    selectize.clearOptions();
    selectize.addOption({value : "", text : "Select Programs"});
    $.each(data,function(k,v){
     selectize.addOption({value : v.id,text : v.name});
   });



    var $select2 = $('#ps_program_id').selectize();
    var selectize2 = $select2[0].selectize;
    selectize2.clearOptions();
    selectize2.addOption({value : "", text : "Select Programs"});
    $.each(data,function(k,v){
      selectize2.addOption({value: v.id,text : v.name});
    })
    selectize2.refreshOptions();

    selectize.refreshOptions();
    // if(program_id != null){
    //   selectize.setValue(program_id);
    // }
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}

function open_payment_schedules(school_id,program_id){
 $('#ps_school_id').val(school_id);
 var $select = $('#ps_program_id').selectize();
 var selectize = $select[0].selectize;

 selectize.setValue(program_id);
 $.ajax({
  url: "{{route('admin-student-ps-ajax')}}",
  method: "POST",
  data: {
    _token: token,
    student_id : student_id
  },
  success: function(data) {
    $('#payment-schedule-output').html(data);
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});
}

function open_current_insurance_provider_details(){
  $('.loading-wrapper').show();

  $.ajax({
    url: "{{route('admin-student-cipd-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      student_id : student_id
    },
    success: function(data) {
      $('#cipd-output').html(data);
      $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}
function open_question_answers(){
  $('.loading-wrapper').show();

  $.ajax({
    url: "{{route('admin-student-qna-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      student_id : student_id
    },
    success: function(data) {
      $('#question-answers-output').html(data);
      $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function open_passport_history(){
  $('.loading-wrapper').show();

  $.ajax({
    url: "{{route('admin-student-ph-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      student_id : student_id
    },
    success: function(data) {
      $('#passport-history-output').html(data);
      $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function add_spi(el){
  var id = $("#spi_id").val();
  var visa_country =$('#spi_visa_country').val();
  var title = $("input[name='spi_title']:checked").val();
  var date_of_birth = $('#spi_date_of_birth').val();
  var status = $('input[name="spi_status"]:checked').val();
  var phone_number = $('#spi_phone_number').val();
  var primary_email = $('#spi_primary_email').val();
  var secondary_email = $('#spi_secondary_email').val();
  var ktp = $('#spi_ktp').val();
  var usi = $('#spi_usi').val();
  var tfn = $('#spi_tfn').val();
  var homecountry_country = $('#spi_homecountry_country').val();
  var homecountry_address = $('#spi_homecountry_address').val();
  var homecountry_suburb = $('#spi_homecountry_suburb').val();
  var homecountry_state = $('#spi_homecountry_state').val();
  var homecountry_postcode = $('#spi_homecountry_postcode').val();
  var current_country = $('#spi_current_country').val();
  var current_address = $('#spi_current_address').val();
  var current_suburb = $('#spi_current_suburb').val();
  var current_state = $('#spi_current_state').val();
  var current_postcode = $('#spi_current_postcode').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-pi-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      visa_country: visa_country,
      student_id : student_id,
      title : title,
      ktp:ktp,
      date_of_birth:date_of_birth,
      status : status,
      phone_number : phone_number,
      primary_email : primary_email,
      secondary_email : secondary_email,
      usi : usi,
      tfn : tfn,
      homecountry_country : homecountry_country,
      homecountry_address : homecountry_address,
      homecountry_suburb : homecountry_suburb,
      homecountry_state : homecountry_state,
      homecountry_postcode : homecountry_postcode,
      current_country : current_country,
      current_address : current_address,
      current_suburb : current_suburb,
      current_postcode : current_postcode,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#personal-informations-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}




function edit_spi(array) { 
  data = JSON.parse(array);

  $.each(data,function(k,v){
    var el_input = $(':input[name="spi_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){
       if($(inputRadio).prop("value") == v){
        $(inputRadio).prop("checked",true);
      }
    });
    }else{
     el_input.val(v);
   }

 });
  $('#spi-btn').prop("value", "update");
  $('#spi-btn > i,#spi-btn > span').html("update");
}

function delete_spi(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-pi-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#personal-informations-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}

function add_ph(el){
  var id = $("#ph_id").val();
  var passport_number = $('#ph_passport_number').val();
  var name = $('#ph_name').val();
  var expired_date = $('#ph_expired_date').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-ph-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id : student_id,
      passport_number : passport_number,
      name:name,
      expired_date:expired_date,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#passport-history-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}




function edit_ph(array) { 
  data = JSON.parse(array);
  $.each(data,function(k,v){
    var el_input = $(':input[name="ph_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){
       if($(inputRadio).prop("value") == v){
        $(inputRadio).prop("checked",true);
      }
    });
    }else if(el_input.prop("type") == "date"){
      if(v != null){
       // var date_test = new Date(v.replace(/-/g,"/"));

       el_input.val( v.split(' ')[0]);
     }
   }else{
     el_input.val(v);
   }

 });
  $('#ph-btn').prop("value", "update");
  $('#ph-btn > i,#ph-btn > span').html("update");
}

function delete_ph(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-ph-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#passport-history-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}


function add_seq(el){
  var id = $("#seq_id").val();
  var products = $('#seq_products').val();
  var qualification_name = $('#seq_qualification_name').val();
  var qualification_score = $('#seq_qualification_score').val();

  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-eq-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      products: products,
      qualification_name : qualification_name,
      qualification_score : qualification_score,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#english-qualifications-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_seq(array) { 
  data = JSON.parse(array);

  $.each(data,function(k,v){
    var el_input = $(':input[name="seq_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else{
     el_input.val(v);
   }

 });
  $('#seq-btn').prop("value", "update");
  $('#seq-btn > i,#seq-btn > span').html("update");
}

function delete_seq(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-eq-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#english-qualifications-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}

function add_bad(el){
  var id = $("#bad_id").val();
  var bank_name = $('#bad_bank_name').val();
  var account_name = $('#bad_account_name').val();
  var account_number = $('#bad_account_number').val();
  var bsb = $('#bad_bsb').val();
  var swift_code = $('#bad_swift_code').val();
  var address = $('#bad_address').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-bad-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      account_name: account_name,
      bank_name: bank_name,
      account_number : account_number,
      bsb : bsb,
      swift_code : swift_code,
      address : address,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#bank-account-details-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_bad(array) { 
  data = JSON.parse(array);

  $.each(data,function(k,v){
    var el_input = $(':input[name="bad_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else{
     el_input.val(v);
   }

 });
  $('#bad-btn').prop("value", "update");
  $('#bad-btn > i,#bad-btn > span').html("update");
}

function delete_bad(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-bad-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#bank-account-details-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}

function add_vh(el){
  var id = $("#vh_id").val();
  var country = $('#vh_country').val();
  var date_of_grant = $('#vh_date_of_grant').val();
  var end_date = $('#vh_end_date').val();
  var length_of_stay = $('#vh_length_of_stay').val();
  var trn_number = $('#vh_trn_number').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-vh-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      country:country,
      date_of_grant:date_of_grant,
      end_date:end_date,
      length_of_stay : length_of_stay,
      trn_number : trn_number,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#visa-history-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_vh(array) { 
  data = JSON.parse(array);

  $.each(data,function(k,v){
    var el_input = $(':input[name="vh_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else{
     el_input.val(v);
   }

 });
  $('#vh-btn').prop("value", "update");
  $('#vh-btn > i,#vh-btn > span').html("update");
}

function delete_vh(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-vh-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#visa-history-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}


function add_sai(el){
  var id = $("#sai_id").val();
  var school_id = $('#sai_school_id').val();
  var program_id = $('#sai_program_id').val();
  var class_shift = $('#sai_class_shift').val();
  var agent = $('#sai_agent').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-sai-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      school_id : school_id,
      program_id : program_id,
      class_shift : class_shift,
      agent : agent,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#school-application-informations-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_sai(array) { 
  data = JSON.parse(array);
  school_id = data.school_id;
  program_id = data.program_id;
  $.each(data,function(k,v){
    var el_input = $(':input[name="sai_'+k+'"]');

    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else if(el_input.hasClass("selectize")){
        //sai_school_countries_ajax
        if(el_input.prop("name") == "sai_school_countries"){
          el_input.val(v);
          sai_school_countries_ajax(v,school_id,program_id);
        }
      }else{
       el_input.val(v);
     }


   });
//sai_school_countries_ajax("",data.school_id);


$('#sai-btn').prop("value", "update");
$('#sai-btn > i,#sai-btn > span').html("update");
}

function delete_sai(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-sai-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#school-application-informations-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}

function add_cd(el){
  var id = $("#cd_id").val();
  var program_id = $('#cd_program_id').val();
  if(program_id == ""){
    alert('Please select program first !');
    return false;
  }
  var application_fee = $('#cd_application_fee').val();
  var material_fee = $('#cd_material_fee').val();
  var coe_fee = $('#cd_coe_fee').val();
  var start_date = $('#cd_start_date').val();
  var end_date = $('#cd_end_date').val();

  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-cd-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      program_id : program_id,
      application_fee : application_fee,
      material_fee : material_fee,
      coe_fee : coe_fee,
      start_date : start_date,
      end_date : end_date,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#course-details-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_cd(array) { 
  data = JSON.parse(array);
  $.each(data,function(k,v){

    var el_input = $(':input[name="cd_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else if($(el_input).hasClass('selectize')){
      var $select = $(el_input).selectize();
      var selectize = $select[0].selectize;
      selectize.setValue(v);
    }else if(el_input.prop("type") == "date"){
      if(v != null){
       // var date_test = new Date(v.replace(/-/g,"/"));

       el_input.val( v.split(' ')[0]);
     }
   }
   else{
     el_input.val(v);
   }
 });
  $('#cd-btn').prop("value", "update");
  $('#cd-btn > i,#cd-btn > span').html("update");
}

function delete_cd(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-cd-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#course-details-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}


function add_ps(el){
  var id = $("#ps_id").val();
  var program_id = $('#ps_program_id').val();
  if(program_id == ""){
    alert("Please select program !");
    return false;
  }
  var tuition_fee = $('#ps_tuition_fee').val();
  var material_fee = $('#ps_material_fee').val();
  var due_date = $('#ps_due_date').val();
  var discount_percents = $('#ps_discount_percents').val();
  var discount_amounts = $('#ps_discount_amounts').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-ps-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      program_id : program_id,
      tuition_fee : tuition_fee,
      discount_percents : discount_percents,
      discount_amounts : discount_amounts,
      material_fee : material_fee,
      due_date : due_date,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      var $select = $("#ps_program_id").selectize();
      var selectize = $select[0].selectize;
      selectize.setValue("");
      $('#payment-schedule-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_ps(array) { 
  data = JSON.parse(array);
  $.each(data,function(k,v){

    var el_input = $(':input[name="ps_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else if($(el_input).hasClass('selectize')){
      var $select = $(el_input).selectize();
      var selectize = $select[0].selectize;
      selectize.setValue(v);
    }else if(el_input.prop("type") == "date"){
      if(v != null){
       // var date_test = new Date(v.replace(/-/g,"/"));

       el_input.val( v.split(' ')[0]);
     }
   }
   else{
     el_input.val(v);
   }
 });
  $('#ps-btn').prop("value", "update");
  $('#ps-btn > i,#ps-btn > span').html("update");
}

function delete_ps(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-ps-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#payment-schedule-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}


function add_cipd(el){
  var id = $("#cipd_id").val();
  var policy_number = $('#cipd_policy_number').val();
  var name = $('#cipd_name').val();
  var start_date = $('#cipd_start_date').val();
  var end_date = $('#cipd_end_date').val();
  var agent = $('#cipd_agent').val();
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-cipd-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id:student_id,
      policy_number : policy_number,
      name : name,
      start_date : start_date,
      end_date : end_date,
      agent : agent,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#cipd-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function edit_cipd(array) { 
  data = JSON.parse(array);
  $.each(data,function(k,v){
    var el_input = $(':input[name="cipd_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){

       if($(inputRadio).prop("value") == v){

        $(inputRadio).prop("checked",true);
      }
    });
    }else{
     el_input.val(v);
   }

 });
  $('#cipd-btn').prop("value", "update");
  $('#cipd-btn > i,#cipd-btn > span').html("update");
}

function delete_cipd(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-cipd-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        $('#cipd-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}


function add_qna(el){
  var id = $("#qna_id").val();
  var date =$('#qna_date').val();
  var discussion = $("#qna_discussion").val();
  var solution = $('#qna_solution').val();
  var progress = $('#qna_progress').val();
  
  var cmd = $(el).prop("value");

  $.ajax({
    url: "{{route('admin-student-qna-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      student_id : student_id,
      date : date,
      discussion : discussion,
      solution : solution,
      progress : progress,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#question-answers-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}




function edit_qna(array) { 
  data = JSON.parse(array);

  $.each(data,function(k,v){
    var el_input = $(':input[name="qna_'+k+'"]');
    if(el_input.is("input:radio")){
      $.each(el_input,function(k,inputRadio){
       if($(inputRadio).prop("value") == v){
        $(inputRadio).prop("checked",true);
      }
    });
    }else if(el_input.prop("type") == "date"){
      if(v != null){
       // var date_test = new Date(v.replace(/-/g,"/"));

       el_input.val( v.split(' ')[0]);
     }
   }else if(el_input.prop("type") == "textarea"){

    el_input.val(v.replace(/<br\s*\/?>/mg,"\n"));
  }else{
   el_input.val(v);
 }

});
  $('#qna-btn').prop("value", "update");
  $('#qna-btn > i,#qna-btn > span').html("update");
}

function htmlDecode(input){
  var e = document.createElement('div');
  e.innerHTML = input;
  return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}

function delete_qna(id){
  if(confirm('Are you sure want to delete this data ?') == true){
    var cmd = "delete";
    $.ajax({
      url: "{{route('admin-student-qna-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        student_id: student_id,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#question-answers-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
}


</script>

@endpush