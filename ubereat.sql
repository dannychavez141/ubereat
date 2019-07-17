-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2019 a las 07:43:15
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

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `evalua`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `evalua`()
BEGIN
DECLARE ids int;
SET ids=(SELECT max(id) FROM ubereat.sales);
INSERT INTO `ubereat`.`evalucion` (`idsale`, `valor`) VALUES (ids, '0');
END$$

--
-- Funciones
--
DROP FUNCTION IF EXISTS `cantcompras`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `cantcompras`( clie int) RETURNS varchar(10) CHARSET utf8
BEGIN
DECLARE hor VARCHAR(30);
SET hor=(SELECT count(id) FROM sales where idclie=clie);
RETURN hor;
END$$

DROP FUNCTION IF EXISTS `gananciames`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `gananciames`( mes varchar(2),año varchar(6)) RETURNS int(11)
BEGIN
DECLARE hor int;
SET hor=(select sum(d.cant*(p.retail-p.purchase)) from det_sales d join sales s  on d.idsale=s.id join  products  p on d.idprod=p.id   where MONTH(s.dates)=mes and YEAR(s.dates)=año);
RETURN hor;
END$$

DROP FUNCTION IF EXISTS `platos`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `platos`( plat int) RETURNS int(11)
BEGIN
DECLARE hor VARCHAR(30);
SET hor=(SELECT sum(cant) FROM ubereat.det_sales where idprod=plat);
RETURN hor;
END$$

DROP FUNCTION IF EXISTS `proveedores`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `proveedores`( prov varchar(100)) RETURNS int(11)
BEGIN
DECLARE hor int;
SET hor=(select count(id) from products where supplier=prov);
RETURN hor;
END$$

DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`, `username`, `password`, `access`) VALUES
(1, 'Arnaldo Vasquez Ruiz', '994 878 976', 'Jr. Tupac nÂ°450', 'no paga bien', '1234', '1234', 'Client'),
(2, 'FREDY FERRARI', '952 654 215', 'jr.ALAMEDA 731', 'me va a jalar', '4321', '4321', 'Client'),
(3, 'FRANK RAMOS DEL AGUILA', '957 632 481', 'JR.LACALLE NÂ°541', 'El si paga bien', '12345', '12345', 'Client'),
(4, 'PATRICIO DAVID LOPEZ PAREDES', '961 542 145', 'JR.LA MORQUE NÂ°322', 'llevar sencillo por que simpre tiene cheke', '54321', '54321', 'Client'),
(5, 'MARIA CORTEZ CHUMBE', '956 241 146', 'JR.TUPAC S/N', 'POCAS COMPRAS', '654321', '654321', 'Client');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_sales`
--

INSERT INTO `det_sales` (`iddet_sales`, `idsale`, `idprod`, `cant`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 1),
(3, 3, 1, 3),
(4, 3, 2, 5),
(5, 4, 1, 2),
(6, 5, 2, 1),
(7, 6, 1, 1),
(8, 6, 2, 1),
(9, 6, 3, 1),
(10, 7, 2, 4),
(11, 7, 4, 1),
(12, 8, 5, 2),
(13, 8, 6, 1),
(14, 9, 1, 1),
(15, 10, 3, 1),
(16, 10, 6, 1),
(17, 11, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
`idestado` int(11) NOT NULL,
  `descr` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `descr`) VALUES
(1, 'ENTREGADO'),
(2, 'EN CAMINO'),
(3, 'PEDIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalucion`
--

DROP TABLE IF EXISTS `evalucion`;
CREATE TABLE IF NOT EXISTS `evalucion` (
  `idsale` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evalucion`
--

INSERT INTO `evalucion` (`idsale`, `valor`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0);

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
  `ext` varchar(5) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`, `ext`, `detalle`) VALUES
(1, 'Almuerzos', 'Lomo Saltado', 38, 10, 15, 'Restaurant OrlandoÂ´s', 'jpg', 'ta rico pero le falta sal '),
(2, 'Antojitos', 'Ceviche Simple', 22, 8, 12, 'PicaloÂ´s', 'jpg', 'le falta ajisito'),
(3, 'Chifa', 'Arroz Chaufa Simple', 58, 6, 8, 'Restaurant OrlandoÂ´s', 'jpg', 'tiene pollito, arroz, cebollita china y sillausito'),
(4, 'Almuerzos', 'TALLARINES ROJOS', 19, 8, 10, 'Restaurant OrlandoÂ´s', 'jpg', '-Tallarines cocidos al dente\r\n-Salsa roja con carne molida y especias\r\n'),
(5, 'Chifa', 'POLLO ENRROLLADO CON VERDURAS', 38, 10, 12, 'CHIFA FELICIDAD', 'png', '-VERDURAS FRESCAS\r\n-ENRROLLADO DE POLLO Y JAMON'),
(6, 'Chifa', 'AEROPUERTO FELICIDAD', 28, 8, 11, 'CHIFA FELICIDAD', 'png', '-CHAUFITA CON FIDEITOS\r\n-TIENE BASTATE PRESA :3 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `idclie` int(11) NOT NULL,
  `est` int(11) DEFAULT '3'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `dates`, `idclie`, `est`) VALUES
(1, '2019-05-29', 1, 3),
(2, '2019-06-26', 1, 3),
(3, '2019-06-26', 2, 3),
(4, '2019-06-26', 1, 3),
(5, '2019-06-26', 1, 3),
(6, '2019-07-03', 4, 3),
(7, '2019-07-03', 4, 3),
(8, '2019-07-03', 5, 3),
(9, '2019-07-16', 2, 3),
(10, '2019-07-16', 2, 3),
(11, '2019-07-17', 1, 3);

--
-- Disparadores `sales`
--
DROP TRIGGER IF EXISTS `crearevaluacion`;
DELIMITER //
CREATE TRIGGER `crearevaluacion` AFTER INSERT ON `sales`
 FOR EACH ROW call ubereat.evalua()
//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contactperson`, `address`, `contactno`, `note`) VALUES
(1, 'Restaurant OrlandoÂ´s', 'Orlando Ramos del Aguila', 'Av.Alamedas nÂ°213', '999 354 684', 'ultima opcion'),
(2, 'PicaloÂ´s', 'Patricio Lopez', 'jr.diego de almagro 731', '964853147', 'solo pasivos'),
(3, 'KFC OPEN PLAZA', 'DARWIN LOPEZ', 'AV.CENTENARIO', '987654125', 'SI CONTESTA'),
(4, 'MI POLLO', 'FERNANDO CASAS', 'AV.YARINA', '963258741', 'TA GORDITO'),
(5, 'CHIFA FELICIDAD', 'JAIRO WONK', 'JR.IMACULADA', '986524125', 'ME DEBE 30 SOLES');

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
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `evalucion`
--
ALTER TABLE `evalucion`
 ADD PRIMARY KEY (`idsale`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `det_sales`
--
ALTER TABLE `det_sales`
MODIFY `iddet_sales` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
