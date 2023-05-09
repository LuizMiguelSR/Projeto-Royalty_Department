@php
    $voltar = 'gerenciar_funcionarios.index';
@endphp

@extends('layouts.layoutFuncionario')

@section('titulo', "Editar dados de $funcionario->nome_funcionario")
@section('content')

    <section>
        <main>
            <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">

            <br><br>

            <div class="row">
                <h1 class="h3 mt-5 mb-2 fw-normal">{{ __('Editar dados de ' . $funcionario->nome_funcionario) }}</h1>
            </div>
            <div class="row mt-5">
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
                    <div class="col-12 mt-3">
                        <input name="foto" type="file" accept="image/*" class="form-control-file" id="foto">
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

                    <div class="col-12 my-5">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>

            @include('layouts._partials.voltar')

        </main>
    </section>

@endsection
