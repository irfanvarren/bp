@extends('layouts.app-auth', ['activePage' => 'admin.certificate', 'titlePage' => __('Certificate'),'activeMenu' => 'home-management'])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin-certificate.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <input type="hidden" name="DATA_NILAI" id="DATA_NILAI">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Certificate') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-certificate.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('No Sertifikat') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('KD_GABUNG') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('KD_GABUNG') ? ' is-invalid' : '' }}" name="KD_GABUNG" id="KD_GABUNG" type="text" placeholder="{{ __('No Sertifikat') }}" value="{{ old('KD_GABUNG') }}" required />
                    @if ($errors->has('KD_GABUNG'))
                    <span id="harga-error" class="error text-danger" for="input-KD_GABUNG">{{ $errors->first('harga') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Paket') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('REF_PAKET') ? ' has-danger' : '' }}">
                    <select class="form-control selectize" name="REF_PAKET" id="REF_PAKET" onchange="set_certificate_code()">
                      <option value="">- Pilih Paket</option>
                      @foreach($packets as $packet)
                      <option value="{{$packet->KD}}">{{$packet->NAMA}}</option>
                      @endforeach
                    </select>

                    @if ($errors->has('REF_PAKET'))
                    <span id="harga-error" class="error text-danger" for="input-REF_PAKET">{{ $errors->first('harga') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Level') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('REF_LEVEL') ? ' has-danger' : '' }}">
                    <select class="form-control selectize" name="REF_LEVEL" id="REF_LEVEL" onchange="set_certificate_code()">
                      <option value=""> - Pilih Level - </option>
                      @foreach($levels as $level)
                      <option value="{{$level->KD}}">{{$level->NAMA}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('REF_LEVEL'))
                    <span id="harga-error" class="error text-danger" for="input-REF_LEVEL">{{ $errors->first('harga') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Siswa') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('NAMA') ? ' has-danger' : '' }}">
                    <select class="form-control selectize" name="NAMA" id="NAMA">
                      <option value=""> - Pilih Siswa -</option>
                      @foreach($students as $student)
                      <option value="{{$student->KD}}">{{$student->KD}} - {{$student->NAMA}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('NAMA'))
                    <span id="harga-error" class="error text-danger" for="input-NAMA">{{ $errors->first('NAMA') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Tgl Sertifikat') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('TGL') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('TGL') ? ' is-invalid' : '' }}" name="TGL" id="input-TGL" type="date" value="{{ old('TGL') }}" required />
                    @if ($errors->has('TGL'))
                    <span id="harga-error" class="error text-danger" for="input-TGL">{{ $errors->first('TGL') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Keterangan') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('KET') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('KET') ? ' is-invalid' : '' }}" name="KET" id="input-KET" type="text" value="{{ old('KET') }}" required />
                    @if ($errors->has('KET'))
                    <span id="harga-error" class="error text-danger" for="input-KET">{{ $errors->first('KET') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Overall Feedback') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('FEEDBACK') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('FEEDBACK') ? ' is-invalid' : '' }}" name="FEEDBACK" id="input-FEEDBACK" type="text" value="{{ old('FEEDBACK') }}" required />
                    @if ($errors->has('FEEDBACK'))
                    <span id="harga-error" class="error text-danger" for="input-FEEDBACK">{{ $errors->first('FEEDBACK') }}</span>
                    @endif
                  </div>
                </div>
              </div>


              <div class="card ">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ __('Add Score') }}</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="table-nilai">
                          <tr>
                            <th>Kriteria</th> <th>Nilai</th><th>Test Module</th> <th>Feedback</th><th>Action</th>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">



                      <div class="row">
                        <input type="hidden" id="index_nilai">
                        <label class="col-sm-2 col-form-label">{{ __('Kriteria') }}</label>
                        <div class="col-sm-10">
                          <div class="form-group{{ $errors->has('REF_KRITERIA') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('REF_KRITERIA') ? ' is-invalid' : '' }}" name="REF_KRITERIA" id="REF_KRITERIA" type="text" value="{{ old('REF_KRITERIA') }}" />
                            @if ($errors->has('REF_KRITERIA'))
                            <span id="harga-error" class="error text-danger" for="REF_KRITERIA">{{ $errors->first('REF_KRITERIA') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Nilai') }}</label>
                        <div class="col-sm-10">
                          <div class="form-group{{ $errors->has('NILAI') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('NILAI') ? ' is-invalid' : '' }}" name="NILAI" id="NILAI" type="text" value="{{ old('NILAI') }}" />
                            @if ($errors->has('NILAI'))
                            <span id="harga-error" class="error text-danger" for="NILAI">{{ $errors->first('NILAI') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Test Module') }}</label>
                        <div class="col-sm-10">
                          <div class="form-group{{ $errors->has('TEST_MODULE') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('TEST_MODULE') ? ' is-invalid' : '' }}" name="TEST_MODULE" id="TEST_MODULE" type="text" value="{{ old('TEST_MODULE') }}" />
                            @if ($errors->has('TEST_MODULE'))
                            <span id="harga-error" class="error text-danger" for="TEST_MODULE">{{ $errors->first('TEST_MODULE') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Feedback') }}</label>
                        <div class="col-sm-10">
                          <div class="form-group{{ $errors->has('FEEDBACK') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('FEEDBACK') ? ' is-invalid' : '' }}" name="FEEDBACK2" id="FEEDBACK" type="text" value="{{ old('FEEDBACK') }}" />
                            @if ($errors->has('FEEDBACK'))
                            <span id="harga-error" class="error text-danger" for="FEEDBACK">{{ $errors->first('FEEDBACK') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 text-center">
                      <button class="btn btn-primary" id="btn-nilai" value="add" onclick="add_nilai()" type="button" style="">Tambah Nilai</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Certificate') }}</button>
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
  $('.selectize').selectize();

  var data_nilai = [];

  function set_certificate_code(){

    var KD_1 = 'BPE';
    var KD_2 = $('#REF_PAKET').val();
    var KD_3 = $('#REF_LEVEL').val();
    var KD_4 = '{{date("Y")}}';
    var KD_5 = '{{date("m")}}';
    var KD_6 = '{{$certificate_num}}';
    var KD_GABUNG = KD_1;
    if(KD_2 != ""){
      KD_GABUNG += "/"+KD_2;
    }
    if(KD_3 != ""){
      KD_GABUNG += "/"+KD_3;
    }
    if(KD_4 != ""){
      KD_GABUNG += "/"+KD_4;
    }
    if(KD_5 != ""){
      KD_GABUNG += "/"+KD_5;
    }
    if(KD_6 != ""){
      KD_GABUNG += "/"+KD_6;
    }
    $('#KD_GABUNG').val(KD_GABUNG);
  }


  function add_nilai(){
    var nilai = document.getElementById('NILAI');
    var kriteria = document.getElementById('REF_KRITERIA');
    var test_module = document.getElementById('TEST_MODULE');
    var feedback = document.getElementById('FEEDBACK');
    var cmd = document.getElementById('btn-nilai').getAttribute('value');
    var myTable = document.getElementById('table-nilai');
    if(cmd == "add"){
      if(nilai.value == "" || kriteria.value == ""){
        alert('Tolong isi kriteria dan nilai terlebih dahulu!');
        return false;
      }
      data_nilai.push({
        "nilai" : nilai.value,
        "kriteria" : kriteria.value,
        "test_module" : test_module.value,
        "feedback" : feedback.value,

      });
      var row = myTable.insertRow(myTable.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5  = row.insertCell(4);
      cell1.innerHTML = kriteria.value;
      cell2.innerHTML = nilai.value;
      cell3.innerHTML = test_module.value;
      cell4.innerHTML =  feedback.value;
      cell5.innerHTML = '<button class="btn btn-link btn-success" type="button" onclick="edit_nilai('+(myTable.rows.length - 1)+')">Edit</button><button class="btn btn-link btn-danger" onclick="delete_nilai('+(myTable.rows.length - 1)+')" type="button">Delete</button>';
    }else if(cmd == "update"){
      var index = document.getElementById('index_nilai').value;
      data_nilai[index-1].nilai = nilai.value;
      data_nilai[index-1].kriteria = kriteria.value;
      data_nilai[index-1].test_module = test_module.value;
      data_nilai[index-1].feedback = feedback.value;
      myTable.rows[index].cells[0].innerHTML = kriteria.value;
      myTable.rows[index].cells[1].innerHTML = nilai.value;
      myTable.rows[index].cells[2].innerHTML = test_module.value;
      myTable.rows[index].cells[3].innerHTML = feedback.value;

    }
    console.log(JSON.stringify(data_nilai));
    $('#DATA_NILAI').val(JSON.stringify(data_nilai));
    kriteria.value = "";
    nilai.value = "";
    test_module.value = "";
    feedback.value= "";
    document.getElementById('btn-nilai').setAttribute("value","add");
    document.getElementById('btn-nilai').innerHTML = "add";
  }
  function edit_nilai(index){
    document.getElementById('REF_KRITERIA').value = data_nilai[index-1].kriteria;
    document.getElementById('NILAI').value = data_nilai[index-1].nilai;
    document.getElementById('TEST_MODULE').value = data_nilai[index-1].test_module;
    document.getElementById('FEEDBACK').value = data_nilai[index-1].feedback;
    document.getElementById('index_nilai').value = index;
    document.getElementById('btn-nilai').setAttribute("value","update");
    document.getElementById('btn-nilai').innerHTML = "update";
  }

  function delete_nilai(index){
    var myTable = document.getElementById('table-nilai');
    myTable.innerHTML = myTable.rows[0].innerHTML;
    data_nilai.splice((index-1),1);
    data_nilai.forEach(function(item,index){
     var row = myTable.insertRow(myTable.rows.length);
     var cell1 = row.insertCell(0);
     var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
     var cell4 = row.insertCell(3);
     var cell5 = row.insertCell(4);
     cell1.innerHTML = item.kriteria;
     cell2.innerHTML = item.nilai;
     cell3.innerHTML = item.test_module;
     cell4.innerHTML = item.feedback;
     cell5.innerHTML = '<button class="btn btn-link btn-success" type="button" onclick="edit_nilai('+(index + 1)+')">Edit</button><button class="btn btn-link btn-danger" onclick="delete_nilai('+(index + 1)+')" type="button">Delete</button>';
   });
    $('#DATA_NILAI').val(JSON.stringify(data_nilai));
  }


</script>
@endpush
