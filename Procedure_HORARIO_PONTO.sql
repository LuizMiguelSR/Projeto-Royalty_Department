/*

Foi mal, desculpa Luiz, não sabia que ia ficar bravo, nunca mais zuo assim não.


*/


DELIMITER $$
CREATE PROCEDURE Verificar_Entrada_USUARIO();
BEGIN
DECLARE 'ID_FUNCIONARIO' INT(8); 
DECLARE 'DATA_ENTRADA' DATE;
DECLARE 'ENTRADA' TIME;
DECLARE 'SAIDA_INTERVALO' TIME;
DECLARE 'RETORNO_INTERVALO' TIME;
DECLARE 'SAIDA' TIME;
DECLARE @funcao1 VARCHAR;
DECLARE @funcao2 TIME;
DECLARE @funcao3 TIME;
DECLARE @funcao4 TIME;
SELECT @funcao1 = select id_funcionario, data_entrada,entrada FROM funcionario_ponto;
IF @funcao1 == null
BEGIN 
INSERT INTO funcionario_ponto (id_funcionario, data_entrada, entrada) VALUES (id_funcionario, dataEntrada,horarioAtual);
END
ELSEIF
BEGIN
 SELECT @funcao2 = select saida_intervalo from funcionario_ponto; 
ELSEIF @funcao2 == null
BEGIN
 UPDATE funcionario_ponto SET saida_intervalo = horarioAtual WHERE funcionario_ponto.id_funcionario = id_funcionario;
END
 SELECT @funcao3 = select saida_intervalo from funcionario_ponto;  
ELSEIF @funcao3 == null
BEGIN 
 UPDATE funcionario_ponto SET retorno_intervalo = horarioAtual WHERE funcionario_ponto.id_funcionario = id_funcionario;
END
ELSE IF @funcao4 ==null
 UPDATE funcionario_ponto SET saida = horarioAtual WHERE funcionario_ponto.id_funcionario = id_funcionario;
 END
END
DELIMITER ;

