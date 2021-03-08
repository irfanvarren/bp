@extends('layouts.app-auth', ['activePage' => 'schools', 'titlePage' => __('schools'),'activeMenu' => __('school-management')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
  .selectize-input input{
    padding:0 5px;
    border:none;
}
</style>
<style media="screen">
    .mymodal {
        max-width: 85% !important;
        margin-top: 30px !important;
    }

    .my-img-thumbnail {
        overflow: hidden;
        display: inline-block;
        margin-bottom: 5px;
        vertical-align: middle;
        text-align: center;
    }

    .my-img-thumbnail {
        border-radius: 16px;
    }

    .my-img-thumbnail {
        padding: 0.25rem;
        background-color: #fafafa;
        border: 1px solid #dee2e6;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.075);
        max-width: 100%;
        height: auto;
    }

    .my-img-thumbnail > img {
        max-height: 100%;
        max-width: 100%;
        height: auto;
        margin-right: auto;
        margin-left: auto;
        display: block;
        vertical-align:middle
    }

    .school-gallery-wrapper{
      margin:15px 0;
  }
  .school-gallery {
      height:205px;
      border-radius: 16px;
      overflow: hidden;
      background-color: #fafafa;
      border: 1px solid #dee2e6;
      padding:0 !important;
  }

  .gallery-btn-wrapper {
    position: absolute;
    border-radius: 16px;
    width:100%;
    height: 100%;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
}

.gallery-btn-wrapper .gallery-btn {
    display: none;
    width: fit-content;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

}

.school-gallery:hover .gallery-btn-wrapper {
    background: rgba(0, 0, 0, 0.7);
    cursor:pointer;
}

.school-gallery:hover .gallery-btn {
    display: block;
}

.school-gallery img {
  max-height: 100%;
  max-width: 100%;
  height: auto;
  margin-right: auto;
  margin-left: auto;
  display: block;
  vertical-align: middle;
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
.school-intake-program-wrapper{
    display:none;
}
</style>
@endpush
@section('modal')
<div class="loading-wrapper">
    <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mymodal" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Schools Data</h5>
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
                                                <a class="nav-link" href="#divisions" data-toggle="tab" onclick="open_division()" id="open-division">
                                                    <i class="material-icons">work</i> Divisions
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#contacts" onclick="open_contacts()" data-toggle="tab">
                                                    <i class="material-icons">person</i> Contacts
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#gallery" onclick="open_gallery()" data-toggle="tab">
                                                    <i class="material-icons">image</i> Gallery
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#other_fees" onclick="open_other_fees()" data-toggle="tab">
                                                    <i class="material-icons">attach_money</i> Other Fees
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#school_refund" onclick="open_school_refund()" data-toggle="tab">
                                                    <i class="material-icons">attach_money</i> School Refund
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#school_promo" onclick="open_school_promo()" data-toggle="tab">
                                                    <i class="material-icons">attach_money</i> Promo
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#school_intake" onclick="open_school_intake()" data-toggle="tab">
                                                    <i class="material-icons">access_time</i> School Intake
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#school_time_table" onclick="open_school_time_table()" data-toggle="tab">
                                                    <i class="material-icons">access_time</i> Time Table
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#student_information" onclick="open_student_information()" data-toggle="tab">
                                                    <i class="material-icons">info</i> Student Information
                                                    <div class="ripple-container"></div>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#bank_account" onclick="open_bank_account()" data-toggle="tab">
                                                    <i class="material-icons">attach_money</i> Bank Account
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
                                    <div class="tab-pane active show" id="divisions">
                                        <div class="col-md-12" id="divisions-output">

                                        </div>
                                        <table class="table">
                                            <tbody class="pendidikan-wrapper">
                                                <tr>
                                                    <td>Division Name</td>
                                                    <td><input type="text" name="division_name" class="form-control" id="division_name" name=""><input type="hidden" name="division_id" id="division_id"></td>
                                                    <td class="text-center"> <button type="button" rel="tooltip" title="" id="division-btn" onclick="add_division(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                                                      data-original-title="Tambah">
                                                      <i class="material-icons">add</i> <span>Add</span>
                                                  </button></td>
                                              </tr>

                                          </tbody>
                                      </table>
                                  </div>

                                  <div class="tab-pane" id="contacts">
                                    <div class="col-md-12" id="contacts-output">

                                    </div>

                                    <table class="table">
                                        <tbody class="pendidikan-wrapper">
                                            <tr>
                                                <td>Division</td>
                                                <td id="contact_division-output">

                                                </td>
                                                <td rowspan="4" class="text-center"> <button type="button" rel="tooltip" title="" id="contact-btn" onclick="add_contact(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                                                  data-original-title="Tambah">
                                                  <i class="material-icons">add</i> <span>Add</span>
                                              </button></td>
                                          </tr>
                                          <tr>
                                            <td>Contacts Name</td>
                                            <td>
                                                <input type="text" name="contact_name" id="contact_name" class="form-control" value="">
                                                <input type="hidden" name="contact_id" id="contact_id" value="">
                                            </td>


                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <input type="text" name="contact_email" id="contact_email" class="form-control" value="">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>
                                                <input type="text" name="contact_phone_number" id="contact_phone_number" class="form-control" value="">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Skype Id</td>
                                            <td>
                                                <input type="text" name="contact_skype_id" id="contact_skype_id" class="form-control" value="">
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane" id="gallery">

                                <div class="col-md-12">
                                  <div class="row gallery-output">


                                    <div class="col-md-3">
                                        <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                            <div>
                                                <div class="my-img-thumbnail" style="width: 200px; height: 150px;">
                                                  <img id="img-preview" src="" alt="">
                                              </div>
                                              <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    Add Image
                                                    <input type="file" name="gambar" id="gambar">
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="other_fees">
                       <div class="col-md-12" id="other_fees-output">

                       </div>

                       <table class="table">
                        <tbody class="pendidikan-wrapper">
                            <tr>
                                <td>Fee Name</td>
                                <td>
                                    <input type="text" name="other_fee_name" id="other_fee_name" class="form-control" value="">
                                    <input type="hidden" name="other_fee_id" id="other_fee_id" value="">
                                </td>
                                <td rowspan="3" class="text-center"> <button type="button" rel="tooltip" title="" id="other_fee-btn" onclick="add_other_fee(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                                  data-original-title="Tambah">
                                  <i class="material-icons">add</i> <span>Add</span>
                              </button></td>
                          </tr>
                          <tr>
                            <td>Fee</td>
                            <td>
                                <input type="text" name="other_fee" id="other_fee" class="form-control" value="">

                            </td>


                        </tr>
                        <tr>
                            <td>Details</td>
                            <td>
                                <textarea class="form-control" name="other_fee_details" id="other_fee_details"></textarea>
                            </td>

                        </tr>



                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="school_refund">
                <div class="col-md-12" id="school_refund-output">

                </div>

                <table class="table">
                    <tbody class="pendidikan-wrapper">
                        <tr>
                            <td>Refund Name</td>
                            <td>
                                <input type="text" name="school_refund_name" id="school_refund_name" class="form-control" value="">
                                <input type="hidden" name="school_refund_id" id="school_refund_id" value="">
                            </td>
                            <td rowspan="3" class="text-center"> <button type="button" rel="tooltip" title="" id="school_refund-btn" onclick="add_school_refund(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                              data-original-title="Tambah">
                              <i class="material-icons">add</i> <span>Add</span>
                          </button></td>
                      </tr>
                      <tr>
                        <td>Total Refund</td>
                        <td>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" name="total_refund" id="total_refund" class="form-control" value="">
                                </div>
                                <div class="col-md-3">            
                                    <div style="padding:8px 0;">
                                        <input type="checkbox" name="cek_refund" value="1" id="cek_refund"> Per cent
                                    </div>
                                </div>
                            </div>



                        </td>


                    </tr>
                    <tr>
                        <td>Details</td>
                        <td>
                            <textarea class="form-control" name="school_refund_details" id="school_refund_details"></textarea>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2">  <p>* Check the check box if the refund is in percentage !</p>
                            <p>* Total Refund affected by course fee</p></td>
                        </tr>



                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="school_promo">
                <div class="col-md-12" id="school_promo-output">

                </div>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" name="school_promo_name" id="school_promo_name" class="form-control" value="">
                                <input type="hidden" name="school_promo_id" id="school_promo_id" value="">
                            </td>
                            <td rowspan="3" class="text-center"> <button type="button" rel="tooltip" title="" id="school_promo-btn" onclick="add_school_promo(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                              data-original-title="Tambah">
                              <i class="material-icons">add</i> <span>Add</span>
                          </button></td>
                      </tr>
                      <tr>
                          <td>Type</td>
                          <td>
                              <select  class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" name="school_promo_type" id="school_promo_type" class="form-control">
                                  <option value="">- Select Type -</option>
                                  <option value="Promo">Promo</option>
                                  <option value="Scholarships">Scholarships</option>
                                  <option value="Package">Package</option>

                              </select>
                          </td>
                      </tr>
                      <tr>
                          <td>School Programs</td>
                          <td>
                              <select class="selectize col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="school_promo_program" name="school_promo_program">
                                <option value="">- Select Program -</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Special Offer</td>
                        <td>
                           <input type="text" name="school_special_offer" id="school_special_offer" class="form-control" value="">

                       </td>
                   </tr>
                   <tr>
                    <td>Total Offer</td>
                    <td>
                        <input type="number" min="0" name="school_total_offer" id="school_total_offer" class="form-control" value="">

                    </td>
                </tr>
                <tr>
                    <td>Intake</td>
                    <td>
                        <input type="date" name="school_promo_intake" id="school_promo_intake" class="form-control" value="">

                    </td>
                </tr>
                <tr>
                    <td>Term and Conditions</td>
                    <td>
                        <textarea class="form-control" name="school_promo_term_conditions" id="school_promo_term_conditions"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Date Terminated</td>
                    <td>
                        <input type="date" name="school_date_terminated" id="school_date_terminated" class="form-control" value="">

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane" id="school_intake">
        <div class="card-header card-header-primary" style="margin:15px 00;">
           <h4 class="card-title ">{{ __('School Term') }}</h4>
       </div>
       <div class="col-md-12" id="school_term-output">

       </div>
       <table class="table">
        <tbody class="pendidikan-wrapper">
            <tr>
                <td>Term</td>
                <td>
                    <input type="text" name="school_term" id="school_term" class="form-control" value="">
                    <input type="hidden" name="school_term_id" id="school_term_id" value="">
                </td>
                <td rowspan="3" class="text-center"> <button type="button" rel="tooltip" title="" id="school_term-btn" onclick="add_school_term(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                  data-original-title="Tambah">
                  <i class="material-icons">add</i> <span>Add</span>
              </button></td>
          </tr>
          <tr>
            <td>Duration</td>
            <td>
                <input type="text" name="school_term_duration" id="school_term_duration" class="form-control">
            </td>

        </tr>
        <tr>
            <td>Term Date</td>
            <td>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="school_term_start_date" id="school_term_start_date">
                    </div>
                    <div class="col-md-6">            
                      <input type="date" class="form-control" name="school_term_end_date" id="school_term_end_date">
                  </div>
              </div>
          </td>
      </tr>
  </tbody>
</table>
<div class="card-header card-header-primary" style="margin:15px 0;">
    <h4 class="card-title ">{{ __('School Intake') }}</h4>
</div>

<div class="col-md-12" id="school_intake-output">

</div>
<table class="table">
    <tbody class="pendidikan-wrapper">
        <tr><td>Intake Type</td>
            <td>
                <div class="from-check-inline">
                    <input type="radio" name="intake_type" id="intake-type-schools" class="form-check-input" value="schools" checked> <label class="form-check-label"> Schools </label>
                </div>
                <div class="from-check-inline">
                    <input type="radio" name="intake_type" id="intake-type-programs" class="form-check-input" value="school-programs"> <label class="form-check-label"> Schools Programs </label>
                </div>
            </td>
             <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" id="school_intake-btn" onclick="add_school_intake(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
          data-original-title="Tambah">
          <i class="material-icons">add</i> <span>Add</span>
      </button></td>
        </tr>
        <tr>
            <td>Term</td>
            <td>
              <select class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="school_intake_term_id" name="school_intake_term_id">
                <option value="">- Select Term -</option>

            </select>
            <input type="hidden" name="school_intake_id" id="school_intake_id" value="">
        </td>
       
  </tr>
  <tr class="school-intake-program-wrapper">
    <td>School Courses</td>
    <td>

      <select class="selectize col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="school_intake_course" name="school_intake_course">
        <option value="">- Select Course -</option>
    </select>
    </td>
</tr>
<tr class="school-intake-program-wrapper">
    <td>School Program</td>
    <td id="school_intake_program-output">
        Select Course First
    </td>
</tr>
<tr>
    <td>Intake Date</td>
    <td><input type="date" class="form-control" name="school_intake_intake_date" id="school_intake_intake_date"></td>
</tr>
<tr>
    <td>Orientation Date</td>
    <td><input type="date" class="form-control" name="school_intake_orientation_date" id="school_intake_orientation_date"></td>
</tr>
<tr>
    <td>Note</td>
    <td>
        <textarea class="form-control" name="school_intake_note" id="school_intake_note"></textarea>
    </td>
</tr>

</tbody>
</table>
</div>
<div class="tab-pane" id="school_time_table">
    <div class="card-header card-header-primary" style="margin:15px 0;">

        <h4 class="card-title ">{{ __('Time Table Type') }}</h4>
    </div>
    <div class="col-md-12" id="school_time_table_type-output">

    </div>

    <table class="table">
        <tbody >
            <tr>
                <td>Type</td>
                <td>
                 <input type="text" name="time_table_type" id="time_table_type" class="form-control" value="">
                 <input type="hidden" name="time_table_type_id" id="time_table_type_id" value="">
             </td>
             <td class="text-center"> <button type="button" rel="tooltip" title="" id="school_time_table_type-btn" onclick="add_school_time_table_type(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
              data-original-title="Tambah">
              <i class="material-icons">add</i> <span>Add</span>
          </button></td>
      </tr>
  </tbody>
</table>
<div class="card-header card-header-primary" style="margin:15px 0;">

    <h4 class="card-title ">{{ __('Time Table') }}</h4>
</div>
<div class="col-md-12" id="school_time_table-output">

</div>
<table class="table">
    <tbody class="pendidikan-wrapper">
        <tr>
            <td>Type</td>
            <td>
                <select class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="school_time_table_type" name="school_time_table_type">
                    <option value="">- Select Type -</option>

                </select>
                <input type="hidden" name="school_time_table_id" id="school_time_table_id" value="">
                
            </td>
            <td rowspan="2" class="text-center"> <button type="button" rel="tooltip" title="" id="school_time_table-btn" onclick="add_school_time_table(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
              data-original-title="Tambah">
              <i class="material-icons">add</i> <span>Add</span>
          </button></td>
      </tr>
      <tr>
        <td>School Programs</td>
        <td>

          <select class="selectize col-sm-12 pl-0 pr-0" required id="school_time_table_program" name="school_time_table_program">
            <option value="">- Select Program -</option>

        </select>
    </td>
</tr>
<tr>
    <td>Days</td>
    <td>
        <input type="text" name="school_time_table_days" id="school_time_table_days" class="form-control" value="">
    </td>
</tr>
<tr>
    <td>Time</td>
    <td>
        <input type="text" name="school_time_table_time" id="school_time_table_time" class="form-control" value="">  

    </td>


</tr>


</tbody>
</table>
</div>
<div class="tab-pane" id="student_information">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 pr-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                           <div class="card-header col-md-12 card-header-primary" style="margin:15px 0;">

                            <h4 class="card-title ">{{ __('Rights') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="school_student_rights_information-output">

                </div>
                <table class="table">
                    <tbody >
                        <tr>
                            <td>Rights</td>
                            <td>
                             <input type="text" name="student_rights" id="student_rights" class="form-control" value="">
                             <input type="hidden" name="student_rights_information_id" id="student_rights_information_id" value="">
                             <input type="hidden" name="student_rights_index" id=student_rights_index>
                         </td>
                         <td class="text-center"> <button type="button" rel="tooltip" title="" id="student_rights_information-btn" onclick="add_student_rights_information(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                          data-original-title="Tambah">
                          <i class="material-icons">add</i> <span>Add</span>
                      </button></td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

  <div class="col-md-6 pl-4">
    <div class="row">
        <div class="card-header col-md-12 card-header-primary" style="margin:15px 0;">

            <h4 class="card-title ">{{ __('Obligations') }}</h4>
        </div>
        <div class="col-md-12" id="school_student_obligations_information-output">

        </div>

        <table class="table">
            <tbody >
                <tr>
                    <td>Obligations</td>
                    <td>
                        <input type="text" name="student_obligations" id="student_obligations" class="form-control" value="">
                        <input type="hidden" name="student_obligations_information_id" id="student_obligations_information_id" value="">
                        <input type="hidden" name="student_obligations_index" id=student_obligations_index>

                    </td>
                    <td class="text-center"> 
                        <button type="button" rel="tooltip" title="" id="student_obligations_information-btn" onclick="add_student_obligations_information(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add" data-original-title="Tambah">
                            <i class="material-icons">add</i> <span>Add</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


</div>

<div class="tab-pane" id="bank_account">
    <div class="col-md-12" id="school_bank_accounts-output">

    </div>
    <div class="col-md-12">
        <div class="row">
          <label class="col-sm-2 col-form-label">{{ __('Account Name') }}</label>
          <div class="col-sm-7">
            <div class="form-group{{ $errors->has('account_name') ? ' has-danger' : '' }}">
              <input class="form-control{{ $errors->has('account_name') ? ' is-invalid' : '' }}" name="account_name" id="account_name" type="text" placeholder="{{ __(' Account Name') }}" value="{{ old('account_name') }}"  required aria-required="true"/>
              <input type="hidden" name="bank_account_id" id="bank_account_id" value="">
              @if ($errors->has('account_name'))
              <span id="account_name-error" class="error text-danger" for="account_name">{{ $errors->first('account_name ') }}</span>
              @endif
          </div>
      </div>
      <div class="col-sm-3">
       <button type="button" rel="tooltip" title="" id="school_bank_account-btn" onclick="add_school_bank_account(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add" data-original-title="Tambah">
        <i class="material-icons">add</i> <span>Add</span>
    </button>
</div>
</div>
<div class="row">
  <label class="col-sm-2 col-form-label">{{ __('Account Number') }}</label>

  <div class="col-sm-7">
    <div class="form-group{{ $errors->has('account_number') ? ' has-danger' : '' }}">
      <input class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" id="account_number" type="text" placeholder="{{ __('Account Number') }}" value="{{ old('account_number') }}" aria-required="true"/>
      @if ($errors->has('account_number'))
      <span id="account_number-error" class="error text-danger" for="account_number">{{ $errors->first('account_number ') }}</span>
      @endif
  </div>
</div>
</div>
<div class="row">
  <label class="col-sm-2 col-form-label">{{ __('BSB') }}</label>

  <div class="col-sm-7">
    <div class="form-group{{ $errors->has('bsb') ? ' has-danger' : '' }}">
      <input class="form-control{{ $errors->has('bsb') ? ' is-invalid' : '' }}" name="bsb" id="bsb" type="text" placeholder="{{ __('BSB') }}" value="{{ old('bsb') }}" aria-required="true"/>
      @if ($errors->has('bsb'))
      <span id="bsb-error" class="error text-danger" for="bsb">{{ $errors->first('bsb ') }}</span>
      @endif
  </div>
</div>
</div>
<div class="row">
  <label class="col-sm-2 col-form-label">{{ __('Swift Code') }}</label>

  <div class="col-sm-7">
    <div class="form-group{{ $errors->has('swift_code') ? ' has-danger' : '' }}">
      <input class="form-control{{ $errors->has('swift_code') ? ' is-invalid' : '' }}" name="swift_code" id="swift_code" type="text" placeholder="{{ __('Swift Code') }}" value="{{ old('swift_code') }}" aria-required="true"/>
      @if ($errors->has('swift_code'))
      <span id="swift_code-error" class="error text-danger" for="swift_code">{{ $errors->first('swift_code ') }}</span>
      @endif
  </div>
</div>
</div>
<div class="row">
  <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>

  <div class="col-sm-7">
    <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
      <input class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" id="bank_name" type="text" placeholder="{{ __('Bank Name') }}" value="{{ old('bank_name') }}" aria-required="true"/>
      @if ($errors->has('bank_name'))
      <span id="bank_name-error" class="error text-danger" for="bank_name">{{ $errors->first('bank_name ') }}</span>
      @endif
  </div>
</div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">{{ __('Bank Address') }}</label>

  <div class="col-sm-7">
    <div class="form-group{{ $errors->has('bank_address') ? ' has-danger' : '' }}">
      <input class="form-control{{ $errors->has('bank_address') ? ' is-invalid' : '' }}" name="bank_address" id="bank_address" type="text" placeholder="{{ __('Bank Address') }}" value="{{ old('bank_address') }}" aria-required="true"/>
      @if ($errors->has('bank_address'))
      <span id="bank_address-error" class="error text-danger" for="bank_address">{{ $errors->first('bank_address ') }}</span>
      @endif
  </div>
</div>
</div>

<div class="row">               
    <label class="col-sm-2 col-form-label">Note</label>
    <div class="col-sm-7">
        <textarea class="form-control" name="bank_note" id="bank_note"></textarea>
    </div>
</div>


</div>
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
                        <h4 class="card-title ">{{ __('Schools') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage schools') }}</p>
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
                                <a href="{{ route('school.create') }}" class="btn btn-sm btn-primary">{{ __('Add School') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" style="table-layout:fixed">
                                <colgroup>
                                    <col>
                                    <col width="25%">
                                    <col width="130">
                                    <col width="130">
                                    <col>
                                    <col>
                                </colgroup>
                                <thead class=" text-primary">

                                    <th>

                                        {{ __('Name') }}
                                    </th>
                                    <th>{{__('Address')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Website')}}</th>
                                    <th>{{__('Details')}}</th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($schools as $school)

                                    @php
                                    /* $dom = new \domdocument();
                                    //$desc = $school->description;

                                    $desc = "<div>".$school->description."</div>";
                                    $dom->loadHtml($desc);
                                    $images = $dom->getelementsbytagname('img');
                                    foreach($images as $k => $img){
                                    // check data apa bentuknya data:image

                                    $src = $img->getattribute('src');

                                    $img->removeAttribute('src');
                                    $img->setattribute('src',asset('img/schools/'.$school->abbreviation.'/'.$src));


                                }
                                $body = $dom->savehtml();*/
                                @endphp
                                <tr>
                                    <td>
                                        <p><strong>{{ $school->name }} ({{$school->abbreviation}})</strong></p>

                                        <img class="lazy" data-src="{{asset('img/schools/logo_sekolah/'.$school->logo)}}" style="width:120px;" alt="">
                                    </td>
                                    <td>
                                        {{$school->address}} <br>
                                        {{$school->city_name}} <br>
                                        {{ $school->region_name }} <br>
                                        {{$school->country_name}}
                                    </td>
                                    <td>{{$school->email}}</td>
                                    <td>{{$school->website}}</td>
                                    <td>Detail <br>
                                        Intake : {{$school->intake}}
                                    </td>
                                    <td class="td-actions text-right">
                                        <form action="{{ route('school.destroy', $school) }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('delete')
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('cari-sekolah/admin/schools/'.$school->id.'/programs')}}" data-original-title="" title="">
                                                <i class="material-icons">extension</i>
                                                <div class="ripple-container"></div>
                                                <div class="">
                                                    Programs
                                                </div>
                                            </a>
                                            <button type="button" class="btn btn-primary btn-link" onclick="open_modal('{{$school->id}}')">
                                                <i class="material-icons">menu</i>
                                                <div class="ripple-container"></div>
                                                <div class="">
                                                    More
                                                </div>
                                            </button>
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school.edit', $school) }}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                                <div class="">
                                                    Edit
                                                </div>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this school?") }}') ? this.parentElement.submit() : ''">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                                <div class="">
                                                    Del
                                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>

<script type="text/javascript">

 $('.selectize').selectize({
    width : 'resolve'
});

var school_id;
var table = $('.datatable').DataTable({
  responsive:false,
  stateSave: true,
});
 $(document).ready(function(){
   $( "#course_unit" ).keydown(function( event ) {
      if ( event.which == 13 ) {
         var el = document.getElementById('course_unit-btn');
         add_course_unit(el);
     }
 });

$('#intake-type-programs').on('change',function(){
if($(this).prop('checked') == true){
$('.school-intake-program-wrapper').show();
}else{
    $('.school-intake-program-wrapper').hide();
}
});


$('#intake-type-schools').on('change',function(){
if($(this).prop('checked') == true){
$('.school-intake-program-wrapper').hide();
}else{
    $('.school-intake-program-wrapper').show();
}
});
   $('#gambar').on('change',function(){

    var preview = document.getElementById('img-preview');
    var file    = document.getElementById('gambar').files[0];

    var reader  = new FileReader();
    reader.addEventListener("load", function () {
      preview.src = reader.result;
  }, false);

    if (file) {
      reader.readAsDataURL(file);
      var token = $("input[name='_token']").val();
      var formData = new FormData();
      formData.append('_token', token);
      formData.append('school_id', school_id);
      formData.append('gambar', file);
      formData.append('cmd', 'add');
      $('.loading-wrapper').show();
      $.ajax({
        url: "{{route('school_gallery-ajax')}}",
        method: "POST",
        processData: false,
        contentType: false,
        data:formData,
        success:function(data){
          $('.school-gallery-wrapper').remove();
          var data = JSON.parse(data);
          if (data.length === 0) {
              console.log('kosong');
          } else {
              $.each(data, function(k, v) {

                  $('.gallery-output').prepend(
                    '<div class="col-md-3 school-gallery-wrapper">' +
                    '<div class="col-md-12 school-gallery">' +
                    '<img class="lazy" src="{{asset('img/schools/')}}'+ '/' + v['school_id'] + '/' + v['image'] +'" alt="">' +
                    '<div class="gallery-btn-wrapper">' +
                    '<div class="gallery-btn">' +
                    '<button class="btn btn-warning btn-round" disabled onclick="edit_gallery()">Edit</button> <button class="btn btn-danger btn-round" type="button" onclick="delete_gallery('+v['id']+')">Delete</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                    );
              });
              $('.loading-wrapper').hide();
          }
          $('.loading-wrapper').hide();
      },error:function(){

      }
  });
  }
});
});
 function open_modal(id) {
    school_id = id;
    $('.loading-wrapper').show();
        /*var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{route('school_division-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                school_id: school_id,
            },
            success: function(data) {
                $('#divisions-output').html(data);
                $('.loading-wrapper').hide();
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });*/
        $('#open-division').click();
        form_reset();
        $('.loading-wrapper').hide();
        $('#mymodal').modal('toggle');
    }
    function open_gallery() {
      $('.loading-wrapper').show();
      var token = $("input[name='_token']").val();

      $.ajax({
        url: "{{route('school_gallery-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('.school-gallery-wrapper').remove();
            var data = JSON.parse(data);
            if (data.length === 0) {
                console.log('kosong');
            } else {
                console.log(data);
                $.each(data, function(k, v) {
                    $('.gallery-output').prepend(
                      '<div class="col-md-3 school-gallery-wrapper">' +
                      '<div class="col-md-12 school-gallery">' +
                      '<img class="lazy" src="{{asset('img/schools/')}}'+ '/' + v['school_id'] + '/' + v['image'] +'" alt="">' +
                      '<div class="gallery-btn-wrapper">' +
                      '<div class="gallery-btn">' +
                      '<button class="btn btn-warning btn-round" disabled onclick="edit_gallery()">Edit</button> <button class="btn btn-danger btn-round" type="button" onclick="delete_gallery('+v['id']+')">Delete</button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>'
                      );
                });
            }
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
  }
  function delete_gallery(id){
    if(confirm('Are you sure want to delete this data ?') == true){
      $('.loading-wrapper').show();
      var token = $("input[name='_token']").val();
      $.ajax({
        url: "{{route('school_gallery-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id:id,
            school_id: school_id,
            cmd : 'delete'
        },
        success: function(data) {
            var data = JSON.parse(data);
            if (data.length === 0) {
                console.log('kosong');
            } else {
              $('.school-gallery-wrapper').remove();
              $.each(data, function(k, v) {
                $('.gallery-output').prepend(
                  '<div class="col-md-3 school-gallery-wrapper">' +
                  '<div class="col-md-12 school-gallery">' +
                  '<img class="lazy" src="{{asset('img/schools/')}}'+ '/' + v['school_id'] + '/' + v['image'] +'" alt="">' +
                  '<div class="gallery-btn-wrapper">' +
                  '<div class="gallery-btn">' +
                  '<button class="btn btn-warning btn-round" disabled onclick="edit_gallery()">Edit</button> <button class="btn btn-danger btn-round" type="button" onclick="delete_gallery('+v['id']+')">Delete</button>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>'
                  );
            });
          }
          $('.loading-wrapper').hide();
      },
      error: function(request, status, error) {
        alert(request.responseText);
    }
});
  }
}
function open_division(){
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_division-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#divisions-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}
function open_contacts() {
    $('.loading-wrapper').show();
    contactsOnce();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_contact-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#contacts-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}
function open_other_fees() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_other_fees-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {

            $('#other_fees-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}
function open_school_refund() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_refund-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#school_refund-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

$("#school_intake_course").on('change',function(){
     $('.loading-wrapper').show();
      var token = $("input[name='_token']").val();
    var course_id = $(this).val();
    $.ajax({
        url: "{{route('school_intake_program-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
            course_id : course_id
        },
        success: function(data) {
            $('#school_intake_program-output').html(data);
        },
        error: function(request, status, error) {
            alert(request.responseText);
        },complete: function(){
            $('.loading-wrapper').hide();
        }
    });
});

function open_school_intake() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    open_school_term();
    open_school_intake_courses();
    $.ajax({
        url: "{{route('school_intake-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#school_intake-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}
function open_school_intake_courses(){
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_intake_course-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            //$('#school_intake_course').html(data);
            //$('#school_intake_course').refreshOptions();
            var data = JSON.parse(data);
            var $select = $('#school_intake_course').selectize();
            var selectize = $select[0].selectize;
            selectize.clearOptions();
            selectize.addOption({value : "null", text : "All Programs"});
            $.each(data,function(k,v){
               selectize.addOption({value : v.id,text : v.name});
           });

            selectize.refreshOptions();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}
function open_school_time_table_programs(){
    var token = $("input[name='_token']").val();   
    $.ajax({
        url: "{{route('school_has_program-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
          //  $('#school_time_table_program').html(data);
       // $('#school_time_table_program').selectpicker('refresh');
       var data = JSON.parse(data);
       var $select = $('#school_time_table_program').selectize();
       var selectize = $select[0].selectize;
       selectize.clearOptions();
       $.each(data,function(k,v){
           selectize.addOption({value : v.id,text : v.name});
       });
       selectize.refreshOptions();
   },
   error: function(request, status, error) {
    alert(request.responseText);
}
});
}
function open_school_time_table(){
  var token = $("input[name='_token']").val();
  open_school_time_table_type();
  open_school_time_table_programs();
  $.ajax({
    url: "{{route('school_time_table-ajax')}}",
    method: "POST",
    data: {
        _token: token,
        school_id: school_id,
    },
    success: function(data) {
        $('#school_time_table-output').html(data);
        $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});
}
function open_student_information(){

    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_student_obligations-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#school_student_obligations_information-output').html(data);
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
    $.ajax({
        url: "{{route('school_student_rights-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#school_student_rights_information-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}
function open_bank_account(){

    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_bank_accounts-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#school_bank_accounts-output').html(data);

            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function add_school_bank_account(el){
    var token = $("input[name='_token']").val();
    var id = $("#bank_account_id").val();
    var account_name = $("#account_name").val();
    var account_number = $('#account_number').val();
    var bsb = $('#bsb').val();
    var swift_code = $('#swift_code').val();
    var bank_name = $('#bank_name').val();
    var bank_address = $('#bank_address').val();
    var note = $('#bank_note').val();
    var cmd = $(el).prop("value");

    $.ajax({
        url: "{{route('school_bank_accounts-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id : school_id,
            account_name : account_name,
            account_number : account_number,
            bsb : bsb,
            swift_code : swift_code,
            bank_name : bank_name,
            bank_address : bank_address,
            note:note,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            $('#school_bank_accounts-output').html(data);
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function edit_school_bank_account(id,account_name,account_number,bsb,swift_code,bank_name,bank_address,note) { 
    $('#bank_account_id').val(id);
    $('#account_name').val(account_name);
    $('#account_number').val(account_number);
    $('#bsb').val(bsb);
    $('#swift_code').val(swift_code);
    $('#bank_name').val(bank_name);
    $('#bank_address').val(bank_address);
    $('#bank_note').val(note);
    $('#school_bank_account-btn').prop("value", "update");
    $('#school_bank_account-btn > i,#school_bank_account-btn > span').html("update");
}

function delete_school_bank_account(id){
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_bank_accounts-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                $('#school_bank_accounts-output').html(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
}

function add_student_rights_information(el){
 var token = $("input[name='_token']").val();
 var id = $("#student_rights_information_id").val();
 var rights = $('#student_rights').val();
 var cmd = $(el).prop("value");
 var index = $('#student_rights_index').val();
 $.ajax({
    url: "{{route('school_student_rights-ajax')}}",
    method: "POST",
    data: {
        _token: token,
        id: id,
        index : index,
        school_id: school_id,
        rights : rights,
        cmd: cmd
    },
    success: function(data) {
        form_reset();
        console.log(data);
        $('#school_student_rights_information-output').html(data);
        $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});

}

function add_student_obligations_information(el){
 var token = $("input[name='_token']").val();
 var id = $("#student_obligations_information_id").val();
 var obligations = $('#student_obligations').val();
 var cmd = $(el).prop("value");
 var index = $('#student_obligations_index').val();
 $.ajax({
    url: "{{route('school_student_obligations-ajax')}}",
    method: "POST",
    data: {
        _token: token,
        id: id,
        index : index,
        school_id: school_id,
        obligations : obligations,
        cmd: cmd
    },
    success: function(data) {
        form_reset();
        $('#school_student_obligations_information-output').html(data);
        $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});
}

function edit_student_rights(id,school_id,rights,index){
    var arr_rights = rights.split('|');
    $('#student_rights').val(arr_rights[index]); 
    $("#student_rights_information_id").val(id);
    $('#student_rights_index').val(index);
    $('#student_rights_information-btn').prop("value", "update");
    $('#student_rights_information-btn > i,#student_rights_information-btn > span').html("update");
}
function edit_student_obligations(id,school_id,obligations,index){
    var arr_obligations = obligations.split('|');
    $('#student_obligations').val(arr_obligations[index]); 
    $("#student_obligations_information_id").val(id);
    $('#student_obligations_index').val(index);
    $('#student_obligations_information-btn').prop("value", "update");
    $('#student_obligations_information-btn > i,#student_obligations_information-btn > span').html("update");
}

function delete_student_rights(id,school_id,rights,index){
    var arr_rights = rights.split('|');
    arr_rights.splice(index,1);
    arr_rights = arr_rights.join('|');
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_student_rights-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id: school_id,
            rights : arr_rights,
            cmd: "delete"
        },
        success: function(data) {
            form_reset();
            $('#school_student_rights_information-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function delete_student_obligations(id,school_id,obligations,index){
    var arr_obligations = obligations.split('|');
    arr_obligations.splice(index,1);
    arr_obligations = arr_obligations.join('|');
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_student_obligations-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id: school_id,
            obligations : arr_obligations,
            cmd: "delete"
        },
        success: function(data) {
            form_reset();
            $('#school_student_obligations_information-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });

}

function open_school_promo_programs(){

    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_has_program-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {

            //$('#school_intake_course').html(data);
            //$('#school_intake_course').refreshOptions();
            var data = JSON.parse(data);
            var $select = $('#school_promo_program').selectize();
            var selectize = $select[0].selectize;
            selectize.clearOptions();
            $.each(data,function(k,v){
               selectize.addOption({value : v.id,text : v.name});
           });
            selectize.refreshOptions();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function open_school_promo(){
    $('.loading-wrapper').show();
    open_school_promo_programs();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_promo-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {
            $('#school_promo-output').html(data);
            $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}


function edit_school_promo(id,name,type,program_id,special_offer,total_offer,intake,term_and_conditions,date_terminated) { 
    $('#school_promo_id').val(id);
    $('#school_promo_type').val(type);
    $('#school_promo_type').selectpicker('refresh');
    $('#school_promo_name').val(name);
    var $select = $('#school_promo_program').selectize();
    var selectize = $select[0].selectize;
    selectize.setValue(program_id);

    $('#school_special_offer').val(special_offer);
    $('#school_total_offer').val(total_offer);
    $('#school_promo_intake').val(intake);
    term_and_conditions = decodeURI(term_and_conditions); 
    $('#school_promo_term_conditions').val(term_and_conditions);
    $('#school_dater_terminated').val(date_terminated);
    $('#school_promo-btn').prop("value", "update");
    $('#school_promo-btn > i,#school_promo-btn > span').html("update");
}


function delete_school_promo(id){
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_promo-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                $('#school_promo-output').html(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
}

function add_school_promo(el){
    var token = $("input[name='_token']").val();
    var id = $("#school_promo_id").val();
    var name = $("#school_promo_name").val();
    var type = $('#school_promo_type').val();
    var program_id = $('#school_promo_program').val();
    var special_offer = $('#school_special_offer').val();
    var total_offer = $('#school_total_offer').val();
    var intake = $('#school_promo_intake').val();
    var term_and_conditions = $('#school_promo_term_conditions').val();
    term_and_conditions = encodeURI(term_and_conditions);
    var date_terminated = $('#school_date_terminated').val();
    var cmd = $(el).prop("value");
    $.ajax({
        url: "{{route('school_promo-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id : school_id,
            name : name,
            type : type,
            program_id: program_id,
            special_offer : special_offer,
            total_offer : total_offer,
            intake : intake,
            term_and_conditions : term_and_conditions,
            date_terminated : date_terminated,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            $('#school_promo_type').val('');
            $('#school_promo_type').selectpicker('refresh');
           // $('#school_time_table_program').val('');
      //  $('#school_time_table_program').selectpicker('refresh');
      var $select = $('#school_promo_program').selectize();
      var selectize = $select[0].selectize;
      selectize.setValue('');
      $('#school_promo-output').html(data);
  },
  error: function(request, status, error) {
    alert(request.responseText);
}
});
}


function add_school_time_table(el){
    var token = $("input[name='_token']").val();
    var id = $("#school_time_table_id").val();
    var type_id = $('#school_time_table_type').val();
    var program_id = $('#school_time_table_program').val();
    var days = $('#school_time_table_days').val();
    var time = $('#school_time_table_time').val();
    var cmd = $(el).prop("value");
    $.ajax({
        url: "{{route('school_time_table-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id: school_id,
            program_id: program_id,
            type_id : type_id,
            days : days,
            time : time,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            $('#school_time_table_type').val('');
            $('#school_time_table_type').selectpicker('refresh');
           // $('#school_time_table_program').val('');
      //  $('#school_time_table_program').selectpicker('refresh');
      var $select = $('#school_time_table_program').selectize();
      var selectize = $select[0].selectize;
      selectize.setValue('');
      $('#school_time_table-output').html(data);
  },
  error: function(request, status, error) {
    alert(request.responseText);
}
});
}

function edit_school_time_table(id,type_id,program_id,days,time) { 
    $('#school_time_table_id').val(id);
    $('#school_time_table_type').val(type_id);
    $('#school_time_table_type').selectpicker('refresh');
   // $('#school_time_table_program').val(program_id);
  //  $('#school_time_table_program').selectpicker('refresh');
  var $select = $('#school_time_table_program').selectize();
  var selectize = $select[0].selectize;
  selectize.setValue(program_id);

  $('#school_time_table_days').val(days);
  $('#school_time_table_time').val(time);
  $('#school_time_table-btn').prop("value", "update");
  $('#school_time_table-btn > i,#school_time_table-btn > span').html("update");
}

function delete_school_time_table(id){
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_time_table-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                form_reset();
                $('#school_time_table_type').val('');
                $('#school_time_table_type').selectpicker('refresh');
                var $select = $('#school_time_table_program').selectize();
                var selectize = $select[0].selectize;
                selectize.setValue('');
          //  $('#school_time_table_program').val('');
        //$('#school_time_table_program').selectpicker('refresh');
        $('#school_time_table-output').html(data);
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});
    }
}
function open_school_time_table_type(){
  var token = $("input[name='_token']").val();
  $.ajax({
    url: "{{route('school_time_table_type-ajax')}}",
    method: "POST",
    data: {
        _token: token,
        school_id: school_id,
    },
    success: function(data) {
        var arr_data = data.split('##');
        $('#school_time_table_type-output').html(arr_data[0]);
        $('#school_time_table_type').html(arr_data[1]);
        $('#school_time_table_type').selectpicker('refresh');
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});
}
function add_school_time_table_type(el){
    var token = $("input[name='_token']").val();
    var id = $("#time_table_type_id").val();
    var name = $('#time_table_type').val();
    var cmd = $(el).prop("value");
    $.ajax({
        url: "{{route('school_time_table_type-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id: school_id,
            name : name,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            var arr_data = data.split('##');
            $('#school_time_table_type-output').html(arr_data[0]);
            $('#school_time_table_type').html(arr_data[1]);
            $('#school_time_table_type').selectpicker('refresh');
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function edit_school_time_table_type(id,name) { 
    $('#time_table_type_id').val(id);
    $('#time_table_type').val(name);
    $('#school_time_table_type-btn').prop("value", "update");
    $('#school_time_table_type-btn > i,#school_time_table_type-btn > span').html("update");
}

function delete_school_time_table_type(id) {
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_time_table_type-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
              form_reset();
              var arr_data = data.split('##');
              $('#school_time_table_type-output').html(arr_data[0]);
              $('#school_time_table_type').html(arr_data[1]);
              $('#school_time_table_type').selectpicker('refresh');
          },
          error: function(request, status, error) {
            alert(request.responseText);
        }
    });
    }
}

function open_school_term(){
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{route('school_term-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            school_id: school_id,
        },
        success: function(data) {

          var arr_data = data.split('##');
          $('#school_term-output').html(arr_data[0]);
          $('#school_intake_term_id').html(arr_data[1]);
          $('#school_intake_term_id').selectpicker('refresh');
          $('.loading-wrapper').hide();
      },
      error: function(request, status, error) {
        alert(request.responseText);
    }
});
}
function add_school_term(el){
    var token = $("input[name='_token']").val();
    var id = $("#school_term_id").val();
    var term = $('#school_term').val();
    var duration = $('#school_term_duration').val();
    var term_start_date = $('#school_term_start_date').val();
    var term_end_date = $('#school_term_end_date').val();
    var cmd = $(el).prop("value");
    $.ajax({
        url: "{{route('school_term-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            school_id: school_id,
            term : term,
            duration : duration,
            term_start_date : term_start_date,
            term_end_date : term_end_date,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            var arr_data = data.split('##');
            $('#school_term-output').html(arr_data[0]);
            $('#school_intake_term_id').html(arr_data[1]);
            $('#school_intake_term_id').selectpicker('refresh');
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function edit_school_term(id,term,duration,term_start_date,term_end_date) {

    $('#school_term_id').val(id);
    $('#school_term').val(term);
    $('#school_term_duration').val(duration);
    $('#school_term_start_date').val(term_start_date);
    $('#school_term_end_date').val(term_end_date);
    $('#school_term-btn').prop("value", "update");
    $('#school_term-btn > i,#school_term-btn > span').html("update");
}

function delete_school_term(id) {
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_term-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                form_reset();
                var arr_data = data.split('##');
                $('#school_term-output').html(arr_data[0]);
                $('#school_intake_term_id').html(arr_data[1]);
                $('#school_intake_term_id').selectpicker('refresh');
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
}
var intake_programs = [];
function add_school_intake(el){
    var token = $("input[name='_token']").val();
    var id = $("#school_intake_id").val();
    var term_id = $('#school_intake_term_id').val();
    var intake_date = $('#school_intake_intake_date').val();
    var orientation_date = $('#school_intake_orientation_date').val();
    var note = $('#school_intake_note').val();
    var cmd = $(el).prop("value");
    $("input:checkbox[name=school_intake_programs]:checked").each(function(){
    intake_programs.push($(this).val());
    });
    console.log(intake_programs);
    $.ajax({
        url: "{{route('school_intake-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            term_id: term_id,
            program_id:intake_programs,
            intake_date:intake_date,
            orientation_date : orientation_date,
            school_id: school_id,
            note: note,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            intake_programs = [];
            $('#school_intake_term_id').val('');
            $('#school_intake_term_id').selectpicker('refresh');

            //$('#school_intake_course').val('');
            //$('#school_intake_course').selectpicker('refresh');
            var $select = $('#school_intake_course').selectize();
            var selectize = $select[0].selectize;
            selectize.setValue('');
            $('#school_intake-output').html(data);
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
    
}
function edit_school_intake(id,term_id,intake_date,orientation_date,note,programs) {
    $('#school_intake_id').val(id);
    $('#school_intake_term_id').val(term_id);
    $('#school_intake_term_id').selectpicker('refresh');
    $('#school_intake_intake_date').val(intake_date);
    $('#school_intake_orientation_date').val(orientation_date);
    var txt = document.createElement('textarea');
    txt.innerHTML = note;
    var $select = $('#school_intake_course').selectize();
    var selectize = $select[0].selectize;
    selectize.setValue("null");
    //intake_programs = JSON.parse(programs);
    programs = JSON.parse(programs);
    $.each(programs,function(k,program){
        console.log(program);
        if(program.program_id != null){
             $('#school_intake_program'+program.program_id).prop("checked",true);    
            intake_programs.push(program);
        }
    });
    console.log(intake_programs);
    $('#school_intake_note').val(txt.value);
    $('#school_intake-btn').prop("value", "update");
    $('#school_intake-btn > i,#school_intake-btn > span').html("update");
}

function delete_school_intake(id,intake_programs) {
    intake_programs = JSON.parse(intake_programs);
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_intake-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                intake_programs : intake_programs,
                cmd: cmd
            },
            success: function(data) {
                form_reset(); 
                intake_programs = [];
                
            var $select = $('#school_intake_course').selectize();
            var selectize = $select[0].selectize;
            selectize.setValue('');
            $('#school_intake_term_id').val('');
            $('#school_intake_term_id').selectpicker('refresh');
            $('#school_intake-output').html(data);
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
    }
}
function add_school_refund(el){
 var token = $("input[name='_token']").val();
 var id = $("#school_refund_id").val();
 var name = $('#school_refund_name').val();
 var total_refund = $('#total_refund').val();
 var cek_refund;
 if(document.getElementById('cek_refund').checked == true)
 {
    cek_refund = 1;
}else{
    cek_refund = 0;
}
var details = $('#school_refund_details').val();
details = encodeURI(details);
var cmd = $(el).prop("value");
$.ajax({
    url: "{{route('school_refund-ajax')}}",
    method: "POST",
    data: {
        _token: token,
        id: id,
        name: name,
        details: details,
        total_refund:total_refund,
        cek_refund : cek_refund,
        school_id: school_id,
        cmd: cmd
    },
    success: function(data) {
        form_reset();
        $('#school_refund-output').html(data);
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});
}
function edit_school_refund(id, name,refund_total,refund_persen,details) {
    $('#school_refund_id').val(id);
    $('#school_refund_name').val(name);
    var total_refund
    if(refund_total != ""){
        total_refund = refund_total;
    }else{
        total_refund = refund_persen;
        document.getElementById('cek_refund').checked = true;
    }
    $('#total_refund').val(total_refund);
    $('#school_refund_details').val(decodeURI(details));
    $('#school_refund-btn').prop("value", "update");
    $('#school_refund-btn > i,#school_refund-btn > span').html("update");
}

function delete_school_refund(id) {
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_refund-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                form_reset();
                $('#school_refund-output').html(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
}
function add_other_fee(el) {
    var token = $("input[name='_token']").val();
    var id = $("#other_fee_id").val();
    var name = $('#other_fee_name').val();
    var fee = $('#other_fee').val();
    var details = $('#other_fee_details').val();
    details = encodeURI(details);
    var cmd = $(el).prop("value");
    $.ajax({
        url: "{{route('school_other_fees-ajax')}}",
        method: "POST",
        data: {
            _token: token,
            id: id,
            name: name,
            details: details,
            fee:fee,
            school_id: school_id,
            cmd: cmd
        },
        success: function(data) {
            form_reset();
            $('#other_fees-output').html(data);
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function edit_other_fee(id, name,fee,details) {
    $('#other_fee_id').val(id);
    $('#other_fee_name').val(name);
    $('#other_fee').val(fee);
    $('#other_fee_details').val(decodeURI(details));
    $('#other_fee-btn').prop("value", "update");
    $('#other_fee-btn > i,#other_fee-btn > span').html("update");
}

function delete_other_fee(id) {
    if(confirm('Are you sure want to delete this data ?') == true){
        var token = $("input[name='_token']").val();
        var cmd = "delete";
        $.ajax({
            url: "{{route('school_other_fees-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                form_reset();
                $('#other_fees-output').html(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
}

function once(fn, context) {
        //fn tuh isinye function dpt dr fungsi sblmnye
        var result;

        return function() {
            if (fn) {
                // kalau functionnya fn true
                result = fn.apply(context || this, arguments);
                fn = null;
                //fnnye di ubah jd null maka dari itu niali fn diatas bkln selalu false karena null = false
            }
            return result;
        };

    }

    // function ini sendiri dimasukan ke once
    var contactsOnce = once(function() {

        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{route('contact_division-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                school_id: school_id,
            },
            success: function(data) {
                $('#contact_division-output').html(data);

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });

    });

    function add_contact(el) {
        var token = $("input[name='_token']").val();
        var id = $("#contact_id").val();

        var division_id = $("#contact_division").val();
        var name = $('#contact_name').val();
        var email = $('#contact_email').val();
        var phone_number = $('#contact_phone_number').val();
        var skype_id = $('#contact_skype_id').val();
        var cmd = $(el).prop("value");
        $.ajax({
            url: "{{route('school_contact-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                division_id: division_id,
                name: name,
                email: email,
                phone_number: phone_number,
                skype_id: skype_id,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                form_reset();
                $('#contacts-output').html(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function edit_contact(id, division_id, name, email, phone_number, skype_id) {
        $('#contact_id').val(id);
        $('#contact_name').val(name);
        $('#contact_email').val(email);
        $('#contact_division').val(division_id);
        $('#contact_phone_number').val(phone_number);
        $('#contact_skype_id').val(skype_id);
        $('#contact-btn').prop("value", "update");
        $('#contact-btn > i,#contact-btn > span').html("update");
    }

    function delete_contact(id) {
        if(confirm('Are you sure want to delete this data ?') == true){
            var token = $("input[name='_token']").val();
            var cmd = "delete";
            $.ajax({
                url: "{{route('school_contact-ajax')}}",
                method: "POST",
                data: {
                    _token: token,
                    id: id,
                    school_id: school_id,
                    cmd: cmd
                },
                success: function(data) {
                    form_reset();
                    $('#contacts-output').html(data);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function add_division(el) {
        var token = $("input[name='_token']").val();
        var id = $("#division_id").val();
        var name = $('#division_name').val();
        var cmd = $(el).prop("value");
        $.ajax({
            url: "{{route('school_division-ajax')}}",
            method: "POST",
            data: {
                _token: token,
                id: id,
                name: name,
                school_id: school_id,
                cmd: cmd
            },
            success: function(data) {
                form_reset();
                $('#divisions-output').html(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function edit_division(id, name) {
        $('#division_id').val(id);
        $('#division_name').val(name);
        $('#division-btn').prop("value", "update");
        $('#division-btn > i,#division-btn > span').html("update");
    }

    function delete_division(id) {
        if(confirm('Are you sure want to delete this data ?') == true){
            var token = $("input[name='_token']").val();
            var cmd = "delete";
            $.ajax({
                url: "{{route('school_division-ajax')}}",
                method: "POST",
                data: {
                    _token: token,
                    id: id,
                    school_id: school_id,
                    cmd: cmd
                },
                success: function(data) {
                    form_reset();
                    $('#divisions-output').html(data);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function form_reset() {
        document.getElementById('form-input').reset();
        $('.btn-add').prop("value", "add");
        $('.btn-add > i,.btn-add > span').html("add");
    }

    (function() {
        function logElementEvent(eventName, element) {
            console.log(
                Date.now(),
                eventName,
                element.getAttribute("data-src")
                );
        }
        var callback_enter = function(element) {
            logElementEvent("🔑 ENTERED", element);
        };
        var callback_exit = function(element) {
            logElementEvent("🚪 EXITED", element);
        };
        var callback_reveal = function(element) {
            logElementEvent("👁️ REVEALED", element);
        };
        var callback_loaded = function(element) {
            $(element).addClass('scale-up-center');
            logElementEvent("👍 LOADED", element);
        };
        var callback_error = function(element) {
            logElementEvent("💀 ERROR", element);
            element.src =
            "https://via.placeholder.com/440x560/?text=Error+Placeholder";
        };
        var callback_finish = function() {
            logElementEvent("✔️ FINISHED", document.documentElement);
        };
        var ll = new LazyLoad({
            elements_selector: ".lazy",
            // Assign the callbacks defined above
            callback_enter: callback_enter,
            callback_exit: callback_exit,
            callback_reveal: callback_reveal,
            callback_loaded: callback_loaded,
            callback_error: callback_error,
            callback_finish: callback_finish
        });
    })();
</script>
@endpush
