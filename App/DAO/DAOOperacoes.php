<?php
    class DAOOperacoes {
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
         * Método responsável por consultar no banco dados recebendo como parâmetros a tabela de consulta, uma clausula where e o valor da clausula
         */
        public function selectWhere($tabela, $condicao, $id){
            $sql = "Select * FROM ".$tabela." WHERE ".$condicao." = ".$id;
            $dado = $this->conexao->query($sql);
            $valida=$dado->fetchAll(PDO::FETCH_ASSOC);
            return $valida;
        }
        /**
         * Método responsável por consultar no banco dados recebendo como parâmetros a tabela de consulta, uma clausula where e o valor da clausula
         */
        public function selectWhereOrder($tabela, $condicao, $id, $ordem){
            $sql = "Select * FROM ".$tabela." WHERE ".$condicao." = ".$id." ORDER BY ".$ordem." DESC LIMIT 10";
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
        /**
         * Método responsável por atualizar a registro de ponto do funcionário
         */
        public function updateFuncionarioPonto($coluna, $campo, $id){
            $sql = "UPDATE funcionario_ponto SET $coluna = '$campo' WHERE funcionario_ponto.id_funcionario_ponto = $id";
            $this->conexao->exec($sql);
        }
        /**
         * Método responsávle por inserir um registro de entrada no ponto do funcionário
         */
        public function insereRegistro($id, $diames, $entrada){
            $this->conexao->exec("INSERT INTO funcionario_ponto (id_funcionario, diames, entrada) VALUES ('$id', '$diames', '$entrada')");
        }
        /**
         * Método responsável por cadastrar um funcionário no banco de dados
         */
        public function insereFuncionario($nome, $rg, $cpf, $email, $telefone, $cep, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $salarioBase, $numeroDependentes, $departamento, $cargo, $senha, $salarioLiquido, $inss, $irrf, $caminho){
            $this->conexao->beginTransaction();

            $this->conexao->exec("INSERT INTO endereco (rua, numero, cep, complemento, cidade, bairro, estado, pais) VALUES ('$rua', '$numero', '$cep', '$complemento', '$cidade', '$bairro', '$estado','$pais')");
            $id_endereco = $this->conexao->lastInsertId();
    
            $this->conexao->exec("INSERT INTO departamento (departamento_nome, cargo, salario_base) VALUES ('$departamento', '$cargo', '$salarioBase')");
            $id_departamento = $this->conexao->lastInsertId();
    
            $this->conexao->exec("INSERT INTO funcionario (nome_funcionario, email, telefone, senha, registro_geral, cpf, numero_dependentes, id_departamento, id_endereco, foto) VALUES ('$nome','$email','$telefone', '$senha', '$rg', '$cpf', '$numeroDependentes', '$id_departamento', '$id_endereco', '$caminho')");
            $id_funcionario = $this->conexao->lastInsertId();
            
            $this->conexao->exec("INSERT INTO holerite (id_funcionario, id_departamento, salario_liquido) VALUES ('$id_funcionario', '$id_departamento', '$salarioLiquido')");
            $id_holerite = $this->conexao->lastInsertId();
    
            $this->conexao->exec("INSERT INTO inss (id_holerite, faixa_1, faixa_2, faixa_3, faixa_4, total_inss) VALUES ('$id_holerite', '$inss[0]', '$inss[1]', '$inss[2]', '$inss[3]', '$inss[4]')");

            $this->conexao->exec("INSERT INTO irrf (id_holerite, faixa_irrf1, faixa_irrf2, faixa_irrf3, faixa_irrf4, faixa_irrf5, total_irrf) VALUES ('$id_holerite', '$irrf[0]', '$irrf[1]', '$irrf[2]', '$irrf[3]', '$irrf[4]', '$irrf[5]')");
    
            $this->conexao->commit();
        }

        public function listaFuncionario($post){
            $filtro_sql = " ";
            
            //Clicou em filtrar?

            if(!empty($post['all'])) {

                // Cria filtro em SQL
                $filtro_sql = "";
        
            } 

            if(!empty($post['filtro'])) {

                // Cria filtro em SQL

                $filtro = $post["filtro"];

                $filtro_sql = "WHERE f.nome_funcionario LIKE '%$filtro%' OR f.cpf LIKE '$filtro'";       
            } 
            
            # Botão para ordernar por departamento
                else if (!empty($post['options_dp'])){

                //Obtém o filtro digitado pelo usuário
                
                $filtro_dp = $_POST["options_dp"];

                $filtro_sql = "WHERE d.departamento_nome LIKE '%$filtro_dp%'";
            }    
            
            $ordenar_sql= "ORDER BY nome_funcionario";

            # Botão para ordernar pelo departamento em ordem alfabética ou nome em ordem alfabética

            if (!empty($post["ordenar"])){
                //Obtém o filtro digitado pelo usuário               
                $ordenar = $post["ordenar"];
                $ordenar_sql = "ORDER BY $ordenar";
            }  
            # Passa para a variável chamada $sql o comando SELECT que verifica
            # se esses parâmetros existem no banco de dados. 

            # Junção de duas tabelas
            $sql = "SELECT  * FROM funcionario AS f 
            INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
            INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
            $filtro_sql
            $ordenar_sql";

            #WHERE d.departamento_nome = 'Comercial'

            # Passa a váriavel $sql para uma query. 
            # Query é uma solicitação ao banco de dados.
            # Result é o resultado dessa solicitação, vai passar o número de linhas que
            # existem no banco de dados com os parâmetros passados.
            # conexão é a várivel declarada no config.php
            return $resultado = $this->conexao->query($sql);
        }

        public function alteraFuncionario($postAlterar){
            if (!empty($postAlterar['id'])) {

                $id = $postAlterar['id'];
            
                $sqlSelect = "SELECT * FROM funcionario AS f
                INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
                INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
                WHERE f.id_funcionario = '$id' ";
            
            
                return $result = $this->conexao->query($sqlSelect);
            }
        }
    }

?>