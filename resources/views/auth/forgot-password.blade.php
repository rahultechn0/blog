<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Recover Password | Admin& Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="p-0 container-fluid">
                <div class="card">
                    <div class="card-body">

                        <div class="mt-4 text-center">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="mx-auto logo-dark" alt="">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="mx-auto logo-light" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-center text-muted font-size-18"><b>Reset Password</b></h4>

                        <div class="p-3">
                                <form class="mt-3 form-horizontal" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Forgot your password? <strong> No problem </strong> Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <div class="mb-3 form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control"  id="email" name="email" type="email" placeholder="Email">
                                        @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="pb-2 mt-3 text-center form-group row">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->


        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    </body>
</html>
