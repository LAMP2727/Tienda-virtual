-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2023 a las 17:21:46
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `card`
--
CREATE DATABASE IF NOT EXISTS `card` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `card`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_productos` (IN `aumentar` INT, IN `iduser` INT)  NO SQL BEGIN
    	DECLARE NUEVA_EXISTENCIA INT; 
        DECLARE CANT_ACTIUAL INT;
        DECLARE ACTUAL_EXISTENCIA INT;
      
        SELECT cantidad INTO ACTUAL_EXISTENCIA FROM productos WHERE id = iduser;
        SET NUEVA_EXISTENCIA = ACTUAL_EXISTENCIA + aumentar;
              
        UPDATE productos SET cantidad = NUEVA_EXISTENCIA WHERE id = iduser;
        SELECT NUEVA_EXISTENCIA;
        
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `resta_productos` (IN `resta` INT, IN `iduser` INT)  NO SQL BEGIN
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

CREATE TABLE `bi_productos` (
  `id_bi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `bi_productos`
--

INSERT INTO `bi_productos` (`id_bi`, `id`, `cantidad`, `fecha`) VALUES
(1, 14, 15, '2023-01-17 18:51:44'),
(2, 14, 16, '2023-01-17 19:00:05'),
(3, 1, 17, '2023-01-17 19:07:33'),
(4, 14, 4, '2023-01-17 19:13:09'),
(5, 14, 4, '2023-01-17 19:13:41'),
(6, 4, 29, '2023-01-17 19:13:41'),
(7, 14, 6, '2023-01-17 19:14:11'),
(8, 6, 29, '2023-01-17 19:14:12'),
(9, 14, 14, '2023-01-17 19:16:29'),
(10, 14, 6, '2023-01-17 19:16:41'),
(11, 1, 117, '2023-01-17 19:17:27'),
(12, 14, 2, '2023-01-17 19:18:05'),
(13, 14, 4, '2023-01-17 19:18:05'),
(14, 1, 2, '2023-01-17 19:19:02'),
(15, 1, 4, '2023-01-17 19:19:02'),
(16, 1, 2, '2023-01-17 19:20:12'),
(17, 1, 4, '2023-01-17 19:20:13'),
(18, 1, 2, '2023-01-17 19:20:26'),
(19, 1, 4, '2023-01-17 19:20:26'),
(20, 1, 6, '2023-01-17 19:21:34'),
(21, 1, 12, '2023-01-17 19:21:34'),
(22, 1, 6, '2023-01-17 19:22:18'),
(23, 1, 12, '2023-01-17 19:22:18'),
(24, 1, 4, '2023-01-17 19:22:53'),
(25, 1, 8, '2023-01-17 19:22:53'),
(26, 1, 2, '2023-01-17 19:23:21'),
(27, 1, 4, '2023-01-17 19:23:21'),
(28, 1, 6, '2023-01-17 19:24:38'),
(29, 1, 12, '2023-01-17 19:24:38'),
(30, 1, 6, '2023-01-17 19:30:21'),
(31, 1, 12, '2023-01-17 19:30:21'),
(32, 1, 6, '2023-01-17 19:30:31'),
(33, 1, 12, '2023-01-17 19:30:31'),
(34, 1, 4, '2023-01-17 19:30:38'),
(35, 1, 8, '2023-01-17 19:30:39'),
(36, 1, 108, '2023-01-17 19:31:20'),
(37, 1, 208, '2023-01-17 19:31:38'),
(38, 1, 308, '2023-01-17 19:31:46'),
(39, 1, 2, '2023-01-17 19:32:23'),
(40, 1, 4, '2023-01-17 19:32:23'),
(41, 1, 500, '2023-01-17 19:33:49'),
(42, 1, 20, '2023-01-17 19:34:32'),
(43, 1, 80, '2023-01-17 19:34:45'),
(44, 1, 160, '2023-01-17 19:34:45'),
(45, 1, 9, '2023-01-17 19:35:25'),
(46, 1, 18, '2023-01-17 19:35:25'),
(47, 2, 320, '2023-01-17 19:43:54'),
(48, 1, 2, '2023-01-17 19:45:37'),
(49, 1, 4, '2023-01-17 19:45:38'),
(50, 1, 6, '2023-01-17 20:06:55'),
(51, 1, 12, '2023-01-17 20:06:55'),
(52, 1, 8, '2023-01-17 20:08:38'),
(53, 1, 16, '2023-01-17 20:08:38'),
(54, 1, 3, '2023-01-17 20:11:39'),
(55, 1, 6, '2023-01-17 20:11:39'),
(56, 1, 4, '2023-01-17 20:12:19'),
(57, 1, 8, '2023-01-17 20:12:19'),
(58, 1, 3, '2023-01-17 20:13:00'),
(59, 1, 6, '2023-01-17 20:13:00'),
(60, 1, 2, '2023-01-17 20:13:27'),
(61, 1, 4, '2023-01-17 20:13:27'),
(62, 1, 3, '2023-01-17 20:14:37'),
(63, 1, 6, '2023-01-17 20:14:37'),
(64, 1, 10, '2023-01-17 20:15:30'),
(65, 1, 2, '2023-01-17 20:17:28'),
(66, 1, 102, '2023-01-17 20:18:04'),
(67, 1, 2, '2023-01-17 20:20:32'),
(68, 1, 4, '2023-01-17 20:20:32'),
(69, 1, 6, '2023-01-17 20:21:43'),
(70, 1, 12, '2023-01-17 20:21:43'),
(71, 3, 323, '2023-01-17 20:22:38'),
(72, 1, 8, '2023-01-17 20:26:55'),
(73, 1, 20, '2023-01-17 20:26:55'),
(74, 1, 3, '2023-01-17 20:27:15'),
(75, 1, 23, '2023-01-17 20:27:15'),
(76, 1, 7, '2023-01-17 20:27:26'),
(77, 1, 30, '2023-01-17 20:27:26'),
(78, 1, 0, '2023-01-17 21:33:47'),
(79, 5, 0, '2023-01-21 10:52:35'),
(80, 14, 2, '2023-01-21 12:33:06'),
(81, 1, -14, '2023-01-21 12:42:35'),
(82, 14, 1, '2023-01-21 12:44:02'),
(83, 14, -1, '2023-01-21 12:46:56'),
(84, 4, 28, '2023-01-21 13:17:09'),
(85, 4, 27, '2023-01-21 14:31:37'),
(86, 12, 5, '2023-01-21 14:31:47'),
(87, 3, 322, '2023-01-21 14:35:05'),
(88, 2, 319, '2023-01-21 14:37:06'),
(89, 12, 1, '2023-01-21 17:01:20'),
(90, 2, 319, '2023-01-21 17:01:20'),
(91, 4, 1, '2023-01-21 17:04:03'),
(92, 1, -14, '2023-01-21 17:04:03'),
(93, 4, 1, '2023-01-21 17:04:41'),
(94, 4, 28, '2023-01-21 17:04:41'),
(95, 4, 1, '2023-01-21 17:06:27'),
(96, 4, 29, '2023-01-21 17:06:27'),
(97, 4, 1, '2023-01-21 17:07:06'),
(98, 4, 30, '2023-01-21 17:07:06'),
(99, 14, 10, '2023-01-21 21:15:21'),
(100, 14, 9, '2023-01-21 21:15:22'),
(101, 4, 29, '2023-01-23 09:09:41'),
(102, 4, 28, '2023-01-23 09:10:05'),
(103, 4, 27, '2023-01-23 09:12:15'),
(104, 4, 26, '2023-01-23 09:13:23'),
(105, 6, 28, '2023-01-23 09:13:23'),
(106, 12, 4, '2023-01-23 09:15:11'),
(107, 2, 318, '2023-01-23 09:15:11'),
(108, 3, 1, '2023-01-23 11:20:37'),
(109, 3, 323, '2023-01-23 11:20:37'),
(110, 3, 1, '2023-01-23 11:21:01'),
(111, 3, 324, '2023-01-23 11:21:01'),
(112, 4, 1, '2023-01-23 11:29:17'),
(113, 4, 27, '2023-01-23 11:29:17'),
(114, 7, 9, '2023-01-23 12:41:44'),
(115, 6, 27, '2023-01-23 12:41:44'),
(116, 6, 1, '2023-01-23 12:42:26'),
(117, 6, 28, '2023-01-23 12:42:26'),
(118, 15, 12, '2023-01-23 14:11:36'),
(119, 6, 27, '2023-01-24 10:42:53'),
(120, 15, 11, '2023-01-24 10:42:53'),
(121, 6, 25, '2023-01-24 11:08:26'),
(122, 6, 24, '2023-01-24 11:10:50'),
(123, 6, 1, '2023-01-24 11:11:27'),
(124, 6, 25, '2023-01-24 11:11:27'),
(125, 6, 1, '2023-01-24 11:29:03'),
(126, 6, 26, '2023-01-24 11:29:03'),
(127, 6, 1, '2023-01-24 11:29:08'),
(128, 6, 27, '2023-01-24 11:29:08'),
(129, 6, 1, '2023-01-24 11:29:11'),
(130, 6, 28, '2023-01-24 11:29:11'),
(131, 6, 1, '2023-01-24 11:29:43'),
(132, 6, 29, '2023-01-24 11:29:43'),
(133, 6, 1, '2023-01-24 11:30:42'),
(134, 6, 30, '2023-01-24 11:30:42'),
(135, 6, 1, '2023-01-24 11:31:46'),
(136, 6, 31, '2023-01-24 11:31:46'),
(137, 6, 1, '2023-01-24 11:33:42'),
(138, 6, 32, '2023-01-24 11:33:42'),
(139, 6, 1, '2023-01-24 11:46:07'),
(140, 6, 33, '2023-01-24 11:46:07'),
(141, 6, 1, '2023-01-24 11:57:13'),
(142, 6, 34, '2023-01-24 11:57:13'),
(143, 6, 1, '2023-01-24 11:57:29'),
(144, 6, 35, '2023-01-24 11:57:29'),
(145, 6, 1, '2023-01-24 12:00:35'),
(146, 6, 1, '2023-01-24 12:01:18'),
(147, 6, 1, '2023-01-24 12:01:52'),
(148, 6, 36, '2023-01-24 12:01:52'),
(149, 6, 1, '2023-01-24 12:03:08'),
(150, 6, 37, '2023-01-24 12:03:08'),
(151, 6, 1, '2023-01-24 12:03:08'),
(152, 6, 38, '2023-01-24 12:03:08'),
(153, 6, 1, '2023-01-24 12:03:49'),
(154, 6, 39, '2023-01-24 12:03:49'),
(155, 6, 1, '2023-01-24 12:05:02'),
(156, 6, 40, '2023-01-24 12:05:02'),
(157, 6, 1, '2023-01-24 12:06:45'),
(158, 6, 41, '2023-01-24 12:06:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(2, 'BEBIDAS'),
(7, 'TELEFONOS'),
(8, 'COMPUTADORAS'),
(9, 'MUEBLES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(1, 94954654, 3450, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(2, 94954654, 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(3, 94954654, 750, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 94954654, 700, '2023-01-21 19:07:06', '2023-01-21 19:07:06', 3),
(5, 94954654, 2005, '2023-01-23 13:09:41', '2023-01-23 13:09:41', 1),
(6, 94954654, 2005, '2023-01-23 13:10:05', '2023-01-23 13:10:05', 1),
(7, 94954654, 2005, '2023-01-23 13:12:15', '2023-01-23 13:12:15', 1),
(8, 94954654, 2005, '2023-01-23 13:13:23', '2023-01-23 13:13:23', 1),
(9, 94954654, 800, '2023-01-23 13:15:11', '2023-01-23 13:15:11', 3),
(10, 94954654, 205, '2023-01-23 16:41:44', '2023-01-23 16:41:44', 3),
(11, 0, 5505, '2023-01-24 14:42:53', '2023-01-24 14:42:53', 3),
(12, 0, 10, '2023-01-24 15:08:26', '2023-01-24 15:08:26', 3),
(13, 0, 5, '2023-01-24 15:10:50', '2023-01-24 15:10:50', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

CREATE TABLE `orden_articulos` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orden_articulos`
--

INSERT INTO `orden_articulos` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(22, 1, 4, 1),
(23, 1, 3, 1),
(24, 1, 2, 1),
(25, 2, 12, 1),
(26, 3, 3, 1),
(27, 4, 2, 1),
(28, 8, 4, 1),
(29, 8, 6, 1),
(30, 9, 12, 1),
(31, 9, 2, 1),
(32, 10, 7, 1),
(33, 10, 6, 1),
(34, 11, 6, 1),
(35, 11, 15, 1),
(36, 12, 6, 2),
(37, 13, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_normal` decimal(10,2) NOT NULL,
  `precio_rebajado` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_normal`, `precio_rebajado`, `cantidad`, `imagen`, `id_categoria`, `id_prov`, `precio`) VALUES
(5, 'Vino', 'Ninguna', '28.00', '20.00', 0, '20211212082421.jpg', 2, 0, '0.00'),
(6, 'Coca cola', '1.5 ml', '5.00', '5.00', 41, '20211212082628.jpg', 2, 0, '0.00');

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `productos_A_I` AFTER INSERT ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bi_productos (id,cantidad)
    VALUES(NEW.id,NEW.cantidad);
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `productos_up_A_I` AFTER UPDATE ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bi_productos (id,cantidad)
    VALUES(NEW.id,NEW.cantidad);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_productos`
--

CREATE TABLE `res_productos` (
  `id_res` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id_estatus` int(11) NOT NULL,
  `des_estatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_estatus`, `des_estatus`) VALUES
(1, 'Proceso'),
(2, 'Devuelto'),
(3, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_cat`
--

CREATE TABLE `tmbtv_cat` (
  `TMCAT_IDC` int(11) NOT NULL,
  `TMCAT_NOM` varchar(30) NOT NULL,
  `TMCAT_DES` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_cli`
--

CREATE TABLE `tmbtv_cli` (
  `ced_comp` varchar(8) NOT NULL,
  `corr_ele` varchar(35) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nom_comp` varchar(30) NOT NULL,
  `ape_comp` varchar(30) NOT NULL,
  `dir_comp` varchar(255) NOT NULL,
  `usuarioo` varchar(70) DEFAULT NULL,
  `tel_comp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tmbtv_cli`
--

INSERT INTO `tmbtv_cli` (`ced_comp`, `corr_ele`, `password`, `nom_comp`, `ape_comp`, `dir_comp`, `usuarioo`, `tel_comp`) VALUES
('11374751', 'GERSON@GMAIL.COM', '12345', 'GERSON', 'MEDINA', 'PALMIRA', 'GER', '04147261778'),
('123', 'asdviasdvas@gmail.com', 'e10adc3949ba59a', 'asdasd', 'sdfsdf', 'asd', 'wresdf', 'sdfsd'),
('1232', 'vasdfivas@gmail.com', '912ec803b2ce49e', 'fasdf', 'asfd', 'sadfd', 'asdf', '234234'),
('232', 'vivsdfaas@gmail.com', 'f6aff6cf1805715', 'werwe', 'sdfsd', 'asdfsdaf', 'fasdfas', '5342'),
('27394396', 'KEVIN@GMAIL.COM', '12345', 'KEVIN', 'SAAVEDRA', 'CENTRO', NULL, '04165026559'),
('27542563', 'luis27542563@gmail.com', '827ccb0eea8a706', 'LUIS', 'MEDINA', 'PALMIRA', 'LUIS', '04127505134'),
('27543563', 'LUIS27542563@GMAIL.COM', '12345', 'LUIS', 'MEDINA', 'PALMIRA', NULL, '04127505134'),
('27642150', 'JHOJANA@GMAIL.COM', '12345', 'JHOJANA', 'VIVAS', 'PUEBLO NUEVO', NULL, '04147460752'),
('29907627', 'ANNYRAMIREZLOVE2016@GMAIL.COM', '827ccb0eea8a706', 'ANNY', 'RAMIREZ', 'PALMAR', 'ANNY', '04128478544'),
('33333333', 'vivasasd@gmail.com', 'd41d8cd98f00b20', 'adasd', 'sdfasf', 'asdasd', 'lolo', '02584578965'),
('55555555', 'asda@gmail.com', '123456', 'asd', 'CO', 'LSDFSDAF', 'JOCO', '02584578965'),
('6', 'vsdfivadfs@gmail.com', 'e10adc3949ba59a', 'asdasd', 'asdfds', 'sdfadf', 'popopo', '324'),
('77777777', 'asdaasd@gmail.com', 'd41d8cd98f00b20', 'qwerty', 'uiop', 'LSDFSDAF', 'qwertyuiop', '02584578965'),
('9', 'vivasdfs@gmail.com', 'e10adc3949ba59a', 'asf', 'sdf', 'sdf', 'asd', '23'),
('94954654', 'asasddasdaasd@gmail.com', 'e10adc3949ba59a', 'asdasd', 'asdasd', 'asdsd', 'qwerty', '23423'),
('99954', 'assdfda@gmail.com', 'e10adc3949ba59a', 'sdf', 'asdf', 'asd', 'qaz', '02584578965'),
('9999999', 'vivas@gmail.com', '123456', 'asd', 'asd', 'LSDFSDAFsad', 'vivas', '02584578965');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_een`
--

CREATE TABLE `tmbtv_een` (
  `TMEEN_IEE` int(11) NOT NULL,
  `TMEEN_NOE` varchar(30) NOT NULL,
  `TMEEN_TEL` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_est`
--

CREATE TABLE `tmbtv_est` (
  `TMEST_IDE` int(11) NOT NULL,
  `TMPAI_IDP` int(11) NOT NULL,
  `TMEST_NOM` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_mun`
--

CREATE TABLE `tmbtv_mun` (
  `TMMUN_IDM` int(11) NOT NULL,
  `TMEST_IDE` int(11) NOT NULL,
  `TMMUN_NOM` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_pai`
--

CREATE TABLE `tmbtv_pai` (
  `TMPAI_IDP` int(11) NOT NULL,
  `TMPAI_NOM` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_prd`
--

CREATE TABLE `tmbtv_prd` (
  `TMPRD_IDP` int(11) NOT NULL,
  `TMPRO_IDP` int(11) NOT NULL,
  `TMPRD_SKU` varchar(9) NOT NULL,
  `TMPRD_NOM` varchar(30) NOT NULL,
  `TMPRD_PRE` varchar(6) NOT NULL,
  `TMPRD_PES` float(6,2) NOT NULL,
  `TMPRD_DIM` float(6,2) NOT NULL,
  `TMPRD_DES` varchar(50) NOT NULL,
  `TMPRD_IMA` varchar(80) NOT NULL,
  `TMPRD_CAT` varchar(20) NOT NULL,
  `TMPRD_FDC` date NOT NULL,
  `TMPRD_STO` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_pre`
--

CREATE TABLE `tmbtv_pre` (
  `TMPRE_IDP` int(11) NOT NULL,
  `TMPRE_PRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmbtv_pre`
--

INSERT INTO `tmbtv_pre` (`TMPRE_IDP`, `TMPRE_PRE`) VALUES
(1, '¿En qué ciudad naciste?'),
(2, '¿Lugar dónde fuiste al colegio?'),
(3, '¿Nombre de tu primera mascota?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmbtv_pro`
--

CREATE TABLE `tmbtv_pro` (
  `id` int(11) NOT NULL,
  `TMPRO_RIF` varchar(15) NOT NULL,
  `TMPRO_NOC` varchar(50) NOT NULL,
  `TMPRO_TEL` varchar(11) NOT NULL,
  `TMPRO_DID` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tmbtv_pro`
--

INSERT INTO `tmbtv_pro` (`id`, `TMPRO_RIF`, `TMPRO_NOC`, `TMPRO_TEL`, `TMPRO_DID`) VALUES
(15, 'V-27542563-B', 'COCACOLA', '4343535432', 'NEW YORK'),
(16, 'V-53245363-X', 'SAMSUNG', '364275723', 'EUU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttbtv_cop`
--

CREATE TABLE `ttbtv_cop` (
  `TTCOP_ICP` int(11) NOT NULL,
  `TMCLI_CED` varchar(8) NOT NULL,
  `TMPRD_IDP` int(11) NOT NULL,
  `TTCOP_TEX` varchar(150) NOT NULL,
  `TTCOP_FEH` date NOT NULL,
  `TTCOP_CON` varchar(150) NOT NULL,
  `TTCOP_FEC` date NOT NULL,
  `TTCOP_LEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttbtv_dep`
--

CREATE TABLE `ttbtv_dep` (
  `TTDEP_IDP` int(11) NOT NULL,
  `TTPED_IDP` int(11) NOT NULL,
  `TMPRD_IDP` int(11) NOT NULL,
  `TTDEP_PRE` float(6,2) NOT NULL,
  `TTDEP_CAN` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttbtv_pca`
--

CREATE TABLE `ttbtv_pca` (
  `TTPCA_IPC` int(11) NOT NULL,
  `TMPRD_IDP` int(11) NOT NULL,
  `TMCAT_IDC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttbtv_ped`
--

CREATE TABLE `ttbtv_ped` (
  `TTPED_IDP` int(11) NOT NULL,
  `TTCLI_CED` varchar(8) NOT NULL,
  `TTEEN_IEE` int(2) NOT NULL,
  `TTPED_MON` float(6,2) NOT NULL,
  `TTPED_DIE` varchar(70) NOT NULL,
  `TTPED_EMA` varchar(35) NOT NULL,
  `TTPED_FEC` date NOT NULL,
  `TTPED_EDE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttbtv_rsg`
--

CREATE TABLE `ttbtv_rsg` (
  `TTRSG_IDR` int(11) NOT NULL,
  `TMCLI_CED` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `TMPRE_IDP` int(11) NOT NULL,
  `TTRSG_RSP` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ttbtv_rsg`
--

INSERT INTO `ttbtv_rsg` (`TTRSG_IDR`, `TMCLI_CED`, `TMPRE_IDP`, `TTRSG_RSP`) VALUES
(2, '11374751', 1, 'BARINAS'),
(3, '11374751', 2, 'BARINAS'),
(4, '11374751', 3, 'PEPE'),
(13, '27394396', 1, 'SAN CRISTOBAL'),
(14, '27394396', 2, 'CENTRO'),
(15, '27394396', 3, 'YODI'),
(16, '27642150', 1, 'LA FRIA'),
(17, '27642150', 2, 'LA FRIA'),
(18, '27642150', 3, 'NACHO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `rol`) VALUES
(1, 'admin', 'Luis Medina', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(13, 'LUIS', 'LUIS MEDINA', '827ccb0eea8a706c4c34a16891f84e7b', 'personal'),
(14, 'ANNY', 'ANNY RAMIREZ', '827ccb0eea8a706c4c34a16891f84e7b', 'personal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bi_productos`
--
ALTER TABLE `bi_productos`
  ADD PRIMARY KEY (`id_bi`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `res_productos`
--
ALTER TABLE `res_productos`
  ADD PRIMARY KEY (`id_res`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `tmbtv_cat`
--
ALTER TABLE `tmbtv_cat`
  ADD PRIMARY KEY (`TMCAT_IDC`);

--
-- Indices de la tabla `tmbtv_cli`
--
ALTER TABLE `tmbtv_cli`
  ADD PRIMARY KEY (`ced_comp`);

--
-- Indices de la tabla `tmbtv_een`
--
ALTER TABLE `tmbtv_een`
  ADD PRIMARY KEY (`TMEEN_IEE`);

--
-- Indices de la tabla `tmbtv_est`
--
ALTER TABLE `tmbtv_est`
  ADD PRIMARY KEY (`TMEST_IDE`),
  ADD UNIQUE KEY `pais_estado_fk` (`TMPAI_IDP`) USING BTREE;

--
-- Indices de la tabla `tmbtv_mun`
--
ALTER TABLE `tmbtv_mun`
  ADD PRIMARY KEY (`TMMUN_IDM`),
  ADD UNIQUE KEY `estado_municipio_fk` (`TMEST_IDE`) USING BTREE;

--
-- Indices de la tabla `tmbtv_pai`
--
ALTER TABLE `tmbtv_pai`
  ADD PRIMARY KEY (`TMPAI_IDP`);

--
-- Indices de la tabla `tmbtv_prd`
--
ALTER TABLE `tmbtv_prd`
  ADD PRIMARY KEY (`TMPRD_IDP`),
  ADD UNIQUE KEY `proveedor_fk` (`TMPRO_IDP`) USING BTREE;

--
-- Indices de la tabla `tmbtv_pre`
--
ALTER TABLE `tmbtv_pre`
  ADD PRIMARY KEY (`TMPRE_IDP`);

--
-- Indices de la tabla `tmbtv_pro`
--
ALTER TABLE `tmbtv_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ttbtv_cop`
--
ALTER TABLE `ttbtv_cop`
  ADD PRIMARY KEY (`TTCOP_ICP`),
  ADD UNIQUE KEY `cedula_comentario_fk` (`TMCLI_CED`) USING BTREE,
  ADD UNIQUE KEY `producto_comentario_fk` (`TMPRD_IDP`) USING BTREE;

--
-- Indices de la tabla `ttbtv_dep`
--
ALTER TABLE `ttbtv_dep`
  ADD PRIMARY KEY (`TTDEP_IDP`),
  ADD UNIQUE KEY `pedido_detallepedido_fk` (`TTPED_IDP`) USING BTREE,
  ADD UNIQUE KEY `producto_detallepedido_fk` (`TMPRD_IDP`) USING BTREE;

--
-- Indices de la tabla `ttbtv_pca`
--
ALTER TABLE `ttbtv_pca`
  ADD PRIMARY KEY (`TTPCA_IPC`),
  ADD UNIQUE KEY `id_categoria_fk` (`TMCAT_IDC`) USING BTREE,
  ADD UNIQUE KEY `id_producto_fk` (`TMPRD_IDP`) USING BTREE;

--
-- Indices de la tabla `ttbtv_ped`
--
ALTER TABLE `ttbtv_ped`
  ADD PRIMARY KEY (`TTPED_IDP`),
  ADD UNIQUE KEY `cedula_pedido_fk` (`TTCLI_CED`) USING BTREE,
  ADD UNIQUE KEY `envios_pedido_fk` (`TTEEN_IEE`) USING BTREE;

--
-- Indices de la tabla `ttbtv_rsg`
--
ALTER TABLE `ttbtv_rsg`
  ADD PRIMARY KEY (`TTRSG_IDR`),
  ADD KEY `TMPRE_IDP` (`TMPRE_IDP`),
  ADD KEY `TMCLI_CED` (`TMCLI_CED`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bi_productos`
--
ALTER TABLE `bi_productos`
  MODIFY `id_bi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `res_productos`
--
ALTER TABLE `res_productos`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tmbtv_cat`
--
ALTER TABLE `tmbtv_cat`
  MODIFY `TMCAT_IDC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmbtv_een`
--
ALTER TABLE `tmbtv_een`
  MODIFY `TMEEN_IEE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmbtv_est`
--
ALTER TABLE `tmbtv_est`
  MODIFY `TMEST_IDE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmbtv_mun`
--
ALTER TABLE `tmbtv_mun`
  MODIFY `TMMUN_IDM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmbtv_pai`
--
ALTER TABLE `tmbtv_pai`
  MODIFY `TMPAI_IDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmbtv_prd`
--
ALTER TABLE `tmbtv_prd`
  MODIFY `TMPRD_IDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmbtv_pre`
--
ALTER TABLE `tmbtv_pre`
  MODIFY `TMPRE_IDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tmbtv_pro`
--
ALTER TABLE `tmbtv_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ttbtv_cop`
--
ALTER TABLE `ttbtv_cop`
  MODIFY `TTCOP_ICP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ttbtv_dep`
--
ALTER TABLE `ttbtv_dep`
  MODIFY `TTDEP_IDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ttbtv_pca`
--
ALTER TABLE `ttbtv_pca`
  MODIFY `TTPCA_IPC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ttbtv_ped`
--
ALTER TABLE `ttbtv_ped`
  MODIFY `TTPED_IDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ttbtv_rsg`
--
ALTER TABLE `ttbtv_rsg`
  MODIFY `TTRSG_IDR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
