@extends('layouts.bp_wo_sidenav')
<style media="screen">
	.news{
		margin-bottom:30px;
	}
	.news-tags::before{
		content:'# ';
	}
	.media-news ol, .media-news ul{
		list-style-position: inside;
	}
	.media-news .img-wrap{
		width: 100%;
		background:white;
		height: 150px;
		margin-bottom: 15px;
		padding: 0;
		overflow: hidden;
		display:flex;
		flex-direction:column;
		justify-content:center;
	}
	.media-news .img-wrap img{
		margin:auto;
	}
	
	/*#fh5co-board .item {
  margin: 10px 10px 20px 10px;
  background: #fff;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  border-radius: 4px;
  overflow: hidden;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  }*/
</style>
@section('title', 'News')
@section('content')

<div class="content-wrapper media-news col-md-12">
	@if (!empty($recent_news) || $recent_news != null)

	<div style="background-image:url('{{Storage::disk('news')->url($recent_news->image)}}');height:480px;width:100%;background-size:cover;background-position:top left;	position:absolute;top:0;left:0;">
	</div>
	<div class="col-md-12 news-media-wrapper">
		<div class="col-md-12 ">
			<div class="col-md-12 news-headline">
				<h5>{{date("l, d F Y",strtotime($recent_news->created_at))}}</h5>
				<h2>{{__(ucwords($recent_news->title))}}</h2>
				<div class="col-md-12" style="padding:0">
					<hr class="news-line">
				</div>
				<p class="news-headline-content" >
					{!!$recent_news->body!!}
				</p>
				<div class="col-md-12">
					<div class="row">


						@foreach ($this_tags as $tag)
						<a href="{{url('media/news/tags/'.$tag)}}" class="news-tags" >{{$tag}}</a>
						@endforeach
					</div>
				</div>
			</div>

			<div class="see-more-news" onclick="see_more_news()">
				<i class="fa fa-plus"></i>
			</div>
		</div>
	</div>
	<div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
		<hr class="news-line" style="width:100%;height:1px;">
	</div>


	<div class="col-md-12">
		<div class="row">

			@foreach($news as $data_news)

<!--
	<div id="fh5co-board" data-columns>

        	<div class="item">
        		<div class="animate-box">
	        		<a href="images/img_1.jpg" class="image-popup fh5co-board-img" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, eos?"><img src="{{ Storage::disk('news')->url($data_news->image) }}" alt="news-img"></a>
        		</div>
        		<div class="fh5co-desc">{{ucwords($data_news->title)}}</div>
        	</div>
        </div>
    -->

    <a class="col-md-4" style="color:black" target="_blank" class="news-link" href="{{url("media/news/".date("Y/m",strtotime($data_news->created_at)).'/'.$data_news->slug)}}">

    	<div class="news">
    		<div class="col-md-12 news-border">
    			<div class="img-wrap">
    				<img src="{{ Storage::disk('news')->url($data_news->image) }}">
    			</div>
    			<div class="col-md-12 news-bottom">
    				<div class="col-md-12 news-info">
    					<ul>
    						<li><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{date("l, d M Y",strtotime($data_news->created_at))}}</li>
    					</ul>
    				</div>
    				<h5 class="col-md-12 news-title"> <div class="row">
    					<span style="line-height:1.7rem;max-height:3.4rem">{{$data_news->title}}</span>
    				</div> </h5>
    				<div class="col-md-12 news-desc">
    					<p>{!! str_limit(strip_tags($data_news->body),252,$end = "...") !!}</p>
    				</div>
    			</div>
    		</div>
    	</div>
    </a>
    @endforeach
</div>
</div>

<div class="col-md-12">
	{{$news->links()}}
</div>
<!--
<a style="color:black" target="_blank" class="news-link" href="https://pontianak.tribunnews.com/2019/05/17/solbridge-international-school-of-business-menjadi-pilihan-tepat-kuliah-ke-korea">

	<div class="col-md-6 news">
		<div class="col-md-12 news-border">
			<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/solbridge-international-school-of-business-korea-saat-malam-hari.jpg')}});">
			</div>
			<div class="col-md-12 news-bottom">
				<div class="col-md-12 news-info">
					<ul>
						<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Agustus 2019</li>
					</ul>
				</div>
				<h4 class="news-title">SolBridge International School of Business Menjadi Pilihan Tepat Kuliah ke Korea


				</h4>
				<p class="col-md-12 news-desc">
					SolBridge International School of Business Korea, mempersiapkan siswa untuk menjadi generasi selanjutnya sebagau pemimpin pemikiran Asia dalam ekonomi Asia yang tumbuh cepat dan semakin berkembang.


				</p>
			</div>
		</div>
	</div>
