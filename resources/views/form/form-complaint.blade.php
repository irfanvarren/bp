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
          <div class="col-md-7">

                <div class="col-md-12 card">
                    <div class=" card-body">
                      <form class="" id="myform" name="myform" action="{{url('form-complaint')}}"  enctype="multipart/form-data" method="post">
    @csrf
                        <div class="row">
                          <div class="col-md-12">

                            <h2 style='text-align:center;'>Form Keluhan (Complaint Form)</h2><br>

                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-12">
                            <h4>Informasi Pribadi (Personal Information)</h4>
                            <div class="col-md-12">
                              <ul>
                              <li>Silahkan lengkapi data pribadi anda dibawah ini</li>
                              <li>Please fill out your personal information below</li>
                            </ul>
                            </div>
                            

                          </div>

                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-12 col-form-label">Nama Lengkap  (Full Name):</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" name="nama" placeholder="Your full name" required value="">

                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-12 col-form-label">Alamat Email (Email Address) :</label>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" required placeholder="example@domain.com" value="">
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-12 col-form-label">Alamat Saat Ini (Current Address):</label>
                            <div class="col-md-12">
                                <input type="text" name="alamat" class="form-control" placeholder="Address.." value="">
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-12 col-form-label">Nomor Telepon / WA (Phone Number)</label>
                            <div class="col-md-4">
                              <input type="text" class="form-control" name="no_hp" placeholder="xxxx-xxxx-xxxx" required value="">

                            </div>
                        </div>

                        <div class="row form-group">
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
                        
                        <div class="row">
                          <div class="col-md-12">
                                  <br>
                              <h4>Tentang Keluhan (Complaint About)</h4>
                          </div>

                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-12 col-form-label">Perihal Keluhan (Complaint About): </label>
                            <div class="col-md-12">
                              <select type="text" name="perihal_keluhan" class="form-control" value="">
                                <option value="">- Pilih -</option>
                                <option value="finance@bestpartnereducation.com">Finance</option>
                                <option value="admission1@bestpartnereducation.com">Admission</option>
                                <option value="counselor2@bestpartnereducation.com">Marketing</option>
                              </select>
                            </div>
                        </div>


                        <div class="row form-group">
                            <label for="" class="col-md-12 col-form-label">Tanggal Keluhan (Complaint Date): </label>
                            <div class="col-md-12">
                              <input type="date" name="complaint_date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-12 col-form-label">Detail Keluhan (Complaint Detail)</label>
                            <div class="col-md-12">

                              <textarea name="complaint_detail" rows="4" class="form-control" placeholder="Please state the complaint clearly"></textarea>
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
    </script>
@endsection
