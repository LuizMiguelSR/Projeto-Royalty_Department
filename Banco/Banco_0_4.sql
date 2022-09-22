CREATE DATABASE IF NOT EXISTS FHR;

USE FHR;

create table if NOT EXISTS endereco (
id_endereco int(8) auto_increment,
rua varchar(50),
numero int(6),
cep varchar(50),
complemento varchar(50),
cidade varchar(50),
bairro varchar(50),
estado varchar(50),
pais varchar(50),
constraint pk_id_endereco primary key(id_endereco));

create table If NOT EXISTS departamento (
id_departamento int(8) auto_increment,
departamento_nome varchar(50),
cargo varchar(50),
funcao varchar(50),
salario_base double(10,2),
constraint pk_id_departamento primary key(id_departamento));

create table  if NOT EXISTS funcionario (
id_funcionario int(8) auto_increment,
id_departamento int(8),
id_endereco int(8),
nome_funcionario varchar(50),
registrogeral varchar(50), 
cpf varchar(50),
senha varchar(255),
email varchar(50), 
telefone int(20),
numeroDependentes int(2),
foto varchar(100),
constraint pk_id_funcionario primary key(id_funcionario),
constraint fk_funcionario_enredereco foreign key (id_endereco) references endereco(id_endereco),
constraint fk_funcionario_departamento foreign key (id_departamento) references departamento(id_departamento));

create table  if NOT EXISTS holerite(
id_holerite int(8) auto_increment,
id_funcionario int(8),
id_departamento int(8),
tipo varchar(12),
data_inicio DATE,
data_Final DATE,
salarioliquido double(15,2),
totaldescontos double(15,2),
constraint pk_id_holerite primary key(id_holerite),
constraint fk_holerite_funcionario foreign key (id_funcionario) references funcionario(id_funcionario),
constraint fk_holerite_departamento foreign key (id_departamento) references departamento(id_departamento));

create table  if NOT EXISTS inss (
id_inss int(8) auto_increment,
id_holerite int(8),
faixa_1 double(10,2),
faixa_2 double(10,2),
faixa_3 double(10,2),
faixa_4 double(10,2),
constraint pk_id_inss primary key(id_inss),
constraint fk_inss_holerite foreign key (id_holerite) references holerite(id_holerite));

create table if not exists irrf (
id_irrf int(8) auto_increment,
id_holerite int(8),
faixa_1 double(10,2),
faixa_2 double(10,2),
faixa_3 double(10,2),
faixa_4 double(10,2),
faixa_5 double(10,2),
constraint pk_id_irrf primary key(id_irrf),
constraint fk_irrf_holerite foreign key (id_holerite) references holerite(id_holerite));

create table if not exists funcionario_ponto(
id_funcionario_ponto int(8) auto_increment,
id_funcionario int(8),
entrada DATETIME,
almoco_sai DATETIME,
almoco_che DATETIME,
saida DATETIME,
constraint pk_id_holerite primary key(id_funcionario_ponto),
constraint fk_funcionario_ponto foreign key (id_funcionario) references funcionario(id_funcionario));

-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (01, 'Comercial', 'Vendas', 'Junior', 5000000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (02, 'Comercial', 'Vendas', 'Senior', 7500000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (03, 'T.I', 'Analista', 'Junior', 5300000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (04, 'T.I', 'Analista', 'Senior', 8250000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (05, 'Escritorio', 'Administrativo', 'Junior', 350000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (06, 'Escritorio', 'Administrativo', 'Senior', 650000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (07, 'Financeiro', 'Contador', 'Junior', 450000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (08, 'Financeiro', 'Contador', 'Senior', 350000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (09, 'RH', 'RH', 'Junior', 550000);
-- INSERT INTO departamento (id_departamento,departamento_nome, cargo, funcao, salario_base) values (10, 'RH', 'RH', 'Senior', 720000);

INSERT INTO `funcionario` (`id_funcionario`,`id_departamento`,  `nome_funcionario`, `email`, `telefone`, `senha`,  `cpf`, `numeroDependentes`, `foto`) VALUES
(1, 6, 'Administrador', 'admin@email.com', '12345789', '$2y$10$r6SU3qVCH/t.e/aLyXPzSu6IhYNotw02ynFUUfah1VkYWm2OYifqG', 13245689, 2, ''),
(2, 8, 'Monteiro Lobato', 'luizmsr0@gmail.com', '12345789', '$2y$10$Ur5C8wZTIXpyczbV.tWfyex9ua4tbHznI2nHrQ89jYIoQdoW2BLvu', 13245689, 0, ''),
(3, 10, 'Carla Diaz', 'diaz@email.com', '12345789', '$2y$10$cp08lF2Mc3jlMuuxx.awPuXCWRlBa0D3kSc99dccsF7jHHxCGKau.', 13245689, 0, '');