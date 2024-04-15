-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2024 a las 13:50:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cineabraham`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `email`) VALUES
(0, 'juan', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `puesto`, `salario`, `fecha_contratacion`) VALUES
(1, 'aa', 'aaa', 'cajero', 10000.00, '2024-04-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `duracion` time NOT NULL,
  `sinopsis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `nombre`, `duracion`, `sinopsis`) VALUES
(0, 'Nombre de la Película', '00:00:00', 'Sinopsis de la Película');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_genero`
--

CREATE TABLE `peliculas_genero` (
  `id_pelicula_genero` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_boletos`
--

CREATE TABLE `venta_boletos` (
  `id` int(11) NOT NULL,
  `id_pelicula` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_boleto` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `sala` varchar(50) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `asiento` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta_boletos`
--

INSERT INTO `venta_boletos` (`id`, `id_pelicula`, `id_cliente`, `id_boleto`, `id_empleado`, `fecha_hora`, `cantidad`, `sala`, `costo`, `asiento`) VALUES
(6, 0, 0, NULL, 1, '2024-04-15 00:14:00', 1, '2', 2.00, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_snack`
--

CREATE TABLE `venta_snack` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_hora` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL,
  `costo_unitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta_snack`
--

INSERT INTO `venta_snack` (`id_venta`, `id_cliente`, `fecha_hora`, `cantidad`, `producto`, `costo_unitario`, `total`) VALUES
(3, 0, '2024-04-14', 2, '2', 2.00, 2.00),
(4, 0, '2024-04-15', 2, '2', 2.00, 2.00),
(5, 0, '2024-04-15', 2, '2', 2.00, 2.00),
(6, 1, '2024-04-01', 2, '1', 10.50, 21.00),
(7, 2, '2024-04-01', 1, '2', 12.75, 12.75),
(8, 3, '2024-04-01', 3, '1', 10.50, 31.50),
(9, 4, '2024-04-02', 2, '3', 15.25, 30.50),
(10, 5, '2024-04-02', 1, '4', 8.90, 8.90),
(11, 6, '2024-04-02', 1, '1', 10.50, 10.50),
(12, 7, '2024-04-03', 2, '5', 20.00, 40.00),
(13, 8, '2024-04-03', 1, '2', 12.75, 12.75),
(14, 9, '2024-04-04', 3, '1', 10.50, 31.50),
(15, 10, '2024-04-04', 2, '3', 15.25, 30.50),
(16, 11, '2024-04-05', 1, '4', 8.90, 8.90),
(17, 12, '2024-04-05', 2, '5', 20.00, 40.00),
(18, 13, '2024-04-06', 1, '2', 12.75, 12.75),
(19, 14, '2024-04-06', 3, '1', 10.50, 31.50),
(20, 15, '2024-04-06', 2, '3', 15.25, 30.50),
(21, 16, '2024-04-07', 1, '4', 8.90, 8.90),
(22, 17, '2024-04-07', 2, '5', 20.00, 40.00),
(23, 18, '2024-04-08', 1, '1', 10.50, 10.50),
(24, 19, '2024-04-08', 2, '2', 12.75, 25.50),
(25, 20, '2024-04-08', 3, '3', 15.25, 45.75);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `venta_boletos`
--
ALTER TABLE `venta_boletos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_snack`
--
ALTER TABLE `venta_snack`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta_boletos`
--
ALTER TABLE `venta_boletos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `venta_snack`
--
ALTER TABLE `venta_snack`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
