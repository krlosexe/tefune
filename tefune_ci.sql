-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2018 a las 04:12:07
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `telefono` varchar(35) NOT NULL,
  `correo` varchar(65) NOT NULL,
  `motivo` varchar(120) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_tipo_denuncia` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL,
  `id_funeado` int(11) NOT NULL,
  `documento` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `id_tipo_denuncia`, `id_denuncia`, `id_funeado`, `documento`) VALUES
(1, 1, 2, 11, 'naya.pdf'),
(3, 0, 0, 11, 'Certificado_origen_tx.pdf'),
(4, 0, 0, 1, 'prn-prueva1.pdf'),
(5, 1, 2, 0, 'Doc1.pdf'),
(6, 1, 3, 0, 'Doc11.pdf'),
(7, 2, 1, 0, 'Doc12.pdf'),
(8, 3, 1, 0, 'Doc13.pdf'),
(9, 3, 2, 0, 'Doc14.pdf'),
(10, 4, 3, 0, 'Doc15.pdf'),
(11, 5, 1, 0, 'Doc16.pdf'),
(12, 6, 1, 0, 'Doc17.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `id_tipo_denuncia` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL,
  `id_funeado` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `id_tipo_denuncia`, `id_denuncia`, `id_funeado`, `foto`) VALUES
(1, 0, 0, 11, 'Captura.PNG'),
(3, 0, 0, 1, 'Captura.JPG'),
(4, 0, 0, 12, '0e67e75e001ec4182e0c4d3c07f4213f.jpg'),
(5, 1, 2, 0, '5c8689a99dc8bfc00c03e32601882791--sou-glamorous.jpg'),
(6, 1, 3, 0, '0e67e75e001ec4182e0c4d3c07f4213f1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funeado`
--