</a>

<a href="https://pontianak.tribunnews.com/2019/04/03/pelajar-antusias-ingin-melanjutkan-study-ke-korea" target="_blank" style="color:black;">
	<div class="col-md-6 news">
		<div class="col-md-12 news-border">
			<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/han-shen.jpg')}});">
			</div>
			<div class="col-md-12 news-bottom">
				<div class="col-md-12 news-info">
					<ul>
						<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Agustus 2019</li>
					</ul>
				</div>
				<h4 class="news-title">Pelajar Antusias Ingin Melanjutkan Study ke Korea</h4>
				<p class="col-md-12 news-desc">
					Best Partner Education menggelar workshop untuk memberikan informasi kepada pelajar yang ada di Kota Pontianak, Kalbar, agar bisa melanjutkan pendidikan di Korea, tepatnya di Solbridge, Internasional School Of Business
					South Korea, yang di ikuti oleh 100 peserta di Hotel Harris, Rabu (3/4/2019).</p>

			</div>
		</div>
	</div>
</a>
<a href="https://pontianak.tribunnews.com/2019/04/03/pelajar-antusias-ingin-melanjutkan-study-ke-korea" target="_blank" style="color:black;">
	<div class="col-md-6 news">
		<div class="col-md-12 news-border">
			<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/han-shen.jpg')}});">
			</div>
			<div class="col-md-12 news-bottom">
				<div class="col-md-12 news-info">
					<ul>
						<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Agustus 2019</li>
					</ul>
				</div>
				<h4 class="news-title">Pelajar Antusias Ingin Melanjutkan Study ke Korea</h4>
				<p class="col-md-12 news-desc">
					Best Partner Education menggelar workshop untuk memberikan informasi kepada pelajar yang ada di Kota Pontianak, Kalbar, agar bisa melanjutkan pendidikan di Korea, tepatnya di Solbridge, Internasional School Of Business
					South Korea, yang di ikuti oleh 100 peserta di Hotel Harris, Rabu (3/4/2019).</p>

			</div>
		</div>
	</div>
