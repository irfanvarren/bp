@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
	body {
  font-family: "Lato", sans-serif;
}
.container{
  max-width: 100% !important;
}
.sidebar {
  height: 100%;
  width: 70px;
  float:left;
  padding: 0;
  z-index: 0;
  top: 0;
  left: 0;
  background-color: #2f4050;
  transition: 0.5s;
  overflow-x: hidden;
  padding-top: 30px;
  white-space: nowrap;
  margin-top:0;
}

.sidebar a {
	padding: 10px 8px 10px 22px;
  text-decoration: none;
  font-size: 25px;
  color: #ccc;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

#mainSidebar .sidebar {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.material-icons,
.icon-text {
  vertical-align: middle;

}
.icon-text.block{
  display: block;
margin-left:-22px;font-size:11px;text-align:center;padding-left:8px;font-weight: bold;white-space: normal;
}
.icon-text{
	 font-size:16px;
}

.sidebar .material-icons {
  padding-bottom: 3px;
  margin-right: 30px;
}

#mainSidebar {
  padding: 0;
  margin-left: 70px;
  transition: margin-left 0.5s;
}

@media screen and (max-height: 450px) {
  .sidebar {
    padding-top: 15px;
  }
  .sidebar a {
    font-size: 18px;
  }
}

.tablinks.active{
  color:#2075ba;
}

.school-link{
  color:#2477bd;
  cursor:pointer;text-transform: none;text-decoration: none;
}
.school-link:hover{
  color:#2477bd;
  text-transform: none;text-decoration: none;
}


.loading{
  position: fixed;
  top:0;
  width: 100%;
  height: 100%;
  left: 0;
  font-size:28px;
  text-align: center;
  background: rgba(255,255,255,0.8);
  z-index: 20;
  display: table;
  visibility: hidden;
}
.loading > div {
  display: table-cell;
  vertical-align: middle;
}

.hide{
  display: none;
}


</style>
@endpush
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<div class="loading">
  <div>
    Loading...
  </div>
</div>
<div class="col-md-12" style="padding:0;">
<div class="container" style="height:100%;min-height:100vh;padding:0;background: #f3f3f3;border-top: 1px solid #eee;">
<div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
   @if(Auth::guard()->user()->hasRole('Student'))
  <a href="{{url('/search-schools/student')}}"><span><i class="material-icons">home</i> <!--<span class="icon-text">Home</span>--><span class="icon-text block" id="icon-text">Home</span></a>
  @else
  <a href="{{url('/search-schools/')}}"><span><i class="material-icons">home</i> <!--<span class="icon-text">Home</span>--><span class="icon-text block" id="icon-text">Home</span></a>
  @endif
  @if(Auth::guard()->user()->hasRole('Student'))
   <a href="{{url('/search-schools/student/profile')}}" ><i class="material-icons">assignment</i><span class="icon-text block" id="icon-text" style="font-size:10px;">Student Information</span></a>
  @else
  <!--  <a href="{{url('/search-schools/profile')}}"><i class="material-icons">assignment</i><span class="icon-text block" id="icon-text">Profile</span></a>-->
  @endif 
  <a href="{{url('/search-schools/search/programs')}}"><i class="material-icons">search</i><div class="icon-text block" id="icon-text">Search Programs</div></a>
  <a href="{{url('/search-schools/search/schools')}}"><i class="material-icons">account_balance</i><span class="icon-text block" id="icon-text">Schools</span></a>
  @if(Auth::guard()->user()->hasRole('Student'))

  @else 
      <a href="{{url('/student/register')}}"><i class="material-icons">assignment</i><span class="icon-text block" id="icon-text" style="font-size:10px;">Apply as student<span></a>
  @endif
  <a href="{{url('enquiry')}}">
    <i class="material-icons">question_answer</i><span class="icon-text block" id="icon-text" style="font-size:10px;">Enquiry<span>
  </a>
     
  <a href="{{url('logout')}}">
    <i class="material-icons">lock_outline</i><span class="icon-text block" id="icon-text" style="font-size:10px;">Logout<span>
  </a>
  	 
</div>

<div id="mainSidebar">
	@yield('sidebar-content')
</div>
</div>
</div>

@endsection
@push('more-script')
<script type="text/javascript">
  var mini = true;

function toggleSidebar() {
  /*if (mini) {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("mainSidebar").style.marginLeft = "250px";
    console.log( $(this).children());
    $(this).find('.icon-text').hide();

    this.mini = false;
  } else {
    document.getElementById("mySidebar").style.width = "70px";
    document.getElementById("mainSidebar").style.marginLeft = "70px";
    $(this).find('#icon-text').hide();
    this.mini = true;
  }*/
}

   $(window).scroll(function(){

    if($(window).width() > 768){
      var scrollOffset = $(window).scrollTop();
      if(scrollOffset >= 82){
        $('#mySidebar').css({
          'position' : 'fixed',
          'top' : '0',
        });
      }else{
       $('#mySidebar').css({
        'position' : 'relative'
        
      });
     }
   }
 });

</script>
@endpush