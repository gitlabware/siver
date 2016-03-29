-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2015 a las 21:49:38
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `penfigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaampollas`
--

CREATE TABLE IF NOT EXISTS `areaampollas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `area_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `numero` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areaampollas`
--

INSERT INTO `areaampollas` (`id`, `tipo`, `area_id`, `paciente_id`, `medico_id`, `estado`, `numero`, `created`, `modified`) VALUES
(1, 'Mucosas', 1, 1, 1, 1, 1, '2015-07-19 21:22:05', '2015-09-22 04:52:05'),
(2, 'Mucosas', 2, 1, 1, 1, 1, '2015-07-19 21:22:05', '2015-09-22 04:52:05'),
(3, 'Piel', 3, 1, 1, 1, 1, '2015-07-20 00:34:45', '2015-07-26 19:33:12'),
(4, 'Piel', 4, 1, 1, 1, 1, '2015-07-20 00:34:45', '2015-07-26 19:33:13'),
(5, 'Mucosas', 1, 3, 4, 1, 2, '2015-08-21 11:43:50', '2015-08-21 11:47:48'),
(6, 'Mucosas', 2, 3, 4, 0, 2, '2015-08-21 11:43:50', '2015-08-21 11:47:48'),
(7, 'Mucosas', 5, 3, 4, 0, 2, '2015-08-21 11:43:50', '2015-08-21 11:47:48'),
(8, 'Piel', 3, 3, 4, 0, 2, '2015-08-21 11:45:09', '2015-08-21 11:48:06'),
(9, 'Piel', 4, 3, 4, 0, 2, '2015-08-21 11:45:09', '2015-08-21 11:48:06'),
(10, 'Piel', 6, 3, 4, 1, 2, '2015-08-21 11:45:09', '2015-08-21 11:48:06'),
(11, 'Mucosas', 1, 4, 1, 0, 3, '2015-08-27 23:16:05', '2015-08-28 09:32:45'),
(12, 'Mucosas', 2, 4, 1, 0, 3, '2015-08-27 23:16:05', '2015-08-28 09:32:45'),
(13, 'Mucosas', 5, 4, 1, 1, 3, '2015-08-27 23:16:05', '2015-08-28 09:32:45'),
(14, 'Piel', 3, 4, 1, 0, 3, '2015-08-27 23:16:44', '2015-08-27 23:17:24'),
(15, 'Piel', 4, 4, 1, 0, 3, '2015-08-27 23:16:44', '2015-08-27 23:17:24'),
(16, 'Piel', 6, 4, 1, 0, 3, '2015-08-27 23:16:44', '2015-08-27 23:17:24'),
(17, 'Mucosas', 1, 5, 5, 0, 4, '2015-08-28 20:29:49', '2015-08-28 20:29:49'),
(18, 'Mucosas', 2, 5, 5, 0, 4, '2015-08-28 20:29:49', '2015-08-28 20:29:49'),
(19, 'Mucosas', 5, 5, 5, 1, 4, '2015-08-28 20:29:49', '2015-08-28 20:29:49'),
(20, 'Mucosas', 7, 5, 5, 0, 4, '2015-08-28 20:29:49', '2015-08-28 20:29:49'),
(21, 'Piel', 3, 5, 5, 0, 4, '2015-08-28 20:31:01', '2015-08-28 20:31:01'),
(22, 'Piel', 4, 5, 5, 0, 4, '2015-08-28 20:31:01', '2015-08-28 20:31:01'),
(23, 'Piel', 6, 5, 5, 1, 4, '2015-08-28 20:31:01', '2015-08-28 20:31:01'),
(24, 'Piel', 8, 5, 5, 0, 4, '2015-08-28 20:31:01', '2015-08-28 20:31:01'),
(25, 'Mucosas', 1, 6, 1, 0, 5, '2015-09-19 22:14:02', '2015-09-20 00:50:44'),
(26, 'Mucosas', 2, 6, 1, 0, 5, '2015-09-19 22:14:02', '2015-09-20 00:50:44'),
(27, 'Mucosas', 5, 6, 1, 0, 5, '2015-09-19 22:14:02', '2015-09-20 00:50:44'),
(28, 'Mucosas', 7, 6, 1, 0, 5, '2015-09-19 22:14:02', '2015-09-20 00:50:45'),
(29, 'Piel', 3, 6, 1, 0, 5, '2015-09-19 22:14:34', '2015-09-19 22:18:44'),
(30, 'Piel', 4, 6, 1, 0, 5, '2015-09-19 22:14:34', '2015-09-19 22:18:44'),
(31, 'Piel', 6, 6, 1, 0, 5, '2015-09-19 22:14:34', '2015-09-19 22:18:44'),
(32, 'Piel', 8, 6, 1, 0, 5, '2015-09-19 22:14:34', '2015-09-19 22:18:44'),
(33, 'Mucosas', 1, 7, 1, 1, 7, '2015-09-20 02:45:04', '2015-09-20 02:45:04'),
(34, 'Mucosas', 2, 7, 1, 0, 7, '2015-09-20 02:45:04', '2015-09-20 02:45:04'),
(35, 'Mucosas', 5, 7, 1, 0, 7, '2015-09-20 02:45:04', '2015-09-20 02:45:04'),
(36, 'Mucosas', 7, 7, 1, 0, 7, '2015-09-20 02:45:04', '2015-09-20 02:45:04'),
(37, 'Mucosas', 2, 8, 1, 0, 8, '2015-09-20 22:24:01', '2015-09-20 22:24:01'),
(38, 'Mucosas', 3, 8, 1, 0, 8, '2015-09-20 22:24:01', '2015-09-20 22:24:01'),
(39, 'Mucosas', 4, 8, 1, 1, 8, '2015-09-20 22:24:01', '2015-09-20 22:24:01'),
(40, 'Mucosas', 7, 8, 1, 0, 8, '2015-09-20 22:24:01', '2015-09-20 22:24:01'),
(41, 'Piel', 1, 8, 1, 0, 8, '2015-09-20 22:24:55', '2015-09-20 23:05:34'),
(42, 'Piel', 5, 8, 1, 0, 8, '2015-09-20 22:24:55', '2015-09-20 23:05:34'),
(43, 'Piel', 6, 8, 1, 0, 8, '2015-09-20 22:24:56', '2015-09-20 23:05:34'),
(44, 'Piel', 8, 8, 1, 0, 8, '2015-09-20 22:24:56', '2015-09-20 23:05:34'),
(45, 'Mucosas', 2, 10, 10, 0, 7, '2015-09-22 04:48:31', '2015-09-22 05:03:44'),
(46, 'Mucosas', 3, 10, 10, 0, 7, '2015-09-22 04:48:31', '2015-09-22 05:03:44'),
(47, 'Mucosas', 4, 10, 10, 1, 7, '2015-09-22 04:48:31', '2015-09-22 05:03:44'),
(48, 'Mucosas', 7, 10, 10, 0, 7, '2015-09-22 04:48:31', '2015-09-22 05:03:44'),
(49, 'Mucosas', 2, 10, 10, 0, 7, '2015-09-22 04:49:37', '2015-09-22 05:03:44'),
(50, 'Mucosas', 3, 10, 10, 0, 7, '2015-09-22 04:49:37', '2015-09-22 05:03:44'),
(51, 'Mucosas', 4, 10, 10, 0, 7, '2015-09-22 04:49:37', '2015-09-22 05:03:44'),
(52, 'Mucosas', 7, 10, 10, 0, 7, '2015-09-22 04:49:37', '2015-09-22 05:03:44'),
(53, 'Mucosas', 2, 10, 10, 0, 7, '2015-09-22 04:49:44', '2015-09-22 05:03:44'),
(54, 'Mucosas', 3, 10, 10, 0, 7, '2015-09-22 04:49:44', '2015-09-22 05:03:44'),
(55, 'Mucosas', 4, 10, 10, 0, 7, '2015-09-22 04:49:44', '2015-09-22 05:03:44'),
(56, 'Mucosas', 7, 10, 10, 0, 7, '2015-09-22 04:49:44', '2015-09-22 05:03:44'),
(57, 'Mucosas', 2, 10, 10, 0, 7, '2015-09-22 04:50:30', '2015-09-22 05:03:44'),
(58, 'Mucosas', 3, 10, 10, 0, 7, '2015-09-22 04:50:30', '2015-09-22 05:03:44'),
(59, 'Mucosas', 4, 10, 10, 0, 7, '2015-09-22 04:50:31', '2015-09-22 05:03:44'),
(60, 'Mucosas', 7, 10, 10, 0, 7, '2015-09-22 04:50:31', '2015-09-22 05:03:44'),
(61, 'Piel', 1, 10, 10, 0, 7, '2015-09-22 04:59:03', '2015-09-22 05:06:18'),
(62, 'Piel', 5, 10, 10, 0, 7, '2015-09-22 04:59:04', '2015-09-22 05:06:18'),
(63, 'Piel', 6, 10, 10, 0, 7, '2015-09-22 04:59:04', '2015-09-22 05:06:18'),
(64, 'Piel', 8, 10, 10, 0, 7, '2015-09-22 04:59:04', '2015-09-22 05:06:18'),
(65, 'Mucosas', 2, 6, 10, 0, 8, '2015-09-22 17:41:15', '2015-10-20 18:35:47'),
(66, 'Mucosas', 3, 6, 10, 1, 8, '2015-09-22 17:41:15', '2015-10-20 18:35:47'),
(67, 'Mucosas', 4, 6, 10, 1, 8, '2015-09-22 17:41:15', '2015-10-20 18:35:47'),
(68, 'Mucosas', 7, 6, 10, 1, 8, '2015-09-22 17:41:15', '2015-10-20 18:35:47'),
(69, 'Piel', 1, 6, 10, 1, 8, '2015-09-22 17:43:33', '2015-10-20 18:53:35'),
(70, 'Piel', 5, 6, 10, 1, 8, '2015-09-22 17:43:33', '2015-10-20 18:53:35'),
(71, 'Piel', 6, 6, 10, 0, 8, '2015-09-22 17:43:33', '2015-10-20 18:53:35'),
(72, 'Piel', 8, 6, 10, 1, 8, '2015-09-22 17:43:33', '2015-10-20 18:53:35'),
(73, 'Mucosas', 2, 11, 10, 0, 9, '2015-09-23 23:15:04', '2015-09-23 23:15:04'),
(74, 'Mucosas', 3, 11, 10, 0, 9, '2015-09-23 23:15:04', '2015-09-23 23:15:04'),
(75, 'Mucosas', 4, 11, 10, 1, 9, '2015-09-23 23:15:04', '2015-09-23 23:15:04'),
(76, 'Mucosas', 7, 11, 10, 0, 9, '2015-09-23 23:15:04', '2015-09-23 23:15:04'),
(77, 'Mucosas', 2, 12, 10, 0, 10, '2015-09-27 22:03:22', '2015-09-27 22:03:22'),
(78, 'Mucosas', 3, 12, 10, 0, 10, '2015-09-27 22:03:22', '2015-09-27 22:03:22'),
(79, 'Mucosas', 4, 12, 10, 1, 10, '2015-09-27 22:03:22', '2015-09-27 22:03:22'),
(80, 'Mucosas', 7, 12, 10, 0, 10, '2015-09-27 22:03:22', '2015-09-27 22:03:22'),
(81, 'Piel', 1, 12, 10, 0, 10, '2015-09-27 22:03:35', '2015-09-27 22:03:35'),
(82, 'Piel', 5, 12, 10, 0, 10, '2015-09-27 22:03:35', '2015-09-27 22:03:35'),
(83, 'Piel', 6, 12, 10, 0, 10, '2015-09-27 22:03:35', '2015-09-27 22:03:35'),
(84, 'Piel', 8, 12, 10, 0, 10, '2015-09-27 22:03:35', '2015-09-27 22:03:35'),
(85, 'Mucosas', 2, 13, 10, 1, 11, '2015-10-01 21:44:53', '2015-10-20 00:04:48'),
(86, 'Mucosas', 3, 13, 10, 1, 11, '2015-10-01 21:44:53', '2015-10-20 00:04:48'),
(87, 'Mucosas', 4, 13, 10, 1, 11, '2015-10-01 21:44:53', '2015-10-20 00:04:48'),
(88, 'Mucosas', 7, 13, 10, 0, 11, '2015-10-01 21:44:53', '2015-10-20 00:04:48'),
(89, 'Piel', 1, 13, 10, 1, 11, '2015-10-01 21:45:07', '2015-10-20 00:04:24'),
(90, 'Piel', 5, 13, 10, 0, 11, '2015-10-01 21:45:07', '2015-10-20 00:04:24'),
(91, 'Piel', 6, 13, 10, 0, 11, '2015-10-01 21:45:07', '2015-10-20 00:04:24'),
(92, 'Piel', 8, 13, 10, 0, 11, '2015-10-01 21:45:07', '2015-10-20 00:04:24'),
(93, 'Mucosas', 2, 14, 10, 1, 12, '2015-10-05 21:38:06', '2015-10-05 21:44:38'),
(94, 'Mucosas', 3, 14, 10, 1, 12, '2015-10-05 21:38:06', '2015-10-05 21:44:38'),
(95, 'Mucosas', 4, 14, 10, 1, 12, '2015-10-05 21:38:06', '2015-10-05 21:44:38'),
(96, 'Mucosas', 7, 14, 10, 0, 12, '2015-10-05 21:38:06', '2015-10-05 21:44:38'),
(97, 'Piel', 1, 14, 10, 1, 12, '2015-10-05 21:38:19', '2015-10-05 21:46:01'),
(98, 'Piel', 5, 14, 10, 0, 12, '2015-10-05 21:38:19', '2015-10-05 21:46:01'),
(99, 'Piel', 6, 14, 10, 0, 12, '2015-10-05 21:38:19', '2015-10-05 21:46:01'),
(100, 'Piel', 8, 14, 10, 0, 12, '2015-10-05 21:38:19', '2015-10-05 21:46:01'),
(101, 'Mucosas', 2, 15, 24, 0, 13, '2015-10-08 02:28:08', '2015-10-08 04:16:37'),
(102, 'Mucosas', 3, 15, 24, 1, 13, '2015-10-08 02:28:08', '2015-10-08 04:16:37'),
(103, 'Mucosas', 4, 15, 24, 1, 13, '2015-10-08 02:28:08', '2015-10-08 04:16:37'),
(104, 'Mucosas', 7, 15, 24, 0, 13, '2015-10-08 02:28:08', '2015-10-08 04:16:38'),
(105, 'Piel', 1, 15, 24, 1, 13, '2015-10-08 03:32:02', '2015-10-08 03:32:02'),
(106, 'Piel', 5, 15, 24, 0, 13, '2015-10-08 03:32:02', '2015-10-08 03:32:02'),
(107, 'Piel', 6, 15, 24, 0, 13, '2015-10-08 03:32:02', '2015-10-08 03:32:02'),
(108, 'Piel', 8, 15, 24, 0, 13, '2015-10-08 03:32:03', '2015-10-08 03:32:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `tipo`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Piel', 'Piel Cabelluda', 'Piel en donde nace el cabello, denominada tambien cuero cabelludo.', '55ff11ea-abf4-4074-a91f-115426f82a3d.jpg'),
(2, 'Mucosas', 'Conjuntiva', 'La conjuntiva es una membrana mucosa que reviste la cara posterior de los dos parpados y la parte anterior o libre del globo del ojo.', '560d824d-4520-44c0-90e7-15fc26f82a3d.jpg'),
(3, 'Mucosas', 'Nasal', 'fosa por donde las personas respiran.', '560d82d7-9c84-4ce6-8ad1-15fc26f82a3d.jpg'),
(4, 'Mucosas', 'Boca', 'Abertura anterior del tubo digestivo, situada en la cabeza, que sirve de entrada a la cavidad bucal.', '55ff12b7-67c8-4f42-ac8f-115426f82a3d.jpg'),
(5, 'Piel', 'Torax', 'comprende el pecho, la espalda', '560d847d-0c08-4669-b13b-15fc26f82a3d.jpg'),
(6, 'Piel', 'Extremidades superiores', 'Miembro del cuerpo, que comprende desde el hombro a la extremidad de la mano.', '55c4e2f8-ffc0-4f6a-a401-23bfc0a8006a.jpg'),
(7, 'Mucosas', 'Genitales', 'Organos sexuales externos femeninos o masculinos', '55c4e2c6-c358-44bc-b3bb-065dc0a8006a.jpg'),
(8, 'Piel', 'Extremidades inferiores', 'Extremidad inferior del cuerpo humano, que va desde el tronco hasta el pie.', '55c4e40d-2a70-4f27-9d63-2141c0a8006a.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE IF NOT EXISTS `examenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Biopsia', 'Examen microscopico de un trozo de tejido o una parte de liquido organico que se obtiene de un ser vivo.', NULL, '2015-09-30 23:42:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Hemograma', NULL, NULL, NULL),
(2, 'Glicemia', NULL, NULL, NULL),
(3, 'Creatinina', NULL, NULL, NULL),
(4, 'Electrolitos en sangre', NULL, NULL, NULL),
(5, 'Hepatograma', NULL, NULL, NULL),
(6, 'EGO', NULL, NULL, NULL),
(7, 'ASTO', NULL, NULL, NULL),
(8, 'PCR', NULL, NULL, NULL),
(9, 'Coproparasitologia simple', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`) VALUES
(1, 'La Paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
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
  `mat_ministerio` varchar(25) DEFAULT NULL,
  `mat_colegio` varchar(50) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `user_id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `fecha_nacimiento`, `lugar`, `sexo`, `tipo_medico`, `telefonos`, `centro_medico`, `mat_ministerio`, `mat_colegio`, `estado`, `created`, `modified`) VALUES
