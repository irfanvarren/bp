@extends('layouts.bp_wo_sidenav')
<style media="screen">
.myform{
  padding:30px 80px;
}
@media screen and (max-width:480px){
  .myform{
    padding:20px;
  }
}
</style>
@section('content')
  <div class="col-md-12 content-wrapper myform" >
<form action="/products/toefl-test/official/submit" method="post" enctype="multipart/form-data">
@csrf
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">Tingkat Pekerjaan</p>
          </div>
          <div class="row">
            <p class="col-md-12"> <select class="form-control" id="tingkat_pekerjaan" name="tingkat_pekerjaan" required>
              <option value="">- Tingkat Pekerjaan -</option>
              <option value="Pemilik Usaha">Pemilik Usaha</option>
              <option value="Wiraswasta">Wiraswasta</option>
              <option value="Karyawan">Karyawan</option>
              <option value="Pelajar">Pelajar</option>
              <option value="Tidak Bekerja">Tidak Bekerja</option>
              <option value="Lainnya">Lainnya</option>
            </select>
             </p>
             <p class="col-md-12">
               <input type="text" class="form-control" id="tingkat_pekerjaan_lainnya" name="tingkat_pekerjaan_lainnya" placeholder="Lainnya" value="" style="display:none;">
             </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12"> Sektor Pekerjaan </p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <select class="form-control" id="sektor_pekerjaan" name="sektor_pekerjaan" required>
                <option value="">- Pilih Sektor -</option>
                  <option value="Petugas Administrasi">Petugas Administrasi</option>
                  <option value="Pertanian, Perikanan, Perhutanan, Pertambangan">Pertanian, Perikanan, Perhutanan, Pertambangan</option>
                  <option value="Hiburan dan Seni">Hiburan dan Seni</option>
                  <option value="Perbankan & Asuransi">Perbankan & Asuransi</option>
                  <option value="Katering & Rekreasi">Katering & Rekreasi</option>
                  <option value="Industri Konstruksi">Industri Konstruksi</option>
                  <option value="Kerajinan Tangan & Design">Kerajinan Tangan & Design</option>
                  <option value="Pendidikan">Pendidikan</option>
                  <option value="Pelayanan Sosial & Kesehatan">Pelayanan Sosial & Kesehatan</option>
                  <option value="Jasa Pemasangan, Pemeliharaan dan Perbaikan">Jasa Pemasangan, Pemeliharaan dan Perbaikan </option>
                  <option value="Hukum & Jasa Hukum">Hukum & Jasa Hukum</option>
                  <option value="Pabrik & Perakitan">Pabrik & Perakitan</option>
                  <option value="Layanan Personal">Layanan Personal</option>
                  <option value="Perdagangan Eceran">Perdagangan Eceran</option>
                  <option value="Mesin & Ilmu Ilmiah">Mesin & Ilmu Ilmiah</option>
                  <option value="Media & Telekomnuikasi">Media & Telekomnuikasi</option>
                  <option value="Transportasi">Transportasi</option>
                  <option value="Utilitas (gas,listrik,air,dll)">Utilitas (gas,listrik,air,dll)</option>
                  <option value="Perdagangan Grosir">Perdagangan Grosir</option>
                  <option value="Lainnya">Lainnya</option>
              </select>
            </p>
            <div class="col-md-12"><input type="text" class="form-control" name="sektor_perkerjaan_lainnya" id="sektor_pekerjaan_lainnya" placeholder="Lainnya" style="display:none" value=""> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">Tingkat Pendidikan</p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <select class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
                <option value="">- Pilih Tingkat Pendidikan -</option>
                <option value="SMP">SMP / Sederajat</option>
                <option value="SMA">SMA / Sederajat</option>
                <option value="Diploma">Diploma</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </p>
            <p class="col-md-12">
              <input type="text" class="form-control" id="tingkat_pendidikan_lainnya" name="tingkat_pendidikan_lainnya" placeholder="Lainnya" style="display:none" value="">
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">Jurusan Yang Diambil</p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="" required>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">Lamanya Belajar Bahasa Inggris</p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <select class="form-control" name="lama_inggris">
                <option value="">- Pilih -</option>
                <option value="1 tahun">1 tahun</option>
                <option value="2 tahun">2 tahun</option>
                <option value="3 tahun">3 tahun</option>
                <option value="4 tahun">4 tahun</option>
                <option value="5 tahun">5 tahun</option>
                <option value="6 tahun">6 tahun</option>
                <option value="7 tahun">7 tahun</option>
                <option value="8 tahun">8 tahun</option>
                <option value="9 tahun">9 tahun</option>
                <option value="Lebih dari 9 tahun">Lebih dari 9 tahun</option>
              </select>

            </p>

          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
              <p class="col-md-12">Negara Mana Yang Dituju</p>
          </div>
          <div class="row">
              <p class="col-md-12">
                <select name="negara_tujuan" id="negara_tujuan" class="form-control">
                  <option value="">- Negara Tujuan -</option>
                  <option value="Australia">Australia</option>
                  <option value="Inggris">Inggris</option>
                  <option value="Irlandia">Irlandia</option>
                  <option value="Singapura">Singapura</option>
                  <option value="Kanada">Kanada</option>
                  <option value="Selandia Baru">Selandia Baru</option>
                  <option value="Amerika">Amerika</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </p>
              <p class="col-md-12">
                <input type="text" class="form-control" id="negara_tujuan_lainnya" name="negara_tujuan_lainnya" placeholder="Lainnya" style="display:none" value="">
              </p>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="row">
              <p class="col-md-12">Alasan Mengambil Tes TOEFL</p>

            </div>
            <div class="row">
              <p class="col-md-12">
                <select class="form-control" id="alasan" name="alasan" required>
                  <option value="">- Alasan Mengambil TOEFL -</option>
                  <option value="Sekolah">Sekolah</option>
                  <option value="Beasiswa">Beasiswa</option>
                  <option value="Aplikasi WHV">Aplikasi WHV</option>
                  <option value="Bekerja">Bekerja</option>
                  <option value="Urusan Pribadi">Urusan Pribadi</option>
                </select>
              </p>
            </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">Masa Berlaku Paspor (Tanggal Berakhir)</p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <input type="date" name="tgl_berlaku_paspor" class="form-control" value="" required>
            </p>
          </div>
        </div>
      </div>
      <div class="row" id="school-info" style="display:none">
        <div class="col-md-12">
          <h3>Jika memilih untuk melanjutkan sekolah</h3>
        </div>
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">
                Gelar Yang Akan Diambil
            </p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <select class="form-control" name="ambil_gelar">
                <option value="">- Pilih Gelar -</option>
                <option value="Certificate 1">Certificate 1</option>
                <option value="Certificate 2">Certificate 2</option>
                <option value="Certificate 3">Certificate 3</option>
                <option value="Diploma">Diploma</option>
                <option value="Advance Diploma">Advance Diploma</option>
                <option value="Bachelor Degree">Bachelor Degree</option>
                <option value="">Other</option>
              </select>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <p class="col-md-12">
              Jurusan Yang Akan Diambil
            </p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <input type="text" name="ambil_jurusan" class="form-control" placeholder="Jurusan Yang Diambil.." value="">
            </p>
          </div>
        </div>
          <div class="col-md-6">
            <div class="row">
              <p class="col-md-12">
                Referensi nama Universitas yang akan dituju (Jika Ada)
              </p>
            </div>
            <div class="row">
              <p class="col-md-12"><input type="text" name="ref_universitas" class="form-control" placeholder="Nama Universitas" value=""> </p>
            </div>
          </div>

      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row">
              <p class="col-md-12">
                Upload KTP
              </p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <input type="file" name="ktp" class="form-control" value="" required>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
              <p class="col-md-12">
                  Upload Paspor
              </p>
          </div>
          <div class="row">
            <p class="col-md-12">
              <input type="file" name="paspor" class="form-control" value="" required>
            </p>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">

          <p class="form-check-inline">

            <input type="checkbox" name="agree" id="agree" class="form-check-input" value="">  <label class="form-check-label" for=""> Setuju dengan <a href="{{url('/products/toefl-test/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>
          </p>
          </div>
        </div>
      <div class="row">
        <div class="col-md-12">
    <a href="{{url('products/toefl-test/official/')}}" class="btn btn-secondary">Back</a>
    <input type="submit" name="" id="submit" value="Submit" class="btn btn-primary" onclick="" style="float:right;">
        </div>

      </div>
    </div>

    </form>
  </div>
  <script type="text/javascript">
