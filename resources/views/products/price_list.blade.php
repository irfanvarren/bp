@extends('layouts.bp_wo_sidenav')
<style media="screen">
  @media screen and (max-width: 480px){
    .tb-pricelist{
      zoom:50%;
    }
  }
  .container{
    max-width: 100% !important;
  }
  .tb-pricelist tr th,.tb-pricelist tr td{
    vertical-align: middle !important;
    text-align:center;
  }
  .td-packet-name{
    padding:14px;
  }
  .td-packet-name:last-child{
    border-bottom: none;
  }
  .tb-pricelist th:last-child,
  .tb-pricelist td:last-child{
    width:250px;
  }
  .tb-pricelist th:nth-last-child(2),
  .tb-pricelist td:nth-last-child(2) {
    width:200px;
  }
  .tb-bank tr td,.tb-bank tr th{
    padding:5px 10px;
  }
  .accordion:first{
    margin-top:0;
  }
  .accordion {
    background-color: #e74c3c;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 17px;
    font-weight: bold;
    transition: 0.4s;
    margin-top:17.5px;
  }

  .accordion .active, .accordion:hover {
    background-color: #ccc;
  }

  .accordion:after {
    content: '\002B';
    color: white;
    font-weight: bold;
    float: right;
    margin-left: 5px;
  }

  .accordion .active:after {
    content: "\2212";
  }

  .panel {
    padding: 0 15px;
    background-color: white;
    max-height: 0;
    overflow:hidden;
    transition: max-height 0.1s ease-out;
  }
  .mytab{
    float:left !important;
    margin-top:15px;
    background:#4868DB;
    color:white;
    margin-bottom: 0;
  }
  .mytab .nav-link{
    background:#4868DB;
    color:white;
    height:100%;
    border:none !important;
    border-radius:0 !important;
  }
  .nav-tabs .nav-item{
    margin-bottom:0px !important;
  }
  .mytab .nav-link.active{
    background-color:#FFC100 !important;
    border:none !important;
    color:white !important;
  }
  .mytab .nav-link:hover{
    border:none;
    color:white !important;
  }


  .loading{
    position: fixed;
    top:0;
    width: 100%;
    height: 100%;
    left: 0;
    font-size:28px;
    text-align: center;
    background: rgba(255,255,255,0.8);
    z-index: 20;
    display: table;
    visibility: hidden;
  }
  .loading > div {
    display: table-cell;
    vertical-align: middle;
  }
  .product-tabs{
    padding:100px 3.5rem 100px 0 !important;
  }
  .product-tabs .tab{
    padding:8px 18px;
    color:white;
    font-family: "Roboto";
    font-size:18px;
    border-radius: 0 30px 30px 0;
  }
  .product-tabs .tab.active{
    background:#FFC100;
  }
  @media screen and (max-width:480px){
    .mytab{
      display: block !important;
    }
    .mytab .nav-link{
      height: auto;
    }
    .product-tabs{
     padding:20px 5rem 20px 0 !important;
     border-bottom:2px solid blue;
   }
 }


</style>
@section('content')
<div class="loading">
  <div>
    Loading...
  </div>
