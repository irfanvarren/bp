@extends('layouts.bp_wo_sidenav')
<style type="text/css">
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
    

       <div class="col-md-12 text-header" style="text-align:center;margin-bottom:25px;color:black;font-weight: bold;margin-top:15px;padding:50px 50px 70px 50px;">

        <h2>Form Pendaftaran Simulasi TOEFL</h2>
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


      <form action="{{url('products/toefl-test/simulation')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3">Jenis Tes</div>
                <div class="col-md-9" ><select name="jenis_test" id="jenis_test" class="form-control" required="">
                  <option value="">- Pilih Jenis Test -</option>
                  <option value="offline">Offline</option>
                  <option value="online">Online</option>
                </select></div>
              </div>
            </div>


            <div class="col-md-6 form-group" id="cabang-wrapper" style="display:none;">
              <div class="row">
                <div class="col-md-3"> Pilih Cabang Best Partner</div>
                <div class="col-md-9">
                  <select class="form-control" name="REF_PERUSAHAAN" id="REF_PERUSAHAAN">
                    <option value="">- Pilih Cabang -</option>
                    @foreach($perusahaan as $value)
                    <option value="{{$value->KD}}">{{$value->NAMA}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6" id="tgl_simulasi-wrapper" style="display:none;">
              <div class="row">

                <div class="col-md-3">Pilih Tanggal Simulasi :</div>
                <div class="col-md-9">

                  <input type="date" class="form-control" name="TGL_SIMULASI" id="TGL_SIMULASI" value="{{date('Y-m-d')}}">
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
            <div class="col-md-6 form-group">
              <div class="row">
                <div class="col-md-3">Email</div>
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
                <div class="col-md-9"> <input type="text" name="KOTA_KELAHIRAN" class="form-control" placeholder="Tempat Kelahiran" required value=""></div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3">   Tanggal Lahir</div>
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
                <div class="col-md-3">No Telepon</div>
                <div class="col-md-9">
                 <input type="text" class="form-control" name="KONTAK" placeholder="No. HP" value="" required pattern="[0-9]{10,13}">
               </div>
             </div>

           </div>
           <div class="col-md-6">
            <div class="row">
              <div class="col-md-3">
                No. KTP
              </div>
              <div class="col-md-9">
               <input type="text" class="form-control" placeholder="NIK" name="REF_KTP" value="" pattern="[0-9]{16}" required>
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
              Alamat
            </div>
            <div class="col-md-9">
             <textarea rows="3" name="ALAMAT" rows="3" class="form-control" required placeholder="Alamat"></textarea>
           </div>
         </div>

       </div>
       <div class="col-md-6">
        <div class="row">
          <div class="col-md-3">
           Alasan
         </div>
         <div class="col-md-9">
           <textarea name="ALASAN" rows="3" class="form-control" placeholder="Tujuan Mengikuti Simulasi TOEFL" required></textarea>
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
          Upload KTP
        </div>
        <div class="col-md-9">

         <input type="file"  name="UPLOAD_KTP" required>
          <div style="color:red">
              *Dokumen dalam bentuk hasil scan
            </div>

       </div>
     </div>
   </div>
 </div>

</div>

<div class="col-md-12">

  <button type="submit" name="" value="Submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>

@stop
@push('more-script')
<script type="text/javascript">

  $(document).ready(function(){
    if($('#jenis_test').val() == "offline"){
      $('#tgl_simulasi-wrapper').show();
      $('#cabang-wrapper').show();
    }else{
      $('#tgl_simulasi-wrapper').hide();
      $('#cabang-wrapper').hide();
      $('#TGL_SIMULASI').val("");
      $('#REF_PERUSAHAAN').val("");
    }
  });
  $('#jenis_test').on('change',function(){
    if($(this).val() == "offline"){
      $('#tgl_simulasi-wrapper').show();
      $('#cabang-wrapper').show();

    }else{
      $('#TGL_SIMULASI').val("");
      $('#REF_PERUSAHAAN').val("");
      $('#tgl_simulasi-wrapper').hide();
      $('#cabang-wrapper').hide();
    }
  });
  function close_alert(){
    $('.alert').hide();
  }
</script>
@endpush