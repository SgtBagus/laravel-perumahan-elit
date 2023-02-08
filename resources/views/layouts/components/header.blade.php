<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        @guest
        @else
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
          </li>
          @if ((Auth::user()->role !== 'user') && (Auth::user()->role === 'casher'))
            <li class="nav-item">
              <a href="{{ url('/casher') }}" class="nav-link">Kasir</a>
            </li>
          @elseif ((Auth::user()->role !== 'user') && (Auth::user()->role === 'noted'))
            <li class="nav-item">
              <a href="{{ url('/noted') }}" class="nav-link">Pencatatan Meteran</a>
            </li>
          @endif
        @endif
      </ul>
    </div>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto navbar-nav ms-auto">
        @guest
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