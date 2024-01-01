<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="../adminfiles/css/master.css" rel="stylesheet">

</head>

<!--<body class="vertical-layout vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="" data-framework="laravel">-->

    <!--old design-->
<body>
    <div class="wrapper">
        <div class="auth-content">
            @if(\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{ \Session::forget('success') }}

            <div class="card">
            <div class="card-header" ></div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="../assets/img/logo1.jpg" alt="bootstraper logo">
                    </div>
                    <!--<h6 class="mb-4 text-muted">Login to your account</h6>-->
                    <form class="auth-login-form mt-2" action="{{route('adminLoginPost')}}" method="post">
                        @csrf
                        <div class="form-group text-left">
                            <label for="email">Username</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Username">
                            @if ($errors->has('email'))
                            <span style="text-color:red;">
                                <strong >{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Password</label>
                            <input type="password" class="form-control"  name="password" placeholder="Password">
                            @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!--<<div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember me on this device</label>
                            </div>
                        </div>-->

                        <button type="submit" class="btn btn-lg btn-block" style="background-color:#6c9ecf;" id="btn-login"><b><span style="color:white;font-size:15px;">Login</span></b></button>
                        @if(\Session::get('error'))
                        <div id="login-alert" class="alert alert-danger col-sm-12">

                            {{ \Session::get('error') }}
                        </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end -->


</body>

</html>
