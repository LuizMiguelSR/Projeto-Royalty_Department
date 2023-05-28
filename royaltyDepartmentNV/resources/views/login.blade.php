@extends('layouts.layoutLogin')
@section('titulo', 'Login')
@section('content')
    <section>
        <div class="container-fluid m-auto text-center">
            <div class="row">
                <main class="form-signin w-100 m-auto">
                    <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">
                    <h1 class="h3 my-4 fw-normal">BEM VINDO</h1>
                    <form method="POST" class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('login') }}">
                        @csrf
                        <label for="email" id="email-label">E-mail</label>
                        <div class="form-floating">
                            <input class="form-control mb-2" type="email" name="email" id="email" placeholder="nome@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
                        </div>
                        <label for="password" id="password-label">Senha</label>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" maxlength="50" required>
                        </div><br>
                        @component('layouts._components.alert_error')
                        @endcomponent
                        @component('layouts._components.alert_sucess')
                        @endcomponent
                        <a href="{{ route('redefinir_senha') }}">Esqueceu a senha?</a>
                        <div>
                            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Entrar</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </section>
@endsection

