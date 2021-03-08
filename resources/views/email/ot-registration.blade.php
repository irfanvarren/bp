<head>
  <style media="screen">
  .price-table{
    width:100%;
  }
  .price-table,.price-table td,.price-table th{
    border-collapse: collapse;
    border:1px dotted #ccc;
  }
  .price-table td,.price-table th{
    padding:8px;
  }
  .btn-primary{
    color:#fff;
    background-color:#3490dc;
    border-color:#3490dc;
  }
  @media screen and (prefers-reduced-motion: reduce){
    .btn{
      transition:none;
    }
  }
  .btn{
    display:inline-block;
    background-color:#3490dc;
    color:white;
    text-decoration:none;
    font-weight:400;
    text-align:center;
    white-space:nowrap;
    vertical-align:middle;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
    border:1px solid transparent;
    padding:.375rem .75rem;
    font-size:.9rem;
    line-height:1.6;
    border-radius:.25rem;
    transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }

  .bp-contacts td{
    padding:5px 15px;
  }
  .text-right{
    text-align:right;
  }
  </style>
</head>
<p>Hi {{$email->nama}},</p>
<p>Terima kasih telah melakukan pendaftaran di BEST PARTNER EDUCATION Pontianak. Pendaftaran anda akan kami proses setelah anda melakukan pembayaran dengan rincian pembayaran dibawah ini: </p>
<p>Silahkan melakukan pembayaran untuk pemesanan test anda melalui rekening atas nama CV. BEST PARTNER dengan informasi lengkap rekening tujuan transfer sebagai berikut:  </p>

<table>
  <tr>
    <td>Nama Account</td> <td>: Best Partner CV</td>
  </tr>
  <tr>
    <td>No. Rekening</td> <td>: 029 900 8144</td>
  </tr>
  <tr>
    <td>Nama Bank</td> <td>: BCA</td>
  </tr>
</table>

<p>Waktu batas pembayaran adalah 2x24 jam setelah pendaftaran dilakukan atau dimulai sejak email ini diterbitkan. Jika melewati batas waktu pembayaran, pendaftaran anda akan dinyatakan batal atau gagal. Anda diharuskan melakukan pendaftaran kembali jika hal tersebut diatas terjadi. </p>

<p>Harap mengkonfirmasi pembayaran yang telah dilakukan kepada pihak Best Partner Education dengan cara mengirimkan bukti pembayaran ke alamat email finance@bestpartnereducation.com atau dapat melakukan pengunggahan foto bukti pembayaran di link berikut ini {{url('products/'.str_slug($email->test_name, '-').'/simulation/upload-payment/').'/'.$email->token}}</p>
<br />
<div style="width:100%;text-align:center;">
<a class="btn btn-primary" style="color:white;" href="{{url('products/'.str_slug($email->test_name, '-').'/simulation/upload-payment/').'/'.$email->token}}">Upload Disini</a>
</div>
<br />
<p> <strong>*Note :</strong></p>
<p>Email ini adalah sebagai konfirmasi karena telah melakukan pendaftaran melalui website BEST PARTNER EDUCATION.</p>
<p>Peserta dianggap setuju untuk mengikuti dan mematuhi syarat dan ketentuan yang dibuat oleh BEST PARTNER EDUCATION.</p>
<p>Pembayaran atas produk apapun yang berkaitan dengan BEST PARTNER EDUCATION hanya akan diterima melalui rekening atas nama BEST PARTNER CV.</p>
<p>BEST PARTNER EDUCATION tidak bertanggung jawab atas tindak penipuan yang mengatas namakan BEST PARTNER EDUCATION yang meminta anda melakukan pembayaran/ transfer ke rekening dengan menggunakan nama pribadi atau selain BEST PARTNER CV </p>
<strong> Untuk informasi lebih lanjut silahkan hubungi kami melalui</strong>
<table class="bp-contacts">
  <tr>
    <td>Phone	</td> <td>: (0561) 8172583</td>
  </tr>
  <tr>
    <td>Email	</td> <td>: info@bestpartnereducation.com</td>
  </tr>
  <tr>
    <td>Website	</td> <td>: www.bestpartnereducation.com</td>
  </tr>
  <tr>
    <td>Instagram	</td> <td>: bestpartnereducation</td>
  </tr>
  <tr>
    <td>Line ID</td> <td>: bestpartnereducation</td>
  </tr>
  <tr>
    <td>Facebook</td> <td>: bestpartner</td>
  </tr>
  <tr>
    <td>Twitter</td> <td>: bestpartneredu1</td>
  </tr>
  <tr>
    <td>Youtube</td> <td>: best partner education</td>
  </tr>
</table>
