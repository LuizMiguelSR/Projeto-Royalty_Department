<?php 
    class Controller {
        /**
         * Controllers responsáveis por redirecionar para as views/models de login, validar o login e erro ao tentar realizar o login.
         */
        public static function login() {
            include 'App/View/Pages/PageLogin.php';
        }
        public static function valida($email, $senha) {
            include 'App/Model/ModelValida.php';
        }
        public static function errou() {
            include 'App/View/Pages/PageErrou.php';
        }
        public static function redefine() {
            include 'App/View/Pages/PageRedefine.php';
        }
        public static function recuperar($recuperar) {
            include 'App/Model/ModelRecuperar.php';
        }
        public static function recuperarConfirma($chave, $novaSenha) {
            include 'App/Model/ModelRecuperarConfirma.php';
        }
        public static function redefineSucesso() {
            include 'App/View/Pages/PageRedefineSucesso.php';
        }
        /**
         * Controller responsável por redirecionar para a view do menu principal da aplicação.
         */
        public static function painelView() {
            include 'App/View/Pages/PagePainelFuncionario.php';
        }
        /**
         * Controllers responsáveis por devolver as views/models das operações de CRUD pertinentes aos funcionários
         */
        public static function inserirFuncionarioView() {
            include 'App/View/Pages/PageInserirFuncionario.php';
        }
        public static function inserirFuncionarioModel($nome, $rg, $cpf, $email, $telefone, $cep, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $salarioBase, $numeroDependentes, $departamento, $cargo, $senha) {
            include 'App/Model/ModelInserirFuncionario.php';
        }

        public static function listarFuncionarioView() {
            include 'App/View/Pages/PageListaFuncionario.php';
        }
        public static function editarFuncionarioView($post) {
            include 'App/View/Pages/PageEditarFuncionario.php';
        }
        public static function editarFuncionarioModel($nome, $rg, $cpf, $senha, $email, $telefone, $numeroDependentes, $id, $departamento, $cargo, $salarioBase, $rua, $numero, $cep, $complemento, $cidade, $bairro, $estado, $pais) {
            include 'App/Model/ModelEditarFuncionario.php';
        }

        public static function folhaPagamentoView() {
            include 'App/View/Pages/PageFolhaPagamento.php';
        }

        public static function holeriteView() {
            include 'App/View/Pages/PageHolerite.php';
        }

        public static function folhaPontoView() {
            include 'App/View/Pages/PageFolhaPonto.php';
        }

        public static function registroPontoView() {
            include 'App/View/Pages/PageRegistroPonto.php';
        }
        public static function registroPontoModel($hora) {
            include 'App/Model/ModelRegistroPonto.php';
        }
        /**
         * Métodos responsáveis por redirecionar o usuários para views de erros de conexão com o banco de dados e de página não encontrada.
         */
        public static function errorConnect() {
            include 'App/View/Pages/PageErrorConnect.php';
        }
        public static function errorNotFound() {
            include 'App/View/Pages/PageErrorNotFound.php';
        }
    }
?>