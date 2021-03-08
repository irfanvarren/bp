<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-bottom: 0!important">
  <a class="p-2" href="{{url('')}}"><img src="{{asset('/img/logo_putih.png')}}" style="max-height:45px;" class="logo" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" >
        <a class="nav-link {{ Request::route()->getname() === 'home' ? 'active' : '' }}" href="{{ route('library-home') }}">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::route()->getname() === 'catalog' ? 'active' : '' }}" href="{{ route('library-catalog') }}">Catalog</a>
      </li>
    </ul>
  </div>


  <div class="d-block mx-auto my-3">
    <div class=col-md-12>
      <div class="d-flex justify-content-center ">
        <div class="searchbar" style="background-color: white">
          @csrf
          <input class="search_input" style="color: black" id="search_input" type="text" name="keyword" >
          <a onclick="Functionclick()" class="search_icon" id="search-btn"><i class="fas fa-search"></i></a>
        </div>
      </div>
      </div>
    </div>
</nav>