-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2023 a las 02:56:44
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `card`
--
CREATE DATABASE IF NOT EXISTS `card` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `card`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `cantidad_productos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_productos` (IN `aumentar` INT, IN `iduser` INT, IN `precios` INT)  NO SQL
BEGIN
    	DECLARE NUEVA_EXISTENCIA INT; 
        DECLARE CANT_ACTIUAL INT;
        DECLARE ACTUAL_EXISTENCIA INT;
         DECLARE NUEVO_PECIO decimal(10,2);
        declare PRECIO_ACTUAL decimal(10,2);
      
        SELECT cantidad,precio INTO ACTUAL_EXISTENCIA,PRECIO_ACTUAL FROM productos WHERE id = iduser;
        SET NUEVA_EXISTENCIA = ACTUAL_EXISTENCIA + aumentar;
       SET NUEVO_PECIO=((PRECIO_ACTUAL*ACTUAL_EXISTENCIA)+(aumentar*precios))/NUEVA_EXISTENCIA;       
        UPDATE productos SET cantidad = NUEVA_EXISTENCIA, precio = NUEVO_PECIO WHERE id = iduser;
        SELECT NUEVA_EXISTENCIA,NUEVO_PECIO;
        
    END$$

DROP PROCEDURE IF EXISTS `cantidad_productos_cancelado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_productos_cancelado` (IN `aumentar` INT, IN `iduser` INT)  NO SQL
BEGIN
    	DECLARE NUEVA_EXISTENCIA INT; 
        DECLARE CANT_ACTIUAL INT;
        DECLARE ACTUAL_EXISTENCIA INT;
      
        SELECT cantidad INTO ACTUAL_EXISTENCIA FROM productos WHERE id = iduser;
        SET NUEVA_EXISTENCIA = ACTUAL_EXISTENCIA + aumentar;
              
        UPDATE productos SET cantidad = NUEVA_EXISTENCIA WHERE id = iduser;
        SELECT NUEVA_EXISTENCIA;
        
    END$$

DROP PROCEDURE IF EXISTS `resta_productos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `resta_productos` (IN `resta` INT, IN `iduser` INT)  NO SQL
BEGIN
    	DECLARE NUEVA_EXISTENCIA INT; 
        DECLARE CANT_ACTIUAL INT;
        DECLARE ACTUAL_EXISTENCIA INT;
      
        SELECT cantidad INTO ACTUAL_EXISTENCIA FROM productos WHERE id = iduser;
        SET NUEVA_EXISTENCIA = ACTUAL_EXISTENCIA - resta;
              
        UPDATE productos SET cantidad = NUEVA_EXISTENCIA WHERE id = iduser;
        SELECT NUEVA_EXISTENCIA;
        
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bi_productos`
--

