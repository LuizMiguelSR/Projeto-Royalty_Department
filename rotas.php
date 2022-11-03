<?php
    
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch($url){
        /**
         * Rotas que levam aos controllers resposáveis por validar login devolver erros ao logar ou recuperar senha
         */
        case '/':
            Controller::login();
        break;
        case '/valida':
            Controller::valida($_POST["email"], $_POST["senha"]);
        break;
        case '/errou':
            Controller::errou();
        break;
        case '/redefine':
            Controller::redefine();
        break;
        case '/recuperar':
            Controller::recuperar($_POST["recuperar"]);
        break;
        case '/recuperarConfirma':
            Controller::recuperarConfirma($_POST["chave"], $_POST["novaSenha"]);
        break;
        case '/redefineSucesso':
            Controller::redefineSucesso();
        break;
        /**
         * Rota que leva ao controller responsável pelo menu principal da aplicação
         */
        case '/painel':
            Controller::painelView();
        break;
        /**
         * Rotas que levam aos controllers responsáveis pelas operações de CRUD do funcionário
         */
        case '/gerenciar_funcionarios':
            Controller::gerenciarFuncionariosView();
        break;
        case '/inserir_funcionario':
            Controller::inserirFuncionarioView();
        break;
        case '/inserir_funcionario_model':
            Controller::inserirFuncionarioModel($_POST["nome"], $_POST["rg"], $_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["cep"], $_POST["rua"], $_POST["complemento"], $_POST["numero"], $_POST["bairro"], $_POST["cidade"], $_POST["estado"], $_POST["pais"], $_POST["salarioBase"], $_POST["numeroDependentes"], $_POST["departamento"], $_POST["cargo"], $_POST["senha"]);
        break;
        case '/listar_funcionario':
            Controller::listarFuncionarioView();
        break;
        case '/edita_remove_funcionario':
            Controller::editaRemoveFuncionarioView();
        break;
        case '/editar_funcionario':
            Controller::editarFuncionarioView($_POST["id"]);
        break;
        case '/editar_funcionario_model':
            Controller::editarFuncionarioModel($_POST["nome"], $_POST["rg"], $_POST["cpf"], $_POST["senha"], $_POST["email"], $_POST["telefone"],$_POST["numeroDependentes"], $_POST["id"], $_POST["departamento"], $_POST["cargo"], $_POST["salarioBase"], $_POST["rua"], $_POST["numero"], $_POST["cep"], $_POST["complemento"], $_POST["cidade"], $_POST["bairro"], $_POST["estado"], $_POST["pais"]);
            break;
        case '/excluir_funcionario':
            Controller::excluirFuncionarioModel($_POST["id"]);
        break;
        case '/consultar_funcionario':
            Controller::consultarFuncionarioModel($_POST["id"]);
        break;
            /**
         * Rota pertinente aos calculos da folha de pagamento da empresa
         */
        case '/folha_pagamento':
            Controller::folhaPagamentoView();
        break;
        case '/gerenciar_folha_pagamento':
            Controller::gerenciarFolhaPagamentoView();
        break;
        case '/alterar_aliquota_folha_pagamento':
            Controller::alterarAliquotaFolhaPagamentoView();
        break;
        case '/alterar_aliquota_folha_pagamento_model':
            Controller::alterarAliquotaFolhaPagamentoModel($_POST);
        break;
        /**
         * Rota que leva ao controller reponsável pelo holerite do funcionário
         */
        case '/holerite':
            Controller::holeriteView();
        break;
        case '/registrar_holerite':
            Controller::registrarHoleriteView();
        break;
        case '/registrar_holerite_model':
            Controller::registrarHoleriteModel($_POST["id"]);
        break;
        case '/listar_holerite':
            Controller::listarHoleriteView();
        break;
        case '/consultar_holerite':
            Controller::consultarHoleriteModel($_POST["id"], $_POST["mes"]);
        break;
        case '/alterar_aliquota_holerite':
            Controller::alterarAliquotasHoleriteView();
        break;
        case '/alterar_aliquota_holerite_model':
            Controller::alterarAliquotasHoleriteModel($_POST);
        break;
        case '/gerenciar_holerite':
            Controller::gerenciarHoleriteView();
        break;
        /**
         * Rotas que levam aos controllers responsáveis pela folha de ponto dos funcionários
         */
        case '/folha_ponto':
            Controller::folhaPontoView();
        break;

        case '/registro_ponto':
            Controller::registroPontoView();
        break;
        case '/registro_ponto_model':
            Controller::registroPontoModel($_POST["hora"]);
        break;
        /**
         * Rotas que levam aos controllers pertinentes ao tratamentos de erros inesperados do sistema
         */
        case '/errorConnect':
            Controller::errorConnect();
        break;
        default:
            Controller::errorNotFound();
        break;
    }
?>