function term_and_condition(){
 Swal.fire({
  title: 'Custom width, padding, background.',
  width: 600,
  padding: '3em',
  background: '#fff url(/images/trees.png)',
  backdrop: `
    rgba(0,0,123,0.4)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
});
}
   
  document.getElementById('agree').addEventListener('change', function() {
    if (this.checked) {
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('submit').disabled = true;
    }
  });

document.getElementById('alasan').addEventListener('change',function(){

if($(this).val()=="Sekolah"){
  $('#school-info').show();
//  $('#school-info input,#school-info select').prop('required',true);
}else{
  $('#school-info').hide();
  $('#school-info input,#school-info select').val('');
}
});
$(document).on("change","#tingkat_pekerjaan",function(){

if($(this).val() == "Lainnya"){
$('#tingkat_pekerjaan_lainnya').show();
$('#tingkat_pekerjaan_lainnya').prop("required","true");
}
});
$(document).on("change","#sektor_pekerjaan",function(){

if($(this).val() == "Lainnya"){
$('#sektor_pekerjaan_lainnya').show();
$('#sektor_pekerjaan_lainnya').prop("required","true");
}
});
$(document).on("change","#tingkat_pendidikan",function(){

if($(this).val() == "Lainnya"){
$('#tingkat_pendidikan_lainnya').show();
$('#tingkat_pendidikan_lainnya').prop("required","true");
}
});
$(document).on("change","#negara_tujuan",function(){

if($(this).val() == "Lainnya"){
$('#negara_tujuan_lainnya').show();
$('#negara_tujuan_lainnya').prop("required","true");
}
});
  </script>
@stop
