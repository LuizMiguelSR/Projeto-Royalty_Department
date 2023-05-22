@extends('layouts.layoutFuncionario')
@section('titulo', 'Cadastro de Funcionário')
@section('content')
    <section>
        <main>
            @component('layouts._components.alert_error')
            @endcomponent
            @component('layouts._components.titulo_logo', ['titulo_imagem' => 'Cadastrar um novo funcionário'])
            @endcomponent
            <div class="row mt-1">
                <form class="row g-3 formCad" method="post" action="{{ route('gerenciar_funcionarios.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Dados Pessoais -->
                    <h3 class="mt-5 mb-2">Dados Pessoais</h3>
                    <div class="col-12">
                        <input name="nome_funcionario" type="text" class="form-control" id="nome_funcionario" placeholder="Nome" required pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" maxlength="50">
                    </div>
                    <div class="col-4">
                        <input name="registro_geral" type="text" class="form-control" id="registro_geral" placeholder="RG" inputmode="number" required pattern="[a-z0-9]+)" maxlength="15">
                    </div>
                    <div class="col-4">
                        <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF" inputmode="number" maxlength="14" pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}" required>
                    </div>
                    <div class="col-4">
                        <input name="telefone" type="text" maxlength="15" class="form-control" id="telefone" placeholder="Telefone" required>
                    </div>
                    <div class="col-6">
                        <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
                    </div>
                    <div class="col-6">
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" maxlength="50" required>
                    </div>
                    <div class="col-12">
                        <input name="foto" type="file" accept="image/*" class="form-control-file" id="foto" required>
                    </div>
                    <!--Endereço-->
                    <h3 class="my-5">Endereço</h3>
                    <div class="col-4">
                        <input name="cep" type="text" class="form-control" id="cep" placeholder="CEP" pattern="[0-9]+$" maxlength="8" required>
                    </div>
                    <div class="col-4">
                        <input name="numero" type="text" class="form-control" id="numero" placeholder="Número" maxlength="6" pattern="[0-9]+$" required>
                    </div>
                    <div class="col-4">
                        <input name="complemento" type="text" class="form-control" id="complemento" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" maxlength="50" placeholder="Complemento">
                    </div>
                    <div class="col-6">
                        <input name="rua" type="text" class="form-control" id="rua" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ0-9 ]+)" placeholder="Rua" required>
                    </div>
                    <div class="col-6">
                        <input name="bairro" type="text" class="form-control" id="bairro" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="Bairro" required>
                    </div>
                    <div class="col-6">
                        <input name="cidade" type="text" class="form-control" id="cidade" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="Cidade" required>
                    </div>
                    <div class="col-6">
                        <input name="estado" type="text" class="form-control" id="estado" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="Estado" required>
                    </div>
                    <div class="col-6">
                        <input name="pais" type="text" class="form-control" id="pais" maxlength="50" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" placeholder="País" value="Brasil">
                    </div>
                    <h3 class="my-5">Dados da Empresa</h3>
                    <div class="col-6">
                        <input name="salario_base" type="number" step="0.01" min="0" max="50000" class="form-control" id="salario_base" placeholder="Salário Base" required>
                    </div>
                    <div class="col-6">
                        <input name="numero_dependentes" type="text" class="form-control" id="numero_dependentes" placeholder="Nº Dependentes" pattern="[0-9]+$" maxlength="2" required>
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">Departamento</label>
                        <select class="form-select" aria-h3="Default select example" name="departamento_nome" id="departamento_nome">
                            <option value="Administrativo">Administrativo</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="RH">Recursos Humanos</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Operacional">Operacional</option>
                            <option value="Vendas">Vendas</option>
                            <option value="T.I">Tecnologia da Informação</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                        <select class="form-select" aria-h3="Default select example" name="cargo" id="cargo">
                            <option value="Diretor">Diretor</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Coordenador">Coordenador </option>
                            <option value="Consultor">Consultor</option>
                            <option value="Auxiliar">Auxiliar</option>
                            <option value="Estagiário">Estagiário</option>
                        </select>
                    </div>
                    <div class="col-12 my-5">
                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                    </div>
                </form>
            </div>
            @component('layouts._components.voltar')
                {{ route('gerenciar_funcionarios.index') }}
            @endcomponent
        </main>
    </section>
@endsection
