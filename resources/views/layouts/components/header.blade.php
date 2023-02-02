<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        @if (session('status'))
          <li class="nav-item">
            <a href="{{ url('/payment-list') }}" class="nav-link">Data Bulanan</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/casher') }}" class="nav-link">Kasir Page</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/water-noted') }}" class="nav-link">Pencatatan Meteran</a>
          </li>
        @endif
      </ul>
    </div>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto navbar-nav ms-auto">
        @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="nav-item">
              <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">   
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
        @endguest
    </ul>
  </div>
</nav>