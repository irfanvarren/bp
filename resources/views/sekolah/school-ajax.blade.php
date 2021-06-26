@if(isset($keywordSekolah))
@foreach($keywordSekolah as $data_keyword)
@php
  $id_sekolah = $data_keyword['id'];
  $nama_sekolah = $data_keyword['name'];
@endphp
  <div class="col-md-12 schoolSuggestion-list suggestion" data-value="{{$id_sekolah.'|'.$nama_sekolah}}" onClick="pilih_sugesSekolah({{"'$id_sekolah','$nama_sekolah'"}})"><div>{{$nama_sekolah}}, {{$data_keyword['region_name']}}, {{$data_keyword['city_name']}}, {{$data_keyword['country_name']}}</div> <span style="font-size:12px">{{$data_keyword['address']}}</span> </div>
@endforeach
@endif
  ##
{{$keywordSekolah->count()}}