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
            <a href="{{route('ppid.dashboard')  }}" class="nav-link {{ Route::currentRouteNamed('ppid.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashboard

              </p>
            </a>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>
                    Manajemen Laporan
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('ppid.laporan.index') }}" class="nav-link {{ Route::currentRouteNamed('ppid.laporan.index') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ppid.laporan.complete') }}" class="nav-link {{ Route::currentRouteNamed('ppid.laporan.complete') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Terselesaikan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ppid.laporan.notComplete') }}" class="nav-link {{ Route::currentRouteNamed('ppid.laporan.notComplete') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Belum selesai</p>
                    </a>
                  </li>
                </ul>
            </li>
          <li class="nav-item">
            <a href="{{ route('ppid.category.index') }}" class="nav-link {{ Route::currentRouteNamed('ppid.category.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ppid.laporan.informasi') }}" class="nav-link {{ Route::currentRouteNamed('ppid.laporan.informasi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-filter"></i>
              <p>Filter Laporan</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
