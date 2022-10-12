<?php
    class DAOConnect {
        /**
         * Construtor da classe DAOConnect responsável por utilizar as variáveis de ambiente para conexão ao banco de dados
         */
        public function __construct(){
            $this->conexao = new PDO("mysql:host=".$_ENV['db']['host'].";"."dbname=".$_ENV['db']['database'].";charset=utf8",$_ENV['db']['user'],$_ENV['db']['pass']);
             return $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        /**
         * Método responsável por consultar no banco dados recebendo como parâmetros a tabela de consulta
         */
        public function select($tabela){
            $sql = "Select * FROM ".$tabela;
            $dado = $this->conexao->query($sql);
            $valida=$dado->fetchAll(PDO::FETCH_ASSOC);
            return $valida;
        }
        /**
         * Método responsável por receber o token de recuperação no banco dados recebendo como parâmetros o token e o id do funcionario.
         */
        public function updateFuncionario($coluna, $campo, $id){
            $sql = "UPDATE funcionario SET $coluna = '$campo' WHERE funcionario.id_funcionario = $id";
            $this->conexao->exec($sql);
        }
    }

?>