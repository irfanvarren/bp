@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
<style media="screen">
    @import url(https://fonts.googleapis.com/css?family=Quicksand);
    .search-school.content-wrapper {
      min-height:700px;
      padding:0 15px !important;
  }

  .search-school.content-wrapper .nav {
    float: left;
    border-bottom: 0;
}

.search-school.content-wrapper .nav li a{
    background: white;
    margin-right: 3px;
}

.search-school.content-wrapper .nav li a.active {
    color: white !important;
    background: #3c74b0;
    border-bottom:none !important;
}

.tab-content {
    margin-top: 3px;
}

.tab-content>.active {
    opacity: 1 !important;
}

.search-school.content-wrapper .title-wrapper {

    background: rgba(0, 0, 0, 0.7);
    width: 100%;
}

.search-school.content-wrapper .title h2 {
    color: #ff4747;
    font-size: 60px;
    font-family: "Lato", Georgia, Times, serif;
    text-transform: uppercase;
    font-weight: bold;
}

.search-school.content-wrapper .title h3 {
    font-size: 30px;
}

.search-school.content-wrapper .title {
    text-align: center;
    color: white;
    font-size: 20px;
    max-width: 80%;
    margin: 120px auto;
    margin-bottom:180px;
}

.search-school.content-wrapper .banner-background {
    background-size: cover;
    background-position: center;
}

.search-content {
    font-size: 16px;
    padding: 15px !important;
    background: white;
    box-shadow: 0 0 14px 0 rgba(0, 0, 0, 0.2);
}
/*
.field_pencarian .selectize-input{
    margin-top:15px;
    padding:9px;
}*/

.field_pencarian {
    border: 1px solid #bbb !important;
    height: 40px !important;
    margin-top: 15px;
    font-size: 22px;
    color: black;
}

.field_pencarian::placeholder {
    color: #aaa;
}

.field_pencarian:focus {
    outline: none;
}

.search-btn {
    color: white;
    font-size: 20px;
    height: 40px;
    background-color: #3c74b0;
    border: none;
    margin: 15px 0;
}

.search-btn:hover {
    cursor: pointer;
}

.search-content select {
    background: none;
    border: none;
    color: #555;
    width: 100%;
}

select:focus {
    outline: none;
}

.noUi-connect {
    background-color: #3c74b0 !important;
}

.search-content select option {
    color: #07778f;
    background: rgba(255, 255, 255, 0.69);
}

.search-box {
    display: none;
    position: absolute;
    top: 0;
    left: 50%;
    width: 80%;
    z-index: 9999;
    transform: translate(-50%, -50%);
}

#myslider {
    margin: 15px 0;
}

.slick-slider {
    width: 100%;
    padding: 0 !important;
    position:relative;
}
.destination{
  padding:35px 15px;
}
.destination .title{
  margin-bottom:35px;
}
.destination .title h1{
  font-family: 'Quicksand', sans-serif;
  letter-spacing: 1px;
  color:#303030;font-size:42px;
}
.destination .country-wrapper{
    padding:0 150px;
}

.destination .country-wrapper .country{
  position:relative;
  height:350px;
  background-color: black;
  width:100%;
  overflow:hidden;
}
.destination .country-wrapper .slick-slide{
  border-radius:12px;

}
.destination .country-wrapper .slick-slide:hover{
 box-shadow: 0 0 15px #888888;
}
.destination .country-wrapper .country span{
  position: absolute;bottom:0;left:0;color:white;margin:5px 10px;font-weight: bold;font-size:20px;display: block;
}
.destination .country-wrapper .country img{
  height:100%;
}
.destination .country-wrapper .slick-list{
  padding:10px 120px;
}
.destination .country-wrapper .slick-slide{
  height:auto !important;
}
.keyword-wrapper {
    display:none;
    padding:0 !important;

}
.keyword-wrapper > div{
    background:white;
    padding:8px 10px 8px 10px;
    box-shadow:0px 0px 3px #ccc;
    z-index:10;
}
.keyword-wrapper .suggestion{
    padding:8px 12px;
    border-bottom:1px solid #ccc;
}
.keyword-wrapper .suggestion:hover{
    cursor:pointer1;
    background: #ededed;
}
.keyword-wrapper .suggestion.selected{
 background: #ededed;
}

@media screen and (max-width:968px) {
    .search-content select {
        position: relative;
        top: auto;
        transform: none;
        margin: 15px 0;
    }
    .destination .country-wrapper{
    padding:0 15px;
}
.destination .country-wrapper .slick-list{
  padding:10px 15px;
}
}
</style>
<link rel="stylesheet" href="<?php echo asset('css/nouislider.min.css');?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
@section('content')

