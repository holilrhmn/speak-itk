<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('landing-page/images/Speak-01.png') }}" width="160" height="30" class="d-inline-block align-top" alt="">

          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" style="color: black" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" style="color:black; font-size:28px;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('homepage') }}"> <b> Beranda </b> <span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#"> <b>Tentang Lapor </b></a>
            </li> --}}
          </ul>

            @guest
            <a href="{{ route('login') }}" type="button" id="tombol-navbar" class="btn btn-outline-primary">Masuk</a>

            {{-- <a href="{{ route('register') }}" type="button" id="tombol-navbar2" class="btn btn-primary" style="color:white; margin-left:9px;">Daftar</a> --}}
            @else
            <li class="nav-item dropdown">

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    {{ Auth::user()->name }} <span class="caret"></span>

                </a>


                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (auth()->user()->hasRole('Admin'))
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}" >Dashboard</a>
                    @elseif(auth()->user()->hasRole('PPID'))
                        <a class="dropdown-item" href="{{ route('ppid.dashboard') }}" >Dashboard</a>
                    @elseif(auth()->user()->hasRole('Unit-Kerja'))
                        <a class="dropdown-item" href="{{ route('unit.dashboard') }}" >Dashboard</a>
                    @else
                        <a class="dropdown-item" href="{{ route('home') }}" >Dashboard</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"

                       onclick="event.preventDefault();

                                     document.getElementById('logout-form').submit();">

                        {{ __('Logout') }}

                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf

                    </form>
                @endguest

        </div>
      </nav>
</div>
