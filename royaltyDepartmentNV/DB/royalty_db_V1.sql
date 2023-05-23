-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 06:45 AM
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
-- Database: `royalty_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departamento_nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `departamento_nome`, `cargo`, `salario_base`, `created_at`, `updated_at`) VALUES
(1, 'Administrativo', 'Diretor', 5000.00, NULL, NULL),
(2, 'Financeiro', 'Diretor', 2450.00, NULL, NULL),
(7, 'Operacional', 'Diretor', 7000.00, NULL, NULL),
(14, 'RH', 'Gerente', 7000.00, NULL, NULL),
(21, 'Vendas', 'Coordenador', 7000.00, NULL, NULL),
(22, 'RH', 'Supervisor', 5000.00, '2023-03-06 06:11:57', '2023-03-06 06:11:57'),
(23, 'Operacional', 'Supervisor', 9000.00, '2023-03-06 07:04:16', '2023-03-06 07:04:16'),
(24, 'Vendas', 'Consultor', 7000.00, '2023-03-06 07:14:38', '2023-03-06 07:14:38'),
(25, 'T.I', 'Supervisor', 5000.00, '2023-03-06 07:56:15', '2023-03-06 07:56:15'),
(26, 'Comercial', 'Consultor', 6000.00, '2023-03-06 08:04:36', '2023-03-06 08:04:36'),
(27, 'Administrativo', 'Auxiliar', 4000.00, '2023-03-06 08:29:39', '2023-03-06 08:29:39'),
(28, 'Marketing', 'Supervisor', 7000.00, '2023-03-06 08:46:57', '2023-03-06 08:46:57'),
(29, 'T.I', 'Estagiário', 6000.00, '2023-03-06 08:55:59', '2023-03-06 08:55:59'),
(30, 'Marketing', 'Gerente', 5000.00, '2023-03-06 09:05:03', '2023-03-06 09:05:03'),
(31, 'Vendas', 'Supervisor', 3000.00, '2023-03-06 09:10:26', '2023-03-06 09:10:26'),
(32, 'RH', 'Gerente', 8000.00, '2023-03-06 09:17:01', '2023-03-06 09:17:01'),
(37, 'Financeiro', 'Gerente', 7000.00, '2023-04-17 01:58:20', '2023-04-17 01:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` smallint(5) UNSIGNED DEFAULT NULL,
  `cep` int(10) UNSIGNED DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id`, `rua`, `numero`, `cep`, `complemento`, `cidade`, `bairro`, `estado`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(2, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(7, 'Praça da Sé', 12345, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, '2023-04-16 22:31:42'),
(14, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, NULL),
(21, 'Praça da Sé', 12345, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', NULL, '2023-04-17 01:53:52'),
(22, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 06:11:57', '2023-03-06 06:11:57'),
(23, 'Rua Geziael Pereira da Silva', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 07:04:16', '2023-03-06 07:04:16'),
(24, 'Rua Oito', 123, 11713400, 'Apartamento', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', '2023-03-06 07:14:38', '2023-03-06 07:14:38'),
(25, 'Rua Geziael Pereira da Silva', 123, 11713285, 'casa', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', '2023-03-06 07:56:15', '2023-03-06 07:56:15'),
(26, 'Praça da Sé', 123, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 08:04:36', '2023-03-06 08:04:36'),
(27, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 08:29:39', '2023-03-06 08:29:39'),
(28, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 08:46:57', '2023-03-06 08:46:57'),
(29, 'Praça da Sé', 123, 11713285, 'casa', 'Praia Grande', 'Esmeralda', 'SP', 'Brasil', '2023-03-06 08:55:59', '2023-03-06 08:55:59'),
(30, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 09:05:03', '2023-03-06 09:05:03'),
(31, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 09:10:26', '2023-03-06 09:10:26'),
(32, 'Praça da Sé', 123, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-03-06 09:17:01', '2023-03-06 09:17:01'),
(37, 'Praça da Sé', 456, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil', '2023-04-17 01:58:20', '2023-04-17 01:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `folha_pagamento`
--

CREATE TABLE `folha_pagamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED DEFAULT NULL,
  `id_holerite` bigint(20) UNSIGNED DEFAULT NULL,
  `id_departamento` bigint(20) UNSIGNED DEFAULT NULL,
  `data_folha` date DEFAULT NULL,
  `inss` double(10,2) DEFAULT NULL,
  `sistema_s` double(10,2) DEFAULT NULL,
  `rat` double(10,2) DEFAULT NULL,
  `fgts` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_departamento` bigint(20) UNSIGNED DEFAULT NULL,
  `id_endereco` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `nome_funcionario` varchar(50) DEFAULT NULL,
  `registro_geral` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `numero_dependentes` tinyint(4) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id`, `id_departamento`, `id_endereco`, `id_usuario`, `nome_funcionario`, `registro_geral`, `cpf`, `telefone`, `numero_dependentes`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Administrador', '11.123.456-789', '132.456.891-11', '(11) 13121-3123', 0, 'imagens/6C8PJOYi0h1OGUtXXnd3jZbYcBzNeyRyLlUdlJkU.jpg', NULL, '2023-04-16 02:37:13'),
