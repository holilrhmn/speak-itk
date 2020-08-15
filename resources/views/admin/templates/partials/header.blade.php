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
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                @foreach ($userNotif as $notification )
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Pelapor
                    </h3>
                    <p class="text-sm">{{$notification->data['comment']}} </p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                  </div>
                <!-- Message End -->
              </a>
              @endforeach
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Komentar</a>
            </div>

        </li> --}}
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            @foreach (auth()->user()->notifications as $notification )
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">1</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-comment mr-2">{{ $notification->laporan['laporan'] }}</i>
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Laporan Yang Masuk</a>
              @endforeach
            </div>
          </li> --}}
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img style="height:35px" src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"/>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
            <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"/>
          <p>
            {{ auth()->user()->name }}
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ route('admin.edit.profil') }}" >Edit Profil</a>
            </div>
          <div class="pull-right">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                class="btn btn-block btn-default btn-flat">Keluar</a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </li>
    </ul>
  </nav>
