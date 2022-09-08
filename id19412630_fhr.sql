-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08-Set-2022 às 17:10
-- Versão do servidor: 10.5.16-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id19412630_fhr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(8) NOT NULL,
  `dp_nome` varchar(50) DEFAULT NULL,
  `id_local` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `dp_nome`, `id_local`) VALUES
(1, 'Marketing', NULL),
(2, 'Finanças', NULL),
(3, 'Finanças', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(8) NOT NULL,
  `funcionarioNome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `numeroDependentes` int(10) NOT NULL,
  `salarioBase` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `funcionarioNome`, `email`, `telefone`, `senha`, `rg`, `cpf`, `numeroDependentes`, `salarioBase`) VALUES
(1, 'Administrador', 'admin@email.com', '12345789', '$2y$10$r6SU3qVCH/t.e/aLyXPzSu6IhYNotw02ynFUUfah1VkYWm2OYifqG', '1234567890', 13245689, 2, 5000.00),
(2, 'Monteiro Lobato', 'lobato@email.com', '12345789', '$2y$10$1XqGUSq/FsA9MDBaV7lYHucMKliSlf.qZ8yOg/DqqwhxYxcP5FVcy', '1234567890', 13245689, 0, 2450.00),
(3, 'Carla Diaz', 'diaz@email.com', '12345789', '$2y$10$cp08lF2Mc3jlMuuxx.awPuXCWRlBa0D3kSc99dccsF7jHHxCGKau.', '1234567890', 13245689, 0, 2450.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_trabalho`
--

CREATE TABLE `funcionario_trabalho` (
  `id_funcionario_trabalho` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `comissao` decimal(10,2) DEFAULT NULL,
  `salarioBase` decimal(10,2) DEFAULT NULL,
  `hora_trabalho` decimal(10,2) DEFAULT NULL,
  `hora_feita` decimal(10,2) DEFAULT NULL,
  `assumir_funcao` date DEFAULT NULL,
  `id_trabalho` int(8) DEFAULT NULL,
  `id_departamento` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localrh`
--

CREATE TABLE `localrh` (
  `id_local` int(8) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `localrh`
--

INSERT INTO `localrh` (`id_local`, `endereco`, `estado`, `pais`) VALUES
(1, 'Rua: Praça da Sé, Nº 1214, casa CEP: 01001901, Bairro: Sé, Cidade: São Paulo', 'SP', 'Brasil'),
(2, 'Rua: Rua Geziael Pereira da Silva, Nº 1615, casa CEP: 11713285, Bairro: Esmeralda, Cidade: Praia Grande', 'SP', 'Brasil'),
(3, 'Rua: Praça da Sé, Nº 456, casa CEP: 01001901, Bairro: Sé, Cidade: São Paulo', 'SP', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id_trabalho` int(8) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salarioLiquido` decimal(10,2) DEFAULT NULL,
  `inss` decimal(10,2) DEFAULT NULL,
  `irrf` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `cargo`, `salarioLiquido`, `inss`, `irrf`) VALUES
(1, 'Gerente', 3960.91, 536.18, 282.92),
(2, 'Estagiário', 2001.28, 203.00, 25.73),
(3, 'Gerente', 2001.28, 203.00, 25.73);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `fk_departamento_local` (`id_local`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices para tabela `funcionario_trabalho`
--
ALTER TABLE `funcionario_trabalho`
  ADD PRIMARY KEY (`id_funcionario_trabalho`),
  ADD KEY `fk_funcionario_trabalho_funcionario` (`id_funcionario`),
  ADD KEY `fk_funcionario_trabalho_trabalho` (`id_trabalho`),
  ADD KEY `fk_funcionario_trabalho_departamento` (`id_departamento`);

--
-- Índices para tabela `localrh`
--
ALTER TABLE `localrh`
  ADD PRIMARY KEY (`id_local`);

--
-- Índices para tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`id_trabalho`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario_trabalho`
--
ALTER TABLE `funcionario_trabalho`
  MODIFY `id_funcionario_trabalho` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `localrh`
--
ALTER TABLE `localrh`
  MODIFY `id_local` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_local` FOREIGN KEY (`id_local`) REFERENCES `localrh` (`id_local`);

--
-- Limitadores para a tabela `funcionario_trabalho`
--
ALTER TABLE `funcionario_trabalho`
  ADD CONSTRAINT `fk_funcionario_trabalho_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`),
  ADD CONSTRAINT `fk_funcionario_trabalho_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `fk_funcionario_trabalho_trabalho` FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id_trabalho`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
