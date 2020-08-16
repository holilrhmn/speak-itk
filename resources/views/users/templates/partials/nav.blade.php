<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-align-left"></i>

        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img style="height:50px"src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"/>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                  <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"/>

                  <p style="color: white">
                    {{ auth()->user()->name }}
                  </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="btn-group-vertical btn-block">
                        <a href="{{ route('edit.profil') }}" class="btn btn-block btn-outline-info">Edit Profil</a>


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
        </div>
    </div>
</nav>
