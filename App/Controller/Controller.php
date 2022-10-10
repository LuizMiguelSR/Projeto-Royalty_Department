<?php 
    class Controller{
        public static function login() {
            include 'App/View/Pages/PageLogin.php';
        }
        public static function valida() {
            include 'App/Controller/valida.php';
        }
        public static function errou() {
            include 'App/View/Pages/PageErrou.php';
        }
        public static function redefine() {
            include 'App/View/Pages/PageRedefine.php';
        }
        public static function errorConnect() {
            include 'App/View/Pages/PageErrorConnect.php';
        }
        public static function errorNotFound() {
            include 'App/View/Pages/PageErrorNotFound.php';
        }
        public static function sair() {
            include 'App/Controller/sair.php';
        }
        public static function painel() {
            include 'App/View/Pages/PagePainelFuncionario.php';
        }
        public static function cadastrarFuncionario() {
            include 'App/View/Pages/PageCadastrarFuncionario.php';
        }
        public static function listaFuncionario() {
            include 'App/View/Pages/PageListaFuncionario.php';
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
    }
?>