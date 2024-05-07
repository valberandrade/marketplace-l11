<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('backend/assets/img/logo.png') }}" alt="" title="" width="80" />
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Perdeu a sua senha?</h1>
                                    @if(session('status'))
                                        <div class="alert alert-success">
                                            Foi enviado um e-mail para você com as instruções para recuperar a sua senha.
                                        </div>
                                    @endif
                                    <p class="mb-4">Informe o seu e-mail abaixo para recuperar a sua senha!</p>
                                </div>
                                <form class="user" method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" name="email" value="{{ @old('email') }}" placeholder="Insira o seu e-mail...">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Recuperar senha
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('admin.login') }}">Já tem uma conta? Faça seu login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="text-center">
        <small class="text-light">Desenvolvido por Tallents Web Design</small>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('backend/assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
