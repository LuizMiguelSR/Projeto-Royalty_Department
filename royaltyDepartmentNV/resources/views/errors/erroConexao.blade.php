@php
    $title = "Ops!!!";
@endphp

@extends('layouts.layoutLogin')

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
                <h1 class="h1 my-4 fw-normal">CONEXÃO NÃO ESTABELECIDA</h1>
                <img class="erroimg" src="{{ asset('images/SystemImages/erro503.svg') }}" alt="Erro" title="Erro de conexão">
            </main>
        </div>
</section>

@endsection
