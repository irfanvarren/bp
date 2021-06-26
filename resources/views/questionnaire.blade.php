@extends('layouts.bp_wo_sidenav')
<style media="screen">
.footer-bottom{
  height:auto !important;
}
.copyright-right{
  height:inherit;
}
.questionnaire-table{
  border:1px solid #ccc;
}
.questionnaire-table td, .questionnaire-table th{
  vertical-align: middle !important;
}
  .questionnaire-table td:nth-child(2),.questionnaire-table td:first-child{
    border-right:1px solid #ccc;

  }

    .questionnaire-table tr td:nth-child(3){
      padding-left:15px;
      padding-right:15px;
    }
@media screen and (max-width: 480px) {
  .questionnaire-table td:first-child{

    height:inherit;
  }
    .questionnaire-table td:nth-child(2){

      border-right:none;
    }
  .questionnaire-table td{
    float:left;
  }
  .questionnaire-table tr{
    display:flex;
    flex-wrap: wrap;
  }
  .questionnaire-table tr td:nth-child(3){
    width:100%;
  }
}
</style>
@section('content')
<div class="col-md-12 content-wrapper">

  <div class="col-md-12">
<h2>Kuesioner</h2><br>
  </div>
    <form class="" action="{{ url('/questionnaire')}}" method="post">
      {{ csrf_field() }}
  <div class="col-md-12">
<div class="row">
  <p class="col-md-4">
<input type="text" name="nama" placeholder="Nama" class="form-control" value="" required>
  </p>
  <p class="col-md-4">
<input type="text" name="no_telepon" placeholder="No Telepon" class="form-control" value="" required>
  </p>
  <p class="col-md-4">
<input type="text" name="email" placeholder="Email" class="form-control" value="" required>
  </p>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped questionnaire-table">
      <colgroup>
      <col>
      <col width="50%">
      <col>
      </colgroup>
<thead>
<tr>
  <th>No</th><th>Pertanyaan</th> <th>Jawaban</th>
</tr>
</thead>
<tbody>

      <tr>
        <td>1</td>
        <td>Apakah kamu suka bersekolah di Luar Negeri? <input type="hidden" name="q1" value="Apakah kamu suka bersekolah di Luar Negeri?"> </td><td> <input type="radio" name="a1" value="Ya" > <label for="" style="margin-right:10px;">Ya</label> <input type="radio" name="a1" value="Tidak"> <label for="">Tidak</label>  </td>
      </tr>
      <tr>
          <td>2</td>
        <td>Negara mana yang kamu akan kunjungi jika mau bersekolah di Luar Negeri? <input type="hidden" name="q2" value="Negara mana yang kamu akan kunjungi jika mau bersekolah di Luar Negeri?"></td><td><input type="text" name="a2" class="form-control" value=""> </td>
      </tr>
      <tr>
<td>3</td>
        <td>Apakah kamu ingin diberi Beasiswa sekolah keluar negeri tapi ada kontrak kerja dengan pemberi Beasiswa selama 5 Tahun? <input type="hidden" name="q3" value="Apakah kamu ingin diberi Beasiswa sekolah keluar negeri tapi ada kontrak kerja dengan pemberi Beasiswa selama 5 Tahun?"></td><td><input type="radio" name="a3" value="Ya" > <label for="" style="margin-right:10px;">Ya</label> <input type="radio" name="a3" value="Tidak"> <label for="">Tidak</label>  </td>
      </tr>
      <tr>
<td>4</td>
        <td>Menurutmu, pengalaman apa yang akan didapatkan dari sekolah di Luar Negeri? <input type="hidden" name="q4" value="Menurutmu, pengalaman apa yang akan didapatkan dari sekolah di Luar Negeri?"></td><td><textarea name="a4" class="form-control" rows="3"></textarea> </td>
      </tr>
      <tr>
<td>5</td>
        <td>Jurusan apa yang paling kamu sukai jika bersekolah di Luar Negeri?<input type="hidden" name="q5" value="Jurusan apa yang paling kamu sukai jika bersekolah di Luar Negeri?"></td><td><input type="text" name="a5" class="form-control" value=""> </td>
      </tr>
      <tr>
<td>6</td>
        <td>Menurutmu, Apakah perlu sekolah mengadakan Expo Pendidikan?<input type="hidden" name="q6" value="Menurutmu, Apakah perlu sekolah mengadakan Expo Pendidikan?"></td><td><input type="radio" name="a6" value="Ya" > <label for="" style="margin-right:10px;">Ya</label> <input type="radio" name="a6" value="Tidak"> <label for="">Tidak</label></td>
      </tr>
      <tr>
<td>7</td>
          <td>Menurutmu, Apakah penting mendapatkan pendidikan yang baik?<input type="hidden" name="q7" value="Menurutmu, Apakah penting mendapatkan pendidikan yang baik?"></td><td><textarea name="a7" class="form-control" rows="3"></textarea></td>
      </tr>

    </tbody>
    </table>

    <input type="submit" name=""  value="Submit" class="btn btn-primary" style="padding:7px 28px">
  </div>
</div>


  </div>

      </form>
</div>
@stop