CREATE TABLE `funeado` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `tipo_fune` int(11) NOT NULL,
  `tipo_identidad` int(11) NOT NULL,
  `identidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_nombre` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_nombre` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_apellido` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_apellido` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `celular` varchar(35) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `funeado`
--

INSERT INTO `funeado` (`id`, `id_users`, `tipo_fune`, `tipo_identidad`, `identidad`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `telefono`, `celular`, `id_provincia`, `id_comuna`, `direccion`, `foto`, `estatus`) VALUES
(1, 9, 4, 1, '23559081', 'Carlos', 'Javier', 'Cardenas', 'Albarran', '02735447788', '0414554477', 5, 27, 'Barinas, Barinas', '', 1),
(2, 8, 3, 2, '1234', 'Yormelis', 'Hermeliza', 'Hernandez', 'Mendez', '02736655444', '0414554477', 2, 5, 'Barinitas', '', 0),
(3, 9, 2, 1, '788444', 'Victor', 'Andres', 'Cardenas', 'Albarran', '041455447788', '0414555444', 2, 5, 'Barinas', '', 0),
(4, 8, 1, 1, '444144', 'Alejandro', 'Daniel', 'Ramirez', 'Camacho', '0414455544', '041444555', 6, 52, 'Barinas...', '', 0),
(5, 9, 2, 2, '4411445', 'Nefy', 'Jesus', 'Cardenas', 'Castillo', '444144', '555444', 5, 31, 'Barinas', '', 0),
(6, 8, 4, 1, '4411144', 'Ricardo', 'Daniel', 'Sanchez', 'Hernandez', '024355447', '04145544477', 1, 1, 'Caracas', '', 0),
(7, 9, 4, 1, '4141414', 'Juan', 'Carlos', 'Azuaje', 'Maldonado', '0273554414', '0414554477', 3, 9, 'Caracas', '', 0),
(8, 8, 3, 2, 'Rem delectus quaerat', 'Henry Tyler', 'Adam Wolfe', 'Little', 'Matthews', 'Facilis velit est officia similique', '+741-80-8234149', 5, 18, 'Dignissimos quis veniam quisquam molestiae non esse mollitia minima fugit consequat Et sint', '', 0),
(9, 9, 3, 2, 'Rem delectus quaerat', 'Henry Tyler', 'Adam Wolfe', 'Little', 'Matthews', 'Facilis velit est officia similique', '+741-80-8234149', 5, 18, 'Dignissimos quis veniam quisquam molestiae non esse mollitia minima fugit consequat Et sint', '', 0),
(10, 8, 3, 2, 'Rem delectus quaerat', 'Henry Tyler', 'Adam Wolfe', 'Little', 'Matthews', 'Facilis velit est officia similique', '+741-80-8234149', 5, 18, 'Dignissimos quis veniam quisquam molestiae non esse mollitia minima fugit consequat Et sint', '', 0),
(11, 9, 3, 2, 'Rem delectus quaerat', 'Henry Tyler', 'Adam Wolfe', 'Little', 'Matthews', 'Facilis velit est officia similique', '+741-80-8234149', 5, 18, 'Dignissimos quis veniam quisquam molestiae non esse mollitia minima fugit consequat Et sint', '', 0),
(12, 17, 2, 2, '444114', 'David', 'Angel', 'Camargo', 'Gonzalez', '0444477', '44104', 2, 6, 'ppppppppppp', '', 0),
(13, 17, 2, 2, '444114', 'David', 'Angel', 'Camargo', 'Gonzalez', '0444477', '44104', 2, 6, 'ppppppppppp', '', 0),
(14, 2, 5, 1, '31313', 'www', 'wwww', 'www', 'www', '1414', '141414', 1, 2, 'errerer', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `link`) VALUES
(1, 'Inicio', 'dashboard'),
(2, 'Denuncias', 'operaciones/denuncias'),
(3, 'Usuarios', 'administrar/usuarios'),
(4, 'Permisos', 'administrar/permisos'),
(5, 'Administrar', ''),
(6, 'Cuenta', 'cuenta/users'),
(7, 'Solicitudes', 'Solicitudes'),
(8, 'Solicitud de Datos', 'solicitudes/solicitar_datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `insert` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
(1, 4, 2, 1, 1, 1, 1),
(2, 2, 3, 1, 1, 1, 0),
(5, 2, 4, 1, 0, 1, 0),
(6, 1, 2, 1, 1, 1, 1),
(7, 5, 2, 1, 1, 1, 1),
(8, 2, 2, 1, 0, 1, 1),
(9, 3, 2, 1, 1, 1, 1),
(10, 6, 2, 1, 1, 1, 1),
(11, 6, 3, 1, 1, 1, 1),
(12, 6, 4, 1, 1, 1, 1),
(13, 1, 3, 1, 1, 1, 1),
(14, 1, 4, 1, 1, 1, 1),
(15, 5, 3, 0, 0, 0, 0),
(16, 5, 4, 1, 1, 1, 1),
(17, 3, 4, 1, 0, 0, 0),
(18, 4, 4, 0, 0, 0, 0),
(19, 7, 2, 1, 1, 1, 1),
(20, 7, 3, 1, 1, 1, 1),
(21, 7, 4, 1, 0, 0, 0),
(22, 8, 3, 1, 1, 1, 0),
(23, 8, 4, 1, 0, 1, 0),
(24, 8, 2, 1, 0, 1, 1);

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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(5) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(2, 'admin', 'control total'),
(3, 'usuario', 'ciertos modulos'),
(4, 'Revisor', 'Revisar denuncias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_fune` int(11) NOT NULL,
  `tipe_document` int(11) NOT NULL,
  `identidad` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `id_users`, `id_tipo_fune`, `tipe_document`, `identidad`, `estatus`) VALUES
