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
                      <form class="" id="myform" name="myform" action="{{url('form-reservasi-janji-temu')}}"  enctype="multipart/form-data" method="post">
    @csrf
                        <div class="row">
                          <div class="col-md-12">

                            <h2>Form Reservasi Janji Temu</h2> <br>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-12">

                          <h4> <strong>Kapan anda ingin bertemu dengan kami?</strong> </h4>
                          <p>Pilih Tanggal dan Jam yang anda inginkan dan kami berusaha untuk memenuhi permintaan Anda</p>

                        </div>
                            <label for="" class="col-md-3 col-form-label">Tanggal :</label>
                            <div class="col-md-9">
                              <input type="date" class="form-control" name="tanggal" required value="">

                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Tanggal Lainnya :</label>
                            <div class="col-md-9">
                                <input type="date" name="tanggal_lainnya" class="form-control"  value="">
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Jam</label>
                            <div class="col-md-9">
                              <input type="time" class="form-control" min="08:00" max="16:00" name="jam" required value="">

                              <div class="">
                                Format = hh:mm AM/PM or hh:mm (berdasarkan settingan waktu anda)
                              </div>
                            </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-12">
                            <h4><strong>Apa Kebutuhan Anda untuk mengunjungi kami?</strong> </h4>
                          </div>

                            <label for="" class="col-md-3 col-form-label">Tujuan Janji Temu :</label>
                            <div class="col-md-9">
                                <textarea name="tujuan" rows="2"  class="form-control" placeholder="Janji Temu" required></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-12">
                            <h4> <strong>Cabang mana yang ingin anda kunjungin</strong> </h4>
                          </div>
                          <label for="" class="col-md-3 col-form-label"> Pilih Cabang : </label>
                            <div class="col-md-9">
                                <select class="form-control" name="cabang" required>
                                  <option value="">Pilih Salah Satu</option>
                                  <option value="Pontianak">Pontianak</option>
                                  <option value="Singkawang">Singkawang</option>
                                </select>
                            </div>
                        </div>


                        <div class="row form-group">
                          <div class="col-md-12">
                              <h4> <strong>Dengan siapa anda ingin bertemu ?</strong> </h4>
                          </div>
                            <label for="" class="col-md-3 col-form-label">Staff :</label>
                            <div class="col-md-9">
                              <select class="form-control" name="staff">
                                <option value="">- Pilih Nama Staff -</option>
                                <option value="Gerald Tan#director@bestpartnereducation.com">Gerald Tan (Pontianak)</option>
                                <option value="Josephine Mayandra#counselor1@bestpartnereducation.com">Josephine Mayandra (Pontianak)</option>
                                <option value="Yeran Hasna Dinastia#counselor2@bestpartnereducation.com">Yeran Hasna Dinastia (Pontianak)</option>
                                <option value="Vindri Hardiyanti#counselor1-skw@bestpartnereducation.com">Vindri Hardiyanti (Singkawang)</option>
                              </select>
                            </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-form-label col-md-3">Catatan Tambahan :</label>
                          <div class="col-md-9">
                            <textarea name="catatan" rows="2" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <h4> <strong>Data Pribadi Anda</strong> </h4>
                            </div>
                            <label for="" class="col-md-3 col-form-label">Nama</label>

                                  <div class="col-md-9">
                                    <input type="text" name="nama" class="form-control" required placeholder="Nama Lengkap Anda" value="">
                                  </div>

                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">No Handphone / WA</label>

                                  <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_hp" required>

                        </div>
                      </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Email</label>

                                  <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" required placeholder="Alamat Email Aktif Anda" value="">
                                  </div>
                              <div class="col-md-12">
                                Kami tidak akan memberitahukan alamat surel elektronik anda kepada siapapun atau mengirimkan email yang tidak diinginkan
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
