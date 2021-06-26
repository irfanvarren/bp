<h3>Data Contact Us</h3>
@if($email->event_name != "")
<p>
	Perihal : {{$email->subject}} - {{$email->event_name}}
</p>
@endif
<p>
Nama : {{$email->nama}}
</p>
<p>
No Telpon : {{$email->no_telepon}}
</p>
<p>
Email : {{$email->email}}
</p>
<p>
Pesan : {{$email->pesan}}
</p>
