-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 28-10-2021 a las 03:13:43
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CECyT3_E/S`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `evento` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `evento`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `horaEntrada` time(6) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `horaSalida` time(6) DEFAULT NULL,
  `entrada` int(11) NOT NULL,
  `salida` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fechaEntrada`, `horaEntrada`, `id_usuario`, `fechaSalida`, `horaSalida`, `entrada`, `salida`) VALUES
(1, '2021-10-27', '18:13:43.000000', 1, '2021-10-27', '18:13:51.000000', 1, 1),
(2, '2021-10-27', '18:14:00.000000', 1, '2021-10-27', '18:14:13.000000', 1, 1),
(3, '2021-10-27', '18:14:20.000000', 1, '2021-10-27', '18:14:27.000000', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellidoPaterno` varchar(255) NOT NULL DEFAULT '',
  `apellidoMaterno` varchar(255) NOT NULL DEFAULT '',
  `area` varchar(200) NOT NULL DEFAULT '',
  `puesto` varchar(200) NOT NULL DEFAULT '',
  `numEmpleado` varchar(100) NOT NULL DEFAULT '',
  `correo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL DEFAULT '',
  `telefonoPersonal` varchar(25) DEFAULT NULL,
  `extensionIPN` varchar(11) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `area`, `puesto`, `numEmpleado`, `correo`, `password`, `imagen`, `telefonoPersonal`, `extensionIPN`) VALUES
(1, 'Alan', 'Garduño', 'Pineda', 'UDI', 'Jefe', '2014030514', 'agarduno@ipn.mx', 'qaz', 'image1.png', NULL, '74000'),
(2, 'Angel', 'Valdivia', 'Sánchez', 'UDI', 'Jefe 2', '2015041645', 'avaldivia@ipn.mx', 'qaz', 'image1.png', NULL, '740001');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr` (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;