<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ asset('/') }}dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center"
        href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      >	
        Logout
        <i class="fas fa-sign-out-alt mx-2"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </li>
  </ul>
</nav>