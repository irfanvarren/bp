@extends('layouts.bp_wo_sidenav')
<style media="screen">
.rating-wrapper{
  direction:rtl;
  unicode-bidi:bidi-override;
}
.rating-wrapper input:checked ~ label {
  color:#f7dc28;
}
.rating-wrapper input{
display:none;
}
  .questionnaire-option {
    display: block;
    margin: 0 auto !important;
  }

  .questionnaire-criteria {
    font-size: 13px;
    font-weight: bolder;
    text-align: center;
  }

  .qt-cell {
    min-height: 45px !important;
    display: flex;
    justify-content: center;
    flex-direction: column;
  }

  .form-check-inline {
    margin-right: 0 !important;
  }

  .questionnaire-table .qt-cell .form-check-label {
    display: none;
  }

  @media screen and (max-width:992px) {
    .questionnaire-option {
      margin: 0 5px 0 0 !important;
    }

    .questionnaire-table .qt-cell .form-check-label {
      display: block;
    }

    .qt-header {
      display: none !important;
    }
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-9">
        @if(session()->has('message'))
        <div class="alert alert-success" style="text-align:center">
          {!! session()->get('message') !!} <br>

          <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
        </div>
        @endif
        <form class="" id="myform" onsubmit="return check_rating()" action="form-kinerja-tutor" enctype="multipart/form-data" method="post">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="form-group row">
                <h3 class="col-md-12" style="text-align:center;">Form Survei Kinerja Tutor</h3>
                <span class="col-md-12">Peserta diharapkan mengisi daftar pertanyaan dan diharapkan untuk memberikan jawaban
                  dengan jujur. Berikan penilaian terhadap pengajar dengan kategori dibawah ini. Penilaian
                  anda akan sangat membantu untuk meningkatkan kualitas kinerja dan pelayanan.</span>

              </div>
              <div class="form-group row">
                <label class="col-md-12">Nama Murid*</label>
                <div class="col-md-6">
                  <input type="text" name="nama" required class="form-control"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12">Program Les*</label>
                <div class="col-md-6">
                  <select class="form-control" name="program_les">
                    <option value="">- Pilih Program -</option>

                    @foreach($course as $data_course)
                    <option value="{{$data_course->NAMA}} - {{$data_course->NAMA_LEVEL}}">{{$data_course->NAMA}} - {{$data_course->NAMA_LEVEL}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-12">Nama Tutor*</label>
                <div class="col-md-6">
                  <input type="text" name="nama_tutor" required class="form-control" value="">
                </div>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-12 col-form-label">Pertanyaan</label>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" style="overflow-x:auto;">

                      <div class="questionnaire-table">

                        <div class="row qt-header">
                          <div class="col-lg-6"></div>
                          <div class="col-lg-6">
                            <div class="row">
                              <div class="col-md-3 qt-cell">
                                <div class="row">

                                  <div class="questionnaire-criteria col-md-12">Tidak Pernah</div>
                                </div>
                              </div>
                              <div class="col-md-3 qt-cell">
                                <div class="row">


                                  <div class="questionnaire-criteria col-md-12">Jarang</div>
                                </div>
                              </div>
                              <div class="col-md-3 qt-cell">
                                <div class="row">

                                  <div class="questionnaire-criteria col-md-12">Pernah</div>
                                </div>
                              </div>
                              <div class="col-md-3 qt-cell">
                                <div class="row">

                                  <div class="questionnaire-criteria col-md-12">Selalu</div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Tutor datang tepat waktu</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_1" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_1" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_1" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_1" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 qt-cell">Menguasai Materi</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_2" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_2" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_2" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_2" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Menjelaskan materi dengan jelas</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_3" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_3" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_3" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_3" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Kesungguhan dalam menjadi siswa</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_4" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_4" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_4" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_4" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Sesi diskusi materi</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_5" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_5" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_5" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_5" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Memberikan komentar terhadap tugas dan ujian</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_6" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_6" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_6" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_6" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Terbuka terhadap opini siswa</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_7" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_7" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_7" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_7" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Peduli dengan pemahaman siswa</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_8" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_8" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_8" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_8" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Memperlakukan siswa dengan hormat</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_9" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_9" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_9" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_9" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Ketertarikan terhadap materi</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_10" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_10" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_10" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_10" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 qt-cell">Membawa suasana kelas</div>
                          <div class="col-lg-6">

                            <div class="row">
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_11" value="Tidak Pernah">
                                  <label for="" class="form-check-label">Tidak Pernah</label>
                                </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_11" value="Jarang"> <label for="" class="form-check-label">Jarang</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_11" value="Pernah"> <label for="" class="form-check-label">Pernah</label> </div>
                              </div>
                              <div class="col-sm-3 qt-cell">
                                <div class="form-check-inline">


                                  <input type="radio" class="questionnaire-option form-check-input" name="answer_11" value="Selalu"> <label for="" class="form-check-label">Selalu</label> </div>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12">Kelebihan dan kekurangan tutor? *</label>
                <div class="col-md-12">
                  <textarea name="kelebihan_kekurangan" required rows="5" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-12">Masukkan untuk meningkatkan kemampuan atau cara mengajar tutor *</label>
                <div class="col-md-12">
                  <textarea name="masukkan" required rows="5" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-md-12">Tanggapan anda mengenai lembaga ini *</label>
                <div class="col-md-12">
                  <textarea name="tanggapan" required rows="5" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12"> <b>Keseluruhan penilaian untuk tutor</b> </label>
                <div class="col-md-12 ">
                  <div class="col-md-12">


                  <div class="row">

                    <span>Worst</span>
                    <div class="rating-wrapper" style="margin:0 10px;">


                  <input type="radio" id="r4" name="rating" class="rating"  value="4">
                  <label for="r4"> <i class="fa fa-star"></i> </label>
                  <input type="radio" id="r3" name="rating" class="rating" value="3">
                  <label for="r3"> <i class="fa fa-star"></i> </label>
                  <input type="radio" id="r2" name="rating" class="rating" value="2">
                  <label for="r2"> <i class="fa fa-star"></i> </label>
                  <input type="radio" id="r1" name="rating" class="rating" value="1">
                    <label for="r1"> <i class="fa fa-star"></i> </label>
                            </div>
                    <span>Best</span>
    </div>
                    </div>
                  </div>

              </div>
              <div class="form-group row">
                <div class="col-md-12">

                  <input type="submit" name="" class="btn btn-primary" style="float:right;" required value="Submit">
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function close_alert() {
    $('.alert').hide();
  }
  function check_rating(){
    var rating = document.getElementsByClassName('rating');
    var length = rating.length;
    var cek = "false";
    for(var x=0;x<length;x++){
  //    alert(rating);
      if(rating[x].checked){
        cek="true";
        x==length;
        break;
      }
    }
    if(cek=="true"){
      return true;
    }else{
      alert('Anda belum memberikan rating untuk tutor');
      return false;
    }
  }
</script>
@stop
