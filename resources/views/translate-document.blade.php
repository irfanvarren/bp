@extends('layouts.bp_wo_sidenav')
<style media="screen">
@media screen and (max-width:480px){
  .pO{
    padding-right:15px !important;
  }
}

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
</style>
  <div class="loading-wrapper">
    <img src="{{asset('/img/loading.gif')}}" alt="">
  </div>
@section('content')
  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="col-md-12 content-wrapper">
    <div class="row" >
      <div class="col-md-12" style="text-align:center;padding:30px" >


      <h2>Aplikasi Pendaftaran Terjemahan Dokumen</h2>
      <p>Dokumen diterjemahkan oleh penerjemah tersumpah</p>
      <ul style="list-style-position:inside">
        <li>Harap mengisi data dibawah ini dengan data yang valid dan original untuk memudahkan dan mempercepat proses penerjemahan</li>
      </ul>

  </div>
    </div>
    <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">

            <form action="{{url('document-translation')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nama Lengkap :') }}</label>

                  <div class="col-md-7">
                      <input id="name" type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">{{ __('Alamat Lengkap :') }}</label>

                  <div class="col-md-7">
                      <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="{{ old('alamat') }}" required >
                  </div>
                  <div class="col-md-3 pO" style="padding-right:30px;">
                    <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" required value="">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">{{ __('Alamat Email :') }}</label>

                  <div class="col-md-7">
                      <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">{{ __('No. HP / WA :') }}</label>

                  <div class="col-md-7">
                      <input type="text" class="form-control" placeholder="No HP / WA" name="no_telepon" value="{{ old('no_telepon') }}" required >
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">Bahasa <br /> Terjemahan : </label>

                  <div class="col-md-7">
                    <select class="form-control" required name="bahasa">
                      <option value="">- Pilih Bahasa -</option>
                      <option value="Inggris > Indonesia">Inggris > Indonesia</option>
                      <option value="Indonesia > Inggris">Indonesia > Inggris</option>
                      <option value="Mandarin > Indonesia">Mandarin > Indonesia</option>
                      <option value="Indonesia > Mandarin">Indonesia > Mandarin</option>
                    </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">{{ __('Permintaan Tambahan :') }}</label>

                  <div class="col-md-7">
                    <textarea name="permintaan" class="form-control" rows="3" placeholder="Permintaan Tambahan" ></textarea>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">Upload File :</label>

                  <div class="col-md-7">
                    <input type="file" name="myfiles[]" value="" multiple>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right"></label>

                  <div class="col-md-7">
                    <input type="file" name="myfiles[]" value="" multiple><br>
                    <span>* Bisa Pilih Lebih Dari 1 File</span>
                    <br />
                    <br>
                   <div class="progress">
                     <div class="progress-bar" role="progressbar" aria-valuenow=""
                     aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                       0%
                     </div>
                   </div>
                   <br />
                   <div id="success">

                   </div>
                   <div class="">
                     <input type="checkbox" name="" id="cek_agree" value=""> Saya Menerima <a href="/document-translation/term-and-condition">Syarat & Ketentuan</a> Berlaku
                   </div>
                  </div>
              </div>
              <div class="form-group row">

                <div class="col-md-12 pO" style="padding-right:30px;">
<input type="submit" class="btn btn-primary" name="" id="submit" disabled value="Submit" style="float:right;">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

        </div>
  </div>
   <script src="{{asset('js/jquery.form.js')}}"></script>
  <script type="text/javascript">
  document.getElementById('cek_agree').addEventListener('change', function() {
    if (this.checked) {
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('submit').disabled = true;
    }
  });
  $(document).ready(function(){
    if(document.getElementById('cek_agree').checked == true){
      document.getElementById('submit').disabled = false;
    }else{
      document.getElementById('submit').disabled = true;
    }

      $('form').ajaxForm({
        beforeSend:function(){
          $('.loading-wrapper').show();
            alert('Harap Tunggu Sampai File Terupload !');
          $('#success').empty();
        },
        uploadProgress:function(event, position, total, percentComplete)
        {


          $('.progress-bar').text(percentComplete + '%');
          $('.progress-bar').css('width', percentComplete + '%');
        },
        success:function(data)
        {

          if(data.errors)
          {
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
            $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
          }
          if(data.success)
          {
              $('.loading-wrapper').hide();
              alert('File Berhasil Di Upload');
            $('.progress-bar').text('Uploaded');
            $('.progress-bar').css('width', '100%');
            $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');

            setTimeout(location.href="{{url('/document-translation')}}", 1500);
          }
        },
        error:function(){
          alert('error');
        }
      });

  });
  </script>
@stop