DROP TABLE IF EXISTS `bi_productos`;
CREATE TABLE IF NOT EXISTS `bi_productos` (
  `id_bi` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bi`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bi_productos`
--

INSERT INTO `bi_productos` (`id_bi`, `id`, `cantidad`, `fecha`) VALUES
(1, 16, 242, '2023-02-03 20:39:39'),
(2, 5, 919, '2023-02-03 20:39:47'),
(3, 16, 241, '2023-02-03 20:39:55'),
(4, 16, 234, '2023-02-03 20:40:17'),
(5, 16, 6, '2023-02-03 20:42:07'),
(6, 16, 240, '2023-02-03 20:42:07'),
(7, 16, 1, '2023-02-03 20:42:41'),
(8, 16, 241, '2023-02-03 20:42:41'),
(9, 16, 1, '2023-02-03 20:42:52'),
(10, 16, 242, '2023-02-03 20:42:52'),
(11, 6, 41, '2023-02-03 21:23:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(2, 'BEBIDAS'),
(7, 'TELEFONOS'),
(8, 'COMPUTADORAS'),
(9, 'MUEBLESS'),
(11, 'PENDRIVE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

DROP TABLE IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(1, 55555555, 136, '2023-02-04 01:09:39', '2023-02-04 01:09:39', 2),
(2, 55555555, 20, '2023-02-04 01:09:47', '2023-02-04 01:09:47', 3),
(3, 55555555, 111, '2023-02-04 01:09:55', '2023-02-04 01:09:55', 2),
(4, 55555555, 777, '2023-02-04 01:10:17', '2023-02-04 01:10:17', 3),
(5, 88888888, 25, '2023-02-04 01:53:05', '2023-02-04 01:53:05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

DROP TABLE IF EXISTS `orden_articulos`;
CREATE TABLE IF NOT EXISTS `orden_articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orden_articulos`
--

INSERT INTO `orden_articulos` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 16, 1),
(2, 1, 6, 1),
(3, 1, 5, 1),
(4, 2, 5, 1),
(5, 3, 16, 1),
(6, 4, 16, 7),
(7, 5, 6, 1),
(8, 5, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_normal` decimal(10,2) NOT NULL,
  `precio_rebajado` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_normal`, `precio_rebajado`, `cantidad`, `imagen`, `id_categoria`, `id_prov`, `precio`) VALUES
(5, 'Vino', 'Ninguna', '28.00', '20.00', 919, '20211212082421.jpg', 2, 1, '601.63'),
(6, 'Coca cola', '1.5 ml', '5.00', '5.00', 41, '20211212082628.jpg', 2, 0, '0.00'),
(16, 'asdfasdf', 'asdfsdaf', '123.00', '111.00', 242, '20230204012822.jpg', 2, 15, '99.75');

--
-- Disparadores `productos`
--
DROP TRIGGER IF EXISTS `productos_A_I`;
DELIMITER $$
CREATE TRIGGER `productos_A_I` AFTER INSERT ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bi_productos (id,cantidad)
    VALUES(NEW.id,NEW.cantidad);
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `productos_up_A_I`;
DELIMITER $$
CREATE TRIGGER `productos_up_A_I` AFTER UPDATE ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bi_productos (id,cantidad)
    VALUES(NEW.id,NEW.cantidad);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `des_estatus` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_estatus`, `des_estatus`) VALUES
(1, 'Proceso'),
(2, 'Devuelto'),
(3, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_cli`
--

DROP TABLE IF EXISTS `tmbtv_cli`;
CREATE TABLE IF NOT EXISTS `tmbtv_cli` (
  `ced_comp` varchar(8) COLLATE utf8_bin NOT NULL,
  `corr_ele` varchar(35) COLLATE utf8_bin NOT NULL,
  `password` varchar(15) COLLATE utf8_bin NOT NULL,
  `nom_comp` varchar(30) COLLATE utf8_bin NOT NULL,
  `ape_comp` varchar(30) COLLATE utf8_bin NOT NULL,
  `dir_comp` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuarioo` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `tel_comp` varchar(11) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ced_comp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tmbtv_cli`
--

INSERT INTO `tmbtv_cli` (`ced_comp`, `corr_ele`, `password`, `nom_comp`, `ape_comp`, `dir_comp`, `usuarioo`, `tel_comp`) VALUES
('44444444', 'vivafsdfs@gmail.com', 'e10adc3949ba59a', 'RGSDG', 'SDFGDFG', 'sdfgsdgf', 'poiuy', '34534534534'),
('55555555', 'asda@gmail.com', 'e10adc3949ba59a', 'asd', 'CO', 'LSDFSDAF', 'qwerty', '02584578965'),
('88888888', 'gfjghjgfhjdfs@gmail.com', 'e10adc3949ba59a', 'TRUTU', 'TYRUTYU', 'SDGFDFSGDFGDFG', 'MNBV', '65756475756');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_pro`
--

DROP TABLE IF EXISTS `tmbtv_pro`;
CREATE TABLE IF NOT EXISTS `tmbtv_pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TMPRO_RIF` varchar(15) COLLATE utf8_bin NOT NULL,
  `TMPRO_NOC` varchar(50) COLLATE utf8_bin NOT NULL,
  `TMPRO_TEL` varchar(11) COLLATE utf8_bin NOT NULL,
  `TMPRO_DID` varchar(70) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tmbtv_pro`
--

INSERT INTO `tmbtv_pro` (`id`, `TMPRO_RIF`, `TMPRO_NOC`, `TMPRO_TEL`, `TMPRO_DID`) VALUES
(15, 'V-27542563-B', 'COCACOLA', '4343535432', 'NEW YORK'),
(16, 'V-53245363-X', 'SAMSUNG', '364275723', 'EUU'),
(17, '34DFH', 'GDFGHGFHGFH', '3443454', 'DGFSDGESRGSDG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `rol`) VALUES
(1, 'ADMIN', 'ADMIN', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'qwerty', 'asd CO', 'e10adc3949ba59abbe56e057f20f883e', 'personal'),
(3, 'poiuy', 'RGSDG SDFGDFG', 'e10adc3949ba59abbe56e057f20f883e', 'personal'),
(4, 'MNBV', 'TRUTU TYRUTYU', 'e10adc3949ba59abbe56e057f20f883e', 'personal');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD CONSTRAINT `orden_articulos_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orden` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
