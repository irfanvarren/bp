<!DOCTYPE html>
<html lang="en" dir="ltr" >
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Best Partner | E-Library</title>
  <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
  <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>
    .card-img-top{
      width:auto !important;
      display: block;
      margin:0 auto;
      max-width: 100% !important;
      padding:15px;
    }
    #deskripsi {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #deskripsi td, #deskripsi th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #deskripsi tr:nth-child(even){background-color: #f2f2f2;}

    #deskripsi tr:hover {background-color: #ddd;}

  }
  h1{
    text-align: center;
    font-size: 12px !important;
  }
  h3{
    text-align: center;
    font-size: 20px;
  }
  video {
    display: inline-block;
    vertical-align: baseline;
  }
  h5{
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 20px;
  }

  .thumbnail {
    padding-top: 2px;
    padding-bottom: 5px;
  }
  .searchbox {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .container-fluid {
    max-width: 100%;
  }

  div.gallery {
   border: 1px solid #ccc;
 }

 div.gallery:hover {
  border: 1px solid #777;
}
div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
 padding: 15px;
 text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
 padding: 0 6px;
 float: left;
 width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
.centerdownload {
  position: absolute;
  left: 0;
  top: 100%;
  width: 100%;
  text-align: center;
  font-size: 18px;
}
.centerabout {
  position: absolute;
  left: 0;
  top: 95%;
  width: 100%;
  text-align: center;
  font-size: 18px;
}
.multi-item-carousel{
  .carousel-inner{
    > .item{
      transition: 500ms ease-in-out left;
    }
    .active{
      &.left{
        left:-33%;
      }
      &.right{
        left:33%;
      }
    }
    .next{
      left: 33%;
    }
    .prev{
      left: -33%;
    }
    @media all and (transform-3d), (-webkit-transform-3d) {
      > .item{
        // use your favourite prefixer here
        transition: 500ms ease-in-out left;
        transition: 500ms ease-in-out all;
        backface-visibility: visible;
        transform: none!important;
      }
    }
  }
  .carousel-control{
    background:none;
    &.left, &.right{
      background-image: none;
    }
  }
}
.carousel-control{
  background:none !important;
}

.super-item-carousel{
  .carousel-inner{
    > .item{
      transition: 500ms ease-in-out left;
    }
    .active{
      &.left{
        left:-33%;
      }
      &.right{
        left:33%;
      }
    }
    .next{
      left: 33%;
    }
    .prev{
      left: -33%;
    }
    @media all and (transform-3d), (-webkit-transform-3d) {
      > .item{
        // use your favourite prefixer here
        transition: 500ms ease-in-out left;
        transition: 500ms ease-in-out all;
        backface-visibility: visible;
        transform: none!important;
      }
    }
  }
  .carousel-control{
    background:none;
    &.left, &.right{
      background-image: none;
    }
  }
}
.carousel-control{
  background:none !important;
}
// non-related styling:
body{
  background: #333;
  color: #ddd;
  padding-right: 0 !important;
}
.home-fullscreen {

  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-color: ; /* Ganti disini */
  background-repeat: no-repeat;
  background-size: cover;
}

.detail-fullscreen {

  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  overflow: auto;
  background-image: url('/img/background2.jpg'); /* Ganti disini */
  background-repeat: no-repeat;
  background-size: cover;
}
.search-fullscreen {

  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  overflow: auto;
  background-image: url('/img/background2.jpg'); /* Ganti disini */
  background-repeat: no-repeat;
  background-size: cover;
}
.data-fullscreen {

  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-image: url('/img/background2.jpg'); /* Ganti disini */
  background-repeat: no-repeat;
  background-size: cover;
  height: 1100px
}
.home-caption{
  height: 100px;
  text-align: center;
  font-size: 18px;
}
.searchbar{
  margin-bottom: auto;
  margin-top: auto;
  height: 40px;
  background-color: #353b48;
  border-radius: 30px;
}

.search_input{
  color: white;
  border: 0;
  outline: 0;
  background: none;
  width: 0;
  caret-color:transparent;
  line-height: 40px;
  transition: width 0.4s linear;
}

.searchbar:hover > .search_input{
  padding: 0 10px;
  width: 390px;
  caret-color:red;
  transition: width 0.4s linear;
}

.searchbar:hover > .search_icon{
  background: white;
  color: #e74c3c;
}

.search_icon{
  height: 40px;
  width: 40px;
  float: right;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background: white;
  color: #e74c3c;;
}
.tb
{
  display: table;
  width: 100%;
}

.td
{
  display: table-cell;
  vertical-align: middle;
}

input, button
{
  color: #fff;
  font-family: Nunito;
  padding: 0;
  margin: 0;
  border: 0;
  background-color: transparent;
}
body:not(.modal-open){
  padding-right: 0px !important;
}
.modal-open {
  overflow: hidden;
  padding-right: 0 !important;
}

input[type="text"]
{
  margin-top: 5px;
  width: 50%;
  font-size: 30px;
  line-height: 1;
}

input[type="text"]::placeholder
{
  color: white;
}
}
</style>
</head>
<body>
  @php
  @endphp
  @include('e-library.inc.navbar')

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 p-0">
       @if (Request::is('library'))
       @include('e-library.inc.showcase')
       @endif
     </div>
   </div>
 </div>
 @yield('content')
 @yield('script')
 <script type="text/javascript">
  $('document').ready(function(){
    $('#search_input').keypress(function(e) {

      if(e.which == 13) {
        var keyword = $('#search_input').val();
        location.href = "{{url('library/search?keyword=')}}"+keyword;
      }
    });

  });
</script>

<script type="text/javascript">
  function Functionclick() {
    var keyword = $('#search_input').val();
    location.href = "{{url('library/search?keyword=')}}"+keyword;
  }
</script>					
</body>
</html>