(1, 1, 'Eynar David', 'Torrez', 'Torrez', '6847560', '1991-12-29', 'La Paz', 'Masculino', 'Medico General', '60147852', 'Hospital inventado ubicado en la calle no me acuredo con numero 123 de Lunes a Sabado en horarios de 8:00 a 16:00', NULL, NULL, 'Activo', '2015-07-13 00:47:57', '2015-08-17 00:05:07'),
(2, 0, 'Alicia ', 'Mercado', 'Calle', '11223344', '1987-05-11', 'La Paz', 'Femenino', 'Dermatologo', '1531564', 'dsadhjsabhj dmskalj', NULL, NULL, 'Activo', '2015-08-08 00:02:08', '2015-08-08 00:02:08'),
(3, 8, 'Jose Miguel', 'Mamani', 'Castro', '996633', '1985-04-15', 'La Paz', 'Masculino', 'Dermatologo', '620516484', 'dbusia v agfuigabs fbi bfa', NULL, NULL, 'Activo', '2015-08-17 00:52:57', '2015-08-17 01:03:27'),
(4, 9, 'Pedro', 'Perez', 'Perez', '995511', '1984-04-25', 'La Paz', 'Masculino', 'Dermatologo', '426456414', 'centro san francisco ', NULL, NULL, 'En espera', '2015-08-21 11:19:42', '2015-09-22 17:51:03'),
(5, 10, 'Adrian', 'Quisbert', 'Vilela', '123456', '1970-03-05', 'La Paz', 'Masculino', 'Medico General', '666666', 'centros en la universidad', NULL, NULL, 'Activo', '2015-08-28 20:23:58', '2015-08-28 20:24:41'),
(10, 15, 'Marcia Andrea', 'Sanjinez', 'Asbun', '4308982', '1973-03-16', 'La Paz', 'Femenino', 'Dermatologo', '684751', 'Seguro universitario y Hospital de clinicas', NULL, NULL, 'Activo', '2015-09-20 01:22:33', '2015-09-23 23:11:26'),
(21, 26, 'carla', 'Aldama', 'Aldama', '123456', '1956-12-15', 'La Paz', 'Femenino', 'Dermatologo', '60681857', 'Centros medicos', 'A-1212', 'A-1212', 'En espera', '2015-10-06 22:33:16', '2015-10-06 22:33:16'),
(23, 28, 'sdfdf', 'DDD', 'dfsdf', '123456', '2014-04-04', 'La Paz', 'Masculino', 'Medico General', '659874', 'medico', 'D-1234', 'D-1234', 'En espera', '2015-10-06 22:35:16', '2015-10-06 22:35:16'),
(24, 29, 'jkhsjdfhs', 'Lopez', 'Lopez', '963852', '1973-06-30', 'La Paz', 'Masculino', 'Medico General', '6666666', 'hospital general', 'L-7896', 'L-8987', 'Activo', '2015-10-06 22:44:11', '2015-10-06 22:44:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
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
  `est_civil` varchar(30) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `residencia` varchar(200) DEFAULT NULL,
  `fecha_internacion` date NOT NULL,
  `Fecha_clinica` date NOT NULL,
  `hospital` varchar(30) NOT NULL,
  `servicio` varchar(30) NOT NULL,
  `cama` int(10) DEFAULT NULL,
  `fuente_info` varchar(50) NOT NULL,
  `grado_confianza` varchar(30) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `historia` text NOT NULL,
  `antecedentes_personales` text,
  `medicacion` text,
  `antecedentes_familiares` text,
  `antecedentes_ginecoobstetricos` text,
  `examen_fisicos` text,
  `examen_segmentario` text,
  `imagen` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `lugar`, `fecha_nacimiento`, `sexo`, `telefonos`, `est_civil`, `ocupacion`, `residencia`, `fecha_internacion`, `Fecha_clinica`, `hospital`, `servicio`, `cama`, `fuente_info`, `grado_confianza`, `motivo`, `historia`, `antecedentes_personales`, `medicacion`, `antecedentes_familiares`, `antecedentes_ginecoobstetricos`, `examen_fisicos`, `examen_segmentario`, `imagen`, `created`, `modified`) VALUES
