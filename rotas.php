<?php
    include 'App/Controller/Controller.php';
    
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch($url){
        case '/':
            Controller::login();
        break;
        case '/valida':
            Controller::valida();
        break;
        case '/redefine':
            Controller::redefine();
        break;
        case '/errou':
            Controller::errou();
        break;
        case '/sair':
            Controller::sair();
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
        default:
            Controller::errorNotFound();
        break;
    }
?>