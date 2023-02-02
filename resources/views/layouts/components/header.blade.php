<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        @guest
          @else
            <li class="nav-item">
              <a href="{{ url('/payment-list') }}" class="nav-link">Data Bulanan Air</a>
            </li>
            @if ((Auth::user()->role !== 'user') && (Auth::user()->role === 'casher'))
              <li class="nav-item">
                <a href="{{ url('/casher') }}" class="nav-link">Kasir</a>
              </li>
            @elseif ((Auth::user()->role !== 'user') && (Auth::user()->role === 'noted'))
              <li class="nav-item">
                <a href="{{ url('/water-noted') }}" class="nav-link">Pencatatan Meteran</a>
              </li>
            @endif
        @endguest
      </ul>
    </div>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto navbar-nav ms-auto">
        @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                Login
                <i class="fas fa-sign-in-alt mx-2"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="nav-item">
              <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>

            @if ((Auth::user()->role === 'admin'))
              <li class="nav-item">
                <a href="{{ url('/admin') }}" class="nav-link">Admin</a>
              </li>
            @endif

            <li class="nav-item">   
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
                <i class="fas fa-sign-out-alt mx-2"></i>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
        @endguest
    </ul>
  </div>
</nav>