(2, 2, 2, 2, 'Monteiro Lobato', '12.131.313-1', '121.313.131-31', '(11) 23457-891', 2, 'imagens/HTIcnTaIeMouT4E11nP1UuTaLtnf5oy5OBfHGTVl.jpg', NULL, '2023-04-17 01:19:07'),
(7, 7, 7, 7, 'Chuck Norris', '12.345.678-9', '132.456.891-22', '(12) 34578-9121', 3, 'imagens/rAk2VR2hz2MoE1a7zkc15jbvxOIq98jesDKHBxZ4.jpg', NULL, '2023-04-16 22:30:41'),
(14, 14, 14, 14, 'Rambo da Silva', '12.131.213-1', '121.313.131-31', '12345789', 0, 'imagens/7E0P4ABKF9sH3RSe5MaGXkaRR8lZAh9a9WT1JGnt.jpg', NULL, '2023-04-16 21:47:03'),
(21, 21, 21, 21, 'Django da Silva', '78.946.123-1', '132.456.891-21', '(12) 34571-2189', 2, 'imagens/97fq4ubMjKABWe27xBngaVlXoZcxtIH8jbXhmOxj.jpg', NULL, '2023-04-17 01:27:07'),
(22, 22, 22, 22, 'Maria Silva Santos', '12.232.131-3', '454.646.464-66', '(78) 79879-7897', 3, 'imagens/v8qgcbWeAUdfpTEe03weasxqkRWWx1Pou77rhHBF.jpg', '2023-03-06 06:11:57', '2023-03-06 06:11:57'),
(23, 23, 23, 23, 'Usop Silva', '12.131.213-1', '121.213.213-13', '(54) 54646-5666', 0, 'imagens/cyuY3PZdBiZ4gD5phr2uzPHZcZoAPSbrgtFdX922.jpg', '2023-03-06 07:04:16', '2023-03-06 07:04:16'),
(24, 24, 24, 24, 'Luffy Oliveira', '78.979.797-9', '454.646.464-64', '(12) 13122-1313', 0, 'imagens/C9KzmC59r4mHI2vljWag7f3SV0DAhEOXk50k42VN.jpg', '2023-03-06 07:14:38', '2023-03-06 07:14:38'),
(25, 25, 25, 25, 'Zoro Santos', '78.797.979-7', '464.646.545-46', '(12) 13131-3133', 5, 'imagens/uLKod4UtYyNJ59T6moH2IeKYyRTpNjbgLxbe5HzN.jpg', '2023-03-06 07:56:15', '2023-03-06 07:56:15'),
(26, 26, 26, 26, 'Sanji Silveira', '45.645.646-4', '554.646.464-64', '(97) 98789-7997', 4, 'imagens/aURWEglw3uesrxGWeAc6gerPX3MdROQjpR6fWxRc.jpg', '2023-03-06 08:04:36', '2023-03-06 08:04:36'),
(27, 27, 27, 27, 'Nami Swift', '12.121.313-1', '454.546.464-64', '(78) 79797-9798', 0, 'imagens/zarJ4XEZjfuVL2J3jBRtZRYqIPhVh66h3D3ckE0w.jpg', '2023-03-06 08:29:39', '2023-03-06 08:29:39'),
(28, 28, 28, 28, 'Brook Uhuhu', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/V8LbrLKON3lFd94iXAP5d46JBfXQjvFXzT23tg9F.jpg', '2023-03-06 08:46:57', '2023-03-06 08:46:57'),
(29, 29, 29, 29, 'Frank Super', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/3cqzs0F87Or0du5XURvrYPgUxsdg2ReyY9A5EU08.jpg', '2023-03-06 08:55:59', '2023-03-06 08:55:59'),
(30, 30, 30, 30, 'Nico Robin', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 1, 'imagens/XXCjVZWOtdmmGjkKBfXjByO7MYw0KOLc7TeIW6zB.jpg', '2023-03-06 09:05:03', '2023-03-06 09:05:03'),
(31, 31, 31, 31, 'Chopper Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 0, 'imagens/10znwfXe64F8s6aqJKv2nf17iNJvP5ueNk2cjMlb.jpg', '2023-03-06 09:10:26', '2023-03-06 09:10:26'),
(32, 32, 32, 32, 'Goku Santos', '11.213.123-1', '132.456.891-21', '(13) 13131-3131', 2, 'imagens/JaxCBcPva72PKhWjY5Afik6hVACZ9Q6CpZWqtq3g.jpg', '2023-03-06 09:17:01', '2023-03-06 09:17:01'),
(37, 37, 37, 37, 'teste da silva', '11.313.131-3', '213.131.313-13', '(54) 65464-6466', 5, 'imagens/gF5A8Gj2sCuuzO1Qqp3TZ86mWl3cdeZvih3zc1Z0.jpg', '2023-04-17 01:58:20', '2023-04-17 01:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario_ponto`
--

CREATE TABLE `funcionario_ponto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED DEFAULT NULL,
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
-- Dumping data for table `funcionario_ponto`
--

INSERT INTO `funcionario_ponto` (`id`, `id_funcionario`, `diames`, `entrada`, `almoco_sai`, `almoco_che`, `saida`, `horas_trabalhadas`, `created_at`, `updated_at`) VALUES
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
(30, 1, '2023-04-17', '22:44:33', '22:44:36', '22:44:38', '22:44:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holerite`
--

CREATE TABLE `holerite` (
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
-- Dumping data for table `holerite`
--

INSERT INTO `holerite` (`id`, `id_funcionario`, `id_departamento`, `data_holerite`, `inss_fx1`, `inss_fx2`, `inss_fx3`, `inss_fx4`, `inss_total`, `irrf_fx1`, `irrf_fx2`, `irrf_fx3`, `irrf_fx4`, `irrf_fx5`, `irrf_total`, `salario_base`, `salario_liquido`, `created_at`, `updated_at`) VALUES
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
(2, '2023_04_02_221841_create_password_reset_tokens_table', 1),
(3, '2023_04_15_211358_departamento', 1),
(4, '2023_04_15_211619_endereco', 1),
(5, '2023_04_15_213613_usuarios', 1),
(6, '2023_04_15_212613_funcionarios', 2),
(7, '2023_04_15_213357_holerite', 3),
(8, '2023_04_15_212309_folha_pagamento', 4),
(9, '2023_04_15_213000_funcionario_ponto', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `role`, `senha`, `recuperar`, `created_at`, `updated_at`) VALUES
(1, 'admin@email.com', 1, '$2y$10$NopmzPM0Ge699A9.h1LEaOev5lsh.o1UhsUK3uTrCGoc1yir9Rlxm', NULL, NULL, '2023-04-16 02:37:13'),
(2, 'lobato@email.com', 3, '$2y$10$jlV/G/v2F8iF2sou36sAOejYN1czDcAtQOP0TrC0kT5WYh6PDArWu', NULL, NULL, '2023-03-06 01:29:38'),
(7, 'norris@email.com', 3, '$2y$10$JKpOpDarmJNBUHlzrslhBefXt36FxyXM8nq6cPy74WxcE.EjqjQ..', NULL, NULL, '2023-03-06 01:29:38'),
(14, 'rambo@email.com', 3, '$2y$10$GmbnVjEJpXQDsGqKr3fYTuY6iO0LrYuW.fOgUoStbubBwVhaZ3/b6', NULL, NULL, '2023-04-16 21:47:03'),
(21, 'django@email.com', 3, '$2y$10$mwiyEEWbcqhhGBd.uLuF/eWWj2VwKukYDGCPJxQ0qYtTSuAMkc472', NULL, NULL, '2023-03-06 01:29:38'),
(22, 'maria@email.com', 3, '$2y$10$q7FF0MgZa5ALU3XB3Z0w9OT/8jNEvDSs/UKVucV7QMo0m2n/GObE.', NULL, '2023-03-06 06:11:57', '2023-03-06 06:11:57'),
(23, 'usop@email.com', 3, '$2y$10$pjA.N95rnbCiHW4.5RMB3uzw.ZcvkV2rFYnIYY09DYOZiSeAJkH.W', NULL, '2023-03-06 07:04:16', '2023-03-06 07:04:16'),
(24, 'luffy@email.com', 3, '$2y$10$.o5y90mAOrce5zIyexf99Oske7k1lzNVGsL0YKCwNVY8w4e6lTUI6', NULL, '2023-03-06 07:14:38', '2023-03-06 07:14:38'),
(25, 'zoro@email.com', 3, '$2y$10$08m/F1CBIWjdCYtvj5506OQTt4jpZEl.FFla6Gv/KyTrEQUH68IYK', NULL, '2023-03-06 07:56:15', '2023-03-06 07:56:15'),
(26, 'sanji@email.com', 3, '$2y$10$5oLiUyOG.ZaGjvsoFyzXq.W/Mlqajc3cb1IN7aqr3/I7gBagknaq2', NULL, '2023-03-06 08:04:36', '2023-03-06 08:04:36'),
(27, 'nami@email.com', 3, '$2y$10$Ex/Luju84U3.Lzvy2fN5qurT45j2ji5KXmkAGDiLLzUc6gAi9UUpq', NULL, '2023-03-06 08:29:39', '2023-03-06 08:29:39'),
(28, 'brook@email.com', 3, '$2y$10$bfinmopqwpnq7IRbeS4RNOTeFnrSRBjFs/ey312HW.vwAbrJ9YgOm', NULL, '2023-03-06 08:46:57', '2023-03-06 08:46:57'),
(29, 'frank@email.com', 3, '$2y$10$vG3w645k5UMWiLkYHhYFuui8wViDnAAYfIfpTMa53GbgFThnFwLzC', NULL, '2023-03-06 08:55:59', '2023-03-06 08:55:59'),
(30, 'robin@email.com', 3, '$2y$10$1T7tm4FSCH4AcgNx6TSfquFLwptFL7OTU39ibMYjnlQuoUoOvXj2i', NULL, '2023-03-06 09:05:03', '2023-03-06 09:05:03'),
(31, 'chopper@email.com', 3, '$2y$10$0kLkvPl3fsd2mdl4mNMA1OQ7ZS5DRLcEGUkWGB4cQcCkc3DUQrnRO', NULL, '2023-03-06 09:10:26', '2023-03-06 09:10:26'),
(32, 'goku@email.com', 3, '$2y$10$NBwjBcy0CxSVhWOQXYgPKeoetT8AMskBWoWPKwpPKY5MXtD6XfAeK', NULL, '2023-03-06 09:17:01', '2023-03-06 09:17:01'),
(37, 'teste@email.com', 3, '$2y$10$ATZApLO06GexPjk6Y1C4geAInXKmCV4iHGdmbUJPauDGYd1Eppsny', NULL, '2023-04-17 01:58:20', '2023-04-17 01:58:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folha_pagamento_id_funcionario_foreign` (`id_funcionario`),
  ADD KEY `folha_pagamento_id_holerite_foreign` (`id_holerite`),
  ADD KEY `folha_pagamento_id_departamento_foreign` (`id_departamento`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id_departamento_foreign` (`id_departamento`),
  ADD KEY `funcionario_id_endereco_foreign` (`id_endereco`),
  ADD KEY `funcionario_id_usuario_foreign` (`id_usuario`);

--
-- Indexes for table `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_ponto_id_funcionario_foreign` (`id_funcionario`);

--
-- Indexes for table `holerite`
--
ALTER TABLE `holerite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holerite_id_funcionario_foreign` (`id_funcionario`),
  ADD KEY `holerite_id_departamento_foreign` (`id_departamento`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_reset_tokens_email_index` (`email`);

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
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `holerite`
--
ALTER TABLE `holerite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD CONSTRAINT `folha_pagamento_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `folha_pagamento_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `folha_pagamento_id_holerite_foreign` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `funcionario_id_endereco_foreign` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `funcionario_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD CONSTRAINT `funcionario_ponto_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `holerite`
--
ALTER TABLE `holerite`
  ADD CONSTRAINT `holerite_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `holerite_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
