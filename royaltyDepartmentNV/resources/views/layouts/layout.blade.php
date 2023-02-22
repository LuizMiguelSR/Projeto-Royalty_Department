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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <title>{{ $title ?? 'Painel de '.Auth::user()->funcionario->nome_funcionario }}</title>
    </head>
    <body>
        <style>
            .navbar.fixed-top.navbar-expand-lg{
                background-color: #0b6567;
                box-shadow: 1px 3px 3px #00000054;
            }
        </style>
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container-fluid">
                <div class="col-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                        <img class="logout12" src="{{ asset('images/SystemImages/menu.png') }}" alt="menu" title="Menu">
                        <h1 class="menu">MENU</h1>
                    </button>
                </div>
                <div class="col-8"></div>
                <div class="col-2 left">
                    <a href="/sair"><img class="logout12" src="{{ asset('images/SystemImages/logoff.png') }}" alt="logout" title="Logout">
                    <h1 class="sair">SAIR</h1>
                    </a>
                </div>
            </div>
        </nav>
        <style>
            :root{
                --cor1: #0b6567;
                --cor2: #0b656780;
                --cor3: #00000054;
                --cor4: #46d160;

                --fonte-padrao: 'Roboto Flex', sans-serif;
                --fonte-destaque: 'Roboto Condensed', sans-serif;
            }
            .sair{
                margin-right: 20px;
                margin-left: 1%;
                margin-top: -23px;
                position:absolute;
                color: white;
                font-size: 120%;
            }
            .menu{
                margin-right: 20px;
                margin-left: 3%;
                margin-top: -23px;
                position:absolute;
                color: white;
                font-size: 120%;
            }
            .offcanvas-header {
                margin-right: 20px;
                margin-left: 20px;
                margin-top: 10px;
                font-family: var(--fonte-destaque);

            }
            .fotoPerfilPequena {
                vertical-align: middle;
                height: 4em;
                width: 4em;
                border-radius: 10px;
            }
            .log {
                height: 1.2em;
                width: 1.2em;
                border-radius: 50%;
                border: solid;
                background-color: #46d160;
                position: absolute;
                top: 73px;
                left: 84px;
            }
            .logout{
                height: 1em;
                width: 1em;
            }
            .offcanvas-body{
                padding: 0px;
                font-family: var(--fonte-padrao);
                font-size: 1.1em;
                font-weight: bolder;
            }
            .offcanvas-body > .row{
                padding-top: 20px;
                padding-bottom: 20px;
            }
            .offcanvas-body > .row:hover{
                background-color: var(--cor2);
                color: white;
            }
            .offcanvas.show:not(.hiding), .offcanvas.showing {
                transform: none;
                padding: 0px;
            }
            @media only screen and (min-width: 1400px){
                .sair{
                    margin-right: 20px;
                    margin-left: 4%;
                    margin-top: -23px;
                    position:absolute;
                    color: white;
                    font-size: 120%;
                }
                .menu{
                    margin-right: 20px;
                    margin-left: 3%;
                    margin-top: -23px;
                    position:absolute;
                    color: white;
                    font-size: 120%;
                }
            }
            @media only screen and (max-width: 800px){
                .sair{
                    margin-right: 20px;
                    margin-left: -7%;
                    margin-top: -23px;
                    position:absolute;
                    color: white;
                    font-size: 120%;
                }
                .menu{
                    margin-right: 20px;
                    margin-left: 8%;
                    margin-top: -23px;
                    position:absolute;
                    color: white;
                    font-size: 120%;
                }
            }
            @media only screen and (max-width: 400px){
                .sair{
                    margin-right: 20px;
                    margin-left: -10%;
                    margin-top: -23px;
                    position:absolute;
                    color: white;
                    font-size: 120%;
                }
                .menu{
                    margin-right: 20px;
                    margin-left: 7%;
                    margin-top: -23px;
                    position:absolute;
                    color: white;
                    font-size: 120%;
                }
            }
        </style>
        @if (Auth::user()->role === 1)
            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <img class="fotoPerfilPequena" src="#" alt="Foto Perfil Pequena" title="Foto de perfil de {{ Auth::user()->funcionario->nome_funcionario }}">
                    <div class="log"></div>
                    <h5 class="offcanvas-title" id="staticBackdropLabel">{{ Auth::user()->funcionario->nome_funcionario }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr>
                <div class="offcanvas-body">
                    <div class="row">
                        <div class="col-8">
                            <a href="/gerenciar_funcionario">Gerenciar Funcionários</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="/gerenciar_folha_pagamento">Gerenciar folha de pagamento</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="/gerenciar_holerite">Gerenciar holerite</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="/holerite">Holerite</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="/folha_ponto">Folha de Ponto</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="/registro_ponto">Registro de Ponto</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <img class="fotoPerfilPequena" src="#" alt="Foto Perfil Pequena" title="Foto de perfil de {{ Auth::user()->funcionario->nome_funcionario }}">
                <div class="log"></div>
                <h5 class="offcanvas-title" id="staticBackdropLabel">{{ Auth::user()->funcionario->nome_funcionario }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
                <div class="row m-2">
                    <div class="col-8">
                        <a href="/holerite">Holerite</a>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-8">
                        <a href="/folha_ponto">Folha de Ponto</a>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-8">
                        <a href="/registro_ponto">Registro de Ponto</a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')

    </body>
    <br><br><br><br><br>

    <style>
        .text-muted {
            color: #0b6567 !important;
        }
    </style>

    <footer class="mt-5">
        <p class="text-center text-muted">&copy; {{ date('Y') }} Royalty Department</p>
    </footer>

</html>
