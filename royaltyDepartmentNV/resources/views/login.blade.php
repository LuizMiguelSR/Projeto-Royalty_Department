<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/SystemImages/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/SystemImages/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/SystemImages/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/SystemImages/site.webmanifest') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Royalty - Login</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid m-auto text-center">

            <div class="row">
                <main class="form-signin w-100 m-auto">
                    <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">
                    <h1 class="h3 my-4 fw-normal">BEM VINDO</h1>
                    <form method="POST" class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating">
                            <label for="floatingInput">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="nome@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mt-2">
                            <label for="floatingPassword">Senha</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" maxlength="50" required>
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div><br>

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <a href="/redefine">Esqueceu a senha?</a>
                        <div>
                            <button class="w-100 btn btn-lg btn-primary mt-2" ype="submit">Entrar</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
    <br><br><br>

    <style>
        .text-muted {
            color: #0b6567 !important;
        }
    </style>

    <footer class="mt-5">
        <p class="text-center text-muted">&copy; {{ date('Y') }} Royalty Department</p>
    </footer>

</html>

