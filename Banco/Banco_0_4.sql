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
cpt varchar(50),
senha varchar(50),
email varchar(50), 
telefone int(20),
numeroDependentes int(2),
foto MEDIUMBLOB,
constraint pk_id_funcionario primary key(id_funcionario),
constraint fk_funcionario_enredereco foreign key (id_endereco) references endereco(id_endereco),
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
tab_1 double(10,2),
tab_2 double(10,2),
tab_3 double(10,2),
tab_4 double(10,2),
constraint pk_id_inss primary key(id_inss),
constraint fk_inss_holerite foreign key (id_holerite) references holerite(id_holerite));

create table irrf (
id_irrf int(8) auto_increment,
id_holerite int(8),
tab1_irrf double(10,2),
tab2_irrf double(10,2),
tab3_irrf double(10,2),
tab4_irrf double(10,2),
tab5_irrf double(10,2),
constraint pk_id_irrf primary key(id_irrf),
constraint fk_irrf_holerite foreign key (id_holerite) references holerite(id_holerite));

create table funcionario_ponto(
id_funcionario_ponto int(8) auto_increment,
id_funcionario int(8),
entrada DATETIME,
almoco_sai DATETIME,
almoco_che DATETIME,
saida DATETIME,
constraint pk_id_holerite primary key(id_funcionario_ponto),
constraint fk_funcionario_ponto foreign key (id_funcionario) references funcionario(id_funcionario));

INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (01, 'Comercial', 'Vendas', 'Junior', 5000000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (02, 'Comercial', 'Vendas', 'Senior', 7500000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (03, 'T.I', 'Analista', 'Junior', 5300000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (04, 'T.I', 'Analista', 'Senior', 8250000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (05, 'Escritorio', 'Administrativo', 'Junior', 350000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (06, 'Escritorio', 'Administrativo', 'Senior', 650000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (07, 'Financeiro', 'Contador', 'Junior', 450000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (08, 'Financeiro', 'Contador', 'Senior', 350000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (09, 'RH', 'RH', 'Junior', 550000);
INSERT INTO departamento (departamento_id,departamento_nome, cargo, funcao, salarioBase) values (03, 'RH', 'RH', 'Senior', 720000);
