@php
    $title = "Gerenciar Colaboradores";
    $funcionario_nome = session('funcionario_nome', '');
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
                                <th>Nome</th>
                                <th>Departamento</th>
                                <th>Perfil</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)

                                <tr>
                                    <td>{{ $funcionario->nome_funcionario }}</td>
                                    <td>{{ $funcionario->departamento->departamento_nome }}</td>
                                    <td>
                                        <button type="submit" class='btn btn-sm btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $funcionario->id }}" title="Ver perfil">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class='btn btn-sm btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModal{{ $funcionario->id }}" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('gerenciar_funcionarios.destroy', $funcionario->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-sm btn-primary' title="Excluir">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="exampleModal2{{ $funcionario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered justify-content-center">
                                        <div class="card user-card-full w-75">
                                            <div class="row m-l-0 m-r-0">
                                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                                    <div class="card-block text-center text-white">
                                                        <div class="m-b-25">
                                                            <img src="{{ asset('storage/' . $funcionario->foto ) }}" class="img-radius" style="width: 170px; height: 150px" alt="Perfil" title="Perfil de {{ $funcionario->nome_funcionario }}"/>
                                                        </div>
                                                        <h6 class="f-w-600">{{ $funcionario->nome_funcionario }}</h6>
                                                        <h1 class="user-descrip">{{ $funcionario->departamento->cargo }}</p>
                                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Ficha de {{ $funcionario->nome_funcionario }}</h6>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-4">
                                                                <p class="m-b-10 f-w-600">Email</p>
                                                                <h6 class="text-muted f-w-400">{{ $funcionario->usuario->email }}</h6>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="m-b-10 f-w-600">Telefone</p>
                                                                <h6 class="text-muted f-w-400">{{ $funcionario->telefone }}</h6>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="m-b-10 f-w-600">Dependentes</p>
                                                                <h6 class="text-muted f-w-400">{{ $funcionario->numero_dependentes }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-4">
                                                                <p class="m-b-10 f-w-600">Depto.</p>
                                                                <h6 class="text-muted f-w-400">{{ $funcionario->departamento->departamento_nome }}</h6>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="m-b-10 f-w-600">Salário Base</p>
                                                                <h6 class="text-muted f-w-400">R$ {{ number_format($funcionario->departamento->salario_base, 2, ',', '.') }}</h6>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p class="m-b-10 f-w-600">V.T</p>
                                                                <h6 class="text-muted f-w-400">R$ 220,00</h6>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-12">
                                                                <p class="m-b-10 f-w-600">Endereço</p>
                                                                <h6 class="text-muted f-w-400">Rua {{ $funcionario->endereco->rua}}, nº {{ $funcionario->endereco->numero}}, {{ $funcionario->endereco->bairro}} - {{ $funcionario->endereco->cidade}} / {{ $funcionario->endereco->estado}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal{{ $funcionario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5" id="exampleModalLabel">Editar Funcionário</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-1">
                                                    <form class="row g-3 formCad" method="post" action="{{ route('gerenciar_funcionarios.update', $funcionario->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Dados Pessoais -->
                                                        <h3 class="mb-5">Dados Pessoais</h3>
                                                        <div class="col-12">
                                                            <input name="nome_funcionario" type="text" class="form-control" id="nome_funcionario" placeholder="Nome" required pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" maxlength="50" value="{{ $funcionario->nome_funcionario }}">
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="registro_geral" type="text" class="form-control" id="registro_geral" placeholder="RG" inputmode="number" required pattern="[a-z0-9]+)" maxlength="15" value="{{ $funcionario->registro_geral }}">
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF" inputmode="number" maxlength="14" pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}" required value="{{ $funcionario->cpf }}">
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="telefone" type="text" maxlength="15" class="form-control" id="telefone" placeholder="Telefone" required value="{{ $funcionario->telefone }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required value="{{ $funcionario->usuario->email }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" maxlength="50" required value="{{ $funcionario->usuario->senha }}">
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <input name="foto" type="file" accept="image/*" class="form-control-file" id="foto" required>
                                                        </div>
                                                        <!--Endereço-->
                                                        <h3 class="my-5">Endereço</h3>
                                                        <div class="col-4">
                                                            <input name="cep" type="text" class="form-control" id="cep" placeholder="CEP" pattern="[0-9]+$" maxlength="8" required value="{{ $funcionario->endereco->cep }}">
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="numero" type="text" class="form-control" id="numero" placeholder="Número" maxlength="6" pattern="[0-9]+$" required value="{{ $funcionario->endereco->numero }}">
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="complemento" type="text" class="form-control" id="complemento" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" maxlength="50" placeholder="Complemento" value="{{ $funcionario->endereco->complemento }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="rua" type="text" class="form-control" id="rua" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ0-9 ]+)" placeholder="Rua" required value="{{ $funcionario->endereco->rua }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="bairro" type="text" class="form-control" id="bairro" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="Bairro" required value="{{ $funcionario->endereco->bairro }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="cidade" type="text" class="form-control" id="cidade" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="Cidade" required value="{{ $funcionario->endereco->cidade }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="estado" type="text" class="form-control" id="estado" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="Estado" required value="{{ $funcionario->endereco->estado }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="pais" type="text" class="form-control" id="pais" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="País" value="Brasil" value="{{ $funcionario->endereco->pais }}">
                                                        </div>
                                                        <h3 class="my-5">Dados da Empresa</h3>
                                                        <div class="col-6">
                                                            <input name="salario_base" type="number" step="0.01" min="0" max="50000" class="form-control" id="salario_base" placeholder="Salário Base" required value="{{ $funcionario->departamento->salario_base }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="numero_dependentes" type="text" class="form-control" id="numero_dependentes" placeholder="Nº Dependentes" pattern="[0-9]+$" maxlength="2" required value="{{ $funcionario->numero_dependentes }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-select" aria-h3="Default select example" name="departamento_nome" id="departamento_nome">
                                                                <option value="Administrativo" {{ $funcionario->departamento->departamento_nome === "Administrativo" ? "selected" : "" }}>Administrativo</option>
                                                                <option value="Financeiro" {{ $funcionario->departamento->departamento_nome === "Financeiro" ? "selected" : "" }}>Financeiro</option>
                                                                <option value="RH" {{ $funcionario->departamento->departamento_nome === "RH" ? "selected" : "" }}>Recursos Humanos</option>
                                                                <option value="Marketing" {{ $funcionario->departamento->departamento_nome === "Marketing" ? "selected" : "" }}>Marketing</option>
                                                                <option value="Comercial" {{ $funcionario->departamento->departamento_nome === "Comercial" ? "selected" : "" }}>Comercial</option>
                                                                <option value="Operacional" {{ $funcionario->departamento->departamento_nome === "Operacional" ? "selected" : "" }}>Operacional</option>
                                                                <option value="Vendas" {{ $funcionario->departamento->departamento_nome === "Vendas" ? "selected" : "" }}>Vendas</option>
                                                                <option value="T.I" {{ $funcionario->departamento->departamento_nome === "T.I" ? "selected" : "" }}>Tecnologia da Informação</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-select" aria-h3="Default select example" name="cargo" id="cargo">
                                                                <option value="Diretor" {{ $funcionario->departamento->cargo === "Diretor" ? "selected" : "" }}>Diretor</option>
                                                                <option value="Gerente" {{ $funcionario->departamento->cargo === "Gerente" ? "selected" : "" }}>Gerente</option>
                                                                <option value="Supervisor" {{ $funcionario->departamento->cargo === "Supervisor" ? "selected" : "" }}>Supervisor</option>
                                                                <option value="Coordenador" {{ $funcionario->departamento->cargo === "Coordenador" ? "selected" : "" }}>Coordenador </option>
                                                                <option value="Consultor" {{ $funcionario->departamento->cargo === "Consultor" ? "selected" : "" }}>Consultor</option>
                                                                <option value="Auxiliar" {{ $funcionario->departamento->cargo === "Auxiliar" ? "selected" : "" }}>Auxiliar</option>
                                                                <option value="Estagiário" {{ $funcionario->departamento->cargo === "Estagiário" ? "selected" : "" }}>Estagiário</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12 mt-5">
                                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>{{ __('Verifique se valores para nome está correto e clique em filtrar.') }}</p>
                @endif
            </div>
            @if ($funcionariosPage->lastPage() > 1)
                <nav>
                    <ul class="pagination justify-content-center mt-5">
                        <li class="page-item {{ ($funcionariosPage->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $funcionariosPage->url(1) }}">{{ __('Primeira') }}</a>
                        </li>
                        @for ($i = 1; $i <= $funcionariosPage->lastPage(); $i++)
                            <li class="page-item {{ ($funcionariosPage->currentPage() == $i) ? ' active' : '' }}" style="color: #0b6567">
                                <a class="page-link" href="{{ $funcionariosPage->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($funcionariosPage->currentPage() == $funcionariosPage->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $funcionariosPage->url($funcionariosPage->currentPage()+1) }}">{{ __('Próxima') }}</a>
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
