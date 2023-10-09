-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 05:39:33
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sabor_peruano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `usuario`, `contraseña`) VALUES
(1, 'JFV', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` int(11) NOT NULL,
  `plato_idplato` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pedidos_idpedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_detalle`, `plato_idplato`, `cantidad`, `pedidos_idpedidos`) VALUES
(18, 1, 4, 143),
(19, 2, 5, 143),
(20, 1, 3, 144),
(21, 3, 3, 144),
(22, 1, 3, 145),
(23, 2, 1, 145),
(24, 3, -1, 145),
(25, 1, 4, 146),
(26, 2, 4, 146),
(27, 1, 2, 147),
(28, 1, 3, 149),
(29, 4, 3, 149),
(31, 1, 3, 151),
(32, 3, 3, 151),
(33, 2, 1, 151),
(34, 2, 3, 152),
(35, 4, 2, 152),
(36, 1, 3, 153),
(38, 1, 2, 154),
(39, 2, 2, 154),
(40, 3, 1, 154),
(41, 1, 3, 155),
(42, 1, 3, 157),
(43, 2, 1, 157),
(44, 1, 2, 158),
(45, 3, 1, 158),
(46, 1, 2, 159),
(48, 1, 4, 161),
(51, 1, 5, 163),
(52, 2, 2, 165),
(53, 2, 1, 166),
(54, 3, 3, 166),
(55, 1, 2, 167),
(56, 1, 3, 168),
(58, 1, 2, 171),
(59, 1, 1, 172),
(60, 1, 2, 173),
(64, 1, 2, 184),
(65, 1, 3, 185),
(66, 1, 3, 186),
(67, 1, 3, 187),
(68, 1, 4, 188),
(69, 1, 4, 190),
(70, 1, 4, 191),
(71, 1, 4, 192),
(72, 3, 2, 192),
(73, 1, 5, 193),
(74, 3, 3, 193),
(75, 1, 4, 195),
(76, 3, 2, 195),
(77, 1, 4, 196),
(78, 2, 2, 197),
(79, 1, 4, 198),
(80, 1, 4, 199),
(81, 1, 1, 200),
(82, 3, 1, 201),
(83, 1, 1, 202),
(84, 1, 2, 203),
(85, 1, 1, 204),
(87, 1, 2, 206),
(89, 1, 1, 212),
(90, 1, 1, 213),
(91, 4, 1, 213),
(92, 1, 1, 214),
(93, 1, 1, 220),
(94, 1, 2, 221),
(95, 1, 5, 233),
(117, 1, 2, 264),
(118, 1, 4, 264),
(119, 1, 2, 265),
(127, 1, 1, 270),
(129, 1, 1, 271),
(130, 1, 1, 272),
(131, 2, 1, 273),
(132, 1, 1, 274),
(133, 1, 3, 275),
(134, 2, 1, 276),
(135, 1, 1, 277),
(136, 2, 1, 278),
(137, 1, 1, 279),
(138, 1, 1, 280),
(139, 1, 1, 281),
(140, 1, 1, 282),
(141, 1, 2, 283),
(142, 2, 1, 284),
(143, 2, 1, 285),
(144, 3, 1, 286),
(145, 1, 3, 288),
(146, 2, 1, 289),
(148, 1, 5, 292),
(150, 1, 4, 294),
(151, 1, 3, 298),
(153, 1, 2, 301),
(154, 2, 2, 302),
(155, 1, 5, 304),
(156, 1, 1, 305),
(157, 1, 2, 306),
(158, 1, 3, 307),
(159, 1, 10, 308);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menú`
--

CREATE TABLE `menú` (
  `idmenú` int(11) NOT NULL,
  `nombreMenú` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `menú`
--

INSERT INTO `menú` (`idmenú`, `nombreMenú`) VALUES
(1, 'Entrada'),
(2, 'Sopas y Cremas'),
(3, 'Plato Principales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`idmesa`, `nombre`, `capacidad`, `estado`) VALUES
(1, 'UNO', 5, 0),
(2, 'DOS', 4, 0),
(3, 'TRES', 2, 0),
(4, 'CUATRO', 4, 0),
(5, 'CINCO', 6, 0),
(6, 'SEIS', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mozos`
--

