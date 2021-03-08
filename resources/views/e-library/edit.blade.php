@extends('e-library.layouts.app')

@section('content')
<div class="container-fluid" style="padding:20px !important;font-size: 12px">
  <h2 class="text-center" style="margin-top: 25px;">Edit Data Buku</h2>
  <div class="card" style="max-width:800px;display: block;margin:0 auto">
    <div class="card-body">


      <form method="post" style="margin-top: 25px;" action="{{url('library/isiformbuku/'.$buku->id.'/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="formGroupExampleInput">Judul Buku</label>
          <input type="text" class="form-control" name="judul" id="judul" value="{{$buku->judul}}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">ISSN</label>
          <input type="text" class="form-control" name="ISSN" id="ISSN" value="{{$buku->ISSN}}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">ISBN</label>
          <input type="text" class="form-control" name="ISBN" id="ISBN" value="{{$buku->ISBN}}">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="penerbit" value="{{$buku->penerbit}}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Penulis</label>
          <input type="text" class="form-control" name="penulis" id="penulis" value="{{$buku->penulis}}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Bahasa</label>
          <input type="text" class="form-control" name="bahasa" id="bahasa" value="{{$buku->bahasa}}">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Tahun Terbit</label>
          <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="{{$buku->tahun_terbit}}">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Format</label>
          <input type="text" class="form-control" name="format" id="format" value="{{$buku->format}}">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Kategori Buku</label>
          <input type="text" class="form-control" name="kategori_buku" id="kategori_buku" value="{{$buku->kategori_buku}}">
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Upload Gambar</label>
          <div  style="width:100%;height: 30px;">
            <input type="file" name="gambar" id="gambar" class="form-control d-none" v> <div style="width:250px;border: 1px solid #d8d8d8;float:left;padding:0.03rem 0.5rem;line-height: 27px;white-space: nowrap;font-size:13px;overflow: hidden;text-overflow: ellipsis;" id="file-value">{{$buku->link_gambar}}</div> <button class="btn btn-sm btn-primary float-left" type="button" id="file-button">Select File</button>

          </div>
          <!-- <input type="text" class="form-control" name="link_gambar" id="link_gambar" > -->
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Deskripsi</label>
          <textarea class="form-control rounded-0" name="deskripsi" id="deskripsi" rows="5">{!! $buku->deskripsi !!}</textarea>
        </div>
        <div class="form-group">
          <label for="formpilihan">Apakah ada e-book tersedia?</label>                
          <select name="cek_ebook" class="form-control" id="cek_ebook">
            <option value="0">Tidak ada</option>
            <option value="1" {{$buku->cek_ebook == 1 ? 'selected' : ''}}>Ada</option>
          </select>
        </div>

        <div class="form-group">
          <label for="formpilihan">Apakah ada Audio tersedia?</label>                
          <select name="cek_audio" class="form-control" id="cek_audio">
            <option value="0">Tidak ada</option>
            <option value="1" {{$buku->cek_audio == 1 ? 'selected' : ''}}>Ada</option>
          </select>
        </div>
        <div class="form-group">
          <label for="formpilihan">Apakah ada video tersedia?</label>                
          <select name="cek_video" class="form-control" id="cek_video">
            <option value="0">Tidak ada</option>
            <option value="1" {{$buku->cek_video == 1 ? 'selected' : ''}}>Ada</option>
          </select>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6" style="display:none;" id="link-download">
              <label for="formGroupExampleInput2">Link Download E-Book</label>
              <input type="text" class="form-control w-100" name="link_download" pattern="[Hh][Tt][Tt][Pp][Ss]?:\/\/(?:(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))(?::\d{2,5})?(?:\/[^\s]*)?" id="link_download" value="{{$buku->link_download}}">
            </div>
            <div class="col-md-6" style="display: none;" id="link-audio-video">
              <label for="formGroupExampleInput2">Link Audio & Video</label>
              <input type="text" class="form-control w-100" name="link_audiovideo" pattern="[Hh][Tt][Tt][Pp][Ss]?:\/\/(?:(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))(?::\d{2,5})?(?:\/[^\s]*)?" value="{{$buku->link_audiovideo}}" id="link_audiovideo" >
            </div>
          </div>
        </div> 
        <div class="text-center">
          <button type="submit" class="btn btn-warning">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
  $('document').ready(function(){
    if($('#cek_audio').val() == 1 || $('#cek_video').val() == 1){
      $('#link-audio-video').show();
    }else{
     $('#link-audio-video').hide();
   }

   if($('#cek_ebook').val() == 1){
    $('#link-download').show();
  }else{
    $('#link-download').hide();
  }
});

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

  $('#file-button').click(function () {
    $("#gambar").trigger('click');
  });

  $("#gambar").change(function () {
    $('#file-value').text(this.value.replace(/C:\\fakepath\\/i, ''))
  });
</script>
@endsection