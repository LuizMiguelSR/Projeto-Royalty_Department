@php
    $title = "Gerenciar Colaboradores";
@endphp

@extends('layouts.layout')

@section('content')

<section>
    <main>

        <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">

        <br><br>

        <div class="row">
            <h1 class="h3 my-5 fw-normal">{{ __('GERENCIAR COLABORADORES') }}</h1>
        </div>

        <div class="row mx-5">
            <div class="col-md-12">
                <form class="row tabela mb-3" action="{{ route('gerenciar_funcionario.consulta') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Filtrar por nome" name="nome_funcionario" value="{{ request()->input('nome_funcionario') }}">
                        <select class="form-select" aria-label="Default select example" name='departamento' onchange="this.form.submit()">
                            <option value="">Listar Todos Colaboradores</option>
                            <option value="Administrativo" {{ request()->input('options_dp') == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                            <option value="Financeiro" {{ request()->input('options_dp') == 'Financeiro' ? 'selected' : '' }}>Financeiro</option>
                            <option value="RH" {{ request()->input('options_dp') == 'RH' ? 'selected' : '' }}>RH</option>
                            <option value="Comercial" {{ request()->input('options_dp') == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                            <option value="Operacional" {{ request()->input('options_dp') == 'Operacional' ? 'selected' : '' }}>Operacional</option>
                            <option value="Vendas" {{ request()->input('options_dp') == 'Vendas' ? 'selected' : '' }}>Vendas</option>
                            <option value="T.I" {{ request()->input('options_dp') == 'T.I' ? 'selected' : '' }}>TI</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Filtrar</button>
                    </div>
                </form>
                <br>

                @if ($funcionarios->count() > 0)

                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)
                                <tr>
                                    <th scope="row">{{ $funcionario->id_departamento }}</th>
                                    <td>{{ $funcionario->nome_funcionario }}</td>
                                    <td>{{ $funcionario->departamento->departamento_nome }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>{{ __('Verifique se valores para nome está correto e clique em filtrar.') }}</p>
                @endif
            </div>
            @if ($funcionarios->lastPage() > 1)
                <nav>
                    <ul class="pagination justify-content-center mt-5">
                        <li class="page-item {{ ($funcionarios->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $funcionarios->url(1) }}">{{ __('Primeira') }}</a>
                        </li>
                        @for ($i = 1; $i <= $funcionarios->lastPage(); $i++)
                            <li class="page-item {{ ($funcionarios->currentPage() == $i) ? ' active' : '' }}" style="color: #0b6567">
                                <a class="page-link" href="{{ $funcionarios->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($funcionarios->currentPage() == $funcionarios->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $funcionarios->url($funcionarios->currentPage()+1) }}">{{ __('Próxima') }}</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>

        <div class="row mx-5 mt-2 mb-5">
            <h1 class="h2 mt-5 mb-2 fw-normal">CONFIGURAÇÕES</h1>
            <a href="{{ route('gerenciar_funcionarios.create') }}" style="width: auto" title="Cadastrar colaborador">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" alt="Cadastrar" src="{{ asset('images/SystemImages/cadastrar.svg') }}"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">CADASTRAR COLABORADOR</div>
                </div>
            </a>
        </div>

        <a href="/home"><img class="mt-3 voltar" src="{{ asset('images/SystemImages/voltar.png') }}" alt="voltar" title="Voltar"></a>

        <div class="row">
            <p>VOLTAR</p>
        </div>

    </main>
</section>

@endsection