CREATE TABLE `mozos` (
  `id_mozos` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `local_id_local` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mozos`
--

INSERT INTO `mozos` (`id_mozos`, `nombre`, `paterno`, `materno`, `usuario`, `contraseña`, `dni`, `telefono`, `correo`, `local_id_local`) VALUES
(1, 'Juan', 'Figueroa', 'Vela', 'JuanFV', '123456', 73090035, 998187600, 'jfvela_2012@hotmail.com', 1),
(2, 'Josue', 'Carlo', 'Alverto', 'Josue', '785692', 88888888, 555555555, 'grsgdrgdf', 1),
(18, 'Juan', 'Pérez', 'López', 'juanperez', 'contraseña1', 12345678, 987654321, 'juanperez@example.com', 1),
(19, 'María', 'Gómez', 'Rodríguez', 'mariagomez', 'contraseña2', 87654321, 123456789, 'mariagomez@example.com', 1),
(20, 'Carlos', 'Martínez', 'Sánchez', 'carlosmartinez', 'contraseña3', 13579246, 987654123, 'carlosmartinez@example.com', 1),
(21, 'Ana', 'López', 'Gómez', 'analopez', 'contraseña4', 98765432, 123456789, 'analopez@example.com', 1),
(22, 'Luis', 'Sánchez', 'Pérez', 'luissanchez', 'contraseña5', 54321678, 987123456, 'luissanchez@example.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `mozos_id_mozos` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `mesa_idmesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `mozos_id_mozos`, `fecha`, `estado`, `mesa_idmesa`) VALUES
(143, 1, '2023-10-05 03:47:03', 0, 2),
(144, 1, '2023-10-05 04:07:52', 0, 2),
(145, 1, '2023-10-05 04:16:21', 0, 4),
(146, 1, '2023-10-05 04:21:08', 0, 3),
(147, 1, '2023-10-05 04:24:32', 0, 2),
(149, 1, '2023-10-05 04:25:13', 0, 3),
(150, 1, '2023-10-05 04:35:32', 0, 5),
(151, 1, '2023-10-05 04:37:01', 0, 3),
(152, 1, '2023-10-05 04:39:12', 0, 3),
(153, 1, '2023-10-05 04:41:19', 0, 4),
(154, 1, '2023-10-05 04:45:47', 0, 2),
(155, 1, '2023-10-05 04:48:06', 0, 3),
(156, 1, '2023-10-05 21:45:56', 0, 3),
(157, 1, '2023-10-05 14:59:02', 0, 4),
(158, 1, '2023-10-05 15:02:41', 0, 4),
(159, 1, '2023-10-05 15:28:45', 0, 4),
(160, 1, '2023-10-05 15:33:53', 0, 2),
(161, 1, '2023-10-05 15:34:39', 0, 5),
(163, 1, '2023-10-05 22:39:39', 0, 4),
(165, 1, '2023-10-05 22:55:41', 0, 4),
(166, 1, '2023-10-05 22:59:46', 0, 4),
(167, 1, '2023-10-05 23:01:53', 0, 2),
(168, 1, '2023-10-05 23:12:22', 0, 4),
(169, 1, '2023-10-05 23:14:25', 0, 2),
(171, 1, '2023-10-05 23:17:10', 0, 2),
(172, 1, '2023-10-05 23:20:50', 0, 1),
(173, 1, '2023-10-05 23:24:28', 0, 4),
(181, 1, '2023-10-06 00:19:22', 0, 4),
(182, 1, '2023-10-06 00:19:45', 0, 2),
(183, 1, '2023-10-06 00:20:32', 0, 4),
(184, 1, '2023-10-06 00:25:01', 0, 2),
(185, 1, '2023-10-06 00:27:55', 1, 4),
(186, 1, '2023-10-06 00:32:30', 0, 4),
(187, 1, '2023-10-06 00:33:00', 0, 5),
(188, 1, '2023-10-06 00:34:37', 0, 4),
(190, 1, '2023-10-06 00:40:25', 0, 2),
(191, 1, '2023-10-06 00:42:35', 0, 4),
(192, 1, '2023-10-06 00:44:26', 0, 1),
(193, 1, '2023-10-06 00:45:51', 0, 4),
(195, 1, '2023-10-06 00:49:05', 0, 2),
(196, 1, '2023-10-06 00:50:56', 0, 4),
(197, 1, '2023-10-06 00:54:32', 0, 5),
(198, 1, '2023-10-06 00:58:35', 0, 5),
(199, 1, '2023-10-06 01:00:20', 0, 2),
(200, 1, '2023-10-06 01:01:36', 0, 4),
(201, 1, '2023-10-06 01:07:03', 0, 4),
(202, 1, '2023-10-06 01:08:00', 0, 2),
(203, 1, '2023-10-06 01:13:07', 0, 4),
(204, 1, '2023-10-06 01:15:03', 0, 4),
(206, 1, '2023-10-06 01:22:38', 0, 2),
(207, 1, '2023-10-06 01:23:49', 0, 4),
(209, 1, '2023-10-06 01:28:09', 0, 2),
(210, 1, '2023-10-06 01:28:54', 0, 2),
(211, 1, '2023-10-06 01:29:35', 0, 5),
(212, 1, '2023-10-06 01:33:38', 0, 2),
(213, 1, '2023-10-06 01:35:24', 0, 4),
(214, 1, '2023-10-06 01:41:12', 0, 4),
(215, 1, '2023-10-06 01:55:09', 0, 4),
(220, 1, '2023-10-06 01:55:30', 0, 2),
(221, 1, '2023-10-06 12:13:29', 0, 1),
(224, 1, '2023-10-06 12:20:51', 0, 1),
(226, 1, '2023-10-06 12:21:39', 0, 4),
(227, 1, '2023-10-06 12:22:12', 0, 2),
(229, 1, '2023-10-06 12:22:32', 0, 2),
(231, 1, '2023-10-06 12:23:39', 0, 5),
(232, 1, '2023-10-06 12:25:52', 0, 4),
(233, 1, '2023-10-06 12:26:48', 0, 4),
(234, 1, '2023-10-06 12:35:15', 0, 2),
(235, 1, '2023-10-06 12:37:26', 0, 4),
(236, 1, '2023-10-06 12:37:55', 0, 5),
(237, 1, '2023-10-06 12:38:05', 0, 4),
(241, 1, '2023-10-06 12:40:48', 0, 4),
(246, 1, '2023-10-06 12:50:30', 0, 4),
(247, 1, '2023-10-06 12:51:12', 0, 4),
(249, 1, '2023-10-06 12:53:40', 0, 2),
(250, 1, '2023-10-06 12:58:33', 0, 4),
(252, 1, '2023-10-06 12:59:57', 0, 4),
(255, 1, '2023-10-06 13:07:51', 0, 1),
(256, 1, '2023-10-06 13:08:24', 0, 2),
(258, 1, '2023-10-06 13:10:24', 0, 2),
(263, 1, '2023-10-06 13:21:33', 0, 5),
(264, 1, '2023-10-06 13:22:55', 0, 2),
(265, 1, '2023-10-06 13:24:06', 0, 5),
(267, 1, '2023-10-06 13:26:34', 0, 5),
(269, 1, '2023-10-06 13:32:52', 0, 5),
(270, 1, '2023-10-06 13:41:35', 0, 4),
(271, 1, '2023-10-06 13:46:45', 0, 4),
(272, 1, '2023-10-06 13:48:05', 0, 6),
(273, 1, '2023-10-06 13:49:11', 0, 5),
(274, 1, '2023-10-06 13:51:37', 0, 4),
(275, 1, '2023-10-06 13:54:44', 0, 4),
(276, 1, '2023-10-06 13:55:37', 0, 4),
(277, 1, '2023-10-06 13:56:12', 0, 5),
(278, 1, '2023-10-06 13:58:16', 0, 2),
(279, 1, '2023-10-06 14:42:51', 0, 4),
(280, 1, '2023-10-06 14:43:36', 0, 5),
(281, 1, '2023-10-06 14:46:35', 0, 4),
(282, 1, '2023-10-06 14:48:55', 0, 4),
(283, 1, '2023-10-06 14:49:08', 0, 5),
(284, 1, '2023-10-06 14:52:31', 0, 6),
(285, 1, '2023-10-06 14:55:33', 0, 4),
(286, 1, '2023-10-06 14:56:39', 0, 4),
(288, 1, '2023-10-06 14:59:40', 0, 4),
(289, 1, '2023-10-06 15:00:44', 0, 2),
(292, 1, '2023-10-06 15:05:06', 0, 1),
(294, 1, '2023-10-06 19:17:57', 0, 3),
(295, 1, '2023-10-06 22:33:42', 0, 3),
(297, 1, '2023-10-06 22:36:25', 0, 4),
(298, 1, '2023-10-08 00:20:47', 0, 5),
(300, 1, '2023-10-08 00:27:47', 0, 2),
(301, 1, '2023-10-08 00:38:27', 0, 5),
(302, 1, '2023-10-08 00:39:45', 0, 5),
(304, 1, '2023-10-08 00:41:00', 0, 5),
(305, 1, '2023-10-08 00:42:43', 0, 4),
(306, 1, '2023-10-08 00:43:36', 0, 5),
(307, 1, '2023-10-08 00:44:41', 0, 5),
(308, 1, '2023-10-08 00:45:16', 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `idplato` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripción` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `menú_idmenú` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`idplato`, `nombre`, `descripción`, `precio`, `imagen`, `menú_idmenú`) VALUES
(1, 'ceviche', 'ahhhaegsrg', '12', 'https://blog.plazavea.com.pe/wp-content/uploads/2022/01/Ceviche-1200x675.jpg', 1),
(2, 'tirado', 'd', '14', 'https://thumbs.dreamstime.com/b/ceviche-de-la-lubina-con-la-calabaza-el-cilantro-el-ma%C3%ADz-y-la-cebolla-entonados-91935823.jpg', 1),
(3, 'causa de mariscos', 'fv', '19', 'https://kasani.pe/wp-content/uploads/2020/10/CAUSA-DE-LANGOSTINOS-500x370.jpg', 1),
(4, 'cocktail de mariscos', 'dv', '15', 'https://i.blogs.es/c00f0e/coctel-de-marisco/840_560.jpg', 1),
(5, 'chupe de mariscos', 't', '16', 'https://cdn0.recetasgratis.net/es/posts/4/4/1/chupe_de_mariscos_22144_orig.jpg', 2),
(6, 'parihuela', 'tddff', '14', 'https://www.recetasderechupete.com/wp-content/uploads/2019/01/sopa-peruana.jpg', 2),
(8, 'arroz con mariscos', 'bza', '12', 'https://images-gmi-pmc.edge-generalmills.com/8148f1fc-dc59-4447-a3b3-81f22cffb8b7.jpg', 3),
(9, 'pescado a lo macho', 'bs', '13', 'https://www.comedera.com/wp-content/uploads/2021/11/pescado-a-lo-macho.jpg', 3),
(10, 'jalea de mariscos', 'bdfb', '11', 'https://perudelights.com/wp-content/uploads/2013/02/P1012606.jpg', 3),
(11, 'langostinos a la parrilla', 'sdbdb', '10', 'https://i.blogs.es/0d3b78/gambas-parrilla/450_1000.jpg', 3),
(12, 'pulpo al olivo', 'sddgege', '12', 'https://www.gourmet.cl/wp-content/uploads/2017/03/30-507x458.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resturante`
--

CREATE TABLE `resturante` (
  `id_local` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `administrador_id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `resturante`
--

INSERT INTO `resturante` (`id_local`, `nombre`, `direccion`, `telefono`, `administrador_id_admin`) VALUES
(1, 'Sabor Peruano', 'mz 22', 15963254, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `pedidos_idpedidos` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `monto_total` double NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `pedidos_idpedidos`, `fecha`, `monto_total`, `estado`) VALUES
(52, 305, '2023-10-08 00:42:51', 12, 1),
(53, 306, '2023-10-08 00:43:47', 24, 1),
(54, 307, '2023-10-08 00:44:48', 36, 1),
(55, 308, '2023-10-08 00:45:22', 120, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_detalle_pedido_pedidos1_idx` (`pedidos_idpedidos`),
  ADD KEY `fk_detalle_pedido_plato1_idx` (`plato_idplato`);

--
-- Indices de la tabla `menú`
--
ALTER TABLE `menú`
  ADD PRIMARY KEY (`idmenú`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`);

--
-- Indices de la tabla `mozos`
--
ALTER TABLE `mozos`
  ADD PRIMARY KEY (`id_mozos`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_mozos_local1_idx` (`local_id_local`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`),
  ADD KEY `fk_pedidos_mozos1_idx` (`mozos_id_mozos`),
  ADD KEY `fk_pedidos_mesa1_idx` (`mesa_idmesa`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`idplato`),
  ADD KEY `fk_plato_menú1_idx` (`menú_idmenú`);

--
-- Indices de la tabla `resturante`
--
ALTER TABLE `resturante`
  ADD PRIMARY KEY (`id_local`),
  ADD KEY `fk_local_administrador1_idx` (`administrador_id_admin`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `fk_ventas_pedidos1_idx` (`pedidos_idpedidos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `menú`
--
ALTER TABLE `menú`
  MODIFY `idmenú` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mozos`
--
ALTER TABLE `mozos`
  MODIFY `id_mozos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idplato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `resturante`
--
ALTER TABLE `resturante`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_detalle_pedido_pedidos1` FOREIGN KEY (`pedidos_idpedidos`) REFERENCES `pedidos` (`idpedidos`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_pedido_plato1` FOREIGN KEY (`plato_idplato`) REFERENCES `plato` (`idplato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mozos`
--
ALTER TABLE `mozos`
  ADD CONSTRAINT `fk_mozos_local1` FOREIGN KEY (`local_id_local`) REFERENCES `resturante` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_mesa1` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_mozos1` FOREIGN KEY (`mozos_id_mozos`) REFERENCES `mozos` (`id_mozos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `fk_plato_menú1` FOREIGN KEY (`menú_idmenú`) REFERENCES `menú` (`idmenú`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resturante`
--
ALTER TABLE `resturante`
  ADD CONSTRAINT `fk_local_administrador1` FOREIGN KEY (`administrador_id_admin`) REFERENCES `administrador` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_pedidos1` FOREIGN KEY (`pedidos_idpedidos`) REFERENCES `pedidos` (`idpedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
