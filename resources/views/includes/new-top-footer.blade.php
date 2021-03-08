<div class="top-footer row">
  <div class="col-md-12">
    <div class="row ">
      <div class="col-md-6 col-lg-5">
        <ul class="top-footer-nav ">
          <li>
            <a class="footer-title" href="javascript::void(0)">About Best Partner</a>
            <div class="row">
              <div class="col-md-6">
                <ul class="subnav">
                  <li>
                    <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{url('')}}">Home</a>
                  </li>
                  <li>
                    <a class="{{ Request::is('about_us') ? 'active' : '' }}" href="{{url('/about_us')}}">About</a>
                  </li>
                  <li>
                    <a class="{{ Request::is('study_abroad') ? 'active' : '' }}" href="{{url('/study-abroad')}}">Studying Abroad</a>
                  </li>

                  <li><a class="{{ Request::is('media') ? 'active' : '' }}" href="#">Media</a>

                  </li>
                  <li class="dropdown"><a class="{{ Request::is('contact_us') ? 'active' : '' }}" href="/contact_us">Contact Us</a>
                    <div class="dropdown-content">
                      <span><a href="/careers">Careers</a></span>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="subnav">
                  <li><a href="/media/news">News</a></li>
                  <li><a href="/media/info-lowker">Info Lowker</a></li>
                  <li><a href="/media/promo">Promo</a></li>
                  <li><a href="/media/beasiswa">Beasiswa</a></li>
                  <li> <a href="/media/events">Events</a></li>
                  <li> <a href="/media/testimony">Testimony</a></li>
                </ul>
              </div>
            </div>

          </li>

          <li class="pl-5">
            <a href="{{url('/products')}}" class="footer-title {{ Request::is('products') ? 'active' : '' }}">Products</a>
            <ul class="subnav">

              <li>
                <a href="/products/language/english/ielts-class">IELTS Class</a>
              </li>
              <li>
                <a href="/products/language/english/toefl-class">TOEFL Class</a>
              </li>
              <li>
                <a href="/products/language/english/bep">BEP - General English Class</a>
              </li>
            </ul>
            <div>
              <a href="{{url('/products')}}">Click to show more...</a>
            </div>
            <ul class="subnav" style="display: none;" id="subnav-more-product">
              <li>
                <a href="/products/language/english/young-learners">Young Learners</a>
              </li>
              <li>
                <a href="/products/language/english/gmat">GMAT</a>
              </li>
              <li>
                <a href="/products/language/english/gre">GRE</a>
              </li>
              <li> 
                <a href="/products/language/english/sat">SAT</a>
              </li>
              <li> 
                <a href="/products/language/english/pte">PTE</a>
              </li>

              <li class="dropdown">
                <a href="/products/ielts-test">IELTS Test</a>
                <ul class="submenu">
                  <li> <a href="/products/ielts-test/simulation">Simulation </a> </li>
                  <li> <a href="/products/ielts-test/official">Official</a> </li>
                </ul>

              </li>
              <li class="dropdown">
                <a href="/products/toefl-test">TOEFL ITP Test </a>
                <ul class="submenu" style="margin-top:95px;">
                  <li> <a href="/products/toefl-test/simulation">Simulation</a> </li>
                  <li> <a href="/products/toefl-test/official">Official</a> </li>
                </ul>

              </li>
              <li class="dropdown">
                <a href="#">PTE Academic</a>
                <ul class="submenu" style="margin-top:142px;">
                  <li> <a href="/products/pte-academic/simulation">Simulation</a> </li>
                  <li> <a href="/products/pte-academic/official">Official</a> </li>
                </ul>

              </li>
              <li><a href="/products/bept">BEPT</a></li>
              <li><a href="/products/tips-belajar">Tips Belajar</a></li>
              <li> <a href="/products/tax-claim">Tax Claim</a> </li>
              <li> <a href="/products/claim-insurance">Claim Insurance</a> </li>
            </ul>
          </li>

        </ul>
      </div>
      <div class="col-md-6 col-lg-7">
        <div class="row h-100">
          <div class="col-lg-6">
          <div class="col-md-12" style="text-align:center">
            <h4 class="footer-title" style="margin-bottom:15px;">Subscribe To Our Newsletter: </h4>

          </div>
          <div class="col-md-12">
            <form action="{{route('subscribe-newsletter')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-12 newsletter-input-wrapper">
                  <input type="text" class="form-control" name="email" placeholder="Email Address">  
                  <button type="submit" class="btn btn-primary col-md-12" style="position: absolute;top: 15%;right: 20px;width: 100px;height: 75%;line-height: 1">Subscribe</button>
                </div>
              </div>  
            </form>            
          </div>
          <div class="col-md-12 sosmed-wrapper">
            <a class="logo-sosmed" href="https://wa.me/085815139224" target="_BLANK"> <i class="fa fa-whatsapp"></i></a>
            <a class="logo-sosmed" href="https://www.facebook.com/bestpartnereducation/" target="_BLANK"> <i class="fa fa-facebook "></i></a>
            <a class="logo-sosmed" href="https://www.instagram.com/bestpartnereducation/" target="_BLANK"> <i class="fa fa-instagram "></i></a>
            <a class="logo-sosmed" href="https://www.youtube.com/channel/UCicDSptmlROwc3B6kYEbUjw" target="_BLANK"> <i class="fa fa-youtube-play "></i></a>
            <a href="https://vt.tiktok.com/ZStY1DHb/" class="logo-sosmed" target="_BLANK">
              <i class="fab fa-tiktok logo-sosmed"></i>
            </a>
          </div>
          </div>
          <div class="col-lg-6 map-wrapper">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.818000937931!2d109.32262601475328!3d-0.022926199983269144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d58f6b4ce8ba3%3A0x2135d78ecb306a81!2sLes+Bahasa+Inggris+(Best+Partner+Education)!5e0!3m2!1sen!2sid!4v1564730700383!5m2!1sen!2sid"  frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>