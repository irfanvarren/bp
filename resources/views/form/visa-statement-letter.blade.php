@extends('layouts.bp_wo_sidenav')
@section('content')

<div class="col-md-12 content-wrapper">
  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">

            <div class="col-md-12 card">
                <div class=" card-body">
                  <form class="" id="myform" name="myform" action="{{url('visa-statement-letter')}}" onsubmit="add_signature()" enctype="multipart/form-data" method="post">
@csrf
                    <div class="row">
                      <div class="col-md-12">

                        <h2>Surat Pernyataan Visa</h2>
                        <p>Isilah data dengan baik dan benar dan harap membaca dengan jelas setiap <a href="{{url('visa-statement-letter/term-and-condition')}}"> syarat dan ketentuan </a> yang berlaku.</p>
                      </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Nama*</label>
                        <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="nama_depan" required placeholder="Nama Depan" value="">
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="nama_tengah" placeholder="Nama Tengah" value="">
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" value="">
                              </div>
                          </div>

                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Tanggal Lahir*</label>
                        <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-4">
                             <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" required>
                              </div>
                              <div class="col-md-4">
                                <select class="form-control" id="bulan_lahir" name="bulan_lahir" required>
                                   <option value="">Bulan (mm)</option>
                                   <option value="01" {{ session('ielts_form.bulan_lahir')=="01" ? 'selected' : '' }}>Januari</option>
                                   <option value="02" {{ session('ielts_form.bulan_lahir')=="02" ? 'selected' : '' }}>Februari</option>
                                   <option value="03" {{ session('ielts_form.bulan_lahir')=="03" ? 'selected' : '' }}>Maret</option>
                                   <option value="04" {{ session('ielts_form.bulan_lahir')=="04" ? 'selected' : '' }}>April</option>
                                   <option value="05" {{ session('ielts_form.bulan_lahir')=="05" ? 'selected' : '' }}>Mei</option>
                                   <option value="06" {{ session('ielts_form.bulan_lahir')=="06" ? 'selected' : '' }}>Juni</option>
                                   <option value="07" {{ session('ielts_form.bulan_lahir')=="07" ? 'selected' : '' }}>Juli</option>
                                   <option value="08" {{ session('ielts_form.bulan_lahir')=="08" ? 'selected' : '' }}>Agustus</option>
                                   <option value="09" {{ session('ielts_form.bulan_lahir')=="09" ? 'selected' : '' }}>September</option>
                                   <option value="10" {{ session('ielts_form.bulan_lahir')=="10" ? 'selected' : '' }}>Oktober</option>
                                   <option value="11" {{ session('ielts_form.bulan_lahir')=="11" ? 'selected' : '' }}>November</option>
                                   <option value="12" {{ session('ielts_form.bulan_lahir')=="12" ? 'selected' : '' }}>Desember</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                    <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required>
                              </div>
                          </div>

                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Jenis Kelamin*</label>
                        <div class="col-md-4">
                          <select class="form-control" required  name="jenis_kelamin">
                            <option value="">- Jenis Kelamin -</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="N/A">N/A</option>
                          </select>

                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Alamat</label>
                        <div class="col-md-12">
                            <textarea name="alamat" rows="2"  class="form-control" placeholder="Alamat" required></textarea>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-6">
                                <input type="text" class="form-control" name="kota" required placeholder="Kota" value="">
                              </div>
                              <div class="col-md-6">
                                <input type="text" class="form-control" name="provinsi" required placeholder="Provinsi" value="">
                              </div>
                          </div>

                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-6">
                                <input type="number" class="form-control" name="kode_pos" required placeholder="Kode Pos" value="">
                              </div>
                              <div class="col-md-6">
                                <input type="text" class="form-control" name="country" required placeholder="Negara" value="">
                              </div>
                          </div>

                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Email*</label>
                        <div class="col-md-12">
                                <input type="email" class="form-control" name="email" required placeholder="Email" value="">
                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Nomor HP*</label>

                              <div class="col-md-12">
                                <input type="text" class="form-control" name="no_telepon" required placeholder="No Telepon" value="">
                              </div>

                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Negara Tujuan*</label>

                              <div class="col-md-12">
                                <select name="negara_tujuan" class="form-control">
                                  <option value="">- Pilih Negara Tujuan -</option>
                                  <option value="Australia">
                                    Australia
                                  </option>
                                  <option value="Kanada">
                                    Kanada
                                  </option>
                                  <option value="Singapura">
                                    Singapura
                                  </option>
                                  <option value="Selandia Baru">
                                    Selandia Baru
                                  </option>
                                  <option value="Malaysia">
                                    Malaysia
                                  </option>
                                  <option value="Swiss">
                                    Swiss
                                  </option>
                                  <option value="Korea Selatan">
                                    Korea Selatan
                                  </option>
                                  <option value="Inggris">
                                    Inggris
                                  </option>
                                  <option value="Amerika">
                                    Amerika
                                  </option>
                                  <option value="Irlandia">
                                    Irlandia
                                  </option>
                                  <option value="Indonesia">
                                    Indonesia
                                  </option>
                                  <option value="Perancis">
                                    Perancis
                                  </option>
                                  <option value="China">
                                    China
                                  </option>
                                  <option value="Swedia">
                                    Swedia
                                  </option>
                                  <option value="Belanda">
                                    Belanda
                                  </option>
                                  <option value="Spanyol">
                                    Spanyol
                                  </option>
                                  <option value="Jepang">
                                    Jepang
                                  </option>
                                </select>
                              </div>

                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Nama Rekening</label>

                              <div class="col-md-12">
                                <input type="text" class="form-control" name="nama_rekening" placeholder="Nama Rekening" value="">
                              </div>

                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Nomor Rekening</label>

                              <div class="col-md-12">
                                <input type="text" class="form-control" name="no_rekening" placeholder="Nomor Rekening" value="">
                              </div>

                    </div>
                    @php
                    $nama_bank = array(
array("nama_bank"=>"Amar Bank Indonesia"),
array("nama_bank"=>"Bangkok Bank"),
array("nama_bank"=>"Bank Agris"),
array("nama_bank"=>"Bank Anda"),
array("nama_bank"=>"Bank Andara"),
array("nama_bank"=>"Bank ANZ Indonesia"),
array("nama_bank"=>"Bank Artha Graha Internasional"),
array("nama_bank"=>"Bank Artos Indonesia"),
array("nama_bank"=>"Bank Bengkulu"),
array("nama_bank"=>"Bank Bisnis Internasional"),
array("nama_bank"=>"Bank BJB"),
array("nama_bank"=>"Bank BJB Syariah"),
array("nama_bank"=>"Bank BNI Syariah"),
array("nama_bank"=>"Bank BNP Paribas Indonesia"),
array("nama_bank"=>"Bank BPD Aceh"),
array("nama_bank"=>"Bank BPD Aceh Syariah"),
array("nama_bank"=>"Bank BPD Bali"),
array("nama_bank"=>"Bank BPD DIY"),
array("nama_bank"=>"Bank BPD Sulteng"),
array("nama_bank"=>"Bank BRI Agroniaga"),
array("nama_bank"=>"Bank BRI Syariah"),
array("nama_bank"=>"Bank BTN Syariah"),
array("nama_bank"=>"Bank Bukopin"),
array("nama_bank"=>"Bank Bumi Arta"),
array("nama_bank"=>"Bank Capital Indonesia"),
array("nama_bank"=>"Bank Capital Indonesia"),
array("nama_bank"=>"Bank Central Asia (BCA)"),
array("nama_bank"=>"Bank Chinatrust Indonesia"),
array("nama_bank"=>"Bank CIMB Niaga"),
array("nama_bank"=>"Bank Commonwealth"),
array("nama_bank"=>"Bank Danamon Indonesia"),
array("nama_bank"=>"Bank Danamon Syariah"),
array("nama_bank"=>"Bank DBS Indonesia"),
array("nama_bank"=>"Bank Dinar Indonesia"),
array("nama_bank"=>"Bank DKI"),
array("nama_bank"=>"Bank DKI Syariah"),
array("nama_bank"=>"Bank Ekonomi Raharja"),
array("nama_bank"=>"Bank Fama Internasional"),
array("nama_bank"=>"Bank Ganesha"),
array("nama_bank"=>"Bank Harda Internasional"),
array("nama_bank"=>"Bank ICBC Indonesia"),
array("nama_bank"=>"Bank Ina Perdana"),
array("nama_bank"=>"Bank Index Selindo"),
array("nama_bank"=>"Bank Indonesia (BI)"),
array("nama_bank"=>"Bank J Trust Indonesia"),
array("nama_bank"=>"Bank Jambi"),
array("nama_bank"=>"Bank Jasa Jakarta"),
array("nama_bank"=>"Bank Jateng"),
array("nama_bank"=>"Bank Jatim"),
array("nama_bank"=>"Bank Kalbar"),
array("nama_bank"=>"Bank Kalbar Syariah"),
array("nama_bank"=>"Bank Kalsel"),
array("nama_bank"=>"Bank Kalsel Syariah"),
array("nama_bank"=>"Bank Kalteng"),
array("nama_bank"=>"Bank Kaltim"),
array("nama_bank"=>"Bank Kaltim Syariah"),
array("nama_bank"=>"Bank KEB Hana"),
array("nama_bank"=>"Bank Kesejahteraan Ekonomi"),
array("nama_bank"=>"Bank Lampung"),
array("nama_bank"=>"Bank Maluku"),
array("nama_bank"=>"Bank Mandiri"),
array("nama_bank"=>"Bank Mandiri Taspen Pos"),
array("nama_bank"=>"Bank Maspion"),
array("nama_bank"=>"Bank Mayapada"),
array("nama_bank"=>"Bank Maybank Indonesia"),
array("nama_bank"=>"Bank Maybank Syariah Indonesia"),
array("nama_bank"=>"Bank Mayora"),
array("nama_bank"=>"Bank Mega"),
array("nama_bank"=>"Bank Mega Syariah"),
array("nama_bank"=>"Bank Mestika Dharma"),
array("nama_bank"=>"Bank Mitraniaga"),
array("nama_bank"=>"Bank Mizuho Indonesia"),
array("nama_bank"=>"Bank MNC Internasional"),
array("nama_bank"=>"Bank Muamalat Indonesia"),
array("nama_bank"=>"Bank Multi Arta Sentosa"),
array("nama_bank"=>"Bank Nagari"),
array("nama_bank"=>"Bank Nagari Syariah"),
array("nama_bank"=>"Bank Nationalnobu"),
array("nama_bank"=>"Bank Negara Indonesia (BNI)"),
array("nama_bank"=>"Bank NTB"),
array("nama_bank"=>"Bank NTB Syariah"),
array("nama_bank"=>"Bank NTT"),
array("nama_bank"=>"Bank Nusantara Parahyangan"),
array("nama_bank"=>"Bank OCBC NISP"),
array("nama_bank"=>"Bank of America"),
array("nama_bank"=>"Bank of China"),
array("nama_bank"=>"Bank of India Indonesia"),
array("nama_bank"=>"Bank Papua"),
array("nama_bank"=>"Bank Permata"),
array("nama_bank"=>"Bank Permata Syariah"),
array("nama_bank"=>"Bank Pundi Indonesia"),
array("nama_bank"=>"Bank QNB Indonesia"),
array("nama_bank"=>"Bank Rabobank International Indonesia"),
array("nama_bank"=>"Bank Rakyat Indonesia (BRI)"),
array("nama_bank"=>"Bank Resona Perdania"),
array("nama_bank"=>"Bank Riau Kepri"),
array("nama_bank"=>"Bank Riau Kepri Syariah"),
array("nama_bank"=>"Bank Royal Indonesia"),
array("nama_bank"=>"Bank Sahabat Sampoerna"),
array("nama_bank"=>"Bank SBI Indonesia"),
array("nama_bank"=>"Bank Shinhan Indonesia"),
array("nama_bank"=>"Bank Sinarmas"),
array("nama_bank"=>"Bank Sulsel"),
array("nama_bank"=>"Bank Sultra"),
array("nama_bank"=>"Bank Sulut"),
array("nama_bank"=>"Bank Sumitomo Mitsui Indonesia"),
array("nama_bank"=>"Bank Sumsel Babel"),
array("nama_bank"=>"Bank Sumsel Babel Syariah"),
array("nama_bank"=>"Bank Sumut"),
array("nama_bank"=>"Bank Sumut Syariah"),
array("nama_bank"=>"Bank Syariah Bukopin"),
array("nama_bank"=>"Bank Syariah Mandiri"),
array("nama_bank"=>"Bank Tabungan Negara (BTN)"),
array("nama_bank"=>"Bank Tabungan Pensiunan Nasional"),
array("nama_bank"=>"Bank UOB Indonesia"),
array("nama_bank"=>"Bank Victoria Internasional"),
array("nama_bank"=>"Bank Victoria Syariah"),
array("nama_bank"=>"Bank Windu Kentjana International"),
array("nama_bank"=>"Bank Woori Saudara"),
array("nama_bank"=>"Bank Yudha Bhakti"),
array("nama_bank"=>"BCA Syariah"),
array("nama_bank"=>"BII Syariah"),
array("nama_bank"=>"BTPN Syariah"),
array("nama_bank"=>"CIMB Niaga Syariah"),
array("nama_bank"=>"Citibank"),
array("nama_bank"=>"Deutsche Bank"),
array("nama_bank"=>"HSBC"),
array("nama_bank"=>"JPMorgan Chase"),
array("nama_bank"=>"OCBC NISP Syariah"),
array("nama_bank"=>"Panin Bank"),
array("nama_bank"=>"Panin Bank Syariah"),
array("nama_bank"=>"Prima Master Bank"),
array("nama_bank"=>"Standard Chartered"),
array("nama_bank"=>"The Bank of Tokyo-Mitsubishi UFJ")
);
                    @endphp
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Nama Bank</label>

                              <div class="col-md-12">
                              <select class="form-control" name="nama_bank">
                                <option value="">- Pilih Bank -</option>
                                @foreach ($nama_bank as $data)

                                <option><?php echo $data['nama_bank'] ?></option>

                              @endforeach
                            </select>
                              </div>

                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-12 col-form-label">Cabang Bank</label>

                              <div class="col-md-12">
                                <input type="text" class="form-control" name="cabang_bank" placeholder="Cabang Bank" value="">
                              </div>

                    </div>
                    <div class="row form-group">
                      <div class="col-md-12">


                      <input type="checkbox"  name="agree" id="agree" value="" required> &nbsp; Dengan ini menyatakan bahwa saya telah membaca dan menyetujui<a href="{{url('visa-statement-letter/term-and-condition')}}"> syarat dan ketentuan </a> yang berlaku di Best Partner Education. *
                          </div>
                    </div>
                    <div class="row form-group">
                      <label for="" class="col-md-12 col-form-label">Signature
<br>
  <span>*Mohon ttd disesuaikan dengan kartu identitas</span>
                           <input type="button" name="" class="btn btn-warning" onclick="reset_signature()" style="float:right" value="Clear"> </label>
                  <canvas id="canvas"  height="200" width="350" style="background:#ddd;margin:0 auto;margin-top:15px;"></canvas>

                  <input type="hidden" name="signature" id="signature" value="">
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="submit" name="" id="submit" disabled class="btn btn-primary" value="Submit">
                  </div>
                </div>
                  </form>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
var canvas = document.querySelector("canvas");

var signaturePad = new SignaturePad(canvas);
function add_signature(){
var signature = signaturePad.toDataURL();
$('#signature').val(signature);
document.myform.submit();
}

function reset_signature(){
  signaturePad.clear();
}

  function close_alert() {
    $('.alert').hide();
  }

  document.getElementById('agree').addEventListener('change', function() {
    if (this.checked) {
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('submit').disabled = true;
    }
  });

</script>
@stop
