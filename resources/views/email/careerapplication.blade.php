<h3>Data Pendaftaran Karir</h3>
<p>Cabang : {{$email->id_perusahaan}}</p>
<p>Nama : {{$email->nama}}</p>
@if($email->nama_panggilan != "")
<p>Nama Panggilan : {{$email->nama_panggilan}}</p>
@endif
@if($email->tempat_lahir != "")
<p>Tempat Lahir : {{$email->tempat_lahir}}</p>
@endif
@if($email->tanggal_lahir != "")
<p>Tanggal Lahir : {{$email->tanggal_lahir}}</p>
@endif
@if($email->about_me !="")
<p>About Me : {{$email->about_me}}</p>
@endif
@if($email->alamat !="")
<p>Alamat : {{$email->alamat}}</p>
@endif
<p>Email : {{$email->email}}</p>
<p>No Telepon : {{$email->no_telepon}}</p>
<p>No KTP : {{$email->no_ktp}}</p>
@if($email->sd !="" || $email->smp != "" || $email->sma != "")
<h4>Pendidikan</h4>
<p>SD : {{$email->sd}}</p>
<p>SMP : {{$email->smp}}</p>
<p>SMA : {{$email->sma}}</p>
@endif
@if($email->uni != "")
<p>Universitas : {{$email->uni}}</p>
@endif

@if($email->level_bahasa_inggris != "")
<p> Level bahasa inggris : {{$email->level_bahasa_inggris}}</p>
@endif
@if($email->kemampuan_bahasa_inggris != "")
<p> Kemampuan berbahasa inggris : {{$email->kemampuan_bahasa_inggris}}</p>
@endif

@if($email->langguage_skills != "")
<h4>Keahlian</h4>
<p>Bahasa :</p>
<ul>
	@php
	foreach($email->langguage_skills as $langguage_skills){
	@endphp
	<li>{{$langguage_skills}}</li>
	@php
}
@endphp
</ul>
@endif

@if($email->keahlian_bahasa != "")
<h4>Keahlian</h4>
<p>Bahasa : {{$email->keahlian_bahasa}}</p>
@endif
@if($email->keahlian_lainnya != "")
<h4>Keahlian Lainnya</h4>
<p>Keahlian : {{$email->keahlian_lainnya}}</p>
@endif

@if($email->other_skills!="")
<p>Keahlian Lainnya :</p>
<ul>

	@foreach($email->other_skills as $other_skills)
	<li>{{$other_skills}}</li>
	@endforeach

</ul>
@endif

@if($email->penghargaan != "")
<h4>Penghargaan</h4>
<p>{{$email->penghargaan}}</p>
@endif

@if($email->pengalaman_sejenis != "")
<h4>Pengalaman Sejenis : </h4>
<p>{{$email->pengalaman_sejenis}}</p>
@endif

@if($email->konferensi_seminar != "")
<h4>Konferensi & Seminar</h4>
<p>{{$email->konferensi_seminar}}</p>
@endif

@if($email->pengalaman_organisasi != "")
<h4>Pengalaman Organisasi</h4>
<p>{{$email->pengalaman_organisasi}}</p>
@endif

@if($email->pelatihan_workshop != "")
<h4>Pelatihan & Workshop</h4>
<p>{{$email->pelatihan_workshop}}</p>
@endif
