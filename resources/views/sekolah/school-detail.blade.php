@extends('layouts.search-school')
@push('head-script')
<!-- Core CSS file -->
<link rel="stylesheet" href="{{asset('css/photo-swipe/photoswipe.css')}}"> 

<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite, 
     - preloader.gif (for browsers that do not support CSS animations) -->
     <link rel="stylesheet" href="{{asset('css/photo-swipe/default-skin/default-skin.css')}}"> 

     <!-- Core JS file -->
     <script src="{{asset('js/photo-swipe/photoswipe.min.js')}}"></script> 

     <!-- UI JS file -->
     <script src="{{asset('js/photo-swipe/photoswipe-ui-default.min.js')}}"></script> 
     <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://bestpartnereducation.com/public/css/slick.css">
<link rel="stylesheet" href="https://bestpartnereducation.com/public/css/slick-theme.css">
<style type="text/css">
  @media screen and (max-width: 480px) {
    .gallery-slider .gallery-image{
      width:100% !important;
      height:auto;
    }


  }
  .time-table tr td{
    padding: 15px;
  }
  .other-fees-wrapper .nav-tabs>li>a{
    background:#4180b0;
    color:white;
    border-bottom:2px solid white;
  }
  .other-fees-wrapper .nav-tabs>li>a.active{
    background:#34a8eb;
  }
  .tabcontent,.program-tabcontent {
    display:none;
  }
  .tablinks{
    transition:0.4s all;
  }
  .tablinks:hover{
    cursor:pointer;
    color:#454243;
  }
  .program-tablinks{
    background:#3490dc;
    color:white;
    text-align:center;
    margin-bottom:10px;
  }
  .program-tablinks:hover{
    cursor:pointer;
  }
  .school-header{
    height:450px;
    background-position: center center;
    background-size: cover;
    background-repeat:no-repeat;
  }
  .photo-container{
    width: 200px;
    display: block;
    margin: 0 auto;
  }
  .photo-wrapper{
    display: block;
    margin:0 auto;
    width: 200px;
  }
  .photo{
    width: 200px;
    height: 200px;
    background:#aaa;
    /*margin-top:-100px;*/
    border-radius: 50%;
    box-shadow: 0 0 2px #f0f0f0;
    overflow: hidden;
    border:5px solid white;
  }
/*  .pswp img {
  max-width: none;
  height: auto !important;
    object-fit: contain;
    max-height:100%;
    }*/


    .my-gallery {
      width: 100%;
      float: left;
      white-space: nowrap;
      padding-bottom:15px;
    }
    .my-gallery img {
      width: auto;
      height:auto;
      border:3px solid white;
      max-height: 120px;
    }
    .my-gallery figure {
      display: inline;
      margin: 0 10px 0px 0;
    }
    .my-gallery figcaption {
      display: none;
    }

    .pswp__caption__center{
      text-align: center;
    }
    .my-card{
      background: white;border-radius: 15px;padding:15px;margin-bottom:15px;
    }

