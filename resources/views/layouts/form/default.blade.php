<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
  </style> 
  <style type="text/css">
    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }
    .div-wrapper {
      height: 200px;
      margin-top: 40px;
      border: 2px dashed #ddd;
      border-radius: 8px;
    }

    .div-to-align {
      width: 75%;
      padding: 40px 20px;

      /* .... */

    }
    .my-input{
      background: none;
      border:1px solid black;
      color:black;
    }
    .rating-wrapper input{
      display: none;
    }
    .rating-wrapper label{
      width:45px;
      height:45px;
      font-weight: bold;
      line-height: 45px;
      font-size:18px;
      border:1px solid black;
      text-align: center;

    }
    .rating-wrapper label:hover{
      cursor:pointer;
    } 
    .rating-wrapper input:checked + label{
      /*background: rgba(255,255,255,0.8);*/
      background:#2647bf;
      color:white;
    }
    .form-example *{
      font-family: 'Roboto', sans-serif;
    } 
    .form-bg{
      background:url('{{asset('img/form/back login 1.png')}}'); background-size: cover;background-position:center bottom -100px;background-attachment: fixed;background-repeat: no-repeat;
    }
    .card-center{
      border-radius: 20px;background:rgba(255,255,255,0.7);border:none;margin: 0 auto;
    }
    @media screen and (max-width : 1366px){
      .form-bg{
        background-position:center;
      }
      .card-center{
        padding-top:5%;
      }
    }
    @media screen and (max-width : 480px){
      .card-center{
        margin-top:50%;
        padding-top:10%;
        padding-bottom:10%;
        transform:translateY(-15%);
      }
    }
  </style>
</head>

<body>

@yield('content')


@stack('more-script')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e7da78635bcbb0c9aaae552/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->
<!-- </body></html> -->
</body>
</html>
