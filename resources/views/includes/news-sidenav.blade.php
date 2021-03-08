
    <div class="col-md-4" style="background-color:#f9f9f9;padding: 15px;">
      <div class="col-md-12" style="padding:15px;">
        <h4 style="margin-bottom:0;">POST LAINNYA</h4>
      </div>
      <div class="col-md-12">
        @if($new_news->count())
        <div class="row">
          @foreach($new_news as $key => $value)
          @php
          if($value->type_id == 1){
          $link = "news";
          }else{
          $link = "info-lowker";
          }
        

          @endphp
          <div class="col-md-12" style="padding:0px;background:white;border-right:4px solid blue;margin-bottom:15px;">
            <a href="{{url('media/'.$link.'/'.date('Y/m',strtotime($value->created_at)).'/'.$value->slug)}}" style="display: block;color:black;">
              <div class="col-md-12">

                <!-- Gambar Disebelah Kiri -->
                <div style="width:110px;float:left;">
                  <div style="width:100%;height:90px;overflow:hidden;background-image:url('{{Storage::disk('news')->url($value->image)}}');background-size:cover;background-position: center;">           
                  </div>
                </div>
                <div style="padding:8px 12px;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;width:calc(100% - 110px);float:left;">
                  <div style="line-height:1.8em;max-height:3.6em;overflow: hidden;border-bottom:1px solid #dedede">
                    {{$value->title}}
                  </div>
                  <div style="color:gray;font-size:12px;">
                    {{date("l, d F Y",strtotime($value->created_at))}}
                  </div>
                </div>

              </div>
            </a>
          </div>

          @endforeach
        </div>
        @else
        No Recent Post !
        @endif
      </div>
    </div>
<!--
<div class="col-md-4 sidebar">
    <div class="row">

        <div class="col-md-12">
          <h3>Newest News</h3>
          <hr class="news-line" style="width:inherit;">
      </div>
      @foreach ($new_news as $data_new_news)

      <div class="class-sidebar-content col-md-12">
          <a href="{{url("media/promo/".$data_new_news->created_at->format("Y/m/").$data_new_news->slug)}}">
              <div class="row">
                  <div class="col-md-8 class-sidebar-desc">
                    {{ucwords(str_limit($data_new_news->title,42))}}
                </div>
                <div class="col-md-4 class-sidebar-img">
                    <img src="{{Storage::disk('news')->url($data_new_news->image)}}">
                </div>
            </div>
        </a>
    </div>

    @endforeach
</div>
</div>
-->