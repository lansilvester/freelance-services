<h1 class="logo me-auto"><a href="/">Freelance</a></h1>
<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
      <li><a class="nav-link scrollto" href="#about">About</a></li>
      <li><a class="nav-link scrollto" href="#layanan">Layanan</a></li>
      <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="#">Drop Down 1</a></li>
          <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="#">Deep Drop Down 1</a></li>
              <li><a href="#">Deep Drop Down 2</a></li>
              <li><a href="#">Deep Drop Down 3</a></li>
              <li><a href="#">Deep Drop Down 4</a></li>
              <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#">Drop Down 2</a></li>
          <li><a href="#">Drop Down 3</a></li>
          <li><a href="#">Drop Down 4</a></li>
        </ul>
      </li>
      @auth
      <li><a class="getstarted scrollto" target="__blank" href="{{ route('dashboard.index') }}">Dashboard</a></li>
      @endauth
      @if(!Auth::user())
      <li><a class="getstarted scrollto" target="__blank" href="{{ route('login') }}">Login</a></li>
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
