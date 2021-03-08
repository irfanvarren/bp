@extends('e-library.layouts.app')

@section('content')
<div class="catalog-fullscreen">
  <div class="container" style="background-color: white; padding-bottom: 2px;padding-top: 2px;border-bottom: 5px solid">
    <h2>
      <a href="" style="text-align:center; color: #68c7e6">Dictionary</a>
    </h2>
  </div>

  <div class="container" style="background-color: white;padding:0;">
   <div class="carousel slide multi-item-carousel" id="theCarousel">
     <div class="row d-flex align-items-center justify-content-center">
      <div class="container mt-5">
       <div class="col-md-12 ">
        <div class="carousel-inner ">
          <?php

          $buku = App\Models\Library\Buku::where('kategori_buku','Kamus')->offset(0)->limit(1)->get();?>
          <div class="item active ">

            @foreach ($buku as $buku)
            <div class="col-md-4 "><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
              <div class="caption" >
                <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                @if($buku->cek_ebook == 1)
                <img src="{{asset('img/library/icon/e-book.png')}}" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_audio == 1)
                <img src="{{asset('img/library/icon/audio.png')}}" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_video == 1)
                <img src="{{asset('img/library/icon/video.png')}}" style="height: 20px;width: 20px">
                @endif
                <br>
                <br>
                <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                <br>
                <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>

              </div>
            </div>
            @endforeach
          </div>

          <?php

          $buku = App\Models\Library\Buku::where('kategori_buku','Kamus')->offset(1)->limit(1)->get(); ?>
          <div class="item">
            @foreach($buku as $buku)
            <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
              <div class="caption" >
                <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                @if($buku->cek_ebook == 1)
                <img src="icon/e-book.png" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_audio == 1)
                <img src="icon/audio.png" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_video == 1)
                <img src="icon/video.png" style="height: 20px;width: 20px">
                @endif
                <br>
                <br>
                <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                <br>
                <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
              </div>
            </div>
          </div>
          @endforeach

          <?php

          $buku = App\Models\Library\Buku::where('kategori_buku','Kamus')->offset(2)->limit(1)->get(); ?>
          <div class="item">
            @foreach($buku as $buku)
            <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
              <div class="caption" >
                <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                @if($buku->cek_ebook == 1)
                <img src="icon/e-book.png" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_audio == 1)
                <img src="icon/audio.png" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_video == 1)
                <img src="icon/video.png" style="height: 20px;width: 20px">
                @endif
                <br>
                <br>
                <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                <br>
                <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
              </div>
            </div>
          </div>
          @endforeach

          <?php

          $buku = App\Models\Library\Buku::where('kategori_buku','Kamus')->offset(3)->limit(1)->get(); ?>
          <div class="item">
            @foreach($buku as $buku)
            <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
              <div class="caption" >
                <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                @if($buku->cek_ebook == 1)
                <img src="icon/e-book.png" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_audio == 1)
                <img src="icon/audio.png" style="height: 20px;width: 20px">
                @endif
                @if($buku->cek_video == 1)
                <img src="icon/video.png" style="height: 20px;width: 20px">
                @endif
                <br>
                <br>
                <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                <br>
                <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- add  more items here -->
          <!-- Example item start:  -->


          <!--  Example item end -->
        </div>
      </div>
      <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left" style="color: black"></i></a>
      <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right" style="color: black"></i></a>
    </div>
  </div>
</div>
</div>
</div>
<script>
  $('.multi-item-carousel').carousel({
    interval: false
  });

  $('.multi-item-carousel .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length>0) {
      next.next().children(':first-child').clone().appendTo($(this));
    } else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
  });
</script>
<!------------------------------------------------------------------------------------------------------->
<div class="container" style="background-color: white; padding-bottom: 2px;padding-top: 2px;border-bottom: 5px solid">

  <h2>
    <a href="" style="text-align: center ; color: #68c7e6">IELTS Book</a>

  </h2>
</div>

