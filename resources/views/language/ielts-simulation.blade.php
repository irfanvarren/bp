@extends('layouts.bp_wo_sidenav')
<style type="text/css">
  .dropdown-menu.bootstrap-datetimepicker-widget {
    opacity: 0;
    transform: scale(0);
    transition-duration: 0.3s;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: 0 0;
    will-change: transform, opacity;
    top: 0;
  }

  .dropdown-menu.bootstrap-datetimepicker-widget.top {
    transform-origin: 0 100%;
  }

  .dropdown-menu.bootstrap-datetimepicker-widget.open {
    opacity: 1;
    transform: scale(1);
    top: 0;
  }

  .bootstrap-datetimepicker-widget table td>div,
  .bootstrap-datetimepicker-widget table th>div,
  .bootstrap-datetimepicker-widget table th,
  .bootstrap-datetimepicker-widget table td span,
  .navbar,
  .bootstrap-tagsinput .tag,
  .bootstrap-tagsinput [data-role="remove"],
  .card-collapse .card-header a i {
    -webkit-transition: all 150ms ease 0s;
    -moz-transition: all 150ms ease 0s;
    -o-transition: all 150ms ease 0s;
    -ms-transition: all 150ms ease 0s;
    transition: all 150ms ease 0s;
  }

  .sr-only,
  .bootstrap-datetimepicker-widget .btn[data-action="incrementHours"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="incrementMinutes"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="decrementHours"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="decrementMinutes"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="showHours"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="showMinutes"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="togglePeriod"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="clear"]::after,
  .bootstrap-datetimepicker-widget .btn[data-action="today"]::after,
  .bootstrap-datetimepicker-widget .picker-switch::after,
  .bootstrap-datetimepicker-widget table th.prev::after,
  .bootstrap-datetimepicker-widget table th.next::after {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
  }

  .bootstrap-datetimepicker-widget {
    list-style: none;
  }

  .bootstrap-datetimepicker-widget a:hover {
    box-shadow: none !important;
  }

  .bootstrap-datetimepicker-widget a .btn:hover {
    background-color: transparent;
  }

  .bootstrap-datetimepicker-widget.dropdown-menu {
    padding: 4px;
    width: 19em;
  }

  @media (min-width: 768px) {
    .bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs {
      width: 38em;
    }
  }

  @media (min-width: 991px) {
    .bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs {
      width: 38em;
    }
  }

  @media (min-width: 1200px) {
    .bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs {
      width: 38em;
    }
  }

  .bootstrap-datetimepicker-widget.dropdown-menu.bottom:before,
  .bootstrap-datetimepicker-widget.dropdown-menu.bottom:after {
    right: auto;
    left: 12px;
  }

  .bootstrap-datetimepicker-widget.dropdown-menu.top {
    margin-top: auto;
    margin-bottom: 27px;
    z-index: 1111;
  }

  .bootstrap-datetimepicker-widget.dropdown-menu.top.open {
    margin-top: auto;
    margin-bottom: 27px;
  }

  .bootstrap-datetimepicker-widget.dropdown-menu.pull-right:before {
    left: auto;
    right: 6px;
  }

  .bootstrap-datetimepicker-widget.dropdown-menu.pull-right:after {
    left: auto;
    right: 7px;
  }

  .bootstrap-datetimepicker-widget .list-unstyled {
    margin: 0;
  }

  .bootstrap-datetimepicker-widget a[data-action] {
    padding: 0;
    margin: 0;
    border-width: 0;
    background-color: transparent;
    color: #9c27b0;
    box-shadow: none;
  }

  .bootstrap-datetimepicker-widget a[data-action]:hover {
    background-color: transparent;
  }

  .bootstrap-datetimepicker-widget a[data-action]:hover span {
    background-color: #eee;
    color: #9c27b0;
  }

  .bootstrap-datetimepicker-widget a[data-action]:active {
    box-shadow: none;
  }

  .bootstrap-datetimepicker-widget .timepicker-hour,
  .bootstrap-datetimepicker-widget .timepicker-minute,
  .bootstrap-datetimepicker-widget .timepicker-second {
    width: 40px;
    height: 40px;
    line-height: 40px;
    font-weight: 300;
    font-size: 1.125rem;
    margin: 0;
    border-radius: 50%;
  }

  .bootstrap-datetimepicker-widget button[data-action] {
    width: 38px;
    height: 38px;
    margin-right: 3px;
    padding: 0;
  }

  .bootstrap-datetimepicker-widget .btn[data-action="incrementHours"]::after {
    content: "Increment Hours";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="incrementMinutes"]::after {
    content: "Increment Minutes";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="decrementHours"]::after {
    content: "Decrement Hours";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="decrementMinutes"]::after {
    content: "Decrement Minutes";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="showHours"]::after {
    content: "Show Hours";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="showMinutes"]::after {
    content: "Show Minutes";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="togglePeriod"]::after {
    content: "Toggle AM/PM";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="clear"]::after {
    content: "Clear the picker";
  }

  .bootstrap-datetimepicker-widget .btn[data-action="today"]::after {
    content: "Set the date to today";
  }

  .bootstrap-datetimepicker-widget .picker-switch {
    text-align: center;
    border-radius: 3px;
    font-size: 0.875rem;
  }

  .bootstrap-datetimepicker-widget .picker-switch::after {
    content: "Toggle Date and Time Screens";
  }

  .bootstrap-datetimepicker-widget .picker-switch td {
    padding: 0;
    margin: 0;
    height: auto;
    width: auto;
    line-height: inherit;
  }

  .bootstrap-datetimepicker-widget .picker-switch td span {
    line-height: 2.5;
    height: 2.5em;
    width: 100%;
    border-radius: 3px;
    margin: 2px 0px !important;
  }

  .bootstrap-datetimepicker-widget table {
    width: 100%;
    margin: 0;
  }

  .bootstrap-datetimepicker-widget table.table-condensed tr>td {
    text-align: center;
  }

  .bootstrap-datetimepicker-widget table td>div,
  .bootstrap-datetimepicker-widget table th>div {
    text-align: center;
  }

  .bootstrap-datetimepicker-widget table th {
    height: 20px;
    line-height: 20px;
    width: 20px;
    font-weight: 500;
  }

  .bootstrap-datetimepicker-widget table th.picker-switch {
    width: 145px;
  }

  .bootstrap-datetimepicker-widget table th.disabled,
  .bootstrap-datetimepicker-widget table th.disabled:hover {
    background: none;
    color: #eeeeee;
    cursor: not-allowed;
  }

  .bootstrap-datetimepicker-widget table th.prev span,
  .bootstrap-datetimepicker-widget table th.next span {
    border-radius: 3px;
    height: 27px;
    width: 27px;
    line-height: 28px;
    font-size: 12px;
    border-radius: 50%;
    text-align: center;
  }

  .bootstrap-datetimepicker-widget table th.prev::after {
    content: "Previous Month";
  }

  .bootstrap-datetimepicker-widget table th.next::after {
    content: "Next Month";
  }

  .bootstrap-datetimepicker-widget table th.dow {
    text-align: center;
    border-bottom: 1px solid #eeeeee;
    font-size: 12px;
    text-transform: uppercase;
    color: #333333;
    font-weight: 400;
    padding-bottom: 5px;
    padding-top: 10px;
  }

  .bootstrap-datetimepicker-widget table thead tr:first-child th {
    cursor: pointer;
  }

  .bootstrap-datetimepicker-widget table thead tr:first-child th:hover span,
  .bootstrap-datetimepicker-widget table thead tr:first-child th.picker-switch:hover {
    background: #eee;
  }

  .bootstrap-datetimepicker-widget table td>div {
    border-radius: 3px;
    height: 54px;
    line-height: 54px;
    width: 54px;
    text-align: center;
  }

  .bootstrap-datetimepicker-widget table td.cw>div {
    font-size: .8em;
    height: 20px;
    line-height: 20px;
    color: #999999;
  }

  .bootstrap-datetimepicker-widget table td.day>div {
    height: 30px;
    line-height: 30px;
    width: 30px;
    text-align: center;
    padding: 0px;
    border-radius: 50%;
    position: relative;
    z-index: -1;
    color: #3C4858;
    font-size: 0.875rem;
  }

  .bootstrap-datetimepicker-widget table td.minute>div,
  .bootstrap-datetimepicker-widget table td.hour>div {
    border-radius: 50%;
  }

  .bootstrap-datetimepicker-widget table td.day:hover>div,
  .bootstrap-datetimepicker-widget table td.hour:hover>div,
  .bootstrap-datetimepicker-widget table td.minute:hover>div,
  .bootstrap-datetimepicker-widget table td.second:hover>div {
    background: #eee;
    cursor: pointer;
  }

  .bootstrap-datetimepicker-widget table td.old>div,
  .bootstrap-datetimepicker-widget table td.new>div {
    color: #999999;
  }

  .bootstrap-datetimepicker-widget table td.today>div {
    position: relative;
  }

  .bootstrap-datetimepicker-widget table td.today>div:before {
    content: '';
    display: inline-block;
    border: 0 0 5px 5px solid transparent;
    border-bottom-color: #9c27b0;
    position: absolute;
    bottom: 4px;
    right: 4px;
  }

  .bootstrap-datetimepicker-widget table td.active>div,
  .bootstrap-datetimepicker-widget table td.active:hover>div {
    background-color: #9c27b0;
    color: #fff;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
  }

  .bootstrap-datetimepicker-widget table td.active.today:before>div {
    border-bottom-color: #fff;
  }

  .bootstrap-datetimepicker-widget table td.disabled>div,
  .bootstrap-datetimepicker-widget table td.disabled:hover>div {
    background: none;
    color: #eeeeee;
    cursor: not-allowed;
  }

  .bootstrap-datetimepicker-widget table td span {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    margin: 3px 3px;
    cursor: pointer;
    border-radius: 50%;
    text-align: center;
  }

  .bootstrap-datetimepicker-widget table td span:hover {
    background: #eee;
  }

  .bootstrap-datetimepicker-widget table td span.active {
    background-color: #9c27b0;
    color: #fff;
  }

  .bootstrap-datetimepicker-widget table td span.old {
    color: #999999;
  }

  .bootstrap-datetimepicker-widget table td span.disabled,
  .bootstrap-datetimepicker-widget table td span.disabled:hover {
    background: none;
    color: #eeeeee;
    cursor: not-allowed;
  }

  .bootstrap-datetimepicker-widget .timepicker-picker span,
  .bootstrap-datetimepicker-widget .timepicker-hours span,
  .bootstrap-datetimepicker-widget .timepicker-minutes span {
    border-radius: 50% !important;
  }

  .bootstrap-datetimepicker-widget.usetwentyfour td.hour {
    height: 27px;
    line-height: 27px;
  }

  .input-group.date .input-group-addon {
    cursor: pointer;
  }
    .portfolio-background{
    background:url('{{asset('img/registration-background.png')}}');
    background-position: center;
    background-size: cover;
    background-repeat:no-repeat;
  }

  @media screen and (min-width:1366px){
    .portfolio-background{
      height: 350px;
    }
  }

