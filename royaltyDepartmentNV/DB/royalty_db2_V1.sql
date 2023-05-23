-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royalty_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departamento_nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento_nome`, `cargo`, `salario_base`, `created_at`, `updated_at`) VALUES
(1, 'Administrativo', 'Diretor', 5000.00, NULL, NULL),
(2, 'Financeiro', 'Diretor', 2450.00, NULL, NULL),
(7, 'Operacional', 'Diretor', 7000.00, NULL, NULL),
(14, 'RH', 'Gerente', 7000.00, NULL, NULL),
(21, 'Vendas', 'Gerente', 7000.00, NULL, '2023-05-14 02:54:22'),
(22, 'RH', 'Supervisor', 5000.00, '2023-03-06 09:11:57', '2023-03-06 09:11:57'),
(23, 'Operacional', 'Supervisor', 9000.00, '2023-03-06 10:04:16', '2023-03-06 10:04:16'),
(24, 'Vendas', 'Consultor', 7000.00, '2023-03-06 10:14:38', '2023-03-06 10:14:38'),
(25, 'T.I', 'Supervisor', 5000.00, '2023-03-06 10:56:15', '2023-03-06 10:56:15'),
(26, 'Comercial', 'Consultor', 6000.00, '2023-03-06 11:04:36', '2023-03-06 11:04:36'),
(27, 'Administrativo', 'Auxiliar', 4000.00, '2023-03-06 11:29:39', '2023-03-06 11:29:39'),
(28, 'Marketing', 'Supervisor', 7000.00, '2023-03-06 11:46:57', '2023-03-06 11:46:57'),
(29, 'T.I', 'Estagiário', 6000.00, '2023-03-06 11:55:59', '2023-03-06 11:55:59'),
(30, 'Marketing', 'Gerente', 5000.00, '2023-03-06 12:05:03', '2023-03-06 12:05:03'),
(31, 'Vendas', 'Supervisor', 3000.00, '2023-03-06 12:10:26', '2023-03-06 12:10:26'),
(32, 'RH', 'Gerente', 8000.00, '2023-03-06 12:17:01', '2023-03-06 12:17:01'),
(37, 'Financeiro', 'Gerente', 7000.00, '2023-04-17 04:58:20', '2023-04-17 04:58:20'),
(38, 'Operacional', 'Gerente', 7000.00, '2023-05-07 02:57:48', '2023-05-07 02:57:48'),
(39, 'Financeiro', 'Consultor', 7000.00, '2023-05-14 02:56:51', '2023-05-14 02:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `enderecos`
--

CREATE TABLE `enderecos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` smallint(5) UNSIGNED DEFAULT NULL,
  `cep` int(10) UNSIGNED DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `status` enum('ativado','desativado') NOT NULL DEFAULT 'ativado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `numero`, `cep`, `complemento`, `cidade`, `bairro`, `estado`, `pais`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', NULL, NULL),
(2, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', NULL, '2023-05-21 02:14:52'),
(7, 'Praça da Sé', 12345, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', NULL, '2023-04-17 01:31:42'),
(14, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', NULL, '2023-05-14 02:37:21'),
(21, 'Praça da Sé', 12345, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', NULL, '2023-05-14 02:54:22'),
(22, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 09:11:57', '2023-03-06 09:11:57'),
(23, 'Rua Geziael Pereira da Silva', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 10:04:16', '2023-03-06 10:04:16'),
(24, 'Rua Oito', 123, 11713400, 'Apartamento', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', 'ativado', '2023-03-06 10:14:38', '2023-03-06 10:14:38'),
(25, 'Rua Geziael Pereira da Silva', 123, 11713285, 'casa', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', 'ativado', '2023-03-06 10:56:15', '2023-03-06 10:56:15'),
(26, 'Praça da Sé', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 11:04:36', '2023-03-06 11:04:36'),
(27, 'Praça da Sé', 1212, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 11:29:39', '2023-05-13 23:34:07'),
(28, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 11:46:57', '2023-03-06 11:46:57'),
(29, 'Praça da Sé', 123, 11713285, 'casa', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', 'ativado', '2023-03-06 11:55:59', '2023-03-06 11:55:59'),
(30, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 12:05:03', '2023-03-06 12:05:03'),
(31, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 12:10:26', '2023-03-06 12:10:26'),
(32, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-03-06 12:17:01', '2023-03-06 12:17:01'),
(37, 'Praça da Sé', 456, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-04-17 04:58:20', '2023-04-17 04:58:20'),
(38, 'Rua Geziael Pereira da Silva', 456, 11713285, 'Apartamento', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', 'desativado', '2023-05-07 02:57:48', '2023-05-07 02:59:46'),
(39, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', 'ativado', '2023-05-14 02:56:51', '2023-05-14 03:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `folha_pagamentos`
--

CREATE TABLE `folha_pagamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `data_folha` date NOT NULL,
  `salario_base` double(10,2) NOT NULL,
  `inss` double(10,2) DEFAULT NULL,
  `sistema_s` double(10,2) DEFAULT NULL,
  `rat` double(10,2) DEFAULT NULL,
  `fgts` double(10,2) DEFAULT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folha_pagamentos`
--

INSERT INTO `folha_pagamentos` (`id`, `id_funcionario`, `data_folha`, `salario_base`, `inss`, `sistema_s`, `rat`, `fgts`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-20', 5000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(2, 2, '2023-06-20', 2450.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(3, 7, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(4, 14, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(5, 21, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(6, 22, '2023-06-20', 5000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(7, 23, '2023-06-20', 9000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(8, 24, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(9, 25, '2023-06-20', 5000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(10, 26, '2023-06-20', 6000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(11, 27, '2023-06-20', 4000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(12, 28, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(13, 29, '2023-06-20', 6000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(14, 30, '2023-06-20', 5000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(15, 31, '2023-06-20', 3000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(16, 32, '2023-06-20', 8000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(17, 37, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL),
(18, 39, '2023-06-20', 7000.00, 21490.00, 6232.10, 2149.00, 8596.00, 145917.10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_departamento` bigint(20) UNSIGNED NOT NULL,
  `id_endereco` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nome_funcionario` varchar(50) DEFAULT NULL,
  `registro_geral` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `numero_dependentes` tinyint(4) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('ativado','desativado') NOT NULL DEFAULT 'ativado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `id_departamento`, `id_endereco`, `id_usuario`, `nome_funcionario`, `registro_geral`, `cpf`, `telefone`, `numero_dependentes`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Administrador', '11.123.456-789', '132.456.891-11', '(11) 13121-3123', 0, 'imagens/6C8PJOYi0h1OGUtXXnd3jZbYcBzNeyRyLlUdlJkU.jpg', 'ativado', NULL, '2023-04-16 05:37:13'),
(2, 2, 2, 2, 'Monteiro Lobato', '12.131.313-1', '121.313.131-31', '(11) 23457-891', 2, 'imagens/HTIcnTaIeMouT4E11nP1UuTaLtnf5oy5OBfHGTVl.jpg', 'ativado', NULL, '2023-05-21 02:14:52'),
(7, 7, 7, 7, 'Chuck Norris', '12.345.678-9', '132.456.891-22', '(12) 34578-9121', 3, 'imagens/rAk2VR2hz2MoE1a7zkc15jbvxOIq98jesDKHBxZ4.jpg', 'ativado', NULL, '2023-04-17 01:30:41'),
(14, 14, 14, 14, 'Rambo da Silva', '12.131.213-1', '121.313.131-31', '12345789', 0, 'imagens/7E0P4ABKF9sH3RSe5MaGXkaRR8lZAh9a9WT1JGnt.jpg', 'ativado', NULL, '2023-05-14 02:37:21'),
(21, 21, 21, 21, 'Django dos Santos', '78.946.123-1', '132.456.891-21', '(12) 34571-2189', 3, 'imagens/97fq4ubMjKABWe27xBngaVlXoZcxtIH8jbXhmOxj.jpg', 'ativado', NULL, '2023-05-14 02:54:22'),
(22, 22, 22, 22, 'Maria Silva Santos', '12.232.131-3', '454.646.464-66', '(78) 79879-7897', 3, 'imagens/v8qgcbWeAUdfpTEe03weasxqkRWWx1Pou77rhHBF.jpg', 'ativado', '2023-03-06 09:11:57', '2023-03-06 09:11:57'),
(23, 23, 23, 23, 'Usop Silva', '12.131.213-1', '121.213.213-13', '(54) 54646-5666', 0, 'imagens/cyuY3PZdBiZ4gD5phr2uzPHZcZoAPSbrgtFdX922.jpg', 'ativado', '2023-03-06 10:04:16', '2023-03-06 10:04:16'),
(24, 24, 24, 24, 'Luffy Oliveira', '78.979.797-9', '454.646.464-64', '(12) 13122-1313', 0, 'imagens/C9KzmC59r4mHI2vljWag7f3SV0DAhEOXk50k42VN.jpg', 'ativado', '2023-03-06 10:14:38', '2023-03-06 10:14:38'),
(25, 25, 25, 25, 'Zoro Santos', '78.797.979-7', '464.646.545-46', '(12) 13131-3133', 5, 'imagens/uLKod4UtYyNJ59T6moH2IeKYyRTpNjbgLxbe5HzN.jpg', 'ativado', '2023-03-06 10:56:15', '2023-03-06 10:56:15'),
(26, 26, 26, 26, 'Sanji Silveira', '45.645.646-4', '554.646.464-64', '(97) 98789-7997', 4, 'imagens/aURWEglw3uesrxGWeAc6gerPX3MdROQjpR6fWxRc.jpg', 'ativado', '2023-03-06 11:04:36', '2023-03-06 11:04:36'),
(27, 27, 27, 27, 'Nami Swift', '12.121.313-0', '454.546.464-64', '(78) 79797-9798', 1, 'imagens/zarJ4XEZjfuVL2J3jBRtZRYqIPhVh66h3D3ckE0w.jpg', 'ativado', '2023-03-06 11:29:39', '2023-05-13 23:47:18'),
(28, 28, 28, 28, 'Brook Uhuhu', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/V8LbrLKON3lFd94iXAP5d46JBfXQjvFXzT23tg9F.jpg', 'ativado', '2023-03-06 11:46:57', '2023-03-06 11:46:57'),
(29, 29, 29, 29, 'Frank Super', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/3cqzs0F87Or0du5XURvrYPgUxsdg2ReyY9A5EU08.jpg', 'ativado', '2023-03-06 11:55:59', '2023-03-06 11:55:59'),
(30, 30, 30, 30, 'Nico Robin', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 1, 'imagens/XXCjVZWOtdmmGjkKBfXjByO7MYw0KOLc7TeIW6zB.jpg', 'ativado', '2023-03-06 12:05:03', '2023-03-06 12:05:03'),
(31, 31, 31, 31, 'Chopper Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/10znwfXe64F8s6aqJKv2nf17iNJvP5ueNk2cjMlb.jpg', 'ativado', '2023-03-06 12:10:26', '2023-03-06 12:10:26'),
(32, 32, 32, 32, 'Goku Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 2, 'imagens/JaxCBcPva72PKhWjY5Afik6hVACZ9Q6CpZWqtq3g.jpg', 'ativado', '2023-03-06 12:17:01', '2023-03-06 12:17:01'),
(37, 37, 37, 37, 'teste da silva', '11.313.131-3', '213.131.313-13', '(54) 65464-6466', 5, 'imagens/gF5A8Gj2sCuuzO1Qqp3TZ86mWl3cdeZvih3zc1Z0.jpg', 'ativado', '2023-04-17 04:58:20', '2023-04-17 04:58:20'),
(38, 38, 38, 38, 'teste da silva', '12.131.213-1', '121.313.131-31', '(55) 13997-5739', 4, 'imagens/KLxmtzMNdNDNMKvoaQDv2PuBTW8JpphxxS6P80I8.jpg', 'desativado', '2023-05-07 02:57:48', '2023-05-07 02:59:46'),
(39, 39, 39, 39, 'Teste da silva Sauto', '12.131.313-1', '131.313.131-31', '(13) 13131-3131', 2, 'imagens/fx8AKrC9TvBZDfe9Qa03eL8hByzLIZmUvxqc2mnU.jpg', 'ativado', '2023-05-14 02:56:52', '2023-05-14 03:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario_pontos`
--

