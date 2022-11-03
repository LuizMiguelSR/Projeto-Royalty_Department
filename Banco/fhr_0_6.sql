-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20/10/2022 às 05:48
-- Versão do servidor: 10.4.25-MariaDB
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fhr`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(8) NOT NULL,
  `departamento_nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento_nome`, `cargo`, `salario_base`) VALUES
(1, 'Administrativo', 'Diretor', 5000.00),
(2, 'Financeiro', 'Gerente', 2450.00),
(5, 'T.I', 'Diretor', 8000.00),
(6, 'Comercial', 'Coordenador', 5800.00),
(7, 'Operacional', 'Diretor', 7000.00),
(8, 'Operacional', 'Gerente', 8000.00),
(9, 'Vendas', 'Supervisor', 7000.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(8) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` int(6) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `numero`, `cep`, `complemento`, `cidade`, `bairro`, `estado`, `pais`) VALUES
(1, 'Praça da Sé', 1214, '01001901', 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(2, 'Praça da Sé', 1214, '01001901', 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(5, 'Praça da Sé', 1214, '01001901', 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(6, 'Praça da Sé', 456, '01001901', 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(7, 'Praça da Sé', 1214, '01001901', 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(8, 'Praça da Sé', 1214, '01001901', 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(9, 'Praça da Sé', 1214, '01001901', 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(8) NOT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  `id_endereco` int(8) DEFAULT NULL,
  `nome_funcionario` varchar(50) DEFAULT NULL,
  `registro_geral` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` int(20) DEFAULT NULL,
  `numero_dependentes` int(2) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `recuperar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_departamento`, `id_endereco`, `nome_funcionario`, `registro_geral`, `cpf`, `senha`, `email`, `telefone`, `numero_dependentes`, `foto`, `recuperar`) VALUES
(1, 1, 1, 'Administrador', '1234567890', '13245689', '$2y$10$8UPIk5bVBklCTegwMHMQwe4l3FCSiG3uQP08w5oP36wnUI8w7SYm6', 'admin@email.com', 12345789, 0, 'App/View/Images/UserPictures/63508c0f96f59.png', NULL),
(2, 2, 2, 'Monteiro Lobato', '1234567890', '13245689', '$2y$10$LdgEZdLw33ANKA4bzf1k/u.s2pSfmCqhOEgn0w704/HUSAsUlLc3e', 'lobato@email.com', 12345789, 2, 'App/View/Images/UserPictures/63508dd060c0b.jpg', NULL),
(5, 5, 5, 'Luiz', '1234567890', '13245689', '$2y$10$bRo1DHWbOUWi5woQT/MO0u3myGdTbm5oW/2SbuNNhA6/rDNwZWgTO', 'luizmiguel.srodrigues@gmail.com', 12345789, 0, 'App/View/Images/UserPictures/63508e9e67c9c.png', ''),
(6, 6, 6, 'Steve Seagal', '1234567890', '13245689', '$2y$10$cYfRt/gAtEPZ0lhuw2GxKuSRiJbgllCK5w9xWDkuoUUkejq8.u1J2', 'steve@email.com', 12345789, 2, 'App/View/Images/UserPictures/63508ed81900c.png', NULL),
(7, 7, 7, 'Chuck Norris', '1234567890', '13245689', '$2y$10$JKpOpDarmJNBUHlzrslhBefXt36FxyXM8nq6cPy74WxcE.EjqjQ..', 'norris@email.com', 12345789, 3, 'App/View/Images/UserPictures/63508f119b604.jpg', NULL),
(8, 8, 8, 'Carla Diaz', '1234567890', '13245689', '$2y$10$lE7aP97cr0BWU.KnhgKX9OmrWMDzhsZtlw3hjsAtwRYRb7xUq6eMq', 'diaz@email.com', 12345789, 0, 'App/View/Images/UserPictures/6350ae6aaf397.png', NULL),
(9, 9, 9, 'maria', '1234567890', '13245689', '$2y$10$C4v0Az6m48WA1VHaQd59Cu0aelVnI.wEduTzCYXB0MQ3VXTF5X9n.', 'maria@email.com', 12345789, 2, 'App/View/Images/UserPictures/6350c222d03e3.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario_ponto`
--

CREATE TABLE `funcionario_ponto` (
  `id_funcionario_ponto` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `diames` date DEFAULT NULL,
  `entrada` time DEFAULT NULL,
  `almoco_sai` time DEFAULT NULL,
  `almoco_che` time DEFAULT NULL,
  `saida` time DEFAULT NULL,
  `horas_trabalhadas` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionario_ponto`
--

INSERT INTO `funcionario_ponto` (`id_funcionario_ponto`, `id_funcionario`, `diames`, `entrada`, `almoco_sai`, `almoco_che`, `saida`, `horas_trabalhadas`) VALUES
(2, 1, '2022-10-19', '21:02:41', '21:02:43', '21:02:44', '21:02:45', '00:00:03'),
(3, 7, '2022-10-19', '23:16:51', '23:16:53', '23:16:54', '23:16:55', '00:00:03'),
(4, 1, '2022-10-20', '00:36:35', '00:36:37', '00:36:39', '00:36:41', '00:00:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `holerite`
--

CREATE TABLE `holerite` (
  `id_holerite` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  `salario_liquido` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `holerite`
--

INSERT INTO `holerite` (`id_holerite`, `id_funcionario`, `id_departamento`, `salario_liquido`) VALUES
(1, 1, 1, 3875.59),
(2, 2, 2, 2027.00),
(5, 5, 5, 5849.61),
(6, 6, 6, 4489.54),
(7, 7, 7, 5289.87),
(8, 8, 8, 5849.61),
(9, 9, 9, 5237.74);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inss`
--

CREATE TABLE `inss` (
  `id_inss` int(8) NOT NULL,
  `id_holerite` int(8) DEFAULT NULL,
  `faixa_1` double(10,2) DEFAULT NULL,
  `faixa_2` double(10,2) DEFAULT NULL,
  `faixa_3` double(10,2) DEFAULT NULL,
  `faixa_4` double(10,2) DEFAULT NULL,
  `total_inss` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `inss`
--

INSERT INTO `inss` (`id_inss`, `id_holerite`, `faixa_1`, `faixa_2`, `faixa_3`, `faixa_4`, `total_inss`) VALUES
(1, 1, 90.90, 109.38, 145.64, 190.25, 536.18),
(2, 2, 90.90, 109.38, 2.72, 0.00, 203.00),
(5, 5, 90.90, 109.38, 145.64, 482.47, 828.39),
(6, 6, 90.90, 109.38, 145.64, 302.25, 648.18),
(7, 7, 90.90, 109.38, 145.64, 470.25, 816.18),
(8, 8, 90.90, 109.38, 145.64, 482.47, 828.39),
(9, 9, 90.90, 109.38, 145.64, 470.25, 816.18);

-- --------------------------------------------------------

--
-- Estrutura para tabela `irrf`
--

CREATE TABLE `irrf` (
  `id_irrf` int(8) NOT NULL,
  `id_holerite` int(8) DEFAULT NULL,
  `faixa_irrf1` double(10,2) DEFAULT NULL,
  `faixa_irrf2` double(10,2) DEFAULT NULL,
  `faixa_irrf3` double(10,2) DEFAULT NULL,
  `faixa_irrf4` double(10,2) DEFAULT NULL,
  `faixa_irrf5` double(10,2) DEFAULT NULL,
  `total_irrf` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `irrf`
--

INSERT INTO `irrf` (`id_irrf`, `id_holerite`, `faixa_irrf1`, `faixa_irrf2`, `faixa_irrf3`, `faixa_irrf4`, `faixa_irrf5`, `total_irrf`) VALUES
(1, 1, 0.00, 69.20, 138.66, 160.37, 0.00, 368.23),
(2, 2, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(5, 5, 0.00, 69.20, 138.66, 205.56, 688.58, 1102.00),
(6, 6, 0.00, 69.20, 138.66, 205.56, 28.87, 442.29),
(7, 7, 0.00, 69.20, 138.66, 205.56, 260.53, 673.95),
(8, 8, 0.00, 69.20, 138.66, 205.56, 688.58, 1102.00),
(9, 9, 0.00, 69.20, 138.66, 205.56, 312.67, 726.09);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_funcionario_departamento` (`id_departamento`),
  ADD KEY `fk_funcionario_enredereco` (`id_endereco`);

--
-- Índices de tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD PRIMARY KEY (`id_funcionario_ponto`),
  ADD KEY `fk_funcionario_ponto` (`id_funcionario`);

--
-- Índices de tabela `holerite`
--
ALTER TABLE `holerite`
  ADD PRIMARY KEY (`id_holerite`),
  ADD KEY `fk_holerite_funcionario` (`id_funcionario`),
  ADD KEY `fk_holerite_departamento` (`id_departamento`);

--
-- Índices de tabela `inss`
--
ALTER TABLE `inss`
  ADD PRIMARY KEY (`id_inss`),
  ADD KEY `fk_inss_holerite` (`id_holerite`);

--
-- Índices de tabela `irrf`
--
ALTER TABLE `irrf`
  ADD PRIMARY KEY (`id_irrf`),
  ADD KEY `fk_irrf_holerite` (`id_holerite`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  MODIFY `id_funcionario_ponto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `holerite`
--
ALTER TABLE `holerite`
  MODIFY `id_holerite` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `inss`
--
ALTER TABLE `inss`
  MODIFY `id_inss` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `irrf`
--
ALTER TABLE `irrf`
  MODIFY `id_irrf` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_funcionario_enredereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE;

--
-- Restrições para tabelas `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD CONSTRAINT `fk_funcionario_ponto` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `holerite`
--
ALTER TABLE `holerite`
  ADD CONSTRAINT `fk_holerite_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_holerite_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `inss`
--
ALTER TABLE `inss`
  ADD CONSTRAINT `fk_inss_holerite` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id_holerite`) ON DELETE CASCADE;

--
-- Restrições para tabelas `irrf`
--
ALTER TABLE `irrf`
  ADD CONSTRAINT `fk_irrf_holerite` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id_holerite`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
