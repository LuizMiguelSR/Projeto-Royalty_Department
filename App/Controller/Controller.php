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
        public static function gerenciarFuncionariosView() {
            include 'App/View/Pages/PageGerenciarFuncionarios.php';
        }
        public static function inserirFuncionarioView() {
            include 'App/View/Pages/PageInserirFuncionario.php';
        }
        public static function editaRemoveFuncionarioView() {
            include 'App/View/Pages/PageEditaRemoveFuncionario.php';
        }
        public static function inserirFuncionarioModel($nome, $rg, $cpf, $email, $telefone, $cep, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $salarioBase, $numeroDependentes, $departamento, $cargo, $senha) {
            include 'App/Model/ModelInserirFuncionario.php';
        }
        public static function editarFuncionarioView($post) {
            include 'App/View/Pages/PageEditarFuncionario.php';
        }
        public static function editarFuncionarioModel($nome, $rg, $cpf, $senha, $email, $telefone, $numeroDependentes, $id, $departamento, $cargo, $salarioBase, $rua, $numero, $cep, $complemento, $cidade, $bairro, $estado, $pais) {
            include 'App/Model/ModelEditarFuncionario.php';
        }
        public static function excluirFuncionarioModel($post) {
            include 'App/Model/ModelExcluirFuncionario.php';
        }
        public static function consultarFuncionarioModel($post) {
            include 'App/Model/ModelConsultarFuncionario.php';
        }
        /**
         * Controllers responsáveis por devolver as views/models das operações de CRUD pertinentes a folha de pagamento
         */
        public static function folhaPagamentoView() {
            include 'App/View/Pages/PageFolhaPagamento.php';
        }      
        public static function gerenciarFolhaPagamentoView() {
            include 'App/View/Pages/PageGerenciarFolhaPagamento.php';
        }      
        public static function alterarAliquotaFolhaPagamentoView() {
            include 'App/View/Pages/PageAlterarAliquotaFolhaPagamento.php';
        }      
        public static function alterarAliquotaFolhaPagamentoModel($post) {
            include 'App/Model/ModelAlterarAliquotaFolhaPagamento.php';
        }      
        /**
         * Controllers responsáveis por devolver as views/models das operações de CRUD pertinentes ao holerite
         */
        public static function holeriteView() {
            include 'App/View/Pages/PageHolerite.php';
        }
        public static function holeritePDFView() {
            include 'App/View/Pages/PageHoleritePDF.php';
        }
        public static function registrarHoleriteModel($post) {
            include 'App/Model/ModelRegistrarHolerites.php';
        }
        public static function listarHoleriteView() {
            include 'App/View/Pages/PageListaHolerites.php';
        }
        public static function consultarHoleriteModel($postId, $postMes) {
            include 'App/Model/ModelConsultarHolerite.php';
        }
        public static function alterarAliquotasHoleriteView() {
            include 'App/View/Pages/PageAlterarAliquotaHolerite.php';
        }
        public static function alterarAliquotasHoleriteModel($post) {
            include 'App/Model/ModelAlterarAliquotaHolerite.php';
        }
        public static function gerenciarHoleriteView() {
            include 'App/View/Pages/PageGerenciarHolerite.php';
        }
        /**
         * Controllers responsáveis por devolver as views/models das operações de CRUD pertinentes a folha de ponto
         */
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
         * Controllers responsáveis por redirecionar o usuários para views de erros de conexão com o banco de dados e de página não encontrada.
         */
        public static function errorConnect() {
            include 'App/View/Pages/PageErrorConnect.php';
        }
        public static function errorNotFound() {
            include 'App/View/Pages/PageErrorNotFound.php';
        }
        public static function errorImageNotFound() {
            include 'App/View/Pages/PageErrorImage.php';
        }
    }
?>