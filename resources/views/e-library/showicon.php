@foreach($buku as $buku)
<div>
	
	{{$buku->judul}}
</div>
<div>
	@if($buku->cek_video == 1)
	video
	@endif
	@if($buku->audio == 1)
	<img src="icon/audio.png">
	@endif
	@if($buku->e-book == 1)
	<img src="icon/video.png">
	@endif
	
</div>
@endforach