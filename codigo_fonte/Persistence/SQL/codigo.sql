-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 26/01/2018 às 18:44
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `CoffeeCoop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cliente`
--

CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Cliente`
--

INSERT INTO `Cliente` (`id`, `nome`, `usuario`, `senha`) VALUES
(19, 'c', 'c', 'c');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Gerente`
--

CREATE TABLE `Gerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Gerente`
--

INSERT INTO `Gerente` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'c', 'c', 'c'),
(2, 'g', 'g', 'g');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Produtor`
--

CREATE TABLE `Produtor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Produtor`
--

INSERT INTO `Produtor` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'p', 'p', 'p'),
(2, 'p1', 'p1', 'p1'),
(3, 'tonin', 'tonin', '12'),
(4, 'thuza', 'thuza', '123'),
(5, 'q', 'q', 'q'),
(27, 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Estrutura para tabela `SacaDeCafe`
--

CREATE TABLE `SacaDeCafe` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `dataArmazenamento` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorPorSaca` float NOT NULL,
  `idProdutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `SacaDeCafe`
--

INSERT INTO `SacaDeCafe` (`id`, `tipo`, `dataArmazenamento`, `quantidade`, `valorPorSaca`, `idProdutor`) VALUES
(1, '1025', '0009-09-09', 900, 0, 2),
(2, '11', '2010-03-05', 11, 0, 2),
(3, '102', '0009-09-16', 9, 0, 2),
(4, '00102', '0009-09-09', 98, 0, 2),
(5, '9', '2018-01-03', 9, 0, 1),
(7, '9', '0009-09-09', 9, 0, 1),
(8, '7', '2020-06-06', 9209, 10005, 1),
(9, '6', '2018-01-10', 12, 3, 3),
(12, '8', '2007-08-08', 8, 100, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Venda`
--

CREATE TABLE `Venda` (
  `idSaca` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `valorPorSaca` float NOT NULL,
  `aguardandoAprovacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `Gerente`
--
ALTER TABLE `Gerente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `Produtor`
--
ALTER TABLE `Produtor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `SacaDeCafe`
--
ALTER TABLE `SacaDeCafe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProdutor` (`idProdutor`);

--
-- Índices de tabela `Venda`
--
ALTER TABLE `Venda`
  ADD PRIMARY KEY (`idSaca`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCliente_2` (`idCliente`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de tabela `Gerente`
--
ALTER TABLE `Gerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `Produtor`
--
ALTER TABLE `Produtor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `SacaDeCafe`
--
ALTER TABLE `SacaDeCafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `Venda`
--
ALTER TABLE `Venda`
  MODIFY `idSaca` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `SacaDeCafe`
--
ALTER TABLE `SacaDeCafe`
  ADD CONSTRAINT `idProdutor` FOREIGN KEY (`idProdutor`) REFERENCES `Produtor` (`id`);

--
-- Restrições para tabelas `Venda`
--
ALTER TABLE `Venda`
  ADD CONSTRAINT `Venda_ibfk_1` FOREIGN KEY (`idSaca`) REFERENCES `SacaDeCafe` (`id`),
  ADD CONSTRAINT `Venda_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
