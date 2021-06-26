<head>
  <style media="screen">
  .wrapper{
        margin:100px auto;
        width:500px;

          display:block;
  }
  table{
    border-collapse: collapse;
    width:100%;

  }
  table tr, table td, table th{
    padding:8px;
    text-align:left;
    border:1px solid black
  }
    </style>
</head>
<h2>Data Pendaftaran Les Bahasa Inggris</h2>
@php
$nama = '';
if($email->nama_depan!=''){
$nama .= $email->nama_depan;
}

if($email->nama_belakang!=''){
$nama .= ' '.$email->nama_belakang;
}
@endphp
<div class="wrapper">


<table>
  <tr>
    <th colspan="2">Informasi Pribadi</th>
  </tr>
  <tr>
    <td>Cabang :</td><td> {{$email->cabang}}</td>
  </tr>
  <tr>
    <td>Nama :</td> <td>{{$nama}}</td>
  </tr>
  <tr>
    <td>Tempat Kelahiran :</td> <td> {{$email->tempat_lahir}}</td>
  </tr>
  <tr>
  <td> Tanggal Lahir :</td>   <td>{{date("d/m/Y",strtotime($email->tanggal_lahir))}}</td>
  </tr>
  <tr>
    <td>Jenis Kelamin :</td> <td>{{$email->jk}}</td>
  </tr>
  <tr>
    <td>Kewarganegaraan :</td> <td>{{$email->kewarganegaraan}}</td>
  </tr>
  <tr>
    <td>No. KTP : </td><td>{{$email->no_ktp}}</td>
  </tr>
  <tr>
    <td>No. Paspor : </td><td>{{$email->no_paspor}}</td>
  </tr>
  <tr>
    <td>Alamat :</td><td> {{$email->alamat}}</td>
  </tr>
  <tr>
    <td>Dusun : </td> <td>{{$email->dusun}}</td>
  </tr>
  <tr>
    <td>RT / RW : </td><td>{{$email->rt}} / {{$email->rw}}</td>
  </tr>
  <tr>
    <td>Desa / Kelurahan</td> <td>{{$email->desa_kelurahan}}</td>
  </tr>
  <tr>
    <td>Kode Pos</td> <td>{{$email->kode_pos}}</td>
  </tr>
  <tr>
<td>Kota :</td>
<td>{{$email->kota}}</td>
  </tr>
  <tr>
    <td>Provinsi</td> <td>{{$email->provinsi}}</td>
  </tr>
  <tr>
    <td>Negara</td> <td>{{$email->negara}}</td>
  </tr>
  <tr>
    <td>Jenis Tinggal</td> <td>{{$email->jenis_tinggal}}</td>
  </tr>
  <tr>
    <td>Alat Transportasi</td> <td>{{$email->alat_transportasi}}</td>
  </tr>
  <tr>
    <td>Agama :</td> <td>{{$email->agama}}</td>
  </tr>
<tr>
  <td>Email :</td> <td> {{$email->email}}</td>
</tr>
<tr>
  <td>Instagram : </td> <td>{{$email->instagram}}</td>
</tr>
<tr>
  <td>No HP / WA :</td><td>{{$email->no_telepon}}</td>
</tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Informasi Latar Belakang Pendidikan</th>
  </tr>
  <tr>
    <td>Pendidikan Terakhir</td> <td>{{$email->pendidikan_terakhir}}</td>
  </tr>
  <tr>
    <td>jurusan</td><td>{{$email->jurusan}}</td>
  </tr>
  <tr>
    <td>Universitas</td><td>{{$email->ref_universitas}}</td>
  </tr>
  <tr>
    <td>Bahasa Sehari hari</td><td>{{$email->bahasa_sehari_hari}}</td>
  </tr>
  <tr>
    <td>Kebutuhan Khusus</td> <td>{{$email->kebutuhan_khusus}}</td>
  </tr>
  <tr>
    <td>Penerima KPS</td> <td>{{$email->penerima_kps != "" ? $email->penerima_kps : 'Tidak'}}</td>
  </tr>
  <tr>
    <td>Layak PIP</td> <td>{{$email->layak_pip != "" ? $email->layak_pip : 'Tidak Layak'}}</td>
  </tr>
  <tr><td>Penerima KIP</td> <td>{{$email->penerima_kip != "" ? $email->penerima_kip : 'Tidak'}}</td></tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Informasi Latar Belakang Pekerjaan</th>
  </tr>
  <tr>
    <td>Pekerjaan : </td><td>{{$email->pekerjaan}}</td>
  </tr>
  <tr>
    <td>Bidang Pekerjaan : </td> <td>{{$email->bidang_pekerjaan}}</td>
  </tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Pemilihan Kursus yang anda minati</th>
  </tr>
  <tr>
    <td>Course :</td> <td>{{$email->id_course.$email->id_level." ".$email->nama_paket." - ".$email->nama_level}}</td>
  </tr>
  @if($email->ielts_module != "")
  <tr>
    <td>Ielts Module :</td> <td>{{$email->ielts_module}}</td>
  </tr>
  @endif
  <tr>
    <td>Tipe Kelas : </td> <td>{{$email->tipe_kelas}}</td>
  </tr>
  <tr>
    <td>Kelompok Kelas : </td> <td>{{$email->id_kelompok_kelas}}</td>
  </tr>
  <tr>
    <td colspan="2">Durasi Kelas </td>
  </tr>
  <tr>
<td>Pertemuan :</td> <td>{{$email->jumlah_pertemuan}}</td>
  </tr>
  <tr>
    <td>Jumlah Jam : </td><td>{{$email->jumlah_jam}}</td>
  </tr>
  <tr>
    <td>Tujuan Pelatihan : </td> <td>{{$email->tujuan_pelatihan}} @if (!empty($email->tujuan_lainnya))
      {{' ('.$email->tujuan_lainnya.')'}} @endif</td>
  </tr>
</table>
<br>
<table>
  <tr>
    <th colspan="2">Informasi Kontak Wali</th>
  </tr>
  <tr>
    <td>Nama Ayah</td> <td>{{$email->nama_ayah}}</td>
  </tr>
  <tr>
    <td>No Hp Ayah</td> <td>{{$email->no_hp_ayah}}</td>
  </tr>
  <tr>
    <td>Email Ayah</td> <td>{{$email->email_ayah}}</td>
  </tr>
  <tr>
    <td>Alamat Ayah</td> <td>{{$email->alamat_ayah}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Ayah</td> <td>{{$email->pekerjaan_ayah}}</td>
  </tr>
  <tr>
    <td>Penghasilan Ayah</td> <td>{{$email->penghasilan_ayah}}</td>
  </tr>
  <tr>
    <td>Kebutuhan Khusus Ayah</td> <td>{{$email->kebutuhan_khusus_ayah}}</td>
  </tr>
  <tr>
    <td>Nama Ibu</td> <td>{{$email->nama_ibu}}</td>
  </tr>
  <tr>
    <td>No Hp Ibu</td> <td>{{$email->no_hp_ibu}}</td>
  </tr>
  <tr>
    <td>Email Ibu</td> <td>{{$email->email_ibu}}</td>
  </tr>
  <tr>
    <td>Alamat Ibu</td> <td>{{$email->alamat_ibu}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Ibu</td> <td>{{$email->pekerjaan_ibu}}</td>
  </tr>
  <tr>
    <td>Penghasilan Ibu</td> <td>{{$email->penghasilan_ibu}}</td>
  </tr>
  <tr>
    <td>Kebutuhan Khusus Ibu</td> <td>{{$email->kebutuhan_khusus_ibu}}</td>
  </tr>
  <tr>
    <td>Nama Wali</td> <td>{{$email->nama_wali}}</td>
  </tr>
  <tr>
    <td>Hubungan</td> <td>{{$email->hubungan}}</td>
  </tr>
  <tr>
    <td>No Hp</td> <td>{{$email->no_hp_wali}}</td>
  </tr>
  <tr>
    <td>Email Wali</td> <td>{{$email->email_wali}}</td>
  </tr>
  <tr>
    <td>Alamat Wali</td> <td>{{$email->alamat_wali}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Wali</td> <td>{{$email->pekerjaan_wali}}</td>
  </tr>
  <tr>
    <td>Penghasilan Wali</td> <td>{{$email->penghasilan_wali}}</td>
  </tr>
</table>
</div>