<div class="content-wrapper search-school col-md-12">
    <div class="row">

        <div class="col-md-12 banner">
            <div class="row">



                <div class="col-md-12 banner-background" style="background-image:url('{{asset('img/banner/header-slide.jpg')}}')">
                    <div class="row">
                        <div class="col-md-12 title-wrapper">


                            <div class="title">
                                <h3>Online Learning Anytime, Anywhere!</h3>
                                <h2>Cari Sekolah</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                                <div class="slide-buttons hidden-sm hidden-xs">
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <div class="row">


        <div class="col-md-12" >
            <div class="search-box">



                <div class="col-md-12">


                    <ul class="nav nav-tabs nav-pills">
                        <li class="active"><a data-toggle="pill" class="active"  href="#jurusan">Jurusan</a></li>
                        <li><a data-toggle="pill" href="#sekolah">Sekolah</a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="tab-content">
                        <div id="jurusan" class="tab-pane fade in active">
                            <div class="col-md-12 home1-content">
                                <div class="row">


                                    <div class="col-md-12 search-wrapper">
                                     <form name="myform" id="myform" action="{{url('cari-sekolah/search')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 search-content">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-9" style="padding:0;">

                                                                <input type="text" id="keyword" name="keyword" placeholder="Jurusan..." class="col-md-12 field_pencarian selectize" autocomplete="off" >
                                                                
                                                                <input type="text" name="search_type" id="search_type" class="search_type" value="course" style="display:none;">
                                                                <div class="col-md-12 keyword-wrapper">
                                                                    <div class="col-md-12 " id="output-jurusan" style="max-height:185px; overflow:auto;position:absolute;">

                                                                        @if(isset($keyword))
                                                                        @foreach($keyword as $data_keyword)
                                                                        @php
                                                                        $id_jurusan = $data_keyword->id;
                                                                        $nama_jurusan = $data_keyword->name;
                                                                        @endphp
                                                                        <div class="col-md-12 suggestion-list suggestion" data-value="{{$id_jurusan.'|'.$nama_jurusan}}" onClick="pilih_suges('{{$id_jurusan}}','{{$nama_jurusan}}')">{{$nama_jurusan }}</div>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-3" style="padding:0;">
                                                                <input type="button" class="search-btn col-md-12" value="Search" onClick="cari('course')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 search_option">

                                                    <div class="row">

                                                        <div class="col-md-3 align-self-center">
                                                            <select name="qualification_id" id="qualification_id" class="qualification">
                                                                <option value="">Select Qualifikasi</option>
                                                                @foreach($qualification as $key => $value)
                                                                <option value="{{$value->id}}">{{ $value->name}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="col-md-3 align-self-center">


                                                            <select name="country_id" id="kode_negara" class="">
                                                                <option value="">Select Negara</option>

                                                                @if(isset($country))

                                                                @foreach($country as $key => $value)
                                                                <option value="{{$value->id}}">{{$value->name}}</option>

                                                                @endforeach
                                                                @endif

                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="row">
                                                          <div class="col-md-12" style="margin-bottom:5px;">
                                                            Harga
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">

                                                                <!-- harga total -->
                                                                <div class="col-md-6" style="margin-bottom:10px;">
                                                                    <input type="text" class="form-control" name="min_fee" placeholder="Harga Min" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="max_fee" placeholder="Harga Max" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <!--<div class="col-md-6"> Total Biaya
                                                            <div id="myslider"></div>
                                                            <div>
                                                                <div style="float:left;" id="slider-min"></div>
                                                                <span style="float:left;margin:0 5px;">-</span>
                                                                <div style="float:left;" id="slider-max"></div>
                                                            </div>
                                                        </div>-->

                                                        <div class="col-md-12">

                                                            <input type="text" style="display: none;" name="course_type" id="course_type">
                                                            <input type="text" id="id_jurusan" name="id_jurusan" style="display: none;" hidden="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sekolah" class="tab-pane fade">
                        <div class="col-md-12 home1-content">
                            <div class="row">


                                <div class="col-md-12 search-wrapper">
                                    <form name="myform2" id="myform2" action="{{url('cari-sekolah/search')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 search-content">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                         <div class="row">
                                                          <div class="col-md-8">
                                                            <input type="text" id="keywordSekolah" name="keywordSekolah" placeholder="Sekolah..." autocomplete="off" class="col-md-12 field_pencarian">
                                                            <input type="text" name="id_sekolah" id="id_sekolah" style="display:none;">
                                                            <input type="text" name="search_type" id="search_type" class="search_type" value="school" style="display:none;">
                                                            <div class="col-md-12 keyword-wrapper">
                                                                <div class="col-md-12" id="output-sekolah" style="max-height:150px; overflow:auto;position:relative;">
                                                                    <?php
                                                                    if(isset($keywordSekolah)){
                                                                        foreach($keywordSekolah as $data_keyword){
                                                                            $id_sekolah = $data_keyword['id'];
                                                                            $nama_sekolah = $data_keyword['name'];
                                                                            ?>
                                                                            <div class="col-md-12 schoolSuggestion-list suggestion" data-value="{{$id_sekolah.'|'.$nama_sekolah}}" onClick="pilih_sugesSekolah(<?php echo "'$id_sekolah','$nama_sekolah'"; ?>)"><?php echo $nama_sekolah; ?>  </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <input type="button" class="search-btn col-md-12" value="Search" onClick="cari('school')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                     <div class="col-md-3">
                                                        <select name="country_id" id="kode_negara">
                                                          <option value="">Select Country</option>
                                                          @if(isset($country))

                                                          @foreach($country as $key => $value)
                                                          <option value="{{$value->id}}">{{$value->name}}</option>

                                                          @endforeach
                                                          @endif
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-12 destination">
    <div class="row">

      <div class="col-md-12 title">
          <h1 class="text-center ">Temukan Destinasi Negaramu</h1>

      </div>
      <div class="col-md-12 country-wrapper">



          <div class="slick-slider">
            <div class="country">
              <img src="{{asset('img/negara/lama/australia.jpg')}}" alt="">
              <span>Australia</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/singapore.jpg')}}" alt="">
              <span>Singapore</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/malaysia.jpg')}}" alt="">
              <span>Malaysia</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/New Zealand.jpg')}}" alt="">
              <span>New Zealand</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Switzerland.jpg')}}" alt="">
              <span>Switzerland</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Canada.jpg')}}" alt="">
              <span>Canada</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/South Korea.jpg')}}" alt="">
              <span>South Korea</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/China.jpg')}}" alt="">
              <span>China</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/England.jpeg')}}" alt="">
              <span>England</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/France.jpg')}}" alt="">
              <span>France</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Ireland.jpg')}}" alt="">
              <span>Ireland</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Netherland.jpg')}}" alt="">
              <span>Netherland</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Spain.jpg')}}" alt="">
              <span>Spain</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Swedia.jpg')}}" alt="">
              <span>Swedia</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/United States.jpg')}}" alt="">
              <span>America</span>
          </div>
          <div class="country">
              <img src="{{asset('img/negara/lama/Indonesia.jpg')}}" alt="">
              <span>Indonesia</span>
          </div>

      </div>
  </div>
</div>
</div>
<div class="col-md-12">


  <example-component></example-component>

</div>
@endsection
@push('more-script')
<script src="<?php echo asset('js/nouislider.min.js');?>"></script>
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">


           var token = $("input[name='_token']").val();
    /*$('#keyword').selectize({
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    preload : true,
    create: false,
    render: {
        option: function(item, escape) {

            return '<h3 style="color:black">' + item.name + '</h3>';
        }
    },
     score: function(search) {
        console.log(search);
        var score = this.getScoreFunction(search);
        return function(item) {
            return score(item) * (1 + Math.min(item.watchers / 100, 1));
        };
    },
    load: function(query, callback) {
        if (!query.length) return callback();
         $.ajax({
            url : "{{route('search-course-ajax')}}",
            method: "POST",
            data : {
                _token : token,
                keyword : query
            },
            error: function() {
                callback();
            },
            success: function(res) {
                console.log(JSON.parse(res));
                callback(JSON.parse(res));
            }
        });
    }


    });*/

    var pointer1 = 0;
    var pointer2 = 0;

    var courseAjaxTimer;
    var schoolAjaxTimer;

    $(document).mouseup(function(e) 
    {
        var container = $(".field_pencarian");
        var outputJurusan = $("#output-jurusan");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && !outputJurusan.is(e.target) && container.has(e.target).length === 0) 
    {
        $('.keyword-wrapper').hide();
        $('#output-sekolah').attr('data-show','hide');
        pointer2 = 0;
        pointer1 = 0;
    }
});
    $(document).ready(function(){
        $('#keyword').on('click',function(){
           var keyword = $(this).val();
           var token = $("input[name='_token']").val();
           $.ajax({
            url : "{{route('search-course-ajax')}}",
            method: "POST",
            data : {
                _token : token,
                keyword : keyword
            },success: function(data){
                var arr_data = data.split('##');
                if(arr_data[1] > 0 ){
                    $('#output-jurusan').html(arr_data[0]);
                }else{

                    $('#output-jurusan').html("no result");
                }
            },error: function(){
           // alert('error');
       }
   });
           $('.keyword-wrapper').show(); 
       });

        $('#keywordSekolah').on('click',function(){
            if($('#output-sekolah').attr('data-show') != 'show'){
           var keyword = $(this).val();
           var token = $("input[name='_token']").val();
           $.ajax({
            url : "{{route('search-school-ajax')}}",
            method: "POST",
            data : {
                _token : token,
                keyword : keyword
            },success: function(data){
                var arr_data = data.split('##');
                if(arr_data[1] > 0 ){
                    $('#output-sekolah').html(arr_data[0]);
                    $('#output-sekolah').attr('data-show',function(index,attr){
                        return attr == 'show' ? 'hide' : 'show';
                    });

                }else{
                    $('#output-sekolah').html("no result");
                }
            },error: function(){
            //alert('error');
        }
    });
           $('.keyword-wrapper').show();
           $('#output-sekolah').scrollTop(0);
       }
       });

        $('#keyword').keyup(function(e){
            clearTimeout(courseAjaxTimer);
            $('.keyword-wrapper').show();
            var suges = document.getElementsByClassName('suggestion-list');
            switch(e.which) {
                case 13:

                if($('#keyword').val() != ""){
                    if($('#id_jurusan').val() != ""){
                     var selected_pointer1 = pointer1 - 1;

                     var id_jurusan = $(suges[selected_pointer1]).attr("data-value");
                     var arr_jurusan = id_jurusan.split('|');
                     $('#id_jurusan').val(arr_jurusan[0]);
                     $('#keyword').val(arr_jurusan[1]);
                     $('.keyword-wrapper').hide();
                     $('.suggestion-list').removeClass("selected");
                     pointer1 = 0;

                 }else{

                    document.getElementById('myform').submit();

                }
            }else{
                if(pointer1 > 0){
                    $('#output-jurusan').scrollTop((pointer1-1) * 42.6);
                }else{
                    $('#output-jurusan').scrollTop(pointer1 * 42.6);
                    suges[pointer1].classList.add('selected');
                }
                suges[pointer1-1].classList.add('selected');
            } 

            break;



        case 38: // up
        if(pointer1 > 0){
            pointer1 = pointer1 - 1;
            var prev = pointer1;
            prev--;
            $('#output-jurusan').scrollTop(prev * 42.6);
            suges[pointer1].classList.remove('selected');
            if(pointer1 >= 0){

                suges[prev].classList.add('selected');            
            }
        }
        break;


        case 40: // down
        $('#output-jurusan').scrollTop(pointer1 * 42.6);
        suges[pointer1].classList.add('selected');
        if(pointer1 > 0){
            var prev = pointer1;
            prev--;
            suges[prev].classList.remove('selected');            
        }
        pointer1 = pointer1 + 1;
        break;


        default: 
        courseAjax();
        return; // exit this handler for other keys
    }
    e.preventDefault();
});

        function courseAjax(){
            var keyword = $('#keyword').val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url : "{{route('search-course-ajax')}}",
                method: "POST",
                data : {
                    _token : token,
                    keyword : keyword
                },success: function(data){
                    var arr_data = data.split('##');
                    if(arr_data[1] > 0 ){
                        $('#output-jurusan').html(arr_data[0]);
                    }else{
                        $('#output-jurusan').html("no result");
                    }
                },
                complete:function(data){
                 courseAjaxTimer = setTimeout(courseAjax,10000);
             },error: function(){
         //   alert('error');
     }

 });
        }

        function schoolAjax(){
           var keyword = $('#keywordSekolah').val();
           var token = $("input[name='_token']").val();
           $.ajax({
            url : "{{route('search-school-ajax')}}",
            method: "POST",
            data : {
                _token : token,
                keyword : keyword
            },success: function(data){
                console.log(data);
                var arr_data = data.split('##');
                if(arr_data[1] > 0 ){
                    $('#output-sekolah').html(arr_data[0]);
                }else{
                    $('#output-sekolah').html("no result");
                }
            },
            complete:function(data){
               schoolAjaxTimer = setTimeout(schoolAjax,10000);
           },error: function(){
         //   alert('error');
     }
 });
       }


       $('#keywordSekolah').keyup(function(e){
        clearTimeout(schoolAjaxTimer);

        var suges = document.getElementsByClassName('schoolSuggestion-list');
        switch(e.which) {
            case 13:
            var selected_pointer2 = pointer2 - 1;
            var id_sekolah = $(suges[selected_pointer2]).attr("data-value");
            var arr_sekolah = id_sekolah.split('|');
            //$('#id_sekolah').val(arr_sekolah[0]);
            $('#keywordSekolah').val(arr_sekolah[1]);
            $('.keyword-wrapper').hide();
            $('.schoolSuggestion-list').removeClass("selected");
            pointer2 = 0;
            break;


        case 38: // up
        if(pointer2 > 0){
            pointer2 = pointer2 - 1;
            var prev = pointer2;
            prev--; 
            $('#output-sekolah').animate({ // animate your right div
            scrollTop: suges[prev].offsetTop - 10 // to the position of the target 
            }, 300);
            suges[pointer2].classList.remove('selected');
            if(pointer2 >= 0){

                suges[prev].classList.add('selected');            
            }
        }
        break;


        case 40: // down  
    $('#output-sekolah').animate({ // animate your right div
            scrollTop: suges[pointer2].offsetTop - 10 // to the position of the target 
        }, 300);
   // $('#output-sekolah').scrollTop(pointer2 * 45);
    suges[pointer2].classList.add('selected');
    if(pointer2 > 0){
        var prev = pointer2;
        prev--;
        suges[prev].classList.remove('selected');            
    }
    pointer2 = pointer2 + 1;
    break;

    default: 
    schoolAjax();
        return; // exit this handler for other keys
    }
    e.preventDefault();
});  
   });

