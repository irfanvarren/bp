@extends('layouts.bp_wo_sidenav')
<style>
ul,ol{
    list-style-position: inside;
    padding:0 15px;
}

.options-wrapper{
    padding:0 22px !important;
}
</style>
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
           Sisa Waktu : <div id="timer"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
      
            <h3>Soal & Jawaban Tidak Teracak</h3>
     
            @foreach($questions as $key => $question)
       
                @php
                $key+=1;    
                @endphp
                <div>
                {{$key.'. '.$question->question}}
            </div>
                @if($question->options->count())    
                <ol style="list-style-type:lower-alpha">
                    
                    @foreach ($question->options as $options)
                    
                    <li>{{$options->option}}</li>
                    @endforeach
                    
                </ol>
                @endif
 
            @endforeach
        </div>
        <div class="col-md-6">
            <h3>Soal & Jawaban Teracak</h3>
            @foreach($shuffledQuestions as $key => $question)
            <div>
                @php
                $key +=1;    
                @endphp
                {{$key.'. '.$question->question}}
                @if($question->options->count())    
                <div class="col-md-12">
                    <div class="row">
                    @foreach ($question->options as $options_key => $options)
                    
                    <span class="col-md-12 options-wrapper"> <input type="radio" class="options options-{{$key}}" name="option-{{$key}}" id=""> {{chr(65+$options_key).') '}} {{$options->option}} </span>
                    @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endforeach
            
        </div>
    </div>
</div>


@endsection
@push('more-script')
<script>
var timeout = '{{$timeout * 1000}}';
var now = '{{\Carbon\Carbon::now()->timestamp * 1000}}';
var timer = (timeout - now)/1000;

function makeInteger(time,x,mod){
    var time = Math.floor(time/x) % mod;
    if(time < 10){
        time = "0" + time;
    }
    return time;
}



var timerDisplay = $('#timer');
$(document).ready(function(){
    console.log(timer);
  var timerInterval =  setInterval(function() { // execute code each second

if(timer > 0){
timer--; // decrement timestamp with one second each second

//var days    = makeInteger(timer, 24 * 60 * 60),      // calculate days from timestamp
    //hours   = makeInteger(timer,      60 * 60) % 24, // hours
   // minutes = makeInteger(timer,           60) % 60, // minutes
 //   seconds = makeInteger(timer,            1) % 60; // seconds
var hours = makeInteger(timer,60 * 60,99),
minutes = makeInteger(timer,60,60),
seconds = makeInteger(timer,1,60);
//seconds = countSeconds(timer,1);
//timerDisplay.html(days + " days, " + hours + ":" + minutes + ":" + seconds); // display
timerDisplay.html( hours + ":" + minutes + ":" + seconds);
}else{
    clearInterval(timerInterval);
        alert('waktu habis');
        location.href = "{{url('/student')}}";
    }
}, 1000); 
  
});

</script>
@endpush