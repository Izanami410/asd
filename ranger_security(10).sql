-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 04:39:07
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ranger_security`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_art` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nomar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `detalle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_prove` int(11) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_art`, `foto`, `nomar`, `stock`, `detalle`, `id_cat`, `id_prove`, `fere`) VALUES
(1, 'stock.png', 'ejemplo', '50', 'ejemplo2', 1, 1, '2021-11-27 03:14:01'),
(2, 'stock.png', 'juas', '37', 'esto es un detalle de articulof', 1, 1, '2021-11-26 19:41:37'),
(3, 'stock.png', 'chaleko', '39', ' esto es un chaleko\r\n', 1, 1, '2021-11-26 19:41:37'),
(5, 'stock.png', 'articulo1', '38', ' detalle de articulo1', 4, 4, '2021-11-26 19:41:37'),
(6, 'stock.png', 'articulo2', '27', ' dsd', 1, 4, '2021-11-26 19:41:37'),
(7, 'stock.png', 'articulo3', '25', ' dfdfdf', 1, 4, '2021-11-26 19:41:37'),
(8, 'stock.png', 'articulo5', '65', 'fdsfsdfsf', 4, 6, '2021-11-26 19:41:37'),
(9, 'stock.png', 'ddfsdf', '42', ' fdfdf', 1, 4, '2021-11-26 09:59:06'),
(11, 'stock.png', 'ejemplo012', '42', ' sadsd', 1, 6, '2021-11-26 09:59:06'),
(12, 'stock.png', 'mcmmcmc', '42', ' dsfsdf', 7, 1, '2021-11-26 09:59:06'),
(13, 'stock.png', 'otro ejemplo02', '42', ' sdfdf', 4, 4, '2021-11-26 09:59:06'),
(14, 'stock.png', 'lllll', '42', 'jjj ', 4, 1, '2021-11-26 09:59:06'),
(15, 'stock.png', 'nnnanana', '37', ' mssns', 1, 1, '2021-11-26 21:13:50'),
(16, 'stock.png', 'nnanana', '37', 'ddsd ', 1, 6, '2021-11-26 19:45:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nomcat` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nomcat`, `descripcion`, `fecha`) VALUES
(1, 'Indumentaria', 'Ropa de indumentaria', '2021-10-25 19:21:40'),
(4, 'Accesorios', 'Accesorios para oficina', '2021-10-11 19:53:58'),
(7, 'cate2', 'detalle cate22', '2021-11-18 02:42:09'),
(8, 'saasdc', 'dcdcd', '2021-11-25 18:33:24'),
(9, 'vvvv', 'vvvvv', '2021-11-26 01:50:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_prove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `estado`, `id_prove`) VALUES
(1, '2021-11-26', '1', 6),
(2, '2021-11-26', '1', 6),
(3, '2021-11-26', '1', 6),
(4, '2021-11-26', '1', 8),
(5, '2021-11-26', '1', 1),
(6, '2021-11-26', '1', 6),
(7, '2021-11-26', '1', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `id_art` int(11) NOT NULL,
  `id_tra` int(11) NOT NULL,
  `cantid` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `fechare` date NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `id_art`, `id_tra`, `cantid`, `fechare`, `estado`) VALUES
(1, 1, 1, '5', '2021-11-08', '1'),
(2, 2, 3, '5', '2021-11-09', '1'),
(3, 2, 1, '3', '2021-11-10', '1'),
(4, 1, 1, '3', '2021-11-17', '1'),
(5, 1, 1, '4', '2021-11-17', '1'),
(6, 1, 1, '5', '2021-11-17', '1'),
(7, 1, 1, '3', '2021-11-17', '1'),
(8, 3, 1, '2', '2021-11-17', '1'),
(9, 3, 1, '2', '2021-11-17', '1'),
(10, 3, 3, '3', '2021-11-17', '1'),
(11, 8, 5, '35', '2021-11-18', '1'),
(12, 8, 1, '34', '2021-11-18', '1'),
(14, 2, 1, '7', '2021-11-26', '1'),
(15, 2, 5, '5', '2021-11-26', '1'),
(16, 1, 1, '8', '2021-11-26', '1'),
(17, 1, 5, '98', '2021-11-26', '1'),
(18, 16, 3, '9', '2021-11-26', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

CREATE TABLE `productos_comprados` (
  `id_pcomp` int(11) NOT NULL,
  `id_art` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_comprados`
