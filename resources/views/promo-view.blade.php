@extends('layouts.bp-new')
<style type="text/css">
    .news-body ul,.news-body ol{
        padding-left:2rem;
    }
    .views-counter{
        margin-top:15px;
        font-size:16px;
    }
    .views-counter span{
        font-size:20px;
        margin-right:10px;
    }
    table[cellpadding]:not([celpadding="0"]) tr td{
        padding:15px;
    }
    table{
        display: block;
        height:auto !important;
        overflow-x:auto;
        overflow-y:hidden;
    }
    @media screen and (max-width:580px){
        .views-counter{
            display: none;
        }
        #main{
            padding:30px 20px !important;
        }
    }
    ul  {
        list-style: disc inside url("{{asset('/img/news/list.png')}}");
    }

</style>
@section('news-title',implode(' ',array_map("ucfirst",explode('-',$news->slug))))
@section('news-image')
{{Storage::disk('news')->url($news->image)}}
@endsection
@section('news-desc')
{!! str_limit(strip_tags($news->body),100,$end = "...")!!}
@endsection
@section('title',implode(' ',array_map("ucfirst",explode('-',$news->slug))))
@section('content')


<div class="martop5 container-fluid">
    <div class="row">
        <div class="col-sm-8 pr-5 pl-5">
            <h1 >{{ucwords($news->title)}}</h1>
      

            <div>@if($news->author_name != ""){{$news->author_name}} | @endif {{date("l, d F Y",strtotime($news->created_at))}}</div> 
            <div class="views-counter">
                <span class="fa fa-eye"></span> {{$news->views}}
            </div>
            <img src="{{Storage::disk('news')->url($news->image)}}" class="martop3">
            @if($news->image_desc != "")
            <div class="col-md-12">{{$news->image_desc}}
            </div>
            @endif
            <p class="martop3">
                {!!$news->body!!}
            </p>
                    @if($news->end_date != "")
            <div class="col-md-12" style="margin-bottom:30px;">
                <div class="row">
                    <div class="col-md-12" style="text-align:center;padding: 0;">
                        <div
                        style="background:#2E62A6;color:white;margin:0 auto;display: block;width:100%;padding:10px 0px;">

                        <span style="font-size:18px;"><strong>Promo Ended In :</strong></span> <br>
                        <span id="timer" style="font-size:32px;font-weight:bold;">
                            00 d 00 h 00 m 00 s
                        </span>

                    </div>
                </div>
            </div>
        </div>
        @endif
            @php
            if($news->type_id == 1){
            $link = "news";
        }else{
        $link = "info-lowker";
    }
    @endphp
    @foreach ($this_tags as $tag)

    <a class="news-tags" href="{{url('media/'.$link.'/tags/'.$tag)}}">{{$tag}}</a>
    @endforeach
</div>
<div class="col-sm-4 pr-5 pl-5 pt-4 ">
    <ul>
        @foreach($new_news as $key => $value)
        @php
        if($value->type_id == 1){
        $link = "news";
    }else{
    $link = "info-lowker";
}


@endphp
<li><a href="{{url('media/'.$link.'/'.date('Y/m',strtotime($value->created_at)).'/'.$value->slug)}}" class="w3-xlarge">{{$value->title}}</a><hr></li>
@endforeach
</ul>
</div>
</div>
</div>

<div class="container-fluid pr-5 pl-5 martop5" style="background:white;">
    <div class="row">
  @if (session('status'))
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" onclick="$('.alert').hide();" aria-label="Close">
          <i class="material-icons">close</i>
      </button>
      <span>{{ session('status') }}</span>
  </div>
</div>
</div>
@endif


@if($news->slug == "fully-funded-uk-big")

