-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2018 at 02:06 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CoffeeCoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `usuario`, `senha`) VALUES
(19, 'c', 'c', 'c'),
(20, 'ribolive', 'ribola', 'ribola');

-- --------------------------------------------------------

--
-- Table structure for table `gerente`
--

CREATE TABLE `gerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'c', 'c', 'c'),
(2, 'g', 'g', 'g'),
(3, 'tuza', 'tuza', 'tuza');

-- --------------------------------------------------------

--
-- Table structure for table `produtor`
--

CREATE TABLE `produtor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `quantidadeVendidas` int(11) NOT NULL,
  `quantidadeAVenda` int(11) NOT NULL,
  `quantidadeAguardandoAprovacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtor`
--

INSERT INTO `produtor` (`id`, `nome`, `usuario`, `senha`, `quantidadeVendidas`, `quantidadeAVenda`, `quantidadeAguardandoAprovacao`) VALUES
(1, 'p', 'p', 'p', 0, 0, 0),
(2, 'p1', 'p1', 'p1', 0, 0, 0),
(3, 'p2', 'p2', '12', 0, 0, 0),
(4, 'thuza', 'thuza', '123', 0, 0, 0),
(5, 'q', 'q', 'q', 0, 0, 0),
(27, 'a', 'a', 'a', 0, 0, 0),
(28, 'Adalberto', 'ad', '123', 0, 0, 0),
(32, 'f', 'f', 'f', 0, 0, 0),
(33, 'silvera', 'silvs', 'silvs', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sacadecafe`
--

CREATE TABLE `sacadecafe` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `dataArmazenamento` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorPorSaca` float NOT NULL,
  `idProdutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sacadecafe`
--

INSERT INTO `sacadecafe` (`id`, `tipo`, `dataArmazenamento`, `quantidade`, `valorPorSaca`, `idProdutor`) VALUES
(1, '1025', '0009-09-09', 900, 0, 2),
(2, '11', '2010-03-05', 11, 0, 2),
(3, '102', '0009-09-16', 9, 0, 2),
(4, '00102', '0009-09-09', 98, 0, 2),
(9, '6', '2018-01-10', 12, 3, 3),
(12, '8', '2007-08-08', 8, 100, 4),
(13, '3', '0003-03-03', 3, 3, 28),
(14, '5', '0005-05-05', 5, 5555, 32),
(15, '6', '2012-12-05', 10, 45, 33),
(17, '5', '0012-12-12', 34, 12, 33),
(21, '9', '0008-08-08', 88, 92, 1),
(22, '5', '0005-07-07', 5, 20928, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `idSaca` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `valorPorSaca` float NOT NULL,
  `aguardandoAprovacao` tinyint(1) NOT NULL,
  `dataCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venda`
--

INSERT INTO `venda` (`idSaca`, `idCliente`, `valorPorSaca`, `aguardandoAprovacao`, `dataCompra`) VALUES
(15, NULL, 45, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `produtor`
--
ALTER TABLE `produtor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `sacadecafe`
--
ALTER TABLE `sacadecafe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProdutor` (`idProdutor`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idSaca`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCliente_2` (`idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produtor`
--
ALTER TABLE `produtor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `sacadecafe`
--
ALTER TABLE `sacadecafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `idSaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sacadecafe`
--
ALTER TABLE `sacadecafe`
  ADD CONSTRAINT `idProdutor` FOREIGN KEY (`idProdutor`) REFERENCES `produtor` (`id`);

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `Venda_ibfk_1` FOREIGN KEY (`idSaca`) REFERENCES `sacadecafe` (`id`),
  ADD CONSTRAINT `Venda_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
