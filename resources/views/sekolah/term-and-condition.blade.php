@extends('layouts.bp_wo_sidenav')
<style type="text/css">
	  ol,
  ul {
    list-style-position: outside;
    padding: 0 18px;
  }

  ol li,
  ul li {
    padding-bottom: 7px;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
	<div class="col-md-12">
		<div class="row justify-content-center">
			<div class="col-md-12">

				<div class="card-header" style="background:none;border:none;">

					<div class="" style="padding:0 0 15px 0;">

						<h2 style="text-align:center;color:#368ca8">Syarat dan Ketentuan Informasi Program Informasi Sekolah</h2>
					</div>
				</div>
				<div class="card">
					<div class="card-body" style="padding:30px 15px;">
						<div class="col-md-9 tab-content" id="myContent">
							<h5><strong>Registrasi & Perizinan</strong></h5>
							<ol>
								<li>Klien harus melakukan registrasi dengan menyetujui syarat dan ketentuan yang berlaku untuk mendapatkan akses data sebagai pengguna, 
								</li><li>Untuk dapat menjadi pengguna aplikasi, klien harus menjadi murid resmi dari agent Best Partner dengan memegang visa atau CoE/dokumen sekolah dibawah nama agent. 
								</li><li>Registrasi program akan membutuhkan verifikasi dari email klien yang akan digunakan untuk membuka program hingga masa yang diperlukan.
								</li><li>Hak klien untuk mengakses data sesuai dengan keputusan yang akan diberikan oleh agent.
								</li><li>Klien tidak memiliki hak untuk memberikan data akun program kepada pihak manapun.
								</li><li>Program ini tidak boleh disalahgunakan untuk merusak data, menipu ataupun merugikan dan menimbulkan ketidaknyamanan pada pihak lain.
								</li><li>Klien bertanggung jawab penuh atas akun program miliknya dan dapat dimintai pertanggungjawaban jika sewaktu-waktu terjadi kerugian yang disebabkan oleh akunnya, meskipun akun tersebut disalahgunakan oleh pihak lain.
								</li><li>Agent dapat melakukan verifikasi atas keabsahan data sewaktu-waktu apabila diperlukan.</li>
							</ol>

							<h5><strong>Hak-Hak pengguna </strong></h5>
							



							<ol>
								<li>Akses data tersebut berisi informasi mengenai detail sekolah, informasi umum klien dan data yang digunakan selama menjadi klien dibawah agent Best Partner.
								</li><li>Klien wajib memastikan segala informasi pribadi yang terdapat dalam program tersebut akurat dan benar.
								</li><li>Klien dapat mengubah data yang terdapat dalam program berupa informasi pribadi bila tidak sesuai.
								</li><li>Klien wajib memanfaatkan program tersebut untuk kelancaran terkait dengan kebutuhan klien.</li>
							</ol>

							<h5><strong>Penonaktifan Akun</strong></h5>

							<ol>
								<li>Agent memiliki hak untuk menutup akses apabila terdapat kejadian-kejadian berikut dikemudian hari:
									<ol  type="a">
										<li>	terdapat kendala penggunaan
										</li><li>	hal yang berkaitan dengan masalah internal
										</li><li>	klien tidak lagi menjadi tanggungan agent
										</li><li>	klien diputuskan untuk tidak menerima akses. 
										</li><li>	Jika diketahui terdapat pihak ketiga yang melakukan akses
										</li>
									</ol>
								</li>
								<li>Pemutusan akses tidak akan diinfokan kepada klien.</li>
							</ol>

							<h5><strong>Biaya Layanan</strong></h5>
							<div>
								<p>Akses program tidak dikenakan biaya namun klien wajib bertanggung jawab terhadap data yang terdapat di dalam program.
								</p>
							</div>
							<h5><strong>Hubungi Kami</strong></h5>
							<div>
								<p>							Bila dalam masa pemakaian terdapat kendala atau memasukkan saran, silahkan kunjungi <a href="{{url('enquiry')}}">{{url('enquiry')}}</a> atau email ke info@bestpartnereducation.com untuk berinteraksi dengan pihak agent.</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection