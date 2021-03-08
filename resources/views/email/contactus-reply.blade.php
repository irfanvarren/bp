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
@if($email->event_slug == "talkshow-get-engspired-speak-english-achieve-more-in-life")
<p>BP Edu is inviting you to a scheduled Zoom meeting.</p>

<p>Topic: Talkshow! Get Engspired! Speak English, Achieve More in Life <br>
Time: Jun 24, 2020 01:00 PM Jakarta</p>

<p>Join Zoom Meeting <br>
https://us02web.zoom.us/j/86466908423</p>

<p>Meeting ID: 864 6690 8423
Password: MANIC</p>

@else
<div class="email-wrapper">
<div class="header">
    <img src="{{$message->embed(public_path().'/img/logo_putih.png')}}" width="160" class="logo" alt="">
</div>
  <div class="wrapper" style="">
    <p>Hi {{$email->nama}},</p>
    <p>
Thanks so much for reaching out! This auto-reply is just to let you know… <br>
We received your email and will get back to you with a counsellor’s response as soon as possible. <br>
We’ll get back to you within 8 business hours (Monday – Friday from 9 am - 5 pm WIB). <br>
If you have any additional information that you think will help us to assist you, please feel free to reply <br>
to this email. <br>
We look forward to chatting soon! <br>
Cheers,
</p>
<div>--------------------------------------------</div>
<p> Hai {{$email->nama}}, </p>
 <p> 

Terima kasih banyak untuk menjangkau! Balasan otomatis ini hanya untuk memberi tahu Anda ... <br>
Kami menerima email Anda dan akan segera menghubungi Anda dengan respons dari penasihat kami <br>
sesegera mungkin. Kami akan menghubungi Anda dalam waktu 8 jam kerja (Senin - Jumat mulai jam 9 <br>
pagi - 5 sore WIB).<br>
Jika Anda memiliki informasi tambahan yang menurut Anda akan membantu kami untuk membantubr 
Anda, silakan balas email ini <br>
Kami berharap dapat segera mengobrol!<br>
 </p>

<br>
<p> <strong>*Note :</strong></p>
<p>Pembayaran atas produk apapun yang berkaitan dengan BEST PARTNER EDUCATION hanya akan diterima melalui rekening atas nama BEST PARTNER CV.</p>
<p>BEST PARTNER EDUCATION tidak bertanggung jawab atas tindak penipuan yang mengatas namakan BEST PARTNER EDUCATION yang meminta anda melakukan pembayaran/ transfer ke rekening dengan menggunakan nama pribadi atau selain BEST PARTNER CV </p>
<strong> Untuk informasi lebih lanjut silahkan hubungi kami melalui</strong>
<table class="bp-contacts">
  <tr>
    <td>Phone </td> <td>: (0561) 8172583</td>
  </tr>
  <tr>
    <td>Email </td> <td>: info@bestpartnereducation.com</td>
  </tr>
  <tr>
    <td>Website </td> <td>: www.bestpartnereducation.com</td>
  </tr>
  <tr>
    <td>Instagram </td> <td>: bestpartnereducation</td>
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
@endif


  
</body>