@include('users.templates.partials.head')

<body>
    @include('users.templates.partials.sidebar')
        <!-- Page Content  -->
        <div id="content">
            <!--Nav-->
            @include('users.templates.partials.nav')
            @yield('content')
        </div>
    </div>
    @include('users.templates.partials.footer')
    @include('users.templates.partials.scripts')
</body>

</html>
