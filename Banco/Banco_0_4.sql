CREATE DATABASE IF NOT EXISTS fhr2;

USE fhr2;


CREATE TABLE IF NOT EXISTS `endereco` (
id_endereco INT(8) auto_increment,
rua VARCHAR(50),
numero INT(6),
cep VARCHAR(50),
complemento VARCHAR(50),
cidade VARCHAR(50),
bairro VARCHAR(50),
estado VARCHAR(50),
pais VARCHAR(50),
CONSTRAINT pk_id_endereco PRIMARY KEY(id_endereco));


CREATE TABLE IF NOT EXISTS `departamento` (
id_departamento INT(8) auto_increment,
departamento_nome VARCHAR(50),
cargo VARCHAR(50),
funcao VARCHAR(50),
salario_base double(10,2),
constraint pk_id_departamento primary key(id_departamento));


CREATE TABLE IF NOT EXISTS `funcionario` (
id_funcionario INT(8) auto_increment,
id_departamento INT(8),
id_endereco INT(8),
nome_funcionario VARCHAR(50),
registrogeral VARCHAR(50), 
cpf VARCHAR(50),
senha VARCHAR(255),
email VARCHAR(50), 
telefone INT(20),
numeroDependentes INT(2),
foto VARCHAR(100),
CONSTRAINT pk_id_funcionario PRIMARY KEY(id_funcionario),
CONSTRAINT fk_funcionario_enredereco FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco),
CONSTRAINT fk_funcionario_departamento FOREIGN KEY (id_departamento) REFERENCES departamento(id_departamento));


CREATE TABLE IF NOT EXISTS `holerite`(
id_holerite INT(8) auto_increment,
id_funcionario INT(8),
id_departamento INT(8),
tipo VARCHAR(12),
data_inicio DATE,
data_Final DATE,
salarioliquido double(15,2),
totaldescontos double(15,2),
CONSTRAINT pk_id_holerite PRIMARY KEY(id_holerite),
CONSTRAINT fk_holerite_funcionario FOREIGN KEY (id_funcionario) REFERENCES funcionario(id_funcionario),
CONSTRAINT fk_holerite_departamento FOREIGN KEY (id_departamento) REFERENCES departamento(id_departamento));


CREATE TABLE IF NOT EXISTS `inss` (
id_inss INT(8) auto_increment,
id_holerite INT(8),
faixa_inss1 double(10,2),
faixa_inss2 double(10,2),
faixa_inss3 double(10,2),
faixa_inss4 double(10,2),
CONSTRAINT pk_id_inss PRIMARY KEY(id_inss),
constraint fk_inss_holerite foreign key (id_holerite) references holerite(id_holerite));


CREATE TABLE IF NOT EXISTS `funcionario_ponto`(
id_funcionario_ponto int(8) auto_increment,
id_funcionario int(8),
diames DATE,
entrada TIME,
almoco_sai TIME,
almoco_che TIME,
saida TIME,
constraint pk_id_holerite primary key(id_funcionario_ponto),
constraint fk_funcionario_ponto foreign key (id_funcionario) references funcionario(id_funcionario));


CREATE TABLE IF NOT EXISTS `irrf` (
id_irrf INT(8) auto_increment,
id_holerite INT(8),
faixa_irrf1 double(10,2),
faixa_irrf2 double(10,2),
faixa_irrf3 double(10,2),
faixa_irrf4 double(10,2),
faixa_irrf5 double(10,2),
CONSTRAINT pk_id_irrf PRIMARY KEY(id_irrf),
CONSTRAINT fk_irrf_holerite FOREIGN KEY (id_holerite) REFERENCES holerite(id_holerite));


INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (01, 'Comercial', 'Vendas', 'Junior', 5000000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (02, 'Comercial', 'Vendas', 'Senior', 7500000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (03, 'T.I', 'Analista', 'Junior', 5300000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (04, 'T.I', 'Analista', 'Senior', 8250000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (05, 'Escritorio', 'Administrativo', 'Junior', 350000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (06, 'Escritorio', 'Administrativo', 'Senior', 650000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (07, 'Financeiro', 'Contador', 'Junior', 450000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (08, 'Financeiro', 'Contador', 'Senior', 350000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (09, 'RH', 'RH', 'Junior', 550000);
INSERT IGNORE INTO `departamento` (id_departamento,departamento_nome, cargo, funcao, salario_base) VALUES (10, 'RH', 'RH', 'Senior', 720000);

INSERT IGNORE INTO `holerite` (`id_holerite`, `id_funcionario`,  `id_departamento`,  `tipo`,  `data_inicio`,  `data_Final`,  `salarioliquido`,  `totaldescontos`) VALUES (1, 1, 1, '', '2022-09-01', '2022-09-20', 5500000, 100);

INSERT IGNORE INTO `inss` (`id_inss`, `id_holerite`, `faixa_inss1`, `faixa_inss2`, `faixa_inss3`, `faixa_inss4`) VALUES (1, 1, 1.212, 2.427, 3.641, 7.087);
INSERT IGNORE INTO `irrf` (`id_irrf`, `id_holerite`, `faixa_irrf1`, `faixa_irrf2`, `faixa_irrf3`, `faixa_irrf4`, `faixa_irrf5`) VALUES (1, 1, 142.80, 354.80, 636.13, 869.36, 790.58);

INSERT IGNORE INTO `funcionario` (`id_funcionario`,`id_departamento`,  `nome_funcionario`, `email`, `telefone`, `senha`,  `cpf`, `numeroDependentes`, `foto`) VALUES
(1, 6, 'Administrador', 'admin@email.com', '12345789', '$2y$10$r6SU3qVCH/t.e/aLyXPzSu6IhYNotw02ynFUUfah1VkYWm2OYifqG', 13245689, 2, ''),
(2, 8, 'Monteiro Lobato', 'luizmsr0@gmail.com', '12345789', '$2y$10$Ur5C8wZTIXpyczbV.tWfyex9ua4tbHznI2nHrQ89jYIoQdoW2BLvu', 13245689, 0, ''),
(3, 10, 'Carla Diaz', 'diaz@email.com', '12345789', '$2y$10$cp08lF2Mc3jlMuuxx.awPuXCWRlBa0D3kSc99dccsF7jHHxCGKau.', 13245689, 0, '');