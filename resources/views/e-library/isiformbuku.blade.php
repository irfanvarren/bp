
@extends('e-library.layouts.app')

@section('content')
<div class="container-fluid">

  <div class="">
    <div class="data-fullscreen">
      <div class="col-md-12">

        <a href="/logout" class="btn btn-info " style="float: right;margin-top: 15px">log out</a>
      </div>  
      <div class="container text-center p-3">
        <a href="{{url('library/isiformbuku')}}" class="btn btn-light mx-4">Database Buku</a>
        <a href="{{url('library/bannerupdate')}}" class="btn btn-light mx-4">Banner Update</a>
      </div>
      <div class="col-md-12" style="margin-top: 30px">
        <div class="row">
          <div class="col-md-12">
            <button type="button" class="btn btn-primary float-right" style="margin-top: 10px;margin-bottom: 70px" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Buku</button>
          </div>
        </div>
        <div class="row">
          <div class="container-fluid" style="background: white">

            <table class="table table-striped " style="font-size: 14px">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="max-width: 150px;overflow: hidden" >Judul Buku</th>
                  <th scope="col">ISSN </th>
                  <th scope="col">ISBN </th>
                  <th scope="col">Penulis </th>
                  <th scope="col">Penerbit </th>
                  <th scope="col">Bahasa </th>
                  <th scope="col">Tahun Terbit </th>
                  <th scope="col">Format </th>
                  <th scope="col">Kategori </th>

                  <th scope="col" style="max-width: 150px;overflow: hidden">Link Download </th>
                  <th scope="col" style="max-width: 150px;overflow: hidden">Deskripsi </th>
                  <th scope="col" style="max-width: 150px;overflow: hidden">Link Gambar </th>
                  <th scope="col" style="max-width: 150px;overflow: hidden">Audio Video </th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($buku as $buku)
                <tr>
                  <td style="max-width: 100px;overflow: hidden">{{ $buku->judul }}</td>
                  <td>{{ $buku->ISSN }}</td>
                  <td>{{ $buku->ISBN }}</td>
                  <td >{{ $buku->penulis}}</td>
                  <td>{{ $buku->penerbit }}</td>
                  <td>{{ $buku->bahasa }}</td>
                  <td>{{ $buku->tahun_terbit }}</td>
                  <td>{{ $buku->format}}</td>
                  <td>{{ $buku->kategori_buku}}</td>

                  <td style="max-width: 85px;overflow: hidden">{{ $buku->link_download }}</td>
                  <td style="max-width: 85px;overflow: hidden">{{ $buku->deskripsi}}</td>
                  <td style="max-width: 85px;overflow: hidden">{{ $buku->link_gambar }}</td>
                  <td style="max-width: 85px;overflow: hidden">{{ $buku->link_audiovideo }}</td>
                  <td>
                    <a href="isiformbuku/{{$buku->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                  </td>
                  <td>
                    <a href="isiformbuku/{{$buku->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- link gambar dibuat upload -->
  <!-- link audio & videol kalo dicentang jadi satu sama link buku -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Data Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('buku-form-submit') }}" enctype="multipart/form-">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Judul Buku</label>
              <input type="text" class="form-control" name="judul" id="judul" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">ISSN</label>
              <input type="text" class="form-control" name="ISSN" id="ISSN" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">ISBN</label>
              <input type="text" class="form-control" name="ISBN" id="ISBN" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Penerbit</label>
              <input type="text" class="form-control" name="penerbit" id="penerbit" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Penulis</label>
              <input type="text" class="form-control" name="penulis" id="penulis" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Bahasa</label>
              <input type="text" class="form-control" name="bahasa" id="bahasa" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Tahun Terbit</label>
              <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Format</label>
              <input type="text" class="form-control" name="format" id="format" >
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Kategori Buku</label>
              <input type="text" class="form-control" name="kategori_buku" id="kategori_buku" >
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput2">Upload Gambar</label>
              <div  style="width:100%;height: 30px;">
                <input type="file" name="gambar" id="gambar" class="form-control d-none"> <div style="width:250px;border: 1px solid #d8d8d8;float:left;padding:0.03rem 0.5rem;line-height: 27px;white-space: nowrap;font-size:13px;overflow: hidden;text-overflow: ellipsis;" id="file-value">&emsp;</div> <button class="btn btn-sm btn-primary float-left" type="button" id="file-button">Select File</button>

              </div>
              <!-- <input type="text" class="form-control" name="link_gambar" id="link_gambar" > -->
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Deskripsi</label>
              <textarea class="form-control rounded-0" name="deskripsi" id="deskripsi" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="formpilihan">Apakah ada e-book tersedia?</label>                
              <select name="cek_ebook" class="form-control" id="cek_ebook">
                <option value="0">Tidak ada</option>
                <option value="1">Ada</option>
              </select>
            </div>

            <div class="form-group">
              <label for="formpilihan">Apakah ada Audio tersedia?</label>                
              <select name="cek_audio" class="form-control" id="cek_audio">
                <option value="0">Tidak ada</option>
                <option value="1">Ada</option>
              </select>
            </div>
            <div class="form-group">
              <label for="formpilihan">Apakah ada video tersedia?</label>                
              <select name="cek_video" class="form-control" id="cek_video">
                <option value="0">Tidak ada</option>
                <option value="1">Ada</option>
              </select>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6" style="display:none;" id="link-download">
                  <label for="formGroupExampleInput2">Link Download E-Book</label>
                  <input type="text" class="form-control w-100" name="link_download" pattern="[Hh][Tt][Tt][Pp][Ss]?:\/\/(?:(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))(?::\d{2,5})?(?:\/[^\s]*)?" id="link_download" >
                </div>
                <div class="col-md-6" style="display: none;" id="link-audio-video">
                  <label for="formGroupExampleInput2">Link Audio & Video</label>
                  <input type="text" class="form-control w-100" name="link_audiovideo" pattern="" id="link_audiovideo" >
                </div>
              </div>
            </div> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('#cek_audio').on('change',function(){
    if($(this).val() == 1 || $('#cek_video').val() == 1){
      $('#link-audio-video').show();
    }else{
     $('#link-audio-video').hide();
   }
 });
  $('#cek_video').on('change',function(){
    if($(this).val() == 1 || $('#cek_audio').val() == 1){
      $('#link-audio-video').show();
    }else{
     $('#link-audio-video').hide();
   }
 });
  $('#cek_ebook').on('change',function(){
    if($(this).val() == 1){
      $('#link-download').show();
    }else{
      $('#link-download').hide();
    }
  })
  $('#file-button').click(function () {
    $("#gambar").trigger('click');
  });

  $("#gambar").change(function () {
    $('#file-value').text(this.value.replace(/C:\\fakepath\\/i, ''))
  });
</script>
@endsection