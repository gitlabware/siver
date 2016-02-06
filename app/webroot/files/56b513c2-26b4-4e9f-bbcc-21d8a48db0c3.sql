-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 08:42 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.17-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `svergara`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjuntos`
--

CREATE TABLE IF NOT EXISTS `adjuntos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nombre_original` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `ubicacion` varchar(255) NOT NULL,
  `tarea_id` int(11) DEFAULT NULL,
  `proceso_id` int(11) DEFAULT NULL,
  `flujos_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `adjuntos`
--

INSERT INTO `adjuntos` (`id`, `user_id`, `nombre`, `nombre_original`, `descripcion`, `ubicacion`, `tarea_id`, `proceso_id`, `flujos_user_id`, `created`, `modified`) VALUES
(5, 2, 'dewqdwe', 'AFPs Carla Echeverria.pdf', 'eqwdeqwe', '56ad4fee-a13c-45dc-a552-2084a48db0c3.pdf', 3, 18, 1, '2016-01-30 20:06:06', '2016-01-30 20:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `tarea_id` int(11) DEFAULT NULL,
  `proceso_id` int(11) DEFAULT NULL,
  `flujos_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `user_id`, `descripcion`, `tarea_id`, `proceso_id`, `flujos_user_id`, `created`, `modified`) VALUES
(1, 2, 'hola dbsajvd ', 2, 18, 1, '2016-01-30 17:09:15', '2016-01-30 17:09:15'),
(2, 2, 'vhsajbfjsavf sdfdsfdsfdsgsd', 2, 18, 1, '2016-01-30 17:10:06', '2016-01-30 17:10:06'),
(3, 2, 'cwqarw qrdwqdewq', 3, 18, 1, '2016-01-30 17:31:58', '2016-01-30 17:31:58'),
(5, 2, 'cewrgehwj rvgehjw rgewrew', 0, 18, 1, '2016-01-30 18:43:29', '2016-01-30 18:43:29'),
(6, 2, 'gyhsagd jksahfsafds', 3, 18, 1, '2016-01-30 20:04:39', '2016-01-30 20:04:39'),
(7, 2, 'shhhhhhhhh ssss', 8, 0, 0, '2016-02-02 20:18:12', '2016-02-02 20:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `flujos`
--

CREATE TABLE IF NOT EXISTS `flujos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `flujos`
--

INSERT INTO `flujos` (`id`, `user_id`, `nombre`, `created`, `modified`) VALUES
(2, 2, 'Otro nuevo flujo', '2016-01-23 18:32:49', '2016-01-23 18:32:49'),
(3, 2, 'Otro Flujo', '2016-01-23 19:29:36', '2016-01-23 19:29:36'),
(4, 2, 'Flujo 1', '2016-01-25 16:52:09', '2016-01-25 16:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `flujos_users`
--

CREATE TABLE IF NOT EXISTS `flujos_users` (
`id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `flujo_id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `flujos_users`
--

INSERT INTO `flujos_users` (`id`, `descripcion`, `user_id`, `flujo_id`, `estado`, `created`, `modified`) VALUES
(1, 'jjnh hvggggb', 2, 4, 'Activo', '2016-01-26 15:11:24', '2016-01-26 15:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `procesos`
--

CREATE TABLE IF NOT EXISTS `procesos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flujo_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tiempo` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `procesos`
--

INSERT INTO `procesos` (`id`, `user_id`, `flujo_id`, `nombre`, `tiempo`, `created`, `modified`) VALUES
(5, 2, 2, 'Primer Porceso', NULL, '2016-01-23 19:27:09', '2016-01-23 19:27:09'),
(6, 2, 2, 'Segundo Proceso', NULL, '2016-01-23 19:35:46', '2016-01-23 19:35:46'),
(7, 2, 2, 'Tercer Proceso', NULL, '2016-01-23 19:35:59', '2016-01-23 19:35:59'),
(8, 2, 2, 'Cuarto Proceso', NULL, '2016-01-23 19:36:13', '2016-01-23 19:36:13'),
(9, 2, 2, 'Quinto Proceso', NULL, '2016-01-23 19:36:22', '2016-01-23 19:36:22'),
(10, 2, 2, 'Sexto Proceso', NULL, '2016-01-23 19:36:32', '2016-01-23 19:36:32'),
(11, 2, 2, 'Septimo Proceso', NULL, '2016-01-23 19:36:51', '2016-01-23 19:36:51'),
(12, 2, 2, 'Octavo Proceso', NULL, '2016-01-23 19:37:05', '2016-01-23 19:37:05'),
(13, 2, 4, 'Recurso de Alzada', NULL, '2016-01-25 16:52:58', '2016-01-25 16:52:58'),
(14, 2, 4, 'Rechazo', NULL, '2016-01-25 16:53:17', '2016-01-25 16:53:17'),
(15, 2, 4, 'Admision', NULL, '2016-01-25 16:53:22', '2016-01-25 16:53:22'),
(16, 2, 4, 'Onservacion al recurso', NULL, '2016-01-25 16:53:29', '2016-01-25 16:53:29'),
(17, 2, 4, 'Respuesta', NULL, '2016-01-25 16:53:39', '2016-01-25 16:53:39'),
(18, 2, 4, 'Notificacion', 12, '2016-01-25 16:53:46', '2016-01-28 14:48:21'),
(19, 2, 4, 'Termino de Prueba', NULL, '2016-01-25 16:54:07', '2016-01-25 16:54:07'),
(20, 2, 4, 'Alegatos', NULL, '2016-01-25 16:54:28', '2016-01-25 16:54:28'),
(21, 2, 4, 'Auto de Ampliacion', NULL, '2016-01-25 16:55:31', '2016-01-25 16:55:31'),
(22, 2, 4, 'Recurso de Alzada', NULL, '2016-01-25 16:55:46', '2016-01-25 16:55:46'),
(23, 2, 4, 'Notificacion de Ambas partes', NULL, '2016-01-25 16:56:11', '2016-01-25 16:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `procesos_condiciones`
--

CREATE TABLE IF NOT EXISTS `procesos_condiciones` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `condicion_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modififed` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `procesos_condiciones`
--

INSERT INTO `procesos_condiciones` (`id`, `user_id`, `proceso_id`, `condicion_id`, `tipo`, `created`, `modififed`) VALUES
(5, 2, 6, 5, 'Necesario', '2016-01-23 19:38:31', NULL),
(6, 2, 14, 13, 'Necesario', '2016-01-25 16:58:10', NULL),
(7, 2, 15, 13, 'Necesario', '2016-01-25 16:58:21', NULL),
(8, 2, 16, 13, 'Necesario', '2016-01-25 16:58:26', NULL),
(10, 2, 18, 17, 'Necesario', '2016-01-25 16:59:05', NULL),
(11, 2, 19, 18, 'Necesario', '2016-01-25 16:59:55', NULL),
(12, 2, 17, 15, 'Necesario', '2016-01-26 11:51:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `procesos_estados`
--

CREATE TABLE IF NOT EXISTS `procesos_estados` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flujos_user_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `procesos_estados`
--

INSERT INTO `procesos_estados` (`id`, `user_id`, `flujos_user_id`, `proceso_id`, `estado`, `created`, `modified`) VALUES
(1, 0, 1, 13, 'Activo', '2016-01-26 18:55:00', '2016-01-26 18:55:00'),
(2, 0, 1, 20, 'Activo', '2016-01-26 18:55:00', '2016-01-26 18:55:00'),
(3, 0, 1, 21, 'Activo', '2016-01-26 18:55:00', '2016-01-26 18:55:00'),
(4, 0, 1, 22, 'Activo', '2016-01-26 18:55:00', '2016-01-26 18:55:00'),
(5, 0, 1, 23, 'Activo', '2016-01-26 18:55:00', '2016-01-26 18:55:00'),
(6, 2, 1, 13, 'Finalizado', '2016-01-26 19:24:18', '2016-01-26 19:24:18'),
(7, 0, 1, 14, 'Activo', '2016-01-26 19:24:18', '2016-01-26 19:24:18'),
(8, 0, 1, 15, 'Activo', '2016-01-26 19:24:18', '2016-01-26 19:24:18'),
(9, 0, 1, 16, 'Activo', '2016-01-26 19:24:18', '2016-01-26 19:24:18'),
(10, 2, 1, 15, 'Finalizado', '2016-01-26 19:25:50', '2016-01-26 19:25:50'),
(11, 0, 1, 17, 'Activo', '2016-01-26 19:25:50', '2016-01-26 19:25:50'),
(12, 2, 1, 17, 'Finalizado', '2016-01-26 19:25:57', '2016-01-26 19:25:57'),
(13, 0, 1, 18, 'Activo', '2016-01-26 19:25:57', '2016-01-26 19:25:57'),
(14, 2, 1, 18, 'Finalizado', '2016-01-26 19:26:03', '2016-01-26 19:26:03'),
(15, 0, 1, 19, 'Activo', '2016-01-26 19:26:03', '2016-01-26 19:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asignado_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `prioridad` varchar(50) NOT NULL,
  `porcentaje` int(5) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `flujos_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id`, `user_id`, `asignado_id`, `fecha_inicio`, `fecha_fin`, `prioridad`, `porcentaje`, `descripcion`, `proceso_id`, `flujos_user_id`, `created`, `modified`) VALUES
(3, 2, NULL, '2016-02-24 00:00:00', '2016-02-25 00:00:00', 'Normal', 34, 'dsaddddddd dddd', 18, 1, '2016-01-30 17:31:50', '2016-02-03 19:56:32'),
(10, 2, 2, '2016-02-04 20:20:00', NULL, 'Normal', NULL, 'zvsbdnasdwandwqdq', 18, 1, '2016-02-02 20:20:56', '2016-02-03 20:23:15'),
(11, 2, NULL, '2016-02-03 16:00:00', '2016-02-03 19:56:00', 'Normal', NULL, 'Hacer la prueba el vencimiento', 0, 0, '2016-02-03 19:43:48', '2016-02-03 19:57:44'),
(12, 2, NULL, '2016-02-03 15:00:00', '2016-02-03 19:56:00', 'Normal', NULL, 'hhhhhhhh h hh h hhhhh', 0, 0, '2016-02-03 19:50:32', '2016-02-03 19:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `tareas_estados`
--

CREATE TABLE IF NOT EXISTS `tareas_estados` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tarea_id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tareas_estados`
--

INSERT INTO `tareas_estados` (`id`, `user_id`, `tarea_id`, `estado`, `created`, `modified`) VALUES
(1, 2, 10, 'Completado', '2016-02-03 17:58:55', '2016-02-03 17:58:55'),
(2, 2, 10, 'Reanudado', '2016-02-03 18:15:38', '2016-02-03 18:15:38'),
(3, 2, 10, 'Completado', '2016-02-03 18:15:54', '2016-02-03 18:15:54'),
(4, 2, 11, 'Vencido', '2016-02-03 19:56:00', '2016-02-03 20:16:10'),
(5, 2, 12, 'Vencido', '2016-02-03 19:56:00', '2016-02-03 20:16:10'),
(6, 2, 12, 'Completado', '2016-02-03 20:18:16', '2016-02-03 20:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(30) NOT NULL,
  `nombre_completo` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nombre_completo`, `created`, `modified`) VALUES
(2, 'eynar', '30695b55428386eb84b836eb15a26a256efb7c22', 'Usuario', 'Eynar Torrez', '2016-01-21 17:04:34', '2016-01-21 17:04:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjuntos`
--
ALTER TABLE `adjuntos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flujos`
--
ALTER TABLE `flujos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flujos_users`
--
ALTER TABLE `flujos_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procesos`
--
ALTER TABLE `procesos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procesos_condiciones`
--
ALTER TABLE `procesos_condiciones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procesos_estados`
--
ALTER TABLE `procesos_estados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas_estados`
--
ALTER TABLE `tareas_estados`
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
-- AUTO_INCREMENT for table `adjuntos`
--
ALTER TABLE `adjuntos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `flujos`
--
ALTER TABLE `flujos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `flujos_users`
--
ALTER TABLE `flujos_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `procesos`
--
ALTER TABLE `procesos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `procesos_condiciones`
--
ALTER TABLE `procesos_condiciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `procesos_estados`
--
ALTER TABLE `procesos_estados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tareas_estados`
--
ALTER TABLE `tareas_estados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
