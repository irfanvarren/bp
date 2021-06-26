@extends('layouts.bp-new')
@section('title', 'Study Abroad')
@push('head-script')
<style>
    .box-negara {
      position: relative;
      border-left: solid white;
      border-bottom: solid white;
      height: 600px;
      cursor:help;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .overlay-negara {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(000,000,000,0.4);
      overflow: hidden;
      width: 100%;
      height: 0;
      transition: .5s ease;
      cursor:help;
    }

    .head-negara{
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(000,000,000,0.4);
      overflow: hidden;
      width: 100%;
      transition: .2s ease;
      text-align:center;
      cursor:help;
    }
    .text-negara-info{
      background-color:rgba(000,000,000,0.4);
      color: white;
      font-size: 15px;
      padding: 16px 32px;
      cursor:help;
    }
    .box-negara:hover .overlay-negara{
      height: 100%;
      cursor:help;
    }

    .box-negara:hover .head-negara {
      opacity:0;
      cursor:help;
    }
    .text-negara {
      color: white;
      font-size: 15px;
      position: absolute;
      top: 50%;
      left:50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
      cursor:help;
    }
    </style>
@endpush
@section('content')
<div class="container-fluit row martop8 pl-5 pr-5">
  <div class="col-sm-6 pl-5">
    <h1 class="ml-5"><b>Where the best<br>of both worlds<br>meet.</b></h1>
    <p class="ml-5 pr-5">
      Imagine waking up as the light gently enters the room. Imagine getting up, opening the windows and letting the glorious sunlight flood the house, while the magnificent view over the river invites you to think about all the possibilities the new day has to offer, a few minutes away from the main points of interest of the city of Lisbon.
    </p>
    <a class="ml-5 pr-5" style="color:blue;" href="studyaboard-detil">Learn More</a>
  </div>
  <div class="col-sm-6 pl-5">
    <img src="{{asset('/img/studying abroad/1.png')}}" class="martop10" >
    <img src="{{asset('/img/studying abroad/2.png')}}" class="ml-4">
  </div>
</div>
<div class="container-fluid row martop5">
 @foreach($countries as $country)
    <div class="col-sm-3 box-negara" style="
    background-image: url('{{asset('img/countries/lama/'.$country->name.'.jpg')}}');">
    <div class="head-negara">
      <div class="text-head-negara">
        <h2 style="color:white;">{{$country->name}}</h2>
      </div>
    </div>
    <div class="overlay-negara">
      <div class="text-negara">
        <h4 style="color:white;">{{$country->name}}</h4>
        <p style="color:white;"> 
         {{$country->description}}
        </p>
      </div>
    </div>
  </div>
@endforeach
</div>
@stop