function pilih_suges(id_jurusan,nama_jurusan){
    $('#id_jurusan').val(id_jurusan);
    $('#keyword').val(nama_jurusan);
    $('.keyword-wrapper').hide();
    $('.suggestion-list').removeClass("selected");
    pointer1 = 0;
}
function pilih_sugesSekolah(id_sekolah,nama_sekolah){

   // $('#id_sekolah').val(id_sekolah);
   $('#keywordSekolah').val(nama_sekolah);
   $('.keyword-wrapper').hide();
   $('.schoolSuggestion-list').removeClass("selected");
   pointer2 = 0;

}
function cari(search_type) {

    $('.search_type').val(search_type);
    if(search_type == "course"){
        document.getElementById('myform').submit();
    }else{
        document.getElementById('myform2').submit();
    }
/*    var otherData = "";
    if (document.getElementById('keyword').value != "") {
        var keyword = document.getElementById('keyword').value;
        otherData += "?keyword=" + keyword;
    } else {
        var keyword = "";
    }
    var kode_negara = document.getElementById('negara').value;
    alert(kode_negara);
    if (kode_negara != "") {
        otherData += "&kode_negara=" + kode_negara;
    }
    var min_fee = document.getElementById('min_fee').value;
    if (min_fee != "") {
        otherData += "&min_fee=" + min_fee;
    }
    var max_fee = document.getElementById('max_fee').value;
    if (max_fee != "") {
        otherData += "&max_fee=" + max_fee;
    }
    location.href = "{{url('cari-sekolah/search')}}" + otherData;
    */
}


