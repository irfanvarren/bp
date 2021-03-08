@extends('layouts.bp_wo_sidenav')
@section('content')
<div class="col-md-12 content-wrapper">

  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="col-md-12 card">
          <div class=" card-body">
            <form class="" id="myform" name="myform" action="{{url('form-data-student/australia')}}"  enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                <div class="col-md-12">

                  <h2>Form Data Student Australia</h2> <br>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <h3>Biodata</h3>
                </div>
                <label for="" class="col-md-12 col-form-label">Full Name</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="nama_lengkap" placeholder="Full Name" required value="">

                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-12 col-form-label">Email</label>
                <div class="col-md-12">
                  <input type="email" name="email" class="form-control" required placeholder="Email" value="">
                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-12 col-form-label">Moblie Number</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="no_hp_ausie" placeholder="Mobile Number" required value="">

                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-12 col-form-label"> Address</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="address" placeholder="Level 5, 33 - 35 Randle St">
                </div>
              </div>
              <div class="row form-group">
               <div class="col-md-4">
                <label class="col-form-label">Suburb</label>
                 <textarea name="suburb" rows="2"  class="form-control" placeholder="Sydney"></textarea>
               </div>
               <div class="col-md-4">
                  <label class="col-form-label">Post Code</label>
                 <textarea name="post_code" rows="2"  class="form-control" placeholder="2000"></textarea>
               </div>
               <div class="col-md-4">
                  <label class="col-form-label">State</label>
                  <select class="form-control" name="state">
                    <option value="">- Select State -</option>
                    <option value="ACT">ACT</option>
                    <option value="SA">SA</option>
                    <option value="NSW">NSW</option>
                    <option value="TAS">TAS</option>
                    <option value="QLD">QLD</option>
                    <option value="WA">WA</option>
                    <option value="NT">NT</option>
                  </select>
               </div>
             </div>

             <div class="row form-group">
              <label for="" class="col-md-12 col-form-label"> <label style="float:left;margin-right:20px;">Kode TFN (9 digit)</label>
              <div class="form-check-inline" style="float:left;"> 
                 <input type="checkbox" class="form-check-input" id="check-kode-tfn" name=""> <label class="form-check-label"> Not receive yet ?</label>
               </div>
                </label>
              <div class="col-md-12">
                
                <input type="text" class="form-control" name="kode_tfn" pattern="[0-9]{9}" id="kode-tfn" required value="">

              </div>
            </div>


            <div class="row form-group">
              <div class="col-md-12">
                <br>
                <h3 >Bank Account</h3>
              </div>
              <label for="" class="col-md-12 col-form-label">Account Name*</label>
              <div class="col-md-12">
                <input type="text" class="form-control" name="account_name" required placeholder="Account Name" value="">
              </div>
            </div>
            <div class="row form-group">

              <label for="" class="col-md-12 col-form-label">Account Number*</label>

              <div class="col-md-12">
                <input type="text" class="form-control" name="account_number" required placeholder="Account Number" value="">
              </div>

            </div>
            <div class="row form-group">

              <label for="" class="col-md-12 col-form-label">Bank Name*</label>

              <div class="col-md-12">
                <input type="text" class="form-control" name="bank_name" required>

              </div>
            </div>
            <div class="row form-group">

              <label for="" class="col-md-12 col-form-label">BSB*</label>

              <div class="col-md-12">
                <input type="text" class="form-control" name="bsb" required placeholder="BSB" value="">
              </div>

            </div>

                      <!--  <div class="row form-group">
                          <div class="col-md-12">


                          <input type="checkbox"  name="agree" id="agree" value="" required> &nbsp; Dengan ini menyatakan bahwa saya telah membaca dan menyetujui syarat dan ketentuan yang berlaku di Best Partner Education. *
                              </div>
                            </div>-->


                            <div class="form-group row">
                              <div class="col-md-12">
                                <input type="submit" name="" id="submit" enabled class="btn btn-primary" value="Submit">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
                function close_alert() {
                  $('.alert').hide();
                }
                $('#check-kode-tfn').on('change',function(){
                  if($(this).prop('checked') == true){
                    $('#kode-tfn').prop('disabled',true);
                  }else{
                    $('#kode-tfn').prop('disabled',false);
                  }
                });
              </script>
              @endsection
