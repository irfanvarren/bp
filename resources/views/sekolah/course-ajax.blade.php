  @if(isset($course))
  @foreach($course as $value)
  @php
  $id_jurusan = $value->id;
  $nama_jurusan = $value->name;
  @endphp
  <div class="col-md-12 suggestion-list suggestion" data-value="{{$id_jurusan.'|'.$nama_jurusan}}" onClick="pilih_suges('{{$id_jurusan}}','{{$nama_jurusan}}')">{{$nama_jurusan }}</div>
  @endforeach
  @endif
  ##
  {{$course->count()}}