$(document).ready(function() {
    $('.slider-for div.slick-list').css({height: ''});
    $('.search-box').show();
    $('.slick-slider').slick({
        infinite: true,
        slidesToScroll: 3,
        slidesToShow: 3,
        lazyLoad: 'ondemand',
        autoplay: true,
        autoplaySpeed: 4500,
        arrows:false,
        responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow:1,
                slidesToScroll:1,
                arrows: false,
                adaptiveHeight: true,
                
            }
        }]
    });

});

var myslider = document.getElementById('myslider');
noUiSlider.create(myslider, {
    start: [20000, 60000],
    step: 1000,
    margin: 1000,
    behaviour: 'snap',
    connect: true,
    range: {
        'min': 0,
        'max': 900000000
    },
    format: {
        to: function(value) {
            return '$ ' + value;
        },
        from: function(value) {
            return value;
        }
    }
});
var snapValues = [
document.getElementById('slider-min'),
document.getElementById('slider-max')
];

myslider.noUiSlider.on('update', function(values, handle) {
    snapValues[handle].innerHTML = values[handle];
    min_array = values[0].split(' ');
    min_fee = min_array[1];

    document.getElementById('min_fee').value = min_fee;
    max_array = values[1].split(' ');
    max_fee = max_array[1];
    document.getElementById('max_fee').value = max_fee;

});
</script>
@endpush
