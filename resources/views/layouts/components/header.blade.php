<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        @guest
        @else
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pembayaran') }}" class="nav-link">Data Pembayaran</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/house-list') }}" class="nav-link">Data Rumah</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/penghuni-list') }}" class="nav-link">Data Penghuni</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/jenis-pembayaran') }}" class="nav-link">Jenis Pembayaran</a>
          </li>
        @endif
      </ul>
    </div>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto navbar-nav ms-auto">
        @guest
        @else
            <li class="nav-item">
              <a class="nav-link" href="#" style="cursor: default">{{ Auth::user()->name }}</a>
            </li>

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