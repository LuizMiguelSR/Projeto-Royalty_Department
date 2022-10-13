<?php 
    class Controller {
        /**
         * Metodos responsáveis por redirecionar para as views de login, validar o login e erro ao tentar realizar o login.
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
        /**
         * Métodos responsáveis por redirecionar o usuário para as views de redefinição de senha e validar a nova senha do usuário.
         */
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
         * Métodos responsáveis por redirecionar as views internas da aplicação.
         */
        public static function painel() {
            include 'App/View/Pages/PagePainelFuncionario.php';
        }
        public static function cadastrarFuncionario() {
            include 'App/View/Pages/PageCadastrarFuncionario.php';
        }
        public static function listaFuncionario() {
            include 'App/View/Pages/PageListaFuncionario.php';
        }
        public static function cadastrarFuncionarioValida($nome, $rg, $cpf, $email, $telefone, $cep, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $salarioBase, $numeroDependentes, $departamento, $cargo, $senha) {
            include 'App/Model/ModelFuncionarioCadastro.php';
        }
        public static function folhaPagamento() {
            include 'App/View/Pages/PageFolhaPagamento.php';
        }
        public static function holerite() {
            include 'App/View/Pages/PageHolerite.php';
        }
        public static function folhaPonto() {
            include 'App/View/Pages/PageFolhaPonto.php';
        }
        public static function registroPonto() {
            include 'App/View/Pages/PageRegistroPonto.php';
        }
        public static function registroPontoValida($hora) {
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