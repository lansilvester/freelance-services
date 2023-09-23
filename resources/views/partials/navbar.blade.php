<h1 class="logo me-auto"><a href="/">JASA MANADO</a></h1>
<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
      <li><a class="nav-link scrollto" href="#about">About</a></li>
      <li><a class="nav-link scrollto" href="#layanan">Kategori</a></li>
      <li><a class="nav-link scrollto" href="http://127.0.0.1:8000/service_home">Layanan</a></li>
      @auth
      <li class="dropdown"><a href="#" class="getstarted" style="text-transform: capitalize"><i class="bi bi-person fs-3"></i> &nbsp;&nbsp;&nbsp;<span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="{{ route('profile.show',Auth::user()->id) }}"><span><i class="bi bi-person-circle"></i> &nbsp;Profile</a></span></li>
          @if(Auth::user()->role == 'admin_vendor' || Auth::user()->role == 'super_admin')
          <li><a target="__blank" href="{{ route('dashboard.index') }}"><span> <i class="bi bi-layout-text-sidebar"></i> &nbsp;Dashboard</span></a></li>
          @endif
          <li><a href="{{ route('logout') }}"><span><i class="bi bi-arrow-bar-left"></i> &nbsp;Logout</a></span></li>
        </ul>
      </li>
      @endauth
      @if(!Auth::user())
        <li><a class="getstarted" target="__blank" href="{{ route('register') }}">Mendaftar</a></li>
        <li><a class="getstarted scrollto" target="__blank" href="{{ route('login') }}">Login</a></li>
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
