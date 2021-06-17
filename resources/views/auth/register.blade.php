<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">`
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register - Listrk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{ asset('forlogin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('forlogin/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('forlogin/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="forlogin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            <i class="ti-user"></i>
                            <div class="text-danger">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <i class="ti-email"></i>
                            <div class="text-danger">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <i class="ti-lock"></i>
                            <div class="text-danger">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="nomor_kwh">Nomor KWH</label>
                            <input id="nomor_kwh" type="text" class="@error('nomor_kwh') is-invalid @enderror" name="nomor_kwh" value="{{ old('nomor_kwh') }}" required autocomplete="nomor_kwh">
                            <i class="ti-pulse"></i>
                            <div class="text-danger">
                                @error('nomor_kwh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input id="nama_pelanggan" type="text" class="@error('nama_pelanggan') is-invalid @enderror" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required autocomplete="nama_pelanggan">
                            <i class="ti-id-badge"></i>
                            <div class="text-danger">
                                @error('nama_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" type="text" class="@error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                            <i class="ti-home"></i>
                            <div class="text-danger">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="id_tarif"></label>
                            {{-- <input type="text" id="id_tarif" class="@error('id_tarif') is-invalid @enderror"> --}}
                            <select name="id_tarif" id="id_tarif" class="form-control custom-select-lg">
                                <option class="disabled">=Pilih Daya=</option>
                                @foreach ($tarif as $t)
                                    <option value="{{ $t->id }}">{{ $t->daya }} Watt - Rp. {{ number_format($t->tarifperkwh) }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_tarif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Already have account? <a href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('forlogin/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('forlogin/js/popper.min.js') }}"></script>
    <script src="{{ asset('forlogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('forlogin/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('forlogin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('forlogin/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('forlogin/js/jquery.slicknav.min.js') }}"></script>
    
    <!-- others plugins -->
    <script src="{{ asset('forlogin/js/plugins.js') }}"></script>
    <script src="{{ asset('forlogin/js/scripts.js') }}"></script>
</body>

</html>