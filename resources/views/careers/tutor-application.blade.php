@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .form-check-label{
    margin-right:5px;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="container">
      <div class="row justify-content-center">
<div class="col-md-8">
        <div class="card">

          <div class="card-body">

            <form class="" enctype="multipart/form-data" action="{{url('careers/tutor/application')}}" method="post">
              @csrf
              <div class="form-group row">
                  <div class="col-md-12">
                      <h3>Personal Information</h3>
                      <p>Please put your personal information correctly based on the question given</p>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Name</label>
                  <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="nama_depan" placeholder="First Name" required value="">

                        </div>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="nama_belakang" placeholder="Last Name" value="">
                        </div>
                    </div>
                  </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"> Tempat Kelahiran </label>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kota" placeholder="Town / Reqion" required value="">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="provinsi" placeholder="Province" required value="">
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-label col-md-3">Tanggal Lahir</label>
                  <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-3">
                        <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" required>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                          <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required></p>

                        </div>
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-group">Religion</label>
                  <div class="col-md-9">
                      <select class="form-control" name="agama">
                        <option value=""> - Pilih Agama -</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen Protestan</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Address</label>
                  <div class="col-md-9">
                    <textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Nationality</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  name="kebangsaan" value="">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label"> Phone Number / WA</label>
                  <div class="col-md-9">
                      <input type="text" class="form-control" name="no_telepon" value="">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Email</label>
                  <div class="col-md-9">
                      <input type="email" name="email" class="form-control" required value="">
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-md-12">
                      <h3>Education Background</h3>
                      <p>Please give your detail information below</p>
                  </div>
              </div>
              <div class="form-group row">

                <div class="col-md-12">
                <b>High School</b>
                </div>
                <label class="col-md-3 col-form-label" for="">High School</label>
                <div class="col-md-9">
                    <input type="text" name="nama_sma" class="form-control" placeholder="High School's Name" required value="">
                </div>

              </div>
              <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                      <label for="" class="col-md-6 col-form-label">Year Attended</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="tahun_sma" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                      <label for="" class="col-md-6 col-form-label">Degree / Major</label>
                      <div class="col-md-6">
                          <input type="text" name="jurusan_sma" class="form-control" value="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 form-group-label">Graduated</label>
                <div class="col-md-9">
                  <div class="form-check-inline">

                  <input type="radio" class="form-check-input" name="lulus_sma" value="Iya"> <label class="form-check-label">Yes</label> <input type="radio" name="lulus_sma" class="form-check-input" value="Tidak"> <label class="form-check-label"> No</label>

                  </div>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                      <strong>Diploma / Bachelor Degree</strong>
                  </div>
              </div>
              <div class="form-group row">
                    <label for="" class="col-md-3">Diploma / Bachelor <br> Degree </label>
                    <div class="col-md-9">
                        <input type="text" name="nama_s1" class="form-control" placeholder="College / University's Name" value="">
                    </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                      <label for="" class="col-md-6 col-form-label">Year Attended</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="tahun_s1" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                      <label for="" class="col-md-6 col-form-label">Degree / Major</label>
                      <div class="col-md-6">
                          <input type="text" name="jurusan_s1" class="form-control" value="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 form-group-label">Graduated</label>
                <div class="col-md-9">
                  <div class="form-check-inline">

                  <input type="radio" class="form-check-input" name="lulus_s1" value="Iya"> <label class="form-check-label">Yes</label> <input type="radio" name="lulus_s1" class="form-check-input" value="Tidak"> <label class="form-check-label"> No</label>

                  </div>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                      <strong>Master Degree</strong>
                  </div>
              </div>
              <div class="form-group row">
                    <label for="" class="col-md-3">Master <br> Degree </label>
                    <div class="col-md-9">
                        <input type="text" name="nama_s2" class="form-control" placeholder="College / University's Name" value="">
                    </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                      <label for="" class="col-md-6 col-form-label">Year Attended</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="tahun_s2" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                      <label for="" class="col-md-6 col-form-label">Degree / Major</label>
                      <div class="col-md-6">
                          <input type="text" name="jurusan_s2" class="form-control" value="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 form-group-label">Graduated</label>
                <div class="col-md-9">
                  <div class="form-check-inline">

                  <input type="radio" class="form-check-input" name="lulus_s2" value="Iya"> <label class="form-check-label">Yes</label> <input type="radio" name="lulus_s2" class="form-check-input" value="Tidak"> <label class="form-check-label"> No</label>

                  </div>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                      <strong>Assosiate Degree</strong>
                  </div>
              </div>
              <div class="form-group row">
                    <label for="" class="col-md-3">Assosiate <br> Degree </label>
                    <div class="col-md-9">
                        <input type="text" name="nama_assosiate" class="form-control" placeholder="Course / Institution's Name" value="">
                    </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                      <label for="" class="col-md-6 col-form-label">Year Attended</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="tahun_assosiate" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                      <label for="" class="col-md-6 col-form-label">Degree / Major</label>
                      <div class="col-md-6">
                          <input type="text" name="jurusan_assosiate" class="form-control" value="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-3 form-group-label">Graduated</label>
                <div class="col-md-9">
                  <div class="form-check-inline">

                  <input type="radio" class="form-check-input" name="lulus_assosiate" value="Iya"> <label class="form-check-label">Yes</label> <input type="radio" name="lulus_assosiate" class="form-check-input" value="Tidak"> <label class="form-check-label"> No</label>

                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <h3>TEACHING EXPERIENCE</h3>
                  <p>Please include dates employed, Employer name, office address, Position, Salary, Supervisor&#39;s name and your reason for leaving.</p>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Most recent position</label>
                  <div class="col-md-9">
                    <textarea name="posisi_terakhir" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Second most recent position</label>
                  <div class="col-md-9">
                    <textarea name="posisi_terakhir_2" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Third most recent position</label>
                  <div class="col-md-9">
                    <textarea name="posisi_terakhir_3" rows="5" class="form-control"></textarea>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <h3>OTHER RELEVANT EXPERIENCE</h3>
                  <p>Please include dates employed, Employer name, office address, Position, Salary, Supervisor&#39;s name and your reason for leaving.</p>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Experience 1</label>
                  <div class="col-md-9">
                    <textarea name="pengalaman_sejenis_terakhir" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Experience 2</label>
                  <div class="col-md-9">
                    <textarea name="pengalaman_sejenis_2" rows="5" class="form-control"></textarea>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <h3>CONFERENCES AND SEMINARS</h3>
                  <p>Please provide the date and year of conferences or seminars, include the location and theme of Conferences and Seminars’ held.</p>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Conference and
Seminar 1</label>
                  <div class="col-md-9">
                    <textarea name="konferensi_seminar_1" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Conference and
Seminar 2</label>
                  <div class="col-md-9">
                    <textarea name="konferensi_seminar_2" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Conference and
Seminar 3</label>
                  <div class="col-md-9">
                    <textarea name="konferensi_seminar_3" rows="5" class="form-control"></textarea>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <h3>TRAINING AND WORKSHOP</h3>
                  <p>Please provide the date and year of the training and workshops, include the location and theme of training and workshops’ held</p>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Training and Workshop
1</label>
                  <div class="col-md-9">
                    <textarea name="training_workshop_1" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Training and Workshop
2</label>
                  <div class="col-md-9">
                    <textarea name="training_workshop_2" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Training and Workshop 3</label>
                  <div class="col-md-9">
                    <textarea name="training_workshop_3" rows="5" class="form-control"></textarea>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <h3>ORGANIZATIONAL EXPERIENCE</h3>
                  <p>Please provide the date and year of the organizational experiences</p>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Experience 1</label>
                  <div class="col-md-9">
                    <textarea name="pengalaman_organisasi_1" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-form-group col-md-3">Experience 2</label>
                  <div class="col-md-9">
                    <textarea name="pengalaman_organisasi_2" rows="5" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <b>In the field below, please respond to each of the following questions:</b>

                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">1. Why do you want to be a teacher for Best Partner Education?</label>
                <div class="col-md-12">
                  <textarea name="pertanyaan_1" rows="5" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">2. What experience do you have specific to the position you are applying for and how would you use that experience to be a success in Best Partner Education?</label>
                <div class="col-md-12">
                  <textarea name="pertanyaan_2" rows="5" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">
3. Describe your greatest accomplishments as an educator.
                </label>
                <div class="col-md-12">

                  <textarea name="Pertanyaan_3" rows="5" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Upload KTP</label>
                  <div class="col-md-9">
                    <input type="file" name="myfiles[]" value="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Upload Ijazah</label>
                  <div class="col-md-9">
                    <input type="file" name="myfiles[]" value="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">Upload Transkrip Nilai</label>
                  <div class="col-md-9">
                    <input type="file" name="myfiles[]" value="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="" class="col-md-3 col-form-label">IELTS / TOEFL Class</label>
                  <div class="col-md-9">
                    <input type="file" name="myfiles[]" value="" required>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">

                <input type="submit" name="" class="btn btn-primary" value="Submit">

              </div>
              </div>
            </form>
          </div>

        </div>
        </div>

      </div>
  </div>
</div>
@stop
