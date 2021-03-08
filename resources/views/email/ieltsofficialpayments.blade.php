<head>
  <style media="screen">
  .price-table{
    width:100%;
  }
  .price-table,.price-table td,.price-table th{
    border-collapse: collapse;
    border:1px dotted #ccc;
  }
  .price-table th{
    background: #BDD6EE;
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
<p>Hi {{$email->NAMA}},</p>
<p>Terima kasih telah melakukan pendaftaran Test IELTS di BEST PARTNER EDUCATION. Pendaftaran anda akan kami proses setelah anda melakukan pembayaran dengan rincian yang harus dibayarkan adalah sebagai berikut ini:  </p>
<table class="price-table">
<tr style="border-top:2px solid black;border-bottom:2px solid black;">
  <th>No.</th> <th>Jumlah</th> <th>Deskripsi Barang</th> <th></th><th>Harga.</th>
</tr>
<tr>
  <td>1.</td><td>1 x</td> <td>Biaya Test IELTS</td> <td>Rp.</td><td>{{number_format($email->HARGA_PAKET,2,',','.')}}</td>
</tr>

<tr style="border-bottom:2px solid black;">
  <td></td> <td></td> <td></td> <td></td> <td></td>
</tr>
<tr>
  <td colspan="2"></td><td class="text-right">Subtotal : </td> <td>Rp.</td> <td>{{number_format($email->HARGA_PAKET,2,',','.')}}</td>
</tr>
<tr>
<td colspan="2"></td><td class="text-right">Pajak 0% : </td>  <td>Rp.</td> <td>0,-</td>
</tr>
<tr style="background:#BDD6EE;">
<td colspan="2"></td><td class="text-right">Total Keselurahan : </td>  <td>Rp.</td> <td>{{number_format($email->HARGA_PAKET,2,',','.')}}</td>
</tr>
</table>

<p>Silahkan melakukan pembayaran untuk pemesanan test anda melalui rekening atas nama CV. BEST PARTNER dengan informasi lengkap rekening tujuan transfer sebagai berikut:   </p>

<table>
  <tr>
    <td>Nama Bank</td> <td>: BCA</td>
  </tr>
  <tr>
    <td>Nama Account</td> <td>: Best Partner CV</td>
  </tr>
  <tr>
    <td>No. Rekening</td> <td>: 029 900 8144</td>
  </tr>
  
</table>

<p>Pembayaran juga dapat dilakukan melalui aplikasi pembayaran online ke rekening tujuan transfer. Berikut ini kami berikan informasi tutorial cara pembayaran melalui aplikasi pembayaran online.</p>

<table>
  <tr>
    <td>Dana </td> <td>: <a href="https://www.youtube.com/watch?v=arFtFK6rQkw\" target="_BLANK">https://www.youtube.com/watch?v=arFtFK6rQkw\</a></td>
  </tr>
  <tr>
    <td>OVO </td> <td>: <a href="https://www.youtube.com/watch?v=w2QLh-dUUAI" target="_BLANK">https://www.youtube.com/watch?v=w2QLh-dUUAI</a></td>
  </tr>
  <tr>
    <td>Link Aja</td> <td>: <a href="https://www.youtube.com/watch?v=hC6QXxpCo-g" target="_BLANK">https://www.youtube.com/watch?v=hC6QXxpCo-g</a></td>
  </tr>
  <tr>
    <td>Gopay  </td> <td>: <a href="https://www.youtube.com/watch?v=ZxzNCkhNmoA" target="_BLANK">https://www.youtube.com/watch?v=ZxzNCkhNmoA</a></td>
  </tr>
  <tr>
    <td>Jenius  </td> <td>: <a href="https://www.youtube.com/watch?v=wyFcwGBlVwM" target="_BLANK">https://www.youtube.com/watch?v=wyFcwGBlVwM</a></td>
  </tr>
  <tr>
    <td>Flip </td> <td>: <a href="https://www.youtube.com/watch?v=I5I1lESU7H4" target="_BLANK">https://www.youtube.com/watch?v=I5I1lESU7H4</a></td>
  </tr>
   <tr>
    <td>OY </td> <td>: <a href="https://www.youtube.com/watch?v=tGvuJAQADj4" target="_BLANK">https://www.youtube.com/watch?v=tGvuJAQADj4</a></td>
  </tr>
</table>

<p>Waktu batas pembayaran adalah 2x24 jam setelah pendaftaran dilakukan atau dimulai sejak email ini diterbitkan. Jika melewati batas waktu pembayaran, pendaftaran anda akan dinyatakan batal atau gagal. Anda diharuskan melakukan pendaftaran kembali jika hal tersebut diatas terjadi.  </p>

<p>Setelah berhasil melakukan pembayaran, silahkan untuk mengkonfirmasi kepada pihak Best Partner Education dengan cara mengirimkan bukti pembayaran ke divisi keuangan Best Partner Education di alamat email finance@bestpartnereducation.com atau dapat melakukan pengunggahan foto bukti pembayaran di link berikut ini {{url('products/ielts-test/official/upload-payment/'.$email->_token)}}</p>

<br />
<div style="width:100%;text-align:center;">
<a class="btn btn-primary" style="color:white;" href="{{url('products/ielts-test/official/upload-payment/'.$email->_token)}}">Upload Disini</a>
</div>
<br />
<p>Jika anda mempunyai pertanyaan seputar produk atau informasi lanjutan lainnya, silahkan hubungi marketing kami - counselor2@bestpartnereducation.com</p>
<br>
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
