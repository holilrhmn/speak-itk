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
            <a href="{{route('admin.dashboard')  }}" class="nav-link {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashboard

              </p>
            </a>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Manajemen User
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::currentRouteNamed('admin.user.index') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Users</p>
                    </a>
                  </li>
                  <li class="nav-item" >
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roles</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
    </div>
  </aside>
