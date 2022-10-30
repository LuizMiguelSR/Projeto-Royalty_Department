<?php
    class ModelSession{
        public static function verificaSessao(){
            session_start();
            if (password_verify(session_id(), $_SESSION['senhaSession']) != True){
                header('Location: /');
            }
            if (session_id() !== $_SESSION['id'] && $_SERVER['REMOTE_ADDR'] !== $_SESSION['ip']) {
                header('Location: /');
            }
        }
        public static function verificaRole(){
            if($_SESSION['role'] !== 1){
                header('Location: /painel');
            }
        }
        public static function destroiSessao(){
            session_start();
            session_destroy();
            $_SESSION = array();
        }
    }
?>