</div>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-3 product-tabs" style="background: rgb(69,104,220);background: linear-gradient(0deg, rgba(69,104,220,1) 0%, rgba(176,106,179,1) 57%);">
      @foreach($pricelists[0]->packets as $key => $packet)
      <div class="tab {{$key == 0 ? 'active' : ''}}" onclick="change_product('{{$pricelists[0]->KD}}','{{$packet->KD}}',this)"> {{ucwords(strtolower($packet->NAMA))}}</div>
      @endforeach
    </div>
    <div class="col-md-9">
      <div class="row">
       <div class="col-md-12">
        <div class="row">
          <ul class="nav nav-tabs mytab col-md-12 mt-0" id="myTab" role="tablist">
            @foreach($pricelists as $key => $pricelist)
            <li class="nav-item">
              <a class="nav-link {{$key == 0 ? 'active' : ''}}" id="account-tab" data-toggle="tab" href="#" role="tab" aria-controls="account" aria-selected="true" onclick="change_pricelist('{{$pricelist->KD}}')">{{$pricelist->name}}</a>
            </li>
            @endforeach
          </ul>
        </div>

        @csrf
        <div id="pricelist-output">

          <div id="pricelist-output">

            <div class="col-md-12" style="padding:0 !important;overflow-y:hidden;overflow-x: auto;">


         @if(count($pricelists[0]->packets[0]->details))
        <table class="tb-pricelist table table-bordered" style="margin:30px 0 !important;"> 
          <colgroup>
            <col width="27.5%">
          </colgroup>
          <thead>
            <tr>
            <th class="text-left">{{$pricelists[0]->packets[0]->details[0]->NAMA_PAKET}}</th><th>Duration</th><th>Category</th><th>Price</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pricelists[0]->packets[0]->details->groupBy('REF_LEVEL') as $key => $detail)
            <tr>
              <td rowspan="@if($detail->first()->REF_PAKET == 'TL.DOC') {{count($detail) + count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) + 1}} @else {{count($detail->groupBy('REF_KATEGORI')) * count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) + count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) + 1}} @endif"> <strong> {{$detail->first()->REF_PAKET}}{{$key}}</strong> {{$detail->first()->NAMA_PAKET}} - {{$detail->first()->NAMA_LEVEL}}</td>
      
            </tr>
            @foreach($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM') as $key_jam => $data_jam)
             <td rowspan="{{count($data_jam)+1}}">{{round($data_jam->first()->JUMLAH_JAM,2)}} Jam</td>
            @foreach($data_jam->where('JUMLAH_JAM')->groupBy('REF_KATEGORI') as $kategori)
            <tr>
             
              <td>{{$kategori->first()->NAMA_KATEGORI}}</td>
              <td>{{number_format($kategori->first()->HARGA_PAKET,2,',','.')}} IDR</td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
                  
          </tbody>
        </table>
        @else
        <h1 style="padding-top:15px"> <strong>No Pricelist Yet...</strong></h1>
        @endif
           
         </div>
       </div> 
     </div>
     <br>
     <table class="tb-bank" style="border:1px solid black; margin-bottom:15px;">
      <tr>
        <th colspan="2">Best Partner Bank Account</th>
      </tr>
      <tr>
        <td>Bank Name</td> <td>: Bank Central Asia</td>
      </tr>
      <tr>
        <td>Nama Rekening</td> <td>: Best Partner CV</td>
      </tr>
      <tr>
        <td>Nomor Rekening</td> <td>: 029 900 8144</td>
      </tr>
    </table>
  </div>
</div>

</div>
</div>
</div>

@stop
@push('more-script')
<script type="text/javascript">

  var token = $("input[name='_token']").val();

  function change_product(kd_pricelist,kd_product,el){
    $('.loading').css({
          'visibility' : 'visible'
        });
    $('.product-tabs .tab').removeClass('active');
   $(el).addClass('active');
$.ajax({
      url : "{{route('change-pricelist-product')}}",
      method : "POST",
      data: {_token:token,kd_pricelist : kd_pricelist,kd_product : kd_product},
      success: function(data) {
        var arr_data = data.split('##');
        $('#pricelist-output').html(arr_data[0]);
      },   error: function()
      {
         //handle errors
         alert('error...');
       }, complete: function(){
         $('.loading').css({
          'visibility' : 'hidden'
        });
       }
     });
  }

  function change_pricelist(kode_pricelist){
    $('.loading').css({
      'visibility' : 'visible'
    });
    $.ajax({
      url : "{{route('change-pricelist')}}",
      method : "POST",
      data: {_token:token,KD : kode_pricelist },
      success: function(data) {
        var arr_data = data.split('##');
        $('#pricelist-output').html(arr_data[0]);
        $('.product-tabs').html(arr_data[1]);
       
      },   error: function()
      {
         //handle errors
         alert('error...');
       }, complete: function(){
         $('.loading').css({
          'visibility' : 'hidden'
        });
       }
     });
  }


  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }

</script>
@endpush
