-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2014 at 05:46 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sico`
--

-- --------------------------------------------------------

--
-- Table structure for table `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `acciones`
--

INSERT INTO `acciones` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'joder', 'sirve para joder\r\n', '0000-00-00', '2014-11-26'),
(2, 'chingar', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `adjuntos`
--

CREATE TABLE IF NOT EXISTS `adjuntos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `permiso` varchar(10) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `archivados`
--

CREATE TABLE IF NOT EXISTS `archivados` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  `carpeta_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `archivados`
--

INSERT INTO `archivados` (`id`, `user_id`, `documento_id`, `carpeta_id`, `created`) VALUES
(1, 0, 1, 1, '2014-12-01 16:54:21'),
(2, 2, 2, 1, '2014-12-01 17:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Recursos Humanos', 'Es el encargada de todo el personal de la empresa\r\n', '0000-00-00', '2014-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `carpetas`
--

CREATE TABLE IF NOT EXISTS `carpetas` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `carpetas`
--

INSERT INTO `carpetas` (`id`, `nombre`, `created`, `modified`) VALUES
(1, 'Varios', '2014-12-01 14:17:15', '2014-12-01 14:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `derivaciones`
--

CREATE TABLE IF NOT EXISTS `derivaciones` (
`id` int(11) NOT NULL,
  `ouser_id` int(11) NOT NULL,
  `duser_id` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `derivaciones`
--

INSERT INTO `derivaciones` (`id`, `ouser_id`, `duser_id`, `estado`, `created`, `modified`) VALUES
(1, 2, 1, 0, '2014-11-24', '2014-11-24'),
(2, 1, 2, 1, '2014-11-24', '2014-11-24'),
(3, 3, 1, 0, '2014-11-24', '2014-11-24'),
(4, 1, 3, 1, '2014-11-24', '2014-11-24'),
(5, 3, 2, 0, '2014-11-24', '2014-11-24'),
(6, 2, 3, 0, '2014-11-24', '2014-11-24'),
(7, 4, 1, 0, '2014-11-24', '2014-11-24'),
(8, 1, 4, 1, '2014-11-24', '2014-11-24'),
(9, 4, 2, 0, '2014-11-24', '2014-11-24'),
(10, 2, 4, 1, '2014-11-24', '2014-11-24'),
(11, 4, 3, 0, '2014-11-24', '2014-11-24'),
(12, 3, 4, 0, '2014-11-24', '2014-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
`id` int(11) NOT NULL,
  `nur` varchar(17) DEFAULT NULL,
  `nuri` varchar(17) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `tipodocumento_id` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `contenido` longtext NOT NULL,
  `duser_id` int(11) NOT NULL COMMENT 'a quien va dirigido',
  `cuser_id` int(11) DEFAULT NULL COMMENT 'copia a quien',
  `vuser_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id`, `nur`, `nuri`, `user_id`, `area_id`, `tipodocumento_id`, `referencia`, `contenido`, `duser_id`, `cuser_id`, `vuser_id`, `created`, `modified`) VALUES
(1, '2014-00000', 'I/2014-00000', 1, 1, 1, 'Para saludar no mas', 'holaaaa', 2, NULL, NULL, '2014-12-01 16:53:43', '2014-12-01 16:53:43'),
(2, '2014-00001', 'I/2014-00001', 1, 1, 5, 'Para saludar no mas', 'hhhhhoooollllllaaa', 2, NULL, NULL, '2014-12-01 17:12:02', '2014-12-01 17:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `hojarutas`
--

CREATE TABLE IF NOT EXISTS `hojarutas` (
`id` int(11) NOT NULL,
  `ouser_id` int(11) NOT NULL,
  `duser_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  `accione_id` int(11) NOT NULL DEFAULT '0',
  `observaciones` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hojarutas`
--

INSERT INTO `hojarutas` (`id`, `ouser_id`, `duser_id`, `documento_id`, `accione_id`, `observaciones`, `created`, `modified`) VALUES
(1, 1, 2, 1, 1, 'ddddd', '2014-12-01 16:53:52', '2014-12-01 16:53:52'),
(2, 1, 2, 2, 1, 'Holaaa', '2014-12-01 17:12:18', '2014-12-01 17:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `hrdocumentos`
--

CREATE TABLE IF NOT EXISTS `hrdocumentos` (
`id` int(11) NOT NULL,
  `hojaruta_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hrdocumentos`
--

INSERT INTO `hrdocumentos` (`id`, `hojaruta_id`, `documento_id`, `observaciones`, `created`, `modified`) VALUES
(1, 1, 1, 'ddddd', '2014-12-01', '2014-12-01'),
(2, 2, 2, 'Holaaa', '2014-12-01', '2014-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `hrestados`
--

CREATE TABLE IF NOT EXISTS `hrestados` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `duser_id` int(11) NOT NULL,
  `hojaruta_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hrestados`
--

INSERT INTO `hrestados` (`id`, `user_id`, `duser_id`, `hojaruta_id`, `documento_id`, `estado`, `created`, `modified`) VALUES
(1, 1, 2, 1, 1, 0, '2014-12-01 16:53:52', '2014-12-01 16:53:52'),
(2, 1, 2, 1, 1, 1, '2014-12-01 16:54:15', '2014-12-01 16:54:15'),
(3, 1, 2, 1, 1, 2, '2014-12-01 16:54:17', '2014-12-01 16:54:17'),
(4, 1, 2, 1, 1, 4, '2014-12-01 16:54:21', '2014-12-01 16:54:21'),
(5, 1, 2, 2, 2, 0, '2014-12-01 17:12:18', '2014-12-01 17:12:18'),
(6, 1, 2, 2, 2, 1, '2014-12-01 17:12:33', '2014-12-01 17:12:33'),
(7, 1, 2, 2, 2, 2, '2014-12-01 17:12:37', '2014-12-01 17:12:37'),
(8, 1, 2, 2, 2, 4, '2014-12-01 17:15:51', '2014-12-01 17:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `tipodocumentos`
--

CREATE TABLE IF NOT EXISTS `tipodocumentos` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sigla` varchar(15) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tipodocumentos`
--

INSERT INTO `tipodocumentos` (`id`, `nombre`, `sigla`, `descripcion`, `created`, `modified`) VALUES
(1, 'INFORME', 'INF', 'Documento para informes', '0000-00-00', '2014-11-28'),
(2, 'NOTA INTERNA', 'NOT', '', '2014-11-28', '2014-11-28'),
(3, 'CARTA', 'CAR', '', '2014-11-28', '2014-11-28'),
(4, 'CERTIFICACION', 'CER', '', '2014-11-28', '2014-11-28'),
(5, 'CIRCULAR', 'CIR', '', '2014-11-28', '2014-11-28'),
(6, 'MEMORANDUM', 'MEM', '', '2014-11-28', '2014-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `area_id` int(11) NOT NULL,
  `jefe` varchar(1) NOT NULL DEFAULT 'n',
  `role` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `username`, `password`, `area_id`, `jefe`, `role`, `created`, `modified`) VALUES
(1, 'Eynar David Torrez Torrez', 'eynar', '75243a8479c48805b079c6d16b1e301de17c4dfc', 1, 'n', 'Administrador', '2014-11-24 16:31:10', '2014-11-24 16:31:10'),
(2, 'Adrian Murguia Torrez', 'adr', '75243a8479c48805b079c6d16b1e301de17c4dfc', 1, 'n', 'Operario', '2014-11-24 16:32:55', '2014-11-24 16:32:55'),
(3, 'Pedro Pica Pedra', 'pedro', '75243a8479c48805b079c6d16b1e301de17c4dfc', 1, 'n', 'Jefe', '2014-11-24 16:33:19', '2014-11-26 16:40:17'),
(4, 'Noelia Ramos', 'nramos', '75243a8479c48805b079c6d16b1e301de17c4dfc', 1, 'n', 'Operario', '2014-11-24 16:38:38', '2014-11-24 16:38:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acciones`
--
ALTER TABLE `acciones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjuntos`
--
ALTER TABLE `adjuntos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archivados`
--
ALTER TABLE `archivados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpetas`
--
ALTER TABLE `carpetas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `derivaciones`
--
ALTER TABLE `derivaciones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hojarutas`
--
ALTER TABLE `hojarutas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrdocumentos`
--
ALTER TABLE `hrdocumentos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrestados`
--
ALTER TABLE `hrestados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acciones`
--
ALTER TABLE `acciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `adjuntos`
--
ALTER TABLE `adjuntos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archivados`
--
ALTER TABLE `archivados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carpetas`
--
ALTER TABLE `carpetas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `derivaciones`
--
ALTER TABLE `derivaciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hojarutas`
--
ALTER TABLE `hojarutas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hrdocumentos`
--
ALTER TABLE `hrdocumentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hrestados`
--
ALTER TABLE `hrestados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
