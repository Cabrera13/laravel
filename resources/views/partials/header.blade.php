<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">Book Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    @guest
      <li><a href="{{route('shop')}}"><i class="fa fa-shopping-cart"></i> Cart <span class='badge'>{{Session::has('cart') ? Session::get('cart')->getTotalProductsNumber() : ''}}</span></a>
      </li>
      <a class="nav-item nav-link" href="{{route('login')}}">Login</a>
      <a class="nav-item nav-link" href="{{route('register')}}">Register</a>
    </div>    
    @else
    <li><a href="{{route('shop')}}"><i class="fa fa-shopping-cart"></i> Cart <span class='badge'>{{Session::has('cart') ? Session::get('cart')->getTotalProductsNumber() : ''}}</span></a></li>
      <a class="nav-item nav-link" href="{{route('logout')}}">Log Out</a>
    @endif
  </div>
</nav>
