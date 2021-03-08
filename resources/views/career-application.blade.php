@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .add-skills{
    background:none;
    border-radius:50%;
    font-size:16px;
    width:25px;
    color:white;
    border:none;
    font-weight:lighter;
    height:25px;
    margin-right:30px;
    padding:5px;
    float:right;
    background-color:#1f62bf;
  }

  .language-list,.other-skills{
    list-style-position:inside;
  }
  .language-list input,.language-list textarea ,.other-skills-list input,.other-skills-list textarea{
    width:88%;
    margin-bottom:1rem;
  }

  .language-list li,  .other-skills-list li{
    float:left;
    padding:6px 0;
    height:calc(1.5em + .75rem + 2px);
    clear:both;
    margin-right:5px;
    word-break:break-all;
  }
  .content-wrapper{
    padding:20px 60px !important;
  }
  @media screen and (max-width:480px){
    .language-list input,.language-list textarea ,.other-skills-list input,.other-skills-list textarea{
      width:92% !important;
    }
    .add-skills{
      margin-right:5px;
    }
  }
</style>
@section('content')
<div class="col-sm-12 content-wrapper">
  @if(session()->has('message'))

  <div class="alert alert-success" style="text-align:center;margin-top:15px;">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="$('.alert').hide()" name="button">Ok</button>
  </div>
  @endif
  <form enctype="multipart/form-data" class="" action="{{url('careers/application')}}" method="post">
    @csrf
    <input type="hidden" name="id_perusahaan" value="{{isset($id_perusahaan) ? $id_perusahaan : ''}}">
    <div class="col-sm-12">
      <div class="row">

        <div class="col-sm-12"><h2>Pilih Cabang Kantor</h2></div>
        <div class="col-sm-12 mb-3">
          <div class="row">
            <div class="col-sm-3">
              <select class="form-control" name="id_perusahaan">
                <option value=""> - Pilih Kantor Cabang -</option>
                @foreach($companies as $company)
                <option value="{{$company->KD}}">{{$company->NAMA}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-sm-12">
          <h2>Curriculum Vitae</h2>
        </div>

      </div>
      <div class="row">

        <p class="col-sm-12">
          <input type="text" class="form-control" name="nama" placeholder="Nama" value="">
        </p>

      </div>
      <div class="row">


        <div class="col-sm-6">
          <div class="row">
            <p class="col-sm-12">About Me</p>
            <p class="col-sm-12">
              <textarea name="about" style="height:145px;" placeholder="About Me..." class="form-control"></textarea></p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <p class="col-sm-12">Contact</p>
              <p class="col-sm-12">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="">
              </p>
              <p class="col-sm-12">
                <input type="email" name="email" class="form-control" placeholder="Email" value="">
              </p>
              <p class="col-sm-12">
                <input type="no_telepon" name="no_telepon" class="form-control" placeholder="No Telepon" pattern="[0-9]{10,13}" value="">
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">

            <p>      <h3>Pendidikan</h3></p>
            <p>SD :</p>
            <p><input type="text" name="sd" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
            <p>SMP :</p>
            <p> <input type="text" name="smp" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
            <p>SMA / Sederajat :</p>
            <p> <input type="text" name="sma" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
            <p>Universitas :</p>
            <p> <input type="text" name="universitas" class="form-control" placeholder="Nama Sekolah..." value=""> </p>
          </div>
          <div class="col-sm-4">
            <p>
              <h3>Keahlian</h3></p>
              <p>Bahasa :  <button type="button" class="add-skills" onclick="add_skills()" name="button"><i class="fa fa-plus"></i></button>
              </p>
              <div class="language-skills">
                <ol class="language-list" >
                  <li></li><input type="text" class="form-control" name="keahlian_bahasa[]" value="">
                </ol>
              </div>
              <p>Keahlian Lainnya :  <button type="button" class="add-skills" onclick="add_other_skills()" name="button"><i class="fa fa-plus"></i></button>
              </p>
              <div class="other-skills">
                <ol class="other-skills-list" >
                  <li></li><textarea class="form-control" rows="2" name="keahlian_lainnya[]" value=""></textarea>
                </ol>
              </div>
            </div>
            <div class="col-sm-4">
              <p><h3>Penghargaan</h3></p>

              <p> <textarea name="penghargaan" placeholder="Penghargaan...." rows="8" class="form-control"></textarea> </p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p><h3>Pengalaman Sejenis</h3> </p>
              <p>
                <textarea name="pengalaman_sejenis" placeholder="Penglaman Kerja Sebelumnya..." class="form-control"  rows="8" ></textarea>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <p> <h3>Konferensi & Seminar</h3> </p>
              <p> <textarea name="konferensi_seminar" rows="8" class="form-control" placeholder="Konferensi & Seminar yang pernah diikuti..."></textarea> </p>
            </div>
            <div class="col-sm-6">
              <p> <h3>Pengalaman Organisasi</h3> </p>
              <p> <textarea name="pengalaman_organisasi" rows="8" class="form-control" placeholder="Organisasi yang pernah diikuti..."></textarea> </p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p> <h3>Pelatihan & Workshop</h3> </p>
              <p>
                <textarea name="pelatihan_workshop" rows="8" class="form-control" placeholder="Pelatihan & Workshop yang pernah diikuti..."></textarea>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p> <h3>Link Portofolio</h3> </p>
              <p>
                <textarea name="link_portofolio" rows="8" class="form-control" placeholder="Link Portofolio..."></textarea>
              </p>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              Gambar Gambar Portofolio <br>
              (Bisa Upload lebih dari satu)
            </div>
            <div class="col-md-9">
              <input type="file" name="file_gambar_portofolio[]" multiple value="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              Upload KTP :
            </div>
            <div class="col-md-9">
              <input type="file" name="file_ktp" required value="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              Upload Ijazah :
            </div>
            <div class="col-md-9">
              <input type="file" name="file_ijazah" required value="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              Upload Transkrip Nilai : <br>
              (Bisa Upload lebih dari satu)
            </div>
            <div class="col-md-9">
              <input type="file" name="file_transkrip_nilai[]" multiple required value="">
            </div>
          </div>
          <input type="submit" name="" class="btn btn-primary" value="Submit">
        </div>

      </form>
    </div>
    <script type="text/javascript">
      function add_skills(){
        $('.language-list').append(
          "<li> </li><input type='text' class='form-control' name='keahlian_bahasa[]' value=''>"
          );
      }
      function add_other_skills(){
        $('.other-skills-list').append(
          '<li></li><textarea class="form-control" rows="2" name="keahlian_lainnya[]" value=""></textarea>'
          );
      }
    </script>
    @stop
