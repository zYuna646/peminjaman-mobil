<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('style/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('style/assets/img/logo_bi.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('style/assets/vendor/fonts/materialdesignicons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('style/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('style/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('style/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <span style="color: #9055fd">
                                    <img style="width: 30px; height: 30px;" src="{{ asset('style/assets/img/logo_bi.png') }}"
                                        alt="Logo Peminjaman Mobil" class="app-brand-logo demo">
                                </span>
                            </span>
                            <span class="app-brand-text demo text-heading fw-semibold">Peminjaman Mobil</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-2">
                        <h4 class="mb-2">Selamat Datang! 👋</h4>
                        <p class="mb-4">Silahkan Masuk Menggunakan Akun Anda</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ Session::get('email') }}" placeholder="Masukan email atau username anda"
                                    autofocus />
                                <label for="email">Email Atau Username</label>
                                <div class="text-danger" id="email-error"></div>
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <label for="password">Password</label>
                                            <div class="text-danger" id="password-error"></div>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Selalu Masuk </label>
                                </div>
                                <a href="{{ route('forget') }}" class="float-end mb-1">
                                    <span>Lupa Password?</span>
                                </a>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ implode('<br>', $errors->all()) }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                            </div>
                        </form>

                        <script>
                            function validateForm() {
                                var email = document.getElementById("email").value;
                                var password = document.getElementById("password").value;
                                var emailError = document.getElementById("email-error");
                                var passwordError = document.getElementById("password-error");

                                emailError.innerHTML = "";
                                passwordError.innerHTML = "";

                                if (email.trim() === "") {
                                    emailError.innerHTML = "Email atau username tidak boleh kosong.";
                                    return false;
                                }

                                if (password.trim() === "") {
                                    passwordError.innerHTML = "Password tidak boleh kosong.";
                                    return false;
                                }

                                return true;
                            }
                        </script>

                    </div>
                </div>
                <!-- /Login -->

            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('style/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('style/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
