<h2>Data Pendaftaran Tutor</h2>
<h3>Personal Information</h3>
<p>Nama : {{$email->nama_depan.' '.$email->nama_belakang}}</p>
<p>Tempat Kelahiran : {{$email->kota.', '.$email->provinsi}}</p>
<p>Tanggal Lahir : {{$email->tanggal_lahir.'/'.$email->bulan_lahir.'/'.$email-> tahun_lahir}}</p>
<p>Agama : {{$email->agama}}</p>
<p>Alamat : {{$email->alamat}}</p>
<p>Kebangsaan : {{$email->kebangsaan}}</p>
<p>No Telepon / WA : {{$email->no_telepon}}</p>
<p>Email : {{$email->email}}</p>
<h3>Latar Belakang Pendidikan</h3>
<h4>High School</h4>
<p>High School Name : {{$email->nama_sma}}</p>
<p>Year Attended : {{$email->tahun_sma}}</p>
<p>Degree / Major : {{$email->jurusan_sma}}</p>
<p>Graduated : {{$email->lulus_sma}}</p>

<h4>Diploma / Bachelor Degree</h4>
<p>High School Name : {{$email->nama_s1}}</p>
<p>Year Attended : {{$email->tahun_s1}}</p>
<p>Degree / Major : {{$email->jurusan_s1}}</p>
<p>Graduated : {{$email->lulus_s1}}</p>

<h4>Master Degree</h4>
<p>High School Name : {{$email->nama_s2}}</p>
<p>Year Attended : {{$email->tahun_s2}}</p>
<p>Degree / Major : {{$email->jurusan_s2}}</p>
<p>Graduated : {{$email->lulus_s2}}</p>

<h4>Assosiate Degree</h4>
<p>High School Name : {{$email->nama_assosiate}}</p>
<p>Year Attended : {{$email->tahun_assosiate}}</p>
<p>Degree / Major : {{$email->jurusan_assosiate}}</p>
<p>Graduated : {{$email->lulus_assosiate}}</p>

<h3>TEACHIING EXPERIENCE</h3>
<p>Most Recent Position : {{$email->posisi_terakhir}}</p>
<p>Second Most Recent Position : {{$email->posisi_terakhir_2}}</p>
<p>Third Most Recent Position : {{$email->posisi_terakhir_2}}</p>

<h3>OTHER RELEVANT EXPERIENCE</h3>
<p>Experience 1 : {{$email->pengalaman_sejenis_terakhir}}</p>
<p>Experience 2 : {{$email->pengalaman_sejenis_2}}</p>

<h3>CONFERENCES AND SEMINARS</h3>
<p>Conference and seminar 1 : {{$email->konferensi_seminar_1}}</p>
<p>Conference and seminar 2 : {{$email->konferensi_seminar_2}}</p>
<p>Conference and seminar 3 : {{$email->konferensi_seminar_3}}</p>

<h3>TRAINING AND WORKSHOP</h3>
<p>Training and Workshop 1 : {{$email->training_workshop_1}}</p>
<p>Training and Workshop 2 : {{$email->training_workshop_2}}</p>
<p>Training and Workshop 3 : {{$email->training_workshop_3}}</p>

<h3>ORGANIZATIONAL EXPERIENCE</h3>

<p>Experience 1 : {{$email->pengalaman_organisasi_1}}</p>
<p>Experience 2 : {{$email->pengalaman_organisasi_2}}</p>
