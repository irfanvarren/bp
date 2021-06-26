@extends('layouts.email.default')
@section('content')
<p>Silahkan klik link dibawah ini untuk memulai tes {{$test_name}} Online :</p>
<p><a href="{{url('student/'.str_slug($test_name,'-').'-simulation-link/').'/'.$token}}">{{url('student/'.str_slug($test_name,'-').'-simulation-link/').'/'.$token}}</a></p>
<ol style="margin:0">
	<li>Link dapat diakses kapanpun</li>
	<li>Siapkan handsfree anda sebelum test dimulai</li>
	<li>Pastikan koneksi internet anda stabil, apabila terdapat kesalahan pada portal pengerjaan, tekan f5 terlebih dahulu dan tunggu. Apabila masih ada kendala, anda dapat menghubungi kami di 081352033606. Harap diperhatikan bahwa kami akan merespon cepat di jam kerja (08.00 WIB - 17.00 WIB)</li>
	<li>Persiapkan alat tulis jika dibutuhkan</li>
	<li>Pastikan anda memiliki waktu yang telah ditentukan dalam 1 kali duduk (2 jam 15 menit). </li>
</ol>
<p>Untuk point nomor 3 harap diperhatikan , jika koneksi internet tidak stabil maka akan berdampak ke soal listening (termasuk tidak terputarnya audio). 
Kami tidak bisa memberikan solusi lain jika koneksi internet para peserta tidak memadai.</p>
@endsection