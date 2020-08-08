<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('images/basket.png') }}" type="image/x-icon"/>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            font-family: 'Quicksand', sans-serif;
        }
        .btn-google {
    color: #545454;
    background-color: #ffffff;
    box-shadow: 0 1px 2px 1px #ddd
}

.or-container {
    align-items: center;
    color: #ccc;
    display: flex;
    margin: 25px 0
}

.line-separator {
    background-color: #ccc;
    flex-grow: 5;
    height: 1px
}
.or-label {
    flex-grow: 1;
    margin: 0 15px;
    text-align: center
}

    </style>
</head>

<body style="background-color: #e2e8f0;">
    @include('layouts.app')
    <div class="container mt-1">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('login-itk/img/logo-itk.png') }}" style="width: 150px">
                    <h4 class="font-weight-bold mt-2">Sistem Informasi Pengaduan Aspirasi Kampus ITK</h4>
                </div>
                <div class="card border-0 shadow rounded-lg mb-3" style="width: auto">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email Address">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12"> <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" style="font-size: 15px"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
                                Masuk</div>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">LOGIN</button> --}}
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                            </a>
                            @endif
                        </form>
                        <div class="or-container">
                            <div class="line-separator"></div>
                            <div class="or-label">or</div>
                            <div class="line-separator"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"> <a class="btn btn-lg btn-google btn-block waves-effect btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Masuk Dengan Google</a> </div>
                        </div> <br>
                        <p class="text-inverse text-center">Belum Memiliki Akun? <a href="{{ route('register') }}" data-abc="true">Daftar</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
</body>

</html>
