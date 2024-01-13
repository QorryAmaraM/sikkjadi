<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIKK</title>

    @include('includes.style')

</head>

<body class="bg-gradient-primary"
    style="background-color: #394867; height: 100svh; display: flex; align-items: center;">

    <div class="container">

        <!-- Outer Row -->
        <div class="login-logo text-center">
            <img src="assets/img/bps.png" alt="login-logo" class="logo mb-3">
            <h4>SISTEM INFORMASI KINERJA KARYAWAN</h4>
            <h5>BPS BUKITTINGGI</h5>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card o-hidden border-0 my-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-3" style="background-color: #14274E;">

                                    <form class="user" method="POST" action="{{ url('/login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label-login" for="inputEmail">EMAIL ADDRESS</label>
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label-login" for="inputEmail">PASSWORD</label>
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword">
                                        </div>
                                        <button class="btn btn-login" type="submit">
                                            LOG IN
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="small white-text" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    @include('includes.script')

</body>

</html>
