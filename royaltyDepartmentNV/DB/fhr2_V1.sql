-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/03/2023 às 04:57
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fhr2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aliquota_folha`
--

CREATE TABLE `aliquota_folha` (
  `id_aliquota_folha` int(11) NOT NULL,
  `fgts` double(10,4) DEFAULT NULL,
  `inss` double(10,4) DEFAULT NULL,
  `sistema_s` double(10,4) DEFAULT NULL,
  `rat` double(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aliquota_folha`
--

INSERT INTO `aliquota_folha` (`id_aliquota_folha`, `fgts`, `inss`, `sistema_s`, `rat`) VALUES
(1, 0.0800, 0.2000, 0.0580, 0.0200);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aliquota_holerite`
--

CREATE TABLE `aliquota_holerite` (
  `id_aliquota_holerite` int(10) NOT NULL,
  `inss_salario_fx1` double(10,4) DEFAULT NULL,
  `inss_aliquota_fx1` double(10,4) DEFAULT NULL,
  `inss_salario_fx2` double(10,4) DEFAULT NULL,
  `inss_aliquota_fx2` double(10,4) DEFAULT NULL,
  `inss_salario_fx3` double(10,4) DEFAULT NULL,
  `inss_aliquota_fx3` double(10,4) DEFAULT NULL,
  `inss_salario_fx4` double(10,4) DEFAULT NULL,
  `inss_aliquota_fx4` double(10,4) DEFAULT NULL,
  `irrf_salario_fx1` double(10,4) DEFAULT NULL,
  `irrf_aliquota_fx1` double(10,4) DEFAULT NULL,
  `irrf_salario_fx2` double(10,4) DEFAULT NULL,
  `irrf_aliquota_fx2` double(10,4) DEFAULT NULL,
  `irrf_salario_fx3` double(10,4) DEFAULT NULL,
  `irrf_aliquota_fx3` double(10,4) DEFAULT NULL,
  `irrf_salario_fx4` double(10,4) DEFAULT NULL,
  `irrf_aliquota_fx4` double(10,4) DEFAULT NULL,
  `irrf_salario_fx5` double(10,4) DEFAULT NULL,
  `irrf_aliquota_fx5` double(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aliquota_holerite`
--

INSERT INTO `aliquota_holerite` (`id_aliquota_holerite`, `inss_salario_fx1`, `inss_aliquota_fx1`, `inss_salario_fx2`, `inss_aliquota_fx2`, `inss_salario_fx3`, `inss_aliquota_fx3`, `inss_salario_fx4`, `inss_aliquota_fx4`, `irrf_salario_fx1`, `irrf_aliquota_fx1`, `irrf_salario_fx2`, `irrf_aliquota_fx2`, `irrf_salario_fx3`, `irrf_aliquota_fx3`, `irrf_salario_fx4`, `irrf_aliquota_fx4`, `irrf_salario_fx5`, `irrf_aliquota_fx5`) VALUES
(1, 1213.5000, 0.0750, 2427.3500, 0.0900, 3642.0300, 0.1200, 7087.2200, 0.1400, 1903.9800, 0.0000, 2826.6500, 0.0750, 3751.0500, 0.1300, 4664.6800, 0.2250, 4664.6900, 0.2750);

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(8) NOT NULL,
  `departamento_nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento_nome`, `cargo`, `salario_base`, `updated_at`, `created_at`) VALUES