</a>


		<a href="https://pontianak.tribunnews.com/2019/04/03/pelajar-antusias-ingin-melanjutkan-study-ke-korea" target="_blank" style="color:black;">
			<div class="col-md-6 news">
				<div class="col-md-12 news-border">
					<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/han-shen.jpg')}});">
					</div>
					<div class="col-md-12 news-bottom">
						<div class="col-md-12 news-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Agustus 2019</li>
							</ul>
						</div>
						<h4 class="news-title">Pelajar Antusias Ingin Melanjutkan Study ke Korea</h4>
						<p class="col-md-12 news-desc">
							Best Partner Education menggelar workshop untuk memberikan informasi kepada pelajar yang ada di Kota Pontianak, Kalbar, agar bisa melanjutkan pendidikan di Korea, tepatnya di Solbridge, Internasional School Of Business
							South Korea, yang di ikuti oleh 100 peserta di Hotel Harris, Rabu (3/4/2019).</p>

					</div>
				</div>
			</div>
		</a>

	</div>

	<div class="col-md-12" style="margin-bottom:30px;padding:0;">

		<a style="color:black" target="_blank" href="https://pontianak.tribunnews.com/2019/04/03/banyak-jurusan-yang-ditawarkan-solbridge-geraldus-jurusan-yang-banyak-diminati-saat-ini-bisnis">

			<div class="col-md-6 news">
				<div class="col-md-12 news-border">
					<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/seminar-sesion.jpg')}});">
					</div>
					<div class="col-md-12 news-bottom">
						<div class="col-md-12 news-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Agustus 2019</li>
							</ul>
						</div>
						<h4 class="news-title">Banyak Jurusan yang Ditawarkan Solbridge, Geraldus: Jurusan Yang Banyak Diminati Saat Ini Bisnis
						</h4>
						<p class="col-md-12 news-desc">
							Bagi kalian yang tertarik berkuliah ke luar negeri, tapi bingung cari informasi mengenai Universitas dan juga biaya kuliah yang harus kalian siapkan.


						</p>
					</div>
				</div>
			</div>
		</a>

		<a href="https://pontianak.tribunnews.com/2019/04/03/mau-kuliah-ke-solbridge-international-school-of-business-korea-selatan-ini-syaratnya" target="_blank" style="color:black;">
			<div class="col-md-6 news">
				<div class="col-md-12 news-border">
					<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/speaker-dari-solbridge-korea-selatan.jpg')}});">
					</div>
					<div class="col-md-12 news-bottom">
						<div class="col-md-12 news-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Agustus 2019</li>
							</ul>
						</div>
						<h4 class="news-title">Mau Kuliah Ke Solbridge International School of Business Korea Selatan, Ini Syaratnya</h4>
						<p class="col-md-12 news-desc">
							Solbridge International School of Business adalah sekolah bisnis terakreditasi The Association to Advance Collegiate Schools of Business (AACSB) International di Daejeon, Korea Selatan, yang didirikan oleh Woosong
							University.
						</p>
					</div>
				</div>
			</div>
		</a>

	</div>

	<div class="col-md-12" style="padding:0;">

		<a style="color:black" target="_blank" href="https://pontianak.tribunnews.com/2019/03/29/meraih-score-ielts-terbaik-bersama-best-partner-education-pontianak">

			<div class="col-md-6 news">
				<div class="col-md-12 news-border">
					<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/foto-kegiatan-best-partner-education-mengadakan-workshop-dan-sharing-342019.jpg')}});">
					</div>
					<div class="col-md-12 news-bottom">
						<div class="col-md-12 news-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 20 May 2019</li>
							</ul>
						</div>
						<h4 class="news-title">Meraih Score IELTS Terbaik Bersama Best Partner Education Pontianak</h4>
						<p class="col-md-12 news-desc">
							TRIBUNPONTIANAK.CO.ID, PONTIANAK - Best Partner Education adakan Workshop dan sharing untuk memberikan informasi kepada peserta yang ingin berkuliah ke Korea, tepatnya di Solbridge International School Of Business yang di
							ikuti oleh
							100 peserta di Hotel Harris, rabu (3/4/2019).
							<br> <br>
							SolBridge International School of Business adalah sekolah bisnis terakreditasi AACSB swasta di Daejeon, Korea Selatan, didirikan oleh Woosong University.
							Kesempatan bagi para siswa yang ingin melanjutkan study ke luar negeri untuk mendalatkan informaai yang tepat untuk membantu mereka agar tidak kebingungan.
							Seminar ini diikuti oleh siswa SMA yang ingin lanjut ke jenjang kuliah, dan ada juga mahasiswa dari berbagai kampus,serta kegiatan ini terbuka untuk umum.
							<br><br>
							Pembicara yang dihadirkan langsung dari Solbrige International School of business yaitu Rezia Usman, Iskandar Yuldasdev, Ridho Hirzan Saputra yang menjadi pembicara untuk memberikan informasi mengenai kuliah ke Korea,serta
							pengalaman
							selama kuliah Korea.Ada tiga jurusan yang paling unggul di Solbrige of Internarional School of business yang diperkenalkan seperti Bachelor Of Business Administration, MBA , and MS IN Marketing Analytics.

						</p>
					</div>
				</div>
			</div>
		</a>
		<a href="http://pontianak.tribunnews.com/2019/04/03/best-partner-education-berikan-informasi-gratis-tentang-solbridge-international-school-of-bussines" target="_blank" style="color:black">
			<div class="col-md-6 news">
				<div class="col-md-12 news-border">
					<div class="col-md-12 news-bg-img" style="background-image:url({{asset('/img/news/foto-bersama-saat-kegiatan-ielts-test-official-23-maret-2019.jpg')}});">
					</div>
					<div class="col-md-12 news-bottom">
						<div class="col-md-12 news-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 20 May 2019</li>
							</ul>
						</div>
						<h4 class="news-title">Best Partner Education Berikan Informasi Kuliah Ke Soldbrige International School Of Business Korea</h4>
						<p class="col-md-12 news-desc">
							Best Partner Education adakan Workshop dan sharing untuk memberikan informasi kepada peserta yang ingin berkuliah ke Korea, tepatnya di Solbridge International School Of Business yang di ikuti oleh 100 peserta di Hotel
							Harris, rabu
							(3/4/2019).

						</p>
					</div>
				</div>
			</div>
		</a>
	</div>
-->
</div>
<script type="text/javascript">
	var x = 0;

	function see_more_news() {

		$(".news-headline").toggleClass("open");
		if (x == 0) {
			$(".see-more-news").html("<i class='fa fa-minus'></i>");
			x = 1;
		} else if (x == 1) {

			$(".see-more-news").html("<i class='fa fa-plus'></i>");
			x = 0;
		}
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
@else
No News
@endif
</d	iv>
@stop
