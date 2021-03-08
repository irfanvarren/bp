@extends('layouts.bp_wo_sidenav')
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="col-md-12 card">
            <div class="card-body">
              <div class="form-group row">
                <h4><strong>About School</strong></h4>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Institution's Name* :</label>

                  <div class="col-md-9">

                    <input type="text" class="form-control" name="institution_name" required placeholder="Institution Name" value="">
                  </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Principal's Name* :</label>
                <div class="col-md-9">

                  <input type="text" name="principal_name" class="form-control" required placeholder="Principal's Name" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Email's Address* :</label>
                <div class="col-md-9">

                  <input type="text" name="email" class="form-control" required placeholder="Email" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Address* :</label>
                <div class="col-md-9">

                  <textarea name="address" class="form-control" required placeholder="Address" value="" row="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Country :</label>
                <div class="col-md-9">

                  <input type="text" name="country" class="form-control"  required placeholder="Country" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Year Of Establishment* :</label>
                <div class="col-md-9">

                  <input type="text" name="year_of_establishment" class=" form-control" required placeholder="Year Of Establishment" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Telephone (primary)* :</label>
                <div class="col-md-9">

                  <input type="text" name="telephone" class="form-control" required value="" placeholder="Telephone (primary)">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Fax : </label>
                <div class="col-md-9">

                  <input type="text" name="fax" class="form-control" required value="" placeholder="Fax">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Skype :</label>
                <div class="col-md-9">

                  <input type="text" name="skype" class="form-control" required placeholder="Skype" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Total Program / <br> Courses* : </label>
                <div class="col-md-9">
                  <input type="text" name="total_program" class="form-control" required placeholder="Total Program / Courses" value="">

                </div>

              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-right">Name of The Program <br> / Course* : </label>
                <div class="col-md-9">
                  <div class="more_course_name">

                  </div>
                  <div class="form-group row">
                    <div class="col-md-10" style="padding-right:0;">
                          <input type="text" name="course_name[]" class="form-control" required placeholder="Program / Course" value="">

                    </div>
                    <div class="col-md-2" >
                      <button type="button" class="btn btn-secondary col-md-12" onclick="add_course_name()" name="button"><i class="fa fa-plus"></i> </button>
                    </div>
                  </div>

                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Bank Name :</label>
                  <div class="col-md-9">
                    <input type="text" placeholder="Bank Name" class="form-control" name="bank_name" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Account Name* :</label>
                  <div class="col-md-9">
                    <input type="text" name="account_name" placeholder="Account Name" class="form-control" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Bank Account Number* :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="bank_account_number" placeholder="Bank Account Number" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Swift Code* :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="swift_code" placeholder="Swift Code" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Branch Name* :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="branch_namer" placeholder="Branch Name" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Branch Address* :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="branch_address" placeholder="Branch Address" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">BSB Number* :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="bsb_number" placeholder="BSB Number" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <h4><strong>Contact Information</strong></h4>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Primary Contact <br> Number* :</label>
                  <div class="col-md-9">
                    <input type="text" name="primary_contact" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Primary Email <br> Address* :</label>
                  <div class="col-md-9">
                    <input type="text" name="primary_email" class="form-control" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Finance* :</label>
                  <div class="col-md-9">
                    <input type="text" name="finance" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Email Address* :</label>
                  <div class="col-md-9">
                    <input type="text" name="email_finance" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Admission* :</label>
                  <div class="col-md-9">
                    <input type="text" name="admission" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Admission* :</label>
                  <div class="col-md-9">
                    <input type="text" name="email_admission" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Marketing* :</label>
                  <div class="col-md-9">
                    <input type="text" name="marketing" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Marketing* :</label>
                  <div class="col-md-9">
                    <input type="text" name="email_marketing" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <h4><strong>Indonesia Representative</strong></h4>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Representative Name* :</label>
                  <div class="col-md-9">
                    <input type="text" name="representative_name" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Email Address* :</label>
                  <div class="col-md-9">
                    <input type="text" name="email_representative" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Phone Number* :</label>
                  <div class="col-md-9">
                    <input type="text" name="phone_representative" required class="form-control" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="">
                    Please upload the photograph of the school rooms, laboratory, class, library and other facilities as for our marketing and promoting references
And please upload the school’s time table as well as the intake date for our academic references

                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Upload Photo* :</label>
                  <div class="col-md-9">
                    <input type="file" name="school_photos" multiple value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Upload Timetable & Intake* :</label>
                  <div class="col-md-9">
                    <input type="file" name="timetable_intake" multiple value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label text-right">Upload School/Institution Logo* :</label>
                  <div class="col-md-9">
                    <input type="file" name="school_logo" multiple value="">
                  </div>
                </div>
                <div class="form-group row">
                  <input type="submit" name="" value="Submit" class="btn btn-primary">
                </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
    function add_course_name(){
    $('.more_course_name').append(
    '<div class="form-group row"><div class="col-md-10" style="padding-right:0;"><input type="text" name="course_name[]" class="form-control" required placeholder="Program / Course" value=""></div><div class="col-md-2" style="padding-right:0;"></div>');
  }

  
</script>
@stop
