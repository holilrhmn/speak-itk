<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('landing-page/images/logo-itk.png') }}"
           style="height:100px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('unit.dashboard')  }}" class="nav-link {{ Route::currentRouteNamed('unit.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashboard

              </p>
            </a>
          <li class="nav-item">

                <a href="{{ route('unit.laporan.index') }}" class="nav-link {{ Route::currentRouteNamed('unit.laporan.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comments"></i>
                <p>Laporan</p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
