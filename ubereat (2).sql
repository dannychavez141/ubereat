-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2019 a las 00:51:30
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ubereat`
--
CREATE DATABASE IF NOT EXISTS `ubereat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ubereat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(15) NOT NULL,
  `access` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`, `username`, `password`, `access`) VALUES
(1, 'Arnaldo Vasquez Ruiz', '994 878 976', 'Jr. Tupac nÂ°450', 'no paga bien', '1234', '1234', 'Client'),
(2, 'FREDY FERRARI', '952 654 215', 'jr.ALAMEDA 731', 'me va a jalar', '4321', '4321', 'Client');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_sales`
--

DROP TABLE IF EXISTS `det_sales`;
CREATE TABLE IF NOT EXISTS `det_sales` (
`iddet_sales` int(11) NOT NULL,
  `idsale` int(11) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_sales`
--

INSERT INTO `det_sales` (`iddet_sales`, `idsale`, `idprod`, `cant`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 1),
(3, 3, 1, 3),
(4, 3, 2, 5),
(5, 4, 1, 2),
(6, 5, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `ext` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`, `ext`) VALUES
(1, 'Almuerzos', 'Lomo Saltado', 42, 10, 15, 'Restaurant OrlandoÂ´s', 'jpg'),
(2, 'Antojitos', 'Ceviche Simple', 27, 8, 12, 'PicaloÂ´s', 'jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `idclie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `dates`, `idclie`) VALUES
(1, '2019-05-29', 1),
(2, '2019-06-26', 1),
(3, '2019-06-26', 2),
(4, '2019-06-26', 1),
(5, '2019-06-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `suppliername` varchar(100) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contactperson`, `address`, `contactno`, `note`) VALUES
(1, 'Restaurant OrlandoÂ´s', 'Orlando Ramos del Aguila', 'Av.Alamedas nÂ°213', '999 354 684', 'ultima opcion'),
(2, 'PicaloÂ´s', 'Patricio Lopez', 'jr.diego de almagro 731', '964853147', 'solo pasivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `access`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'fcortez', '1234', 'Salesperson');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`,`name`,`username`);

--
-- Indices de la tabla `det_sales`
--
ALTER TABLE `det_sales`
 ADD PRIMARY KEY (`iddet_sales`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`,`category`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `det_sales`
--
ALTER TABLE `det_sales`
MODIFY `iddet_sales` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
