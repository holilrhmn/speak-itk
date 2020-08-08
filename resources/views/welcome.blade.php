<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.templates.partials.head')
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    {{-- <header class="header-area header-sticky static">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="landing-page/images/logo-01.png" height="43px" alt="Softy Pinko" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li>
                                <a href="#features" class="tentang"> <b>Tentang Lapor</b></a>
                            </li>
                            <li>
                                <button type="button" id="tombol-navbar" class="btn btn-outline-primary">Masuk</button>
                            </li>
                        </ul>

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header> --}}
    @include('frontend.templates.partials.navbar')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    @include('frontend.templates.partials.header')
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    @include('frontend.templates.partials.laporan')

    <!-- ***** Alur ***** -->

    <!-- ***** Alur End ***** -->
    @include('frontend.templates.partials.alur')
    <!-- ***** Counter Parallax Start ***** -->
    @include('frontend.templates.partials.counter')
    <!-- ***** Counter Parallax End ***** -->

    <!-- ***** Footer Start ***** -->
    @include('frontend.templates.partials.footer')

    <!-- scripts-->

    @include('frontend.templates.partials.scripts')
    <script src="{{ asset('assets/plugins/bs-notify.min.js')}}"></script>
    @include('frontend.templates.partials.alerts')

</body>

</html>