CREATE TABLE `funcionario_pontos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `diames` date DEFAULT NULL,
  `entrada` time DEFAULT NULL,
  `almoco_sai` time DEFAULT NULL,
  `almoco_che` time DEFAULT NULL,
  `saida` time DEFAULT NULL,
  `horas_trabalhadas` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funcionario_pontos`
--

INSERT INTO `funcionario_pontos` (`id`, `id_funcionario`, `diames`, `entrada`, `almoco_sai`, `almoco_che`, `saida`, `horas_trabalhadas`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-09-19', '21:02:41', '21:02:43', '21:02:44', '21:02:45', '00:00:03', NULL, NULL),
(3, 7, '2022-10-19', '23:16:51', '23:16:53', '23:16:54', '23:16:55', '00:00:03', NULL, NULL),
(4, 1, '2022-10-20', '00:36:35', '00:36:37', '00:36:39', '00:36:41', '00:00:04', NULL, NULL),
(9, 1, '2022-10-30', '00:02:04', '00:02:09', '00:02:10', '00:02:12', '00:00:07', NULL, NULL),
(10, 14, '2022-10-30', '00:21:25', '00:21:26', '00:21:28', '00:21:29', '00:00:02', NULL, NULL),
(11, 1, '2022-11-02', '15:11:43', '15:11:45', '15:11:47', '15:11:49', '00:00:04', NULL, NULL),
(12, 2, '2022-11-02', '18:19:36', '18:19:39', '18:19:40', '18:19:40', '00:00:03', NULL, NULL),
(13, 1, '2022-11-06', '00:28:41', '00:28:44', '00:28:45', '00:28:46', '00:00:04', NULL, NULL),
(16, 1, '2023-02-21', '04:22:33', '04:22:36', '04:23:02', '04:23:05', '00:00:00', NULL, NULL),
(17, 2, '2023-02-21', '04:31:46', '04:32:00', '04:32:18', '04:32:45', '00:00:00', NULL, NULL),
(18, 7, '2023-02-21', '16:14:56', '16:14:59', '16:15:02', '16:15:04', '00:00:00', NULL, NULL),
(19, 1, '2023-02-22', '17:04:52', '17:06:23', '17:08:57', '17:18:50', '00:00:00', NULL, NULL),
(20, 1, '2023-02-23', '02:44:48', '02:46:29', '02:46:53', '02:47:02', '00:00:00', NULL, NULL),
(21, 1, '2023-03-02', '03:13:23', '03:23:06', '03:23:45', '03:24:20', '00:00:00', NULL, NULL),
(22, 2, '2023-03-02', '03:23:29', '03:25:36', '03:26:11', '03:26:15', '00:00:00', NULL, NULL),
(23, 1, '2023-03-05', '18:41:23', '18:41:46', '18:41:47', '18:42:25', '00:00:00', NULL, NULL),
(24, 1, '2023-04-15', '20:25:33', '20:26:07', '20:26:09', '20:26:12', NULL, NULL, NULL),
(27, 2, '2023-04-16', '19:36:10', '19:36:12', '19:36:14', '19:36:16', NULL, NULL, NULL),
(29, 1, '2023-04-16', '20:19:59', '20:20:57', '20:22:50', '20:24:30', NULL, NULL, NULL),
(30, 1, '2023-04-17', '22:44:33', '22:44:36', '22:44:38', '22:44:40', NULL, NULL, NULL),
(31, 28, '2023-05-05', '02:33:05', '02:33:07', '02:33:08', '02:33:09', NULL, NULL, NULL),
(32, 1, '2023-05-06', '18:25:13', '18:25:15', '18:25:17', '18:25:20', NULL, NULL, NULL),
(33, 1, '2023-05-08', '22:03:26', '22:03:28', '22:03:30', '22:03:33', NULL, NULL, NULL),
(34, 1, '2023-05-13', '20:41:11', '20:41:14', '20:41:16', '20:41:18', NULL, NULL, NULL),
(35, 39, '2023-05-13', '21:00:43', '21:00:47', '21:00:51', '21:00:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holerites`
--

CREATE TABLE `holerites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `id_departamento` bigint(20) UNSIGNED NOT NULL,
  `data_holerite` date NOT NULL,
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
  `salario_liquido` double(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holerites`
--

INSERT INTO `holerites` (`id`, `id_funcionario`, `id_departamento`, `data_holerite`, `inss_fx1`, `inss_fx2`, `inss_fx3`, `inss_fx4`, `inss_total`, `irrf_fx1`, `irrf_fx2`, `irrf_fx3`, `irrf_fx4`, `irrf_fx5`, `irrf_total`, `salario_base`, `salario_liquido`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-10-29', 90.90, 109.38, 145.64, 190.25, 536.18, 0.00, 69.20, 138.66, 160.37, 0.00, 368.23, 5000.00, 3875.59, NULL, NULL),
(2, 2, 2, '2022-10-29', 90.90, 109.38, 2.72, 0.00, 203.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2450.00, 2027.00, NULL, NULL),
(7, 7, 7, '2022-10-29', 90.90, 109.38, 145.64, 470.25, 816.18, 0.00, 69.20, 138.66, 205.56, 260.53, 673.95, 7000.00, 5289.87, NULL, NULL),
(14, 14, 14, '2022-10-30', 90.90, 109.38, 145.64, 470.25, 816.18, 0.00, 69.20, 138.66, 205.56, 416.94, 830.36, 7000.00, 5133.46, NULL, NULL),
(21, 21, 21, '2022-11-03', 90.90, 109.38, 145.64, 470.25, 816.18, 0.00, 69.20, 138.66, 205.57, 313.49, 726.92, 7000.00, 5236.91, NULL, NULL),
(32, 2, 2, '2022-11-06', 91.01, 109.25, 2.72, 0.00, 202.97, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2450.00, 2027.03, NULL, NULL),
(37, 7, 7, '2022-11-06', 91.01, 109.25, 145.76, 470.11, 816.13, 0.00, 69.20, 120.17, 205.57, 261.36, 656.30, 7000.00, 5307.57, NULL, NULL),
(39, 14, 14, '2022-11-06', 91.01, 109.25, 145.76, 470.11, 816.13, 0.00, 69.20, 120.17, 205.57, 417.78, 812.71, 7000.00, 5151.15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_05_13_191135_create_departamentos_table', 1),
(3, '2023_05_13_191553_create_enderecos_table', 1),
(4, '2023_05_13_194027_create_folha_pagamentos_table', 1),
(5, '2023_05_13_194424_create_usuarios_table', 1),
(6, '2023_05_13_194924_create_funcionarios_table', 1),
(7, '2023_05_13_195751_create_holerites_table', 1),
(8, '2023_05_13_200412_create_funcionario_pontos_table', 1),
(9, '2023_05_20_235327_alter_folha_pagamentos_id_funcionario', 2),
(10, '2023_05_21_000632_alter_folha_pagamentos_salario_base', 3),
(11, '2023_05_21_002734_alter_folha_pagamentos_total', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `recuperar` varchar(256) DEFAULT NULL,
  `status` enum('ativado','desativado') NOT NULL DEFAULT 'ativado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `role`, `senha`, `recuperar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@email.com', 1, '$2y$10$NopmzPM0Ge699A9.h1LEaOev5lsh.o1UhsUK3uTrCGoc1yir9Rlxm', NULL, 'ativado', NULL, '2023-04-16 05:37:13'),
(2, 'lobato@email.com', 3, '$2y$10$jlV/G/v2F8iF2sou36sAOejYN1czDcAtQOP0TrC0kT5WYh6PDArWu', NULL, 'ativado', NULL, '2023-05-21 02:14:52'),
(7, 'norris@email.com', 3, '$2y$10$JKpOpDarmJNBUHlzrslhBefXt36FxyXM8nq6cPy74WxcE.EjqjQ..', NULL, 'ativado', NULL, '2023-03-06 04:29:38'),
(14, 'rambo@email.com', 3, '$2y$10$GmbnVjEJpXQDsGqKr3fYTuY6iO0LrYuW.fOgUoStbubBwVhaZ3/b6', NULL, 'ativado', NULL, '2023-05-14 02:37:21'),
(21, 'django@email.com', 3, '$2y$10$mwiyEEWbcqhhGBd.uLuF/eWWj2VwKukYDGCPJxQ0qYtTSuAMkc472', NULL, 'ativado', NULL, '2023-05-14 02:53:41'),
(22, 'maria@email.com', 3, '$2y$10$q7FF0MgZa5ALU3XB3Z0w9OT/8jNEvDSs/UKVucV7QMo0m2n/GObE.', NULL, 'ativado', '2023-03-06 09:11:57', '2023-03-06 09:11:57'),
(23, 'usop@email.com', 3, '$2y$10$pjA.N95rnbCiHW4.5RMB3uzw.ZcvkV2rFYnIYY09DYOZiSeAJkH.W', NULL, 'ativado', '2023-03-06 10:04:16', '2023-03-06 10:04:16'),
(24, 'luffy@email.com', 3, '$2y$10$.o5y90mAOrce5zIyexf99Oske7k1lzNVGsL0YKCwNVY8w4e6lTUI6', NULL, 'ativado', '2023-03-06 10:14:38', '2023-03-06 10:14:38'),
(25, 'zoro@email.com', 3, '$2y$10$08m/F1CBIWjdCYtvj5506OQTt4jpZEl.FFla6Gv/KyTrEQUH68IYK', NULL, 'ativado', '2023-03-06 10:56:15', '2023-03-06 10:56:15'),
(26, 'sanji@email.com', 3, '$2y$10$5oLiUyOG.ZaGjvsoFyzXq.W/Mlqajc3cb1IN7aqr3/I7gBagknaq2', NULL, 'ativado', '2023-03-06 11:04:36', '2023-03-06 11:04:36'),
(27, 'nami@email.com', 3, '$2y$10$Ex/Luju84U3.Lzvy2fN5qurT45j2ji5KXmkAGDiLLzUc6gAi9UUpq', NULL, 'ativado', '2023-03-06 11:29:39', '2023-03-06 11:29:39'),
(28, 'brook@email.com', 3, '$2y$10$bfinmopqwpnq7IRbeS4RNOTeFnrSRBjFs/ey312HW.vwAbrJ9YgOm', NULL, 'ativado', '2023-03-06 11:46:57', '2023-03-06 11:46:57'),
(29, 'frank@email.com', 3, '$2y$10$vG3w645k5UMWiLkYHhYFuui8wViDnAAYfIfpTMa53GbgFThnFwLzC', NULL, 'ativado', '2023-03-06 11:55:59', '2023-03-06 11:55:59'),
(30, 'robin@email.com', 3, '$2y$10$1T7tm4FSCH4AcgNx6TSfquFLwptFL7OTU39ibMYjnlQuoUoOvXj2i', NULL, 'ativado', '2023-03-06 12:05:03', '2023-03-06 12:05:03'),
(31, 'chopper@email.com', 3, '$2y$10$0kLkvPl3fsd2mdl4mNMA1OQ7ZS5DRLcEGUkWGB4cQcCkc3DUQrnRO', NULL, 'ativado', '0000-00-00 00:00:00', '2023-03-06 12:10:26'),
(32, 'goku@email.com', 3, '$2y$10$NBwjBcy0CxSVhWOQXYgPKeoetT8AMskBWoWPKwpPKY5MXtD6XfAeK', NULL, 'ativado', '2023-03-06 12:17:01', '2023-03-06 12:17:01'),
(37, 'teste@email.com', 3, '$2y$10$ATZApLO06GexPjk6Y1C4geAInXKmCV4iHGdmbUJPauDGYd1Eppsny', NULL, 'ativado', '2023-04-17 04:58:20', '2023-04-17 04:58:20'),
(38, 'teste2@email.com', 3, '$2y$10$4oxPSwYYsM78s8NG7XWpu.gVsp9wx1Ei3qSTW1Y6R5k4RR2Oub7aa', NULL, 'desativado', '2023-05-07 02:57:48', '2023-05-07 02:59:46'),
(39, 'sauro@email.com', 3, '$2y$10$UIh6v.vzr3tezTYSYraga.IhjUfwaugDNeHzax3KpY8rRUuufwlJa', NULL, 'ativado', '2023-05-14 02:56:51', '2023-05-14 03:00:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folha_pagamentos`
--
ALTER TABLE `folha_pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionarios_id_departamento_foreign` (`id_departamento`),
  ADD KEY `funcionarios_id_endereco_foreign` (`id_endereco`),
  ADD KEY `funcionarios_id_usuario_foreign` (`id_usuario`);

--
-- Indexes for table `funcionario_pontos`
--
ALTER TABLE `funcionario_pontos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_pontos_id_funcionario_foreign` (`id_funcionario`);

--
-- Indexes for table `holerites`
--
ALTER TABLE `holerites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holerites_id_funcionario_foreign` (`id_funcionario`),
  ADD KEY `holerites_id_departamento_foreign` (`id_departamento`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `folha_pagamentos`
--
ALTER TABLE `folha_pagamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `funcionario_pontos`
--
ALTER TABLE `funcionario_pontos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `holerites`
--
ALTER TABLE `holerites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `funcionarios_id_endereco_foreign` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `funcionarios_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `funcionario_pontos`
--
ALTER TABLE `funcionario_pontos`
  ADD CONSTRAINT `funcionario_pontos_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `holerites`
--
ALTER TABLE `holerites`
  ADD CONSTRAINT `holerites_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `holerites_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