</style>
@endpush
@section('sidebar-content')
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12 school-header" style="@if($school->galleries->first())background-image:url({{asset('img/schools/'.$school->id.'/'.$school->galleries->first()->image)}});@else background-image:url({{asset('img/schools/no-gallery.jpeg')}});  @endif">

    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="padding:30px 30px 30px 30px;background-color:#F3F3F3">
      <div class="row">
        <div class="col-lg-4" style="padding:0 30px;z-index: 9; position: static;top:0;">
          <div class="row">

            <div class="col-lg-12 photo-container">
              <div class="photo-wrapper">
                <div class="photo" style="background:url('{{asset('img/schools/logo_sekolah/'.$school->logo)}}');background-size:100%;background-repeat:no-repeat;background-position:center;background-color:#aaa;">
                </div>
              </div>
            </div>
            <div class="col-lg-12 text-center" style="display: block;margin:0 auto;background:white;min-height:300px;margin-top:-100px;border-radius:20px;position: static;padding:120px 15px 15px 15px; font-family: calibri">
              <div class="row">
                <div class="col-md-12">
                  <h3>{{$school->name}}</h3>
                </div>
                <p class="col-md-12">
                  {{$school->address}}
                </p>
                <div class="col-md-12">
                  <h6>{{$school->city_name}}, {{$school->region_name}}, {{$school->country_name}}</h6>
                </div>
                <p class="col-md-12">
                  School Id : {{$school->id}}
                </p>
                <div class="col-md-12">
                  <a class="btn btn-primary" href="{{$school->website}}" target="_blank" style="padding:8px 16px;margin-right:15px;"><span><i class="material-icons" style="margin-right:8px">public</i> Website</span></a>
                  <a class="btn btn-primary" href="" style="padding:8px 16px;" target="_blank">
                    <i class="material-icons"  style="margin-right:8px">school</i> Apply</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <!-- Root element of PhotoSwipe. Must have class pswp. -->
              <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
      It's a separate element, as animating opacity is faster than rgba(). -->
      <div class="pswp__bg"></div>

      <!-- Slides wrapper with overflow:hidden. -->
      <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

          <div class="pswp__top-bar">

            <!--  Controls are self-explanatory. Order can be changed. -->

            <div class="pswp__counter"></div>

            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

            <button class="pswp__button pswp__button--share" title="Share"></button>

            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

            <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
            <!-- element will get class pswp__preloader--active when preloader is running -->
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div> 
          </div>

          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
          </button>

          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
          </button>

          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>

        </div>

      </div>

    </div>
    <div class="my-gallery col-md-12"  style="margin-bottom:15px; overflow-x:auto;max-height: 150px;" itemscope itemtype="http://schema.org/ImageGallery" itemscope itemtype="http://schema.org/ImageGallery">
      @foreach($school->galleries as $key => $value)
      @php
      $size = getimagesize(asset('img/schools/').'/'.$value->school_id.'/'.rawurlencode($value->image));
      list($width,$height) = $size;
      $key ++;
      @endphp
      <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
        <a href="{{asset('img/schools/').'/'.$value->school_id.'/'.$value->image}}" itemprop="contentUrl" data-size="{{$width}}x{{$height}}">
          <img src="{{asset('img/schools/').'/'.$value->school_id.'/'.$value->image}}" itemprop="thumbnail" alt="Image description" />
        </a>
        <figcaption class="text-center" itemprop="caption description">{{$school->abbreviation.'-'.$key}}</figcaption>

      </figure>
      
      @endforeach
    </div>

    <div class="col-md-12 my-card" style="min-height:380px;">
      <div class="row">
        <div class="col-md-12">
          <h3><strong>About</strong></h3>
                @if(trim($school->description))
                <div>{!!$school->description!!}</div>
                @else
                <div><h4 style="margin:25px 0 15px 0;">No Description</h4></div>
                @endif
            </div>
        </div>
    </div>

    @if(count($school->has_courses))
    <div class="col-md-12" style="margin-bottom:10px;">
      <h3><strong>School Programs</strong></h3>
    </div>

    @foreach($school->has_courses as $keyCourse => $course)       
    @foreach($course->programs as $keyProgram => $program)
    <div class="col-md-12 my-card">
      <div class="row">
        <div class="col-md-12">
          {{$program->name}}
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-11" style="font-size:13px;">
              <div class="mb-2">
                <span>Tuition Fee : </span>
                <span>
                  @if($program->fee != "" && $program->fee != 0)
                   <!--<br>
                - -->{{$school->curr_symbol}} {{$program->fee}} {{$school->curr_code}}  
                <!--<br>
                - $ {{number_format($program->fee / json_encode($ex_rate_usd[$school->curr_code]),2,',','.')}} USD <br>
                - Rp. {{number_format($program->fee / json_encode($ex_rate_idr[$school->curr_code]),2,',','.')}} IDR <br>
                -->
                  @else
                  -
                  @endif
                </span>
              </div>
              <div class="mb-2">
                 Application Fee : 
                    @if($program->enrollment_fee != "" && $program->enrollment_fee != 0)
                    <!--<br> 
                - -->{{$school->curr_symbol}} {{$program->enrollment_fee}} {{$school->curr_code}} <!--,  <br>
                - $ {{number_format($program->enrollment_fee / json_encode($ex_rate_usd[$school->curr_code]),2,',','.')}} USD, <br>
                - Rp. {{number_format($program->enrollment_fee / json_encode($ex_rate_idr[$school->curr_code]),2,',','.')}} IDR-->
                @else
                -
                @endif
              </div>
              <div>
                Material Fee : 
                   @if($program->material_fee != "" && $program->material_fee != 0)
                   <!--<br> 
                - -->{{$school->curr_symbol}} {{$program->material_fee}} {{$school->curr_code}} <!--, <br>
                - $ {{number_format($program->material_fee / json_encode($ex_rate_usd[$school->curr_code]),2,',','.')}} USD,<br>
                - Rp. {{number_format($program->material_fee / json_encode($ex_rate_idr[$school->curr_code]),2,',','.')}} IDR -->
                @else
                -
                @endif
              </div>

            </div>
            <div class="col-md-1" style="padding:7.5px 15px;">
              
              <a class="btn btn-primary" style="float:right;" href="{{url('search-schools/program/'.$program->id.'/details')}}" target="_blank">Details</a>
            </div>
          </div>

        </div>
      </div>

    </div>
    @endforeach
    @endforeach
    @endif


    @if(count($school->time_tables))
    <div class="col-md-12 my-card">
      <div class="row">
        <div class="col-md-12">
          <h3><strong>Time Table</strong></h3>
        </div>
        <div class="col-md-12 time-table-wrapper" style="max-height: 450px;overflow-y: auto;">
          <div class="row">
            @foreach($school->time_tables->groupBy('program_name') as $key => $timetableProgram)

            <div class="{{ $key != '' ? 'col-md-12' : 'col-md-12'}}" @if($school->time_tables->groupBy('program_name')->count() == 1) style="display:block;margin: 0 auto;" @endif>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" > 
                      <h5 style="display: table;width: 100%;border-bottom:1px solid #bebebe;margin-bottom:15px;">
                        <strong style="line-height: 1.4em;height:2.8em;display: table-cell;vertical-align: middle;">{{$key}}</strong>
                                        </h5>
                                    </div>
                                    @foreach($timetableProgram->groupBy('type') as $type => $timeTable)
                                    <div class="col-md-6">
                                      <table class="table table-bordered">  
                                       @if($type != "")
                                       <tr> <td colspan="2">{{$type}}</td> </tr>
                                       @endif 

                                       @foreach($timeTable as $data)
                                       <tr> <td>{{$data->days}}</td> <td>{{$data->time}}</td></tr>
                                       @endforeach

                                   </table>
                               </div>
                               @endforeach
                           </div>
                       </div>
                   </div>

               </div>


               @endforeach
           </div>
       </div>
   </div>
