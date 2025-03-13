-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-03-2025 a las 07:06:12
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u647180004_chrYa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo` enum('donativo','adquirido','donativo / adquirido') NOT NULL,
  `estatus` enum('activo','eliminado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre`, `cantidad`, `descripcion`, `imagen`, `tipo`, `estatus`) VALUES
(1, 'Batidora', 0, 'AMERICAN es compacta, ergonómica y portátil. Cuenta con dos varillas batidoras de acero inoxidable, es de color blanco con detalles en gris', './uploaded_images/Batidora-20_7672.png', 'adquirido', 'activo'),
(2, 'Copa de cristal', 65, 'Copa de vino transparente. Sus características incluyen un diseño elegante con un tallo delgado y una base estable. La copa tiene una amplia capacidad, con un cuenco grande ', './uploaded_images/Copa_de_cristal-60_1865.jpg', 'adquirido', 'eliminado'),
(3, 'Plato decerámica', 13, 'Plato redondo y plano de color blanco. Sus características incluyen un diseño simple y clásico, ideal para servir alimentos en una variedad de ocasiones. Diametro de 30 cm.', './uploaded_images/Plato_decer__mica-1_7386.jpg', 'donativo / adquirido', 'activo'),
(4, 'Cuchara cafetera', 0, 'Cuchara de acero inoxidable. Sus características incluyen un diseño clásico con un borde decorativo en el mango, que añade un toque elegante. Mide 15cm.', './uploaded_images/Cuchara_cafetera-1_1273.jpg', 'adquirido', 'activo'),
(5, 'Cuchillo', 16, 'Un cuchillo de 30cm. Sus características incluyen una hoja de acero inoxidable, ideal para cortar, picar y rebanar con precisión. El mango es ergonómico y de color blanco, proporcionando un agarre cómodo y seguro.', './uploaded_images/Cuchillo-20_8041.jpeg', 'adquirido', 'activo'),
(6, 'Exprimidor', 35, 'Un exprimidor de limones es un utensilio compacto, hecho de plástico resistente. Tiene dos manijas largas y una cúpula perforada.', './uploaded_images/Exprimidor-40_3720.png', 'adquirido', 'activo'),
(7, 'Licuador Oster', 10, 'La licuadora Oster® cuenta con un potente motor de 800 W, que es 4 veces más duradero', './uploaded_images/Licuador_Oster-15_8635.jpeg', 'adquirido', 'activo'),
(8, 'Olla express', 29, 'Una olla exprés tiene una tapa hermética, una válvula para regular la presión y está hecha de materiales resistentes como acero inoxidable. 22 Litros.', './uploaded_images/Olla_express-30_6443.jpeg', 'adquirido', 'activo'),
(9, 'Olla', 20, 'Una olla grande, está hecha de acero inoxidable, aluminio, hierro fundido o cerámica. Tiene una capacidad de 10 litros, asas robustas para un fácil manejo y una tapa ajustada para retener calor y humedad.', './uploaded_images/Olla-60_5948.png', 'adquirido', 'activo'),
(10, 'Colador', 44, 'Un colador con una malla fina o agujeros que permite separar líquidos de sólidos. Está hecho de materiales como acero inoxidable, plástico o aluminio, redondo. Suele tener asas o un mango para facilitar su manejo mientras se usa.', './uploaded_images/Colador-50_2181.jpeg', 'adquirido', 'activo'),
(11, 'Cuchara sopera', 1, 'Una cuchara sopera con un cuenco profundo y redondeado, diseñado para servir sopas y líquidos. Tiene un mango largo para facilitar el uso en recipientes profundos y está hecha de acero inoxidable.', './uploaded_images/Cuchara_sopera-100_8782.jpg', 'adquirido', 'activo'),
(12, 'Sarten', 0, 'Un sartén redondeado con un mango largo, tiene un revestimiento antiadherente y está hecho de acero inoxidable.\r\n', './uploaded_images/Sarten-40_3938.png', 'donativo', 'eliminado'),
(13, 'Jarra', 4, 'Jarra de plástico', './uploaded_images/Jarra-5_1408.jpg', 'adquirido', 'activo'),
(14, 'Licuadora dos', 1, 'una licuadora', './uploaded_images/Licuadora_dos-1_6986.png', 'adquirido', 'activo'),
(15, 'vaso', 0, 'vaso', './uploaded_images/vaso-7_5312.jpeg', 'adquirido', 'eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_adquiridos`
--

CREATE TABLE `articulos_adquiridos` (
  `id` int(10) NOT NULL,
  `articulo_adquirido` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `tipo_material` enum('equipo','cocina') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_adquiridos`
--

INSERT INTO `articulos_adquiridos` (`id`, `articulo_adquirido`, `cantidad`, `tipo_material`) VALUES
(1, 1, 68, 'equipo'),
(2, 2, 85, 'cocina'),
(3, 3, 114, 'cocina'),
(4, 4, 103, 'cocina'),
(5, 5, 20, 'cocina'),
(6, 6, 40, 'cocina'),
(7, 7, 16, 'equipo'),
(8, 8, 30, 'cocina'),
(9, 9, 61, 'cocina'),
(10, 10, 50, 'cocina'),
(11, 11, 145, 'cocina'),
(12, 12, 9, 'cocina'),
(13, 13, 5, 'equipo'),
(14, 14, 1, 'equipo'),
(15, 15, 7, 'cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_danados`
--

CREATE TABLE `articulos_danados` (
  `id` int(12) NOT NULL,
  `articulo_danado` int(12) NOT NULL,
  `cantidad` int(12) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_danados`
--

INSERT INTO `articulos_danados` (`id`, `articulo_danado`, `cantidad`, `fecha`) VALUES
(1, 1, 0, '2024-07-24 00:37:16'),
(2, 7, 2, '2024-07-24 02:42:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_donados`
--

CREATE TABLE `articulos_donados` (
  `id` int(10) NOT NULL,
  `articulo_donado` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `tipo_material` enum('equipo','cocina') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_donados`
--

INSERT INTO `articulos_donados` (`id`, `articulo_donado`, `cantidad`, `tipo_material`) VALUES
(1, 3, 42, 'cocina'),
(2, 12, 40, 'cocina'),
(3, 2, 5, 'cocina'),
(4, 1, 3, 'equipo'),
(5, 11, 312, 'cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_eliminados`
--

CREATE TABLE `articulos_eliminados` (
  `id` int(12) NOT NULL,
  `articulo_eliminado` int(12) NOT NULL,
  `cantidad` int(12) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_eliminados`
--

INSERT INTO `articulos_eliminados` (`id`, `articulo_eliminado`, `cantidad`, `fecha`) VALUES
(1, 3, 15, '2024-07-24 00:41:47'),
(2, 1, 0, '2024-07-24 00:54:48'),
(3, 2, 25, '2024-07-24 01:11:11'),
(4, 9, 19, '2024-07-24 01:29:06'),
(5, 11, 319, '2024-07-24 01:29:58'),
(6, 4, 0, '2024-07-24 02:37:55'),
(8, 13, 5, '2024-07-24 08:28:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_perdidos`
--

CREATE TABLE `articulos_perdidos` (
  `id` int(12) NOT NULL,
  `articulo_perdido` int(12) NOT NULL,
  `cantidad` int(12) NOT NULL,
  `solicitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_perdidos`
--

INSERT INTO `articulos_perdidos` (`id`, `articulo_perdido`, `cantidad`, `solicitud`) VALUES
(1, 4, 1, NULL),
(2, 10, 1, 7),
(3, 10, 1, 7),
(4, 10, 1, 7),
(5, 4, 5, 5),
(6, 6, 1, 8),
(7, 6, 1, 9),
(8, 6, 1, 10),
(9, 6, 1, 11),
(10, 6, 1, 12),
(11, 3, 0, 13),
(12, 3, 0, 3),
(13, 4, 1, 14),
(14, 5, 0, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_reparacion`
--

CREATE TABLE `articulos_reparacion` (
  `id` int(11) NOT NULL,
  `articulo_reparacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_reparacion`
--

INSERT INTO `articulos_reparacion` (`id`, `articulo_reparacion`, `cantidad`) VALUES
(1, 1, 0),
(2, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_reposiciones`
--

CREATE TABLE `articulos_reposiciones` (
  `id` int(11) NOT NULL,
  `articulo_repuesto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tipo` enum('donativo','adquirido') NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_reposiciones`
--

INSERT INTO `articulos_reposiciones` (`id`, `articulo_repuesto`, `cantidad`, `tipo`, `fecha`) VALUES
(1, 1, 28, 'adquirido', '2024-07-24 00:55:14'),
(2, 1, 20, 'donativo', '2024-07-24 00:56:31'),
(3, 2, 5, 'donativo', '2024-07-24 01:24:36'),
(4, 2, 5, 'donativo', '2024-07-24 01:26:05'),
(5, 2, 5, 'adquirido', '2024-07-24 01:26:46'),
(6, 1, 20, 'adquirido', '2024-07-24 01:27:27'),
(7, 2, 20, 'adquirido', '2024-07-24 01:27:53'),
(8, 3, 20, 'adquirido', '2024-07-24 01:28:47'),
(9, 9, 1, 'adquirido', '2024-07-24 01:29:24'),
(10, 11, 20, 'adquirido', '2024-07-24 01:30:07'),
(11, 11, 1, 'adquirido', '2024-07-24 01:32:32'),
(12, 3, 1, 'adquirido', '2024-07-24 01:53:56'),
(13, 4, 1, 'adquirido', '2024-07-24 01:58:51'),
(14, 3, 1, 'adquirido', '2024-07-24 02:13:23'),
(15, 4, 1, 'adquirido', '2024-07-24 05:41:05'),
(16, 11, 1, 'adquirido', '2024-07-24 05:41:37'),
(17, 11, 1, 'adquirido', '2024-07-24 05:42:06'),
(18, 11, 1, 'adquirido', '2024-07-24 05:42:54'),
(19, 1, 3, 'donativo', '2024-07-24 05:45:15'),
(20, 11, 2, 'donativo', '2024-07-24 05:47:28'),
(21, 12, 9, 'adquirido', '2024-07-24 06:03:17'),
(22, 11, 10, 'adquirido', '2024-07-24 07:37:22'),
(23, 11, 10, 'donativo', '2024-07-24 07:59:13'),
(24, 11, 10, 'adquirido', '2024-07-24 08:01:59'),
(25, 11, 10, 'adquirido', '2024-07-24 08:02:41'),
(26, 11, 10, 'adquirido', '2024-07-24 08:03:19'),
(27, 11, 10, 'adquirido', '2024-07-24 08:06:42'),
(28, 11, 10, 'adquirido', '2024-07-24 08:11:49'),
(29, 11, 10, 'adquirido', '2024-07-24 08:16:48'),
(30, 11, 10, 'adquirido', '2024-07-24 08:19:10'),
(31, 11, 10, 'adquirido', '2024-07-24 08:20:17'),
(32, 11, 300, 'donativo', '2024-07-24 08:22:39'),
(33, 11, 10, 'donativo', '2024-07-24 08:23:55'),
(34, 13, 5, 'adquirido', '2024-07-24 08:28:57'),
(35, 3, 1, 'adquirido', '2024-07-24 14:47:43'),
(36, 11, 1, 'adquirido', '2024-07-24 14:48:23'),
(37, 3, 1, 'donativo', '2024-08-12 18:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_solicitud`
--

CREATE TABLE `articulos_solicitud` (
  `id` int(11) NOT NULL,
  `solicitud` int(100) NOT NULL,
  `articulo` int(100) NOT NULL,
  `cantidad_articulo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `articulos_solicitud`
--

INSERT INTO `articulos_solicitud` (`id`, `solicitud`, `articulo`, `cantidad_articulo`) VALUES
(1, 1, 4, 1),
(2, 1, 5, 1),
(3, 2, 3, 1),
(4, 2, 4, 1),
(5, 3, 1, 3),
(6, 3, 3, 18),
(7, 4, 1, 1),
(8, 4, 7, 1),
(9, 5, 4, 1),
(10, 6, 6, 1),
(11, 7, 10, 1),
(12, 8, 6, 1),
(13, 8, 10, 1),
(14, 9, 6, 1),
(15, 9, 13, 1),
(16, 10, 6, 1),
(17, 11, 6, 1),
(18, 12, 6, 1),
(19, 12, 10, 1),
(20, 13, 4, 3),
(21, 13, 3, 1),
(22, 14, 4, 1),
(23, 14, 3, 1),
(24, 14, 8, 1),
(25, 15, 1, 1),
(26, 15, 3, 5),
(27, 15, 7, 1),
(28, 16, 7, 1),
(29, 16, 5, 1),
(30, 16, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_danados`
--

CREATE TABLE `comentarios_danados` (
  `id` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `articulo_danado` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios_danados`
--

INSERT INTO `comentarios_danados` (`id`, `comentario`, `articulo_danado`, `cantidad`, `fecha`) VALUES
(1, 'Se daño el motor', 1, 1, '2024-07-24 00:37:16'),
(2, 'Se rompió la jarra', 7, 1, '2024-07-24 02:42:27'),
(3, 'se perdio la tapa de la jara', 7, 1, '2024-07-24 02:44:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_perdidos`
--

CREATE TABLE `comentarios_perdidos` (
  `id` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `articulo_perdido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios_perdidos`
--

INSERT INTO `comentarios_perdidos` (`id`, `comentario`, `articulo_perdido`, `cantidad`, `fecha`) VALUES
(1, 'Perdido por Arlet Abril Sanchéz Otero ', 4, 1, '2024-07-24 00:36:31'),
(2, 'se perdio en practica', 4, 1, '2024-07-24 01:58:44'),
(3, 'Artículo perdido en la requisición 7', 10, 1, '2024-12-01 22:20:53'),
(4, 'Artículo perdido en la requisición 7', 10, 1, '2024-12-01 22:23:34'),
(5, 'Artículo perdido en la requisición 7', 10, 1, '2024-12-01 22:30:50'),
(6, 'Artículo perdido en la requisición 5', 4, 0, '2024-12-01 23:02:43'),
(7, 'Artículo perdido en la requisición 8', 6, 1, '2024-12-02 00:47:26'),
(8, 'Artículo perdido en la requisición 9', 6, 1, '2024-12-02 01:15:41'),
(9, 'Artículo perdido en la requisición 10', 6, 1, '2024-12-02 01:29:25'),
(10, 'Artículo perdido en la requisición 11', 6, 1, '2024-12-02 08:25:09'),
(11, 'Artículo perdido en la requisición 12', 6, 1, '2024-12-02 08:32:15'),
(12, 'Artículo perdido en la requisición 13', 3, 0, '2024-12-02 16:06:03'),
(13, 'Artículo perdido en la requisición 3', 3, 0, '2024-12-05 11:39:28'),
(14, 'Artículo perdido en la requisición 14', 4, 1, '2024-12-05 16:19:28'),
(15, 'Artículo perdido en la requisición 16', 5, 0, '2024-12-06 02:33:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_reparacion`
--

CREATE TABLE `comentarios_reparacion` (
  `id` int(11) NOT NULL,
  `articulo_reparacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios_reparacion`
--

INSERT INTO `comentarios_reparacion` (`id`, `articulo_reparacion`, `cantidad`, `comentario`, `fecha`) VALUES
(1, 1, 1, 'Ya se arreglo el motor y se realizo una limpieza ', '2024-07-24 00:40:12'),
(2, 7, 1, 'se realizó limpieza', '2024-07-24 01:12:39'),
(3, 7, 1, 'se limpio motor', '2024-07-24 02:14:27'),
(4, 7, 1, '', '2024-07-24 02:15:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_adquiridos`
--

CREATE TABLE `fecha_adquiridos` (
  `id` int(11) NOT NULL,
  `articulo_adquirido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fecha_adquiridos`
--

INSERT INTO `fecha_adquiridos` (`id`, `articulo_adquirido`, `cantidad`, `fecha`) VALUES
(1, 1, 20, '2024-07-23 20:11:26'),
(2, 2, 60, '2024-07-23 20:14:12'),
(3, 3, 90, '2024-07-24 00:00:59'),
(4, 4, 100, '2024-07-24 00:01:08'),
(5, 5, 20, '2024-07-24 00:00:49'),
(6, 6, 40, '2024-07-24 00:04:30'),
(7, 7, 15, '2024-07-24 00:06:25'),
(8, 8, 30, '2024-07-24 00:14:21'),
(9, 9, 60, '2024-07-24 00:18:57'),
(10, 10, 50, '2024-07-24 00:21:19'),
(11, 11, 100, '2024-07-24 00:23:46'),
(12, 1, 28, '2024-07-24 00:55:14'),
(13, 4, 1, '2024-07-24 00:56:22'),
(14, 2, 5, '2024-07-24 01:26:46'),
(15, 1, 20, '2024-07-24 01:27:27'),
(16, 2, 20, '2024-07-24 01:27:53'),
(17, 3, 20, '2024-07-24 01:28:47'),
(18, 9, 1, '2024-07-24 01:29:24'),
(19, 11, 20, '2024-07-24 01:30:07'),
(20, 11, 1, '2024-07-24 01:32:32'),
(21, 3, 1, '2024-07-24 01:53:56'),
(22, 4, 1, '2024-07-24 01:58:51'),
(23, 3, 1, '2024-07-24 01:59:45'),
(24, 3, 1, '2024-07-24 02:13:23'),
(25, 7, 1, '2024-07-24 02:14:32'),
(26, 4, 1, '2024-07-24 05:41:05'),
(27, 11, 1, '2024-07-24 05:41:37'),
(28, 11, 1, '2024-07-24 05:42:06'),
(29, 11, 1, '2024-07-24 05:42:54'),
(30, 12, 9, '2024-07-24 06:03:17'),
(31, 11, 10, '2024-07-24 08:19:10'),
(32, 11, 10, '2024-07-24 08:20:17'),
(33, 13, 5, '2024-07-24 08:30:57'),
(34, 13, 5, '2024-07-24 08:30:57'),
(35, 3, 1, '2024-07-24 14:47:43'),
(36, 11, 1, '2024-07-24 14:48:23'),
(37, 14, 1, '2024-08-12 18:48:57'),
(38, 15, 7, '2024-11-26 21:54:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_donados`
--

CREATE TABLE `fecha_donados` (
  `id` int(11) NOT NULL,
  `articulo_donado` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tipo_donante` enum('empresa','alumno','otro') NOT NULL,
  `nombre_donante` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fecha_donados`
--

INSERT INTO `fecha_donados` (`id`, `articulo_donado`, `cantidad`, `tipo_donante`, `nombre_donante`, `fecha`) VALUES
(1, 3, 40, 'empresa', 'Hotel turismo', '2024-07-24 00:30:33'),
(2, 12, 40, 'alumno', 'Andres Pineda de la O', '2024-07-24 00:34:38'),
(3, 2, 5, 'empresa', 'empresa', '2024-07-24 01:26:05'),
(4, 3, 1, 'alumno', 'Cristofer Reynaldo Gomez Escalante', '2024-07-24 01:59:34'),
(5, 1, 3, 'alumno', 'alumno', '2024-07-24 05:45:15'),
(6, 11, 2, 'empresa', 'empresa', '2024-07-24 05:47:28'),
(7, 11, 300, 'alumno', 'alumno', '2024-07-24 08:22:39'),
(8, 11, 10, 'alumno', 'alumno', '2024-07-24 08:23:55'),
(9, 3, 1, 'empresa', 'empresa', '2024-08-12 18:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_eliminados`
--

CREATE TABLE `fecha_eliminados` (
  `id` int(11) NOT NULL,
  `articulo_eliminado` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fecha_eliminados`
--

INSERT INTO `fecha_eliminados` (`id`, `articulo_eliminado`, `cantidad`, `fecha`) VALUES
(1, 3, 20, '2024-07-24 00:41:47'),
(2, 1, 18, '2024-07-24 00:54:48'),
(3, 2, 60, '2024-07-24 01:11:11'),
(4, 3, 20, '2024-07-24 01:28:30'),
(5, 9, 20, '2024-07-24 01:29:06'),
(6, 11, 100, '2024-07-24 01:29:58'),
(7, 3, 1, '2024-07-24 02:13:05'),
(8, 4, 0, '2024-07-24 02:37:55'),
(9, 4, 0, '2024-07-24 02:40:00'),
(10, 11, 79, '2024-07-24 05:42:36'),
(11, 11, 157, '2024-07-24 05:46:27'),
(14, 11, 20, '2024-07-24 08:19:38'),
(15, 11, 10, '2024-07-24 08:21:47'),
(16, 13, 10, '2024-07-24 08:28:20'),
(17, 11, 310, '2024-07-24 14:48:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `grupo` varchar(15) NOT NULL,
  `cuatrimestre` int(2) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `estatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo`, `cuatrimestre`, `nivel`, `estatus`) VALUES
(1, 'GA1-4', 1, 'ingeniería', 1),
(2, 'GA1-2', 1, 'TSU', 1),
(3, 'GA1-3', 1, 'ingeniería', 2),
(4, 'GA2-1', 2, 'TSU', 1),
(5, 'GA3-1', 3, 'TSU', 1),
(6, 'GA8-1', 9, 'ingeniería', 1),
(7, 'GA9-1', 9, 'ingeniería', 1),
(8, 'GA8-2', 8, 'ingeniería', 1),
(9, 'GA9-2', 9, 'ingeniería', 1),
(10, 'GA8-3', 8, 'ingeniería', 1),
(11, 'GA9-3', 9, 'ingeniería', 2),
(12, 'GA5-2', 5, 'TSU', 1),
(13, 'GA10-1', 10, 'ingeniería', 1),
(14, 'GA-5-1', 1, 'TSU', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_equipo`
--

CREATE TABLE `integrantes_equipo` (
  `id` int(12) NOT NULL,
  `alumno` int(12) NOT NULL,
  `num_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `integrantes_equipo`
--

INSERT INTO `integrantes_equipo` (`id`, `alumno`, `num_equipo`) VALUES
(1, 3, 1),
(2, 4, 2),
(4, 3, 4),
(5, 4, 4),
(6, 4, 5),
(7, 5, 5),
(9, 4, 7),
(10, 17, 8),
(11, 15, 9),
(12, 17, 10),
(13, 21, 11),
(14, 15, 12),
(15, 16, 12),
(17, 3, 13),
(18, 4, 13),
(19, 14, 13),
(20, 3, 14),
(21, 14, 14),
(23, 14, 16),
(24, 15, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `materia` varchar(150) NOT NULL,
  `cuatrimestre` int(2) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`, `cuatrimestre`, `nivel`, `activo`) VALUES
(1, 'Pozoles', 2, 'TSU', 1),
(2, 'Mariscos', 3, 'TSU', 1),
(3, 'Repostería', 3, 'TSU', 1),
(4, 'Cocina fría', 6, 'TSU', 1),
(5, 'Ensaladas 1', 9, 'ingeniería', 2),
(6, 'Ensaladas', 9, 'ingeniería', 1),
(7, 'Bebidas', 10, 'TSU', 1),
(8, 'Cocina', 1, 'ingeniería', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_equipo`
--

CREATE TABLE `num_equipo` (
  `id` int(11) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `num_equipo`
--

INSERT INTO `num_equipo` (`id`, `activo`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `nombre`, `email`, `telefono`, `activo`) VALUES
(1, 'Alex Dayren Valenzo Serna', 'dayren@utcgg.edu.mx', '7551206856', 1),
(2, 'Jaime Valenzo Moreno', 'jaime@utcgg.edu.mx', '7551206810', 1),
(3, 'Maria Xitlali Valenzo', 'xitlali@utcgg.edu.mx', '7551206819', 2),
(4, 'Emily Nazaret Valenzo Serna', 'nazaret@utcgg.edu.mx', '7895452154', 2),
(5, 'Alejandra Serna', 'alej@utcgg.edu.mx', '7551203697', 1),
(6, 'W', 'w@utcgg.edu.mx', '7885854854', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_materias`
--

CREATE TABLE `profesores_materias` (
  `id` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesores_materias`
--

INSERT INTO `profesores_materias` (`id`, `materia`, `profesor`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 1, 2),
(4, 3, 1),
(5, 3, 2),
(6, 5, 1),
(7, 5, 2),
(8, 6, 1),
(9, 6, 2),
(10, 7, 5),
(11, 8, 1),
(12, 8, 2),
(13, 8, 5),
(14, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `solicitante` int(100) NOT NULL,
  `total` int(50) NOT NULL,
  `equipo` int(11) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `asignatura` int(11) DEFAULT NULL,
  `profesor` int(11) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `fecha_reposicion` date DEFAULT NULL,
  `estatus` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `faltantes` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `solicitante`, `total`, `equipo`, `observaciones`, `asignatura`, `profesor`, `fecha_solicitud`, `fecha_entrega`, `fecha_reposicion`, `estatus`, `fecha`, `faltantes`) VALUES
(1, 3, 2, 1, NULL, 1, 1, '2024-07-24', '2024-12-04', NULL, 'finalizada', '2024-07-24 05:35:01', NULL),
(2, 3, 2, 2, 'El plato esta rayado', 2, 1, '2024-08-13', '2024-12-03', NULL, 'finalizada', '2024-08-12 17:47:51', NULL),
(3, 3, 21, 3, NULL, 1, 1, '2024-08-12', '2024-12-05', '2024-12-10', 'finalizada', '2024-08-12 18:49:00', NULL),
(4, 3, 2, 4, NULL, 2, 2, '2024-08-14', '2024-12-05', NULL, 'finalizada', '2024-08-12 18:53:32', NULL),
(5, 3, 1, 5, NULL, 2, 1, '2024-11-15', '2024-12-01', '2024-12-04', 'finalizada', '2024-11-14 04:19:12', NULL),
(6, 3, 1, 6, NULL, 2, 1, '2024-12-02', '2024-12-01', NULL, 'finalizada', '2024-12-01 15:05:35', NULL),
(7, 3, 1, 7, NULL, 2, 1, '2024-12-30', '2024-12-01', '2024-12-05', 'finalizada', '2024-12-01 15:20:53', NULL),
(8, 3, 2, 8, NULL, 2, 1, '2024-12-03', '2024-12-02', '2024-12-07', 'finalizada', '2024-12-02 00:36:21', NULL),
(9, 3, 2, 9, NULL, 2, 1, '2024-12-06', '2024-12-02', '2024-12-07', 'finalizada', '2024-12-02 00:52:23', NULL),
(10, 3, 1, 10, 'Observacion uno', 2, 1, '2024-12-20', '2024-12-02', '2024-12-07', 'finalizada', '2024-12-02 01:22:32', NULL),
(11, 3, 1, 11, 'observacion2', 2, 1, '2024-12-04', '2024-12-02', '2024-12-07', 'finalizada', '2024-12-02 08:18:30', NULL),
(12, 3, 2, 12, NULL, 3, 1, '2024-12-13', '2024-12-02', '2024-12-07', 'finalizada', '2024-12-02 08:29:45', NULL),
(13, 3, 4, 13, 'El plato esta roto', 2, 1, '2024-12-03', '2024-12-02', '2024-12-07', 'finalizada', '2024-12-02 15:59:27', NULL),
(14, 14, 3, 14, 'El plato esta estrellado', 8, 1, '2024-12-05', '2024-12-05', '2024-12-10', 'finalizada', '2024-12-05 15:32:39', NULL),
(15, 3, 7, 15, NULL, 8, 2, '2024-12-06', '2024-12-06', NULL, 'finalizada', '2024-12-05 16:15:32', NULL),
(16, 3, 3, 16, NULL, 8, 5, '2024-12-09', '2024-12-06', '2024-12-11', 'finalizada', '2024-12-06 02:31:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  `matricula` varchar(8) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `activo` int(2) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `telefono`, `password`, `grupo`, `matricula`, `role`, `activo`, `foto`) VALUES
(1, 'Mario Isaac Ortiz Téllez', 'almacengastronomia@utcgg.edu.mx', '7551206819', '$2y$10$lKGTCP0Zd2e6VWBEHxg.meZnCeLfOv.y54bZrblvcAm.ZlE1N6ukW', 1, NULL, 'encargado', 1, ''),
(2, 'Director de gastronomia', 'director@utcgg.edu.mx', NULL, '$2y$10$NT31bg0rddlantf6QYquMuLvTk/qvZ2XJwwfYwhyNDuAcwkpfBi3m', 1, NULL, 'administrador', 1, ''),
(3, 'Iyari Dueñas Ramirez', '21309015@utcgg.edu.mx', NULL, '$2y$10$nDHmtcCE0ZmOMJ3KIj2wd.5k56p2DjkgrXqb1eQhn/EfwS2KdwV/G', 14, '21309015', 'alumno', 1, '1723488956_persona.png'),
(4, 'Cristofer Reynaldo Escalante Gomez ', '21309001@utcgg.edu.mx', NULL, '$2y$10$tWfIvxIsVZEGSFT7U5adzOniSeGfPeFFQCDQCV5dHaxq09N5YG3gS', 5, '21309001', 'alumno', 1, NULL),
(5, 'Andres Pineda De La O ', '21309022@utcgg.edu.mx', NULL, '$2y$10$f4wwKUrPL8tVY9I660cFdujwZy3MHjftF6q4XomQ1.2ZVAQspfIuu', 2, '21309022', 'alumno', 1, NULL),
(6, 'Maria Xitlali Valenzo Serna', '=C3 & \"@utcgg.edu.mx\"', NULL, '$2y$10$vqdFjD./nRIWEO14Va0jmuVpekDR.T2fJe/MYL7VdB5lD8knLXh/C', 1, '21309002', 'alumno', 2, NULL),
(7, 'Arlet Abril Sanchez Otero', '=C5 & \"@utcgg.edu.mx\"', NULL, '$2y$10$BCKQxz7QZcDpCzNMDe7k5OoZSb4dpLjCmCnxfTuPyvWeNoHt80oCa', 1, '21309031', 'alumno', 2, NULL),
(8, '', '', NULL, '$2y$10$FVwFigATm5mWUDHlxxG4ZeeQ5nisaO11eSziu6dZL0uZxHS2kEMSi', 1, '', 'alumno', 2, NULL),
(9, 'Andres Pineda De La O ', '21309099@utcgg.edu.mx', NULL, '$2y$10$dZGBeRxLoDNr/FXZIKrGAO0qwHW9o/OiN12PzG66wimAhpMWl.D6e', 1, '21309099', 'alumno', 2, NULL),
(10, 'Maria Xitlali Valenzo Serna', '=C3 & \"@utcgg.edu.mx\"', NULL, '$2y$10$PSM87UthzK6m393qqlrqMueYFKhMygmhIb7bsksvPSDKiSDYzv5JO', 1, '21309098', 'alumno', 2, NULL),
(12, 'Xitlali', '21309005@utcgg.edu.mx', NULL, '$2y$10$12zcFh7IbmW0G/iq63ItqO/Ilk/gzPGf02Xtsd.eMTSpK0jVDcLTK', 9, '21309005', 'alumno', 2, NULL),
(13, 'Maria ', '21309006@utcgg.edu.mx', NULL, '$2y$10$.DCiyBOdIinVNMkNL8DvKeCXYDJ14XTisTw8/YA/Y2wz5LV63uTH.', 4, '21309006', 'alumno', 2, NULL),
(14, 'Arlet Abril Sanchez Otero', '21309053@utcgg.edu.mx', NULL, '$2y$10$fjJOGhcKsDv3OD9Gmhj79.4iz8c67ip60lxAFJnVYQe6iJmkGjZSe', 14, '21309053', 'alumno', 1, NULL),
(15, 'Gabriel Omar ', '21309054@utcgg.edu.mx', NULL, '$2y$10$mkvObVBvuZrB9Tkad4cKT.ReHYOh55OdSYTDueWCfACqZHJeiVQd2', 7, '21309054', 'alumno', 1, NULL),
(16, 'Marjorie Aguilar', '21309055@utcgg.edu.mx', NULL, '$2y$10$tX0/3I8EuhGa.183uYb4/eUYxNRvfZ0lRt6AGqtFIBvQyZQbiaN.a', 10, '21309055', 'alumno', 1, NULL),
(17, 'Johan', '21309056@utcgg.edu.mx', NULL, '$2y$10$vxm1Mwjb5IdHQ6xfALyOD.C7zJ6TrYM/0Brl9JRqG934hcItAOEvu', 10, '21309056', 'alumno', 1, NULL),
(18, 'Yazmin Barbosa', 'yazmin@utcgg.edu.mx', '7551258965', '$2y$10$6SkCgoOqdvDMWr7aFqlhb.FWEY5RsLppAJG4a.NBio6SXhAkqH8.m', NULL, NULL, 'encargado', 2, NULL),
(19, 'Alan Ocampo Guzmán', 'alan@utcgg.edu.mx', '7551258965', '$2y$10$c20Fl5N9rs7BrCThIhRxDODkdjEl.BDUhZudArpEsursOleXCPjLG', NULL, NULL, 'encargado', 2, NULL),
(20, 'Fernanda', '21309057@utcgg.edu.mx', NULL, '$2y$10$Q75MOMiz77xoHSL.N8UHleVMnzp/w48jZSp5EclOXpQJr883YZ.iG', 14, '21309057', 'alumno', 1, NULL),
(21, 'Said', '21309058@utcgg.edu.mx', NULL, '$2y$10$aZAsTb99OXTX5/ohvM97T.tkKq3enW2wGpJudooFBJXPqSoL1OiMK', 1, '21309058', 'alumno', 1, NULL),
(22, 'Juan ', '21309068@utcgg.edu.mx', NULL, '$2y$10$IEGVZHjjmJTAKqYbolgrxeElqjwCsl0y/huQxqq/kMtw0BW9Um2kS', 8, '21309068', 'alumno', 1, NULL),
(23, 'Kevin Eduardo', '21309089@utcgg.edu.mx', NULL, '$2y$10$iLI.8Qa7jRJyMjou/SDiNOr06dXidVjr.inQ8XtMSkQWd0u8mOUY6', 2, '21309089', 'alumno', 2, NULL),
(24, 'Kevin Eduardo Gonzalez Garcia', 'kevin@utcgg.edu.mx', '7551338417', '$2y$10$WQsWsHRgZlNphW.iQZMytO2h85r6xx0gwQ9pPkelM3GfYWFUuhyl6', NULL, NULL, 'encargado', 2, NULL),
(25, 'Sarai Salazar', '20309001@utcgg.edu.mx', NULL, '$2y$10$00mU9URMIN9qVEVLmycCAuPyig098CbMlU8vsgLMn.MnjWA5uVbxS', 1, '20309001', 'alumno', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `articulos_adquiridos`
--
ALTER TABLE `articulos_adquiridos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_adquirido` (`articulo_adquirido`);

--
-- Indices de la tabla `articulos_danados`
--
ALTER TABLE `articulos_danados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_danado` (`articulo_danado`);

--
-- Indices de la tabla `articulos_donados`
--
ALTER TABLE `articulos_donados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_donado` (`articulo_donado`);

--
-- Indices de la tabla `articulos_eliminados`
--
ALTER TABLE `articulos_eliminados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_elim` (`articulo_eliminado`);

--
-- Indices de la tabla `articulos_perdidos`
--
ALTER TABLE `articulos_perdidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_perdido` (`articulo_perdido`);

--
-- Indices de la tabla `articulos_reparacion`
--
ALTER TABLE `articulos_reparacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_reparacion` (`articulo_reparacion`);

--
-- Indices de la tabla `articulos_reposiciones`
--
ALTER TABLE `articulos_reposiciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articulo_repuesto` (`articulo_repuesto`);

--
-- Indices de la tabla `articulos_solicitud`
--
ALTER TABLE `articulos_solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articulo` (`articulo`),
  ADD KEY `fk_solicitud` (`solicitud`);

--
-- Indices de la tabla `comentarios_danados`
--
ALTER TABLE `comentarios_danados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentario_danado` (`articulo_danado`);

--
-- Indices de la tabla `comentarios_perdidos`
--
ALTER TABLE `comentarios_perdidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentario_perdido` (`articulo_perdido`);

--
-- Indices de la tabla `comentarios_reparacion`
--
ALTER TABLE `comentarios_reparacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentario_reparacion` (`articulo_reparacion`);

--
-- Indices de la tabla `fecha_adquiridos`
--
ALTER TABLE `fecha_adquiridos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fecha_adquiridos` (`articulo_adquirido`);

--
-- Indices de la tabla `fecha_donados`
--
ALTER TABLE `fecha_donados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fecha_donados` (`articulo_donado`);

--
-- Indices de la tabla `fecha_eliminados`
--
ALTER TABLE `fecha_eliminados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fecha_eliminados` (`articulo_eliminado`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `integrantes_equipo`
--
ALTER TABLE `integrantes_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_num_equipo` (`num_equipo`),
  ADD KEY `fk_alumno` (`alumno`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `num_equipo`
--
ALTER TABLE `num_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `profesores_materias`
--
ALTER TABLE `profesores_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia` (`materia`),
  ADD KEY `profesor` (`profesor`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitante` (`solicitante`),
  ADD KEY `fk_equipo` (`equipo`),
  ADD KEY `profesor` (`profesor`),
  ADD KEY `asignatura` (`asignatura`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo` (`grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `articulos_adquiridos`
--
ALTER TABLE `articulos_adquiridos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `articulos_danados`
--
ALTER TABLE `articulos_danados`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `articulos_donados`
--
ALTER TABLE `articulos_donados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `articulos_eliminados`
--
ALTER TABLE `articulos_eliminados`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `articulos_perdidos`
--
ALTER TABLE `articulos_perdidos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `articulos_reparacion`
--
ALTER TABLE `articulos_reparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `articulos_reposiciones`
--
ALTER TABLE `articulos_reposiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `articulos_solicitud`
--
ALTER TABLE `articulos_solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `comentarios_danados`
--
ALTER TABLE `comentarios_danados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios_perdidos`
--
ALTER TABLE `comentarios_perdidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios_reparacion`
--
ALTER TABLE `comentarios_reparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fecha_adquiridos`
--
ALTER TABLE `fecha_adquiridos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `fecha_donados`
--
ALTER TABLE `fecha_donados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fecha_eliminados`
--
ALTER TABLE `fecha_eliminados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `integrantes_equipo`
--
ALTER TABLE `integrantes_equipo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `num_equipo`
--
ALTER TABLE `num_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `profesores_materias`
--
ALTER TABLE `profesores_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos_adquiridos`
--
ALTER TABLE `articulos_adquiridos`
  ADD CONSTRAINT `fk_art_adquirido` FOREIGN KEY (`articulo_adquirido`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_danados`
--
ALTER TABLE `articulos_danados`
  ADD CONSTRAINT `fk_art_danado` FOREIGN KEY (`articulo_danado`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_donados`
--
ALTER TABLE `articulos_donados`
  ADD CONSTRAINT `fk_art_donado` FOREIGN KEY (`articulo_donado`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_eliminados`
--
ALTER TABLE `articulos_eliminados`
  ADD CONSTRAINT `fk_art_elim` FOREIGN KEY (`articulo_eliminado`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_perdidos`
--
ALTER TABLE `articulos_perdidos`
  ADD CONSTRAINT `fk_art_perdido` FOREIGN KEY (`articulo_perdido`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_reparacion`
--
ALTER TABLE `articulos_reparacion`
  ADD CONSTRAINT `fk_art_reparacion` FOREIGN KEY (`articulo_reparacion`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_reposiciones`
--
ALTER TABLE `articulos_reposiciones`
  ADD CONSTRAINT `fk_articulo_repuesto` FOREIGN KEY (`articulo_repuesto`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `articulos_solicitud`
--
ALTER TABLE `articulos_solicitud`
  ADD CONSTRAINT `fk_articulo` FOREIGN KEY (`articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `fk_solicitud` FOREIGN KEY (`solicitud`) REFERENCES `solicitud` (`id`);

--
-- Filtros para la tabla `comentarios_danados`
--
ALTER TABLE `comentarios_danados`
  ADD CONSTRAINT `fk_comentario_danado` FOREIGN KEY (`articulo_danado`) REFERENCES `articulos_danados` (`articulo_danado`);

--
-- Filtros para la tabla `comentarios_perdidos`
--
ALTER TABLE `comentarios_perdidos`
  ADD CONSTRAINT `fk_comentario_perdido` FOREIGN KEY (`articulo_perdido`) REFERENCES `articulos_perdidos` (`articulo_perdido`);

--
-- Filtros para la tabla `comentarios_reparacion`
--
ALTER TABLE `comentarios_reparacion`
  ADD CONSTRAINT `fk_comentario_reparacion` FOREIGN KEY (`articulo_reparacion`) REFERENCES `articulos_reparacion` (`articulo_reparacion`);

--
-- Filtros para la tabla `fecha_adquiridos`
--
ALTER TABLE `fecha_adquiridos`
  ADD CONSTRAINT `fk_fecha_adquiridos` FOREIGN KEY (`articulo_adquirido`) REFERENCES `articulos_adquiridos` (`articulo_adquirido`);

--
-- Filtros para la tabla `fecha_donados`
--
ALTER TABLE `fecha_donados`
  ADD CONSTRAINT `fk_fecha_donados` FOREIGN KEY (`articulo_donado`) REFERENCES `articulos_donados` (`articulo_donado`);

--
-- Filtros para la tabla `fecha_eliminados`
--
ALTER TABLE `fecha_eliminados`
  ADD CONSTRAINT `fk_fecha_eliminados` FOREIGN KEY (`articulo_eliminado`) REFERENCES `articulos_eliminados` (`articulo_eliminado`);

--
-- Filtros para la tabla `integrantes_equipo`
--
ALTER TABLE `integrantes_equipo`
  ADD CONSTRAINT `fk_alumno` FOREIGN KEY (`alumno`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_num_equipo` FOREIGN KEY (`num_equipo`) REFERENCES `num_equipo` (`id`);

--
-- Filtros para la tabla `profesores_materias`
--
ALTER TABLE `profesores_materias`
  ADD CONSTRAINT `profesores_materias_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `profesores_materias_ibfk_2` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`id_profesor`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_equipo` FOREIGN KEY (`equipo`) REFERENCES `num_equipo` (`id`),
  ADD CONSTRAINT `fk_solicitante` FOREIGN KEY (`solicitante`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`id_profesor`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`asignatura`) REFERENCES `materias` (`id_materia`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_grupo` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
