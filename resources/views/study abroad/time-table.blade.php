@extends('layouts.bp_wo_sidenav')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<style media="screen">
  .tt.content-wrapper{
    min-height:447px;
  }
  .select2{
    width:100% !important;
  }
  .tt-search-form{
    width:600px;
    margin:auto 0;
    position:absolute;
    text-align:center;
    top:40%;
    left:50%;
    transform:translate(-50%,-50%);
  }
  .tt-search-form h3{
    margin-bottom:.7rem;
  }
  .tt-search-form input{
    margin-top:15px;
    font-size:21px;
  }

  .select2-container .select2-selection--single,.select2-container--default .select2-selection--single .select2-selection__rendered ,.select2-container--default .seleect2-selection--single .select2-selection__arrow{
    height:40px;
    line-height:35px;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper tt">
  <form class="" action="time-table/search" method="get">

<div class="tt-search-form">
    <h3>Pilih Sekolah</h3>
  <select name="id_sekolah" class="form-control" id="id_sekolah" placeholder="Nama Sekolah" value="" required></select>
  <input type="submit" class="btn btn-primary form-control" value="Cari">
</div>

  </form>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script type="text/javascript">
$('#id_sekolah').select2({
   placeholder: 'Nama Sekolah...',
   ajax: {
     url:'/time-table/cariSekolah',
     dataType: 'json',
     delay: 250,
/*     transport:function(params,success,failure){
       var request = new AjaxRequest(params.url, params);
       request.on('success',success);
       request.on('failure',failure);
     },*/
    data:function(params){
       var query = {
         search:params.term,
         type: 'public'
       }
       return query;
     },
     processResults: function (data) {
       return {
         results:$.map(data,function(obj){
           return{
             id:obj.id_sekolah,
             text:obj.nama_sekolah
           };
         })
       };
     },
     cache: true
   }
 });
</script>
@stop
