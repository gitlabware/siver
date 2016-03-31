-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2016 at 02:15 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.17-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chips`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `activados`
--

CREATE TABLE IF NOT EXISTS `activados` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `dealer_code` int(12) NOT NULL,
  `dealer` varchar(120) NOT NULL,
  `dealer_nom_act` varchar(110) NOT NULL,
  `subdealer_code` int(12) NOT NULL,
  `subdealer` varchar(120) NOT NULL,
  `subdealer_nom_act` varchar(120) NOT NULL,
  `canal_m` varchar(300) NOT NULL,
  `canal_n` varchar(300) NOT NULL,
  `created` date NOT NULL,
  `ciudad_nro_tel` varchar(100) NOT NULL,
  `fecha_act` date NOT NULL,
  `fecha_doc` date NOT NULL,
  `plan_code` varchar(50) NOT NULL,
  `excel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `almacenes`
--

CREATE TABLE IF NOT EXISTS `almacenes` (
`id` int(7) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `sucursal_id` int(7) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `central` tinyint(1) DEFAULT '0',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
`id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
`id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sucursal_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `cabinas`
--

CREATE TABLE IF NOT EXISTS `cabinas` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `cajachicas`
--

CREATE TABLE IF NOT EXISTS `cajachicas` (
`id` int(11) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `cajadetalle_id` int(11) DEFAULT NULL,
  `nota` varchar(60) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `observacion` text,
  `pago_id` int(11) DEFAULT NULL,
  `movimiento_id` int(11) DEFAULT NULL,
  `banco_id` int(11) NOT NULL,
  `distribuidorpago_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `cajadetalles`
--

CREATE TABLE IF NOT EXISTS `cajadetalles` (
`id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `celcambios`
--

CREATE TABLE IF NOT EXISTS `celcambios` (
`id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `imei_anterior` varchar(100) DEFAULT NULL,
  `imei_nuevo` varchar(100) DEFAULT NULL,
  `num_serie_anterior` varchar(120) DEFAULT NULL,
  `num_serie_nuevo` varchar(120) DEFAULT NULL,
  `ventascelulare_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `chips`
--

CREATE TABLE IF NOT EXISTS `chips` (
`id` int(11) NOT NULL,
  `excel_id` int(11) NOT NULL,
  `pagado` int(1) DEFAULT NULL,
  `precio_d` decimal(10,2) DEFAULT NULL,
  `factura` varchar(20) NOT NULL,
  `cantidad` int(12) NOT NULL,
  `tipo_sim` varchar(30) DEFAULT NULL,
  `sim` varchar(50) NOT NULL,
  `imsi` varchar(50) DEFAULT NULL,
  `telefono` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `distribuidor_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha_entrega_d` date DEFAULT NULL,
  `caja` varchar(10) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33799 ;

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `tipo` varchar(50) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `num_registro` varchar(50) DEFAULT NULL,
  `cod_dealer` varchar(30) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `celular` int(8) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `inspector` varchar(20) DEFAULT NULL,
  `cod_mercado` varchar(12) DEFAULT NULL,
  `mercado` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `lat` varchar(150) DEFAULT NULL,
  `lng` varchar(150) DEFAULT NULL,
  `ref` varchar(20) DEFAULT '0',
  `abonado` varchar(20) NOT NULL DEFAULT '0',
  `dist` varchar(20) DEFAULT 's/d',
  `lugare_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1529 ;

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
`id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `banco` decimal(11,2) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `nombrebanco` varchar(250) DEFAULT NULL,
  `cuenta` varchar(250) DEFAULT NULL,
  `comprobante` varchar(50) DEFAULT NULL,
  `efectivo` decimal(11,2) DEFAULT NULL,
  `recibo` varchar(50) DEFAULT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `faltante` decimal(10,2) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `detalles`
--

CREATE TABLE IF NOT EXISTS `detalles` (
`id` int(7) NOT NULL,
  `almacene_id` int(7) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantient` int(11) NOT NULL DEFAULT '0',
  `rangoi` int(15) DEFAULT NULL,
  `rangof` int(15) NOT NULL,
  `lote` int(11) DEFAULT NULL,
  `movimiento_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

-- --------------------------------------------------------

--
-- Table structure for table `devueltos`
--

CREATE TABLE IF NOT EXISTS `devueltos` (
`id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(12) NOT NULL,
  `total` int(12) DEFAULT '0',
  `encargado_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `distribuciones`
--

CREATE TABLE IF NOT EXISTS `distribuciones` (
`id` int(11) NOT NULL,
  `almacene_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT '0',
  `excel_id` int(11) NOT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `nombre_tienda` varchar(255) DEFAULT NULL,
  `tipo_producto` varchar(50) DEFAULT NULL,
  `marca` varchar(150) DEFAULT NULL,
  `color` varchar(150) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `distribuidorpagos`
--

CREATE TABLE IF NOT EXISTS `distribuidorpagos` (
`id` int(11) NOT NULL,
  `distribuidor_id` int(11) NOT NULL,
  `faltante` decimal(10,2) NOT NULL DEFAULT '0.00',
  `otro_ingreso` decimal(10,2) NOT NULL DEFAULT '0.00',
  `observaciones` text,
  `fecha` date NOT NULL,
  `minievento_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `escalas`
--

CREATE TABLE IF NOT EXISTS `escalas` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `excels`
--

CREATE TABLE IF NOT EXISTS `excels` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nombre_original` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
`id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `minieventos`
--

CREATE TABLE IF NOT EXISTS `minieventos` (
`id` int(11) NOT NULL,
  `impulsador_id` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
`id` int(11) NOT NULL,
  `producto_id` int(7) DEFAULT NULL,
  `user_id` int(7) DEFAULT NULL,
  `almacene_id` int(7) DEFAULT NULL,
  `persona_id` int(7) DEFAULT NULL,
  `ingreso` int(11) DEFAULT '0',
  `salida` int(11) DEFAULT '0',
  `ventasdistribuidore_id` int(11) NOT NULL,
  `precio_uni` decimal(10,2) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `escala` varchar(30) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `devuelto_id` int(11) DEFAULT NULL,
  `minievento_id` int(11) DEFAULT NULL,
  `ventasimpulsadore_id` int(11) DEFAULT NULL,
  `observacion` varchar(350) DEFAULT NULL,
  `transaccion` int(12) DEFAULT NULL,
  `capacitacion` int(2) DEFAULT NULL,
  `est_punt` int(2) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `movimientoscabinas`
--

CREATE TABLE IF NOT EXISTS `movimientoscabinas` (
  `id` int(11) NOT NULL,
  `cabina_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `montocarga` decimal(10,2) DEFAULT NULL,
  `producto_id` int(10) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movimientospremios`
--

CREATE TABLE IF NOT EXISTS `movimientospremios` (
`id` int(11) NOT NULL,
  `premio_id` int(11) NOT NULL,
  `ingreso` int(10) NOT NULL DEFAULT '0',
  `salida` int(10) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `movimientosrecargas`
--

CREATE TABLE IF NOT EXISTS `movimientosrecargas` (
`id` int(11) NOT NULL,
  `ingreso` int(11) DEFAULT NULL,
  `solicita` decimal(10,2) DEFAULT NULL,
  `salida` decimal(10,2) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `saldo_total` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recarga_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`id` int(11) NOT NULL,
  `ventascelulare_id` int(11) NOT NULL,
  `monto` decimal(15,2) NOT NULL DEFAULT '0.00',
  `monto_dolar` decimal(10,2) DEFAULT '0.00',
  `tipo` varchar(50) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `moneda` varchar(15) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `monto` decimal(15,2) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `distribuidor_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
`id` int(7) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `ap_paterno` varchar(200) DEFAULT NULL,
  `ap_materno` varchar(200) DEFAULT NULL,
  `ci` varchar(15) DEFAULT NULL,
  `ext_ci` varchar(30) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `sucursal_id` int(7) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

-- --------------------------------------------------------

--
-- Table structure for table `porcentajes`
--

CREATE TABLE IF NOT EXISTS `porcentajes` (
`id` int(11) NOT NULL,
  `nombre` decimal(4,2) DEFAULT '0.00',
  `descripcion` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
`id` int(11) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  `monto` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `premios`
--

CREATE TABLE IF NOT EXISTS `premios` (
`id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `total` int(12) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(7) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio_compra` float(10,2) NOT NULL DEFAULT '0.00',
  `proveedor` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `tipo_producto` varchar(30) NOT NULL,
  `tiposproducto_id` int(11) NOT NULL,
  `observaciones` text,
  `estado` int(1) NOT NULL DEFAULT '1',
  `url_imagen` varchar(100) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `colore_id` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `productosprecios`
--

CREATE TABLE IF NOT EXISTS `productosprecios` (
`id` int(11) NOT NULL,
  `producto_id` int(7) NOT NULL,
  `min` int(11) DEFAULT '0',
  `max` int(11) DEFAULT '0',
  `escala_id` int(11) DEFAULT NULL,
  `escala` varchar(20) NOT NULL,
  `tipousuario_id` int(11) DEFAULT NULL,
  `precio` float(10,2) NOT NULL DEFAULT '0.00',
  `fecha` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `recargados`
--

CREATE TABLE IF NOT EXISTS `recargados` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `encargado_id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `porcentaje_id` int(11) DEFAULT NULL,
  `entrada` float(15,2) DEFAULT '0.00',
  `salida` float(15,2) DEFAULT '0.00',
  `total` float(15,2) DEFAULT '0.00',
  `total_distribuidor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `num_celular` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `recargas`
--

CREATE TABLE IF NOT EXISTS `recargas` (
`id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `xcobrar` int(1) DEFAULT '0',
  `total` decimal(10,2) DEFAULT NULL,
  `estado` int(1) DEFAULT '0' COMMENT '0 = por cargar, 1= realizado',
  `created` datetime DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `recargascabinas`
--

CREATE TABLE IF NOT EXISTS `recargascabinas` (
`id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `monto_recarga` decimal(10,2) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `rutas`
--

CREATE TABLE IF NOT EXISTS `rutas` (
`id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `cod_ruta` varchar(80) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `rutasusuarios`
--

CREATE TABLE IF NOT EXISTS `rutasusuarios` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Table structure for table `sucursals`
--

CREATE TABLE IF NOT EXISTS `sucursals` (
`id` int(7) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `ncabinas` int(11) DEFAULT NULL,
  `tipo_cambio` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `tiposproductos`
--

CREATE TABLE IF NOT EXISTS `tiposproductos` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipousuarios`
--

CREATE TABLE IF NOT EXISTS `tipousuarios` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `totales`
--

CREATE TABLE IF NOT EXISTS `totales` (
`id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `almacene_id` int(11) DEFAULT NULL,
  `total` int(12) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modififed` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `lugare_id` int(11) DEFAULT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

-- --------------------------------------------------------

--
-- Table structure for table `ventascelulares`
--

CREATE TABLE IF NOT EXISTS `ventascelulares` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `entrada` int(11) NOT NULL DEFAULT '0',
  `salida` int(11) NOT NULL DEFAULT '0',
  `imei` varchar(50) NOT NULL,
  `num_serie` varchar(50) NOT NULL,
  `tipo_cambio` decimal(15,2) NOT NULL DEFAULT '0.00',
  `precio` int(11) NOT NULL,
  `cliente` varchar(500) DEFAULT NULL,
  `observaciones` varchar(60) DEFAULT NULL,
  `almacene_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `transaccion` int(12) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `ventaschips`
--

CREATE TABLE IF NOT EXISTS `ventaschips` (
`id` int(11) NOT NULL,
  `distribuidor_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fecha` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `ventasclientes`
--

CREATE TABLE IF NOT EXISTS `ventasclientes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `ventasdistribuidore_id` int(11) NOT NULL,
  `estado_pdv` int(1) NOT NULL,
  `cap` int(1) NOT NULL,
  `recarga` int(10) DEFAULT NULL,
  `n_recarga` varchar(10) DEFAULT NULL,
  `linea_abonable` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ventasdistribuidores`
--

CREATE TABLE IF NOT EXISTS `ventasdistribuidores` (
  `id` int(11) NOT NULL,
  `producto_id` int(7) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `persona_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT '0',
  `escala` varchar(20) NOT NULL,
  `precio` float(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(11,2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ventasimpulsadores`
--

CREATE TABLE IF NOT EXISTS `ventasimpulsadores` (
`id` int(11) NOT NULL,
  `minievento_id` int(11) NOT NULL,
  `numero` int(10) NOT NULL,
  `nombre_cliente` varchar(150) DEFAULT NULL,
  `monto` decimal(15,2) NOT NULL DEFAULT '0.00',
  `producto_id` int(11) DEFAULT NULL,
  `precio_chip` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio_producto` decimal(10,2) NOT NULL,
  `tel_referencia` varchar(50) DEFAULT NULL,
  `chip_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `ventasproductos`
--

CREATE TABLE IF NOT EXISTS `ventasproductos` (
  `id` int(11) NOT NULL,
  `ventasdistribuidore_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activados`
--
ALTER TABLE `activados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `almacenes`
--
ALTER TABLE `almacenes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`);

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabinas`
--
ALTER TABLE `cabinas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cajachicas`
--
ALTER TABLE `cajachicas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cajadetalles`
--
ALTER TABLE `cajadetalles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `celcambios`
--
ALTER TABLE `celcambios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chips`
--
ALTER TABLE `chips`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depositos`
--
ALTER TABLE `depositos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalles`
--
ALTER TABLE `detalles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devueltos`
--
ALTER TABLE `devueltos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribuciones`
--
ALTER TABLE `distribuciones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribuidorpagos`
--
ALTER TABLE `distribuidorpagos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escalas`
--
ALTER TABLE `escalas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excels`
--
ALTER TABLE `excels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lugares`
--
ALTER TABLE `lugares`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minieventos`
--
ALTER TABLE `minieventos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimientos`
--
ALTER TABLE `movimientos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimientoscabinas`
--
ALTER TABLE `movimientoscabinas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimientospremios`
--
ALTER TABLE `movimientospremios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimientosrecargas`
--
ALTER TABLE `movimientosrecargas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porcentajes`
--
ALTER TABLE `porcentajes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `precios`
--
ALTER TABLE `precios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premios`
--
ALTER TABLE `premios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productosprecios`
--
ALTER TABLE `productosprecios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recargados`
--
ALTER TABLE `recargados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recargas`
--
ALTER TABLE `recargas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recargascabinas`
--
ALTER TABLE `recargascabinas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutas`
--
ALTER TABLE `rutas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutasusuarios`
--
ALTER TABLE `rutasusuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sucursals`
--
ALTER TABLE `sucursals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiposproductos`
--
ALTER TABLE `tiposproductos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipousuarios`
--
ALTER TABLE `tipousuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totales`
--
ALTER TABLE `totales`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ventascelulares`
--
ALTER TABLE `ventascelulares`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventaschips`
--
ALTER TABLE `ventaschips`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventasdistribuidores`
--
ALTER TABLE `ventasdistribuidores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventasimpulsadores`
--
ALTER TABLE `ventasimpulsadores`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `almacenes`
--
ALTER TABLE `almacenes`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cabinas`
--
ALTER TABLE `cabinas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cajachicas`
--
ALTER TABLE `cajachicas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cajadetalles`
--
ALTER TABLE `cajadetalles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `celcambios`
--
ALTER TABLE `celcambios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chips`
--
ALTER TABLE `chips`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33799;
--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1529;
--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `depositos`
--
ALTER TABLE `depositos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detalles`
--
ALTER TABLE `detalles`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `devueltos`
--
ALTER TABLE `devueltos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `distribuciones`
--
ALTER TABLE `distribuciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `distribuidorpagos`
--
ALTER TABLE `distribuidorpagos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `escalas`
--
ALTER TABLE `escalas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `excels`
--
ALTER TABLE `excels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lugares`
--
ALTER TABLE `lugares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `minieventos`
--
ALTER TABLE `minieventos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `movimientos`
--
ALTER TABLE `movimientos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `movimientospremios`
--
ALTER TABLE `movimientospremios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `movimientosrecargas`
--
ALTER TABLE `movimientosrecargas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `porcentajes`
--
ALTER TABLE `porcentajes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `precios`
--
ALTER TABLE `precios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `premios`
--
ALTER TABLE `premios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `productosprecios`
--
ALTER TABLE `productosprecios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `recargados`
--
ALTER TABLE `recargados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recargas`
--
ALTER TABLE `recargas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `recargascabinas`
--
ALTER TABLE `recargascabinas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rutas`
--
ALTER TABLE `rutas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rutasusuarios`
--
ALTER TABLE `rutasusuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `sucursals`
--
ALTER TABLE `sucursals`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tiposproductos`
--
ALTER TABLE `tiposproductos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tipousuarios`
--
ALTER TABLE `tipousuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `totales`
--
ALTER TABLE `totales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `ventascelulares`
--
ALTER TABLE `ventascelulares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ventaschips`
--
ALTER TABLE `ventaschips`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ventasimpulsadores`
--
ALTER TABLE `ventasimpulsadores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
