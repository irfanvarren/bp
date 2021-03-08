@extends('layouts.app', ['activePage' => 'ielts-regis','activeMenu' => 'data-management', 'titlePage' => __('Ielts Registration')])
<style media="screen">
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

  .form-group input[type=file] {
    position: relative !important;
    opacity: 1 !important;
  }

  .table {
    font-size: 14px;
  }

  .table th,
  .table td {
    padding: 6px 8px;
  }
</style>
<!-- nama tgl lahir tempat lahir pekerjaan sektor pekerjaan modul ielts tgl ielts  -->
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __("Details") }}</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <a href="{{URL::previous()}}">Back</a> <br>

              </div>
              <div class="col-md-6">


                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Informasi Pribadi</th>
                  </tr>
                  <tr>
                    <td>Cabang </td>
                    <td> {{$englishregis->REF_PERUSAHAAN}}</td>
                  </tr>
                  <tr>
                    <td>Nama </td>
                    <td>{{$englishregis->NAMA}}</td>
                  </tr>
                  <tr>
                    <td>Tempat Kelahiran </td>
                    <td> {{$englishregis->KOTA_KELAHIRAN}}</td>
                  </tr>
                  <tr>
                    <td> Tanggal Lahir </td>
                    <td>{{date("d/m/Y",strtotime($englishregis->TGL_LAHIR))}}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin </td>
                    <td>{{$englishregis->JK}}</td>
                  </tr>
                  <tr>
                    <td>Kewarganegaraan </td>
                    <td>{{$englishregis->KEWARGANEGARAAN}}</td>
                  </tr>
                  <tr>
                    <td>No. KTP  </td>
                    <td>{{$englishregis->REF_KTP}}</td>
                  </tr>
                  <tr>
                    <td>No. Paspor  </td>
                    <td>{{$englishregis->REF_PASPOR}}</td>
                  </tr>
                  <tr>
                    <td>Alamat </td>
                    <td> {{$englishregis->ALAMAT}}</td>
                  </tr>
                  <tr>
                    <td>Kota </td>
                    <td>{{$englishregis->KOTA}}</td>
                  </tr>

                  <tr>
                    <td>Agama </td>
                    <td>{{$englishregis->AGAMA}}</td>
                  </tr>
                  <tr>
                    <td>Email </td>
                    <td> {{$englishregis->EMAIL}}</td>
                  </tr>
                  <tr>
                    <td>No HP / WA </td>
                    <td>{{$englishregis->KONTAK}}</td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Informasi Latar Belakang Pendidikan</th>
                  </tr>
                  <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{$englishregis->TINGKAT_PENDIDIKAN}}</td>
                  </tr>
                  <tr>
                    <td>jurusan</td>
                    <td>{{$englishregis->JURUSAN}}</td>
                  </tr>
                  <tr>
                    <td>Universitas</td>
                    <td>{{$englishregis->UNIVERSITAS_TERAKHIR}}</td>
                  </tr>
                  <tr>
                    <td>Bahasa Sehari hari</td>
                    <td>{{$englishregis->BAHASA_SEHARI_HARI}}</td>
                  </tr>
                </table>
                <br>

              </div>
              <div class="col-md-6">
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Informasi Latar Belakang Pekerjaan</th>
                  </tr>
                  <tr>
                    <td>Pekerjaan  </td>
                    <td>{{$englishregis->TINGKAT_PEKERJAAN}}</td>
                  </tr>
                  <tr>
                    <td>Bidang Pekerjaan  </td>
                    <td>{{$englishregis->SEKTOR_PEKERJAAN}}</td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Pemilihan Kursus yang anda minati</th>
                  </tr>
                  <tr>
                    <td>Course </td>
                    <td>{{$englishregis->nama_course}}</td>
                  </tr>
                  <tr>
                    <td>Ielts Module </td>
                    <td>{{$englishregis->TEST_MODULE}}</td>
                  </tr>
                  <tr>
                    <td>Kelompok Kelas  </td>
                    <td>{{$englishregis->nama_kategori}}</td>
                  </tr>
                  <tr>
                    <td>Level </td>
                    <td>{{$englishregis->nama_level}}</td>
                  </tr>

                  <tr>
                    <td>Jumlah Pertemuan </td>
                    <td>{{$englishregis->JUMLAH_PERTEMUAN}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Jam  </td>
                    <td>{{$englishregis->JUMLAH_JAM}}</td>
                  </tr>
                  <tr>
                    <td>Tujuan Pelatihan  </td>
                    <td>{{$englishregis->ALASAN}}</td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Informasi Kontak Wali</th>
                  </tr>
                  <tr>
                    <td>Nama Wali</td>
                    <td>{{$englishregis->nama_wali}}</td>
                  </tr>
                  <tr>
                    <td>Hubungan</td>
                    <td>{{$englishregis->hubungan}}</td>
                  </tr>
                  <tr>
                    <td>No Hp</td>
                    <td>{{$englishregis->no_telepon_wali}}</td>
                  </tr>
                  <tr>
                    <td>Email Wali</td>
                    <td>{{$englishregis->email_wali}}</td>
                  </tr>
                  <tr>
                    <td>Alamat Wali</td>
                    <td>{{$englishregis->alamat_wali}}</td>
                  </tr>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
@endpush
