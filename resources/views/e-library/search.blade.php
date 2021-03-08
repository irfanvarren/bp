@extends('e-library.layouts.app')

@section('content')

<script type="text/javascript">
          $('document').ready(function(){
            $('#search_input').keypress(function(e) {

          if(e.which == 13) {
              var keyword = $('#search_input').val();
              location.href = "{{url('library/search?keyword=')}}"+keyword;
            }
          });

        });


          $(document).ready(function(){
          function load_data(keyword)
  {
    var _token = $("input[name='_token']").val();
    
    $.ajax({
      url:"{{url('library/search')}}",
      method:"post",
      data:{
        keyword:keyword,
        _token : _token
      },
      success:function(data)
      {
        $('#result').html(data);
      },
      error:function(){
        alert('error');
      }
    });
  }
  
  $('#search_input').keyup(function(){
    var search = $(this).val();

    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});
        </script>
<br>
<br>
<div class="container" style="background-color: white; padding-bottom: 2px;padding-top: 2px;padding-left: 45px;border-bottom: 5px solid">

  <h2 style="text-align: center">Hasil Pencarian</h2>
</div>
<div class="container-fluid" style="margin-top: 30px">
	<div class="container">
  <div class="row" id="result">
      <?php

      $buku = App\Models\Library\Buku::where('judul', 'like', '%' . "%{$keyword}%" . '%')->get(); ?>
      @foreach ($buku as $buku)
    <div class="col-md-3" style="padding-top: 30px">
    	<div class="thumbnail" style="background-color:#f3f0ef;padding-top: 10px">
      <img src="{{$buku->link_gambar}} "
            style="height: 300px">
          	<div class="caption">
            <h4 style="font-size: 15px;text-align: center;max-height: 40px;overflow: hidden;height: 40px">{{$buku->judul}}</h4>
            <div class="text-center">
      <a href="{{url('library/detail/'.$buku->id)}}/" class="btn btn-primary">Lihat Buku</a>
      </div>
      		</div>   
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
