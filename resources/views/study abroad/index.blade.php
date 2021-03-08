@extends('layouts.bp_wo_sidenav')
@section('title', 'Study Abroad')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 sa-home content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/study abroad.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
		<div class="content-title">
	<p><h1>Study Abroad</h1></p>
	<p>Informasi Beasiswa</p>
	</div>
</div>
<div class="content-wrapper study_abroad col-md-12">
    <h1>DESTINATION</h1>
    <div class="search-contry">

    </div>
    <div class="col-md-12 country-wrapper">


            	<div class="col-md-3" onclick="location.href='../study-abroad/australia'">
            		    <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/australia.jpg')}}');" >
                <div class="country-overlay">
                    <h1>Australia</h1>
                </div>
                </div>
                 	</div>
            </div>

			<div class="col-md-3" onclick="location.href='study-abroad/singapore'">
				   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/singapore.jpg')}}');">
                <div class="country-overlay"><h1>Singapore</h1></div>
                </div>
            </div>
        </div>

            	<div class="col-md-3" onclick="location.href='study-abroad/malaysia'">
            		   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/malaysia.jpg')}}');">
                <div class="country-overlay"><h1>Malaysia</h1></div>
                </div>
            </div>
        </div>

            	<div class="col-md-3" onclick="location.href='study-abroad/new-zealand'">
            		   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/New Zealand.jpg')}}');">
                <div class="country-overlay"><h1>New Zealand</h1></div>
                </div>
            </div>
        </div>

                   <div class="col-md-3" onclick="location.href='study-abroad/switzerland'">
                   	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Switzerland.jpg')}}');">
                <div class="country-overlay"><h1>Switzerland</h1></div>
            </div>
        </div>
    </div>
          <div class="col-md-3" onclick="location.href='study-abroad/canada'">
          	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Canada.jpg')}}');">
                <div class="country-overlay"><h1>Canada</h1></div>
            </div>
        </div>
    </div>

        <div class="col-md-3" onclick="location.href='study-abroad/south-korea'">
        	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/South Korea.jpg')}}');">
                <div class="country-overlay"><h1>South Korea</h1></div>
            </div>
        </div>
    </div>
          <div class="col-md-3" onclick="location.href='study-abroad/china'">
          	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/China.jpg')}}');">
                <div class="country-overlay"><h1>China</h1></div>
            </div>
        </div>
        </div>
        <div class="hide-country">
          <div class="col-md-3" onclick="location.href='study-abroad/england'">
          	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/England.jpeg')}}');">
                <div class="country-overlay"><h1>England</h1></div>
            </div>
        </div>
    </div>

        <div class="col-md-3" onclick="location.href='study-abroad/france'">
        	 <div class="col-md-12" style="height:100%;overflow:hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/France.jpg')}}');">
                <div class="country-overlay"><h1>France</h1></div>
            </div>
        </div>
    </div>
          <div class="col-md-3" onclick="location.href='study-abroad/ireland'">
          	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Ireland.jpg')}}');">
                <div class="country-overlay"><h1>Ireland</h1></div>
            </div>
        </div>
    </div>

          <div class="col-md-3" onclick="location.href='study-abroad/netherland'">
          	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Netherland.jpg')}}');">
                <div class="country-overlay"><h1>Netherland</h1></div>
            </div>
        </div>
    </div>

         <div class="col-md-3" onclick="location.href='study-abroad/spain'">
         	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Spain.jpg')}}');">

                <div class="country-overlay"><h1>Spain</h1></div>
            </div>
        </div>
    </div>


         <div class="col-md-3" onclick="location.href='study-abroad/swedia'">
         	   <div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Swedia.jpg')}}');">
                <div class="country-overlay"><h1>Swedia</h1></div>
            </div>
        </div>
    </div>
         <div class="col-md-3" onclick="location.href='study-abroad/usa'">
         	<div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/United States.jpg')}}');">
                <div class="country-overlay"><h1>United States</h1></div>
            </div>
        </div>
    </div>
           <div class="col-md-3" onclick="location.href='study-abroad/indonesia'">
           	<div class="col-md-12" style="height:100%;overflow: hidden;">
            <div class="col-md-12 country" style="background-image: url('{{asset('img/negara/lama/Indonesia.jpg')}}');">
                <div class="country-overlay"><h1>Indonesia</h1></div>
            </div>
        </div>
    </div>
    </div>
           <div class="col-md-12 see-more">
       		<input type="button" name="" id="see-more-btn" value="See More">
       </div>
    </div>
</div>
<script>
$(document).ready(function(){

  $('#see-more-btn').click(function(){
   $('.hide-country').slideToggle(600,function(){
  });
   if ($(this).val() == "See More") {
      $(this).val("Hide");
   }
   else {
      $(this).val("See More");
   }
});
});
</script>
@stop
