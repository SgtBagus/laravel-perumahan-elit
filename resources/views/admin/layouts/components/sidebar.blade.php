<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ asset('/') }}admin/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('/') }}admin/water-payment/" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Water Payment List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('/') }}admin/nominal-value/" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>Nominal Value</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('/') }}admin/user-list/" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>User List</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>