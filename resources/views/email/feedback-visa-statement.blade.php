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
  </style>
</head>
<body>
  <div class="email-wrapper">


  <div class="header">
      <img src="{{$message->embed(public_path().'/img/logo_putih.png')}}" class="logo" alt="">
  </div>
  <div class="wrapper" style="">

    <p style="width:100%;font-size:24px;text-align:center;margin:100px 0;">Email ini sebagai notifikasi bahwa anda telah menyetujui syarat dan ketentuan pengurusan visa yang berlaku di Best Partner.

    Terima Kasih</p>

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