<div class="container" style="background-color: white" >
  <div class="carousel slide super-item-carousel" id="theCarouseli">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="container mt-5">
        <div class="col-md-12">
          <div class="carousel-inner">
            <?php

            $buku = App\Models\Library\Buku::where('kategori_buku','IELTS')->offset(0)->limit(1)->get();?>
            <div class="item active">
              @foreach ($buku as $buku)
              <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
                <div class="caption" >
                  <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                  <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                  @if($buku->cek_ebook == 1)
                  <img src="icon/e-book.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_audio == 1)
                  <img src="icon/audio.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_video == 1)
                  <img src="icon/video.png" style="height: 20px;width: 20px">
                  @endif
                  <br>
                  <br>
                  <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                  <br>
                  <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
                </div>
              </div>
              @endforeach
            </div>

            <?php

            $buku = App\Models\Library\Buku::where('kategori_buku','IELTS')->offset(1)->limit(1)->get(); ?>
            <div class="item">
              @foreach($buku as $buku)
              <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
                <div class="caption" >
                  <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                  <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                  @if($buku->cek_ebook == 1)
                  <img src="icon/e-book.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_audio == 1)
                  <img src="icon/audio.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_video == 1)
                  <img src="icon/video.png" style="height: 20px;width: 20px">
                  @endif
                  <br>
                  <br>
                  <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                  <br>
                  <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
                </div>
              </div>
            </div>
            @endforeach

            <?php

            $buku = App\Models\Library\Buku::where('kategori_buku','IELTS')->offset(2)->limit(1)->get(); ?>
            <div class="item">
              @foreach($buku as $buku)
              <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
                <div class="caption" >
                  <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                  <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                  @if($buku->cek_ebook == 1)
                  <img src="icon/e-book.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_audio == 1)
                  <img src="icon/audio.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_video == 1)
                  <img src="icon/video.png" style="height: 20px;width: 20px">
                  @endif
                  <br>
                  <br>
                  <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                  <br>
                  <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
                </div>
              </div>
            </div>
            @endforeach

            <?php

            $buku = App\Models\Library\Buku::where('kategori_buku','IELTS')->offset(3)->limit(1)->get(); ?>
            <div class="item">
              @foreach($buku as $buku)
              <div class="col-md-4"><a href="detail/{{$buku->id}}"><img src="{{$buku->link_gambar}}" style="height: 350px" class="img-responsive"></a>
                <div class="caption" >
                  <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
                  <h4 style="font-size: 15px; max-height: 40px;overflow: hidden;height: 40px" >{{$buku->judul}}</h4>
                  @if($buku->cek_ebook == 1)
                  <img src="icon/e-book.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_audio == 1)
                  <img src="icon/audio.png" style="height: 20px;width: 20px">
                  @endif
                  @if($buku->cek_video == 1)
                  <img src="icon/video.png" style="height: 20px;width: 20px">
                  @endif
                  <br>
                  <br>
                  <a href="detail/{{$buku->id}}" style= "font-size: 13px;color: #C0C0C0"  >Deskripsi buku</a>
                  <br>
                  <a href="{{$buku->link_download}}" style="font-size: 18px" >Download</a>
                </div>
              </div>
            </div>
            @endforeach
            <!-- add  more items here -->
            <!-- Example item start:  -->


            <!--  Example item end -->
          </div>
        </div>
        <a class="left carousel-control" href="#theCarouseli" data-slide="prev"><i class="glyphicon glyphicon-chevron-left" style="color: black"></i></a>
        <a class="right carousel-control" href="#theCarouseli" data-slide="next"><i class="glyphicon glyphicon-chevron-right" style="color: black"></i></a>
      </div>
    </div>
  </div>
</div>
</div>

<script>

  $('.super-item-carousel').carousel({
    interval: false
  });

  $('.super-item-carousel .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length>0) {
      next.next().children(':first-child').clone().appendTo($(this));
    } else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
  });
</script>
@endsection