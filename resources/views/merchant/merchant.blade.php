@extends('layouts.bp_wo_sidenav')
<style media="screen">
    .merchant-content.content-wrapper {
        padding: 0 15px !important;
    }

    .merchant-menu {
        background: #2E62A6;
        color: white;
    }

    .merchant-menu .member-menu {
        text-align: center;
        font-size: 16px;
        flex: 0 0 33.33333333%;
        max-width: 33.33333333%;
        border-right: 2px solid #F8FAFE;
    }

    .merchant-menu .member-menu:hover {
        cursor: pointer;
    }

    .merchant-tab {
        padding:15px !important;
        margin: 15px 0;
    }

    .merchant-tab .desc {
        padding: 15px 0;
        text-align: center;
        border-bottom: 1px solid #ccc;
    }

    .merchant-gallery {
        padding: 0 15px !important;
        margin-bottom:15px;
    }

    .merchant-gallery-image {
        background: black;
        height: 120px;
        margin:15px 0;
    }
    .merchant_product {
        padding: 15px 30px !important;
        border-bottom: 1px solid #bcbcbc;

    }
    .merchant_product:hover{
        cursor:pointer;
    }
    .merchant_product:nth-child(odd){
      border-right:1px solid #bcbcbc;
  }
  .merchant_product:first{
      border-top:1px solid #bcbcbc;
  }
  .merchant_product_image img{
      max-width:100%;
      max-height:130px;
      display: block;
      margin: 0 auto;
  }
  .merchant_product_image,.merchant_product_desc{
      padding:15px;
  }
  .loading-wrapper{
      width:100vw;
      height:100vh;
      position:fixed;
      top:0;
      left:0;
      z-index:9999999;
      display:none;
      background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
      display:block;
      margin:0 auto;
      width:500px;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);

  }

  .my-gallery {
      width: 100%;
      float: left;
  }
  .my-gallery img {
      width: 100%;
      height: auto;
  }
  .my-gallery figure {
      display: block;
      float: left;
      margin: 0 5px 5px 0;
  }
  .my-gallery figcaption {
      display: none;
  }
  @media screen and (max-width:480px) {
    .merchant-detail-info {
        margin-top: 15px;
    }
    .my-gallery figure {
      display: block;
      float: none;
      margin: 0 auto;
  }
}
</style>
<link rel="stylesheet" href="{{asset('css/photo-swipe/photoswipe.css')}}">
<link rel="stylesheet" href="{{asset('css/photo-swipe/default-skin/default-skin.css')}}">
<link href="{{ asset('material') }}/css/material-dashboard.css" rel="stylesheet" />
@section('title','Merchant Details')
@section('content')
<div class="loading-wrapper">
    <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="col-md-12 merchant-content content-wrapper">

  <div class="row">

    <div class="col-md-12 nav-tabs-navigation">
      <div class="row">

        <div class="col-md-12 nav-tabs-wrapper">
          <div class="row">
            @csrf
            <ul class="col-md-12 nav nav-tabs merchant-menu" data-tabs="tabs">
                <li class="nav-item member-menu">
                    <a class="nav-link active show" href="#details" onclick="open_details()" data-toggle="tab">
                       Details
                       <div class="ripple-container"></div>
                       <div class="ripple-container"></div>
                       <div class="ripple-container"></div>
                   </a>
               </li>
               <li class="nav-item member-menu">
                <a class="nav-link" href="#products" onclick="open_products()" data-toggle="tab">
                    Products
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                </a>
            </li>
          <!--   <li class="nav-item member-menu">
                <a class="nav-link" href="#promo" onclick="open_promo()" data-toggle="tab">
                 Promo
                 <div class="ripple-container"></div>
                 <div class="ripple-container"></div>
                 <div class="ripple-container"></div>
             </a>
         </li> -->
     </ul>
 </div>

</div>
</div>
</div>

