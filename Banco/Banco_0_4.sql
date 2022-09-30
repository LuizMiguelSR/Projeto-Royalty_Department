CREATE DATABASE FHR;

USE FHR;

create table endereco (
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

create table departamento (
id_departamento int(8) auto_increment,
departamento_nome varchar(50),
cargo varchar(50),
funcao varchar(50),
salario_base double(10,2),
constraint pk_id_departamento primary key(id_departamento));

create table funcionario (
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
constraint fk_funcionario_endereco foreign key (id_endereco) references endereco(id_endereco),
constraint fk_funcionario_departamento foreign key (id_departamento) references departamento(id_departamento));

create table holerite(
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

create table inss (
id_inss int(8) auto_increment,
id_holerite int(8),
faixa_1 double(10,2),
faixa_2 double(10,2),
faixa_3 double(10,2),
faixa_4 double(10,2),
constraint pk_id_inss primary key(id_inss),
constraint fk_inss_holerite foreign key (id_holerite) references holerite(id_holerite));

create table irrf (
id_irrf int(8) auto_increment,
id_holerite int(8),
faixa_irrf1 double(10,2),
faixa_irrf2 double(10,2),
faixa_irrf3 double(10,2),
faixa_irrf4 double(10,2),
faixa_irrf5 double(10,2),
constraint pk_id_irrf primary key(id_irrf),
constraint fk_irrf_holerite foreign key (id_holerite) references holerite(id_holerite));

create table funcionario_ponto(
id_funcionario_ponto int(8) auto_increment,
id_funcionario int(8),
diames DATE,
entrada TIME,
almoco_sai TIME,
almoco_che TIME,
saida TIME,
constraint pk_id_holerite primary key(id_funcionario_ponto),
constraint fk_funcionario_ponto foreign key (id_funcionario) references funcionario(id_funcionario));

INSERT INTO funcionario VALUES("ADMIN", "REGISTRO DE ADMIN", "49394943", "admin", "admin@email.com", 282222, 2);
