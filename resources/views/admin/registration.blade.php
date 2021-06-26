@extends('layouts.app-auth', ['activePage' => 'registration-data','activeMenu' => 'data-management', 'titlePage' => __('Registration Data')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
  .selectize-input input{
    padding:0 5px;
    border:none;
  }
</style>
<style media="screen">
  .loading-wrapper{
    width:100vw;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    z-index:9999999;
    display:none;
    background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
    display:block;
    margin:0 auto;
    width:500px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);

  }
  .form-group input[type=file]{
    position:relative !important;
    opacity:1 !important;
  }
  .table{
    font-size:14px;
  }
  .table th,.table td{
    padding:6px 8px;
  }
</style>
@endpush
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
            <h4 class="card-title ">{{ __('Registration Data') }}</h4>
            <p class="card-category"> {{ __('Registration Data Reports') }}</p>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    Pricelists
                  </div>
                  <div class="col-md-4">
                    <select class="selectize form-control" id="pricelist" name="pricelist">
                     <option value="">- Pilih Pricelists -</option>

                     @foreach($pricelists as $key => $value)
                     <option value="{{$value->KD}}">{{$value->KD}}</option>
                     @endforeach
                   </select>
                 </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                  Products
                </div>
                <div class="col-md-4">
                 <div class="form-group{{ $errors->has('course') ? ' has-danger' : '' }}">

                  <select required class="selectize form-control" id="course" name="course">
                    <option value="">- Pilih Course -</option>

                    @foreach($course as $key => $value)
                    <option value="{{$value->KD}}">{{$value->KD}} - {{$value->NAMA}}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('course'))
                  <span id="harga-error" class="error text-danger" for="input-course">{{ $errors->first('course') }}</span>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
               <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">

                <select required class="selectize form-control" id="level" name="level">
                  <option value="">- Pilih Level -</option>
                </select>

                @if ($errors->has('level'))
                <span id="harga-error" class="error text-danger" for="input-level">{{ $errors->first('level') }}</span>
                @endif
              </div>
            </div>

            <div class="col-md-4">
             <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">

              <select required class="selectize form-control" id="kategori" name="kategori">
                <option value="">- Pilih Category -</option>
              </select>

              @if ($errors->has('category'))
              <span id="harga-error" class="error text-danger" for="input-category">{{ $errors->first('category') }}</span>
              @endif
            </div>
          </div>


        </div>
        <div class="row">

         <div class="col-md-3">
          Tanggal Mulai
        </div>
        <div class="col-md-4">
          <div class="form-group bmd-form-group is-filled">
            <input type="text" class="form-control datepicker" placeholder="mm/dd/yyyy" name="start_date">
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-3">Tanggal Selesai</div>
        <div class="col-md-4">
          <div class="form-group bmd-form-group is-filled">
            <input type="text" class="form-control datepicker" placeholder="mm/dd/yyyy" name="start_date">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-primary" onclick="search()" type="button">Cari</button>
        </div>
      </div>
      <div class="row" style="margin-top:15px;">
        <div class="col-md-12">
          <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable">
            <thead>
              <tr>
                <th>Kode</th> 
                <th>Cabang</th>
                <th>Pricelist</th>
                <th>Paket</th>
                <th>Level</th>
                <th>Kategori</th> 
                <th>Nama</th> 
                <th>Email</th>
                <th>No Telepon</th>
                <th>No KTP</th>
                <th>Tanggal Daftar</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody></tbody>
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
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
  var url = "{{asset('storage')}}/";
   var token = $("input[name='_token']").val();
  $(document).ready(function() {
    $("#pricelist").change(function(){
      var pricelist_id = $(this).val();
      $.ajax({
       url: "<?php echo route('select-pricelist') ?>",
       method: 'POST',
       data: {pricelist_id:pricelist_id,_token:token},
       success: function(data) {
        data = JSON.parse(data);
        var $select = $('#course').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        selectize.addOption({value : "", text : "- Pilih Paket -"});
        $.each(data.courses,function(k,v){
         selectize.addOption({value : v.KD,text : v.KD+" - "+v.NAMA});
       });

      },   error: function()
      {
       alert('error...');
     }
   });
    });
    $("#course").change(function(){
      var course_id = $(this).val();
      var pricelist_id = $('#pricelist').val();

      var token = $("input[name='_token']").val();
      $.ajax({
       url: "<?php echo route('select-course') ?>",
       method: 'POST',
       data: {pricelist_id:pricelist_id,course_id:course_id,type:'with_level',_token:token},
       success: function(data) {
        data = JSON.parse(data);

        var $select = $('#level').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        selectize.addOption({value : "", text : "- Pilih Level -"});
        $.each(data.levels,function(k,v){
         selectize.addOption({value : v.KD,text : v.KD+" - "+v.NAMA});
       });


      },   error: function()
      {
       alert('error...');
     }
   });
    });

    $("#level").change(function(){
      var course_id = $(this).val();
      var pricelist_id = $('#pricelist').val();
      var course_id = $('#course').val();
      var level_id = $('#level').val();
      var token = $("input[name='_token']").val();
      $.ajax({
       url: "<?php echo route('select-level') ?>",
       method: 'POST',
       data: {pricelist_id:pricelist_id,course_id:course_id,level_id:level_id,_token:token},
       success: function(data) {
        data = JSON.parse(data);

        var $select = $('#kategori').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        selectize.addOption({value : "", text : "- Pilih Kategori -"});
        $.each(data,function(k,v){
         selectize.addOption({value : v.REF_KATEGORI,text : v.REF_KATEGORI+" - "+v.NAMA});
       });


      },error: function()
      {
       alert('error...');
     }
   });
    });


    var table = $('.datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "columns": [
      {data : "KD"}, 
      {data : "NAMA_PERUSAHAAN"}, 
      {data : "REF_PRICELIST"},
      {data : "NAMA_PAKET"}, 
      {data : "NAMA_LEVEL"},
      {data : "NAMA_KATEGORI"},
      {data : "NAMA"},
      {data : "EMAIL"},
      {data : "KONTAK"},
      {data : null},
      {data : "created_at"},
      {data : null}
      ],
      "ajax":{ 
        "url" : "{{route('regis-data-ajax')}}",
        "type" : "POST",
        "dataType": "JSON",

        "data" : {
          _token : "{{csrf_token()}}"
        },

        "dataSrc" : function(json){
          console.log(json.data);
          return json.data;
        },
      },
      "columnDefs": [ {
        "targets": -3,
        "data": null,
        "render": function ( data, type, row, meta ) {
          var output_render = '<div>'+row.REF_KTP+'</div>';
          if(row.PATH_KTP != "" && row.PATH_KTP != null){
            var url_ktp = url+row.PATH_KTP.split("/").splice(1).join("/");
            output_render += '<div> <a href="'+url_ktp+'" target="_blank"> Lihat ktp </div>';
          }
          return output_render;
        }
      },
      {
        "targets":-1,
        "data":null,
        "render": function(data,type,row,meta){
          var url_detail = "{{url('admin/registration-data')}}/"+row.KD+"/detail";
          return '<div><a href="'+url_detail+'">Details</a></div>';
        }
      }]
    });
  });

  $(document).ready( function () {
    $('.datepicker').datetimepicker({
      format:'L',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });
  });

    $('.selectize').selectize({
    width : 'resolve'
  });

</script>
@endpush
