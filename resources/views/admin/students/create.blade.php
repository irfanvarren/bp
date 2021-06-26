@extends('layouts.app-auth', ['activePage' => '', 'titlePage' => __('Student'),'activeMenu' => ''])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
  #online-place-data input{
    background: #d2d2d2;
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
        <form method="post" action="{{route('admin-student.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <input type="hidden" name="user_id" id="user_id">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Student') }}</h4>
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
                    <div class="col-lg-12">
                      <button class="w-100 btn-primary btn" type="button" onclick="open_student_list()">Ambil dari calon siswa</button>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Kode') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('KD') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="KD" id="KD" value="{{$KD}}">
                        <input type="hidden" id="REF_SISWA" name="REF_SISWA" value="">
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
                        <input type="text" class="form-control" name="NAMA" id="NAMA">
                        @if ($errors->has('NAMA'))
                        <span id="harga-error" class="error NAMA-danger" for="input-NAMA">{{ $errors->first('NAMA') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Kota Kelahiran') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('KOTA_KELAHIRAN') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" name="KOTA_KELAHIRAN" id="KOTA_KELAHIRAN">
                        @if ($errors->has('KOTA_KELAHIRAN'))
                        <span id="harga-error" class="error KOTA_KELAHIRAN-danger" for="input-KOTA_KELAHIRAN">{{ $errors->first('KOTA_KELAHIRAN') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Tanggal Lahir') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('TGL_LAHIR') ? ' has-danger' : '' }}">
                        <input type="date" class="form-control" name="TGL_LAHIR" id="TGL_LAHIR" required>
                        @if ($errors->has('TGL_LAHIR'))
                        <span id="harga-error" class="error TGL_LAHIR-danger" for="input-TGL_LAHIR">{{ $errors->first('TGL_LAHIR') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Agama') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('AGAMA') ? ' has-danger' : '' }}">
                        <select class="form-control" name="AGAMA" id="AGAMA">
                          <option value=""> - Pilih Agama - </option>
                          <option value="BUDDHA">BUDDHA</option>
                          <option value="ISLAM">ISLAM</option>
                          <option value="HINDU">HINDU</option>
                          <option value="PROTESTAN">PROTESTAN</option>
                          <option value="KATOLIK">KATOLIK</option>
                          <option value="KONGHUCU">KONGHUCU</option>
                        </select>
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
                        <div class="form-check-inline">
                          <label class="form-check-label mr-3">
                            <input type="radio" class="form-check-input" name="JK" id="JK_LAKI-LAKI" value="LAKI-LAKI"> Laki - Laki
                          </label>
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="JK" id="JK_PEREMPUAN" value="PEREMPUAN"> Perempuan
                          </label>
                        </div>
                        
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
                        <input type="text" class="form-control" name="EMAIL" id="EMAIL">
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
                        <input type="text" class="form-control" name="REF_NIK" id="REF_NIK">
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
                        <input type="text" class="form-control" name="REF_NPWP" id="REF_NPWP">
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
                        <input type="text" class="form-control" name="REF_AKTA" id="REF_AKTA">
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
                        <input type="text" class="form-control" name="REF_PASPOR" id="REF_PASPOR">
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
                      <img src="">
                      <input type="file" name="FILE_PIC" id="FILE_PIC">
                    </div>
                    <div class="col-lg-12 p-3" style="border:1px solid black">
                     <div class="row mb-3">
                      <div class="col-sm-3">{{ __('Alamat') }}</div>
                      <div class="col-sm-9">
                        <div class="form-group{{ $errors->has('ALAMAT') ? ' has-danger' : '' }}">
                          <input type="text" class="form-control" name="ALAMAT" id="ALAMAT">
                          @if ($errors->has('ALAMAT'))
                          <span id="harga-error" class="error ALAMAT-danger" for="input-ALAMAT">{{ $errors->first('ALAMAT') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">{{ __('Kode Pos') }}</div>
                      <div class="col-sm-9">
                        <div class="form-group{{ $errors->has('KODE_POS') ? ' has-danger' : '' }}">
                          <input type="text" class="form-control" name="KODE_POS" id="KODE_POS">
                          @if ($errors->has('KODE_POS'))
                          <span id="harga-error" class="error KODE_POS-danger" for="input-KODE_POS">{{ $errors->first('KODE_POS') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">{{ __('RT / RW') }}</div>
                      <div class="col-sm-9">
                        <div class="form-group{{ $errors->has('RT_RW') ? ' has-danger' : '' }}">
                          <input type="text" class="form-control" name="RT_RW" id="RT_RW">
                          @if ($errors->has('RT_RW'))
                          <span id="harga-error" class="error RT_RW-danger" for="input-RT_RW">{{ $errors->first('RT_RW') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">{{ __('Dusun') }}</div>
                      <div class="col-sm-9">
                        <div class="form-group{{ $errors->has('DUSUN') ? ' has-danger' : '' }}">
                          <input type="text" class="form-control" name="DUSUN" id="DUSUN">
                          @if ($errors->has('DUSUN'))
                          <span id="harga-error" class="error DUSUN-danger" for="input-DUSUN">{{ $errors->first('DUSUN') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div style="display: none" id="online-place-data">
                      <div class="row mb-3">
                        <div class="col-sm-12">
                          <hr>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-3">{{ __('Desa / Kelurahan') }}</div>
                        <div class="col-sm-9">
                          <div class="form-group{{ $errors->has('DESA_KELURAHAN') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" name="DESA_KELURAHAN" id="DESA_KELURAHAN" disabled>
                            @if ($errors->has('DESA_KELURAHAN'))
                            <span id="harga-error" class="error DESA_KELURAHAN-danger" for="input-DESA_KELURAHAN">{{ $errors->first('DESA_KELURAHAN') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-3">{{ __('Kota') }}</div>
                        <div class="col-sm-9">
                          <div class="form-group{{ $errors->has('KOTA') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" name="KOTA" id="KOTA" disabled>
                            @if ($errors->has('KOTA'))
                            <span id="harga-error" class="error KOTA-danger" for="input-KOTA">{{ $errors->first('KOTA') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-12">
                          <small>Data desa / kelurahan dan kota diatas tidak akan disimpan silahkan input kembali dibawah </small>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-3">
                        Negara
                      </div>
                      <div class="col-lg-9">
                        <select class="selectize form-control" id="REF_NEGARA" name="REF_NEGARA">
                          <option value=""> - Pilih Negara -</option>
                          @foreach($countries as $country)
                          <option value="{{strtoupper($country->name)}}" {{strtoupper($country->name) == "INDONESIA" ? 'selected' : ''}}>{{$country->name}}</option>
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
                        @foreach($islands as $island)
                        <option value="{{strtoupper($island->NAMA)}}" >{{$island->NAMA}}</option>
                        @endforeach
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
  <button type="submit" class="btn btn-primary">{{ __('Add Student') }}</button>
</div>
</div>
</form>
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

  function select_student_list(e){
    var data_student = JSON.parse(e.getAttribute("data-student"));
    $.ajax({
      url : "{{route('admin-student.check-student-exist')}}",
      method : "GET",
      data:{
        _token:token,
        NAMA : data_student.NAMA,
        REF_NIK : data_student.REF_NIK,
        EMAIL : data_student.EMAIl
      },success:function(data){
        console.log(data_student);
        $('#mymodal').modal('toggle');
        $('#user_id').val(data_student.users_id);
        $('#REF_SISWA').val(data_student.KD);
        $('#NAMA').val(data_student.NAMA);
        if(data_student.JK != null){
          var JK = data_student.JK.replace(/\s/g,'').toUpperCase();
          if(JK == "LAKI-LAKI" || JK == "MALE"){
            document.getElementById('JK_LAKI-LAKI').checked = true;
          }else if(JK == "PEREMPUAN" || JK == "FEMALE"){
            document.getElementById('JK_PEREMPUAN').checked = true;
          }
        }
        $('#EMAIL').val(data_student.EMAIL);
        $('#KONTAK_1').val(data_student.KONTAK_1);
        $('#KONTAK_2').val(data_student.KONTAK_2);
        $('#KONTAK_3').val(data_student.KONTAK_3);
        $('#REF_NIK').val(data_student.REF_KTP);
        $('#KOTA_KELAHIRAN').val(data_student.KOTA_KELAHIRAN);
        $('#TGL_LAHIR').val(data_student.TGL_LAHIR);
        $('#ALAMAT').val(data_student.ALAMAT);
        $('#REF_NPWP').val(data_student.REF_NPWP);
        $('#REF_PASPOR').val(data_student.REF_PASPOR);
        if(data_student.AGAMA != null){
          var AGAMA = data_student.AGAMA.toUpperCase();
          if(AGAMA == "BUDHA"){
            AGAMA = "BUDDHA";
          }else if(AGAMA == "KATHOLIK"){
            AGAMA = "KATOLIK";
          }else if(AGAMA == "KRISTEN"){
            AGAMA = "PROTESTAN";
          }

        $('#AGAMA').val(AGAMA);
        }
        $('#KODE_POS').val(data_student.POSTAL_CODE);
        $('#RT_RW').val(data_student.RT_RW);
        
        $('#DUSUN').val(data_student.DUSUN);
        if(data_student.DESA_KELURAHAN != null || data_student.KOTA != null){
          $('#online-place-data').show();
        }else{
          $('#online-place-data').hide();
        }
        $('#DESA_KELURAHAN').val(data_student.DESA_KELURAHAN);
        if(data_student.KOTA != null){
          $('#KOTA').val(data_student.KOTA);
        }else if(data_student.REF_KOTA != null){
          $('#KOTA').val(data_student.REF_KOTA)
        }
        if(data_student.REF_NEGARA != null){
         island_ajax(data_student.REF_NEGARA);
         var $select = $('#REF_NEGARA').selectize();
         var selectize = $select[0].selectize;
         selectize.setValue(data_student.REF_NEGARA);
         
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
  });

  function island_ajax(REF_NEGARA){

    $.ajax({
      url: "{{route('island-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        REF_NEGARA : REF_NEGARA
      },
      success: function(data) {
        var $select = $('#REF_PULAU').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        //selectize.addOption({value : "", text : "Select School"});
        $.each(data,function(k,v){
         selectize.addOption({value : v.NAMA,text : v.NAMA});

       });
        selectize.refreshOptions();
        return true;
      },
      error: function(request, status, error) {
        alert(request.responseText);
        return false;
      }
    });

  }

  $('#REF_PULAU').on('change',function(){
    province_ajax($(this).val());
  });

  function province_ajax(REF_PULAU){

    $.ajax({
      url: "{{route('province-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        REF_NEGARA : $('#REF_NEGARA').val(),
        REF_PULAU : REF_PULAU
      },
      success: function(data) {
        var $select = $('#REF_PROVINSI').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        //selectize.addOption({value : "", text : "Select School"});
        $.each(data,function(k,v){
         selectize.addOption({value : v.NAMA,text : v.NAMA});

       });
        selectize.refreshOptions();
        return true;
      },
      error: function(request, status, error) {
        alert(request.responseText);
        return false;
      }
    });

  }

  $('#REF_PROVINSI').on('change',function(){
    city_ajax($(this).val());
  });

  function city_ajax(REF_PROVINSI){

    $.ajax({
      url: "{{route('city-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        REF_PROVINSI : REF_PROVINSI
      },
      success: function(data) {
        var $select = $('#REF_KOTA').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        //selectize.addOption({value : "", text : "Select School"});
        $.each(data,function(k,v){
         selectize.addOption({value : v.NAMA,text : v.NAMA});

       });
        selectize.refreshOptions();
        return true;
      },
      error: function(request, status, error) {
        alert(request.responseText);
        return false;
      }
    });

  }

  $('#REF_KOTA').on('change',function(){
    district_ajax($(this).val());
  });

  function district_ajax(REF_KOTA){

    $.ajax({
      url: "{{route('district-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        REF_KOTA : REF_KOTA
      },
      success: function(data) {
        var $select = $('#REF_KEC').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        //selectize.addOption({value : "", text : "Select School"});
        $.each(data,function(k,v){
         selectize.addOption({value : v.NAMA,text : v.NAMA});

       });
        selectize.refreshOptions();
        return true;
      },
      error: function(request, status, error) {
        alert(request.responseText);
        return false;
      }
    });

  }

  $('#REF_KEC').on('change',function(){
    sub_district_ajax($(this).val());
  });

  function sub_district_ajax(REF_KEC){

    $.ajax({
      url: "{{route('sub-district-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        REF_KEC : REF_KEC
      },
      success: function(data) {
        console.log(data);
        var $select = $('#REF_KEL').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        //selectize.addOption({value : "", text : "Select School"});
        $.each(data,function(k,v){
         selectize.addOption({value : v.NAMA,text : v.NAMA});

       });
        selectize.refreshOptions();
        return true;
      },
      error: function(request, status, error) {
        alert(request.responseText);
        return false;
      }
    });

  }
</script>
@endpush
