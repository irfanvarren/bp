@extends('layouts.app-auth', ['activePage' => 'ielts-regis','activeMenu' => 'data-management', 'titlePage' => __('Ielts Registration')])
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
                    <td> {{$regisData->REF_PERUSAHAAN}}</td>
                  </tr>
                  <tr>
                    <td>Nama </td>
                    <td>{{$regisData->NAMA}}</td>
                  </tr>
                  <tr>
                    <td>Tempat Kelahiran </td>
                    <td> {{$regisData->KOTA_KELAHIRAN}}</td>
                  </tr>
                  <tr>
                    <td> Tanggal Lahir </td>
                    <td>{{date("d/m/Y",strtotime($regisData->TGL_LAHIR))}}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin </td>
                    <td>{{$regisData->JK}}</td>
                  </tr>
                  <tr>
                    <td>Kewarganegaraan </td>
                    <td>{{$regisData->KEWARGANEGARAAN}}</td>
                  </tr>
                  <tr>
                    <td>No. KTP  </td>
                    <td>{{$regisData->REF_KTP}}</td>
                  </tr>
                  <tr>
                    <td>No. Paspor  </td>
                    <td>{{$regisData->REF_PASPOR}}</td>
                  </tr>
                  <tr>
                    <td>Alamat </td>
                    <td> {{$regisData->ALAMAT}}</td>
                  </tr>
                  <tr>
                    <td>Kota </td>
                    <td>{{$regisData->KOTA}}</td>
                  </tr>

                  <tr>
                    <td>Agama </td>
                    <td>{{$regisData->AGAMA}}</td>
                  </tr>
                  <tr>
                    <td>Email </td>
                    <td> {{$regisData->EMAIL}}</td>
                  </tr>
                  <tr>
                    <td>No HP / WA </td>
                    <td>{{$regisData->KONTAK}}</td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Informasi Latar Belakang Pendidikan</th>
                  </tr>
                  <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{$regisData->TINGKAT_PENDIDIKAN}}</td>
                  </tr>
                  <tr>
                    <td>jurusan</td>
                    <td>{{$regisData->JURUSAN}}</td>
                  </tr>
                  <tr>
                    <td>Universitas</td>
                    <td>{{$regisData->UNIVERSITAS_TERAKHIR}}</td>
                  </tr>
                  <tr>
                    <td>Bahasa Sehari hari</td>
                    <td>{{$regisData->BAHASA_SEHARI_HARI}}</td>
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
                    <td>{{$regisData->TINGKAT_PEKERJAAN}}</td>
                  </tr>
                  <tr>
                    <td>Bidang Pekerjaan  </td>
                    <td>{{$regisData->SEKTOR_PEKERJAAN}}</td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Pemilihan Kursus yang anda minati</th>
                  </tr>
                  <tr>
                    <td>Course </td>
                    <td>{{$regisData->NAMA_PAKET}}</td>
                  </tr>
                  @if($regisData->TEST_MODULE != "")
                  <tr>
                    <td>Ielts Module </td>
                    <td>{{$regisData->TEST_MODULE}}</td>
                  </tr>
                  @endif
                  <tr>
                    <td>Kelompok Kelas  </td>
                    <td>{{$regisData->NAMA_KATEGORI}}</td>
                  </tr>
                  <tr>
                    <td>Level </td>
                    <td>{{$regisData->NAMA_LEVEL}}</td>
                  </tr>

                  <tr>
                    <td>Jumlah Pertemuan </td>
                    <td>{{$regisData->JUMLAH_PERTEMUAN}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Jam  </td>
                    <td>{{$regisData->JUMLAH_JAM}}</td>
                  </tr>
                  <tr>
                    <td>Tujuan Pelatihan  </td>
                    <td>{{$regisData->ALASAN}}</td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th colspan="2">Informasi Kontak Wali</th>
                  </tr>
                  <tr>
                    <td>Nama Wali</td>
                    <td>{{$regisData->nama_wali}}</td>
                  </tr>
                  <tr>
                    <td>Hubungan</td>
                    <td>{{$regisData->hubungan}}</td>
                  </tr>
                  <tr>
                    <td>No Hp</td>
                    <td>{{$regisData->no_telepon_wali}}</td>
                  </tr>
                  <tr>
                    <td>Email Wali</td>
                    <td>{{$regisData->email_wali}}</td>
                  </tr>
                  <tr>
                    <td>Alamat Wali</td>
                    <td>{{$regisData->alamat_wali}}</td>
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
