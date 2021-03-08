	<div style="width:100%">
		<div style="text-align:center;margin-bottom:15px;">
			<img style="width:90%;" src="https://bestpartnereducation.com/public/img/kop-study-tour.png"></div>
			<div style="margin-bottom:8px;">Saya yang bertanda tangan di bawah ini :</div>
			<div>Nama : {{$data->nama_lengkap}}</div>
			<div>Tanggal Lahir : {{$data->tanggal_lahir.'/'.$data->bulan_lahir.'/'.$data->tahun_lahir}}</div>
			<div>Alamat : {{$data->alamat}}</div>
			<br>
			<div>Menyatakan bahwa saya setuju dengan aturan yang telah berlaku di Best Travel yakni :</div>
			<div>
				<ol>
					<li>Saya menyetujui biaya Study Tour-Kuching yang telah ditetapkan oleh Best Travel.</li>
					<li>Saya menyetujui susunan perjalanan dan prosedur yang telah dibuat oleh pihak Best Travel. </li>
					<li>Saya menyetujui untuk mematuhi syarat dan ketentuan yang berlaku selama perjalanan dan ikut dalam setiap kegiatan yang berlangsung selama Study Tour.</li>
					<li>Apabila terjadi pembatalan sewaktu-waktu dari pihak Best Travel sebelum periode Study Tour, maka saya setuju untuk mendapatkan pengembalian uang secara penuh dengan proses 7 hari kerja dari tanggal pembatalan.</li>
					<li>Apabila terjadi pembatalan sewaktu-waktu dari pihak saya sendiri sebelum periode Study Tour, maka saya setuju untuk mendapatkan pengembalian uang secara penuh dengan proses 7 hari kerja dari tanggal pembatalan.</li>
					<li>Apabila saya tidak memberikan informasi dan tidak mengikuti perjalanan sampai hari H keberangkatan untuk Study Tour, maka saya setuju tidak akan menerima pengembalian uang terkait biaya yang telah saya bayarkan.</li>
					<li>Saya berjanji tidak akan melakukan postingan yang merugikan pihak manapun.</li>
				</ol>
			</div>
			<br>
			<div>
				Saya telah membaca dan dengan sadar menandatangani surat pernyataan ini.
				Demikian pernyataan ini saya buat. <br>
			</div> 
			<div style="width:40%;float:right;margin-top:15px;">
				<div style="text-align:center;">
					<span>Pontianak, @php echo date('d F Y') @endphp</span> <br>
					<img style="height:120px" src="{{$data->signature}}"> <br>
					<span>{{ucwords($data->nama_lengkap)}}</span>

				</div>
			</div>

		</div>

