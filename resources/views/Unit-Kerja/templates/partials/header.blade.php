<nav class="main-header navbar navbar-expand navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('homepage') }}" class="nav-link">Halaman Utama</a>
        </li>
      </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img style="height:35px"src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"/>
        {{-- <span class="hidden-xs">{{ auth()->user()->name }}</span> --}}
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
            <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"/>

          <p>
            {{ auth()->user()->name }}
          </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="btn-group-vertical btn-block">
                <a href="{{ route('unit.edit.profil') }}" class="btn btn-block btn-outline-info">Edit Profil</a>


                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    class="btn btn-block btn-outline-danger">Keluar</a>
              </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </li>
    </ul>
  </nav>
