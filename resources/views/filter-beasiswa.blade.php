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