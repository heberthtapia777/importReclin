-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2018 a las 01:28:21
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
  `id_almacen` int(20) NOT NULL,
  `id_repuesto` int(20) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `id_repuesto`, `cantidad`, `dateReg`, `status`) VALUES
(140, 108, 100, '2018-04-19 16:23:31', 'Activo'),
(141, 109, 500, '2018-04-19 16:25:54', 'Activo'),
(142, 110, 88, '2018-05-11 01:50:58', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacensuc`
--

CREATE TABLE IF NOT EXISTS `almacensuc` (
  `id_almacenSuc` int(20) NOT NULL,
  `id_almacen` int(20) NOT NULL,
  `id_sucursal` int(20) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=517 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacensuc`
--

INSERT INTO `almacensuc` (`id_almacenSuc`, `id_almacen`, `id_sucursal`, `cantidad`, `dateReg`, `status`) VALUES
(502, 140, 1, '20', '2018-04-19 16:23:31', 'Activo'),
(503, 140, 2, '20', '2018-04-19 16:23:31', 'Activo'),
(504, 140, 3, '30', '2018-04-19 16:23:31', 'Activo'),
(505, 140, 4, '0', '2018-04-19 16:23:31', 'Activo'),
(506, 140, 5, '20', '2018-04-19 16:23:31', 'Activo'),
(507, 141, 1, '50', '2018-04-19 16:25:54', 'Activo'),
(508, 141, 2, '20', '2018-04-19 16:25:54', 'Activo'),
(509, 141, 3, '0', '2018-04-19 16:25:54', 'Activo'),
(510, 141, 4, '360', '2018-04-19 16:25:54', 'Activo'),
(511, 141, 5, '70', '2018-04-19 16:25:54', 'Activo'),
(512, 142, 1, '28', '2018-05-11 01:50:58', 'Activo'),
(513, 142, 2, '60', '2018-05-11 01:50:58', 'Activo'),
(514, 142, 3, '0', '2018-05-11 01:50:58', 'Activo'),
(515, 142, 4, '0', '2018-05-11 01:50:58', 'Activo'),
(516, 142, 5, '0', '2018-05-11 01:50:58', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auximg`
--

CREATE TABLE IF NOT EXISTS `auximg` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` float(15,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auximgemp`
--

CREATE TABLE IF NOT EXISTS `auximgemp` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` float(15,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `size` float(15,2) NOT NULL,
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `name`, `description`, `foto`, `size`, `dateReg`, `status`) VALUES
(1, 'Motor Basico', 'Motor para tractor', '4806[1].jpg', 54778.00, '2017-08-10 18:50:24', 'Activo'),
(2, 'Sistema Hidraulico', 'todo lo referente al sistema hidraulico', 'Portadas_de_Bleach_para_facebook (4).jpg', 59001.00, '2017-08-11 14:33:52', 'Activo'),
(3, 'Bastidor y Caja', 'Bastidor y Caja', '_fondfl8.jpg', 91750.00, '2017-08-11 14:33:52', 'Activo'),
(4, 'Cabina del Operador', 'Cabina del Operador', '19A145A20.jpg', 106993.00, '2017-08-11 14:33:52', 'Activo'),
(5, 'Herramientas', 'Herramientas', '[animepaper.net]wallpaper-standard-anime-afro-samurai-no-2-46643-ed9e-preview-6dd496f7.jpg', 63548.00, '2017-08-11 14:33:52', 'Activo'),
(6, 'Implementos', 'Implementos', 'product-4.jpg', 9809.00, '2017-08-11 14:33:52', 'Activo'),
(7, 'Sistema de Combustible', 'Sistema de Combustible', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(8, 'Sistema de Enfriamiento', 'Sistema de Enfriamiento', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(9, 'Sistema de Entrada de Aire y Escape', 'Sistema de Entrada de Aire y Escape', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(10, 'Sistema de Lubricacion', 'Sistema de Lubricacion', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(11, 'Sistema ElÃ©ctrico y de Arranque', 'Sistema ElÃ©ctrico y de Arranque', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(12, 'Sistema HidrÃ¡ulico', 'Sistema HidrÃ¡ulico', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(13, 'Tren de Fuerza', 'Tren de Fuerza', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(14, 'Tren de Rodaje', 'Tren de Rodaje', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(15, 'Maquinaria y Equipos', 'Maquinaria y Equipos', '', 0.00, '2017-08-11 14:33:52', 'Activo'),
(16, 'motor basico', 'motor basico de doble traccion', '', 0.00, '2018-04-18 09:41:28', 'Activo'),
(17, 'motor basico', 'motor basico de doble traccion', '', 0.00, '2018-04-18 09:41:28', 'Activo'),
(18, 'motor basico', 'motor basico de doble traccion', '', 0.00, '2018-04-18 09:41:28', 'Activo'),
(19, 'motor basico', 'motor basico de doble traccion', '', 0.00, '2018-04-18 09:41:28', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(100) NOT NULL,
  `chatID` int(100) NOT NULL,
  `sendFrom` int(100) NOT NULL,
  `sendTo` int(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `dateSend` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_chat`, `chatID`, `sendFrom`, `sendTo`, `message`, `dateSend`) VALUES
(0, 157780, 123456, 34324, 'hola', '2017-09-25 01:05:30'),
(0, 157780, 34324, 123456, 'que tal', '2017-09-25 01:05:40'),
(0, 157780, 123456, 34324, 'hola', '2017-09-25 01:34:52'),
(0, 157780, 34324, 123456, 'que tal', '2017-09-25 01:35:06'),
(0, 157780, 34324, 123456, 'asdasd', '2017-09-25 01:35:13'),
(0, 580245, 456789, 123456, 'dsad', '2017-09-25 01:35:30'),
(0, 580245, 456789, 123456, 'dsad', '2017-09-25 01:35:30'),
(0, 157780, 123456, 34324, 'funciona', '2017-09-25 01:36:08'),
(0, 157780, 123456, 34324, '1236', '2017-09-25 01:36:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` varchar(100) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `nombreEmp` varchar(100) NOT NULL,
  `ci` int(20) NOT NULL,
  `depa` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apP` varchar(50) NOT NULL,
  `apM` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `obser` varchar(500) NOT NULL,
  `dateReg` datetime NOT NULL,
  `statusCli` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_empleado`, `nombreEmp`, `ci`, `depa`, `nombre`, `apP`, `apM`, `phone`, `celular`, `direccion`, `numero`, `email`, `obser`, `dateReg`, `statusCli`) VALUES
('HT-ss-01', 123456, 'Prueba 2', 4354543, 'pt', 'sdf sdf', 'sdfsdf', 'sdfsdf', '435345', '', 'sdsad sadsad', 3, 'rretret@sdsa.csd', 'sdsad', '2017-11-22 02:07:37', 'Activo'),
('HT-aa-01', 123456, 'prueba', 455646, 'cbb', 'asd', 'asds', 'dasdas', '344324', '', 'asdas sad sad ', 545, 'hdfsdf@sdsad.dasd', 'sada asd sad asd ', '2017-11-22 02:06:23', 'Activo'),
('HT-kg-02', 123456, 'prueba', 12345678, 'sz', 'kjjhg', 'gfhgf', 'ghfhvbv', '1234565', '12346587', 'fghfghfgh', 4535, 'hjgjhg@isdjkfs.sad', '', '2017-12-25 22:18:37', 'Activo'),
('HT-gr-03', 123456, 'carnaval', 12465, 'lp', 'ghjfghjg', 'rtyt', 'fghfghd', '24356456', '12345667', 'fgthrtutyu', 6786, 'dfgsfgh@dfg.es', 'gdghjghf', '2018-01-31 17:42:05', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `id_cliente` int(20) NOT NULL,
  `dateReg` datetime NOT NULL,
  `subTotal` float(15,2) NOT NULL,
  `descuento` int(15) NOT NULL,
  `total` float(15,2) NOT NULL,
  `obser` varchar(500) NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_empleado`, `id_cliente`, `dateReg`, `subTotal`, `descuento`, `total`, `obser`, `status`) VALUES
(1, 123456, 0, '2017-10-30 04:27:37', 6472.00, 0, 0.00, '', 'Activo'),
(2, 123456, 0, '2017-10-30 04:41:02', 4392.00, 0, 0.00, '', 'Activo'),
(3, 123456, 0, '2017-10-30 04:42:26', 2028.00, 0, 0.00, '', 'Activo'),
(4, 123456, 0, '2017-10-30 04:54:38', 936.00, 0, 0.00, '', 'Activo'),
(5, 123456, 0, '2017-10-30 04:55:39', 2808.00, 0, 0.00, '', 'Activo'),
(6, 123456, 122584, '2017-10-30 06:00:04', 1248.00, 0, 0.00, '', 'Activo'),
(7, 123456, 0, '2017-10-30 23:41:46', 936.00, 0, 0.00, '', 'Activo'),
(8, 123456, 0, '2017-10-30 23:43:44', 1404.00, 0, 0.00, '', 'Activo'),
(9, 123456, 0, '2017-10-30 23:52:11', 1794.00, 0, 0.00, '', 'Activo'),
(10, 123456, 0, '2017-10-30 23:53:42', 1794.00, 0, 0.00, '', 'Activo'),
(11, 123456, 0, '2017-10-30 23:55:23', 5148.00, 0, 0.00, '', 'Activo'),
(12, 123456, 0, '2017-10-30 23:57:10', 2340.00, 0, 0.00, '', 'Activo'),
(13, 123456, 0, '2017-10-31 00:00:58', 936.00, 0, 0.00, '', 'Activo'),
(14, 123456, 0, '2017-10-31 13:17:04', 2574.00, 0, 0.00, '', 'Activo'),
(15, 123456, 0, '2017-10-31 13:18:00', 1872.00, 0, 0.00, '', 'Activo'),
(16, 123456, 122584, '2017-10-31 16:33:43', 936.00, 0, 0.00, '', 'Activo'),
(17, 123456, 0, '2017-11-01 00:32:49', 687.96, 0, 0.00, '', 'Activo'),
(18, 123456, 0, '2017-11-01 00:36:43', 156.00, 0, 0.00, '', 'Activo'),
(19, 123456, 0, '2017-11-01 00:40:02', 78.00, 1, 0.00, '', 'Activo'),
(20, 123456, 0, '2017-11-01 00:42:11', 858.00, 2, 0.00, '', 'Activo'),
(21, 123456, 0, '2017-11-01 00:45:08', 1170.00, 5, 0.00, '', 'Activo'),
(22, 123456, 0, '2017-11-01 00:46:56', 468.00, 1, 0.00, '', 'Activo'),
(23, 123456, 0, '2017-11-01 00:47:44', 624.00, 2, 611.52, '', 'Activo'),
(24, 123456, 0, '2017-11-01 00:57:05', 234.00, 1, 231.66, '', 'Activo'),
(25, 123456, 0, '2017-11-01 01:04:58', 468.00, 1, 463.32, '', 'Activo'),
(26, 123456, 0, '2017-11-01 01:05:25', 156.00, 0, 156.00, '', 'Activo'),
(27, 123456, 0, '2017-11-01 01:10:54', 78.00, 0, 78.00, '', 'Activo'),
(28, 123456, 0, '2017-11-01 01:11:13', 156.00, 0, 156.00, '', 'Activo'),
(29, 123456, 0, '2017-11-01 01:11:38', 702.00, 0, 702.00, '', 'Activo'),
(30, 123456, 122584, '2017-11-01 11:13:15', 1910.00, 2, 1871.80, '', 'Activo'),
(31, 123456, 0, '2017-11-03 14:57:29', 477.00, 0, 477.00, '', 'Activo'),
(32, 123456, 0, '2017-11-06 16:19:15', 585.00, 5, 555.75, '', 'Activo'),
(33, 123456, 0, '2017-11-10 14:52:28', 505.00, 2, 494.90, '', 'Activo'),
(34, 123456, 0, '2017-11-12 15:42:01', 156.00, 1, 154.44, '', 'Activo'),
(35, 123456, 0, '2017-11-13 15:03:22', 1795.00, 1, 1777.05, '', 'Activo'),
(36, 123456, 0, '2017-11-14 10:57:19', 1795.00, 0, 1795.00, '', 'Activo'),
(37, 123456, 0, '2017-11-16 12:42:07', 290.00, 1, 287.10, '', 'Activo'),
(38, 123456, 0, '2017-11-19 01:34:01', 1818.00, 2, 1781.64, '', 'Activo'),
(39, 123456, 0, '2017-11-22 02:28:00', 156.00, 0, 156.00, '', 'Activo'),
(40, 123456, 0, '2017-11-22 02:47:53', 600.00, 2, 588.00, '', 'Activo'),
(41, 123456, 0, '2017-11-22 02:57:11', 295.00, 0, 295.00, '', 'Activo'),
(42, 123456, 0, '2017-11-22 03:05:27', 145.00, 0, 145.00, '', 'Activo'),
(43, 123456, 0, '2017-11-22 03:42:17', 295.00, 0, 295.00, '', 'Activo'),
(44, 123456, 0, '2017-11-22 11:59:14', 1910.00, 3, 1852.70, '', 'Activo'),
(45, 123456, 0, '2017-11-23 09:15:55', 65.00, 1, 64.35, '', 'Activo'),
(46, 123456, 0, '2017-11-23 11:21:10', 2320.00, 2, 2273.60, '', 'Activo'),
(47, 123456, 0, '2017-11-23 12:06:35', 130.00, 0, 130.00, '', 'Activo'),
(48, 123456, 0, '2017-11-23 13:46:08', 195.00, 2, 191.10, '', 'Activo'),
(49, 123456, 0, '2017-12-14 00:12:10', 325.00, 0, 325.00, '', 'Activo'),
(50, 123456, 0, '2017-12-27 15:27:06', 10000.00, 5, 9500.00, '', 'Activo'),
(51, 123456, 0, '2017-12-30 12:58:45', 10000.00, 0, 10000.00, '', 'Activo'),
(52, 123456, 0, '2017-12-30 13:04:29', 130.00, 0, 130.00, '', 'Activo'),
(53, 123456, 0, '2018-01-17 19:13:55', 130.00, 1, 128.70, '', 'Activo'),
(54, 123456, 0, '2018-01-24 19:13:00', 10000.00, 5, 9500.00, '', 'Activo'),
(55, 123456, 0, '2018-01-31 17:46:40', 15000.00, 1, 14850.00, '', 'Activo'),
(56, 123456, 0, '2018-02-20 19:46:58', 820.00, 0, 820.00, '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprarepuesto`
--

CREATE TABLE IF NOT EXISTS `comprarepuesto` (
  `id_compraRepuesto` int(20) NOT NULL,
  `id_compra` int(20) NOT NULL,
  `id_repuesto` int(20) NOT NULL,
  `price` float(15,2) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprarepuesto`
--

INSERT INTO `comprarepuesto` (`id_compraRepuesto`, `id_compra`, `id_repuesto`, `price`, `cantidad`, `status`) VALUES
(1, 1, 223, 234.00, 12, 'Activo'),
(2, 1, 5555, 78.00, 23, 'Activo'),
(3, 1, 3454, 55.00, 34, 'Activo'),
(4, 2, 223, 234.00, 12, 'Activo'),
(5, 2, 5555, 78.00, 11, 'Activo'),
(6, 2, 232432, 33.00, 22, 'Activo'),
(7, 3, 5555, 78.00, 26, 'Activo'),
(8, 4, 5555, 78.00, 12, 'Activo'),
(9, 5, 223, 234.00, 12, 'Activo'),
(10, 6, 5555, 78.00, 16, 'Activo'),
(11, 7, 5555, 78.00, 12, 'Activo'),
(12, 8, 223, 234.00, 6, 'Activo'),
(13, 9, 5555, 78.00, 23, 'Activo'),
(14, 10, 5555, 78.00, 23, 'Activo'),
(15, 11, 223, 234.00, 22, 'Activo'),
(16, 12, 223, 234.00, 10, 'Activo'),
(17, 13, 5555, 78.00, 12, 'Activo'),
(18, 14, 5555, 78.00, 12, 'Activo'),
(19, 14, 223, 234.00, 7, 'Activo'),
(20, 15, 223, 234.00, 8, 'Activo'),
(21, 16, 5555, 78.00, 12, 'Activo'),
(22, 17, 223, 234.00, 3, 'Activo'),
(23, 18, 5555, 78.00, 2, 'Activo'),
(24, 19, 5555, 78.00, 1, 'Activo'),
(25, 20, 5555, 78.00, 2, 'Activo'),
(26, 20, 223, 234.00, 3, 'Activo'),
(27, 21, 223, 234.00, 4, 'Activo'),
(28, 21, 5555, 78.00, 3, 'Activo'),
(29, 22, 223, 234.00, 2, 'Activo'),
(30, 23, 223, 234.00, 2, 'Activo'),
(31, 23, 5555, 78.00, 2, 'Activo'),
(32, 24, 223, 234.00, 1, 'Activo'),
(33, 25, 223, 234.00, 2, 'Activo'),
(34, 26, 5555, 78.00, 2, 'Activo'),
(35, 27, 5555, 78.00, 1, 'Activo'),
(36, 28, 5555, 78.00, 2, 'Activo'),
(37, 29, 223, 234.00, 3, 'Activo'),
(38, 30, 126, 1500.00, 1, 'Activo'),
(39, 30, 1, 410.00, 1, 'Activo'),
(40, 31, 9, 159.00, 3, 'Activo'),
(41, 32, 0, 295.00, 1, 'Activo'),
(42, 32, 0, 145.00, 2, 'Activo'),
(43, 33, 0, 95.00, 1, 'Activo'),
(44, 33, 1, 410.00, 1, 'Activo'),
(45, 34, 0, 78.00, 2, 'Activo'),
(46, 35, 126, 1500.00, 1, 'Activo'),
(47, 35, 0, 295.00, 1, 'Activo'),
(48, 36, 126, 1500.00, 1, 'Activo'),
(49, 36, 0, 295.00, 1, 'Activo'),
(50, 37, 0, 145.00, 2, 'Activo'),
(51, 38, 126, 1500.00, 1, 'Activo'),
(52, 38, 9, 159.00, 2, 'Activo'),
(53, 39, 0, 78.00, 2, 'Activo'),
(54, 40, 1, 410.00, 1, 'Activo'),
(55, 40, 0, 190.00, 1, 'Activo'),
(56, 41, 0, 295.00, 1, 'Activo'),
(57, 42, 0, 145.00, 1, 'Activo'),
(58, 43, 34, 295.00, 1, 'Activo'),
(59, 44, 26, 1500.00, 1, 'Activo'),
(60, 44, 27, 410.00, 1, 'Activo'),
(61, 45, 29, 65.00, 1, 'Activo'),
(62, 46, 27, 410.00, 2, 'Activo'),
(63, 46, 26, 1500.00, 1, 'Activo'),
(64, 47, 29, 65.00, 2, 'Activo'),
(65, 48, 29, 65.00, 3, 'Activo'),
(66, 49, 29, 65.00, 5, 'Activo'),
(67, 50, 42, 5000.00, 2, 'Activo'),
(68, 51, 42, 5000.00, 2, 'Activo'),
(69, 52, 29, 65.00, 2, 'Activo'),
(70, 53, 29, 65.00, 2, 'Activo'),
(71, 54, 42, 5000.00, 2, 'Activo'),
(72, 55, 42, 5000.00, 3, 'Activo'),
(73, 56, 27, 410.00, 1, 'Activo'),
(74, 56, 27, 410.00, 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE IF NOT EXISTS `contador` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `horau` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `diau` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aniou` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `ip`, `hora`, `fecha`, `horau`, `diau`, `aniou`) VALUES
(0, '', '09:15:26', '2 dl 1 d 2018', '09', '1', '2018'),
(0, '', '10:58:04', '2 dl 1 d 2018', '10', '1', '2018'),
(0, '', '11:05:41', '2 dl 1 d 2018', '11', '1', '2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones_demo`
--

CREATE TABLE IF NOT EXISTS `cotizaciones_demo` (
  `id_cotizacion` int(11) NOT NULL,
  `numero_cotizacion` int(11) NOT NULL,
  `fecha_cotizacion` datetime NOT NULL,
  `atencion` varchar(50) NOT NULL,
  `tel1` varchar(9) NOT NULL,
  `empresa` varchar(75) NOT NULL,
  `tel2` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `validez` varchar(20) NOT NULL,
  `entrega` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizaciones_demo`
--

INSERT INTO `cotizaciones_demo` (`id_cotizacion`, `numero_cotizacion`, `fecha_cotizacion`, `atencion`, `tel1`, `empresa`, `tel2`, `email`, `condiciones`, `validez`, `entrega`) VALUES
(1, 1, '2017-10-11 11:18:58', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'heberth@localhost.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(2, 2, '2017-10-11 13:13:38', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'heberth_israel@hotmail.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(3, 3, '2017-10-11 14:13:40', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'hb-tapia@outlook.es', 'Contado', '15 dÃ­as', 'Inmediato'),
(4, 4, '2017-10-11 14:16:31', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'hb-tapia@outlook.es', 'Contado', '15 dÃ­as', 'Inmediato'),
(5, 5, '2017-10-11 14:40:49', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'hb-tapia@outlook.es', 'Contado', '15 dÃ­as', 'Inmediato'),
(6, 6, '2017-10-11 14:41:50', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'hb-tapia@outlook.es', 'Contado', '15 dÃ­as', 'Inmediato'),
(7, 7, '2017-10-11 14:49:16', 'sdasd', '3434-3434', 'sdfsdf', '3323-2343', 'hb-tapia@outlook.es', 'Contado', '15 dÃ­as', 'Inmediato'),
(8, 8, '2017-10-11 22:08:21', 'sdasd', '3434-3434', 'sdfsdf', '3434-2342', 'hb-tapia@outlook.es', 'Contado', '15 dÃ­as', 'Inmediato'),
(9, 9, '2017-10-11 22:15:14', 'Thshsh', '12333', 'Eeer', '152525', 'wen_varchok7@hotmail.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(10, 10, '2017-10-20 17:05:38', 'fghfghfg', '45456456', 'fghfgh', '46456456', 'cbcfgh@dfghfgh.es', 'Contado', '15 dÃ­as', ''),
(11, 11, '2017-10-23 19:58:59', 'sadsad', '3434324', 'sdasd', '32423423', 'gildex_nacer@hotmail.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(12, 12, '2017-10-28 23:47:30', 'trhrt', 'tyutyut', 'rttuty', 'tyutyut', 'tyutyu@sdfsdf', 'Contado', '15 dÃ­as', 'Inmediato'),
(13, 13, '2017-11-03 14:51:51', 'Prueba', '72590762', 'tractorepuestoscat', '2835353', 'n4ch0.lopez@gmail.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(14, 14, '2017-11-04 12:51:14', 'sdfsdf', '435345445', 'sdfsdfs', '35345345', '543@sdfsdf.dfs', 'Contado', '15 dÃ­as', 'Inmediato'),
(15, 15, '2017-11-06 11:46:05', 'prueba', '12345678', 'prueba', '1234567', 'admin@admin.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(16, 16, '2017-11-10 14:47:57', 'prueba', '72590762', 'tractorepuestoscat', '2835353', 'n4ch0.lopez@gmail.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(17, 17, '2017-11-13 14:45:52', 'jose quispe', '77760628', 'particular', '22820881', 'win_javi@hotmail.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(18, 18, '2018-01-17 19:17:57', 'dfgsdgdfg', '213446', 'dggfdg', '213245646', 'jiskotins_100@hotmail.com', 'CrÃ©dito 30 dÃ­as', '15 dÃ­as', 'Inmediato'),
(19, 19, '2018-02-20 19:41:39', 'Efra', '681797931', 'Xxx', '666', 'q@s.com', 'Contado', '15 dÃ­as', 'Inmediato'),
(20, 20, '2018-02-21 19:27:26', 'Efra', '681797931', 'Xxx', '666', 'q@s.com', 'CrÃ©dito 30 dÃ­as', '15 dÃ­as', 'Inmediato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizacion_demo`
--

CREATE TABLE IF NOT EXISTS `detalle_cotizacion_demo` (
  `id_detalle_cotizacion` int(11) NOT NULL,
  `numero_cotizacion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_cotizacion_demo`
--

INSERT INTO `detalle_cotizacion_demo` (`id_detalle_cotizacion`, `numero_cotizacion`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(1, 1, 15, 1, 78),
(2, 1, 16, 1, 33),
(3, 1, 17, 1, 55),
(4, 2, 16, 1, 33),
(5, 3, 28, 1, 159),
(6, 4, 28, 1, 159),
(7, 5, 28, 1, 159),
(8, 6, 28, 1, 159),
(9, 7, 28, 1, 159),
(10, 8, 27, 1, 410),
(11, 8, 28, 1, 159),
(12, 8, 32, 1, 78),
(13, 8, 39, 1, 145),
(14, 9, 39, 1, 145),
(15, 10, 28, 1, 159),
(16, 11, 28, 1, 159),
(17, 11, 26, 1, 1500),
(18, 12, 36, 1, 95),
(19, 12, 34, 1, 295),
(20, 13, 28, 1, 159),
(21, 14, 27, 1, 410),
(22, 15, 34, 1, 295),
(23, 15, 39, 1, 145),
(24, 16, 37, 1, 95),
(25, 17, 34, 1, 295),
(26, 17, 26, 1, 1500),
(27, 18, 27, 1, 410),
(28, 18, 35, 1, 170),
(29, 19, 27, 1, 410),
(30, 20, 26, 1, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(20) NOT NULL,
  `depa` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apP` varchar(50) NOT NULL,
  `apM` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `size` float(15,2) NOT NULL,
  `dateNac` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `coorX` varchar(200) NOT NULL,
  `coorY` varchar(200) NOT NULL,
  `obser` varchar(500) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `id_sucursal` int(20) NOT NULL,
  `dateReg` datetime NOT NULL,
  `statusEmp` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `depa`, `nombre`, `apP`, `apM`, `foto`, `size`, `dateNac`, `phone`, `celular`, `direccion`, `numero`, `email`, `coorX`, `coorY`, `obser`, `cargo`, `id_sucursal`, `dateReg`, `statusEmp`) VALUES
(123456, 'lp', 'Heberth', 'tapia', 'andrade', 'f735db185713286865adf35aaaba85f2.jpg', 77780.00, '1981-10-17', '', '77237022', 'El alto, rio seco', 113, 'ht.heberth@gmail.com', '-16.49461404183042', ' -68.21745872497559', 'ninguna observacion', 'adm', 0, '0000-00-00 00:00:00', 'Activo'),
(456789, 'lp', 'Nacho', 'lopez', 'lopez', '1a57d8f1e6f0ed7d849c9bdd7c4c9f38.jpg', 70970.00, '1982-07-08', '', '78878989', 'villa copacabana', 233, 'nacho@gmail.com', '-16.49562219520584', ' -68.11637163162231', 'ninguna observacion', 'ope', 2, '2017-07-26 20:25:07', 'Activo'),
(34324, 'cbb', 'sdfd', 'sdfsd', 'sdfsdf', 'sweet_notebook (4).jpg', 269296.00, '2017-08-04', '324234', '', 'dfds sdf', 324, 'dfsdf@dsadsad.sd', '-16.54838550084891', ' -68.13446044921875', 'sdfsdf', 'ope', 3, '2017-08-04 21:12:07', 'Activo'),
(35463567, 'pt', 'fghfdgh', 'fghdfg', 'fghdfgh', 'viernes.jpg', 94065.00, '2012-02-22', '456756', '4563456456', 'almacenes', 3345345, 'fdghdfh@gfdfg.ewer', '-16.523372134646024', ' -68.148193359375', '', 'ope', 1, '2017-12-25 22:20:36', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(20) NOT NULL,
  `id_repuesto` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` float(15,2) NOT NULL,
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `id_repuesto`, `name`, `size`, `dateReg`, `status`) VALUES
(66, 26, 'filtro-hidraulico.jpg', 108977.00, '2017-08-23 19:41:06', 'Activo'),
(67, 27, 'filtro de aceite.jpg', 122871.00, '2017-08-23 19:41:06', 'Activo'),
(68, 28, '20170823_200745.jpg', 112604.00, '2017-08-23 19:41:06', 'Activo'),
(100, 34, '23586-8524068.jpg', 23425.00, '2017-10-11 17:22:41', 'Activo'),
(107, 32, 'Combustible-Nafta-NM.jpg', 126344.00, '2017-10-11 17:47:21', 'Activo'),
(124, 36, 'WWW.LUBRICANTES_ONLINE.COM_BMW_13327823413.png', 50182.00, '2017-10-11 17:50:46', 'Activo'),
(132, 38, 'Filtros-Hidraulica-HMMercado_1878100.jpg', 130937.00, '2017-10-11 17:53:26', 'Activo'),
(137, 35, 'filtro-de-combustible.jpg', 4998.00, '2017-10-11 17:55:27', 'Activo'),
(140, 37, 'filtros-combustible.png', 260304.00, '2017-10-11 18:08:10', 'Activo'),
(141, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(142, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(143, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(144, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(145, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(146, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(147, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(148, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(149, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(150, 39, 'sadasd.jpg', 34647.00, '2017-10-11 18:08:10', 'Activo'),
(151, 29, '[animepaper.net]wallpaper-standard-anime-07-ghost-07-ghost-50095-kyohei-preview-414fc0d5.jpg', 164690.00, '2017-11-22 04:09:39', 'Activo'),
(152, 42, 'venta-repuesto-motor-howo-sinotruk-oroya-lima-peru.png', 234890.00, '2017-12-27 12:17:56', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `cod` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`cod`, `nombre`) VALUES
(1, 'julio'),
(2, 'pedro'),
(3, 'pablo'),
(4, 'john'),
(5, 'juana'),
(6, 'ana'),
(7, 'maria'),
(8, 'felipe'),
(9, 'yesid'),
(10, 'horacio'),
(11, 'jerry'),
(12, 'george'),
(13, 'jorge'),
(14, 'juliana'),
(15, 'jenny');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(20) NOT NULL,
  `nombreEmp` varchar(100) NOT NULL,
  `nit` int(20) NOT NULL,
  `ci` int(20) NOT NULL,
  `depa` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apP` varchar(50) NOT NULL,
  `apM` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `obser` varchar(500) NOT NULL,
  `dateReg` datetime NOT NULL,
  `statusPro` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombreEmp`, `nit`, `ci`, `depa`, `nombre`, `apP`, `apM`, `phone`, `celular`, `direccion`, `numero`, `email`, `obser`, `dateReg`, `statusPro`) VALUES
(2, 'empresa 1', 2147483647, 3243432, 'lp', 'prov1', 'sda', 'WQW', '2312312', '', 'asd asdsadsad ', 5, 'asdasd@sadasd.com', 'ninguno', '2017-12-04 22:13:00', 'Activo'),
(3, 'empresa 2', 2321321, 2344234, 'sz', 'dasd a', 'sdasd', 'dasdad', '', '34234324', 'dsd asdasd  ', 585, 'fdsdsgfd@sdasd.com', 'dasd asd asd asd asd asd asd', '2017-12-04 22:15:28', 'Activo'),
(4, 'Caterpillar', 123456789, 12345678, 'lp', 'Cat', 'Cat', 'Cat', '123456', '12345678', 'hidraulica', 123, 'cat@cat.com', '', '2017-12-25 22:17:07', 'Activo'),
(5, 'kjhsdkffdsf', 12345678, 123456, 'lp', 'dfgdfg', 'hjkhjk', 'dfgdf', '1234562', '12346578', 'tyurtyurtyu', 456, 'ergdfgdf@sdf.es', 'bndytefcvb fghdttr', '2018-01-31 17:39:56', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE IF NOT EXISTS `repuesto` (
  `id_repuesto` int(20) NOT NULL,
  `id_categoria` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` varchar(1500) NOT NULL,
  `fromRep` varchar(1000) NOT NULL,
  `numParte` varchar(15) NOT NULL,
  `priceSale` float(15,2) NOT NULL,
  `priceBuy` float(15,2) NOT NULL,
  `stockMin` int(10) NOT NULL,
  `statusRep` enum('1','0') NOT NULL DEFAULT '1',
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id_repuesto`, `id_categoria`, `name`, `detail`, `fromRep`, `numParte`, `priceSale`, `priceBuy`, `stockMin`, `statusRep`, `dateReg`, `status`) VALUES
(108, 1, 'MOTOR DC 200', '', 'CATERPILLAR', '10', 50.00, 45.00, 10, '1', '2018-04-19 16:23:31', 'Activo'),
(109, 1, 'MOTOR DE ARRANQUE', '', 'CAT', '20', 60.00, 50.00, 10, '1', '2018-04-19 16:25:54', 'Activo'),
(110, 3, 'engranaje', '', '2011', 'po66', 50.00, 40.00, 8, '1', '2018-05-11 01:50:58', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(20) NOT NULL,
  `nameSuc` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nameSuc`, `address`, `dateReg`, `status`) VALUES
(1, 'Oficina Central', 'Localidad Samo camino a Oruro', '2017-08-15 15:13:37', 'Activo'),
(2, 'Sucursal Uno', 'San Roque camino a Copacabana', '2017-08-15 15:20:28', 'Activo'),
(3, 'otro', 'lejos', '2017-12-25 22:20:01', 'Inactivo'),
(4, 'sucursal 3', 'principal', '2018-01-31 17:43:10', 'Activo'),
(5, 'xxxxxxxxx', 'wwwwwww', '2018-04-05 14:19:41', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministra`
--

CREATE TABLE IF NOT EXISTS `suministra` (
  `id_suministra` int(20) NOT NULL,
  `id_repuesto` int(20) NOT NULL,
  `id_proveedor` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `dateReg` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suministra`
--

INSERT INTO `suministra` (`id_suministra`, `id_repuesto`, `id_proveedor`, `cantidad`, `dateReg`) VALUES
(1, 21, 2, 34, '2017-12-05 01:03:03'),
(2, 22, 3, 56, '2017-12-05 20:26:58'),
(3, 23, 0, 45, '2017-12-05 20:55:56'),
(4, 24, 0, 44, '2017-12-05 21:13:16'),
(5, 25, 3, 45, '2017-12-05 21:13:16'),
(6, 26, 2, 45, '2017-12-05 21:54:10'),
(7, 27, 2, 45, '2017-12-05 23:02:29'),
(8, 42, 4, 0, '2017-12-27 12:21:53'),
(9, 43, 2, 44, '2018-04-05 14:29:36'),
(10, 44, 2, 44, '2018-04-05 14:29:36'),
(11, 45, 2, 44, '2018-04-05 14:29:36'),
(12, 46, 2, 44, '2018-04-05 14:29:36'),
(13, 47, 3, 390, '2018-04-05 14:58:11'),
(14, 48, 3, 100, '2018-04-05 15:02:17'),
(15, 49, 2, 100, '2018-04-05 21:12:44'),
(16, 50, 2, 50, '2018-04-16 21:23:39'),
(17, 51, 2, 150, '2018-04-18 10:28:57'),
(18, 52, 4, 200, '2018-04-18 10:55:15'),
(19, 53, 2, 56, '2018-04-18 14:25:13'),
(20, 54, 4, 56, '2018-04-18 14:57:40'),
(21, 55, 2, 10, '2018-04-18 15:32:54'),
(22, 56, 2, 50, '2018-04-18 15:36:33'),
(23, 57, 2, 50, '2018-04-18 15:36:33'),
(24, 58, 2, 50, '2018-04-18 15:36:33'),
(25, 59, 2, 50, '2018-04-18 15:36:33'),
(26, 60, 2, 50, '2018-04-18 15:36:33'),
(27, 61, 2, 50, '2018-04-18 15:36:33'),
(28, 62, 2, 50, '2018-04-18 15:36:33'),
(29, 63, 2, 50, '2018-04-18 15:36:33'),
(30, 64, 2, 50, '2018-04-18 15:36:33'),
(31, 65, 2, 50, '2018-04-18 15:36:33'),
(32, 66, 2, 50, '2018-04-18 15:36:33'),
(33, 67, 2, 50, '2018-04-18 15:36:33'),
(34, 68, 2, 50, '2018-04-18 15:36:33'),
(35, 69, 2, 50, '2018-04-18 15:36:33'),
(36, 70, 0, 10, '2018-04-18 16:10:25'),
(37, 71, 0, 10, '2018-04-18 16:10:25'),
(38, 72, 0, 10, '2018-04-18 16:10:25'),
(39, 73, 3, 2, '2018-04-18 16:10:25'),
(40, 74, 3, 5, '2018-04-18 16:10:25'),
(41, 75, 2, 500, '2018-04-18 16:28:30'),
(42, 76, 2, 60, '2018-04-18 16:36:01'),
(43, 77, 2, 20, '2018-04-18 16:38:53'),
(44, 78, 2, 10, '2018-04-18 16:43:41'),
(45, 79, 0, 10, '2018-04-18 16:54:02'),
(46, 80, 2, 80, '2018-04-18 16:55:34'),
(47, 81, 3, 90, '2018-04-18 16:58:47'),
(48, 82, 3, 90, '2018-04-18 16:58:47'),
(49, 83, 3, 90, '2018-04-18 16:58:47'),
(50, 84, 3, 90, '2018-04-18 16:58:47'),
(51, 85, 0, 10, '2018-04-18 17:10:01'),
(52, 86, 3, 99, '2018-04-18 17:12:55'),
(53, 87, 3, 99, '2018-04-18 17:12:55'),
(54, 88, 3, 99, '2018-04-18 17:12:55'),
(55, 89, 3, 99, '2018-04-18 17:12:55'),
(56, 90, 3, 99, '2018-04-18 17:12:55'),
(57, 91, 3, 99, '2018-04-18 17:12:55'),
(58, 92, 3, 88, '2018-04-18 17:21:03'),
(59, 93, 3, 991, '2018-04-18 18:00:01'),
(60, 94, 2, 991, '2018-04-18 17:32:39'),
(61, 95, 2, 991, '2018-04-18 17:32:39'),
(62, 96, 2, 991, '2018-04-18 17:32:39'),
(63, 97, 2, 991, '2018-04-18 17:32:39'),
(64, 98, 2, 991, '2018-04-18 17:32:39'),
(65, 99, 2, 991, '2018-04-18 17:32:39'),
(66, 100, 2, 991, '2018-04-18 17:32:39'),
(67, 101, 2, 991, '2018-04-18 17:32:39'),
(68, 102, 2, 991, '2018-04-18 17:32:39'),
(69, 103, 2, 991, '2018-04-18 17:32:39'),
(70, 104, 3, 10, '2018-04-18 17:40:43'),
(71, 105, 2, 1000, '2018-04-18 18:00:40'),
(72, 106, 2, 60, '2018-04-18 17:54:52'),
(73, 106, 3, 60, '2018-04-19 14:46:51'),
(74, 107, 4, 100, '2018-04-19 14:59:55'),
(75, 108, 3, 100, '2018-04-19 16:23:31'),
(76, 109, 4, 500, '2018-04-19 16:25:54'),
(77, 110, 2, 88, '2018-05-11 01:50:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_cotizacion`
--

CREATE TABLE IF NOT EXISTS `tmp_cotizacion` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `sessionID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp_cotizacion`
--

INSERT INTO `tmp_cotizacion` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `sessionID`, `session_id`) VALUES
(26, 27, 0, NULL, 'cot1', '454e93b2374915bb37a45ce1112108f7'),
(12, 39, 0, NULL, 'cot1', 'c9077cc6ca25a6f77d71a06ed30cc857');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `timeReg` int(100) NOT NULL,
  `status` enum('Inactivo','Activo') NOT NULL DEFAULT 'Activo'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_empleado`, `user`, `pass`, `timeReg`, `status`) VALUES
(1, 123456, 'admin', 'admin', 1527028455, 'Inactivo'),
(2, 456789, 'nacho', 'nacho', 1527028521, 'Inactivo'),
(3, 34324, 'dddd', 'dddd', 1527028783, 'Inactivo'),
(4, 343432, 'eeee', 'eeee', 0, 'Inactivo'),
(5, 23434, 'sdfsdf', 'sdfsdf', 0, 'Inactivo'),
(6, 6009393, 'vargas', 'vargas', 0, 'Inactivo'),
(7, 35463567, '123456', '123456', 0, 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indices de la tabla `almacensuc`
--
ALTER TABLE `almacensuc`
  ADD PRIMARY KEY (`id_almacenSuc`,`id_almacen`) USING BTREE;

--
-- Indices de la tabla `auximg`
--
ALTER TABLE `auximg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auximgemp`
--
ALTER TABLE `auximgemp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`) USING BTREE;

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`) USING BTREE;

--
-- Indices de la tabla `comprarepuesto`
--
ALTER TABLE `comprarepuesto`
  ADD PRIMARY KEY (`id_compraRepuesto`) USING BTREE;

--
-- Indices de la tabla `cotizaciones_demo`
--
ALTER TABLE `cotizaciones_demo`
  ADD PRIMARY KEY (`id_cotizacion`) USING BTREE,
  ADD UNIQUE KEY `numero_cotizacion` (`numero_cotizacion`) USING BTREE;

--
-- Indices de la tabla `detalle_cotizacion_demo`
--
ALTER TABLE `detalle_cotizacion_demo`
  ADD PRIMARY KEY (`id_detalle_cotizacion`) USING BTREE,
  ADD KEY `numero_cotizacion` (`numero_cotizacion`,`id_producto`) USING BTREE;

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`) USING BTREE;

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`) USING BTREE;

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`id_repuesto`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `suministra`
--
ALTER TABLE `suministra`
  ADD PRIMARY KEY (`id_suministra`) USING BTREE;

--
-- Indices de la tabla `tmp_cotizacion`
--
ALTER TABLE `tmp_cotizacion`
  ADD PRIMARY KEY (`id_tmp`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD KEY `id_empleado` (`id_empleado`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT de la tabla `almacensuc`
--
ALTER TABLE `almacensuc`
  MODIFY `id_almacenSuc` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=517;
--
-- AUTO_INCREMENT de la tabla `auximg`
--
ALTER TABLE `auximg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `auximgemp`
--
ALTER TABLE `auximgemp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `comprarepuesto`
--
ALTER TABLE `comprarepuesto`
  MODIFY `id_compraRepuesto` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `cotizaciones_demo`
--
ALTER TABLE `cotizaciones_demo`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `detalle_cotizacion_demo`
--
ALTER TABLE `detalle_cotizacion_demo`
  MODIFY `id_detalle_cotizacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id_repuesto` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `suministra`
--
ALTER TABLE `suministra`
  MODIFY `id_suministra` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `tmp_cotizacion`
--
ALTER TABLE `tmp_cotizacion`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