</style>
@section('content')
<div class="col-md-12">
  
@if(session()->has('message'))
      
      <div class="alert alert-success" style="text-align:center;margin-top:15px;">
        {!! session()->get('message') !!} <br>

        <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
      </div>
      @endif
  <div class="row">
       
    <div class="col-md-12 portfolio-background">
     
       <div class="col-md-12 text-header" style="text-align:center;color:black;font-weight: bold;margin-top:15px;padding:50px 50px 70px 50px;">

        <h2>Form Pendaftaran Simulasi IELTS </h2>
        <div>Info Lebih lanjut dapat menghubungi no WA di bawah ini:
          <ul class="dash-list">
            @foreach(config('constants.marketing') as $marketing)
            <li>{{$marketing['no_telepon']}} ({{$marketing['nama']}})</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

  </div>
  <div class="row justify-content-center">
    <div class="col-md-10" style="margin-top:-50px;">
      <div class="card p-4 mb-5">
      <form action="{{url('products/ielts-test/simulation')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6 form-group">
              <div class="row">
                <div class="col-md-3">Jenis Tes</div>
                <div class="col-md-9">
                  <select name="jenis_test" id="jenis_test" class="form-control" required="">
                    <option value="">- Pilih Jenis Test -</option>
                    <option value="offline" selected="">Offline</option>
                    <option value="online">Online</option>
                  </select></div>
                </div>
              </div>
              <div class="col-md-6 form-group test-type offline" id="tgl_simulasi-wrapper" style="display: none">
                <div class="row">

                  <div class="col-md-3">Pilih Tanggal Simulasi :</div>
                  <div class="col-md-9">
                    <input type="date" name="TGL_SIMULASI" class="form-control" value="{{date('Y-m-d')}}">
                  </div>

                </div>
              </div>

              <div class="col-md-6 test-type offline" id="cabang-wrapper" style="display:none">
                <div class="row">
                  <div class="col-md-3"> Pilih Cabang Best Partner</div>
                  <div class="col-md-9">
                    <select class="form-control" name="REF_PERUSAHAAN">
                      <option value="">- Pilih Cabang -</option>
                      @foreach($perusahaan as $data)
                      <option value="{{$data->KD}}">{{ucwords($data->NAMA)}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">

                  <div class="col-md-3">Pilih Module :</div>
                  <div class="col-md-9">
                    <select class="form-control" required id="module" name="module">
                      <option value="">- Pilih Module -</option>
                      @foreach($modules as $module)
                      <option value="{{$module->id}}|{{$module->name}}">{{$module->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group test-type online">
                <div class="row">

                  <div class="col-md-3">Pilih Skill :</div>
                  <div class="col-md-9">

                    <input type="text" name="skills" id="skills" class="selectize">
                    <input type="checkbox" name="check_skills" id="check_skills"> Semua Skills
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group test-type online" style="display:none;">
                <div class="row">
                  <div class="col-md-3"> Pilih Tanggal Speaking</div>
                  <div class="col-md-9">
                    <input type="date" class="form-control" name="tgl_speaking" value="{{date('Y-m-d')}}">
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group test-type online" style="display:none;">
                <div class="row">
                  <div class="col-md-3"> Pilih Jam Speaking</div>
                  <div class="col-md-9">

                    <input type="text" class="form-control timepicker" name="jam_speaking" value={{date('H:i')}}>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    Nama Lengkap
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="NAMA" value="" required>
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    Email
                  </div>
                  <div class="col-md-9">
                   <input type="email" class="form-control" name="EMAIL" value="" placeholder="Email" required>
                 </div>
               </div>

             </div>
           </div>
         </div>
         <div class="col-md-12 form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3">Kota Kelahiran</div>
                <div class="col-md-9">
                  <input type="text" name="KOTA_KELAHIRAN" class="form-control" placeholder="Kota Kelahiran" required value="">
                </div>
              </div>      
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3">
                  Tanggal Lahir
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal (dd)" pattern="[0-9]{2}" required value="">
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="bulan_lahir" required>
                        <option value="">Bulan (mm)</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="" required>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <div class="col-md-12 form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3">
                  No. Handphone
                </div>
                <div class="col-md-9">
                 <input type="text" class="form-control" name="KONTAK" placeholder="No. HP" value="" required pattern="[0-9]{10,13}">
               </div>
             </div>
           </div>
           <div class="col-md-6">
            <div class="row">
              <div class="col-md-3">No. KTP</div>
              <div class="col-md-9"> <input type="text" class="form-control" placeholder="NIK" name="REF_KTP" value="" pattern="[0-9]{16}" required>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 form-group">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-3">Alamat</div>
              <div class="col-md-9">
                <textarea rows="3" name="ALAMAT" rows="3" class="form-control" required placeholder="Alamat"></textarea>
              </div>
            </div>

          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-3">Alasan</div>
              <div class="col-md-9">
                <textarea name="ALASAN" rows="3" class="form-control" placeholder="Tujuan Mengikuti Simulasi IELTS" required></textarea>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-12 form-group">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-3">Upload KTP</div>
              <div class="col-md-9">
                <input type="file" name="UPLOAD_KTP" required>
                 <div style="color:red">
                    *Dokumen dalam bentuk hasil scan
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 form-group">
        <div class="row">
          <div class="col-md-12">
            <input type="submit" name="" value="Submit" class="btn btn-primary">
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>

@push('more-script')
<script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
<script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">

  var types = [
  @foreach ($types as $type)
  {tag: "{{$type['type']}}",id:"{{$type['id']}}"},
  @endforeach
  ];



  $('.selectize').selectize({
    delimiter: ',',
    persist: false,
    valueField: 'id',
    labelField: 'tag',
    searchField: 'tag',
    create : false,
    options: types,
    create: function(input) {
      return {
        tag: input
      }
    }
  });
  if(document.getElementById("check_skills").checked == true){
    $('#skills')[0].selectize.disable();
  }else{
    $('#skills')[0].selectize.enable();
  }

  $('#check_skills').on('change',function(){
    if(this.checked == true){
      $('#skills')[0].selectize.disable();
    }else{
     $('#skills')[0].selectize.enable();
   }
 });
  $(function () {
    $('.timepicker').datetimepicker({
      //          format: 'H:mm',    // use this format if you want the 24hours timepicker
      format: 'H:mm', //use this format if you want the 12hours timpiecker with AM/PM toggle
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

      },
     // defaultTime : '00:00'
   });
  });
  $(document).ready(function(){
    if($('#jenis_test').val() == "offline"){
      $('.test-type.offline').show();
      $('.test-type.online').hide();
      $('.test-type.online input').val("");
    }else{
      $('.test-type.online').show();
      $('.test-type.offline').hide();
      $('.test-type.offline input').val("");
    }
  });
  $('#jenis_test').on('change',function(){
    if($(this).val() == "offline"){
      $('.test-type.offline').show();
      $('.test-type.online').hide();
      $('.test-type.online input').val("");
    }else{
     $('.test-type.online').show();
     $('.test-type.offline').hide();
     $('.test-type.offline input').val("");
   }

 });
  function close_alert(){
    $('.alert').hide();
  }
</script>
@endpush
@stop
