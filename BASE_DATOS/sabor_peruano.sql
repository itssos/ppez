-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2023 a las 05:45:50
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
(1, 'JFV', '125');

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
(1, 'UNO', 100, 0);

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
  `local_id_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mozos`
--

INSERT INTO `mozos` (`id_mozos`, `nombre`, `paterno`, `materno`, `usuario`, `contraseña`, `dni`, `telefono`, `correo`, `local_id_local`) VALUES
(1, 'Juan', 'Figueroa', 'Vela', 'JuanFV', '123456', 73090035, 998187600, 'jfvela_2012@hotmail.com', 1),
(2, 'Josue', 'Carlo', 'Alverto', 'Josue', '785692', 88888888, 555555555, 'grsgdrgdf', 1);

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
(1, 'ceviche', 'a', '12', 'https://blog.plazavea.com.pe/wp-content/uploads/2022/01/Ceviche-1200x675.jpg', 1),
(2, 'tirado', 'd', '14', '', 1),
(3, 'causa de mariscos', 'fv', '19', '', 1),
(4, 'cocktail de mariscos', 'dv', '15', '', 1),
(5, 'chupe de mariscos', 't', '16', '', 2),
(6, 'parihuela', 'tddff', '14', '', 2),
(7, 'sudado de pescado', 'dfbd', '12', '', 2),
(8, 'arroz con mariscos', 'bza', '12', '', 3),
(9, 'pescado a lo macho', 'bs', '13', '', 3),
(10, 'jalea de mariscos', 'bdfb', '11', '', 3),
(11, 'langostinos a la parrilla', 'sdbdb', '10', '', 3),
(12, 'pulpo al olivo', 'sddgege', '12', '', 3),
(16, 'Juanes', 'producto 100% selvatico', '8', '', 3);

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
  `fecha` datetime NOT NULL,
  `monto_total` double NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menú`
--
ALTER TABLE `menú`
  MODIFY `idmenú` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mozos`
--
ALTER TABLE `mozos`
  MODIFY `id_mozos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idplato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `resturante`
--
ALTER TABLE `resturante`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_detalle_pedido_pedidos1` FOREIGN KEY (`pedidos_idpedidos`) REFERENCES `pedidos` (`idpedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
