<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan | Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container" style="margin-top: 80px">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Anda Sekarang!</h1>
                            </div>
                            <form action="/registerUser" method="POST" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleFirstName" name="name" placeholder="Masukan Username"
                                            required>
                                    </div>

                                </div>
                                <div class="form-group" style="margin-top: -10px">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        id="exampleInputEmail" placeholder="Email Address" required>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            placeholder="Password" name="password" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="konfirmasi_password" placeholder="Konfirmasi Password"
                                            name="konfirmasi_password" oninput="check(this)" required>
                                        <span id="message"></span>
                                    </div>
                                </div>

                                <script>
                                    function check(input) {
                                        if (input.value !== document.getElementById('password').value) {
                                            input.setCustomValidity('konfirmasi password tidak valid');
                                            document.getElementById('message').innerHTML = '';
                                        } else {
                                            input.setCustomValidity('');
                                            document.getElementById('message').innerHTML = '';
                                        }
                                    }
                                </script>

                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    Register Account
                                </button>
                                <hr>

                            </form>

                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