(1, 17, 11, 2, '123', 2),
(2, 12, 2, 1, '12345', 1),
(4, 9, 4, 1, '556575757', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_arriendo_comercial`
--

CREATE TABLE `td_arriendo_comercial` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_comercial` int(11) NOT NULL,
  `monto_deuda` decimal(10,0) NOT NULL,
  `id_tipo_contrato` int(11) NOT NULL,
  `rut_deudor` varchar(20) NOT NULL,
  `nombre_deudor` varchar(65) NOT NULL,
  `direccion_arriendo` varchar(500) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `td_arriendo_comercial`
--

INSERT INTO `td_arriendo_comercial` (`id`, `id_users`, `id_tipo_comercial`, `monto_deuda`, `id_tipo_contrato`, `rut_deudor`, `nombre_deudor`, `direccion_arriendo`, `estatus`) VALUES
(1, 2, 2, '1124124', 2, '124124124', 'asdasd', 'Veenzuela', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_arriendo_equipos`
--

CREATE TABLE `td_arriendo_equipos` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `marca` varchar(65) NOT NULL,
  `ano` int(11) NOT NULL,
  `caracteristicas` varchar(500) NOT NULL,
  `monto_deuda` decimal(10,0) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_arriendo_habitacional`
--

CREATE TABLE `td_arriendo_habitacional` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_habitacional` int(11) NOT NULL,
  `monto_deuda` decimal(10,0) NOT NULL,
  `id_tipo_contrato` int(11) NOT NULL,
  `rut_deudor` varchar(20) NOT NULL,
  `nombre_deudor` varchar(120) NOT NULL,
  `direccion_arriendo` varchar(500) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `td_arriendo_habitacional`
--

INSERT INTO `td_arriendo_habitacional` (`id`, `id_users`, `id_tipo_habitacional`, `monto_deuda`, `id_tipo_contrato`, `rut_deudor`, `nombre_deudor`, `direccion_arriendo`, `estatus`) VALUES
(3, 2, 3, '20000', 2, '4414115', 'Carlos', 'Barinas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_arriendo_vehiculos`
--

CREATE TABLE `td_arriendo_vehiculos` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_vehiculo` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `marca` varchar(65) NOT NULL,
  `ano` int(11) NOT NULL,
  `caracteristicas` varchar(500) NOT NULL,
  `monto_deuda` decimal(10,0) NOT NULL,
  `patente` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `td_arriendo_vehiculos`
--

INSERT INTO `td_arriendo_vehiculos` (`id`, `id_users`, `id_tipo_vehiculo`, `id_motivo`, `marca`, `ano`, `caracteristicas`, `monto_deuda`, `patente`, `estatus`) VALUES
(1, 2, 3, 3, 'Mustang', 1980, 'Virgo', '10200', 'adasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_cheques`
--

CREATE TABLE `td_cheques` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `no_cheque` varchar(20) NOT NULL,
  `fecha_protesto` date NOT NULL,
  `rut_girador` varchar(20) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `motivo` varchar(500) NOT NULL,
  `banco` varchar(120) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `td_cheques`
--

INSERT INTO `td_cheques` (`id`, `id_users`, `no_cheque`, `fecha_protesto`, `rut_girador`, `nombre`, `motivo`, `banco`, `estatus`) VALUES
(1, 2, '3434', '2018-04-21', '1414', 'Carlos', 'saas', 'Mercantil', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_creditos_automotrices`
--

CREATE TABLE `td_creditos_automotrices` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_deuda` int(11) NOT NULL,
  `id_tipo_vehiculos` int(11) NOT NULL,
  `marca` varchar(35) NOT NULL,
  `ano` int(11) NOT NULL,
  `patente` varchar(20) NOT NULL,
  `caracteristicas` varchar(500) NOT NULL,
  `monto_deuda` decimal(10,0) NOT NULL,
  `rut_deudor` varchar(20) NOT NULL,
  `nombre_deudor` varchar(120) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_creditos_laborales`
--

CREATE TABLE `td_creditos_laborales` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_laborales` int(11) NOT NULL,
  `id_tipo_deudor` int(11) NOT NULL,
  `rut_deudor` varchar(20) NOT NULL,
  `nombre_deudor` varchar(120) NOT NULL,
  `rut_empresa` varchar(20) NOT NULL,
  `nombre_empresa` varchar(120) NOT NULL,
  `rut_representante` varchar(20) NOT NULL,
  `nombre_representante` varchar(120) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_facturas`
--

CREATE TABLE `td_facturas` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `no_factura` varchar(20) NOT NULL,
  `fecha_emision` date NOT NULL,
  `monto_impago` decimal(10,0) NOT NULL,
  `rut_empresa` varchar(20) NOT NULL,
  `nombre_empresa` varchar(120) NOT NULL,
  `rut_representante` varchar(20) NOT NULL,
  `nombre_representante` varchar(120) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `td_facturas`
--

INSERT INTO `td_facturas` (`id`, `id_users`, `no_factura`, `fecha_emision`, `monto_impago`, `rut_empresa`, `nombre_empresa`, `rut_representante`, `nombre_representante`, `estatus`) VALUES
(1, 5, '124', '2018-04-21', '350000', 'J5353535', 'Krlos', '21314', 'Carlos', 0),
(2, 5, '1111', '2018-04-21', '1234', '1234', 'carlo', '121313', 'javier', 0),
(3, 2, '41414', '2018-04-21', '10000', '415151515', 'yormelis, c.a', '4414141414', 'Heme', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_incumplimiento_comerciales`
--

CREATE TABLE `td_incumplimiento_comerciales` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_incumplimiento` int(11) NOT NULL,
  `id_tipo_deudor` int(11) NOT NULL,
  `motivo_deuda` varchar(500) NOT NULL,
  `rut_deudor` varchar(20) NOT NULL,
  `nombre_deudor` varchar(120) NOT NULL,
  `rut_empresa` varchar(20) NOT NULL,
  `nombre_empresa` varchar(120) NOT NULL,
  `rut_representante` varchar(20) NOT NULL,
  `nombre_representante` varchar(120) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_letras`
--

CREATE TABLE `td_letras` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `no_letra` varchar(20) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `rut_deudor` varchar(20) NOT NULL,
  `nombre_deudor` varchar(120) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `notaria` varchar(120) NOT NULL,
  `tipo_deuda` varchar(350) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `td_letras`
--

INSERT INTO `td_letras` (`id`, `id_users`, `no_letra`, `fecha_vencimiento`, `rut_deudor`, `nombre_deudor`, `monto`, `notaria`, `tipo_deuda`, `estatus`) VALUES
(1, 2, '341414', '2018-04-21', '111111111111', 'juga', '11', 'Segundo', 'Pago', 0),
(2, 2, '5555', '2018-04-03', '1412515', 'Juan', '1000', 'Tercero', 'Carro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comercial`
--

CREATE TABLE `tipo_comercial` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_comercial`
--

INSERT INTO `tipo_comercial` (`id`, `descripcion`) VALUES
(1, 'Bodega'),
(2, 'Box'),
(3, 'Galpón'),
(4, 'Local Comercial'),
(5, 'Oficina'),
(6, 'Terreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id`, `descripcion`) VALUES
(1, 'Notarial'),
(2, 'Privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_deuda`
--

CREATE TABLE `tipo_deuda` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_deuda`
--

INSERT INTO `tipo_deuda` (`id`, `descripcion`) VALUES
(1, 'Crédito Directo'),
(2, 'Letra'),
(3, 'Pagares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_deudor`
--

CREATE TABLE `tipo_deudor` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_deudor`
--

INSERT INTO `tipo_deudor` (`id`, `descripcion`) VALUES
(1, 'Empresa'),
(2, 'Persona natural');

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
(1, 'Facturas'),
(2, 'Cheques'),
(3, 'Letras'),
(4, 'Arriendos Habitacionales'),
(5, 'Arriendos Comerciales'),
(6, 'Arriendo de Maquinarias y Equipos'),
(7, 'Créditos directos'),
(8, 'Créditos Automotrices'),
(9, 'Laborales'),
(10, 'Incumplimientos comerciales'),
(11, 'Vendedores On line'),
(12, 'Tiendas Virtuales'),
(13, 'Extranjeros Estafados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacional`
--

CREATE TABLE `tipo_habitacional` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_habitacional`
--

INSERT INTO `tipo_habitacional` (`id`, `descripcion`) VALUES
(1, 'Bodega'),
(2, 'Casa'),
(3, 'Departamento'),
(4, 'Estacionamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_laborales`
--

CREATE TABLE `tipo_laborales` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_laborales`
--

INSERT INTO `tipo_laborales` (`id`, `descripcion`) VALUES
(1, 'Gratificaciones'),
(2, 'Juicio Laboral'),
(3, 'Leyes Sociales'),
(4, 'Remuneraciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_motivo`
--

CREATE TABLE `tipo_motivo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_motivo`
--

INSERT INTO `tipo_motivo` (`id`, `descripcion`) VALUES
(1, 'Apropiación Indebida'),
(2, 'Deuda arriendo'),
(3, 'Robo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculos`
--

CREATE TABLE `tipo_vehiculos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_vehiculos`
--

INSERT INTO `tipo_vehiculos` (`id`, `descripcion`) VALUES
(1, 'Automóviles'),
(2, 'Camiones'),
(3, 'Camionetas'),
(4, 'Maquinarias'),
(5, 'Motos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_document`
--

CREATE TABLE `type_document` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type_document`
--

INSERT INTO `type_document` (`id`, `nombre`) VALUES
(1, 'Pasaporte'),
(2, 'RUT');

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
  `serie` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
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
  `rol_id` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `loginUsers`, `passUsers`, `id_identidad`, `identidad`, `serie`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `email`, `telefono`, `celular`, `fecha_nac`, `id_provincia`, `id_comuna`, `direccion`, `fotos`, `rol_id`, `estatus`) VALUES
(2, 'juan1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '3131313', '', 'Juan', 'Ricardo', 'Sanhez', 'Sanhez', 'juanc@gmail.com', '3232', '32323', '1999-02-02', 5, 19, 'Barinas', '', 3, 0),
(5, 'krlosexe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '31313', '', 'Carlossss', 'Javier', 'Cardenas', 'Albarran', 'cardenascarlos18@gmail.com', '0273533019366', '04145498651', '2006-04-11', 1, 10, 'Barinas', '', 2, 0),
(6, 'juan sanchez', '8cb2237d0679ca88db6464eac60da96345513964', 0, '', '', '', '', '', '', 'juanr@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(7, 'juanr', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 0, '', '', '', '', '', '', 'juansanalv@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(8, 'buscameen', '015f4406be58e791d4675b5857cd7e7c2f2be224', 0, '', '', '', '', '', '', 'buscameen.com@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 2, 0),
(9, 'Buscameen.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '', '', '', '', '', '', 'buscameen@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 2, 0),
(10, 'mauricio ortiz', '92f8ce44c92f3ade37d0987f11e2275504a2b98a', 0, '', '', '', '', '', '', 'evaficom@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(11, 'kpca', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'Minus ex nobis dolor', '', 'Reese Lottsssss', 'Sigourney Wheeler', 'Bass', 'Bird', 'hola@gmail.com', '0414554777', '0414555477', '2006-04-11', 3, 10, 'Barinas', '', 2, 0),
(12, 'kpca1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'kpca@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(13, 'Carlos Cardenas', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'carlos@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(14, '@krlos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'jjj@jj.jjj', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(15, 'joel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'joel@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 4, 0),
(16, 'revisor', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'revisor@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 4, 0),
(17, 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '123245', '', 'Luis', 'Antonioo', 'Cordero', 'Lopez', 'user@gmail.com', '41414', '141414', '2018-04-18', 2, 4, 'Barinas', '', 3, 0),
(18, 'juanrsa', '8cb2237d0679ca88db6464eac60da96345513964', 0, '', '', '', '', '', '', 'jj@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0),
(19, 'caprinos', '8cb2237d0679ca88db6464eac60da96345513964', 0, '', '', '', '', '', '', 'comercialcaprinos@gmail.com', '', '', '0000-00-00', 0, 0, '', '', 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funeado`
--
ALTER TABLE `funeado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_arriendo_comercial`
--
ALTER TABLE `td_arriendo_comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_arriendo_equipos`
--
ALTER TABLE `td_arriendo_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_arriendo_habitacional`
--
ALTER TABLE `td_arriendo_habitacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_arriendo_vehiculos`
--
ALTER TABLE `td_arriendo_vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_cheques`
--
ALTER TABLE `td_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_creditos_automotrices`
--
ALTER TABLE `td_creditos_automotrices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_creditos_laborales`
--
ALTER TABLE `td_creditos_laborales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_facturas`
--
ALTER TABLE `td_facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_incumplimiento_comerciales`
--
ALTER TABLE `td_incumplimiento_comerciales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `td_letras`
--
ALTER TABLE `td_letras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_comercial`
--
ALTER TABLE `tipo_comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_deuda`
--
ALTER TABLE `tipo_deuda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_deudor`
--
ALTER TABLE `tipo_deudor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_fune`
--
ALTER TABLE `tipo_fune`
  ADD PRIMARY KEY (`id_fune`);

--
-- Indices de la tabla `tipo_habitacional`
--
ALTER TABLE `tipo_habitacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_laborales`
--
ALTER TABLE `tipo_laborales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_motivo`
--
ALTER TABLE `tipo_motivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `funeado`
--
ALTER TABLE `funeado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `td_arriendo_comercial`
--
ALTER TABLE `td_arriendo_comercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `td_arriendo_equipos`
--
ALTER TABLE `td_arriendo_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `td_arriendo_habitacional`
--
ALTER TABLE `td_arriendo_habitacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `td_arriendo_vehiculos`
--
ALTER TABLE `td_arriendo_vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `td_cheques`
--
ALTER TABLE `td_cheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `td_creditos_automotrices`
--
ALTER TABLE `td_creditos_automotrices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `td_creditos_laborales`
--
ALTER TABLE `td_creditos_laborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `td_facturas`
--
ALTER TABLE `td_facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `td_incumplimiento_comerciales`
--
ALTER TABLE `td_incumplimiento_comerciales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `td_letras`
--
ALTER TABLE `td_letras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_comercial`
--
ALTER TABLE `tipo_comercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_deuda`
--
ALTER TABLE `tipo_deuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_deudor`
--
ALTER TABLE `tipo_deudor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_fune`
--
ALTER TABLE `tipo_fune`
  MODIFY `id_fune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_habitacional`
--
ALTER TABLE `tipo_habitacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_laborales`
--
ALTER TABLE `tipo_laborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_motivo`
--
ALTER TABLE `tipo_motivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `type_document`
--
ALTER TABLE `type_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