<div class="col-md-8">
    <h4>Form Pendaftaran </h4>

    <form class="row form" action="{{url('/promo-recruitment')}}" enctype="multipart/form-data" method="post">
        <input type="hidden" name="email_to[]" value="counselor2@bestpartnereducation.com">
        <input type="hidden"  name="email_to[]" value="tutor1@bestpartnereducation.com">
        <div class="col-lg-12">
            {{csrf_field()}}
            <input type="hidden" value="{{$news->id}}" name="id_promo">
            <div class="row form-group">

                <label class="col-lg-12"><strong> Nama Lengkap </strong> </label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" value=""
                    required>
                    <div>Sesuai dengan yang tertera di KTP/KK</div>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"><strong> Nama Panggilan </strong></label>
                <div class="col-lg-12">
                    <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama Panggilan" name="">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"><strong>Tempat Lahir</strong></label>
                <div class="col-lg-12">
                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"><strong>Tanggal Lahir</strong></label>
                <div class="col-lg-12">
                    <input type="date" class="form-control" name="tanggal_lahir">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"><strong>Alamat</strong></label>
                <div class="col-lg-12">
                    <textarea class="form-control" name="alamat" required></textarea>
                    <div>
                        Sesuai dengan KTP/KK <br>
                        Harap isi dengan lengkap  <br>
                        Alamat – Kecamatan - Kabupaten <br>
                    </div>    
                </div>

            </div>
            <div class="row form-group">
                <label class="col-lg-12"><strong>NIK (KTP)</strong></label>
                <div class="col-lg-12">
                    <input type="text" name="no_ktp" placeholder="No KTP" pattern="[0-9]{16}" required class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"> <strong> Email</strong></label> 
                <div class="col-lg-12">
                    <input class="form-control" type="email" name="email" placeholder="Email" value="" required>
                    <div>Isi dengan email yang dapat dihubungi</div>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"> <strong> No Telpon / WA </strong> </label> 
                <div class="col-lg-12">
                    <input class="form-control" type="number" name="no_telepon" value="" placeholder="No Telpon" required>
                    <div>Gunakan nomor yang terdaftar WhatsApp dan aktif untuk dihubungi</div>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-12"> <strong>Kemampuan Berbahasa Inggris : </strong> </label> 
                <div class="col-lg-12">
                    <select class="form-control" name="level_bahasa_inggris" required="">
                        <option value="">- Pilih Level -</option>
                        <option value="SE">Survival English (SE) / <em>Basic</em></option>
                        <option value="EC">English for Communication (EC) / <em>Intermediate</em></option>
                        <option value="AE">Advanced English (AE) / <i>Advanced</i></option>
                    </select>

                </div>
            </div>
            <div class="form-group">
             <div>Keterangan:</div>
             <textarea class="form-control" name="kemampuan_bahasa_inggris" id="kemampuan_bahasa_inggris" placeholder="Keterangan mengenai kemampuan bahasa inggris" rows="4" required=""></textarea>
         </div>
         <div class="row form-group">
            <label class="col-lg-12"> <strong>Pas Foto</strong></label>
            <div class="col-lg-12">
                <input type="file" name="file_pas_foto" id="file_pas_foto" required>
                <div>Wajib melampirkan pas foto formal berlatar putih dengan format JPEG</div>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-12 "> <strong>Fotocopy KTP / KK</strong> </label>
            <div class="col-lg-12 mb-2">
                <label class="mr-3">
                    <input type="radio" name="file_type" onclick="$('#file_kk').hide();$('#file_kk').val('');$('#file_ktp').show();" checked value="KTP"> KTP 
                </label>
                <label>    
                    <input type="radio" name="file_type" onclick="$('#file_kk').show();$('#file_ktp').hide();$('#file_ktp').val('');" value="KK"> KK
                </label>
            </div>
            <div class="col-lg-12">
                <input type="file" id="file_ktp" name="file_ktp">
                <input type="file" style="display: none" id="file_kk" name="file_kk">
                <div>Dapat melampirkan Scan KTP/KK dibuat dalam format PDF</div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" style="float:right;padding:8px 40px;" name="submit"
        value="Submit">

    </div>
</form>
</div>
@else
<div class="col-md-8">
    <h4>Silahkan isi form dibawah ini untuk info lebih lanjut: </h4>
    <div>
        <form class="" action="{{url('/contact_us')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" value="{{ucwords($type)}}" name="subject">
            <input type="hidden" value="{{$news->title}}" name="event_name">
            <input type="hidden" value="{{$news->slug}}" name="event_slug">
            <div class="row form-group">
                <label class="col-md-12"><strong> Nama Lengkap </strong> </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" value=""
                    required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-12"> <strong> Email</strong></label> 
                <div class="col-md-12">
                    <input class="form-control" type="email" name="email" placeholder="Email" value="" required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-12"> <strong> No Telpon / WA </strong> </label> 
                <div class="col-md-12">
                    <input class="form-control" type="number" name="no_telepon" value="" placeholder="No Telpon"
                    required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-12"> <strong> Pesan : </strong> </label> 
                <div class="col-md-12">
                    <textarea class="form-control" name="pesan" placeholder="Pesan..." wrap="soft"
                    style="resize:none;" rows="5" required></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" style="float:right;padding:8px 40px;" name="submit"
                    value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endif

</div>
</div>
@push('more-script')
<script type="text/javascript">
    var now = "{{\Carbon\Carbon::now()->timestamp }}";
    var timeout = "{{strtotime($news->end_date)}}";
    var onloadTimer;
    var timerDisplay = $('#timer');

    function makeInteger(time, x, mod) {
        var time = Math.floor(time / x) % mod;
        if (time < 10) {
            time = "0" + time;
        }
        return time;
    }

    $(document).ready(function () {
        if (timeout > 0 && timeout != null) {
            var timer = (timeout - now);
            onloadTimer = setInterval(function () {
                if (timer > 0) {
                    timer--;
                    var weeks = "00",
                    days = makeInteger(timer, 60 * 60 * 24, 999),
                    hours = makeInteger(timer, 60 * 60, 24),
                    minutes = makeInteger(timer, 60, 60),
                    seconds = makeInteger(timer, 1, 60);
                    if (weeks != "00") {
                        var output = weeks + " wk ";
                    } else {
                        var output = "";
                    }
                    output += days + " d " + hours + " h " + minutes + " m " + seconds + " s ";

                    timerDisplay.html(output);
                } else {
                    clearInterval(onloadTimer);
                }
            }, 1000);

        }
    });

</script>
@endpush
@stop
