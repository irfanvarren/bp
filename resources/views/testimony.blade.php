@extends('layouts.bp_wo_sidenav')
@section('title', 'News')
@section('content')
  <div class="col-md-12 testimony-wrapper">

    <div class="col-md-12 testimony-overlay"></div>
    <div class="col-md-12 testimony-content">

      <div class="col-md-12">
        <h2 class="col-md-12">TESTIMONIES</h2>
    @foreach($testimony as $data_testimony)
        <div class="col-md-12 testimony">
          <!--<div class="col-md-4">
            <img class="testimony-photo" src="/img/ivan very.png">-->

                      <img class="testimony-photo lazy" data-src="{{Storage::disk('public')->url($data_testimony->image)}}">
        <h4 class="testimony-name">{{$data_testimony->name}}</h4>
        <p>{{$data_testimony->testimony}}</p>

        </div>
      @endforeach
      </div>
      <div class="col-md-12">
        <div class="myslider-dots" style="height:5%;text-align:center;">
          @php $no_testimony = 0 @endphp
          @foreach($testimony as $data_testimony)
        <span class="dot" onclick="currentSlide({{$no_testimony}})" style="border:none;"></span>
          @php $no_testimony++ @endphp
      @endforeach
      <!--<span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>-->
      </div>
      </div>

    </div>

  </div>
<script type="text/javascript">
    var slideIndex = 0;
showSlides();
var timeoutHandle;



function showSlides() {
  var i;
  var slides = document.getElementsByClassName("testimony");
   var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  timeoutHandle = setTimeout(showSlides, 5000); // Change image every 2 seconds
}
function currentSlide(n) {
      window.clearTimeout(timeoutHandle);
  showSlides(slideIndex = n);
}

(function() {
  function logElementEvent(eventName, element) {
    console.log(
      Date.now(),
      eventName,
      element.getAttribute("data-src")
    );
  }
  var callback_enter = function(element) {
    logElementEvent("🔑 ENTERED", element);
  };
  var callback_exit = function(element) {
    logElementEvent("🚪 EXITED", element);
  };
  var callback_reveal = function(element) {
    logElementEvent("👁️ REVEALED", element);
  };
  var callback_loaded = function(element) {
    logElementEvent("👍 LOADED", element);
  };
  var callback_error = function(element) {
    logElementEvent("💀 ERROR", element);
    element.src =
      "https://via.placeholder.com/440x560/?text=Error+Placeholder";
  };
  var callback_finish = function() {
    logElementEvent("✔️ FINISHED", document.documentElement);
  };
  var ll = new LazyLoad({
    elements_selector: ".lazy",
    // Assign the callbacks defined above
    callback_enter: callback_enter,
    callback_exit: callback_exit,
    callback_reveal: callback_reveal,
    callback_loaded: callback_loaded,
    callback_error: callback_error,
    callback_finish: callback_finish
  });
})();
</script>
@stop
