@extends('layouts.app-auth', ['activePage' => 'student', 'titlePage' => __('Student'),'activeMenu' => 'home-management'])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
#regis-detail-suggestion{
  position:absolute;border:1px solid #dedede;
  z-index: 99999;
  background: white;
}
.suggestion-list{
  padding: 6px 10px;
}
.suggestion-list:hover{
  background: #dedede;
  cursor: pointer;
}
</style>

@endpush
@section('content')

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mymodal" style="max-width:1200px !important" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Students Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" id="form-input">

          <div class="row">
            <div class="card">
              <div class="card-header card-header-tabs card-header-rose">
                Calon Siswa
              </div>
              <div class="card-body" >
                <div class="d-flex mb-3">
                  <span class="pt-2">Cari</span><div style="flex-grow: 1;" class="mx-2"><input type="text" class="form-control" name="filter_keyword" id="filter_keyword" value=""></div><button class="btn btn-primary" type="button" id="filter-btn">search</button>
                </div>
                <div id="student-list-output"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin-student.update',$student)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Student') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-student.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Kode') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('KD') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="KD" id="KD" value="{{$student->KD}}">
                        @if ($errors->has('KD'))
                        <span id="harga-error" class="error KD-danger" for="input-KD" >{{ $errors->first('KD') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Nama') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('NAMA') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="NAMA" id="NAMA" value="{{$student->NAMA}}">
                        @if ($errors->has('NAMA'))
                        <span id="harga-error" class="error NAMA-danger" for="input-NAMA">{{ $errors->first('NAMA') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Alamat') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('ALAMAT') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="ALAMAT" id="ALAMAT" value="{{$student->ALAMAT}}">
                        @if ($errors->has('ALAMAT'))
                        <span id="harga-error" class="error ALAMAT-danger" for="input-ALAMAT">{{ $errors->first('ALAMAT') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Tanggal Lahir') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('TGL_LAHIR') ? ' has-danger' : '' }}" >
                        <input type="date" class="form-control" name="TGL_LAHIR" id="TGL_LAHIR" value="{{$student->TGL_LAHIR}}">
                        @if ($errors->has('TGL_LAHIR'))
                        <span id="harga-error" class="error TGL_LAHIR-danger" for="input-TGL_LAHIR">{{ $errors->first('TGL_LAHIR') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Agama') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('AGAMA') ? ' has-danger' : '' }}" >
                        <input type="text" class="form-control" name="AGAMA" id="AGAMA" value="{{$student->AGAMA}}">
                        @if ($errors->has('AGAMA'))
                        <span id="harga-error" class="error AGAMA-danger" for="input-AGAMA">{{ $errors->first('AGAMA') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('JK') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('JK') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="JK" id="JK"  value="{{$student->JK}}">
                        @if ($errors->has('JK'))
                        <span id="harga-error" class="error JK-danger" for="input-JK">{{ $errors->first('JK') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('EMAIL') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="EMAIL" id="EMAIL" value="{{$student->EMAIL}}">
                        @if ($errors->has('EMAIL'))
                        <span id="harga-error" class="error EMAIL-danger" for="input-EMAIL">{{ $errors->first('EMAIL') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('NIK') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('REF_NIK') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="REF_NIK" id="REF_NIK" value="{{$student->REF_NIK}}">
                        @if ($errors->has('REF_NIK'))
                        <span id="harga-error" class="error REF_NIK-danger" for="input-REF_NIK">{{ $errors->first('REF_NIK') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('NPWP') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('REF_NPWP') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="REF_NPWP" id="REF_NPWP" value="{{$student->REF_NPWP}}">
                        @if ($errors->has('REF_NPWP'))
                        <span id="harga-error" class="error REF_NPWP-danger" for="input-REF_NPWP">{{ $errors->first('REF_NPWP') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Akta') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('REF_AKTA') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="REF_AKTA" id="REF_AKTA" value="{{$student->REF_AKTA}}">
                        @if ($errors->has('REF_AKTA'))
                        <span id="harga-error" class="error REF_AKTA-danger" for="input-REF_AKTA">{{ $errors->first('REF_AKTA') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Paspor') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('REF_PASPOR') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="REF_PASPOR" id="REF_PASPOR" value="{{$student->REF_PASPOR}}">
                        @if ($errors->has('REF_PASPOR'))
                        <span id="harga-error" class="error REF_PASPOR-danger" for="input-REF_PASPOR">{{ $errors->first('REF_PASPOR') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="row">
                    <div class="col-lg-12 p-3 mb-3" style="border:1px solid black">
                      <div>Gambar</div>
                      <div>
                        <img src="{{asset($student->PIC_PATH)}}">
                        
                      </div>
                      <input type="file" name="FILE_PIC" id="FILE_PIC">
                    </div>
                    <div class="col-lg-12 p-3" style="border:1px solid black">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          Negara
                        </div>
                        <div class="col-lg-9">
                          <select class="selectize form-control" id="REF_NEGARA" name="REF_NEGARA">
                            <option value=""> - Pilih Negara -</option>
                            @foreach($countries as $country)
                            <option value="{{strtoupper($country->name)}}" {{strtoupper($country->name) == $student->REF_NEGARA ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          Pulau
                        </div>
                        <div class="col-lg-9">
                         <select class="selectize form-control" id="REF_PULAU" name="REF_PULAU">
                          <option value=""> - Pilih Pulau -</option>

                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-3">
                        Provinsi
                      </div>
                      <div class="col-lg-9">
                       <select class="selectize form-control" id="REF_PROVINSI" name="REF_PROVINSI">
                        <option value=""> - Pilih Provinsi -</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-3">
                      Kota
                    </div>
                    <div class="col-lg-9">
                     <select class="selectize form-control" id="REF_KOTA" name="REF_KOTA">
                      <option value=""> - Pilih Kota -</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    Kecamatan
                  </div>
                  <div class="col-lg-9">
                   <select class="selectize form-control" id="REF_KEC" name="REF_KEC">
                    <option value=""> - Pilih Kecamatan -</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                  Kelurahan
                </div>
                <div class="col-lg-9">
                 <select class="selectize form-control" id="REF_KEL" name="REF_KEL">
                  <option value=""> - Pilih Kelurahan -</option>
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer ml-auto mr-auto">
    <button type="submit" class="btn btn-primary">{{ __('Edit Student') }}</button>
  </div>
</div>
</form>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-tabs card-header-rose">
      <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
          <span class="nav-tabs-title">Select:</span>
          <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="nav-item active">
              <a class="nav-link" href="#regis-detail" data-toggle="tab" onclick="open_regis_detail()" id="open-regis-detail">
                <i class="material-icons">create</i> Detail Regis
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="#packet-detail" data-toggle="tab" onclick="open_packet_detail()" id="open-packet-detail">
                <i class="material-icons">library_books</i> Web Regis History
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="#guardian-data" data-toggle="tab" onclick="open_guardian_data()" id="open-guardian-data">
                <i class="material-icons">person</i> Data Wali
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>

            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body" >
      <div class="tab-content">
        <div class="tab-pane active" id="regis-detail">

          @if(count($registration_details))
          @php
          $registration_detail = $registration_details[0]; 
          @endphp


          <form autocomplete="off" method="post" enctype="multipart/form-data" action="{{url('admin/students/'.$student->KD.'/save-regis-detail')}}">
            @csrf
            <input type="hidden" name="id" value="{{$registration_detail->id}}">
            <div id="regis-detail-suggestion"></div>
            <div class="form-group row">
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Jenis Tinggal</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('JENIS_TINGGAL') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="JENIS_TINGGAL" id="JENIS_TINGGAL" value="{{$registration_detail->JENIS_TINGGAL}}">
                      @if ($errors->has('JENIS_TINGGAL'))
                      <span id="harga-error" class="error JENIS_TINGGAL-danger" for="input-JENIS_TINGGAL">{{ $errors->first('JENIS_TINGGAL') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Alat Transportasi</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('ALAT_TRANSPORTASI') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="ALAT_TRANSPORTASI" id="ALAT_TRANSPORTASI" value="{{$registration_detail->ALAT_TRANSPORTASI}}">
                      @if ($errors->has('ALAT_TRANSPORTASI'))
                      <span id="harga-error" class="error ALAT_TRANSPORTASI-danger" for="input-ALAT_TRANSPORTASI">{{ $errors->first('ALAT_TRANSPORTASI') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Kewarganegaraan</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('KEWARGANEGARAAN') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="KEWARGANEGARAAN" id="KEWARGANEGARAAN" value="{{$registration_detail->KEWARGANEGARAAN}}">
                      @if ($errors->has('KEWARGANEGARAAN'))
                      <span id="harga-error" class="error KEWARGANEGARAAN-danger" for="input-KEWARGANEGARAAN">{{ $errors->first('KEWARGANEGARAAN') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Title</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('TITLE') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="TITLE" id="TITLE" value="{{$registration_detail->TITLE}}">
                      @if ($errors->has('TITLE'))
                      <span id="harga-error" class="error TITLE-danger" for="input-TITLE">{{ $errors->first('TITLE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Tingkat Pekerjaan</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('TINGKAT_PEKERJAAN') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="TINGKAT_PEKERJAAN" id="TINGKAT_PEKERJAAN" value="{{$registration_detail->TINGKAT_PEKERJAAN}}">
                      @if ($errors->has('TINGKAT_PEKERJAAN'))
                      <span id="harga-error" class="error TINGKAT_PEKERJAAN-danger" for="input-TINGKAT_PEKERJAAN">{{ $errors->first('TINGKAT_PEKERJAAN') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Sektor Pekerjaan</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('SEKTOR_PEKERJAAN') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="SEKTOR_PEKERJAAN" id="SEKTOR_PEKERJAAN" value="{{$registration_detail->SEKTOR_PEKERJAAN}}">
                      @if ($errors->has('SEKTOR_PEKERJAAN'))
                      <span id="harga-error" class="error SEKTOR_PEKERJAAN-danger" for="input-SEKTOR_PEKERJAAN">{{ $errors->first('SEKTOR_PEKERJAAN') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Tingkat Pendidikan</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('TINGKAT_PENDIDIKAN') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="TINGKAT_PENDIDIKAN" id="TINGKAT_PENDIDIKAN" value="{{$registration_detail->TINGKAT_PENDIDIKAN}}">
                      @if ($errors->has('TINGKAT_PENDIDIKAN'))
                      <span id="harga-error" class="error TINGKAT_PENDIDIKAN-danger" for="input-TINGKAT_PENDIDIKAN">{{ $errors->first('TINGKAT_PENDIDIKAN') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Universitas Terakhir</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('UNIVERSITAS_TERAKHIR') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="UNIVERSITAS_TERAKHIR" id="UNIVERSITAS_TERAKHIR" value="{{$registration_detail->UNIVERSITAS_TERAKHIR}}">
                      @if ($errors->has('UNIVERSITAS_TERAKHIR'))
                      <span id="harga-error" class="error UNIVERSITAS_TERAKHIR-danger" for="input-UNIVERSITAS_TERAKHIR">{{ $errors->first('UNIVERSITAS_TERAKHIR') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Jurusan</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('TINGKAT_PENDIDIKAN') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="TINGKAT_PENDIDIKAN" id="TINGKAT_PENDIDIKAN" value="{{$registration_detail->TINGKAT_PENDIDIKAN}}">
                      @if ($errors->has('TINGKAT_PENDIDIKAN'))
                      <span id="harga-error" class="error TINGKAT_PENDIDIKAN-danger" for="input-TINGKAT_PENDIDIKAN">{{ $errors->first('TINGKAT_PENDIDIKAN') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Lama Belajar Bahasa Inggris</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('LAMA_BELAJAR_INGGRIS') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="LAMA_BELAJAR_INGGRIS" id="LAMA_BELAJAR_INGGRIS" value="{{$registration_detail->LAMA_BELAJAR_INGGRIS}}">
                      @if ($errors->has('LAMA_BELAJAR_INGGRIS'))
                      <span id="harga-error" class="error LAMA_BELAJAR_INGGRIS-danger" for="input-LAMA_BELAJAR_INGGRIS">{{ $errors->first('LAMA_BELAJAR_INGGRIS') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Bahasa Sehari Hari</label>
                  <div class="col-lg-9">
                    <div class="form-group{{ $errors->has('BAHASA_SEHARI_HARI') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control" name="BAHASA_SEHARI_HARI" id="BAHASA_SEHARI_HARI" value="{{$registration_detail->BAHASA_SEHARI_HARI}}">
                      @if ($errors->has('BAHASA_SEHARI_HARI'))
                      <span id="harga-error" class="error BAHASA_SEHARI_HARI-danger" for="input-BAHASA_SEHARI_HARI">{{ $errors->first('BAHASA_SEHARI_HARI') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6">
               <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kebutuhan Khusus</label>
                <div class="col-lg-9">
                  <div class="form-group{{ $errors->has('KEBUTUHAN_KHUSUS') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="KEBUTUHAN_KHUSUS" id="KEBUTUHAN_KHUSUS" value="{{$registration_detail->KEBUTUHAN_KHUSUS}}">
                    @if ($errors->has('KEBUTUHAN_KHUSUS'))
                    <span id="harga-error" class="error KEBUTUHAN_KHUSUS-danger" for="input-KEBUTUHAN_KHUSUS">{{ $errors->first('KEBUTUHAN_KHUSUS') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Penerima KPS</label>
                <div class="col-lg-9">
                  <div class="form-group{{ $errors->has('PENERIMA_KPS') ? ' has-danger' : '' }}"> 
                    <input type="text" class="form-control" name="PENERIMA_KPS" id="PENERIMA_KPS" value="{{$registration_detail->PENERIMA_KPS}}">
                    @if ($errors->has('PENERIMA_KPS'))
                    <span id="harga-error" class="error PENERIMA_KPS-danger" for="input-PENERIMA_KPS">{{ $errors->first('PENERIMA_KPS') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Layak PIP</label>
                <div class="col-lg-9">
                  <div class="form-group{{ $errors->has('LAYAK_PIP') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="LAYAK_PIP" id="LAYAK_PIP" value="{{$registration_detail->LAYAK_PIP}}">
                    @if ($errors->has('LAYAK_PIP'))
                    <span id="harga-error" class="error LAYAK_PIP-danger" for="input-LAYAK_PIP">{{ $errors->first('LAYAK_PIP') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Penerima KIP</label>
                <div class="col-lg-9">
                  <div class="form-group{{ $errors->has('PENERIMA_KIP') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="PENERIMA_KIP" id="PENERIMA_KIP" value="{{$registration_detail->PENERIMA_KIP}}">
                    @if ($errors->has('PENERIMA_KIP'))
                    <span id="harga-error" class="error PENERIMA_KIP-danger" for="input-PENERIMA_KIP">{{ $errors->first('PENERIMA_KIP') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">

                <label class="col-lg-3 col-form-label">KTP</label>
                <div class="col-lg-9">
                  <div class="form-group form-file-upload form-file-simple">
                    <input type="text" class="form-control inputFileVisible" placeholder="KTP...">
                    <input type="file" class="inputFileHidden" name="FILE_KTP" id="PATH_KTP">
                  </div>
                  <a href="{{Storage::url($registration_detail->PATH_KTP)}}" target="_blank"> Show File</a>
                </div>
              </div>
              <div class="form-group row">

                <label class="col-lg-3 col-form-label">Paspor</label>
                <div class="col-lg-9">
                  <div class="row">
                    <div class="col-lg-6">
                     <div class="form-group form-file-upload form-file-simple">
                      <input type="text" class="form-control inputFileVisible" placeholder="Paspor...">
                      <input type="file" class="inputFileHidden" name="FILE_PASPOR" id="PATH_PASPOR">
                    </div>
                    <a href="{{Storage::url($registration_detail->PATH_PASPOR)}}" target="_blank"> Show File</a>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('TGL_BERLAKU_PASPOR') ? ' has-danger' : '' }}">
                      <input type="date" class="form-control" name="TGL_BERLAKU_PASPOR" id="TGL_BERLAKU_PASPOR" value="{{$registration_detail->TGL_BERLAKU_PASPOR}}">
                      @if ($errors->has('TGL_BERLAKU_PASPOR'))
                      <span id="harga-error" class="error TGL_BERLAKU_PASPOR-danger" for="input-TGL_BERLAKU_PASPOR">{{ $errors->first('TGL_BERLAKU_PASPOR') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bukti Pembayaran</label>
              <div class="col-lg-9">

                <div class="form-group form-file-upload form-file-simple">
                  <input type="text" class="form-control inputFileVisible" placeholder="Bukti Pembayaran...">
                  <input type="file" class="inputFileHidden" name="FILE_PAYMENT" id="PATH_PAYMENT">
                </div>
                <a href="{{Storage::url($registration_detail->PATH_PAYMENT)}}" target="_blank"> Show File</a>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">KK</label>
              <div class="col-lg-9">
                <div class="form-group form-file-upload form-file-simple">
                  <input type="text" class="form-control inputFileVisible" placeholder="KK...">
                  <input type="file" class="inputFileHidden" name="FILE_KK" id="PATH_KK">
                </div>
                <a href="{{Storage::url($registration_detail->PATH_KK)}}" target="_blank"> Show File</a>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Ijazah</label>
              <div class="col-lg-9">
               <div class="form-group form-file-upload form-file-simple">
                <input type="text" class="form-control inputFileVisible" placeholder="Ijazah...">
                <input type="file" class="inputFileHidden"  name="FILE_IJAZAH" id="PATH_IJAZAH"  >
              </div>
              <a href="{{Storage::url($registration_detail->PATH_IJAZAH)}}" target="_blank"> Show File</a>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Akta Lahir</label>
            <div class="col-lg-9">
              <div class="form-group form-file-upload form-file-simple">
                <input type="text" class="form-control inputFileVisible" placeholder="Akta Lahir...">
                <input type="file" class="inputFileHidden"  name="FILE_AKTA_LAHIR" id="PATH_AKTA_LAHIR"  >
              </div>
              <a href="{{Storage::url($registration_detail->PATH_AKTA_LAHIR)}}" target="_blank"> Show File</a>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">KKS</label>
            <div class="col-lg-9">            
              <div class="form-group form-file-upload form-file-simple">
                <input type="text" class="form-control inputFileVisible" placeholder="KKS...">
                <input type="file" class="inputFileHidden" name="FILE_KKS" id="PATH_KKS" >
              </div>
              <a href="{{Storage::url($registration_detail->PATH_KKS)}}" target="_blank"> Show File</a>
            </div>
          </div>

        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-12 text-center">
          <button class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
    @endif
  </div>
  <div class="tab-pane" id="packet-detail">
    <table class="table table-bordered">
      <tr>
        <th>Pricelist</th>
        <th>Paket</th>
        <th>Level</th>
        <th>Kategori</th>
        <th>Jumlah Jam</th>
        <th>Jumlah Pertemuan</th>
        <th>Tipe Kelas</th>
        <th>Ielts Module</th>
        <th>Tanggal Test</th>
        <th>Tanggal Pendaftaran</th>
      </tr>

      @foreach($packet_details as $packet_detail)
      <tr>
        <td>{{$packet_detail->NAMA_PRICELIST}}</td>
        <td>{{$packet_detail->NAMA_PAKET}}</td>
        <td>{{$packet_detail->NAMA_LEVEL}}</td>
        <td>{{$packet_detail->NAMA_KATEGORI}}</td>
        <td>{{$packet_detail->JUMLAH_JAM}}</td>
        <td>{{$packet_detail->JUMLAH_PERTEMUAN}}</td>
        <td>{{$packet_detail->TIPE_KELAS}}</td>
        <td>{{$packet_detail->IELTS_MODULE}}</td>
        <td>{{$packet_detail->TGL_TEST}}</td>
        <td>{{ $packet_detail->TGL_BUAT != "" ? date("d/m/Y",strtotime($packet_detail->TGL_BUAT)) : "-"}}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="tab-pane" id="guardian-data">
   <table class="table table-bordered">
    <tr>
      <th>Hubungan</th>
      <th>Nama</th>
      <th>No. HP</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>Pekerjaan</th>
      <th>Penghasilan</th>
      <th>Kebutuhan Khusus</th>
      <th>Action</th>
    </tr>

    @foreach($guardian_data as $gd)
    <tr>

      <td>{{$gd->hubungan}}</td>
      <td>{{$gd->nama_wali}}</td>
      <td>{{$gd->no_hp_wali}}</td>
      <td>{{$gd->email_wali}}</td>
      <td>{{$gd->alamat_wali}}</td>
      <td>{{$gd->pekerjaan}}</td>
      <td>{{$gd->penghasilan}}</td>
      <td>{{$gd->kebutuhan_khusus}}</td>
      <td>
        <form action="{{url('admin/students/'.$student->KD.'/delete-guardian-data')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$gd->id}}">
          <button rel="tooltip" class="btn btn-success btn-link" type="button" onclick="edit_guardian_data(this)" data-guardian="{{$gd}}">
            <i class="material-icons">edit</i>
            <div class="ripple-container"></div>
            Edit
          </button>
          <button type="submit" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
            <i class="material-icons">close</i>
            <div class="ripple-container"></div>
            Delete
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  <div class="row mt-5 form-group">
    <div class="col-lg-12 text-center">
      <h4 id="form-guardian-data-title">Tambah Data Wali</h4>
    </div>
  </div>
  <form action="{{url('admin/students/'.$student->KD.'/add-guardian-data')}}" enctype="multipart/form-data" id="form-guardian-data" method="post">
    @csrf
    <input type="hidden" name="KD" id="KD" value="{{$student->KD}}">
    <input type="hidden" name="id" id="id" value="">
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Hubungan</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('hubungan') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="hubungan" id="hubungan" >
          @if ($errors->has('hubungan'))
          <span id="harga-error" class="error hubungan-danger" for="input-hubungan">{{ $errors->first('hubungan') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('nama_wali') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="nama_wali" id="nama_wali" >
          @if ($errors->has('nama_wali'))
          <span id="harga-error" class="error nama_wali-danger" for="input-nama_wali">{{ $errors->first('nama_wali') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">No. HP</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('no_hp_wali') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="no_hp_wali" id="no_hp_wali" >
          @if ($errors->has('no_hp_wali'))
          <span id="harga-error" class="error no_hp_wali-danger" for="input-no_hp_wali">{{ $errors->first('no_hp_wali') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('email_wali') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="email_wali" id="email_wali" >
          @if ($errors->has('email_wali'))
          <span id="harga-error" class="error email_wali-danger" for="input-email_wali">{{ $errors->first('email_wali') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('alamat_wali') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" >
          @if ($errors->has('alamat_wali'))
          <span id="harga-error" class="error alamat_wali-danger" for="input-alamat_wali">{{ $errors->first('alamat_wali') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Pekerjaan</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" >
          @if ($errors->has('pekerjaan'))
          <span id="harga-error" class="error pekerjaan-danger" for="input-pekerjaan">{{ $errors->first('pekerjaan') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Penghasilan</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('penghasilan') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="penghasilan" id="penghasilan" >
          @if ($errors->has('penghasilan'))
          <span id="harga-error" class="error AGAMA-penghasilan" for="input-penghasilan">{{ $errors->first('penghasilan') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <label class="col-sm-2 col-form-label">Kebutuhan Khusus</label>
      <div class="col-sm-7 ">
        <div class="form-group{{ $errors->has('kebutuhan_khusus') ? ' has-danger' : '' }}" >
          <input type="text" class="form-control" name="kebutuhan_khusus" id="kebutuhan_khusus" >
          @if ($errors->has('kebutuhan_khusus'))
          <span id="harga-error" class="error kebutuhan_khusus-danger" for="input-kebutuhan_khusus">{{ $errors->first('kebutuhan_khusus') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-12 text-center">
        <button type="button" class="btn btn-secondary" id="guardian-data-cancel-btn" onclick="cancel_guardian_data()" style="display:none;">Cancel</button><button class="btn btn-primary" id="guardian-data-btn">Add</button>
      </div>
    </div>
  </form>
</div>
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
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
 var token = $("input[name='_token']").val();
 var type = "student-candidate";
 var page = null;
 var REF_NEGARA = "{{$student->REF_NEGARA}}";
 var REF_PULAU = "{{$student->REF_PULAU}}";
 var REF_PROVINSI = "{{$student->REF_PROVINSI}}";
 var REF_KOTA = "{{$student->REF_KOTA}}";
 var REF_KEC = "{{$student->REF_KEC}}";
 var REF_KEL = "{{$student->REF_KEL}}";
 var registration_details = {!!json_encode($registration_details)!!};

 $(document).ready(function(){
  var inputFiles  = document.getElementsByClassName('form-file-upload');
  for(var i = 0; i < inputFiles.length; i++){
    inputFiles[i].addEventListener('click',function(){
      $(this).find('.inputFileHidden')[0].click();

    });
  }
});

 $('.inputFileHidden').change(function (e) {
  var text_value = this.value;
  $($(e.target.parentElement)[0]).find('.inputFileVisible')[0].value = text_value.replace(/C:\\fakepath\\/i, '');
});
 $(document).ready(function(){
  if(REF_NEGARA != ""){
    island_ajax(REF_NEGARA,REF_PULAU);
  }

});
 $('.selectize').selectize();
 $("#Student_type").on('change',function(){
  $('#hide-content').show();
  if($(this).val() == "image") {
    $('#hide-text').hide();
    $('#hide-image').show();
  }else{
    $('#hide-image').hide();
    $('#hide-text').show();
  }
});

 function open_regis_detail(){

 }
 function open_packet_detail(){

 }
 function open_guardian_data(){

 }

 function open_student_list(){
  $('#mymodal').modal('toggle');
  var keyword = $('#filter_keyword').val();
  $.ajax({
    url:"{{route('admin-student.lists')}}",
    method:"GET",
    data: {
      _token: token,
      type:type,
      keyword:keyword
    },
    success: function(data) {
      $('#student-list-output').html(data);
    },
    error:function(){

    }
  });
}

var filter_func = function(){
  var keyword = $('#filter_keyword').val();
  $.ajax({
    url : "{{route('admin-student.lists')}}",
    method: "GET",
    data : {
      _token : token,
      keyword : keyword,
      page:page,
      type: type
    },
    success: function(data){
      $('#student-list-output').html(data);
    },
    error: function(){

    },complete: function(){

    }
  });

};
var keyword_keyup = debounce(filter_func, 350);

document.getElementById('filter_keyword').addEventListener('keyup', keyword_keyup);
document.getElementById('filter-btn').addEventListener('click', filter_func);

function filter_func_pagination(no){
  page = no;
  filter_func();
}

function select_student(e){
  var data_student = JSON.parse(e.getAttribute("data-student"));
  console.log(data_student);
  $.ajax({
    url : "{{route('admin-student.check-student-exist')}}",
    method : "GET",
    data:{
      _token:token,
      NAMA : data_student.NAMA,
      REF_NIK : data_student.REF_NIK,
      EMAIL : data_student.EMAIl
    },success:function(data){
      $('#mymodal').modal('toggle');
      $('#REF_SISWA').val(data_student.KD);
      $('#NAMA').val(data_student.NAMA);
      $('#JK').val(data_student.JK);
      $('#EMAIL').val(data_student.EMAIL);
      $('#KONTAK_1').val(data_student.KONTAK_1);
      $('#KONTAK_2').val(data_student.KONTAK_2);
      $('#KONTAK_3').val(data_student.KONTAK_3);
      $('#REF_NIK').val(data_student.REF_KTP);
      $('#TGL_LAHIR').val(data_student.TGL_LAHIR);
      $('#ALAMAT').val(data_student.ALAMAT);
      $('#REF_NPWP').val(data_student.REF_NPWP);
      $('#AGAMA').val(data_student.AGAMA);
      if(data_student.REF_NEGARA != null){
       island_ajax(data_student.REF_NEGARA);
     }else{
      island_ajax("INDONESIA");
    }
    $('#OCCLVL').val(data_student.TINGKAT_PEKERJAAN);
    $('#OCCSEC').val(data_student.SEKTOR_PEKERJAAN);
    $('#OCCSEC').val(data_student.SEKTOR_PEKERJAAN);
    $('#EDUC').val(data_student.TINGKAT_PENDIDIKAN);
    $('#COUNTRY').val(data_student.NEGARA_TUJUAN);
    $('#PURPOSE').val(data_student.ALASAN);
    if(data_student.KONTAK != ""){
      $('#KONTAK_1').val(data_student.KONTAK);
    }
  },error:function(){

  }
});

}

$('#REF_NEGARA').on('change',function(){
  island_ajax($(this).val());
  $('#REF_PROVINSI').val("");
  $('#REF_KOTA').val("");
  $('#REF_KEC').val("");
  $('#REF_KEL').val("");
});

function island_ajax(REF_NEGARA,REF_PULAU = null){

  $.ajax({
    url: "{{route('island-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_NEGARA : REF_NEGARA
    },
    success: function(data) {
      $('#REF_PULAU').selectize()[0].selectize.destroy();

      var $select = $('#REF_PULAU').selectize({
        options : data,
        valueField: 'NAMA',
        labelField: 'NAMA',
        searchField: 'NAMA',
      });
      var selectize = $select[0].selectize;
      if(REF_PULAU != null){
        selectize.setValue(REF_PULAU);
      }
      return true;
    },
    error: function(request, status, error) {
      alert(request.responseText);
      return false;
    }
  });

}

$('#REF_PULAU').on('change',function(){
  if(REF_PROVINSI != ""){     
    province_ajax($(this).val(),REF_PROVINSI);
  }else{   
    province_ajax($(this).val());
  }
});

function province_ajax(REF_PULAU,REF_PROVINSI = null){

  $.ajax({
    url: "{{route('province-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_NEGARA : $('#REF_NEGARA').val(),
      REF_PULAU : REF_PULAU
    },
    success: function(data) {
     $('#REF_PROVINSI').selectize()[0].selectize.destroy();

     var $select = $('#REF_PROVINSI').selectize({
      options : data,
      valueField: 'NAMA',
      labelField: 'NAMA',
      searchField: 'NAMA',
    });
     var selectize = $select[0].selectize;
     if(REF_PROVINSI != null){

      selectize.setValue(REF_PROVINSI);
    }
    return true;
  },
  error: function(request, status, error) {
    alert(request.responseText);
    return false;
  }
});

}

$('#REF_PROVINSI').on('change',function(){
 if(REF_KOTA != ""){     
  city_ajax($(this).val(),REF_KOTA);
}else{
  city_ajax($(this).val());
}
});

function city_ajax(REF_PROVINSI,REF_KOTA = null){

  $.ajax({
    url: "{{route('city-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_PROVINSI : REF_PROVINSI
    },
    success: function(data) {
      $('#REF_KOTA').selectize()[0].selectize.destroy();

      var $select = $('#REF_KOTA').selectize({
        options : data,
        valueField: 'NAMA',
        labelField: 'NAMA',
        searchField: 'NAMA',
      });
      var selectize = $select[0].selectize;
      if(REF_KOTA != null){
        selectize.setValue(REF_KOTA);
      }
      return true;
    },
    error: function(request, status, error) {
      alert(request.responseText);
      return false;
    }
  });

}

$('#REF_KOTA').on('change',function(){
 if(REF_KEC != ""){     
  district_ajax($(this).val(),REF_KEC);
}else{
 district_ajax($(this).val());
}
});

function district_ajax(REF_KOTA,REF_KEC = null){

  $.ajax({
    url: "{{route('district-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_KOTA : REF_KOTA
    },
    success: function(data) {
      $('#REF_KEC').selectize()[0].selectize.destroy();

      var $select = $('#REF_KEC').selectize({
        options : data,
        valueField: 'NAMA',
        labelField: 'NAMA',
        searchField: 'NAMA',
      });
      var selectize = $select[0].selectize;
      if(REF_KEC != null){
        selectize.setValue(REF_KEC);
      }
      return true;
    },
    error: function(request, status, error) {
      alert(request.responseText);
      return false;
    }
  });

}

$('#REF_KEC').on('change',function(){
 if(REF_KEL != ""){     
  sub_district_ajax($(this).val(),REF_KEL);
}else{
  sub_district_ajax($(this).val());
}
});

function sub_district_ajax(REF_KEC,REF_KEL = null){

  $.ajax({
    url: "{{route('sub-district-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_KEC : REF_KEC
    },
    success: function(data) {
     $('#REF_KEL').selectize()[0].selectize.destroy();

     var $select = $('#REF_KEL').selectize({
      options : data,
      valueField: 'NAMA',
      labelField: 'NAMA',
      searchField: 'NAMA',
    });
     var selectize = $select[0].selectize;
     if(REF_KEL != null){
      selectize.setValue(REF_KEL);
    }
    return true;
  },
  error: function(request, status, error) {
    alert(request.responseText);
    return false;
  }
});

}

$('#regis-detail input').on('focus',function(){
  var arr_sugestion = [];
  var input_name = $(this).attr('name');
  var output = '';
  var elm = $(this);

  $('#regis-detail-suggestion').html("");
  $.each(registration_details,function(k,v){
    if(v.hasOwnProperty(input_name)){
      var value = v[input_name];
      if(arr_sugestion.indexOf(value) === -1 && value != null){
        arr_sugestion.push(value);
        output+= '<div class="suggestion-list" onclick="select_suggestion(`'+input_name+'`,`'+value+'`)">'+value+'</div>';
        console.log(output);
      } 
    }
  });

  $('#regis-detail-suggestion').html(output);
  console.log(elm);
  var childPos = elm.offset();
  var parentPos = $('#regis-detail').offset();
  var childOffset = {
    top: childPos.top - parentPos.top + elm.parent().outerHeight() + 15,
    left: childPos.left - parentPos.left + 20
  }
  $('#regis-detail-suggestion').show();
  $('#regis-detail-suggestion').css({
    'width' : elm.parent().outerWidth()+"px",
    'top' : childOffset.top+"px",
    'left' : childOffset.left+"px",
  });
});

$('#regis-detail input').on('focusout',function(){
 $('#regis-detail-suggestion').hide();
});
$('#regis-detail input').blur(function(){
 $('#regis-detail-suggestion').hide();
});
function select_suggestion(name,value){
  document.getElementById(name).value = value;
  $('#regis-detail-suggestion').hide();
}

function edit_guardian_data(e){
  $('#form-guardian-data-title').html("Edit Data Wali");
  $('#guardian-data-cancel-btn').show();
  $('#guardian-data-btn').html("Update");
  var data_guardian = JSON.parse(e.getAttribute('data-guardian'));
  var prev_action = document.getElementById('form-guardian-data').action;
  document.getElementById('form-guardian-data').action = prev_action.replace('add','edit'); 
  $.each(data_guardian,function(k,v){
    $('#form-guardian-data #'+k).val(v);
  });
}
function cancel_guardian_data(){
  $('#form-guardian-data-title').html("Tambah Data Wali");
  $('#guardian-data-btn').html("Add");
  var KD = $('#form-guardian-data #KD').val();
  $('#form-guardian-data')[0].reset();
  $('#form-guardian-data #KD').val(KD);
  $('#guardian-data-cancel-btn').hide();
  var prev_action = document.getElementById('form-guardian-data').action;
  document.getElementById('form-guardian-data').action = prev_action.replace('edit','add'); 
}
</script>
@endpush
