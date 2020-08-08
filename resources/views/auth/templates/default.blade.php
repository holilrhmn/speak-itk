<!DOCTYPE html>
<html>

<head>
    <title>Masuk Lapor ITK</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login-itk/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('landing-page/css/drag.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('landing-page/images/logo-01.png') }}" width="160" height="30" class="d-inline-block align-top" alt="">

          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" style="color:black; font-size:28px;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" style="color:black" href="{{ route('homepage') }}">Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:black"  href="#">Tentang Lapor</a>
            </li>
          </ul>
        </div>
      </nav>
    @yield('content')
    <script type="text/javascript" src="{{ asset('login-itk/js/main.js') }}}}"></script>
    @include('frontend.templates.partials.scripts')
</body>

</html>
