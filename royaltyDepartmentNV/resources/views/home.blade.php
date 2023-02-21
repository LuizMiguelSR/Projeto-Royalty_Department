<!-- resources/views/home.blade.php -->
@extends('layouts.layout')

@section('content')
<section>
    <main>
        <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty"><br><br>
        <h1 class="h1 mt-5 mb-2 fw-normal">{{ __('Bem vindo, '.Auth::user()->funcionario->nome_funcionario ) }}</h1>

        @if (Auth::user()->role === 1)
            <div class="row mt-5">
                <a href="/gerenciar_funcionarios" style="width: auto" title="Gerenciar Funcionários">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Gerenciar Funcionários" src="{{ asset('images/SystemImages/cadastrar.svg') }}"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">GERENCIAR FUNCIONÁRIOS</div>
                        <div class="title">Consulta, altera e remove informações pertinentes aos funcionários</div>
                    </div>
                </a>
                <a href="/gerenciar_folha_pagamento" style="width: auto" title="Gerenciar Folha de Pagamento">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Gerenciar Folha de Pagamento" src="{{ asset('images/SystemImages/folhaPagamento.svg') }}"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">GERENCIAR<br>FOLHA DE PAGAMENTO</div>
                        <div class="title">Registra e consulta a folha de pagamento e altera informações</div>
                    </div>
                </a>
                <a href="/gerenciar_holerite" style="width: auto" title="Gerenciar Holerite">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Gerenciar Holerite" src="{{ asset('images/SystemImages/holerite.svg') }}"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">GERENCIAR<br>HOLERITE</div>
                        <div class="title">Registra os holerites dos funcionários e altera informações pertinentes a alíquotas</div>
                    </div>
                </a>
            </div>
        @endif
        <div class="row">
            <a href="/holerite" style="width: auto" title="Seu Holerite">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" alt="Seu Holerite" src="{{ asset('images/SystemImages/holerite2.svg') }}"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">HOLERITE</div>
                    <div class="title">Consulta ao seu holerite</div>
                </div>
            </a>
            <a href="/folhaPonto" style="width: auto" title="Folha de Ponto">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" alt="Folha de Ponto" src="{{ asset('images/SystemImages/folhaPonto.svg') }}"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">FOLHA DE PONTO</div>
                    <div class="title">Consulta a sua folha de ponto</div>
                </div>
            </a>
            <a href="funcionario_ponto" style="width: auto" title="Registro de Ponto">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" alt="Registro de Ponto" src="{{ asset('images/SystemImages/registroPonto.svg') }}"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">REGISTRO DE PONTO</div>
                    <div class="title">Registra o seu ponto diário</div>
                </div>
            </a>
        </div>
        <style>
            .text-muted {
                color: #0b6567 !important;
            }
        </style>
        <br><br><br>
        <footer class="mt-5">
            <p class="text-center text-muted">&copy; 2022 Royalty Department</p>
        </footer>
    </main>
</section>
@endsection