(1, 'Administrativo', 'Diretor', 5000.00, NULL, NULL),
(2, 'Financeiro', 'Diretor', 2450.00, NULL, NULL),
(7, 'Operacional', 'Diretor', 7000.00, NULL, NULL),
(8, 'Operacional', 'Gerente', 8000.00, NULL, NULL),
(14, 'RH', 'Gerente', 7000.00, NULL, NULL),
(21, 'Vendas', 'Coordenador', 7000.00, NULL, NULL),
(22, 'RH', 'Supervisor', 5000.00, '2023-03-06 03:11:57', '2023-03-06 03:11:57'),
(23, 'Operacional', 'Supervisor', 9000.00, '2023-03-06 04:04:16', '2023-03-06 04:04:16'),
(24, 'Vendas', 'Consultor', 7000.00, '2023-03-06 04:14:38', '2023-03-06 04:14:38'),
(25, 'T.I', 'Supervisor', 5000.00, '2023-03-06 04:56:15', '2023-03-06 04:56:15'),
(26, 'Comercial', 'Consultor', 6000.00, '2023-03-06 05:04:36', '2023-03-06 05:04:36'),
(27, 'Administrativo', 'Auxiliar', 4000.00, '2023-03-06 05:29:39', '2023-03-06 05:29:39'),
(28, 'Marketing', 'Supervisor', 7000.00, '2023-03-06 05:46:57', '2023-03-06 05:46:57'),
(29, 'T.I', 'Estagiário', 6000.00, '2023-03-06 05:55:59', '2023-03-06 05:55:59'),
(30, 'Marketing', 'Gerente', 5000.00, '2023-03-06 06:05:03', '2023-03-06 06:05:03'),
(31, 'Vendas', 'Supervisor', 3000.00, '2023-03-06 06:10:26', '2023-03-06 06:10:26'),
(32, 'RH', 'Gerente', 8000.00, '2023-03-06 06:17:01', '2023-03-06 06:17:01'),
(33, 'Financeiro', 'Diretor', 9000.00, '2023-03-06 06:21:43', '2023-03-06 06:21:43'),
(34, 'Vendas', 'Consultor', 9000.00, '2023-03-06 06:56:10', '2023-03-06 06:56:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(8) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` int(6) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `numero`, `cep`, `complemento`, `cidade`, `bairro`, `estado`, `pais`, `updated_at`, `created_at`) VALUES
(1, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(2, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(7, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(8, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(14, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(21, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(22, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 03:11:57', '2023-03-06 03:11:57'),
(23, 'Rua Geziael Pereira da Silva', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 04:04:16', '2023-03-06 04:04:16'),
(24, 'Rua Oito', 123, 11713400, 'Apartamento', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', '2023-03-06 04:14:38', '2023-03-06 04:14:38'),
(25, 'Rua Geziael Pereira da Silva', 123, 11713285, 'casa', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', '2023-03-06 04:56:15', '2023-03-06 04:56:15'),
(26, 'Praça da Sé', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 05:04:36', '2023-03-06 05:04:36'),
(27, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 05:29:39', '2023-03-06 05:29:39'),
(28, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 05:46:57', '2023-03-06 05:46:57'),
(29, 'Praça da Sé', 123, 11713285, 'casa', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', '2023-03-06 05:55:59', '2023-03-06 05:55:59'),
(30, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 06:05:03', '2023-03-06 06:05:03'),
(31, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 06:10:26', '2023-03-06 06:10:26'),
(32, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 06:17:01', '2023-03-06 06:17:01'),
(33, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 06:21:43', '2023-03-06 06:21:43'),
(34, 'Praça da Sé', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 06:56:10', '2023-03-06 06:56:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `folha_pagamento`
--

CREATE TABLE `folha_pagamento` (
  `id_folha` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `id_holerite` int(8) DEFAULT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  `data_folha` date DEFAULT NULL,
  `inss` double(10,2) DEFAULT NULL,
  `sistema_s` double(10,2) DEFAULT NULL,
  `rat` double(10,2) DEFAULT NULL,
  `fgts` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(8) NOT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  `id_endereco` int(8) DEFAULT NULL,
  `id_usuario` int(8) DEFAULT NULL,
  `nome_funcionario` varchar(50) DEFAULT NULL,
  `registro_geral` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `numero_dependentes` int(2) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_departamento`, `id_endereco`, `id_usuario`, `nome_funcionario`, `registro_geral`, `cpf`, `telefone`, `numero_dependentes`, `foto`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 'Administrador', '11.123.456-789', '132.456.891-11', '(11) 13121-3123', 0, 'App/View/Images/UserPictures/6368539327461.png', NULL, NULL),
(2, 2, 2, 2, 'Monteiro Lobato', '12.131.313-13', '121.313.131-31', '(11) 23457-891', 2, 'App/View/Images/UserPictures/636850c8cecbd.jpg', NULL, NULL),
(7, 7, 7, 7, 'Chuck Norris', '1234567890', '13245689', '12345789', 3, 'App/View/Images/UserPictures/63508f119b604.jpg', NULL, NULL),
(8, 8, 8, 8, 'Carla Diaz', '1234567890', '13245689', '12345789', 0, 'App/View/Images/UserPictures/6350ae6aaf397.png', NULL, NULL),
(14, 14, 14, 14, 'Rambo da Silva', '78946123', '13245689', '12345789', 0, 'App/View/Images/UserPictures/635ded3bb88a7.jpg', NULL, NULL),
(21, 21, 21, 21, 'Django da Silva', '78946123', '13245689', '12345789', 2, 'App/View/Images/UserPictures/63634cad1c6cb.jpg', NULL, NULL),
(22, 22, 22, 22, 'Maria Silva Santos', '12.232.131-3', '454.646.464-66', '(78) 79879-7897', 3, 'imagens/v8qgcbWeAUdfpTEe03weasxqkRWWx1Pou77rhHBF.jpg', '2023-03-06 03:11:57', '2023-03-06 03:11:57'),
(23, 23, 23, 23, 'Usop Silva', '12.131.213-1', '121.213.213-13', '(54) 54646-5666', 0, 'imagens/cyuY3PZdBiZ4gD5phr2uzPHZcZoAPSbrgtFdX922.jpg', '2023-03-06 04:04:16', '2023-03-06 04:04:16'),
(24, 24, 24, 24, 'Luffy Oliveira', '78.979.797-9', '454.646.464-64', '(12) 13122-1313', 0, 'imagens/C9KzmC59r4mHI2vljWag7f3SV0DAhEOXk50k42VN.jpg', '2023-03-06 04:14:38', '2023-03-06 04:14:38'),
(25, 25, 25, 25, 'Zoro Santos', '78.797.979-7', '464.646.545-46', '(12) 13131-3133', 5, 'imagens/uLKod4UtYyNJ59T6moH2IeKYyRTpNjbgLxbe5HzN.jpg', '2023-03-06 04:56:15', '2023-03-06 04:56:15'),
(26, 26, 26, 26, 'Sanji Silveira', '45.645.646-4', '554.646.464-64', '(97) 98789-7997', 4, 'imagens/aURWEglw3uesrxGWeAc6gerPX3MdROQjpR6fWxRc.jpg', '2023-03-06 05:04:36', '2023-03-06 05:04:36'),
(27, 27, 27, 27, 'Nami Swift', '12.121.313-1', '454.546.464-64', '(78) 79797-9798', 0, 'imagens/zarJ4XEZjfuVL2J3jBRtZRYqIPhVh66h3D3ckE0w.jpg', '2023-03-06 05:29:39', '2023-03-06 05:29:39'),
(28, 28, 28, 28, 'Brook Uhuhu', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/V8LbrLKON3lFd94iXAP5d46JBfXQjvFXzT23tg9F.jpg', '2023-03-06 05:46:57', '2023-03-06 05:46:57'),
(29, 29, 29, 29, 'Frank Super', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/3cqzs0F87Or0du5XURvrYPgUxsdg2ReyY9A5EU08.jpg', '2023-03-06 05:55:59', '2023-03-06 05:55:59'),
(30, 30, 30, 30, 'Nico Robin', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 1, 'imagens/XXCjVZWOtdmmGjkKBfXjByO7MYw0KOLc7TeIW6zB.jpg', '2023-03-06 06:05:03', '2023-03-06 06:05:03'),
(31, 31, 31, 31, 'Chopper Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/10znwfXe64F8s6aqJKv2nf17iNJvP5ueNk2cjMlb.jpg', '2023-03-06 06:10:26', '2023-03-06 06:10:26'),
(32, 32, 32, 32, 'Goku Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 2, 'imagens/JaxCBcPva72PKhWjY5Afik6hVACZ9Q6CpZWqtq3g.jpg', '2023-03-06 06:17:01', '2023-03-06 06:17:01'),
(33, 33, 33, 33, 'Vegeta Silva', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 1, 'imagens/QnvAEHbyeQ1oRviQ696iTfqXP4yQSppU0rKO6TaG.jpg', '2023-03-06 06:21:43', '2023-03-06 06:21:43'),
(34, 34, 34, 34, 'Gohan Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 2, 'imagens/PPls4WpCiwn5CIFudScdRzCJyhNTaW1AuxFv61pK.jpg', '2023-03-06 06:56:10', '2023-03-06 06:56:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario_ponto`
--

INSERT INTO `funcionario_ponto` (`id_funcionario_ponto`, `id_funcionario`, `diames`, `entrada`, `almoco_sai`, `almoco_che`, `saida`, `horas_trabalhadas`) VALUES
(2, 1, '2022-09-19', '21:02:41', '21:02:43', '21:02:44', '21:02:45', '00:00:03'),
(3, 7, '2022-10-19', '23:16:51', '23:16:53', '23:16:54', '23:16:55', '00:00:03'),
(4, 1, '2022-10-20', '00:36:35', '00:36:37', '00:36:39', '00:36:41', '00:00:04'),
(9, 1, '2022-10-30', '00:02:04', '00:02:09', '00:02:10', '00:02:12', '00:00:07'),
(10, 14, '2022-10-30', '00:21:25', '00:21:26', '00:21:28', '00:21:29', '00:00:02'),
(11, 1, '2022-11-02', '15:11:43', '15:11:45', '15:11:47', '15:11:49', '00:00:04'),
(12, 2, '2022-11-02', '18:19:36', '18:19:39', '18:19:40', '18:19:40', '00:00:03'),
(13, 1, '2022-11-06', '00:28:41', '00:28:44', '00:28:45', '00:28:46', '00:00:04'),
(16, 1, '2023-02-21', '04:22:33', '04:22:36', '04:23:02', '04:23:05', '00:00:00'),
(17, 2, '2023-02-21', '04:31:46', '04:32:00', '04:32:18', '04:32:45', '00:00:00'),
(18, 7, '2023-02-21', '16:14:56', '16:14:59', '16:15:02', '16:15:04', '00:00:00'),
(19, 1, '2023-02-22', '17:04:52', '17:06:23', '17:08:57', '17:18:50', '00:00:00'),
(20, 1, '2023-02-23', '02:44:48', '02:46:29', '02:46:53', '02:47:02', '00:00:00'),
(21, 1, '2023-03-02', '03:13:23', '03:23:06', '03:23:45', '03:24:20', '00:00:00'),
(22, 2, '2023-03-02', '03:23:29', '03:25:36', '03:26:11', '03:26:15', '00:00:00'),
(23, 1, '2023-03-05', '18:41:23', '18:41:46', '18:41:47', '18:42:25', '00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `holerite`
--

CREATE TABLE `holerite` (
  `id_holerite` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  `data_holerite` date DEFAULT NULL,
  `inss_fx1` double(10,2) DEFAULT NULL,
  `inss_fx2` double(10,2) DEFAULT NULL,
  `inss_fx3` double(10,2) DEFAULT NULL,
  `inss_fx4` double(10,2) DEFAULT NULL,
  `inss_total` double(10,2) DEFAULT NULL,
  `irrf_fx1` double(10,2) DEFAULT NULL,
  `irrf_fx2` double(10,2) DEFAULT NULL,
  `irrf_fx3` double(10,2) DEFAULT NULL,
  `irrf_fx4` double(10,2) DEFAULT NULL,
  `irrf_fx5` double(10,2) DEFAULT NULL,
  `irrf_total` double(10,2) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL,
  `salario_liquido` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `holerite`
--

INSERT INTO `holerite` (`id_holerite`, `id_funcionario`, `id_departamento`, `data_holerite`, `inss_fx1`, `inss_fx2`, `inss_fx3`, `inss_fx4`, `inss_total`, `irrf_fx1`, `irrf_fx2`, `irrf_fx3`, `irrf_fx4`, `irrf_fx5`, `irrf_total`, `salario_base`, `salario_liquido`) VALUES
(1, 1, 1, '2022-10-29', 90.90, 109.38, 145.64, 190.25, 536.18, 0.00, 69.20, 138.66, 160.37, 0.00, 368.23, 5000.00, 3875.59),
(2, 2, 2, '2022-10-29', 90.90, 109.38, 2.72, 0.00, 203.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2450.00, 2027.00),
(7, 7, 7, '2022-10-29', 90.90, 109.38, 145.64, 470.25, 816.18, 0.00, 69.20, 138.66, 205.56, 260.53, 673.95, 7000.00, 5289.87),
(8, 8, 8, '2022-10-29', 90.90, 109.38, 145.64, 482.47, 828.39, 0.00, 69.20, 138.66, 205.56, 688.58, 1102.00, 8000.00, 5849.61),
(14, 14, 14, '2022-10-30', 90.90, 109.38, 145.64, 470.25, 816.18, 0.00, 69.20, 138.66, 205.56, 416.94, 830.36, 7000.00, 5133.46),
(21, 21, 21, '2022-11-03', 90.90, 109.38, 145.64, 470.25, 816.18, 0.00, 69.20, 138.66, 205.57, 313.49, 726.92, 7000.00, 5236.91),
(32, 2, 2, '2022-11-06', 91.01, 109.25, 2.72, 0.00, 202.97, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2450.00, 2027.03),
(37, 7, 7, '2022-11-06', 91.01, 109.25, 145.76, 470.11, 816.13, 0.00, 69.20, 120.17, 205.57, 261.36, 656.30, 7000.00, 5307.57),
(39, 14, 14, '2022-11-06', 91.01, 109.25, 145.76, 470.11, 816.13, 0.00, 69.20, 120.17, 205.57, 417.78, 812.71, 7000.00, 5151.15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(8) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` int(8) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `recuperar` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `role`, `senha`, `recuperar`, `updated_at`, `created_at`) VALUES
(1, 'admin@email.com', 1, '$2y$10$Rlo/NDfTk7y65C94Rv2Hseimm6LMTZviSmONgjuUxMo.vHCuXpeqa', NULL, '2023-03-05 22:29:38', NULL),
(2, 'lobato@email.com', 3, '$2y$10$jlV/G/v2F8iF2sou36sAOejYN1czDcAtQOP0TrC0kT5WYh6PDArWu', NULL, '2023-03-05 22:29:38', NULL),
(7, 'norris@email.com', 3, '$2y$10$JKpOpDarmJNBUHlzrslhBefXt36FxyXM8nq6cPy74WxcE.EjqjQ..', NULL, '2023-03-05 22:29:38', NULL),
(8, 'diaz@email.com', 3, '$2y$10$lE7aP97cr0BWU.KnhgKX9OmrWMDzhsZtlw3hjsAtwRYRb7xUq6eMq', NULL, '2023-03-05 22:29:38', NULL),
(14, 'rambo@email.com', 3, '$2y$10$tlz5JKwY6YH6XDPYxPLsquVu.R/Z5x0aJY30KX.vz1f0MoDzdY8Uq', NULL, '2023-03-05 22:29:38', NULL),
(21, 'django@email.com', 3, '$2y$10$mwiyEEWbcqhhGBd.uLuF/eWWj2VwKukYDGCPJxQ0qYtTSuAMkc472', NULL, '2023-03-05 22:29:38', NULL),
(22, 'maria@email.com', 3, '$2y$10$q7FF0MgZa5ALU3XB3Z0w9OT/8jNEvDSs/UKVucV7QMo0m2n/GObE.', NULL, '2023-03-06 03:11:57', '2023-03-06 03:11:57'),
(23, 'usop@email.com', 3, '$2y$10$pjA.N95rnbCiHW4.5RMB3uzw.ZcvkV2rFYnIYY09DYOZiSeAJkH.W', NULL, '2023-03-06 04:04:16', '2023-03-06 04:04:16'),
(24, 'luffy@email.com', 3, '$2y$10$.o5y90mAOrce5zIyexf99Oske7k1lzNVGsL0YKCwNVY8w4e6lTUI6', NULL, '2023-03-06 04:14:38', '2023-03-06 04:14:38'),
(25, 'zoro@email.com', 3, '$2y$10$08m/F1CBIWjdCYtvj5506OQTt4jpZEl.FFla6Gv/KyTrEQUH68IYK', NULL, '2023-03-06 04:56:15', '2023-03-06 04:56:15'),
(26, 'sanji@email.com', 3, '$2y$10$5oLiUyOG.ZaGjvsoFyzXq.W/Mlqajc3cb1IN7aqr3/I7gBagknaq2', NULL, '2023-03-06 05:04:36', '2023-03-06 05:04:36'),
(27, 'nami@email.com', 3, '$2y$10$Ex/Luju84U3.Lzvy2fN5qurT45j2ji5KXmkAGDiLLzUc6gAi9UUpq', NULL, '2023-03-06 05:29:39', '2023-03-06 05:29:39'),
(28, 'brook@email.com', 3, '$2y$10$bfinmopqwpnq7IRbeS4RNOTeFnrSRBjFs/ey312HW.vwAbrJ9YgOm', NULL, '2023-03-06 05:46:57', '2023-03-06 05:46:57'),
(29, 'frank@email.com', 3, '$2y$10$vG3w645k5UMWiLkYHhYFuui8wViDnAAYfIfpTMa53GbgFThnFwLzC', NULL, '2023-03-06 05:55:59', '2023-03-06 05:55:59'),
(30, 'robin@email.com', 3, '$2y$10$1T7tm4FSCH4AcgNx6TSfquFLwptFL7OTU39ibMYjnlQuoUoOvXj2i', NULL, '2023-03-06 06:05:03', '2023-03-06 06:05:03'),
(31, 'chopper@email.com', 3, '$2y$10$0kLkvPl3fsd2mdl4mNMA1OQ7ZS5DRLcEGUkWGB4cQcCkc3DUQrnRO', NULL, '2023-03-06 06:10:26', '2023-03-06 06:10:26'),
(32, 'goku@email.com', 3, '$2y$10$NBwjBcy0CxSVhWOQXYgPKeoetT8AMskBWoWPKwpPKY5MXtD6XfAeK', NULL, '2023-03-06 06:17:01', '2023-03-06 06:17:01'),
(33, 'vegeta@email.com', 3, '$2y$10$uBBWu02kjs7SYgf2j5F9IO5nz6RnZogGa9TCA6E3i5rqyZDZA5CWa', NULL, '2023-03-06 06:21:43', '2023-03-06 06:21:43'),
(34, 'gohan@email.com', 3, '$2y$10$IJrA/kgMOsFl5dBeIFma4uD2zB9vy9vtfwvx/4LUNxPkyTaH4kSda', NULL, '2023-03-06 06:56:10', '2023-03-06 06:56:10');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aliquota_folha`
--
ALTER TABLE `aliquota_folha`
  ADD PRIMARY KEY (`id_aliquota_folha`);

--
-- Índices de tabela `aliquota_holerite`
--
ALTER TABLE `aliquota_holerite`
  ADD PRIMARY KEY (`id_aliquota_holerite`);

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
-- Índices de tabela `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD PRIMARY KEY (`id_folha`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_holerite` (`id_holerite`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_departamento_funcionario` (`id_departamento`),
  ADD KEY `fk_endereco_funcionario` (`id_endereco`),
  ADD KEY `fk_usuario_funcionario` (`id_usuario`);

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
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aliquota_folha`
--
ALTER TABLE `aliquota_folha`
  MODIFY `id_aliquota_folha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `aliquota_holerite`
--
ALTER TABLE `aliquota_holerite`
  MODIFY `id_aliquota_holerite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  MODIFY `id_folha` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  MODIFY `id_funcionario_ponto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `holerite`
--
ALTER TABLE `holerite`
  MODIFY `id_holerite` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD CONSTRAINT `fk_folha_departamento` FOREIGN KEY (`id_holerite`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_folha_funcionario` FOREIGN KEY (`id_holerite`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_folha_holerite` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id_holerite`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_departamento_funcionario` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_endereco_funcionario` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_funcionario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
