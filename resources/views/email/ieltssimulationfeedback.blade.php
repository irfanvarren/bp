<head>
  <style media="screen">
    .wrapper{
      width:85%;
      display:block;
      margin:0 auto;}
      .logo{
        width:160px;
        height:auto;
        margin:0 auto;
      }
      .header,.footer{
        display:flex;
        flex: 0 0 100%;
        max-width:100%;
        padding:25px;
        background:#3e6db8;
      }
      .footer-logo-wrapper{
        margin:0 auto;
        display:flex;
        flex:0;
        align-items: center;

      }
      .footer-logo{
        width:28px;
        height:28px;
        margin:0px 5px;
      }
      .sosmed-link{
        text-decoration:none;
        color:white !important;
        height:28px;
        line-height: 28px;
        font-size:16px;
      }
      @media screen and (max-width:480px){
        .wrapper{
          width:100%;
        }
      }
      .email-wrapper{
        width:100%;
        display:block;
        border:1px solid #cecece;
        margin:0 auto;
      }
      .bp-contacts{
        margin:0 auto;
      }
      .bp-contacts td{
        padding:5px 15px;
      }
    </style>
  </head>
  <body>
    <div class="email-wrapper">
      <div class="header">
        <img src="{{$message->embed(public_path().'/img/logo_putih.png')}}" class="logo" alt="">
      </div>
      <div class="wrapper" style="">
        <p> Hi {{$email->NAMA}}, </p>

        <p> Terima kasih telah mendaftar Simulasi IELTS di BEST PARTNER EDUCATION. Informasi lebih lanjut akan kami beritahukan melalui email atau nomor telpon seluler. Mohon untuk memastikan bahwa data yang anda input sudah BENAR. Diharapkan agar anda melakukan pembayaran sebelum simulasi IELTS dilakukan. Pembayaran dilakukan dengan melakukan transfer antar Bank ke rekening tujuan atas nama CV. BEST PARTNER dengan informasi lengkap rekening tujuan transfer sebagai berikut:  </p>
         <img src="{{asset('img/rek-cv.jpg')}}" style="width: 100%">
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
        <p>
          Setelah berhasil melakukan pembayaran, silahkan untuk mengkonfirmasi kepada pihak Best Partner Education dengan cara mengirimkan bukti pembayaran ke divisi keuangan Best Partner Education dialamat email  finance@bestpartnereducation.com
        </p>
        <p>Jika anda mempunyai pertanyaan seputar produk atau informasi lanjutan lainnya, silahkan hubungi marketing kami - counselor2@bestpartnereducation.com</p>
        <br>
        <p> <strong>*Note :</strong></p>
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
      </div>
      <div class="footer">
        <div class="footer-logo-wrapper">
          <a href="https://www.instagram.com/bestpartnereducation/" target="_blank">
            <img src="{{$message->embed(public_path().'/img/ig.png')}}" class="footer-logo" alt="">
          </a>
          <a href="https://www.facebook.com/bestpartnereducation/" target="_blank">
           <img src="{{$message->embed(public_path().'/img/fb.png')}}" class="footer-logo" alt=""></a> <a href="https://www.youtube.com/channel/UCicDSptmlROwc3B6kYEbUjw" target="_blank"> <img src="{{$message->embed(public_path().'/img/yt.png')}}" style="width:auto;" class="footer-logo" alt=""> </a>
           <a href="https://bestpartnereducation.com"> <img class="footer-logo" src="{{$message->embed(public_path().'/img/globe.png')}}" target="_blank" alt="">  </a>
         </div>
       </div>
     </div>
   </body>
