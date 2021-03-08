<div class="col-md-2 logo-wrapper">
    <a href="/">
        <img src="{{asset('/img/logo lama.png')}}" class="logo" >
    </a>
</div>

<div class="col-md-10 nav-wrapper">
    <ul class="nav">
        <li>
            <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{url('')}}">Home</a>
        </li>
        <li>
            <a class="{{ Request::is('about_us') ? 'active' : '' }}" href="{{url('/about_us')}}">About</a>
        </li>
        <li>
            <a class="{{ Request::is('study_abroad') ? 'active' : '' }}" href="{{url('/study-abroad')}}">Studying Abroad</a>
        </li>
        <li class="dropdown">
            <a href="{{url('/products')}}" class="{{ Request::is('products') ? 'active' : '' }}">Products</a>
            <div class="dropdown-content dropdown-content2">
                <span class="dropdown" href="#"><a href="/products/language">Language</a>
                    <ul class="submenu">
                        <li class="dropdown2"><a href="/products/language/english">English</a>
                            <ul class="submenu" style="column-count:1;">
                                <li>
                                    <a href="/products/language/english/ielts-class">IELTS Class</a>
                                </li>
                                <li>
                                    <a href="/products/language/english/toefl-class">TOEFL Class</a>
                                </li>
                                <li>
                                    <a href="/products/language/english/bep">BEP - General English Class</a>
                                </li>
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
                            </ul>
                        </li>
                        <li><a href="/products/language/mandarin">Mandarin</a></li>
                        <li><a href="/products/language/french">French</a></li>
                        <li><a href="/products/language/german">German</a></li>
                        <li><a href="/products/language/korean">Korean</a></li>
                        <li><a href="/products/language/jaanese">Japanese</a></li>
                    </ul>
                </span>
                <span class="dropdown">
                    <a href="/products/ielts-test">IELTS Test</a>
                    <ul class="submenu">
                        <li> <a href="/products/ielts-test/simulation">Simulation </a> </li>
                        <li> <a href="/products/ielts-test/official">Official</a> </li>
                    </ul>

                </span>
                <span class="dropdown">
                    <a href="/products/toefl-test">TOEFL ITP Test </a>
                    <ul class="submenu" style="margin-top:95px;">
                        <li> <a href="/products/toefl-test/simulation">Simulation</a> </li>
                        <li> <a href="/products/toefl-test/official">Official</a> </li>
                    </ul>

                </span>
                 <span class="dropdown">
                    <a href="#">PTE Academic</a>
                    <ul class="submenu" style="margin-top:142px;">
                        <li> <a href="/products/pte-academic/simulation">Simulation</a> </li>
                        <li> <a href="/products/pte-academic/official">Official</a> </li>
                    </ul>

                </span>
                <span><a href="/products/bept">BEPT</a></span>
                <span><a href="/products/tips-belajar">Tips Belajar</a></span>
                <span> <a href="/products/tax-claim">Tax Claim</a> </span>
                <span> <a href="/products/claim-insurance">Claim Insurance</a> </span>
            </div>
        </li>

        <li class="dropdown"><a class="{{ Request::is('media') ? 'active' : '' }}" href="#">Media</a>
            <div class="dropdown-content">
                <span><a href="/media/news">News</a></span>
                <span><a href="/media/info-lowker">Info Lowker</a></span>
                <span><a href="/media/promo">Promo</a></span>
                <span><a href="/media/beasiswa">Beasiswa</a></span>
                <span> <a href="/media/events">Events</a></span>
                <span> <a href="/media/testimony">Testimony</a></span>
            </div>
        </li>
        <li class="dropdown"><a class="{{ Request::is('contact_us') ? 'active' : '' }}" href="/contact_us">Contact Us</a>
            <div class="dropdown-content">
                <span><a href="/careers">Careers</a></span>
            </div>
        </li>

    </ul>


    <div class="mobile-nav">
        <a href="#menu" onclick="mobile_menu(this)" class="menu-link active">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </a>
        <nav id="menu" class="menu">
            <ul class="level-1">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/about_us">About</a>
                </li>
                <li>
                    <a href="/study-abroad">Studying Abroad</a>
                </li>
                <li>
                    <a href="/products">Products</a>
                    <span class="has-subnav">&#x25BC;</span>
                    <ul class="wide level-2">
                        <li><a href="/products/language">Language</a><span class="has-subnav">&#x25BC;</span>
                            <ul class="level-3" style="padding-left:15px;">
                                <li><a href="/products/language/english">English</a><span class="has-subnav">&#x25BC;</span>
                                    <ul class="level-4" style="padding-left:15px;">
                                        <li><a href="/products/language/english/ielts-class">IELTS Class</a></li>
                                        <li><a href="/products/language/english/toefl-class">TOEFL Class</a></li>
                                        <li><a href="/products/language/english/bep">BEP - Best English Programme</a></li>
                                        <li><a href="/products/language/english/young-learners">Young Learners</a></li>
                                        <li><a href="/products/language/english/gmat">GMAT</a></li>
                                        <li><a href="/products/language/english/gre">GRE</a></li>
                                        <li> <a href="/products/language/english/sat">SAT</a> </li>
                                    </ul>
                                </li>
                                <li><a href="/products/language/mandarin">Mandarin</a></li>
                                <li><a href="/products/language/french">French</a></li>
                                <li><a href="/products/language/german">German</a></li>
                                <li><a href="/products/language/korean">Korean</a></li>
                                <li><a href="/products/language/japanese">Japanese</a></li>
                            </ul>
                        </li>
                        <li><a href="/products/ielts-test">IELTS Test</a>  <span class="has-subnav">&#x25BC;</span>
                            <ul class="level-3" style="padding-left:15px;">
                                <li><a href="/products/ielts-test/simulation">Simulation</a></li>
                                <li><a href="/products/ielts-test/official">Official</a></li>
                            </ul>
                        </li>
                        <li><a href="/products/toefl-test">TOEFL ITP Test</a> <span class="has-subnav">&#x25BC;</span>
                            <ul class="level-3" style="padding-left:15px;">
                                <li><a href="/products/toefl-test/simulation">Simulation</a></li>
                                <li><a href="/products/toefl-test/official">Official</a></li>
                            </ul>
                        </li>
                        <li><a href="#">PTE Academic</a> <span class="has-subnav">&#x25BC;</span>
                            <ul class="level-3" style="padding-left:15px;">
                                <li><a href="/products/pte-academic/simulation">Simulation</a></li>
                                <li><a href="/products/pte-academic/official">Official</a></li>
                            </ul>
                        </li>
                        <li><a href="/products/bept">BEPT</a></li>
                        <li><a href="/products/tips-belajar">Tips Belajar</a></li>
                        <li> <a href="/products/tax-claim">Tax Claim</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#">Media</a>
                    <span class="has-subnav">&#x25BC;</span>
                    <ul class="level-2">
                        <li><a href="/media/news">News</a></li>
                        <li><a href="/media/info-lowker">Info Lowker</a></li>
                        <li><a href="/media/promo">Promo</a></li>
                        <li><a href="/media/beasiswa">Beasiswa</a></li>
                        <li><a href="/media/events">Events</a></li>
                        <li><a href="/media/testimony">Testimony</a></li>

                    </ul>
                </li>
                <li>
                    <a href="/contact_us">Contact Us</a> <span class="has-subnav">&#x25BC;</span>
                    <ul class="level-2">
                        <li><a href="/careers">Careers</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>

