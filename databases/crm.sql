-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2015 a las 12:15:06
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `username` varchar(60) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`username`, `Name`, `lastName`) VALUES
('dgallardoc@outlook.com', 'Daniel', 'Gallardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatroom`
--

CREATE TABLE IF NOT EXISTS `chatroom` (
  `idChat` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipoChat` tinyint(1) NOT NULL,
  `tipoUsuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chatroom`
--

INSERT INTO `chatroom` (`idChat`, `username`, `status`, `tipoChat`, `tipoUsuario`) VALUES
('5hR1i0', 'cliente@gmail.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `username` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `rfc` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`username`, `name`, `lastName`, `rfc`, `address`) VALUES
('cliente@gmail.com', 'nombre ', 'apellido', 'rfc2', 'street 10 '),
('dgallardoc@outlook.com', 'Daniel', 'Gallardo', 'f444f', 'deedww');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `idCotizacion` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `idProduct` varchar(10) NOT NULL,
  `cantidadProducto` int(10) NOT NULL,
  `totalIndividual` int(10) NOT NULL,
  `dx` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`dx`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idCotizacion`, `username`, `date`, `idProduct`, `cantidadProducto`, `totalIndividual`, `dx`) VALUES
('zrHJyf', 'cliente@gmail.com', '2015-04-23', 'uKdYjL', 7, 315, 1),
('eKBRNS4UAE', 'cliente@gmail.com', '2015-04-23', 'uKdYjL', 74, 3330, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `idFAQ` varchar(10) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` varchar(300) NOT NULL,
  PRIMARY KEY (`idFAQ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`idFAQ`, `pregunta`, `respuesta`) VALUES
('2xPO1I', 'p1', 'r1'),
('5IMFMo', 'p2', 'r2'),
('B4ND90', 'ttg', 'ggg'),
('emHZZ5', 'p3', 'r3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeschat`
--

CREATE TABLE IF NOT EXISTS `mensajeschat` (
  `idMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `idChat` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `mensajeschat`
--

INSERT INTO `mensajeschat` (`idMensaje`, `idChat`, `username`, `mensaje`, `fecha`) VALUES
(1, 'yDplgG', 'dgallardoc', 'dokdodkdokdod', '0000-00-00'),
(2, 'yDplgG', 'dgallardoc', 'jejesillo', '2010-04-10'),
(3, 'yDplgG', 'dgallardoc', 'fggg', '10:04:10'),
(4, 'yDplgG', 'dgallardoc', 'fggg', '10:37:11'),
(5, 'yDplgG', 'dgallardoc', 'oekoekeokeeko', '37:47'),
(6, 'yDplgG', 'dgallardoc', 'hola????', '38:24'),
(7, 'yDplgG', 'dgallardoc', 'hola????', '38:38'),
(8, 'yDplgG', 'dgallardoc', 'pendejo?', '38:44'),
(9, 'cLkBgu', 'dgallardoc', 'hola? :D', '10:39:25'),
(10, 'cLkBgu', 'dgallardoc', 'pls', '10:40:49'),
(11, 'tMDLw0', 'miguel.tre', 'que show', '11:14:35'),
(12, 'tMDLw0', 'dgallardoc', 'nada nada aqu nomas', '11:14:43'),
(13, 'tMDLw0', 'dgallardoc', 'nada nada aqu nomas', '11:16:28'),
(14, 'tMDLw0', 'dgallardoc', 'que tranzaaaaaaaa', '11:16:36'),
(15, 'tMDLw0', 'dgallardoc', 'uheuheheuehueheuheuhe', '11:16:43'),
(16, 'tMDLw0', 'dgallardoc', 'no mames wey ', '11:16:54'),
(17, 'tMDLw0', 'dgallardoc', 'huehueuh', '11:18:10'),
(18, 'tMDLw0', 'miguel.tre', 'd', '11:18:34'),
(19, 'c0f6XZ', 'dgallardoc', 'hola wey', '11:18:53'),
(20, 'DlCQYM', 'dgallardoc', 'que tranza amigos', '11:25:10'),
(21, 'DlCQYM', 'dgallardoc', 'ddddd', '11:25:47'),
(22, 'DlCQYM', 'miguel.tre', 'nussajajjajajaa', '11:25:51'),
(23, 'DlCQYM', 'dgallardoc', 'ggggg', '11:26:39'),
(24, 'DlCQYM', 'dgallardoc', 'ggggg', '11:27:52'),
(25, 'DlCQYM', 'dgallardoc', 'no mames', '11:28:01'),
(26, 'DlCQYM', 'dgallardoc', 'no mames', '11:28:50'),
(27, 'DlCQYM', 'miguel.tre', 'nussajajjajajaa', '11:29:02'),
(28, 'ID6533', 'dgallardoc', 'hola ke ase', '11:29:13'),
(29, 'ID6533', 'miguel.tre', 'xd baruz', '11:29:20'),
(30, 'ID6533', 'dgallardoc', 'chido, bye', '11:29:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` varchar(10) NOT NULL,
  `description` varchar(60) NOT NULL,
  `supplier` varchar(60) NOT NULL,
  `stock` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`idProduct`, `description`, `supplier`, `stock`, `price`) VALUES
('uKdYjL', 'Condones', 'M Force', 232, 45),
('zP6yNc', 'carteras', 'Fashion Show 2012', 30, 320);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `code` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `hashedPassword` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `queue`
--

INSERT INTO `queue` (`code`, `username`, `hashedPassword`, `status`, `type`) VALUES
('3nxZvx0p', 'dgallardoc@outlook.com', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 1, 2),
('ZS8WXC7C', 'miguel.trevinom@gmail.com', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(60) NOT NULL,
  `hashedPassword` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `hashedPassword`, `type`, `id`) VALUES
('cliente@gmail.com', '75004f149038473757da0be07ef76dd4a9bdbc8d', 2, 1),
('dgallardoc@outlook.com', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `codigoPedido` varchar(10) NOT NULL,
  `idCotizacion` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `totalDinero` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `updateDate` date NOT NULL,
  `identificador` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`identificador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`codigoPedido`, `idCotizacion`, `username`, `totalDinero`, `status`, `date`, `updateDate`, `identificador`) VALUES
('5gmtzDo8Fe', 'zrHJyf', 'cliente@gmail.com', 462, 4, '2015-04-23', '2015-04-23', 1),
('EClqs7dpxm', 'eKBRNS4UAE', 'cliente@gmail.com', 3930, 2, '2015-04-23', '2015-04-23', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
