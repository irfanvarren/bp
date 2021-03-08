@extends('layouts.bp_wo_sidenav')
@section('title', 'Media')
@push('head-script')
<link rel="stylesheet" href="{{asset('')}}fullcalendar-5.3.2/lib/main.css">
<script src="{{asset('')}}fullcalendar-5.3.2/lib/main.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
  headerToolbar: { center: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek' },
     events: {!! $events !!},
    initialView: 'dayGridMonth',
  });
    calendar.render();
  });
</script>
<style>
  .fc-content{
    color:white;
  }

  .test-table td,.test-table{
    color:white;
    font-size:16px;
  }

  #test-date-table::-webkit-scrollbar-track
  {
    background-color: transparent;
    border-radius: 10px;
  }

  #test-date-table::-webkit-scrollbar
  {
    border-radius:10px;
    width: 10px;
    margin-left:15px;
    background-color: transparent;
  }

  #test-date-table::-webkit-scrollbar-thumb
  {
    border-radius: 10px;
    background:#ffd700;
  }
  .toefl-schedule{
    padding:0;writing-mode: vertical-rl;text-orientation: mixed;text-align:center;
  }
  .toefl-schedule-btn:hover{
    cursor:pointer;
    background:#1f3a73;
  }
  .toefl-schedule-btn{
    display:block;margin:0 auto;
    background:#1f3a73;

    padding:5px;
  }

  .calendar-wrapper{
    padding:30px;
  }

  #toefl-schedule-wrapper{
    display:none;
  }
  .content-header.media .event-title{
    font-size:5vw;font-family:verdana;color:white;text-shadow: 3px 3px 3px #930967;text-align: center;
  }
  .event-type-wrapper{
    padding:20px 0px;
   background: rgb(34,34,34);
background: -moz-linear-gradient(0deg, rgba(34,34,34,1) 0%, rgba(31,10,59,1) 100%);
background: -webkit-linear-gradient(0deg, rgba(34,34,34,1) 0%, rgba(31,10,59,1) 100%);
background: linear-gradient(0deg, rgba(34,34,34,1) 0%, rgba(31,10,59,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#222222",endColorstr="#1f0a3b",GradientType=1);

  }
  .event-type-link:hover{
    text-decoration: none;
  }
  .event-type-btn{
 display: block;
  padding: 1em 1em;
  font-size:1.2em;
  background: transparent;
  border-radius: 6px;
  font-weight: bold;
  text-align: center;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  border:0;
  color:white;
  transition: all 1s ease;

  }

  .event-type-btn:hover{
  border-left: 2px solid #3dade9 !important;
  border-right: 2px solid #bf2fcb !important;
  background-size:auto !important;
  background-position:auto !important;

  }

 .event-type-btn.blue {
  font-weight: 100;
  line-height: 1;
  letter-spacing: 1px;
  border-left: 2px solid #3dade9;
  border-right: 2px solid #bf2fcb;
  background-image: -webkit-linear-gradient(left, #3dade9, #bf2fcb), -webkit-linear-gradient(left, #3dade9, #bf2fcb);
  background-size: 100% 2px;
  background-position: 0 100%, 0 0;
  background-repeat: no-repeat;
  background-clip: border-box;
}
    @media screen and (max-width: 1280px){
      .media.content-header{
      height:42vh !important;
      }
      .content-header.media .event-title{
       font-size:6vw;
       }
       .fc .fc-toolbar{
    display: block !important;
    } 
    .fc .fc-toolbar-title{
      margin-top:10px;
      text-align: center;
    }
    .fc-toolbar .fc-toolbar-chunk{
      text-align:center;
      margin-top:10px;
    }
    }
    @media screen and (max-width: 768px){
    .toefl-schedule{
      writing-mode:horizontal-tb;
      margin-top:10px;

    }
    .content-header.media .event-title{
    font-size:8vw;
   }
   .media.content-header{
    height:25vh !important;
   }
     @media screen and (max-width: 468px){
       .media.content-header{
        background-attachment: fixed;
        }
     }
  }
</style>
@endpush
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 media content-header" style="height: 650px;background-image:url('{{asset('/img/events/background-events.png')}}');background-size:cover;background-position:center;background-attachment: fixed" >
  <!--<div class="col-md-12 slick-slider" style="padding:0;height:90%;">
    <div class="slick-slide">-->
      <div style="position:absolute;top:50%;transform: translateY(-50%);width: 100%;padding:25px;text-align: center;"> 
        <H1 class="event-title">Best Partner's Events</H1>
      </div>

 <!--</div>
   <div class="slick-slide">
      <div class="col-md-12 recent-events-img" style="background-image:url('{{asset('/img/events/events1.jpg')}}')">
        <div class="center">
          <h1>Seminar IKIP PGRI Pontianak</h1>
          <h5>8 May 2018</h5>
        </div>
      </div>
    </div>
    <div class="slick-slide">
      <div class="col-md-12 recent-events-img" style="background-image:url('{{asset('/img/events/events1.jpg')}}')">
        <div class="center">
          <h1>Seminar IKIP PGRI Pontianak</h1>
          <h5>8 May 2018</h5>
        </div>
      </div>
    </div>
  </div>-->

</div>
<div class="col-md-12 ">
  <div class="row event-type-wrapper">
      @php
      $count = $event_types->count();
      $lg_last_row =  $count % 4;
      $lg_last_row_index = $count - $lg_last_row;
      $md_last_row = $count % 3;
      $md_last_row_index = $count - $md_last_row;
      @endphp

      @foreach($event_types as $key => $data_event_type)

      <a class="@if($key < $lg_last_row_index) col-lg-3 @else col-lg-{{12 / $lg_last_row}} @endif @if($key < $md_last_row_index) col-md-4 @else col-md-{{12/$md_last_row}} @endif col-sm-6 event-type-link" style="margin:15px 0px;" href="/media/events/{{str_slug(strtolower($data_event_type->name))}}">

        <div class="col-md-12">
          <button class="col-md-12 event-type-btn blue">
           <span>{{$data_event_type->name}}</span>
          </button>
        </div>
      </a>
      @endforeach
     
  </div>
  <div class="row">
    <div class="col-lg-6 calendar-wrapper">
      <div id="calendar"></div>
    </div>
    <div class="col-lg-6" style="padding:30px;background:#1a6ca3;color:white;">
      <div class="row" id="ielts-schedule-wrapper">
        <div class="col-md-11" style="padding-right:0px;">    <h2> <strong> IELTS Test Schedule </strong> </h2> <br>
          <div style="max-height: 480px;min-height:410px;overflow: auto;padding-right:30px;" id="test-date-table">
<!--
Study in  Australia       | list brochure
          Singapore       | video youtube
          Malaysia        | gallery (foto) | chat
          United Kingdom  | info
          Ireland         |
-->
            <table class="table test-table" id="ielts-table">
              <tr> <th>No</th> <th>Bulan</th> <th>Tanggal Test</th> <th>Module</th></tr>
              @foreach($ielts_date as $key => $value)
              @php
              $key += 1;   
              @endphp
              <tr>
                <td>{{$key}}</td> <td>{{date("F",strtotime($value->tgl_mulai))}}</td> <td>{{date("d/m/Y",strtotime($value->tgl_mulai))}}</td> <td>{{$value->test_module}}</td>

              </tr>
              @endforeach
            </table>
          </div> </div>
          <div onclick="open_toefl_schedule()" class="col-md-1 toefl-schedule"> <span class="toefl-schedule-btn"> TOEFL ITP Test Schedule </span> </div>
        </div>
        <div class="row" id="toefl-schedule-wrapper">
          <div class="col-md-11" style="padding-right:0px;">    <h2> <strong> TOEFL Test Schedule </strong> </h2> <br>
            <div style="max-height: 480px;min-height:410px;overflow: auto;padding-right:30px;" id="test-date-table">

              <table class="table test-table">
                <tr> <th>No</th> <th>Bulan</th> <th>Tanggal Test</th> </tr>
                @foreach($toefl_date as $key => $value)
                @php
                $key += 1;   
                @endphp
                <tr>
                  <td>{{$key}}</td> <td>{{date("F",strtotime($value->tgl_mulai))}}</td> <td>{{date("d/m/Y",strtotime($value->tgl_mulai))}}</td> 

                </tr>
                @endforeach
              </table>
            </div> 
          </div>
          <div onclick="open_ielts_schedule()" class="col-md-1 toefl-schedule"> <span class="toefl-schedule-btn"> IELTS Test Schedule </span> </div>
        </div> 
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function open_toefl_schedule(){
      $('#toefl-schedule-wrapper').css({'display':'flex'});
      $('#ielts-schedule-wrapper').hide();
    }
    function open_ielts_schedule(){
      $('#ielts-schedule-wrapper').css({'display':'flex'});
      $('#toefl-schedule-wrapper').hide();
    }
    $(document).ready(function() {
      $('.slick-slider').slick({
        infinite: true,
        dots: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        rows: 1,
        prevArrow: '<a class="myslick-prev myslick-nav"><i class="fa fa-angle-left"></i></a>',
        nextArrow: '<a class="myslick-next myslick-nav"> <i class="fa fa-angle-right"></i> </a>',
        customPaging: function(slider, i) {
          return '<i class="fa fa-circle" id=' + i + '></i>';
        },
        autoplay: true,
        autoplaySpeed: 2500,

        responsive: [{
          breakpoint: 600,
          settings: {
            adaptiveHeight: true,
          }
        }]
      });
    });
  </script>
  @stop
