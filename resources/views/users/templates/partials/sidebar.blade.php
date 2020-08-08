<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>SPEAK ITK</h3>
            <strong>ITK</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}">
                <a  style="color:white" href="{{ route('home') }}">
                    <i class="fa fa-briefcase"></i>
                    Dashboard
                </a>
            </li>
            <li class="{{ Route::currentRouteNamed('lapor') ? 'active' : '' }}">
                <a style="color:white" href="{{ route('lapor') }}">
                    <i class="fa fa-book"></i>
                    Laporan
                </a>
            </li>
            <li>
                <a style="color:white" href="{{ Route('homepage') }}">
                    <i class="fa fa-home"></i>
                    Homepage
                </a>
            </li>
            <li>
                <a style="color:white" href="{{ route('logout') }}" role="button" aria-pressed="true" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            class=""><i class="fa fa-sign-out" aria-hidden="true"></i>Keluar</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
        </ul>

    </nav>