</div>
<div class="row justify-content-center tab-content">
    <div class="col-md-12 merchant-tab tab-pane active show" id="details">
        <div class="row">
            <div class="col-md-6">
              <div class="card" style="margin-top:0;">

                <div class="card-body">

                    <img src="{{asset($merchant->lokasi_logo)}}" class="merchant-image" alt="">
                    <div class="desc">
                        <h2> <strong>{{$merchant->name}}</strong> </h2>
                    </div>
                    <div class="desc">

                        <h4>Contact</h4>
                    </div>
                    <div class=" desc">
                        <div class="row">

                            <div class="col-md-6 text-left">
                                Registered
                            </div>
                            <div class="col-md-6 text-right">
                                {{$merchant->created_at->format("d/m/Y")}}
                            </div>

                        </div>
                    </div>
                    <div class=" desc">
                        <div class="row">

                            <div class="col-md-6 text-left">
                                No Telepon
                            </div>
                            <div class="col-md-6 text-right">
                                {{$merchant->no_telepon}}
                            </div>

                        </div>
                    </div>
                    <div class=" desc">
                        <div class="row">

                            <div class="col-md-6 text-left">
                                Email
                            </div>
                            <div class="col-md-6 text-right">
                                {{$merchant->email}}
                            </div>

                        </div>
                    </div>

                    <div class=" desc">

                        <div class="row">

                            <div class="col-md-6 text-left">
                                Alamat
                            </div>
                            <div class="col-md-6 text-right">
                                {{$merchant->alamat}}
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-6 merchant-detail-info">
            <div class="row">

                <div class="col-md-12 merchant-gallery">

                    <h4>Merchant Gallery</h4>
                    <div class="row">



                        <div class="col-md-6 col-lg-3 my-gallery">
                          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                              <a href="https://farm3.staticflickr.com/2567/5697107145_a4c2eaa0cd_o.jpg" itemprop="contentUrl" data-size="700x700">
                                  <img src="https://farm3.staticflickr.com/2567/5697107145_3c27ff3cd1_m.jpg" itemprop="thumbnail" alt="Image description" />
                              </a>
                              <figcaption itemprop="caption description">Image caption  1</figcaption>

                          </figure>
                      </div>

                  </div>

              </div>
              <!--
              <div class="col-md-12 merchant-gallery">


                  <h4>Merchant Video</h4>
                  <div class="row">
                      <div class="col-md-6 col-lg-6">
                          <div class="merchant-gallery-image">

                          </div>
                      </div>
                  </div>
              </div>
          -->
          </div>
          <div class="row">

          </div>
      </div>
  </div>
</div>
<div class="col-md-12 tab-pane" id="products">

</div>
<div class="col-md-12 tab-pane " id="promo">

</div>
</div>
</div>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
       It's a separate element as animating opacity is faster than rgba(). -->
       <div class="pswp__bg"></div>

       <!-- Slides wrapper with overflow:hidden. -->
       <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
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
@endsection
@push('more-script')
<script src="{{ asset('js/photo-swipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('js/photo-swipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('material') }}/js/core/popper.min.js"></script>
<script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
<script type="text/javascript">
    var id_merchant = "{{$id}}";
    function merchant_qrcode(kode_promo){
      location.href = "{{url('')}}"+"/promo/"+kode_promo;
  }


  function open_products(){
    var token = $("input[name='_token']").val();
    $('.loading-wrapper').show();
    $.ajax({
        url: "{{route('mp-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          id_merchant : id_merchant
      },
      success: function(data) {
        $('.loading-wrapper').hide();
        $('#products').html(data);
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});
}

function open_promo(){
  var token = $("input[name='_token']").val();
  $('.loading-wrapper').show();
  $.ajax({
      url: "{{route('mpromo-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id_merchant : id_merchant
    },
    success: function(data) {
      $('.loading-wrapper').hide();
      $('#promo').html(data);
  },
  error: function(request, status, error) {
      alert(request.responseText);
  }
});
}

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

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                rect = thumbnail.getBoundingClientRect();

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
</script>

@endpush
