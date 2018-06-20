-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 20-Jun-2018 às 20:39
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `champions_maker`
--
CREATE DATABASE IF NOT EXISTS `champions_maker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `champions_maker`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonato`
--

CREATE TABLE IF NOT EXISTS `campeonato` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `desc_campeonato` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chaves`
--

CREATE TABLE IF NOT EXISTS `chaves` (
  `id_campeonato` int(11) NOT NULL DEFAULT '0',
  `tipo` int(11) DEFAULT NULL,
  `time1` int(11) DEFAULT NULL,
  `time2` int(11) DEFAULT NULL,
  `vencedor` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_campeonato`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faz_parte`
--

CREATE TABLE IF NOT EXISTS `faz_parte` (
  `id_time` int(11) NOT NULL DEFAULT '0',
  `id_jogador` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_time`,`id_jogador`),
  KEY `id_jogador` (`id_jogador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL DEFAULT '0',
  `id_campeonato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_campeonato` (`id_campeonato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE IF NOT EXISTS `jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mata_mata`
--

CREATE TABLE IF NOT EXISTS `mata_mata` (
  `id_campeonato` int(11) NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participa`
--

CREATE TABLE IF NOT EXISTS `participa` (
  `id_campeonato` int(11) NOT NULL DEFAULT '0',
  `id_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_campeonato`,`id_time`),
  KEY `id_time` (`id_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partidas`
--

CREATE TABLE IF NOT EXISTS `partidas` (
  `id_campeonato` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `tipo` int(11) DEFAULT NULL,
  `time1` int(11) DEFAULT NULL,
  `time2` int(11) DEFAULT NULL,
  `ponto1` int(11) DEFAULT NULL,
  `ponto2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_campeonato`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacao`
--

CREATE TABLE IF NOT EXISTS `pontuacao` (
  `id_grupo` int(11) NOT NULL DEFAULT '0',
  `id_time` int(11) NOT NULL DEFAULT '0',
  `pontos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`,`id_time`),
  KEY `id_time` (`id_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `suico`
--

CREATE TABLE IF NOT EXISTS `suico` (
  `id_campeonato` int(11) NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `campeonato`
--
ALTER TABLE `campeonato`
  ADD CONSTRAINT `campeonato_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `chaves`
--
ALTER TABLE `chaves`
  ADD CONSTRAINT `chaves_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id`);

--
-- Limitadores para a tabela `faz_parte`
--
ALTER TABLE `faz_parte`
  ADD CONSTRAINT `faz_parte_ibfk_1` FOREIGN KEY (`id_time`) REFERENCES `times` (`id`),
  ADD CONSTRAINT `faz_parte_ibfk_2` FOREIGN KEY (`id_jogador`) REFERENCES `jogador` (`id`);

--
-- Limitadores para a tabela `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id`);

--
-- Limitadores para a tabela `mata_mata`
--
ALTER TABLE `mata_mata`
  ADD CONSTRAINT `mata_mata_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id`);

--
-- Limitadores para a tabela `participa`
--
ALTER TABLE `participa`
  ADD CONSTRAINT `participa_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id`),
  ADD CONSTRAINT `participa_ibfk_2` FOREIGN KEY (`id_time`) REFERENCES `times` (`id`);

--
-- Limitadores para a tabela `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id`);

--
-- Limitadores para a tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD CONSTRAINT `pontuacao_ibfk_1` FOREIGN KEY (`id_time`) REFERENCES `times` (`id`),
  ADD CONSTRAINT `pontuacao_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`);

--
-- Limitadores para a tabela `suico`
--
ALTER TABLE `suico`
  ADD CONSTRAINT `suico_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
