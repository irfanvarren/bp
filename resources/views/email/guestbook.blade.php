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
<div style="width:100%;font-size:16px;text-align:center;margin:100px 0;">

    <p >
      Hi <span style="text-decoration:underline;">{{$email->NAMA}}</span>, <br>
    </p>
    <p>
      Terima kasih telah mendaftarkan diri anda melalui e-guest book BEST PARTNER EDUCATION.
    </p>
    <p>
Dengan ini anda telah membantu mengurangi penggunaan kertas yang sangat berdampak pada lingkungan. Anda telah menyelamatkan dunia indah yang kita tinggali ini. Mari bersama-sama kita tingkatkan lagi kesadaran untuk “MENYELAMATKAN DUNIA”.
</p>
<p>
Tindakan kecilmu berdampak besar!
</p>
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
