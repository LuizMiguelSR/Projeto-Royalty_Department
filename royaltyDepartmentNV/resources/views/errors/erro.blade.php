@php
    $voltar = 'login';
@endphp
@extends('layouts.layoutLogin')
@section('titulo', "Página não encontrada")
@section('content')
    <section>
            <style>
                img {
                    vertical-align: middle;
                    height: 21em;
                }
            </style>
            <div class="container-fluid m-auto text-center">
                <div class="row">
                    <main class="form-signin w-100 m-auto">
                        <h1 class="h1 my-4 fw-normal">PÁGINA NÃO ENCONTRADA</h1>
                        <img class="erroimg" src="{{ asset('images/SystemImages/erro404.svg') }}" alt="Erro página não encontrada" title="Erro de página não encontrada">
                    </main>
                </div>
            </div>
        </body>
        @include('layouts._partials.voltar')
    </section>
@endsection