(1, 'Marcelo', 'Mayta', 'Salas', '456210655', 'La Paz', '1990-05-21', 'Masculino', '789456', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'jhjgff', '', '', '', '', '', NULL, '2015-07-14 00:16:25', '2015-09-19 23:01:24'),
(2, 'Estefani', 'Valdivieso', 'Camargo', '775533', 'La Paz', '1985-06-03', 'Femenino', '70436985', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'mis antecedentes personales', 'mis medicaciones', 'mis antecedentes familiares', '', '', '', NULL, '2015-08-17 23:35:43', '2015-08-17 23:35:43'),
(3, 'Javier', 'Torrico', 'Morales', '1234567', 'La Paz', '1983-02-02', 'Masculino', '4158641534', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'sgdahd vhja', 'fgseh fbhes fb', ' gfhs fvhsfjdsds', '', '', '', NULL, '2015-08-21 11:33:44', '2015-08-21 11:33:44'),
(4, 'carla', 'valdosa', '', '1234567', 'La Paz', '1986-05-02', 'Femenino', '45646215', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'snacjaknjk ', 'cnd,vkneknvjevje che', 'cjsdncknwjkncewc', '', '', '', NULL, '2015-08-27 23:13:57', '2015-08-27 23:13:57'),
(5, 'Adrian', 'Quisbert', 'Vilela', '123456', 'La Paz', '1970-03-05', 'Masculino', '66666', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'cirugias', 'no presenta', 'no tiene', '', '', '', NULL, '2015-08-28 20:26:15', '2015-08-28 20:26:15'),
(6, 'Roxana ', 'Paredes', 'Pari', '4578965', 'La Paz', '1984-05-30', 'Femenino', '6898741', 'Casado', 'Labores de casa', 'Av. Periferica calle 12 Nro. 1011', '2015-06-14', '2015-06-14', 'Hospital de clinicas', 'Dermatologia', 9, 'Paciente confiable', 'confiable', 'Lesiones ampollares, prurito', 'Paciente refiere cuadro clinico de 4 meses de evolucion caracterizado por presentar lesiones ampollares en region cuero cabelludo, region anterior y posterior de torax acompaÃ±adas de dolor de leve a moderada intensividad y prurito razon por la cual acude a consultorio externo de nuestro servicio donde tras valoracion se decide su internacion.', 'Chikunguya,fractura de pierna ', 'no presenta medicaciones', 'Familiares aparentemente sanos', 'Menarca: 12 aÃ±os, G: 2, P: 0, C:1, AB: 1, FUM 15.07.2015', 'Paciente en regular estado general, Facies: compuesta, Biotipo: normolineo: piel y mucosas: piel y mucosas hidratadas y normocoloreadas, Estado mental lucido y conciente, Lenguaje articulado y consciente, Lenguaje articulado y comprensible, memoria retrograda, retrograda e inmediatamente conservadas.', 'CABEZA: Eucefala, no se evidencian depresiones ni eminencias patolÃ³gicas con distribuciÃ³n pilosa ginecoide sin desprendimiento de cabello a la maniobra de tracciÃ³n, puntos dolorosos poco valorables, se evidencia lesiones ampollares diseminadas en cuero cabelludo, ojos con pupilas eucoricas fotoreactivas, esclerÃ³tica sucia Nariz sin particularidades, se videncia disminuciÃ³n de la agudeza auditiva en oÃ­do derecho.\r\nTORAX: RESPIRATORIO: \r\nTÃ³rax simÃ©trico normolineo no se videncia retracciÃ³n ni traje intercostales.\r\nPALPACION: movilidad torÃ¡cica conservada tanto en regiÃ³n apical y basal presentando los movimientos de amplexion, y amplexacion sin inguna dificultad.\r\nPERCUCION: claro pulmonar conservado en los diferentes segmentos de lobulos pulmonares izquierdo y derecho.\r\nAUSCULTACION: murmullo vesicular conservado en ambos campos pulmonares sin presencia de ruidos agregados.\r\nCARDIACO: \r\nINSPECCION: no se observa depresiones ni abombamiento, no se evidencia circulaciÃ³n colateral ni latido paraesternal.\r\nPALPACION: no se palpa latido de punta, ni frotes.\r\nAUSCULTACION: ruidos cardiacos rÃ­tmicos regulares, no se perciben soplos.\r\nABDOMEN: \r\nINSPECCION: abdomen globoso a expensas de TCSC no se observa circulaciÃ³n colateral.\r\nAUSCULTACION: RHA + normoactivos.\r\nPALPACION: abdomen globoso, blando, depresible no doloroso  a la palpaciÃ³n superficial ni profunda.\r\nGENITOURINARIO: no existe presencia de dolor en puntos ureterales, puÃ±opecusion bilateral negativa.\r\nLOCOMOTOR: \r\nExtremidades superiores, hombros simÃ©tricos con tono y trofismo conservados, con movimientos activos y pasivos conservados.\r\nExtremidades inferiores, caderas con movimientos activos y pasivos conservados muslos con tono y trofismo conservados rodillas con movimientos pasivos  y activos conservados.', NULL, '2015-09-22 02:58:03', '2015-10-20 21:42:23'),
(10, 'Roxana', 'Paredes', 'Pari', '4578962', 'La Paz', '1984-05-16', 'Femenino', '68457912', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'Chikunguya, fractura de pierna', 'no presenta medicaciones', 'Familiares aoarentemente sanos', '', '', '', NULL, '2015-09-22 03:28:36', '2015-09-22 03:28:36'),
(11, 'Julio', 'Alvarez', 'Castillo', '28745912', 'La Paz', '1929-06-25', 'Masculino', '6000000', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'no presenta', 'no presenta', 'no presenta', '', '', '', NULL, '2015-09-23 23:12:52', '2015-10-01 03:54:13'),
(12, 'jsghdyte', 'uudfyusd', 'bgyujtdf', '98854564', 'La Paz', '1986-12-04', 'Masculino', '454897', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'dfsdfsdf', 'dfsdsdfsdsdgf', 'gftewdsdfdsf', '', '', '', NULL, '2015-09-27 22:02:23', '2015-09-27 22:02:23'),
(13, 'luis', 'cardona', 'nina', '65987412', 'La Paz', '1956-10-12', 'Masculino', '69587412', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'no presrnta antecedentes familiares', 'no presenta antecedentes ', 'no presenta', '', '', '', NULL, '2015-10-01 21:43:02', '2015-10-01 21:55:28'),
(14, 'brigit ', 'pelaez ', 'pere', '879456135', 'La Paz', '1956-04-05', 'Femenino', '65689841', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', '', '', '', '', '', '', NULL, '2015-10-05 21:37:15', '2015-10-05 21:37:15'),
(15, 'grillo', '', '', '12345678', 'La Paz', '1946-12-31', 'Masculino', '', '', '', NULL, '0000-00-00', '0000-00-00', '', '', 0, '', '', '', '', 'No presenta antecedentes personales', 'Ninguna medicacion en el ultimo mes.', 'Padres hermanos y familiares aparentemente sanos.', '', '', '', NULL, '2015-10-07 22:17:01', '2015-10-07 22:23:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_laboratorios`
--

CREATE TABLE IF NOT EXISTS `pacientes_laboratorios` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `laboratorio_id` int(11) NOT NULL,
  `hacer` int(1) DEFAULT NULL,
  `hecho` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_laboratorios`
--

INSERT INTO `pacientes_laboratorios` (`id`, `numero`, `paciente_id`, `laboratorio_id`, `hacer`, `hecho`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 0, '2015-08-20 08:57:32', '2015-08-20 09:03:06'),
(2, 1, 1, 2, 1, 1, '2015-08-20 08:57:32', '2015-08-20 09:03:06'),
(3, 2, 3, 1, 1, 1, '2015-08-21 11:53:35', '2015-08-21 11:53:52'),
(4, 2, 3, 2, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(5, 2, 3, 3, 0, 0, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(6, 2, 3, 4, 1, 0, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(7, 2, 3, 5, 0, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(8, 2, 3, 6, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(9, 2, 3, 7, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(10, 2, 3, 8, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(11, 2, 3, 9, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(12, 3, 4, 1, 0, 0, '2015-08-27 23:18:03', '2015-08-27 23:18:03'),
(13, 3, 4, 2, 0, 0, '2015-08-27 23:18:03', '2015-08-27 23:18:03'),
(14, 3, 4, 3, 1, 0, '2015-08-27 23:18:03', '2015-08-27 23:18:03'),
(15, 3, 4, 4, 0, 0, '2015-08-27 23:18:03', '2015-08-27 23:18:03'),
(16, 3, 4, 5, 0, 0, '2015-08-27 23:18:03', '2015-08-27 23:18:03'),
(17, 3, 4, 6, 1, 0, '2015-08-27 23:18:04', '2015-08-27 23:18:04'),
(18, 3, 4, 7, 0, 0, '2015-08-27 23:18:04', '2015-08-27 23:18:04'),
(19, 3, 4, 8, 1, 0, '2015-08-27 23:18:04', '2015-08-27 23:18:04'),
(20, 3, 4, 9, 0, 0, '2015-08-27 23:18:04', '2015-08-27 23:18:04'),
(21, 4, 5, 1, 1, 0, '2015-08-28 20:31:48', '2015-08-28 20:31:48'),
(22, 4, 5, 2, 1, 0, '2015-08-28 20:31:48', '2015-08-28 20:31:48'),
(23, 4, 5, 3, 1, 0, '2015-08-28 20:31:48', '2015-08-28 20:31:48'),
(24, 4, 5, 4, 0, 0, '2015-08-28 20:31:48', '2015-08-28 20:31:48'),
(25, 4, 5, 5, 1, 0, '2015-08-28 20:31:48', '2015-08-28 20:31:48'),
(26, 4, 5, 6, 1, 0, '2015-08-28 20:31:48', '2015-08-28 20:31:48'),
(27, 4, 5, 7, 0, 0, '2015-08-28 20:31:49', '2015-08-28 20:31:49'),
(28, 4, 5, 8, 0, 0, '2015-08-28 20:31:49', '2015-08-28 20:31:49'),
(29, 4, 5, 9, 1, 0, '2015-08-28 20:31:49', '2015-08-28 20:31:49'),
(30, 8, 6, 1, 0, 1, '2015-09-22 17:46:10', '2015-09-22 17:46:10'),
(31, 8, 6, 2, 1, 0, '2015-09-22 17:46:10', '2015-09-22 17:46:10'),
(32, 8, 6, 3, 0, 0, '2015-09-22 17:46:10', '2015-09-22 17:46:10'),
(33, 8, 6, 4, 1, 1, '2015-09-22 17:46:10', '2015-09-22 17:46:10'),
(34, 8, 6, 5, 0, 0, '2015-09-22 17:46:10', '2015-09-22 17:46:10'),
(35, 8, 6, 6, 0, 0, '2015-09-22 17:46:11', '2015-09-22 17:46:11'),
(36, 8, 6, 7, 0, 0, '2015-09-22 17:46:11', '2015-09-22 17:46:11'),
(37, 8, 6, 8, 0, 0, '2015-09-22 17:46:11', '2015-09-22 17:46:11'),
(38, 8, 6, 9, 0, 0, '2015-09-22 17:46:11', '2015-09-22 17:46:11'),
(39, 13, 15, 1, 1, 1, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(40, 13, 15, 2, 1, 1, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(41, 13, 15, 3, 1, 0, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(42, 13, 15, 4, 1, 1, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(43, 13, 15, 5, 0, 0, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(44, 13, 15, 6, 1, 0, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(45, 13, 15, 7, 1, 0, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(46, 13, 15, 8, 1, 1, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(47, 13, 15, 9, 0, 0, '2015-10-08 04:35:41', '2015-10-08 04:35:41'),
(48, 11, 13, 1, 0, 1, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(49, 11, 13, 2, 1, 0, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(50, 11, 13, 3, 1, 1, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(51, 11, 13, 4, 1, 1, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(52, 11, 13, 5, 0, 0, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(53, 11, 13, 6, 1, 1, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(54, 11, 13, 7, 0, 0, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(55, 11, 13, 8, 0, 0, '2015-10-20 00:05:15', '2015-10-20 00:05:15'),
(56, 11, 13, 9, 0, 0, '2015-10-20 00:05:15', '2015-10-20 00:05:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_medicos`
--

CREATE TABLE IF NOT EXISTS `pacientes_medicos` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_medicos`
--

INSERT INTO `pacientes_medicos` (`id`, `paciente_id`, `medico_id`, `created`, `modified`) VALUES
(1, 1, 1, '2015-07-14 00:16:25', '2015-07-14 00:16:25'),
(2, 2, 1, '2015-08-17 23:35:43', '2015-08-17 23:35:43'),
(4, 3, 4, '2015-08-21 11:33:44', '2015-08-21 11:33:44'),
(5, 4, 1, '2015-08-27 23:13:57', '2015-08-27 23:13:57'),
(6, 5, 5, '2015-08-28 20:26:16', '2015-08-28 20:26:16'),
(11, 6, 10, '2015-09-22 03:28:36', '2015-09-22 03:28:36'),
(12, 11, 10, '2015-09-23 23:12:52', '2015-09-23 23:12:52'),
(13, 12, 10, '2015-09-27 22:02:23', '2015-09-27 22:02:23'),
(14, 12, 10, '2015-09-30 23:25:52', '2015-09-30 23:25:52'),
(15, 13, 10, '2015-10-01 21:43:02', '2015-10-01 21:43:02'),
(16, 14, 10, '2015-10-05 21:37:15', '2015-10-05 21:37:15'),
(17, 15, 24, '2015-10-07 22:17:01', '2015-10-07 22:17:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_pielsintomas`
--

CREATE TABLE IF NOT EXISTS `pacientes_pielsintomas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `pielsintoma_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_pielsintomas`
--

INSERT INTO `pacientes_pielsintomas` (`id`, `paciente_id`, `pielsintoma_id`, `estado`, `medico_id`, `numero`, `created`, `modified`) VALUES
(1, 1, 1, 0, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(2, 1, 2, 1, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(3, 1, 3, 0, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(4, 1, 4, 1, 1, 1, '2015-07-21 00:39:09', '2015-08-16 23:46:48'),
(5, 3, 1, 0, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(6, 3, 2, 1, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(7, 3, 3, 1, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(8, 3, 4, 1, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(9, 4, 1, 0, 1, 3, '2015-08-27 23:15:08', '2015-08-27 23:18:24'),
(10, 4, 2, 0, 1, 3, '2015-08-27 23:15:08', '2015-08-27 23:18:24'),
(11, 4, 3, 0, 1, 3, '2015-08-27 23:15:08', '2015-08-27 23:18:24'),
(12, 4, 4, 1, 1, 3, '2015-08-27 23:15:08', '2015-08-27 23:18:24'),
(13, 5, 1, 1, 5, 4, '2015-08-28 20:28:34', '2015-08-28 20:29:05'),
(14, 5, 2, 1, 5, 4, '2015-08-28 20:28:34', '2015-08-28 20:29:05'),
(15, 5, 3, 1, 5, 4, '2015-08-28 20:28:34', '2015-08-28 20:29:05'),
(16, 5, 4, 1, 5, 4, '2015-08-28 20:28:34', '2015-08-28 20:29:05'),
(25, 10, 1, 1, 10, 7, '2015-09-22 05:02:04', '2015-09-22 05:03:05'),
(26, 10, 2, 1, 10, 7, '2015-09-22 05:02:04', '2015-09-22 05:03:05'),
(27, 10, 3, 0, 10, 7, '2015-09-22 05:02:04', '2015-09-22 05:03:05'),
(28, 10, 4, 1, 10, 7, '2015-09-22 05:02:04', '2015-09-22 05:03:05'),
(29, 6, 1, 0, 10, 8, '2015-09-22 17:40:04', '2015-09-22 17:40:04'),
(30, 6, 2, 1, 10, 8, '2015-09-22 17:40:04', '2015-09-22 17:40:04'),
(31, 6, 3, 0, 10, 8, '2015-09-22 17:40:04', '2015-09-22 17:40:04'),
(32, 6, 4, 1, 10, 8, '2015-09-22 17:40:04', '2015-09-22 17:40:04'),
(33, 12, 1, 0, 10, 10, '2015-09-27 22:03:10', '2015-09-27 22:03:10'),
(34, 12, 2, 1, 10, 10, '2015-09-27 22:03:10', '2015-09-27 22:03:10'),
(35, 12, 3, 0, 10, 10, '2015-09-27 22:03:10', '2015-09-27 22:03:10'),
(36, 12, 4, 1, 10, 10, '2015-09-27 22:03:10', '2015-09-27 22:03:10'),
(37, 12, 5, 1, 10, 10, '2015-09-27 22:03:10', '2015-09-27 22:03:10'),
(38, 12, 6, 0, 10, 10, '2015-09-27 22:03:11', '2015-09-27 22:03:11'),
(39, 13, 1, 1, 10, 11, '2015-10-01 21:43:47', '2015-10-20 00:04:15'),
(40, 13, 2, 1, 10, 11, '2015-10-01 21:43:47', '2015-10-20 00:04:15'),
(41, 13, 3, 0, 10, 11, '2015-10-01 21:43:47', '2015-10-20 00:04:15'),
(42, 13, 4, 1, 10, 11, '2015-10-01 21:43:47', '2015-10-20 00:04:15'),
(43, 13, 5, 0, 10, 11, '2015-10-01 21:43:47', '2015-10-20 00:04:15'),
(44, 13, 6, 0, 10, 11, '2015-10-01 21:43:47', '2015-10-20 00:04:15'),
(45, 14, 1, 1, 10, 12, '2015-10-05 21:37:59', '2015-10-05 21:37:59'),
(46, 14, 2, 0, 10, 12, '2015-10-05 21:37:59', '2015-10-05 21:37:59'),
(47, 14, 3, 0, 10, 12, '2015-10-05 21:37:59', '2015-10-05 21:37:59'),
(48, 14, 4, 1, 10, 12, '2015-10-05 21:37:59', '2015-10-05 21:37:59'),
(49, 14, 5, 0, 10, 12, '2015-10-05 21:37:59', '2015-10-05 21:37:59'),
(50, 14, 6, 0, 10, 12, '2015-10-05 21:37:59', '2015-10-05 21:37:59'),
(51, 15, 1, 1, 24, 13, '2015-10-08 01:43:26', '2015-10-08 02:21:41'),
(52, 15, 2, 1, 24, 13, '2015-10-08 01:43:26', '2015-10-08 02:21:41'),
(53, 15, 3, 0, 24, 13, '2015-10-08 01:43:26', '2015-10-08 02:21:41'),
(54, 15, 4, 1, 24, 13, '2015-10-08 01:43:26', '2015-10-08 02:21:41'),
(55, 15, 5, 0, 24, 13, '2015-10-08 01:43:26', '2015-10-08 02:21:41'),
(56, 15, 6, 0, 24, 13, '2015-10-08 01:43:26', '2015-10-08 02:21:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_resultados`
--

CREATE TABLE IF NOT EXISTS `pacientes_resultados` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `resultado_id` int(11) NOT NULL,
  `examene_id` int(11) DEFAULT NULL,
  `observacion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_resultados`
--

INSERT INTO `pacientes_resultados` (`id`, `numero`, `paciente_id`, `resultado_id`, `examene_id`, `observacion`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 'Celulas en forma de lapidas', '2015-08-21 08:35:26', '2015-09-22 03:10:48'),
(2, 1, 1, 2, 2, 'vdfvfdve', '2015-08-21 08:37:29', '2015-08-21 08:37:29'),
(3, 2, 3, 1, 1, 'thjke tber th tgrgregr eghr gtr', '2015-08-21 11:54:18', '2015-08-21 12:02:39'),
(4, 3, 4, 1, 1, 'cndjse', '2015-08-28 09:37:37', '2015-08-28 09:37:37'),
(5, 4, 5, 2, 1, 'celulas en lapida', '2015-08-28 20:32:24', '2015-08-28 20:32:24'),
(6, 8, 6, 1, 1, 'Contenido de celulas acantoliticas y zonas de celulas en lapida, con predominio de linfocitos.', '2015-09-22 17:48:03', '2015-10-20 18:40:45'),
(7, 10, 12, 1, 1, '', '2015-09-29 03:12:27', '2015-09-29 03:12:27'),
(9, 13, 15, 1, 1, 'CÃ©lulas en forma de lapida.', '2015-10-08 04:45:05', '2015-10-08 04:45:05'),
(10, 11, 13, 1, 1, 'Celulas en forma de lapida', '2015-10-20 00:05:36', '2015-10-20 00:05:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_signos`
--

CREATE TABLE IF NOT EXISTS `pacientes_signos` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `signo_id` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_signos`
--

INSERT INTO `pacientes_signos` (`id`, `paciente_id`, `signo_id`, `valor`, `numero`, `created`, `modified`) VALUES
(1, 1, 1, '5.00', 1, '2015-08-19 11:02:58', '2015-08-19 11:06:30'),
(2, 1, 2, '3.00', 1, '2015-08-19 11:02:58', '2015-08-19 11:06:31'),
(3, 3, 1, '20.00', 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(4, 3, 2, '60.00', 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(5, 3, 3, '2.00', 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(6, 3, 4, '60.00', 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(7, 3, 5, '1.56', 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(8, 4, 1, '55.00', 3, '2015-08-27 23:14:43', '2015-08-27 23:14:43'),
(9, 4, 2, NULL, 3, '2015-08-27 23:14:43', '2015-08-27 23:14:43'),
(10, 4, 3, '32.00', 3, '2015-08-27 23:14:43', '2015-08-27 23:14:43'),
(11, 4, 4, NULL, 3, '2015-08-27 23:14:43', '2015-08-27 23:14:43'),
(12, 4, 5, NULL, 3, '2015-08-27 23:14:43', '2015-08-27 23:14:43'),
(13, 5, 1, '80.00', 4, '2015-08-28 20:26:53', '2015-08-28 20:26:53'),
(14, 5, 2, '70.00', 4, '2015-08-28 20:26:53', '2015-08-28 20:26:53'),
(15, 5, 3, '35.00', 4, '2015-08-28 20:26:53', '2015-08-28 20:26:53'),
(16, 5, 4, '70.00', 4, '2015-08-28 20:26:53', '2015-08-28 20:26:53'),
(17, 5, 5, '1.70', 4, '2015-08-28 20:26:53', '2015-08-28 20:26:53'),
(23, 2, 1, '78.00', 6, '2015-09-19 23:17:45', '2015-09-19 23:17:45'),
(24, 2, 2, '78.00', 6, '2015-09-19 23:17:45', '2015-09-19 23:17:45'),
(25, 2, 3, '44.00', 6, '2015-09-19 23:17:45', '2015-09-19 23:17:45'),
(26, 2, 4, '45.00', 6, '2015-09-19 23:17:45', '2015-09-19 23:17:45'),
(27, 2, 5, '12.00', 6, '2015-09-19 23:17:45', '2015-09-19 23:17:45'),
(38, 10, 1, '45.00', 7, '2015-09-22 03:35:53', '2015-09-22 03:35:53'),
(39, 10, 2, '68.00', 7, '2015-09-22 03:35:53', '2015-09-22 03:35:53'),
(40, 10, 3, '36.00', 7, '2015-09-22 03:35:53', '2015-09-22 03:35:53'),
(41, 10, 4, '62.00', 7, '2015-09-22 03:35:53', '2015-09-22 03:35:53'),
(42, 10, 5, '1.00', 7, '2015-09-22 03:35:53', '2015-09-22 03:35:53'),
(43, 11, 1, '68.00', 8, '2015-09-23 23:13:19', '2015-09-23 23:13:19'),
(44, 11, 2, '45.00', 8, '2015-09-23 23:13:19', '2015-09-23 23:13:19'),
(45, 11, 3, '37.00', 8, '2015-09-23 23:13:19', '2015-09-23 23:13:19'),
(46, 11, 4, '70.00', 8, '2015-09-23 23:13:19', '2015-09-23 23:13:19'),
(47, 11, 5, '1.70', 8, '2015-09-23 23:13:19', '2015-09-23 23:13:19'),
(48, 12, 1, '78.00', 9, '2015-09-27 22:02:38', '2015-09-27 22:02:38'),
(49, 12, 2, '45.00', 9, '2015-09-27 22:02:38', '2015-09-27 22:02:38'),
(50, 12, 3, '12.00', 9, '2015-09-27 22:02:38', '2015-09-27 22:02:38'),
(51, 12, 4, '235.00', 9, '2015-09-27 22:02:38', '2015-09-27 22:02:38'),
(52, 12, 5, '21.00', 9, '2015-09-27 22:02:39', '2015-09-27 22:02:39'),
(53, 13, 1, '89.00', 10, '2015-10-01 21:43:21', '2015-10-01 21:43:21'),
(54, 13, 2, '78.00', 10, '2015-10-01 21:43:21', '2015-10-01 21:43:21'),
(55, 13, 3, '45.00', 10, '2015-10-01 21:43:21', '2015-10-01 21:43:21'),
(56, 13, 4, '12.00', 10, '2015-10-01 21:43:21', '2015-10-01 21:43:21'),
(57, 13, 5, '12.00', 10, '2015-10-01 21:43:21', '2015-10-01 21:43:21'),
(58, 14, 1, '56.00', 11, '2015-10-05 21:37:35', '2015-10-05 21:37:35'),
(59, 14, 2, '5.00', 11, '2015-10-05 21:37:35', '2015-10-05 21:37:35'),
(60, 14, 3, '2.00', 11, '2015-10-05 21:37:35', '2015-10-05 21:37:35'),
(61, 14, 4, '3.00', 11, '2015-10-05 21:37:35', '2015-10-05 21:37:35'),
(62, 14, 5, '2.00', 11, '2015-10-05 21:37:35', '2015-10-05 21:37:35'),
(63, 15, 1, '68.00', 12, '2015-10-07 22:41:24', '2015-10-07 22:52:34'),
(64, 15, 2, '53.00', 12, '2015-10-07 22:41:24', '2015-10-07 22:52:35'),
(65, 15, 3, '37.00', 12, '2015-10-07 22:41:24', '2015-10-07 22:52:35'),
(66, 15, 4, '72.00', 12, '2015-10-07 22:41:24', '2015-10-07 22:52:35'),
(67, 15, 5, '1.65', 12, '2015-10-07 22:41:24', '2015-10-07 22:52:35'),
(68, 6, 1, '110.00', 13, '2015-10-20 18:30:09', '2015-10-20 18:30:09'),
(69, 6, 2, '68.00', 13, '2015-10-20 18:30:09', '2015-10-20 18:30:09'),
(70, 6, 3, '36.00', 13, '2015-10-20 18:30:09', '2015-10-20 18:30:09'),
(71, 6, 4, '62.00', 13, '2015-10-20 18:30:09', '2015-10-20 18:30:09'),
(72, 6, 5, '1.62', 13, '2015-10-20 18:30:09', '2015-10-20 18:30:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_sintomas`
--

CREATE TABLE IF NOT EXISTS `pacientes_sintomas` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `sintoma_id` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_sintomas`
--

INSERT INTO `pacientes_sintomas` (`id`, `numero`, `paciente_id`, `sintoma_id`, `estado`, `created`, `modified`) VALUES
(15, 1, 1, 1, 1, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(16, 1, 1, 2, 1, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(17, 1, 1, 3, 1, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(18, 1, 1, 4, 0, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(19, 1, 1, 5, 0, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(21, 1, 1, 7, 1, '2015-07-23 15:55:44', '2015-09-19 23:49:29'),
(22, 2, 3, 1, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(23, 2, 3, 2, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(24, 2, 3, 3, 1, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(25, 2, 3, 4, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(26, 2, 3, 5, 1, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(28, 2, 3, 7, 1, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(29, 3, 4, 1, 0, '2015-08-27 23:14:53', '2015-08-27 23:14:53'),
(30, 3, 4, 2, 1, '2015-08-27 23:14:54', '2015-08-27 23:14:54'),
(31, 3, 4, 3, 0, '2015-08-27 23:14:54', '2015-08-27 23:14:54'),
(32, 3, 4, 4, 0, '2015-08-27 23:14:54', '2015-08-27 23:14:54'),
(33, 3, 4, 5, 0, '2015-08-27 23:14:54', '2015-08-27 23:14:54'),
(35, 3, 4, 7, 1, '2015-08-27 23:14:54', '2015-08-27 23:14:54'),
(36, 4, 5, 1, 0, '2015-08-28 20:27:23', '2015-08-28 20:27:55'),
(37, 4, 5, 2, 0, '2015-08-28 20:27:23', '2015-08-28 20:27:55'),
(38, 4, 5, 3, 0, '2015-08-28 20:27:23', '2015-08-28 20:27:55'),
(39, 4, 5, 4, 0, '2015-08-28 20:27:23', '2015-08-28 20:27:55'),
(40, 4, 5, 5, 0, '2015-08-28 20:27:23', '2015-08-28 20:27:55'),
(42, 4, 5, 7, 1, '2015-08-28 20:27:23', '2015-08-28 20:27:55'),
(50, 6, 2, 1, 1, '2015-09-19 23:14:35', '2015-09-19 23:14:35'),
(51, 6, 2, 2, 1, '2015-09-19 23:14:35', '2015-09-19 23:14:35'),
(52, 6, 2, 3, 1, '2015-09-19 23:14:35', '2015-09-19 23:14:35'),
(53, 6, 2, 4, 0, '2015-09-19 23:14:35', '2015-09-19 23:14:35'),
(54, 6, 2, 5, 0, '2015-09-19 23:14:35', '2015-09-19 23:14:35'),
(70, 7, 10, 1, 0, '2015-09-22 03:38:31', '2015-09-22 03:38:31'),
(71, 7, 10, 2, 0, '2015-09-22 03:38:31', '2015-09-22 03:38:31'),
(72, 7, 10, 3, 0, '2015-09-22 03:38:31', '2015-09-22 03:38:31'),
(73, 7, 10, 4, 0, '2015-09-22 03:38:31', '2015-09-22 03:38:31'),
(74, 7, 10, 5, 0, '2015-09-22 03:38:31', '2015-09-22 03:38:31'),
(76, 7, 10, 7, 1, '2015-09-22 03:38:31', '2015-09-22 03:38:31'),
(77, 8, 6, 1, 0, '2015-09-22 17:38:16', '2015-09-22 17:38:16'),
(78, 8, 6, 2, 0, '2015-09-22 17:38:16', '2015-09-22 17:38:16'),
(79, 8, 6, 3, 0, '2015-09-22 17:38:16', '2015-09-22 17:38:16'),
(80, 8, 6, 4, 0, '2015-09-22 17:38:16', '2015-09-22 17:38:16'),
(81, 8, 6, 5, 0, '2015-09-22 17:38:16', '2015-09-22 17:38:16'),
(83, 8, 6, 7, 1, '2015-09-22 17:38:16', '2015-09-22 17:38:16'),
(89, 9, 11, 1, 1, '2015-09-23 23:14:18', '2015-09-23 23:14:33'),
(90, 9, 11, 2, 1, '2015-09-23 23:14:18', '2015-09-23 23:14:33'),
(91, 9, 11, 3, 1, '2015-09-23 23:14:18', '2015-09-23 23:14:33'),
(92, 9, 11, 4, 1, '2015-09-23 23:14:18', '2015-09-23 23:14:33'),
(93, 9, 11, 5, 1, '2015-09-23 23:14:18', '2015-09-23 23:14:33'),
(94, 9, 11, 7, 1, '2015-09-23 23:14:18', '2015-09-23 23:14:18'),
(95, 10, 12, 1, 1, '2015-09-27 22:02:55', '2015-09-27 22:02:55'),
(96, 10, 12, 2, 1, '2015-09-27 22:02:56', '2015-09-27 22:02:56'),
(97, 10, 12, 3, 0, '2015-09-27 22:02:56', '2015-09-27 22:02:56'),
(98, 10, 12, 4, 0, '2015-09-27 22:02:56', '2015-09-27 22:02:56'),
(99, 10, 12, 5, 0, '2015-09-27 22:02:56', '2015-09-27 22:02:56'),
(100, 10, 12, 7, 1, '2015-09-27 22:02:56', '2015-09-27 22:02:56'),
(101, 11, 13, 1, 1, '2015-10-01 21:43:32', '2015-10-01 21:43:32'),
(102, 11, 13, 2, 1, '2015-10-01 21:43:32', '2015-10-01 21:43:32'),
(103, 11, 13, 3, 0, '2015-10-01 21:43:32', '2015-10-01 21:43:32'),
(104, 11, 13, 4, 1, '2015-10-01 21:43:32', '2015-10-01 21:43:32'),
(105, 11, 13, 5, 1, '2015-10-01 21:43:32', '2015-10-01 21:43:32'),
(106, 11, 13, 7, 1, '2015-10-01 21:43:32', '2015-10-01 21:43:32'),
(107, 12, 14, 1, 1, '2015-10-05 21:37:43', '2015-10-05 21:37:43'),
(108, 12, 14, 2, 0, '2015-10-05 21:37:44', '2015-10-05 21:37:44'),
(109, 12, 14, 3, 0, '2015-10-05 21:37:44', '2015-10-05 21:37:44'),
(110, 12, 14, 4, 0, '2015-10-05 21:37:44', '2015-10-05 21:37:44'),
(111, 12, 14, 5, 0, '2015-10-05 21:37:44', '2015-10-05 21:37:44'),
(112, 12, 14, 7, 1, '2015-10-05 21:37:44', '2015-10-05 21:37:44'),
(113, 13, 15, 1, 1, '2015-10-08 00:55:11', '2015-10-08 01:22:50'),
(114, 13, 15, 2, 0, '2015-10-08 00:55:11', '2015-10-08 01:22:50'),
(115, 13, 15, 3, 1, '2015-10-08 00:55:11', '2015-10-08 01:22:50'),
(116, 13, 15, 4, 0, '2015-10-08 00:55:11', '2015-10-08 01:22:50'),
(117, 13, 15, 5, 0, '2015-10-08 00:55:11', '2015-10-08 01:22:51'),
(118, 13, 15, 7, 1, '2015-10-08 00:55:11', '2015-10-08 01:22:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_tipoampollas`
--

CREATE TABLE IF NOT EXISTS `pacientes_tipoampollas` (
  `id` int(11) NOT NULL,
  `areaampolla_id` int(11) NOT NULL,
  `tipoampolla_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_tipoampollas`
--

INSERT INTO `pacientes_tipoampollas` (`id`, `areaampolla_id`, `tipoampolla_id`, `estado`, `created`, `modified`) VALUES
(1, 1, 1, 0, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(2, 1, 2, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(3, 1, 3, 0, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(4, 1, 4, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(5, 2, 1, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(6, 2, 2, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(7, 2, 3, 0, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(8, 2, 4, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(9, 3, 5, 0, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(10, 3, 6, 1, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(11, 4, 5, 1, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(12, 4, 6, 0, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(13, 5, 1, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(14, 5, 2, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(15, 5, 3, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(16, 5, 4, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(17, 5, 5, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(18, 5, 6, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(19, 5, 7, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(20, 5, 8, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(21, 5, 9, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:52'),
(22, 10, 10, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:08'),
(23, 10, 11, 1, '2015-08-21 11:45:15', '2015-08-21 11:48:08'),
(24, 10, 12, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:08'),
(25, 10, 13, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:09'),
(26, 10, 14, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:09'),
(27, 10, 15, 1, '2015-08-21 11:45:15', '2015-08-21 11:48:09'),
(28, 10, 16, 0, '2015-08-21 11:45:16', '2015-08-21 11:48:09'),
(29, 10, 17, 0, '2015-08-21 11:45:16', '2015-08-21 11:48:09'),
(30, 10, 18, 1, '2015-08-21 11:45:16', '2015-08-21 11:48:09'),
(31, 13, 1, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:56'),
(32, 13, 2, 1, '2015-08-27 23:16:24', '2015-08-28 09:32:56'),
(33, 13, 3, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(34, 13, 4, 1, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(35, 13, 5, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(36, 13, 6, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(37, 13, 7, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(38, 13, 8, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(39, 13, 9, 0, '2015-08-27 23:16:24', '2015-08-28 09:32:57'),
(40, 14, 10, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(41, 14, 11, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(42, 14, 12, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(43, 14, 13, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(44, 14, 14, 1, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(45, 14, 15, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(46, 14, 16, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(47, 14, 17, 0, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(48, 14, 18, 1, '2015-08-27 23:16:52', '2015-08-27 23:16:52'),
(49, 19, 1, 0, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(50, 19, 2, 1, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(51, 19, 3, 0, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(52, 19, 4, 1, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(53, 19, 5, 0, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(54, 19, 6, 1, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(55, 19, 7, 0, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(56, 19, 8, 1, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(57, 19, 9, 1, '2015-08-28 20:30:15', '2015-08-28 20:30:15'),
(58, 23, 10, 1, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(59, 23, 11, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(60, 23, 12, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(61, 23, 13, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(62, 23, 14, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(63, 23, 15, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(64, 23, 16, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(65, 23, 17, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(66, 23, 18, 0, '2015-08-28 20:31:15', '2015-08-28 20:31:15'),
(67, 26, 1, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(68, 26, 2, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(69, 26, 3, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(70, 26, 4, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(71, 26, 5, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(72, 26, 6, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(73, 26, 7, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(74, 26, 8, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(75, 26, 9, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(76, 27, 1, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(77, 27, 2, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(78, 27, 3, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(79, 27, 4, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(80, 27, 5, 1, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(81, 27, 6, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(82, 27, 7, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(83, 27, 8, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(84, 27, 9, 0, '2015-09-19 22:14:14', '2015-09-19 22:14:14'),
(85, 29, 10, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(86, 29, 11, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(87, 29, 12, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(88, 29, 13, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(89, 29, 14, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(90, 29, 15, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(91, 29, 16, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(92, 29, 17, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(93, 29, 18, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(94, 30, 10, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(95, 30, 11, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(96, 30, 12, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(97, 30, 13, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(98, 30, 14, 1, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(99, 30, 15, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(100, 30, 16, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(101, 30, 17, 0, '2015-09-19 22:14:45', '2015-09-19 22:14:45'),
(102, 30, 18, 0, '2015-09-19 22:14:46', '2015-09-19 22:14:46'),
(103, 39, 1, 0, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(104, 39, 2, 1, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(105, 39, 3, 1, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(106, 39, 4, 0, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(107, 39, 5, 1, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(108, 39, 6, 1, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(109, 39, 7, 1, '2015-09-20 22:24:10', '2015-09-20 22:24:10'),
(110, 41, 8, 0, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(111, 41, 9, 1, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(112, 41, 10, 0, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(113, 41, 11, 0, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(114, 41, 12, 0, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(115, 41, 13, 0, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(116, 41, 14, 0, '2015-09-20 22:25:25', '2015-09-20 22:26:05'),
(117, 42, 8, 0, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(118, 42, 9, 0, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(119, 42, 10, 0, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(120, 42, 11, 1, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(121, 42, 12, 1, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(122, 42, 13, 1, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(123, 42, 14, 0, '2015-09-20 22:25:25', '2015-09-20 22:25:25'),
(124, 47, 1, 0, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(125, 47, 2, 1, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(126, 47, 3, 1, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(127, 47, 4, 1, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(128, 47, 5, 0, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(129, 47, 6, 0, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(130, 47, 7, 0, '2015-09-22 05:01:20', '2015-09-22 05:01:20'),
(131, 62, 8, 0, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(132, 62, 9, 1, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(133, 62, 10, 0, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(134, 62, 11, 1, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(135, 62, 12, 0, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(136, 62, 13, 1, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(137, 62, 14, 0, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(138, 62, 19, 0, '2015-09-22 05:01:37', '2015-09-22 05:01:37'),
(139, 67, 1, 0, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(140, 67, 2, 1, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(141, 67, 3, 1, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(142, 67, 4, 1, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(143, 67, 5, 1, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(144, 67, 6, 1, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(145, 67, 7, 1, '2015-09-22 17:42:09', '2015-10-20 18:36:01'),
(146, 69, 8, 0, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(147, 69, 9, 1, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(148, 69, 10, 1, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(149, 69, 11, 1, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(150, 69, 12, 1, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(151, 69, 13, 1, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(152, 69, 14, 1, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(153, 69, 19, 0, '2015-09-22 17:44:32', '2015-10-20 18:53:44'),
(154, 68, 1, 0, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(155, 68, 2, 1, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(156, 68, 3, 1, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(157, 68, 4, 1, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(158, 68, 5, 1, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(159, 68, 6, 1, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(160, 68, 7, 1, '2015-09-23 21:14:27', '2015-10-20 18:36:01'),
(161, 71, 8, 0, '2015-09-23 21:15:23', '2015-10-20 18:53:27'),
(162, 71, 9, 0, '2015-09-23 21:15:23', '2015-10-20 18:53:27'),
(163, 71, 10, 0, '2015-09-23 21:15:23', '2015-10-20 18:53:27'),
(164, 71, 11, 0, '2015-09-23 21:15:24', '2015-10-20 18:53:27'),
(165, 71, 12, 0, '2015-09-23 21:15:24', '2015-10-20 18:53:27'),
(166, 71, 13, 0, '2015-09-23 21:15:24', '2015-10-20 18:53:27'),
(167, 71, 14, 0, '2015-09-23 21:15:24', '2015-10-20 18:53:27'),
(168, 71, 19, 0, '2015-09-23 21:15:24', '2015-10-20 18:53:27'),
(169, 65, 1, 0, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(170, 65, 2, 1, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(171, 65, 3, 1, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(172, 65, 4, 1, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(173, 65, 5, 1, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(174, 65, 6, 0, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(175, 65, 7, 0, '2015-09-23 23:03:56', '2015-09-23 23:03:56'),
(176, 66, 1, 0, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(177, 66, 2, 1, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(178, 66, 3, 1, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(179, 66, 4, 1, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(180, 66, 5, 1, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(181, 66, 6, 1, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(182, 66, 7, 1, '2015-09-23 23:03:56', '2015-10-20 18:36:00'),
(183, 70, 8, 0, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(184, 70, 9, 1, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(185, 70, 10, 0, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(186, 70, 11, 1, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(187, 70, 12, 1, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(188, 70, 13, 1, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(189, 70, 14, 1, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(190, 70, 19, 0, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(191, 70, 20, 0, '2015-09-23 23:08:23', '2015-10-20 18:53:44'),
(192, 72, 8, 0, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(193, 72, 9, 0, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(194, 72, 10, 1, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(195, 72, 11, 1, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(196, 72, 12, 1, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(197, 72, 13, 1, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(198, 72, 14, 0, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(199, 72, 19, 0, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(200, 72, 20, 0, '2015-09-23 23:08:24', '2015-10-20 18:53:44'),
(201, 75, 1, 0, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(202, 75, 2, 1, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(203, 75, 3, 1, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(204, 75, 4, 1, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(205, 75, 5, 1, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(206, 75, 6, 1, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(207, 75, 7, 1, '2015-09-23 23:15:11', '2015-09-23 23:15:11'),
(208, 79, 1, 0, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(209, 79, 2, 1, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(210, 79, 3, 1, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(211, 79, 4, 0, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(212, 79, 5, 1, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(213, 79, 6, 1, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(214, 79, 7, 0, '2015-09-27 22:03:29', '2015-09-27 22:03:29'),
(215, 87, 1, 1, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(216, 87, 2, 0, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(217, 87, 3, 1, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(218, 87, 4, 1, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(219, 87, 5, 1, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(220, 87, 6, 0, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(221, 87, 7, 1, '2015-10-01 21:45:01', '2015-10-20 00:04:55'),
(222, 86, 1, 1, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(223, 86, 2, 1, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(224, 86, 3, 1, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(225, 86, 4, 0, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(226, 86, 5, 0, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(227, 86, 6, 0, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(228, 86, 7, 0, '2015-10-01 21:58:01', '2015-10-20 00:04:55'),
(229, 91, 8, 0, '2015-10-01 22:18:34', '2015-10-01 22:22:07'),
(230, 91, 9, 0, '2015-10-01 22:18:34', '2015-10-01 22:22:07'),
(231, 91, 10, 0, '2015-10-01 22:18:34', '2015-10-01 22:22:07'),
(232, 91, 11, 0, '2015-10-01 22:18:35', '2015-10-01 22:22:07'),
(233, 91, 12, 0, '2015-10-01 22:18:35', '2015-10-01 22:22:07'),
(234, 91, 13, 0, '2015-10-01 22:18:35', '2015-10-01 22:22:07'),
(235, 91, 14, 0, '2015-10-01 22:18:35', '2015-10-01 22:22:07'),
(236, 91, 19, 0, '2015-10-01 22:18:35', '2015-10-01 22:22:07'),
(237, 91, 20, 0, '2015-10-01 22:18:35', '2015-10-01 22:22:07'),
(238, 93, 1, 0, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(239, 93, 2, 1, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(240, 93, 3, 1, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(241, 93, 4, 0, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(242, 93, 5, 1, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(243, 93, 6, 1, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(244, 93, 7, 1, '2015-10-05 21:38:12', '2015-10-05 21:44:49'),
(245, 94, 1, 0, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(246, 94, 2, 1, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(247, 94, 3, 1, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(248, 94, 4, 1, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(249, 94, 5, 1, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(250, 94, 6, 1, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(251, 94, 7, 1, '2015-10-05 21:43:14', '2015-10-05 21:44:49'),
(252, 95, 1, 0, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(253, 95, 2, 1, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(254, 95, 3, 1, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(255, 95, 4, 0, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(256, 95, 5, 0, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(257, 95, 6, 1, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(258, 95, 7, 1, '2015-10-05 21:44:48', '2015-10-05 21:44:48'),
(259, 95, 1, 0, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(260, 95, 2, 1, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(261, 95, 3, 1, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(262, 95, 4, 0, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(263, 95, 5, 0, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(264, 95, 6, 1, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(265, 95, 7, 1, '2015-10-05 21:44:49', '2015-10-05 21:44:49'),
(266, 97, 8, 1, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(267, 97, 9, 1, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(268, 97, 10, 0, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(269, 97, 11, 1, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(270, 97, 12, 0, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(271, 97, 13, 0, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(272, 97, 14, 0, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(273, 97, 19, 0, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(274, 97, 20, 0, '2015-10-05 21:46:10', '2015-10-05 21:46:10'),
(275, 103, 1, 0, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(276, 103, 2, 1, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(277, 103, 3, 1, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(278, 103, 4, 1, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(279, 103, 5, 0, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(280, 103, 6, 0, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(281, 103, 7, 0, '2015-10-08 02:33:58', '2015-10-08 04:16:44'),
(282, 105, 8, 0, '2015-10-08 04:14:42', '2015-10-08 04:14:42'),
(283, 105, 9, 1, '2015-10-08 04:14:42', '2015-10-08 04:14:42'),
(284, 105, 10, 0, '2015-10-08 04:14:42', '2015-10-08 04:14:42'),
(285, 105, 11, 0, '2015-10-08 04:14:43', '2015-10-08 04:14:43'),
(286, 105, 12, 0, '2015-10-08 04:14:43', '2015-10-08 04:14:43'),
(287, 105, 13, 0, '2015-10-08 04:14:43', '2015-10-08 04:14:43'),
(288, 105, 14, 0, '2015-10-08 04:14:43', '2015-10-08 04:14:43'),
(289, 105, 19, 0, '2015-10-08 04:14:43', '2015-10-08 04:14:43'),
(290, 105, 20, 0, '2015-10-08 04:14:43', '2015-10-08 04:14:43'),
(291, 102, 1, 0, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(292, 102, 2, 0, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(293, 102, 3, 0, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(294, 102, 4, 1, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(295, 102, 5, 1, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(296, 102, 6, 0, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(297, 102, 7, 0, '2015-10-08 04:16:44', '2015-10-08 04:16:44'),
(298, 89, 8, 0, '2015-10-20 00:04:32', '2015-10-20 00:04:32'),
(299, 89, 9, 0, '2015-10-20 00:04:32', '2015-10-20 00:04:32'),
(300, 89, 10, 0, '2015-10-20 00:04:32', '2015-10-20 00:04:32'),
(301, 89, 11, 1, '2015-10-20 00:04:32', '2015-10-20 00:04:32'),
(302, 89, 12, 1, '2015-10-20 00:04:33', '2015-10-20 00:04:33'),
(303, 89, 13, 1, '2015-10-20 00:04:33', '2015-10-20 00:04:33'),
(304, 89, 14, 0, '2015-10-20 00:04:33', '2015-10-20 00:04:33'),
(305, 89, 19, 0, '2015-10-20 00:04:33', '2015-10-20 00:04:33'),
(306, 89, 20, 0, '2015-10-20 00:04:33', '2015-10-20 00:04:33'),
(307, 85, 1, 0, '2015-10-20 00:04:54', '2015-10-20 00:04:54'),
(308, 85, 2, 0, '2015-10-20 00:04:54', '2015-10-20 00:04:54'),
(309, 85, 3, 1, '2015-10-20 00:04:54', '2015-10-20 00:04:54'),
(310, 85, 4, 0, '2015-10-20 00:04:54', '2015-10-20 00:04:54'),
(311, 85, 5, 1, '2015-10-20 00:04:54', '2015-10-20 00:04:54'),
(312, 85, 6, 0, '2015-10-20 00:04:55', '2015-10-20 00:04:55'),
(313, 85, 7, 0, '2015-10-20 00:04:55', '2015-10-20 00:04:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_tipoerociones`
--

CREATE TABLE IF NOT EXISTS `pacientes_tipoerociones` (
  `id` int(11) NOT NULL,
  `tipoerocione_id` int(11) NOT NULL,
  `areaampolla_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes_tipoerociones`
--

INSERT INTO `pacientes_tipoerociones` (`id`, `tipoerocione_id`, `areaampolla_id`, `estado`, `created`, `modified`) VALUES
(1, 1, 1, 1, '2015-07-26 21:30:06', '2015-08-17 00:04:16'),
(2, 2, 1, 0, '2015-07-26 21:30:06', '2015-08-16 23:53:19'),
(3, 1, 2, 1, '2015-07-26 21:30:06', '2015-08-17 00:04:16'),
(4, 2, 2, 0, '2015-07-26 21:30:06', '2015-08-16 23:53:19'),
(5, 1, 5, 1, '2015-08-21 11:47:36', '2015-08-21 11:47:54'),
(6, 3, 10, 1, '2015-08-21 11:48:12', '2015-08-21 11:48:12'),
(7, 4, 14, 0, '2015-08-27 23:16:55', '2015-08-27 23:16:55'),
(8, 5, 14, 1, '2015-08-27 23:16:56', '2015-08-27 23:16:56'),
(9, 6, 14, 0, '2015-08-27 23:16:56', '2015-08-27 23:16:56'),
(10, 1, 19, 0, '2015-08-28 20:30:29', '2015-08-28 20:30:29'),
(11, 2, 19, 1, '2015-08-28 20:30:29', '2015-08-28 20:30:29'),
(12, 3, 19, 0, '2015-08-28 20:30:29', '2015-08-28 20:30:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `penfigoampollas`
--

CREATE TABLE IF NOT EXISTS `penfigoampollas` (
  `id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `tipoampolla_id` int(11) NOT NULL,
  `importancia` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `penfigoampollas`
--

INSERT INTO `penfigoampollas` (`id`, `penfigo_id`, `area_id`, `tipoampolla_id`, `importancia`, `created`, `modified`) VALUES
(15, 5, 6, 8, 1, '2015-09-20 22:30:38', '2015-09-20 22:30:38'),
(16, 5, 8, 8, 1, '2015-09-20 22:30:47', '2015-09-20 22:30:47'),
(29, 1, 2, 2, NULL, '2015-09-23 20:55:01', '2015-10-05 19:00:53'),
(30, 1, 2, 3, NULL, '2015-09-23 20:55:08', '2015-10-05 19:01:01'),
(31, 1, 2, 4, NULL, '2015-09-23 20:55:16', '2015-10-05 19:01:09'),
(32, 1, 2, 5, NULL, '2015-09-23 20:55:27', '2015-10-05 19:01:18'),
(33, 1, 2, 6, NULL, '2015-09-23 20:55:36', '2015-10-05 19:01:28'),
(34, 1, 2, 7, NULL, '2015-09-23 20:55:46', '2015-10-05 19:01:41'),
(37, 1, 3, 2, 1, '2015-09-23 20:56:46', '2015-10-01 22:00:12'),
(38, 1, 3, 3, 1, '2015-09-23 20:56:53', '2015-10-01 22:00:29'),
(39, 1, 3, 4, 1, '2015-09-23 20:57:01', '2015-10-01 22:00:36'),
(40, 1, 3, 5, 1, '2015-09-23 20:57:09', '2015-10-01 22:00:44'),
(41, 1, 3, 6, 1, '2015-09-23 20:57:17', '2015-10-01 22:00:54'),
(42, 1, 3, 7, 1, '2015-09-23 20:57:23', '2015-10-01 22:01:02'),
(43, 1, 4, 2, 1, '2015-09-23 20:58:58', '2015-09-23 20:58:58'),
(44, 1, 4, 3, 1, '2015-09-23 20:59:05', '2015-09-23 20:59:05'),
(45, 1, 4, 4, 1, '2015-09-23 20:59:15', '2015-09-23 20:59:15'),
(46, 1, 4, 5, 1, '2015-09-23 20:59:47', '2015-09-23 20:59:55'),
(47, 1, 4, 6, 1, '2015-09-23 21:00:06', '2015-09-23 21:00:06'),
(48, 1, 4, 7, 1, '2015-09-23 21:00:13', '2015-09-23 21:00:13'),
(61, 1, 7, 2, 1, '2015-09-23 21:02:51', '2015-09-23 21:02:51'),
(62, 1, 7, 3, 1, '2015-09-23 21:03:04', '2015-09-23 21:03:16'),
(63, 1, 7, 4, 1, '2015-09-23 21:03:27', '2015-09-23 21:03:27'),
(64, 1, 7, 5, 1, '2015-09-23 21:03:36', '2015-09-23 21:03:47'),
(65, 1, 7, 6, 1, '2015-09-23 21:04:14', '2015-09-23 21:04:14'),
(66, 1, 7, 7, 1, '2015-09-23 21:04:28', '2015-09-23 21:04:28'),
(81, 2, 1, 9, 1, '2015-09-23 21:09:13', '2015-10-05 22:35:23'),
(82, 2, 1, 10, 1, '2015-09-23 21:09:24', '2015-10-05 22:35:31'),
(83, 2, 1, 11, 1, '2015-09-23 21:09:32', '2015-10-05 22:35:42'),
(84, 2, 1, 12, 1, '2015-09-23 21:09:43', '2015-10-05 22:35:50'),
(85, 2, 1, 13, 1, '2015-09-23 21:09:51', '2015-10-05 22:36:02'),
(86, 2, 1, 14, 1, '2015-09-23 21:10:02', '2015-10-05 22:36:22'),
(87, 2, 5, 9, 1, '2015-09-23 21:10:34', '2015-10-05 22:38:18'),
(88, 2, 5, 10, 1, '2015-09-23 21:10:43', '2015-10-05 22:38:27'),
(89, 2, 5, 11, 1, '2015-09-23 21:10:52', '2015-10-05 22:38:37'),
(90, 2, 5, 12, 1, '2015-09-23 21:11:00', '2015-10-05 22:38:48'),
(91, 2, 5, 13, NULL, '2015-09-23 21:11:10', '2015-10-05 21:44:04'),
(92, 2, 5, 14, NULL, '2015-09-23 21:11:20', '2015-10-05 21:44:15'),
(93, 2, 6, 9, NULL, '2015-09-23 21:11:35', '2015-10-05 22:31:20'),
(94, 2, 6, 10, NULL, '2015-09-23 21:11:46', '2015-10-05 22:31:26'),
(95, 2, 6, 11, NULL, '2015-09-23 21:11:55', '2015-10-05 22:31:45'),
(96, 2, 6, 12, NULL, '2015-09-23 21:12:05', '2015-10-05 22:31:59'),
(97, 2, 6, 13, NULL, '2015-09-23 21:12:12', '2015-10-05 22:32:08'),
(98, 2, 6, 14, NULL, '2015-09-23 21:12:21', '2015-10-05 22:32:34'),
(99, 2, 8, 9, NULL, '2015-09-23 21:12:46', '2015-10-05 22:33:21'),
(100, 2, 8, 10, NULL, '2015-09-23 21:12:54', '2015-10-05 22:33:34'),
(101, 2, 8, 11, NULL, '2015-09-23 21:13:19', '2015-10-05 22:33:42'),
(102, 2, 8, 12, NULL, '2015-09-23 21:13:29', '2015-10-05 22:33:57'),
(103, 2, 8, 13, NULL, '2015-09-23 21:13:41', '2015-10-05 22:34:09'),
(104, 2, 8, 14, NULL, '2015-09-23 21:13:49', '2015-10-05 22:34:18'),
(107, 4, 4, 3, NULL, '2015-09-23 22:55:34', '2015-09-23 22:55:34'),
(108, 4, 4, 4, NULL, '2015-09-23 22:55:41', '2015-09-23 22:55:41'),
(109, 4, 4, 5, NULL, '2015-09-23 22:55:50', '2015-09-23 22:55:50'),
(110, 4, 4, 6, NULL, '2015-09-23 22:55:57', '2015-09-23 22:55:57'),
(111, 4, 4, 7, NULL, '2015-09-23 22:56:04', '2015-09-23 22:56:04'),
(112, 3, 6, 11, 1, '2015-09-23 22:59:50', '2015-09-23 22:59:50'),
(113, 3, 6, 13, 1, '2015-09-23 23:00:00', '2015-09-23 23:00:00'),
(114, 3, 6, 14, 1, '2015-09-23 23:00:08', '2015-09-23 23:00:08'),
(115, 3, 8, 11, 1, '2015-09-23 23:00:21', '2015-09-23 23:00:21'),
(116, 3, 8, 13, 1, '2015-09-23 23:00:33', '2015-09-23 23:00:33'),
(117, 3, 8, 14, NULL, '2015-09-23 23:00:40', '2015-09-23 23:00:40'),
(118, 3, 6, 20, 1, '2015-09-23 23:03:17', '2015-09-23 23:03:17'),
(119, 3, 8, 20, 1, '2015-09-23 23:03:26', '2015-09-23 23:03:26'),
(122, 3, 5, 9, NULL, '2015-10-01 21:27:53', '2015-10-01 21:27:53'),
(123, 3, 5, 10, NULL, '2015-10-01 21:28:00', '2015-10-01 21:28:00'),
(124, 3, 5, 11, NULL, '2015-10-01 21:29:21', '2015-10-01 21:29:21'),
(125, 3, 5, 12, NULL, '2015-10-01 21:29:30', '2015-10-01 21:29:30'),
(126, 3, 5, 13, NULL, '2015-10-01 21:29:42', '2015-10-01 21:29:42'),
(127, 3, 5, 14, NULL, '2015-10-01 21:29:54', '2015-10-01 21:29:54'),
(128, 5, 6, 2, NULL, '2015-10-01 21:35:46', '2015-10-01 21:35:46'),
(129, 5, 8, 2, NULL, '2015-10-01 21:35:55', '2015-10-01 21:35:55'),
(136, 4, 6, 19, 1, '2015-10-01 21:41:23', '2015-10-01 21:41:23'),
(137, 4, 8, 19, 1, '2015-10-01 21:41:30', '2015-10-01 21:41:30'),
(138, 4, 7, 19, 1, '2015-10-01 21:41:51', '2015-10-01 21:41:51'),
(139, 4, 4, 19, 1, '2015-10-01 21:41:59', '2015-10-01 21:41:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `penfigoerociones`
--

CREATE TABLE IF NOT EXISTS `penfigoerociones` (
  `id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `tipoerocione_id` int(11) NOT NULL,
  `importancia` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `penfigoerociones`
--

INSERT INTO `penfigoerociones` (`id`, `penfigo_id`, `area_id`, `tipoerocione_id`, `importancia`, `created`, `modified`) VALUES
(1, 2, 4, 3, NULL, '2015-08-28 19:53:06', '2015-08-28 19:53:06'),
(2, 2, 3, 3, NULL, '2015-08-28 19:53:21', '2015-08-28 19:53:21'),
(3, 2, 6, 4, NULL, '2015-08-28 19:53:37', '2015-08-28 19:53:37'),
(4, 2, 2, 5, NULL, '2015-08-28 19:53:56', '2015-08-28 19:53:56'),
(5, 1, 1, 1, 1, '2015-08-28 19:56:53', '2015-08-28 19:57:48'),
(6, 1, 2, 3, 1, '2015-08-28 19:58:07', '2015-08-28 19:58:07'),
(7, 1, 3, 3, 1, '2015-08-28 19:58:23', '2015-08-28 19:58:23'),
(8, 1, 4, 4, 1, '2015-08-28 19:58:38', '2015-08-28 19:58:38'),
(9, 1, 5, 6, 1, '2015-08-28 19:58:52', '2015-08-28 19:58:52'),
(10, 1, 6, 6, 1, '2015-08-28 19:59:04', '2015-08-28 19:59:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `penfigos`
--

CREATE TABLE IF NOT EXISTS `penfigos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `no_penfigo` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `tratamiento` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `penfigos`
--

INSERT INTO `penfigos` (`id`, `nombre`, `descripcion`, `no_penfigo`, `created`, `modified`, `tratamiento`) VALUES
(1, 'Penfigo Vulgar', 'Representa 80 a 85% de los casos la erupciÃ³n empieza en cualquier parte de la piel o mucosas (60%), con predominio en piel cabelluda, \r\npliegues inguinales y axilares, ombligo y regiÃ³n submamaria.\r\n Hay ampollas flÃ¡cidas de I a 2 cm, que aparecen en piel sanao  eritematosa, y que al romperse dejan zonas denudadas, excoriaciones y costras melicÃ©ricas. \r\nHay dolor, pero no siempre prurito', 0, '2015-07-29 23:59:04', '2015-10-01 01:09:41', 'Dieta blanda hiposodica moderada libre de histamino liberadores.\r\nReposo \r\nBaÃ±o diario con shampo IONIL-T\r\nCuaraciones diarias con permanganato de potasio y aplicaciones de crema magistral.\r\nPrednisona\r\nAzatioprina'),
(2, 'Penfigo foliaceo', 'Es una dermatosis que empieza como pÃ©nfigo o dermatitis seborreica y se transforma en eritrodermia exfoliativa y rezumante (de Darier). La ampolla es flÃ¡cida y delgada, y tiene una base eritematosa. No afecta las mucosas', 0, '2015-08-07 12:51:39', '2015-10-01 01:12:48', 'Dieta blanda hiposodica moderada.\r\nReposo \r\nBaÃ±o diario con shampo IONIL-T\r\nCuaraciones diarias con permanganato de potasio y aplicaciones de crema magistral.\r\nPrednisona'),
(3, 'Penfigo IGA', 'Esta es la forma menos peligrosa de penfigo, las ampollas son parecidas a la del penfigo foliaceo, tambien es posible que aparezcan pequeÃ±as ampollas con pus, la causa de esta forma de penfigo es la presencia de anticuerpos llamado IGA.', 0, '2015-09-20 01:37:56', '2015-10-01 01:54:47', 'corticoesteroides topicos e intralesionales\r\ncuraciones con con Crema dexametasona\r\nBaÃ±o diario \r\nAzatioprina\r\ndieta blanda\r\nsulfona\r\nbaÃ±o con jaboncillo neutro'),
(4, 'Penfigo Paraneoplasico', 'Esta es una forma rara de penfigo, llega a ocasionar llagas dolorosas en en la boca y los labios. ', 0, '2015-09-20 01:40:20', '2015-10-01 01:52:39', 'BaÃ±o diario acompaÃ±ado de dieta blanda \r\ncuraciones concrema Dexametasona\r\nMetilprednisolona \r\nbleomicina\r\nciclofosfamina'),
(5, 'Penfigoide ', 'El penfigoide es tambien una enfermedad autoinmunitaria de la piel que puede causar ampollas, profundas y dificiles de reventar, El penfigoide ampolloso generalmente ocurre en personas de edad avanzada y es poco frecuente en personas jÃ³venes. Los sÃ­ntomas aparecen y desaparecen. En la mayorÃ­a de los pacientes, la enfermedad desaparece al cabo de seis aÃ±os.', 1, '2015-09-20 01:42:57', '2015-10-01 02:24:51', 'Prednisona \r\nCorticoides orales o inyectables\r\nClobetasol\r\nEritromicina\r\nAzatioprina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `penfigosintomas`
--

CREATE TABLE IF NOT EXISTS `penfigosintomas` (
  `id` int(11) NOT NULL,
  `pielsintoma_id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `importancia` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `penfigosintomas`
--

INSERT INTO `penfigosintomas` (`id`, `pielsintoma_id`, `penfigo_id`, `importancia`, `created`, `modified`) VALUES
(11, 3, 5, 1, '2015-09-20 01:50:59', '2015-09-20 01:50:59'),
(12, 1, 5, NULL, '2015-09-20 02:00:02', '2015-09-20 02:00:02'),
(13, 1, 1, 1, '2015-09-20 02:04:22', '2015-09-22 04:48:18'),
(14, 2, 1, 1, '2015-09-20 02:04:28', '2015-09-20 02:04:51'),
(15, 3, 1, NULL, '2015-09-20 02:04:57', '2015-09-20 02:04:57'),
(16, 4, 1, 1, '2015-09-20 02:05:03', '2015-09-20 02:05:03'),
(18, 1, 2, NULL, '2015-09-20 22:26:54', '2015-09-20 22:26:54'),
(19, 2, 2, NULL, '2015-09-20 22:26:59', '2015-09-20 22:26:59'),
(20, 3, 2, NULL, '2015-09-20 22:27:03', '2015-09-20 22:27:03'),
(21, 4, 2, 1, '2015-09-20 22:27:07', '2015-09-20 22:27:14'),
(22, 3, 3, 1, '2015-09-20 22:44:32', '2015-09-23 21:28:06'),
(24, 1, 4, 1, '2015-09-23 21:53:07', '2015-09-23 21:53:07'),
(25, 5, 4, 1, '2015-09-23 21:56:17', '2015-09-23 21:56:17'),
(26, 6, 4, 1, '2015-09-23 22:00:00', '2015-09-23 22:00:00'),
(27, 1, 3, NULL, '2015-10-01 21:25:37', '2015-10-01 21:25:37'),
(28, 4, 3, 1, '2015-10-01 21:25:50', '2015-10-01 21:26:06'),
(29, 2, 3, NULL, '2015-10-01 21:26:00', '2015-10-01 21:26:00'),
(30, 2, 5, NULL, '2015-10-01 21:30:10', '2015-10-01 21:30:10'),
(31, 4, 4, 1, '2015-10-01 21:44:17', '2015-10-01 21:44:17'),
(32, 5, 5, 1, '2015-10-01 21:44:40', '2015-10-01 21:44:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pielsintomas`
--

CREATE TABLE IF NOT EXISTS `pielsintomas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pielsintomas`
--

INSERT INTO `pielsintomas` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Dolor', 'El dolor es una sensacion desencadenada por el sistema nervioso. el dolor es producido por las lesiones de las ampollas.', '55c4de8b-4fdc-4fc0-8e1b-1fcfc0a8006a.jpg'),
(2, 'Ardor', 'SensaciÃ³n de calor vivo en una parte del cuerpo.', '55c4de99-d6d4-4cf6-8c2c-111dc0a8006a.jpg'),
(3, 'Escosor', 'Prurito, es un hormigueo o irritaciÃ³n de la piel que provoca el deseo de rascarse en la zona afectada. El prurito o picazÃ³n puede ocurrir en todo el cuerpo o solamente en un lugar.', '55c4deaf-cb6c-4221-8b49-230ec0a8006a.jpg'),
(4, 'Signo de Nikolsky', 'El mÃ©dico o el personal de enfermerÃ­a usa el dedo para evaluar el signo de Nikolski. El dedo se coloca sobre la piel y se va girando suavemente de un lado para otro.\r\n\r\nSi el resultado del examen es positivo, por lo general se formarÃ¡ una ampolla en el Ã¡rea en cuestiÃ³n de minutos.\r\n\r\nUn resultado positivo generalmente es un signo de una afecciÃ³n de formaciÃ³n de ampollas en la piel. Las personas con un signo positivo tienen piel floja que se desprende de las capas subyacentes al frotarla. El Ã¡rea por debajo es de color rosa y hÃºmeda y por lo regular es muy sensible.', '55c4decb-7ff8-4359-8302-2304c0a8006a.jpg'),
(5, 'Necrosis', 'Es la muerte de tejido corporal y ocurre cuando no estÃ¡ llegando suficiente sangre al tejido, ya sea por lesiÃ³n, radiaciÃ³n o sustancias quÃ­micas. La necrosis es irreversible.', '560c64ea-4e94-406a-bebd-0b7426f82a3d.jpg'),
(6, 'estomatitis progresiva', 'La estomatitis es la inflamacion de la mucosa oral en general y puede afectar toda la cavidad  oral o solo determinadas regiones', '560c66ef-659c-44f6-b3bc-0b7426f82a3d.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `examene_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `penfigo_id`, `examene_id`, `descripcion`, `created`, `modified`) VALUES
(1, 1, 1, 'Histologia Acantosis suprabasal', NULL, NULL),
(2, 2, 1, 'Acantolisis subcorneal\r\ne intracorneal', NULL, NULL),
(3, 3, 1, 'Pustulaa Neutrofilica subcorneal ', '2015-09-30 23:47:29', '2015-09-30 23:47:29'),
(4, 4, 1, 'Acantosis suprabasal queratonocitos necroticos', '2015-09-30 23:48:13', '2015-09-30 23:48:13'),
(5, 5, 1, 'Ampolla subepidermica eusonofilos infiltrados', '2015-09-30 23:55:02', '2015-09-30 23:55:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signos`
--

CREATE TABLE IF NOT EXISTS `signos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `signos`
--

INSERT INTO `signos` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Presion arterial', 'La presion arterial es la fuerza q ejerce la sangre contra las paredes de las arterias, cada vez que el corazon bombea sangre hacia las arterias.', NULL, '2015-10-01 00:13:16'),
(2, 'Pulso', 'Es la pulsacion provocada por la expancion de sus arterias como consecuencia de la circulacion de sangre bombeada por el corazon.', NULL, '2015-10-01 00:15:38'),
(3, 'Temperatura', 'La temperatura es una medida del calor o energia termica de las personas.', NULL, '2015-10-01 00:18:26'),
(4, 'Peso', 'Peso es el volumen del cuerpo expresado en kilos.', NULL, '2015-10-01 00:27:12'),
(5, 'Talla', 'Talla es la longitud de la planta de los pies a la parte superior del craneo expresado en centimetros.', NULL, '2015-10-01 00:28:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE IF NOT EXISTS `sintomas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Fiebre', 'La fiebre es el aumento temporal en la temperatura del cuerpo en respuesta a la enfermedad.', NULL, '2015-08-21 10:41:13'),
(2, 'Malestar General', 'Es una sensacion generalizada de molestia, enfermedad o falta de bienestar. Se tiene la sensaciÃ³n de no tener energÃ­a suficiente.', NULL, '2015-08-21 10:41:55'),
(3, 'Debilidad', 'ReducciÃ³n de la fuerza en uno o mas mÃºsculos.', NULL, '2015-08-21 10:42:15'),
(4, 'Falta de apetito', 'Inapetencia es una situacion que se da cuando se reduce el deseo de comer. ', NULL, '2015-08-21 10:42:38'),
(5, 'Dolor Cabeza', 'Cefalea dolor pulsante que se siente es debido a la presion arterial dentro de la cabeza, ya que no se recibe suficiente sangre y con ello nutrientes, tambien puede ser por inflamacion de nervios sensitivos', NULL, '2015-08-21 10:42:55'),
(7, 'Ampollas', 'Estas ulceras cutaneas se pueden describir como lesiones que: Drenan, supuran, forman costra, se pelan y desprenden facilmente.', NULL, '2015-08-21 10:44:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoampollas`
--

CREATE TABLE IF NOT EXISTS `tipoampollas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoampollas`
--

INSERT INTO `tipoampollas` (`id`, `nombre`, `descripcion`, `imagen`, `tipo`) VALUES
(1, 'Tensas', 'Ampollas que se encuentran estiradas.', '55d739e5-c1d0-4df6-824b-10a1c0a8006a.jpg', 'Mucosas'),
(2, 'Serosas', 'Ampolla que contiene un fluido cuya apariencia es similar a la del suero sanguineo.', '55d73a1b-2448-4d62-91e1-10a8c0a8006a.jpg', 'Mucosas'),
(3, 'Hemorragicas', 'Ampolla que contiene sangre en su interior, que es generado a partir de la rutura de los vasos sanguÃ­neos.', '55d73a51-588c-450f-a3a3-0ea8c0a8006a.jpg', 'Mucosas'),
(4, 'Purulentas', 'Ampolla que contiene un liquido espeso, de color blanco amarillento o verdoso que se forma en los tejidos infectados o inflamados y fluye de algunas heridas y llagas.', '55d73a83-a18c-4a98-bf47-0ec4c0a8006a.jpg', 'Mucosas'),
(5, 'Flacidas', 'Ampolla que es o esta blando, sin consistencia ni tersura.', '55d73adf-1c4c-4185-8c24-0ec4c0a8006a.jpg', 'Mucosas'),
(6, 'TamaÃ±o variable', 'Ampollas que no tienen un tamaÃ±o definido, todas presentas caracterÃ­sticas de tamaÃ±o Ãºnicas.', '55d73b19-5f04-4b80-b4f3-0ea8c0a8006a.jpg', 'Mucosas'),
(7, 'Erosiones', 'Es una descomposicion o degradacion de las capas de la mucosa', '55d73bcf-6168-45c1-80d0-0ea7c0a8006a.jpg', 'Mucosas'),
(8, 'Tensas', 'Ampollas que se encuentran estiradas.', '55d73c01-e15c-4818-9135-0ea8c0a8006a.jpg', 'Piel'),
(9, 'Serosas', 'Ampolla que contiene un fluido cuya apariencia es similar a la del suero sanguineo.', '55d73c51-a7c4-455c-9deb-1109c0a8006a.jpg', 'Piel'),
(10, 'Hemorragicas', 'Ampolla que contiene sangre en su interior, que es generado a partir de la rutura de los vasos sanguÃ­neos.', '55d73c72-18a4-4a40-87ee-0ec4c0a8006a.jpg', 'Piel'),
(11, 'Purulentas', 'Ampolla que contiene un liquido espeso, de color blanco amarillento o verdoso que se forma en los tejidos infectados o inflamados y fluye de algunas heridas y llagas.', '55d73c93-de40-47b8-98eb-10b5c0a8006a.jpg', 'Piel'),
(12, 'Flacidas', 'Ampolla que es o esta blando, sin consistencia ni tersura.', '55d73cba-2298-4db5-b2ed-1157c0a8006a.jpg', 'Piel'),
(13, 'TamaÃ±o variable', 'Ampollas que no tienen un tamaÃ±o definido, todas presentas caracterÃ­sticas de tamaÃ±o Ãºnicas.', '55d73cd4-4874-41d6-8dc0-114bc0a8006a.jpg', 'Piel'),
(14, 'Erosiones', 'Es una descomposicion o degradacion de las capas de la mucosa', '55d73d69-1530-415b-b79e-1100c0a8006a.jpg', 'Piel'),
(19, 'lesion anular con eriteme y edema', 'Una lesiÃ³n anular puede ser el resultado de un proceso patolÃ³gico en el que la lesiÃ³n se extiende perifericamente sin afectar al centro.Enrojecimiento de la piel debido al aumento de la sangre contenida en los capilares.', '560c6aa5-e3a8-4529-a02c-0b7426f82a3d.jpg', 'Piel'),
(20, 'Ampollas delimitadas por papulas', 'Una Ampolla delimitada por una pÃ¡pula es una lesiÃ³n cutÃ¡nea que no secreta ninguna sustancia lÃ­quida. Es un relieve de tamaÃ±o variable.', '560c6a46-c454-46de-88f8-0b7426f82a3d.jpg', 'Piel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoerociones`
--

CREATE TABLE IF NOT EXISTS `tipoerociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoerociones`
--

INSERT INTO `tipoerociones` (`id`, `nombre`, `descripcion`, `imagen`, `tipo`) VALUES
(1, 'Erosion con restos epidermicos', 'LesiÃ³n ulcerosa con membrana blanquecina.', '55c4dfb1-a8e8-4215-99e2-065dc0a8006a.jpg', 'Mucosas'),
(2, 'ErosiÃ³n con borde irregular', 'LesiÃ³n ulcerosa con contorno indefinido.', '55c4e074-1cbc-4e5b-9f53-2310c0a8006a.jpg', 'Mucosas'),
(3, 'ErosiÃ³n con costras de  collarete descamativo', 'LesiÃ³n ulcerosa con costras.', '55c4e0ed-9548-44a9-bb8f-1fcfc0a8006a.jpg', 'Mucosas'),
(4, 'Erosion con restos epidermicos', 'LesiÃ³n ulcerosa con membrana blanquecina.', '55d748bf-e9f8-4168-a6ce-1365c0a8006a.jpg', 'Piel'),
(5, 'ErosiÃ³n con borde irregular', 'LesiÃ³n ulcerosa con contorno indefinido.', '55d749c8-3dfc-4f40-9f4d-1419c0a8006a.jpg', 'Piel'),
(6, 'ErosiÃ³n con costras de  collarete descamativo', 'LesiÃ³n ulcerosa con costras.', '55d749fc-0c70-4ef5-959f-124fc0a8006a.jpg', 'Piel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE IF NOT EXISTS `tratamientos` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `paciente_id`, `numero`, `descripcion`, `created`, `modified`) VALUES
(1, 1, 1, 'Corticosteroides prednisona ometilprednisona: 1 a 2.5 mg/k peso/dÃ­a Asatioprina Ciclofosfamida metotrexato micofenolato sales de oro hhhhh', '2015-08-21 10:53:06', '2015-08-21 10:53:19'),
(2, 3, 2, ' fejwig eg bre gbjregn ierhgt rhty jigdrh', '2015-08-21 12:02:58', '2015-08-21 12:02:58'),
(3, 6, 8, 'Dieta blanda hiposodica moderada.\r\nReposo \r\nBaÃ±o diario con shampo IONIL-T\r\nCuaraciones diarias con permanganato de potasio y aplicaciones de crema magistral.\r\nPrednisona\r\ny algo mas', '2015-10-01 20:06:28', '2015-10-01 20:06:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, '6847560', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-13 00:47:57', '2015-08-17 00:05:07'),
(3, '555888', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-17 23:31:18', '2015-07-17 23:31:18'),
(7, 'admin', 'f964ad03a2564b2dd19b2bed04c3307c5503b8f9', 'Administrador', '2015-07-29 07:38:51', '2015-08-17 00:57:41'),
(8, '996633', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-08-17 00:52:57', '2015-08-17 01:03:26'),
(9, '995511', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-08-21 11:19:42', '2015-09-22 17:51:03'),
(10, '123456', '1ad08861c5356b9586791849f6d53b3d7fc32578', 'Medico General', '2015-08-28 20:23:58', '2015-08-28 20:24:40'),
(15, '4308982', '562c02740de4ed4b536f18e7d4d65081d0db9211', 'Dermatologo', '2015-09-20 01:22:33', '2015-09-23 23:11:26'),
(16, '4569871', 'f0ef6e66ab22860c1d4b2aafb9cdebbddc0b8a29', 'Dermatologo', '2015-10-06 20:10:32', '2015-10-06 20:10:32'),
(17, '4569871', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-10-06 20:22:18', '2015-10-06 22:11:08'),
(18, '9186507', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 20:47:55', '2015-10-06 21:05:02'),
(19, '9186507', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:07:04', '2015-10-06 21:08:49'),
(20, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:14:16', '2015-10-06 21:26:44'),
(21, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:14:20', '2015-10-06 21:14:20'),
(22, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:14:29', '2015-10-06 21:14:29'),
(23, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:14:35', '2015-10-06 21:14:35'),
(24, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:14:37', '2015-10-06 21:14:37'),
(25, '4656', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 21:15:32', '2015-10-06 21:15:50'),
(26, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-10-06 22:33:16', '2015-10-06 22:33:16'),
(27, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-10-06 22:33:21', '2015-10-06 22:33:21'),
(28, '123456', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-10-06 22:35:16', '2015-10-06 22:35:16'),
(29, '963852', '9f4c59cb17f2c386b7806c3c5d7204c092bcd9a4', 'Medico General', '2015-10-06 22:44:11', '2015-10-06 22:44:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areaampollas`
--
ALTER TABLE `areaampollas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_laboratorios`
--
ALTER TABLE `pacientes_laboratorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_pielsintomas`
--
ALTER TABLE `pacientes_pielsintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_resultados`
--
ALTER TABLE `pacientes_resultados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_signos`
--
ALTER TABLE `pacientes_signos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_tipoampollas`
--
ALTER TABLE `pacientes_tipoampollas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_tipoerociones`
--
ALTER TABLE `pacientes_tipoerociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `penfigoampollas`
--
ALTER TABLE `penfigoampollas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `penfigoerociones`
--
ALTER TABLE `penfigoerociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `penfigos`
--
ALTER TABLE `penfigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `penfigosintomas`
--
ALTER TABLE `penfigosintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pielsintomas`
--
ALTER TABLE `pielsintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `signos`
--
ALTER TABLE `signos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoampollas`
--
ALTER TABLE `tipoampollas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoerociones`
--
ALTER TABLE `tipoerociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areaampollas`
--
ALTER TABLE `areaampollas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `pacientes_laboratorios`
--
ALTER TABLE `pacientes_laboratorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `pacientes_pielsintomas`
--
ALTER TABLE `pacientes_pielsintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `pacientes_resultados`
--
ALTER TABLE `pacientes_resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `pacientes_signos`
--
ALTER TABLE `pacientes_signos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT de la tabla `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `pacientes_tipoampollas`
--
ALTER TABLE `pacientes_tipoampollas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=314;
--
-- AUTO_INCREMENT de la tabla `pacientes_tipoerociones`
--
ALTER TABLE `pacientes_tipoerociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `penfigoampollas`
--
ALTER TABLE `penfigoampollas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT de la tabla `penfigoerociones`
--
ALTER TABLE `penfigoerociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `penfigos`
--
ALTER TABLE `penfigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `penfigosintomas`
--
ALTER TABLE `penfigosintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `pielsintomas`
--
ALTER TABLE `pielsintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `signos`
--
ALTER TABLE `signos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipoampollas`
--
ALTER TABLE `tipoampollas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tipoerociones`
--
ALTER TABLE `tipoerociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
