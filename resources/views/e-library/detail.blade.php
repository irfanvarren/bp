@extends('e-library.layouts.app')

@section('content')
<div class="detail-fullscreen">
<div class="container" style="background-color: white" >
	<div class="row my-3">
	 	<div class="col-md-4">
	 		<div class="thumbnail">
        <img src="{{$buku->link_gambar}}" alt=""  >
        
			</div>
		</div>
		<div class="col-md-8" style="padding-top: 15px">
		<table id="deskripsi">
		  <tr>
		    <td>Judul</td>
		    <td>{{$buku->judul}}</td>
		  </tr>
		  <tr>
		    <td>Penerbit</td>
		    <td>{{$buku->penerbit}}</td>
		  </tr>
		  <tr>
		    <td>Penulis</td>
		    <td>{{$buku->penulis}}</td>
		  </tr>
		  <tr>
		    <td>Tahun terbit</td>
		    <td>{{$buku->tahun_terbit}}</td>
		  </tr>
		  <tr>
		    <td>Bahasa</td>
		    <td>{{$buku->bahasa}}</td>
		  </tr>
		  <tr>
		    <td>ISBN</td>
		    <td>{{$buku->ISBN}}</td>
		  </tr>
		  <tr>
		    <td>ISSN</td>
		    <td>{{$buku->ISSN}}</td>
		  </tr>
		  <tr>
		    <td>format</td>
		    <td>{{$buku->format}}</td>
		  </tr>
		</table>
		<table id="deskripsi">
		<tr>
			<td style="text-align: center">Book Description</td>
		</tr>
		<tr>
			<td height="100">{{$buku->deskripsi}}</td>		
		</tr>
		</table>

			<div class="text-center mt-3">
				<a href="{{$buku->link_download}}" class="btn btn-primary">E-Book</a>
        <a href="{{$buku->link_audiovideo}}" class="btn btn-primary">Audio & Video</a>
			</div>
		</div>
	 </div>
</div>
<!------------------------------------Transisi Gambar---------------------------------------------------->	

  <div class="container" style="padding-bottom: 2px;padding-top: 2px;padding-left: 45px;border-bottom: 5px solid ;background-color: white">

	<h2>
		<a href="">Rekomendasi Kami</a>

	</h2>
	</div>


<div class="container-fluid">
<!--Carousel Wrapper-->
<div id="carousel-example-generic" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="container" style="background-color: white;padding:15px;">
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
  <?php

$buku = App\Models\Library\Buku::where('kategori_buku','IELTS')->offset(0)->limit(6)->get(); ?>


    <div class="item active">
    @foreach($buku as $buku)
        <div class="col-md-2 ">
        <div class="card mb-1 ">
          <a href="{{$buku->id}}">
          <img class="card-img-top"
            src="{{$buku->link_gambar}}"
            style="height: 225px" 
            alt="Card image cap">
            </a>
          <div class="card-body">
            <h4 class="card-title" style="font-size: 12px; max-height: 40px;overflow: hidden;height: 40px;text-align: center">{{$buku->judul}}</h4>
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
			<a href="{{$buku->link_download}}" class="btn btn-primary d-flex align-items-center justify-content-center" style="font-size: 12px">Download</a>
          </div>
        </div>
    </div>
@endforeach
      
    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="item">
  <?php

  $buku = App\Models\Library\Buku::where('kategori_buku','Kamus')->offset(0)->limit(6)->get(); ?>


    @foreach($buku as $buku)
        <div class="col-md-2 ">
        <div class="card mb-1 ">
          <a href="{{$buku->id}}">
          <img class="card-img-top"
            src="{{$buku->link_gambar}}"
            style="height: 225px" 
            alt="Card image cap">
            </a>
          <div class="card-body">
            <h4 class="card-title" style="font-size: 12px; max-height: 40px;overflow: hidden;height: 40px;text-align: center">{{$buku->judul}}</h4>
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
      <a href="{{$buku->link_download}}" class="btn btn-primary d-flex align-items-center justify-content-center" style="font-size: 12px">Download</a>
          </div>
        </div>
    </div>
@endforeach
</div>

    <!--/.Second slide-->

    <!--Third slide-->



    <!--masukin Slide baru disini(copy paste diatas)--->


    </div>

    <!--/.Third slide-->

  </div>
 <!-- Controls -->

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color: #000000"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color: #666666"></span>
    <span class="sr-only">Next</span>
  </a>


  <!--/.Slides-->

 
</div>

<!--/.Carousel Wrapper-->
</div>

<!-------------------------------------------------------------------------------------------------------->
</div>
</div>
@endsection