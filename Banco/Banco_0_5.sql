-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2022 às 20:46
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(8) NOT NULL,
  `departamento_nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `funcao` varchar(50) DEFAULT NULL,
  `salario_base` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento_nome`, `cargo`, `funcao`, `salario_base`) VALUES
(1, 'T.I', 'Gerente', 'Senior', 9000.00),
(5, 'Marketing', 'Júnior', NULL, 12312.00),
(8, 'Finanças', 'Senior', NULL, 123123.00),
(9, 'Marketing', 'Senior', NULL, 90000.00),
(10, 'Finanças', 'Júnior', NULL, 50000.00),
(11, 'T.I', 'Pleno', NULL, 50000.00),
(12, 'T.I', 'Junior', NULL, 500000.00),
(13, 'T.I', 'Júnior', NULL, 90000.00),
(14, 'Marketing', 'Senior', NULL, 600000.00),
(15, 'Finanças', 'Senior', NULL, 90000.00),
(16, 'Finanças', 'Senior', NULL, 8888888.00),
(17, 'Marketing', 'Pleno', NULL, 34343434.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
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
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `numero`, `cep`, `complemento`, `cidade`, `bairro`, `estado`, `pais`) VALUES
(1, 'Rua', 2, '13123', '1', 'Praia Grande', 'Adasd', 'SP', 'BR'),
(5, 'Rua Amazonas', 10, '11111111', '1', 'Santos', 'Campo Grande', 'SP', 'Brasil'),
(8, '123123123', 1, '132123', '123', 'adsa', 'asd', 'adad', 'adad'),
(9, 'Rua', 2, '11072460', '2', 'PG', 'Bairro', 'Sp', 'Br'),
(10, 'Rua Amazonas', 3, '11075420', '3', 'Santos', 'Campo Grande', 'SP', 'Br'),
(11, 'Rua Amazonas', 3, '11075420', '3', 'Santos', 'Campo Grande', 'SP', 'BR'),
(12, 'Rua Amazonas', 2, '11075420', '2', 'Santos', 'Campo Grande', 'SP', 'br'),
(13, 'Rua Amazonas', 3, '11075420', '3', 'Santos', 'Campo Grande', 'SP', 'br'),
(14, 'Rua Amazonas', 9, '11075420', '', 'Santos', 'Campo Grande', 'SP', 'BR'),
(15, 'Rua Amazonas', 4, '11075420', '', 'Santos', 'Campo Grande', 'SP', 'BR'),
(16, 'Rua Amazonas', 7, '11075420', '', 'Santos', 'Campo Grande', 'SP', 'BR'),
(17, 'Rua Amazonas', 5, '11075420', '', 'Santos', 'Campo Grande', 'SP', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
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
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_departamento`, `id_endereco`, `nome_funcionario`, `registro_geral`, `cpf`, `senha`, `email`, `telefone`, `numero_dependentes`, `foto`) VALUES
(1, 1, 1, 'Administrador', '13123123', '1231313', '$2y$10$r6SU3qVCH/t.e/aLyXPzSu6IhYNotw02ynFUUfah1VkYWm2OYifqG', 'admin@email.com', 232323, 1, NULL),
(2, 5, 5, 'Ciclano', '123123', '1121221', '$2y$10$1MlMXnqzpM4xLZWeDAKqGuqi6o3r4guW7uG2LLNvg5L/sV/ME/OvG', 'ciclano@email.com', 12313, 2, '../fotos/633f050b16198.'),
(5, 8, 8, 'Fulano', '123123', '13123', '$2y$10$IaRgqXnvCz2XabePH5CLTe42Yic1rnclVSlHxyhiH54Ke.LEdSOzO', '12313@email.com', 12313, 1, '../fotos/633f05671ffeb.'),
(6, 9, 9, 'Ana', '123456', '123456789', '$2y$10$2lEHDf8ZUOqv3L01kD5dseCgd4fot6.ANSYONgCEGzCn39FqAQQhe', 'ana@email.com', 1234567, 2, '../fotos/633f07caccbbe.'),
(7, 10, 10, 'Maria', '455568787', '45548787', '$2y$10$LmsvvkGRWkhGhKuY6X/vDOuo8r1L4dcWVfuvlXpobPR7TRJNR/o4.', 'maria@email.com', 12345678, 2, '../fotos/633f07f43a6ca.'),
(8, 11, 11, 'José', '1234568', '686898', '$2y$10$h.znDmmLSWFgUiSwcH/Rr.mZdQnyMJAq1hyMo1taMHmNPnLF9nm1O', 'jose@email.com', 45456487, 2, '../fotos/633f081568d02.'),
(9, 12, 12, 'Caroline', '454658659', '6568987', '$2y$10$XToDF9DjdCk9eA611Mc0uu8QDARYc6yTfCWX0Kdl.TeGViVzJitCC', 'caroline@email.com', 4555687, 2, '../fotos/633f084736c2c.'),
(10, 13, 13, 'Amanda', '45556887', '54485484', '$2y$10$vBtMUy52IPhOen/WYKVchOOq8XlQS.9FFZBCzqz5x0gyAE6Qc7ggG', 'amanda@email.com', 12345678, 22, '../fotos/633f0868def07.'),
(11, 14, 14, 'Andre', '4545455', '5454545', '$2y$10$UC2NfSC6MI8yIU341Bv4x.CQwJMDLcKfMuNk/.nY.ecrB9V.J8.xW', 'andre@email.com', 123456789, 4, '../fotos/633f0890b6d22.'),
(12, 15, 15, 'Luiz', '4545454', '454545', '$2y$10$8.XEVuF.guOAGZxbtkOEQ.IBb979E.GWl.s5n8blu0bwSdzC3A5WC', 'luiz@email.com', 41545454, 4, '../fotos/633f08bbd9b49.'),
(13, 16, 16, 'Wellinton', '455545545', '4545454', '$2y$10$yEhkDPNa8RzDmjdShoemv.fb.HfGJfi4ondQp3F2Z13CtsVev6Y..', 'wellinton@email.com', 54545454, 4, '../fotos/633f08ef36388.'),
(14, 17, 17, 'Genoveva', '454654654', '545454', '$2y$10$KBXUdjWqAv7iV5XwjiM8Fei.QJyv0s8zYuMKzVfKRRzrdBgFwORm.', 'genoveva@email.com', 4545454, 2, '../fotos/633f09164fcac.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_ponto`
--

CREATE TABLE `funcionario_ponto` (
  `id_funcionario_ponto` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `diames` date DEFAULT NULL,
  `entrada` time DEFAULT NULL,
  `almoco_sai` time DEFAULT NULL,
  `almoco_che` time DEFAULT NULL,
  `saida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `holerite`
--

CREATE TABLE `holerite` (
  `id_holerite` int(8) NOT NULL,
  `id_funcionario` int(8) DEFAULT NULL,
  `id_departamento` int(8) DEFAULT NULL,
  `tipo` varchar(12) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_Final` date DEFAULT NULL,
  `salario_liquido` double(15,2) DEFAULT NULL,
  `total_descontos` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inss`
--

CREATE TABLE `inss` (
  `id_inss` int(8) NOT NULL,
  `id_holerite` int(8) DEFAULT NULL,
  `faixa_1` double(10,2) DEFAULT NULL,
  `faixa_2` double(10,2) DEFAULT NULL,
  `faixa_3` double(10,2) DEFAULT NULL,
  `faixa_4` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `irrf`
--

CREATE TABLE `irrf` (
  `id_irrf` int(8) NOT NULL,
  `id_holerite` int(8) DEFAULT NULL,
  `faixa_irrf1` double(10,2) DEFAULT NULL,
  `faixa_irrf2` double(10,2) DEFAULT NULL,
  `faixa_irrf3` double(10,2) DEFAULT NULL,
  `faixa_irrf4` double(10,2) DEFAULT NULL,
  `faixa_irrf5` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_funcionario_departamento` (`id_departamento`),
  ADD KEY `fk_funcionario_enredereco` (`id_endereco`);

--
-- Índices para tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD PRIMARY KEY (`id_funcionario_ponto`),
  ADD KEY `fk_funcionario_ponto` (`id_funcionario`);

--
-- Índices para tabela `holerite`
--
ALTER TABLE `holerite`
  ADD PRIMARY KEY (`id_holerite`),
  ADD KEY `fk_holerite_funcionario` (`id_funcionario`),
  ADD KEY `fk_holerite_departamento` (`id_departamento`);

--
-- Índices para tabela `inss`
--
ALTER TABLE `inss`
  ADD PRIMARY KEY (`id_inss`),
  ADD KEY `fk_inss_holerite` (`id_holerite`);

--
-- Índices para tabela `irrf`
--
ALTER TABLE `irrf`
  ADD PRIMARY KEY (`id_irrf`),
  ADD KEY `fk_irrf_holerite` (`id_holerite`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  MODIFY `id_funcionario_ponto` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `holerite`
--
ALTER TABLE `holerite`
  MODIFY `id_holerite` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `inss`
--
ALTER TABLE `inss`
  MODIFY `id_inss` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `irrf`
--
ALTER TABLE `irrf`
  MODIFY `id_irrf` int(8) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_funcionario_enredereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD CONSTRAINT `fk_funcionario_ponto` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `holerite`
--
ALTER TABLE `holerite`
  ADD CONSTRAINT `fk_holerite_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`),
  ADD CONSTRAINT `fk_holerite_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `inss`
--
ALTER TABLE `inss`
  ADD CONSTRAINT `fk_inss_holerite` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id_holerite`);

--
-- Limitadores para a tabela `irrf`
--
ALTER TABLE `irrf`
  ADD CONSTRAINT `fk_irrf_holerite` FOREIGN KEY (`id_holerite`) REFERENCES `holerite` (`id_holerite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
