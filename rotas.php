<?php
    
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch($url){
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

        case '/painel':
            Controller::painel();
        break;
        case '/cadastrarFuncionario':
            Controller::cadastrarFuncionario();
        break;
        case '/cadastrarFuncionarioValida':
            Controller::cadastrarFuncionarioValida($_POST["nome"], $_POST["rg"], $_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["cep"], $_POST["rua"], $_POST["complemento"], $_POST["numero"], $_POST["bairro"], $_POST["cidade"], $_POST["estado"], $_POST["pais"], $_POST["salarioBase"], $_POST["numeroDependentes"], $_POST["departamento"], $_POST["cargo"], $_POST["senha"]);
        break;
        case '/listaFuncionario':
            Controller::listaFuncionario();
        break;
        case '/perfil':
            Controller::perfil($_POST["nome"]);
        break;
        case '/folhaPagamento':
            Controller::folhaPagamento();
        break;
        case '/holerite':
            Controller::holerite();
        break;
        case '/folhaPonto':
            Controller::folhaPonto();
        break;
        case '/registroPonto':
            Controller::registroPonto();
        break;
        case '/registroPontoValida':
            Controller::registroPontoValida($_POST["hora"]);
        break;

        case '/errorConnect':
            Controller::errorConnect();
        break;
        default:
            Controller::errorNotFound();
        break;
    }
?>