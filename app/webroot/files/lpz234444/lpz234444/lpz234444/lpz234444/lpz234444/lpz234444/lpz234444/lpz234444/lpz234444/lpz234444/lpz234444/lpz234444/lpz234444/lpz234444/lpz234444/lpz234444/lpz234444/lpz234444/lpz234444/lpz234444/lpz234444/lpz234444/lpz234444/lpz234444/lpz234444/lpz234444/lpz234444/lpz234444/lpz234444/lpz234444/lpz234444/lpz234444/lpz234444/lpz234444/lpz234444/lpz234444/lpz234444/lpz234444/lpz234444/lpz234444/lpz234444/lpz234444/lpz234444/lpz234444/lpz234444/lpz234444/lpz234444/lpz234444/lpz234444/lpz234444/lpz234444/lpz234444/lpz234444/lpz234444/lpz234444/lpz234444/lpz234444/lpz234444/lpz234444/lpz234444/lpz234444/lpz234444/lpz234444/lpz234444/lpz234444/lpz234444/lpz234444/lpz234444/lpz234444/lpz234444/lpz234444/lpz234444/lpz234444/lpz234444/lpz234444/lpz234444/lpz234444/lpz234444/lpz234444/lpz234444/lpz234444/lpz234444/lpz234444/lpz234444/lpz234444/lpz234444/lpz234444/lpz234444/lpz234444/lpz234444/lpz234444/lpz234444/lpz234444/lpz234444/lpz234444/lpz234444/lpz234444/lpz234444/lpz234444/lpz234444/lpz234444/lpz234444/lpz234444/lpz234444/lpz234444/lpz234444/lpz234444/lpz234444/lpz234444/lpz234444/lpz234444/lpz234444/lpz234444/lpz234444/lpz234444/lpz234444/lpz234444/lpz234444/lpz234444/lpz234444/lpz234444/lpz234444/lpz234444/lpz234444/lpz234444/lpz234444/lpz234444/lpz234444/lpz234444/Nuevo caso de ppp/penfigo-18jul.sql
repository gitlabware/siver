-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2015 at 02:41 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penfigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`) VALUES
(1, 'La Paz');

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombres` varchar(70) NOT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `ci` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tipo_medico` varchar(20) NOT NULL,
  `telefonos` varchar(40) DEFAULT NULL,
  `centro_medico` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id`, `user_id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `fecha_nacimiento`, `lugar`, `sexo`, `tipo_medico`, `telefonos`, `centro_medico`, `created`, `modified`) VALUES
(1, 1, 'Eynar David', 'Torrez', 'Torrez', '6847560', '1991-12-29', '1', 'Masculino', 'Medico General', '60147852', 'Hospital inventado ubicado en la calle no me acuredo con numero 123 de Lunes a Sabado en horarios de 8:00 a 16:00', '2015-07-13 00:47:57', '2015-07-13 00:47:57'),
(2, 2, 'Juan', 'Balderrama', 'Marquez', '555888', '1990-05-12', 'La Paz', 'Masculino', 'Medico General', '222222', 'dghjsajdsabjxkd', '2015-07-17 23:27:44', '2015-07-17 23:27:44'),
(3, 3, 'Juan', 'Balderrama', 'Marquez', '555888', '1990-05-12', 'La Paz', 'Masculino', 'Medico General', '222222', 'dghjsajdsabjxkd', '2015-07-17 23:31:18', '2015-07-17 23:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
`id` int(11) NOT NULL,
  `nombres` varchar(70) NOT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `ci` varchar(20) NOT NULL,
  `lugar` varchar(25) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `telefonos` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `lugar`, `fecha_nacimiento`, `sexo`, `telefonos`, `created`, `modified`) VALUES
(1, 'Marcelo', 'Mayta', 'Salas', '456210655', 'La Paz', '1990-05-21', 'Masculino', '789456', '2015-07-14 00:16:25', '2015-07-16 12:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_medicos`
--

CREATE TABLE IF NOT EXISTS `pacientes_medicos` (
`id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pacientes_medicos`
--

INSERT INTO `pacientes_medicos` (`id`, `paciente_id`, `medico_id`, `created`, `modified`) VALUES
(1, 1, 1, '2015-07-14 00:16:25', '2015-07-14 00:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_sintomas`
--

CREATE TABLE IF NOT EXISTS `pacientes_sintomas` (
`id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `sintoma_id` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pacientes_sintomas`
--

INSERT INTO `pacientes_sintomas` (`id`, `numero`, `paciente_id`, `sintoma_id`, `estado`, `created`, `modified`) VALUES
(8, 1, 1, 1, 1, '2015-07-18 10:47:16', '2015-07-18 10:47:16'),
(9, 1, 1, 2, 0, '2015-07-18 10:47:16', '2015-07-18 10:47:16'),
(10, 1, 1, 3, 1, '2015-07-18 10:47:16', '2015-07-18 10:47:16'),
(11, 1, 1, 4, 1, '2015-07-18 10:47:16', '2015-07-18 10:47:16'),
(12, 1, 1, 5, 0, '2015-07-18 10:47:16', '2015-07-18 10:47:16'),
(13, 1, 1, 6, 0, '2015-07-18 10:47:16', '2015-07-18 10:47:16'),
(14, 1, 1, 7, 0, '2015-07-18 10:47:16', '2015-07-18 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `sintomas`
--

CREATE TABLE IF NOT EXISTS `sintomas` (
`id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sintomas`
--

INSERT INTO `sintomas` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Fiebre', NULL, NULL, NULL),
(2, 'Malestar General', NULL, NULL, NULL),
(3, 'Debilidad', NULL, NULL, NULL),
(4, 'Falta de apetito', NULL, NULL, NULL),
(5, 'Dolor Cabeza', NULL, NULL, NULL),
(6, 'Peso Bajo', NULL, NULL, NULL),
(7, 'Ampollas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, '6847560', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-13 00:47:57', '2015-07-13 00:47:57'),
(3, '555888', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-17 23:31:18', '2015-07-17 23:31:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lugares`
--
ALTER TABLE `lugares`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sintomas`
--
ALTER TABLE `sintomas`
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
-- AUTO_INCREMENT for table `lugares`
--
ALTER TABLE `lugares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sintomas`
--
ALTER TABLE `sintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
