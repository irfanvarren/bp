
			<div class="container-fluid" style="margin-top: 30px" >
	<div class="container">
  <div class="row" >
    @foreach ($buku as $buku)
    <div class="col-md-3" style="padding-top: 30px">
    	<div class="thumbnail" style="background-color:#f3f0ef;padding-top: 10px">
      <img src="{{$buku->link_gambar}} "
            style="height: 300px">
          	<div class="caption">
            <h4 style="font-size: 15px;text-align: center;max-height: 40px;overflow: hidden;height: 40px">{{$buku->judul}}</h4>
      <a href="{{$buku->link_download}}" class="btn btn-primary" style="font-size: 12px;margin-left: 5px">Download</a>
      <a href="/detail/{{$buku->id}}/" class="btn btn-default">Deskripsi buku</a>
      		</div>   
      </div>
    </div>
    @endforeach
</div>
</div>
</div>