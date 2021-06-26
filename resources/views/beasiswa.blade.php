@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/salvattore.css')}}">
<style media="screen">
  .news{
    margin-bottom:30px;
  }
  .news-tags::before{
    content:'# ';
  }

  .media-news ol, .media-news ul{
    list-style-position: inside;
  }
  .media-news .img-wrap{
    width: 100%;
    background:white;
    height: 150px;
    margin-bottom: 15px;
    padding: 0;
    overflow: hidden;
    display:flex;
    flex-direction:column;
    justify-content:center;
  }
  .media-news .img-wrap img{
    margin:auto;
  }

  .news-link{
    color:black;
    text-decoration: none;
  }
  .news-link:hover{
    color:black;
    text-decoration: none;
    cursor: pointer;
  }
 

  .animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }


  .animated.bounceIn,
  .animated.bounceOut {
    -webkit-animation-duration: .75s;
    animation-duration: .75s;
  }

  @-webkit-keyframes bounceIn {
    from, 20%, 40%, 60%, 80%, to {
      -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      -webkit-transform: scale3d(.3, .3, .3);
      transform: scale3d(.3, .3, .3);
    }

    20% {
      -webkit-transform: scale3d(1.1, 1.1, 1.1);
      transform: scale3d(1.1, 1.1, 1.1);
    }

    40% {
      -webkit-transform: scale3d(.9, .9, .9);
      transform: scale3d(.9, .9, .9);
    }

    60% {
      opacity: 1;
      -webkit-transform: scale3d(1.03, 1.03, 1.03);
      transform: scale3d(1.03, 1.03, 1.03);
    }

    80% {
      -webkit-transform: scale3d(.97, .97, .97);
      transform: scale3d(.97, .97, .97);
    }

    to {
      opacity: 1;
      -webkit-transform: scale3d(1, 1, 1);
      transform: scale3d(1, 1, 1);
    }
  }

  @keyframes bounceIn {
    from, 20%, 40%, 60%, 80%, to {
      -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      -webkit-transform: scale3d(.3, .3, .3);
      transform: scale3d(.3, .3, .3);
    }

    20% {
      -webkit-transform: scale3d(1.1, 1.1, 1.1);
      transform: scale3d(1.1, 1.1, 1.1);
    }

    40% {
      -webkit-transform: scale3d(.9, .9, .9);
      transform: scale3d(.9, .9, .9);
    }

    60% {
      opacity: 1;
      -webkit-transform: scale3d(1.03, 1.03, 1.03);
      transform: scale3d(1.03, 1.03, 1.03);
    }

    80% {
      -webkit-transform: scale3d(.97, .97, .97);
      transform: scale3d(.97, .97, .97);
    }

    to {
      opacity: 1;
      -webkit-transform: scale3d(1, 1, 1);
      transform: scale3d(1, 1, 1);
    }
  }

  .bounceIn {
    -webkit-animation-name: bounceIn;
    animation-name: bounceIn;
  }
  .beasiswa-header{
    border-bottom:1px solid #ccc;margin-bottom: 15px;
  }
  .beasiswa-header:hover{
    cursor: pointer;
  }

  .beasiswa-header .fa-angle-down{
    transition: all 0.5s;
    font-size:18px;
  }

  .beasiswa-header .toggled{
   transform: rotate(-180deg);
 }
 .timeline-item {
  background: #fff;
  border: 1px solid;
  border-color: #e5e6e9 #dfe0e4 #d0d1d5;
  border-radius: 3px;
  height: 100%;

  margin: 0 auto;
  position: absolute;top:0;
  left: 0;
  width: 100%;
}

@keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0
  }
  100% {
    background-position: 468px 0
  }
}
.beasiswa-item{
  background:white;border:1px solid #dedede;box-shadow: 0 0 5px #eee;height:130px;
  border-radius: 15px;
}
.animated-background.active {
  animation-duration: 1s;
  animation-fill-mode: forwards;
  animation-iteration-count: infinite;
  animation-name: placeHolderShimmer;
  animation-timing-function: linear;
  background: #f6f7f8;
  background: linear-gradient(to right, #f4f4f4 8%, #ececec 18%, #f4f4f4 33%);
  background-size: 800px 104px;

  position: relative;
}
.tag-beasiswa{
  color:white;
  border-radius:15px;
  padding:1px 5px;
  font-size:12px;
}
.tag-beasiswa:first-child{
  margin-left: 5px;
}
.tag-s1{
  background: rgb(121, 193, 238);
  
}
.tag-s2{
  background:rgb(29, 131, 194);
}

.tag-s3{
  background:rgb(8, 77, 119);
  
}
.tag-non-degree{
  background:rgb(244, 146, 55);
}
.beasiswa-filter{
  padding-right:40px;
}

@media screen and (max-width:992px){
  .beasiswa-filter{
    padding:0 15px;
    margin-bottom:15px;
  }
  .beasiswa-item-wrapper{
    padding:0 15px !important;
  }
  .beasiswa-header{
    margin-bottom: 0;
    padding:10px 0 !important;
  }
  .beasiswa-item{
    border:none;
    border-bottom:1px solid #dedede;
    box-shadow: none;
    border-radius: 0;
    height: auto;
    padding:15px 0 !important;
  }
}
</style>
@endpush
@section('title', 'Beasiswa')
@section('content')
<div class="col-lg-12" style="background:white;">

  <div class="container pt-3 py-3" style="max-width:1140px !important;">
    <div class="row">
      <div class="col-lg-3 beasiswa-filter" >
        <div class="row">
          <div class="card col-lg-12 p-0" style="border-radius: 15px;">
            <div class="card-body p-0" >
              <form id="myForm" name="myForm" action="#" method="POST">
                @csrf
                <div class="col-lg-12 p-3" style="border-bottom:1px solid #dedede">
                  <h5 class="mb-0 d-inline" style="display:inline;"><strong>Filter</strong></h5> <span onclick="filter_beasiswa('reset')" class="btn-link float-right text-primary">Reset Filter</span>
                </div>
                <div class="col-lg-12 p-3" style="border-bottom:1px solid #dedede">
                  <h5 class="mb-3"><strong>Jenjang</strong></h5>  
                  <div class="row">
                    @foreach($jenjang_beasiswa as $data)
                      <label class="col-lg-12" onclick="filter_beasiswa()">
                        {{$data->name}}  <input type="checkbox" class="float-right" value="{{$data->name}}" name="jenjang[]" >
                      </label>
                    @endforeach
                  </div>
                </div>
                <div class="col-lg-12 p-3" style="border-bottom:1px solid #dedede">
                  <h5 class="mb-2"><strong>Bulan</strong></h5> 
                  <div>
                    <select class="custom-select custom-select-md" name="beasiswa_month" id="beasiswa_month">
                      <option value="">All</option>
                      @for($i = 1; $i <= 12; $i++)
                      <option value="{{$i}}">{{ date("F", mktime(0, 0, 0, $i, 10))}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="col-lg-12 p-3" >
                  <h5 class="mb-3"><strong>Status</strong></h5> 
                  <div class="row">                  
                    <label class="col-lg-12" onclick="filter_beasiswa()">
                      Deadline  <input type="checkbox" class="float-right" value="end" name="status[]">
                    </label>

                    <label class="col-lg-12" onclick="filter_beasiswa()">
                      Open Registration  <input type="checkbox" class="float-right" value="start" name="status[]">
                    </label>
                  </div>


                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-9" id="beasiswa-output">
@if(count($data_beasiswa))
@foreach($data_beasiswa as $month => $arr_beasiswa)

@if(count($arr_beasiswa))
<div class="row">
  <div class="col-lg-12 px-0 py-2 pb-3 beasiswa-header animated-background" onclick="toggle_header_beasiswa('{{$month}}',this)"><h4 class="d-inline
    " style="display: inline;"><strong>{{ date("F", mktime(0, 0, 0, $month, 10))}}</strong></h4><span class="ml-2 text-secondary"> {{count($arr_beasiswa) > 0 ? count($arr_beasiswa)." info beasiswa" : ""}} </span><span class="float-right text-primary"> <span class="show-hide-text">@if(date("n") == $month) Sembunyikan @else Tampilkan @endif</span> <i class="fa fa-angle-down @if(date("n") == $month) toggled @endif" aria-hidden="true"></i>
  </span> </div>
  <div class="col-lg-12 p-0 h-0" @if(date("n") == $month) style="display: block;"  @else style="display: none;"@endif id="beasiswa-{{$month}}">
    <div class="row">
      @foreach($arr_beasiswa->sortBy('sort_date') as $beasiswa)

      <div  class="col-lg-6 p-3 beasiswa-item-wrapper">
       <a class="news-link" href="{{url("media/beasiswa/".date("Y/m",strtotime($beasiswa["created_at"])).'/'.$beasiswa["slug"])}}">

        <div class="p-3 beasiswa-item animated-background">

          @if($beasiswa['type_beasiswa'] == "start")
          <div class="mb-2" style="color:blue;font-size:14px;">
            Open Registration: {{date("d M Y",strtotime($beasiswa['start_date']))}} 
            @foreach($beasiswa['tags'] as $tag) 
<span class="tag-beasiswa tag-{{$tag->slug}}">{{$tag->name}}</span>
@endforeach

          </div>
          @else

          <div class="mb-2" style="color: #cc4b41;font-size:14px;">
            Deadline: {{date("d F Y",strtotime($beasiswa['end_date']))}}
              @foreach($beasiswa['tags'] as $tag) 
<span class="tag-beasiswa tag-{{$tag->slug}}">{{$tag->name}}</span>
@endforeach
          </div>
          @endif
          <div style="font-size:16px;display: -webkit-box;  -webkit-box-orient: vertical;-webkit-line-clamp: 2;-moz-line-clamp: 2;-ms-line-clamp: 2;-o-line-clamp: 2;line-clamp: 2;overflow: hidden;text-overflow: ellipsis;max-height: 2.8rem;line-height: 1.4rem;">   
           <strong>{{$beasiswa['title']}}</strong> 
         </div>

       </div>
     </a>
   </div>


   @endforeach

 </div>
</div>
</div>
@endif
@endforeach
@else
<div class="col-md-12" style="padding:60px 15px;">
  <div class="row justify-content-center">
    <div class="col-md-6">
  <img src="{{asset('img/not-found.png')}}" style="display: block;margin:0 auto;max-width: 80%;">
  <div>
    <h1 style="font-family:'truenoBd';text-align: center;margin-top:30px;">Whoops, No Result Was Found<h1>
  </div>
  </div>
  </div>
</div>
@endif
     </div>
   </div>
 </div>
</div>
@push('more-script')
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/salvattore.min.js')}}"></script>
<script type="text/javascript">
  var now = "{{\Carbon\Carbon::now()->timestamp }}";
  var onloadTimer = [];
  var token = $("input[name='_token']").val();
  filter_beasiswa();
  $('#beasiswa_month').on('change',function(){
   filter_beasiswa();
 });

  function filter_beasiswa(cmd = null){
    preload_animation(); 
    var myForm = document.getElementById('myForm');
    if(cmd == "reset"){
      myForm.reset();
    }
    var formElements = myForm.elements;
    var status = [];
    var jenjang = [];
    var month = document.getElementById('beasiswa_month').value;
    $.each(formElements["status[]"],function(k,v){

      if(v.checked == true){

        status.push(v.value);
      }
    });
    $.each(formElements["jenjang[]"],function(k,v){

      if(v.checked == true){

        jenjang.push(v.value);
      }
    });
    $.ajax({
      url : "{{route('filter-beasiswa')}}",
      method : "POST",
      data:{
        _token : token,
        month : month,
        status : status,
        jenjang : jenjang,
        cmd : cmd
      },
      success:function(data){
        $('#beasiswa-output').html(data);
      },error:function(){
        alert('error');
      }
    });
  }

  function preload_animation(){
   $('.animated-background').addClass('active');
   $('.animated-background').html("&emsp;");
 }

 function toggle_header_beasiswa(month,el){

  var show_hide_text = el.querySelector(".show-hide-text");
  if(show_hide_text.innerHTML == "Tampilkan"){
    show_hide_text.innerHTML = "Sembunyikan";
  }else{
    show_hide_text.innerHTML = "Tampilkan";
  }
  $(show_hide_text.nextElementSibling).toggleClass('toggled');
  $('#beasiswa-'+month).slideToggle("fast");
}
</script>
@endpush

@stop
