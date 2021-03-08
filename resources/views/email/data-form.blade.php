@if($email->slug == "internship-and-job-vacancy")
<p>Nama Sekolah : {{$email->nama_sekolah}}</p>
<p>Alamat : {{$email->alamat_sekolah}}</p>
<p>Nama : {{$email->nama}}</p>
<p>Tanggal Lahir : {{date("d/m/Y",strtotime($email->tanggal_lahir))}}</p>
<p>Jurusan : {{$email->jurusan}}</p>
<p>Nomor HP / WA : {{$email->nomor_hp}}</p>
<p>Email : {{$email->email}}</p>
<p>Keahlian yang dimiliki : {{$email->keahlian}}</p>
<p>Periode Iternship : {{$email->periode}}</p>
<p>Bagaimana Mengetahui Tentang Best Partner : {{$email->bagaimana_mengetahui}}</p>
@elseif($email->slug == "best-partner-events")
<p>
	So, overall how would you rate the event? <br> {{$email->data[0]}}
</p>
<p>
	Thanks! Now for a little more detail. How would you rate the speaker?  <br> {{$email->data[1]}}
</p>
<p>
	How about the Workshops?  <br> {{$email->data[2]}}
</p>
<p>
	How about the Moderator? <br> {{$email->data[3]}}
</p>

<p>
	How about the Staff? <br> {{$email->data[4]}}
</p>

<p>
	And last but not least, the material? <br> {{$email->data[5]}}
</p>

<p>
	Thanks again. Would you mind telling us how you heard about the event? 
	<br>
	{{$email->data[6]}}
</p>

<p>
	Thank you. Did the event meet your expectations? <br> {{$email->data[7]}}
</p>

<p>
	And would you be likely to recommend us to a friend or colleague? 
	<br> {{$email->data[8]}}
</p>

<p>
	Nearly there. How likely are you to attend another one of our events? <br> {{$email->data[9]}}
</p>

<p>
	Finally, tell us a little about yourself... How old are you? <br> {{$email->data[10]}}
</p>

<p>
	Where are you from? <br> {{$email->data[11]}}
</p>

<p>
	Great finish! Give us a short words about our event <br> {{$email->data[12]}}
</p>

@endif