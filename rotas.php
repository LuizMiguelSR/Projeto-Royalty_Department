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
        case '/listaFuncionario':
            Controller::listaFuncionario();
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

        case '/errorConnect':
            Controller::errorConnect();
        break;
        default:
            Controller::errorNotFound();
        break;
    }
?>