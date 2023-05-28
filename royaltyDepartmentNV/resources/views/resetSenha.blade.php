@section('titulo', 'Redefinir Senha')
@extends('layouts.layoutLogin')
@section('content')
    <section>
        <div class="container-fluid m-auto text-center">
            @component('layouts._components.alert_error')
            @endcomponent
            @component('layouts._components.alert_sucess')
            @endcomponent
            @component('layouts._components.titulo_logo', ['titulo_imagem' => "Redefinir Senha"])
            @endcomponent
            <div class="row">
                <main class="form-signin w-100 m-auto">
                    <form  method="post" class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('redefinir_senha.chave') }}">
                        @csrf
                        <label for="floatingInput">Insira sua chave recebida em seu email</label>
                        <div class="form-floating">
                            <input name="chave" type="text" class="form-control" id="floatingInput" maxlength="256" required>
                        </div>
                        <input class="w-100 btn btn-lg btn-primary mt-4" type="submit" value="Enviar">
                    </form>
                </main>
            </div>
            @component('layouts._components.voltar')
                {{ route('login') }}
            @endcomponent
    </section>
@endsection
