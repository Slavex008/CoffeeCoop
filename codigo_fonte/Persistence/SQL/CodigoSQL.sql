-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 23/01/2018 às 18:45
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1
use CoffeeCoop;

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

create table Cliente (
		id Int not null AUTO_INCREMENT,
		nome Varchar(50) not null,
		usuario Varchar(30) not null unique,
		senha Varchar(255) not null,
        PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Gerente`
--

CREATE TABLE Gerente (
	id int(11) NOT NULL AUTO_INCREMENT,
	nome Varchar(50) not null,
	usuario Varchar(30) not null unique,
	senha Varchar(255) not null,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Produtor`
--
CREATE TABLE Produtor (
	id int(11) NOT NULL AUTO_INCREMENT,
	nome Varchar(50) not null,
	usuario Varchar(30) not null unique,
	senha Varchar(255) not null,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `SacaDeCafe`
--

CREATE TABLE `SacaDeCafe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  `dataArmazenamento` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorPorSaca` float NOT NULL,
  `idProdutor` int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Venda`
--

CREATE TABLE `Venda` (
  `idSaca` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `valorPorSaca` float NOT NULL,
  `aguardandoAprovacao` tinyint(1) NOT NULL,
  PRIMARY KEY (idSaca)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--


--
-- Índices de tabela `SacaDeCafe`
--
ALTER TABLE `SacaDeCafe`
  ADD KEY `idProdutor` (`idProdutor`);

--
-- Índices de tabela `Venda`
--
ALTER TABLE `Venda`
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCliente_2` (`idCliente`);


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
  ADD CONSTRAINT `Venda_ibfk_1` FOREIGN KEY (`idSaca`) REFERENCES `SacaDeCafe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Venda_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


