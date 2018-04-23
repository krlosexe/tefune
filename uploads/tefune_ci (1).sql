-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2018 a las 21:47:44
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tefune_ci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id_comuna` int(11) NOT NULL,
  `comuna` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id_comuna`, `comuna`, `id_provincia`) VALUES
(1, 'Colina', 1),
(2, 'Lampa', 1),
(3, 'Til Til', 1),
(4, 'Pirque', 2),
(5, 'Puente Alto', 2),
(6, 'San José de Maipo', 2),
(7, 'Buin', 3),
(8, 'Calera de Tango', 3),
(9, 'Paine', 3),
(10, 'San Bernardo', 3),
(11, ' Alhué', 4),
(12, 'Curacaví', 4),
(13, 'María Pinto', 4),
(14, 'Melipilla', 4),
(15, 'San Pedro', 4),
(16, 'Cerrillos', 5),
(17, 'Cerro Navia', 5),
(18, 'Conchalí', 5),
(19, 'El Bosque', 5),
(20, 'Estación Central', 5),
(21, 'Huechuraba', 5),
(22, 'Independencia', 5),
(23, 'La Cisterna', 5),
(24, 'La Granja', 5),
(25, 'La Florida', 5),
(26, ' La Pintana', 5),
(27, 'La Reina', 5),
(28, 'Las Condes', 5),
(29, 'Lo Barnechea', 5),
(30, ' Lo Espejo', 5),
(31, 'Lo Prado', 5),
(32, 'Macul', 5),
(33, 'Maipú', 5),
(34, 'Ñuñoa', 5),
(35, 'Pedro Aguirre Cerda', 5),
(36, 'Peñalolén', 5),
(37, ' Providencia', 5),
(38, 'Pudahuel', 5),
(39, 'Quilicura', 5),
(40, 'Quinta Normal', 5),
(41, 'Recoleta', 5),
(42, 'Renca', 5),
(43, 'San Miguel', 5),
(44, 'San Joaquín', 5),
(45, 'San Ramón', 5),
(46, 'Santiago', 5),
(47, 'Vitacura', 5),
(48, 'El Monte', 6),
(49, 'Isla de Maipo', 6),
(50, 'Padre Hurtado', 6),
(51, 'Peñaflor', 6),
(52, 'Talagante', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_funeado` int(11) NOT NULL,
  `documento` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funeado`
--

CREATE TABLE `funeado` (
  `id` int(11) NOT NULL,
  `tipo_identidad` int(11) NOT NULL,
  `identidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_nombre` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_nombre` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_apellido` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_apellido` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` int(65) NOT NULL,
  `telefono` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `celular` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `capital` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `provincia`, `capital`) VALUES
(1, 'Chacabuco', 'Colina'),
(2, 'Cordillera', 'Puente Alto'),
(3, 'Maipo', 'San Bernardo'),
(4, 'Melipilla', 'Melipilla'),
(5, 'Santiago', 'Santiago'),
(6, 'Talagante', 'Talagante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_fune` int(11) NOT NULL,
  `id_funeado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_fune`
--

CREATE TABLE `tipo_fune` (
  `id_fune` int(11) NOT NULL,
  `fune` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_fune`
--

INSERT INTO `tipo_fune` (`id_fune`, `fune`) VALUES
(1, 'Deudor Arriendo Habitacional'),
(2, 'Deudor Arriendo Comercial'),
(3, 'Deudor Automotriz'),
(4, 'Deudor Privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_document`
--

CREATE TABLE `type_document` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `type_document`
--

INSERT INTO `type_document` (`id`, `nombre`) VALUES
(2, 'Pasaporte'),
(1, 'RUT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `loginUsers` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `passUsers` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_identidad` int(11) NOT NULL,
  `identidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_nombre` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_nombre` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_apellido` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_apellido` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `celular` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fotos` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `loginUsers`, `passUsers`, `id_identidad`, `identidad`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `email`, `telefono`, `celular`, `fecha_nac`, `id_provincia`, `id_comuna`, `direccion`, `fotos`, `estatus`) VALUES
(2, 'krlosexe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '23559081', 'Carlos', 'Javier', 'Cardenas', 'Albarran', 'cardenascarlos18@gmail.com', '02735330193', '04145498651', '1994-03-03', 0, 0, '', 'krlosexe.jpg', 0),
(3, 'krlosexes', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', 'carddenascarlos18@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 0),
(4, 'juan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', 'yot@asd.asd', '', '', '0000-00-00', 0, 0, '', '', 0),
(5, 'meli', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', 'yormelishmendez@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 0),
(6, 'melis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', 'syormelishmendez@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 0),
(7, 'blanca', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', 'blanca@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funeado`
--
ALTER TABLE `funeado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_fune`
--
ALTER TABLE `tipo_fune`
  ADD PRIMARY KEY (`id_fune`);

--
-- Indices de la tabla `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loginUsers` (`loginUsers`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `funeado`
--
ALTER TABLE `funeado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_fune`
--
ALTER TABLE `tipo_fune`
  MODIFY `id_fune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `type_document`
--
ALTER TABLE `type_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
