<div class="top-footer row">
    <div class="col-md-12" style="margin-bottom:15px">
        <div class="row justify-content-center">
         <div class="col-md-7">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align:center">
                  <h4 style="margin-bottom:15px;">Subscribe To Our Newsletter: </h4>

              </div>
              <div class="col-md-12">
                <form action="{{route('subscribe-newsletter')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-9 newsletter-input-wrapper">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">  
                    </div>
                    <div class="col-md-3 newsletter-subscribe-wrapper">
                        <div class="row form-group">
                          <button type="submit" class="btn btn-primary col-md-12">Subscribe</button>
                      </div>
                  </div>
              </div>  
              </form>            
          </div>
      </div>
  </div>
</div>
</div>
<div class="col-md-12">
  <div class="row justify-content-center">
<div class="top-footer-left col-md-7">
    @if($footer != "")
    {!! $footer->content !!}
    @endif
    <!--
    <nav class="col-md-12">
        <a href="../">Home</a> |
        <a href="/about_us">About</a> |
        <a href="/studying_abroad">Studying Abroad</a> |
        <a href="/products">Products & Services</a> |
        <a href="/news">Media</a> |
        <a href="/contact_us">Contact Us</a> |
    </nav>
  -->
    <div class="col-md-12 sosmed-wrapper">
        <h5><i class="fa fa-arrow-down" aria-hidden="true"></i> Click Me !</h5>
        <a class="logo-sosmed" href="https://wa.me/085815139224" target="_BLANK"> <i class="fa fa-whatsapp"></i></a>
        <a class="logo-sosmed" href="https://www.facebook.com/bestpartnereducation/" target="_BLANK"> <i class="fa fa-facebook "></i></a>
        <a class="logo-sosmed" href="https://www.instagram.com/bestpartnereducation/" target="_BLANK"> <i class="fa fa-instagram "></i></a>
        <a class="logo-sosmed" href="https://www.youtube.com/channel/UCicDSptmlROwc3B6kYEbUjw" target="_BLANK"> <i class="fa fa-youtube-play "></i></a>
    </div>
</div>
@if(Request::url() !== url('contact_us'))
<div class="top-footer-left col-md-4" >
    <p><i class="fa fa-map-marker" aria-hidden="true"></i>  Best Partner Education - Pontianak</p>
    <p>Jl. Prof Dr. Hamka No 29 – 30 (Depan Gg. Nilam 3), Sungai Jawi, Kota Pontianak, Kalimantan Barat 78115,
Indonesia</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i>  Open Hours</p>
    <p>Senin - Jumat 08:00 - 21:00</p>
    <p>Sabtu         08:00 - 21:00</p>
    <p><i class="fa fa-phone" aria-hidden="true"></i> Nomor Telefon</p>
    <p>(0561) 8172583</p>
</div>
@endif
</div>
</div>


</div>
