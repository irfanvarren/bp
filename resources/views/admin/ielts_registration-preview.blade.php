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
            <div class="col-md-6">

              <head>
                  <style media="screen">
                      table,
                      th,
                      td {
                          border</td><td>1px solid black;
                          border-collapse</td><td>collapse;
                          text-align</td><td>center;
                          vertical-align</td><td>center;
                      }

                      th,
                      td {
                          padding</td><td>6px 8px;
                      }
                  </style>
              </head>

              <a href="{{URL::previous()}}">Back</a>
              <table class="table table-bordered">
                  <tr>
                      <th colspan="2">Data Pendaftaran IELTS</th>
                  </tr>
                  <tr>
                      <td>Test Module</td>
                      <td>{{$ielts_registration->test_module}}</td>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <td>{{$ielts_registration->title.'. '.$ielts_registration->nama}}</td>
                  </tr>
                  <tr>
                      <td>Gender</td>
                      <td>{{$ielts_registration->gender}}</td>
                  </tr>
                  <tr>
                      <td>Tanggal Lahir</td>
                      <td>{{date("d/m/Y",strtotime($ielts_registration->tgl_lahir))}}</td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>{{$ielts_registration->alamat}}</td>
                  </tr>
                  <tr>
                      <td>Kota</td>
                      <td>{{$ielts_registration->kota}}</td>
                  </tr>
                  <tr>
                      <td>Kode Pos</td>
                      <td>{{$ielts_registration->kode_pos}}</td>
                  </tr>
                  <tr>
                      <td>Agama</td>
                      <td>{{$ielts_registration->agama}}</td>
                  </tr>
                  <tr>
                      <td>No Telepon</td>
                      <td>{{$ielts_registration->no_telepon}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$ielts_registration->email}}</td>
                  </tr>
                  <tr>
                      <td>Tipe Identifikasi</td>
                      <td>{{$ielts_registration->tipe_id}}</td>
                  </tr>
                  <tr>
                      <td>No Identifikasi</td>
                      <td>{{$ielts_registration->no_ktp.$ielts_registration->no_paspor}}</td>
                  </tr>

              </table>
              <br>
              <table class="table table-bordered">
                  <tr>
                      <th colspan="2">Data Pendaftaran IELTS - page 2</th>
                  </tr>
                  <tr>
                      <td>Tingkat Pekerjaan </td>
                      <td> @if(empty($ielts_registration->tingkat_pekerjaan_lainnya)){{$ielts_registration->tingkat_pekerjaan}} @else {{$ielts_registration->tingkat_pekerjaan_lainnya}} @endif </td>
                  </tr>
                  <tr>
                      <td>Sektor Pekerjaan </td>
                      <td> @if(empty($ielts_registration->sektor_pekerjaan_lainnya)){{$ielts_registration->sektor_pekerjaan}} @else {{$ielts_registration->sektor_pekerjaan_lainnya}} @endif</td>
                  </tr>
                  <tr>
                      <td>Tingkat Pendidikan </td>
                      <td> @if(empty($ielts_registration->tingkat_pendidikan_lainnya)){{$ielts_registration->tingkat_pendidikan}} @else {{$ielts_registration->tingkat_pendidkan_lainnya}} @endif</td>
                  </tr>
                  <tr>
                      <td>Jurusan Yang Diambil </td>
                      <td> {{$ielts_registration->jurusan}}</td>
                  </tr>
                  <tr>
                      <td>Lamanya Belajar Bahasa Inggris </td>
                      <td> {{$ielts_registration->lama_inggris}}</td>
                  </tr>
                  <tr>
                      <td>Negara Tujuan </td>
                      <td> @if(empty($ielts_registration->negara_tujuan_lainnya)) {{$ielts_registration->negara_tujuan}} @else {{$ielts_registration->negara_tujuan_lainnya}} @endif</td>
                  </tr>
                  <tr>
                      <td>Alasan Mengambil Tes Ielts</td>
                      <td> {{$ielts_registration->alasan_ielts}}</td>
                  </tr>
                  <tr>
                      <td>Masa Berlaku Paspor </td>
                      <td> {{date('d-m-Y', strtotime($ielts_registration->tgl_berlaku_paspor))}}</td>
                  </tr>
                  @if($ielts_registration->alasan_ielts == 'Sekolah')
                  <tr>
                      <th colspan="2">Jika memilih untuk melanjutkan sekolah</th>
                  </tr>
                  <tr>
                      <td>Gelar Yang Akan diambil </td>
                      <td> {{$ielts_registration->ambil_gelar}}</td>
                  </tr>
                  <tr>

                      <td>Jurusan Yang </td>
                      <td> {{$ielts_registration->ambil_jurusan}}</td>
                  </tr>
                  <tr>

                      <td>Referensi Universitas </td>
                      <td> {{$ielts_registration->ref_universitas}}</td>
                  </tr>
                  @endif
              </table>

            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">

                  <h3>Foto KTP</h3>
                </div>
                <div class="col-md-12">
                  <img style="width:300px;height:auto;" src="{{asset(Storage::disk('local')->url($ielts_registration->lokasi_ktp)) }}" alt="Not Image">
                    <a href="{{asset(Storage::disk('local')->url($ielts_registration->lokasi_ktp)) }}" download>Download</a>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">

                    <h3>Foto Paspor</h3>
                  </div>
                  <div class="col-md-12">
                    <img style="width:300px;height:auto;" src="{{asset(Storage::disk('local')->url($ielts_registration->lokasi_paspor)) }}" alt="Not Image">
                    <a href="{{asset(Storage::disk('local')->url($ielts_registration->lokasi_paspor)) }}" download>Download</a>
                  </div>
                  </div>

              <!-- $ielts_registration -> hilangkan public -->
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
