-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11/09/2022 às 15:29
-- Versão do servidor: 5.7.36
-- Versão do PHP: 7.4.26

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

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(8) NOT NULL AUTO_INCREMENT,
  `dp_nome` varchar(50) DEFAULT NULL,
  `id_local` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`),
  KEY `fk_departamento_local` (`id_local`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `dp_nome`, `id_local`) VALUES
(1, 'Marketing', NULL),
(2, 'Finanças', NULL),
(3, 'Finanças', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(8) NOT NULL AUTO_INCREMENT,
  `funcionarioNome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `numeroDependentes` int(10) NOT NULL,
  `salarioBase` decimal(10,2) NOT NULL,
  `recuperar` varchar(255) DEFAULT NULL,
  `nomeFoto` varchar(100) NOT NULL,
  `caminho` varchar(100) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `funcionarioNome`, `email`, `telefone`, `senha`, `rg`, `cpf`, `numeroDependentes`, `salarioBase`, `recuperar`, `nomeFoto`, `path`) VALUES
(1, 'Administrador', 'admin@email.com', '12345789', '$2y$10$r6SU3qVCH/t.e/aLyXPzSu6IhYNotw02ynFUUfah1VkYWm2OYifqG', '1234567890', 13245689, 2, '5000.00', '', '', ''),
(2, 'Monteiro Lobato', 'luizmsr0@gmail.com', '12345789', '$2y$10$Ur5C8wZTIXpyczbV.tWfyex9ua4tbHznI2nHrQ89jYIoQdoW2BLvu', '1234567890', 13245689, 0, '2450.00', '', '', ''),
(3, 'Carla Diaz', 'diaz@email.com', '12345789', '$2y$10$cp08lF2Mc3jlMuuxx.awPuXCWRlBa0D3kSc99dccsF7jHHxCGKau.', '1234567890', 13245689, 0, '2450.00', NULL, '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario_trabalho`
--

DROP TABLE IF EXISTS `funcionario_trabalho`;
CREATE TABLE IF NOT EXISTS `funcionario_trabalho` (
  `id_funcionario_trabalho` int(8) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(8) DEFAULT NULL,
  `comissao` decimal(10,2) DEFAULT NULL,
  `salarioBase` decimal(10,2) DEFAULT NULL,
  `hora_trabalho` decimal(10,2) DEFAULT NULL,
  `hora_feita` decimal(10,2) DEFAULT NULL,
  `assumir_funcao` date DEFAULT NULL,
  `id_trabalho` int(8) DEFAULT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_funcionario_trabalho`),
  KEY `fk_funcionario_trabalho_funcionario` (`id_funcionario`),
  KEY `fk_funcionario_trabalho_trabalho` (`id_trabalho`),
  KEY `fk_funcionario_trabalho_departamento` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `localrh`
--

DROP TABLE IF EXISTS `localrh`;
CREATE TABLE IF NOT EXISTS `localrh` (
  `id_local` int(8) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(200) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `localrh`
--

INSERT INTO `localrh` (`id_local`, `endereco`, `estado`, `pais`) VALUES
(1, 'Rua: Praça da Sé, Nº 1214, casa CEP: 01001901, Bairro: Sé, Cidade: São Paulo', 'SP', 'Brasil'),
(2, 'Rua: Rua Geziael Pereira da Silva, Nº 1615, casa CEP: 11713285, Bairro: Esmeralda, Cidade: Praia Grande', 'SP', 'Brasil'),
(3, 'Rua: Praça da Sé, Nº 456, casa CEP: 01001901, Bairro: Sé, Cidade: São Paulo', 'SP', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trabalho`
--

DROP TABLE IF EXISTS `trabalho`;
CREATE TABLE IF NOT EXISTS `trabalho` (
  `id_trabalho` int(8) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(50) DEFAULT NULL,
  `salarioLiquido` decimal(10,2) DEFAULT NULL,
  `inss` decimal(10,2) DEFAULT NULL,
  `irrf` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_trabalho`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `cargo`, `salarioLiquido`, `inss`, `irrf`) VALUES
(1, 'Gerente', '3960.91', '536.18', '282.92'),
(2, 'Estagiário', '2001.28', '203.00', '25.73'),
(3, 'Gerente', '2001.28', '203.00', '25.73');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_local` FOREIGN KEY (`id_local`) REFERENCES `localrh` (`id_local`);

--
-- Restrições para tabelas `funcionario_trabalho`
--
ALTER TABLE `funcionario_trabalho`
  ADD CONSTRAINT `fk_funcionario_trabalho_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`),
  ADD CONSTRAINT `fk_funcionario_trabalho_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `fk_funcionario_trabalho_trabalho` FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id_trabalho`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
