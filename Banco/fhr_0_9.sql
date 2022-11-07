-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2022 at 02:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliquota_folha`
--

CREATE TABLE `aliquota_folha` (
  `id_aliquota_folha` int(11) NOT NULL,
  `fgts` double(10,4) DEFAULT NULL,
  `inss` double(10,4) DEFAULT NULL,
  `sistema_s` double(10,4) DEFAULT NULL,
  `rat` double(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aliquota_folha`
--

INSERT INTO `aliquota_folha` (`id_aliquota_folha`, `fgts`, `inss`, `sistema_s`, `rat`) VALUES
(1, 0.0800, 0.2000, 0.0580, 0.0200);

-- --------------------------------------------------------

--
-- Table structure for table `aliquota_holerite`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aliquota_holerite`
--

INSERT INTO `aliquota_holerite` (`id_aliquota_holerite`, `inss_salario_fx1`, `inss_aliquota_fx1`, `inss_salario_fx2`, `inss_aliquota_fx2`, `inss_salario_fx3`, `inss_aliquota_fx3`, `inss_salario_fx4`, `inss_aliquota_fx4`, `irrf_salario_fx1`, `irrf_aliquota_fx1`, `irrf_salario_fx2`, `irrf_aliquota_fx2`, `irrf_salario_fx3`, `irrf_aliquota_fx3`, `irrf_salario_fx4`, `irrf_aliquota_fx4`, `irrf_salario_fx5`, `irrf_aliquota_fx5`) VALUES
(1, 1213.5000, 0.0750, 2427.3500, 0.0900, 3642.0300, 0.1200, 7087.2200, 0.1400, 1903.9800, 0.0000, 2826.6500, 0.0750, 3751.0500, 0.1300, 4664.6800, 0.2250, 4664.6900, 0.2750);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(8) NOT NULL,
  `departamento_nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento_nome`, `cargo`, `salario_base`) VALUES
(1, 'Administrativo', 'Diretor', 5000.00),
(2, 'Financeiro', 'Diretor', 2450.00),
(7, 'Operacional', 'Diretor', 7000.00),
(8, 'Operacional', 'Gerente', 8000.00),
(14, 'RH', 'Gerente', 7000.00),
(21, 'Vendas', 'Coordenador', 7000.00);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
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
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `numero`, `cep`, `complemento`, `cidade`, `bairro`, `estado`, `pais`) VALUES
(1, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(2, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(7, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(8, 'Praça da Sé', 1214, 1001901, 'casa', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(14, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil'),
(21, 'Praça da Sé', 456, 1001901, 'Apartamento', 'São Paulo', 'Sé', 'SP', 'Brasil');

-- --------------------------------------------------------

--
-- Table structure for table `folha_pagamento`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
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
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_departamento`, `id_endereco`, `id_usuario`, `nome_funcionario`, `registro_geral`, `cpf`, `telefone`, `numero_dependentes`, `foto`) VALUES
(1, 1, 1, 1, 'Administrador', '11.123.456-789', '132.456.891-11', '(11) 13121-3123', 0, 'App/View/Images/UserPictures/6368539327461.png'),
(2, 2, 2, 2, 'Monteiro Lobato', '12.131.313-13', '121.313.131-31', '(11) 23457-891', 2, 'App/View/Images/UserPictures/636850c8cecbd.jpg'),
(7, 7, 7, 7, 'Chuck Norris', '1234567890', '13245689', '12345789', 3, 'App/View/Images/UserPictures/63508f119b604.jpg'),
(8, 8, 8, 8, 'Carla Diaz', '1234567890', '13245689', '12345789', 0, 'App/View/Images/UserPictures/6350ae6aaf397.png'),
(14, 14, 14, 14, 'Rambo da Silva', '78946123', '13245689', '12345789', 0, 'App/View/Images/UserPictures/635ded3bb88a7.jpg'),
(21, 21, 21, 21, 'Django da Silva', '78946123', '13245689', '12345789', 2, 'App/View/Images/UserPictures/63634cad1c6cb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario_ponto`
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
-- Dumping data for table `funcionario_ponto`
--

INSERT INTO `funcionario_ponto` (`id_funcionario_ponto`, `id_funcionario`, `diames`, `entrada`, `almoco_sai`, `almoco_che`, `saida`, `horas_trabalhadas`) VALUES
(2, 1, '2022-09-19', '21:02:41', '21:02:43', '21:02:44', '21:02:45', '00:00:03'),
(3, 7, '2022-10-19', '23:16:51', '23:16:53', '23:16:54', '23:16:55', '00:00:03'),
(4, 1, '2022-10-20', '00:36:35', '00:36:37', '00:36:39', '00:36:41', '00:00:04'),
(9, 1, '2022-10-30', '00:02:04', '00:02:09', '00:02:10', '00:02:12', '00:00:07'),
(10, 14, '2022-10-30', '00:21:25', '00:21:26', '00:21:28', '00:21:29', '00:00:02'),
(11, 1, '2022-11-02', '15:11:43', '15:11:45', '15:11:47', '15:11:49', '00:00:04'),
(12, 2, '2022-11-02', '18:19:36', '18:19:39', '18:19:40', '18:19:40', '00:00:03'),
(13, 1, '2022-11-06', '00:28:41', '00:28:44', '00:28:45', '00:28:46', '00:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `holerite`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holerite`
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
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(8) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` int(8) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `recuperar` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `role`, `senha`, `recuperar`) VALUES
(1, 'admin@email.com', 1, '$2y$10$Rlo/NDfTk7y65C94Rv2Hseimm6LMTZviSmONgjuUxMo.vHCuXpeqa', NULL),
(2, 'lobato@email.com', 3, '$2y$10$jlV/G/v2F8iF2sou36sAOejYN1czDcAtQOP0TrC0kT5WYh6PDArWu', NULL),
(7, 'norris@email.com', 3, '$2y$10$JKpOpDarmJNBUHlzrslhBefXt36FxyXM8nq6cPy74WxcE.EjqjQ..', NULL),
(8, 'diaz@email.com', 3, '$2y$10$lE7aP97cr0BWU.KnhgKX9OmrWMDzhsZtlw3hjsAtwRYRb7xUq6eMq', NULL),
(14, 'rambo@email.com', 3, '$2y$10$tlz5JKwY6YH6XDPYxPLsquVu.R/Z5x0aJY30KX.vz1f0MoDzdY8Uq', NULL),
(21, 'django@email.com', 3, '$2y$10$mwiyEEWbcqhhGBd.uLuF/eWWj2VwKukYDGCPJxQ0qYtTSuAMkc472', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliquota_folha`
--
ALTER TABLE `aliquota_folha`
  ADD PRIMARY KEY (`id_aliquota_folha`);

--
-- Indexes for table `aliquota_holerite`
--
ALTER TABLE `aliquota_holerite`
  ADD PRIMARY KEY (`id_aliquota_holerite`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD PRIMARY KEY (`id_folha`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_holerite` (`id_holerite`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_funcionario_departamento` (`id_departamento`),
  ADD KEY `fk_funcionario_enredereco` (`id_endereco`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD PRIMARY KEY (`id_funcionario_ponto`),
  ADD KEY `fk_funcionario_ponto` (`id_funcionario`);

--
-- Indexes for table `holerite`
--
ALTER TABLE `holerite`
  ADD PRIMARY KEY (`id_holerite`),
  ADD KEY `fk_holerite_funcionario` (`id_funcionario`),
  ADD KEY `fk_holerite_departamento` (`id_departamento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliquota_folha`
--
ALTER TABLE `aliquota_folha`
  MODIFY `id_aliquota_folha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aliquota_holerite`
--
ALTER TABLE `aliquota_holerite`
  MODIFY `id_aliquota_holerite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  MODIFY `id_folha` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  MODIFY `id_funcionario_ponto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `holerite`
--
ALTER TABLE `holerite`
  MODIFY `id_holerite` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD CONSTRAINT `fk_folha_departamento` FOREIGN KEY (`id_holerite`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_folha_funcionario` FOREIGN KEY (`id_holerite`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_folha_holerite` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id_holerite`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_funcionario_enredereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_funcionario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD CONSTRAINT `fk_funcionario_ponto` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE;

--
-- Constraints for table `holerite`
--
ALTER TABLE `holerite`
  ADD CONSTRAINT `fk_holerite_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_holerite_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