</div>
@endif

@if(count($school->intakes))
<div class="col-md-12 my-card">
  <div class="row">
    <div class="col-md-12">
        <h3><strong>School Intakes</strong></h3>
    </div>
    <div class="col-md-12">
        <div class="col-md-12 text-center">
           <div class="row">

              @if(count($school->intakes->where("term","")))
              <div class="col-md-12 text-center"> No Term - Intakes</div>
              <table class="table table-bordered">

                 @foreach($school->intakes->where("term","")->groupBy("year") as $key => $intakeTerm) 

                 <tr><th colspan="5">{{$key}}</th></tr>
                 <tr><td>Term</td><td>Program</td> <td>Intake Date</td> <td>Orientation Date</td> <td>Note</td> </tr>
                 @foreach($intakeTerm as $data)
                 <tr>
                    <td>{{$data->term}}</td><td>{{$data->program_name}}</td><td>{{$data->intake_date != "" ? date("d F Y",strtotime($data->intake_date)) : "To be confirmed"}}</td> <td>{{$data->orientation_date != "" ? date("d F Y",strtotime($data->orientation_date)) : "To be confirmed"}}</td> <td>{{$data->note}}</td>
                </tr>
                @endforeach
                @endforeach

            </table>
            @endif


            @if(count($school->intakes->where("term","!=","")->where("program_id","")))
            <div class="col-md-12 text-center"><h5><strong>All Programs</strong></h5></div>
            <table class="table table-bordered">
             @foreach ($school->intakes->where("term","!=","")->where("program_id","=","")->groupBy("year") as $key => $intakeTerm)

             <tr><th colspan="3">{{$key}}</th></tr>
             <tr> <td>Term</td><td>Intake Date</td> <td>Orientation Date</td> </tr>
             @foreach($intakeTerm as $data)
             <tr>
                <td>{{$data->term}}</td><td>{{$data->intake_date != "" ? date("d F Y",strtotime($data->intake_date)) : "To be confirmed"}}</td> <td>{{$data->orientation_date != "" ? date("d F Y",strtotime($data->orientation_date)) : "To be confirmed"}}</td>

            </tr>
            @endforeach
            @endforeach
        </table>
        @endif

        @if(count($school->intakes->where("term_id","")->where("program_id","!=","")))
        <div class="col-md-12 text-center">Intake Per Programs</div>
        <table class="table table-bordered">
         @foreach ($school->intakes->where("term","!=","")->where("program_id","!=","")->groupBy("year") as $key => $intakeTerm)

         <tr><th colspan="4">{{$key}}</th></tr>
         <tr> <td>Term</td><td>Program</td><td>Intake Date</td> <td>Orientation Date</td> </tr>
         @foreach($intakeTerm as $data)
         <tr>
            <td>{{$data->term}}</td>
            <td>{{$data->program_name}}</td>
            <td>{{$data->intake_date != "" ? date("d F Y",strtotime($data->intake_date)) : "To be confirmed"}}</td> <td>{{$data->orientation_date != "" ? date("d F Y",strtotime($data->orientation_date)) : "To be confirmed"}}</td>

        </tr>
        @endforeach
        @endforeach
    </table>
    @endif
