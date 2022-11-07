<?php
    try{
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

            public function selectFolha($departamento){
                $sql = "SELECT funcionario.nome_funcionario, departamento.salario_base
                    FROM funcionario
                    INNER JOIN departamento 
                    ON funcionario.id_funcionario = departamento.id_departamento
                    WHERE departamento.departamento_nome = '$departamento'";
                $dado = $this->conexao->query($sql);
                $valida=$dado->fetchAll(PDO::FETCH_ASSOC);
                return $valida;
            }
            /**
             * Métodos responsáveis por consultar no banco dados recebendo como parâmetros a tabela de consulta, uma clausula where e o valor da clausula que será o escopo mensal e anual
             */
            public function selectMesAnoHolerite($id, $ano, $mes){
                $sql = "SELECT * FROM holerite WHERE MONTH(data_holerite) = '$mes' AND YEAR(data_holerite) = '$ano' AND id_holerite = '$id'
                ORDER BY data_holerite DESC;";

                $dado = $this->conexao->query($sql);
                $valida=$dado->fetchAll(PDO::FETCH_ASSOC);
                
                return $valida;
            }
            public function selectMesAnoHolerite2($id, $ano, $mes){
                $sql = "SELECT * FROM holerite WHERE MONTH(data_holerite) = '$mes' AND YEAR(data_holerite) = '$ano' AND id_funcionario = '$id';";

                $dado = $this->conexao->query($sql);
                $valida=$dado->fetchAll(PDO::FETCH_ASSOC);
                
                return $valida;
            }

            public function selectMesAnoPonto($id, $ano, $mes){
                $sql = "SELECT * FROM funcionario_ponto WHERE MONTH(diames) = '$mes' AND YEAR(diames) = '$ano' AND id_funcionario = '$id'
                ORDER BY diames DESC;";

                $dado = $this->conexao->query($sql);
                $valida=$dado->fetchAll(PDO::FETCH_ASSOC);

                return $valida;
            }
            public function selectAnoPonto($id, $ano){
                $sql = "SELECT * FROM funcionario_ponto WHERE YEAR(diames) = '$ano' AND id_funcionario = '$id'
                ORDER BY diames DESC;";

                $dado = $this->conexao->query($sql);
                $valida=$dado->fetchAll(PDO::FETCH_ASSOC);

                return $valida;
            }
            /**
             * Método responsável por receber o token de recuperação no banco dados recebendo como parâmetros o token e o id do funcionario.
             */
            public function updateFuncionario($coluna, $campo, $id){
                $sql = "UPDATE usuarios SET $coluna = '$campo' WHERE id_usuario = $id";
                $this->conexao->exec($sql);
            }
            public function updateAliquota($coluna, $valor){
                $sql = "UPDATE aliquota_folha SET $coluna = '$valor' WHERE id_aliquota_folha = 1";
                $this->conexao->exec($sql);
            }
            public function updateAliquota2($coluna, $valor){
                $sql = "UPDATE aliquota_holerite SET $coluna = '$valor' WHERE id_aliquota_holerite = 1";
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
            public function insereFuncionario($nome, $rg, $cpf, $email, $telefone, $cep, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $salarioBase, $numeroDependentes, $departamento, $cargo, $senha, $salarioLiquido, $inss, $irrf, $caminho, $data){
                $this->conexao->beginTransaction();

                $this->conexao->exec("INSERT INTO endereco (rua, numero, cep, complemento, cidade, bairro, estado, pais) VALUES ('$rua', '$numero', '$cep', '$complemento', '$cidade', '$bairro', '$estado','$pais')");
                $id_endereco = $this->conexao->lastInsertId();
        
                $this->conexao->exec("INSERT INTO departamento (departamento_nome, cargo, salario_base) VALUES ('$departamento', '$cargo', '$salarioBase')");
                $id_departamento = $this->conexao->lastInsertId();
                
                $this->conexao->exec("INSERT INTO usuarios (email, role, senha) VALUES ('$email','3', '$senha')");
                $id_usuario = $this->conexao->lastInsertId();

                $this->conexao->exec("INSERT INTO funcionario (nome_funcionario, telefone, registro_geral, cpf, numero_dependentes, id_departamento, id_endereco, foto, id_usuario) VALUES ('$nome', '$telefone', '$rg', '$cpf', '$numeroDependentes', '$id_departamento', '$id_endereco', '$caminho', '$id_usuario')");
                $id_funcionario = $this->conexao->lastInsertId();
                
                $this->conexao->exec("INSERT INTO holerite (id_funcionario, id_departamento, data_holerite, inss_fx1, inss_fx2, inss_fx3, inss_fx4, inss_total, irrf_fx1,  irrf_fx2, irrf_fx3, irrf_fx4, irrf_fx5, irrf_total, salario_base, salario_liquido) VALUES ('$id_funcionario', '$id_departamento', '$data', '$inss[0]', '$inss[1]', '$inss[2]', '$inss[3]', '$inss[4]', '$irrf[0]', '$irrf[1]', '$irrf[2]', '$irrf[3]', '$irrf[4]', '$irrf[5]', '$salarioBase', '$salarioLiquido')");
                $id_holerite = $this->conexao->lastInsertId();
        
                $this->conexao->commit();
            }
            public function insereFuncionario2($id, $salarioBase, $salarioLiquido, $inss, $irrf, $data){
                $this->conexao->beginTransaction();
                
                $this->conexao->exec("INSERT INTO holerite (id_funcionario, id_departamento, data_holerite, inss_fx1, inss_fx2, inss_fx3, inss_fx4, inss_total, irrf_fx1,  irrf_fx2, irrf_fx3, irrf_fx4, irrf_fx5, irrf_total, salario_base, salario_liquido) VALUES ('$id', '$id', '$data', '$inss[0]', '$inss[1]', '$inss[2]', '$inss[3]', '$inss[4]', '$irrf[0]', '$irrf[1]', '$irrf[2]', '$irrf[3]', '$irrf[4]', '$irrf[5]', '$salarioBase', '$salarioLiquido')");
        
                $this->conexao->commit();
            }

            public function listaFuncionario($post){
                $filtro_sql = " ";

                if(!empty($post['all'])) {
                    $filtro_sql = "";
                } 

                if(!empty($post['filtro'])) {
                    $filtro = $post["filtro"];

                    $filtro_sql = "WHERE f.nome_funcionario LIKE '%$filtro%' OR f.cpf LIKE '$filtro'";       
                } 
                
                # Botão para ordernar por departamento
                    else if (!empty($post['options_dp'])){
                    $filtro_dp = $post["options_dp"];

                    $filtro_sql = "WHERE d.departamento_nome LIKE '%$filtro_dp%'";
                }    
                
                $ordenar_sql= "ORDER BY nome_funcionario";
                
                # Passa para a variável chamada $sql o comando SELECT que verifica
                # se esses parâmetros existem no banco de dados.

                $pag = (isset($post['pagina'])) ? $post['pagina'] : 1;

                # Buscar todos os funcionarios
                # Junção das tabelas
                $busca = "SELECT  * FROM funcionario AS f 
                INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
                INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco 
                $filtro_sql
                $ordenar_sql";
            
                $todos = $this->conexao->query($busca);

                # Itens que vão ser exibidos por página
                $itens_por_pagina = "5";

                # Numero total de linhas, quantidade total de funcionários
                $total_registros = $todos->rowCount();

                # Saber total de páginas
                $paginas = ceil($total_registros/$itens_por_pagina);

                $inicio = ($itens_por_pagina*$pag) - $itens_por_pagina;
                $limite = $this->conexao->query("$busca LIMIT $inicio, $itens_por_pagina");

                $anterior = $pag - 1;
                $proximo = $pag + 1;

                $valor = [$pag, $paginas, $anterior, $proximo, $limite];
                return $valor;
            }

            public function editarFuncionarioSalvar($nome, $rg, $cpf, $senha, $email, $telefone, $numeroDependentes, $caminho, $id, $departamento, $cargo, $salarioBase, $rua, $numero, $cep, $complemento, $cidade, $bairro, $estado, $pais){

                $sql = "UPDATE funcionario SET nome_funcionario = '$nome', registro_geral = '$rg', cpf = '$cpf', telefone = '$telefone', numero_dependentes = '$numeroDependentes', foto = '$caminho' WHERE funcionario.id_funcionario = '$id'";
                $this->conexao->exec($sql);

                $sql = "UPDATE usuarios SET email = '$email', senha = '$senha' WHERE usuarios.id_usuario = '$id'";
                $this->conexao->exec($sql);

                $sql = "UPDATE departamento SET departamento_nome = '$departamento', cargo = '$cargo', salario_base = '$salarioBase' WHERE departamento.id_departamento = '$id'";
                $this->conexao->exec($sql);

                $sql = "UPDATE endereco SET rua = '$rua', numero = '$numero', cep = '$cep', complemento = '$complemento', cidade = '$cidade', bairro = '$bairro', estado = '$estado', pais = '$pais' WHERE endereco.id_endereco = '$id'";
                $this->conexao->exec($sql);
            }

            public function deletaFuncionario($id){

                $sqlDelete = "DELETE from funcionario where id_funcionario = $id";
                $this->conexao->exec($sqlDelete);
                $sqlDelete = "DELETE from endereco where id_endereco = $id";
                $this->conexao->exec($sqlDelete);
                $sqlDelete = "DELETE from departamento where id_departamento = $id";
                $this->conexao->exec($sqlDelete);
                $sqlDelete = "DELETE from usuarios where id_usuario = $id";
                $this->conexao->exec($sqlDelete);
            }
        }
    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Busca no Servidor";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>