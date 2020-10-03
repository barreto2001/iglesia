-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2020 a las 04:49:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iglesiatwo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompanante`
--

CREATE TABLE `acompanante` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `document` bigint(12) NOT NULL,
  `supervisor` bigint(12) NOT NULL,
  `misa` int(11) NOT NULL,
  `activo` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `documento` bigint(12) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(52) COLLATE utf8_spanish_ci NOT NULL,
  `cel` bigint(12) NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `name`, `tipo`, `documento`, `email`, `pass`, `cel`, `address`, `rol`) VALUES
(1, 'padre ', 'CC', 7161254, 'padre@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3138516684, 'carrera 1 #8-85', 1),
(2, 'Duvan Arley Hernandez Niño', 'CC', 1010124125, 'dahernandez521@misena.edu.co', '827ccb0eea8a706c4c34a16891f84e7b', 3013659952, 'carrera 2 #8-85', 2),
(3, 'dennys', 'CC', 1033590124, 'dennys@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3123456985, 'carrera 3 #8-85', 2),
(4, 'neider', 'CC', 98745874, 'neider@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3123456977, 'carrera 4 #8-85', 2),
(5, 'duvan niño', 'CC', 9513578, 'duvan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3138516684, 'carrera 5 #8-85', 2),
(6, 'santiago gutierres', 'CC', 1007161792, 'santiago@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3138950676, 'carrera 7 #8-85', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misa`
--

CREATE TABLE `misa` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'Normal',
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `filas` int(2) NOT NULL,
  `columnas` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `disponibles` int(2) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `document` bigint(12) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cel` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sillas` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_sillas` int(2) DEFAULT NULL,
  `misa` int(11) DEFAULT NULL,
  `observacion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompanante`
--
ALTER TABLE `acompanante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor` (`supervisor`),
  ADD KEY `misa` (`misa`),
  ADD KEY `document` (`document`) USING BTREE;

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `misa`
--
ALTER TABLE `misa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `misa` (`misa`),
  ADD KEY `document` (`document`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompanante`
--
ALTER TABLE `acompanante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `misa`
--
ALTER TABLE `misa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acompanante`
--
ALTER TABLE `acompanante`
  ADD CONSTRAINT `acompanante_ibfk_1` FOREIGN KEY (`supervisor`) REFERENCES `supervisor` (`document`),
  ADD CONSTRAINT `acompanante_ibfk_2` FOREIGN KEY (`misa`) REFERENCES `misa` (`id`);

--
-- Filtros para la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`document`) REFERENCES `login` (`documento`),
  ADD CONSTRAINT `supervisor_ibfk_2` FOREIGN KEY (`misa`) REFERENCES `misa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