</div>
</div>
</div>
</div>
</div>
@endif

@if(count($school->other_fees))
<div class="col-md-12 my-card">
  <div class="row">
     <div class="col-md-12">
        <h3><strong>Other Fees</strong></h3>

    </div>
    <div class="col-md-12">
        <div class="row form-group">
           <div class="col-md-12" style="max-height: 450px;overflow-y: auto;">
              <table class="table table-bordered">
                 <colgroup>
                    <col>
                    <col style="min-width:100px;">
                    <col>
                </colgroup>
                <thead>
                    <tr> <th>Name</th> <th>Fee</th> <th>Details</th></tr>
                </thead>
                <tbody>
                    @foreach($school->other_fees as $key => $value)
                    <tr>
                       <td>{{$value->name}}</td> <td>{{ $value->fee != "" ? $school->curr_symbol.' '.$value->fee : ""}}</td> <td>{{urldecode($value->details)}}</td>
                   </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
</div>
</div>
@endif
@if(count($school->refunds))
<div class="col-md-12 my-card">
  <div class="row">
     <div class="col-md-12">
        <h3><strong>Refund Policy</strong></h3>
    </div>

    <div class="col-md-12">
        <table class="table table-bordered">
           @foreach($school->refunds as $value)
           <tr>
              <td>{{$value->name}}</td> <td> {{$value->jlh_refund_persen != "" ? $value->jlh_refund_persen.'%' : $value->jlh_refund_total}} </td><td>
                 {{urldecode($value->details)}}</td>
             </tr>
             @endforeach
         </table>
     </div>

 </div>
