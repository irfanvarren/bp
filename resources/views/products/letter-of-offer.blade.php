<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align: right;
		}
		.text-left{
			text-align: left;
		}
		.table{
			width: 100%;
			border-collapse: collapse;
		}
		.table tr td{
			padding:5px 10px;
		}
		.table.table-bordered tr td,.table.table-bordered tr th{
			border:1px solid black;	
		}
		ul.dashed {
			list-style-type: none;
		}
		ul.dashed > li{
			text-indent: -5px;
		}
		ul.dashed > li:before {
			content: "-";
			margin-right: 5px;
			text-indent: -5px;
		}
		.mb-3{
			margin-bottom: 15px;
		}
		.mr-3{
			margin-right:15px;
		}
		.mb-0{
			margin-bottom: 0;
		}
		.mt-0{
			margin-top:0;
		}
		.m-0{
			margin:0;
		}
		.form-check-inline{
			display: inline;
		}
		.form-check-label,.form-check-input{
			display: inline
		}
		p{
			text-align: justify;
		}
		input[type="text"]{
			border:5px solid red;
		}
	</style>
</head>
<body>
	<div style="width:100%">
		<div class="text-right" style="position: relative;border-bottom:thick double;margin-bottom:10px;">
			<div style="position: absolute;width: 60px;display: inline-block;height: 100px;top:15px;left:15px;vertical-align: middle;">
				<img src="<?php echo asset('/img/logo_berdayakan.png?v=2'); ?>" style="height: 70px;line-height: 100px;margin-top:15px;">
			</div>
			<div style="padding:10px;padding-left: 30px;">
				<h1 class="m-0"><strong>Yayasan Berdayakan Anak Bangsa</strong></h1>
				<div>Jl. Prof. Dr. Hamka No. 29-30</div>
				<div>Pontianak - Kalimantan Barat 78115, Indonesia</div>
				<div>Telp. (0561) 8172583 | Email: info@bestpartnereducation.com</div>
				<div>Website: www.bestpartnereducation.com</div>
			</div>
		</div>
		<div class="text-center">
			<h3 class="mt-0"><strong>SURAT PENAWARAN DAN PENERIMAAN</strong></h3>
		</div>
		<div class="text-right">
			No. REF <?php echo $cart->invoice_no ?>
		</div>
		
		<div>
			<p class="text-left">Tanggal : <?php echo date('d F Y') ?></p>
			<p><strong>Yth. <?php echo $registration_data ? e($registration_data->NAMA) : ""?></strong></p>
			<p>Selamat! Berdasarkan hasil Placement Test BEPT, Best Partner Education menawarkan surat penerimaan bersyarat ini kepada Anda. 
				Sebelum menandatangani surat penawaran ini, Anda juga disarankan untuk membaca Syarat dan Ketentuan yang berkaitan dengan Biaya Pelatihan Anda, Biaya Pengembalian, Kebijakan Best Partner Education dan materi Pemasaran yang berlaku untuk program studi Anda, informasi pra-pendaftaran dapat ditemukan di situs web milik Best Partner Education: <a href="htps://bestpartnereducation.com">www.bestpartnereducation.com</a>. Penawaran ini akan kedaluwarsa dalam 30 hari setelah penerbitan surat penawaran ini, kecuali dengan kondisi di bawah ini, di mana kasus:
				<ul class="dashed">
					<li>Pembayaran biaya uang muka sudah dilakukan namun biaya uang pelunasan belum diterima penuh oleh pihak Best Partner Education.</li>
				</ul>
			</p>
			<div>
				<strong>Catatan : </strong> Aturan 30 hari berlaku untuk siapa pun yang datang terlebih dahulu dalam keadaan - 30 hari sejak pengiriman Surat Penawaran ini
			</div>
			<table class="table table-bordered">
				<tr>
					<th>Nama Murid</th><td><?php echo $registration_data ? e($registration_data->NAMA) : ""?></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th><td><?php echo $registration_data ? e(date("d/m/Y",strtotime($registration_data->TGL_LAHIR))) : ""?></td>
				</tr>
				<tr>
					<th>Email</th><td><?php echo $registration_data ? e($registration_data->EMAIL) : "" ?></td>
				</tr>
				<tr>
					<th>No. Handphone</th><td><?php echo $registration_data ? e($registration_data->KONTAK) : ""?></td>
				</tr>
				<tr>
					<th>Alamat</th><td><?php echo $registration_data ? e($registration_data->ALAMAT) : ""?></td>
				</tr>
				<tr>
					<th>Batas akhir penawaran</th><td> <?php $tomorrow = new DateTime('tomorrow'); echo $tomorrow->format('d/m/Y'); ?></td>
				</tr>
				<tr>
					<th>Lokasi Pelatihan</th>
					<th colspan="3" class="text-left">
						<?php
						if(count($companies)){
							foreach($companies as $company): 
								?>
								<div class="form-check-inline mr-3">
									<input type="checkbox" <?php echo $company->KD == $registration_data->REF_PERUSAHAAN ? 'checked' : '' ?> class="form-check-input" name="">
									<label class="form-check-label"><?php echo ucwords(strtolower($company->NAMA))?></label>
								</div>
								<?php 
							endforeach; 
						}
						?>
					</th>
				</tr>
			</table>
			<h5><strong>INFORMASI PEMBAYARAN</strong></h5>
			<table class="table table-bordered">
				<tr>
					<th>Program Kursus</th><th>Tanggal Mulai</th><th>Tanggal Selesai</th><th>Durasi</th><th>Biaya</th>

				<!-- tanggal mulai : tanggal daftar + 7 -->
				<!-- tanggal selesai : tanggal_daftar + 27 kalau jumlah jam 30  -->
				<!-- tanggal selesai : tanngal_daftar + 47 kalau jumlah jam 60  -->



				<!--  
				<= 1.000.000
				INSTALLMENT : 1 kali

				<= 4.000.000
				INSTALLMENT : 2 kali
				jang

				<= 8.000.000
				INSTALLMENT : 3 kali

				<= 12.000.000
				INSTALLMENT : 4 kali

				<= 16.000.000
				INSTALLMENT : 5 kali
				
				--------------- Biaya Pendaftaran (STEP 1) -----------
				DP : 500.000 
				application fee: 25.000
				-----------
				pembayaran ke 2 dst: (biaya - DP) / (jlh_installment)
				
				deadline / jatuh tempo : ????????
				-->
				</tr>
				<?php
				if(count($cart_items)){
					foreach ($cart_items as $item) {
						?>
						<tr>
							<td><?php echo $item->NAMA_PAKET;?> - <?php echo $item->NAMA_LEVEL ?></td><th><?php echo count($item->intakes) ? $item->intakes : "-" ?></th><th><?php echo count($item->intakes) ? $item->intakes : "-"?></th><th><?php echo e(number_format($item->JUMLAH_JAM),2,',','.') ?> Jam</th><th>Rp.<?php echo number_format($item->HARGA_PAKET,2,',','.');?></th>
						</tr>
						<?php
					}
				}
				?>
			</table>
			<p>
				<strong>Semua biaya dinyatakan dalam mata uang rupiah, biaya yang disebutkan mungkin dapat berubah sewaktu-waktu tanpa pemberitahuan (hal ini tercantum dalam aturan pembiayaan)</strong>
			</p>
			<div>
				<strong>Kelas dan jadwal pelatihan : </strong> harap untuk menyesuaikan dengan jadwal pelatihan yang tercantum dibawah ini 
			</div>
			<?php foreach($cart_items as $item) : ?>
				<?php foreach($item->schedules as $schedule) : ?>
					<table class="table table-bordered">
						<tr>
							<th colspan="2"><?php echo $item->NAMA_PAKET ?></th>
						</tr>
						<tr>
							<th>Hari Pelatihan</th><th>Jam Pelatihan</th>
						</tr>

						<tr>
							<td>Senin, Selasa, Rabu, Kamis & Jumat</td> <td>18:00 – 19:30</td>
						</tr>

					</table>
				<?php endforeach;?>
			<?php endforeach; ?>
			<!-- mode pembelajaran online/offline sesuai pendaftaran, lokasi sesui cabang yang dipilih -->
			<div class="mb-3">
				<strong>Kondisi Khusus:</strong>
				<div>
					Penawaran ini tergantung pada Placement Test murid yang dilakukan sebelum surat ini diterbitkan sebagai salah satu persyaratan pendaftaran dan pemilihan program pelatihan
				</div>
			</div>
			<!-- <div>
				<strong>Pembayaran biaya pelatihan: </strong> Harap mencantumkan nomor referensi/ nama course sebagai nomor referensi pembayaran.
				<table class="table table-bordered">
					<tr>
						<th colspan="2">Transfer Bank/ Internet transfer </th>
					</tr>
					<tr>
						<th> Nama Bank </th> <td> Bank Central Asia (BCA)</td>
					</tr>
					<tr>
						<th> Nama Rekening </th> <td>BEST PARTNER CV</td>	
					</tr>
					<tr>
						<th> Nomor Rekening </th> <td>029 900 8144</td>
					</tr><tr>
						<th> Swift Code </th> <td>CENAIDJA</td>	
					</tr>
					<tr>
						<th> Alamat Bank </th> <td>Jl. Jenderal Ahmad Yani , Benua Melayu Darat, Pontianak Selatan, Kota Pontianak</td>
					</tr>
					<tr>
						<th> Referensi Pembayaran</th> <td>Nomor referensi surat penawaran/ Nama course</td>
					</tr>
				</table>
			</div> -->
			<div>
				<h5><strong>PEMBIAYAAN BIAYA PELATIHAN </strong></h5>
				<div class="mb-3">Berikut adalah pernyataan yang berlaku untuk semua pembiayaan yang tidak dapat dikembalikan yang terdaftar dan tercantum dibawah ini dengan kondisi dan keadaan apapun, item yang tercantum di bawah adalah Biaya Pendaftaran dan Biaya Uang Muka, yang dalam alasan ini tidak termasuk ke dalam Surat Konfirmasi Pendaftaran.
					Biaya Pendaftaran (Tidak dapat dikembalikan)
				Biaya ini mungkin dibayarkan secara Tunai, menggunakan uang elekronik, Transfer antar Bank atau melalui Kartu Kredit. Pembayaran ini adalah sebesar 10% dari jumlah biaya pelatihan keseluruhan. (Jika berlaku)</div>

				<strong>Biaya Uang Muka (Tidak dapat dikembalikan) </strong>
				<div class="mb-3">Biaya ini mungkin dibayarkan secara Tunai, menggunakan uang elekronik, Transfer antar Bank atau melalui Kartu Kredit. Pembayaran ini adalah sebesar 50% dari jumlah biaya keseluruhan yang ditagihkan atau dengan jumlah lainnya yang telah disepakati dengan pihak penyedia pelatihan. (Jika berlaku)</div>

				<strong>Biaya Uang Pelunasan </strong>
				<div class="mb-3">Biaya ini mungkin dibayarkan secara Tunai, menggunakan uang elekronik, Transfer antar Bank atau melalui Kartu Kredit. Pembayaran ini adalah sebesar 50% dari jumlah kekurangan dari biaya uang muka yang sudah dibayarkan atau jumlah lainnya sesuai dengan kekurangan dari biaya yang sudah dibayarkan. Pembayaran ini harus dibayarkan dalam 2 (dua) minggu setelah pelatihan dimulai. Pembayaran ini bersifat mengikat dengan ketentuan sebagai berikut:</div>
				<ol>
					<li>Murid dibebankan penuh untuk biaya uang pelunasan dan kewajiban untuk menyelesaikan biaya terhutang sesuai dengan ketentuan yang ditetapkan Best Partner Education.</li>
					<li>Pihak penyedia layanan Pelatihan berhak untuk menagih Biaya Uang Pelunasan kepada wali atau orang tua murid, jika murid yang bersangkutan melakukan pengabaian pada tagihan yang dikirimkan oleh pihak Best Partner Education. </li>
					<li>Beban biaya uang pelunasan ini akan menyesuaikan dengan tenggang waktu yang diberikan oleh pihak penyedia pelatihan dengan konsekuensi tertentu jika terjadi pelanggaran baik yang terkait dengan tenggang waktu maupun jumlah biaya tanggungan.</li>
				</ol>
				<strong>Biaya Pelatihan</strong>
				<div class="mb-3">Biaya Pelatihan, adalah biaya yang harus dibayarkan untuk program pelatihan anda. Best Partner Education hanya akan menerbitkan dan menagih biaya yang berkaitan dengan pelatihan dan tidak memungut biaya lainnya, terkecuali murid mengajukan perpanjangan waktu pelatihan atau mengajukan permintaan lainnya yang berkaitan dengan program pelatihan dan durasi pelatihan.</div>


				<div>Biaya pelatihan murid dapat meliputi:</div>
				<ol>
					<li>Biaya pelatihan penuh,</li>
					<li>Biaya modul atau buku panduan pelatihan, </li>
					<li>Biaya khursus tambahan dengan permintaan atau persetujuan dari peserta pelatihan, </li>
					<li>Biaya lainnya uang berkaitan dengan pelatihan.</li>
				</ol>

				<div>Syarat dan ketentuan pembayaran biaya pelatihan meliputi:</div>
				<ol>
					<li>Biaya pelatihan, surat penawaran yang sudah di tanda tangan dan bukti pembayaran harus dikonfirmasi sebelum pelatihan dimulai.</li>
					<li>Best Partner Education berhak menerima semua pembayaran biaya pelatihan. </li>
					<li>Peserta pelatihan baru harus membayar jumlah penuh dari semua biaya pelatihan yang ditagihkan dalam faktur tagihan yang dikirimkan bersama surat penawaran ini.</li>
					<li>Biaya pelunasan atau uang pelunasan dibayarkan 2 (dua) minggu setelah kelas berjalan.</li>
					<li>Jika peserta pelatihan gagal melakukan pelunasan stelah periode waktu yang ditentukan maka penyedia pelatihan berhak membatasi atau menghentikan proses pelatihan. </li>
					<li>Peserta pelatihan yang mendaftar kembali / memperpanjang durasi pelatihan harus membayar jumlah penuh dari biaya pelatihan tambahan yang ditagihkan dalam faktur tagihan baru.</li>
					<li>Best Partner Education berhak untuk meninjau biaya setiap saat.</li>
					<li>Biaya pelatihan yang tertulis di surat penawaran ini bisa berubah dengan kondisi; kadaluarsanya surat penawaran, sehingga surat penawaran terbaru mengikuti biaya pelatihan baru yang ditetapkan oleh Best Partner Education. </li>
					<li>Perubahan biaya pelatihan dan harga baru sewaktu-waktu akan tercantum pada halaman website resmi Best Partner Education. </li>
					<li>Biaya baru akan berlaku untuk semua pembayaran pendaftaran baru / pendaftaran ulang yang jatuh tempo sejak diterbitkan tanggal berlaku daftar harga.</li>
				</ol>

				<h5><strong>KEWAJIBAN PENYEDIA PELATIHAN </strong></h5>

				<div>Penyedia pelatihan berkewajiban untuk </div>
				<ol>
					<li>Memberikan materi pelatihan yang sesuai selama program pelatihan berlangsung. </li>
					<li>Menyediakan akses untuk belajar dan penilaian hingga berakhirnya pelatihan.</li>
					<li>Memberikan umpan balik dan nilai untuk tugas dan kegiatan penilaian yang lainnya selama pelatihan berlangsung. </li>
					<li>Memberikan bukti pelatihan jika peserta pelatihan dengan sukses menyelesaikan pelatihan, pembayaran dan penilaian.</li>
					<li>Menyediakan pelatih yang kompeten dan bersertifikasi untuk peserta pelatihan. </li>
				</ol>


				<h5><strong>KELALAIAN PENYEDIA PELATIHAN  </strong></h5>
				<div>
					Jika jadwal pelatihan yang sudah disepakati terhambat karena pihak penyedia pelatihan, maka pihak penyedia pelatihan akan memberikan pernyataan lengkap kepada murid yang menjelaskan opsi yang dapat diambil. Pilihan tersebut antara lain adalah
				</div>
				<ol class="mb-0">
					<li>Murid setuju untuk menunggu hingga kuota murid dengan jumlah kelompok pelatihan yang sudah dipilih tercukupi</li>
					<li>Memilih untuk memulai pelatihan dengan jumlah kelompok peserta yang ada dan dengan penambahan biaya yang disepakati bersama.</li>
					<li>Memilih untuk pindah ke pelatihan alternatif. Jika siswa memilih opsi ini, maka tidak akan ada pengembalian uang untuk sebelumnya mendaftar pelatihan. Penyesuaian biaya pelatihan alternatif dengan kemungkinan pengurangan atau penambahan biaya akan diberlakukan jika memilik opsi ini. </li>
				</ol>
				<div class="mb-3">
					Kemungkinan opsi lainnya yang akan muncul dan menyesuaikan dengan kondisi kasus yang ada saat itu dengan menggunakan kebijakan dari pihak penyedia pelatihan dengan keputusan Murid.
				</div>

				<h5><strong>KEWAJIBAN PESERTA PELATIHAN</strong></h5>
				<div>Peserta pelatihan diwajibkan untuk memenuhi kualifikasi kehadiran yang tercatat</div>
				<ol>
					<li>Peserta pelatihan diharapkan untuk memenuhi 100% dari seluruh jumlah kehadiran atau paling sedikit 80% dari seluruh jumlah kehadiran.</li>
					<li>Peserta pelatihan diwajibkan untuk mengerjakan dan mengumpulkan tugas, kegiatan penilaian, atau diskusi kepada pelatih selama durasi pelatihan berlangsung. </li>
					<li>Peserta diharapkan untuk dapat disiplin terhadap waktu dan tidak terlambat hadir di kelas selama kegiatan pelatihan berlangsung.</li>
				</ol>

				<h5><strong>KELALAIAN PESERTA PELATIHAN</strong></h5>
				<div>
				Dalam hal kelalaian peserta pelatihan dimana peserta pelatihan mengambil keputusan secara sepihak tanpa berdiskusi terlebih dahulu dengan pihak penyedia pelatihan atau dalam kaitannya dengan program pelatihan jika:</div>
				<ol>
					<li>Pelatihan dimulai di lokasi pada hari mulai yang disepakati, tetapi peserta tidak memulai pelatihan pada saat itu.</li>
					<li>Peserta menarik diri atau berhenti dari pelatihan di lokasi (baik sebelum atau setelah dimulainya waktu pelatihan yang disepakati) dalam hal ini maka tidak akan ada pengembalian biaya yang sudah dibayarkan.</li>
					<li>Penyedia pelatihan menolak untuk memberikan, atau terus memberikan, pelatihan kepada siswa karena satu atau lebih dari peristiwa berikut:
						<ol>
							<li>Murid tidak membayar jumlah yang harus dibayarkannya kepada penyedia, dalam hal ini biaya uang pelunasan, maka penyedia pelatihan tidak dapat melanjutkan pemberian pelatihan atau pelatihan dan dapat secara sepihak untuk memberhentikan proses pelatihan.</li>
							<li>Kelakuan buruk oleh siswa (termasuk kekerasan, perilaku tidak menyenangkan dan pencemaran nama baik terhadap pihak penyedia pelatihan maupun tenaga pengajar/ pelatih)</li>
							<li>Murid tidak mematuhi syarat dan ketentuan pendaftaran dan pendaftarannya dibatalkan oleh Best Partner Education sebagai penyedia pelatihan.</li>
						</ol>
					</li>
				</ol>

				<h5><strong>PENUNDAAN TANGGAL MULAI PELATIHAN</strong></h5>
				<div>
				Menunda dimulainya pelatihan di mana pemohon memilih untuk menunda dimulainya program pelatihan di Best Partner Education yang memiliki surat penawaran yang telah diterima atau ditanda tangani (dan sudah membayar biaya pelatihan), atau setoran apa pun yang dibayarkan akan ditahan hingga jangka waktu 12 bulan dari tanggal dimulainya yang asli, untuk diterapkan pada tanggal dimulainya yang baru, dengan ketentuan bahwa:</div>
				<ol>
					<li>Aplikasi tertulis untuk menunda dimulainya pelatihan atau pemberitahuan yang diterima oleh Best Partner Education dalam waktu 21 hari sebelum tanggal dimulainya pelatihan.</li>
					<li>Aplikasi penundaan tanggal pelatihan harus disertai dengan tanggal mulai pelatihan yang baru. Pihak penyedia pelatihan tidak akan memproses aplikasi penundaan tanggal mulai pelatihan jika tidak menyertakan tanggal pelatihan yang ditangguhkan.</li>
					<li>Setelah periode 12 bulan setelah penangguhan penundaan, pemohon akan terhitung menjadi pendaftar baru dan harus mendaftar ulang dengan biaya yang menyesuaikan dengan harga baru yang berlaku. Biaya uang muka maupun biaya uang pelunasan yang dibayarkan sebelumnya dianggap hangus atau tidak dapat dikembalikan kepada murid.</li>
					<li>Untuk penundaan tanggal mulai pelatihan ini akan dikenakan biaya pemrosesan sebesar IDR. 50.000,-</li>
					<li>Untuk murid yang memilih berhenti dari pelatihan dan kemudian menarik diri diantara tanggal mulai pelatihan yang asli dan sebelum tanggal mulai pelatihan yang ditangguhkan maka pengembalian biaya akan menyesuaikan dengan kebijakan pengembalian biaya Best Partner Education.</li>
					<li>Ketidakhadiran pada saat kelas pelatihan dimulai hanya akan diberikan dalam waktu 2 kali, dengan penggantian pertemuan pelatihan. Untuk ketidakhadiran selanjutnya, murid tidak diberikan penggantian pertemuan.</li>
				</ol>

				<h5><strong>PENGURANGAN BIAYA</strong></h5>
				<div>Pengurangan biaya hanya terjadi dengan kondisi adanya promo potongan harga dengan ketentuan:</div>
				<ol>
					<li>Nominal potongan harga atau biaya pelatihan disesuaikan dengan penawaran yang diberikan oleh counsellor atau marketing yang bertugas.</li>
					<li>Ketentuan potongan harga atau biaya pelatihan disesuaikan dengan waktu berlakunya, pendaftaran yang dilakukan harus dalam rentang waktu masa promosi potongan harga yang ada. Serta pendaftaran harus memenuhi kriteria syarat dan ketentuan yang berlaku pada promosi tersebut.</li>
					<li>Kebijakan pengurangan biaya pelatihan ditentukan oleh pihak penyelenggara pelatihan dan berlaku setelah mendapat persetujuan atau konfirmasi.</li>
				</ol>

				<h5><strong>PENGEMBALIAN BIAYA</strong></h5>	
				<ol type="A">
					<li>
						<strong>Kebijakan Pengembalian Biaya</strong>
						<ol type="1">
							<li>Hak atas pengembalian uang menyesuaikan dengan kebijakan dari Best Partner Education.</li>
							<li>Peserta mengerti dan memahami bahwa tidak ada pengembalian uang jika peserta membatalkan pendaftaran tes. Peserta akan kehilangan hak nya untuk pengembalian dana dalam kasus ini.</li>
							<li>Keluhan terkait pembayaran dan pengembalian uang paling lambat 3 hari setelah pembayaran dilakukan. Jika keluhan dilakukan lebih dari 3 hari terhitung setelah tanggal pembayaran maka keluhan tidak akan kami tindak lanjuti.</li>
						</ol>
					</li>
					<li>
						<strong>Penghitungan Pengembalian Biaya </strong>
						<ol type="1">
							<li>
								Pengembalian biaya dengan kondisi pembatalan sebelum kelas dimulai, diatur dengan kebijakan sebagai berikut
								<ol type="a">
									<li>Pengembalian biaya sebesar 50% jika aplikasi pengembalian biaya diterima dan disetujui oleh pihak penyedia pelatihan 28 hari sebelum kelas pelatihan dimulai. </li>
									<li>Pengembalian biaya sebesar 40% jika aplikasi pengembalian biaya diterima dan disetujui oleh pihak penyedia pelatihan 21 hari sebelum kelas pelatihan dimulai.</li>
									<li>Pengembalian biaya sebesar 30% jika aplikasi pengembalian biaya diterima dan disetujui oleh pihak penyedia pelatihan 14 hari sebelum kelas pelatihan dimulai.</li>
									<li>Pengembalian biaya sebesar 20% jika aplikasi pengembalian biaya diterima dan disetujui oleh pihak penyedia pelatihan 7 hari sebelum kelas pelatihan dimulai.</li>
								</ol>
							</li>
							<li>
								Kondisi tersebut diatas berlaku jika peserta pelatihan membayarkan biaya pelatihan secara penuh atau pembayaran program pelatihan dalam satu kali pembayaran.
							</li>
							<li>Tidak akan ada pengembalian biaya jika pembatalan pelatihan saat pelatihan sudah dimulai atau sedang berlangsung.</li>
						</ol>
					</li>
				</ol>

				<h5><strong>PERNYATAAN PESERTA PELATIHAN</strong></h5>
				<ol>
					<li>Saya dengan ini menerima tawaran yang disebutkan di atas yang ditawarkan oleh Best Partner Education.</li>
					<li>Saya telah membaca, mengerti dan setuju untuk mematuhi syarat dan ketentuan perjanjian ini. Saya sudah membaca dan mengerti seluruh tanggung jawab saya sebagai pendaftar dan murid.</li>
					<li>Saya telah membaca dan memahami seluruh Kebijakan dan Prosedur Pengembalian Biaya Best Partner Education. Baik yang tercantum di situs web Best Partner Education atau yang dilampirkan dalam surat penawaran ini di bagian Pengembalian Biaya.</li>
					<li>Saya mengerti biaya pelatihan dapat berubah suatu waktu dan Best Partner Education berhak untuk meningkatkan biayanya sesuai dengan kebijakan Best Partner Education.</li>
					<li>Saya mengerti bahwa pelatihan harus mengikuti jadwal yang telah ditentukan dan disepakati bersama sebelumnya. </li>
					<li>Saya memahami bahwa saya harus melakukan pelunasan pembayaran dengan ketentuan yang sudah ditetapkan oleh pihak Best Partner Education.</li>
					<li>Saya menyetujui pengumpulan, penggunaan, dan pengungkapan informasi pribadi saya. </li>
					<li>Saya mengerti bahwa jika saya memberikan informasi yang salah atau tidak lengkap, ini dapat mengakibatkan pembatalan pendaftaran saya dan akan mengakui bahwa hal ini adalah tanggung jawab saya.</li>
					<li>Saya dengan ini menyatakan bahwa informasi yang saya berikan adalah benar </li>
				</ol>
				<div>
					<div style="width: 100%;white-space: nowrap;margin-top:15px;">
						<div style="width: 70%;display: inline-block;">
							<div style="width: 250px;display: block;">
								<?php echo e($registration_data->NAMA); ?>
							</div>
						</div>
						<div style="width:30%;display: inline-block;text-align: right">
							Tanggal : <?php echo e(date("d/m/Y"))?>
						</div>
					</div>
					<div style="width: 100%;margin-bottom: 15px;">
						<div style="width: 250px;display: block;">
							<?php 
							if(isset($signature)){
								?>
								<div>
									<img src="<?php echo asset($signature)?>" style="max-width:250px;height:100px;border:1px solid #dedede;"> 
								</div>
								<?php
							}else{
								?>
								<div style="width:250px;height: 100px"></div><br>
								<?php
							}
							?>
							<div>Tanda Tangan Murid</div>
							
						</div>
					</div>
					<div style="width: 100%;margin:15px 0;"><strong>Diterima Oleh Best Partner Education </strong></div>
					<div style="width: 100%; white-space: nowrap;">

						<div style="width: 70%;display: inline-block;">
							www.bestpartnereducation.com
						</div>
						<div style="width:30%;display: inline-block;text-align: right">
							Tanggal : <?php echo e(date("d/m/Y"))?>
						</div>
					</div>
					<div style="width: 100%;">
						<div style="width: 70%;display: inline-block;">
							<?php 
							if(isset($signature)){
								?>
								<div>
									<img src="<?php echo asset('/img/logo lama.png')?>" style="height:70px;"> 
								</div>
								<?php
							}else{
								?>
								<div style="width:250px;height: 100px"></div><br>
								<?php
							}
							?>
							<div>Tanda Tangan Staff</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</body>
</html>