--

INSERT INTO `productos_comprados` (`id_pcomp`, `id_art`, `canti`, `id_compra`) VALUES
(1, 2, 20, 1),
(2, 3, 20, 1),
(3, 5, 20, 1),
(4, 6, 20, 1),
(5, 7, 20, 1),
(6, 8, 20, 1),
(7, 16, 20, 2),
(8, 1, 2, 3),
(9, 2, 4, 3),
(10, 3, 3, 3),
(11, 5, 3, 3),
(12, 6, 4, 3),
(13, 7, 3, 3),
(14, 8, 3, 3),
(15, 1, 1, 4),
(16, 15, 12, 5),
(17, 16, 20, 5),
(18, 15, 3, 6),
(19, 1, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prove` int(11) NOT NULL,
  `ruc` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `telef` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `direcci` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prove`, `ruc`, `nombre`, `correo`, `telef`, `direcci`, `ciudad`, `estado`, `fecre`) VALUES
(1, '21314214', 'Adrian', 'easda@gmail.com', '952113393', 'Barrio staff', 'adadsad', '1', '2021-10-13 15:07:39'),
(4, '134325525', 'lolito', 'Aasdafs@gmail.com', '233523432', 'asfafawads', 'elalto', '1', '2021-10-13 15:33:02'),
(6, '10985764332345', 'Proveedor Casimiro Ciero', 'casimiro@gmail.com', '999999999', 'Castilla', 'Piura ', '', '2021-11-18 01:00:21'),
(8, '43454554333334', 'dsadad', 'sadad@gmail.com', '976565656', 'dsffdf', 'ssdfsf', '1', '2021-11-25 18:30:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id_tra` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dni` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id_tra`, `nombre`, `apellido`, `dni`, `correo`, `telefono`, `fecha`) VALUES
(1, 'Adrian Jafet', 'Lujan Briceño', '72166690', 'adri0373@gmail.com', '952113393', '2021-09-27 19:27:39'),
(3, 'Alexis', 'Lopez', '72163548', 'ajdgtr@gmail.com', '999876878', '2021-10-25 20:15:29'),
(5, 'Maria Lourdes', 'Saavedra', '78676768', 'marialourde@gmail.com', '988888888', '2021-11-18 00:44:23'),
(6, 'jose manuel', 'peres perales', '75758585', 'jose@gmail.com', '999875877', '2021-11-18 06:36:35'),
(7, 'dssdsd', 'sdsdsd', '33333333', 'dsdsd@gmail.com', '999999999', '2021-11-25 13:19:41'),
(8, 'xxxxx', 'ddsd', '44444444', 'dfdf@gmail.com', '944444444', '2021-11-25 13:21:34'),
(9, 'vxcvxvxcv', 'retrtertert', '76455445', 'dsfdfsf@gmail.com', '986666666', '2021-11-25 17:42:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `privilegio` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `contra`, `estado`, `privilegio`, `fecha`) VALUES
(1, 'Un programador mas', 'unprogramador', 'adri0373@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '2021-11-27 03:33:50'),
(2, 'Griselda ', 'Gris123', 'Griselda@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1', '2', '2021-11-10 09:15:29'),
(3, 'Karim', 'Karim123', 'Karim@gmail.com', '4cac352375ecefd5208a1127d6553b17', '1', '3', '2021-09-17 18:08:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `id_art` (`id_art`),
  ADD KEY `id_tra` (`id_tra`);

--
-- Indices de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD PRIMARY KEY (`id_pcomp`),
  ADD KEY `id_art` (`id_art`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prove`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id_tra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  MODIFY `id_pcomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id_tra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`id_prove`) REFERENCES `proveedor` (`id_prove`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_prove`) REFERENCES `proveedor` (`id_prove`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_art`) REFERENCES `articulo` (`id_art`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_tra`) REFERENCES `trabajador` (`id_tra`);

--
-- Filtros para la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD CONSTRAINT `productos_comprados_ibfk_1` FOREIGN KEY (`id_art`) REFERENCES `articulo` (`id_art`),
  ADD CONSTRAINT `productos_comprados_ibfk_3` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