</div>
@endif
@if(count($school->student_informations))
<div class="col-md-12 my-card">
 <div class="row">
    <div class="col-md-12">
       <h3><strong>Student Information</strong></h3>
   </div>
   @php
   $student_informations = $school->student_informations->first();
   $obligations = $student_informations->obligations != "" ? explode('|',$student_informations->obligations) : "";
   $rights = $student_informations->rights != "" ? explode('|',$student_informations->rights) : "";
   @endphp
   <div class="col-md-12">
       <div class="row form-group">  @if($rights != "")
          <div class="col-md-6" style="max-height: 450px;overflow-y: auto;">
          
             <table class="table table-bordered">
                <tr><th>Rights</th></tr>
                @foreach($rights as $key=> $value)
                <tr><td>{{$value}}</td></tr>
                @endforeach
            </table>

        </div>

            @endif
       @if($obligations != "")
         
        <div class="col-md-6" style="max-height: 450px;overflow-y: auto;">
         <table class="table table-bordered">
            <tr> <th>Obligations</th> </tr>
            @foreach($obligations as $value)
            <tr><td>{{$value}}</td></tr>
            @endforeach
        </table>
        
    </div>
    @endif

</div>
</div>
</div>
</div>

@endif
</div>
</div>
</div>
</div>

</div>

</div>

@stop 
@push('more-script')
<script src="https://bestpartnereducation.com/public/js/slick.js"></script>
<script type="text/javascript">
  var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
      var thumbElements = el.childNodes,
      numNodes = thumbElements.length,
      items = [],
      figureEl,
      linkEl,
      size,
      item;

      for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
              continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
              src: linkEl.getAttribute('href'),
              w: parseInt(size[0], 10),
              h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
      return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
      e = e || window.event;
      e.preventDefault ? e.preventDefault() : e.returnValue = false;

      var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
          return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
          return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
        childNodes = clickedListItem.parentNode.childNodes,
        numChildNodes = childNodes.length,
        nodeIndex = 0,
        index;

        for (var i = 0; i < numChildNodes; i++) {
          if(childNodes[i].nodeType !== 1) { 
            continue; 
          }

          if(childNodes[i] === clickedListItem) {
            index = nodeIndex;
            break;
          }
          nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
      var hash = window.location.hash.substring(1),
      params = {};

      if(hash.length < 5) {
        return params;
      }

      var vars = hash.split('&');
      for (var i = 0; i < vars.length; i++) {
        if(!vars[i]) {
          continue;
        }
        var pair = vars[i].split('=');  
        if(pair.length < 2) {
          continue;
        }           
        params[pair[0]] = pair[1];
      }

      if(params.gid) {
        params.gid = parseInt(params.gid, 10);
      }

      return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
      var pswpElement = document.querySelectorAll('.pswp')[0],
      gallery,
      options,
      items;

      items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {
          fullscreenEl: true,

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                rect = thumbnail.getBoundingClientRect(); 
                console.log(thumbnail);
                console.log("rect");
                console.log(rect);
                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
          if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                  if(items[j].pid == index) {
                    options.index = j;
                    break;
                  }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
          options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
          return;
        }

        if(disableAnimation) {
          options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
      galleryElements[i].setAttribute('data-pswp-uid', i+1);
      galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
      openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');





$(document).ready(function() {
  $('.slick-slider').slick({
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    lazyLoad: 'ondemand',
    rows: 1,
    prevArrow: '<a class="myslick-prev myslick-nav myslick-nav2" ><i class="fa fa-angle-left"></i></a>',
    nextArrow: '<a class="myslick-next myslick-nav myslick-nav2"> <i class="fa fa-angle-right"></i> </a>',
    autoplay: true,
    autoplaySpeed: 4500,

    responsive: [{
      breakpoint: 600,
      settings: {
        arrows: false,
        adaptiveHeight: true,
      }
    }]
  });
});
function openTabs(evt,tabid,id_jurusan){
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabid).style.display = "block";
  evt.currentTarget.className += " active";
}
function openProgramTabs(evt,tabid){
  $('#'+tabid).toggle();

}
</script>
@endpush
