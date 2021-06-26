@extends('e-library.layouts.app')
@section('content')
<div class="home-fullscreen">
  <br>

  <br>
  <div class="container" style="padding-bottom: 2px;padding-top: 2px">
    <div class="slider-text d-flex align-items-left justify-content-left" >
      <h2>
        <a href="">Terbitan terbaru</a>

      </h2>
    </div>
    <div class="d-flex align-items-center justify-content-center" style="margin-top: 30px;">

      @foreach($buku as $buku)
      <div class="col-md-4 p-3" >
        <div class="card">
          <a href="{{url('library/detail/'.$buku->id)}}">
        <img class="card-img-top"
        src="{{$buku->link_gambar}} "
        style="height: 300px" 
        alt="Card image cap">
      </a>
        <div class="card-body">
          <h4 style="font-size: 13px;color: #C0C0C0">{{ $buku->kategori_buku }} </h4>
          <a href="{{url('library/detail/'.$buku->id)}}"><h4 class="card-title" style="font-size: 15px; max-height: 50px;overflow: hidden;height: 50px;text-align: left">{{ $buku->judul }}</h4></a>
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
         
        </div>
        </div>
      </div>
      @endforeach  
    </div>
  </div>
</div>
@endsection