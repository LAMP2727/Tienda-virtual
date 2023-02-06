-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2023 a las 22:16:25
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_productos` (IN `aumentar` INT, IN `iduser` INT, IN `precios` INT)  NO SQL BEGIN
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_productos_cancelado` (IN `aumentar` INT, IN `iduser` INT)  NO SQL BEGIN
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
(11, 6, 41, '2023-02-03 21:23:05'),
(12, 5, 918, '2023-02-04 12:36:12'),
(13, 16, 241, '2023-02-05 16:48:26');

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
(9, 'MUEBLESS'),
(11, 'PENDRIVE');

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
(13, 0, 5, '2023-01-24 15:10:50', '2023-01-24 15:10:50', 1),
(14, 27542563, 20, '2023-02-04 16:36:12', '2023-02-04 16:36:12', 3),
(15, 27542563, 111, '2023-02-05 20:48:26', '2023-02-05 20:48:26', 1);

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
(1, 1, 16, 1),
(2, 1, 6, 1),
(3, 1, 5, 1),
(4, 2, 5, 1),
(5, 3, 16, 1),
(6, 4, 16, 7),
(7, 5, 6, 1),
(8, 5, 5, 1),
(9, 14, 5, 1),
(10, 15, 16, 1);

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
(5, 'Vino', 'Ninguna', '28.00', '20.00', 918, '20211212082421.jpg', 2, 1, '601.63'),
(6, 'Coca cola', '1.5 ml', '5.00', '5.00', 41, '20211212082628.jpg', 2, 0, '0.00'),
(16, 'asdfasdf', 'asdfsdaf', '123.00', '111.00', 241, '20230204012822.jpg', 2, 15, '99.75');

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
('27542563', 'luis27542563@gmail.com', '827ccb0eea8a706', 'LUIS', 'MEDINA', 'PALMIRA', 'LUIS', '04127505134'),
('44444444', 'vivafsdfs@gmail.com', 'e10adc3949ba59a', 'RGSDG', 'SDFGDFG', 'sdfgsdgf', 'poiuy', '34534534534'),
('55555555', 'asda@gmail.com', 'e10adc3949ba59a', 'asd', 'CO', 'LSDFSDAF', 'qwerty', '02584578965'),
('88888888', 'gfjghjgfhjdfs@gmail.com', 'e10adc3949ba59a', 'TRUTU', 'TYRUTYU', 'SDGFDFSGDFGDFG', 'MNBV', '65756475756');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `rol`) VALUES
(1, 'ADMIN', 'ADMIN', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'qwerty', 'asd CO', 'e10adc3949ba59abbe56e057f20f883e', 'personal'),
(3, 'poiuy', 'RGSDG SDFGDFG', 'e10adc3949ba59abbe56e057f20f883e', 'personal'),
(4, 'MNBV', 'TRUTU TYRUTYU', 'e10adc3949ba59abbe56e057f20f883e', 'personal'),
(5, 'LUIS', 'LUIS MEDINA', '827ccb0eea8a706c4c34a16891f84e7b', 'personal');

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
  MODIFY `id_bi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
